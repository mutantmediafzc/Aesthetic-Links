<?php

require_once 'vendor/autoload.php'; // Include the Twilio PHP SDK

// Your Twilio Account SID and Auth Token
$account_sid = 'ACeec7751bebefee29e725e4bd123a9291';
$auth_token = '3b4b407db39339d0d388d7838322ee6c';

// Initialize Twilio client
$client = new Twilio\Rest\Client($account_sid, $auth_token);

// Your Twilio phone number
$twilio_number = '+447888868959';

// Recipient's phone number
$to_number = '+971585262506'; // Replace with the recipient's phone number

// Message body
$message = 'Hello from Twilio! This is a test message.';

try {
    // Send SMS message
    $client->messages->create(
        $to_number,
        array(
            'from' => $twilio_number,
            'body' => $message
        )
    );

    echo 'Message sent successfully.';
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>