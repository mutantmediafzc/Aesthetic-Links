<?php
session_start();

require_once 'server-connect.php';  // Assuming database connection file
// Check if the user is logged in
if (isset($_SESSION['loggedin'])) {
  // Get the session token (assuming it's stored in a session variable)
  $session_token = $_SESSION['id'];

  // Prepare and execute the delete query
  $stmt = $con->prepare('DELETE FROM user_sessions WHERE user_id = ?');
  $stmt->bind_param('s', $session_token);
  $stmt->execute();

  // Check if deletion was successful (optional)
  if ($stmt->affected_rows === 1) {
    // Session deleted successfully
  } else {
    // Handle potential deletion error (optional)
  }

  // Destroy the session data
  session_destroy();

  // Redirect to login or home page
  header('Location: discover-page.blade.php');
} else {
  // User is not logged in, redirect to login or home page
  header('Location: login.blade.php');
}

$stmt->close();
?>
