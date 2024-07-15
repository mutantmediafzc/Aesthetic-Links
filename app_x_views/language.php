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
    #close-icon-x{
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
        #close-icon-x{
         display: flex;
    justify-content: flex-end;
    margin: 0 5px 10px 0;
    }
    .title-box {
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    }
    .your-account {
        margin-top: -70px;
    }
   .title-box h1{
          font-size: 22px;
   }
    .profile-grid{
         display: grid;
        grid-template-columns: repeat(3, 1fr); 
        gap: 20px; 
    }
    .btn-text-box p {
            font-size: 15px;
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
        font-size: 20px;
    }
        .profile-dashboard{
         grid-column: span 2; 
    }
    
       .profile-container {
            padding-top: 11%;
            height: 64%;
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
    .title-box {
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    }
       .title-box h1{
       font-size: 33px
    }
        #close-icon-x{
         display: flex;
    justify-content: flex-end;
    margin: 0 5px 10px 0;
    }
       .your-account {
        margin-top: -40px;
    }
    .profile-grid{
         display: grid;
        grid-template-columns: repeat(3, 1fr); 
        gap: 20px; 
    }
        .btn-text-box p {
            font-size: 20px;
    }
    #icon-size{
        font-size: 25px;
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
    /*background: #222;*/
    }
    .copy {
        font-size: 20px;
    }
    .profile-dashboard{
         grid-column: span 2; 
    }
       .profile-container {
            padding-top: 11%;
    }
}

</style>
<style>
    a {
        text-decoration: none;
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
        /*padding: 20px 0;*/
        margin: auto;
    }

.row-bg {
    width: 100%;
    display: flex;
    border-radius: 5px;
    background: whitesmoke;
    padding: 10px 20px;
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
          font-size: 20px;
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
        background-color: rgba(70, 175, 180, 0.1);
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-circle {
        border-color: #46AFB4;
        background-color: #46AFB4;
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-circle .radio-circle-inner {
        display: block;
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-text {
        color: #212121;
    }

    .booking-btn-container {
        margin: auto;
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        margin-bottom: 10%;
    }

    .book-now {
        width: 100%;
        height: 45px;
        font-size: 20px;
        font-weight: 500;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 5px;
        margin-top: 0;
        border-style: none;
    }

    /* ------------------------------ */




    .radio-circle {
    width: 30px;
    height: 30px;
    border: 2px solid black;
    border-radius: 50%;
    transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
    display: flex;
    justify-content: center;
    align-items: center;
}
    

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Big Box */
        .big-box {
           padding: 50px 30px 0 30px;
            width: 90%;
             grid-column: span 2; 
        }
        /* Media Queries */
@media screen and (max-width: 1024px) {
    /* For tablet screens */
    .big-box {
        /*width: 60%;*/
         grid-column: span 2; 
    }
}

@media screen and (max-width: 768px) {
    /* For phone screens */
    .big-box {
        width: 90%;
         grid-column: span 2; 
    }
}

@media screen and (max-width: 480px) {
    /* For smaller phones, if needed */
    .big-box {
        width: 100%;
         grid-column: span 2; 
    }
}
        /* Navigation */
        nav {
                background: whitesmoke;
                 border-radius: 15px;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        
        .header2 {
            margin-top: 0;
        }
        
    .header-one {
    color: black;
    font-size: 42px;
        margin: 30px 0;
        
        /* Profile Dashboard */
        .profile-dashboard {
            padding: 20px;
        }
        
        /* Custom Radio */
        .custom-radio {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        
        .radio-label {
            display: block;
            margin-bottom: 10px;
            cursor: pointer;
        }
        
.row-bg {
    width: 100%;
    display: flex;
    border-radius: 5px;
    background: whitesmoke;
    padding: 10px 20px;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
    margin: auto;
}
        
        .language-icon {
            width: 24px;
            height: 24px;
        }
        
        .radio-circle {
            border: 2px solid #333;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            margin-left: auto;
        }
        
        .radio-circle-inner {
            background-color: #333;
            border-radius: 50%;
            width: 10px;
            height: 10px;
            margin: 4px;
        }

        
        /* Booking Button Container */
        .booking-btn-container {
            background-color: #333;
            text-align: center;
            padding: 10px;
        }
        
        .book-now {
            background-color: #fff;
            color: #333;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 20px;
            border-radius: 5px;
        }



</style>
<body>

	
	 	<div class="profile-grid">
            <?php include 'profile-details.php'?>
                 <div class="big-box">
                     <div id="close-icon-x">
                         <svg clip-rule="evenodd" 
                    style="width:60px; height:60px; "
                    fill-rule="evenodd" stroke-linejoin="round"   fill: "rgba(0, 0, 0, 0.8)"  stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" fill-rule="nonzero"  fill="#00000096""/></svg>
                    </div>
                     <section class="profile-dashboard">
    
            <div class="custom-radio">
    
                <a href="https://aestheticlinks.com/app/views/landing-page.blade-en.php">
                    <label class="radio-label" for="radio-1">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/united-kingdom.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                English
                            </span>
                            <div class="radio-circle">
                                <div class="radio-circle-inner"></div>
                            </div>
    
                        </div>
                    </label>
                </a>
                <hr>
                
                <a href="https://ar.aestheticlinks.com/app/views/landing-page.blade.php">
                    <label class="radio-label" for="radio-3">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/arabic.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                Arabic
                            </span>
                            <div class="radio-circle">
                                <div class="radio-circle-inner"></div>
                            </div>
    
                        </div>
    
                    </label>
                </a>
                  <hr>
                <a href="https://fr.aestheticlinks.com/app/views/landing-page.blade.php">
                    <label class="radio-label" for="radio-3">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/france.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                French
                            </span>
                            <div class="radio-circle">
                                <div class="radio-circle-inner"></div>
                            </div>
    
                        </div>
    
                    </label>
                </a>
      <hr>
                <a href="https://de.aestheticlinks.com/app/views/landing-page.blade.php">
                    <label class="radio-label" for="radio-2">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/germany.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                German
                            </span>
                            <div class="radio-circle">
                                <div class="radio-circle-inner"></div>
                            </div>
    
                        </div>
    
                    </label>
                </a>
      <hr>
                
    
                <a href="https://es.aestheticlinks.com/app/views/landing-page.blade.php">
    
                    <label class="radio-label" for="radio-4">
                        <div class="row-bg">
                            <span class="radio-text">
                                <div class="language-icon-box">
                                    <img src="assets/images/language-flag/spain.svg" class="language-icon">
                                </div> &nbsp;&nbsp;
                                Spanish
                            </span>
                            <div class="radio-circle">
                                <div class="radio-circle-inner"></div>
                            </div>
    
                        </div>
    
                    </label>
                </a>
      <hr>
            </div>
    
        </section>
                        <div
                        style="   
                        position: relative;
                        margin: 30px 0; 
                        height:auto; 
                        width:100%; 
                        display: grid; 
                        grid-template-columns: 
                        repeat(1, 1fr);"
                    >
                            <div class="booking-btn-container">
                                <div style="margin: auto; width: 100%;">
                                    <a href="discover-page.blade.php" style="text-decoration: none;"><button class="book-now"
                                            style="font-family: 'Poppins', sans-serif;">Go Back</button></a>
                                </div>
                            </div>
                        </div>
                </div>
   
   
   
           
        </div>
    

</body>
</html>