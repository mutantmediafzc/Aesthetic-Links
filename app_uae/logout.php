<?php
session_start();

require_once 'server-connect.php';  // Assuming database connection file

// Check if the user is logged in
if (isset($_SESSION['loggedin'])) {
  // Get the user ID from the session
  $user_id = $_SESSION['id'];


  // Clear the remember me cookie
  if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600);
  }

  // Destroy the session data
  session_destroy();

  // Redirect to login or home page
  header('Location: landing-page.blade.php');
  exit();
} else {
  // User is not logged in, redirect to login or home page
  header('Location: login.blade.php');
  exit();
}
