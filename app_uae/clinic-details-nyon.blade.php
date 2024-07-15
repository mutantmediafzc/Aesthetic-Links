<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Aesthetic Links | Booking</title>
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
        padding-bottom: 15%;
        
    }

    nav {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 15%;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        z-index: 2;
        background-color: #fff;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;
        margin-bottom: 25px;
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
        height: 100px;
        font-size: 38px;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
    }

    .service-details-img-section {
        width: 100%;
        height: 30vh;
    }

    .service-details-img-container {
        width: 100%;
        height: 100%;
        padding-top: 10vh;
    }

    .service-details-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    
    .back-btn {
        position: absolute;
        left: 5%;
        margin-top: 10vw;
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
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 5px;
        width: 90%;
        margin-left: 10%;
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
        width: auto;
        height: auto;
        display: grid;
        grid-template-columns: repeat(3, auto);
    }

    .expert-img-container {
        width: 100%;
        height: 225px;
        border-radius: 25px;
    }

    .expert-details {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
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
        height: 3px;
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
        width: 90%;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 15px;
        height: auto;
        padding-top: 75px;
        padding-bottom: 75px;
        margin-top: 25px;
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 1px 1px 10px 5px rgba(0, 0, 0, 0.1);
    }

    .clinic-description {
            font-size: 20px;
        }

        /* -------------------------service tabs------------------------- */

        .category-container {
  overflow: hidden;
  border: 1px solid #ccc;
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
    color: #a1a1a1;
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
  margin-top: 40px;
}

    </style>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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

    <section class="service-details-img-section">
        <div class="service-details-img-container">
            <button class="back-btn">
                <a href="clinic-list-view.html" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <i class="fa-solid fa-angle-left" style="color: #a1a1a1; font-size: 28px;"></i>
                </a>
                
            </button>
            <img src="assets/images/LAC-banner-nyon-banner.png">
        </div>

    </section>

    <section class="service-details-section">
        <div style="width: 90%; height: max-content; display: grid; grid-template-columns: repeat(3, max-content max-content 55%); margin-top: 12vh; column-gap: 20px;">
            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 44px;">Leman AC</h3>
            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 20px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i></p>
            <div style="width: 100%; height: max-content; margin-right: 0; align-items: left;">
                <div style="width: max-content; float: right; display: grid; grid-template-columns: repeat(3, 1fr); column-gap: 20px; margin-right: -60px;">

                    <div style="padding: 20px; border-radius: 50%; border: 2px solid #444444; display: flex; justify-content: center; align-items: center;">
                        <i class="fa-solid fa-map-location-dot" style="font-size: 34px; color: #444444;"></i>
                    </div>
                    <div style="padding: 20px; border-radius: 50%; border: 2px solid #444444; display: flex; justify-content: center; align-items: center;">
                        <i class="fa-regular fa-heart" style="font-size: 34px; color: #444444;"></i>
                    </div>
                    <div style="padding: 20px; border-radius: 50%; border: 2px solid #444444; display: flex; justify-content: center; align-items: center;">
                        <i class="fa-solid fa-share" style="font-size: 34px; color: #444444;"></i>
                    </div>

                </div>
            </div>
        </div>
        
    </section>


    <section class="more-details-section">
        <div class="address">
            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Nyon, Switzerland</p>
            <div style="width: 100%; display: grid; grid-template-columns: repeat(1, 1fr);">
                <div style="width: 100%;">
                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;"><i class="fa-solid fa-venus" style="color: #0CB4BF;"></i> For female patients</p>
                </div>
            </div>
            <div class="cost-container">
                <div>
                    <i class="fa-solid fa-dollar-sign" style="font-size: 34px; color: #0CB4BF;"></i>
                    <i class="fa-solid fa-dollar-sign" style="font-size: 34px; color: #0CB4BF;"></i>
                    <i class="fa-solid fa-dollar-sign" style="font-size: 34px; color: #444444;"></i>
                </div>
            </div>
        </div>


    </section>

    <section style="width: 100%; display: flex; justify-content: center; margin-top: 20px;">
        <div class="service-description">
                 <h6 style="width: 100%; height: 175px; margin: 0; padding: 0; font-size: 28px; font-weight: 400;">
                    Located in Nyon, the clinic offers comprehensive expertise in advanced medical and aesthetic surgery treatments tailored 
                    to each patient, providing them with the most professional and gratifying experience. You will find comfort and privacy 
                    in a modern setting equipped with state-of-the-art facilities.
                 </h6>                
        </div>
    </section>

    <section style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 125px;">

        <div style="margin: auto;  width: 90%; height: auto; display: flex; justify-content:space-between">
            <h1 style="margin: 0; padding: 0; color: #000; font-size: 42px; font-weight: 600;">Our Experts</h1>
            <h3 style="margin: 0; padding: 0; color: #000; font-size: 38px; font-weight: 400;">View more <i class="fa-solid fa-arrow-right" style="color: #000; font-size: 34px;"></i></h3>
        </div>

        <div style="margin: auto; width: 90%; height: auto; display: grid; grid-template-columns: repeat(3, max-content); column-gap: 35px;">
            <div style="width: 225px; height: 275px; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 10px; border: 1px ssolid blue;">
                <div class="expert-img-container" style="margin-bottom: 15px;">
                    <img src="assets/images/DrPatriceZaugg.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                </div>
                <div class="expert-details">
                    <div style="width: 120%;">
                        <p style="width: 120%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Dr. Patrice</p>
                    </div>
                    <div style="width: 100%;">
                        <img src="assets/images/flags.png" style="width: 60px; height: auto; float: right;">
                    </div>
                </div>

            </div>

            <div style="width: 225px; height: 275px; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 10px; border: 1px ssolid blue;">
                <div class="expert-img-container" style="margin-bottom: 15px;">
                    <img src="assets/images/DrDanielEspinoza.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                </div>
                <div class="expert-details">
                    <div style="width: 120%;">
                        <p style="width: 120%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Dr. Daniel</p>
                    </div>
                    <div style="width: 100%;">
                        <img src="assets/images/flags.png" style="width: 60px; height: auto; float: right;">
                    </div>
                </div>

            </div>

            <div style="width: 225px; height: 275px; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 10px; border: 1px ssolid blue;">
                <div class="expert-img-container" style="margin-bottom: 15px;">
                    <img src="assets/images/DrDanielHaselbach.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                </div>
                <div class="expert-details">
                    <div style="width: 120%;">
                        <p style="width: 120%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Dr. Daniel</p>
                    </div>
                    <div style="width: 100%;">
                        <img src="assets/images/flags.png" style="width: 60px; height: auto; float: right;">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 30px;">
        <div style="margin: auto; width: 90%; height: auto; display: grid; grid-template-columns: repeat(3, 25% 60% 15%);">
            <div style="width: 100%; height: auto;">
                <button class="filter-btn">
                    Gender <i class="fa-solid fa-angle-down" style="font-size: 24px;"></i>
                </button>
            </div>
            <div style="width: 100%; height: auto; margin: auto;">
                <div style="width: 100%; margin: auto;"><input type="text" style="margin-top: 10px; width: 100%; height: 75px; background-color: #f1f1f1; border-style: none; border-radius: 15px; font-size: 28px; text-indent: 24px;" placeholder="Search here for services..."></div>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="filter-btn">
                    <i class="fa-solid fa-arrow-down-wide-short"  style="font-size: 38px; color: #0CB4BF;"></i>
                </button>
            </div>

            
        </div>

        <div class="divider"></div>



        <div class="category-container">
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Face')" style="font-family: 'Poppins', sans-serif;">Face</button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Body')" style="font-family: 'Poppins', sans-serif;">Body</button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Health')" style="font-family: 'Poppins', sans-serif;">Health & Wellness</button>
            </div>
        </div>
    </section>

    <section style="margin: auto; width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 30px;">



        <div id="Face" class="tabcontent">
            <div style="margin: auto;  width: 100%; height: auto;">
                <h1 style="margin: 0; padding: 0; color: #000; font-size: 28px; font-weight: 600;">Our Face Services</h1>

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Blepharoplasty</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Rhinoplasty</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Face/Neck lift</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Otoplasty</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Browlift</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Buccal surgeries</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Face lipofilling</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>

                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
                
                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Hair micrografts</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Botox</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Hyaluronic acid injection</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Profhilo</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Hyaluronic acid injection</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, auto 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 45px; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Ultherapy by HIFU</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">PRP (Platelet Rich Plasma)</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, auto 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 45px; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">CO2 Laser</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, auto 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 45px; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Chemical peels</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, auto 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 45px; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <div class="services-list">
                        <div class="service-img-container">
                            <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                        </div>
                        <div class="service-details-list">
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Microneedling</h3>
                                <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                            </div>
        
                            <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, auto 90%); column-gap: 1%;">
                                <div style="width: auto;">
                                    <img src="assets/images/gender-icon.png" style="width: 45px; height: auto; margin-top: 5px;">
                                </div>
                                <div style="width: 100%;">
                                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                                </div>
                            </div>
        
                            <div style="width: 90%; margin: auto;">
                                <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                            </div>
        
                            
                        </div>
        
                        <div class="service-price-list">
                            <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                        </div>
                    </div>
                </a>
    
                <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            </div>
        </div>
          
        <div id="Body" class="tabcontent">
            <div style="margin: auto;  width: 100%; height: auto;">
                <h1 style="margin: 0; padding: 0; color: #000; font-size: 28px; font-weight: 600;">Our Body Services</h1>
            </div>

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Breast augmentation</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 5% 94%); column-gap: 1%;">
                            <div style="width: auto;">
                                <i class="fa-solid fa-venus" style="color: #0CB4BF; font-size: 28px; text-align: center; margin-top: 5px;"></i>
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Breast lift</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 5% 94%); column-gap: 1%;">
                            <div style="width: auto;">
                                <i class="fa-solid fa-venus" style="color: #0CB4BF; font-size: 28px; text-align: center; margin-top: 5px;"></i>
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Breast reduction</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 5% 94%); column-gap: 1%;">
                            <div style="width: auto;">
                                <i class="fa-solid fa-venus" style="color: #0CB4BF; font-size: 28px; text-align: center; margin-top: 5px;"></i>
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Gynecomasty</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 5% 94%); column-gap: 1%;">
                            <div style="width: auto;">
                                <i class="fa-solid fa-mars-stroke-up" style="color: #0C1E36; font-size: 28px; text-align: center; margin-top: 5px;"></i>
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Areola plasty</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Nipple reduction</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Nipple correction</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Liposuction</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Abdominoplasty</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Brazillian butt lift</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 5% 94%); column-gap: 1%;">
                            <div style="width: auto;">
                                <i class="fa-solid fa-venus" style="color: #0CB4BF; font-size: 28px; text-align: center; margin-top: 5px;"></i>
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Labiaplasty</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 5% 94%); column-gap: 1%;">
                            <div style="width: auto;">
                                <i class="fa-solid fa-venus" style="color: #0CB4BF; font-size: 28px; text-align: center; margin-top: 5px;"></i>
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Penoplasty</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 5% 94%); column-gap: 1%;">
                            <div style="width: auto;">
                                <i class="fa-solid fa-mars-stroke-up" style="color: #0C1E36; font-size: 28px; text-align: center; margin-top: 5px;"></i>
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Botox</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Profhilo</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                <div class="services-list">
                    <div class="service-img-container">
                        <img src="assets/images/placeholder-service.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;">
                    </div>
                    <div class="service-details-list">
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 34px;">Coolsculpting® Cryolipolisis</h3>
                            <p style="width: 100%; height: auto; margin: 0; padding: 0; font-size: 24px; margin-top: 10px;">Varies</p>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Geneva, Switzerland</p>
                        </div>
    
                        <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 1%;">
                            <div style="width: auto;">
                                <img src="assets/images/gender-icon.png" style="width: 100%; height: auto; margin-top: 5px;">
                            </div>
                            <div style="width: 100%;">
                                <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                            </div>
                        </div>
    
                        <div style="width: 90%; margin: auto;">
                            <p style="margin: 0; width: 90%; height: auto; padding: 0; font-size: 24px;">4.5 <i class="fa-solid fa-star" style="font-size: 24px; color: #0CB4BF;"></i> <u>0 reviews</u></p>
                        </div>
    
                        
                    </div>
    
                    <div class="service-price-list">
                        <h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right; font-weight: 600;">170 USD</h4>
                    </div>
                </div>
            </a>

            <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

            

        </div>

          
        <div id="Health" class="tabcontent">
            <div style="margin: auto;  width: 100%; height: auto;">
                <h1 style="margin: 0; padding: 0; color: #000; font-size: 28px; font-weight: 600;">Our Health & Wellness Services</h1>
            </div>

            <div style="width: 100%; height: 750px; display: flex; justify-content: center; align-items: center;">
                <h1 style="margin: 0; padding: 0; color: #000; font-size: 28px; font-weight: 400;">No service to display at the moment.</h1>
            </div>
        </div>
    </section>

    <section style="margin: auto; width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin-top: 30px;">

        <div style="margin: auto;  width: 90%; height: auto; margin-top: 40px;">
            <h1 style="margin: 0; padding: 0; color: #000; font-size: 20px; font-weight: 600;">Customer Reviews</h1>
        </div>

        <div class="customer-reviews-card">
            <div style="margin: auto; width: 85%;">
                <p style="margin: 0; width: 100%; height: auto; padding: 0; font-size: 16px; font-weight: 500;">James Smith</p>
            </div>

            <div style="margin: auto; width: 85%;">
                <p style="margin: 0; width: 100%; height: auto; padding: 0; font-size: 12px; font-weight: 400;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum id mi vitae mollis. 
                    In mollis commodo urna at dignissim.
                </p>
            </div>

            <div style="margin: auto; width: 85%;">
                <i class="fa-solid fa-star" style="font-size: 12px; color: #0CB4BF;"></i>
                <i class="fa-solid fa-star" style="font-size: 12px; color: #0CB4BF;"></i>
                <i class="fa-solid fa-star" style="font-size: 12px; color: #0CB4BF;"></i>
                <i class="fa-solid fa-star" style="font-size: 12px; color: #0CB4BF;"></i>
                <i class="fa-solid fa-star" style="font-size: 12px; color: #444444;"></i>   
            </div>
        </div>

    </section>

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
    
    
</body>
</html>