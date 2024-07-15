<?php
include 'session.php';
require_once 'server-connect.php';

?>
<?php
$cunique = $_GET['cunique'];
$id = $_GET['id'];


?>
<?php

// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
//     header('Location: login.blade.treatment.php?cunique=' . $cunique . '&id=' . $id);
//     exit;
// }
?>
<?php require_once 'server.blade.php';?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.min.css">
    <script src="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.iife.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>


    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <script src="js/mobiscroll.javascript.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<body>
<style>
    @font-face {
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
        url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }
    /* -------------------------------exoert modal-------------------------------------- */

    .expertmodal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }

    .expert-content {
        position: absolute;
        bottom: 0;
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: max-content;
        bottom: 0;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* -------------------------------time-------------------------------------- */

    .timemodal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }

    .time-content {
        position: absolute;
        bottom: 0;
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: max-content;
        bottom: 0;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /* -------------------------------calendar-------------------------------------- */

    .calendarmodal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }

    .calendar-content {
        position: absolute;
        bottom: 0;
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: max-content;
        bottom: 0;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /* --------------------------------menu------------------------------------- */

    .modal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: 25vh;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .closeMenu {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 1px solid #444444;
        float: right;
        font-size: 28px;
        font-weight: bold;
        right: 5%;
        margin-top: -150px;
    }

    .closeMenu:hover,
    .closeMenu:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-logo {
        width: 375px;
        height: auto;
    }

    .modal-item-box {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        column-gap: 60px;
    }


    .modal-item {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 110px;
        height: 110px;
        border: 1px solid #444444;
        border-radius: 50%;
    }

    .modal-item-icon {
        width: 45px;
        height: auto;
    }

    .modal-name-box {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        column-gap: 60px;
        margin-top: 10px;
    }

    .modal-name {
        width: 110px;
        height: auto;
    }

    .modal-p {
        width: 100%;
        text-align: center;
        font-size: 24px;
    }

    .modal-p-1 {
        width: 100%;
        text-align: center;
        font-size: 24px;
        margin-left: -35px;
    }

    .modal-content-box {
        margin: auto;
        width: 65%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 12%;
    }


    .back-btn {
        position: absolute;
        left: 5%;
        margin-top: 7vw;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border-style: none;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        background-color: #fff;

    }

    /* ------------------------------------------------------------------------- */
    body {

        margin: 0;
        padding: 0;
        font-family: 'poppinsregular';
        line-height: 1.5;
    }

    nav {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 5%;
        padding-bottom: 5%;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        z-index: 2;
        background-color: #fff;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;

    }

    .menu-btn {
        position: absolute;
        width: 85px;
        height: 85px;
        border-radius: 25px;
        background-color: #0C1E36;

    }

    .location-dropdown {
        width: 100%;
        height: 70pt;
        font-size: 28pt;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
        font-family: 'poppinsregular';
    }

    .service-details-img-section {
        width: 100%;
        height: 40vh;
    }

    .service-details-img-container {
        width: 100%;
        height: 100%;
        padding-top: 8vh;
    }

    .service-details-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    .back-btn {
        position: absolute;
        left: 5%;
        margin-top: 7vw;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border-style: none;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        background-color: #fff;

    }

    .service-details-section {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
    }

    .more-details-section {
        display: grid;
        grid-template-columns: repeat(2, 80% 20%);
        width: 100%;
        height: auto;
    }

    .address {
        width: 90%;
        margin-left: 6%;
    }

    .pricing-container {
        width: 90%;
        height: max-content;
        display: flex;
        justify-content: flexend;
        column-gap: 20px;

    }

    .offer-validity {
        width: 210%;
    }

    .consultation-fee {
        width: 90%;
        height: auto;
        display: flex;
        justify-content: space-between;
    }

    .service-description {
        width: 90%;
        height: auto;
    }

    .booking-btn-container {
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 10px;
        margin-bottom: 10%;
    }

    .book-now {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #0C1E36;
        background-color: #fff;
        border: 2px solid #0C1E36;
        border-radius: 20px;
        margin-top: 0;
    }

    /* --------------------------------calendar--------------------------------- */

    .calendar {
        width: 95%;
        height: 100%;
        margin: auto;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .month {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: transparent;
        color: #0C1E36;
        font-size: 38px;
        padding: 20px;
    }

    .prev,
    .next {
        font-size: 34px;
        cursor: pointer;
    }

    .days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .day {
        padding: 35px;
        text-align: center;
        font-size: 34px
    }

    .current-day {
        color: #0C1E36;
    }

    hr.solid {
        width: 100%;
        border-top: 10px solid #0CB4BF;
        margin: 0;
    }

    hr.solid-thin-line {
        width: 100%;
        border-top: 1px solid #ccc;
        margin: 0;
    }

    .book-now-calendar {
        margin: auto;
        width: 90%;
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin-top: 0;
    }

    /* --------------------------------calendar--------------------------------- */

    .time {
        width: 95%;
        height: max-content;
        margin: auto;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
    }

    /* ------------------------------------------------------------------------------------------- */

    .expert {
        width: 95%;
        height: max-content;
        margin: auto;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
        overflow-x: hidden;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }


    .expert::-webkit-scrollbar {
        display: none;
    }


    /* ------------------------------------------------------------------------------------------- */

    .radio-section {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 25px;
        row-gap: 25px;
        margin-bottom: 30px;
    }

    .radio-item [type="radio"] {
        display: none;

    }
    .radio-item {
        width: 100%;
        margin: auto;
    }
    .radio-item label {
        display: block;
        padding: 18px 10px;
        background: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        cursor: pointer;
        font-size: 38px;
        font-weight: 400;
        white-space: nowrap;
        position: relative;
        transition: 0.4s ease-in-out 0s;
        text-align: center;
        border: 2px solid #444444;

    }
    .radio-item label:after,
    .radio-item label:before {
        content: "";
        position: absolute;
        border: 0px;

    }
    .radio-item label:after {
        height: 19px;
        width: 19px;
        border: 0px solid #524eee;
        left: 19px;
        top: calc(50% - 12px);

    }
    .radio-item label:before {
        background: #524eee;
        height: 20px;
        width: 20px;
        left: 21px;
        top: calc(50%-5px);
        transform: scale(5);
        opacity: 0;
        visibility: hidden;
        transition: 0.4s ease-in-out 0s;
    }
    .radio-item [type="radio"]:checked ~ label {
        border-color: #0CB4BF;
        background-color: rgba(12, 180, 191, 0.5);
        border: 2px solid #0CB4BF;
        color: #fff;
    }

    /* ------------------------------------------------------------------------------------------- */



    label{
        display:block;
        line-height:40px;
    }
    .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        right: 0;
        bottom: 0;
        left: 0;
        height: 40px;
        width: 40px;
        transition: all 0.15s ease-out 0s;
        background: #cbd1d8;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
    }
    .option-input:hover {
        background: #9faab7;
    }
    .option-input:checked {
        background: #0CB4BF;
    }
    .option-input:checked::before {
        width: 25px;
        height: 25px;
        display:flex;
        content: '\f00c';
        font-size: 25px;
        font-weight:bold;
        position: absolute;
        align-items:center;
        justify-content:center;
        font-family:'Font Awesome 5 Free';
    }
    .option-input:checked::after {
        background: #0CB4BF;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
    }
    .option-input.radio {
        border-radius: 50%;
    }
    .option-input.radio::after {
        border-radius: 50%;
    }

    /*--------------------*/


    .filter-arrow-down {
        font-size: 24pt;
    }

    #hamburger-icon {
        color: #fff;
        font-size: 48px;
    }

    .modal-logo {
        width: 375px;
        height: auto;
    }

    .modal-item-box {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        column-gap: 60px;
    }


    .modal-item {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 110px;
        height: 110px;
        border: 1px solid #444444;
        border-radius: 50%;
    }

    .modal-item-icon {
        width: 45px;
        height: auto;
    }

    .modal-name-box {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        column-gap: 60px;
        margin-top: 10px;
    }

    .modal-name {
        width: 110px;
        height: auto;
    }

    .modal-p {
        margin: auto;
        width: 50%;


        font-size: 24px;
    }

    .modal-p-1 {
        width: 100%;
        text-align: center;
        font-size: 24px;
        margin-left: -95px;
    }

    .modal-content-box {
        margin: auto;
        width: 65%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 12%;
    }

    .back-btn {
        position: absolute;
        left: 5%;
        margin-top: 7vw;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border-style: none;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        background-color: #fff;

    }

    #back-arrow {
        color: #a1a1a1;
        font-size: 28px;
    }

    .service-title {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 48px;
    }

    .paragraph-3 {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 28px;
        margin-top: 20px;
        color: #444444;
    }

    .service-location {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 28px;
        color: #444444;
    }

    .service-gender {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 28px;
        color: #444444;
    }

    .service-consultation-price {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 28px;
    }

    .paragraph-4 {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 28px;
        color: #444444;
        text-align: right;
        margin-top: 15px;
    }

    .service-price-fee {
        width: max-content;
        margin: 0;
        padding: 0;
        font-size: 38px;
        text-align: right;
    }

    .service-description-text {
        width: 100%;
        height:175px;
        margin: 0;
        padding: 0;
        font-size: 28px
    }

    .btn-note {
        width: 100%;
        height:auto;
        margin: 0;
        padding: 0;
        font-size: 28px;
        color: #444444;
    }

    .choose-date-title {
        margin: auto;
        width: 90%;
        font-size: 38px;
    }


    .spacer-modal {
        margin-bottom: 30px;
    }

    .spacer-modal h1 {
        margin: 0;
        width: 45%;
        font-size: 38px;
    }

    .spacer-modal .back-modal {
        margin-top: 20px;
        width: 45%;
        font-size: 38px;
        font-weight: 500;
        color: #212121;
        font-family: 'poppinsregular';
        text-align: right;
        background-color: transparent;
        border-style: none;
        -webkit-tap-highlight-color: transparent;
    }

    .btn-container-modal {
        display: flex;
        width: 100;
        margin-bottom: 75px;
    }

    .service-name-box {
        width: 90%;
        display: grid;
        grid-template-columns: repeat(2, auto 1fr);
        margin-top: 5%;
        column-gap: 20px;
    }

    .confirm-btn-box {
        display: flex;
        width: 100;
        margin-bottom: 75px;
    }

    .line-divider-box {
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .doc-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 15px;
    }

    .doc-name {
        font-size: 34px
    }

    .expert-radio-section {
        height: 25vh;
        margin-bottom: 10px;
        overflow: scroll;
        overflow-x: hidden;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .expert-radio-section::-webkit-scrollbar {
        display: none;
    }

    /* -------------------------------discount-------------------------------------- */

    .discountmodal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {

        .service-details-img-container {
            width: 100%;
            height: 100%;
            padding-top: 0;
        }

        .closeMenu {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20pt;
            height: 20pt;
            border-radius: 50%;
            border: 1px solid #444444;
            float: right;
            font-size: 10pt;
            font-weight: bold;
            right: 7%;
            margin-top: 18pt;
        }

        .back-btn {
            position: absolute;
            left: 5%;
            margin-top: 5vw;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;

        }

        #back-arrow {
            color: #a1a1a1;
            font-size: 12pt;
        }

        .view-all-clinics {
            width: 90%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 5%;
        }


        nav {
            padding-top: 10pt;
            padding-bottom: 10pt;
        }

        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;

        }

        #filter-arrow-down {
            font-size: 10pt;
        }

        #hamburger-icon {
            color: #fff;
            font-size: 16pt;
        }

        .location-dropdown {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #212121;
            background-color: transparent;
            border-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .location-dropdown img {
            margin: 0;
        }

        .modal-logo {
            width: 125pt;
            height: auto;
        }

        .modal-item {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35pt;
            height: 35pt;
            border: 1px solid #444444;
            border-radius: 50%;
        }

        .modal-item-icon {
            width: 15pt;
            height: auto;
        }

        .modal-item-box {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 15pt;
        }


        .modal-name-box {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 15pt;
            margin-top: 10px;
        }

        .modal-name {
            width: 35pt;
            height: auto;
        }

        .modal-p {
            width: 100%;
            text-align: center;
            font-size: 8pt;
        }

        .modal-p-1 {
            width: 100%;
            text-align: center;
            font-size: 8pt;
            margin-left: -7pt;
        }

        .modal-content-box {
            margin: auto;
            width: 65%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 5%;
        }

        .service-title {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
        }

        .paragraph-3 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            margin-top: 5px;
            color: #444444;
        }

        .service-location {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            color: #444444;
        }

        .service-gender {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            color: #444444;
        }

        .service-consultation-price {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
        }

        .pricing-container {
            width: 85%;
            height: max-content;
            display: flex;
            justify-content: flexend;
            column-gap: 5px;
        }

        .paragraph-4 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            color: #444444;
            text-align: right;
            margin-top: 7px;
        }

        .service-price-fee {
            width: max-content;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            text-align: right;
        }

        .service-description-text {
            width: 100%;
            height:auto;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .btn-note {
            width: 100%;
            height:auto;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            color: #444444;
        }

        .book-now {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #0C1E36;
            background-color: #fff;
            border: 2px solid #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .calendar-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*------------------------------*/

        .calendar {
            width: 95%;
            height: 100%;
            margin: auto;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1px;
        }

        .month {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: transparent;
            color: #0C1E36;
            font-size: 14pt;
            padding: 5px;
        }

        .prev,
        .next {
            font-size: 10pt;
            cursor: pointer;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .day {
            padding: 15px;
            text-align: center;
            font-size: 12pt;
        }

        .current-day {
            color: #0C1E36;
        }

        hr.solid {
            width: 100%;
            border-top: 5px solid #0CB4BF;
            margin: 0;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        hr.solid-thin-line {
            width: 100%;
            border-top: 1px solid #ccc;
            margin: 0;
        }

        .book-now-calendar {
            margin: auto;
            width: 90%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .choose-date-title {
            margin: auto;
            width: 90%;
            font-size: 14pt;
            margin-bottom: 10px;
        }



        .spacer-modal {
            margin-bottom: 10px;
        }


        .btn-container-modal {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 10px;
        }

        /*------------------------------------------*/

        /* -------------------------------time-------------------------------------- */

        .timemodal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
        }

        .time-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .radio-section {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 10px;
            row-gap: 10px;
            margin-bottom: 10px;
        }

        .radio-item label {
            display: block;
            padding: 0px 5px;
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            cursor: pointer;
            font-size: 12pt;
            font-weight: 400;
            white-space: nowrap;
            position: relative;
            transition: 0.4s ease-in-out 0s;
            text-align: center;
            border: 1px solid #444444;

        }
        .radio-item label:after,
        .radio-item label:before {
            content: "";
            position: absolute;
            border: 0px;

        }
        .radio-item label:after {
            height: 19px;
            width: 19px;
            border: 0px solid #524eee;
            left: 19px;
            top: calc(50% - 12px);

        }

        .radio-item label:before {
            background: #524eee;
            height: 20px;
            width: 20px;
            left: 21px;
            top: calc(50%-5px);
            transform: scale(5);
            opacity: 0;
            visibility: hidden;
            transition: 0.4s ease-in-out 0s;
        }

        .radio-item [type="radio"]:checked ~ label {
            border-color: #0CB4BF;
            background-color: rgba(12, 180, 191, 0.5);
            border: 1px solid #0CB4BF;
            color: #fff;
        }

        .service-name-box {
            width: 90%;
            display: grid;
            grid-template-columns: repeat(2, auto 1fr);
            margin-top: 5%;
            column-gap: 10px;
        }

        .consultation-fee-box {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: auto;
            margin-top: 10px;
            margin-left: 20px;
        }

        .spacer-modal h1 {
            font-size: 14pt;
        }

        .spacer-modal .back-modal {
            font-size: 14pt;
        }

        .confirm-btn-box {
            display: flex;
            width: 100;
            margin-bottom: 25px;
        }

        /*------------------------------------------*/

        .expert-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .line-divider-box {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .doc-img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
        }

        .doc-name {
            font-size: 10pt;
        }

        /*------------------------------------------*/

        .option-input {

            height: 20px;
            width: 20px;

        }

        .option-input:checked::before {
            width: 20px;
            height: 20px;
            font-size: 10pt;

        }

        .expert-radio-section {
            height: 27vh;
            margin-bottom: 10px;
            overflow: scroll;
            overflow-x: hidden;
        }

        /* -------------------------------discount-------------------------------------- */

        .discountmodal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
        }
    }


    @media only screen and (max-device-width: 767px) {

        .service-details-img-container {
            width: 100%;
            height: 100%;
            padding-top: 0;
        }

        .closeMenu {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20pt;
            height: 20pt;
            border-radius: 50%;
            border: 1px solid #444444;
            float: right;
            font-size: 10pt;
            font-weight: bold;
            right: 7%;
            margin-top: 18pt;
        }

        .back-btn {
            position: absolute;
            left: 5%;
            margin-top: 25%;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;

        }

        #back-arrow {
            color: #a1a1a1;
            font-size: 12pt;
        }

        .view-all-clinics {
            width: 90%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 5%;
        }


        nav {
            padding-top: 5%;
            padding-bottom: 5%;
        }

        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;

        }

        #filter-arrow-down {
            font-size: 10pt;
        }

        #hamburger-icon {
            color: #fff;
            font-size: 16pt;
        }

        .location-dropdown {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #212121;
            background-color: transparent;
            border-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .location-dropdown img {
            margin: 0;
        }

        .modal-logo {
            width: 125pt;
            height: auto;
        }

        .modal-item {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35pt;
            height: 35pt;
            border: 1px solid #444444;
            border-radius: 50%;
        }

        .modal-item-icon {
            width: 15pt;
            height: auto;
        }

        .modal-item-box {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 15pt;
        }


        .modal-name-box {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 15pt;
            margin-top: 10px;
        }

        .modal-name {
            width: 35pt;
            height: auto;
        }

        .modal-p {
            width: 100%;
            text-align: center;
            font-size: 8pt;
        }

        .modal-p-1 {
            width: 100%;
            text-align: center;
            font-size: 8pt;
            margin-left: -7pt;
        }

        .modal-content-box {
            margin: auto;
            width: 65%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 5%;
        }

        .service-title {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
        }

        .paragraph-3 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            margin-top: 5px;
            color: #444444;
        }

        .service-location {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            color: #444444;
        }

        .service-gender {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            color: #444444;
        }

        .service-consultation-price {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .pricing-container {
            width: 85%;
            height: max-content;
            display: flex;
            justify-content: flexend;
            column-gap: 5px;
        }

        .paragraph-4 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            color: #444444;
            text-align: right;
            margin-top: 1vw;
        }

        .paragraph-5 {
            width: 90%;
            margin: auto;
            padding: 0;
            font-size: 10pt;
            color: #444444;
            text-align: left;
            margin-top: 1vw;
        }

        .service-price-fee {
            width: max-content;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            text-align: right;
        }

        .service-description-text {
            width: 100%;
            height:auto;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .btn-note {
            width: 100%;
            height:auto;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            color: #444444;
        }

        .book-now {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #0C1E36;
            background-color: #fff;
            border: 2px solid #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .calendar-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*------------------------------*/

        .calendar {
            width: 95%;
            height: 100%;
            margin: auto;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1px;
        }

        .month {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: transparent;
            color: #0C1E36;
            font-size: 14pt;
            padding: 5px;
        }

        .prev,
        .next {
            font-size: 10pt;
            cursor: pointer;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .day {
            padding: 15px;
            text-align: center;
            font-size: 12pt;
        }

        .current-day {
            color: #0C1E36;
        }

        hr.solid {
            width: 100%;
            border-top: 5px solid #0CB4BF;
            margin: 0;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        hr.solid-thin-line {
            width: 100%;
            border-top: 1px solid #ccc;
            margin: 0;
        }

        .book-now-calendar {
            margin: auto;
            width: 90%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .book-now-calendar-back {
            margin: auto;
            width: 90%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #0C1E36;
            background-color: #fff;
            border: 2px solid #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .choose-date-title {
            margin: auto;
            width: 90%;
            font-size: 14pt;
            margin-bottom: 10px;
        }

        .spacer-modal {
            margin-bottom: 10px;
        }

        .btn-container-modal {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 10px;
        }

        /*------------------------------------------*/

        /* -------------------------------time-------------------------------------- */

        .timemodal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
        }

        .time-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .radio-section {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 10px;
            row-gap: 10px;
            margin-bottom: 10px;
        }

        .radio-item label {
            display: block;
            padding: 0px 5px;
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            cursor: pointer;
            font-size: 12pt;
            font-weight: 400;
            white-space: nowrap;
            position: relative;
            transition: 0.4s ease-in-out 0s;
            text-align: center;
            border: 1px solid #444444;

        }
        .radio-item label:after,
        .radio-item label:before {
            content: "";
            position: absolute;
            border: 0px;

        }
        .radio-item label:after {
            height: 19px;
            width: 19px;
            border: 0px solid #524eee;
            left: 19px;
            top: calc(50% - 12px);

        }

        .radio-item label:before {
            background: #524eee;
            height: 20px;
            width: 20px;
            left: 21px;
            top: calc(50%-5px);
            transform: scale(5);
            opacity: 0;
            visibility: hidden;
            transition: 0.4s ease-in-out 0s;
        }

        .radio-item [type="radio"]:checked ~ label {
            border-color: #0CB4BF;
            background-color: rgba(12, 180, 191, 0.5);
            border: 1px solid #0CB4BF;
            color: #fff;
        }

        .service-name-box {
            width: 90%;
            display: grid;
            grid-template-columns: repeat(2, auto 1fr);
            margin-top: 5%;
            column-gap: 10px;
        }

        .consultation-fee-box {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: auto;
            margin-top: 10px;
        }

        .spacer-modal h1 {
            font-size: 14pt;
        }

        .spacer-modal .back-modal {
            font-size: 12pt;
        }

        .confirm-btn-box {
            display: flex;
            width: 100%;
            margin-bottom: 25px;
        }

        .confirm-btn-box-1 {
            display: flex;
            width: 100;
            margin-bottom: 10px;
        }

        /*------------------------------------------*/

        .expert-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .line-divider-box {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .doc-img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
        }

        .doc-name {
            font-size: 10pt;
        }

        /*------------------------------------------*/

        .option-input {

            height: 20px;
            width: 20px;

        }

        .option-input:checked::before {
            width: 20px;
            height: 20px;
            font-size: 10pt;

        }

        .expert-radio-section {
            height: 27vh;
            margin-bottom: 10px;
            overflow: scroll;
            overflow-x: hidden;
        }

        /* -------------------------------discount-------------------------------------- */

        .discountmodal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
        }
    }

    /*---------------------------------*/



    .button {
        display: inline-block;
        margin: 5px 5px 0 0;
        padding: 10px 30px;
        outline: 0;
        border: 0;
        cursor: pointer;
        background: #5185a8;
        color: #fff;
        text-decoration: none;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        font-weight: 100;
    }

    input {
        width: 100%;
        margin: 0 0 5px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 0;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        box-sizing: border-box;
        -webkit-appearance: none;
    }

    .mbsc-page {
        padding: 1em;
    }

    .this-discountdisplay {
        font-size: 16px !important;
        text-decoration: line-through;
        color: #787878;
        text-decoration-color: #46AFB4;
    }

    .that-discountdisplay {
        margin-top: 5px;
    }

    .then-discountdisplay {
        margin-top: 5px;
        color: #787878;
    }

    .this-nodisplay {

        text-decoration: none;

    }

    .that-nodisplay {

        display: none;

    }

    .then-nodisplay {

        display: none;

    }

    @media only screen and (min-device-width: 1024px) and (max-device-width: 1439px) {
        nav {
            display: none !important;
        }

        .doc-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .doc-name {
            font-size: 24px;
        }

        .radio-item label {
            padding: 1px;
            border-radius: 10px;
            font-size: 15px;
        }

        .radio-section {
            width: 100%;
            column-gap: 20px;
            row-gap: 15px;
            margin-bottom:0;
        }

        .consultation-fee-box {
            margin-left: 25px;
        }

        .time-content {
            background-color: #fefefe;
            margin-left: 17%;
            margin-right: 25%;
            width: 65%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }

        .calendarModal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
            display: flex !important;
            justify-content: center;
            align-items: center;
            padding: auto;
        }

        .paragraph-5 {
            margin-left: 10px;
            margin-right: 10px;
        }

        .expert-content {
            position: absolute;
            background-color: #fefefe;
            margin-left: 17%;
            margin-right: 25%;
            width: 65%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }

        .service-details-img-container {
            width: 90%;
            margin: 0 50px !important;
        }

        .service-details-img-container img {
            border-radius: 10px;
        }

        .book-now-section {
            position: static !important;
            left: 0px;
            bottom: 0px;
            height: auto;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .service-title {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
        }

        .paragraph-3 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            margin-top: 5px;
            color: #444444;
        }

        .service-location {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            color: #444444;
        }

        .service-gender {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            color: #444444;
        }

        .service-consultation-price {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
        }

        .pricing-container {
            width: 85%;
            height: max-content;
            display: flex;
            justify-content: flexend;
            column-gap: 5px;
        }

        .paragraph-4 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            color: #444444;
            text-align: right;
            margin-top: 7px;
        }

        .service-description-text {
            width: 100%;
            height:auto;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .back-btn {
            position: absolute;
            left: 10%;
            margin-top: 7vw;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            cursor: pointer;
        }

        .gender-container img {
            height: 18px !important;
            margin-top: 2px;
        }

        .service-name-box {
            margin-top: 20px !important;
        }

        .address {
            margin-left: 53px !important;
        }

        .service-price-container {
            margin-top: 10px !important;
        }
    }


    @media only screen and (min-device-width: 1024px) {
        .service-details-section {
            width: 100%;
            height: auto;
            display: block;
        }

        .service-price-fee {
            font-size: 18px !important;
        }

        .varies {
            font-size: 12px !important;
        }

        .address {
            margin: 0;
        }

        .service-title {
            margin: 0;
        }

        body {
            background-color: rgb(227, 227, 227);
        }

        .service-details-container {
            margin-top: 120px;
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 50px;
        }

        .service-details {
            background-color: white;
            max-width: 1000px;
            min-width: 650px;
            border-radius: 10px;
            padding-top: 30px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .back-btn {
            display: none;
        }

        .booking-btn-container {
            display: none;
        }

        .service-details-img-section {
            width: 100%;
            height: 45vh;
            margin: 0;
        }

        .service-details-img-container img {
            width: 100%;
            border-radius: 10px;
        }

        .service-title {
            font-size: 24px;
        }

        .container {
            margin: 0;
        }

        .service-gender {
            font-size: 16px;
        }

        .service-gender-img {
            height: 16px;
        }

        .service-gender {
            font-size: 12px;
        }

        .service-rating {
            display: none;
        }

        .display-none {
            display: none;
        }

        .service-consultation-price {
            font-size: 18px;
        }

        .service-subdetails {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .clinic-book-consultation-container {
            display: block;
            background-color: white;
            max-height: 205px;
            min-height: auto;
            border-radius: 10px;
            max-width: 375px;
            min-width: 375px;
        }

        .consultation-fee-box {
            margin-top: 10px;
        }

        .service-icons {
            margin-top: 5%;
            width: auto !important;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3px;
        }

        .icons {
            padding: 8px 8px;
            border: 1px solid black;
            border-radius: 99999px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav {
            display: none !important;
        }
    }

    .hidden-el {
        display: none;
    }


    @media only screen and (min-device-width: 1024px) and (max-device-width: 1024px) {
        .service-details-container {
            margin-top: 195px;
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 50px;
        }

        .consultation-fee-box {
            margin-left: 0;
        }
    }

    @media only screen and (min-device-width : 1440px) {
        nav {
            display: none !important;
        }

        .service-location {
            font-size: 12pt !important;
        }

        .back-btn {
            position: absolute;
            left: 18%;
            margin-top: 7vw;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            cursor: pointer;
        }

        .doc-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .doc-name {
            font-size: 24px;
        }

        .radio-item label {
            padding: 1px;
            border-radius: 10px;
            font-size: 15px;
        }

        .radio-section {
            width: 100%;
            column-gap: 20px;
            row-gap: 15px;
            margin-bottom:0;
        }

        .service-title {
            font-size: 24px;
        }

        .service-location {
            font-size: 24px;
        }

        .gender-container img {
            height: 18px !important;
            margin-top: 2px;
        }


        .paragraph-4 {
            font-size: 20px !important;
        }

        .service-price-fee {
            font-size: 24px !important;
            margin-right: 50px;
        }

        .time-content {
            background-color: #fefefe;
            margin-left: 17%;
            margin-right: 25%;
            width: 65%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }

        .spacer-modal h1 {
            font-size: 24px;
            margin-top: 30px !important;
        }

        .back-modal {
            font-size: 24px !important;
        }

        .book-now-calendar {
            height: 50px;
            font-size: 20px;
            border-radius: 10px;
        }

        .calendarModal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
            display: flex !important;
            justify-content: center;
            align-items: center;
            padding: auto;
        }

        .paragraph-5 {
            margin-left: 10px;
            margin-right: 10px;
        }

        .expert-content {
            position: absolute;
            background-color: #fefefe;
            margin-left: 17%;
            margin-right: 25%;
            width: 65%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }

        .book-now-section {
            position: static !important;
            left: 0px;
            bottom: 0px;
            height: auto;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        body {
            overflow-x: hidden !important;
        }

        .book-now {
            height: 50px;
            font-size: 20px;
            border-radius: 10px;
        }
    }


</style>

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

$today_date = date("m/d/Y");

?>
<?php include 'nav.php'; ?>
<?php include 'web-nav.php'; ?>

<!---- Menu Start --->

<?php include 'menu.php'; ?>


<input type="hidden" id="today_date" value="'.<?=$today_date?>.'">


<!---- Menu End ----->

<!-- ----------------------------menu modal end------------------------ -->


<!-- ----------------------------timings modal end------------------------ -->

<!-- time Modal -->
<div id="calendarModal" class="calendarmodal">

    <div class="black-bar-container">
        <div class="black-bar-modal"></div>
    </div>

    <!-- time Modal -->
    <div class="time-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">



        <div class="black-bar-container">
            <div class="black-bar-modal"></div>
        </div>

        <div class="spacer-modal">
            <h1 style="margin: auto; margin-top:20px; width: 90%; ">Choose a Date</h1>
        </div>
        <div style="color:#DC143C;width:100%;display:none; -webkit-display: block; width: 90%; margin: auto;" id="error_message">
            Please allow a minimum of 24 Hours.
        </div>
        <div class="spacer-modal">
            <hr class="solid">
        </div>


        <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 10px;">
            <div mbsc-page class="demo-date-picker">
                <div style="height: 35vh;">
                    <!--<div id="demo"></div>-->
                    <input id="date-input" mbsc-input style="display:none; height: none; widthL none;"/>
                </div>
            </div>
        </div>

        <div class="confirm-btn-box"><button class="book-now-calendar" id="confirm-time" onclick="openTime()">Confirm</button></div>


    </div>

</div>

<!-- ----------------------------timings modal end------------------------ -->


<!-- ----------------------------timings modal end------------------------ -->

<!-- time Modal -->
<div id="timeModal" class="timemodal">

    <div class="black-bar-container">
        <div class="black-bar-modal"></div>
    </div>

    <!-- time Modal -->
    <div class="time-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">



        <div class="black-bar-container">
            <div class="black-bar-modal"></div>
        </div>

        <div id="spacer-modal-two" class="spacer-modal" >
            <p id="Choose-a-Time">Choose a Time</p>
            <button class="back-modal" onclick="backCalendar()"><i class="fa-solid fa-arrow-left" style="-webkit-text-stroke: 0.5px white;"></i>&nbsp;Back</button>
        </div>

        <div class="spacer-modal">
            <hr class="solid">
        </div>

        <div class="spacer-modal">
            <p class="paragraph-5">If the clinic needs to reschedule, they will reach out to you directly.</p>
        </div>

        <div class="time">
            <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 10px;">
                <div class="radio-section">
                    <div class="radio-item"><input name="radio" id="radio1" onclick="function1()" type="radio"><label for="radio1">10:00</label></div>
                    <div class="radio-item"><input name="radio" id="radio2" onclick="function2()" type="radio"><label for="radio2">11:00</label></div>
                    <div class="radio-item"><input name="radio" id="radio3" onclick="function3()" type="radio"><label for="radio3">12:00</label></div>
                    <div class="radio-item"><input name="radio" id="radio4" onclick="function4()" type="radio"><label for="radio4">13:00</label></div>
                    <div class="radio-item"><input name="radio" id="radio5" onclick="function5()" type="radio"><label for="radio5">14:00</label></div>
                    <div class="radio-item"><input name="radio" id="radio6" onclick="function6()" type="radio"><label for="radio6">15:00</label></div>
                    <div class="radio-item"><input name="radio" id="radio7" onclick="function7()" type="radio"><label for="radio7">16:00</label></div>
                    <div class="radio-item"><input name="radio" id="radio8" onclick="function8()" type="radio"><label for="radio8">17:00</label></div>


                </div>
            </div>
        </div>

        <div class="confirm-btn-box"><button class="book-now-calendar" id="confirm-time" onclick="openExpert()">Confirm</button></div>


    </div>

</div>

<!-- ----------------------------timings modal end------------------------ -->

<!-- ----------------------------discount modal end------------------------ -->

<!-- time Modal -->
<div id="discountModal" class="discountmodal">

    <div class="black-bar-container">
        <div class="black-bar-modal"></div>
    </div>

    <!-- time Modal -->
    <div class="time-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">

        <div class="black-bar-container">
            <div class="black-bar-modal"></div>
        </div>


        <div id="spacer-modal-two" class="spacer-modal" >
            <p id="Choose-a-Time">Enter discount code</p>
            <button class="back-modal" onclick="backExpert()"><i class="fa-solid fa-arrow-left" style="-webkit-text-stroke: 0.5px white;"></i>&nbsp;Back</button>
        </div>

        <div class="spacer-modal">
            <hr class="solid">
        </div>
        <div style=";width:100%;display:none; width: 90%; margin: auto;" id="alert_success" class="alert alert-success">
            Discount Code Applied
        </div>
        <div style="color:#DC143C;width:100%;display:none; width: 90%; margin: auto;" id="alert_danger" class="alert alert-danger">
            Invalid Discount Code
        </div>
        <div class="expert">
            <div class="spacer-modal">
                <p class="paragraph-5" style="margin-left: 20px !important;">You may skip this window if you don't have one.</p>
            </div>

            <div class="time">
                <input type="text" id="discountCode" name="discountcode" placeholder="" style="text-indent: 10px; border-radius: 8px;">
            </div>
        </div>

        <div class="confirm-btn-box"><button class="book-now-calendar" id="confirm-discount" onclick="confirmSched()">Confirm</button></div>
    </div>

</div>

<!-- ----------------------------discount modal end------------------------ -->

<!-- ----------------------------experts modal end------------------------ -->
<?php

$serviceId = isset($_GET['cunique']) ? strval($_GET['cunique']) : null;
$cserviceId = isset($_GET['id']) ? strval($_GET['id']) : null;
// Connect to database
// Define your SQL query to select all projects
//	$stmt = "SELECT * FROM services WHERE cunique = '$serviceId' AND id = '$cserviceId'";
// In this case we can use the account ID to get the account info.
$stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique WHERE s.cunique = '$serviceId' AND s.id = '$cserviceId'";

$result = $con->query($stmt);


?>

<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $avgRating = round($row['average_rating'] ?? 0,1) == 0 ? 'New' :  round($row['average_rating'],1);

        ?>

        <?php

        echo '
        <div id="expertModal" class="expertmodal">

                            

        <!-- expert Modal -->
        <div class="expert-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">



            <div class="black-bar-container">
                <div class="black-bar-modal"></div>
            </div>

            <div class="spacer-modal" style="display:flex; justify-content: center; align-items: center;">
                <h1 style="margin-top: 20px;">Choose an Expert</h1>
                <button class="back-modal" onclick="backTime()"><i class="fa-solid fa-arrow-left" style="-webkit-text-stroke: 0.5px white;"></i>&nbsp;Back</button>
            </div>
            <div class="spacer-modal">
                <hr class="solid">
            </div>

            <div class="expert">
                <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 15px; overflow-x: hidden:">
                    <div class="expert-radio-section">
                        <div class="py">
                            
                            <!---------------------------------------------------------------------------->
                            
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 80%); column-gap: 2%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/placeholder.jpeg" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">Any / No Preference</h1></div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="any" onclick="anyexpert()" value="any" name="example" checked />
                                    </label>                                                        
                                </div>
                                
                                <br><br>
                                
                                

                            </div>
                            
                            <div class="test-box" id="text-input" style="width: 100%; height: auto;">
                                <p style="font-size: 11.5px;"><i style="color:#46AFB4;" class="fa fa-info-circle" aria-hidden="true"></i> <i style="color: #000;">Specify if you only want a male or female expert or any other requirements</i></p>
                                <input type="text" id="specifyPref" name="specifypref" placeholder="" style="text-indent: 10px;">
                                
                                
                                
                            </div>
                            
                            <!---------------------------------------------------------------------------->
                            
                            <div style="display: none">
                            <div class="line-divider-box">
                                <hr class="solid-thin-line">
                            </div>
                            <div id="firstDiv">
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 75%); column-gap: 5%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/experts/'.$row['expert_id_1'].'.jpg" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">'.$row['expert_name_1'].'</h1></div>

                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="firstEX1" onclick="firstexpert()" value="'.$row['expert_id_1'].'" name="example"/>
                                    </label>                                                        
                                </div>

                            </div>
                            <!---------------------------------------------------------------------------->
                            
                            <div class="line-divider-box">
                                <hr class="solid-thin-line">
                            </div>
                            </div>

                            <div id="secondDiv">
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 75%); column-gap: 5%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/experts/'.$row['expert_id_2'].'" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">'.$row['expert_name_2'].'</h1></div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="secondEX"  onclick="secondexpert()" value="'.$row['expert_id_2'].'" name="example"/>
                                    </label>                                                        
                                </div>

                            </div>
                         
                            <!---------------------------------------------------------------------------->
                            
                            <div class="line-divider-box">
                                <hr class="solid-thin-line">
                            </div>
                            </div>
                            <div id="thirdDiv" >
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 75%); column-gap: 5%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/experts/'.$row['expert_id_3'].'" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">'.$row['expert_name_3'].'</h1></div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="thirdEX"  onclick="thirdexpert()" value="'.$row['expert_id_3'].'" name="example"/>
                                    </label>                                                        
                                </div>

                            </div>
                            </div>
                           </div>
                          </div>
                    </div>
                </div>
            </div>

            <div class="confirm-btn-box"><button class="book-now-calendar" id="confirm-expert" onclick="confirmSched()">Confirm</button></div>
        </div>
    
    </div>


