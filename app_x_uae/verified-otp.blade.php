<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

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
        width: 100%;
        margin: 0;
        background-color: white;
        margin-top: 20vw;
    }

    .register-container h1 {
        margin: 0;
        font-size: 28px;
        margin-bottom: 10px;
        text-align: center;
    }

    .register-container p {
        margin: 0;
        font-size: 14px;
        margin-bottom: 10px;
        text-align: center;
    }
    
    
    
    /* Set a style for the submit button */
    .registerbtn {
        background-color: #0C1E36;
        font-family: "Poppins", sans-serif;
        height: 45px;
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
    
    /*--------------------------------------*/
    
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: max-content;
        margin-bottom: 15vw;
    }
     
    .input {
        width: 45px;
        height: 45px;
        border: 1px solid #e3e3e3;
        border-radius: 14px;
        margin: 0 10px;
        text-align: center;
        font-size: 18px;
        cursor: not-allowed;
        pointer-events: none;
    }
     
    .input:focus {
        border: 1px solid #666;
        outline: none;
    }
     
    .input:nth-child(1) {
        cursor: pointer;
        pointer-events: all;
    }
    
</style>
<body>

<form action="verified-otp-post.blade.php" method="POST">
        <?php
        session_start();
        
        // Check if an error message is set
        if (isset($_SESSION['error_message'])) {
            // Display the error message
            echo "<p style='color:red' >Error: " . $_SESSION['error_message'] . "</p>";
        
            // Clear the error message to show it only once
            unset($_SESSION['error_message']);
        }
        ?>
  <div class="register-container">
    <h1>Mobile Verification</h1>
      <p>Enter the verification code we sent you on:<br> XXX XXX XXXX</p>
      
        <div class="container">
            <div id="inputs" class="inputs">
                <input class="input" name="code1" type="text"
                    inputmode="numeric"  maxlength="1" />
                <input class="input" name="code2" type="text"
                    inputmode="numeric" maxlength="1" />
                <input class="input" name="code3" type="text"
                    inputmode="numeric" maxlength="1" />
                <input class="input" name="code4" type="text"
                    inputmode="numeric" maxlength="1" />
            </div>
        </div>
        <input type="hidden" name="mobile" value="<?=$_GET['m']?>">

        <button type="submit" class="registerbtn">Verify</button>
        
    </div>
    
  <div class="container signin">
    <p><a href="resend-otp.blade.php?m=<?=$_GET['m']?>" style="color: #0CB4BF; text-decoration: none; font-weight: 500;">resend OTP</a>.</p>
  </div>
</form>



<script>
    // script.js
const inputs = document.getElementById("inputs");

inputs.addEventListener("input", function (e) {
	const target = e.target;
	const val = target.value;

	if (isNaN(val)) {
		target.value = "";
		return;
	}

	if (val != "") {
		const next = target.nextElementSibling;
		if (next) {
			next.focus();
		}
	}
});

inputs.addEventListener("keyup", function (e) {
	const target = e.target;
	const key = e.key.toLowerCase();

	if (key == "backspace" || key == "delete") {
		target.value = "";
		const prev = target.previousElementSibling;
		if (prev) {
			prev.focus();
		}
		return;
	}
});

</script>

</body>
</html>
