<?php
session_start();

$cunique = $_GET['cunique'];
$cid = $_GET['id'];
$type = $_GET['type'];

require_once 'server-connect.php';

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password, userlevel FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $userlevel);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		$_SESSION['userlevel'] = $_POST['userlevel'];
		
		header('Location: '. $type .'.php?cunique=' . $cunique . '&id=' . $cid);
	} else {
        // Incorrect password
        header('Location: login.incorrect.bookings.php?cunique=' . $cunique . '&id=' . $cid . '&type=' . $type);
        echo "incorrect password";
	}
} else {
	// Incorrect username
    header('Location: login.incorrect.bookings.php?cunique=' . $cunique . '&id=' . $cid . '&type=' . $type);
    echo "incorrect username";
}
	$stmt->close();
}