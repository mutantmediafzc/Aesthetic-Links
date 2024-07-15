<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>
    
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.min.css">
  <script src="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.iife.js"></script>
  
      <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>


    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <script src="js/mobiscroll.javascript.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    

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
        margin: auto;
        width: 50%;
  
  
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
        position: relative;
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
        height: 100vh;
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
        grid-template-columns: repeat(2, 60% 40%);
        width: 100%;
        height: auto;
    }
    
    .address {
        width: 90%;
        margin-left: 10%;
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
        margin: auto;
        width: 90%;
        font-size: 38px;
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
        font-size: 16pt;
    }
    
    .service-title1 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 12pt;
    }
    
    .paragraph-2 {
        width: 100%; 
        margin: 0; 
        font-size: 9pt; 
        color: #666;
        text-align: right;
        padding: 3px 0 0 0;
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
        color: #fff;
        background-color: #0C1E36;
        border-radius: 10px;
        margin-top: 0;
        font-family: 'poppinsregular';
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
    }
    
    .spacer-modal h1 {
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
    
    /*---------------------------------*/
    
    .review-box {
        width: 90%;
        height: 40vh;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    
    .review-item {
        width: 100%;
        padding: 20pt 0pt 20pt 0pt;
        border-bottom: 1px solid #e3e3e3;
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
    
    .star-container {
    font-size: 0; /* Remove white spaces between inline-block elements */
}

.star {
    display: inline-block;
    font-size: 14pt;
    color: #999;
}

.star.checked {
    color: #0CB4BF; 
}

</style>
<body>
    
       

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




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
 <?php include 'nav.php'; ?>	
	
       <!---- Menu Start --->
	
	   <?php include 'menu.php'; ?>
	   
	   <!---- Menu End ----->

        
        

	<?php

$serviceId = isset($_GET['cunique']) ? intval($_GET['cunique']) : null;
$cserviceId = isset($_GET['id']) ? intval($_GET['id']) : null;

// Connect to database
// Define your SQL query to select service details
$serviceQuery = "SELECT * FROM services WHERE cunique = '$serviceId' AND id = '$cserviceId'";
$serviceResult = $con->query($serviceQuery);

?>

<?php
// Display service details
if ($serviceResult->num_rows > 0) {
    while ($row = $serviceResult->fetch_assoc()) {
        echo '
        <div class="service-details-img-section">
            <div class="service-details-img-container">
                <a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '"><button class="back-btn"><i class="fa-solid fa-angle-left" id="back-arrow"></i></button></a>
                <img src="assets/images/services/' . $row['id'] . '.png">
            </div>
        </div>

        <div class="service-details-section">
            <div class="service-name-box">
                <h3 class="service-title">' . $row['sname'] . '</h3>
            </div>
        </div>
        <br>';
    }
} else {
    echo '<p>No service to display at the moment.</p>';
}
?>

<div class="service-details-section">
    <div class="review-box">
        <?php
        // Define your SQL query to select all reviews
        $reviewsQuery = "SELECT * FROM reviews WHERE cunique = '$serviceId' AND sunique = '$cserviceId'";
        $reviewsResult = $con->query($reviewsQuery);
        ?>

        <?php
        // Display reviews
        if ($reviewsResult->num_rows > 0) {
            while ($row = $reviewsResult->fetch_assoc()) {
                $rating = $row['rating'];
                $formattedDate = date("F, d Y", strtotime($row['created_at']));
        ?>
                <div class="review-item">
                    <div style="display: flex; justify-content: space-between;">
                        <h3 class="service-title1"><?php echo $row['user_id']; ?></h3>
                        <p class="paragraph-2"><?php echo $formattedDate; ?></p>
                    </div>

                    <!-- Display star rating -->
                    <div class="star-container">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            $checked = ($i <= $rating) ? "checked" : "";
                            echo "<span class='star {$checked}'>&#9733;</span>";
                        }
                        ?>
                    </div>
                    <p class="paragraph-3"><?php echo $row['content']; ?></p>
                </div>
        <?php
            }
        } else {
            echo '<p>No reviews to display at the moment.</p>';
        }
        ?>
    </div>
</div>


<?php

$serviceId = isset($_GET['cunique']) ? intval($_GET['cunique']) : null;
$cserviceId = isset($_GET['id']) ? intval($_GET['id']) : null;

// Connect to database
// Define your SQL query to select service details
$serviceQuery = "SELECT * FROM services WHERE cunique = '$serviceId' AND id = '$cserviceId'";
$serviceResult = $con->query($serviceQuery);

?>

<?php
// Display service details
if ($serviceResult->num_rows > 0) {
    while ($row = $serviceResult->fetch_assoc()) {
        echo '
    
	

    <div style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">
            <div><a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '"><button class="book-now">Go back</button></a></div>
        </div>


    </div>';
    }
} else {}?>
	
		

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
        touchUi: true

    });
    
    </script>  
  
    <script>
    var time = null;
    var expert= 'any';
    var note =null;
    
    function openCalendar() {
        var calendarmodal = document.getElementById('calendarModal');
        calendarmodal.style.display = 'block';
        
    }

    function openTime() {
        var calendarmodal = document.getElementById('calendarModal');
        var timemodal = document.getElementById('timeModal');
        calendarmodal.style.display = 'none';
        timemodal.style.display = 'block';
    }

    function anyexpert(){
        expert = document.getElementById('any').value;
        console.log(expert);
    }
    
    window.onclick = function(event) {
        var calendarmodal = document.getElementById('calendarModal');
        var timemodal = document.getElementById('timeModal');
        var expertmodal = document.getElementById('expertModal');
        
        if (event.target == calendarmodal) {
            calendarmodal.style.display = "none";
        }
        
        if (event.target == timemodal) {
            timemodal.style.display = "none";
        }
        
        if (event.target == expertmodal) {
            expertmodal.style.display = "none";
        }
    }
    

    
    // window.onclick = function(event) {
    // if (event.target == expertmodal) {
    //     expertmodal.style.display = "none";
        
    // }
    
    
    function firstexpert(){
        
         expert = document.getElementById('firstEX').value;
     
        
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
        time="09:00:00";

    }
    function function2(){
        time="10:00:00";

    }
    function function3(){
        time="11:00:00";

    }
    function function4(){
        time="12:00:00";

    }
    function function5(){
        time="13:00:00";

    }
    function function6(){
        time="14:00:00";

    }
    function function7(){
        time="15:00:00";

    }
    function  function8(){
        time="16:00:00";

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
        

    //     var time1 = document.getElementById('radio1').value;
    // var time2 = document.getElementById('radio2').value;
    // var time3 = document.getElementById('radio3').value;
    // var time4 = document.getElementById('radio4').value;
    // var time5 = document.getElementById('radio5').value;
    // var time6 = document.getElementById('radio6').value;
    // var time7 = document.getElementById('radio7').value;
    // var time8 = document.getElementById('radio8').value;

    // if(time1==1){
    // time="09:00:00";
    // }elseif(time2==1){
    //     time="10:00:00";
    // }elseif(time3==1){
    //     time="11:00:00";
    // }elseif(time4==1){
    //     time="12:00:00";
    // }elseif(time5==1){
    //     time="13:00:00";
    // }elseif(time6==1){
    //     time="14:00:00";
    // }elseif(time7==1){
    //     time="15:00:00";
    // }elseif(time8==1){
    //     time="16:00:00";
    // }

    }
    
    
    
    function confirmSched() {
        // window.location.href = 'create-checkout-session.php';

        var form = document.createElement('form');
    form.setAttribute('method', 'post'); 
    form.setAttribute('action', 'create-checkout-session.php');

    var date = document.getElementById('date-input').value;

    var scprice = document.getElementById('smallprice').value;
    var sprice = document.getElementById('bigprice').value;
    var user = document.getElementById('profile').value;
    var sname = document.getElementById('sname').value;
    var username = document.getElementById('username').value;
    var cname = document.getElementById('cname').value;
    var scountry = document.getElementById('scountry').value;
    var scity = document.getElementById('scity').value;

    
    console.log(date,time,scprice,sprice,user,expert);

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
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
</body>
</html>