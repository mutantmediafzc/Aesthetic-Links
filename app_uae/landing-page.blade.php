<?php
include 'session.php';
require("server-connect.php");

$sql = "SELECT * FROM bidding_events WHERE end_duration < NOW() ORDER BY end_duration DESC LIMIT 1";
$result = $con->query($sql);
$isFeatured = false;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $query = "SELECT * FROM biddings WHERE bidding_event_id='" . $row["id"] . "' AND status = 'complete' AND clinic_country = 'UAE'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while ($biddings = $result->fetch_assoc()) {
                if (time() > strtotime($row['boost_start']) && time() < strtotime($row['boost_end'])) {
                    $clinic = $con->prepare('SELECT * FROM clinics WHERE id = ? AND is_featured = 1 AND ccountry = ? LIMIT 1');
                    $country = 'UAE';
                    $clinic->bind_param('is', $biddings["clinic_id"], $country);
                    $clinic->execute();
                    $clinics = $clinic->get_result();

                    if ($clinics->num_rows > 0) {
                        $isFeatured = true;
                        while ($data = $clinics->fetch_assoc()) {
                            $clinicId = $data['id'];
                        }
                    }
                }
            }
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Landing Page</title>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N7QLJTK5');
    </script>
    <!-- End Google Tag Manager -->
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<style>
    @font-face {
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
            url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }

    a {
        -webkit-tap-highlight-color: transparent;
        font-family: 'poppinsregular';
    }

    buttons {
        -webkit-tap-highlight-color: transparent;
        font-family: 'poppinsregular';
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
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.6);
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

    .overlay-black {
        display: flex;
        justify-content: flex-end;
        flex-direction: column;
        position: absolute;
        top: 0;
        right: 0px;
        bottom: 0;
        left: 0px;
        padding: 0;
        background-size: cover;
        background-position: center center;
        border-radius: 20px;
    }

    .overlay-black:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0.6));
        border-radius: 20px;
    }

    .control-bar {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        overflow: hidden;
        background-color: #fff;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: auto;
        box-shadow: 0 10px 10px 5px rgba(0, 0, 0, 0.5);
        border-top-right-radius: 75px;
        border-top-left-radius: 75px;
        transition: height 0.5s;
        left: 0;
    }

    .control-bar-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        width: 90%;
        height: auto;
        margin: auto;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .landing-page-filters {
        display: flex;
        justify-content: space-between;
        width: 100%;
        height: 100px;
        margin-top: 10px;

    }

    .filter-btn {
        width: max-content;
        height: 100px;
        font-size: 34px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
        font-family: 'poppinsregular';
        color: #0CB4BF;
    }

    .filter-btn-map {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
        color: #231F20;
        font-family: 'poppinsregular';
    }

    .filter-btn1 {
        width: 100px;
        height: 100px;
        font-size: 34px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
        color: #0CB4BF;
        font-family: 'poppinsregular';
    }

    .divider {
        width: 110%;
        height: 10px;
        background-color: #0CB4BF;
    }

    .btn-container {
        width: 100%;
        height: 100px;
        border: 1px solid red;
    }

    .view-all-clinics {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 500;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 5%;
    }

    .solid {
        width: 100%;
        border: 1px solid #e3e3e3;
        margin-top: 20px;
    }

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

    .paragraph-1 {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 32px;
        font-weight: 600;
    }

    #circle {
        color: #444444;
        font-size: 10px;
    }

    .paragraph-2 {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 32px;
    }

    .search-bar-landing {
        width: 100%;
        height: 75px;
        background-color: #f1f1f1;
        border-style: none;
        border-radius: 15px;
        font-size: 28px;
        text-indent: 24px;
    }

    .content-container {
        margin: auto;
        width: 100%;
        height: 45vh;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        overflow: scroll;
    }

    .card-item {
        margin: auto;
        width: 90%;
        height: auto;
        margin-top: 50pt;
    }

    #money-icon {
        font-size: 30px;
        color: #444444;
    }

    #money-icon-2 {
        font-size: 30px;
        color: #0CB4BF;
    }

    #star {
        font-size: 28px;
        color: #0CB4BF;
    }

    .money-icon-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        column-gap: 5px;
    }

    .text-container {
        row-gap: 10px;
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, auto);
        margin-top: 15px;
    }

    .clinic-small-logo {
        position: absolute;
        width: 10vw;
        height: 10vw;
        margin-top: 17vw;
        margin-left: 20px;
        border-radius: 8pt;
    }

    .clinic-img-container {
        width: 100%;
        height: 15vh;
        border-radius: 10px;
        position: relative;
    }

    .clinic-small-logo-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        position: absolute;
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
        text-align: right;
        margin-top: 45px;
        font-weight: 600;
    }

    /*-----------------------dropdown------------------------*/

    .dropbtn {
        width: 100%;
        height: 100px;
        background-color: #fff;
        color: #000;
        padding: 10px;
        font-size: 34px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #fff;
        outline: none;
    }

    .dropdown {
        width: 100%;
        height: 100px;
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff !important;
        min-width: 180px;
        overflow: auto;
        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 15px !important;
        left: 40px;
        border-radius: 10px;
        width: 40px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        background-color: #000 !important;
    }

    .dropdown a:hover {
        background-color: #ddd;

    }

    .show {
        display: block;

    }

    .sortingLabel {
        font-size: 34px;
    }

    .checkboxSort {
        width: 22pt;
        height: 22pt;
        float: right
    }

    .closeSortBtn {
        width: 100%;
        height: 60px;
        background-color: #0C1E36;
        border-radius: 10px;
        color: #fff;
        font-size: 24px;
    }

    .applySortBtn {
        margin-top: 10px;
        width: 100%;
        height: 60px;
        background-color: #fff;
        border: 1px solid #0C1E36;
        border-radius: 10px;
        color: #0C1E36;
        font-size: 24px;
    }

    .spacer-control-bar {
        width: 100%;
        height: 50px;
    }

    .filter-btn-sort {
        width: max-content;
        height: auto;
        display: flex;
    }

    .coming-soon-txt {
        color: #0C1E36;
        font-size: 38px;
        width: 100%;
        text-align: center;
        margin: 0;
    }

    .coming-soon-p {
        color: #999999;
        font-size: 28px;
        width: 100%;
        text-align: center;
        margin: 0;
    }

    .coming-soon-a {
        text-decoration: none;
        color: #0CB4BF;
        font-size: 28px;
        width: 100% !important;
        text-align: center !important;
        margin: 0;
    }

    .second-line {
        width: 100%;
        display: flex;
        justify-content: flex-start;
    }

    /*------------------form modal----------------------------*/

    .form {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .form-content {
        background-color: #fefefe;
        margin: 40% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        border-radius: 10px;
    }

    /* Close button style */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .form-container-box input {
        width: 93%;
        height: 30px;
        border-radius: 8px;
        border: 1px solid #666;
        font-size: 16px;
        margin-top: 5px;
    }

    .form-container-box input:focus {
        outline: none;
    }

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {

        .second-line {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            column-gap: 20px;
        }



        nav {
            padding-top: 10pt;
            padding-bottom: 10pt;
        }

        .map h1 {
            width: max-content;
            height: auto;
            color: #fff;
            font-weight: 600;
            font-size: 28px;
            background-color: transparent;
            margin: 0;
            z-index: 3;
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

        .view-all-clinics {
            width: 100%;
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
            width: 40%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 10%;
        }

        .paragraph-1 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 16pt;
            font-weight: 550;
        }

        #circle {
            color: #444444;
            font-size: 6pt;
        }

        .paragraph-2 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
        }

        .search-bar-landing {
            width: 96%;
            height: 20pt;
            background-color: #f1f1f1;
            border-style: none;
            border-radius: 5pt;
            font-size: 10pt;
            text-indent: 7pt;
        }

        .filter-btn {
            width: max-content;
            height: 20pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #0CB4BF;
            text-align: left;
            padding: 0;
        }

        .filter-btn-map {
            width: 100%;
            height: 20pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #0C1E36;
            padding: 0;
        }

        .filter-btn1 {
            width: 30pt;
            height: 30pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #212121;
        }

        .control-bar {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            overflow: scroll;
            background-color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: auto;
            box-shadow: 0 10px 10px 5px rgba(0, 0, 0, 0.5);
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;

        }

        .control-bar-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            width: 90%;
            height: auto;
            margin: auto;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .landing-page-filters {
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: auto;
            margin-top: 5pt;
        }

        .divider {
            width: 100%;
            height: 3px;
            background-color: #0CB4BF;
        }

        .content-container {
            margin: auto;
            width: 100%;
            height: 45vh;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
        }

        .card-item {
            margin: auto;
            width: 90%;
            height: auto;
            margin-top: 10pt;
        }

        #money-icon {
            font-size: 14pt;
            color: #444444;
        }

        #money-icon-2 {
            font-size: 14pt;
            color: #0CB4BF;
        }

        #star {
            font-size: 14pt;
            color: #0CB4BF;
        }

        .money-icon-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            column-gap: 2px;
        }

        .text-container {
            row-gap: 5px;
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, auto);
            margin-top: 5pt;
        }

        .solid {
            width: 100%;
            border: 1px solid #e3e3e3;
            margin-top: 1pt;
        }

        .clinic-small-logo {
            position: absolute;
            width: 8vw;
            height: 8vw;
            margin-top: 25vw;
            margin-left: 2.5%;
            border-radius: 5pt;
        }

        .clinic-img-container {
            width: 100%;
            height: 35vw;
            border-radius: 10px;
        }

        .clinic-small-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px
        }

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
            text-align: right;
            margin-top: 0;
            font-weight: 600;
        }

        /*-----------------------dropdown------------------------*/

        .dropbtn {
            width: 100%;
            height: 30pt;
            background-color: #fff;
            color: #000;
            padding: 10px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #fff;
            outline: none;
        }

        .dropdown {
            width: 100%;
            height: 30pt;
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff !important;
            min-width: 180px;
            overflow: auto;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);
            z-index: 2;
            padding: 15px !important;
            left: 200px;
            border-radius: 10px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: #000 !important;
        }

        .dropdown a:hover {
            background-color: #ddd;

        }

        .show {
            display: block;

        }

        .sortingLabel {
            font-size: 10pt;
        }

        .checkboxSort {
            width: 10pt;
            height: 10pt;
            float: right
        }

        .closeSortBtn {
            width: 100%;
            height: 35px;
            background-color: #0C1E36;
            border-radius: 5px;
            color: #fff;
            font-size: 10pt;
        }

        .applySortBtn {
            margin-top: 5px;
            width: 100%;
            height: 35px;
            background-color: #fff;
            border: 1px solid #0C1E36;
            border-radius: 5px;
            color: #0C1E36;
            font-size: 10pt;
        }

        .spacer-control-bar {
            width: 100%;
            height: 20px;
        }

        .filter-btn-sort {
            width: max-content;
            height: auto;
            display: flex;
        }

        .filter-btn1 {
            width: 30pt;
            height: 30pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #0CB4BF;
        }

        .coming-soon-txt {
            color: #0C1E36;
            font-size: 14pt;
            width: 100%;
            text-align: center;
            margin: 0;
            margin-bottom: 5px;
        }

        .coming-soon-p {
            color: #999;
            font-size: 10pt;
            width: 100%;
            text-align: center;
            margin: 0;
            margin-bottom: -5px;
        }

        .coming-soon-a {
            text-decoration: none;
            color: #0CB4BF;
            font-size: 10pt;
            width: 100% !important;
            text-align: center !important;
            margin: 0;
            font-weight: 500;
        }
    }

    @media only screen and (max-device-width: 767px) {

        .second-line {
            width: 100%;
            display: flex;
            width: 100%;
            display: flex;
            justify-content: flex-start;
            column-gap: 5px;
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

        .map h1 {
            width: max-content;
            height: auto;
            color: #fff;
            font-weight: 600;
            font-size: 28px;
            background-color: transparent;
            margin: 0;
            z-index: 3;
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

        .view-all-clinics {
            width: 100%;
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

        .modal-item a {
            height: max-content;
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

        .paragraph-1 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            font-weight: 550;
        }

        #circle {
            color: #444444;
            font-size: 3pt;
        }

        .paragraph-2 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .search-bar-landing {
            width: 96%;
            height: 20pt;
            background-color: #f1f1f1;
            border-style: none;
            border-radius: 5pt;
            font-size: 10pt;
            text-indent: 7pt;
        }

        .search-bar-landing:focus {
            outline: none;
        }

        .filter-btn {
            width: max-content;
            height: 20pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #0CB4BF;
            text-align: left;
            padding: 0;
        }

        .filter-btn-map {
            width: 100%;
            height: 20pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #0C1E36;
            padding: 0;
        }

        .filter-btn1 {
            width: 30pt;
            height: 30pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #212121;
        }

        .control-bar {
            display: none;
            grid-template-columns: repeat(1, 1fr);
            overflow: scroll;
            background-color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: auto;
            box-shadow: 0 10px 10px 5px rgba(0, 0, 0, 0.5);
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;

        }

        .control-bar-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            width: 90%;
            height: auto;
            margin: auto;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .landing-page-filters {
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: auto;
            margin-top: 5pt;
        }

        .divider {
            width: 100%;
            height: 3px;
            background-color: #0CB4BF;
        }

        .content-container {
            margin: auto;
            width: 100%;
            height: 45vh;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
        }

        .card-item {
            margin: auto;
            width: 90%;
            height: auto;
            margin-top: 10pt;
        }

        #money-icon {
            font-size: 10pt;
            color: #444444;
        }

        #money-icon-2 {
            font-size: 10pt;
            color: #0CB4BF;
        }

        #star {
            font-size: 10pt;
            color: #0CB4BF;
        }

        .money-icon-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            column-gap: 2px;
        }

        .text-container {
            row-gap: 0px;
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, auto);
            margin-top: 5pt;
        }

        .solid {
            width: 100%;
            border: 1px solid #e3e3e3;
            margin-top: 1pt;
        }

        .clinic-small-logo {
            position: absolute;
            width: 10vw;
            height: 10vw;
            margin-top: 23vw;
            margin-left: 5pt;
            border-radius: 5pt;
        }

        .clinic-img-container {
            width: 100%;
            height: 35vw;
            border-radius: 10px;
        }

        .clinic-small-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px
        }

        .clinic-text-location {
            position: absolute;
            width: 93%;
            height: auto;
            margin-top: 28vw;
            margin-left: 4%;
            display: flex;
            align-items: center;
        }

        .clinic-text-location h1 {
            width: 100%;
            margin: 0;
            color: #fff;
            font-size: 12pt;
            text-align: right;
            margin-top: 0;
            font-weight: 600;
        }

        /*-----------------------dropdown------------------------*/

        .dropbtn {
            width: 100%;
            height: 30pt;
            background-color: #fff;
            color: #000;
            padding: 10px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #fff;
            outline: none;
        }

        .dropdown {
            width: 100%;
            height: 30pt;
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff !important;
            min-width: 180px;
            overflow: auto;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);
            z-index: 2;
            padding: 15px !important;
            border-radius: 10px;
            left: 150px;
            top: 320px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: #000 !important;
        }

        .dropdown a:hover {
            background-color: #ddd;

        }

        .show {
            display: block;

        }

        .sortingLabel {
            font-size: 10pt;
        }

        .checkboxSort {
            width: 8pt;
            height: 8pt;
            float: right !important;
        }

        .closeSortBtn {
            width: 100%;
            height: 35px;
            background-color: #0C1E36;
            border-radius: 5px;
            color: #fff;
            font-size: 10pt;
        }

        .applySortBtn {
            margin-top: 5px;
            width: 100%;
            height: 35px;
            background-color: #fff;
            border: 1px solid #0C1E36;
            border-radius: 5px;
            color: #0C1E36;
            font-size: 10pt;
        }

        .spacer-control-bar {
            width: 100%;
            height: 20px;
        }

        .filter-btn-sort {
            width: max-content;
            height: auto;
            display: flex;
        }

        .filter-btn1 {
            width: 30pt;
            height: 30pt;
            font-size: 10pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #0CB4BF;
        }

        .coming-soon-txt {
            color: #0C1E36;
            font-size: 14pt;
            width: 100%;
            text-align: center;
            margin: 0;
            margin-bottom: 5px;
        }

        .coming-soon-p {
            color: #999;
            font-size: 10pt;
            width: 100%;
            text-align: center;
            margin: 0;
            margin-bottom: -5px;
        }

        .coming-soon-a {
            text-decoration: none;
            color: #0CB4BF;
            font-size: 10pt;
            width: 100% !important;
            text-align: center !important;
            margin: 0;
            font-weight: 500;
        }

        .map-view {
            margin: auto;
            width: 90%;
            height: auto;
            margin-top: 80pt;
        }

        .map-view-text h1 {
            width: 100%;
            color: #fff;
            font-size: 12pt;
            margin-top: -80px;
            font-weight: 600;
            text-align: center;
        }
    }


    /*--------------------------------------------*/

    /*@media only screen and (min-width: 481px) and (max-width: 1024px) {*/

    /*    nav {*/
    /*        position: fixed;*/
    /*        display: flex;*/
    /*        justify-content: center;*/
    /*        align-items: center;*/
    /*        width: 100%;*/
    /*        height: auto;*/
    /*        padding-top: 5%;*/
    /*        padding-bottom: 5%;*/
    /*        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);*/
    /*        z-index: 2;*/
    /*        background-color: #fff;*/
    /*    }*/

    /*    .modal-content {*/
    /*        background-color: #fefefe;*/
    /*        margin: auto;*/
    /*        width: 100%;*/
    /*        height: 50vh;*/
    /*        border-bottom-left-radius: 50px;*/
    /*        border-bottom-right-radius: 50px;*/
    /*        display: flex;*/
    /*        justify-content: center;*/
    /*        align-items: center;*/
    /*    }*/
    /*}*/

    /*----------------------------------------------------*/
