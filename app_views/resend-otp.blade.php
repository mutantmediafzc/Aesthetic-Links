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


// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT * FROM accounts WHERE mobile = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_GET['m']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
    
    $updateStmt = $con->prepare('UPDATE accounts SET otp = ? WHERE mobile = ?');
    $updateStmt->bind_param('ss', $otp, $_GET['m']);
    $updateStmt->execute();

    $updateStmt->close();
    	// new Example usage
	$recipient_number = $_GET['m'];
	if (sendOTP($recipient_number, $otp)) {
		echo "OTP sent successfully.";
	} else {
		echo "Failed to send OTP.";
	}
    header('Location: verified-otp.blade.php?m='.$_GET['m']);
} 
	} else {
        echo "we don't have account under this mobile number, please try to register again!";
	}
	$stmt->close();

$con->close();
?>