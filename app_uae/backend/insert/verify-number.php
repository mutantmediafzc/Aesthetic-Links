<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../login.blade.php');
    exit;
}

require_once '../../server.blade.php';
require_once '../../vendor/autoload.php';
$errors = [];

use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'ACeec7751bebefee29e725e4bd123a9291';
$auth_token = '3b4b407db39339d0d388d7838322ee6c';
$twilio_number = '+447888868959';

$client = new Client($account_sid, $auth_token);
if (isset($_SESSION['registration_data'])) {
    $registration_data = $_SESSION['registration_data'];

    $full_name = isset($registration_data['full_name']) ? $registration_data['full_name'] : '';
    $email = isset($registration_data['email']) ? $registration_data['email'] : '';
    $password = isset($registration_data['password']) ? $registration_data['password'] : '';
    $referral = isset($registration_data['referral']) ? $registration_data['referral'] : '';
    $userlevel = isset($registration_data['userlevel']) ? $registration_data['userlevel'] : 1;
    $profilelevel = isset($registration_data['profilelevel']) ? $registration_data['profilelevel'] : 0;
} else {
    $registration_data = $_SESSION['registration_data_social'];

    $full_name = isset($registration_data['full_name']) ? $registration_data['full_name'] : '';
    $email = isset($registration_data['email']) ? $registration_data['email'] : '';
    $password = isset($registration_data['password']) ? $registration_data['password'] : '';
    $userunique = $registration_data['userunique'];
    $socialType = $registration_data['socialType'];
    $verified = $registration_data['verified'];
    $userlevel = $registration_data['userlevel'];
    $profilelevel = $registration_data['profilelevel'];
    $socialId = $registration_data['socialId'];
    $socialType = $registration_data['socialType'];
}

$mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$mobile_code = isset($_POST['mobile_code']) ? trim($_POST['mobile_code']) : '';
if (empty($full_name)) {
    $errors[] = "Full name is required.";
    $_SESSION['errors_register'] = $errors;
    header('Location: ../../register.blade.php');
    exit;
}

if (empty($email)) {
    $errors['password'] = "Email is required.";
    header('Location: ../../register.blade.php');
    exit;
}

if (empty($password)) {
    $errors['password'] = "Password is required.";
    header('Location: ../../register.blade.php');
    exit;
}



if (empty($mobile_code)) {
    $errors['mobile_code'] = 'A country code is required.';
} elseif (!preg_match('/^\+\d{1,3}$/', $mobile_code)) {
    $errors['mobile_code'] = 'The country code must be in the format +X, +XX, or +XXX.';
}

// Function to generate random OTP
function generateOTP($length = 4)
{
    $otp = "";
    for ($i = 0; $i < $length; $i++) {
        $otp .= rand(0, 9);
    }
    return $otp;
}

// Function to send OTP via SMS
function sendOTP($to, $otp)
{
    global $client, $twilio_number;

    $message = "Your OTP is: $otp";

    try {
        $client->messages->create(
            "{$to}",
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );
        return true;
    } catch (Exception $e) {
        return false;
    }
}



