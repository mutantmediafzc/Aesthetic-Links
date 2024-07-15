<?php include 'session.php'; ?>
<?php require_once 'server-connect.php';


$keyuser = isset($_GET['keyuser']) ? $_GET['keyuser'] : null;
$keytime = isset($_GET['keytime']) ? $_GET['keytime'] : null;
$keyscprice = isset($_GET['keyscprice']) ? $_GET['keyscprice'] : null;
$keysprice = isset($_GET['keysprice']) ? $_GET['keysprice'] : null;
$keydate = isset($_GET['keydate']) ? $_GET['keydate'] : null;
$keysname = isset($_GET['keysname']) ? $_GET['keysname'] : null;
$keyusername = isset($_GET['keyusername']) ? $_GET['keyusername'] : null;
$keycname = isset($_GET['keycname']) ? $_GET['keycname'] : null;
$keyexpert = isset($_GET['keyexpert']) ? $_GET['keyexpert'] : null;
$keyscity = isset($_GET['keyscity']) ? $_GET['keyscity'] : null;
$keyscountry = isset($_GET['keyscountry']) ? $_GET['keyscountry'] : null;
$clinic = isset($_GET['clinic_id']) ? $_GET['clinic_id'] : null;
$service_id = isset($_GET['service_id']) ? $_GET['service_id'] : null;
// $keydate = date('Y-m-d', strtotime($keydate)); // Convert date to MySQL format if it's not already
// $keytime = date('H:i:s', strtotime($keytime)); 
$expert=$keyexpert;
$location=$keyscity.' ,'.$keyscountry;

if($keyexpert!='any'){
 $sql = "SELECT * FROM experts WHERE id = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("i", $expert);
  $stmt->execute();
  $result = $stmt->get_result();

	
	  if ($result->num_rows>0) {
    $row = $result->fetch_assoc();
      }
     $expert_name=$row['expname'];
   
}else{
    $expert_name="any";
}

if($keyscprice==null){
    $price=$keysprice;
    $type="service";
}else{
    $price=$keyscprice;
    $type="consultation";
}
$status='pending';

// Add failed no
$service = "SELECT * FROM services WHERE id =  ?";
$serviceStmt = $con->prepare($service);
$serviceStmt->bind_param("s", $service_id);
$serviceStmt->execute();
$serviceResult = $serviceStmt->get_result();

$clinicQry = "SELECT * FROM clinics WHERE cunique =  ?";
$clinicStmt = $con->prepare($clinicQry);
$clinicStmt->bind_param("s", $clinic);
$clinicStmt->execute();
$clinicResult = $clinicStmt->get_result();

$dateToday = date("Y-m-d");

if ($serviceResult->num_rows>0) {
    $row = $serviceResult->fetch_assoc();
    $failedCount = $row['failed_no'] + 1;

    $getServiceViewStmt = "SELECT * FROM services_view WHERE service_id = '$service_id' AND date = '$dateToday'";
    $serviceViewResult = $con->query($getServiceViewStmt);
    
    $serviceFailed = 1;
    if ($serviceViewResult->num_rows > 0) {
        while ($serviceRow = $serviceViewResult->fetch_assoc()) {
            $serviceFailed = $serviceRow['failed_no']+1;
            
            $updateStmt = $con->prepare("UPDATE services_view SET failed_no = ? WHERE id = ?");
            $updateStmt->bind_param('ss', $serviceFailed, $serviceRow['id']);
            $updateStmt->execute();
        }
    } else {
        $clinic = $row['cname'];
        $location = $row['scity'].', '. $row['scountry'];
        $service = $row['sname'];
        $createStmt = $con->prepare("INSERT INTO services_view (service_id, clinic_name, location, service_name, failed_no, date) VALUES (?, ?, ?, ?, ?, ?)");
        $createStmt->bind_param('ssssss', $service_id, $clinic, $location, $service, $serviceFailed, $dateToday);
        $createStmt->execute();
    }
    
    $stmt = $con->prepare("UPDATE services SET failed_no = $failedCount WHERE id = '$service_id'");
    $stmt->execute();
    $stmt->close();
}

