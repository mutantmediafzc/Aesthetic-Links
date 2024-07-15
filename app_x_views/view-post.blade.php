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
    <title>Aesthetic Links | Posts</title>

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
    /* --------------------------------menu------------------------------------- */
    
    .spacer {
        width: 100%; 
        height: 90px; 
    }
/* 2nd content color #f7f8f8*/
/* header content color #47afb5*/
    /* ------------------------------------------------------------------------- */

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
		line-height: 0.9;
    }
    
    #Post .post-header {
        background-color: #47afb5;
        padding: 100px 0;
        margin-bottom: 30px;
    }
    #Post .post-header p {
        margin: auto;
        width: 75%;
        font-size: 70px;
        color: #fff;
    }
    #Post .post-header span {
        position: relative;
        display: block;
        width: 75%;
        margin: auto;
        padding: 12px 0;
        font-size: 22px;
        color: #fff;
    }
    #Post .post-header span::after {
        content: '';
        position: absolute;
        bottom: -16px;
        border-top: 15px solid #fff;
        left: 0;
        width: 90px;
    }
    #Post .post-content img {
        min-width: 500px;
        min-height: 350px;
        max-height: 350px;
        max-width: 500px;
        object-fit: cover;
        border-radius: 20px;
    }
    #Post .post-content > div:last-child{
        background-color: #f7f8f8;
    }
    #Post .post-content > div > div {
        display: flex;
        align-items: center;
        padding: 50px;
        gap: 20px;
        width: 75%;
        margin: 30px auto;
    }
    #Post .post-content > div:last-child > div {
        flex-direction: row-reverse;
    }

    /*@media only screen and (min-device-width : 768px)  {*/
       
    /*   .spacer {*/
    /*        width: 100%; */
    /*        height: 9vw; */
    /*    }*/
        
    /*}*/
    

    /*@media only screen and (max-device-width: 1440px) {*/
    /*    .spacer {*/
    /*        height: 150px;*/
    /*    }*/
    /*}*/

    /*@media only screen and (min-device-width: 1441px) {*/
    /*    .spacer {*/
    /*        height: 100px;*/
    /*    }*/

    /*}*/
</style>



<body>
	   
	<?php include 'web-nav.php'; ?>
	<?php include 'nav.php'; ?>
    <?php require_once 'server.blade.php';?>
    <?php include 'menu.php'; ?>

    <section class="spacer"></section>

<?php
    $post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    $stmt = $con->prepare("
        SELECT posts.*, categories.name as category_name
        FROM posts
        INNER JOIN categories ON posts.category_id = categories.id
        WHERE posts.id = ?
    ");
    
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    ?>
    <section id="Post">
        
        <div class="post-header">
            <p><?= $post['title']?></p>
            <span><?= $post['category_name']?></span>
        </div>
        <div class="post-content">
            <div>
                <div>
                    <img style="background-color: #47afb5;" src="https://aestheticlinks.com/app_x/uae/assets/images/posts/big/<?= $post['big_image']?>" alt="<?= $post['title']?> Big"/>
                    <p><?= $post['body_1']?></p>
                </div>
            </div>
            <div>
                <div>
                    <img style="background-color: #47afb5;" src="https://aestheticlinks.com/app_x/uae/assets/images/posts/small/<?= $post['small_image']?>" alt="<?= $post['title']?> Small"/>
                    <div>
                      <p><?= $post['body_2']?></p>
                      <p><?= $post['body_3']?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    }
?>
    
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
    
</body>
</html>