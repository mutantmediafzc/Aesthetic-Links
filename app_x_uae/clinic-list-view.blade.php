<?php include 'web-nav.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Aesthetic Links | Landing Page</title>
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>

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
        background-color: rgba(0,0,0,0.4);
    }
    
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: 25vh;
        border-bottom-left-radius: 100px;
        border-bottom-right-radius: 100px;
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
        z-index: 2;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
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

    .control-bar {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        overflow: hidden;
        background-color: #fff;  
        position: fixed;
        bottom: 0;
        width: 100%;
        height: auto;
    
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
        display: grid;
        grid-template-columns: repeat(4, 30% 30% 30% 10%);
        width: 100%;
        height: 100px;
        margin-top: 10px;

    }

    .filter-btn {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
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
        margin-bottom: 10%;
    }

    hr.solid {
        border-top: 3px solid #e3e3e3;
    }
    
</style>
<!--WEB VIEW STYLE-->
    <style>
    @media (max-width: 1023px) {
        .web-view {
            display: none;
        }
        
        .mobile-view {
            display:block;
        }
    }

    @media (min-width: 1023px){
        
        .mobile-view {
            display:none;
        }
        
        @font-face {
            font-family: 'Poppins';
            src: url('/assets/fonts/poppins-regular-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body{
            font-family: 'Poppins', sans-serif;
            background-color: #F5F5F5;
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 150px auto;
        }
        
        /* FILTER CARD */
        .filter-card {
            position: relative;
            width: auto;
            height: 756px;
            border-radius: 10px;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px 0px #0000001A;
            display: flex; 
            flex-direction: column; 
            align-items: flex-start; 
            padding: 10px; 
        }

            /* SEARCH RESULTS CARD  */
            .search-results-card {
            position: relative;
            height: auto;
            width: 665px;
            left: 10px;
            border-radius: 10px;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px 0px #0000001A;
            display: flex; 
            flex-direction: column; 
            align-items: flex-start; 
            padding: 10px; 
        }

        .card-title-text {
            font-size: 20px;
            font-weight: 600;
            line-height: 30px;
            text-align: left;
            color: #212121; 
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-line {
            width: calc(100% + 20px); 
            height: 0px;
            border-top: 2px solid #0CB4BF;
            opacity: 1; 
            margin-bottom: 10px; 
            margin-left: -10px; 
            margin-right: -10px; 
        }

        .filter-label {
            font-size: 16px;
            font-weight: 600;
            line-height: 24px;
            color: #212121; 
            margin-bottom: 5px; 
        }

        .filter-dropdown {
            box-sizing: border-box; 
            width: 100%;
            height: 40px;
            border: 1px solid #0000004D;
            border-radius: 7px;
            margin-bottom: 10px; 
        }

        .filter-gender {
            box-sizing: border-box; 
            width: auto;
            height: auto;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
            padding: 5px;
            border: 1px solid #0000004D; 
            border-radius: 7px;
            margin-bottom: 10px; 
        }

        .filter-gender input[type="radio"] {
            display: none;
        }

        .filter-gender label {
            font-size: 12px;
            font-weight: 600;
            color: #212121;
            border-radius: 7px;
            background: #FFFFFF;
            width: 81px; 
            height: 30px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .filter-gender input[type="radio"]:checked + label {
            background: #0CB4BF66; 
            color: #212121;
            border: 1px solid #0CB4BF; 
        }

        .filter-price {
            display: flex;
            justify-content: space-between;
        }

        .input-wrapper {
            position: relative;
        }

        .input-prefix {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #0000004D;
            font-size: 10px;
        }

        .input-suffix {
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #212121;
            font-size: 12px;
        }

        .filter-price input {
            padding-left: 80px;
            width: 160px;
            height: 40px;
            border: 1px solid #0000004D;
            border-radius: 7px;
            margin-right: 10px;
        }

        .filter-time-date {
            display: flex;
            justify-content: space-between;
        }

        .filter-time-date .input-wrapper {
            position: relative;
            width: 160px;
            height: 40px;
            margin-right: 10px;
        }

        .filter-time-date select {
            width: 100%;
            height: 100%;
            color: #212121;
            border: 1px solid #0000004D;
            border-radius: 7px;
        }

        .filter-time-date .input-prefix {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #0000004D;
        }

        .dynamic-content {
            position: relative;
            margin: 25px auto;
            }

        .main-image {
            width: 645px;
            height: 396px;
            border-radius: 10px;
        }

        .image-container {
            position: relative;    }

        .logo {
            position: absolute;
            width: 40px;
            height: 40px;
            bottom: 0;
            left: 0;
            margin: 20px;
        }

        .location-text {
            position: absolute;
            font-size: 16px;
            font-weight: 600;
            line-height: 24px;
            text-align: right;
            bottom: 0;
            right: 0;
            color: #fff;
            margin-right: 40px;
        }

        .clinic-name-section {
            display: flex;
            justify-content: space-between;
        }

        .clinic-info {
            display: flex;
            align-items: center;
            margin: auto;
        }
        .clinic-name {
            font-size: 18px;
            font-weight: 600;
            line-height: 27px;
        }

        .dot-icon {
            height: 8px;
            width: 8px;
            background-color: #666666;
            border-radius: 50%;
            display: inline-block;
            margin: 0 35px;
        }

        .gender-icon {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            display: flex;
            align-items: center;
        }

        .gender-icon img {
            width: 18px;
            height: 18px;
            margin: 0 5px;
        }

        .gender-patient {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            color: #212121;
        }

        .ratings {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            color: #0CB4BF;
            display: flex;
            align-items: center;
        }

        .ratings img {
            width: 18px;
            height: 18px;
            margin: 0 5px;
        }

        .pricing {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            display: flex;
        }

        .pricing img {
            width: 18px;
            height: 18px;
            margin: 0;
        }

        .clinic-description {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            margin: 0 10px;
            padding-bottom: 40px;
            border-bottom: 1px solid #00000026
        }

        .no-margin {
            margin: 0;
        }

        .map-button {
            position: absolute;
            right: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            font-weight: 400;
            font-size: 10px;
            line-height: 15px;
            text-align: center;
            border: 1px solid #000; 
            background-color: transparent;
            border-radius: 5px;
            width: 93px;
            height: 30px;
        }

        .map-button img {
            width: 20px; 
            height: 20px; 
        }
    }
    </style>
<body>
    <div class="mobile-view">
    <nav>
        <div class="location-dropdown-container">
            <div style="width: 100%;">
                <button class="location-dropdown">
                    <img src="assets/images/uae.png" style="margin: auto; width: 45px; height: auto;"> <span>Dubai</span> <i class="fa-solid fa-angle-down" style="font-size: 28px;"></i>
                </button>
            </div>
            <button id="menuBtn" class="menu-btn"><i class="fa-solid fa-bars" style="color: #fff; font-size: 48px;"></i></button>
        </div>
        
    </nav>
                <!-- Menu Modal -->
                <div id="menuModal" class="modal">

                    <!-- Menu Modal -->
                    <div class="modal-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">
                        <div style="margin: auto; width: 65%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 12%;">
                            <div style="width: 100%; height: auto; display: flex; justify-content: center;"><img src="assets/images/logo-anl.png" width="375px" height="auto"></div><br><br>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(4, 1fr); column-gap: 60px;">
                                <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/home-menu.png" style="width: 45px; height: auto;"></div>
                                <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/appointment-menu.png" style="width: 45px; height: auto;"></div>
                                <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/logo-menu.png" style="width: 45px; height: auto;"></div>
                                <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/user-menu.png" style="width: 45px; height: auto;"></div>
                            </div>
            
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(4, 1fr); column-gap: 60px;">
                                <a href="/landing-page" style="text-decoration: none; color: #000;"><div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px;">Home</p></div></a>
                                <a href="/landing-page" style="text-decoration: none; color: #000;"><div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px; margin-left: -35px;">Appointments</p></div></a>
                                <a href="/discover-page" style="text-decoration: none; color: #000;"><div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px;">Discover</p></div></a>
                                <a href="/profile" style="text-decoration: none; color: #000;"><div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px;">User</p></div></a>
                            </div>
                        </div>
            
                        <div class="closeMenu"><i class="fa-solid fa-xmark" style="font-size: 28px; color: #444444;"></i></div>
            
                        <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                            <div style="width: 175px; height: 10px; border-radius: 25px; background-color: #000;margin: auto; margin-top: 30px; margin-bottom: 50px;"></div>
                        </div>
                        
                        
                    
                    </div>
                
                </div>
            
                <!-- ----------------------------menu modal end------------------------ -->

    <div id="menuModal" class="modal">

        <!-- Menu Modal -->
        <div class="modal-content">
            <div style="width: 65%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr);">
                <div style="width: 100%; height: auto; display: flex; justify-content: center;"><img src="assets/images/logo-anl.png" width="375px" height="auto"></div><br><br>
                <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(4, 1fr); column-gap: 60px;">
                    <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/home-menu.png" style="width: 45px; height: auto;"></div>
                    <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/appointment-menu.png" style="width: 45px; height: auto;"></div>
                    <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/logo-menu.png" style="width: 45px; height: auto;"></div>
                    <div style="display: flex; justify-content: center; align-items: center; width: 110px; height: 110px; border: 1px solid #444444; border-radius: 50%;"><img src="assets/images/user-menu.png" style="width: 45px; height: auto;"></div>
                </div>

                <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(4, 1fr); column-gap: 60px;">
                    <div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px;">Home</p></div>
                    <div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px; margin-left: -35px;">Appointments</p></div>
                    <div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px;">Discover</p></div>
                    <div style="width: 110px; height: auto;"><p style="width: 100%; text-align: center; font-size: 24px;">User</p></div>
                </div>
            </div>

            <div class="closeMenu"><i class="fa-solid fa-xmark" style="font-size: 28px; color: #444444;"></i></div>
        
        </div>
    
    </div>

    <section class="control-bar">
    
        <div class="control-bar-container">
            <div style="width: 100%;"><input type="text" style="width: 100%; height: 75px; background-color: #fafafa; border-style: none; border-radius: 15px; font-size: 28px; text-indent: 24px;" placeholder="Search for Clinics, Experts, Services..."></div>
            <div class="landing-page-filters">
                <div>
                    <button class="filter-btn">
                        Gender <i class="fa-solid fa-angle-down" style="font-size: 24px;"></i>
                    </button>
                </div>

                <div>
                    <button class="filter-btn">
                        Services <i class="fa-solid fa-angle-down" style="font-size: 24px;"></i>
                    </button>
                </div>

                <div>
                    <button class="filter-btn">
                        Filters
                    </button>
                </div>

                <div>
                    <button class="filter-btn">
                        <i class="fa-solid fa-arrow-down-wide-short"  style="font-size: 38px; color: #0CB4BF;"></i>
                    </button>
                </div>

            </div>
            
        </div>

        <div class="divider"></div>

        
        <section style="margin: auto; width: 100%; height: 74vh;">
            <a href="/clinic-details" style=" width: 100%; height: auto; text-decoration: none; cursor: pointer; color: #444444;">
                <div style="margin: auto; width: 90%; height: auto; margin-top: 50px;">
                    <div style="width: 100%; height: 300px; border-radius: 15px;">
                        <div style="position: absolute; width: 85%; height: 75px; margin-top: 200px; margin-left: 2.5%; display: flex; align-items: center;">
                            <h1 style="width: 100%; margin: 0; color: #fff; font-size: 38px; text-align: right; margin-top: 45px; font-weight: 400;">Geneva, Switzerland</h1>
                        </div>
                        <div style="position: absolute; width: 75px; height: 75px; margin-top: 200px; margin-left: 25px; border-radius: 10px;">
                            <img src="assets/images/LAC-logo.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;">
                        </div>
                        <img src="assets/images/geneva-clinic.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;">
                    </div>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, auto); margin-top: 15px;">
                        <div style="width: 100%; display: grid; grid-template-columns: repeat(7, max-content); column-gap: 25px;">
                            <div><p style="width: 100%; margin: 0; padding: 0; font-size: 32px; font-weight: 600;">Leman AC</p></div>
                            <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" style="color: #444444; font-size: 10px;"></i></div>
                            <div><p style="width: 100%; margin: 0; padding: 0; font-size: 32px;"><i class="fa-solid fa-venus" style="color: #0CB4BF;"></i> For female patients</p></div>
                            <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" style="color: #444444; font-size: 10px;"></i></div>
                            
                            <div><p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 32px; text-align: right; color: #0CB4BF;">5.0 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i></p></div>
                            
                            <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" style="color: #444444; font-size: 10px;"></i></div>
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); justify-content: center; align-items: center; column-gap: 6px;">
                                <div><i class="fa-solid fa-dollar-sign" style="font-size: 30px; color: #0CB4BF;"></i></div>
                                <div><i class="fa-solid fa-dollar-sign" style="font-size: 30px; color: #444444;"></i></div>
                                <div><i class="fa-solid fa-dollar-sign" style="font-size: 30px; color: #444444;"></i></div>
                            </div>                        
                            
                        </div>
                        <div style="width: 100%;"><p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 32px;">Coolsculpting Consultation, PRP Consultation, Lip Lift C..</p></div>
                        <div style="width: 100%; height: auto;"><hr class="solid"></div>
                    </div>
                </div>
            </a>

            {{-- <a href="clinic-details-nyon.html" style=" width: 100%; height: auto; text-decoration: none; cursor: pointer; color: #444444;">
                <div style="margin: auto; width: 90%; height: auto; margin-top: 50px;">
                    <div style="width: 100%; height: 300px; border-radius: 15px;">
                        <div style="position: absolute; width: 85%; height: 75px; margin-top: 200px; margin-left: 2.5%; display: flex; align-items: center;">
                            <h1 style="width: 100%; margin: 0; color: #fff; font-size: 38px; text-align: right; margin-top: 45px; font-weight: 400;">Nyon, Switzerland</h1>
                        </div>
                        <div style="position: absolute; width: 75px; height: 75px; margin-top: 200px; margin-left: 25px; border-radius: 10px;">
                            <img src="assets/images/LAC-logo.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;">
                        </div>
                        <img src="assets/images/LAC-banner-nyon.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;">
                    </div>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, auto); margin-top: 15px;">
                        <div style="width: 100%; display: grid; grid-template-columns: repeat(7, max-content); column-gap: 32px;">
                            <div><p style="width: 100%; margin: 0; padding: 0; font-size: 32px; font-weight: 600;">LAC Nyon</p></div>
                            <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" style="color: #444444; font-size: 10px;"></i></div>
                            <div><p style="width: 100%; margin: 0; padding: 0; font-size: 32px;"><i class="fa-solid fa-venus" style="color: #0CB4BF;"></i> For female patients</p></div>
                            <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" style="color: #444444; font-size: 10px;"></i></div>
                            
                            <div><p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 32px; text-align: right; color: #0CB4BF;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i></p></div>
                            
                            <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" style="color: #444444; font-size: 10px;"></i></div>
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); justify-content: center; align-items: center; column-gap: 6px;">
                                <div><i class="fa-solid fa-dollar-sign" style="font-size: 30px; color: #0CB4BF;"></i></div>
                                <div><i class="fa-solid fa-dollar-sign" style="font-size: 30px; color: #0CB4BF;"></i></div>
                                <div><i class="fa-solid fa-dollar-sign" style="font-size: 30px; color: #444444;"></i></div>
                            </div>                        
                            
                        </div>
                        <div style="width: 100%;"><p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 32px;">Coolsculpting Consultation, PRP Consultation, Lip Lift C..</p></div>
                        <div style="width: 100%; height: auto;"><hr class="solid"></div>
                    </div>
                </div>
            </a>     --}}

        </section>        



        <!-- <button class="view-all-clinics">
            View All
        </button> -->
        
    </section>
