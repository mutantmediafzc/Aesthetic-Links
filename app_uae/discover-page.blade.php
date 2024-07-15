<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...


function getAndConvertCurrency()
{
    $cookiePrefix = 'currency_rate_';

    // Check if the currency conversion rates cookies exist and are still valid
    if (isset ($_COOKIE[$cookiePrefix . 'USD_TO_CHF'], $_COOKIE[$cookiePrefix . 'USD_TO_AED'], $_COOKIE[$cookiePrefix . 'USD_TO_EUR'], $_COOKIE[$cookiePrefix . 'creation_time'])) {
        $cookieAge = time() - $_COOKIE[$cookiePrefix . 'creation_time'];
        if ($cookieAge < 3600) {
            // Cookies are still valid, no need to fetch new rates
            return false;
        }
    }

    // Cookies are not set or expired, fetch new rates
    $apiUrl = 'https://api.exchangeratesapi.io/v1/latest?access_key=3b59ee7b5cd4122d39352c1e7fbbe147&base=USD&symbols=CHF,AED,EUR';
    $response = file_get_contents($apiUrl);
    if ($response === false) {
        return false; // Error handling if API request fails
    }

    $data = json_decode($response, true);
    $usdToChf = $data['rates']['CHF'];
    $usdToAed = $data['rates']['AED'];
    $usdToEur = $data['rates']['EUR'];

    setcookie($cookiePrefix . 'USD_TO_CHF', $usdToChf, time() + 3600, "/");
    setcookie($cookiePrefix . 'USD_TO_AED', $usdToAed, time() + 3600, "/");
    setcookie($cookiePrefix . 'USD_TO_EUR', $usdToEur, time() + 3600, "/");
    setcookie($cookiePrefix . 'creation_time', time(), time() + 3600, "/");

    return true;
}

$currencyUpdated = getAndConvertCurrency();
if ($currencyUpdated) {
    echo "<script>
        window.location.reload(); // Refresh the page
    </script>";
}

function UserCountry()
{
    if (isset ($_COOKIE['user_country']) && !empty ($_COOKIE['user_country'])) {
        return $_COOKIE['user_country'];
    }

    $userIp = $_SERVER['REMOTE_ADDR'];
// 	$userIp = "128.14.190.0";
    $apiUrl = "https://tools.keycdn.com/geo.json?host=$userIp";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'User-Agent: keycdn-tools:https://yourwebsite.com'
    ]);

    $response = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($response, true);

    if (isset ($data['data']['geo']['country_name']) && !empty ($data['data']['geo']['country_name'])) {
        $countryName = $data['data']['geo']['country_name'];
        setcookie('user_country', $countryName, time() + 86400);
        if ($countryName == "Switzerland") {
            setcookie('activeCurrency', "CHF", time() + 86400); // Sets the cookie for 1 day
        }
        return $countryName;
    } else {
        return false;
    }
}

function isFirstVisitAndRedirect() {
    // Check if the user has not been redirected yet
    if (!isset($_SESSION['redirected']) || $_SESSION['redirected'] == false) {
        // Mark that the user has been redirected
        $_SESSION['redirected'] = true;

        // Call your existing function to determine the user's country
        $userCountry = UserCountry();

        // Redirect based on the user's country
        if ($userCountry == "Switzerland") {
            header('Location: https://aestheticlinks.com/app/views/landing-page.blade.php');
            exit;
        }
    }
}

// Check if the user needs redirection
if (!isset($_SESSION['redirected']) || $_SESSION['redirected'] == false) {
    isFirstVisitAndRedirect();
}

function currencyConvertor($amount, $currency)
{
    $targetCurrency = $currency;
    $cookiePrefix = 'currency_rate_';


    if (isset ($_COOKIE[$cookiePrefix . 'creation_time'])) {
        $cookieAge = time() - $_COOKIE[$cookiePrefix . 'creation_time'];

        if ($cookieAge < 3600 && isset ($_COOKIE[$cookiePrefix . 'USD_TO_' . $targetCurrency])) {
            $rate = $_COOKIE[$cookiePrefix
            . 'USD_TO_' . $targetCurrency];
            if ($amount > 0) {
                $convertedAmount = $amount * $rate;
                $roundedAmount = ceil($convertedAmount);
            } else {
                $convertedAmount = 0;
                $roundedAmount = 0;
            }

            return number_format($roundedAmount, 0) . " " . $targetCurrency;

        } else {
            return 'Rates expired, please try again';
        }
    } else {

        return 'Rates not found, please try again';
    }
}

$userCountry = UserCountry();
function convertCurrency($amount)
{


    global $userCountry;
    $amount = (int) $amount;
    if (is_numeric($amount)) {
        if (isset ($amount) && $amount >= 0) {

            return currencyConvertor($amount, "AED");
        }

    } else {
        return "Invalid format";
    }
}


?>
<?php require_once 'server.blade.php';?>


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

