<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$redirect_to_login = false;

if (!isset($_SESSION['loggedin'])) {
  if (isset($_COOKIE['session_token'])) {
    $session_token = $_COOKIE['session_token'];

    // Query the database to find a matching session token
    require_once 'server-connect.php'; // Ensure the database connection is available
    $stmt = $con->prepare('SELECT user_id FROM remember_tokens WHERE token = ?');
    $stmt->bind_param('s', $session_token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($user_id);
      $stmt->fetch();

      // Session token found, log in the user
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['id'] = $user_id; // Store user_id for subsequent actions

      // Retrieve additional user data if needed (e.g., username, email, etc.)
      $stmt_user = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
      $stmt_user->bind_param('i', $user_id);
      $stmt_user->execute();
      $stmt_user->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
      $stmt_user->fetch();

      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['userunique'] = $userunique;
      $_SESSION['userlevel'] = $userlevel;
      $_SESSION['profilelevel'] = $profilelevel;

      $stmt_user->close();
    } else {
      $redirect_to_login = true;
    }

    $stmt->close();
  } else {
    $redirect_to_login = true;
  }
}

if ($redirect_to_login) {
  echo '<script type="text/javascript">window.location.href = "login.blade.php";</script>';
  exit();
}
