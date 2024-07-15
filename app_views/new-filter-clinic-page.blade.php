<?php
$cid_url = isset($_GET["id"]) ? $_GET["id"] : "";
$cunique_url = isset($_GET["cunique"]) ? $_GET["cunique"] : "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect selected treatment types
    $selectedTreatments = isset($_POST['sort']) ? $_POST['sort'] : [];

    // Collect selected gender preference
    $selectedGender = isset($_POST['radio']) ? $_POST['radio'] : 'all';

    // Redirect URL with collected values
    $redirectUrl = "clinic-details.blade.php?id=$cid_url&cunique=$cunique_url";
    if (!empty($selectedTreatments)) {
        $treatmentParams = http_build_query(['treatments' => $selectedTreatments]);
        $redirectUrl .= "&$treatmentParams";
    }
    $redirectUrl .= "&gender=$selectedGender";

    // Redirect to the results page with collected values
    header("Location: $redirectUrl");
    exit;
}
?>
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Filters</title>




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

    a { -webkit-tap-highlight-color: transparent; }

    .checkboxSort {
        accent-color: #0CB4BF;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        height: 100vh;
        overflow: hidden;
    }

    nav {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 10%;
        z-index: 2;
        background-color: #fff;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;
        margin-bottom: 15px;
    }

    .back-btn {
        position: absolute;
        left: 5%;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 2px solid #a1a1a1;
        background-color: transparent;
    }

    .back-btn i {
        color: #a1a1a1;
        font-size: 28px
    }

    .location-dropdown {
        width: 100%;
        height: 50px;
        background-color: transparent;
        border-style: none;
    }

    .location-dropdown h1 {
        margin: auto;
        padding: 0;
        font-size: 48px;
        text-indent: 100px;
        font-weight: 700;
    }

    .gender-section {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 100%;
        height: auto;
        margin-top: 25px;
    }

    .price-section {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 100%;
        height: auto;
        margin-top: 50px;
    }

    .gender-section h3 {
        margin: auto;
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 40px;
        margin-bottom: 10px
    }

    .price-section h3 {
        margin: auto;
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 40px;
        margin-bottom: 10px
    }

    .dropdown-container {
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 25px;
    }

    .dropdown-field {
        width: 100%;
        height: auto;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
    }

    .dropdown-field h3 {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 40px;
        margin-bottom: 20px
    }

    /* -------------------------------------------------------------------- */

    select {
        width: 100%;
        height: 90px;
        border: 1px solid #444444;
        border-radius: 20px;
        font-size: 28px;
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 24px;

    }

    select:focus {
        outline: none;
    }

    option {
        width: 100%;
        border: 1px solid #444444;
        border-radius: 10px;
        font-size: 28px;
    }


    /* -------------------------------------------------------- */

    a {
        text-decoration: none;
    }

    ul {
        list-style-type: none;
    }

    .radio-section-box {
        margin: auto;
        width: 90%;
        border: 1px solid #444444;
        height: 90px;
        border-radius: 20px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        column-gap: 10px;
    }

    .radio-section {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        column-gap: 10px;
    }

    .radio-item [type="radio"] {
        display: none;

    }

    .radio-item {
        width: 95%;
        margin: auto;
    }

    .radio-item label {
        display: block;
        padding: 15px 15px;
        background: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        cursor: pointer;
        font-size: 28px;
        font-weight: 400;
        white-space: nowrap;
        position: relative;
        transition: 0.4s ease-in-out 0s;
        text-align: center;

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
        background-color: #0cb3bfe3;
        color: #fff;
    }

    /*------------------------------------------------*/

    .radio-section-box-1 {
        margin: auto;
        width: 90%;
        height: 100px;
        border-radius: 20px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        column-gap: 10px;
    }

    .radio-section-1 {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        column-gap: 10px;
    }

    .radio-item1 [type="radio"] {
        display: none;

    }

    .radio-item1 {
        width: 95%;
        margin: auto;
    }

    .radio-item1 label {
        display: block;
        padding: 15px 15px;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.8);
        border-radius: 16px;
        cursor: pointer;
        font-size: 28px;
        font-weight: 400;
        white-space: nowrap;
        position: relative;
        transition: 0.4s ease-in-out 0s;
        text-align: center;

    }
    .radio-item1 label:after,
    .radio-item1 label:before {
        content: "";
        position: absolute;
        border: 0px;

    }

    .radio-item1 label:after {
        height: 19px;
        width: 19px;
        border: 0px solid #524eee;
        left: 19px;
        top: calc(50% - 12px);

    }

    .radio-item1 label:before {
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

    .radio-item1 [type="radio"]:checked ~ label {
        border-color: #0CB4BF;
        background-color: #0cb3bfe3;
        color: #fff;
    }

    /* -----------------------------------------------*/

    .pricing-section {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        margin-top: 50px;
    }

    .booking-btn-container {
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        margin-bottom: 5%;
    }

    .book-now {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin-top: 0;
    }

    .book-now1 {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #0C1E36;
        background-color: transparent;
        border: 2px solid #0C1E36;
        border-radius: 20px;
        margin-top: 0;
    }

    .treatmentTypeBox {
        width: 100%;
        height: 38vh;
        position: relative;
        overflow: scroll;
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .treatmentTypeBox::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .treatmentTypeBox {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    /*----------------------------treatment section------------------------------*/

    .checkbox-item {
        width: 100%;
        height: 90px;
        border-bottom: 1px solid #444;
        background-color: #fff;
        padding: 30px 0px 0px 0px;
    }

    .sortingLabel {
        font-size: 34px;
    }

    .checkboxSort {
        width: 25pt;
        height: 25pt;
        float: right;
    }

    /*---------------------------------pricing------------------------------------------*/

    .pricing-btn-box {
        width: 100%;
        position: relative;
        height: 90px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        column-gap: 30px;
    }

    .btn-pricing1 {
        width: 100%;
        height: 90px;
        background-color: transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #444;
        border-radius: 20px;
    }

    .btn-prcing:active {
        border: 1px solid red;
    }

    .btn-pricing2 {
        width: 100%;
        height: 90px;
        background-color: transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #444;
        border-radius: 20px;
    }

    .btn-pricing3 {
        width: 100%;
        height: 90px;
        background-color: transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #444;
        border-radius: 20px;
    }

    #dollar-icon1 {
        font-size: 34px;
        color: #999;
    }

    #dollar-icon2 {
        font-size: 34px;
        color: #999;
    }

    #dollar-icon3 {
        font-size: 34px;
        color: #999;
    }

    .treatment-section {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        margin-top: 50px;
    }

    /*-----------------------------------------*/

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .back-btn {
            position: absolute;
            left: 5%;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 1px solid #a1a1a1;
            background-color: transparent;
        }

        .location-dropdown-container {
            display: flex;
            justify-content: flex-end;
            width: 90%;
            height: auto;
            margin-bottom: 1pt;
        }

        .back-btn i {
            color: #a1a1a1;
            font-size: 12pt;
        }

        .location-dropdown h1 {
            margin: auto;
            padding: 0;
            font-size: 16pt;
            text-indent: 50px;
            font-weight: 600;
        }

        .gender-section {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: auto;
            margin-top: 0px;
        }

        .price-section {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: auto;
            margin-top: 0px;
        }

        .gender-section h3 {
            margin: auto;
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            margin-bottom: 10px
        }

        .price-section h3 {
            margin: auto;
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            margin-bottom: 10px
        }

        /* -------------------------------------------------------- */

        .radio-section-box {
            margin: auto;
            width: 90%;
            border: 1px solid #444444;
            height: 45px;
            border-radius: 10px;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            column-gap: 10px;
        }

        .radio-section {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 10px;
        }

        .radio-item [type="radio"] {
            display: none;

        }

        .radio-item {
            width: 95%;
            margin: auto;
        }

        .radio-item label {
            display: block;
            padding: 10px 10px;
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            cursor: pointer;
            font-size: 10pt;
            font-weight: 400;
            white-space: nowrap;
            position: relative;
            transition: 0.4s ease-in-out 0s;
            text-align: center;

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
            border-color: 1px solid rgba(12, 180, 191, 1);
            background-color: rgba(12, 180, 191, 0.4);
            color: #fff;
        }

        /* --------- */

        .radio-section-box-1 {
            margin: auto;
            width: 90%;
            height: 45px;
            border-radius: 10px;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            column-gap: 10px;
        }

        .radio-section-1 {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 10px;
        }

        .radio-item1 [type="radio"] {
            display: none;

        }

        .radio-item1 {
            width: 95%;
            margin: auto;
        }

        .radio-item1 label {
            display: block;
            padding: 13px 13px;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.8);
            border-radius: 8px;
            cursor: pointer;
            font-size: 10pt;
            font-weight: 400;
            white-space: nowrap;
            position: relative;
            transition: 0.4s ease-in-out 0s;
            text-align: center;

        }
        .radio-item1 label:after,
        .radio-item1 label:before {
            content: "";
            position: absolute;
            border: 0px;

        }

        .radio-item1 label:after {
            height: 19px;
            width: 19px;
            border: 0px solid #524eee;
            left: 19px;
            top: calc(50% - 12px);

        }

        .radio-item1 label:before {
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

        .radio-item1 [type="radio"]:checked ~ label {
            border-color: 2px solid rgba(12, 180, 191, 1);
            background-color: rgba(12, 180, 191, 0.4);
            color: #fff;
        }

        /* --------- */

        .dropdown-field h3 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            margin-bottom: 10px
        }

        .pricing-section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .pricing-btn-box {
            width: 100%;
            position: relative;
            height: 45px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 10px;
        }

        .btn-pricing1 {
            width: 100%;
            height: 45px;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #444;
            border-radius: 10px;
        }

        .btn-pricing2 {
            width: 100%;
            height: 45px;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #444;
            border-radius: 10px;
        }

        .btn-pricing3 {
            width: 100%;
            height: 45px;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #444;
            border-radius: 10px;
        }

        #dollar-icon1 {
            font-size: 12pt;
            color: #999;
        }

        #dollar-icon2 {
            font-size: 12pt;
            color: #999;
        }

        #dollar-icon3 {
            font-size: 12pt;
            color: #999;
        }

        .treatment-section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .treatmentTypeBox {
            width: 100%;
            height: 40vh;
            position: relative;
            overflow: scroll;
        }
        /*----------------------------treatment section------------------------------*/

        .checkbox-item {
            width: 100%;
            height: 35px;
            border-bottom: 1px solid #444;
            background-color: #fff;
            padding: 10px 0px 0px 0px;
        }

        .sortingLabel {
            font-size: 12pt;
        }

        .checkboxSort {
            width: 13pt;
            height: 13pt;
            float: right;
        }

        .book-now {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .book-now1 {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #0C1E36;
            background-color: transparent;
            border: 2px solid #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .booking-btn-container {
            width: 90%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
            margin-bottom: 5%;
        }
    }

    @media only screen and (max-device-width: 767px) {
        .back-btn {
            position: absolute;
            left: 5%;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 1px solid #a1a1a1;
            background-color: transparent;
        }

        .location-dropdown-container {
            display: flex;
            justify-content: flex-end;
            width: 90%;
            height: auto;
            margin-bottom: 1pt;
        }

        .back-btn i {
            color: #a1a1a1;
            font-size: 12pt;
        }

        .location-dropdown h1 {
            margin: auto;
            padding: 0;
            font-size: 16pt;
            text-indent: 50px;
            font-weight: 600;
        }

        .gender-section {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: auto;
            margin-top: 0px;
        }

        .price-section {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: auto;
            margin-top: 0px;
        }

        .gender-section h3 {
            margin: auto;
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            margin-bottom: 10px
        }

        .price-section h3 {
            margin: auto;
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            margin-bottom: 10px
        }

        /* -------------------------------------------------------- */

        .radio-section-box {
            margin: auto;
            width: 90%;
            border: 1px solid #444444;
            height: 45px;
            border-radius: 10px;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            column-gap: 10px;
        }

        .radio-section {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 10px;
        }

        .radio-item [type="radio"] {
            display: none;

        }

        .radio-item {
            width: 95%;
            margin: auto;
        }

        .radio-item label {
            display: block;
            padding: 10px 10px;
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            cursor: pointer;
            font-size: 10pt;
            font-weight: 400;
            white-space: nowrap;
            position: relative;
            transition: 0.4s ease-in-out 0s;
            text-align: center;

        }
        .radio-item label:after,
        .radio-item label:before {
            content: "";
            position: absolute;
            border: 0px;

        }

        .title-search {
            height: 50px;
            text-align: center
        }

        .title-search h1 {
            margin: 0 10px;
            font-size: 16pt;
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
            border-color: 1px solid rgba(12, 180, 191, 1);
            background-color: rgba(12, 180, 191, 0.4);
            color: #fff;
        }

        /* --------- */

        .radio-section-box-1 {
            margin: auto;
            width: 90%;
            height: 45px;
            border-radius: 10px;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            column-gap: 10px;
        }

        .radio-section-1 {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 10px;
        }

        .radio-item1 [type="radio"] {
            display: none;

        }

        .radio-item1 {
            width: 95%;
            margin: auto;
        }

        .radio-item1 label {
            display: block;
            padding: 13px 13px;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.8);
            border-radius: 8px;
            cursor: pointer;
            font-size: 10pt;
            font-weight: 400;
            white-space: nowrap;
            position: relative;
            transition: 0.4s ease-in-out 0s;
            text-align: center;

        }
        .radio-item1 label:after,
        .radio-item1 label:before {
            content: "";
            position: absolute;
            border: 0px;

        }

        .radio-item1 label:after {
            height: 19px;
            width: 19px;
            border: 0px solid #524eee;
            left: 19px;
            top: calc(50% - 12px);

        }

        .radio-item1 label:before {
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

        .radio-item1 [type="radio"]:checked ~ label {
            border-color: 2px solid rgba(12, 180, 191, 1);
            background-color: rgba(12, 180, 191, 0.4);
            color: #fff;
        }

        /* --------- */

        .dropdown-field h3 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            margin-bottom: 10px
        }

        .pricing-section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .pricing-btn-box {
            width: 100%;
            position: relative;
            height: 45px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 10px;
        }

        .btn-pricing1 {
            width: 100%;
            height: 45px;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #444;
            border-radius: 10px;
        }

        .btn-pricing2 {
            width: 100%;
            height: 45px;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #444;
            border-radius: 10px;
        }

        .btn-pricing3 {
            width: 100%;
            height: 45px;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #444;
            border-radius: 10px;
        }

        #dollar-icon1 {
            font-size: 12pt;
            color: #999;
        }

        #dollar-icon2 {
            font-size: 12pt;
            color: #999;
        }

        #dollar-icon3 {
            font-size: 12pt;
            color: #999;
        }

        .treatment-section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .treatmentTypeBox {
            width: 100%;
            height: 40vh;
            position: relative;
            overflow: scroll;
        }
        /*----------------------------treatment section------------------------------*/

        .checkbox-item {
            width: 100%;
            height: 35px;
            border-bottom: 1px solid #444;
            background-color: #fff;
            padding: 10px 0px 0px 0px;
        }

        .sortingLabel {
            font-size: 12pt;
        }

        .checkboxSort {
            width: 13pt;
            height: 13pt;
            float: right;
        }

        .book-now {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 40px;
        }

        .book-now1 {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #0C1E36;
            background-color: transparent;
            border: 2px solid #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .booking-btn-container {
            width: 90%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
            margin-bottom: 5%;
        }
    }

    @media only screen and (max-device-width: 320px) {
        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            padding-top: 2%;
            z-index: 2;
            background-color: #fff;
        }

        .booking-btn-container {
            width: 90%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
            margin-bottom: -5%;
        }

        .treatment-section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            margin-top: 0;
        }

        .book-now {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }

        .treatmentTypeBox {
            width: 100%;
            height: 37vh;
            position: relative;
            overflow: scroll;
        }

        .location-dropdown h1 {
            margin: auto;
            padding: 0;
            font-size: 14pt;
            text-indent: 50px;
            font-weight: 600;
        }

        .gender-section {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: auto;
            margin-top: -10px;
        }

        .gender-section h3 {
            margin: auto;
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            margin-bottom: 10px
        }

        .title-search {
            height: 30px;
            text-align: center;
            margin-bottom: 10px;
        }

        .title-search h1 {
            margin: 0 10px;
            font-size: 14pt;
        }
    }