?>
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Discover Page</title>

    <link rel="stylesheet" href="assets/styles/swiper-bundle.min.css">




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

    @font-face {
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
        url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    .clinic-text-location {
        position: absolute;
        width: 93%;
        height: auto;
        margin-top: 18vw;
        margin-left: 2.5%;
        display: flex;
        align-items: center;
    }

    .clinic-text-location h1 {
        width: 100%;
        margin: 0;
        color: #fff;
        font-size: 38px;
        text-align: left;
        margin-top: 45px;
        font-weight: 500;
    }

    .clinic-text-service {
        position: absolute;
        width: 93%;
        height: auto;
        margin-top: 18vw;
        display: flex;
        align-items: center;
    }

    .clinic-text-service h1 {
        width: 100%;
        margin: 0;
        color: #fff;
        font-size: 38px;
        text-align: right;
        margin-top: 45px;
        font-weight: 500;
    }


    /* --------------------------------menu------------------------------------- */

    .spacer {
        width: 100%;
        height: 20vw;
    }

    /* ------------------------------------------------------------------------- */

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        line-height: 0.9;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;
    }

    .paragraph-1 {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 32px;
        font-weight: 600;
    }

    .paragraph-2 {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 32px;
    }

    .referral {
        display: flex;
        justify-content: center;
        width: 100%;
        height: auto;
        margin-top: 5%;
    }

    .referral-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 10px;
        width: 90%;
        height: 199px;
        border-radius: 20px;
        background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.97) 10%, rgba(0, 0, 0, 0) 100%), url('assets/images/bg-photo.png');
        background-size: cover;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    video {
        z-index: -1;

    }

    #myVideo {
        position: relative;
        object-fit: cover;
        width: 100%;
        height: 100%;
        border-radius: 25px;
    }

    /* ---------------------------clinic slider--------------------------- */

    .wrapper {
        margin: auto;
        width: 100%;
        height: max-content;
        display: flex;
        overflow-x: auto;
    }

    .wrapper::-webkit-scrollbar{
        width: 0;
    }

    .wrapper .item {
        min-width: 98%;
        height: 475px;
        text-align: center;
        margin-right: 25px;
    }

    /* -------------------------product slider-------------------------- */

    /*===Product-slider=================================*/
    .product-slider{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin: auto;
    }
    .slider-container{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .product-slider-heading{
        font-size: 28px;
        text-transform: uppercase;
        font-family: 'Open Sans',sans-serif;
        color: #313131;
    }
    .product-box{
        width: 95%;
        padding: 0;
        background-color: transparent;
        position: relative;

    }

    .product-img-container{
        width: 100%;
        height: 100%;
        position: relative;
        display: flex;
        overflow: hidden;
        border-radius: 20px;

    }
    .product-img a,
    .product-img{
        width: 100%;
        height:375px;
        object-fit: cover;
        border-radius: 25px;
    }

    .product-img a img{
        width: 100%;
        height: 100%;
        object-fit:cover;
        object-position: center;
        border-radius: 25px;
    }

    .product-box-text{
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        font-family: 'Poppins', sans-serif;
    }

    .product-title{
        font-size: 28px;
        color: #444444;
        font-weight: 500;
        text-decoration: none;
    }

    .referral-container h1 {
        width: 90%;
        margin: 0;
        font-size: 38px;
        color: #fff;
    }

    .referral-container p {
        width: 90%;
        margin: 0;
        font-size: 28px;
        color: #fff;
    }

    .referral-btn button {
        padding: 15px;
        padding-left: 30px;
        padding-right: 30px;
        font-family: 'Poppins', sans-serif;
        font-size: 28px; color: #888888;
        border-style: none;
        border-radius: 7px;
    }

    .referral-btn-container {
        width: 90%;
        height: auto;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(2, max-content);
        column-gap: 20px;
        margin-top: 30px;
    }

    .yt-container {
        margin: auto;
        width: 90%;
        height: 26vh;
        border-radius: 25px;
    }

    .yt-container iframe {
        border-radius: 25px;
    }

    .section-title-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5%;
    }

    .section-title-container h1 {
        margin: 0;
        font-size: 34px;
        font-weight: 600;
    }

    .section-title-container button {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 38px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
    }

    .section-title-container button i {
        color: #000;
        font-size: 28px;
    }

    .img-container-item {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .img-container-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 25px;
    }

    .content-box-item {
        margin: auto;
        width: 95%;
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 5px;
    }

    .content-box-item p {
        width: max-content;
        height: auto;
        margin: 0;
        font-size: 28px;
        color: #444444;
    }

    .content-box-item span {
        width: max-content;
        height: auto;
        margin: 0;
        font-size: 28px;
        color: #444444;
    }

    .clinic-logo-box {
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 15px;
        right: 7%;
        top: 7%;
    }

    .clinic-logo-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px;
    }

    .price-buy span {
        width: max-content;
        height: auto;
        margin: 0;
        font-size: 28px;
        color: #444444;
    }


    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  {

        .clinic-text-location {
            position: absolute;
            width: 93%;
            height: auto;
            margin-top: 30vw;
            margin-left: 4%;
            display: flex;
            align-items: center;
        }

        .clinic-text-location h1 {
            width: 100%;
            margin: 0;
            color: #fff;
            font-size: 16pt;
            text-align: left;
            margin-top: 0;
            font-weight: 550;
        }

        .clinic-text-service {
            position: absolute;
            width: 93%;
            height: auto;
            margin-top: 30vw;
            display: flex;
            align-items: center;
        }

        .clinic-text-service h1 {
            width: 100%;
            margin: 0;
            color: #fff;
            font-size: 16pt;
            text-align: right;
            margin-top: 0;
            font-weight: 550;
        }


        .spacer {
            width: 100%;
            height: 9vw;
        }

        .product-slider-heading{
            text-align: center;
            font-size: 1.3rem;
        }
        .product-slider{
            width: 100%;
        }


        .product-img a img{
            animation:none;
        }

        #filter-arrow-down {
            font-size: 10pt;
        }

        .paragraph-1 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            font-weight: 550;
        }

        .paragraph-2 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        /*----------------------------------------------*/

        .referral {
            display: flex;
            justify-content: center;
            width: 100%;
            height: auto;
            margin-top: 5%;
        }

        .referral-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
            width: 90%;
            height: 199px;
            border-radius: 20px;
            background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.97) 10%, rgba(0, 0, 0, 0) 100%), url('assets/images/bg-photo.png');
            background-size: cover;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .referral-container h1 {
            width: 100%;
            margin: 0;
            font-size: 18px;
            color: #fff;
        }

        .referral-container p {
            width: 90%;
            margin: 0;
            font-size: 14px;
            color: #fff;
        }

        .referral-btn button {
            padding: 10px;
            padding-left: 15px;
            padding-right: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px; color: #888888;
            border-style: none;
            border-radius: 10px;
        }

        .referral-btn-container {
            width: 90%;
            height: auto;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(2, max-content);
            column-gap: 10px;
            margin-top: 10px;
        }

        .yt-container {
            margin: auto;
            width: 90%;
            height: 144px;
            border-radius: 15px;
        }

        .yt-container iframe {
            border-radius: 10px;
        }

        .section-title-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5%;
        }

        .section-title-container h1 {
            margin: 0;
            font-size: 16px;
        }

        .section-title-container button {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 14px;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
        }

        .section-title-container button i {
            color: #000;
            font-size: 14px;
        }

        .wrapper .item {
            min-width: 98%;
            height: 225px;
            text-align: center;
            margin-right: 25px;
        }

        .img-container-item {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .img-container-item {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .img-container-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .content-box-item {
            margin: auto;
            width: 95%;
            height: max-content;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }

        .content-box-item p {
            width: max-content;
            height: auto;
            margin: 0;
            font-size: 14px;
            color: #444444;
        }

        .content-box-item span {
            width: max-content;
            height: auto;
            margin: 0;
            font-size: 14px;
            color: #444444;
        }


        .clinic-logo-box {
            position: absolute;
            width: 30pt;
            height: 30pt;
            border-radius: 5px;
            right: 7%;
            top: 7%;
        }

        .clinic-logo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-img a,
        .product-img {
            width: 100%;
            height:200px;
            object-fit: cover;

        }

        .product-img img {
            border-radius: 5pt !important;
        }

        .product-title{
            font-size: 16px;
            color: #444444;
            font-weight: 500;
            text-decoration: none;
        }

        .price-buy span {
            width: max-content;
            height: auto;
            margin: 0;
            font-size: 16px;
            color: #444444;
        }
    }


    @media only screen and (max-device-width: 767px) {

        .clinic-text-location {
            position: absolute;
            width: 30%;
            height: auto;
            margin-top: 39vw;
            margin-left: 4%;
            display: flex;
            align-items: center;
        }

        .clinic-text-location h1 {
            width: 100%;
            margin: 0;
            color: #fff;
            font-size: 12pt;
            text-align: left;
            margin-top: 0;
            font-weight: 550;
        }

        .clinic-text-service {
            position: absolute;
            width: 93%;
            height: auto;
            margin-top: 32vw;
            display: flex;
            align-items: center;
        }

        .clinic-text-service h1 {
            width: 100%;
            margin: 0;
            color: #fff;
            font-size: 12pt;
            text-align: left;
            margin-top: 0;
            font-weight: 550;
        }

        .product-slider-heading{
            text-align: center;
            font-size: 1.3rem;
        }

        .product-slider{
            width: 100%;
        }

        .product-img a img{
            animation:none;
        }

        #filter-arrow-down {
            font-size: 10pt;
        }

        .paragraph-1 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            font-weight: 550;
        }

        .paragraph-2 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        /*----------------------------------------------*/

        .referral {
            display: flex;
            justify-content: center;
            width: 100%;
            height: auto;
            margin-top: 5%;
        }

        .referral-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
            width: 90%;
            height: 199px;
            border-radius: 15px;
            background-color: #0C1E36;
            padding-top: 15px;
            padding-bottom: 15px;
            position: relative;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.97) 2%, rgba(0, 0, 0, 0) 135%), url('assets/images/bg-photo.png') !important;
            background-size: cover;
            background-position: center;
        }

        .referral-container h1 {
            width: 100%;
            margin: 0;
            font-size: 25px;
            font-weight: normal;
            color: #fff;
        }

        .referral-container p {
            width: 90%;
            margin: 0;
            font-size: 16px;
            color: #fff;
        }

        .referral-btn button {
            padding: 10px;
            padding-left: 15px;
            padding-right: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 10px; color: #888888;
            border-style: none;
            border-radius: 7px;
        }

        .referral-btn-container {
            width: 90%;
            height: auto;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(2, max-content);
            column-gap: 10px;
            margin-top: 20px;
        }

        .yt-container {
            margin: auto;
            width: 90%;
            height: 144px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }

        .yt-container iframe {
            border-radius: 10px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }


        .yt-container iframe, {
            pointer-events: none;
        }
        .yt-container iframe{
            position: absolute;
            top: -60px;
            left: 0;
            width: 100%;
            height: calc(100% + 120px);
        }
        .section-title-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5%;
        }

        .section-title-container h1 {
            margin-top: 10px;
            font-size: 17px;
            font-weight: 600;
        }

        .section-title-container button {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 14px;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
        }

        .section-title-container button i {
            color: #000;
            font-size: 14px;
        }

        .wrapper .item {
            min-width: 95%;
            height: 250px;
            text-align: center;
            margin-right: 10px;
        }

        .img-container-item {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .img-container-item {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .img-container-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .content-box-item {
            margin: auto;
            width: 95%;
            height: max-content;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }

        .content-box-item p {
            width: max-content;
            height: auto;
            margin: 0;
            font-size: 14px;
            color: #444444;
        }

        .content-box-item span {
            width: max-content;
            height: auto;
            margin: 0;
            font-size: 14px;
            color: #444444;
        }


        .clinic-logo-box {
            position: absolute;
            width: 30pt;
            height: 30pt;
            border-radius: 5px;
            right: 7%;
            top: 7%;
        }

        .clinic-logo-box img {
            width: 46px;
            height: 44px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-img a,
        .product-img {
            width: 100%;
            height:150px;
            object-fit: cover;

        }

        .product-img img {
            border-radius: 5pt !important;
        }

        .product-title{
            font-size: 16px;
            color: #444444;
            font-weight: 500;
            text-decoration: none;
        }

        .price-buy span {
            width: max-content;
            height: auto;
            margin: 0;
            font-size: 16px;
            color: #444444;
        }

    }

    .dark-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
        border-radius: 20px; /* If your container has rounded corners */
        z-index: 0;
    }

    .custom-play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 55px;
        height: 55px;
        background: url('assets/images/button.png') no-repeat center center;
        background-size: contain;
        cursor: pointer;
        z-index: 1;
    }

    .custom-play-button-wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100px; /* Increase width */
        height: 100px; /* Increase height */
        cursor: pointer;
        z-index: 10;
    }

    .custom-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        background: transparent;
    }

    .custom-overlay .ytp-button-block {
        position: absolute;
        bottom: 45px; /* Adjust as necessary to match the position of the YouTube button */
        right: 15px;  /* Adjust as necessary to match the position of the YouTube button */
        width: 30px;  /* Adjust the size to cover the YouTube button */
        height: 30px; /* Adjust the size to cover the YouTube button */
        background: transparent; /* Use background color if you want to cover the button visibly */
        pointer-events: auto; /* To block the button click */
    }