if ($clinicResult->num_rows>0) {
    $row = $clinicResult->fetch_assoc();
    $failedCount = $row['failed_no'] + 1;
    
    $clinicId = $row['id'];
    $getClinicViewStmt = "SELECT * FROM clinics_view WHERE clinic_id = '$clinicId' AND date = '$dateToday'";
    $getClinicViewResult = $con->query($getClinicViewStmt);
    
    $clinicFailed = 1;
    if ($getClinicViewResult->num_rows > 0) {
        while ($clinicRow = $getClinicViewResult->fetch_assoc()) {
            $clinicFailed = $clinicRow['failed_no']+1;
            
            $updateStmt = $con->prepare("UPDATE clinics_view SET failed_no = ? WHERE id = ?");
            $updateStmt->bind_param('ss', $clinicFailed, $clinicRow['id']);
            $updateStmt->execute();
        }
    } else {
        $clinic = $row['cname'];
        $location = $row['ccity'].', '. $row['ccountry'];
        $createStmt = $con->prepare("INSERT INTO clinics_view (clinic_id, clinic_name, location, failed_no, date) VALUES (?, ?, ?, ?, ?)");
        $createStmt->bind_param('sssss', $clinicId, $clinic, $location, $clinicFailed, $dateToday);
        $createStmt->execute();
    }
    
    $stmt = $con->prepare("UPDATE clinics SET failed_no = $failedCount WHERE cunique = '$clinic'");
    $stmt->execute();
    $stmt->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>
    
        <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.min.css">
  <script src="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.iife.js"></script>
  

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

    /* --------------------------------menu------------------------------------- */

    .modal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }
    
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: 25vh;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .closeMenu {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 1px solid #444444;
        float: right;
        font-size: 28px;
        font-weight: bold;
        right: 5%;
        margin-top: -150px;
    }

    .closeMenu:hover,
    .closeMenu:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* ------------------------------------------------------------------------- */
    
    .line-divider-box {
        margin-bottom: 50px; 
        margin-top: 50px;
    }
    
    hr.solid-thin-line {
        width: 85%;
        border-bottom: 1px solid #ccc;
        margin: auto;
    }


    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 15%;
        background-color: #F1F1F1;
        
    }

    nav {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 5%;
        padding-bottom: 5%;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        z-index: 2;
        background-color: #fff;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;
    }

    .menu-btn {
        position: absolute;
        width: 85px;
        height: 85px;
        border-radius: 25px;
        background-color: #0C1E36;
        
    }

    .location-dropdown {
        width: 100%;
        height: 85px;
        font-size: 38px;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
    }

    .filter-arrow-down {
        font-size: 24pt;
    }
    
    #hamburger-icon {
        color: #fff; 
        font-size: 48px;
    }
    
    .modal-logo {
        width: 375px;
        height: auto;
    }
    
    .modal-item-box {
        width: 100%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(4, 1fr); 
        column-gap: 60px;
    }
    
    
    .modal-item {
        display: flex; 
        justify-content: center; 
        align-items: center; 
        width: 110px; 
        height: 110px; 
        border: 1px solid #444444; 
        border-radius: 50%;
    }
    
    .modal-item-icon {
        width: 45px; 
        height: auto;
    }
    
    .modal-name-box {
        width: 100%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(4, 1fr); 
        column-gap: 60px;
    }
    
    .modal-name {
        width: 110px; 
        height: auto;
    }
    
    .modal-p {
        width: 100%; 
        text-align: center; 
        font-size: 24px;
    }
    
    .modal-p-1 {
        width: 100%; 
        text-align: center; 
        font-size: 24px;
        margin-left: -35px;
    }
    
    .modal-content-box {
        margin: auto; 
        width: 65%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(1, 1fr); 
        margin-top: 12%;
    }
    
    .back-btn {
        position: absolute;
        left: 5%;
        margin-top: 7vw;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border-style: none;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        background-color: #fff;
        
    }
    
    #back-arrow {
        color: #a1a1a1; 
        font-size: 28px;
    }
    
    /*---------------------------------------------------*/
    
    .spacer {
        width: 100%;
        height: 19vw;
    }
    
    .success-box {
        margin: auto;
        width: 90%;
        height: max-content;
        background-color: #fff;
        border-radius: 20px;
        margin-top: 15vw;
        padding-top: 5%;
        padding-bottom: 5%;
    }
    
    .first-box {
        margin: auto;
        width: 90%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
    }
    
    .second-box {
        margin: auto;
        width: 85%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 5px;
    }
    
    .img-box {
        margin: auto;
        width: 200px;
        height: 200px;
    }
    
    .img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .header-text-box {
        width: 100%;
        height: auto;
    }
    
    .header-text-box h1 {
        width: 100%;
        text-align: center;
        font-size: 38px;
        margin: 0;
        color: #212121;
    }
    
    .paragraph-text-box p {
        width: 100%;
        text-align: center;
        font-size: 28px;
        margin: 0;
        color: #212121;
    }
    
    .info-box {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: space-between;
    }
    
    .header-details {
        width: max-content;
        margin: 0;
        font-size: 34px;
        color: #212121;
    }
    
    .paragraph-details {
        width: max-content;
        margin: 0;
        font-size: 34px;
        color: #212121;
    }
    
    .booking-btn-container {
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
    
    .explore-btn {
        width: 100%; 
        height:auto; 
        margin: 0; 
        padding: 0; 
        font-size: 28px; 
        color: #0C1E36;
    }
    
    .btn-box {
        position:fixed; 
        left:0px; 
        bottom:0px; 
        height: auto; 
        width:100%; 
        display: grid; 
        grid-template-columns: repeat(1, 1fr);
        row-gap: 10px;
    }
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .success-box {
            margin: auto;
            width: 90%;
            height: max-content;
            background-color: #fff;
            border-radius: 20px;
            margin-top: 15vw;
            padding-top: 10%;
            padding-bottom: 10%;
        }
        
        .first-box {
            margin: auto;
            width: 90%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
        }
        
        .img-box {
            margin: auto;
            width: 100px;
            height: 100px;
        }
        
        .explore-btn {
            width: 100%; 
            height:auto; 
            margin: 0; 
            padding: 0; 
            font-size: 14px; 
            color: #0C1E36;
        }
        
        .book-now {
            width: 100%;
            height: 50px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }
        
        .paragraph-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .header-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .paragraph-text-box p {
            width: 100%;
            text-align: center;
            font-size: 14px;
            margin: 0;
            color: #212121;
        }
        
        .header-text-box h1 {
            width: 100%;
            text-align: center;
            font-size: 18px;
            margin: 0;
            color: #212121;
        }
        
        .line-divider-box {
            margin-bottom: 10px; 
            margin-top: 10px;
        }

        
        .closeMenu {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20pt;
            height: 20pt;
            border-radius: 50%;
            border: 1px solid #444444;
            float: right;
            font-size: 10pt;
            font-weight: bold;
            right: 7%;
            margin-top: 18pt;
        }
        
        .back-btn {
            position: absolute;
            left: 5%;
            margin-top: 7vw;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            
        }
        
        #back-arrow {
            color: #a1a1a1; 
            font-size: 12pt;
        }
        
        .view-all-clinics {
            width: 90%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 5%;
        }
        
        
        nav {
            padding-top: 10pt;
            padding-bottom: 10pt;
        }
        
        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;
            
        }
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        #hamburger-icon {
            color: #fff; 
            font-size: 16pt;
        }
        
        .location-dropdown {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #212121;
            background-color: transparent;
            border-style: none;
        }
        
        .location-dropdown img {
            margin: auto; 
            width: 12pt; 
            height: auto;
        }
        
        .modal-logo {
            width: 125pt;
            height: auto;
        }
        
        .modal-item {
            display: flex; 
            justify-content: center; 
            align-items: center; 
            width: 35pt; 
            height: 35pt; 
            border: 1px solid #444444; 
            border-radius: 50%;
        }
        
        .modal-item-icon {
            width: 15pt; 
            height: auto;
        }
        
        .modal-item-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        
        .modal-name-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        .modal-name {
            width: 35pt; 
            height: auto;
        }
        
        .modal-p {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
        }
        
        .modal-p-1 {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
            margin-left: -7pt;
        }
        
        .modal-content-box {
            margin: auto; 
            width: 40%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 10%;
        }
    }
    
    @media only screen and (max-device-width: 767px) {
        
        .success-box {
            margin: auto;
            width: 90%;
            height: max-content;
            background-color: #fff;
            border-radius: 20px;
            margin-top: 15vw;
            padding-top: 10%;
            padding-bottom: 10%;
        }
        
        .first-box {
            margin: auto;
            width: 90%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
        }
        
        .img-box {
            margin: auto;
            width: 100px;
            height: 100px;
        }
        
        .explore-btn {
            width: 100%; 
            height:auto; 
            margin: 0; 
            padding: 0; 
            font-size: 14px; 
            color: #0C1E36;
        }
        
        .book-now {
            width: 100%;
            height: 50px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }
        
        .paragraph-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .header-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .paragraph-text-box p {
            width: 100%;
            text-align: center;
            font-size: 14px;
            margin: 0;
            color: #212121;
        }
        
        .header-text-box h1 {
            width: 100%;
            text-align: center;
            font-size: 18px;
            margin: 0;
            color: #212121;
        }
        
        .line-divider-box {
            margin-bottom: 10px; 
            margin-top: 10px;
        }

        
        .closeMenu {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20pt;
            height: 20pt;
            border-radius: 50%;
            border: 1px solid #444444;
            float: right;
            font-size: 10pt;
            font-weight: bold;
            right: 7%;
            margin-top: 18pt;
        }
        
        .back-btn {
            position: absolute;
            left: 5%;
            margin-top: 7vw;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            
        }
        
        #back-arrow {
            color: #a1a1a1; 
            font-size: 12pt;
        }
        
        .view-all-clinics {
            width: 90%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 5%;
        }
        
        
        nav {
            padding-top: 5%;
            padding-bottom: 5%;
        }
        
        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;
            
        }
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        #hamburger-icon {
            color: #fff; 
            font-size: 16pt;
        }
        
        .location-dropdown {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #212121;
            background-color: transparent;
            border-style: none;
        }
        
        .location-dropdown img {
            margin: auto; 
            width: 12pt; 
            height: auto;
        }
        
        .modal-logo {
            width: 125pt;
            height: auto;
        }
        
        .modal-item {
            display: flex; 
            justify-content: center; 
            align-items: center; 
            width: 35pt; 
            height: 35pt; 
            border: 1px solid #444444; 
            border-radius: 50%;
        }
        
        .modal-item-icon {
            width: 15pt; 
            height: auto;
        }
        
        .modal-item-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        
        .modal-name-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        .modal-name {
            width: 35pt; 
            height: auto;
        }
        
        .modal-p {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
        }
        
        .modal-p-1 {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
            margin-left: -7pt;
        }
        
        .modal-content-box {
            margin: auto; 
            width: 65%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 3%;
        }
        
    }

