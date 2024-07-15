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
	
?>	
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Discover Page</title>

    <link rel="stylesheet" href="assets/styles/swiper-bundle.min.css">
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>

<style>

    @font-face {
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
        url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }
    
    .clinic-text-location {
        position: absolute;
        width: 93%; 
        height: auto; 
        margin-top: 18vw; 
        margin-left: 2.5%; 
        display: flex; 
        align-items: center;
    }
    
    .clinic-text-location h1 {
        width: 100%; 
        margin: 0; 
        color: #fff; 
        font-size: 38px; 
        text-align: left;
        margin-top: 45px; 
        font-weight: 500;
    }
    
    .clinic-text-service {
        position: absolute;
        width: 93%; 
        height: auto; 
        margin-top: 18vw; 
        margin-left: 2.5%; 
        display: flex; 
        align-items: center;
    }
    
    .clinic-text-service h1 {
        width: 100%; 
        margin: 0; 
        color: #fff; 
        font-size: 38px; 
        text-align: right;
        margin-top: 45px; 
        font-weight: 500;
    }

    
    /* --------------------------------menu------------------------------------- */
    
    .spacer {
        width: 100%; 
        height: 20vw; 
    }

    /* ------------------------------------------------------------------------- */

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
		line-height: 0.9;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;
    }
    
    .paragraph-1 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 32px; 
        font-weight: 600;
    }
    
    .paragraph-2 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 32px;
    }

    .referral {
        display: flex;
        justify-content: center;
        width: 100%;
        height: auto;
        margin-top: 5%;
    }

    .referral-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 10px;
        width: 90%;
        height: auto;
        border-radius: 25px;
        background-color: #0CB4BF;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    video {
        z-index: -1;

    }

    #myVideo {
      position: relative;
      object-fit: cover;
      width: 100%;
      height: 100%;
      border-radius: 25px;
    }

/* ---------------------------clinic slider--------------------------- */

.wrapper {
    margin: auto;
    width: 100%;
    height: max-content;
    display: flex;
    overflow-x: auto;
}

.wrapper::-webkit-scrollbar{
    width: 0;
}

.wrapper .item {
    min-width: 95%;
    height: 475px;
    text-align: center;
    margin-right: 25px;
}

/* -------------------------product slider-------------------------- */

/*===Product-slider=================================*/
.product-slider{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    width: 100%;
    margin: auto;
}
.slider-container{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}
.product-slider-heading{
    font-size: 28px;
    text-transform: uppercase;
    font-family: 'Open Sans',sans-serif;
    color: #313131;
}
.product-box{
    width: 95%;
    padding: 0;
    background-color: transparent;
    position: relative;

}
 
.product-img-container{
    width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    overflow: hidden;
    
}
.product-img a,
.product-img{
    width: 100%;
    height:375px;
    object-fit: cover;
    border-radius: 25px;
}
 
.product-img a img{
    width: 100%;
    height: 100%;
    object-fit:cover;
    object-position: center;
    border-radius: 25px;
}
 
.product-box-text{
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    font-family: 'Poppins', sans-serif;
 }

.product-title{
    font-size: 28px;
    color: #444444;
    font-weight: 500;
    text-decoration: none;
}

.referral-container h1 {
    width: 90%; 
    margin: 0; 
    font-size: 38px; 
    color: #fff;
}

.referral-container p {
    width: 90%; 
    margin: 0; 
    font-size: 28px; 
    color: #fff;
}

.referral-btn button {
    padding: 15px; 
    padding-left: 30px; 
    padding-right: 30px; 
    font-family: 'Poppins', sans-serif; 
    font-size: 28px; color: #888888; 
    border-style: none; 
    border-radius: 15px;
}

.referral-btn-container {
    width: 90%; 
    height: auto; 
    margin: auto; 
    display: grid;  
    grid-template-columns: repeat(2, max-content); 
    column-gap: 20px; 
    margin-top: 30px;
}

.yt-container {
    margin: auto; 
    width: 90%; 
    height: 26vh; 
    border-radius: 25px;
}