</style>



<body>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




<?php include 'nav.php'; ?>



<?php require_once 'server.blade.php';?>

        <!---- Menu Start --->

<?php include 'menu.php'; ?>


        <!---- Menu End ----->

<!-- ----------------------------menu modal end------------------------ -->

<section class="spacer"></section>

<section class="referral">
    <div class="referral-container" style="display: flex; justify-content: space-between;">
        <div class="left-content" style="flex: 1; z-index: 1; margin-top: 20px">
            <div style="width: 90%; height: auto; margin: auto;">
                <p style="font-size: 10px; color: #fff; -webkit-text-stroke: 0.5px #000000">Invite Your Friends</p>
            </div>
            <div style="width: 90%; height: auto; margin: auto; margin-top: 10px">
                <h1>Get Up To</h1>
            </div>
            <div style="width: 90%; height: auto; margin: auto; margin-top: 10px">
                <h1 style="color: #0CB4BF">20% Off</h1>
            </div>
            <div style="width: 90%; height: auto; margin: auto; margin-top: 10px">
                <h1>All Our Services</h1>
            </div>
            <div class="referral-btn-container">
                <div class="referral-btn" style="width: 100%;">
                    <a href="referral-test.php?profilelevel=<?=$profilelevel?>" style="text-decoration: none;">
                        <button style="color: #fff; background-color: #0CB4BF; display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#f1f1f1" viewBox="0 0 24 24" style="margin-right: 5px;">
                                <path d="M6.188 8.719c.439-.439.926-.801 1.444-1.087 2.887-1.591 6.589-.745 8.445 2.069l-2.246 2.245c-.644-1.469-2.243-2.305-3.834-1.949-.599.134-1.168.433-1.633.898l-4.304 4.306c-1.307 1.307-1.307 3.433 0 4.74 1.307 1.307 3.433 1.307 4.74 0l1.327-1.327c1.207.479 2.501.67 3.779.575l-2.929 2.929c-2.511 2.511-6.582 2.511-9.093 0s-2.511-6.582 0-9.093l4.304-4.306zm6.836-6.836l-2.929 2.929c1.277-.096 2.572.096 3.779.574l1.326-1.326c1.307-1.307 3.433-1.307 4.74 0 1.307 1.307 1.307 3.433 0 4.74l-4.305 4.305c-1.311 1.311-3.44 1.3-4.74 0-.303-.303-.564-.68-.727-1.051l-2.246 2.245c.236.358.481.667.796.982.812.812 1.846 1.417 3.036 1.704 1.542.371 3.194.166 4.613-.617.518-.286 1.005-.648 1.444-1.087l4.304-4.305c2.512-2.511 2.512-6.582.001-9.093-2.511-2.51-6.581-2.51-9.092 0z"/>
                            </svg>
                            SHARE NOW!
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

