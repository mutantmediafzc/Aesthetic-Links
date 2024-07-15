<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...

?>

<?php

// Define the target page for redirection
$targetPage = "landing-page.blade.php"; // Replace with your desired page

// Check if a specific session variable is set (adapt as needed)
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
  // Redirect to the target page if session exists
  header("Location: $targetPage");
  exit();
}

// If no session or invalid session variable, continue normal page execution
// You can add logic here to display a message or handle the case where there's no session
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | City Filters</title>

    <link rel="stylesheet" href="style.scss"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/minireset.css/0.0.2/minireset.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:600" />
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>

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
        transition: background-color 0.3s ease-in-out;
        padding: 40px 0 40px 0;
        margin: auto;
    }
    
    .row-bg {
        width: 90%;
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
        border: 2px solid #e3e3e3;
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
    
    .custom-radio input[type="radio"]:checked + .radio-label {
        background-color: rgba(70, 175, 180, 0.1);
    }
    
    .custom-radio input[type="radio"]:checked + .radio-label .radio-circle {
        border-color: #46AFB4;
        background-color: #46AFB4;
    }
    
    .custom-radio input[type="radio"]:checked + .radio-label .radio-circle .radio-circle-inner  {
        display: block;
    }
    
    .custom-radio input[type="radio"]:checked + .radio-label .radio-text {
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
        text-align: center;
    }
    
    .header2 {
        margin: 0; 
        width: 100%; 
        font-size: 24pt; 
        font-weight: 500; 
        color: #46AFB4;
    }
    
    .paragraph {
        margin: auto;
        width: 100%;
        font-size: 16pt;
        color: #444444;
        font-weight: 500;
    }

@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
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
        color: #46AFB4;
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
        transition: background-color 0.3s ease-in-out;
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
}

@media only screen and (max-device-width: 767px) {
  
    .header {
        margin: 0; 
        width: 100%; 
        font-size: 24pt; 
        font-weight: 600; 
        text-align: left;
    }
    
    .header2 {
        margin: 0; 
        width: 100%; 
        font-size: 18pt; 
        font-weight: 500; 
        color: #46AFB4;
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
        width: 100%;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
        padding: 20px 0 20px 0;
        margin: auto;
    }
    
    .radio-circle {
        width: 25px;
        height: 25px;
        border: 2px solid #e3e3e3;
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
}


#locationLink{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 45px;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    background-color: #0C1E36;
    border-radius: 5px;
    margin-top: 0;
    border-style: none;
}

    </style>
<body>

    <nav>
        <div class="location-dropdown-container">
            <div class="location-dropdown">
                <h3 class="header2">Welcome to</h1>
                <h1 class="header">Aesthetic Links</h1>
                <p class="paragraph">Choose your preferred language for the<br>ultimate app experience.</p>
            </div>
        </div>
        
    </nav>
    
    
    <form id="myForm">
    <section class="profile-dashboard">
        
            <div class="custom-radio">
                
               
                    
                    
                        <input type="radio" id="radio-1" name="location" value="English">
                        <label class="radio-label" for="radio-1">
                            <div class="row-bg">
                                <span class="radio-text">
                                    <div class="language-icon-box">
                                        <img src="assets/images/language-flag/united-kingdom.svg" class="language-icon">
                                    </div> &nbsp;&nbsp;
                                    English
                                </span>
                                <div class="radio-circle"><div class="radio-circle-inner"></div></div>
                                
                            </div>
                        </label>
                        
                        
                        <input type="radio" id="radio-2" name="location" value="Arabic">
                        <label class="radio-label" for="radio-2">
                            <div class="row-bg">
                                <span class="radio-text">
                                    <div class="language-icon-box">
                                        <img src="assets/images/language-flag/uae.svg" class="language-icon">
                                    </div> &nbsp;&nbsp;
                                    Arabic
                                </span>
                                <div class="radio-circle"><div class="radio-circle-inner"></div></div>
                                
                            </div>
                        </label>
                      
        
                        <input type="radio" id="radio-3" name="location" value="German">
                            <label class="radio-label" for="radio-3">
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
        
                        <input type="radio" id="radio-4" name="location" value="French">
                            <label class="radio-label" for="radio-4">
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
        
                        <input type="radio" id="radio-5" name="location" value="Spanish">
                            <label class="radio-label" for="radio-5">
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
                            
                            
                        <input type="radio" id="radio-6" name="location" value="Russia">
                            <label class="radio-label" for="radio-6">
                                <div class="row-bg">
                                    <span class="radio-text">
                                        <div class="language-icon-box">
                                            <img src="assets/images/language-flag/russia.svg" class="language-icon">
                                        </div> &nbsp;&nbsp;
                                        Russian
                                    </span>
                                    <div class="radio-circle"><div class="radio-circle-inner"></div></div>
                                    
                                </div>
                                
                            </label>    
            
                
            </div>
            
            
    </section>
    
    <div style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: grid; grid-template-columns: repeat(1, 1fr);">
        <div class="booking-btn-container">
            <div style="margin: auto; width: 100%;">
              <a href="#" id="locationLink" style="text-decoration: none;">
                  <button class="book-now" style="font-family: 'Poppins', sans-serif;">Let's Go</button>
                </a>
            </div>
        </div>
    </div>
    
    </form>

</body>

<script>
    
const form = document.getElementById("myForm");
const locationLink = document.getElementById("locationLink");
const preference = document.getElementsByName("location");

form.addEventListener("change", (event) => {
  let selectedLocation;
  for (const radio of preference) {
    if (radio.checked) {
      selectedLocation = radio.value;
      break;
    }
  }

  switch (selectedLocation) {
    case "English":
      locationLink.href = "onboarding2.blade.php"; // Replace with actual URL
      break;
    case "Arabic":
      locationLink.href = "onboarding2.blade-ar.php"; // Replace with actual URL
      break;
    case "German":
      locationLink.href = "onboarding2.blade-de.php"; // Replace with actual URL
      break;
    case "French":
      locationLink.href = "onboarding2.blade-fr.php"; // Replace with actual URL
      break;
    case "Spanish":
      locationLink.href = "onboarding2.blade-es.php"; // Replace with actual URL
      break;
    case "Russia":
      locationLink.href = "onboarding2.blade-ru.php"; // Replace with actual URL
      break;       
    default:
      locationLink.href = "onboarding2.blade.php"; // Set a default or error handling
  }

  locationLink.textContent = "Let's Go"; 
});

    
    
</script>


</html>