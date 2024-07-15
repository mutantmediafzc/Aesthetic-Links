<?php
require_once 'server-connect.php';

$stmt = "SELECT mobile_code, abbrev, country FROM country_code";
$result = $con->query($stmt);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        line-height: 1.7;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Add padding to containers */
    .register-container {
        width: 90%;
        margin: auto;
        background-color: white;
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
  width: 100%;
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
  padding: 0;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #fff;
  border: 1px solid #ccc;
  outline: none;
}
/*Mobile number  */
input[type=text], input[type=number], input[type=email] {
  width: 100%;
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



input[type=text]:focus, input[type=number]:focus, input[type=email]:focus {
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

.select-code {
    width: 100%;
    margin: 5px 0 22px 0;
    display: inline-block;
    height: 40pt;
    border: none;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-family: "Poppins", sans-serif;
    font-size: 16px;
    text-indent: 14px;

    background: url("data:image/svg+xml,<svg height='10px' width='10px' viewBox='0 0 16 16' fill='%23000000' xmlns='http://www.w3.org/2000/svg'><path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/></svg>") no-repeat;
    background-position: calc(100% - 0.75rem) center !important;
    -moz-appearance:none !important;
    -webkit-appearance: none !important;
    appearance: none !important;
    padding-right: 2rem !important;
}

.select-code:focus {
    outline: none;
}

.option-mobile-code {
    color: #212121;
}
</style>
</head>

<?php require_once 'server.blade.php';?>


<body>

<form action="register-user.blade.php" method="POST" style="padding-top: 100px;">

  <div class="register-container">
        <?php

  // Check if an error message is set
  if (isset($_SESSION['error_message'])) {
      // Display the error message
      echo "<p style='color:red;' >Error: " . $_SESSION['error_message'] . "</p><br><br>";

      // Clear the error message to show it only once
      unset($_SESSION['error_message']);
  }
  ?>
    <h1 style="margin-top: -60px;">Getting started!</h1>
    <p style="margin-top:-10px;">Create an account to start your journey</p>
    <p style="font-size: 12pt; color: #444444; margin-top: -5px;"> Please fill all the (*)</p>

    <div style="width: 100%; display: grid; grid-template-columns: repeat(1, 1fr); height: max-content;">
        <div>
            <label for="name" style="font-weight: 500;">Full Name *</label>
            <input type="text" placeholder="John Doe" name="username" id="name" required>
        </div>
        <div>
            <label for="email" style="font-weight: 500;">Email *</label>
            <input style="float: left;" type="email" placeholder="johndoe@gmail.com" name="email" id="email" required>
        </div>
        <div>
            <label for="psw" style="font-weight: 500;">Password *</label>
            <input style="float: left;" type="password" placeholder="Password" name="password" id="password" required>
            <a onclick="myFunction()" style="margin-top:-58px; margin-right: 20px; float:right; z-index: 1000;"><img src="assets/images/password-reveal.svg" height="20px" width="20px"></a>
        </div>
        <div>
            <label for="mbl" style="font-weight: 500;">Mobile * <span style="font-size:12px; color:#6f6f6f"><i>Country Code & Mobile - without (+)</i></span></label>
            <div style="display: grid; grid-template-columns: repeat(2, 63% 34%); column-gap: 3%">
                <div style="width: 100%">
                    <select class="select-code" name="mobile_code" id="countrySelect">
                        <?php 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                                    <option value="<?= $row['mobile_code'] ?>"><?= $row['country'] . " ({$row['mobile_code']})" ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div style="width: 100%">
                    <input type="number" id="phone"  placeholder="505005050" name="mobile" id="mobile" style="width: 100%; padding: 0;" required>
                </div>

            </div>
        </div>

        <div>
            <label for="rfr" style="font-weight: 500;">Referral Code (Optional)</label>
            <input type="text" placeholder="Enter a Referral Code" name="referral" id="referral">
        </div>

    </div>








        <!--<input type="number" id="phone" oninput="validatePhoneNumber(this)" placeholder="Example: 971505005050" name="mobile" id="mobile" required>-->



	  	<input type="hidden" name="userlevel" value="1">
	  <input type="hidden" name="profilelevel" value="0">

        <p style="font-size: 12px; width: 100%; text-align: center; font-weight: 500; margin-bottom: 20px; margin-top: 0px">By signing up I agree with <a href="register-legal-terms-and-conditions.blade.php" style="color: #0CB4BF; text-decoration: none;">Terms of Service</a> and <a href="register-legal-privacy-policy.blade.php" style="color: #0CB4BF; text-decoration: none;">Privacy Policy</a>.</p>

      <button style="margin-top:-40px;" type="submit" class="registerbtn">Register</button>

  </div>



  <div class="container signin">
    <p>Already a member? <a href="login.blade.php" style="color: #0CB4BF; text-decoration: none; font-weight: 500;">Login</a>.</p>
  </div>
</form>

<script>
  // function validatePhoneNumber(input) {
  //     const phoneNumber = input.value.trim();

  //     // Check if the input starts with "971"
  //     if (!phoneNumber.startsWith("971")) {
  //         // If not, add "971" to the beginning of the input
  //         input.value = "971" + phoneNumber;
  //     }
  // }
  </script>
  <script>
    //   fetch('https://restcountries.com/v2/all')
    //     .then(response => response.json())
    //     .then(data => {
    //         const countrySelect = document.getElementById('countrySelect');
    //         data.forEach(country => {
    //             const option = document.createElement('option');
    //             option.value = country.callingCodes[0]; // Use alpha2Code as the value
    //             option.textContent = country.name+' ('+country.callingCodes[0]+')';
    //             countrySelect.appendChild(option);
    //         });
    //     })
    //     .catch(error => console.error('Error fetching countries:', error));
    </script>

    <script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";
        }
    }

    </script>
</body>
</html>