</section>

<!-- ----------------------------video start------------------------ -->
<section style="margin: auto; width: 100%; margin-top: 5%;">
    <div style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container">
            <h1 style="margin-bottom: -10px">Get To Know Us</h1>
        </div>
    </div>

    <div class="yt-container" style="border-radius: 15px; overflow: hidden;">
        <div class="yt-foreground">
            <iframe id="yt-frame" src="https://www.youtube-nocookie.com/embed/6LCpG2YPUw8?autoplay=1&enablejsapi=1&mute=1&color=white&fs=0&modestbranding=1&rel=0" width="100%" height="100%" frameborder="0"></iframe>
        </div>
        <div class="custom-play-button-wrapper" onclick="playVideo();">
            <div class="custom-play-button"></div>
        </div>
    </div>


    <div style="display: flex; align-items: center; margin: 10px auto; width: 90%; height: auto; padding: 10px; background-color: #fff; border-radius: 10px;">
        <img src="assets/images/icon-logo.jpg" alt="Aesthetic Links Logo" style="width: 41px; height: 41px; margin-right: 15px; border-radius: 50%;">
        <div style="flex-grow: 1;">
            <h2 style="margin: 0; color: #1d1d1d; font-weight: bold; font-size: 14px;">Aesthetic Links</h2>
            <p style="margin: 0; color: #777; margin-top: 3px; font-size: 10px; font-weight: 300">Your Path to Trusted Clinics.</p>
        </div>
        <a href="https://www.bestlinks.ae/" target="_blank" style="text-decoration: none; color: #00bcd4; font-weight: 500; font-size: 12px;">Learn more</a>
    </div>
