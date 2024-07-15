<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...

?>
<?php

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.blade.php');
    exit;
}
?>
<?php require_once 'server.blade.php';?>


<!--- Fetch User Details ----->

<?php

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel, referral_count, id FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel, $referralCount, $accountId);
$stmt->fetch();
$stmt->close();

$userlevel = max(0, min(8000, $userlevel));
$percentage = ($userlevel / 8000) * 100;

$referralCount = max(0, min(20, $referralCount));
$referralPercentage = ($referralCount / 20) * 100;

if ($referralCount < 5) {
    $referralNeeded = 5 - $referralCount;
    $discount = 5;
} elseif ($referralCount >= 5 && $referralCount < 10) {
    $referralNeeded = 10 - $referralCount;
    $discount = 10;
} elseif ($referralCount >= 10) {
    $referralNeeded = 20 - $referralCount;
    $discount = 20;
}

$referralNeeded == 1 ? $word = "referral" : $word = "referrals"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
    <!-- End Google Tag Manager -->
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<style>

    body {
        margin: 0;
        padding: 0;

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
        background: rgba(255,255,255,1);
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

    .referral-bar {
        width: 75%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 90% 10%);
        column-gap: 4%;
        margin: auto;

    }

    .referral {
        background: rgba(255,255,255,1);
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

    .referral-value {
        animation: referral 3s normal forwards;
        border-radius: 100px;
        background: #0CB4BF;
        height: 20px;
        width: <?php echo $referralPercentage; ?>;
    }

    @keyframes load {
        0% { width: 0; }
        100% { width: <?php echo $percentage; ?>%; }
    }

    @keyframes referral {
        0% { width: 0; }
        100% { width: <?php echo $referralPercentage; ?>%; }
    }


    .diamond {
        width: 40px;
        height: 40px;
        background-color: transparent;
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
    }a

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
        color:#000;
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
        color: #fff;
        font-size: 40px;
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
        display: flex;
        justify-content: space-between;
        width: 100%;
        height: max-content;
        margin: 0;
        padding: 0;
        font-size: 36px;
    }

    .btn-text-box h1{
        text-align: left;
        font-size 16px;
        margin: 0;
        font-weight: 300;
    }

    .btn-text-box p{
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

    hr {
        width: 100%;
        border-style: none;
        border-bottom: 1px solid #e3e3e3;

    }

    .image-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .image-container img {
        height: 55px;
        width: 28px;
        object-fit: cover;
        margin-right: 3px;
    }

    @media only screen
    and (max-device-width: 393px)
    and (max-device-height: 852px)
    and (-webkit-device-pixel-ratio: 3) {
        .image-container img {
            height: 55px;
            width: 23px;
            object-fit: cover;
            margin-right: 6px;
        }
    }

    .image-container img:last-child {
        margin-right: 0;
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
            color:#000;
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
            background: rgba(255,255,255,1);
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
            animation: referral 3s normal forwards;
            border-radius: 100px;
            background: #0CB4BF;
            height: 8px;
            width: 0;
        }

        .diamond {
            width: 20px;
            height: 20px;
            background-color: transparent;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .diamond i {
            color: #fff;
            font-size: 16px;
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

        .btn-text-box h1{
            text-align: left;
            font-size 18px;
            margin: 0;
            font-weight: 300;
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
            color:#000;
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
            background: rgba(255,255,255,1);
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

        .referral-bar {
            width: 75%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(2, 90% 9%);
            column-gap: 4%;
            margin: auto;

        }

        .referral {
            background: rgba(255,255,255,1);
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

        .referral-value {
            animation: referral 3s normal forwards;
            border-radius: 100px;
            background: #0CB4BF;
            height: 8px;
            width: 0;
        }

        .diamond {
            width: 20px;
            height: 20px;
            background-color: transparent;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .diamond i {
            font-size: 16px;
            color: #fff;
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
            font-size: 18px;
            font-weight: 300;
        }

        .btn-text-box {
            width: 100%;
            height: max-content;
            margin: auto;
            padding: 0;
        }

        .icon-svg-btn i {
            font-size: 18px;
            color: #0CB4BF;
            margin-bottom: 20px !important;
        }

        .referral-text {
            font-size: 14px;
        }

        .link-container svg {
            margin-left: 18px;
            color: #fff;
        }

        #share-button {
            font-size: 15px;
        }
    }

    @media only screen and (max-device-width: 320px) {
        .referral-text {
            font-size: 12px;
        }

        .profile-details {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            padding-top: 5%;
            padding-bottom: 5%;
            background-color: #0CB4BF;
        }

        .profile-details-box h3 {
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
        }

        .name-container h2 {
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 18px;
            font-weight: 550;
            margin-top: 10px;
        }

        .name-container h2 {
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 16px;
            font-weight: 550;
            margin-top: 10px;
        }

        .title-box h1 {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 16px;
            font-weight: 600;
        }

        .your-account {
            width: 90%;
            height: auto;
            margin-top: 15px;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            margin: 10px !important;
        }

        .profile-info {
            font-size: 14px !important;
            color: black !important;
            margin: 0 !important;
            font-weight: bold;
        }

        .container-info {
            margin: 0 !important;
        }

        .link-container svg {
            width: 15px;
            height: 15px;
        }

        .image-container img {
            width: 100%;
            height: 40px;
            object-fit: contain;
            margin-right: 3px;
        }

        .link-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
            gap: 5px;
            background:  #0C1E36;;
            border-radius: 10px;
            margin: 10px !important;
            height: 40px !important;
        }

        #share-button {
            font-size: 12px;
        }

        .title {
            font-size: 15px;
            color: black !important;
            margin: 10px 10px 10px 10px !important;
            font-weight: bolder;
        }

        .info {
            color: rgba(128, 128, 128, 0.81);
            border-radius: 20px;
            margin: 5px !important;
            font-size: 13px;
        }

        .btn-text-box p {
            text-align: left;
            font-size: 14px;
        }

        .btn-text-box button {
            font-size: 14px !important;
        }

        .number {
            font-size: 20px;
            color: black !important;
            margin: 20px 10px 10px 10px !important;
            font-weight: bold;
        }

        .percent5 {
            margin-left: 35px !important;
        }

        .percent10 {
            margin-left: 30px !important;
        }

        .percent20 {
            margin-left: 30px !important;
        }
    }

</style>


<?php include 'profile-details.php' ?>
<div
        class="main-container"
>
    <div class="container-info">

        <p class="title">
            My referrals
        </p>

    </div>
    <div style="margin: 0 10px">
        <p class="info">Unlock up to 20% discount by inviting your friends!</p>
        <p class="info">Make sure they use your referral code at sign-up</p>
    </div>
    <div class="link-container">

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0CB4BF" viewBox="0 0 24 24"><path d="M6.188 8.719c.439-.439.926-.801 1.444-1.087 2.887-1.591 6.589-.745 8.445 2.069l-2.246 2.245c-.644-1.469-2.243-2.305-3.834-1.949-.599.134-1.168.433-1.633.898l-4.304 4.306c-1.307 1.307-1.307 3.433 0 4.74 1.307 1.307 3.433 1.307 4.74 0l1.327-1.327c1.207.479 2.501.67 3.779.575l-2.929 2.929c-2.511 2.511-6.582 2.511-9.093 0s-2.511-6.582 0-9.093l4.304-4.306zm6.836-6.836l-2.929 2.929c1.277-.096 2.572.096 3.779.574l1.326-1.326c1.307-1.307 3.433-1.307 4.74 0 1.307 1.307 1.307 3.433 0 4.74l-4.305 4.305c-1.311 1.311-3.44 1.3-4.74 0-.303-.303-.564-.68-.727-1.051l-2.246 2.245c.236.358.481.667.796.982.812.812 1.846 1.417 3.036 1.704 1.542.371 3.194.166 4.613-.617.518-.286 1.005-.648 1.444-1.087l4.304-4.305c2.512-2.511 2.512-6.582.001-9.093-2.511-2.51-6.581-2.51-9.092 0z"/></svg>
        <p id="share-button" style="color: #ffffff">Share my referral code</p>

    </div>
    <div>
        <div class="img-container">
            <img
                    style="width: 100px;
                        height: 100px;
                        "
                    src="assets/images/people3-removebg-preview.png" alt="">

            <h2 style="font-weight: 550; margin: 5px"><span style="color: #0CB4BF"><?= $referralCount ?></span> Friends</h2>
            <div class="image-container">
                <?php
                $images = [
                    1 => "man",
                    2 => "man",
                    3 => "five",
                    4 => "man",
                    5 => "man",
                    6 => "ten",
                    7 => "man",
                    8 => "man",
                    9 => "fifteen",
                    10 => "man",
                    11 => "man",
                    12 => "twenty"
                ];

                for ($i = 1; $i <= 12; $i++) {
                    $imageName = $images[$i];
                    $imagePath = "assets/images/referral-icons/" . ($referralCount >= $i ? $imageName . "-colored" : $imageName) . ".png";
                    ?>
                    <img src="<?php echo $imagePath; ?>" alt="">
                <?php } ?>
            </div>

        </div>
    </div>

    <div class="container-info" style="margin-bottom: 10px">

        <p class="title">
            My Discounts
        </p>

    </div>
    <div style="margin: 10px">
        <?php

        // Validate and query project details
        $sql = "SELECT * FROM vouchers WHERE account_id = ? and is_claimed = 0";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $accountId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                                <div class="button-your-account">
                                    <a href="#" style="width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                                        <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin: auto;">
                                            <div class="btn-text-box">
                                                <p style="font-weight: 550;">'. $row['discount'] .'% Discount Code:  </p>
                                                <button style="width: max-content; height: max-content; margin: 0; font-size: 18px; border-style: none; -webkit-tap-highlight-color: transparent;" onclick="copyText(\'' . htmlspecialchars($row['voucher_code']) . '\')">' . htmlspecialchars($row['voucher_code']) . ' &nbsp; <i class="fa-regular fa-copy" style="color: #0CB4BF;"></i></button>
                                            </div>
                                            <div class="btn-text-box">
                                                <p>Unused</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </a>
                                </div><br>';
            }
        } else {
            echo '<center><p>No Discount codes to display at the moment.</p></center>';
        }
        ?>

    </div>