</style>

<body>



<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




<nav>
    <div class="location-dropdown-container">
        <?php

        $gender = isset($_GET['gender']) ? $_GET['gender'] : '';
        $treatments = isset($_GET['treatments']) ? $_GET['treatments'] : [];

        if (!empty($cid_url) && !empty($cunique_url)) {
            echo "<a href='clinic-details.blade.php?id=$cid_url&cunique=$cunique_url'>";
            echo "<button class='back-btn'>";
            echo "<i class='fa-solid fa-angle-left'></i>";
            echo "</button></a>";
        }



        ?>
        <div class="location-dropdown">
            <h1 style="margin-top: 7px;"></h1>
        </div>
    </div>
</nav>
<div>
    <div class="title-search">

        <h1><i style="color: #0CB4BF" class="fa-solid fa-search"></i>  Refine your search</h1>
    </div>
</div>
<form method="post">
    <section class="gender-section">
        <div style="margin: auto; width: 90%">
            <h3>Gender Preferences</h3>
        </div>

        <div class="radio-section-box">
            <div class="radio-section">
                <div class="radio-item">
                    <input name="radio" id="radio1" type="radio" value="all" <?php echo ($gender === 'all') ? 'checked' : ''; ?>>
                    <label for="radio1">All</label>
                </div>
                <div class="radio-item">
                    <input name="radio" id="radio2" type="radio" value="male" <?php echo ($gender === 'male') ? 'checked' : ''; ?>>
                    <label for="radio2">Male</label>
                </div>
                <div class="radio-item">
                    <input name="radio" id="radio3" type="radio" value="female" <?php echo ($gender === 'female') ? 'checked' : ''; ?>>
                    <label for="radio3">Female</label>
                </div>
            </div>
        </div>
    </section>

    <br>

    <!--<section class="price-section">-->
    <!--    <div style="margin: auto; width: 90%">-->
    <!--        <h3>Price</h3>-->
    <!--    </div>-->

    <!--    <div class="radio-section-box-1">-->
    <!--        <div class="radio-section-1">-->
    <!--                <div class="radio-item1"><input name="radio2" id="radio4" type="radio" checked><label for="radio4">$</label></div>-->
    <!--                <div class="radio-item1"><input name="radio2" id="radio5" type="radio"><label for="radio5">$$</label></div>-->
    <!--                <div class="radio-item1"><input name="radio2" id="radio6" type="radio"><label for="radio6">$$$</label></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!--<section class="pricing-section">-->
    <!--    <div style="margin: auto; width: 90%">-->
    <!--        <div class="dropdown-field">-->
    <!--            <div style="width: 100%">-->
    <!--                <h3>Price</h3>-->
    <!--            </div>-->

    <!--            <div class="pricing-btn-box">-->
    <!--                <div style="width: 100%;">-->
    <!--                    <button class="btn-pricing1">-->
    <!--                        <div style="width: max-content; height: max-content; display: grid; grid-template-columns: repeat(3, 1fr); column-gap: 5px;">-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon1"></i></div>-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon2"></i></div>-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon3"></i></div>-->
    <!--                        </div>-->
    <!--                    </button>-->
    <!--                </div>-->

    <!---->

    <!--                <div style="width: 100%;">-->
    <!--                    <button class="btn-pricing2">-->
    <!--                        <div style="width: max-content; height: max-content; display: grid; grid-template-columns: repeat(3, 1fr); column-gap: 5px;">-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon1"></i></div>-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon2"></i></div>-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon3"></i></div>-->
    <!--                        </div>-->
    <!--                    </button>-->
    <!--                </div>-->

    <!---->

    <!--                <div style="width: 100%;">-->
    <!--                    <button class="btn-pricing3">-->
    <!--                        <div style="width: max-content; height: max-content; display: grid; grid-template-columns: repeat(3, 1fr); column-gap: 5px;">-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon1"></i></div>-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon2"></i></div>-->
    <!--                            <div><i class="fa-solid fa-dollar-sign" id="dollar-icon3"></i></div>-->
    <!--                        </div>-->
    <!--                    </button>-->
    <!--                </div>-->

    <!---->

    <!--            </div>-->

    <!--        </div>  -->
    <!--    </div>-->
    <!--</section>-->

    <!-- ------------------------------------------------------------------------------------------------------------------------ -->


    <section class="treatment-section">
        <div style="margin: auto; width: 90%">
            <div class="dropdown-field">
                <div style="width: 100%">
                    <h3 style="font-size: 14pt">Treatment Type</h3>
                </div>

                <?php require_once 'server.blade.php';?>

                <?php