.yt-container iframe {
    border-radius: 25px;
}

.section-title-container {
    display: flex; 
    justify-content: space-between; 
    margin-bottom: 5%;
}

.section-title-container h1 {
    margin: 0; 
    font-size: 34px;
}

.section-title-container button {
    font-family: 'Poppins', sans-serif; 
    margin: 0; 
    padding: 0; 
    color: #000; 
    font-size: 38px; 
    font-weight: 400; 
    background-color: transparent; 
    border-style: none;
}

    .section-title-container button i {
        color: #000; 
        font-size: 28px;
    }

    .img-container-item {
        width: 100%; 
        height: 100%; 
        position: relative;
    }
    
    .img-container-item img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        border-radius: 25px;
    }
    
    .content-box-item {
        margin: auto; 
        width: 95%; 
        height: 50px; 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        margin-top: 5px;
    }
    
    .content-box-item p {
        width: max-content; 
        height: auto; 
        margin: 0; 
        font-size: 28px; 
        color: #444444;
    }
    
    .content-box-item span {
        width: max-content; 
        height: auto; 
        margin: 0; 
        font-size: 28px; 
        color: #444444;
    }
    
    .clinic-logo-box {
        position: absolute; 
        width: 100px; 
        height: 100px; 
        border-radius: 15px; 
        right: 7%; 
        top: 7%;
    }
    
    .clinic-logo-box img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        border-radius: 15px;
    }
    
    .price-buy span {
        width: max-content; 
        height: auto; 
        margin: 0; 
        font-size: 28px; 
        color: #444444;
    }
    
    
   @media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  {
       
       .clinic-text-location {
            position: absolute;
            width: 93%; 
            height: auto; 
            margin-top: 30vw; 
            margin-left: 4%; 
            display: flex; 
            align-items: center;
        }
        
        .clinic-text-location h1 {
            width: 100%; 
            margin: 0; 
            color: #fff; 
            font-size: 16pt; 
            text-align: left;
            margin-top: 0; 
            font-weight: 550;
        }
        
        .clinic-text-service {
            position: absolute;
            width: 93%; 
            height: auto; 
            margin-top: 30vw; 
            margin-left: 4%; 
            display: flex; 
            align-items: center;
        }
        
        .clinic-text-service h1 {
            width: 100%; 
            margin: 0; 
            color: #fff; 
            font-size: 16pt; 
            text-align: right;
            margin-top: 0; 
            font-weight: 550;
        }

       
       .spacer {
            width: 100%; 
            height: 9vw; 
        }
        
        .product-slider-heading{
            text-align: center;
            font-size: 1.3rem;
        }
        .product-slider{
            width: 100%;
        }
        
        
        .product-img a img{
            animation:none;
        }
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        .paragraph-1 {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt; 
            font-weight: 550;
        }
        
        .paragraph-2 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }
        
        /*----------------------------------------------*/
        
        .referral {
            display: flex;
            justify-content: center;
            width: 100%;
            height: auto;
            margin-top: 5%;
        }
    
        .referral-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
            width: 90%;
            height: auto;
            border-radius: 10px;
            background-color: #0CB4BF;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        
        .referral-container h1 {
            width: 100%; 
            margin: 0; 
            font-size: 18px; 
            color: #fff;
        }
    
        .referral-container p {
            width: 90%; 
            margin: 0; 
            font-size: 14px; 
            color: #fff;
        }
        
        .referral-btn button {
            padding: 10px; 
            padding-left: 15px; 
            padding-right: 15px; 
            font-family: 'Poppins', sans-serif; 
            font-size: 14px; color: #888888; 
            border-style: none; 
            border-radius: 10px;
        }
        
        .referral-btn-container {
            width: 90%; 
            height: auto; 
            margin: auto; 
            display: grid;  
            grid-template-columns: repeat(2, max-content); 
            column-gap: 10px; 
            margin-top: 10px;
        }
        
        .yt-container {
            margin: auto; 
            width: 90%; 
            height: 28vh; 
            border-radius: 15px;
        }
    
        .yt-container iframe {
            border-radius: 10px;
        }
        
        .section-title-container {
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 5%;
        }
    
        .section-title-container h1 {
            margin: 0; 
            font-size: 16px;
        }
    
        .section-title-container button {
            font-family: 'Poppins', sans-serif; 
            margin: 0; 
            padding: 0; 
            color: #000; 
            font-size: 14px; 
            font-weight: 400; 
            background-color: transparent; 
            border-style: none;
        }
        
        .section-title-container button i {
            color: #000; 
            font-size: 14px;
        }
        
        .wrapper .item {
            min-width: 95%;
            height: 225px;
            text-align: center;
            margin-right: 25px;
        }
        
        .img-container-item {
            width: 100%; 
            height: 100%; 
            position: relative;
        }
        
        .img-container-item {
            width: 100%; 
            height: 100%; 
            position: relative;
        }
        
        .img-container-item img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 10px;
        }
        
        .content-box-item {
            margin: auto; 
            width: 95%; 
            height: max-content; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-top: 5px;
        }
        
        .content-box-item p {
            width: max-content; 
            height: auto; 
            margin: 0; 
            font-size: 14px; 
            color: #444444;
        }
        
        .content-box-item span {
            width: max-content; 
            height: auto; 
            margin: 0; 
            font-size: 14px; 
            color: #444444;
        }
        
        
        .clinic-logo-box {
            position: absolute; 
            width: 30pt; 
            height: 30pt; 
            border-radius: 5px; 
            right: 7%; 
            top: 7%;
        }
        
        .clinic-logo-box img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 5px;
        }
        
        .product-img a,
        .product-img {
            width: 100%;
            height:200px;
            object-fit: cover;
            
        }
        
        .product-img img {
            border-radius: 5pt !important;
        }
        
        .product-title{
            font-size: 16px;
            color: #444444;
            font-weight: 500;
            text-decoration: none;
        }
        
        .price-buy span {
            width: max-content; 
            height: auto; 
            margin: 0; 
            font-size: 16px; 
            color: #444444;
        }
    }
    
    
    @media only screen and (max-device-width: 767px) {
        
        .clinic-text-location {
            position: absolute;
            width: 93%; 
            height: auto; 
            margin-top: 39vw; 
            margin-left: 4%; 
            display: flex; 
            align-items: center;
        }
        
        .clinic-text-location h1 {
            width: 100%; 
            margin: 0; 
            color: #fff; 
            font-size: 12pt; 
            text-align: left;
            margin-top: 0; 
            font-weight: 550;
        }
        
        .clinic-text-service {
            position: absolute;
            width: 93%; 
            height: auto; 
            margin-top: 45vw;
            margin-left: 4%; 
            display: flex; 
            align-items: center;
        }
        
        .clinic-text-service h1 {
            width: 100%; 
            margin: 0; 
            color: #fff; 
            font-size: 12pt; 
            text-align: left;
            margin-top: 0; 
            font-weight: 550;
        }
        
        .product-slider-heading{
            text-align: center;
            font-size: 1.3rem;
        }
        
        .product-slider{
            width: 100%;
        }
        
        .product-img a img{
            animation:none;
        }
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        .paragraph-1 {
            width: 100%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt; 
            font-weight: 550;
        }
        
        .paragraph-2 {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }
        
        /*----------------------------------------------*/
        
        .referral {
            display: flex;
            justify-content: center;
            width: 100%;
            height: auto;
            margin-top: 5%;
        }
    
        .referral-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
            width: 90%;
            height: auto;
            border-radius: 10px;
            background-color: #0CB4BF;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        
        .referral-container h1 {
            width: 100%; 
            margin: 0; 
            font-size: 18px; 
            color: #fff;
        }
    
        .referral-container p {
            width: 90%; 
            margin: 0; 
            font-size: 14px; 
            color: #fff;
        }
        
        .referral-btn button {
            padding: 10px; 
            padding-left: 15px; 
            padding-right: 15px; 
            font-family: 'Poppins', sans-serif; 
            font-size: 14px; color: #888888; 
            border-style: none; 
            border-radius: 10px;
        }
        
        .referral-btn-container {
            width: 90%; 
            height: auto; 
            margin: auto; 
            display: grid;  
            grid-template-columns: repeat(2, max-content); 
            column-gap: 10px; 
            margin-top: 10px;
        }
        
        .yt-container {
            margin: auto; 
            width: 90%; 
            height: 28vh; 
            border-radius: 15px;
        }
    
        .yt-container iframe {
            border-radius: 10px;
        }
        
        .section-title-container {
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 5%;
        }
    
        .section-title-container h1 {
            margin: 0; 
            font-size: 16px;
        }
    
        .section-title-container button {
            font-family: 'Poppins', sans-serif; 
            margin: 0; 
            padding: 0; 
            color: #000; 
            font-size: 14px; 
            font-weight: 400; 
            background-color: transparent; 
            border-style: none;
        }
        
        .section-title-container button i {
            color: #000; 
            font-size: 14px;
        }
        
        .wrapper .item {
            min-width: 95%;
            height: 225px;
            text-align: center;
            margin-right: 25px;
        }
        
        .img-container-item {
            width: 100%; 
            height: 100%; 
            position: relative;
        }
        
        .img-container-item {
            width: 100%; 
            height: 100%; 
            position: relative;
        }
        
        .img-container-item img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 10px;
        }
        
        .content-box-item {
            margin: auto; 
            width: 95%; 
            height: max-content; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-top: 5px;
        }
        
        .content-box-item p {
            width: max-content; 
            height: auto; 
            margin: 0; 
            font-size: 14px; 
            color: #444444;
        }
        
        .content-box-item span {
            width: max-content; 
            height: auto; 
            margin: 0; 
            font-size: 14px; 
            color: #444444;
        }
        
        
        .clinic-logo-box {
            position: absolute; 
            width: 30pt; 
            height: 30pt; 
            border-radius: 5px; 
            right: 7%; 
            top: 7%;
        }
        
        .clinic-logo-box img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 5px;
        }
        
        .product-img a,
        .product-img {
            width: 100%;
            height:200px;
            object-fit: cover;
            
        }
        
        .product-img img {
            border-radius: 5pt !important;
        }
        
        .product-title{
            font-size: 16px;
            color: #444444;
            font-weight: 500;
            text-decoration: none;
        }
        
        .price-buy span {
            width: max-content; 
            height: auto; 
            margin: 0; 
            font-size: 16px; 
            color: #444444;
        }

}
    
