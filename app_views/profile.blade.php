<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.blade.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["avatar"])) {
    // Get the logged-in user's ID from the session
    $user_id = $_SESSION['user_id'];

    // JSON response array
    $response = array('status' => 'error', 'message' => '');

    // Check if a file was uploaded
    if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {
        // Directory where the uploaded files will be saved
        $target_dir = "assets/images/avatar/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ["jpg", "jpeg", "png"];

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            $response['message'] = 'File is not an image.';
        } else {
            // Check file size (5MB max)
            if ($_FILES["avatar"]["size"] > 5000000) {
                $response['message'] = 'File is too large.';
            } else {
                // Allow certain file formats
                if (!in_array($imageFileType, $allowed_types)) {
                    $response['message'] = 'Only JPG, JPEG, and PNG files are allowed.';
                } else {
                    // Check if file already exists and append timestamp if necessary
                    if (file_exists($target_file)) {
                        $target_file = $target_dir . pathinfo($_FILES["avatar"]["name"], PATHINFO_FILENAME) . "_" . time() . "." . $imageFileType;
                    }

                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                        // Update the database with the new file path
                        $filePath = $target_file;

                        require_once 'server-connect.php'; // Include database connection

                        $stmt = $con->prepare("UPDATE accounts SET img = ? WHERE id = ?");
                        $stmt->bind_param("si", $filePath, $user_id);

                        if ($stmt->execute()) {
                            $response['status'] = 'success';
                            $response['message'] = 'Profile picture updated successfully.';
                        } else {
                            $response['message'] = 'Failed to update database.';
                        }

                        $stmt->close();
                    } else {
                        $response['message'] = 'Failed to upload file.';
                    }
                }
            }
        }
    } else {
        $response['message'] = 'File upload error.';
    }

    // Output JSON response and stop further execution
    echo json_encode($response);
    exit;
}

// If it's not a POST request or no file uploaded, fetch user data
require_once 'server-connect.php'; // Include database connection

$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel, img FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel, $img);
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

    a { -webkit-tap-highlight-color: transparent; }
    
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
        height: 9px;
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
    
    #icon-size {
        margin: auto 0 !important;
    }
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        #icon-size {
            margin: auto 0 !important;
        }
        
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
        font-weight: 550; 
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
        height: 60px;
        border-style: none;
        background-color: transparent;
        border-bottom: 1px solid #c1c1c1;
        font-size: 36px;
        color: #000;
        margin-bottom: -10px;
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
        margin-bottom: 0px !important;
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
        font-weight: 550; 
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
        height: 60px;
        border-style: none;
        background-color: transparent;
        border-bottom: 1px solid #c1c1c1;
        font-size: 36px;
        color: #000;
        margin-bottom: -10px;
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