</div>


</body>
<script>
    function copyText(text) {
        /* Copy text into clipboard */
        navigator.clipboard.writeText(text);
    }

    const toBold = text =>{
        const charSet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '?', '.', ',', '"', "'"];
        const targetCharSet = ['𝐚', '𝐛', '𝐜', '𝐝', '𝐞', '𝐟', '𝐠', '𝐡', '𝐢', '𝐣', '𝐤', '𝐥', '𝐦', '𝐧', '𝐨', '𝐩', '𝐪', '𝐫', '𝐬', '𝐭', '𝐮', '𝐯', '𝐰', '𝐱', '𝐲', '𝐳', '𝐀', '𝐁', '𝐂', '𝐃', '𝐄', '𝐅', '𝐆', '𝐇', '𝐈', '𝐉', '𝐊', '𝐋', '𝐌', '𝐍', '𝐎', '𝐏', '𝐐', '𝐑', '𝐒', '𝐓', '𝐔', '𝐕', '𝐖', '𝐗', '𝐘', '𝐙', '𝟎', '𝟏', '𝟐', '𝟑', '𝟒', '𝟓', '𝟔', '𝟕', '𝟖', '𝟗', '❗', '❓', '.', ',', '"', "'"];
        const textArray = text.split('');
        let boldText = '';
        textArray.forEach((letter) => {
            const index = charSet.findIndex((_letter) => _letter === letter);
            if (index !== -1) {
                boldText = boldText + targetCharSet[index];
            } else {
                boldText = boldText + letter;
            }
        });
        return boldText;
    }


    const shareButton = document.getElementById('share-button');
    const profileLevel = toBold("<?=$profilelevel?>");
    const textToShare = `Join me and Download the Aesthetic Links App to find the best aesthetic clinics! Use my referral code when registering: ${profileLevel}.

Download the App on https://apps.apple.com/app/id6477182130`;

    shareButton.addEventListener('click', () => {
        if (navigator.share) {
            navigator.share({
                title: 'Share Text',
                text: textToShare
            })
                .then(() => console.log('Text shared successfully!'))
                .catch(error => console.error('Sharing failed:', error));
        } else {
            console.warn('Navigator.share API is not supported by your browser.');
            // Implement an alternative sharing method if needed
        }
    });
</script>
</html>
<style>
    .labels {
        display: flex;
        justify-content: space-around; /* Adjust as needed */
    }

    .labels p {
        margin-top: 5px;
    }

    body {
        display: block;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    .main-container{
        display: flex;
        flex-direction: column;
        align-content: center;
        justify-content: center;
        margin: 20px;
    }
    .title{
        font-size:24px;
        color:black !important;
        margin: 0;
        font-weight: bolder;
    }
    .container-info{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin: 10px;
        text-align: center;
    }

    .info{
        color: rgba(128, 128, 128, 0.81);
        border-radius: 20px;
        margin: 0;
        /*margin: 10px !important;*/
    }
    .link-container{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        gap: 5px;
        background: #0C1E36;
        border-radius: 10px;
        margin: 10px !important;
        width: 60%;
    }
    .profile-info{
        font-size:17px;
        color:black !important;
        margin: 10px 0 !important;
        font-weight: bold;
    }
    .img-container{
        display: flex;
        flex-direction: column;
        align-content: center;
        align-items: center;
        justify-content: center;
        margin: 10px;
    }
    .number{
        font-size:30px;
        color:black !important;
        margin: 20px 10px 10px 10px !important;
        font-weight: bold;
    }
</style>