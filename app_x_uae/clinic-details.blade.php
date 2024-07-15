<?php

include 'session.php';

require_once 'server-connect.php';

?>
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>
</head>

<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        let queryParams = new URLSearchParams(window.location.search);

        $.ajax({
            url: 'reviews.php',
            type: 'POST',
            data: {
                id : queryParams.get('cunique')
            },
            success: function(response) {
                let reviews = JSON.parse(response);
                var $scrollContainer = $('.scroll-container');

                reviews.forEach(function(review) {
                    var $customerReviewCard = $('<div class="customer-reviews-card"></div>');
                    var $userName = $('<div style="margin: auto; width: 90%;"><p style="margin: 0 auto 10px auto; width: 100%; height: auto; padding: 0; font-size: 16px; font-weight: 500;">' + review.user + '</p></div>');
                    var $content = $('<div style="margin: auto; width: 90%; height: 100px; max-height: 100px;"><p style="margin: 0 auto 10px auto; width: auto; height: auto; padding: 0; font-size: 12px; font-weight: 400; overflow-wrap: break-word;">' + review.content + '</p></div>');
                    var $stars = $('<div style="margin: auto; width: 90%;"></div>');

                    // Add stars based on rating
                    for (var i = 0; i < parseInt(review.rating); i++) {
                        $stars.append('<i class="fa-solid fa-star" style="font-size: 12px; color: #0CB4BF;"></i>');
                    }
                    for (var i = parseInt(review.rating); i < 5; i++) {
                        $stars.append('<i class="fa-solid fa-star" style="font-size: 12px; color: #444444;"></i>');
                    }

                    // Append elements to customer review card
                    $customerReviewCard.append($userName, $content, $stars);
                    // Append customer review card to scroll container
                    $scrollContainer.append($customerReviewCard);
                });
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(error);
            }
        });
    });
