<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>

<form action="{{ route('register')}}" method="POST">
  @csrf
  <div class="register-container">
    <h1>Getting started!</h1>
      <p>Create an account to start searching for the event you're looking for</p>
      <p style="font-size: 10px; color: #444444;"> Please fill all the (*)</p>

      <label for="name" style="font-weight: 500;">Name *</label>
        <input type="text" placeholder="Name" name="name" id="name" required>

        <label for="email" style="font-weight: 500;">Email *</label>
        <input type="text" placeholder="Email" name="email" id="email" required>

        <label for="psw" style="font-weight: 500;">Password *</label>
        <input type="password" placeholder="Password" name="psw" id="password" required>

        <p style="font-size: 12px; width: 100%; text-align: center; font-weight: 500; margin-bottom: 40px; margin-top: 20px">By signing up I agree with <a href="#" style="color: #0CB4BF; text-decoration: none;">Terms of Service</a> and <a href="#" style="color: #0CB4BF; text-decoration: none;">Privacy Policy</a>.</p>

      <button type="submit" class="registerbtn">Register</button>

  </div>

  @if(Session::has('success'))
      <p>{{Session::get('success')}}</p>
      @endif
      
  <div class="container signin">
    <p>Already a member? <a href="#" style="color: #0CB4BF; text-decoration: none; font-weight: 500;">Login</a>.</p>
  </div>
</form>



</body>
</html>
