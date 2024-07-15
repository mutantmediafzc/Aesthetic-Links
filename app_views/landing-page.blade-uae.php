<?php include 'session.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Landing Page</title>
    

 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
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
        border-radius: 10px;
    }
    
    .overlay-black:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(255,255,255,0.2), rgba(0,0,0,0.6));
        border-radius: 10px;
    }

    .map {
        position: relative;
        top: 0;
        width: 100%;
        height: 40vh;
        z-index: 0;
        background-image: url(assets/images/map-design.svg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .map h1 {
        width: max-content;
        height: auto;
        color: #fff;
        font-weight: 600;
        font-size: 58px;
        margin: 0;
        z-index: 3;
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

    .dropbtn:hover, .dropbtn:focus {
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
    
        .dropbtn:hover, .dropbtn:focus {
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
            outline:none;
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
    
        .dropbtn:hover, .dropbtn:focus {
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
    
    .div {
      width: 25%;
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
    <a href="landing-map-view.blade.php" style="text-decoration: none; display: flex; justify-content: center;">
        
            <section class="map" id="map">
                <h1 style="margin-top: 30px;"><i class="fa-solid fa-map-location-dot"></i>&nbsp;Map view</h1>
                <div style="width: 100%; height: 100%; background-color: rgba(0,0,0, 0.3); position: absolute;"></div>
                
            </section>
        
    </a>
    
	
	
	<div class="control-bar">
        
        <div class="spacer-control-bar"></div>
    
        <div class="control-bar-container">
            <div style="width: 100%;">
                <input id="search-box" type="text" class="search-bar-landing" placeholder="Search for Clinics, Experts, Services...">
                
            </div>
			
            <div class="landing-page-filters">
                <div class="filter-btn-sort">
                        <a href="new-filter-page.blade.php">
                            <button class="filter-btn">
                                <i class="fa-solid fa-sliders"></i> Filters
                            </button>     
                        </a>

                </div>

                <div>
                    <button onclick="myFunction()" class="filter-btn-map" style="-webkit-tap-highlight-color: transparent;"><i class="fa-solid fa-arrow-down-wide-short"  id="sort-icon"></i> Sort by</button>
                    
                        <div id="myDropdown" class="dropdown-content radio-container">
                            <label class="sortingLabel" for="sort-asc">Recommended</label>
          				    <input type="radio" name="sort" id="sort-asc" value="recommended" checked  class="checkboxSort">
          						
          				    <br>
          				    
            			    <label class="sortingLabel" for="sort-asc">Sort by names (A-Z)</label>
          				    <input type="radio" name="sort" id="sort-asc" value="cname-asc" value="desc" class="checkboxSort">
          						
          				    <br>
          						
         				    <label class="sortingLabel" for="sort-desc">Sort by names (Z-A)</label>
          				    <input type="radio" name="sort" id="sort-desc" value="cname-desc" class="checkboxSort">
          						
          				    <br>

        				    <label class="sortingLabel" for="sort-asc">Top Rated Clinics</label>
          				    <input type="radio" name="sort" id="" value="top-rated" value="desc" class="checkboxSort">
          						
          				    <br>

      					 </div> 
                </div>

            </div>
            
        </div>

        <div class="divider"></div>
		
		<!----- Call Data for Clinics ---->
	<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_POST['filters']) || isset($_POST['price_preference']) || isset($_POST['gender_preference']) )) {
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
                $ctypeConditions[] = "c.ctype IN ('For Male', 'For Male & Female')";
            } elseif ($gender == 'female') {
                $ctypeConditions[] = "c.ctype IN ('For Female', 'For Male & Female')";
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

        $stmt = "SELECT c.* FROM clinics c INNER JOIN services s ON c.cunique = s.cunique WHERE 1=1 $ctypeCondition $priceCondition $selectedServicesCondition AND c.approval = 'approved' AND c.ccountry = 'UAE' GROUP BY c.cunique $havingClause";

    } else {
        $stmt = "SELECT * FROM clinics c WHERE c.approval = 'approved' AND c.ccountry = 'UAE'";
    }

    // Define your SQL query to select all projects
    // In this case we can use the account ID to get the account info.
    $result = $con->query($stmt);
    $results = $result->fetch_all(MYSQLI_ASSOC);

    shuffle($results);

	
	?>	
		<div class="content-container example div-container">
		<div>
		<?php
						
						foreach ($results as $row) {

			 
			echo				
           
                '
    <a id="div" class="div" href="clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] . '" style="width: 100%; height: auto; text-decoration: none; cursor: pointer; color: #444444;">
        <div class="card-item">
            <div class="clinic-img-container">
                <div class="clinic-text-location" style="z-index: 1;">
                    <h1>' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
                </div>
                <div class="clinic-small-logo" style="z-index: 1;">
                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" class="clinic-small-logo-img">
                </div>
                <div class="overlay-black" style="z-index: 0;">
                    <img src="assets/images/clinic-images/' . $row['cunique'] . '.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                </div>
            </div>
            <div class="text-container">
                <div style="width: 100%; height: auto;">
                    <div><p class="paragraph-1">' . $row['cname'] . '</p></div>
                </div>
                <div class="second-line">
                    <div><p class="paragraph-2"><i class="fa-solid fa-mars-stroke-up" style="color: #0C1E36;"></i><i class="fa-solid fa-venus" style="color: #0CB4BF;"></i> ' . $row['ctype'] . '</p></div>
                    <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle"></i></div>
                    <div><p class="paragraph-2" style="color: #0CB4BF;">' . $row['rating'] . ' <i class="fa-solid fa-star" id="star"></i>&nbsp; <span style="color: #212121;"><u>' . $row['creviews'] . ' reviews</u></span></p></div>
                    <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle"></i></div>
                    <div class="money-icon-container">';

                            if ($row['cpricelevel'] >= 3) {
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
                            } elseif ($row['cpricelevel'] == 2) {
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>';
                            } else {
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>';
                                echo '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>';
                            }

                            echo '</div>
                </div>
                <div style="width: 100%; height: auto;"><div style="margin-top: 8px;" class="solid"></div></div>
            </div>
        </div>
    </a>';
			}
						
			?>
			</div> <!---End Search -->
			    <div style="margin: auto; width: 90%; height: max-content; margin-top: 5%; display: grid; grid-template-columns: repeat(1, 1fr);">
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
			
			<form method="POST" action="request.clinic.php">
			    <div id="myForm" class="form">
                    <!-- Form content -->
                    <div class="form-content">
                        <span class="close"><i class="fa-solid fa-xmark"></i></span>
                        
                        <div style="width: 50%; margin: 10% auto 10% auto; ">
                            <img src="assets/images/logo-anl.png" style="width: 100%; height: auto;"/>
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
                            <br/>
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
			
			
			<a href="landing-page-view-all.blade.php" style="font-family: 'poppinsregular'; width: 90%; text-decoration: none; color: #fff; margin: auto;">
            <button class="view-all-clinics" style="font-family: 'poppinsregular';">
                View all
            </button>
        </a>
        
    </div>
       <script>
               function sortResults(sortBy) {
               $.ajax({
                   url: "sort.php",
                   type: 'POST',
                   data: {
                       sort: sortBy,
                       query: "<?php echo addslashes($stmt); ?>"
                   },
                   success: function(data) {
                       $('.div-container').html(data);
                       $('.div-container').append(`<div style="margin: auto; width: 90%; height: max-content; margin-top: 5%; display: grid; grid-template-columns: repeat(1, 1fr);">
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

			<div id="myForm" class="form">

            <!-- Form content -->
            <div class="form-content">
                <span class="close"><i class="fa-solid fa-xmark"></i></span>

                <div style="width: 50%; margin: 10% auto 10% auto; ">
                    <img src="assets/images/logo-anl.png" style="width: 100%; height: auto;"/>
                </div>

                <h1 style="font-size: 21px;">Request a clinic</h1>

                <div class="form-container-box">
                    <label for="first-name">Clinic Name:</label><br>
                    <input type="text" id="first-name" name="clinic-name" placeholder="Clinic name" style="text-indent: 10px; width: 98.5%; height: 35pt; margin-bottom: 5pt;"><br><br>

                    <label for="gender">Your relation to the clinic:</label><br>


                    <div style="display: flex; align-items: center; column-gap: 10px; justify-content: flex-start; margin-top: 5px;">
                        <input type="radio" id="male" name="specify" value="client" style="margin: 0; width: 15px; height: 15px;" checked>
                        <label for="male">Client</label>
                    </div>

                    <div style="display: flex; align-items: center; column-gap: 10px; margin-top: 5px;">
                        <input type="radio" id="male" name="specify" value="other" style="margin: 0; width: 15px; height: 15px;">
                        <label for="male">Other</label>
                    </div>

                    <input type="text" id="address" name="address" placeholder="Specify" style="text-indent: 10px; width: 98.5%; height: 35pt; margin-bottom: 5pt;"><br>
                    <br/>
                    <label for="gender">Email Address (optional)</label><br>
                    <input type="email" id="address" name="email" placeholder="Email Address" style="text-indent: 10px; width: 98.5%; height: 35pt; margin-bottom: 5pt;"><br>
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



            </div>`);
                       var dropdowns = document.getElementsByClassName("dropdown-content");
                       var i;
                       for (i = 0; i < dropdowns.length; i++) {
                           var openDropdown = dropdowns[i];
                           if (openDropdown.classList.contains('show')) {
                               openDropdown.classList.remove('show');
                           }
                       }
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
    
    <!---- Search Script Test --->
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