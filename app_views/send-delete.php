<?php
$name = $_POST['username'];
$email = $_POST['email'];
$reason = $_POST['reason'];

// Recipient email address
$to = "wilson@mutant.ae";

// Subject of the email
$subject = "Account Delete";

// Message body
$message = "This Account:' . $name . ' with the email ' . $email . ' has requested to be deleted. Reason: ' . $reason . '";

// Additional headers (optional)
$headers = "From: ivan@aestheticlinks.com" . "\r\n" .
           "Reply-To: noreply@aestheticlinks.com" . "\r\n" .
           "CC: copy@example.com" . "\r\n" .
           "MIME-Version: 1.0" . "\r\n" .
           "Content-Type: text/plain; charset=UTF-8";

// Attempt to send the email
if (mail($to, $subject, $message, $headers)) {
  echo "Email sent successfully!";
  header('Location: deleterequest.php');
} else {
  echo "Failed to send email. Please check your server configuration.";
}

?>
