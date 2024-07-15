<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...

?>
<?php require_once 'server.blade.php';?>
	
	
<!--- Fetch User Details ----->
	
<?php
	
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
	// In this case we can use the account ID to get the account info.
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
	$stmt->fetch();
	$stmt->close();

    $userlevel = max(0, min(8000, $userlevel));
    $percentage = ($userlevel / 8000) * 100;
?>	
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 15%;
    }
    .profile-details {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 15%;
        padding-bottom: 5%;
        background-color: #0CB4BF;
    }

    .profile-container {
        width: 90%;
        height: 100%;
    }

    .back {
        position: absolute;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 2px solid #fff;
        background-color: transparent;
    }

    .profile-details-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        width: 100%;
        height: auto;
    }

    .profile-img {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
    }

    .name-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .progress-bar {
        width: 75%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 90% 10%);
        column-gap: 4%;
        margin: auto;
        
    }

    .progress {
  background: rgba(255,255,255,1);
  justify-content: flex-start;
  border-radius: 100px;
  align-items: center;
  position: relative;
  padding: 0 5px;
  display: flex;
  height: 30px;
  width: 100%;
  margin: auto;
}

    .progress-value {
        animation: load 3s normal forwards;
        border-radius: 100px;
        background: #0CB4BF;
        height: 20px;
        width: <?php echo $percentage; ?>;
    }

    @keyframes load {
        0% { width: 0; }
        100% { width: <?php echo $percentage; ?>%; }
    }


    .diamond {
    width: 40px;
    height: 40px;
    background-color: transparent;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* -----------------------------section 2--------------------------------- */

.profile-dashboard {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: auto;
}

.your-account {
    width: 90%;
    height: auto;
    margin-top: 50px;
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    row-gap: 10px;
}

.button-your-account {
    width: 100%;
    height: auto;
}

.button-your-account button {
    display: grid;
    grid-template-columns: repeat(2, 90% 10%);
    width: 100%;
    height: 100px;
    border-style: none;
    background-color: transparent;
    border-bottom: 1px solid #c1c1c1;
    font-size: 36px;
    color: #000;
    margin: auto;
    
}

.back a {
    width: 100%; 
    text-decoration: none; 
    color:#000; 
    cursor: pointer;
}

.back a i {
    color: #fff; 
    font-size: 28px;
}

.profile-details-box {
    display: flex; 
    justify-content: center;
}

    .profile-details-box h3 {
        margin: 0; 
        padding: 0; 
        color: #fff; 
        font-size: 34px; 
        font-weight: 500;
    }
    
    .profile-img-box {
        width: 200px; 
        height: 200px; 
        border-radius: 50%;
    }
    
    .name-container h2 {
        margin: 0; 
        padding: 0; 
        color: #fff; 
        font-size: 38px; 
        font-weight: 500; 
        margin-top: 20px;
    }
    
    .user-level-box {
        display: flex; 
        justify-content: center;
    }
    
    .user-level-box p {
        margin: 0; 
        padding: 0; 
        font-size: 24px; 
        color: #fff;
    }
    
    .diamond i {
        color: #fff; 
        font-size: 40px;
    }
    
    .progress-description {
        display: flex; 
        justify-content: center;
    }
    
    .progress-description p {
        margin: 0; 
        padding: 0; 
        font-size: 24px; 
        color: #fff;
    }
    
    .title-box {
        width: 100%; 
        height: auto;
    }
    
    .title-box h1 {
        margin: 0; 
        padding: 0; 
        color: #000; 
        font-size: 48px; 
        font-weight: 600;
    }
    
    .btn-img-box {
        width: 100%; 
        height: 100%;
    }
    
    .btn-img-box img {
        width: 45px; 
        height: 45px;
    }
    
    .button-your-account button i {
        margin: auto; 
        color: #0CB4BF;
    }
    
    .btn-text-box {
        width: 100%;
        height: max-content;
        margin: 0;
        padding: 0;
        font-size: 36px;
    }
    
    .btn-text-box p{
        text-align: left;
        font-size 16px;
        margin: 0;
        font-weight: 300;
    }
    
    .logout-btn {
        color: #0C1E36 !important;
    }
    
    .delete-btn {
        color: red;
    }
    
    .icon-svg-btn {
        width: 100%; 
        height: 100%;
    }
    
    .icon-svg-btn i {
        font-size: 38px; 
        color: #0CB4BF;
    }
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .back {
        position: absolute;
        width: 30pt;
        height: 30pt;
        border-radius: 50%;
        border: 2px solid #fff;
        background-color: transparent;
    }
    
    .back a {
        width: 100%; 
        text-decoration: none; 
        color:#000; 
        cursor: pointer;
    }

    .back a i {
        color: #fff; 
        font-size: 18px;
    }
    
    /*-------------------------------*/
    
    .profile-details-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 5px;
        width: 100%;
        height: auto;
    }
    
    .profile-details-box h3 {
        margin: 0; 
        padding: 0; 
        color: #fff; 
        font-size: 18px; 
        font-weight: 500;
    }
    
    .profile-img-box {
        width: 100px; 
        height: 100px; 
        border-radius: 50%;
    }
    
    .name-container h2 {
        margin: 0; 
        padding: 0; 
        color: #fff; 
        font-size: 18px; 
        font-weight: 500; 
        margin-top: 10px;
    }
    
    .user-level-box p {
        margin: 0; 
        padding: 0; 
        font-size: 14px; 
        color: #fff;
    }
    
    .progress-bar {
        width: 75%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(2, 90% 9%);
        column-gap: 4%;
        margin: auto;
        
    }
    
    .progress {
        background: rgba(255,255,255,1);
        justify-content: flex-start;
        border-radius: 100px;
        align-items: center;
        position: relative;
        padding: 0 5px;
        display: flex;
        height: 15px;
        width: 100%;
        margin: auto;
    }
    
    .progress-value {
        animation: load 3s normal forwards;
        border-radius: 100px;
        background: #0CB4BF;
        height: 8px;
        width: 0;
    }
    
    .diamond {
        width: 20px;
        height: 20px;
        background-color: transparent;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .diamond i {
         color: #fff; 
        font-size: 16px;
    }
    
    .progress-description p {
        margin: 0; 
        padding: 0; 
        font-size: 12px; 
        color: #fff;
    }
    
    .title-box {
        width: 100%; 
        height: auto;
    }
    
    .title-box h1 {
        margin: 0; 
        padding: 0; 
        color: #000; 
        font-size: 20px; 
        font-weight: 600;
    }
    
    .button-your-account button {
        display: grid;
        grid-template-columns: repeat(2, 90% 10%);
        width: 100%;
        height: 50px;
        border-style: none;
        background-color: transparent;
        border-bottom: 1px solid #c1c1c1;
        font-size: 36px;
        color: #000;
        margin: auto;
        padding: 0;
    }
    
    .btn-img-box img {
        width: 20px; 
        height: 20px;
    }
    
    .button-your-account button i {
        margin: auto; 
        color: #0CB4BF;
        font-size: 18px;
    }
    
    .btn-text-box p {
        text-align: left;
        font-size 18px;
        margin: 0;
        font-weight: 300;
    }
    
    .btn-text-box {
        width: 100%;
        height: max-content;
        margin: auto;
        padding: 0;
        font-size: 18px;
    }
    
    .icon-svg-btn i {
        font-size: 18px; 
        color: #0CB4BF;
        margin-bottom: 20px !important;
    }
    }

