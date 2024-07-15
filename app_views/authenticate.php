<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();
$errors = [];

require_once 'server-connect.php';

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['password'])) {
  $errors[] = 'Please fill both the email and password fields!';
} else {
  // Prepare our SQL to get user data
  if ($stmt = $con->prepare('SELECT id, password, userlevel FROM accounts WHERE email = ?')) {
    // Bind parameters and execute
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $password, $userlevel);
      $stmt->fetch();

      // Verify password using password_verify
      if (password_verify($_POST['password'], $password)) {

        $stmt_crr = $con->prepare('SELECT currency FROM user_currency WHERE user_id = ? ORDER BY created_at DESC LIMIT 1');
        $stmt_crr->bind_param('i', $id);
        $stmt_crr->execute();
        $result_crr = $stmt_crr->get_result();
        if ($row_crr = $result_crr->fetch_assoc()) {
          $selectedCurrency = $row_crr['currency'];
        } else {
          $selectedCurrency = "USD";
        }

        $session_token = bin2hex(random_bytes(32));
        $hashed_session_token = password_hash($session_token, PASSWORD_DEFAULT);


        // Check if a remember token already exists
        $stmt_check = $con->prepare('SELECT user_id FROM remember_tokens WHERE user_id = ?');
        $stmt_check->bind_param('i', $id);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
          // Update existing token
          $stmt_update = $con->prepare('UPDATE remember_tokens SET token = ? WHERE user_id = ?');
          $stmt_update->bind_param('si', $session_token, $id);
          $stmt_update->execute();
          $stmt_update->close();
        } else {
          // Insert new token
          $stmt_insert = $con->prepare('INSERT INTO remember_tokens (user_id, token) VALUES (?, ?)');
          $stmt_insert->bind_param('is', $id, $session_token);
          $stmt_insert->execute();
          $stmt_insert->close();
        }
        $stmt_check->close();

        setcookie('remember_token', $session_token, time() + (86400 * 30));
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        $_SESSION['currency'] = $selectedCurrency;
        $_SESSION['userlevel'] = $userlevel;



        header('Location: landing-page.blade.php');
      } else {
        $errors[] = 'Incorrect password. Please try again.';
      }
    } else {
      // Incorrect email
      $errors[] = 'Incorrect email. Please try again.';
    }
  }
  $stmt->close();
}

// If there are errors, store them in session
if (!empty($errors)) {
  $_SESSION['login_errors'] = $errors;
  header('Location: login.blade.php');
  exit();
}
?>
