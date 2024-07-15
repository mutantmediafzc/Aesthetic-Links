<?php
session_start();

require_once '../../server.blade.php';
require_once '../../vendor/autoload.php';
$errors = [];

use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'ACeec7751bebefee29e725e4bd123a9291';
$auth_token = '3b4b407db39339d0d388d7838322ee6c';
$twilio_number = '+447888868959';

$client = new Client($account_sid, $auth_token);
$totalmobile = $_SESSION["phone_number"];

if (empty($totalmobile)) {
    $errors['totalmobile'] = "Mobile number is required.";
    header('Location: ../../verify-account.blade.php');
    exit;
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

if (empty($errors)) {
    $stmt = $con->prepare('SELECT id FROM accounts WHERE mobile = ?');
    $stmt->bind_param('s', $totalmobile);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id);
        $stmt->fetch();
        $otp = generateOTP();
        $updateStmt = $con->prepare('UPDATE accounts SET otp = ? WHERE id = ?');
        $updateStmt->bind_param('si', $otp, $id);
        $updateStmt->execute();
        $updateStmt->close();
        if (sendOTP($totalmobile, $otp)) {
            $_SESSION['message'] = "OTP resent successfully to $totalmobile.";
        } else {
            $_SESSION['error_message'] = "Failed to resend OTP. Please try again.";
        }
        header('Location: ../../verified-otp.blade.php');
        exit;
    }
}

if (!empty($errors)) {
    $_SESSION['errors_validation'] = $errors;
    header('Location: ../../verified-otp.blade.php');
    exit;
}

$con->close();
