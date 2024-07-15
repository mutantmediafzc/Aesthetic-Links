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

$filters = isset($_POST['filters']) ? $_POST['filters'] : [];
$gender_preference = isset($_POST['gender_preference']) ? $_POST['gender_preference'] : 'all';


?>	
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Search Result</title>

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
    
    #results {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    grid-gap: 20px;
    justify-items: center;
    align-items: start;
    }
    
    #results .product-box {
        width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    #results .product-box:hover {
        transform: scale(1.05);
    }
    
    #results .product-img-container {
        position: relative;
        width: 100%;
        /*padding-top: 75%; */
        overflow: hidden;
    }
    
    #results .product-img-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    #results .product-box-text {
        padding: 20px;
        text-align: center;
    }

    .pagination {
        margin-bottom: 20px;
    }

    .pagination button {
        background-color: #fff;
        border: 1px solid #ccc;
        color: #333;
        cursor: pointer;
        padding: 5px 10px;
        margin-right: 5px;
        border-radius: 4px;
    }

    .pagination button.active {
        background-color: #0CB4BF;
        color: #fff;
    }
    .clinic-text-location {
        position: absolute;
        /*width: 93%; */
        /*height: auto; */
        /*margin-top: 18vw; */
        /*margin-left: 2.5%; */
        /*display: flex; */
        /*align-items: center;*/
        left: 15px;
        bottom: 15px;
    }
    
    .clinic-text-location h1 {
        width: 100%; 
        margin: 0 !important; 
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
        bottom: 10px;
        left: 10px;
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
    
    .text-section {
        display: none;
    }
    
    @media only screen and (max-device-width: 767px) {
        
        /*.clinic-text-location {*/
        /*    position: absolute;*/
        /*    width: 93%; */
        /*    height: auto; */
        /*    margin-top: 39vw; */
        /*    margin-left: 4%; */
        /*    display: flex; */
        /*    align-items: center;*/
        /*}*/
        
        .clinic-text-location h1 {
            width: 100%; 
            margin: 0; 
            color: #fff; 
            font-size: 12pt; 
            text-align: left;
            margin-top: 0; 
            font-weight: 550;
        }
        
        /*.clinic-text-service {*/
        /*    position: absolute;*/
        /*    width: 93%; */
        /*    height: auto; */
        /*    margin-top: 45vw;*/
        /*    margin-left: 4%; */
        /*    display: flex; */
        /*    align-items: center;*/
        /*}*/
        
        .clinic-text-service h1 {
            /*width: 100%; */
            /*margin: 0; */
            /*color: #fff; */
            /*font-size: 12pt; */
            /*text-align: left;*/
            /*margin-top: 0; */
            font-weight: 550;
            color: #fff;
            font-size: 12pt;
            text-align: left;
            margin: 0 !important;
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

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  {
       
       /*.clinic-text-location {*/
       /*     position: absolute;*/
       /*     width: 93%; */
       /*     height: auto; */
       /*     margin-top: 30vw; */
       /*     margin-left: 4%; */
       /*     display: flex; */
       /*     align-items: center;*/
       /* }*/
        
        .clinic-text-location h1 {
            width: 100%; 
            margin: 0; 
            color: #fff; 
            font-size: 16pt; 
            text-align: left;
            margin-top: 0; 
            font-weight: 550;
        }
        
        /*.clinic-text-service {*/
        /*    position: absolute;*/
        /*    width: 93%; */
        /*    height: auto; */
        /*    margin-top: 30vw; */
        /*    margin-left: 4%; */
        /*    display: flex; */
        /*    align-items: center;*/
        /*}*/
        
        .clinic-text-service h1 {
            /*width: 100%; */
            /*margin: 0; */
            /*color: #fff; */
            /*font-size: 16pt; */
            /*text-align: right;*/
            /*margin-top: 0; */
            font-weight: 550;
            color: #fff;
            font-size: 16pt;
            text-align: left;
            margin: 0 !important;
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
    

    @media only screen and (min-device-width: 1025px) and (max-device-width: 1440px) {
        .spacer {
            height: 150px;
        }

        .text-section {
            display: block;
            margin: auto 0;
        }

        .product-box {
            height: 250px;
            width: 275px;
        }
        
        .clinic-text-service {
            bottom: 15px;
            left: 15px;
        }

        .product-box h1 {
            /*font-size: 16px;*/
            /*font-weight: 400;*/
            /*margin-top: -35% !important;*/
            /*margin-left: 10px;*/
            /*text-align: left;*/
            color: #fff;
            font-size: 16px;
            text-align: left;
            margin: 0 !important;
        }

        .clinic-logo-box {
            height: 60px;
            width: 60px;
        }

        .wrapper {
            justify-content: start;
        }

        .web-nav {
            display: block !important;
        }

        .download-app-container {
            display: flex;
            justify-content: center;
            padding: 50px 0;
        }

        .download-now-txt {
            font-size: 32px;
            font-weight: 600;
            max-width: 300px;
            line-height: 35px;
        }

        .book-appnt-txt {
            font-size: 24px;
            max-width: 400px;
            line-height: 30px;
        }

        .discount-txt {
            font-size: 32px !important;
            width: 500px !important;
        }

        .share-app-txt {
            font-size: 24px !important;
            line-height: 26px;
            margin-top: 10px !important;
            width: 450px !important;
        }

     
        .item {
            min-width: 450px !important;
            max-width: 450px !important;
            height: 300px !important;
        }

        .clinic-city {
            margin-top: -35% !important;
            font-size: 28px !important;
        }

        .wrapper {
            margin: 0 !important;
        }

        .clinic-name {
            font-size: 20px !important;
        }
        
        .clinic-rating {
            font-size: 20px !important;
        }

        .section-title-container {
            margin-bottom: 32px;
            margin-top: 5rem;
        }
    }

 
    
    @media only screen and (min-device-width: 1441px) {
        .spacer {
            height: 100px;
        }

        .text-section {
            display: block;
            margin: auto 0;
        }

        .product-box {
            height: 220px;
            width: 220px;
        }

        .product-box h1 {
            font-size: 16px;
            font-weight: 400;
            /*margin-top: -95% !important;*/
            /*margin-left: 10px;*/
            text-align: left;
            margin: 0 !important;
        }

        .clinic-logo-box {
            height: 60px;
            width: 60px;
        }

        .wrapper {
            justify-content: start;
        }

        .web-nav {
            display: block !important;
        }

        .download-app-container {
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        
        .download-app-container > div:first-child {
            padding-bottom: 50px;
        }

        .app-img {
            width: 450px;
            height: 550px;
        }
        .download-now-txt {
            font-size: 32px;
            font-weight: 600;
            max-width: 300px;
            line-height: 35px;
            font-size: 42px;
            max-width: 50%;
            margin: 0;
            line-height: 60px;
        }

        .book-appnt-txt {
            font-size: 24px;
            max-width: 400px;
            line-height: 30px;
            font-size: 28px;
            max-width: 55%;
            line-height: 40px;
            margin-top: 16px;
        }

        .discount-txt {
            font-size: 32px !important;
            width: 500px !important;
        }

        .share-app-txt {
            font-size: 24px !important;
            line-height: 26px;
            margin-top: 10px !important;
            width: 450px !important;
        }

        .item {
            min-width: 450px !important;
            max-width: 450px !important;
            min-width: 452.5px !important;
            max-width: 452.5px !important;
            
            height: 300px !important;
        }

        .clinic-city {
            margin-top: -85% !important;
            font-size: 28px !important;
        }

        .wrapper {
            margin: 0 !important;
        }

        .clinic-name {
            font-size: 20px !important;
        }
        
        .clinic-rating {
            font-size: 20px !important;
        }
        
        .section-title-container {
            margin-bottom: 32px;
            margin-top: 5rem;
        }
        .section-title-container h1 {
            font-size: 28px;
        }
        .custom-container {
            width: 75% !important;
        }
    }
    
</style>



<body>
<?php include 'web-nav.php'; ?>
<?php include 'nav.php'; ?>
<?php require_once 'server.blade.php';?>
<?php include 'menu.php'; ?>
<?php 
    $searchItem = isset($_GET['search']) ? $_GET['search'] : ''; 
?>
    <section class="spacer"></section>

    <section style="margin: auto; width: 100%; margin-bottom: 5rem">
        <div class="custom-container" style="margin: auto; width: 90%; height: auto;">
            <div class="section-title-container">
                <div style="text-align: center; margin: 20px 0;">
                    <button onclick="seeFilters()" style="padding: 10px 20px; font-size: 15px; background-color: #0CB4BF; color: white; border: none; border-radius: 5px; cursor: pointer;">See Filters</button>
                </div>
                <div style="text-align: center; margin: 20px 0;">
                    <button onclick="goBack()" style="padding: 10px 20px; font-size: 15px; background-color: #0CB4BF; color: white; border: none; border-radius: 5px; cursor: pointer;">Go Back</button>
                </div>
            <?php if (!empty($searchItem)) { ?>
                <h1>Search Results of "<?php echo $searchItem ?>"</h1>
            <?php } ?>
            </div>
	<div id="results">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && ( isset($_POST['filters']) || isset($_POST['gender_preference']) )) {
    if (!isset($_POST['filters'])) {
        $selectedServices = [];
    } else {
        $selectedServices = $_POST['filters'];
    }
    $gender = $_POST['gender_preference'];
    $ctypeConditions = [];

    if ($gender != 'all') {
        if ($gender == 'male') {
            $ctypeConditions[] = "c.ctype IN ('For Male', 'For Male &amp; Female')";
        } elseif ($gender == 'female') {
            $ctypeConditions[] = "c.ctype IN ('For Female', 'For Male &amp; Female')";
        }
    }

    $ctypeCondition = '';

    if (!empty($ctypeConditions)) {
        $ctypeCondition = "AND (" . implode(' OR ', $ctypeConditions) . ")";
    }

    $selectedServicesCondition = '';
    if (!empty($selectedServices)) {
        $selectedServicesCondition = "AND s.subcat IN ('" . implode("', '", $selectedServices) . "')";
    }

    $havingClause = '';
    if (!empty($selectedServices)) {
        $havingClause = "HAVING COUNT(DISTINCT s.subcat) = " . count($selectedServices);
    }

    $stmt = "SELECT c.*, COUNT(r.id) as total_reviews, AVG(r.rating) AS average_rating FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci JOIN services s ON c.cunique = s.cunique WHERE 1=1 AND c.ccountry = 'UAE' $ctypeCondition $selectedServicesCondition AND c.approval = 'approved' AND c.recommended = 1 GROUP BY c.cunique $havingClause";
    $result = $con->query($stmt);

    $results = $result->fetch_all(MYSQLI_ASSOC);
    shuffle($results);

    if (empty($results)) {
        echo '<p>No results found for your search</p>';
    } else {
        foreach ($results as $row) {
            echo '
                    <div class="product-box pagination-results">
                        <div class="product-img-container">

                            <div class="clinic-text-service" style="z-index: 1; display: flex; justify-content: space-between;">
                                <div>
                                    <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
                                    <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['cname'] . '</h1>
                                </div>
                                <div style="margin-right: 2.5%; margin-top: 15px;">
                                    <i class="fa-solid fa-star" style="color: #0CB4BF;"></i>
                                    <span style="color: #fff;">' . $row['creviews'] . '</span>
                                </div>
                            </div>

                            <div class="clinic-logo-box" style="z-index: 1;">
                                <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                            </div>

                            <div class="product-img">
                                <a href="clinic-details.blade.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                    <div class="overlay-black" style="z-index: 0;">
                                        <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>';
        }
    }
} else {
    if (empty($searchItem)) {
        echo '<p>Please enter a search term</p>';
    } else {
        $stmt = "
            SELECT *
            FROM clinics
            WHERE ccountry = 'UAE' AND cunique IN (
                SELECT cunique
                FROM services
                WHERE cname LIKE '%$searchItem%' OR sname LIKE '%$searchItem%'
                UNION
                SELECT cunique
                FROM experts
                WHERE expname LIKE '%$searchItem%'
            )";

        $result = $con->query($stmt);

        $results = $result->fetch_all(MYSQLI_ASSOC);
        shuffle($results);

        if (empty($results)) {
            echo '<p>No results found for your search</p>';
        } else {
            foreach ($results as $row) {
                echo '
                    <div class="product-box pagination-results">
                        <div class="product-img-container">

                            <div class="clinic-text-service" style="z-index: 1; display: flex; justify-content: space-between;">
                                <div>
                                    <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
                                    <h1 style="margin-top:-23%; height: 100%; line-height: 1.1">' . $row['cname'] . '</h1>
                                </div>
                                <div style="margin-right: 2.5%; margin-top: 15px;">
                                    <i class="fa-solid fa-star" style="color: #0CB4BF;"></i>
                                    <span style="color: #fff;">' . $row['creviews'] . '</span>
                                </div>
                            </div>

                            <div class="clinic-logo-box" style="z-index: 1;">
                                <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png">
                            </div>

                            <div class="product-img">
                                <a href="clinic-details.blade.php?cunique=' . $row['cunique'] . '&id=' . $row['id'] . '">
                                    <div class="overlay-black" style="z-index: 0;">
                                        <img alt="" class="product-img-front" src="assets/images/services/' . $row['id'] . '.png"/>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>';
            }
        }
    }
}


?>
     </div>
         <div id="pagination" class="pagination" style="text-align: center; margin-top: 5%;"></div>

        </div>

    </section>
    
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
<script>
    const postData = {
        filters: <?php echo json_encode($filters); ?>,
        gender_preference: <?php echo json_encode($gender_preference); ?>
    };

    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll('.pagination-results');
        const itemsPerPage = 12; // Number of cards per page
        const numPages = Math.ceil(cards.length / itemsPerPage);
        let currentPage = 1;

        // Show cards based on the current page
        function showPage(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = page * itemsPerPage;

            cards.forEach((card, index) => {
                if (index >= startIndex && index < endIndex) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Create pagination buttons
        function createPaginationButtons() {
            const paginationContainer = document.getElementById('pagination');
            for (let i = 1; i <= numPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', function () {
                    currentPage = i;
                    showPage(currentPage);
                    updatePaginationButtons();
                });
                paginationContainer.appendChild(button);
            }
        }

        // Update pagination buttons' active state
        function updatePaginationButtons() {
            const buttons = document.querySelectorAll('#pagination button');
            buttons.forEach(button => {
                if (parseInt(button.textContent) === currentPage) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });
        }

        // Initialize
        showPage(currentPage);
        createPaginationButtons();
        updatePaginationButtons();
    });

    function goBack() {
        location.href = 'discover-page.blade.php';
    }
    function seeFilters() {


        const queryString = new URLSearchParams(postData).toString();
        location.href = 'filter-page.php?' + queryString;
    }
</script>
    
</body>
</html>