</section>

<!-- ----------------------------video end------------------------ -->

<!-- ----------------------------------------- slider top rated clinics------------------------------------------- -->

<section style="margin: auto; width: 100%; margin-top: 5%;">
    <div style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container">
            <h1 style="font-size: 16px; font-weight: 600; margin-top: 0 !important;"><i class="fa-solid fa-hospital" style="color: #0CB4BF"></i> Newly added clinics</h1>

        </div>

        <div class="wrapper">

            <!----- Call Data for Clinics ---->
            <?php
            // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.

            // Define your SQL query to select all projects
            $stmt = "SELECT * FROM clinics WHERE approval = 'approved' AND is_new = 1 AND ccountry ='UAE'";

            // In this case we can use the account ID to get the account info.


            $result = $con->query($stmt);




            ?>


            <div class="wrapper">
                <div class="swiper mySwiperNewClinics">
                    <div class="swiper-wrapper">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo '
                    <div class="swiper-slide">
     <div class="item" style="width: 350px; border-bottom: 1px solid #ccc; border-radius: 25px; overflow: hidden; background: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="position: relative; width: 100%; height: 200px; overflow: hidden;">
            <a href="clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] . '">
                <img src="assets/images/clinic-images/' . $row['cunique'] . '.png" style="width: 100%; height: 100%; object-fit: cover;">
            </a>
            <div class="gradient-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1));"></div>
            <div class="clinic-logo" style="position: absolute; bottom: 10px; left: 10px;">
                <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" alt="Clinic Logo" style="border-radius:10px; width: 56px; height: 56px; background: #fff; padding: 5px;">
            </div>
            <div class="clinic-text-location" style="position: absolute; bottom: 10px; right: 10px; color: #fff; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; text-align:right">
                <h1 style="margin: 0; font-size: 12px; font-weight:400; text-align: right"><i class="fa-solid fa-map-marker-alt" style="margin-right: 5px;"></i>' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
            </div>
        </div>
        <div class="content-box-item" style="text-align: center; padding: 10px 20px;">
            <p style="color:#010409; margin: 0; font-size: 18px; font-weight: 600;">' . $row['cname'] . '</p>
        </div>
    </div>
    </div>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>



</section>

<!-- ----------------------------------------- slider top rated clinics end------------------------------------------- -->

