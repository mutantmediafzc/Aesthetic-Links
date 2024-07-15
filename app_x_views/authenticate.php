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
  exit('Please fill both the email and password fields!');
}

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
      
      // Generate a random session token
      $session_token = bin2hex(random_bytes(32));

      // Create a user session record in the database
      $stmt_insert = $con->prepare('INSERT INTO user_sessions (user_id, session_token) VALUES (?, ?)');
      $stmt_insert->bind_param('is', $id, $session_token);
      $stmt_insert->execute();

      if ($stmt_insert->affected_rows === 1) {

        // Store session data in variables (optional, can be retrieved later)
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];  // Assuming username is stored in $_POST['username']
        $_SESSION['id'] = $id;
        $_SESSION['currency'] = $selectedCurrency; // (logic to get currency, similar to existing code)
        $_SESSION['userlevel'] = $userlevel;

        // Set a cookie with the session token (adjust cookie lifetime as needed)
        $cookie_lifetime = 60 * 60 * 24 * 7; // One week in seconds
        setcookie('session_token', $session_token, time() + $cookie_lifetime, '/');

        header('Location: discover-page.blade.php');
      } else {
        // Failed to create session record
        exit('Failed to create session, please try again');
      }

      $stmt_insert->close();
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

<!--**Changes Made:**

1. **Generate Session Token:** Instead of storing data in sessions, we generate a random session token.
2. **Database Storage:** We create a new record in a `user_sessions` table with `user_id` and `session_token`.
3. **Session Variables (Optional):**  We store relevant data in session variables for convenience (optional, can be retrieved later based on user_id).
4. **Session Cookie:**  We set a cookie named "session_token" with the generated token.
5. **Error Handling:** We added basic error handling for failed session record creation.

**Additional Notes:**

- You'll need to create a `user_sessions` table in your database with columns for `user_id` (foreign key referencing your users table) and `session_token` (string).
- This approach requires additional logic on subsequent requests to validate the session token against the database before granting access to user-specific resources.

Remember to adjust the code further based on your specific database schema and session management requirements.-->