'; }
} else { echo '<p>No service to display at the moment.</p>'; }?>
<!-- expert Modal -->


<!-- ----------------------------experts modal end------------------------ -->

<?php

$serviceId = isset($_GET['cunique']) ? strval($_GET['cunique']) : null;
$cserviceId = isset($_GET['id']) ? strval($_GET['id']) : null;
// Connect to database
// Define your SQL query to select all projects
//	$stmt = "SELECT * FROM services WHERE cunique = '$serviceId' AND id = '$cserviceId'";
// In this case we can use the account ID to get the account info.
$stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique WHERE s.cunique = '$serviceId' AND s.id = '$cserviceId'";



$result = $con->query($stmt);


?>
<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $avgRating = round($row['average_rating'] ?? 0,1) == 0 ? 'New' :  round($row['average_rating'],1);
        if ($row['stype'] == 'Male Only') {
            $img = '<img class="service-gender-img" src="assets/images/gender/3.svg">';
        } else if ($row['stype'] == 'Female Only') {
            $img = '<img class="service-gender-img" src="assets/images/gender/2.svg">';
        } else {
            $img = '<img class="service-gender-img" src="assets/images/gender/1.svg">';
        }

        $isHidden = true;
        if ($row['discount_duration'] >= date('Y-m-d')) {
            $isHidden = false;
        }
        ?>

        <?php

        echo '
	<input type="hidden" id="bigprice" name="sprice" value="'. $row['sprice'] . '" />
	<input type="hidden" id="smallprice" name="scprice" value="'. $row['scprice'] . '" />
	<input type="hidden" id="profile" name="profilelevel" value="'.$profilelevel. '" />
	<input type="hidden" id="sname" name="sname" value="'. $row['sname'] . '" />
    <input type="hidden" id="username" name="username" value="'.$username. '" />
	<input type="hidden" id="cname" name="cname" value="'. $row['cname'] . '" />
	<input type="hidden" id="scity" name="scity" value="'. $row['scity'] . '" />
	<input type="hidden" id="scountry" name="scountry" value="'. $row['scountry'] . '" />
	<input type="hidden" id="transaction" name="transaction_type" value="'. $row['transaction_type'] . '" />
	<input type="hidden" id="duration" name="duration" value="'. $row['sduration'] . '" />
    <input type="hidden" id="service_id" name="" value="'.$_GET['id'].'" />
	<input type="hidden" id="discountprice" name="discountprice" value="'. $row['discountprice'] . '" />
	<input type="hidden" id="final_price" name="final_price" value="'. $row['final_price'] . '" />
	
    <input type="hidden" id="condition1" name="" value="'. $row['expert_id_1'] . '" />
    <input type="hidden" id="condition2" name="" value="'. $row['expert_id_2'] . '" />
    <input type="hidden" id="condition3" name="" value="'. $row['expert_id_3'] . '" />
    <input type="hidden" id="clinic_id" name="" value="'.$cunique.'" />
    <input type="hidden" id="voucher" name="voucher"/>

    
   <div class="service-details-container">
        <div class="service-details">
            <p class="backBtn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 15px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <a href="discover-page.blade.php" style="color: black; text-decoration: underline;">Back</a>
            </p>
            <div class="service-details-img-section">
                <div class="service-details-img-container">
                    <a href="clinic-details.blade.php?id=' . $row['hook'] . '&cunique=' . $row['cunique'] . '"><button class="back-btn"><i class="fa-solid fa-angle-left" id="back-arrow"></i></button></a>
                    <img src="assets/images/services/' . $row['id'] . '.png">
                </div>
            </div>
            <div class="container">
            <div class="service-details-section">
                <div class="service-name-box">
                    <h3 class="service-title">' . $row['sname'] . '</h3><p class="paragraph-3"></p>
                </div>
            </div>
            <div class="service-subdetails">
                <a href="service-reviews.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style="text-decoration: none; color: #212121;"><p style="font-size: 12px;">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star" style="color: #0CB4BF;"></i> <u>'. $row['ratings_count'] . ' reviews</u></p></a>
                <p style="font-size: 5px;"><i class="fa fa-circle" aria-hidden="true"></i></p>
                <p style="font-size: 12px;">
                    <span style="color: #0CB4BF;">Open</span> until ' . $row['closing_time'] .
            '</p>
                <p style="font-size: 5px;"><i class="fa fa-circle" aria-hidden="true"></i></p>
                <p style="font-size: 12px;">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
            </div>
            <div class="more-details-section">
                <div class="address">
                    <p class="service-location"><i class="fa-solid fa-stopwatch"></i> ' . $row['sduration'] . '</p>
                    <div style="width: 100%; display: grid; grid-template-columns: repeat(2, max-content 90%); column-gap: 5px;">
                        <div style="width: auto;">
                            ' . $img . '
                        </div>
                        <div style="width: 100%;">
                            <p class="service-gender">' . $row['stype'] . ' patients</p>
                        </div>
            
                    </div>
                    <div style="width: 100%; margin: auto;">';
        if ($row['ratings_count'] >= 10) {
            echo '<a href="service-reviews.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style="text-decoration: none; color: #212121;"><p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star" style="color: #0CB4BF;"></i> <u>'. $row['ratings_count'] . ' reviews</u></p></a>';
        } else {
            echo '<a href="service-reviews.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style="text-decoration: none; color: #212121;"><p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star" style="color: #0CB4BF;"></i></p></a>';
        }
        echo '
                    </div>
                </div>
                <div class="pricing-container">
                    <div style="width: 100%;">
                            <p style="margin-top: 2px;" class="paragraph-4"></p>
                    </div>
                    <div><h4 id="orig-price" class="service-price-fee this-' . $row['discountdisplay'] .'" style="">' . convertCurrency($row['sprice']) . ' </h4></div><br/><br/>
            
                </div>
            </div>
            <div class="consultation-fee-box">
                <h5 class="service-consultation-price" style="margin-top: 10px">
                    Consultation fee - ' . convertCurrency($row['scprice']) . ' <br>
                    <span class="service-time" style="font-weight: 400; margin-left: 0px;"><i class="fa-solid fa-stopwatch"></i> ' . $row['stime'] . '</span>
                    <br class="line-break"/><br class="line-break" /><p style="font-weight: 400; font-size: 12px;" class="service-description">' . $row['sbio'] . '</p>
                    <div style="' . ($isHidden ? 'display: none;' : '') . '">
                        <h4 class="service-price-fee that-' . $row['discountdisplay'] .'" style="margin-top: 20px; color: #46AFB4;">Discounted Price: ' . convertCurrency($row['final_price']) . ' </h4>
                        <p class="varies then-' . $row['discountdisplay'] .'">till ' . $row['discount_duration'] . '</p>
                    </div>
                </h5>
                <br>
            
            </div>
            <br>
            
                <br/><br/>
            
            <div style="left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
                <div class="booking-btn-container">
                    <a style="
                        text-decoration: none;
                        display: flex;
                        justify-content: center;" href="book-now-max.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '"><button class="book-now">Book now</button></a>
            
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(3, 45% 10% 45%);">
                        <div style="width: 100%; margin: auto; padding-left: 30%;">
                            <hr class="solid">
                        </div>
                        <div style="width: 100%; margin: auto;">
                            <p class="service-gender" style="text-align: center;">OR</p>
                        </div>
                        <div style="width: 100%; margin: auto; padding-right: 30%;">
                            <hr class="solid">
                        </div>
                    </div>
            
                    <div>
                    <a href="book-now.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                        <button style="width: 100%; height: auto; margin: 0; padding: 0; border-style: none; background-color: transparent;">
                            <p class="service-gender" style="color: #0C1E36;"><u>Book consultation</u></p>
                        </button>
                        </a>
                    </div>
            
                </div>
            </div>
        </div>
        
    </div>
     <div class="clinic-book-consultation-container">
            <div style="padding: 15px 20px;">
                <div>
                    <div class="">
                        <h3 style="font-style: 16px; font-weight: 600;">' . $row['sname'] . '</h3>
                    </div>
                    <div>
                        <p class="">' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF; font-size: 8pt;"></i></p>
                    </div>
                </div>
                
                <div style="margin-top: 50px;">
                    <p style="font-size: 11px; color: gray; text-align: center;">To book this service you need to book a consultation first*</p>
                    <button 
                        style="
                            width: 100%;
                            background-color: #ffffff;
                            border: 2px solid #0C1E36;
                            color: #0C1E36;
                            padding: 15px 0;
                            font-weight: 600;
                            cursor: pointer;
                            border-radius: 10px;
                        "
                        onclick="openCalendar()"
                    >
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>
	
	'; }
} else { echo '<p>No service to display at the moment.</p>'; }?>