@media only screen and (max-device-width: 767px) {
    
    .back {
        position: absolute;
        width: 30pt;
        height: 30pt;
        border-radius: 50%;
        border: 2px solid #fff;
        background-color: transparent;
    }
    
    .back a {
        width: 100%; 
        text-decoration: none; 
        color:#000; 
        cursor: pointer;
    }

    .back a i {
        color: #fff; 
        font-size: 18px;
    }
    
    /*-------------------------------*/
    
    .profile-details-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 5px;
        width: 100%;
        height: auto;
    }
    
    .profile-details-box h3 {
        margin: 0; 
        padding: 0; 
        color: #fff; 
        font-size: 18px; 
        font-weight: 500;
    }
    
    .profile-img-box {
        width: 100px; 
        height: 100px; 
        border-radius: 50%;
    }
    
    .name-container h2 {
        margin: 0; 
        padding: 0; 
        color: #fff; 
        font-size: 18px; 
        font-weight: 500; 
        margin-top: 10px;
    }
    
    .user-level-box p {
        margin: 0; 
        padding: 0; 
        font-size: 14px; 
        color: #fff;
    }
    
    .progress-bar {
        width: 75%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(2, 90% 9%);
        column-gap: 4%;
        margin: auto;
        
    }
    
    .progress {
        background: rgba(255,255,255,1);
        justify-content: flex-start;
        border-radius: 100px;
        align-items: center;
        position: relative;
        padding: 0 5px;
        display: flex;
        height: 15px;
        width: 100%;
        margin: auto;
    }
    
    .progress-value {
        animation: load 3s normal forwards;
        border-radius: 100px;
        background: #0CB4BF;
        height: 8px;
        width: 0;
    }
    
    .diamond {
        width: 20px;
        height: 20px;
        background-color: transparent;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .diamond i {
         font-size: 16px;
        color: #fff;
    }
    
    .progress-description p {
        margin: 0; 
        padding: 0; 
        font-size: 12px; 
        color: #fff;
    }
    
    .title-box {
        width: 100%; 
        height: auto;
    }
    
    .title-box h1 {
        margin: 0; 
        padding: 0; 
        color: #000; 
        font-size: 20px; 
        font-weight: 600;
    }
    
    .button-your-account button {
        display: grid;
        grid-template-columns: repeat(2, 90% 10%);
        width: 100%;
        height: 50px;
        border-style: none;
        background-color: transparent;
        border-bottom: 1px solid #c1c1c1;
        font-size: 36px;
        color: #000;
        margin: auto;
        padding: 0;
    }
    
    .btn-img-box img {
        width: 20px; 
        height: 20px;
    }
    
    .button-your-account button i {
        margin: auto; 
        color: #0CB4BF;
        font-size: 18px;
    }
    
    .btn-text-box p {
        text-align: left;
        font-size 18px;
        margin: 0;
        font-weight: 300;
    }
    
    .btn-text-box {
        width: 100%;
        height: max-content;
        margin: auto;
        padding: 0;
        font-size: 18px;
    }
    
    .icon-svg-btn i {
        font-size: 18px; 
        color: #0CB4BF;
        margin-bottom: 20px !important;
    }

    
}

</style>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
	
    <?php include 'profile-details.php'?>

    <section class="profile-dashboard">
        <div class="your-account">
            <div class="title-box">
                <h1>Customer Support</h1>
            </div>

            <div class="button-your-account">
               
            </div>
            <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->

			
            <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->

			
            <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
            
        </div>
    </section>
    
    <script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "siq6866246edfbb7b370ba48a3fdaeea35ad5b86ede73ed110b8a727b30f5aab57b", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zohopublic.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>
	
	<script>
        function copyText() {
     
            /* Copy text into clipboard */
            navigator.clipboard.writeText
                ("<?=$profilelevel?>");
        }
    </script>
    
    

    

</body>
</html>