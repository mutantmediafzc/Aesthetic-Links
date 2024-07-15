<?php require_once 'server.blade.php';?>

<?php

//new
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'ACeec7751bebefee29e725e4bd123a9291';
$auth_token = '3b4b407db39339d0d388d7838322ee6c';
$twilio_number = '+447888868959';

$client = new Client($account_sid, $auth_token);

// Function to generate random OTP
function generateOTP($length = 4) {
    $otp = "";
    for ($i = 0; $i < $length; $i++) {
        $otp .= rand(0, 9);
    }
    return $otp;
}

// Function to send OTP via SMS
function sendOTP($to, $otp) {
    global $client, $twilio_number;

    $message = "Your OTP is: $otp";

    try {
        $client->messages->create(
            "+{$to}",
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );
        return true;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

$otp = generateOTP();


function generateUniqueVoucherCode() {
    $length = 8; // You can adjust the length of the voucher code as needed
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $voucherCode = '';

    for ($i = 0; $i < $length; $i++) {
        $voucherCode .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $voucherCode;
}



//end new

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


if (isset($_POST['referral'])) {
    $findUser = "SELECT * FROM accounts WHERE profilelevel = ?";

    $stmt = $con->prepare($findUser);
    $stmt->bind_param("s", $_POST['referral']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $updatedReferralCount = $row['referral_count'] + 1;

        $updateReferralCount = "UPDATE accounts SET referral_count = ? WHERE profilelevel = ?";
        $stmt = $con->prepare($updateReferralCount);
        $stmt->bind_param("is", $updatedReferralCount, $row['profilelevel']);

        $stmt->execute();

        // number of referrals => discount percentage
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

// We need to check if the account with that username exists.
$totalmobile=$_POST['mobile_code'].$_POST['mobile'];
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE mobile = ? OR email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('ss', $totalmobile, $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        session_start();

// Set the error message in the session
        $_SESSION['error_message'] = "mobile or email already exists, please choose another!";

// Redirect to the landing page
        // $session= '<h1 style="color:red; margin-left:10%">mobile or email already exists, please choose another!</h1>';
        header('Location: register.blade.php?session=');
        exit();

    } else {
        // Username doesn't exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code, mobile, otp, userunique, userlevel, profilelevel, referral) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $uniqid = uniqid();
            $userunique = uniqid();
            $stmt->bind_param('ssssssssss', $_POST['username'], $password, $_POST['email'], $uniqid, $totalmobile, $otp, $_POST['userlevel'], $_POST['profilelevel'], $userunique, $_POST['referral']);
            $stmt->execute();
            $lastUserId = $stmt->insert_id;

            // new Example usage
            $recipient_number = $totalmobile;
            if (sendOTP($recipient_number, $otp)) {
                echo "OTP sent successfully.";
            } else {
                echo "Failed to send OTP.";
            }
//
// header('Location: landing-page.blade.php');
            header('Location: verified-otp.blade.php?m='.$totalmobile);

        } else {
            // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all three fields.
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
$con->close();
?>