/* phones */
@media only screen and (max-width: 767px) {
    #logoAr {
        display: none !important;
    }
    #logoEn {
        display: none !important;
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
    /*.icon-svg-btn{*/
    /*        margin-bottom: 5px;*/
    /*}*/
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
    #logoEn{
    width: 200px;
    position: absolute;
    left:10%;
    background: #222;
    }
    
    #logoAr{
    width: 200px;
    position: absolute;
    right:10%;
    background: #222;
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
    #logoEn{
    width: 200px;
    position: absolute;
    left:10%;
    background: #222;
    }
    
    #logoAr{
    width: 200px;
    position: absolute;
    right:10%;
    background: #222;
    }
    
}
#inputFile::-webkit-file-upload-button {
  visibility: hidden;
}
</style>
<body>

	<div class="profile-grid">
    	<section class="profile-details">
        <div class="profile-container">
	               <!--<img src="assets/images/logo-anl.png" id='logoEn' class=' show-el-en'>-->
	               <!--<img src="assets/images/logo-anl.png" id='logoAr' class=' show-el-ar'>-->
            <button class="back" style="-webkit-tap-highlight-color: transparent;">
				<a style="" href="landing-page.blade.php">
				    <i class="fa-solid fa-angle-left show-el-en "></i>
				    <i class="fa-solid fa-angle-right show-el-ar"></i>
				</a>
			</button>
            <div class="profile-details-container">
                <div class="profile-details-box"><h3>Profile</h3></div>
                    <div class="profile-img">
                        <div class="profile-img-box">
                            <label for="avatar" style="cursor: pointer;">
                                <img id="profileImg" src="<?php echo ($img && file_exists($img)) ? $img : 'assets/images/placeholder.jpeg'; ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </label>
                            <form id="uploadForm" method="post" enctype="multipart/form-data">
                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" style="display: none;">
                            </form>
                        </div>
                    </div>
                <div class="name-container">
                    <h2><?=$username?></h2>
                </div>
                <div class="user-level-box">
                    <p><?=$userlevel?>/8000</p>
                </div> 
                <div class="progress-bar">
                    <div class="progress">
                        <div class="progress-value"></div>
                    </div>
                    <div class="diamond">
                        <a href="legal-rewards.blade.php"><i class="fa-regular fa-gem"></i></a>
                    </div>
                </div>
                <div class="progress-description">
                    <p>
                        Get more discounts & a VIP experience!
                    </p>
                </div> 

            </div>

        </div>
    </section>
        <div>
            <section class="profile-dashboard">
                <div class="your-account">
                    <div class="title-box">
                        <h1>Your Account</h1>
                    </div>
        
                    <div class="button-your-account">
                        <a href="personalinformation.php" style="text-decoration: none;">
        				<button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-user"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>Personal Information</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
        				</a>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <!--<div class="button-your-account">
                        <button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                                <div style="width: 100%; height: 100%;"><img src="assets/images/creditcard.png" style="width: 45px; height: 45px;"></div>
                                <div style="text-align: left;">Cards</div>
                            </div>
                            <i class="fa-solid fa-chevron-right" style="margin: auto; color: #0CB4BF;"></i>
        
                        </button>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        			
                    <div class="button-your-account">
                        <a href="#" style="text-decoration: none;">
        				<button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-bell"></i></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>My Notifications</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
        				</a>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                                 
                        <a href="myappointments.php?profilelevel=<?=$profilelevel?>" style="text-decoration: none;">
        				<button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-regular fa-calendar"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>My Appointments</p></div>
                            </div>
                             <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                            <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
        				</a>	
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                        <a href="referral-test.php?profilelevel=<?=$profilelevel?>" style="text-decoration: none;">
        				<button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-percent"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>My Discounts</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
        
                        </button>
        				</a>	
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
                
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                  
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                        <a href="support.php" style="text-decoration: none;">
        				<button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-headset"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>Support</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
        
                        </button>
        				</a>	
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                            
        					<a href="favorite-clinics.php" style="text-decoration: none;">
        					     <!--<a href="personalinformation.php" style="text-decoration: none;">-->
                            <button>
                                <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                        align-items: center;
                                justify-items: center;
                                align-content: center;
                                ">
                                    <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-heart"></i></div>
        
                                       
                                        <div class="btn-text-box logout-btn"><p class='show-p-en'>Favorites</p></div>
        
                                </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
        
                            </button>
                        	</a>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    
                </div>
            </section>
        
            <section class="profile-dashboard">
                <div class="your-account">
                    <div class="title-box">
                        <h1>Preferences</h1>
                    </div>
        
                    <div class="button-your-account">
                        <a href="language.php" style="text-decoration: none;">
        				<button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-globe"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>Language</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
        				</a>	
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <!---<div class="button-your-account">
                        <!-- <a href="currency.php" style="text-decoration: none;">
        			 <!--	<button>
                         <!--    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                            
                                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i class="fa-solid fa-dollar-sign"></i></div>
                                <div class="btn-text-box"><p>Currency</p></div>
                            </div>
                            <i class="fa-solid fa-chevron-right" style=""></i>
        
                        </button>
        				</a>	
                    </div> -->
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    
                </div>
            </section>
        </div>
        <div>
            <section class="profile-dashboard">
                <div class="your-account">
                    <div class="title-box">
                        <h1>Legal</h1>
                    </div>
        
                    <div class="button-your-account">
                        <a href="legal-terms-and-conditions.blade.php" style="text-decoration: none;">
                        <button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn">
                                    <i id='icon-size' class="fa-solid fa-file"></i>
                                </div>
                                <div class="btn-text-box"><p class='show-p-en'>Terms and Conditions</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
                        </a>
                    </div>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                        <a href="legal-privacy-policy.blade.php" style="text-decoration: none;">
                        <button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-shield-halved"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>Privacy Policy</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
                        </a>
                    </div>
        
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                        <a href="legal-cancellation.blade.php" style="text-decoration: none;">
                        <button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-ban"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>Cancellation and Reschedule Policy</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
                        </a>
                    </div>
        
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                        <a href="legal-cookie-policy.blade.php" style="text-decoration: none;">
                        <button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-cookie-bite"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>Cookie Policy</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
                        </a>
                    </div>
        
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                        <a href="legal-rewards.blade.php" style="text-decoration: none;">
                        <button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-trophy"></i></div>
                                <div class="btn-text-box"><p class='show-p-en'>Rewards and Referrals</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
                        </a>
                    </div>
        
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    <div class="button-your-account">
                            
        					<a href="logout.php" style="text-decoration: none;">
                            <button>
                                <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                        align-items: center;
                                justify-items: center;
                                align-content: center;
                                ">
                                    <div class="icon-svg-btn"><i id='icon-size' class="fa-solid fa-right-from-bracket logout"></i></div>
        
                                       
                                        <div class="btn-text-box logout-btn"><p class='show-p-en'>Logout</p></div>
        
                                </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                            </button>
                        	</a>
                    </div>

                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
                    
                    <div class="button-your-account">
                        <a href="deleteaccount.php" style="text-decoration: none;">
        				<button>
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;
                                    align-items: center;
                                justify-items: center;
                                align-content: center;
                            ">
                                <div class="icon-svg-btn"><i id='icon-size' class="fa-regular fa-circle-xmark red"></i></div>
                                <div class="btn-text-box delete-btn"><p class='show-p-en'>Delete Account</p></div>
                            </div>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-en" style="margin: auto; color: #0CB4BF;"></i>
                                <i  id='icon-size' class="fa-solid fa-chevron-right show-el-ar" style="margin: auto; color: #0CB4BF; transform: rotate(180deg);"></i>
                        </button>
        				</a>	
                    </div>
        
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
        
                    
                </div>
            </section>
        </div>
	</div>
	
<script>
    document.getElementById("avatar").addEventListener("change", function() {
        if (this.files && this.files[0]) {
            var file = this.files[0]; // Store the file object
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                document.getElementById('profileImg').src = e.target.result;
                uploadFile(file);
            }
            
            reader.readAsDataURL(file);
        }
    });

    function uploadFile(file) {
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        formData.append('avatar', file);

        xhr.open('POST', '', true); // Empty string means it will submit to the same page
        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    console.log('Upload successful');
                } else {
                    console.error('Upload failed:', response.message);
                }
            } else {
                console.error('An error occurred during the upload.');
            }
        };
        xhr.send(formData);
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