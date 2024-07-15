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






<div class="register-container">
    <h1>Reset Password</h1>
    <p>New Password Set!</p>

    <br><br>

    <br><br>
    <a href="landing-page.blade.php"><button class="registerbtn">Go Back</button></a>
    <br/><br/>


</div>








</body>
</html>