</div>
<div class="web-view">
    <div class="cards-container">
        <div class="filter-card">
            <p class="card-title-text">Filters</p>
            <div class="card-line"></div>
            <p class="filter-label" style="top: 90px;">City</p>
            <select class="filter-dropdown" style="top: 110px;">
                <option value="">Dubai, UAE</option>
            </select>
            <p class="filter-label" style="top: 160px;">Area</p>
            <select class="filter-dropdown" style="top: 180px;">
                <option value="">Al Barsha, Dubai</option>
            </select>
            <p class="filter-label">Gender Preference</p>
            <div class="filter-gender">
                <input type="radio" id="all" name="gender" value="all" checked>
                <label for="all">All</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>  
            <p class="filter-label" style="top: 160px;">Specialization</p>
            <select class="filter-dropdown" style="top: 180px;">
                <option value="">Any</option>
            </select>
            <p class="filter-label" style="top: 160px;">Service Type</p>
            <select class="filter-dropdown" style="top: 180px;">
                <option value="">Any</option>
            </select>
            <p class="filter-label" style="top: 160px;">Price</p>
            <div class="filter-price">
                <div class="input-wrapper">
                    <label for="from" class="input-prefix">From</label>
                    <input type="number" id="from" name="from" placeholder="500" style="color: #212121;">
                    <span class="input-suffix">AED</span>
                </div>
                <div class="input-wrapper">
                    <label for="to" class="input-prefix">Up to</label>
                    <input type="number" id="to" name="to" placeholder="1000" style="color: #212121;">
                    <span class="input-suffix">AED</span>
                </div>
            </div>
            <p class="filter-label" style="top: 160px;">Time & Date</p>
            <div class="filter-time-date">
                <div class="input-wrapper">
                    <select style="color: #212121;">
                        <option value="">November 3</option>
                    </select>
                </div>
                <div class="input-wrapper">
                    <select style="color: #212121;">
                        <option value="">13:00 - 17:00</option>
                    </select>
                </div>
        </div>
    </div>
    <div class="search-results-card">
        <div class="header">
            <p class="card-title-text">Search results...</p>
            <button class="map-button"><img src="assets/icons/map.svg" alt="Map Icon">Map view</button>
        </div>
        <div class="card-line"></div>
        <div class="dynamic-content">
            <div class="row">
                <div class="image-container">
                    <img src="assets/images/clinic-images/65.png" alt="Main Image" class="main-image">
                    <img src="assets/images/LAC-logo.png" alt="Logo" class="logo">
                    <p class="location-text">Al Barsha, Dubai</p>
                </div>
                <div class="clinic-name-section">
                    <div class="clinic-info">
                        <p class="clinic-name">Clinic Name</p>
                        <div class="dot-icon"></div>
                        <div class="gender-icon">
                            <img src="assets/icons/female.svg" alt="Female Icon">
                            <p>For female patients</p>
                        </div>
                        <div class="dot-icon"></div>
                        <div class="ratings">
                            <p>5.0</p>
                            <img src="assets/icons/star.svg" alt="Star Icon">
                        </div>
                        <div class="dot-icon"></div>
                        <div class="pricing">
                            <img src="assets/icons/dollar-fill.svg" alt="Dollar Icon">
                            <img src="assets/icons/dollar-unfill.svg" alt="Dollar Icon">
                            <img src="assets/icons/dollar-unfill.svg" alt="Dollar Icon">
                        </div>
                    </div>
                </div>
                <div class="clinic-description">
                    <p class="no-margin">PRP, Botox, Lips, Skin Tightening, Detox Treatment</p>
                </div>
            </div>
        </div>
        <div class="dynamic-content">
            <div class="row">
                <div class="image-container">
                    <img src="assets/images/clinic-images/128.png" alt="Main Image" class="main-image">
                    <img src="assets/images/LAC-logo.png" alt="Logo" class="logo">
                    <p class="location-text">Al Barsha, Dubai</p>
                </div>
                <div class="clinic-name-section">
                    <div class="clinic-info">
                        <p class="clinic-name">Clinic Name</p>
                        <div class="dot-icon"></div>
                        <div class="gender-icon">
                            <img src="assets/icons/male.svg" alt="Male Icon">
                            <p>For Male patients</p>
                        </div>
                        <div class="dot-icon"></div>
                        <div class="ratings">
                            <p>5.0</p>
                            <img src="assets/icons/star.svg" alt="Star Icon">
                        </div>
                        <div class="dot-icon"></div>
                        <div class="pricing">
                            <img src="assets/icons/dollar-fill.svg" alt="Dollar Icon">
                            <img src="assets/icons/dollar-fill.svg" alt="Dollar Icon">
                            <img src="assets/icons/dollar-unfill.svg" alt="Dollar Icon">
                        </div>
                    </div>
                </div>
                <div class="clinic-description">
                    <p class="no-margin">PRP, Botox, Lips, Skin Tightening, Detox Treatment</p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
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