</style>



<body>
	   
	   <?php include 'nav.php'; ?>
	   
	   

<?php require_once 'server.blade.php';?>
	   
       <!---- Menu Start --->
	
		<?php include 'menu.php'; ?>
	
	
	   <!---- Menu End ----->
            
        <!-- ----------------------------menu modal end------------------------ -->

    <section class="spacer"></section>
      
    <section class="referral">
        <div class="referral-container">
            <div style="width: 90%; height: auto; margin: auto;">
                <h1>Unlock Extra Discounts!</h1>
            </div>
            <div style="width: 90%; height: auto; margin: auto; line-height: 1.2;">
                <p>Share our app with your friends and enjoy an additional 5% off on any service.</p>
            </div>
            <div class="referral-btn-container">
                <div class="referral-btn" syle="width: 100%;">
                    <a href="referral-test.php?profilelevel=<?=$profilelevel?>">
                        <button><i class="fa-solid fa-share-nodes"></i> my referrals</button>
                    </a>    
                </div>
                <!--<div class="referral-btn">
                    <p style="display:none;">Join me and Download the Aesthetic Links App. My Referral Code is: <?=$profilelevel?></p>
                    <button id="share-button"><i class="fa-solid fa-link"></i> share my referral code</button>
                </div>-->
            </div>

        </div>

    </section>

    <!-- ----------------------------video start------------------------ -->

    <section style="margin: auto; width: 100%; margin-top: 5%;">
        <div class="yt-container">
            <iframe src="https://www.youtube.com/embed/6LCpG2YPUw8?rel=0&amp;autoplay=1&mute=1&loop=1" width="100%" height="90%" frameborder="0"></iframe>
        </div>
    </section>

    <!-- ----------------------------video end------------------------ -->

    <!-- ----------------------------------------- slider top rated clinics------------------------------------------- -->

    <section style="margin: auto; width: 100%; margin-top: 5%;">
        <div style="margin: auto; width: 90%; height: auto;">
            <div class="section-title-container">
                <h1>Browse Top Rated Clinics</h1>
                
            </div>
            
            <div class="wrapper">
				
				<!----- Call Data for Clinics ---->
	<?php
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	
	// Define your SQL query to select all projects
	$stmt = "SELECT * FROM clinics WHERE approval = 'approved' AND ccountry ='UAE'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);
	
	
	
	
	?>	
			
			
            <div class="wrapper">
				
						<?php
						
						while ($row = $result->fetch_assoc()) {

			 
			echo '			
				
				
				
				
				
                <div class="item">
                    <div style="width: 100%; height: 80%;">
                        <div class="img-container-item">
                            <div class="clinic-text-location" style="z-index: 1;">
                                <h1 style="margin-top:-30px;">' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
                            </div>
                            <a href="clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] . '">
                            <div class="overlay-black" style="z-index: 0;">
                                <img src="assets/images/clinic-images/' . $row['cunique'] . '.png">
                            </div>
                            </a>
                            
                            
                        </div>
                    </div>
                    <div class="content-box-item">
                        <p>' . $row['cname'] . '</p>
                        <span>' . $row['rating'] . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
                    </div>
                </div>'
                
                ; } ?> 
                
                <!---->
                
                

            </div>        
        </div>
        


    </section>

    <!-- ----------------------------------------- slider top rated clinics end------------------------------------------- -->

    <section style="margin: auto; width: 100%;">
        <div style="margin: auto; width: 90%; height: auto;">
            <div class="section-title-container">
                <h1>Top Rated Face Treatments</h1>
                
            </div>

            <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

            <section class="product-slider">
    
                <!--==heading====================-->
                <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    
		
			
					<?php
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	
	// Define your SQL query to select all projects
	$stmt = "SELECT * FROM services WHERE approval = 'approved' AND scat ='Face' AND scountry ='UAE'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);
	
	
	
	
	?>	
		
	<?php
						
						while ($row = $result->fetch_assoc()) {

			 
			echo '
					
					
					<!--1================================-->
                    <div class="swiper-slide">
                    <!--box----------------------->
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                    <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['sname'] . '</h1>
                                </div>
                                
                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                                </div>
                                
                                <!--img=============-->
                                
                                <div class="product-img">
                                    <a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">
                                    <span>NEW' . $row['srating'] . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
                                </div>
                            </div>
                        </div>
                    </div>' ; }?>
                    
					
					
                        
                </div>
                </div>
                </div>
                </section>
                <!--slider-end-------->

                
        </div>
    </section>

    <!-- ------------------------------------------------------------------------- -->


    <section style="margin: auto; width: 100%; margin-top: 5%;">
        <div style="margin: auto; width: 90%; height: auto;">
            <div class="section-title-container">
                <h1>Top Rated Body Treatments</h1>
                
            </div>

            <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

            <section class="product-slider">
    
                <!--==heading====================-->
                <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    
					
						<?php
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	
	// Define your SQL query to select all projects
	$stmt = "SELECT * FROM services WHERE approval = 'approved' AND scat ='Body' AND scountry ='UAE'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);
	
	
	
	
	?>	
		
	<?php
						
						while ($row = $result->fetch_assoc()) {

			 
			echo '
					
					
					<!--1================================-->
                    <div class="swiper-slide">
                    <!--box----------------------->
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                   <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['sname'] . '</h1>
                                </div>
                                
                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" >
                                </div>
                                
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">
                                    <span>NEW' . $row['srating'] . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
                                </div>
                            </div>
                        </div>
                    </div>' ; }?>
					
					
					
					
					
                        
                </div>
                </div>
                </div>
                </section>
                <!--slider-end-------->

                
        </div>
    </section>

    <!-- ------------------------------------------------------------------------- -->

        <!-- ------------------------------------------------------------------------- -->


        <section style="margin: auto; width: 100%; margin-top: 5%; margin-bottom: 10%;">
            <div style="margin: auto; width: 90%; height: auto;">
                <div class="section-title-container">
                    <h1>Top Rated Health & Wellness</h1>
                    
                </div>
    
            <!-- -----------------------------slider Top Rated Face Treatments ------------------------------------------->

            <section class="product-slider">
    
                <!--==heading====================-->
                <div class="slider-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                   
					
					<?php
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	
	// Define your SQL query to select all projects
	$stmt = "SELECT * FROM services WHERE approval = 'approved' AND scat ='Health' AND scountry ='UAE'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);
	
	
	
	
	?>	
		
	<?php
						
						while ($row = $result->fetch_assoc()) {

			 
			echo '
					
					
					<!--1================================-->
                    <div class="swiper-slide">
                    <!--box----------------------->
                        <div class="product-box">

                            <!--img-container****************-->
                            <div class="product-img-container">
                                <div class="clinic-text-service" style="z-index: 1;">
                                   <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['sname'] . '</h1>
                                </div>
                                
                                <div class="clinic-logo-box" style="z-index: 1;">
                                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" >
                                </div>
                                
                                <!--img=============-->
                                <div class="product-img">
                                    <a href="book.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                        <div class="overlay-black" style="z-index: 0;">
                                            <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--text***************************-->
                            <div class="product-box-text">
                                <div class="price-buy">
                                    <span>NEW' . $row['srating'] . ' <i class="fa-solid fa-star" style="color: #0CB4BF;"></i> <u>0 reviews</u></span>
                                </div>
                            </div>
                        </div>
                    </div>' ; }?>
                        
                </div>
                </div>
                </div>
                </section>
                <!--slider-end-------->
    
                    
            </div>
        </section>
    
        <!-- ------------------------------------------------------------------------- -->


    

















    <script>
        // Get the modal
        var modal = document.getElementById("menuModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("menuBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closeMenu")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>

        <!-- slider js -->

        <script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>

     <script>
        /*Initialize Swiper*/
       var swiper = new Swiper(".mySwiper", {
         slidesPerView: 1,
         spaceBetween: 10,
         pagination: {
           el: ".swiper-pagination",
           clickable: true,
         },
         autoplay: {
         delay: 6000,
         disableOnInteraction: false,
       },
         breakpoints: {
           360: {
             slidesPerView: 1.5,
             spaceBetween: 20,
           },
           540: {
             slidesPerView: 2,
             spaceBetween: 20,
           },
           1200: {
             slidesPerView: 4,
             spaceBetween: 40,
           },
           1024: {
             slidesPerView: 3,
             spaceBetween: 20,
           },
         },
       });
    </script>
    
    <?php
	
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
	// In this case we can use the account ID to get the account info.
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
	$stmt->fetch();
	$stmt->close();
	
?>	
    
    <!--- Sharing Referral Code -->
    <script>
    const shareButton = document.getElementById('share-button');
    const textToShare = "Join me and Download the Aesthetic Links App! Get a 5% discount on your first booking with my Referral Code: *<?=$profilelevel?>*. Download the App on https://apps.apple.com/app/id6477182130";

    shareButton.addEventListener('click', () => {
      if (navigator.share) {
        navigator.share({
          title: 'Share Text',
          text: textToShare
        })
          .then(() => console.log('Text shared successfully!'))
          .catch(error => console.error('Sharing failed:', error));
      } else {
        console.warn('Navigator.share API is not supported by your browser.');
        // Implement an alternative sharing method if needed
      }
    });
  </script>
    
</body>
</html>