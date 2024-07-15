<?php
require_once 'server-connect.php';

// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: login.blade.php');
// 	exit;
// }

$userId = 6;
$favorites = "SELECT af.*, c.* FROM account_favorites af
    LEFT JOIN clinics c ON af.clinic_id = c.id
    WHERE af.account_id = ?
";
$stmt = $con->prepare($favorites);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $userId);
$stmt->execute();
$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
$stmt->fetch();
$stmt->close();

$userlevel = max(0, min(8000, $userlevel));
$percentage = ($userlevel / 8000) * 100;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.min.css">
    <script src="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.iife.js"></script>
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <script src="js/mobiscroll.javascript.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
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
            margin-top: 26px;
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
            grid-template-columns: repeat(2, 1fr); 
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
            background: #222;
        } 
    }

    .big-box{
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }
    .card {
        width: 320px;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        margin: 20px auto;
        display: flex;
        height: max-content;
    }

    .clinic-info {
        padding: 20px;
    }

    .clinic-info h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .clinic-info p {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .clinic-image {
        background-size: center;
        width: 320px;
        height: 250px;
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
</style>
<body>
    <div class="profile-grid">
	    <?php include 'profile-details.php'?>
        <div>   
            <section class="profile-dashboard">
                <div class="your-account">
                    <div class="title-box">
                        <h1>Favorite Services</h1>
                    </div>
                    <div id="pagination" class="pagination"></div>

                    <div  id="card-container" class='big-box'>
                        <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                        <div class="card">
                                            <img class="clinic-image" src="assets/images/services/' . $row['id'] . '.png">
                                            <div class="clinic-info">
                                                <h2>'. $row['cname'] .'</h2>
                                                <div style="display: flex; align-items: center; gap: 7px;">
                                                    <p style="font-size: 12px; text-align: center;"><span style="color: #0CB4BF;">Open</span> until '. $row['closing_time'] .'</p>
                                                    <p style="font-size: 5px;"><i class="fa fa-circle" aria-hidden="true"></i></p>
                                                    <p style="font-size: 12px; text-align: center;"> '. $row['ccity'] . ', ' . $row['ccountry'] .'</p>
                                                </div>
                                                <p style="margin-top: 10px; font-size: 12px;">'. $row['cbio'] .'</p>
                                            </div>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
	</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll('.card');
        const itemsPerPage = 4; // Number of cards per page
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
</script>
</body>
</html>