<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...

?>
<?php
	
	// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.blade.php');
	exit;
}
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
    margin-top: 25px;
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
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
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
    
    /*----------------------------------------------------*/
    
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
    
    .service-img-container img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        border-radius: 25px;
    }
    
    .service-details-list {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 100%;
        height: max-content;
        margin: auto;
    }
    
    .service-item-title {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 34px;
    }
    
    .service-location {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 28px; 
        color: #444444;
    }
    
    .service-gender {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 28px; 
        color: #444444;
    }
    
    .service-rating {
        margin: 0; 
        width: 90%; 
        height: auto; 
        padding: 0; 
        font-size: 24px;
    }
    
    #service-star {
        font-size: 24px; 
        color: #0CB4BF;
    }
    
    .service-price {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 38px; 
        text-align: right; 
        font-weight: 600;
    }
    
    /*-------------------------------------------------*/
    
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #fff;
        width: 90%;
        margin: auto;
        padding: 5px;
        border-radius: 10px;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        width: 50%;
        border-radius: 5px;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: rgba(12, 180, 191, 0.8);
        color: #fff;
    }

    /* Style the tab content */
        .tabcontent {
            overflow-wrap: break-word;
        display: none;
        padding: 6px 12px;
        border-top: none;
        width: 90%;
        margin: auto;
    }
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        
        .services-list {
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 20% 60% 20%);
            width: 100%;
            height: auto;
            border-bottom: 1px solid #e3e3e3;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        
        .service-img-container {
            width: 100%;
            height: 125px;
            border-radius: 5px;
        }
        
        .service-img-container img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 5px;
        }
        
        .service-details-list {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: max-content;
            margin: auto;
        }
        
        .service-item-title {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 34px;
        }
        
        .service-location {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 12pt; 
            color: #444444;
        }
        
        .service-gender {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 12pt; 
            color: #444444;
        }
        
        .service-rating {
            margin: 0; 
            width: 90%; 
            height: auto; 
            padding: 0; 
            font-size: 12pt;
        }
        
        #service-star {
            font-size: 10pt; 
            color: #0CB4BF;
        }
        
        .service-price {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 14pt; 
            text-align: right; 
            font-weight: 600;
        }
        
        .services-list {
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 20% 60% 20%);
            width: 100%;
            height: auto;
            border-bottom: 1px solid #e3e3e3;
            padding-top: 20px;
            padding-bottom: 20px;
        }
            
        /*--------------------------*/
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
        
        /*---------------------------------------*/
        
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #fff;
            width: 90%;
            margin: auto;
            padding: 5px;
            border-radius: 10px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            width: 50%;
            border-radius: 5px;
        }
    
        /* Create an active/current tablink class */
        .tab button.active {
            background-color: rgba(12, 180, 191, 0.8);
            color: #fff;
        }
    
        /* Style the tab content */
            .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: none;
            width: 90%;
            margin: auto;
        }
    }

    @media only screen and (max-device-width: 767px) {
        
        .services-list {
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 20% 60% 20%);
            width: 100%;
            height: auto;
            border-bottom: 1px solid #e3e3e3;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        
        .service-img-container {
            width: 100%;
            height: 75px;
            border-radius: 5px;
        }
        
        .service-img-container img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 5px;
        }
        
        .service-details-list {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 100%;
            height: max-content;
            margin: auto;
        }
        
        .service-item-title {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt;
        }
        
        .service-location {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt; 
            color: #444444;
        }
        
        .service-gender {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt; 
            color: #444444;
        }
        
        .service-rating {
            margin: 0; 
            width: 90%; 
            height: auto; 
            padding: 0; 
            font-size: 10pt;
        }
        
        #service-star {
            font-size: 8pt; 
            color: #0CB4BF;
        }
        
        .service-price {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt; 
            text-align: right; 
            font-weight: 600;
        }
        
        /*----------------------------------------------*/
        
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
        
        .btn-img-box i {
            font-size: 6pt;
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
        
        /*----------------------------------------------*/
        
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #fff;
            width: 90%;
            margin: auto;
            padding: 5px;
            border-radius: 10px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 12px 16px;
            transition: 0.3s;
            font-size: 17px;
            width: 50%;
            border-radius: 5px;
        }
    
        /* Create an active/current tablink class */
        .tab button.active {
            background-color: rgba(12, 180, 191, 0.8);
            color: #fff;
        }
    
        /* Style the tab content */
            .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: none;
            width: 90%;
            margin: auto;
        }
    
    }
    
    
