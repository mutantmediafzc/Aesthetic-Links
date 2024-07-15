
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...

?>
<?php require_once 'server.blade.php';?>


<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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

        input[type=email] {
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

        input[type=text]:focus, input[type=email]:focus {
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

        .success-message {
            color: green;
            font-weight: bold;
        }

        .danger-message {
            color: red;
            font-weight: bold;
        }
    </style>
    
    

 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
<!-- End Google Tag Manager -->



</head>
<body>
   

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




<form id="resetPasswordForm">

    <div class="register-container">
        <h1>Reset Password</h1>
        <p>Please enter the registered email for us to validate your account</p>

        <br><br>

        <label for="email" style="font-weight: 500;">Enter the registered email</label>
        <input type="email" placeholder="Registered Email" name="email" id="email"  >

        <br><br>
        <button type="submit" class="registerbtn">Send Email</button>
        <br/><br/>
        <a href="landing-page.blade.php" style="text-decoration: none;">Go Back </a>

    </div>


</form>




<script>
    $(document).ready(function() {
        $('#resetPasswordForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'reset-pass-email.php',
                data: formData,
                success: function(response, status, xhr) {
                    if(xhr.status == 200 && response == 'Email sent successfully!') {
                        if ($('.success-message').length === 0) {
                            var successMessage = $('<p>').text('Email sent successfully. Please check your inbox.');
                            successMessage.addClass('success-message');
                            $('.register-container').prepend(successMessage);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status == 400 && xhr.responseText == 'Email not found') {
                        if ($('.danger-message').length === 0) {
                            var dangerMessage = $('<p>').text('Email not found. Please check if you entered the correct email.');
                            dangerMessage.addClass('danger-message');
                            $('.register-container').prepend(dangerMessage);
                        }
                    } else {
                        if ($('.danger-message').length === 0) {
                            var dangerMessage = $('<p>').text('There\'s a problem with the site. Please try again later.');
                            dangerMessage.addClass('danger-message');
                            $('.register-container').prepend(dangerMessage);
                        }
                    }
                }
            });
        });
    });
</script>

</body>
</html>
