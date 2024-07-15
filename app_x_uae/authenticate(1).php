<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();

require_once 'server-connect.php';

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['password'])) {
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

      $stmt_crr = $con->prepare('SELECT currency FROM user_currency WHERE user_id = ? ORDER BY created_at DESC LIMIT 1');
      $stmt_crr->bind_param('i', $id);
      $stmt_crr->execute();
      $result_crr = $stmt_crr->get_result();
      if ($row_crr = $result_crr->fetch_assoc()) {
        $selectedCurrency = $row_crr['currency'];
      } else {
        $selectedCurrency = "USD";
      }

      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];  // Assuming username is stored in $_POST['username']
      $_SESSION['id'] = $id;
      $_SESSION['currency'] = $selectedCurrency;
      $_SESSION['userlevel'] = $userlevel;

      // Set cookie to store username (adjust cookie lifetime as needed)
      $cookie_lifetime = 60 * 60 * 24 * 7; // One week in seconds
      setcookie('username', $_POST['username'], time() + $cookie_lifetime, '/'); // Adjust path as needed
      // Assuming you retrieved the session ID with session_id()
      $sessionId = session_id();
      setcookie('PHPSESSID', $sessionId, 0, '/');

      header('Location: landing-page.blade.php');
    } else {
      // Incorrect password
      header('Location: login.incorrect.php');
      echo "incorrect password";
    }
  } else {
    // Incorrect username
    header('Location: login.incorrect.php');
    echo "incorrect username";
  }


  $stmt->close();
}
?>
