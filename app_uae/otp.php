<?php
// Include Twilio PHP library
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'ACeec7751bebefee29e725e4bd123a9291';
$auth_token = '3b4b407db39339d0d388d7838322ee6c';
$twilio_number = '+447888868959';

// Initialize Twilio client
$client = new Client($account_sid, $auth_token);

// Function to generate random OTP
function generateOTP($length = 6) {
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

// Example usage
$recipient_number = '971506133779';
$otp = generateOTP();
if (sendOTP($recipient_number, $otp)) {
    echo "OTP sent successfully.";
} else {
    echo "Failed to send OTP.";
}
?>