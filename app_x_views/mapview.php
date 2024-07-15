<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Landing Page</title>
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
    
    /* --------------------------------menu------------------------------------- */
    
    .div:hover {
        background-color: transparent;
    }
    
    a {
        padding: 0px 0px !important;
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
        box-shadow: 0 5px 1px 0 rgba(0, 0, 0, 0.1);
        z-index: 2;
        background-color: #fff;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;
        margin: auto;
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
        height: auto;
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
        margin-top: 100px;
    }

    .control-bar {
        overflow: hidden;
        background-color: #fff;  
        position: fixed;
        bottom: 0;
        width: 30%;
        height: 100vh;
        box-shadow: 0 5px 10px 1px rgba(0, 0, 0, 0.1);
        border-top-right-radius: 0;
        border-top-left-radius: 0;
        column-gap: 0;
    
    }
    
    .web-filter-box {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 65px;
        margin-top: 0;
        border-bottom: 1px solid #e3e3e3;
        
    }
    
    .web-filter-content {
        width: 90%;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .web-filter-content p {
        height: max-content;
        margin: 0;
        color: #999;
    }
    
    .web-filter-content button {
        padding: 10px 20px 10px 20px;
        background-color: transparent;
        border: 1px solid #000;
        border-radius: 5px;
    }
    
    .web-clinic-box {
        margin: auto;
        margin-top: 5%;
        width: 90%;
        height: 72vh;
        overflow-y: scroll;
    }
    
    .web-clinic-box::-webkit-scrollbar {
        display: none;
    }

    .control-bar-container {
        display: none;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        width: 90%;
        height: auto;
        margin: auto;
        margin-top: 0;
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
        display: none;
        width: 100%;
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
        height: 45px;
        font-size: 34px;
        font-weight: 500;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 10px;
        border-style: none;
        margin: 10px 0px 10px 5%;
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
        font-size: 18px; 
        font-weight: 600;
    }
    
    #circle-spacer {
        color: #444444; 
        font-size: 5px;
    }
    
    .paragraph-2 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 16px;
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
        margin: 0; 
        width: 100%; 
        height: auto; 
        margin-bottom: 10pt;
        border-bottom: 1px solid #e3e3e3;
    }
    
    #star {
        font-size: 16px; 
        color: #0CB4BF;
    }
    
    .money-icon-container {
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        column-gap: 5px;
    }
    
    #money-icon {
        font-size: 16px; 
        color: #444444;
    }
    
    #money-icon-2 {
        font-size: 16px; 
        color: #0CB4BF;
    }
    
    .text-container {
        row-gap: 10px;
        width: 100%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(1, auto); 
        margin-top: 15px;
    }
    
    .second-line {
        width: 100%; 
        display: flex; 
        justify-content: flex-start;
        column-gap: 10px;
        
    }
    
    .clinic-small-logo {
        position: absolute; 
        width: 60px; 
        height: 60px; 
        margin-top: 11vw; 
        margin-left: 2.5%; 
        border-radius: 5px;
    }
    
    .clinic-img-container {
        width: 100%; 
        height: 30vh; 
        border-radius: 10px;
		position: relative;
    }
    
    .clinic-small-logo-img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        border-radius: 7px;
		position: absolute;
    }
    
    .clinic-text-location {
        position: absolute;
        width: 93%; 
        height: auto; 
        margin-top: 12.5vw; 
        margin-left: 2.5%; 
        display: flex; 
        align-items: center;
    }
    
    .clinic-text-location h1 {
        width: 100%; 
        margin: 0; 
        color: #fff; 
        font-size: 20px; 
        text-align: right;
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
        height: 10vh;
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
    
    /*------------------- card item------------------------------*/
    
    
    @media only screen and (min-device-width : 1024px) and (max-device-width : 1366px) { 
        
        .spacer-control-bar {
            width: 100%;
            height: 13vh;
        }
        
        #star {
            font-size: 14px; 
            color: #0CB4BF;
        }
        
        #money-icon {
            font-size: 14px; 
            color: #444444;
        }
        
        #money-icon-2 {
            font-size: 14px; 
            color: #0CB4BF;
        }
        
        .paragraph-2 {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 12px;
        }
        
        .text-container {
            row-gap: 5px;
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, auto); 
            margin-top: 10px;
        }
        
        .paragraph-1 {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 14px; 
            font-weight: 600;
        }
        
        #circle-spacer {
            color: #444444; 
            font-size: 5px;
        }
        
        .clinic-small-logo {
            position: absolute; 
            width: 40px; 
            height: 40px; 
            margin-top: 29%; 
            margin-left: 2.5%; 
            border-radius: 5px;
        }
        
        .clinic-small-logo-img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 5px;
    		position: absolute;
        }
        
        .clinic-text-location {
            position: absolute;
            width: 93%; 
            height: auto; 
            margin-top: 36.5%; 
            margin-left: 2.5%; 
            display: flex; 
            align-items: center;
        }
        
        .clinic-text-location h1 {
            width: 100%; 
            margin: 0; 
            color: #fff; 
            font-size: 14px; 
            text-align: right;
            font-weight: 500;
        }
        
        .clinic-img-container {
            width: 100%; 
            height: 25vh; 
            border-radius: 7px;
    		position: relative;
        }
        
        /*-------------------------------------*/
        
        .web-filter-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .web-filter-content p {
            margin: 0;
            color: #999;
            font-size: 10pt;
            height: max-content;
        }
        
        .web-filter-content button {
            padding: 8px 15px 8px 15px;
            background-color: transparent;
            border: 1px solid #000;
            border-radius: 5px;
            font-size: 8pt;
        }
        
        .web-clinic-box {
            height: 65vh;
        }
        
        .web-filter-box {
            width: 100%;
            height: 60px;
            margin-top: 0;
        }
        
        .view-all-clinics {
            height: 40px;
            margin: 10px 0px 10px 5%;
            font-size: 16px;
        }
    }
    
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        
        .web-clinic-box {
            display: none;
        }
        
        .web-filter-box {
            display: none;
        }
        
        /*------------------------------*/
        
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
            margin-bottom: 20px;
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
            margin: auto;
            color: #a1a1a1; 
            font-size: 12pt;
        }
        
        #circle-spacer {
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
            width: 100%; 
            height: 25pt; 
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
            justify-content: space-between;
            width: 100%;
            height: auto;
            margin-top: 5pt;
        }
    
        .divider {
            display: block;
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
        
        .web-clinic-box {
            display: none;
        }
        
        .web-filter-box {
            display: none;
        }
        
        /*------------------------------*/
        
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
            margin: auto;
            color: #a1a1a1; 
            font-size: 12pt;
        }
        
        #circle-spacer {
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
            justify-content: space-between;
            width: 100%;
            height: auto;
            margin-top: 5pt;
        }
    
        .divider {
            display: block;
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
    
	<?php include 'web-nav.php'; ?>
	   <?php include 'nav.php'; ?>	
       <!---- Menu Start --->
	
		<?php include 'menu.php'; ?>
	
	
	   <!---- Menu End ----->
    
        <section class="map">
            <button class="back-btn">
                <a href="landing-page.blade.php" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <i class="fa-solid fa-angle-left" id="back-arrow"></i>
                </a>
            </button>

            <iframe width="768" height="300" src="https://maphub.net/embed_h/xAu3GTa2mfptC1Bd?autoplay=1" frameborder="0"></iframe>

        </section>

    
	
	
	<div class="control-bar">
        
        <div class="spacer-control-bar"></div>
        
        <div class="web-filter-box">
            
            <div class="web-filter-content">
                <p style="font-size: 16px;">1 clinics available in the area</p>
                
            </div>
            
        </div>
        
        <div class="control-bar-container">
            <div style="width: 100%;">
                <input type="text" class="search-bar-landing" placeholder="Search for Clinics, Experts, Services...">
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
                     <a href="landing-page.blade.php"><button class="filter-btn-map"><i class="fa-solid fa-arrow-left" class="sort-icon"></i> Back to list view</button></a>
                </div>
            </div>
            
        </div>

        <div class="divider"></div>
        
        <div class="web-clinic-box">
            
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

        $stmt = "SELECT c.* FROM clinics c INNER JOIN services s ON c.cunique = s.cunique WHERE 1=1 $ctypeCondition $priceCondition $selectedServicesCondition AND c.approval = 'approved' AND c.ccountry = 'Switzerland' GROUP BY c.cunique $havingClause";

    } else {
        $stmt = "SELECT c.*, COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci WHERE c.approval = 'approved' AND c.ccountry = 'Switzerland' AND c.recommended = 1 GROUP BY c.cunique";

    }

    // Define your SQL query to select all projects
    // In this case we can use the account ID to get the account info.
    $result = $con->query($stmt);
    $results = $result->fetch_all(MYSQLI_ASSOC);

    shuffle($results);

	
	?>	
		<div>
		<?php
						
						foreach ($results as $row) {
                            $avgRating = round($row['average_rating'],1) == 0 ? 'New' :  round($row['average_rating'],1);

			 
			echo				
           
                '
    <a id="div" class="div" href="clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] . '" style="width: 100%; height: auto; text-decoration: none; cursor: pointer; color: #444444; margin: 0;">
        <div class="card-item">
            <div class="clinic-img-container">
                <div class="clinic-text-location" style="z-index: 1;">
                    <h1>' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
                </div>
                <div class="clinic-small-logo" style="z-index: 1;">
                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" class="clinic-small-logo-img">
                </div>
                <div class="overlay-black" style="z-index: 0;">
                    <img src="assets/images/clinic-images/' . $row['cunique'] . '.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                </div>
            </div>
            <div class="text-container">
                <div style="width: 100%; height: auto;">
                    <div><p class="paragraph-1">' . $row['cname'] . '</p></div>
                </div>
                <div class="second-line">
                    <div style="display: flex; align-items: center;"><img src="assets/images/gender/1.svg" height="17" style="margin-right: 3px;"><p class="paragraph-2">' . $row['ctype'] . '</p></div>
                    <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle-spacer"></i></div>
                    <div><p class="paragraph-2" style="color: #0CB4BF;">' . $avgRating . ' <i class="fa-solid fa-star" id="star"></i>&nbsp; <span style="color: #212121;"><u>' . $row['total_reviews'] . ' reviews</u></span></p></div>
                    <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle-spacer"></i></div>
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
            
        </div>
		
        
        
    </div>
    
    <button class="view-all-clinics">
            <a href="/clinic-list-view" style="font-family: 'poppinsregular'; width: 100%; text-decoration: none; color: #fff; justify-content: center;">View all</a>
        </button>
    
    


    
    			


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