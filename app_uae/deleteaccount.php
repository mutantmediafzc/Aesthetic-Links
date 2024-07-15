<?php require_once 'server.blade.php';?>	
	
<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Define recipient address and subject
$to = 'sharyyoru@gmail.com';
$subject = 'Delete Account Request';
$username = $_POST['username'];
$email = $_POST['email'];
$email = $_POST['reason'];
// Define message content (lines are separated by \r\n)
$message = "$username with email $email has requested for account deletion.\r\n";
$message .= "Reason: $reason.\r\n\n";
$message .= "Sincerely,\r\n";
$message .= "Aesthetic Links Delete";

// Additional headers (optional)
$headers = 'From: wilson@mutant.ae' . "\r\n" .
           'Reply-To: noreply@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Send the email
if (mail($to, $subject, $message, $headers)) {
  echo "Email sent successfully!";
  header("Location: deleterequest.php");
} else {
  echo "Error sending email: " . error_get_last()['message'];
}
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
<!-- End Google Tag Manager -->
<style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      display: flex;
      justify-content: center;
    }

/* Add padding to containers */
.register-container {
  width: 90%;
  margin: auto;
  background-color: white;
  margin-top: 20vw;
}

.register-container h1 {
  margin: 0;
  font-size: 28px;
  margin-bottom: 10px;
}

.register-container p {
  margin: 0;
  font-size: 14px;
  margin-bottom: 10px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 98%;
  margin: 5px 0 22px 0;
  display: inline-block;
  height: 50px;
  border: none;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  text-indent: 15px;
  font-family: "Poppins", sans-serif;
  font-size: 16px;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #fff;
  border: 1px solid #ccc;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #0C1E36;
  font-family: "Poppins", sans-serif;
  height: 50px;
  font-size: 16px;
  font-weight: 500;
  border-radius: 5px;
  color: white;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  text-align: center;
}
</style>
</head>

<?php require_once 'server.blade.php';?>	
	
	
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<form action="deleteaccount.php" method="POST">

  <div class="register-container">
    <h1>Delete Account!</h1>
      <p>Attention! Filling this form will start your Account Deletion process.</p>
      <p style="font-size: 10px; color: #444444;"> Please fill all the (*)</p>
          
      <label for="name" style="font-weight: 500;">Name *</label>
        <input type="text" placeholder="Name" name="username" id="name" required>

        <label for="email" style="font-weight: 500;">Email *</label>
        <input type="text" placeholder="Email" name="email" id="email" required>

        <label for="psw" style="font-weight: 500;">Reason *</label>
        <input type="text" placeholder="Reason" name="reason" id="password" required>
	  	
	  	<input type="hidden" name="userlevel" value="1">
	  <input type="hidden" name="profilelevel" value="0">
      
        

      <button type="submit" class="registerbtn">Delete Account</button>

  </div>

  
      
  <div class="container signin">
    <p>Changed your Mind? <a href="landing-page.blade.php" style="color: #0CB4BF; text-decoration: none; font-weight: 500;">Go to Home Page</a>.</p>
  </div>
</form>



</body>
</html>