/* phones */
@media only screen and (max-width: 767px) {
    #logo {
        display: none;
    }
        .profile-details-Two{
             display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            gap: 10px;
            margin-top: 50px;
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
    .your-account {
        margin-top: 26px;
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
    /*background: #222;*/
    }
    .profile-details-Two{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
         grid-column: span 2; 
         height: auto; 
        padding-top: 3%;
        padding-bottom: 5%;
        flex-direction: column;
    }
    .tab {
        margin: 40px;
    }
    .tabcontent {
     max-width: 25rem;
    overflow-wrap: break-word;
      margin:0;
    }

    .icon-tab-box{
        display: flex;
    align-content: center;
    align-items: center;
    width: 100%;
    margin: 0  30px 0 0;
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
        margin-top: 70px;
    }
    .profile-grid{
         display: grid;
        grid-template-columns: repeat(3, 1fr); 
        gap: 20px; 
    }
        .btn-text-box p {
            font-size: 15px;
    }
    #icon-size{
        font-size: 30px;
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
    .profile-details-Two{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        grid-column: span 2; 
         height: auto; 
        padding-top: 3%;
        padding-bottom: 5%;
        flex-direction: column;
    }
    .tab {
        margin: 40px;
    }
        .tabcontent {
        max-width: 40rem;
        overflow-wrap: break-word;
        margin:0;
    }

    .icon-tab-box{
        display: flex;
    align-content: center;
    align-items: center;
    width: 100%;
    margin: 0 30px 0 0;
    }
    
    
}
    

