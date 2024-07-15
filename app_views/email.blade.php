<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Document</title>
  

 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
<!-- End Google Tag Manager -->



</head>
<body>
       

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




  <div class="container">
    <div class="email-header">
      <h1 style="color: #333;">Aesthetic Links Booking</h1>
    </div>
    <div class="email-content">
      <div class="email-content-header">
        <h2>Thanks for your booking!</h2>
      </div>
      <div class="email-content-body">
        <p>Booking details</p>

        <div>
          <p>Service name:</p>
          <span>'.$keysname.'</span>
        </div>
        <div>
          <p>Clinic name:</p>
          <span>'.$keycname.'</span>
        </div>
        <div>
          <p>Client name:</p>
          <span>'.$keyusername.'</span>
        </div>
        <div>
          <p>Client Phone:</p>
          <span>'.$mobile.'</span>
        </div>
        <div>
          <p>Expert name:</p>
          <span>'.$expert_name.'</span>
        </div>
        <div>
          <p>Preference:</p>
          <span>'.$note.'</span>
        </div>
        <div>
          <p>Time:</p>
          <span>'.$keytime.'</span>
        </div>
        <div>
          <p>Date:</p>
          <span>'.$keydate.'</span>
        </div>
        <div>
          <p>duration:</p>
          <span>'.$duration.'</span>
        </div>
        <div>
          <p>Paid amount:</p>
          <span>'.$price.' USD</span>
        </div>
        <div>
          <p>Service type:</p>
          <span>'.$type.'</span>
        </div>
        <div><p><a href="'.$clocation.'">Location</a></p></div>
      </div>
    </div>
    <div class="email-footer">
      <p>Please reach out to support on our app if you 
        require assistance.</p>
    </div>
  </div>
</body>
<style>
  html, body{
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    font-weight: 500;
    font-style: normal;
  }
  body {
    background-color: #0D2748;
    text-align: center;
  }
  .container {
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    height: 100%;
  }
  .email-content-body {
    background-color: #fff;
    margin: 1rem 1.5rem;
    padding: 0.5rem 0.5rem 1.5rem 0.5rem;
    border-radius: 30px;
  }
  .email-content-body > p {
    text-align: left;
    padding-left: .5rem;
    font-size: 20px;
    font-weight: 700;
  }
  .email-content-body > div {
    display: flex;
    justify-content: space-between;
    padding: 0 1rem;
    font-size: 18px;
  }
  .email-content-body > div span {
    color: #98C3BC;
  }
  .email-content .email-content-header h2 {
    color: #fff;
    font-size: 28px;
  }
  .email-content .email-content-body > div p {
    margin: 0;
  }
  .email-footer > p {
    font-style: italic;
    color: #fff;
    font-size: 14px;
    font-family: cursive;
    white-space: pre-line;
    opacity: 0.7;
  }
</style>
</html>