</script>
<style>

    @font-face {
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
        url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .example::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .example {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .clinic-small-logo {
        position: absolute;
        width: 10vw;
        height: 10vw;
        margin-top: 50vw;
        margin-left: 5%;
        border-radius: 8pt;
        /* added */
        margin: 0;
        bottom: 56px;
        right: 70px;

        max-width: 100px !important;
        max-height: 100px !important;
    }

    .clinic-small-logo-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        position: absolute;
    }


    /* --------------------------------menu------------------------------------- */

    a { -webkit-tap-highlight-color: transparent; }

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

    /* ------------------------------------------------------------------------- */

    body {
        /* max-width: 100%;
        margin: 0 auto; */
        padding: 0;
        font-family: 'poppinsregular';
        padding-bottom: 15%;
        overflow-x: hidden;
        line-height: 1;
        background-color: rgb(227, 227, 227);
    }


    .top-spacer {
        width: 100%;
        height: 19vw;
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
        height: 85px;
        font-size: 38px;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
        font-family: 'poppinsregular';
    }

    .service-details-img-section {
        width: 100%;
        padding-left: 50px;
        padding-right: 50px;
        position: relative;
        height: 250px;
        margin-top: 50px;
    }

    .service-details-img-container {
        width: 100%;
        height: 100%;
    }

    .service-details-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .back-btn {
        position: absolute;
        /*left: 5%;*/
        /*margin-top: 25%;*/
        /*width: 75px;*/
        /*height: 75px;*/
        border-radius: 50%;
        border-style: none;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        background-color: #fff;
        /* added */
        margin: 0;
        top: 125px;
        width: 50px;
        height: 50px;
        left: 70px;
    }

    .service-details-section {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
    }

    .service-details-section-container {
        width: 90%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(3, max-content max-content 55%);
        column-gap: 20px;
        margin-top: 20px;
    }

    .more-details-section {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 100%;
        height: auto;
    }

    .address {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 4px;
        width: 90%;
        margin: auto;
    }

    .pricing-container {
        width: 90%;
        height: max-content;
        display: flex;
        column-gap: 20px;
        margin-right: 10%;
    }

    .offer-validity {
        width: 210%;
    }

    .consultation-fee {
        width: 90%;
        height: auto;
    }

    .service-description {
        width: 90%;
        height: auto;
        font-size: 28px;
    }

    .booking-btn-container {
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        margin-bottom: 10%;
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

    .cost-container {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(3, max-content);
    }

    .expert-img-container {
        /*width: 100%;*/
        /*height: 225px;*/
        border-radius: 25px;
        /* added */
        height: 100%;
        width: 60%;
    }

    .expert-details {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
    }

    .filter-btn {
        width: 100%;
        height: 100px;
        font-size: 20px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
    }

    .category-container {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(4, auto);
        margin: auto;
    }

    .divider {
        width: 100%;
        height: 1px;
        background-color: #e3e3e3;
        margin-top: 20px;
    }

    .divider-category {
        width: 100%;
        height: 10px;
        background-color: #0CB4BF;
        margin-top: 5px;
    }

    .services-list {
        margin: auto;
        display: grid;
        grid-template-columns: repeat(3, 25% 55% 20%);
        width: 100%;
        height: 150px;
        border-bottom: 1px solid #e3e3e3;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .service-img-container {
        width: 100%;
        height: 225px;
        border-radius: 25px;
        /*added*/
        width: 70%;
    }

    .service-details-list {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 100%;
        height: max-content;
        margin-top: 10px;
    }

    .service-price-list {
        width: 100%;
        text-align: right;
    }

    .customer-reviews-card {
        margin: auto;
        width: 100%;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 15px;
        height: auto;
        padding-top: 75px;
        padding-bottom: 75px;
        margin-top: 25px;
        background-color: #fff;
        border-radius: 20px;
        border: 1px solid #ccc;
    }

    .clinic-description {
        font-size: 20px;
    }

    /* -------------------------service tabs------------------------- */

    .category-container {
        overflow: hidden;
        background-color: transparent;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    .category-container button {
        width: 100%;
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        transition: 0.3s;
        font-size: 20px;
        color: #666666;
        border-bottom: 10px solid #b3b3b3;
    }

    .category-container button.active {
        color: #000;
        font-weight: 600;
        border-bottom: 10px solid #0CB4BF;
    }

    .tabcontent {
        display: none;
        width: 90%;
        margin: auto;
        height: auto;
        margin-top: 10px;
        overflow-x: hidden;
    }

    /*-------------------------------*/

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

    .clinic-title-name {
        width: 100%;
        margin: 0;
        padding: 0;
        /*font-size: 44px;*/
        /*added*/
        font-size: 32px;
    }

    .paragraph-2 {
        width: 100%; height: auto; padding: 0; font-size: 20px; margin-top: 8px;
    }

    .paragraph-3 {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        font-size: 14px;
    }
    /* added */
    .paragraph-3 img {
        height: 32px !important;
    }
    .right-icons-container {
        width: max-content;
        float: right;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        column-gap: 5px;
        /*margin-top: -20px;*/
        /*added*/
        margin-top: -115px;
    }

    .circle-icon {
        /*padding: 15px;*/
        /*added*/
        padding: 10px 8px;
        border-radius: 50%;
        border: 2px solid #444444;
        display: flex;
        margin-top: 20px;
        justify-content: center;
        align-items: center;
    }

    #icon-right {
        font-size: 10px;
        color: #444444;
    }

    #back-arrow {
        color: #a1a1a1;
        font-size: 28px;
    }

    #cost-1 {
        font-size: 34px;
        color: #0CB4BF;
        /*added*/
        font-size: 14px;
    }

    #cost {
        font-size: 34px;
        color: #444444;
        /*added*/
        font-size: 14px;
    }

    .paragraph {
        /*width: 100%;*/
        height: auto;
        margin: 0;
        padding: 0;
        font-weight: 400;
        /* added */
        font-size: 14px !important;
        width: 75%;
        line-height: 1.2;
    }
    
    .icons {
        padding: 8px 8px; 
        border: 1px solid black; 
        border-radius: 99999px; 
        display: flex; 
        justify-content: center; 
        align-items: center;
        cursor: pointer;
    }

    .section-title {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 42px;
        font-weight: 600;
        font-size: 20px;
    }

    .our-expert-section {
        width: 100%;
        height: 124px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 10px;
    }

    .view-more-btn {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 38px;
        font-weight: 400;
    }

    #arrow-right {
        color: #000;
        font-size: 34px;
    }

    .expert-item {
        height: 150px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 120px;
        margin-top: 10px;
    }

    .expert-img-container img{
        width: 100%;
        height: 80%;
        object-fit: cover;
        border-radius: 25px;
    }

    .expert-name {
        width: 100%;
        margin: 0;
        padding: 0;
        /*font-size: 28px;*/
        color: #444444;
        /*added*/
        margin-top: -21px;
        font-size: 14px;
    }

    .search-clinic-details {
        width: 100%;
        height: 65px;
        background-color: #f1f1f1;
        border-style: none;
        border-radius: 15px;
        font-size: 20px;
        text-indent: 24px;
        margin-left: 50px;
    }

    .search-clinic-details:focus {
        outline:none;
    }

    #arrow-down {
        font-size: 28px;
    }

    #sort-icon {
        font-size: 38px;
        color: #0CB4BF;
    }

    .tab-title {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 20px;
        font-weight: 600;
    }

    .tab-sections {
        margin: auto;
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        overflow-x: hidden;

    }

    .service-item-title {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 14px;
    }

    .varies {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        font-size: 14px;
        margin-top: 10px;
    }

    .filter-box {
        width: 100%;
        height: auto;
        display: grid;
        margin-top: 30px;
        grid-template-columns: repeat(1, 1fr);
    }
    .this-discountdisplay {
        font-size: 14px !important;
        text-decoration: line-through;
        color: #787878;
        text-decoration-color: #46AFB4;
    }

    .gender-box {
        /*margin: auto;*/
        /*width: 90%;*/
        /*display: grid;*/
        /*grid-template-columns: repeat(2, 10% 90%);*/
        /*added*/
        display: flex;
        margin: auto;
        width: 90%;
        gap: 6px;
    }
    .gender-box div img {
        height: 24px !important;
    }

    .service-location {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 14px;
        color: #444444;
    }

    .service-gender {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 14px;
        color: #444444;
        margin-top: 5px
    }

    .service-rating {
        margin: 0;
        width: 90%;
        height: auto;
        padding: 0;
        font-size: 12px;
    }

    #service-star {
        font-size: 12px;
        color: #0CB4BF;
    }

    .service-price {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 14px;
        text-align: right;
        font-weight: 600;
        /*added*/
        margin: 6px 0;
    }

    .service-price span {
        font-size: 16px !important;
    }

    .service-img-container img {
        width: 100%;
        height: 125px;
        object-fit: cover;
        border-radius: 25px;
    }

    .no-items-available {
        width: 100%;
        height: 750px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .no-items-available h1 {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 28px;
        font-weight: 400;
    }

    /*-----------------------dropdown------------------------*/

    .dropbtn {
        background-color: #fff;
        color: #000;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover, .dropbtn:focus {
        background-color: #fff;
    }

    .dropdown {
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
        padding: 25px !important;
        left: -100px;
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

    .flag-icons-img {
        width: 60px;
        height: auto;
        float: left;
        /*margin-top: -90px;*/
        /*margin-right: 10px;*/
        /*added*/
        margin-top: -72px;
        margin-right: 101px;
    }

    .expert-scroll {
        margin: auto;
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(10, max-content);
        /*column-gap: 35px; */
        overflow: scroll;
        /*added*/
        column-gap: 0;
    }

    .right-icon-box {
        width: 100%;
        height: auto;
    }

    .filter-btn-sort {
        width: 100%;
        height: auto;
        display: flex;
        align-items: center;

    }

    #share-button {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: transparent;
        border-style: none;
        /*added*/
        cursor: pointer;
    }

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .address {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            width: 90%;
            margin: auto;
        }

        .service-details-img-section {
            width: 100%;
            height: 32vh;
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
            width: 12pt;
            height: auto;
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


        .back-btn {
            position: absolute;
            left: 5%;
            /*margin-top: 14vw;*/
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            /* added */
            margin-top: 5vw;

        }

        #back-arrow {
            color: #a1a1a1;
            font-size: 12pt;
            text-align: center;
        }

        .clinic-small-logo {
            position: absolute;
            width: 8vw;
            height: 8vw;
            /*margin-top: 32vw;*/
            /*right: 0;*/
            /*margin-right: 3%;*/
            border-radius: border-radius: 8px;
            box-shadow: rgba(0,0,0, 0.9);
            /* added */
            bottom: 20px;
            right: 25px;


        }

        .clinic-small-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 0 3px rgba(0,0,0, 0.2);
        }

        /*--------------------*/

        .service-details-section-container {
            width: 90%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(3, max-content max-content 55%);
            margin-top: 2vh;
            column-gap: 10px;
        }

        .clinic-title-name {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 16pt;
        }

        .paragraph-2 {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            margin-top: 5px;
            color: #666;
        }

        .paragraph-3 {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            color: #666;
        }
        /* added */
        .paragraph-3 img {
            height: 14px !important;
        }

        .right-icons-container {
            width: max-content;
            float: right;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 5px;
            margin-top: -20px;
        }

        #icon-right {
            font-size: 10pt;
            color: #444444;
        }

        .circle-icon {
            /* width: 33px;
            height: 33px; */
            padding: 4px; 8px;
            border-radius: 50%;
            border: 1px solid #444444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #cost-1 {
            font-size: 14pt;
            color: #0CB4BF;
        }

        #cost {
            font-size: 14pt;
            color: #444444;
        }

        .paragraph {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 14px !important;
            font-weight: 400;
            line-height: 1.2rem;
            text-align: justify;
            color: #212121;
            margin-top: 2px;
        }

        .section-title {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 14pt;
            font-weight: 600;
        }

        .our-expert-section div {
            margin-bottom: auto !important;
        }

        .view-more-btn {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 12pt;
            font-weight: 400;
        }

        #arrow-right {
            color: #000;
            font-size: 10pt;
        }

        .expert-item {
            width: 85px;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            margin-top: 10px;
        }

        .expert-img-container {
            width: 100%;
            height: 85px;
            border-radius: 25px;
        }

        .expert-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .expert-name {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            color: #444444;
        }

        .search-clinic-details {
            margin-top: 5px;
            width: 100%;
            height: 25px;
            background-color: #f1f1f1;
            border-style: none;
            border-radius: 5px;
            font-size: 12px;
            text-indent: 7px;
        }

        #arrow-down {
            font-size: 8px;
        }

        .filter-btn {
            width: 100%;
            height: 50px;
            font-size: 14pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #212121;
        }

        #sort-icon {
            font-size: 14px;
            color: #0CB4BF;
        }

        .divider {
            width: 100%;
            height: 1px;
            background-color: #e3e3e3;
            margin-top: 0px;
        }

        .category-container button {
            width: 100%;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 15px 5px;
            transition: 0.3s;
            font-size: 12px;
            color: #666666;
            border-bottom: 3px solid #b3b3b3;
        }

        .category-container button.active {
            color: #000;
            font-weight: 600;
            border-bottom: 3px solid #0CB4BF;
        }

        .tab-title {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 14pt;
            font-weight: 600;
        }

        .tab-sections {
            margin: auto;
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 1px;
        }

        .service-item-title {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
        }

        .varies {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            margin-top: 5px;
            color: #444444;
            text-align: right;
        }

        .filter-box {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 5px;
        }

        .gender-box {
            margin: auto;
            width: 90%;
            display: grid;
            grid-template-columns: repeat(2, 8% 92%);
        }

        .gender-box div img {
            height: 13px !important;
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

        .service-rating {
            margin: 0;
            width: 90%;
            height: auto;
            padding: 0;
            font-size: 12pt;
        }

        #service-star {
            font-size: 10pt;
            color: #0CB4BF;
        }

        .service-price {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            text-align: right;
            font-weight: 600;
        }
        .service-price span {
            font-size: 8px !important;
        }

        .services-list {
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 20% 60% 20%);
            width: 100%;
            height: 150px;
            border-bottom: 1px solid #e3e3e3;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .service-img-container {
            width: 100%;
            height: 125px;
            border-radius: 5px;
        }

        .service-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .no-items-available {
            width: 100%;
            height: 60vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .no-items-available h1 {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 8pt;
            font-weight: 400;
        }

        .customer-reviews-card {
            margin: auto;
            width: 90%;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 15px;
            height: auto;
            padding-top: 25px;
            padding-bottom: 25px;
            margin-top: 25px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ccc;
        }



        /*-----------------------dropdown------------------------*/

        .dropbtn {
            margin-left: 10%;
            width: 90%;
            height: 100%;
            background-color: #fff;
            color: #000;
            padding: 16px;
            font-size: 12px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #fff;
            outline: none;
        }

        .dropdown {
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
            left: -160px;
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

        .closeSortBtn {
            width: 100%;
            height: 35px;
            background-color: #0C1E36;
            border-radius: 5px;
            color: #fff;
        }

        .flag-icons-img {
            width: 40px;
            height: auto;
            float: left;
            margin-top: -43px;
            margin-right: 5px;
        }

        .expert-scroll {
            margin: auto;
            width: 90%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(10, max-content);
            column-gap: 5pt;
            overflow: scroll;
        }

        .more-details-section {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: auto;
            margin-top: 5px;
        }
    }


    @media only screen and (max-device-width: 767px) {

        .address {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            width: 90%;
            margin: auto;
        }

        .service-details-img-section {
            width: 100%;
            height: 32vh;
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
            width: 12pt;
            height: auto;
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
            margin: 10px 0 10px 0;
        }

        .modal-p-1 {
            width: 100%;
            text-align: center;
            font-size: 8pt;
            margin: 10px 0 10px -12pt;
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


        .back-btn {
            position: absolute;
            left: 5%;
            /*margin-top: 27%;*/
            width: 30pt;
            height: 30pt;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            /* added */
            margin-top: 15%;
        }

        #back-arrow {
            position: absolute;
            color: #a1a1a1;
            font-size: 12pt;
            text-align: center;
            top: 30%;
            right: 38%;
        }


        .clinic-small-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 0 3px rgba(0,0,0, 0.2);
        }

        /*--------------------*/

        .service-details-section-container {
            width: 90%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(3, max-content max-content 55%);
            margin-top: 2vh;
            column-gap: 10px;
        }

        .clinic-title-name {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
        }

        .paragraph-2 {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            margin-top: 5px;
            color: #666;
        }

        .paragraph-3 {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            color: #666;
        }
        /* added */
        .paragraph-3 img {
            height: 14px !important;
        }

        .right-icons-container {
            width: max-content;
            float: right;
            display: grid;
            grid-template-columns: repeat(, 1fr);
            column-gap: 5px;
            margin-top: -20px;
        }

        #icon-right {
            font-size: 10pt;
            color: #444444;
        }

        .circle-icon {
            /* width: 4pt;
            height: 4pt; */
            /* border-radius: 50%; */
            border: 1px solid #444444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #cost-1 {
            font-size: 10pt;
            color: #0CB4BF;
        }

        #cost {
            font-size: 10pt;
            color: #444444;
        }

        .paragraph {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 14px !important;
            font-weight: 400;
            line-height: 1.2rem;
            text-align: justify;
            color: #212121;
        }

        .section-title {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 14pt;
            font-weight: 600;
        }

        .our-expert-section {
            width: 100%;
            height: 200px;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 2vh;
        }

        .our-expert-section div {
            margin-bottom: auto !important;
        }

        .view-more-btn {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 12pt;
            font-weight: 400;
        }

        #arrow-right {
            color: #000;
            font-size: 10pt;
        }

        .expert-item {
            width: 85px;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 5px;
            margin-top: 10px;
        }

        .expert-img-container {
            width: 100%;
            height: 85px;
            border-radius: 25px;
        }

        .expert-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .expert-name {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            color: #444444;
        }

        .search-clinic-details {
            margin-top: 5px;
            width: 100%;
            height: 25px;
            background-color: #f1f1f1;
            border-style: none;
            border-radius: 5px;
            font-size: 12px;
            text-indent: 7px;
        }

        #arrow-down {
            font-size: 8px;
        }

        .filter-btn {
            width: max-content;
            height: auto;
            font-size: 9pt;
            font-weight: 400;
            background-color: transparent;
            border-style: none;
            color: #212121;
            padding: 0;
        }

        #sort-icon {
            font-size: 14px;
            color: #0CB4BF;
        }

        .divider {
            width: 100%;
            height: 1px;
            background-color: #e3e3e3;
            margin-top: 0px;
        }

        .category-container button {
            width: 100%;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 0px;
            transition: 0.3s;
            font-size: 12px;
            color: #666666;
            border-bottom: 3px solid #b3b3b3;
        }

        .category-container button.active {
            color: #000;
            font-weight: 600;
            border-bottom: 3px solid #0CB4BF;
        }

        .tab-title {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 14pt;
            font-weight: 600;
        }

        .tab-sections {
            margin: auto;
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 1px;
        }

        .service-item-title {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .varies {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            margin-bottom: 5px;
            color: #444444;
            text-align: right;
        }

        .filter-box {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 5px;
        }

        .gender-box {
            margin: auto;
            width: 90%;
            display: grid;
            grid-template-columns: repeat(2, max-content 90%);
            column-gap: 3pt;
        }

        .gender-box div img {
            height: 13px !important;
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

        .service-rating {
            margin: 0;
            width: 90%;
            height: auto;
            padding: 0;
            font-size: 10pt;
        }

        #service-star {
            font-size: 8pt;
            color: #0CB4BF;
        }

        .service-price {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            text-align: right;
            font-weight: 600;
        }
        .service-price span {
            font-size: 8px !important;
        }

        .services-list {
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 20% 50% 30%);
            width: 100%;
            height: auto;
            border-bottom: 1px solid #e3e3e3;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .service-img-container {
            width: 100%;
            height: 75px;
            border-radius: 5px;
        }

        .service-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .no-items-available {
            width: 100%;
            height: 60vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .no-items-available h1 {
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 8pt;
            font-weight: 400;
        }

        .customer-reviews-card {
            margin: auto;
            width: 90%;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 15px;
            height: auto;
            padding-top: 25px;
            padding-bottom: 25px;
            margin-top: 25px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ccc;
        }



        /*-----------------------dropdown------------------------*/

        .dropbtn {
            margin-left: 10%;
            width: 90%;
            height: 100%;
            background-color: #fff;
            color: #000;
            padding: 16px;
            font-size: 12px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #fff;
            outline: none;
        }

        .dropdown {
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
            left: -160px;
            border-radius: 10px;
        }

        .dropdown-content label {
            font-size: 10pt;
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

        .closeSortBtn {
            width: 100%;
            height: 35px;
            background-color: #0C1E36;
            border-radius: 5px;
            color: #fff;
        }

        .flag-icons-img {
            width: 40px;
            height: auto;
            float: left;
            margin-top: -43px;
            margin-right: 5px;
        }

        .expert-scroll {
            margin: auto;
            width: 90%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(10, max-content);
            column-gap: 5pt;
            overflow: scroll;
        }

        .more-details-section {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: auto;
            margin-top: 5px;
        }

        .this-discountdisplay {
            font-size: 12px !important;
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
    }
</style>

<style>
    /* Additional CSS for scroll snap */
    .scroll-container {
        scroll-snap-type: x mandatory;
        overflow-y: hidden;
        white-space: nowrap;
        width: 90%;
        margin: auto;
    }

    .customer-reviews-card {
        scroll-snap-align: start;
        display: inline-block;
        width: 99%;
        margin-right: 20px; /* Add space between items */
    }

    .clinic-details {
        background-color: white;
        padding: 0 20px 50px 20px;
        max-width: 1000px;
        border-radius: 10px;
        padding-top: 50px;
    }

    .clinic-details-page {
        margin-top: 120px;
        display: flex;
        justify-content: center;
        gap: 30px;
    }

    .clinic-book-now-container {
        background-color: white;
        max-height: 345px;
        border-radius: 10px;
        max-width: 350px;
        min-width: 350px;
    }

    .web-nav {
        background-color: white;
        color: black;
        top: 0;
        display: flex !important;
        margin: auto;
        gap: 25px;
        align-items: center;
        flex-wrap: wrap;
        padding: 20px 0;
    }

    .border-line {
        width: 100%;
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        font-size: 20px;
        color: #666666;
        border-bottom: 10px solid #b3b3b3;
    }

    @media only screen and (max-device-width: 1024px) {
        .clinic-details-page {
            margin-top: 175px;
            margin-right: 10px;
            margin-left: 10px;
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        
        .expert-name {
            width: 97px !important;
            text-align: center;
        }
        
        .expert-details {
            margin-top: 8px !important;
        }
        
        .container {
            margin-top: 50px !important;
        }

        .border-line {
            width: 100%;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            font-size: 20px;
            color: #666666;
            border-bottom: 3px solid #b3b3b3;
        }

        .service-details-img-section {
            width: 100%;
            padding-left: 30px;
            padding-right: 30px;
            position: relative;
            height: 250px;
            margin-top: 50px;
        }

        .backBtn {
            margin-left: 30px !important;
        }

        .clinic-small-logo {
            position: absolute;
            width: 7vw;
            height: 7vw;
            margin-top: 50vw;
            margin-left: 5%;
            border-radius: 8pt;
            /* added */
            margin: 0;
            bottom: 45px;
            right: 55px;

            max-width: 100px !important;
            max-height: 100px !important;
        }

        .back-btn {
            position: absolute;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin: 0;
            top: 150px;
            width: 40px;
            height: 40px;
            left: 70px;
        }

        .circle-icon {
            padding: 8px 6px;
            border-radius: 50%;
            border: 2px solid #444444;
            display: flex;
            margin-top: 20px;
            justify-content: center;
            align-items: center;
        }
    }
    
    @media only screen and (min-device-width: 1440px) {
        .clinic-details-page {
            margin-top: 175px;
            margin-right: 10px;
            margin-left: 10px;
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        
        .expert-name {
            width: 97px !important;
            text-align: center;
        }
        
        .expert-details {
            margin-top: 8px !important;
        }
        
        .container {
            margin-top: 50px !important;
        }
        
        .tablinks {
            font-size: 16px !important;
        }

        .border-line {
            width: 100%;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            font-size: 20px;
            color: #666666;
            border-bottom: 3px solid #b3b3b3;
        }

        .service-details-img-section {
            width: 100%;
            padding-left: 30px;
            padding-right: 30px;
            position: relative;
            height: 250px;
            margin-top: 50px;
        }

        .backBtn {
            margin-left: 30px !important;
        }

        .clinic-small-logo {
            position: absolute;
            width: 7vw;
            height: 7vw;
            margin-top: 50vw;
            margin-left: 5%;
            border-radius: 8pt;
            /* added */
            margin: 0;
            bottom: 45px;
            right: 55px;

            max-width: 100px !important;
            max-height: 100px !important;
        }

        .back-btn {
            position: absolute;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin: 0;
            top: 150px;
            width: 40px;
            height: 40px;
            left: 70px;
        }

        .circle-icon {
            padding: 8px 6px;
            border-radius: 50%;
            border: 2px solid #444444;
            display: flex;
            margin-top: 20px;
            justify-content: center;
            align-items: center;
        }
    }
</style>


<body>

<?php include 'web-nav.php'; ?>


        <!---- Menu Start --->

<?php include 'menu.php'; ?>


        <!---- Menu End ----->

<!-- ----------------------------menu modal end------------------------ -->


<div class="clinic-details-page">
    <div class="clinic-details">
        <p style="margin-left: 50px;" class="backBtn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 15px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            <a href="discover-page.blade.php" style="color: black; text-decoration: underline;">Back</a>
        </p>
        <div class="container">
            <?php
    
    
        // Connect to database
    
    
        // Get project ID from URL
            $clinicId = isset($_GET['id']) ? strval($_GET['id']) : null;
    
        // Validate and query project details
            if ($clinicId) {
                $sql = "SELECT c.*, AVG(r.rating) AS average_rating  FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci  WHERE c.id = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $clinicId);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $isFavorite = null;
                if (isset($_SESSION['loggedin'])) {
                    $userId = $_SESSION['id'];
                    $userFavorite = $con->prepare("SELECT id FROM account_favorites WHERE account_id = ? AND clinic_id = ?");
                    $userFavorite->bind_param('ii', $userId, $clinicId);
                    $userFavorite->execute();
                    $isFavorite = $userFavorite->get_result();
                }
                
                $dateToday = date("Y-m-d");
                $getClinicViewStmt = "SELECT * FROM clinics_view WHERE clinic_id = '$clinicId' AND date = '$dateToday'";
                $getClinicViewResult = $con->query($getClinicViewStmt);
                ?>
    
                <?php
    
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    
                    $view = 1;
                    if ($getClinicViewResult->num_rows > 0) {
                        while ($clinicRow = $getClinicViewResult->fetch_assoc()) {
                            $view = $clinicRow['views']+1;
                            
                            $updateStmt = $con->prepare("UPDATE clinics_view SET views = ? WHERE id = ?");
                            $updateStmt->bind_param('ss', $view, $clinicRow['id']);
                            $updateStmt->execute();
                        }
                    } else {
                        $clinic = $row['cname'];
                        $location = $row['ccity'].', '. $row['ccountry'];
                        $createStmt = $con->prepare("INSERT INTO clinics_view (clinic_id, clinic_name, location, views, date) VALUES (?, ?, ?, ?, ?)");
                        $createStmt->bind_param('sssss', $clinicId, $clinic, $location, $view, $dateToday);
                        $createStmt->execute();
                    }
        
                    $avgRating = round($row['average_rating'],1) == 0 ? 'New' :  round($row['average_rating'],1);
                    if ($row['ctype'] == 'Male Only') {
                        $imgClinic = '<img style="height:16px !important; margin-right:2px; vertical-align:middle" src="assets/images/gender/3.svg">';
                    } else if ($row['ctype'] == 'Female Only') {
                        $imgClinic = '<img style="height:16px !important; margin-right:2px; vertical-align:middle" src="assets/images/gender/2.svg">';
                    } else {
                        $imgClinic = '<img style="height:16px !important; margin-right:2px; vertical-align:middle" src="assets/images/gender/1.svg">';
                    }
                    ?>
    
    
                    <?php echo '
    
                    <div class="service-details-section">
                        <div class="service-details-section-container">
                            <h3 class="clinic-title-name">' . $row['cname'] . '</h3>
                        </div>
                    </div>
                    <div class="more-details-section" style="margin-top: 10px;">
                        <div class="address">

                            <div style="display: flex; align-items: center; gap: 10px;">
                                <p style="font-size: 14px; margin-bottom: 0px;">' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF; font-size: 8pt;"></i></p>
                                <p style="font-size: 5px; margin-bottom: 0px;"><i class="fa fa-circle" aria-hidden="true"></i></p>
                                <p style="margin-bottom: 0px;">
                                    <span style="color: #0CB4BF;">Open</span> until ' . $row['closing_time'] .
                                '</p>
                                <p style="font-size: 5px; margin-bottom: 0px;"><i class="fa fa-circle" aria-hidden="true"></i></p>
                                <p style="font-size: 14px; margin-bottom: 0px;">' . $row['ccity'] . ', ' . $row['ccountry'] . '</p>
                            </div>
                            <div style="width: 100%; display: grid; grid-template-columns: repeat(1, 1fr);">
                                <div style="width: 100%;">
                                    <p class="paragraph-3" style="display:inline-block">'. $imgClinic . ' ' . $row['ctype'] .  ' <i class="fa-solid fa-dollar-sign" id="cost-1"></i><i class="fa-solid fa-dollar-sign" id="cost-1"></i><i class="fa-solid fa-dollar-sign" id="cost"></i></p>
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); margin-top: 10px;">
                                <div class="cost-container">
                                    <div style="display: flex;">

                                    </div>
                                </div>

                                <div class="right-icon-box">
                                    <div class="right-icons-container">
                                        <div class="circle-icon" style="display: none;">
                                            <a href="single-clinic-map-view-' . $row['cunique'] . '.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] . '">
                                                <i class="fa-solid fa-map-location-dot" id="icon-right"></i>
                                            </a>
                                        </div>
                                        <div class="circle-icon" style="display: none;">
                                            <button id="share-button">
                                                <i class="fa-solid fa-share" id="icon-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="right-icons-container">
                                        <a href="'. $row['clocation'] .'" style="color: black;" target="_blank">
                                            <div class="icons">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 18px;">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="icons" id="share-service" onclick="copyCurrentUrl()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 18px;">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                            </svg>
                                        </div>
                                        <form id="addToFavoritesForm" action="add-to-favorites.php" method="POST">
                                            <input type="hidden" value="'. $_GET['cunique'] .'" name="cunique">
                                            <input type="hidden" value="'. $clinicId .'" name="id">
                                            <div class="icons" onclick="addToFavorites(event)">
                                                '. ($isFavorite?->num_rows > 0 
                                                    ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="height: 18px; color: red;">
                                                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                                    </svg>'
                                                    : '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 18px;">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>'
                                                ) . '
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="service-details-img-section" style="margin-top: 10px !important; margin-bottom: 20px !important;">
                        <div class="service-details-img-container">
                            <button class="back-btn">
                                <a href="index.php" style="height: max-content; width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                                    <i class="fa-solid fa-angle-left" id="back-arrow"></i>
                                </a>
                            </button>
            
                            <div class="clinic-small-logo" style="z-index: 1;">
                                <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" class="clinic-small-logo-img">
                            </div>

                            <img src="assets/images/clinic-images/' . $row['cunique'] . '.png">
                        </div>
                    </div>

                    <div style="width: 100%; display: flex; justify-content: center; margin-top: 5px;">
                        <div class="service-description">
                            <p class="paragraph" style="font-size: 12px;">
                            ' . $row['cbio'] . '
                            </p>
                        </div>
                    </div>
    
    
    
    
    
            '; ?>
    
                    <?php
                } else {
                    echo "Project not found.";
                }
            } else {
                echo "Invalid project ID.";
            }
            ?>
        </div>
    
        <!--- Expert Search -->
        <div class="container">
            <?php
    
            $expertId = isset($_GET['cunique']) ? strval($_GET['cunique']) : null;
        // Connect to database
        // Define your SQL query to select all projects
            $stmt = "SELECT * FROM experts WHERE cunique = '$expertId'";
        // In this case we can use the account ID to get the account info.
    
    
            $result = $con->query($stmt);
            ?>
            <div class="our-expert-section" >
                <div style="margin: auto;  width: 90%; height: auto; display: flex; justify-content:space-between;">
                    <h1 class="section-title">Our Experts</h1>
                </div>
                <div class="example expert-scroll">
                    <?php
    
                    while ($row = $result->fetch_assoc()) {
    
                        ?>
    
    
                        <?php
    
                        echo '
    
    
                   <div class="expert-item">
                        <div class="expert-img-container">
                            <img src="assets/images/experts/' . $row['id'] . '.jpg">
                        </div>
    
                        <div class="expert-details">
                            <div style="width: 100%;">
                                <p class="expert-name">' . $row['expname'] . '</p>
                            </div>
                             <div style="width: 100%;">
                                <img src="assets/images/flags/' . $row['id'] . '.png" class="flag-icons-img">
                            </div>
                        </div>
    
                    </div>
    
    
    
    
            '; }  ?>
    
    
    
                </div>
            </div>
    
        </div>
        <div class="container">
    
    
    
    
            <!----------End Experts ----------->
            <?php
    
            $cid_url = $_GET["id"];
            $cunique_url = $_GET["cunique"];
            $gender = $_GET['gender'] ?? '';
            $treatments = isset($_GET['treatments']) ? $_GET['treatments'] : [];
    
            $treatmentsString = http_build_query(['treatments' => $treatments]);
    
            ?>
    
            <div class="filter-box">
    
                <div class="category-container">
                    <div style="width: 100%; height: auto;  padding-top: 25px;">
                        <button class="tablinks" onclick="openService(event, 'Face')" style="font-family: 'poppinsregular'">Face</button>
                    </div>
                    <div style="width: 100%; height: auto;  padding-top: 25px;">
                        <button class="tablinks" onclick="openService(event, 'Body')" style="font-family: 'poppinsregular'">Body</button>
                    </div>
                    <div style="width: 100%; height: auto;  padding-top: 25px;">
                        <button class="tablinks" onclick="openService(event, 'Health')" style="font-family: 'poppinsregular'; white-space: nowrap;">Health & Wellness</button>
                    </div>
                    <div style="width: 100%; height: auto; margin-left: 100px;">
                        <input
                            type="text" 
                            id="search-box" 
                            class="" 
                            style="
                                background-color: rgb(240, 240, 240); 
                                padding-left: 25px;
                                padding-right: 25px;
                                border: none; 
                                margin-bottom: 4px; 
                                width: 260px;
                                outline: none;
                                border-radius: 5px;
                                padding-top: 25px;
                            " 
                            placeholder="Search here for services..."
                        >
                        <span class="border-line">
                        </span>
                    </div>
                </div>
            </div>
    
            <div class="tab-sections">
    
    
    
                <div id="Face" class="tabcontent sortable-container">
                    <div class="example" style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                        <h1 class="tab-title">Face</h1>
    
    
                        <?php
        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
                        if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                            $whereClause = "WHERE s.cunique = '$expertId' AND s.scat = 'Face'";
                            if (isset($_GET['treatments'])) {
                                $treatments = implode("','", $_GET['treatments']);
                                $whereClause .= " AND s.subcat IN ('$treatments')";
                            }
                            if (isset($_GET['gender'])) {
                                $gender = $_GET['gender'];
                                if ($gender === 'all') {
                                    // No additional condition needed for 'all'
                                } elseif ($gender === 'male') {
                                    $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                                } elseif ($gender === 'female') {
                                    $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                                }
                            }
    
                            // Construct final SQL statement
                            $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique $whereClause GROUP BY s.id ORDER BY s.sname ASC";
                        }   else {
                            $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique  WHERE s.cunique = '$expertId'  AND s.scat ='Face' GROUP BY s.id ORDER BY s.sname ASC ";
                        }
    
    
    
                        $result = $con->query($stmt);
                        ?>
    
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $avgRating = round($row['average_rating'],1) == 0 ? 'New' :  round($row['average_rating'],1);
    
                                $treatmentType = $row['transaction_type'];
                                
                                $isHiddenFace = true;
                                if ($row['discount_duration'] >= date('Y-m-d')) {
                                    $isHiddenFace = false;
                                }
                                
                                if ($row['stype'] == 'Male Only') {
                                    $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                } else if ($row['stype'] == 'Female Only') {
                                    $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                } else {
                                    $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                                }
    
                                //Add a condition to display different content based on treatment_type
                                if ($treatmentType === 'consultation') {
                                    // Echo specific content for consultation
    
    
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                              ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u> '. $row['ratings_count']  . ' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['stime'] . '</p>
                      <h4 class="service-price"><span style="font-weight:400; font-size:8px;">from</span> ' . convertCurrency($row['sprice']) . '</h4>
                  </div>
              </div>
            </a>
          </div>
    
                 ';
                                } else if ($treatmentType === 'treatment') {
                                    // Echo specific content for treatment
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-treatment-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                              '. $img .'
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u>' . $row['ratings_count'] .' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['sduration'] . '</p>
                      <h4 class="orig-price-face service-price this-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['sprice']) . '  </h4>
                        <div style="' . ($isHiddenFace ? 'display: none;' : '') . '">
                            <h4 class="service-price that-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['final_price']) . '  </h4>
                            <p class="varies then-' . $row['discountdisplay'] .'">till ' . $row['discount_duration'] . '</p>
                        </div>
                  </div>
              </div>
            </a>
          </div>
                 ';
                                } else if ($treatmentType === 'maxservice') {
                                    // Echo specific content for both
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-max-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                              ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u>'. $row['ratings_count'] . ' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['sduration'] . '</p>
                      <h4 class="orig-price-face service-price this-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['sprice']) . '  </h4>
                        <div style="' . ($isHiddenFace ? 'display: none;' : '') . '">  
                            <h4 class="service-price that-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['final_price']) . '  </h4>
                            <p class="varies then-' . $row['discountdisplay'] .'">till ' . $row['discount_duration'] . '</p>
                        </div>
                  </div>
              </div>
            </a>
          </div>
                 ';
                                } else {
                                    // Handle unexpected treatment_type values (optional)
                                    echo '  <p>Unknown treatment type: ' . $treatmentType . '</p>';
                                }
                            }
    
                            if (empty($result)) {
                                echo '<p>No service to display at the moment.</p>';
                            }}?>
    
                                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
    
    
    
    
    
                    </div>
                </div>
    
                <div id="Body" class="tabcontent sortable-container2">
                    <div class="example" style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                        <h1 class="tab-title">Body</h1>
    
                        <?php
        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
    
                        // Define your SQL query to select all projects
                        if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                            $whereClause = "WHERE s.cunique = '$expertId' AND s.scat = 'Body'";
                            if (isset($_GET['treatments'])) {
                                $treatments = implode("','", $_GET['treatments']);
                                $whereClause .= " AND s.subcat IN ('$treatments')";
                            }
                            if (isset($_GET['gender'])) {
                                $gender = $_GET['gender'];
                                if ($gender === 'all') {
                                    // No additional condition needed for 'all'
                                } elseif ($gender === 'male') {
                                    $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                                } elseif ($gender === 'female') {
                                    $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                                }
                            }
    
                            // Construct final SQL statement
                            $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique $whereClause GROUP BY s.id ORDER BY s.sname ASC";
                        } else {
                            $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique  WHERE s.cunique = '$expertId'  AND s.scat ='Body' GROUP BY s.id ORDER BY s.sname ASC ";
                        }
    
                        // In this case we can use the account ID to get the account info.
    
    
                        $result = $con->query($stmt);
    
    
    
                        ?>
                        <?php
    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $treatmentType = $row['transaction_type'];
    
                                $avgRating = round($row['average_rating'],1) == 0 ? 'New' :  round($row['average_rating'],1);
                                
                                $isHiddenBody = true;
                                if ($row['discount_duration'] >= date('Y-m-d')) {
                                    $isHiddenBody = false;
                                }
                                
                                if ($row['stype'] == 'Male Only') {
                                    $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                } else if ($row['stype'] == 'Female Only') {
                                    $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                } else {
                                    $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                                }
    
                                //Add a condition to display different content based on treatment_type
                                if ($treatmentType === 'consultation') {
                                    // Echo specific content for consultation
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; font-size:14px; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; font-size:14px; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                            ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%;  margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u> '. $row['ratings_count']  .' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['sduration'] . '</p>
                      <h4 class="service-price"><span style="font-weight:400; font-size:8px;">from</span> ' .convertCurrency( $row['sprice']) . '  </h4>
                  </div>
              </div>
            </a>
          </div>
    
                 ';
                                } else if ($treatmentType === 'treatment') {
                                    // Echo specific content for treatment
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-treatment-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; font-size:14px; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; font-size:14px; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                            ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u>' . $row['ratings_count'] .' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['sduration'] . '</p>
                      <h4 class="orig-price-body service-price this-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['sprice']) . '  </h4>
                      <div style="' . ($isHiddenBody ? 'display: none;' : '') . '">
                          <h4 class="service-price that-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['final_price']) . '  </h4>
                          <p class="varies then-' . $row['discountdisplay'] .'">till ' . $row['discount_duration'] . '</p>
                      </div>
                  </div>
              </div>
            </a>
          </div>
                 ';
                                } else if ($treatmentType === 'maxservice') {
                                    // Echo specific content for both
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-max-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; font-size:14px; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; font-size:14px; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                            ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u>'. $row['ratings_count'] . ' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['sduration'] . '</p>
                      <h4 class="service-price this-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['sprice']) . '  </h4>
                        <div style="' . ($isHiddenBody ? 'display: none;' : '') . '">
                            <h4 class="orig-price-body service-price that-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['final_price']) . '  </h4>
                            <p class="varies then-' . $row['discountdisplay'] .'">till ' . $row['discount_duration'] . '</p>
                        </div>
                  </div>
              </div>
            </a>
          </div>
                 ';
                                } else {
                                    // Handle unexpected treatment_type values (optional)
                                    echo '  <p>Unknown treatment type: ' . $treatmentType . '</p>';
                                }
                            }
    
                            if (empty($result)) {
                                echo '<p>No service to display at the moment.</p>';
                            }}?>
    
    
                                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
    
    
                    </div>
                </div>
    
    
                <div id="Health" class="tabcontent sortable-container3">
                    <div class="example" style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                        <h1 class="tab-title">Health & Wellness</h1>
    
                        <?php
        // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
    
                        // Define your SQL query to select all projects
                        if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                            $whereClause = "WHERE s.cunique = '$expertId' AND s.scat = 'Health'";
                            if (isset($_GET['treatments'])) {
                                $treatments = implode("','", $_GET['treatments']);
                                $whereClause .= " AND s.subcat IN ('$treatments')";
                            }
                            if (isset($_GET['gender'])) {
                                $gender = $_GET['gender'];
                                if ($gender === 'all') {
                                    // No additional condition needed for 'all'
                                } elseif ($gender === 'male') {
                                    $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                                } elseif ($gender === 'female') {
                                    $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                                }
                            }
    
                            // Construct final SQL statement
                            $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique $whereClause GROUP BY s.id ORDER BY s.sname ASC";
                        } else {
                            $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating FROM services s LEFT JOIN reviews r ON s.id = r.sunique  WHERE s.cunique = '$expertId'  AND s.scat ='Health' GROUP BY s.id ORDER BY s.sname ASC ";
    
                        }
    
                        // In this case we can use the account ID to get the account info.
    
    
                        $result = $con->query($stmt);
    
    
    
                        ?>
                        <?php
    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $treatmentType = $row['transaction_type'];
                                $avgRating = round($row['average_rating'],1) == 0 ? 'New' :  round($row['average_rating'],1);
                                
                                $isHiddenHealth = true;
                                if ($row['discount_duration'] >= date('Y-m-d')) {
                                    $isHiddenHealth = false;
                                }
                    
                                if ($row['stype'] == 'Male Only') {
                                    $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                } else if ($row['stype'] == 'Female Only') {
                                    $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                } else {
                                    $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                                }
    
                                //Add a condition to display different content based on treatment_type
                                if ($treatmentType === 'consultation') {
                                    // Echo specific content for consultation
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                            ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u>'. $row['ratings_count']  .' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['stime'] . '</p>
                      <h4 class="service-price"><span style="font-weight:400; font-size:8px;">from</span> ' . convertCurrency($row['sprice']) . ' </h4>
                  </div>
              </div>
            </a>
          </div>
    
                 ';
                                } else if ($treatmentType === 'treatment') {
                                    // Echo specific content for treatment
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-treatment-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                            ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u>' . $row['ratings_count'] .' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['sduration'] . '</p>
                      <h4 class="orig-price-health service-price this-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['sprice']) . '  </h4>
                        <div style="' . ($isHiddenHealth ? 'display: none;' : '') . '">
                            <h4 class="service-price that-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['final_price']) . '  </h4>
                            <p class="varies then-' . $row['discountdisplay'] .'">till ' . $row['discount_duration'] . '</p>
                        </div>
                  </div>
              </div>
            </a>
          </div>
                 ';
                                } else if ($treatmentType === 'maxservice') {
                                    // Echo specific content for both
                                    echo '
            <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
    
            <a class="div" id="div" href="book-now-max-backup.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
              <div class="services-list">
                  <div class="service-img-container">
                      <img src="assets/images/services/' . $row['id'] . '.png">
                  </div>
                  <div class="service-details-list">
    
                      <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8
                        .px; margin-top: -3px;">
                          <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
    
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                          <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                      </div>
    
                      <div class="gender-box">
                          <div style="width: auto;">
                            ' . $img . '
                          </div>
                          <div style="width: 100%;">
                              <p class="service-gender">' . $row['stype'] . '</p>
                          </div>
                      </div>
    
                      <div style="width: 90%; margin: auto; margin-top: 4px;">
                          <p class="service-rating">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i> <u>'. $row['ratings_count'] . ' reviews</u></p>
                      </div>
    
    
                  </div>
    
                  <div class="service-price-list">
                      <p class="varies"><i class="fa-solid fa-stopwatch"></i> ' . $row['stime'] . '</p>
                      <h4 class="orig-price-health service-price this-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['sprice']) . '  </h4>
                        <div style="' . ($isHiddenHealth ? 'display: none;' : '') . '">
                            <h4 class="service-price that-' . $row['discountdisplay'] .'"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency( $row['final_price']) . '  </h4>
                            <p class="varies then-' . $row['discountdisplay'] .'">till ' . $row['discount_duration'] . '</p>
                        </div>
                  </div>
              </div>
            </a>
          </div>
                 ';
                                } else {
                                    // Handle unexpected treatment_type values (optional)
                                    echo '  <p>Unknown treatment type: ' . $treatmentType . '</p>';
                                }
                            }
    
                            if (empty($result)) {
                                echo '<p>No service to display at the moment.</p>';
                            }}?>
    
    
                                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
                    </div>
                </div>
            </div>
    
            <div id="scroll" style="margin: auto; width: 100%; height: auto; overflow-x: auto;">
                <div style="margin: auto; width: 90%; height: auto; margin-top: 40px;">
                    <h1 style="margin: 0; padding: 0; color: #000; font-size: 20px; font-weight: 600;">Customer Reviews</h1>
                </div>
    
                <div class="scroll-container">
    
    
                    <!-- Second customer-reviews-card -->
                </div>
            </div>
    
        </div>
    </div>
    <div class="clinic-book-now-container">
        <div style="padding: 15px 20px;">
            <?php
                $clinicId = isset($_GET['id']) ? strval($_GET['id']) : null;
                // Validate and query project details
                if ($clinicId) {
                    $sql = "SELECT c.*, AVG(r.rating) AS average_rating  FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci  WHERE c.id = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $clinicId);
                    $stmt->execute();
                    $result = $stmt->get_result();
            ?>
            <?php
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $avgRating = round($row['average_rating'],1) == 0 ? 'New' :  round($row['average_rating'],1);
            ?>
            <?= '
                <div>
                    <div class="">
                        <h3 style="font-style: 16px; font-weight: 600;">' . $row['cname'] . '</h3>
                    </div>
                    <div>
                        <p class="">' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF; font-size: 8pt;"></i></p>
                    </div>
                </div>
            '; ?>
            <?php
                } else {
                    echo "Project not found.";
                }
                } else {
                    echo "Invalid project ID.";
                }
            ?>
            <div>
                <button style="
                    width: 100%;
                    border: none;
                    background-color: rgb(180, 180, 180);
                    color: white;
                    padding: 15px 0;
                    border-radius: 5px;
                    margin-top: 50px;
                ">
                    Book Now
                </button>
            </div>
        </div>
        <hr />
        <div style="padding: 15px 20px;">
            <div style="display: flex; align-items: center; gap: 6px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p style="margin: 0;">
                    <span style="color: #0CB4BF;">Open</span> until <?= $row['closing_time'] ?>
                </p>
            </div>
            <div style="display: flex; align-items: center; gap: 6px; margin-top: 15px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 23px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <p style="margin: 0;">
                    <?= "{$row['ccity']}, {$row['ccountry']}" ?>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    const shareButton = document.getElementById('share-service');
    const id = <?php echo json_encode($cid_url); ?>;
    const cunique = <?php echo json_encode($cunique_url); ?>;
    const textToShare = "Check out this awesome clinic on Aesthetic Links: https://aestheticlinks.com/app_x/uae/clinic-details.blade.php?id=" + id + "&cunique=" + cunique;

    shareButton.addEventListener('click', () => {
        console.log('here')
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



<!------ End Clinic Fetch --->



<script>

    function closeSort() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

</script>

<script>
    function addToFavorites(e) {
        e.preventDefault()
        let form = document.getElementById('addToFavoritesForm')
        form.submit()
    }

    function copyCurrentUrl() {
        let tempInput = document.createElement("input");
        tempInput.value = window.location.href;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
    
        var tooltip = document.createElement("div");
        tooltip.textContent = "URL Copied!";
        tooltip.classList.add("tooltip");
        document.body.appendChild(tooltip);
    
        var iconRect = document.querySelector("#share-service").getBoundingClientRect();
        tooltip.style.top = (iconRect.top - tooltip.offsetHeight - 5) + "px"; // Adjusted for the tooltip height and margin
        tooltip.style.left = (iconRect.left + (iconRect.width / 2) - (tooltip.offsetWidth / 2)) + "px"; // Centered above the icon
    
        setTimeout(function() {
            document.body.removeChild(tooltip);
        }, 2000);
    }
</script>

<script>
    var isHiddenFace = '<?= $isHiddenFace ?>'
    var isHiddenBody = '<?= $isHiddenBody ?>'
    
    if (isHiddenFace) {
        var origPrice = document.querySelectorAll('.orig-price-face')
        
        if (origPrice != []) {
            origPrice.forEach(el => el.classList.remove('this-discountdisplay'))
        }
    }
    
    if (isHiddenBody) {
        var origPrice = document.querySelectorAll('.orig-price-body')
        
        if (origPrice != []) {
            origPrice.forEach(el => el.classList.remove('this-discountdisplay'))
        }
    }
    
    // if (isHiddenHealth) {
    //     var origPrice = document.querySelectorAll('.orig-price-health')
        
    //     if (origPrice != []) {
    //         origPrice.forEach(el => el.classList.remove('this-discountdisplay'))
    //     }
    // }
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

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    function openService(evt, serviceName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(serviceName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Trigger click event on the button for 'London' tab to open it by default
    document.querySelector(".tablinks:first-child").click();
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
        if (!event.target.matches('.dropbtn')) {
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

<!-------- Start Filter JS --------->

<script>
    const selectElement = document.getElementById('mySelect');

    selectElement.addEventListener('change', handleSelectChange);

    function handleSelectChange(event) {
        const value = event.target.value;

        // Hide all elements with the `data-show` attribute
        const dataShowElements = document.querySelectorAll('[data-show]');
        dataShowElements.forEach(element => element.hidden = true);

        // Show only elements whose `data-show` attribute matches the selected value
        dataShowElements.forEach(element => {
            if (element.dataset.show === value) {
                element.hidden = false;
            }
        });

        // Hide all elements with the `data-hide` attribute
        const dataHideElements = document.querySelectorAll('[data-hide]');
        dataHideElements.forEach(element => element.hidden = true);

        // Show only elements whose `data-hide` attribute matches the selected value
        dataHideElements.forEach(element => {
            if (element.dataset.hide === value) {
                element.hidden = false;
            }
        });
    }


</script>


<!-------- Start Sort A-Z & Price ----------->
<script>

    const radioContainer = document.querySelector('.radio-container');
    const sortButtons = radioContainer.querySelectorAll('input[type="radio"]');

    const sortableContainer1 = document.querySelector('.sortable-container');
    const sortableContainer2 = document.querySelector('.sortable-container2');
    const sortableContainer3 = document.querySelector('.sortable-container3');

    sortButtons.forEach(button => {
        button.addEventListener('change', () => {
            const order = button.value; // asc or desc

            // Sort and re-arrange each container individually
            sortItems(sortableContainer1, order);
            sortItems(sortableContainer2, order);
            sortItems(sortableContainer3, order);
        });
    });

    function sortItems(container, order) {
        const items = container.querySelectorAll('.item');
        const sortedItems = Array.from(items)
            .sort((a, b) => {
                const textA = a.dataset.text.toUpperCase();
                const textB = b.dataset.text.toUpperCase();
                return order === 'asc' ? textA.localeCompare(textB) : textB.localeCompare(textA);
            });

        container.innerHTML = ""; // Clear existing items
        sortedItems.forEach(item => {
            container.appendChild(item); // Append in sorted order
        });
    }

</script>


<!--- Search Script -->
<script>
    const searchBox = document.getElementById("search-box");
    const divs = document.querySelectorAll(".div");

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
</html>