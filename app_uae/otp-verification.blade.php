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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<form action="authenticate.php" method="POST">

  <div class="register-container">
    <h1>Mobile Verification</h1>
      <p>Enter the verification code we sent you on:<br> XXX XXX XXXX</p>
      
        <div class="container">
            <div id="inputs" class="inputs">
                <input class="input" type="text"
                    inputmode="numeric" maxlength="1" />
                <input class="input" type="text"
                    inputmode="numeric" maxlength="1" />
                <input class="input" type="text"
                    inputmode="numeric" maxlength="1" />
                <input class="input" type="text"
                    inputmode="numeric" maxlength="1" />
            </div>
        </div>
        
        <button type="submit" class="registerbtn">Verify</button>
        
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