</style>
<body>

	
	 	<div class="profile-grid">
	 	    
               <?php include 'profile-details.php'?>

                <div class="profile-details-Two">
                    <div class="icon-tab-box">
                        <div class="tab">
                            <button class="tablinks active" onclick="openCity(event, 'Scheduled')">Scheduled</button>
                            <button class="tablinks" onclick="openCity(event, 'History')">History</button>
                            
                        </div>
                         <div id="close-icon-x">
                             <svg clip-rule="evenodd" 
                    style="width:60px; height:60px; "
                    fill-rule="evenodd" stroke-linejoin="round"   fill: "rgba(0, 0, 0, 0.8)"  stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" fill-rule="nonzero"  fill="#00000096""/></svg>
                    </div>
                        
                    </div>
                        <div id="Scheduled" class="tabcontent" style="display: block;">
                            <?php
                                // Get project ID from URL
                                $userId = isset($_GET['profilelevel']) ? mysqli_real_escape_string($con, $_GET['profilelevel']) : null;
                                
                                // Validate and query project details
                                if ($userId) {
                                  $sql = "SELECT * FROM appointments WHERE profilelevel = ? AND status = 'pending'";
                                  $stmt = $con->prepare($sql);
                                  $stmt->bind_param("s", $userId);
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                }
                                ?>
                                
                                <?php
                                
                                if ($result->num_rows > 0) {					
                                        while ($row = $result->fetch_assoc()) {
                                            
                                ?>
                                
                                <?php
                                        echo '
                                        <div class="button-your-account">
                                        
                                        <a href="" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000; -webkit-tap-highlight-color: transparent; ">
                                            
                                            <div  class="item" >
                                                    <a class="div" id="div" href="" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                                                    
                                                        <div class="services-list">
                                                            
                                                            <div class="service-img-container" style="max-height:120px; max-width: 120px; margin-left: -75px; margin-right: 0px;">
                                                                <a href="appointment-details-page.blade.php?id='.$row['id'].'" style="max-height:120px; max-width: 120px;">
                                                                <img src="assets/images/services/' . $row['sunique'] . '.png">
                                                                </a>
                                                            </div>
                                                            
                                                            
                                                            <div class="service-details-list" style="margin-left: -170px;">
                                                            <a href="appointment-details-page.blade.php?id='.$row['id'].'" style="text-decoration: none; color: #0C1E36;">
                    
                                                                <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                                                    <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">' . $row['cname'] . '</p>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">Service type: Consultation</p>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">Duration: Varies</p>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">' . $row['date'] . '</p>
                                                                </div>
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">' . $row['time'] . '</p>
                                                                </div>
                                                                </a>
                                                                <div style="width: 90%; margin: auto;">
                                                                
                                                                </div>
                                                                
                                                            </div>
                                                            
                            
                                                        </div>
                                                    </a>
                            				    </div>
                                            </a>
                            
                                            
                            
                            					
                                        </div>'; } ?>
                                        <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
                                        <?php
                                } else { echo '<p>No Appointments to display at the moment.</p>'; } ?>
                        </div>
                        <div id="History" class="tabcontent">
                            <?php
                                // Get project ID from URL
                                $userId = isset($_GET['profilelevel']) ? mysqli_real_escape_string($con, $_GET['profilelevel']) : null;
                                
                                // Validate and query project details
                                if ($userId) {
                                  $sql = "SELECT * FROM appointments WHERE profilelevel = ? AND status = 'approved'";
                                  $stmt = $con->prepare($sql);
                                  $stmt->bind_param("s", $userId);
                                  $stmt->execute();
                                  $result = $stmt->get_result();
                                }
                                ?>
                                
                                <?php
                                
                                if ($result->num_rows > 0) {					
                                        while ($row = $result->fetch_assoc()) {
                                            
                                ?>
                                
                                <?php
                                        echo '
                                        <div class="button-your-account">
                                        
                                        <a href="" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000; -webkit-tap-highlight-color: transparent; ">
                                            
                                            <div class="item">
                                                    <a class="div" id="div" href="" style=" width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                                                    
                                                        <div class="services-list">
                                                            <div class="service-img-container" style="max-height:120px; max-width: 120px; margin-left: -75px; margin-right: 0px;">
                                                                <a href="appointment-details-page.blade.php?id='.$row['id'].'" style="max-height:120px; max-width: 120px;">
                                                                <img src="assets/images/services/' . $row['id'] . '.png">
                                                                </a>
                                                            </div>
                                                            
                                                            
                                                            <div class="service-details-list" style="margin-left: -170px;">
                                                            <a href="appointment-details-page.blade.php?id='.$row['id'].'" style="text-decoration: none; color: #0C1E36;">
                                                                <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 2px;">
                                                                    <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">' . $row['cname'] . '</p>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">Service type: Consultation</p>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">Duration: Varies</p>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">' . $row['date'] . '</p>
                                                                </div>
                                                                
                                                                <div style="width: 90%; margin: auto;">
                                                                    <p class="service-location">' . $row['time'] . '</p>
                                                                </div>
                                                                </a>
                                                                <div style="width: 90%; margin: auto;">
                                                                <p class="service-location"><a href="review-form.blade.php?cname=' . $row['cname'] . '&sname=' . $row['sname'] . '&id=' . $row['id'] . '" style="text-decoration: none; color: #0C1E36; font-weight: 550;"><i class="fa-solid fa-pen-to-square" style="font-size: 12px;"></i> &nbsp;Leave a Review</a></p>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                    </a>
                            				    </div>
                                            </a>
                            
                                            
                            
                            					
                                        </div>'; } ?>
                                        <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
                                        <?php
                                } else { echo '<p>No Appointments to display at the moment.</p>'; } ?>
                        </div>
                </div>
	 	</div>
    
    <script>
        // Function to open a specific tab on page load
        function openDefaultTab() {
          document.getElementById('Scheduled').style.display = 'block';
          document.querySelector('.tab button.active').click();
        }
        
        // Execute the function on page load
        window.onload = openDefaultTab;
        
        // Function to handle tab switching
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
    </script>
	
	<script>
        function copyText() {
     
            /* Copy text into clipboard */
            navigator.clipboard.writeText
                ("<?=$profilelevel?>");
        }
    </script>

    

</body>
</html>