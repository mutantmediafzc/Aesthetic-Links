<?php
	
	// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.blade.php');
	exit;
}
?>
<?php require_once 'server.blade.php';?>
	
	<?php
	if (isset($_COOKIE['session_token'])) {
  $session_token = $_COOKIE['session_token'];

  // Query the database to find a matching session token
  $stmt = $con->prepare('SELECT user_id FROM user_sessions WHERE session_token = ?');
  $stmt->bind_param('s', $session_token);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id);
    $stmt->fetch();

    // Session token found, log in the user
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['user_id'] = $user_id;  // Store user_id for subsequent actions

    // Retrieve additional user data if needed (e.g., username, email, etc.)
    // ...

    // Redirect to the intended page
  } else {
    // Session token not found, redirect to login or home page
    
  }

  $stmt->close();
} else {
  // Session cookie not set, redirect to login or home page
  
}

	
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
	// In this case we can use the account ID to get the account info.
	$stmt->bind_param('i', $user_id);
	$stmt->execute();
	$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
	$stmt->fetch();
	$stmt->close();
	
?>	