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
        font-size: 24px;
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

    .copy {
        width: 100%;
        height: max-content;
        margin: auto;
        padding: 0;
        font-size: 36px;
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
    
    .copy {
        width: 100%;
        height: max-content;
        margin: auto;
        padding: 0;
        font-size: 16px;
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
    
    .copy {
        width: 100%;
        height: max-content;
        margin: auto;
        padding: 0;
        font-size: 16px;
    }
    

    
}
/* phones */
@media only screen and (max-width: 767px) {
    #logo {
        display: none;
    }
}

/*  tablets */
@media only screen and (min-width: 768px) and (max-width: 1023px) {
      body {
        padding-bottom: 0;
    }
    .profile-details-container {
        margin-top: 100px;
    
    }
    .your-account {
        margin-top: -70px;
    }
   .title-box h1{
          font-size: 22px;
   }
    .profile-grid{
         display: grid;
        grid-template-columns: repeat(2, 1fr); 
        gap: 20px; 
    }
    .btn-text-box p {
            font-size: 10px;
    }
    .icon-svg-btn{
            margin-bottom: 5px;
    }
    .profile-details {
     height: 100%;
     padding-top:10%;
    }
   .progress-bar{
            column-gap: 5%;
    }
    
    .back{
         width: 30px;
        height: 30px;
    }
    .profile-img-box {
    width: 100px;
    height: 100px;
    }
    .progress {
    height: 10px;
    }
    .diamond i {
    font-size: 15px;
    }
    #logo{
    width: 150px;
    position: absolute;
    left:8%;
    background: #222;
    }
    .copy {
        font-size: 15px;
    }
        .title-box {
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    }

}


html, body, .profile-grid {
   height: 100%;
}


/*  laptops and larger screens */
@media only screen and (min-width: 1024px) {
      body {
        padding-bottom: 0;
    }
       .title-box h1{
       font-size: 33px
    }
       .your-account {
        margin-top: -40px;
    }
    .profile-grid{
         display: grid;
        grid-template-columns: repeat(2, 1fr); 
        gap: 20px; 
    }
        .btn-text-box p {
            font-size: 15px;
    }
    #icon-size{
        font-size: 20px;
    }
    .back{
        width: 40px;
        height: 40px;
    }
    
    .profile-img-box {
    width: 150px;
    height: 150px;
    }
    .profile-details-box h3 {
        font-size: 25px;
        
    }

    .back a i {
        color: #fff; 
        font-size: 22px;
    }
    .profile-details-container {
        row-gap: 10px;
        margin-top: 100px;
    
    }
    .user-level-box p {
    font-size: 20px;
    }
    .progress {
    height: 15px;
    }
    .progress-description p{
    font-size: 15px;
    }
    .diamond i {
    font-size: 21px;
    }
    #logo{
    width: 200px;
    position: absolute;
    left:10%;
    background: #222;
    }
    .copy {
        font-size: 15px;
    }
    
    
    
        .title-box {
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    }
}

</style>
<body>

	
	 	<div class="profile-grid">
            <?php include 'profile-details.php'?>
   
            <section class="profile-dashboard">
            <div class="your-account">
                    <div class="title-box">
                    <h1>Personal Information</h1>
                </div>
                <div class="button-your-account">
                    <button>
                        <div  style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1,1fr); margin: auto;">
                            <div class="btn-text-box"><p class='show-p-en'>Account Name: <?=$username?></p></div>
                        </div>
    					
                        
    
                    </button>
                </div>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
    
    			<div class="button-your-account">
                    <button>
                        <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1, 1fr); margin: auto;">
                            <div class="btn-text-box"><p class='show-p-en'>Email: <?=$email?></p></div>
                        </div>
    					
                        
    
                    </button>
                </div>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
    
    			<div class="button-your-account">
                    <button onclick="copyText()">
                        <div  style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 80% 20%); column-gap: 2%; margin: auto;">
                            <div class="btn-text-box"><p class='show-p-en'>Referral Code: <?=$profilelevel?></p></div>
                            <div  style="text-align: right;"><p class="copy show-p-en ">Copy</p></div>
                        </div>
    				      <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                          <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        
    
                    </button>
                </div>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
                
                
                <div class="button-your-account">
                    <a href="reset-password.blade.php" style="text-decoration:none;"><button>
                        <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(1,1fr); margin: auto;">
                            <div class="btn-text-box"><p class='show-p-en'>Reset Password</p></div>
                        </div>
    					
                        
    
                    </button></a>
                </div>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
                
                
            </div>
    	    
    	</div>
    </section>

	
	<script>
        function copyText() {
     
            /* Copy text into clipboard */
            navigator.clipboard.writeText
                ("<?=$profilelevel?>");
        }
        
        
        
        
        
        
        
        
        
        
        
        
        // hide element 
        document.addEventListener("DOMContentLoaded", function() {
        // Check if the URL contains "ar."
        var isArabic = window.location.hostname.startsWith('ar.');
        
        if (isArabic) {
            // Hide all elements with the class "show-el-en" and show all elements with the class "show-el-ar"
            var englishSpans = document.querySelectorAll('.show-el-en');
            englishSpans.forEach(function(span) {
                span.style.display = 'none';
            });
            
          var englishParagraphs = document.querySelectorAll('.show-p-en');
            englishParagraphs.forEach(function(p) {
                p.style.textAlign = 'right';
            });

            var arabicSpans = document.querySelectorAll('.show-el-ar');
            arabicSpans.forEach(function(span) {
                span.style.display = 'inline'; // or 'block' based on your layout
            });
        } else {
            // Hide all elements with the class "show-el-ar" and show all elements with the class "show-el-en"
            var arabicSpans = document.querySelectorAll('.show-el-ar');
            arabicSpans.forEach(function(span) {
                span.style.display = 'none';
            });

            var englishSpans = document.querySelectorAll('.show-el-en');
            englishSpans.forEach(function(span) {
                span.style.display = 'inline'; // or 'block' based on your layout
            });
        }
    });
    </script>

    

</body>
</html>