

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

@font-face {
    font-family: 'poppinsregular';
    src: url('poppins-regular-webfont.woff2') format('woff2'),
         url('poppins-regular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;

}

body {
    margin: 0;
    padding: 0;
    font-family: 'poppinsregular';
    display: flex;
    justify-content: center;
    align-items: center; /* Add this line */
    height: 100vh;
}

.register-container {
    width: 90%;
    background-color: white;
    height: max-content;
}

.register-container h1 {
    height: max-content;
  margin: 0;
  font-size: 28px;
  margin-bottom: 10px;
}

.register-container p {
    height: max-content;
  margin: 0;
  font-size: 14px;
  margin-bottom: 10px;
}

/* Full-width input fields */
input[type=text] {
  width: 98%;
  margin: 5px 0 22px 0;
  display: inline-block;
  height: 50px;
  border: none;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  text-indent: 15px;
  font-family: 'poppinsregular';
  font-size: 16px;
}

    input[type=password] {
        width: 98%;
        margin: 5px 0 10px 0;
        display: inline-block;
        height: 50px;
        border: none;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-indent: 15px;
        font-family: 'poppinsregular';
        font-size: 16px;
    }
    
    .paragraph-btn {
        width: max-content;
        height: max-content;
        margin-bottom: 22px !important;
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
<body>

<form action="authenticate.php" method="POST" class="logremember">

  <div class="register-container">
    <h1>Welcome back!</h1>
      <p style="margin-top:10px;">Please sign in to your account </p>
<br><br>
        <label for="email" style="font-weight: 500;">Email Address*</label>
        <input type="text" placeholder="Email Address" name="email" id="email" required>

        <label for="password" style="font-weight: 500;">Password *</label>
        <input type="password" placeholder="Password" name="password" id="password" required>
        <a href="reset-password-email.blade.php" style="color: #0CB4BF; text-decoration: none; font-weight: 500; width: max-content; float: right"><p class="paragraph-btn">Forgot Password?</p></a>
<br><br>
      <button type="submit" class="registerbtn">Login</button>

  </div>


      
  <div class="container signin">
    <p>Not a member yet? <a href="register.blade.php" style="color: #0CB4BF; text-decoration: none; font-weight: 500;">Sign up here</a>.</p>
    <br/>
      <a href="landing-page.blade.php" style="text-decoration: underline; color:#000;">Go Back to Home Page</a>
  </div>

</form>





</body>
</html>