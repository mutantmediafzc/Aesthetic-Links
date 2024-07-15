<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...

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
    <meta name="description" content="Discover and book at the best aesthetic clinics in Dubai and Switzerland. Trusted by users for authentic reviews and word-of-mouth recommendations only. Get exclusive discounts on treatments from the best clinics. Join our community and elevate your beauty journey today!">
    <title>Aesthetic Links | Your gateway to the best aesthetic clinics</title>

    <link rel="stylesheet" href="assets/styles/swiper-bundle.min.css">

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
        /*width: 93%; */
        /*height: auto; */
        /*margin-top: 18vw; */
        /*margin-left: 2.5%; */
        /*display: flex; */
        /*align-items: center;*/
        left: 15px;
        bottom: 15px;
    }

    .clinic-text-location h1 {
        width: 100%;
        margin: 0 !important;
        color: #fff;
        font-size: 38px;
        text-align: left;
        margin-top: 45px;
        font-weight: 500;
    }

    .clinic-text-service {
        position: absolute;
        /*width: 93%; */
        /*height: auto; */
        /*margin-top: 18vw; */
        /*margin-left: 2.5%; */
        /*display: flex; */
        /*align-items: center;*/
        bottom: 10px;
        left: 10px;
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
        height: auto;
        border-radius: 25px;
        background-color: #0CB4BF;
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
        overflow-y: hidden;
    }

    .wrapper::-webkit-scrollbar{
        width: 0;
    }

    .wrapper .item {
        min-width: 95%;
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
        border-radius: 15px;
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

    .yt-ipad {
        display: none;
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

    .text-section {
        display: none;
    }
    /*download-app-section*/
    .download-app-section {
        display: none;
    }

    /*search-section*/
    .search-section {
        display: none;
    }

    @media only screen and (max-device-width: 767px) {

        /*.clinic-text-location {*/
        /*    position: absolute;*/
        /*    width: 93%; */
        /*    height: auto; */
        /*    margin-top: 39vw; */
        /*    margin-left: 4%; */
        /*    display: flex; */
        /*    align-items: center;*/
        /*}*/

        .clinic-text-location h1 {
            width: 100%;
            margin: 0;
            color: #fff;
            font-size: 12pt;
            text-align: left;
            margin-top: 0;
            font-weight: 550;
        }

        /*.clinic-text-service {*/
        /*position: absolute;*/
        /*width: 93%; */
        /*height: auto; */
        /*margin-top: 45vw;*/
        /*margin-left: 4%; */
        /*display: flex; */
        /*align-items: center;*/
        /*}*/

        .clinic-text-service h1 {
            /*width: 100%; */
            /*margin: 0; */
            /*color: #fff; */
            /*font-size: 12pt; */
            /*text-align: left;*/
            /*margin-top: 0; */
            font-weight: 550;
            color: #fff;
            font-size: 12pt;
            text-align: left;
            margin: 0 !important;
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
            height: auto;
            border-radius: 10px;
            background-color: #0CB4BF;
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
            height: 28vh;
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
            min-width: 95%;
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

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  {

        /*.clinic-text-location {*/
        /*     position: absolute;*/
        /*     width: 93%; */
        /*     height: auto; */
        /*     margin-top: 30vw; */
        /*     margin-left: 4%; */
        /*     display: flex; */
        /*     align-items: center;*/
        /* }*/

        .clinic-text-location h1 {
            width: 100%;
            margin: 0;
            color: #fff;
            font-size: 16pt;
            text-align: left;
            margin-top: 0;
            font-weight: 550;
        }

        /*.clinic-text-service {*/
        /*position: absolute;*/
        /*width: 93%; */
        /*height: auto; */
        /*margin-top: 30vw; */
        /*margin-left: 4%; */
        /*display: flex; */
        /*align-items: center;*/
        /*}*/

        .clinic-text-service h1 {
            /*width: 100%; */
            /*margin: 0; */
            /*color: #fff; */
            /*font-size: 16pt; */
            /*text-align: right;*/
            /*margin-top: 0; */
            font-weight: 550;
            color: #fff;
            font-size: 16pt;
            text-align: left;
            margin: 0 !important;
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
            height: auto;
            border-radius: 10px;
            background-color: #0CB4BF;
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
            height: 28vh;
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
            min-width: 95%;
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

    @media only screen and (min-device-width: 1025px) and (max-device-width: 1440px) {
        .spacer {
            height: 150px;
        }

        .yt-container {
            margin: 0;
            width: 47%;
            height: 395px;
            margin-left: 72px;
        }

        .yt-section {
            margin: 0 !important;
            display: flex;
            gap: 50px;
            margin-top: 150px !important;
        }

        .text-section {
            display: block;
            margin: auto 0;
        }

        .yt-text-title {
            font-size: 34px;
            font-weight: 600;
        }

        .yt-text-content {
            font-size: 24px;
            letter-spacing: 0.03em;
            max-width: 500px;
            line-height: 30px;
        }

        .product-box {
            height: 250px;
            width: 275px;
        }

        .clinic-text-service {
            bottom: 15px;
            left: 15px;
        }

        .product-box h1 {
            /*font-size: 16px;*/
            /*font-weight: 400;*/
            /*    margin-top: -35% !important;*/
            /*    margin-left: 10px;*/
            /*text-align: left;*/
            color: #fff;
            font-size: 16px;
            text-align: left;
            margin: 0 !important;
        }

        .clinic-logo-box {
            height: 60px;
            width: 60px;
        }

        .wrapper {
            justify-content: start;
        }

        .web-nav {
            display: block !important;
        }

        .download-app-container {
            display: flex;
            justify-content: space-evenly;
            /*padding: 50px 0;*/
            padding-top: 50px;
        }

        .download-app-container > div:first-child {
            padding-bottom: 50px;
        }

        .download-now-txt {
            font-size: 32px;
            font-weight: 600;
            max-width: 300px;
            line-height: 35px;
        }

        .book-appnt-txt {
            font-size: 24px;
            max-width: 400px;
            line-height: 30px;
        }
        .app-img {
            height: 440px;
            width: 350px;
        }

        .discount-txt {
            font-size: 32px !important;
            width: 500px !important;
        }

        .share-app-txt {
            font-size: 24px !important;
            line-height: 26px;
            margin-top: 10px !important;
            width: 450px !important;
        }

        .my-referrals-btn {
            font-size: 16px !important;
        }

        .referral-btn-container {
            display: block !important;
            width: auto;
            margin: 0;
            margin-left: auto !important;
            margin-top: auto !important;
            margin-bottom: auto !important;
        }

        .referral-container {
            display: flex !important;
            justify-content: center !important;
            padding: 50px;
        }

        .referral {
            margin: 50px auto;
            width: 70%;
        }

        .item {
            min-width: 450px !important;
            max-width: 450px !important;
            height: 300px !important;
        }

        .clinic-city {
            margin-top: -35% !important;
            font-size: 28px !important;
        }

        .wrapper {
            margin: 0 !important;
        }

        .clinic-name {
            font-size: 20px !important;
        }

        .clinic-rating {
            font-size: 20px !important;
        }

        .download-app-section {
            display: block;
        }
        .section-title-container {
            margin-bottom: 32px;
            margin-top: 5rem;
        }
    }

  
    @media only screen and (min-device-width: 701px) {
        .spacer {
            height: 100px;
        }
    
        .yt-container {
            margin: 0;
            width: 800px;
            height: 573px;
            position: relative;
        }
    
        .yt-ipad {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }
    
        .yt-container iframe {
            height: 92%;
            width: 94%;
            margin: 23px;
            z-index: 1;
            position: absolute;
            border-radius: 10px;
        }
    
        .yt-section {
            margin: 0;
            display: flex;
            gap: 50px;
            margin-top: 150px;
            justify-content: center;
        }
    
        .text-section {
            display: block;
            margin: auto 0;
        }
    
        .yt-text-title {
            font-size: 34px;
            font-weight: 600;
        }
    
        .yt-text-content {
            font-size: 24px;
            letter-spacing: 0.03em;
            max-width: 500px;
            line-height: 30px;
        }
    
        .product-box {
            height: 220px;
            width: 220px;
        }
    
        .product-box h1 {
            color: #fff;
            font-size: 12pt;
            text-align: left;
            margin: 0 !important;
        }
    
        .clinic-logo-box {
            height: 60px;
            width: 60px;
        }
    
        .wrapper {
            justify-content: start;
        }
    
        .web-nav {
            display: block !important;
        }
    
        .download-app-container {
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
    
        .download-app-container > div:first-child {
            padding-bottom: 50px;
        }
    
        .app-img {
            width: 450px;
            height: 550px;
        }
    
        .download-now-txt {
            font-size: 32px;
            font-weight: 600;
            max-width: 300px;
            line-height: 35px;
            font-size: 42px;
            max-width: 50%;
            margin: 0;
            line-height: 60px;
        }
    
        .book-appnt-txt {
            font-size: 24px;
            max-width: 400px;
            line-height: 30px;
            font-size: 28px;
            max-width: 55%;
            line-height: 40px;
            margin-top: 16px;
        }
    
        .discount-txt {
            font-size: 32px !important;
            width: 500px !important;
        }
    
        .share-app-txt {
            font-size: 24px !important;
            line-height: 26px;
            margin-top: 10px !important;
            width: 450px !important;
        }
    
        .my-referrals-btn {
            font-size: 16px !important;
        }
    
        .referral-btn-container {
            display: block !important;
            width: auto;
            margin: 0;
            margin-left: auto !important;
            margin-top: auto !important;
            margin-bottom: auto !important;
        }
    
        .referral-container {
            display: flex !important;
            justify-content: center !important;
            padding: 50px;
        }
    
        .referral {
            margin: 50px auto;
            width: 70%;
        }
    
        .item {
            min-width: 450px !important;
            max-width: 450px !important;
            min-width: 452.5px !important;
            max-width: 452.5px !important;
            height: 300px !important;
        }
    
        .clinic-city {
            margin-top: -85% !important;
            font-size: 28px !important;
        }
    
        .wrapper {
            margin: 0 !important;
        }
    
        .clinic-name {
            font-size: 20px !important;
        }
    
        .clinic-rating {
            font-size: 20px !important;
        }
    
        .download-app-section {
            display: block;
        }
    
        .section-title-container {
            margin-bottom: 32px;
            margin-top: 5rem;
        }
    
        .section-title-container h1 {
            font-size: 28px;
        }
    
        .referral {
            display: none;
        }
    
        .search-section {
            display: block;
            width: 75%;
            margin: auto;
            height: 100%;
            margin-bottom: 120px;
            margin-top: 50px;
        }
    
        .search-section > div {
            background: #47afb5;
            height: 500px;
            border-radius: 20px;
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-direction: column;
        }
    
        .search-section > div p {
            font-size: 42px;
            letter-spacing: -1px;
            font-weight: 600;
            color: #fff;
        }
    
        .search-section > div > div:not(.separator) {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            margin-bottom: 55px;
            width: 650px;
            background: #fff;
            border-radius: 15px;
            padding: 12px;
        }
    
        .search-section > div button.search {
            background: #0C1E36;
            color: #fff;
            border: 0;
            border-radius: 10px;
            font-size: 22px;
            padding: 25px;
            font-weight: 600;
            max-width: 250px;
            cursor: pointer;
        }
    
        .search-section > div select {
            border: 0;
            padding: 22px 30px;
            font-size: 22px;
            outline: none;
            cursor: pointer;
        }
    
        .search-section > div .separator {
            height: 75%;
            border-left: 1.8px solid #606060;
        }
    
        .search-section > div button.btn-filter {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #fff;
            color: #000;
            border: 0;
            border-radius: 10px;
            font-size: 22px;
            padding: 22px 50px;
            cursor: pointer;
        }
    
        .custom-container {
            width: 75% !important;
        }
    }
    
    
    //////////////////////////////////////////////////////
    
    @media only screen and (max-width: 1320px) and (min-width: 998px) {
        .search-section {
            margin-top: 100px;
        }
        

        
        
        
        
    }
    
    @media only screen and (max-width: 997px) {
        .search-section {
            margin-top: 150px;
        }
        
        
        
        
        
    }
    


   @media only screen and (max-width: 1320px) and (min-width: 701px) {
        .download-app-container {
        margin: 0px 77px;
        }
       
        .download-now-txt {
        font-size: 32px;
        max-width: 70%;
       
        }
       
       
       .book-appnt-txt {
        font-size: 20px;
        max-width: 70%;
       }
       
       
       
       
       
       
       
       
       
       
       
       
       
       
   }


   @media only screen and (max-width: 1023px) and (min-width: 701px) {
        .custom-container {
        width: 50% !important;
    }
       
       
       
       
       
       
       
       
       
       
       
   }






@media screen and (min-width: 700px) and (max-width: 922px) {
    
    .search-section > div select {
        font-size: 16px;
    }
    
    
    .search-section > div button.btn-filter {
        font-size: 16px;
    }
    .search-section > div button.search {
        font-size: 16px;
    }
    .search-section > div > div:not(.separator) {
        gap: 0px;
        width: 484px;
    }
    
        .custom-container {
        width: 87% !important;
    }
    
    
    
    
    
}







</style>



<body>

<?php include 'web-nav.php'; ?>
<?php include 'nav.php'; ?>



<?php require_once 'server.blade.php';?>

        <!---- Menu Start --->

<?php include 'menu.php'; ?>


        <!---- Menu End ----->

<!-- ----------------------------menu modal end------------------------ -->

<section class="spacer"></section>

<section class="referral">
    <div class="referral-container">
        <div>
            <div style="width: 90%; height: auto; margin: auto;">
                <h1 class="discount-txt">Unlock Extra Discounts!</h1>
            </div>
            <div style="width: 90%; height: auto; margin: auto; line-height: 1.2;">
                <p class="share-app-txt">Share our app with your friends and enjoy an additional 5% off on any service.</p>
            </div>
        </div>
        <div class="referral-btn-container">
            <div class="referral-btn" syle="width: 100%;">
                <a href="referral-test.php?profilelevel=<?=$profilelevel?>">
                    <button class="my-referrals-btn"><i class="fa-solid fa-share-nodes"></i> my referrals</button>
                </a>
            </div>
            <!--<div class="referral-btn">
                    <p style="display:none;">Join me and Download the Aesthetic Links App. My Referral Code is: <?=$profilelevel?></p>
                    <button id="share-button"><i class="fa-solid fa-link"></i> share my referral code</button>
                </div>-->
        </div>
    </div>

</section>
<!-- filter section -->
<section class="search-section">
    <div style="background-image: url('https://aestheticlinks.com/app_x/views/assets/images/banner.jpeg')">
        <p>Find the Best Clinics</p>
        <div>
            <button class="btn-filter" id="btn-filter">
                <img src="https://aestheticlinks.com/app_x/views/assets/images/filter.svg" height="22">
                Filters
            </button>
            <div class="separator"></div>
            <select>
                <option selected>Dubai</option>
                <option>Switzerland</option>
            </select>
            <button class="search">Search</button>
        </div>
    </div>
</section>
<!-- end -->
<section class="download-app-section" style="background-color: #f7f8f8; margin-top: 150px;" id="download-app-section">
    <div class="download-app-container">
        <div>
            <p class="download-now-txt">Download the Application now!</p>
            <p class="book-appnt-txt">Book your appointments on the go with Aesthetic Links mobile app</p>
            <div>
                <img class="google-play-img" src="https://web.aestheticlinks.com/assets/images/google-play.png" alt="" height="50">
                <img class="app-store-img" src="https://web.aestheticlinks.com/assets/images/app-store.png" alt="" height="50">
            </div>
            <div>
                <img class="qr-code-img" src="https://web.aestheticlinks.com/assets/images/qr-code.png" alt="" height="100" style="margin-top: 20px;">
            </div>
        </div>
        <div class="app-img-container">
            <img class="app-img" src="https://web.aestheticlinks.com/assets/images/app-sample.png" alt="" height="400">
        </div>
    </div>


</section>

<!-- ----------------------------video start------------------------ -->

<section style="margin: auto; width: 100%; margin-top: 5%;" class="yt-section">
    <div class="yt-container">
        <img class="yt-ipad" src="https://web.aestheticlinks.com/assets/images/ipad.png" alt="">
        <iframe src="https://www.youtube.com/embed/6LCpG2YPUw8?rel=0&amp;autoplay=1&mute=1&loop=1" width="100%" height="90%" frameborder="0"></iframe>
    </div>
    <div class="text-section">
        <p class="yt-text-title">Get to know us!</p>
        <p class="yt-text-content">Dive into our journey, cool features, and join the Aesthetic Links community!</p>
    </div>
</section>

<!-- ----------------------------video end------------------------ -->

<!-- ----------------------------------------- slider top rated clinics------------------------------------------- -->

<!--///////////////////////-->
<section style="margin: auto; width: 100%; margin-top: 5%;">
    <div class="custom-container" style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_POST['filters']) || isset($_POST['gender_preference']) )) { ?>
            <h1>Result Clinics</h1>
            <?php } else { ?>
            <h1>Browse Top Rated Clinics</h1>
            <?php } ?>
        </div>

        <!-- Unique Swiper container class -->
        <div class="swiper mySwiperClinics">
            <!-- Swiper wrapper -->
            <div class="swiper-wrapper">
                <!-- Dynamic content from PHP -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_POST['filters']) || isset($_POST['gender_preference']) )) {
                    if (!isset($_POST['filters'])) {
                        $selectedServices = [];
                    } else {
                        $selectedServices = $_POST['filters'];
                    }
                    $gender = $_POST['gender_preference'];
                    $ctypeConditions = [];

                    if ($gender != 'all') {
                        if ($gender == 'male') {
                            $ctypeConditions[] = "c.ctype IN ('For Male', 'For Male &amp; Female')";
                        } elseif ($gender == 'female') {
                            $ctypeConditions[] = "c.ctype IN ('For Female', 'For Male &amp; Female')";
                        }
                    }

                    $ctypeCondition = '';

                    if (!empty($ctypeConditions)) {
                        $ctypeCondition = "AND (" . implode(' OR ', $ctypeConditions) . ")";
                    }

                    $selectedServicesCondition = '';
                    if (!empty($selectedServices)) {
                        $selectedServicesCondition = "AND s.subcat IN ('" . implode("', '", $selectedServices) . "')";
                    }

                    $havingClause = '';
                    if (!empty($selectedServices)) {
                        $havingClause = "HAVING COUNT(DISTINCT s.subcat) = " . count($selectedServices);
                    }

                    $stmt = "SELECT c.*, COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci JOIN services s ON c.cunique = s.cunique WHERE 1=1 AND c.ccountry = 'UAE' $ctypeCondition $selectedServicesCondition AND c.approval = 'approved' AND c.recommended = 1 GROUP BY c.cunique $havingClause";
                } else {
                    $stmt = "SELECT * FROM clinics WHERE approval = 'approved' AND ccountry ='UAE'";
                }
                $result = $con->query($stmt);
                while ($row = $result->fetch_assoc()) {
                    echo '


                    <!-- Swiper slide -->
                    <div class="swiper-slide" style="height:400px;">
                        <div style="width: 100%; height: 80%;">
                            <div class="img-container-item">
                                <div class="clinic-text-location" style="z-index: 1;">
                                    <h1 style="margin-top:-30px;" class="clinic-city">' . htmlspecialchars($row['ccity']) . ', ' . htmlspecialchars($row['ccountry']) . '</h1>
                                </div>
                                <a href="clinic-details.blade.php?id=' . htmlspecialchars($row['id']) . '&cunique=' . htmlspecialchars($row['cunique']) . '">
                                    <div class="overlay-black" style="z-index: 0;">
                                        <img src="assets/images/clinic-images/' . htmlspecialchars($row['cunique']) . '.png">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="content-box-item">
                            <p class="clinic-name">' . htmlspecialchars($row['cname']) . '</p>
                            <span class="clinic-rating">' . htmlspecialchars($row['rating']) . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
                        </div>
                    </div>

                    ';
                }
                ?>
            </div>
            <!-- Swiper pagination -->
            <!--<div class="swiper-pagination"></div>-->
        </div>
    </div>
</section>


<!-- ----------------------------------------- slider top rated clinics end------------------------------------------- -->

<section style="margin: auto; width: 100%;">
    <div class="custom-container" style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container">
            <h1>Top Rated Face Treatments</h1>

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

                        $results = $result->fetch_all(MYSQLI_ASSOC);
                        shuffle($results);


                        ?>

                        <?php
                        foreach ($results as $row) {
                            echo '
				<!--1================================-->
                    <div class="swiper-slide">
                    <!--box----------------------->
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                    <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['sname'] . '</h1>
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                                </div>

                                <!--img=============-->

                                <div class="product-img">
                                    <a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">
                                    <span>NEW' . $row['srating'] . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
                                </div>
                            </div>
                        </div>
                    </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--slider-end-------->
    </div>
</section>

<!-- ------------------------------------------------------------------------- -->


<section style="margin: auto; width: 100%; margin-top: 5%;">
    <div class="custom-container" style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container">
            <h1>Top Rated Body Treatments</h1>

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

                        $results = $result->fetch_all(MYSQLI_ASSOC);
                        shuffle($results);


                        ?>

                        <?php
                        foreach ($results as $row) {
                            echo '
				<!--1================================-->
                <div class="swiper-slide">
                    <!--box----------------------->
                    <div class="product-box">
                        <!--img-container****************-->
                        <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                   <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['sname'] . '</h1>
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" >
                                </div>

                                <!--img=============-->
                                <div class="product-img">
                                    <a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">
                                    <span>NEW' . $row['srating'] . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
                                </div>
                            </div>
                        </div>
                    </div>
            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--slider-end-------->
    </div>
</section>

<!-- ------------------------------------------------------------------------- -->

<!-- ------------------------------------------------------------------------- -->


<section style="margin: auto; width: 100%; margin-top: 5%; margin-bottom: 10%;">
    <div class="custom-container" style="margin: auto; width: 90%; height: auto;">
        <div class="section-title-container">
            <h1>Top Rated Health & Wellness</h1>

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

                        $results = $result->fetch_all(MYSQLI_ASSOC);
                        shuffle($results);
                        ?>

                        <?php
                        foreach ($results as $row) {
                            echo '


					<!--1================================-->
                    <div class="swiper-slide">
                    <!--box----------------------->
                        <div class="product-box">
                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                   <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['sname'] . '</h1>
                                </div>

                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" >
                                </div>

                                <!--img=============-->
                                <div class="product-img">
                                    <a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">
                                    <span>NEW' . $row['srating'] . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
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

    var downloadBtnEl = document.getElementById('download-btn')
    var downloadSectionEl = document.getElementById('download-app-section')

    downloadBtnEl.addEventListener('click', () => {
        downloadSectionEl.scrollIntoView({ behavior: 'smooth' })
    })
</script>

<!-- slider js -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>

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
                spaceBetween: 20,
            },
            540: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1440: {
                slidesPerView: 5,
                spaceBetween: 10
            },
            1770: {
                slidesPerView: 5.5,
                spaceBetween: 5
            },
            1920: {
                slidesPerView: 6,
                spaceBetween: 5
            }
            //   1500: {
            //     slidesPerView: 5,
            //     spaceBetween: 10,
            //   },
            //   1700: {
            //     slidesPerView: 5,
            //     spaceBetween: 15,
            //   },
            //   2000: {
            //     slidesPerView: 6,
            //     spaceBetween: 15,
            //   },
        },
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

<script>
    // Separate Swiper initialization for "Browse Top Rated Clinics"
    var swiperClinics = new Swiper('.mySwiperClinics', {
        // Default settings
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        simulateTouch: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        mousewheel: true,
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is >= 1024px
            1024: {
                slidesPerView: 2,
                spaceBetween: 30
            },

        }
    });


    document.getElementById("btn-filter").addEventListener("click", function() {
        window.location.href = "filter-page.php";
    });
</script>


</script>


</body>
</html>