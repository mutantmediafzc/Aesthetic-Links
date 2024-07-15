<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
// Start the session
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit(); // Stop further execution
}

// Require server.blade.php for database connection
require_once 'server.blade.php';
?>

<?php


// **WARNING: DIRECTLY USING UNSANITIZED USER INPUT CREATES SERIOUS SECURITY RISKS.**
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$rating = $_POST['rating'];
$content = $_POST['content'];
$cname = $_POST['cname'];
$sname = $_POST['sname'];
$cunique = $_POST['cunique'];
$sunique = $_POST['sunique'];

// Prepare the SQL statement
$stmt = $con->prepare('INSERT INTO reviews (user_id, product_id, rating, content, cname, sname, cunique, sunique) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

// Bind parameters and execute the statement
$stmt->bind_param('ssssssss', $user_id, $product_id, $rating, $content, $cname, $sname, $cunique, $sunique);
$stmt->execute();

// Check for successful insertion
if ($stmt->affected_rows === 1) {
    echo '';
} else {
    echo ' ' . $stmt->error;
}

// Close the connection
$stmt->close();
$con->close();

?>

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
            font-size: 14px;
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
            width: auto; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 3%;
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
            font-size: 14px;
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
        
        
        
    }

</style>

    
    <!-- ----------------------------menu modal end-------------------------->
    
    <div class="spacer"></div>
    
    <div class="success-box">
        <div class="first-box">
            <div class="img-box">
                <img src="assets/images/success.svg">
            </div>
            <div class="header-text-box">
                <h1>Review Posted!</h1>
            </div>
            <div class="paragraph-text-box">
                <p>Thank you for submitting a review.</p>
            </div>
        </div>
        

        <!---->
    </div>
    
    <section style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">
            <a href="landing-page.blade.php"><div><button class="book-now">Back to Home</button></div></a>

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