</style>

<body>
   

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




    <?php include 'nav.php'; ?>	
	
    <!---- Menu Start --->
	
	<?php include 'menu.php'; ?>
	
	<!---- Menu End ----->
    
    <!-- ----------------------------menu modal end-------------------------->
    
    <div class="spacer"></div>
    
    <div class="success-box">
        <div class="first-box">
            <div class="img-box">
                <img src="assets/images/failed.svg">
            </div>
            <div class="header-text-box">
                <h1>Booking failed!</h1>
            </div>
            <div class="paragraph-text-box">
                <p>Payment Failed or Canceled</p>
            </div>
        </div>
        
        <div class="line-divider-box">
            <hr class="solid-thin-line">
        </div>
        
        <div class="second-box">
            <div class="info-box">
                <h1 class="header-details">Name</h1>
                <p class="paragraph-details"><?=$keyusername?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Service name</h1>
                <p class="paragraph-details"><?=$keysname?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Clinic name</h1>
                <p class="paragraph-details"><?=$keycname?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Expert name</h1>
                <p class="paragraph-details"><?=$expert_name?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Clinic location</h1>
                <p class="paragraph-details"><?=$location?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Date</h1>
                <p class="paragraph-details"><?=$keydate?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Time</h1>
                <p class="paragraph-details"><?=$keytime?></p>
            </div>
        </div>
        
        <div class="line-divider-box">
            <hr class="solid-thin-line">
        </div>
        

        <!---->
    </div>
    
    <section style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">
            <a href="landing-page.blade.php"><div><button class="book-now">Go to Home Page</button></div></a>

        </div>
    </section>



    <!-- -------------------------------------------------------------------->

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
    
</body>
</html>