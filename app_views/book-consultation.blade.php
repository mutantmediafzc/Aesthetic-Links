<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>
    
        <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.min.css">
  <script src="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.iife.js"></script>
  
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

    /* -------------------------------time-------------------------------------- */

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

    /* ------------------------------------------------------------------------- */
    
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 15%;
        
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
    }

    .service-details-img-section {
        width: 100%;
        height: 35vh;
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
        display: flex;
        justify-content: space-between;
        width: 90%;
        height: auto;
        margin: auto;
    }
    
    .address {
        width: 100%;
        margin: auto;
    }

    .pricing-container {
        float: right;
        width: 100%;
        display: flex;
        justify-content: flex-end;
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
        row-gap: 20px;
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
        width: 40px;
        height: 40px;
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
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 38px; 
        text-align: left;
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
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        
        .service-details-img-container {
            width: 100%;
            height: 100%;
            padding-top: 0;
        }
        
        nav {
            padding-top: 10pt;
            padding-bottom: 10pt;
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
            
        }
        
        #back-arrow {
            color: #a1a1a1; 
            font-size: 12pt;
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
        
        .service-title {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 16pt;
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
            font-size: 14pt;
        }
        
        .pricing-container {
            width: 60%;
            display: flex;
            justify-content: flexend;
            column-gap: 5px;
        }
        
        .paragraph-4 {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 12pt; 
            color: #444444; 
            text-align: right; 
            margin-top: 7px;
        }
        
        .service-price-fee {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 16pt; 
            text-align: left;
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
        }
        
        .spacer-modal {
            margin-bottom: 0px;
        }
        
        
        .btn-container-modal {
            display: flex; 
            justify-content: center;
            width: 100%; 
            margin-bottom: 10px;
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
            margin-bottom: 15px;
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
    
    .service-name-box {
            width: 90%; 
            display: grid; 
            grid-template-columns: repeat(2, auto 1fr); 
            margin-top: 5%; 
            column-gap: 20px;
        }
        
        /*----------------------*/
        
        .service-details-img-section {
            width: 100%;
            height: 35vh;
        }
    }
    
    @media only screen and (max-device-width: 767px) {
        
        
        
        .back-btn {
            position: absolute;
            left: 5%;
            margin-top: 15%;
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
            margin-left: -7pt;
            margin: 10px 0 10px -7pt;
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
            font-size: 8pt; 
            color: #444444;
        }
        
        .service-gender {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 8pt; 
            color: #444444;
        }
        
        .service-consultation-price {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt;
        }
        
        .pricing-container {
            width: 60%;
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
            margin-top: 4px;
        }
        
        .service-price-fee {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 12pt; 
            text-align: left;
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
        }
        
        .spacer-modal {
            margin-bottom: 0px;
        }
        
        
        .btn-container-modal {
            display: flex; 
            justify-content: center;
            width: 100%; 
            margin-bottom: 10px;
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
            margin-bottom: 15px;
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
    
    .service-name-box {
            width: 90%; 
            display: grid; 
            grid-template-columns: repeat(2, auto 1fr); 
            margin-top: 5%; 
            column-gap: 20px;
        }
        
        /*----------------------*/
        
        .service-details-img-section {
            width: 100%;
            height: 35vh;
        }
    }

</style>
<body>



    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
 <?php include 'nav.php'; ?>	
	
       <!---- Menu Start --->
	
	   <?php include 'menu.php'; ?>
	
	
	   <!---- Menu End ----->
    
        <!-- ----------------------------menu modal end------------------------ -->

                        <!-- calendar Modal -->
                        <div id="calendarModal" class="calendarmodal">

                            

                            <!-- calendar Modal -->
                            <div class="calendar-content" style=" display: grid; grid-template-columns: repeat(1, 1fr); row-gap: 0;">



                                <div class="black-bar-container">
                                    <div class="black-bar-modal"></div>
                                </div>

                                <div class="spacer-modal">
                                    <h1 class="choose-date-title">Choose a Date</h1>
                                </div>
                                <div class="spacer-modal">
                                    <hr class="solid">
                                </div>
                                
                                <div class="calendar">
                                    <div class="month">
                                        <div class="prev" onclick="prevMonth()"><i class="fa-solid fa-angle-left"></i></div>
                                        <div class="current-month" id="currentMonth"></div>
                                        <div class="next" onclick="nextMonth()"><i class="fa-solid fa-angle-right"></i></div>
                                    </div>
                                    <div class="days" id="calendarDays"></div>
                                </div>

                                <div class="btn-container-modal">
                                    <button class="book-now-calendar" id="confirm-date">Confirm</button>
                                </div>
                                
                            
                            </div>
                        
                        </div>
                    
        <!-- ----------------------------calendar modal end------------------------ -->

                <!-- ----------------------------timings modal end------------------------ -->

                        <!-- time Modal -->
                        <div id="timeModal" class="timemodal">

                            

                            <!-- time Modal -->
                            <div class="time-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">



                                <div class="black-bar-container">
                                    <div class="black-bar-modal"></div>
                                </div>

                                <div class="spacer-modal">
                                    <h1 class="">Choose a Time</h1>
                                </div>
                                <div class="spacer-modal">
                                    <hr class="solid">
                                </div>

                                <div class="spacer-modal">
                                    <h1 style="choose-date-title">00/00/00</h1>
                                </div>
            
                                <div class="time">
                                    <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 10px;">
                                        <div class="radio-section">
                                                <div class="radio-item"><input name="radio" id="radio1" type="radio"><label for="radio1">9:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio2" type="radio"><label for="radio2">10:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio3" type="radio"><label for="radio3">11:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio4" type="radio"><label for="radio4">12:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio5" type="radio"><label for="radio5">13:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio6" type="radio"><label for="radio6">14:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio7" type="radio"><label for="radio7">15:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio8" type="radio"><label for="radio8">16:00</label></div>
                                        </div>
                                    </div>
                                </div>

                                <div style="display: flex; width: 100; margin-bottom: 75px;"><button class="book-now-calendar" id="confirm-time">Confirm</button></div>
                                
                            
                            </div>
                        
                        </div>
                    
        <!-- ----------------------------timings modal end------------------------ -->

                        <!-- ----------------------------experts modal end------------------------ -->

                        <!-- calendar Modal -->
                        <div id="expertModal" class="expertmodal">

                            

                            <!-- calendar Modal -->
                            <div class="expert-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">



                                <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 10px; margin-top: 50px; margin-bottom: 50px;">
                                    <div style="width: 175px; height: 10px; border-radius: 25px; background-color: #000;margin: auto;"></div>
                                </div>

                                <div style="margin-bottom: 30px;">
                                    <h1 style="margin: auto; width: 90%; font-size: 38px;">Choose an Expert</h1>
                                </div>
                                <div style="margin-bottom: 30px;">
                                    <hr class="solid">
                                </div>
                                <div style="margin-bottom: 30px;">
                                    <h1 style="margin: auto; width: 90%; font-size: 38px;">Available Experts</h1>
                                </div>
            
                                <div class="expert">
                                    <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 10px;">
                                        <div class="expert-radio-section" style="margin-bottom: 100px;">
                                            <div class='py'>
                                                <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                                    <div>
                                                        <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 80%)">
                                                            <div style="width: 100%; height: 100%;"><img src="assets/images/placeholder.jpeg" alt="" style="width: 150px; height: 150px; object-fit: cover; border-radius: 15px;"></div>
                                                            <div style="display: flex; align-items: center;"><h1 style="font-size: 34px">Any / No Preference</h1></div>
                                                        </div>
                                                    </div>
                                                    <div style="display: flex; justify-content: center; align-items: center;">
                                                        <label>
                                                            <input type="radio" class="option-input radio" name="example" checked />
                                                        </label>                                                        
                                                    </div>

                                                </div>
                                                <div style="margin-bottom: 30px; margin-top: 30px;">
                                                    <hr class="solid-thin-line">
                                                </div>
                                                
                                                <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                                    <div>
                                                        <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 80%)">
                                                            <div style="width: 100%; height: 100%;"><img src="assets/images/DrDanielEspinoza.jpg" alt="" style="width: 150px; height: 150px; object-fit: cover; border-radius: 15px;"></div>
                                                            <div style="display: flex; align-items: center;"><h1 style="font-size: 34px">Dr. Daniel Espinoza</h1></div>
                                                        </div>
                                                    </div>
                                                    <div style="display: flex; justify-content: center; align-items: center;">
                                                        <label>
                                                            <input type="radio" class="option-input radio" name="example" checked />
                                                        </label>                                                        
                                                    </div>

                                                </div>
                                                <div style="margin-bottom: 30px; margin-top: 30px;">
                                                    <hr class="solid-thin-line">
                                                </div>

                                              </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="display: flex; width: 100; margin-bottom: 75px;"><button class="book-now-calendar" id="confirm-expert">Confirm</button></div>
                            
                            </div>
                        
                        </div>
                    
        <!-- ----------------------------experts modal end------------------------ -->

	<?php

