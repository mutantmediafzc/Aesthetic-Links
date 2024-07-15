<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | City Filters</title>

    <link rel="stylesheet" href="style.scss" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/minireset.css/0.0.2/minireset.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:600" />
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>
    a {
        text-decoration: none;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    nav {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 15%;
        margin-bottom: 5%;
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

    .location-dropdown {
        width: 100%;
        height: auto;
        background-color: transparent;
        border-style: none;
    }

    .profile-dashboard {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
    }


    /* ------------------------------ */


    .custom-radio {
        width: 100%;
        display: flex;
        flex-direction: column;
        background-color: #fff;
        overflow: hidden;
    }

    .custom-radio input[type="radio"] {
        display: none;
    }

    .radio-label {
        width: 100%;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: transparent 0.3s ease-in-out;
        padding: 40px 0 40px 0;
        margin: auto;
    }

    .row-bg {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
        margin: auto;

    }

    .radio-circle {
        width: 50px;
        height: 50px;
        border: 0px solid #e3e3e3;
        border-radius: 50%;
        transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .radio-circle-inner {
        width: 20px;
        height: 20px;
        background-color: #fff;
        border-radius: 50px;
        display: none;
    }

    .radio-text {
        display: flex;
        align-items: center;
        font-size: 38px;
        color: #212121;
        transition: color 0.3s ease-in-out;
    }

    .language-icon-box {
        width: 45px;
        height: 45px;
        border-radius: 50px;
    }

    .language-icon {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50px;
    }

    .custom-radio input[type="radio"]:checked+.radio-label {
        background-color: transparent;
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-circle {
        border-color: transparent;
        background-color: transparent;
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-circle .radio-circle-inner {
        display: block;
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-text {
        color: #212121;
    }

    .booking-btn-container {
        margin: auto;
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        margin-bottom: 10%;
    }

    .book-now {
        width: 100%;
        height: 45px;
        font-size: 34px;
        font-weight: 600;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 10px;
        margin-top: 0;
        border-style: none;
    }

    /* ------------------------------ */

    .header {
        margin: 0;
        width: 100%;
        font-size: 28pt;
        font-weight: 600;
        text-align: left;
    }

    .header2 {
        margin: 0;
        width: 100%;
        font-size: 24pt;
        font-weight: 500;
        color: transparent;
    }

    .paragraph {
        margin: auto;
        width: 100%;
        font-size: 16pt;
        color: #444444;
        font-weight: 500;
    }

    .back {
        position: absolute;
        left: 5%;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 2px solid #666;
        background-color: transparent;
    }

    .back a {
        width: 100%;
        text-decoration: none;
        color: #666;
        cursor: pointer;
    }

    .back a i {
        color: #666;
        font-size: 28px;
    }

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .header {
            margin: 0;
            width: max-content;
            font-size: 28pt;
            font-weight: 600;
            text-align: left;
        }

        .header2 {
            margin: 0;
            width: 100%;
            font-size: 24pt;
            font-weight: 500;
            color: transparent;
        }

        .paragraph {
            margin: auto;
            width: 100%;
            font-size: 16pt;
            color: #444444;
            font-weight: 500;
        }

        /*------------------------------------------*/

        .radio-label {
            width: 100%;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: transparent 0.3s ease-in-out;
            padding: 20px 0 20px 0;
            margin: auto;
        }

        .radio-circle {
            width: 30px;
            height: 30px;
            border: 2px solid #e3e3e3;
            border-radius: 50%;
            transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .radio-circle-inner {
            width: 15px;
            height: 15px;
            background-color: #fff;
            border-radius: 50px;
            display: none;
        }

        .radio-text {
            display: flex;
            align-items: center;
            font-size: 18pt;
            color: #212121;
            transition: color 0.3s ease-in-out;
        }

        .language-icon-box {
            width: 25px;
            height: 25px;
            border-radius: 50px;
        }

        .language-icon {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50px;
        }

        /*-----------------------------*/

        .book-now {
            width: 100%;
            height: 55px;
            font-size: 24px;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
            border-style: none;
        }

        .back {
            position: absolute;
            left: 5%;
            width: 30pt;
            height: 30pt;
            border-radius: 50%;
            border: 1px solid #666;
            background-color: transparent;
        }

        .back a {
            width: 100%;
            text-decoration: none;
            color: #666;
            cursor: pointer;
        }

        .back a i {
            color: #666;
            font-size: 18px;
        }

    }

    @media only screen and (max-device-width: 767px) {

        .header {
            margin: auto;
            padding: 0;
            font-size: 16pt;
            text-indent: 50px;
            font-weight: 600;
            margin-top: 3pt;
        }

        .header2 {
            margin: 0;
            width: 100%;
            font-size: 18pt;
            font-weight: 500;
            color: transparent;
        }

        .paragraph {
            margin: auto;
            width: 100%;
            font-size: 12pt;
            color: #444444;
            font-weight: 500;
        }

        /*------------------------------------------*/

        .radio-label {
            width: 90%;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: transparent 0.3s ease-in-out;
            padding: 20px 0 20px 0;
            margin: auto;
            border-bottom: 1px solid #e3e3e3;

        }

        .radio-circle {
            width: 25px;
            height: 25px;
            border: 0px solid #e3e3e3;
            border-radius: 50%;
            transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .radio-circle-inner {
            width: 13px;
            height: 13px;
            background-color: #fff;
            border-radius: 50px;
            display: none;
        }

        .radio-text {
            display: flex;
            align-items: center;
            font-size: 14pt;
            color: #212121;
            transition: color 0.3s ease-in-out;
        }

        .language-icon-box {
            width: 25px;
            height: 25px;
            border-radius: 50px;
        }

        .language-icon {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50px;
        }

        /*------------------------------------------*/

        .book-now {
            width: 100%;
            height: 45px;
            font-size: 18px;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
            border-style: none;
        }

        .back {
            position: absolute;
            left: 5%;
            width: 30pt;
            height: 30pt;
            border-radius: 50%;
            border: 1px solid #666;
            background-color: transparent;
        }

        .back a {
            width: 100%;
            text-decoration: none;
            color: #666;
            cursor: pointer;
        }

        .back a i {
            color: #666;
            font-size: 18px;
        }
    }

    .radio-label.active .row-bg {
        background-color: transparent;
        padding: 25px 10px !important;
        color: #fff;
    }

    .radio-label.active {
        padding: 0 !important;
        padding-bottom: 5px !important;
    }

    .radio-label {
        padding: 25px 10px !important;
    }

    .radio-label.active .radio-text {
        font-weight: bold;
        color: #000;
    }
</style>

<body>

    <nav>
        <div class="location-dropdown-container">
            
            <div class="location-dropdown">
                <button class="back">
                    <a href="landing-page.blade.php">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                </button>
                
                <h1 class="header">Select a country</h1>
            </div>
        </div>

    </nav>

    <section class="profile-dashboard">

        <div class="custom-radio">

            <!-- <a href="https://aestheticlinks.com/twinr/views/landing-page.blade-en.php">
                <label class="radio-label active" for="radio-1">
                    <div class="row-bg">
                        <span class="radio-text">
                            <div class="language-icon-box">
                                <img src="assets/images/language-flag/united-kingdom.svg" class="language-icon">
                            </div> &nbsp;&nbsp;
                            United States
                        </span>
                        <div class="radio-circle">
                            <div class="radio-circle-inner"></div>
                        </div>
                    </div>
                </label>
            </a> -->

            <a href="https://aestheticlinks.com/app/uae/landing-page.blade.php" class="currency-link">
                <label class="radio-label" for="radio-uae" data-currency="AED">
                    <div class="row-bg">
                        <span class="radio-text">
                            <div class="language-icon-box">
                                <img src="assets/images/language-flag/united-arab-emirates.svg" class="language-icon">
                            </div> &nbsp;&nbsp;
                            Dubai
                        </span>
                        <div class="radio-circle">
                            <div class="radio-circle-inner"></div>
                        </div>
                    </div>
                </label>
            </a>

            <a href="https://aestheticlinks.com/app/views/landing-page.blade.php" class="currency-link">
                <label class="radio-label" for="radio-switzerland" data-currency="CHF">
                    <div class="row-bg">
                        <span class="radio-text">
                            <div class="language-icon-box">
                                <img src="assets/images/language-flag/switzerland.svg" class="language-icon">
                            </div> &nbsp;&nbsp;
                            Switzerland
                        </span>
                        <div class="radio-circle">
                            <div class="radio-circle-inner"></div>
                        </div>
                    </div>
                </label>
            </a>



            <!-- <a href="https://de.aestheticlinks.com/twinr/views/landing-page.blade.php">
                    <label class="radio-label" for="radio-2">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/germany.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                German
                            </span>
                            <div class="radio-circle"><div class="radio-circle-inner"></div></div>
                            
                        </div>
                        
                    </label>
                </a>    

                <a href="https://fr.aestheticlinks.com/twinr/views/landing-page.blade.php">
                    <label class="radio-label" for="radio-3">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/france.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                French
                            </span>
                            <div class="radio-circle"><div class="radio-circle-inner"></div></div>
                            
                        </div>
                        
                    </label>
                </a>    
    
                <a href="https://es.aestheticlinks.com/twinr/views/landing-page.blade.php">
                
                    <label class="radio-label" for="radio-4">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/spain.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                Spanish
                            </span>
                            <div class="radio-circle"><div class="radio-circle-inner"></div></div>
                            
                        </div>
                        
                    </label>
                </a> -->

        </div>

    </section>

    <div
        style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: grid; grid-template-columns: repeat(1, 1fr);">
        <div class="booking-btn-container">
            <div style="margin: auto; width: 100%;">
                <a href="landing-page.blade.php" style="text-decoration: none;"><button class="book-now"
                        style="font-family: 'Poppins', sans-serif;">Go Back</button></a>
            </div>
        </div>
    </div>

    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     const labels = document.querySelectorAll('.radio-label');
        //     const cookieName = 'activeCurrency';

        //     function getCookie(name) {
        //         const value = `; ${document.cookie}`;
        //         const parts = value.split(`; ${name}=`);
        //         if (parts.length === 2) return parts.pop().split(';').shift();
        //         return null;
        //     }

        //     function setActiveLabel(currency) {
        //         labels.forEach(label => {
        //             const labelCurrency = label.dataset.currency;
        //             if (labelCurrency === currency) {
        //                 label.classList.add('active');
        //             } else {
        //                 label.classList.remove('active');
        //             }
        //         });
        //     }

        //     function setCookieAndRedirect(name, value, days, url) {
        //         let expires = '';
        //         if (days) {
        //             const date = new Date();
        //             date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        //             expires = `; expires=${date.toUTCString()}`;
        //         }
        //         document.cookie = `${name}=${value || ''}${expires}; path=/`;
        //         window.location.href = url;
        //     }

        //     labels.forEach(label => {
        //         label.addEventListener('click', function () {
        //             const currency = label.dataset.currency;
        //             // alert(currency);
        //             var  url = "";
        //             if (currency == "AED") {
        //                  url = 'https://aestheticlinks.com/app/uae/landing-page.blade.php';
        //             } else {
        //                  url = 'https://aestheticlinks.com/app/views/landing-page.blade.php';
        //             }
                    
        //             setActiveLabel(currency);
        //             setCookieAndRedirect(cookieName, currency, 7, url);
        //         });
        //     });

        //     const activeCurrency = getCookie(cookieName) || 'AED';
        //     setActiveLabel(activeCurrency);
        // });

    </script>

</body>

</html>