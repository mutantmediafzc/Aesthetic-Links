

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
        width: 100%;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        height: 100vh;
    }

    /* -------------------------------------------------------- */

    a {
	    text-decoration: none;
    }

    /* --------- */

    .booking-btn-container {
      margin: auto;
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-bottom: 20pt;
    }

    .booking-btn-container1 {
      margin: auto;
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        margin-bottom: 5%;

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

    .book-now1 {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #fff;
        background-color:  rgba(255, 255, 255, 0.2);
        border: 2px solid #fff;
        border-radius: 20px;
    }

    video {
        z-index: -1;
    }

    #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100vh;
    }

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px){
        
        .anl-logo {
            width: 40%;
            height: auto;
            margin-top: 15%;
        }
        
        .image-txt {
            margin-top: 10%; 
            width: 65%; 
            height: auto;
        }
        
        .book-now {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin-top: 0;
        }
        
        .book-now1 {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #fff;
            background-color:  rgba(255, 255, 255, 0.2);
            border: 2px solid #fff;
            border-radius: 5pt;
        }
        
        .booking-btn-container {
            margin-bottom: 0pt;
        }
        
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100vh;
        }
    }


    @media only screen and (max-device-width: 767px) {
        
        .anl-logo {
            width: 60%;
            height: auto;
            margin-top: 25%;
        }
        
        .image-txt {
            margin-top: 25%; 
            width: 90%; 
            height: auto;
        }
      
        .book-now {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin-top: 0;
        }
        
        .book-now1 {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #fff;
            background-color:  rgba(255, 255, 255, 0.2);
            border: 2px solid #fff;
            border-radius: 5pt;
        }
        
        .booking-btn-container {
            margin-bottom: 0pt;
        }
        
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100vh;
        }
    }

  </style>
  <body>
   

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->





<video autoplay loop muted playsinline autobuffer id="myVideo">
        <source src="assets/videos/full-bg-vid.mp4" type="video/mp4">
    </video>
    <div style="display: flex; justify-content: center; height: max-content;">
        <img src="assets/images/logo-anl.png" class="anl-logo">
    </div>

    

    <div style="width: 90%; display: flex; justify-content: center; align-items: center;">
      <img src="assets/images/text.png" class="image-txt">
    </div>


    <div style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: grid; grid-template-columns: repeat(1, 1fr); padding-bottom:8%;">
        
        <div class="booking-btn-container">
          <a href="register.blade.php" style="text-decoration: none;"><div style="margin: auto; width: 100%;"><button class="book-now" style="font-family: 'Poppins', sans-serif;">Sign up</button></div>
        </div>
        
        <div class="booking-btn-container1">
            <div style="margin: auto; width: 100%;">
                <a href="login.blade.php" style="text-decoration: none;"><button class="book-now1" style="font-family: 'Poppins', sans-serif;">Log in</button></a>
            </div>
        </div>
    </div>


  </body>
</html>
