
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>

<form id="resetPasswordForm">

    <div class="register-container">
        <h1>Reset Password</h1>
        <p>Please enter a new password</p>

        <br><br>

        <label for="password" style="font-weight: 500;">Enter new password</label>
        <input type="password" placeholder="Enter a new password" name="password" id="password" required>

        <br><br>
        <button type="submit" class="registerbtn">Change Password</button>
        <br/><br/>
            <a href="landing-page.blade.php" style="text-decoration: none;">Go Back </a>

    </div>


</form>

<script>
    $(document).ready(function() {
        $('#resetPasswordForm').submit(function(event) {
            event.preventDefault();

            var urlParams = new URLSearchParams(window.location.search);

            $.ajax({
                type: 'POST',
                url: 'validate-token.php',
                data: {
                    token : urlParams.get('token'),
                    password  : $('#password').val()
                },
                success: function(response, status, xhr) {
                    if(response == 'Password successfully reset.' && xhr.status == 200) {
                        window.location.href = 'reset-password-success.blade.php';
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>




</body>
</html>