function generateUniqueVoucherCode()
{
    $length = 8;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $voucherCode = '';

    for ($i = 0; $i < $length; $i++) {
        $voucherCode .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $voucherCode;
}



if (empty($errors)) {

    // Referral
    if (isset($referral)) {
        $findUser = "SELECT * FROM accounts WHERE profilelevel = ?";
        $stmt = $con->prepare($findUser);
        $stmt->bind_param("s", $referral);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $updatedReferralCount = $row['referral_count'] + 1;

            $updateReferralCount = "UPDATE accounts SET referral_count = ? WHERE profilelevel = ?";
            $stmt = $con->prepare($updateReferralCount);
            $stmt->bind_param("is", $updatedReferralCount, $row['profilelevel']);

            $stmt->execute();

            $discountValues = [
                3 => 5,
                6 => 10,
                9 => 15,
                12 => 20
            ];

            if ($updatedReferralCount % 3 == 0) {
                $voucherCode = generateUniqueVoucherCode();
                $accountId = $row['id'];

                $insertVoucher = "INSERT INTO vouchers (account_id, voucher_code, discount) VALUES (?, ?, ?)";
                $stmt = $con->prepare($insertVoucher);
                $stmt->bind_param("isi", $accountId, $voucherCode, $discountValues[$updatedReferralCount]);

                $stmt->execute();
            }

            if ($updatedReferralCount == 13) {
                $resetReferralCount = "UPDATE accounts SET referral_count = 1 WHERE profilelevel = ?";
                $stmt = $con->prepare($resetReferralCount);
                $stmt->bind_param("s", $row['profilelevel']);

                $stmt->execute();
            }
        }
    }
    // Referral

    $totalmobile = $mobile_code . $mobile;

    if ($stmt = $con->prepare('SELECT id FROM accounts WHERE mobile = ?')) {
        $stmt->bind_param('s', $totalmobile);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors['mobile'] = 'This phone number is already registered. Please use a different number.';
        } else {
            $stmt = $con->prepare('SELECT id FROM accounts WHERE email = ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id);
                $stmt->fetch();
                $otp = generateOTP();

                $updateStmt = $con->prepare('UPDATE accounts SET mobile = ?, otp = ? WHERE id = ?');
                $updateStmt->bind_param('ssi', $totalmobile, $otp, $id);
                $updateStmt->execute();
                $updateStmt->close();
                $_SESSION["phone_number"] = $totalmobile;
                if (sendOTP($totalmobile, $otp)) {
                    $_SESSION['message'] = "OTP sent successfully to $totalmobile.";
                } else {
                    $_SESSION['error_message'] = "Failed to send OTP. Please try again.";
                }
                header('Location: ../../verified-otp.blade.php');
                exit;
            } else {
                if (isset($socialType) && !empty($socialType)) {
                    $uniqid = uniqid();
                    $userunique = uniqid();
                    if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code, mobile, otp, userunique, userlevel, profilelevel, social_id, social_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                        $otp = generateOTP();
                        $stmt->bind_param('sssssssssss', $full_name, $password, $email, $uniqid, $totalmobile, $otp, $userunique, $userlevel, $profilelevel, $socialId, $socialType);
                        $stmt->execute();
                        $_SESSION["phone_number"] = $totalmobile;
                        if (sendOTP($totalmobile, $otp)) {
                            $_SESSION['message'] = "OTP sent successfully to $totalmobile.";
                        } else {
                            $_SESSION['error_message'] = "Failed to send OTP. Please try again.";
                        }
                        header('Location: ../../verified-otp.blade.php');
                        exit;
                    }
                } else {
                    $uniqid = uniqid();
                    $userunique = uniqid();

                    if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code, mobile, otp, userunique, userlevel, profilelevel, referral) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                        $otp = generateOTP();
                        $stmt->bind_param('ssssssssss', $full_name, $password, $email, $uniqid, $totalmobile, $otp, $userunique, $userlevel, $profilelevel, $referral);
                        $stmt->execute();
                        $_SESSION["phone_number"] = $totalmobile;
                        if (sendOTP($totalmobile, $otp)) {
                            $_SESSION['message'] = "OTP sent successfully to $totalmobile.";
                        } else {
                            $_SESSION['error_message'] = "Failed to send OTP. Please try again.";
                        }
                        header('Location: ../../verified-otp.blade.php');
                        exit;
                    } else {
                        $errors['database'] = 'There was an error preparing the database statement for account creation.';
                    }
                }
            }
        }
        $stmt->close();
    } else {
        $errors['database'] = 'There was an error preparing the database statement for mobile check.';
    }
}
if (!empty($errors)) {
    $_SESSION['errors_validation'] = $errors;
    $_SESSION['old_input'] = [
        'mobile' => $mobile,
        'mobile_code' => $mobile_code,
    ];
    header('Location: ../../verify-account.blade.php');
    exit;
}

$con->close();