<section style="margin: auto; width: 100%;">
    <div style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container">
            <h1 style="font-size: 16px; font-weight: 600"><i class="fa-solid fa-tags" style="color: #0CB4BF"></i> Discounted Services</h1>

        </div>

        <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

        <section class="product-slider">

            <!--==heading====================-->
            <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">



                        <?php
                        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.

                        // Define your SQL query to select all projects
                        $stmt = "SELECT * FROM services WHERE approval = 'approved' AND discountdisplay ='discountdisplay' AND scountry ='UAE'";

                        // In this case we can use the account ID to get the account info.


                        $result = $con->query($stmt);




                        ?>

                        <?php

                        while ($row = $result->fetch_assoc()) {
                            $sname = mb_strimwidth($row['sname'], 0, 35, "...");
                            $stmt = "SELECT COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM reviews r WHERE r.sunique = '{$row['id']}' LIMIT 50 ";
                            $inner_result = $con->query($stmt);
                            $inner_row = $inner_result->fetch_assoc();


                            $avgRating = round($inner_row['average_rating'] ?? 0,1) == 0 ? 'New' :  round($inner_row['average_rating'] ?? 0,1);


                            if ($row['transaction_type'] == 'consulation') {
                                $page = "book.php";
                            } elseif ($row['transaction_type'] == 'treatment') {
                                $page = "book-treatment.php";
                            } else {
                                $page = "book-max.php";
                            }
                            echo '

                    <div class="swiper-slide">
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                    <div>
                        <h1 style="padding-left:20px; padding-top:20px; border-radius:14px; padding-bottom:36px; width:225px; background-color:rgba(217,217,217,0.5); margin-top:-22%; font-size:12px; font-weight:600; height: 100%; line-height: 1.1; ">' . $sname . '
                            <span style="display: block; margin-top: 5px;">
                               <span style="color: #10B2BD; font-size: 12px; font-weight:600 line-height: 1.1; ">
                                '. convertCurrency($row['final_price']) .'
                            </span>
                            <span style="color: #aaa; text-decoration:line-through; font-weight:600; font-size: 10px; line-height: 1.1;">
                                '. convertCurrency($row['sprice']) .'
                            </span>
                            </span>
                        </h1>
                    </div>

                                </div>
                                <div class="clinic-text-service" style="z-index: 1;">
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                                </div>

                                <div class="product-img">
                                    <a href="' . $page . '?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text" style="visibility:hidden;">
                                <div class="price-buy">';
                            if($inner_row['total_reviews'] >= 10) {

                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>' . $inner_row['total_reviews'] . ' reviews</u></span>';
                            } else {
                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i></span>';

                            }
                            echo '
                                </div>
                            </div>
                        </div>
                    </div>' ; }?>




                    </div>
                </div>
            </div>
        </section>
        <!--slider-end-------->


    </div>
</section>
<section  style="margin: auto; width: 100%;">
    <div style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container" style="justify-content: unset !important;">
            <img src="assets/images/face.svg"style="margin-top: 5px; width: 20px; height: 20px" alt="">
            <h1 style="font-size: 16px; font-weight: 600">
                Top Rated Face Treatments</h1>

        </div>

        <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

        <section class="product-slider">

            <!--==heading====================-->
            <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">



                        <?php
                        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.

                        // Define your SQL query to select all projects
                        $stmt = "SELECT * FROM services WHERE approval = 'approved' AND scat ='Face' AND scountry ='UAE'";

                        // In this case we can use the account ID to get the account info.


                        $result = $con->query($stmt);




                        ?>

                        <?php

                        while ($row = $result->fetch_assoc()) {

                            $sname = mb_strimwidth($row['sname'], 0, 35, "...");
                            $stmt = "SELECT COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM reviews r WHERE r.sunique = '{$row['id']}' LIMIT 50 ";
                            $inner_result = $con->query($stmt);
                            $inner_row = $inner_result->fetch_assoc();

                            $avgRating = round($inner_row['average_rating'] ?? 0,1) == 0 ? 'New' :  round($inner_row['average_rating'] ?? 0,1);


                            if ($row['transaction_type'] == 'consulation') {
                                $page = "book.php";
                            } elseif ($row['transaction_type'] == 'treatment') {
                                $page = "book-treatment.php";
                            } else {
                                $page = "book-max.php";
                            }
                            echo '

                    <div class="swiper-slide">
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                    <div>
                                                                            <h1 style="padding-left:20px; padding-top:20px; border-radius:14px; padding-bottom:36px; width:225px; background-color:rgba(217,217,217,0.5); margin-top:-22%; font-size:12px; font-weight:600; height: 100%; line-height: 1.1;">' . $sname . '
                                                 <span style="color: #0CB4BF; display: block; font-size: 12px; font-weight:500; line-height: 1.1; margin-top: 5px;">
    <i class="fa-solid fa-star" style="color: #0CB4BF; margin-right: 5px;">   ' . $avgRating . '</i>
</span>
                      </h1>
                                    </div>

                                </div>
                                <div class="clinic-text-service" style="z-index: 1;">
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                                </div>

                                <div class="product-img">
                                    <a href="' . $page . '?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text" style="visibility:hidden;">
                                <div class="price-buy">';
                            if($inner_row['total_reviews'] >= 10) {

                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>' . $inner_row['total_reviews'] . ' reviews</u></span>';
                            } else {
                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i></span>';

                            }
                            echo '
                                </div>
                            </div>
                        </div>
                    </div>' ; }?>


                    </div>
                </div>
            </div>
        </section>
        <!--slider-end-------->


    </div>
</section>

<!-- ------------------------------------------------------------------------- -->


<section style="margin: auto; width: 100%;">
    <div style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container" style="justify-content: unset !important;">
            <img src="assets/images/body.svg" style="margin-top: 5px; width: 20px; height: 20px" alt="">
            <h1 style="font-size: 16px; font-weight: 600">Top Rated Body Treatments</h1>

        </div>

        <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

        <section class="product-slider">

            <!--==heading====================-->
            <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">


                        <?php
                        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.

                        // Define your SQL query to select all projects
                        $stmt = "SELECT * FROM services WHERE approval = 'approved' AND scat ='Body' AND scountry ='UAE'";

                        // In this case we can use the account ID to get the account info.


                        $result = $con->query($stmt);




                        ?>

                        <?php

                        while ($row = $result->fetch_assoc()) {
                            $sname = mb_strimwidth($row['sname'], 0, 35, "...");

                            $stmt = "SELECT COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM reviews r WHERE r.sunique = '{$row['id']}' LIMIT 50 ";
                            $inner_result = $con->query($stmt);
                            $inner_row = $inner_result->fetch_assoc();

                            $avgRating = round($inner_row['average_rating']?? 0,1) == 0 ? 'New' :  round($inner_row['average_rating'] ?? 0,1);


                            if ($row['transaction_type'] == 'consulation') {
                                $page = "book.php";
                            } elseif ($row['transaction_type'] == 'treatment') {
                                $page = "book-treatment.php";
                            } else {
                                $page = "book-max.php";
                            }
                            echo '

                    <div class="swiper-slide">
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                    <div>
                                                                            <h1 style="padding-left:20px; padding-top:20px; border-radius:14px; padding-bottom:36px; width:225px; background-color:rgba(217,217,217,0.5); margin-top:-22%; font-size:12px; font-weight:600; height: 100%; line-height: 1.1;">' . $sname . '
                                                 <span style="color: #0CB4BF; display: block; font-size: 12px; font-weight:500; line-height: 1.1; margin-top: 5px;">
    <i class="fa-solid fa-star" style="color: #0CB4BF; margin-right: 5px;">   ' . $avgRating . '</i>
</span>
                      </h1>
                                    </div>

                                </div>
                                <div class="clinic-text-service" style="z-index: 1;">
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                                </div>

                                <div class="product-img">
                                    <a href="' . $page . '?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text" style="visibility:hidden;">
                                <div class="price-buy">';
                            if($inner_row['total_reviews'] >= 10) {

                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>' . $inner_row['total_reviews'] . ' reviews</u></span>';
                            } else {
                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i></span>';

                            }
                            echo '
                                </div>
                            </div>
                        </div>
                    </div>' ; }?>





                    </div>
                </div>
            </div>
        </section>
        <!--slider-end-------->


    </div>
</section>

<!-- ------------------------------------------------------------------------- -->

<!-- ------------------------------------------------------------------------- -->


<section style="margin: auto; width: 100%;">
    <div style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container" style="justify-content: unset !important;">
            <img src="assets/images/health.svg" style="margin-top: 5px; width: 25px; height: 25px" alt="">

            <h1 style="font-size: 16px; font-weight: 600"> Top Rated Health & Wellness</h1>

        </div>

        <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

        <section class="product-slider">

            <!--==heading====================-->
            <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">


                        <?php
                        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.

                        // Define your SQL query to select all projects
                        $stmt = "SELECT * FROM services WHERE approval = 'approved' AND scat ='Health' AND scountry ='UAE'";

                        // In this case we can use the account ID to get the account info.


                        $result = $con->query($stmt);




                        ?>

                        <?php                    while ($row = $result->fetch_assoc()) {
                            $sname = mb_strimwidth($row['sname'], 0, 35, "...");

                            $stmt = "SELECT COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM reviews r WHERE r.sunique = '{$row['id']}' LIMIT 50 ";
                            $inner_result = $con->query($stmt);
                            $inner_row = $inner_result->fetch_assoc();

                            $avgRating = round($inner_row['average_rating'] ?? 0,1) == 0 ? 'New' :  round($inner_row['average_rating'] ?? 0,1);


                            if ($row['transaction_type'] == 'consulation') {
                                $page = "book.php";
                            } elseif ($row['transaction_type'] == 'treatment') {
                                $page = "book-treatment.php";
                            } else {
                                $page = "book-max.php";
                            }
                            echo '

                    <div class="swiper-slide">
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                   <div>
                                                                            <h1 style="padding-left:20px; padding-top:20px; border-radius:14px; padding-bottom:36px; width:225px; background-color:rgba(217,217,217,0.5); margin-top:-22%; font-size:12px; font-weight:600; height: 100%; line-height: 1.1;">' . $sname . '
                                                 <span style="color: #0CB4BF; display: block; font-size: 12px; font-weight:500; line-height: 1.1; margin-top: 5px;">
    <i class="fa-solid fa-star" style="color: #0CB4BF; margin-right: 5px;">   ' . $avgRating . '</i>
</span>
                      </h1>
                                    </div>

                                </div>
                                <div class="clinic-text-service" style="z-index: 1;">
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                                </div>

                                <div class="product-img">
                                    <a href="' . $page . '?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text" style="visibility:hidden;">
                                <div class="price-buy">';
                            if($inner_row['total_reviews'] >= 10) {

                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>' . $inner_row['total_reviews'] . ' reviews</u></span>';
                            } else {
                                echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i></span>';

                            }
                            echo '
                                </div>
                            </div>
                        </div>
                    </div>' ; }?>

                        ?>

                    </div>
                </div>
            </div>
        </section>
        <!--slider-end-------->


    </div>
</section>


<section style="margin: auto; width: 100%;">
    <div style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container" style="display: block !important;">
            <h1 style="font-size: 22px; font-weight: 600">Special offers for </h1>
            <h1 style="font-size: 22px; font-weight: 600"> <span style="color: #0CB4BF">Diamond members</span> only</h1>

        </div>

        <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

        <section class="product-slider">

            <!--==heading====================-->
            <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">


                        <?php
                        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.

                        $stmt = "SELECT * FROM services WHERE approval = 'approved' AND is_special = 1 AND scountry ='UAE'";


                        $result = $con->query($stmt);




                        ?>

                        <?php

                        while ($row = $result->fetch_assoc()) {
                            $sname = mb_strimwidth($row['sname'], 0, 35, "...");
                            $stmt = "SELECT COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM reviews r WHERE r.sunique = '{$row['id']}' ";

                            $inner_result = $con->query($stmt);
                            $inner_row = $inner_result->fetch_assoc();

                            $avgRating = round($inner_row['average_rating'] ?? 0,1) == 0 ? 'New' :  round($inner_row['average_rating'] ?? 0,1);




                            if ($row['transaction_type'] == 'consulation') {
                                $page = "book.php";
                            } elseif ($row['transaction_type'] == 'treatment') {
                                $page = "book-treatment.php";
                            } else {
                                $page = "book-max.php";
                            }
                            if($userlevel == 8000) {
                                echo '


					<!--1================================-->
                    <div class="swiper-slide">
                    <!--box----------------------->
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                   <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $sname . '</h1>
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" >
                                </div>

                                <!--img=============-->
                                <div class="product-img">
                                    <a href="' . $page . '?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">';
                                if($inner_row['total_reviews'] >= 10) {

                                    echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>' . $inner_row['total_reviews'] . ' reviews</u></span>';
                                } else {
                                    echo '<span>' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i></span>';

                                }
                                echo '
                                </div>
                            </div>
                        </div>
                    </div>' ;
                            } else {
                                echo '


					<!--1================================-->
                    <div class="swiper-slide">
                    <!--box----------------------->
                        <div class="product-box";>

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                </div>

                                <!--img=============-->
                                <div class="product-img" style="display: flex; justify-content: center; align-items: center;">
    <a href="book-treatment.php?cunique=125&id=131">
        <div class="overlay-black" style="z-index: 0;">
            <img style="width: 66px; height: 66px; display: block; margin: auto;" alt="" src="assets/images/vector.png">
        </div>
    </a>
</div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">
                                    <span style="color:white !important">.</span>
                                </div>
                            </div>
                        </div>
                    </div>' ;
                            }
                        }?>

                    </div>
                </div>
            </div>
        </section>
        <!--slider-end-------->


    </div>
</section>


<!-- ------------------------------------------------------------------------- -->




















<script>
    // Get the modal
    var modal = document.getElementById("menuModal");

    // Get the button that opens the modal
    var btn = document.getElementById("menuBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closeMenu")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!-- slider js -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>

<script>
    var player;
    var playerReady = false;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('yt-frame', {
            events: {
                'onReady': onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
        playerReady = true;
        event.target.pauseVideo();
        event.target.unMute();
        event.target.seekTo(0);
    }

    function playVideo() {

        var customPlayButton = document.querySelector('.custom-play-button-wrapper');
        if (customPlayButton) {
            console.log('here')
            customPlayButton.style.display = 'none';
        }

        if (playerReady && player && player.playVideo) {
            player.playVideo();
        } else {
            console.error("Player is not initialized or playVideo method is not available.");
        }
    }
</script>

<script>
    /*Initialize Swiper*/
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        breakpoints: {
            360: {
                slidesPerView: 1.5,
                spaceBetween: 5,
            },
            540: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
    });

    var swiperNewClinics = new Swiper(".mySwiperNewClinics", {
        slidesPerView: "auto",
        spaceBetween: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
    });


    $('#yt-frame').on('load', function() {
        $(this).data('loaded', true);
        console.log("Iframe is loaded");
    });
</script>

<?php

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
$stmt->fetch();
$stmt->close();

?>

        <!--- Sharing Referral Code -->
<script>
    const shareButton = document.getElementById('share-button');
    const textToShare = "Join me and Download the Aesthetic Links App! Get a 5% discount on your first booking with my Referral Code: *<?=$profilelevel?>*. Download the App on https://apps.apple.com/app/id6477182130";

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

</body>
</html>