<!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
<script>
    $(document).ready(function(){

        $("input[name='example']").change(function(){
            var selectedValue = $("input[name='example']:checked").val();

            if(selectedValue != 'any') {
                $("#text-input").hide()
            }else {
                $("#text-input").show()
            }
        });

    });
</script>
<script>

    mobiscroll.setOptions({
        locale: mobiscroll.localeEn,  // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                 // Specify theme like: theme: 'ios' or omit setting to use default
        themeVariant: 'light',         // More info about themeVariant: https://mobiscroll.com/docs/javascript/calendar/api#opt-themeVariant
    });

    mobiscroll.datepicker('#date-input', {
        controls: ['calendar'],       // More info about controls: https://mobiscroll.com/docs/javascript/calendar/api#opt-controls
        display: 'inline'  ,
        touchUi: true ,
        dateFormat: 'YYYY-MM-DD' ,

    });

</script>

<script>
    var isHidden = '<?= $isHidden ?>'

    if (isHidden) {
        var origPrice = document.getElementById('orig-price')
        origPrice.classList.remove('this-discountdisplay')
    }
</script>

<script>
    var time = null;
    var expert= 'any';
    var note =null;
    var discount=0;

    function openCalendar() {
        var calendarmodal = document.getElementById('calendarModal');
        calendarmodal.style.display = 'block';

    }

    function openTime() {
        var date = document.getElementById('date-input').value;
        var dateParts = date.split("-");
        var date = dateParts[0] + "-" + dateParts[2] + "-" + dateParts[1];


        const now = new Date();
        now.setDate(now.getDate() + 2);
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${day}-${month}`;

        var date1 = date;
        var date2 = formattedDate;

        // alert(date);
        // alert(formattedDate);
        if (date < formattedDate) {
            var error = document.getElementById('error_message');
            error.style.display = "block";
        } else {
            var calendarmodal = document.getElementById('calendarModal');
            var timemodal = document.getElementById('timeModal');
            calendarmodal.style.display = 'none';
            timemodal.style.display = 'block';
        }
    }

    function openDiscount() {
        var expertmodal = document.getElementById('expertModal');
        var discountmodal = document.getElementById('discountModal');
        discountmodal.style.display = 'block';
        expertmodal.style.display = 'none';
    }

    function backCalendar() {
        var calendarmodal = document.getElementById('calendarModal');
        var timemodal = document.getElementById('timeModal');
        calendarmodal.style.display = 'block';
        timemodal.style.display = 'none';
    }

    function backTime() {
        var expertmodal = document.getElementById('expertModal');
        var timemodal = document.getElementById('timeModal');
        expertmodal.style.display = 'none';
        timemodal.style.display = 'block';
    }

    function backExpert() {
        var discountmodal = document.getElementById('discountModal');
        var expertmodal = document.getElementById('expertModal');
        discountmodal.style.display = 'none';
        expertmodal.style.display = 'block';
    }

    function anyexpert(){
        expert = document.getElementById('any').value;
        console.log(expert);
    }

    window.onclick = function(event) {
        var calendarmodal = document.getElementById('calendarModal');
        var timemodal = document.getElementById('timeModal');
        var expertmodal = document.getElementById('expertModal');
        var discountmodal = document.getElementById('discountModal');

        if (event.target == calendarmodal) {
            calendarmodal.style.display = "none";
        }

        if (event.target == timemodal) {
            timemodal.style.display = "none";
        }

        if (event.target == expertmodal) {
            expertmodal.style.display = "none";
        }

        if (event.target == discountmodal) {
            discountmodal.style.display = "none";
        }
    }




    function firstexpert(){

        expert = document.getElementById('firstEX1').value;


        console.log(expert);
    }
    function secondexpert(){
        expert = document.getElementById('secondEX').value;
        console.log(expert);
    }
    function thirdexpert(){
        expert = document.getElementById('thirdEX').value;
        console.log(expert);
    }
    function function1(){
        time="10:00:00";

    }
    function function2(){
        time="11:00:00";

    }
    function function3(){
        time="12:00:00";

    }
    function function4(){
        time="13:00:00";

    }
    function function5(){
        time="14:00:00";

    }
    function function6(){
        time="15:00:00";

    }
    function function7(){
        time="16:00:00";

    }
    function  function8(){
        time="17:00:00";

    }

    function openExpert() {
        condition1 = document.getElementById('condition1').value;
        condition2 = document.getElementById('condition2').value;
        condition3 = document.getElementById('condition3').value;

        if(condition1==''){
            console.log(condition1,condition2,condition3);
            document.getElementById('firstDiv').style.display = 'none';
        }
        if(condition2==''){
            document.getElementById('secondDiv').style.display = 'none';
        }
        if(condition3==''){
            document.getElementById('thirdDiv').style.display = 'none';
        }

        var timemodal = document.getElementById('timeModal');
        var expertmodal = document.getElementById('expertModal');
        timemodal.style.display = 'none';
        expertmodal.style.display = 'block';

    }

    // $(document).ready(function() {

    //     $('#discountCode').on('input', function() {
    //         couponcheck();
    //     });

    //     function couponcheck() {
    //         var code = $("#discountCode").val();

    //         $.ajax({
    //             url: "validate-voucher.php",
    //             type: 'POST',
    //             data: {
    //                 code: code,
    //                 id: <?php echo $_SESSION['id']; ?>
    //             },
    //             success: function(data) {
    //                 if (data == 'valid') {
    //                     document.getElementById("alert_success").style.display='block';
    //                     document.getElementById("alert_danger").style.display='none';
    //                     discount=1;
    //                     $("#voucher").val(code)
    //                 } else {
    //                     document.getElementById("alert_danger").style.display='block';
    //                     document.getElementById("alert_success").style.display='none';
    //                 }

    //             }
    //         });
    //     }
    // });

    function confirmSched() {
        // window.location.href = 'create-checkout-session.php';

        var form = document.createElement('form');
        form.setAttribute('method', 'get');
        form.setAttribute('action', 'book-now-max-discount.php');

        var date = document.getElementById('date-input').value;

        var scprice = document.getElementById('smallprice').value;
        var sprice = document.getElementById('bigprice').value;
        var user = document.getElementById('profile').value;
        var sname = document.getElementById('sname').value;
        var username = document.getElementById('username').value;
        var cname = document.getElementById('cname').value;
        var scountry = document.getElementById('scountry').value;
        var scity = document.getElementById('scity').value;
        var transaction = document.getElementById('transaction').value;
        var clinic_id =document.getElementById('clinic_id').value;
        var service_id =document.getElementById('service_id').value;
        var duration =document.getElementById('duration').value;
        var discountprice =document.getElementById('discountprice').value;
        var final_price =document.getElementById('final_price').value;
        var code = document.getElementById('voucher').value;

    
        if(expert=='any'){
            var note =document.getElementById('specifyPref').value;
        }else{
            var note=null;
        }

        console.log(date,time,scprice,sprice,user,expert);

        var isDiscountExpired = '<?= $isHidden ?>'
        var cunique = '<?= $cunique ?>'
        var id = '<?= $id ?>'

        // // Add any data you need to pass as hidden input fields
        var inputData = {
            keydate: date,
            keytime: time,
            keyscprice: scprice,
            keysprice: sprice,
            keyuser: user,
            keysname: sname,
            keyusername: username,
            keycname: cname,
            keyexpert:expert,
            keyscity:scity,
            keyscountry:scountry,
            keytransaction:transaction,
            type:'max',
            keyclinic_id:clinic_id,
            keynote:note,
            keyservice_id:service_id,
            keyduration:duration,
            keydiscount:discount,
            keydiscountprice: isDiscountExpired ? null : discountprice,
            keyfinal_price: isDiscountExpired ? null : final_price,
            voucher:code,
            cunique: cunique,
            id: id

            // Add more key-value pairs as needed
        };

        // Iterate through the data and create input fields
        for (var key in inputData) {
            if (inputData.hasOwnProperty(key)) {
                var input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', key);
                input.setAttribute('value', inputData[key]);
                form.appendChild(input);
            }
        }

        // Append the form to the document body
        document.body.appendChild(form);
        // Submit the form
        form.submit();
    }

</script>

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

</script>
</body>
</html>