<?php
session_start();
require_once 'server-connect.php';

?>


<!--- Fetch User Details ----->

<?php

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
$stmt->fetch();
$stmt->close();

$userlevel = max(0, min(8000, $userlevel));
$percentage = ($userlevel / 8000) * 100;

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
<!-- End Google Tag Manager -->
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 15%;
    }

    .profile-details {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 15%;
        padding-bottom: 5%;
        background-color: #0CB4BF;
    }

    .profile-container {
        width: 90%;
        height: 100%;
    }

    .back {
        position: absolute;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 2px solid #fff;
        background-color: transparent;
    }

    .profile-details-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        width: 100%;
        height: auto;
    }

    .profile-img {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
    }

    .name-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .progress-bar {
        width: 75%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 90% 10%);
        column-gap: 4%;
        margin: auto;

    }

    .progress {
        background: rgba(255, 255, 255, 1);
        justify-content: flex-start;
        border-radius: 100px;
        align-items: center;
        position: relative;
        padding: 0 5px;
        display: flex;
        height: 30px;
        width: 100%;
        margin: auto;
    }

    .progress-value {
        animation: load 3s normal forwards;
        border-radius: 100px;
        background: #0CB4BF;
        height: 20px;
        width: <?php echo $percentage; ?>;
    }

    @keyframes load {
        0% { width: 0; }
        100% { width: <?php echo $percentage; ?>%; }
    }


    .diamond {
        width: 40px;
        height: 40px;
        background-color: #fff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* -----------------------------section 2--------------------------------- */

    .profile-dashboard {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
    }

    .your-account {
        width: 90%;
        height: auto;
        margin-top: 50px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 10px;
    }

    .button-your-account {
        width: 100%;
        height: auto;
    }

    .button-your-account button {
        display: grid;
        grid-template-columns: repeat(2, 90% 10%);
        width: 100%;
        height: 100px;
        border-style: none;
        background-color: transparent;
        border-bottom: 1px solid #c1c1c1;
        font-size: 36px;
        color: #000;
        margin: auto;

    }

    .back a {
        width: 100%;
        text-decoration: none;
        color: #000;
        cursor: pointer;
    }

    .back a i {
        color: #fff;
        font-size: 28px;
    }

    .profile-details-box {
        display: flex;
        justify-content: center;
    }

    .profile-details-box h3 {
        margin: 0;
        padding: 0;
        color: #fff;
        font-size: 34px;
        font-weight: 500;
    }

    .profile-img-box {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    .name-container h2 {
        margin: 0;
        padding: 0;
        color: #fff;
        font-size: 38px;
        font-weight: 500;
        margin-top: 20px;
    }

    .user-level-box {
        display: flex;
        justify-content: center;
    }

    .user-level-box p {
        margin: 0;
        padding: 0;
        font-size: 24px;
        color: #fff;
    }

    .diamond i {
        color: #0CB4BF;
        font-size: 24px;
    }

    .progress-description {
        display: flex;
        justify-content: center;
    }

    .progress-description p {
        margin: 0;
        padding: 0;
        font-size: 24px;
        color: #fff;
    }

    .title-box {
        width: 100%;
        height: auto;
    }

    .title-box h1 {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 48px;
        font-weight: 600;
    }

    .btn-img-box {
        width: 100%;
        height: 100%;
    }

    .btn-img-box img {
        width: 45px;
        height: 45px;
    }

    .button-your-account button i {
        margin: auto;
        color: #0CB4BF;
    }

    .btn-text-box {
        width: 100%;
        height: max-content;
        margin: 0;
        padding: 0;
        font-size: 36px;
    }

    .btn-text-box p {
        text-align: left;
        font-size 16px;
        margin: 0;
        font-weight: 300;
    }

    .logout-btn {
        color: #0C1E36 !important;
    }

    .delete-btn {
        color: red;
    }

    .icon-svg-btn {
        width: 100%;
        height: 100%;
    }

    .icon-svg-btn i {
        font-size: 38px;
        color: #0CB4BF;
    }

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .back {
            position: absolute;
            width: 30pt;
            height: 30pt;
            border-radius: 50%;
            border: 2px solid #fff;
            background-color: transparent;
        }

        .back a {
            width: 100%;
            text-decoration: none;
            color: #000;
            cursor: pointer;
        }

        .back a i {
            color: #fff;
            font-size: 18px;
        }

        /*-------------------------------*/

        .profile-details-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            width: 100%;
            height: auto;
        }

        .profile-details-box h3 {
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
        }

        .profile-img-box {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .name-container h2 {
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            margin-top: 10px;
        }

        .user-level-box p {
            margin: 0;
            padding: 0;
            font-size: 14px;
            color: #fff;
        }

        .progress-bar {
            width: 75%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(2, 90% 9%);
            column-gap: 4%;
            margin: auto;

        }

        .progress {
            background: rgba(255, 255, 255, 1);
            justify-content: flex-start;
            border-radius: 100px;
            align-items: center;
            position: relative;
            padding: 0 5px;
            display: flex;
            height: 15px;
            width: 100%;
            margin: auto;
        }

        .progress-value {
            animation: load 3s normal forwards;
            border-radius: 100px;
            background: #0CB4BF;
            height: 8px;
            width: 0;
        }

        .diamond {
            width: 20px;
            height: 20px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .diamond i {
            color: #0CB4BF;
            font-size: 10px;
        }

        .progress-description p {
            margin: 0;
            padding: 0;
            font-size: 12px;
            color: #fff;
        }

        .title-box {
            width: 100%;
            height: auto;
        }

        .title-box h1 {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 20px;
            font-weight: 600;
        }

        .button-your-account button {
            display: grid;
            grid-template-columns: repeat(2, 90% 10%);
            width: 100%;
            height: 50px;
            border-style: none;
            background-color: transparent;
            border-bottom: 1px solid #c1c1c1;
            font-size: 36px;
            color: #000;
            margin: auto;
            padding: 0;
        }

        .btn-img-box img {
            width: 20px;
            height: 20px;
        }

        .button-your-account button i {
            margin: auto;
            color: #0CB4BF;
            font-size: 18px;
        }

        .btn-text-box p {
            text-align: left;
            font-size 18px;
            margin: 0;
            font-weight: 300;
        }

        .btn-text-box {
            width: 100%;
            height: max-content;
            margin: auto;
            padding: 0;
            font-size: 18px;
        }

        .icon-svg-btn i {
            font-size: 18px;
            color: #0CB4BF;
            margin-bottom: 20px !important;
        }
    }

    @media only screen and (max-device-width: 767px) {

        .back {
            position: absolute;
            width: 30pt;
            height: 30pt;
            border-radius: 50%;
            border: 2px solid #fff;
            background-color: transparent;
        }

        .back a {
            width: 100%;
            text-decoration: none;
            color: #000;
            cursor: pointer;
        }

        .back a i {
            color: #fff;
            font-size: 18px;
        }

        /*-------------------------------*/

        .profile-details-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            width: 100%;
            height: auto;
        }

        .profile-details-box h3 {
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
        }

        .profile-img-box {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .name-container h2 {
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            margin-top: 10px;
        }

        .user-level-box p {
            margin: 0;
            padding: 0;
            font-size: 14px;
            color: #fff;
        }

        .progress-bar {
            width: 75%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(2, 90% 9%);
            column-gap: 4%;
            margin: auto;

        }

        .progress {
            background: rgba(255, 255, 255, 1);
            justify-content: flex-start;
            border-radius: 100px;
            align-items: center;
            position: relative;
            padding: 0 5px;
            display: flex;
            height: 15px;
            width: 100%;
            margin: auto;
        }

        .progress-value {
            animation: load 3s normal forwards;
            border-radius: 100px;
            background: #0CB4BF;
            height: 8px;
            width: 0;
        }

        .diamond {
            width: 20px;
            height: 20px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .diamond i {
            color: #0CB4BF;
            font-size: 10px;
        }

        .progress-description p {
            margin: 0;
            padding: 0;
            font-size: 12px;
            color: #fff;
        }

        .title-box {
            width: 100%;
            height: auto;
        }

        .title-box h1 {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 20px;
            font-weight: 600;
        }

        .button-your-account button {
            display: grid;
            grid-template-columns: repeat(2, 90% 10%);
            width: 100%;
            height: 50px;
            border-style: none;
            background-color: transparent;
            border-bottom: 1px solid #c1c1c1;
            font-size: 36px;
            color: #000;
            margin: auto;
            padding: 0;
        }

        .btn-img-box img {
            width: 20px;
            height: 20px;
        }

        .button-your-account button i {
            margin: auto;
            color: #0CB4BF;
            font-size: 18px;
        }

        .btn-text-box p {
            text-align: left;
            font-size 18px;
            margin: 0;
            font-weight: 300;
        }

        .btn-text-box {
            width: 100%;
            height: max-content;
            margin: auto;
            padding: 0;
            font-size: 18px;
        }

        .icon-svg-btn i {
            font-size: 18px;
            color: #0CB4BF;
            margin-bottom: 20px !important;
        }
    }

    /* Currency */
    .currency-list {
        list-style-type: none;
        padding: 0;
    }

    .currency-item {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ccc;
        padding: 20px 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .currency-icon {
        width: 30px;
        height: 30px;
        margin-right: 10px;
        /* border-radius: 50%; */
    }

    .currency-name {
        font-size: 14pt;
        color: #212121;
        transition: color 0.3s ease-in-out;
    }

    .active-currency {
        background-color: #0CB4BF;
        color: #fff;
    }

    .active-currency .currency-name {
        font-weight: bold;
        color: #fff;
    }
</style>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <?php include 'profile-details.php' ?>

    <section class="profile-dashboard">
        <div class="your-account">
            <div class="title-box">
                <h1>Available Currencies</h1>
            </div>

            <!-- <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin: auto;">
                        <div class="btn-text-box"><p>USD</p></div>
                    </div>
                    
                    

                </button>
            </div> -->
            <?php

            if (isset ($_SESSION['id'])) {
                $userId = $_SESSION['id'];
                $stmt = $con->prepare('SELECT currency FROM user_currency WHERE user_id = ? ORDER BY created_at DESC LIMIT 1');
                $stmt->bind_param('i', $userId);
                $stmt->execute();
                $stmt->bind_result($selectedCurrency);
                $stmt->fetch();
            } else {
                $selectedCurrency = null;
            }
            ?>

            <div id="preloader" style="text-align:center;padding:30px 0; display:none;">
                <i class="fas fa-spinner fa-spin"></i> Loading...
            </div>
            <ul class="currency-list">
                <li class="currency-item <?php echo ($selectedCurrency == 'USD') ? 'active-currency' : ''; ?>"
                    data-currency="USD">
                    <svg xmlns="http://www.w3.org/2000/svg" class="currency-icon" viewBox="0 0 32 32">
                        <rect x="1" y="4" width="30" height="24" rx="4" ry="4" fill="#fff"></rect>
                        <path
                            d="M1.638,5.846H30.362c-.711-1.108-1.947-1.846-3.362-1.846H5c-1.414,0-2.65,.738-3.362,1.846Z"
                            fill="#a62842"></path>
                        <path
                            d="M2.03,7.692c-.008,.103-.03,.202-.03,.308v1.539H31v-1.539c0-.105-.022-.204-.03-.308H2.03Z"
                            fill="#a62842"></path>
                        <path fill="#a62842" d="M2 11.385H31V13.231H2z"></path>
                        <path fill="#a62842" d="M2 15.077H31V16.923000000000002H2z"></path>
                        <path fill="#a62842" d="M1 18.769H31V20.615H1z"></path>
                        <path d="M1,24c0,.105,.023,.204,.031,.308H30.969c.008-.103,.031-.202,.031-.308v-1.539H1v1.539Z"
                            fill="#a62842"></path>
                        <path
                            d="M30.362,26.154H1.638c.711,1.108,1.947,1.846,3.362,1.846H27c1.414,0,2.65-.738,3.362-1.846Z"
                            fill="#a62842"></path>
                        <path d="M5,4h11v12.923H1V8c0-2.208,1.792-4,4-4Z" fill="#102d5e"></path>
                        <path
                            d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                            opacity=".15"></path>
                        <path
                            d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                            fill="#fff" opacity=".2"></path>
                        <path fill="#fff"
                            d="M4.601 7.463L5.193 7.033 4.462 7.033 4.236 6.338 4.01 7.033 3.279 7.033 3.87 7.463 3.644 8.158 4.236 7.729 4.827 8.158 4.601 7.463z">
                        </path>
                        <path fill="#fff"
                            d="M7.58 7.463L8.172 7.033 7.441 7.033 7.215 6.338 6.989 7.033 6.258 7.033 6.849 7.463 6.623 8.158 7.215 7.729 7.806 8.158 7.58 7.463z">
                        </path>
                        <path fill="#fff"
                            d="M10.56 7.463L11.151 7.033 10.42 7.033 10.194 6.338 9.968 7.033 9.237 7.033 9.828 7.463 9.603 8.158 10.194 7.729 10.785 8.158 10.56 7.463z">
                        </path>
                        <path fill="#fff"
                            d="M6.066 9.283L6.658 8.854 5.927 8.854 5.701 8.158 5.475 8.854 4.744 8.854 5.335 9.283 5.109 9.979 5.701 9.549 6.292 9.979 6.066 9.283z">
                        </path>
                        <path fill="#fff"
                            d="M9.046 9.283L9.637 8.854 8.906 8.854 8.68 8.158 8.454 8.854 7.723 8.854 8.314 9.283 8.089 9.979 8.68 9.549 9.271 9.979 9.046 9.283z">
                        </path>
                        <path fill="#fff"
                            d="M12.025 9.283L12.616 8.854 11.885 8.854 11.659 8.158 11.433 8.854 10.702 8.854 11.294 9.283 11.068 9.979 11.659 9.549 12.251 9.979 12.025 9.283z">
                        </path>
                        <path fill="#fff"
                            d="M6.066 12.924L6.658 12.494 5.927 12.494 5.701 11.799 5.475 12.494 4.744 12.494 5.335 12.924 5.109 13.619 5.701 13.19 6.292 13.619 6.066 12.924z">
                        </path>
                        <path fill="#fff"
                            d="M9.046 12.924L9.637 12.494 8.906 12.494 8.68 11.799 8.454 12.494 7.723 12.494 8.314 12.924 8.089 13.619 8.68 13.19 9.271 13.619 9.046 12.924z">
                        </path>
                        <path fill="#fff"
                            d="M12.025 12.924L12.616 12.494 11.885 12.494 11.659 11.799 11.433 12.494 10.702 12.494 11.294 12.924 11.068 13.619 11.659 13.19 12.251 13.619 12.025 12.924z">
                        </path>
                        <path fill="#fff"
                            d="M13.539 7.463L14.13 7.033 13.399 7.033 13.173 6.338 12.947 7.033 12.216 7.033 12.808 7.463 12.582 8.158 13.173 7.729 13.765 8.158 13.539 7.463z">
                        </path>
                        <path fill="#fff"
                            d="M4.601 11.104L5.193 10.674 4.462 10.674 4.236 9.979 4.01 10.674 3.279 10.674 3.87 11.104 3.644 11.799 4.236 11.369 4.827 11.799 4.601 11.104z">
                        </path>
                        <path fill="#fff"
                            d="M7.58 11.104L8.172 10.674 7.441 10.674 7.215 9.979 6.989 10.674 6.258 10.674 6.849 11.104 6.623 11.799 7.215 11.369 7.806 11.799 7.58 11.104z">
                        </path>
                        <path fill="#fff"
                            d="M10.56 11.104L11.151 10.674 10.42 10.674 10.194 9.979 9.968 10.674 9.237 10.674 9.828 11.104 9.603 11.799 10.194 11.369 10.785 11.799 10.56 11.104z">
                        </path>
                        <path fill="#fff"
                            d="M13.539 11.104L14.13 10.674 13.399 10.674 13.173 9.979 12.947 10.674 12.216 10.674 12.808 11.104 12.582 11.799 13.173 11.369 13.765 11.799 13.539 11.104z">
                        </path>
                        <path fill="#fff"
                            d="M4.601 14.744L5.193 14.315 4.462 14.315 4.236 13.619 4.01 14.315 3.279 14.315 3.87 14.744 3.644 15.44 4.236 15.01 4.827 15.44 4.601 14.744z">
                        </path>
                        <path fill="#fff"
                            d="M7.58 14.744L8.172 14.315 7.441 14.315 7.215 13.619 6.989 14.315 6.258 14.315 6.849 14.744 6.623 15.44 7.215 15.01 7.806 15.44 7.58 14.744z">
                        </path>
                        <path fill="#fff"
                            d="M10.56 14.744L11.151 14.315 10.42 14.315 10.194 13.619 9.968 14.315 9.237 14.315 9.828 14.744 9.603 15.44 10.194 15.01 10.785 15.44 10.56 14.744z">
                        </path>
                        <path fill="#fff"
                            d="M13.539 14.744L14.13 14.315 13.399 14.315 13.173 13.619 12.947 14.315 12.216 14.315 12.808 14.744 12.582 15.44 13.173 15.01 13.765 15.44 13.539 14.744z">
                        </path>
                    </svg>
                    <span class="currency-name">USD - United States Dollar</span>
                </li>
                <li class="currency-item <?php echo ($selectedCurrency == 'CHF') ? 'active-currency' : ''; ?>"
                    data-currency="CHF">
                    <svg xmlns="http://www.w3.org/2000/svg" class="currency-icon" viewBox="0 0 32 32">
                        <rect x="1" y="4" width="30" height="24" rx="4" ry="4" fill="#c93927"></rect>
                        <path
                            d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                            opacity=".15"></path>
                        <path
                            d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                            fill="#fff" opacity=".2"></path>
                        <path fill="#fff" d="M14 10H18V22H14z"></path>
                        <path transform="rotate(90 16 16)" fill="#fff" d="M14 10H18V22H14z"></path>
                    </svg>
                    <span class="currency-name">CHF - Swiss Franc</span>
                </li>
                <li class="currency-item <?php echo ($selectedCurrency == 'AED') ? 'active-currency' : ''; ?>"
                    data-currency="AED">
                    <svg xmlns="http://www.w3.org/2000/svg" class="currency-icon" viewBox="0 0 32 32">
                        <path d="M5,4h6V28H5c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z" fill="#ea3323"></path>
                        <path d="M10,20v8H27c2.209,0,4-1.791,4-4v-4H10Z"></path>
                        <path fill="#fff" d="M10 11H31V21H10z"></path>
                        <path d="M27,4H10V12H31v-4c0-2.209-1.791-4-4-4Z" fill="#317234"></path>
                        <path
                            d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                            opacity=".15"></path>
                        <path
                            d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                            fill="#fff" opacity=".2"></path>
                    </svg>
                    <span class="currency-name">AED - United Arab Emirates Dirham</span>
                </li>
                <li class="currency-item <?php echo ($selectedCurrency == 'EUR') ? 'active-currency' : ''; ?>"
                    data-currency="EUR">
                    <svg xmlns="http://www.w3.org/2000/svg" class="currency-icon" viewBox="0 0 32 32">
                        <rect x="1" y="4" width="30" height="24" rx="4" ry="4" fill="#112f95"></rect>
                        <path
                            d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                            opacity=".15"></path>
                        <path fill="#f6cd46"
                            d="M16 8.167L15.745 8.951 14.921 8.951 15.588 9.435 15.333 10.219 16 9.735 16.667 10.219 16.412 9.435 17.079 8.951 16.255 8.951 16 8.167z">
                        </path>
                        <path fill="#f6cd46"
                            d="M16.255 22.565L16 21.781 15.745 22.565 14.921 22.565 15.588 23.049 15.333 23.833 16 23.349 16.667 23.833 16.412 23.049 17.079 22.565 16.255 22.565z">
                        </path>
                        <path fill="#f6cd46"
                            d="M9.193 16.542L9.86 17.026 9.605 16.242 10.272 15.758 9.448 15.758 9.193 14.974 8.938 15.758 8.114 15.758 8.781 16.242 8.526 17.026 9.193 16.542z">
                        </path>
                        <path fill="#f6cd46"
                            d="M12.596 9.079L12.342 9.863 11.517 9.863 12.184 10.347 11.93 11.131 12.596 10.647 13.263 11.131 13.009 10.347 13.675 9.863 12.851 9.863 12.596 9.079z">
                        </path>
                        <path fill="#f6cd46"
                            d="M10.105 11.57L9.85 12.354 9.026 12.354 9.693 12.839 9.438 13.623 10.105 13.138 10.772 13.623 10.517 12.839 11.184 12.354 10.36 12.354 10.105 11.57z">
                        </path>
                        <path fill="#f6cd46"
                            d="M10.36 19.161L10.105 18.377 9.85 19.161 9.026 19.161 9.693 19.646 9.438 20.43 10.105 19.945 10.772 20.43 10.517 19.646 11.184 19.161 10.36 19.161z">
                        </path>
                        <path fill="#f6cd46"
                            d="M12.851 21.653L12.596 20.869 12.342 21.653 11.517 21.653 12.184 22.137 11.93 22.921 12.596 22.437 13.263 22.921 13.009 22.137 13.675 21.653 12.851 21.653z">
                        </path>
                        <path fill="#f6cd46"
                            d="M23.886 15.758L23.062 15.758 22.807 14.974 22.552 15.758 21.728 15.758 22.395 16.242 22.14 17.026 22.807 16.542 23.474 17.026 23.219 16.242 23.886 15.758z">
                        </path>
                        <path fill="#f6cd46"
                            d="M19.404 9.079L19.149 9.863 18.325 9.863 18.991 10.347 18.737 11.131 19.404 10.647 20.07 11.131 19.816 10.347 20.483 9.863 19.658 9.863 19.404 9.079z">
                        </path>
                        <path fill="#f6cd46"
                            d="M21.483 12.839L21.228 13.623 21.895 13.138 22.562 13.623 22.307 12.839 22.974 12.354 22.15 12.354 21.895 11.57 21.64 12.354 20.816 12.354 21.483 12.839z">
                        </path>
                        <path fill="#f6cd46"
                            d="M22.15 19.161L21.895 18.377 21.64 19.161 20.816 19.161 21.483 19.646 21.228 20.43 21.895 19.945 22.562 20.43 22.307 19.646 22.974 19.161 22.15 19.161z">
                        </path>
                        <path fill="#f6cd46"
                            d="M19.658 21.653L19.404 20.869 19.149 21.653 18.325 21.653 18.991 22.137 18.737 22.921 19.404 22.437 20.07 22.921 19.816 22.137 20.483 21.653 19.658 21.653z">
                        </path>
                        <path
                            d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                            fill="#fff" opacity=".2"></path>
                    </svg>
                    <span class="currency-name">EUR - Euro</span>
                </li>
            </ul>


            <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->


            <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->


            <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->

        </div>
    </section>

    <script>
        function copyText() {

            /* Copy text into clipboard */
            navigator.clipboard.writeText
                ("<?= $profilelevel ?>");
        }

        // Ajax
        document.querySelectorAll('.currency-item').forEach(item => {
            item.addEventListener('click', function () {
                const currencyCode = this.getAttribute('data-currency');
                const preloader = document.getElementById('preloader');
                const currencyItems = document.querySelectorAll('.currency-item');

                // Show preloader
                preloader.style.display = 'block';

                // Remove active state from all currencies before sending the request
                currencyItems.forEach(currency => currency.classList.remove('active-currency'));

                fetch('saveCurrency.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `currency=${currencyCode}`
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        preloader.style.display = 'none';

                        if (data.success) {
                            item.classList.add('active-currency');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        preloader.style.display = 'none';
                    });
            });
        });




    </script>



</body>

</html>