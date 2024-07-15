<?php include 'session.php'; ?>

<?php include 'server-connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Landing Page</title>
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
<!-- End Google Tag Manager -->
<style>

    @font-face {
        
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
             url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

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
        width: 100vw;
        margin: 0;
        padding: 0;
        font-family: 'poppinsregular';
        position: fixed;
		overflow-y: hidden; 
        overflow-x: hidden; 
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

    .map {
        position: relative;
        top: 0;
        width: 100%;
        height: 40vh;
        z-index: 0;
        
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
        z-index: 2;
    }

    #back-arrow {
        color: #a1a1a1; 
        font-size: 28px;
    }


    .map iframe {
        position: relative;
        width: 100%;
        height: 100vh;
        
    }

    .control-bar {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        overflow: hidden;
        background-color: #fff;  
        position: fixed;
        bottom: 0;
        width: 100%;
        height: auto;
        box-shadow: 0 10px 10px 5px rgba(0, 0, 0, 0.5);
        border-top-right-radius: 75px;
        border-top-left-radius: 75px;
        z-index: 5;
    
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
        justify-content: flex-end;
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
        width: 90%;
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

    hr.solid {
        border-top: 1px solid #f1f1f1;
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
        font-weight: 500;
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
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
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
            z-index: 10;
            
        }
        
        #back-arrow {
            color: #a1a1a1; 
            font-size: 12pt;
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
            position: fixed;
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
            justify-content: flex-end;
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
            margin-top: 15pt;
        }
        
        #money-icon {
            font-size: 10pt; 
            color: #444444;
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
            row-gap: 5px;
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, auto); 
            margin-top: 5pt;
        }
        
        hr.solid {
            border-top: 1px solid #f1f1f1;
            margin-top: 5pt;
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
            margin-left: 2.5%; 
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
            z-index: 1;
            padding: 15px !important;
            left: 150px;
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
            font-size: 12pt;
            width: 100%;
            text-align: center;
            margin: 0;
        }
        
        .coming-soon-p {
            color: #999;
            font-size: 8pt;
            width: 100%;
            text-align: center;
            margin: 0;
        }
        
        .coming-soon-a {
            text-decoration: none;
            color: #0CB4BF;
            font-size: 8pt;
            width: 100% !important;
            text-align: center !important;
            margin: 0;
            font-weight: 500;
        }
    }
    
    @media only screen and (max-device-width: 767px) {
    
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
            width: 90%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin: auto;
            margin-top: 20px;
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
            z-index: 2;
            
        }
        
        #back-arrow {
            color: #a1a1a1; 
            font-size: 12pt;
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
            position: fixed;
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
            justify-content: flex-end;
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
            margin-top: 15pt;
        }
        
        #money-icon {
            font-size: 10pt; 
            color: #444444;
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
            row-gap: 5px;
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, auto); 
            margin-top: 5pt;
        }
        
        hr.solid {
            border-top: 1px solid #f1f1f1;
            margin-top: 5pt;
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
            margin-left: 2.5%; 
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
            z-index: 1;
            padding: 15px !important;
            left: 150px;
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
            font-size: 12pt;
            width: 100%;
            text-align: center;
            margin: 0;
        }
        
        .coming-soon-p {
            color: #999;
            font-size: 8pt;
            width: 100%;
            text-align: center;
            margin: 0;
        }
        
        .coming-soon-a {
            text-decoration: none;
            color: #0CB4BF;
            font-size: 8pt;
            width: 100% !important;
            text-align: center !important;
            margin: 0;
            font-weight: 500;
        }
    }

    /*--------------------------------------------*/


    
</style>
	
    <!---- Start Drag ------------------->
    <style>
    #mydiv {
        position: absolute;
        z-index: 9;
    }
    
    #mydivheader {
        padding: 10px;
        cursor: move;
        z-index: 10;
        background-color: #2196F3;
        color: #fff;
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
    
</style>	

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		
	   <?php include 'nav.php'; ?>	
       <!---- Menu Start --->
	
		<?php include 'menu.php'; ?>
	
	
	<?php
        
        
        $serviceid = $_GET['id'];
        $cserviceid = $_GET['cunique'];
        
        
        ?>
	
	   <!---- Menu End ----->
    
        <section class="map">
            <button class="back-btn">
                <a href="clinic-details.blade.php?id=<?=$serviceid?>&cunique=<?=$cserviceid?>">
                    <i class="fa-solid fa-angle-left" id="back-arrow"></i>
                </a>
            </button>

            <iframe src="https://my.atlist.com/map/c4b4e43e-7325-4706-a734-3936daff0c5d?share=true" width="100%" height="400px" loading="lazy" frameborder="0" scrolling="no" allowfullscreen id="atlist-embed"></iframe>
        </section>  
	<div class="control-bar">
        
        <div class="spacer-control-bar"></div>
        
        <div class="control-bar-container">
			
            
        </div>
        
        <div class="divider"></div>
        
            <button class="view-all-clinics">
                <a href="clinic-details.blade.php?id=<?=$serviceid?>&cunique=<?=$cserviceid?>" style="text-decoration: none; color: #fff;">
                    Go back
                </a>
            </button>
        </a>
        
    </div>

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