<?php include 'session.php';
require_once 'server-connect.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>
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
<script>
    $(document).ready(function() {
        let queryParams = new URLSearchParams(window.location.search);

        $.ajax({
            url: 'reviews.php',
            type: 'POST',
            data: {
                id: queryParams.get('cunique')
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
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .clinic-small-logo {
        position: absolute;
        width: 10vw;
        height: 10vw;
        margin-top: 50vw;
        margin-left: 5%;
        border-radius: 8pt;
    }

    .clinic-small-logo-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        position: absolute;
    }


    /* --------------------------------menu------------------------------------- */

    a {
        -webkit-tap-highlight-color: transparent;
    }

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
        width: 100%;
        margin: 0;
        padding: 0;
        font-family: 'poppinsregular';
        padding-bottom: 15%;
        overflow-x: hidden;
        line-height: 1;
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
        height: 30vh;
    }

    .service-details-img-container {
        width: 100%;
        height: 100%;
    }

    .service-details-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .back-btn {
        position: absolute;
        left: 5%;
        margin-top: 25%;
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

    .service-details-section-container {
        width: 90%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(3, max-content max-content 55%);
        margin-top: 3vh;
        column-gap: 20px;
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
        width: 100%;
        height: 225px;
        border-radius: 25px;
    }

    .expert-item {
        display: inline-block;
        width: 150px;
        text-align: center;
        margin: 10px;
        position: relative;
    }

    .expert-img-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        border-radius: 15px;
        position: relative;
    }

    .expert-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px;
    }

    .expert-details {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 5px 0;
        border-radius: 0 0 15px 15px;
    }

    .expert-name {
        margin: 0;
        font-size: 14px;
        font-weight: bold;
    }

    .filter-btn {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
    }

    .category-container {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, auto);
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
        height: auto;
        border-bottom: 1px solid #e3e3e3;
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .service-img-container {
        width: 100%;
        height: 225px;
        border-radius: 25px;
    }

    .service-details-list {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 100%;
        height: max-content;
        margin: auto;
    }

    .service-price-list {
        width: 100%;
        margin: auto;
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
        grid-template-columns: repeat(3, 1fr);
    }

    .category-container button {
        width: 100%;
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 24px 16px;
        transition: 0.3s;
        font-size: 30px;
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
        font-size: 44px;
    }

    .paragraph-2 {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        font-size: 24px;
        margin-top: 20px;
    }

    .paragraph-3 {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        font-size: 34px;
    }

    .right-icons-container {
        width: max-content;
        float: right;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        column-gap: 5px;
        margin-top: -20px;
    }

    .circle-icon {
        padding: 15px;
        border-radius: 50%;
        border: 2px solid #444444;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #icon-right {
        font-size: 24px;
        color: #444444;
    }

    #back-arrow {
        color: #a1a1a1;
        font-size: 28px;
    }

    #cost-1 {
        font-size: 34px;
        color: #0CB4BF;
    }

    #cost {
        font-size: 34px;
        color: #444444;
    }

    .paragraph {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        font-size: 14px;
        font-weight: 400;
    }

    .section-title {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 42px;
        font-weight: 600;
    }

    .our-expert-section {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 50px;
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
        width: 225px;
        height: 275px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 10px;
    }

    .expert-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 25px;
    }

    .expert-name {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 28px;
        color: #444444;
    }

    .search-clinic-details {
        margin-top: 10px;
        width: 100%;
        height: 75px;
        background-color: #f1f1f1;
        border-style: none;
        border-radius: 15px;
        font-size: 28px;
        text-indent: 24px;
    }

    .search-clinic-details:focus {
        outline: none;
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
        font-size: 28px;
        font-weight: 600;
    }

    .tab-sections {
        margin: auto;
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 30px;
        overflow-x: hidden;

    }

    .service-item-title {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 34px;
    }

    .varies {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        font-size: 24px;
        margin-top: 10px;
    }

    .filter-box {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 30px;
    }

    .gender-box {
        margin: auto;
        width: 90%;
        display: grid;
        grid-template-columns: repeat(2, 10% 90%);
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

    .service-rating {
        margin: 0;
        width: 90%;
        height: auto;
        padding: 0;
        font-size: 24px;
    }

    #service-star {
        font-size: 24px;
        color: #0CB4BF;
    }

    .service-price {
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 38px;
        text-align: right;
        font-weight: 600;
    }

    .service-img-container img {
        width: 100%;
        height: 100%;
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

    .dropbtn:hover,
    .dropbtn:focus {
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
        float: right;
        margin-top: -90px;
        margin-right: 10px;
    }

    .expert-scroll {
        margin: auto;
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(10, max-content);
        column-gap: 35px;
        overflow: scroll;
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
            margin-top: 14vw;
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
            margin-top: 32vw;
            right: 0;
            margin-right: 3%;
            border-radius: border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.9);
        }

        .clinic-small-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
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
            width: 33px;
            height: 33px;
            padding: 8px;
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
            font-size: 14px;
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
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 2vh;
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

        .services-list {
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 20% 60% 20%);
            width: 100%;
            height: auto;
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

        .dropbtn:hover,
        .dropbtn:focus {
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
            float: right;
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
            position: fixed;
            left: 5%;
            margin-top: 5%;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            border-style: none;
            background-color: #f1f1f1;
            z-index: 10;
        }

        #back-arrow {
            position: absolute;
            color: #0C1E36;
            font-size: 15pt;
            text-align: center;
            top: 30%;
            right: 38%;
        }

        .clinic-small-logo {
            position: absolute;
            width: 12vw;
            height: 12vw;
            margin-top: 40vw;
            right: 0;
            margin-right: 82%;
            border-radius: border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.9);
        }

        .clinic-small-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
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

        .right-icons-container {
            width: max-content;
            float: right;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 5px;
            margin-top: -43px;
        }

        #icon-right {
            font-size: 10pt;
            color: #0CB4BF;
        }

        .circle-icon {
            width: 4pt;
            height: 4pt;
            border-radius: 30%;
            border: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f1f1f1;
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
            font-size: 14px;
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
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 2vh;
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
            border-radius: 15px;
        }

        .expert-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .expert-name {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 8pt;
            color: #f1f1f1;
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
            padding: 0;
            font-size: 10pt;
            margin: 0;
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
            color: #0CB4BF;
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

        .dropbtn:hover,
        .dropbtn:focus {
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
            float: right;
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
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
        width: 90%;
        margin: auto;
    }

    .customer-reviews-card {
        scroll-snap-align: start;
        display: inline-block;
        width: 99%;
        margin-right: 20px;
        /* Add space between items */
    }

    .fixed-filter-box {
        position: fixed;
        top: 78px;
        width: 100%;
        z-index: 1000;
        background-color: #fff;
        /* Ensure it has a background */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Optional: Add a shadow */
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
</style>


<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php include 'nav.php'; ?>

    <!---- Menu Start --->

    <?php include 'menu.php'; ?>


    <!---- Menu End ----->

    <!-- ----------------------------menu modal end------------------------ -->


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
    ?>

        <?php

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $views = $row['views'] + 1;
            $updateStmt = $con->prepare("UPDATE clinics SET views = ? WHERE id = ?");
            $updateStmt->bind_param('ss', $views, $clinicId);
            $updateStmt->execute();

            $updateStmt->close();

            $avgRating = round($row['average_rating'], 1) == 0 ? 'New' :  round($row['average_rating'], 1);
            if ($row['ctype'] == 'Male Only') {
                $imgClinic = '<img style="height:14px; margin-right:2px; vertical-align:middle;" src="assets/images/gender/3.svg">';
            } else if ($row['ctype'] == 'Female Only') {
                $imgClinic = '<img style="height:14px; margin-right:2px; vertical-align:middle;" src="assets/images/gender/2.svg">';
            } else {
                $imgClinic = '<img style="height:14px; margin-right:2px; vertical-align:middle;" src="assets/images/gender/1.svg">';
            }
        ?>


            <?php echo '

    <div class="service-details-img-section">
        <div class="service-details-img-container">
            <button class="back-btn">
                <a href="landing-page.blade.php" style="height: max-content; width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <i class="fa-solid fa-angle-left" id="back-arrow"></i>
                </a>
            </button>

            <div class="clinic-small-logo" style="z-index: 1;">
                <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" class="clinic-small-logo-img">
            </div>






	<img src="assets/images/clinic-images/' . $row['cunique'] . '.png">
        </div>

    </div>

	<div class="service-details-section">
        <div class="service-details-section-container">
            <h3 class="clinic-title-name">' . $row['cname'] . '</h3>
                                        <form id="addToFavoritesForm" action="add-to-favorites.php" method="POST" style="margin-left:80px">
                                            <input type="hidden" value="' . $_GET['cunique'] . '" name="cunique">
                                            <input type="hidden" value="' . $clinicId . '" name="id">
                                            <div class="icons" onclick="addToFavorites(event)">
                                                ' . ($isFavorite?->num_rows > 0
                ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="height: 18px; color: red;">
                                                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                                    </svg>'
                : '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 18px; color: #787878;">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>'
            ) . '
                                            </div>
                                        </form>
        </div>


    </div>


    <div class="more-details-section">
        <div class="address">
            <div style="display: flex; align-items: center; margin-top: -13px;">
            <p class="paragraph-2" style="margin-top: 0 !important; width: 20%;">' . $avgRating . ' <i class="fa-solid fa-star" style="color: #0CB4BF; font-size: 8pt;"></i></p>
            <span style="margin: 0 10px; color: #f1f1f1;">|</span>
             <div class="cost-container">
                    <div style="display: flex;">
                        <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                        <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                        <i class="fa-solid fa-dollar-sign" id="cost"></i>
                    </div>
                </div>

            </div>
            <p class="paragraph-3" style="margin-top: 9px;"><i class="fa-solid fa-location-dot" style="color: #0c1e36; margin-right: 5px"></i>'  . $row['ccity'] . ', ' . $row['ccountry'] . '</p>
            <div style="width: 100%; display: grid; grid-template-columns: repeat(1, 1fr);">
                <div style="width: 100%;">
                    <p class="paragraph-3" style="display:inline-block"><i class="fa-solid fa-mars-and-venus" style="color: #0c1e36; margin-right: -1px; margin-left: -2px"></i> ' . $row['ctype'] . '</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr);">

                <div class="cost-container" style="visibility:hidden">
                    <div style="display: flex;">
                        <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                        <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                        <i class="fa-solid fa-dollar-sign" id="cost"></i>
                    </div>
                </div>

                <div class="right-icon-box">
                    <div class="right-icons-container">
                        <a href="' . $row['clocation'] . '" style="color: black; text-decoration:none;" target="_blank">
                            <div class="circle-icon">
                                <i class="fa-solid fa-map-location-dot" id="icon-right"></i>
                            </div>
                        </a>
                        <div class="circle-icon">
                            <button id="share-button">
                                <i class="fa-solid fa-share" id="icon-right"></i>
                            </button>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>


    </div>

    <div style="width: 100%; display: flex; justify-content: center; margin-top: -1vh;">
        <div class="service-description">
            <p class="paragraph" id="cbio-short" style="font-size: 12px; display: none;">
                ' . substr($row['cbio'], 0, 100) . '...
                <span id="read-more" style="color: #0CB4BF; cursor: pointer;" onclick="toggleReadMore()">Read More</span>
            </p>
            <p class="paragraph" id="cbio-full" style="font-size: 12px;">
                ' . $row['cbio'] . '
                <span id="read-less" style="color: #0CB4BF; cursor: pointer; display: none;" onclick="toggleReadMore()">Read Less</span>
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

    <!--- Expert Search -->
    <?php

    $expertId = isset($_GET['cunique']) ? strval($_GET['cunique']) : null;
    // Connect to database
    // Define your SQL query to select all projects
    $stmt = "SELECT * FROM experts WHERE cunique = '$expertId'";
    // In this case we can use the account ID to get the account info.


    $result = $con->query($stmt);
    ?>
    <div class="our-expert-section">
        <div style="margin: auto;  width: 90%; height: auto; display: flex; justify-content:space-between;">
            <h1 class="section-title" id="face-tab">Our Experts</h1>
        </div>
        <div class="example expert-scroll">
            <?php
            $experts = [];

            // Fetch all results into an array
            while ($row = $result->fetch_assoc()) {
                $experts[] = $row;
            }

            // Check if 'priority' is not null for any of the rows
            $hasPriority = false;
            foreach ($experts as $row) {
                if (!is_null($row['priority'])) {
                    $hasPriority = true;
                    break;
                }
            }

            // Sort the array by 'priority' field in ascending order if 'priority' is not null
            if ($hasPriority) {
                usort($experts, function ($a, $b) {
                    return $a['priority'] <=> $b['priority'];
                });
            }

            // Iterate over the (possibly sorted) array to generate the HTML
            foreach ($experts as $row) {
                echo '
        <div class="expert-item">
            <div class="expert-img-container">
                <img src="assets/images/experts/' . $row['id'] . '.jpg">
            </div>
            <div class="expert-details">
                <div style="width: 100%;">
                    <p class="expert-name">' . $row['expname'] . '</p>
                </div>
            </div>
        </div>';
            }
            ?>
        </div>
    </div>



    <!----------End Experts ----------->

    <?php

    $cid_url = $_GET["id"];
    $cunique_url = $_GET["cunique"];
    $gender = $_GET['gender'] ?? '';
    $treatments = isset($_GET['treatments']) ? $_GET['treatments'] : [];

    $treatmentsString = http_build_query(['treatments' => $treatments]);

    ?>

    <div class="filter-box">
        <div class="wrapper" id="search-bar-section">
            <div class="search-bar-container">
                <div class="search-bar">
                    <i class="fas fa-search search-icon"></i>
                    <input id="search-box" type="text" placeholder="Search here for services..">
                    <a href="new-filter-clinic-page.blade.php?id=<?= $cid_url ?>&cunique=<?= $cunique_url ?>&gender=<?= $gender ?>&<?= $treatmentsString ?>" class="filter-button"><i class="fas fa-filter" style="color: #0CB4BF"></i></a>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="category-container">
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Face')" style="font-family: 'poppinsregular'"><a href="#face-tab" style="text-decoration: none; color: inherit">Face</a></button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Body')" style="font-family: 'poppinsregular'"><a href="#body-tab" style="text-decoration: none; color: inherit">Body</a></button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Health')" style="font-family: 'poppinsregular'"><a href="#health-tab" style="text-decoration: none; color: inherit">Health & Wellness</a></button>
            </div>
        </div>
    </div>


    <div class="tab-sections">



        <div id="Face" class="tabcontent sortable-container">
            <div class="example" style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                <h1 class="tab-title">Face</h1>
                <?php
                if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                    $whereClause = "WHERE s.cunique = '$expertId' AND s.scat = 'Face'";

                    if (isset($_GET['treatments'])) {
                        $treatments = implode("','", $_GET['treatments']);
                        $whereClause .= " AND s.subcat IN ('$treatments')";
                    }

                    if (isset($_GET['gender'])) {
                        $gender = $_GET['gender'];
                        if ($gender === 'male') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                        } elseif ($gender === 'female') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                        }
                    }

                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
             FROM services s
             LEFT JOIN reviews r ON s.id = r.sunique
             $whereClause
             GROUP BY s.id
             ORDER BY s.sname ASC";
                } else {
                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
             FROM services s
             LEFT JOIN reviews r ON s.id = r.sunique
             WHERE s.cunique = '$expertId' AND s.scat = 'Face'
             GROUP BY s.id
             ORDER BY s.sname ASC";
                }

                $result = $con->query($stmt);

                $rows = [];
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }

                $rowCount = count($rows);
                $currentRow = 0;

                if ($rowCount > 0) {
                    foreach ($rows as $row) {
                        $currentRow++;
                        $avgRating = round($row['average_rating'], 1) == 0 ? 'New' : round($row['average_rating'], 1);

                        $isHiddenFace = true;
                        if ($row['discount_duration'] >= date('Y-m-d')) {
                            $isHiddenFace = false;
                        }

                        switch ($row['stype']) {
                            case 'Male Only':
                                $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                break;
                            case 'Female Only':
                                $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                break;
                            default:
                                $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                        }

                        $treatmentType = $row['transaction_type'];
                        $treatmentUrl = '';

                        switch ($treatmentType) {
                            case 'consultation':
                                $treatmentUrl = 'book-now.php?cunique=';
                                break;
                            case 'treatment':
                                $treatmentUrl = 'book-now-treatment.php?cunique=';
                                break;
                            case 'maxservice':
                                $treatmentUrl = 'book-now-max.php?cunique=';
                                break;
                        }

                        $divId = ($currentRow === $rowCount) ? 'id="body-tab"' : '';

                        echo '
        <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
            <a class="div" id="div" href="' . $treatmentUrl . $row['cunique'] . '&id=' . $row['id'] . '" style="width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list" ' . $divId . '>
                    <div class="service-img-container">
                        <img src="assets/images/services/' . $row['id'] . '.png">
                    </div>
                    <div class="service-details-list">
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8px; margin-top: -3px;">
                            <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
                        </div>
                        <div class="gender-box">
                             <div>
                              <p class="service-rating" style="width: 100%; !important">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i>';

                        if ($row['ratings_count'] >= 10) {
                            echo ' <u>' . $row['ratings_count'] . ' reviews</u>';
                        }

                        echo '</p>


                            </div>
                            <div>
                                <p class="service-gender"> <span style="margin: 0 5px; color: #f1f1f1;">|</span><i class="fa-solid fa-mars-and-venus" style="color: ##0cb4bf; margin-right: 3px; margin-left: -2px"></i>' . $row['stype'] . '</p>
                            </div>

                        </div>
                    </div>
                    <div class="service-price-list">
                        <p class="varies"><i class="fa-solid fa-stopwatch"></i> ';

                        if ($treatmentType === 'consultation') {
                            echo $row['stime'];
                        } else {
                            echo $row['sduration'];
                        }

                        if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                            echo '
                            <h4 class="orig-price-face service-price this-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['sprice']) . '  </h4>
                            <div style="' . ($isHiddenFace ? 'display: none;' : '') . '">
                                <h4 class="service-price that-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['final_price']) . '  </h4>
                                <p class="varies then-' . $row['discountdisplay'] . '">till ' . $row['discount_duration'] . '</p>
                            </div>';
                        } else {
                            echo '</p>
                            <h4 class="orig-price-face service-price"><span style="font-weight:400; font-size:8px;">from</span> ' . convertCurrency($row['sprice']) . '  </h4>';
                        }

                        echo '
                    </div>
                </div>
            </a>
        </div>';
                    }

                    if (empty($rows)) {
                        echo '<p>No service to display at the moment.</p>';
                    }
                }
                ?>
            </div>
            <div class="example" style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                <h1 class="tab-title" style="margin-top: 20px">Body</h1>
                <?php
                // Define your SQL query to select all projects
                if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                    $whereClause = "WHERE s.cunique = '$expertId' AND s.scat = 'Body'";

                    if (isset($_GET['treatments'])) {
                        $treatments = implode("','", $_GET['treatments']);
                        $whereClause .= " AND s.subcat IN ('$treatments')";
                    }

                    if (isset($_GET['gender'])) {
                        $gender = $_GET['gender'];
                        if ($gender === 'male') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                        } elseif ($gender === 'female') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                        }
                    }

                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
         FROM services s
         LEFT JOIN reviews r ON s.id = r.sunique
         $whereClause
         GROUP BY s.id
         ORDER BY s.sname ASC";
                } else {
                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
         FROM services s
         LEFT JOIN reviews r ON s.id = r.sunique
         WHERE s.cunique = '$expertId' AND s.scat = 'Body'
         GROUP BY s.id
         ORDER BY s.sname ASC";
                }

                $result = $con->query($stmt);

                $rows = [];
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }

                $rowCount = count($rows);
                $currentRow = 0;

                if ($rowCount > 0) {
                    foreach ($rows as $row) {
                        $currentRow++;
                        $treatmentType = $row['transaction_type'];
                        $avgRating = round($row['average_rating'], 1) == 0 ? 'New' : round($row['average_rating'], 1);

                        $isHiddenBody = true;
                        if ($row['discount_duration'] >= date('Y-m-d')) {
                            $isHiddenBody = false;
                        }

                        switch ($row['stype']) {
                            case 'Male Only':
                                $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                break;
                            case 'Female Only':
                                $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                break;
                            default:
                                $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                        }

                        $treatmentUrl = '';
                        switch ($treatmentType) {
                            case 'consultation':
                                $treatmentUrl = 'book-now.php?cunique=';
                                break;
                            case 'treatment':
                                $treatmentUrl = 'book-now-treatment.php?cunique=';
                                break;
                            case 'maxservice':
                                $treatmentUrl = 'book-now-max.php?cunique=';
                                break;
                        }

                        $divId = ($currentRow === $rowCount) ? 'id="health-tab"' : '';

                        echo '
    <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
        <a class="div" id="div" href="' . $treatmentUrl . $row['cunique'] . '&id=' . $row['id'] . '" style="width: 100%; text-decoration: none; cursor: pointer; color: #000;">
            <div class="services-list" ' . $divId . '>
                <div class="service-img-container">
                    <img src="assets/images/services/' . $row['id'] . '.png">
                </div>
                <div class="service-details-list">
                    <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8px; margin-top: -3px;">
                        <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
                    </div>
                    <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                        <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                    </div>
                    <div class="gender-box">
                        <div style="width: auto;">' . $img . '</div>
                        <div style="width: 100%;">
                            <p class="service-gender">' . $row['stype'] . '</p>
                        </div>
                    </div>
                </div>
                <div class="service-price-list">
                    <p class="varies"><i class="fa-solid fa-stopwatch"></i> ';

                        if ($treatmentType === 'consultation') {
                            echo $row['stime'];
                        } else {
                            echo $row['sduration'];
                        }

                        if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                            echo '
                        <h4 class="orig-price-body service-price this-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['sprice']) . '  </h4>
                        <div style="' . ($isHiddenBody ? 'display: none;' : '') . '">
                            <h4 class="service-price that-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['final_price']) . '  </h4>
                            <p class="varies then-' . $row['discountdisplay'] . '">till ' . $row['discount_duration'] . '</p>
                        </div>';
                        } else {
                            echo '</p>
                        <h4 class="service-price"><span style="font-weight:400; font-size:8px;">from</span> ' . convertCurrency($row['sprice']) . '  </h4>';
                        }

                        echo '
                </div>
            </div>
        </a>
    </div>';
                    }

                    if (empty($rows)) {
                        echo '<p>No service to display at the moment.</p>';
                    }
                } ?>

            </div>

            <div class="example" style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                <h1 class="tab-title" style="margin-top: 20px">Health & Wellness</h1>

                <?php
                // Define your SQL query to select all projects
                if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                    $whereClause = "WHERE s.cunique = '$expertId' AND s.scat LIKE 'Health%'";

                    if (isset($_GET['treatments'])) {
                        $treatments = implode("','", $_GET['treatments']);
                        $whereClause .= " AND s.subcat IN ('$treatments')";
                    }

                    if (isset($_GET['gender'])) {
                        $gender = $_GET['gender'];
                        if ($gender === 'male') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                        } elseif ($gender === 'female') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                        }
                    }

                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
             FROM services s
             LEFT JOIN reviews r ON s.id = r.sunique
             $whereClause
             GROUP BY s.id
             ORDER BY s.sname ASC";
                } else {
                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
             FROM services s
             LEFT JOIN reviews r ON s.id = r.sunique
             WHERE s.cunique = '$expertId' AND s.scat = 'Health'
             GROUP BY s.id
             ORDER BY s.sname ASC";
                }

                $result = $con->query($stmt);
                ?>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $treatmentType = $row['transaction_type'];
                        $avgRating = round($row['average_rating'], 1) == 0 ? 'New' : round($row['average_rating'], 1);

                        $isHiddenHealth = true;
                        if ($row['discount_duration'] >= date('Y-m-d')) {
                            $isHiddenHealth = false;
                        }

                        switch ($row['stype']) {
                            case 'Male Only':
                                $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                break;
                            case 'Female Only':
                                $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                break;
                            default:
                                $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                        }

                        $treatmentUrl = '';
                        switch ($treatmentType) {
                            case 'consultation':
                                $treatmentUrl = 'book-now.php?cunique=';
                                break;
                            case 'treatment':
                                $treatmentUrl = 'book-now-treatment.php?cunique=';
                                break;
                            case 'maxservice':
                                $treatmentUrl = 'book-now-max.php?cunique=';
                                break;
                        }

                        echo '
        <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
            <a class="div" id="div" href="' . $treatmentUrl . $row['cunique'] . '&id=' . $row['id'] . '" style="width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/services/' . $row['id'] . '.png">
                    </div>
                    <div class="service-details-list">
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8px; margin-top: -3px;">
                            <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
                        </div>
                        <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                            <p class="service-location">' . $row['scity'] . ', ' . $row['scountry'] . '</p>
                        </div>
                        <div class="gender-box">
                            <div style="width: auto;">' . $img . '</div>
                            <div style="width: 100%;">
                                <p class="service-gender">' . $row['stype'] . '</p>
                            </div>
                        </div>
                    <div class="service-price-list">
                        <p class="varies"><i class="fa-solid fa-stopwatch"></i> ';

                        if ($treatmentType === 'consultation') {
                            echo $row['stime'];
                        } else {
                            echo $row['sduration'];
                        }

                        if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                            echo '
                            <h4 class="orig-price-health service-price this-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['sprice']) . '  </h4>
                            <div style="' . ($isHiddenHealth ? 'display: none;' : '') . '">
                                <h4 class="service-price that-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['final_price']) . '  </h4>
                                <p class="varies then-' . $row['discountdisplay'] . '">till ' . $row['discount_duration'] . '</p>
                            </div>';
                        } else {
                            echo '</p>
                            <h4 class="service-price"><span style="font-weight:400; font-size:8px;">from</span> ' . convertCurrency($row['sprice']) . '  </h4>';
                        }

                        echo '
                    </div>
                </div>
            </a>
        </div>';
                    }

                    if (empty($result)) {
                        echo '<p>No service to display at the moment.</p>';
                    }
                }
                ?>


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


    <script>
        window.addEventListener('scroll', function() {
            var filterBox = document.querySelector('.filter-box');
            var offsetTop = filterBox.offsetTop;

            if (window.pageYOffset > offsetTop) {
                filterBox.classList.add('fixed-filter-box');
            } else {
                filterBox.classList.remove('fixed-filter-box');
            }
        });


        const shareButton = document.getElementById('share-button');
        const id = <?php echo json_encode($cid_url); ?>;
        const cunique = <?php echo json_encode($cunique_url); ?>;
        const textToShare = "Check out this awesome clinic on Aesthetic Links: https://aestheticlinks.com/app/uae/clinic-details.blade.php?id=" + id + "&cunique=" + cunique;

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
            if (serviceName == 'body') {
                document.querySelector('#body-tab').scrollIntoView({
                    behavior: 'smooth'
                });
            }

            // var i, tabcontent, tablinks;
            // tabcontent = document.getElementsByClassName("tabcontent");
            // for (i = 0; i < tabcontent.length; i++) {
            //     tabcontent[i].style.display = "none";
            // }
            // tablinks = document.getElementsByClassName("tablinks");
            // for (i = 0; i < tablinks.length; i++) {
            //     tablinks[i].className = tablinks[i].className.replace(" active", "");
            // }
            document.getElementById(serviceName).style.display = "block";
            // evt.currentTarget.className += " active";
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

        function toggleReadMore() {
            var shortBio = document.getElementById("cbio-short");
            var fullBio = document.getElementById("cbio-full");
            var readMoreBtn = document.getElementById("read-more");
            var readLessBtn = document.getElementById("read-less");

            if (shortBio.style.display === "none") {
                shortBio.style.display = "block";
                fullBio.style.display = "none";
                readMoreBtn.style.display = "inline";
                readLessBtn.style.display = "none";
            } else {
                shortBio.style.display = "none";
                fullBio.style.display = "block";
                readMoreBtn.style.display = "none";
                readLessBtn.style.display = "inline";
            }
        }

        // Initially display the short bio if it exceeds 100 characters
        document.addEventListener("DOMContentLoaded", function() {
            var cbioFullText = document.getElementById("cbio-full").innerText;
            if (cbioFullText.length > 100) {
                document.getElementById("cbio-short").style.display = "block";
                document.getElementById("cbio-full").style.display = "none";
            } else {
                document.getElementById("read-more").style.display = "none";
            }
        });
    </script>

</body>

</html>