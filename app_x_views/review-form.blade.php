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
    <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

@font-face {
    font-family: 'poppinsregular';
    src: url('poppins-regular-webfont.woff2') format('woff2'),
         url('poppins-regular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;

}
    body {
      margin: 0;
      padding: 0;
      font-family: 'poppinsregular';
    }

/* Add padding to containers */
.register-container {
  width: 100%;
  margin: auto;
  background-color: white;
}

.register-container h1 {
    width: 90%;
  margin: auto;
  font-size: 20px;
  text-align: center;
}

.register-container p {
  margin: 0;
  font-size: 14px;
  margin-bottom: 10px;
}

/* Full-width input fields */
input[type=text] {
  width: 98%;
  margin: 5px 0 22px 0;
  display: inline-block;
  height: 50px;
  border: none;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  text-indent: 15px;
  font-family: 'poppinsregular';
  font-size: 16px;
}

    input[type=password] {
        width: 98%;
        margin: 5px 0 10px 0;
        display: inline-block;
        height: 50px;
        border: none;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-indent: 15px;
        font-family: 'poppinsregular';
        font-size: 16px;
    }
    
    .paragraph-btn {
        width: max-content;
        height: max-content;
        margin-bottom: 22px !important;
    }

input[type=text]:focus, input[type=password]:focus {
  background-color: #fff;
  border: 1px solid #ccc;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin: 25px 0 25px 0;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #0C1E36;
  font-family: "Poppins", sans-serif;
  height: 50px;
  font-size: 16px;
  font-weight: 500;
  border-radius: 5px;
  color: white;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}


/* Set a grey background color and center the text of the "sign in" section */
.signin {
  text-align: center;
}

form {
    width: 90%;
    margin: auto;
    text-align: center;
}

/*--------------------------------------------------*/

.rating {
    width: max-content;
  display: inline-block;
  position: relative;
  height: auto;
  font-size: 35px;
}

.rating .label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
   -webkit-tap-highlight-color: transparent;
}

.rating .label:last-child {
  position: static;
}

.rating .label:nth-child(1) {
  z-index: 5;
}

.rating .label:nth-child(2) {
  z-index: 4;
}

.rating .label:nth-child(3) {
  z-index: 3;
}

.rating .label:nth-child(4) {
  z-index: 2;
}

.rating .label:nth-child(5) {
  z-index: 1;
}

.rating .label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating .label .icon {
  float: left;
  color: transparent;
}

.rating .label:last-child .icon {
  color: #e3e3e3;
}

.rating:not(:hover) .label input:checked ~ .icon,
.rating:hover .label:hover input ~ .icon {
  color: #0CB4BF;
}

.rating .label input:focus:not(:checked) ~ .icon:last-child {
  color: #e3e3e3;
  text-shadow: 0 0 5px #0CB4BF;
}

/*----------------------------*/

.userInput {
  margin: 0;
  padding: 2.5%;
  width: 95%;
  height: 100px;
  resize: none;
  border: 1px solid #666;
  border-radius: 7px;
  text-indent: 10px;
  margin-top: 10px;
  font-family: 'poppinsregular';
}

.userInput:focus {
    outline: none;
}

</style>
</head>
<body>
    
    <?php
    
       $cname = $_GET['cname'];
       $sname = $_GET['sname'];
       $cname = $_GET['cunique'];
       $sname = $_GET['sunique'];
       $id = $_GET['id'];
    
    
    ?>

    <div class="register-container" style="margin-top: 10vw;">
        
        <div style="width: 90%; margin: auto; display: grid; grid-template-columns: repeat(1, 1fr);">
            
            <div style="width: 100px; height: 100px; border-radius: 10px; margin: auto; margin-bottom: 20px; border: 0px solid red;">
                
                <img src="assets/images/services/<?=$id?>.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                
            </div>
            
            <div>
                <h1><?=$cname?></h1>
            </div>
            
            <div>
                <p style="text-align: center; margin-bottom: 10px;"><?=$sname?></p>
            </div>
            
            <div>
                <p style="text-align: center; margin-bottom: 20px; font-size: 14px; line-height: 1; color: #666;">We value your feedback, it helps us ensure that the best clinics are featured on our app.</p>
            </div>
            
        </div>
        
    </div>

    <hr style="width: 90%; margin: auto;"></hr>
    
    <div class="register-container" style="margin-top: 25px;">
        <h1>How was your experience?</h1>
        
        <br>
        
        <form action="review-post.php" method="post">
            <input type="hidden" value="<?=$username?>" name="user_id">
            <input type="hidden" value="<?=$sunique?>" name="product_id">
            
                <div class="rating">
                    <label class="label">
                      <input type="radio" name="rating" value="1" required/>
                      <span class="icon">★</span>
                    </label>
                    <label class="label">
                      <input type="radio" name="rating" value="2" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                    </label>
                    <label class="label">
                      <input type="radio" name="rating" value="3" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>   
                    </label>
                    <label class="label">
                      <input type="radio" name="rating" value="4" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                    </label>
                    <label class="label">
                      <input type="radio" name="rating" value="5" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                    </label>
                  
                </div>
                
                <hr></hr>
                
                <div style="width: 100%;">
                    <p style="margin: 0; text-align: left; font-size: 18px;">Leave a review <?=$username?>?</p>
                    <textarea name="content" class="userInput" placeholder="Write your review here..." required> </textarea>
                    <input type="hidden" value="<?=$cname?>" name="cname">
                    <input type="hidden" value="<?=$sname?>" name="sname">
                    <input type="hidden" value="<?=$cunique?>" name="cunique">
                    <input type="hidden" value="<?=$sunique?>" name="sunique">
                </div>
                
                <br>
                
            <button type="submit" class="registerbtn">Submit</button>
            <br/><br/>
            <a href="myappointments.php?profilelevel=<?=$profilelevel?>" style="text-decoration: none;">Go Back</a>
        </form>
    </div>






<script>
    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
</script>

</body>
</html>