$serviceId = isset($_GET['cunique']) ? strval($_GET['cunique']) : null;
$cserviceId = isset($_GET['id']) ? strval($_GET['id']) : null;
// Connect to database
// Define your SQL query to select all projects
	$stmt = "SELECT * FROM services WHERE cunique = '$serviceId' AND id = '$cserviceId'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);


?>
<?php
	
	if ($result->num_rows > 0) {					
	while ($row = $result->fetch_assoc()) {
		 
?>
	
<?php
	
	echo '
	
	
    <div class="service-details-img-section">
        <div class="service-details-img-container">
            <a href="clinic-details.blade.php?id=' . $row['hook'] . '&cunique=' . $row['cunique'] . '"><button class="back-btn"><i class="fa-solid fa-angle-left" id="back-arrow"></i></button></a>
            <img src="assets/images/services/' . $row['id'] . '.png">
        </div>

    </div>

    <div class="service-details-section">
        <div class="service-name-box">
            <h3 class="service-title">' . $row['sname'] . '</h3>
        </div>
    </div>
    <div class="more-details-section">
        <div class="address">
            <p class="service-location"><i class="fa-solid fa-stopwatch"></i> ' . $row['stime'] . '</p>
            <div style="width: 100%; display: grid; grid-template-columns: repeat(2, max-content 90%); column-gap: 5px;">
                <div style="width: auto;">
                    <p class="service-gender"><i class="fa-solid fa-mars-stroke-up" style="color: #0C1E36;"></i><i class="fa-solid fa-venus" style="color: #0CB4BF;"></i></p>
                </div>
                <div style="width: 100%;">
                    <p class="service-gender">' . $row['stype'] . '</p>
                </div>
            </div>
        </div>
        <div class="pricing-container">
            <div style="width: max-content;">
                    <p class="paragraph-4">from</p>
            </div>
            <div style="max-content">
                <h4 class="service-price-fee">' . $row['sprice'] . ' USD</h4>
            </div>
        </div>
    </div>

    <div style="width: 100%; display: flex; justify-content: center; margin-top: 20px;">
        <div class="consultation-fee">
            <h5 class="service-consultation-price">Consultation fee - ' . $row['scprice'] . ' USD</h5>
            <h5 class="service-consultation-price" style="text-align: right; font-weight: 500;"><i class="fa-solid fa-stopwatch"></i> ' . $row['stime'] . '</h5>
        </div>
    </div>
    

    <div style="width: 100%; display: flex; justify-content: center; margin-top: 20px;">
        <div class="service-description">
            <p class="service-description-text">
                    ' . $row['sbio'] . '
            </p>
        </div>
    </div>

    <div style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">

            <div>
                <button style="width: 100%; height: auto; margin: 0; padding: 0; border-style: none; background-color: transparent;">
                    <p class="btn-note">To book this service you need to book a consultation first*</p>
                </button>
            </div>
            <div><a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '"><button class="book-now">Book consultation</button></a></div>
        </div>


    </div>
	
	'; }
				} else { echo '<p>No service to display at the moment.</p>'; }?>		

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->


  <script>
    const calendarify = new Calendarify('.date-input', {
      accentColor: '#0090FC',
      isDark: false,
      zIndex: 9999,
      customClass: ['font-poppins'],
      onChange: (calendarify) => console.log(calendarify),
      quickActions: true,
      locale: {
        format: "DD-MM-YYYY",
        lang: {
          code: 'id',
          months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          weekdays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
          ui: {
            quickActions: {
              today: "Today",
              tomorrow: "Tomorrow",
              inTwoDays: "In Two Days",
            }
          }
        }
      }
    });

    calendarify.init();
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
    
</body>
</html>