// Connect to database


// Get project ID from URL


// Validate and query project details

                $sql = "SELECT DISTINCT services.subcat
                    FROM services
                    INNER JOIN clinics ON clinics.cunique = services.cunique
                    WHERE clinics.ccountry = 'Switzerland'
                    ORDER BY services.subcat ASC";
                $stmt = $con->prepare($sql);

                $stmt->execute();
                $result = $stmt->get_result();


                ?>


                <div class="treatmentTypeBox">

                    <?php
                    if ($result->num_rows > 0) {
                        // Loop through each row and echo the subcategory
                        while($row = $result->fetch_assoc()) {
                            $isChecked = in_array($row['subcat'], $treatments) ? 'checked' : '';
                            echo '

                    <!-- echo this div container-->
                    <div class="checkbox-item">
                <label style="width:100%; display: inline-block; -webkit-tap-highlight-color: transparent;" class="sortingLabel" for="' . $row['subcat'] . '">' . $row['subcat'] . '</label>
                <input style="margin-top: -15px; -webkit-tap-highlight-color: transparent;" type="checkbox" name="sort[]" id="' . $row['subcat'] . '"  value="' . $row['subcat'] . '" class="checkboxSort" ' . $isChecked . '>
            </div>';
                        }
                    } else {
                        echo "No subcategories found";
                    }
                    ?>




                </div>


            </div>

        </div>

        <!-- ------------------------------------------------------------------------------------------------------------------------ -->

        </div>
    </section>

    <section style="margin-top:20px; margin-bottom: 20px; position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">
            <div>
                <button class="book-now" type="submit" style="font-family: 'Poppins', sans-serif; width: 100%; text-decoration: none;">Apply</button>
            </div>
            <div>
                <button class="book-now1" type="reset" onclick="redirectToNewPage()" style="font-family: 'Poppins', sans-serif; width: 100%; text-decoration: none;">Reset</button>
            </div>
        </div>
    </section>
</form>
</body>
<script>
    function redirectToNewPage() {
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $cunique = isset($_GET['cunique']) ? $_GET['cunique'] : '';

        $queryParams = http_build_query(['id' => $id, 'cunique' => $cunique]);
        ?>


        var url = 'new-filter-clinic-page.blade.php?<?php echo $queryParams; ?>';

        window.location.href = url;
    }
</script>
</html>