</style>

<style>
    div-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-bar-container {
        width: 90%;
        max-width: 600px;
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
        margin-top: 10px;
    }

    .search-bar {
        display: flex;
        align-items: center;
        border-radius: 15px;
        overflow: hidden;
        padding: 5px 10px;
        background-color: #f1f1f1;
        transition: all 0.5ms ease-out;
    }

    .search-bar input {
        padding: 10px;
        border: none;
        outline: none;
        font-size: 14px;
        background-color: transparent;
        margin-left: 5px;
        font-family: 'poppinsregular';
        flex: 1;
    }

    .search-bar button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        font-size: 14px;
        font-family: 'poppinsregular';
        color: #0C1E36;
        white-space: break-spaces;
    }

    .search-bar button i {
        font-size: 14px;
        color: #888;
    }

    .search-bar button:hover {
        background-color: #e0e0e0;
    }

    .search-icon {
        font-size: 14px;
        color: #888;
    }

    .sort-button i {
        margin-right: 5px;
        color: #0C1E36 !important;
    }

    .vertical-line {
        width: 1px;
        height: 24px;
        background-color: #ddd;
        margin: 0 5px;
    }


    .card {
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 90%;
        margin: 10px;
    }

    .card-image {
        position: relative;
    }

    .card-image img {
        width: 100%;
        height: 190px;
        object-fit: cover;
    }

    .card-logo {
        position: absolute;
        bottom: 10px;
        left: 10px;
        border-radius: 8px;
        background-color: #fff;
        padding: 5px;
    }

    .card-logo img {
        width: 50px;
        height: 50px;
    }

    .card-location {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 14px !important;
        display: flex;
        align-items: center;
    }

    .card-location i {
        margin-right: 5px;
    }


    .card-content {
        padding: 10px 20px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card h2 {
        font-size: 18px;
        margin: 0;
        padding: 0;
        color: #1c1c1c;
        font-weight: bolder;
    }

    .card-rating {
        display: flex;
        align-items: center;
        margin-top: 5px;
        font-size: 14px;
        color: #888;
    }

    .card-rating span {
        margin-right: 0;
        display: flex;
        align-items: center;
    }

    .card-rating .rating i {
        color: #0CB4BF;
        margin-right: 5px;
    }

    .card p {
        font-size: 14px;
        color: #666;
        margin: 5px 0;
    }

    .card-price {
        display: flex;
        align-items: center;
        font-size: 16px;
        color: #2ecc71;
    }

    .card-price .price-tier {
        font-size: 18px;
        color: #0CB4BF;
    }

    .ordinary-price-tier {
        font-size: 18px;
        color: #666;
    }

    .fixed-search-bar {
        position: fixed;
        top: 85px;
        width: 100%;
        z-index: 1000;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.5s ease-out;
    }

    .hidden {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }


    .search-bar-container {
        transition: all 0.5s ease-out;
    }

    .filter-button {
        margin-right: 5px;
    }

    .overlay-img {
        position: absolute;
        width: 20px;
        height: 20px;
    }

    .card-location i {
        font-size: 15px;
        margin-bottom: 4px;
    }

    @media only screen and (max-width: 393px) {
        .search-bar input {
            padding: 13px 10px 10px 10px;
        }

        .fixed-search-bar {
            top: 75px;
        }

        .card-content {
            padding: 10px;
        }

        .card-image img {
            height: 160px;
        }

        .card-logo img {
            height: auto;
        }
    }
</style>


<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php include 'nav.php'; ?>
    <!---- Menu Start --->

    <?php include 'menu.php'; ?>


    <!---- Menu End ----->
    <div>
        <a href="landing-map-view.blade.php" style="text-decoration: none; display: flex; justify-content: center;">
            <section class="map-view" id="map-section">
                <div class="clinic-img-container">
                    <div class="clinic-text-location map-view-text" style="z-index: 1;">
                        <h1>Map View <i style="font-size: 14px;" class="fa-solid fa-greater-than"></i></h1>
                    </div>
                    <div class="overlay-black" style="z-index: 0;">
                        <img src="assets/images/map-view.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">
                        <img id="overlay-img" style="left: 80px; top: 100px;" src="assets/images/location.png" alt="Location" class="overlay-img">
                        <img id="overlay-img" style="left: 100px; top: 30px;" src="assets/images/location.png" alt="Location" class="overlay-img">
                        <img id="overlay-img" style="left: 300px; top: 60px;" src="assets/images/location.png" alt="Location" class="overlay-img">
                    </div>
                </div>
            </section>
        </a>

        <div id="myDropdown" class="dropdown-content radio-container">
            <label class="sortingLabel" for="sort-reco">Recommended</label>
            <input type="radio" name="sort" id="sort-reco" value="recommended" checked class="checkboxSort">
            <br>
            <label class="sortingLabel" for="sort-asc">Sort by names (A-Z)</label>
            <input type="radio" name="sort" id="sort-asc" value="cname-asc" class="checkboxSort">
            <br>
            <label class="sortingLabel" for="sort-desc">Sort by names (Z-A)</label>
            <input type="radio" name="sort" id="sort-desc" value="cname-desc" class="checkboxSort">
            <br>
            <label class="sortingLabel" for="top-rated">Top Rated Clinics</label>
            <input type="radio" name="sort" id="top-rated" value="top-rated" class="checkboxSort">
            <br>
        </div>
        <div class="wrapper" id="search-bar-section">
            <div class="search-bar-container">
                <div class="search-bar">
                    <i class="fas fa-search search-icon"></i>
                    <input id="search-box" type="text" placeholder="Search for Clinics...">
                    <a href="new-filter-page.blade.php" class="filter-button"><i class="fas fa-filter" style="color: #0CB4BF"></i></a>
                    <div class="vertical-line"></div>
                    <button onclick="myFunction()" class="sort-button"><i class="fa-solid fa-arrow-down-wide-short"></i> Sort by</button>
                </div>
            </div>
        </div>
        <?php if ($isFeatured) { ?>
            <div class="result featured">
                <?php
                $stmt = "SELECT c.*, COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci WHERE c.approval = 'approved' AND c.ccountry = 'UAE' AND c.id = {$clinicId} GROUP BY c.cunique";

                $result = $con->query($stmt);
                $results = $result->fetch_all(MYSQLI_ASSOC);

                shuffle($results);

                foreach ($results as $row) {
                    $avgRating = round($row['average_rating'], 1) == 0 ? 'New' :  round($row['average_rating'], 1);

                    if ($row['ctype'] == 'Male Only') {
                        $imgClinic = '<img style="height:15px; margin-left:4px; margin-right:4px;" src="assets/images/gender/3.svg">';
                    } else if ($row['ctype'] == 'Female Only') {
                        $imgClinic = '<img style="height:15px; margin-left:4px; margin-right:4px;" src="assets/images/gender/2.svg">';
                    } else {
                        $imgClinic = '<img style="height:15px; margin-left:4px; margin-right:4px;" src="assets/images/gender/1.svg">';
                    }
                ?>

                    <a id="div" class="div" href="<?php echo 'clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] ?>" style="text-decoration: none">
                        <div class="wrapper">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo "assets/images/clinic-images/" . $row['cunique'] . '.png' ?>" alt="Clinic">
                                    <div class="card-location"><i class="fas fa-map-marker-alt"></i><?php echo $row['ccity'] . ', ' . $row['ccountry'] ?></div>
                                    <div class="card-logo">
                                        <img src="<?php echo "assets/images/clinic-logos/" . $row['cunique'] . '.png' ?>" alt="Clinic Logo">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-header">
                                        <h2><?php echo $row['cname'] ?></h2>
                                        <div class="card-price">
                                            <?php
                                            if ($row['cpricelevel'] == 3) {

                                            ?>
                                                <span class="price-tier">$$$</span>
                                            <?php } ?>
                                            <?php
                                            if ($row['cpricelevel'] == 2) {

                                            ?>
                                                <span class="price-tier">$$</span>
                                                <span class="ordinary-price-tier">$</span>
                                            <?php } ?>
                                            <?php
                                            if ($row['cpricelevel'] == 1) {

                                            ?>
                                                <span class="price-tier">$</span>
                                                <span class="ordinary-price-tier">$</span>
                                                <span class="ordinary-price-tier">$</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-rating">
                                        <?php
                                        if ($avgRating != 'New') {
                                        ?>
                                            <span class="rating">5.0<i class="fas fa-star"></i></span>
                                            <span class="reviews" style="margin-right: 0;">Reviews</span>
                                        <?php } else { ?>
                                            <span class="rating"><i class="fas fa-star" style="margin-bottom: 2px; font-size: 15px"></i></span>
                                            <span class="reviews" style="color: #888; margin-right: 4px; margin-top: 3px">New</span>
                                        <?php } ?>
                                        <div class="vertical-line"></div>
                                        <span class="gender"><?php echo $imgClinic ?> </span>
                                        <span style="margin-top: 3px"><?php echo $row['ctype'] ?></span>
                                    </div>
                                    <p>
                                        <?php
                                        $bio = $row['cbio'];
                                        if (strlen($bio) > 50) {
                                            $bio = substr($bio, 0, 96) . '...';
                                        }
                                        echo $bio;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php } ?>
            </div>

        <?php } ?>
        <div class="result">
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['filters']) || isset($_POST['price_preference']) || isset($_POST['gender_preference']))) {
                if (!isset($_POST['filters'])) {
                    $selectedServices = [];
                } else {
                    $selectedServices = $_POST['filters'];
                }
                $price = $_POST['price_preference'];
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

                $priceCondition = '';
                if ($price) {
                    $priceCondition = "AND c.cpricelevel = $price";
                }

                $selectedServicesCondition = '';
                if (!empty($selectedServices)) {
                    $selectedServicesCondition = "AND s.subcat IN ('" . implode("', '", $selectedServices) . "')";
                }

                $havingClause = '';
                if (!empty($selectedServices)) {
                    $havingClause = "HAVING COUNT(DISTINCT s.subcat) = " . count($selectedServices);
                }

                $stmt = "SELECT c.*, COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci JOIN services s ON c.cunique = s.cunique WHERE 1=1 AND c.ccountry = 'UAE' $ctypeCondition $priceCondition $selectedServicesCondition AND c.approval = 'approved' AND c.recommended = 1 AND c.is_featured = 0 GROUP BY c.cunique $havingClause";
            } else {
                $stmt = "SELECT c.*, COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci WHERE c.approval = 'approved' AND c.ccountry = 'UAE' AND c.recommended = 1 AND c.is_featured = 0 GROUP BY c.cunique";
            }
            $result = $con->query($stmt);
            $results = $result->fetch_all(MYSQLI_ASSOC);

            shuffle($results);

            foreach ($results as $row) {
                $avgRating = round($row['average_rating'], 1) == 0 ? 'New' :  round($row['average_rating'], 1);

                if ($row['ctype'] == 'Male Only') {
                    $imgClinic = '<img style="height:15px; margin-left:4px; margin-right:4px;" src="assets/images/gender/3.svg">';
                } else if ($row['ctype'] == 'Female Only') {
                    $imgClinic = '<img style="height:15px; margin-left:4px; margin-right:4px;" src="assets/images/gender/2.svg">';
                } else {
                    $imgClinic = '<img style="height:15px; margin-left:4px; margin-right:4px;" src="assets/images/gender/1.svg">';
                }
            ?>

                <a id="div" class="div" href="<?php echo 'clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] ?>" style="text-decoration: none">
                    <div class="wrapper">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo "assets/images/clinic-images/" . $row['cunique'] . '.png' ?>" alt="Clinic">
                                <div class="card-location"><i class="fas fa-map-marker-alt"></i><?php echo $row['ccity'] . ', ' . $row['ccountry'] ?></div>
                                <div class="card-logo">
                                    <img src="<?php echo "assets/images/clinic-logos/" . $row['cunique'] . '.png' ?>" alt="Clinic Logo">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-header">
                                    <h2><?php echo $row['cname'] ?></h2>
                                    <div class="card-price">
                                        <?php
                                        if ($row['cpricelevel'] == 3) {

                                        ?>
                                            <span class="price-tier">$$$</span>
                                        <?php } ?>
                                        <?php
                                        if ($row['cpricelevel'] == 2) {

                                        ?>
                                            <span class="price-tier">$$</span>
                                            <span class="ordinary-price-tier">$</span>
                                        <?php } ?>
                                        <?php
                                        if ($row['cpricelevel'] == 1) {

                                        ?>
                                            <span class="price-tier">$</span>
                                            <span class="ordinary-price-tier">$</span>
                                            <span class="ordinary-price-tier">$</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-rating">
                                    <?php
                                    if ($avgRating != 'New') {
                                    ?>
                                        <span class="rating">5.0<i class="fas fa-star"></i></span>
                                        <span class="reviews" style="margin-right: 0;">Reviews</span>
                                    <?php } else { ?>
                                        <span class="rating"><i class="fas fa-star" style="margin-bottom: 2px; font-size: 15px"></i></span>
                                        <span class="reviews" style="color: #888; margin-right: 4px; margin-top: 3px">New</span>
                                    <?php } ?>
                                    <div class="vertical-line"></div>
                                    <span class="gender"><?php echo $imgClinic ?> </span>
                                    <span style="margin-top: 3px"><?php echo $row['ctype'] ?></span>
                                </div>
                                <p>
                                    <?php
                                    $bio = $row['cbio'];
                                    if (strlen($bio) > 50) {
                                        $bio = substr($bio, 0, 96) . '...';
                                    }
                                    echo $bio;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>

            <?php } ?>
        </div>
        <div class="wrapper">
            <form method="POST" action="request.clinic.php">
                <div id="myForm" class="form">
                    <!-- Form content -->
                    <div class="form-content">
                        <span class="close"><i class="fa-solid fa-xmark"></i></span>

                        <div style="width: 50%; margin: 10% auto 10% auto; ">
                            <img src="assets/images/logo-anl.png" style="width: 100%; height: auto;" />
                        </div>

                        <h1 style="font-size: 21px;">Request a clinic</h1>

                        <div class="form-container-box">
                            <label for="first-name">Clinic Name:</label><br>
                            <input type="text" id="first-name" name="cname" placeholder="Clinic name" style="text-indent: 10px; width: 94%; height: 35pt; margin-bottom: 5pt;"><br><br>

                            <label for="gender">Your relation to the clinic:</label><br>


                            <div style="display: flex; align-items: center; column-gap: 10px; justify-content: flex-start; margin-top: 5px;">
                                <input type="radio" id="male" name="relation" value="client" style="margin: 0; width: 15px; height: 15px;" checked>
                                <label for="male">Client</label>
                            </div>

                            <div style="display: flex; align-items: center; column-gap: 10px; margin-top: 5px;">
                                <input type="radio" id="male" name="relation" value="other" style="margin: 0; width: 15px; height: 15px;">
                                <label for="male">Other</label>
                            </div>

                            <input type="text" id="address" name="srelation" placeholder="Specify" style="text-indent: 10px; width: 94%; height: 35pt; margin-bottom: 5pt;"><br>
                            <br />
                            <label for="gender">Email Address (optional)</label><br>
                            <input type="email" id="address" name="email" placeholder="Email Address" style="text-indent: 10px; width: 94%; height: 35pt; margin-bottom: 5pt;"><br>
                            <input type="submit" value="Submit" style="width: 100%; background: #0C1E36; height: 35pt; border-style: none; color: #fff;">
                        </div>

                        <div>
                            <p style="font-size: 10pt; font-style: italic; color: #666;">
                                Disclaimer: While our team will review your request, please note that we maintain a rigorous
                                screening process to ensure only top-tier clinics are featured on our platform.
                                Therefore, we cannot guarantee its addition.
                            </p>
                        </div>

                    </div>
                </div>
            </form>

            <div style="margin: auto; width: 90%; height: max-content; margin-top: 5%; margin-bottom: 5%; display: grid; grid-template-columns: repeat(1, 1fr);">
                <div>
                    <h1 class="coming-soon-txt">More clinics coming soon!</h1>
                </div>
                <div>
                    <p class="coming-soon-p">Can't find your favorite clinic?</p>
                </div>
                <div>
                    <center><a href="#" id="openFormLink" class="coming-soon-a">Tell us which clinic we should add</a></center>
                </div>

            </div>
        </div>
    </div>





    <div class="control-bar">


        <!----- Call Data for Clinics ---->



    </div>
    <script>
        function sortResults(sortBy) {
            $.ajax({
                url: "sort-new.php",
                type: 'POST',
                data: {
                    sort: sortBy,
                    query: "<?php echo addslashes($stmt); ?>"
                },
                success: function(data) {
                    $('.result').html(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Event listener for sort options
        $('.checkboxSort').on('change', function() {
            var sortBy = $(this).val();
            sortResults(sortBy);
        });
    </script>

    <script>
        // Get the form
        var form = document.getElementById("myForm");

        // Get the link that opens the form
        var link = document.getElementById("openFormLink");

        // Get the <span> element that closes the form
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the link, open the form
        link.onclick = function() {
            form.style.display = "block";
        }

        // When the user clicks on <span> (x), close the form
        span.onclick = function() {
            form.style.display = "none";
        }

        // When the user clicks anywhere outside of the form, close it
        window.onclick = function(event) {
            if (event.target == form) {
                form.style.display = "none";
            }
        }
    </script>

    <script>
        function closeSort() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Check the number of cards
            const cards = document.querySelectorAll('.card');

            if (cards.length >= 3) {
                document.addEventListener('scroll', function() {
                    const mapSection = document.getElementById('map-section');
                    const searchBarSection = document.getElementById('search-bar-section');
                    const myDropdown = document.getElementById('myDropdown');
                    const mapSectionHeight = mapSection.offsetHeight;

                    if (window.scrollY >= 159) {
                        searchBarSection.classList.add('fixed-search-bar');
                        // searchBarSection.style.position = 'fixed';
                        // searchBarSection.style.zIndex = '1000';

                        const searchBarHeight = searchBarSection.offsetHeight;
                        const searchBarTop = searchBarSection.getBoundingClientRect().top + window.scrollY;
                        myDropdown.style.top = `${searchBarTop + searchBarHeight}px`;
                        myDropdown.style.left = "150px";
                    } else {
                        searchBarSection.style.position = null;
                        searchBarSection.style.zIndex = null;
                        searchBarSection.classList.remove('fixed-search-bar');

                        // Reset the position of the dropdown
                        myDropdown.style.top = '320px'; // Set to original position
                        myDropdown.style.left = '150px'; // Set to original position
                    }
                });
            }
        });
    </script>

    <!----- Start Dropdown Java ---------->
    <script>
        /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.filter-btn-map')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <!----- Start Dropdown Java ---------->
    <script>
        /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
        function myFunction2() {
            document.getElementById("myDropdown2").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn2')) {
                var dropdowns = document.getElementsByClassName("dropdown-content2");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
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
            document.getElementById('search-bar-section').style.display = "none";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
            document.getElementById('search-bar-section').style.display = null;
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <!---- Search Script Test --->
    <script>
        const searchBox = document.getElementById("search-box");
        const divs = document.querySelectorAll("#div");

        // Function to filter divs based on search keywords
        function filterDivs(keywords) {
            keywords = keywords.toLowerCase().split(/\s+/); // Split keywords and lowercase
            for (const div of divs) {
                const content = div.textContent.toLowerCase(); // Get content and lowercase
                let matchFound = false;
                for (const keyword of keywords) {
                    if (content.includes(keyword)) {
                        matchFound = true;
                        break; // Stop searching if any keyword matches
                    }
                }
                div.style.display = matchFound ? "block" : "none";
            }
        }

        // Event listener for input changes in the search box
        searchBox.addEventListener("input", () => {
            const keywords = searchBox.value.trim(); // Get trimmed search keywords
            filterDivs(keywords); // Call filter function with keywords
        });

        // Show all divs by default on page load
        filterDivs(""); // Empty string to show all divs
    </script>



</body>

<script src="https://cdn.by.wonderpush.com/sdk/1.1/wonderpush-loader.min.js" async></script>
<script>
    window.WonderPush = window.WonderPush || [];
    WonderPush.push(["init", {
        webKey: "b4205c02e6660daa85064a98c610098cb8b90efd96ce5a5b09efa9a528684a66",
    }]);
</script>

</html>