<?php require_once 'server.blade.php';?>
<?php


// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$otp=$_POST['code1'].$_POST['code2'].$_POST['code3'].$_POST['code4'];
// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT * FROM accounts WHERE mobile = ? AND otp = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('ss', $_POST['mobile'], $otp);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
    
    $newstatus =1;
    $updateStmt = $con->prepare('UPDATE accounts SET verified = ? WHERE mobile = ? AND otp = ?');
    $updateStmt->bind_param('sss', $newstatus, $_POST['mobile'], $otp);
    $updateStmt->execute();

    $updateStmt->close();
    header('Location: landing-page.blade.php');
} else {
    session_start();

// Set the error message in the session
$_SESSION['error_message'] = "your OTP Wrong!";

// Redirect to the landing page
 header('Location: verified-otp.blade.php?m='.$_POST['mobile']);
        exit();
        // echo 'your OTP Wrong!';
        //you can redirect to same page agin by the below:
        // header('Location: verified-otp.blade.php?m='.$_POST['mobile']);
	}
}
	$stmt->close();

$con->close();
?>