<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Aesthetic Links | Booking</title>
</head>

<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>
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
        
    }


    .service-description p {

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


    </style>
<body>

    <nav>
        <div class="location-dropdown-container">
            <div style="width: 100%;">
                <button class="location-dropdown">
                    <img src="assets/images/uae.png" style="margin: auto; width: 45px; height: auto;"> <span>Dubai</span> <i class="fa-solid fa-angle-down" style="font-size: 28px;"></i>
                </button>
            </div>
            <button class="menu-btn"><i class="fa-solid fa-bars" style="color: #fff; font-size: 48px;"></i></button>
        </div>
        
    </nav>

    <section class="service-details-img-section">
        <div class="service-details-img-container">
            <a href="clinic-details.html" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;"><button class="back-btn"><i class="fa-solid fa-angle-left" style="color: #a1a1a1; font-size: 28px;"></i></button></a>
            <img src="assets/images/service-img.png">
        </div>

    </section>

    <section class="service-details-section">
        <div style="width: 90%; display: grid; grid-template-columns: repeat(2, auto 1fr); margin-top: 12vh; column-gap: 20px;">
            <h3 style="width: 100%; margin: 0; padding: 0; font-size: 48px;">Service Name</h3><p style="width: 100%; margin: 0; padding: 0; font-size: 28px; margin-top: 20px; color: #444444;">45mins</p>
        </div>
    </section>
    <section class="more-details-section">
        <div class="address">
            <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">Dubai, United Arab Emirates</p>
            <div style="width: 100%; display: grid; grid-template-columns: repeat(2, 10% 90%);">
                <div style="width: auto;">
                    <img src="assets/images/gender-icon.png" style="width: 100%; height: auto;">
                </div>
                <div style="width: 100%;">
                    <p style="width: 100%; margin: 0; padding: 0; font-size: 28px; color: #444444;">For male & female patients</p>
                </div>
            </div>
        </div>
        <div class="pricing-container">
            <div style="width: 100%;"><h4 style="width: 100%; margin: 0; padding: 0; font-size: 38px; text-align: right;">500 AED</h4></div>
        </div>
    </section>

    <section style="width: 100%; display: flex; justify-content: center; margin-top: 20px;">
        <div class="service-description">
            <p style="width: 100%; height: 175px; margin: 0; padding: 0; font-size: 28px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum id mi vitae mollis. In mollis
                    commodo urna at dignissim. Morbi tincidunt dignissim euismod.
            </p>
        </div>
    </section>

    <section style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">
            <a href="#" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;"><div><button class="book-now">Book1 now</button></div></a>
        </div>
    </section>
    
</body>
</html>