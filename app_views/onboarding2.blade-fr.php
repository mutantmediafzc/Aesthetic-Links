<!DOCTYPE html>
<html>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Filters</title>
    
    

 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
<!-- End Google Tag Manager -->



  </head>
  <script
    src="https://kit.fontawesome.com/a49b3edde3.js"
    crossorigin="anonymous"
  ></script>
  <style>
    body {
        width: 100vw;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        height: 100vh;
    }

    nav {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: auto;
      padding-top: 15%;
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

    .back-btn {
      position: absolute;
      left: 5%;
      width: 75px;
      height: 75px;
      border-radius: 50%;
      border: 2px solid #a1a1a1;
      background-color: transparent;
    }

    .location-dropdown {
      width: 100%;
      height: 100px;
      background-color: transparent;
      border-style: none;
    }

    .dropdown-container {
      width: 90%;
      height: 150px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      column-gap: 25px;
    }

    .dropdown-field {
      width: 100%;
      height: auto;
      grid-template-columns: repeat(1, 1fr);
      row-gap: 20px;
    }

    .gender-pref {
        width: 90%;
        height: 150px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
    }

    /* -------------------------------------------------------------------- */

    select {

        width: 100%;
        height: 100px;
        border: 1px solid #444444;
        border-radius: 15px;
        font-size: 28px;
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 24px;
    }

    select:focus {
        outline: none;
    }

    option {
        width: 100%;
        border: 1px solid #444444;
        border-radius: 10px;
        font-size: 28px;
    }


    /* -------------------------------------------------------- */

    a {
	text-decoration: none;
}
ul {
	list-style-type: none;
}

.radio-section {
    width: 100%;
    height: auto;
	display: grid;
    grid-template-columns: repeat(3, 1fr);
    column-gap: 10px;
}

.radio-item [type="radio"] {
	display: none;
    
}
.radio-item {
    width: 95%;
	margin: auto;
}
.radio-item label {
	display: block;
	padding: 10px 10px;
	background: #ffffff;
	border: 1px solid rgba(255, 255, 255, 0.1);
	border-radius: 8px;
	cursor: pointer;
	font-size: 28px;
	font-weight: 400;
	white-space: nowrap;
	position: relative;
	transition: 0.4s ease-in-out 0s;
    text-align: center;
	
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
    background-color: #0cb3bfe3;
	color: #fff;
}

    /* --------- */

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
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin-top: 0;
    }

    video {
        z-index: -1;
    }

    #myVideo {
  position: relative;
  object-fit: cover;
  width: 100%;
  height: 100%;
  border-radius: 10pt;
}

.paragraph {
    margin: auto; 
    width: 85%; 
    font-size: 28pt; 
    text-align: center; 
    color: #444444; 
    margin-top: 30px; 
    font-weight: 500;
}

    /*-----------------------------------------------------*/
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
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
            height: 100px;
            font-size: 34px;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 20px;
            margin-top: 0;
        }
        
        .anl-logo {
            width: 40%; 
            height: auto; 
            margin-top: 25%;
        }
        
        .header {
            margin: 0; 
            width: 100%; 
            font-size: 28pt; 
            font-weight: 600; 
            text-align: center;
        }
        
        .box2 {
            margin: auto; 
            width: 90%; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 10%; 
            row-gap: 10px;
        }
        
        .box1 {
            margin: auto; 
            width: 90%; 
            height: 35vh; 
            border-radius: 5px;
        }
  
        .paragraph {
            margin: auto; 
            width: 75%; 
            font-size: 12pt; 
            text-align: center; 
            color: #444444; 
            font-weight: 500;
        }
      
        select {
            font-size: 12pt; 
        }
      
        option {
            font-size: 12pt; 
        }
      
        .book-now {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin-top: 0;
        }
    }
      
    
    /*---------------------------------------------------*/

    
    @media only screen and (max-device-width: 767px) {
        
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
            height: 100px;
            font-size: 34px;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 20px;
            margin-top: 0;
        }
        
        .anl-logo {
            width: 60%; 
            height: auto; 
            margin-top: 25%;
        }
        
        .header {
            margin: 0; 
            width: 100%; 
            font-size: 28pt; 
            font-weight: 600; 
            text-align: center;
        }
        
        .box2 {
            margin: auto; 
            width: 100%; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 30%; 
            row-gap: 10px;
        }
        
        .box1 {
            margin: auto; 
            width: 90%; 
            height: 35vh; 
            border-radius: 5px;
        }
  
        .paragraph {
            margin: auto; 
            width: 75%; 
            font-size: 12pt; 
            text-align: center; 
            color: #444444; 
            font-weight: 500;
        }
      
        select {
            font-size: 12pt; 
        }
      
        option {
            font-size: 12pt; 
        }
      
        .book-now {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin-top: 0;
        }
}


  </style>
  <body>
      
      
         

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




    <div style="display: flex; justify-content: center;">
        <img src="assets/images/logo-anl.png" class="anl-logo">
    </div>

    <div class="box2">
        <div class="box1">
            <iframe src="https://www.youtube.com/embed/-XJ3ehWJxWc?rel=0&amp;autoplay=1&mute=1&loop=1" width="100%" height="90%" frameborder="0" style="border-radius: 10px;"></iframe>
        </div>
        <div style="width: 100%;">
            <p class="paragraph">Plongez dans notre histoire, nos fonctionnalités et rejoignez la communauté Aesthetic Links !</p>
        </div>
    </div>

    <div style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: grid; grid-template-columns: repeat(1, 1fr);">
        <div class="booking-btn-container">
            <div style="margin: auto; width: 100%;">
            <p><a style="text-decoration:none; color: #000;" href="onboarding1.blade.php">< Go Back</a></ ></p>     
              <a href="https://fr.aestheticlinks.com/app/views/landing-page.blade.php" style="text-decoration: none;"><button class="book-now" style="font-family: 'Poppins', sans-serif;">Passer</button></a>
            </div>
        </div>
    </div>

  </body>
</html>
