<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Aesthetic Links | Landing Page</title>
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

    body {
        width: 100vw;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
		
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
        height: 70pt;
        font-size: 28pt;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
    }

    .map {
        width: 100%;
        height: 100%;
        z-index: 0;
        
    }

    .map iframe {
        position: relative;
        width: 100%;
        height: 100vh;
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
        
    }

    .control-bar {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        overflow: hidden;
        background-color: #fff;  
        position: absolute;
        bottom: 0;
        width: 100%;
        height: auto;
        box-shadow: 0 10px 10px 5px rgba(0, 0, 0, 0.5);
        border-top-right-radius: 75px;
        border-top-left-radius: 75px;
    
    }

    .control-bar-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        width: 90%;
        height: auto;
        margin: auto;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .landing-page-filters {
        display: grid;
        grid-template-columns: repeat(4, 30% 30% 30% 10%);
        width: 100%;
        height: 100px;
        margin-top: 10px;

    }

    .filter-btn {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
    }

    .divider {
        width: 110%;
        height: 10px;
        background-color: #0CB4BF;
    }

    .btn-container {
        width: 100%;
        height: 100px;
        border: 1px solid red;
    }

    .view-all-clinics {
        width: 90%;
        height: 100px;
        font-size: 34px;
        font-weight: 500;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 5%;
    }

    hr.solid {
        border-top: 1px solid #f1f1f1;
        margin-top: 20px;
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
    
    .black-bar {
        width: 175px; 
        height: 10px; 
        border-radius: 25px; 
        background-color: #000;
        margin: auto; 
        margin-top: 30px; 
        margin-bottom: 50px;
    }
    
    .paragraph-1 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 32px; 
        font-weight: 600;
    }
    
    #circle {
        color: #444444; 
        font-size: 10px;
    }
    
    .paragraph-2 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 32px;
    }
    
    
    
    .search-bar-landing {
        width: 100%; 
        height: 75px; 
        background-color: #f1f1f1; 
        border-style: none; 
        border-radius: 15px; 
        font-size: 28px; 
        text-indent: 24px;
    }
    
    .content-container {
        margin: auto; 
        width: 100%; 
        height: 80vh; 
        display: grid; 
        grid-template-columns: repeat(1, 1fr);
    }
    
    .black-bar-content {
        width: 175px; 
        height: 10px; 
        border-radius: 25px; 
        background-color: #000;
        margin: auto; 
        margin-top: 30px; 
        margin-bottom: 50px;
    }
    
    .card-item {
        margin: auto; 
        width: 90%; 
        height: auto; 
        margin-top: 50pt;
    }
    
    #money-icon {
        font-size: 30px; 
        color: #444444;
    }
    
    #star {
        font-size: 24px; 
        color: #0CB4BF;
    }
    
    .money-icon-container {
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        column-gap: 5px;
    }
    
    .text-container {
        width: 100%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(1, auto); 
        margin-top: 15px;
    }
    
    .clinic-small-logo {
        position: absolute; 
        width: 10vw; 
        height: 10vw; 
        margin-top: 200px; 
        margin-left: 20px; 
        border-radius: 8pt;
    }
    
    .clinic-img-container {
        width: 100%; 
        height: 15vh; 
        border-radius: 10px;
    }
    
    .clinic-small-logo-img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        border-radius: 10px
    }
    
    .clinic-text-location {
        position: absolute;
        width: 85%; 
        height: auto; 
        margin-top: 200px; 
        margin-left: 2.5%; 
        display: flex; 
        align-items: center;
    }
    
    .clinic-text-location h1 {
        width: 100%; 
        margin: 0; 
        color: #fff; 
        font-size: 38px; 
        text-align: right;
        margin-top: 45px; 
        font-weight: 400;
    }
    
@media only screen and (max-width: 500px) {
    
    
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
        width: 65%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(1, 1fr); 
        margin-top: 3%;
    }
    
    .black-bar {
        width: 50pt; 
        height: 3pt; 
        border-radius: 25px; 
        background-color: #000;
        margin: auto; 
        margin-top: 15pt; 
        margin-bottom: 25pt;
    }
    
    .paragraph-1 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 10pt; 
        font-weight: 550;
    }
    
    #circle {
        color: #444444; 
        font-size: 3pt;
    }
    
    .paragraph-2 {
        width: 100%; 
        margin: 0; 
        padding: 0; 
        font-size: 10pt;
    }
    
    .search-bar-landing {
        width: 100%; 
        height: 20pt; 
        background-color: #f1f1f1; 
        border-style: none; 
        border-radius: 5pt; 
        font-size: 10pt; 
        text-indent: 7pt;
    }
    
    .filter-btn {
        width: 100%;
        height: 25pt;
        font-size: 10pt;
        font-weight: 400;
        background-color: transparent;
        border-style: none;
        color: #212121;
    }
    
    .control-bar {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        overflow: scroll;
        background-color: #fff;  
        position: absolute;
        bottom: 0;
        width: 100%;
        height: auto;
        box-shadow: 0 10px 10px 5px rgba(0, 0, 0, 0.5);
        border-top-right-radius: 30px;
        border-top-left-radius: 30px;
    
    }

    .control-bar-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        width: 90%;
        height: auto;
        margin: auto;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .landing-page-filters {
        display: flex;
        justify-content: space-between;
        width: 100%;
        height: auto;
        margin-top: 5pt;
    }

    .divider {
        width: 100%;
        height: 3px;
        background-color: #0CB4BF;
    }
    
    .content-container {
        margin: auto; 
        width: 100%; 
        height: 45vh; 
        display: grid; 
        grid-template-columns: repeat(1, 1fr);
    }
    
    .black-bar-content {
        width: 75pt; 
        height: 3pt; 
        border-radius: 25px; 
        background-color: #000;
        margin: auto; 
        margin-top: 10pt; 
        margin-bottom: 15pt;
    }
    
    .card-item {
        margin: auto; 
        width: 90%; 
        height: auto; 
        margin-top: 15pt;
    }
    
    #money-icon {
        font-size: 10pt; 
        color: #444444;
    }
    
    #star {
        font-size: 10pt;
        color: #0CB4BF;
    }
    
    .money-icon-container {
        display: flex; 
        justify-content: space-between;
        align-items: center; 
        column-gap: 2px;
    }
    
    .text-container {
        width: 100%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(1, auto); 
        margin-top: 5pt;
    }
    
    hr.solid {
        border-top: 1px solid #f1f1f1;
        margin-top: 5pt;
    }
    
    .clinic-small-logo {
        position: absolute; 
        width: 10vw; 
        height: 10vw; 
        margin-top: 23vw; 
        margin-left: 5pt; 
        border-radius: 5pt;
    }
    
    .clinic-img-container {
        width: 100%; 
        height: 35vw; 
        border-radius: 10px;
    }
    
    .clinic-small-logo-img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        border-radius: 8px
    }
    
    .clinic-text-location {
        position: absolute;
        width: 85%; 
        height: auto; 
        margin-top: 29vw; 
        margin-left: 2.5%; 
        display: flex; 
        align-items: center;
    }
    
    .clinic-text-location h1 {
        width: 100%; 
        margin: 0; 
        color: #fff; 
        font-size: 10pt; 
        text-align: right;
        margin-top: 0; 
        font-weight: 400;
    }
}

/*--------------------------------------------*/


    
</style>
	
<!---- Start Drag ------------------->
<style>
#mydiv {
  position: absolute;
  z-index: 9;

}

#mydivheader {
  padding: 10px;
  cursor: move;
  z-index: 10;
  background-color: #2196F3;
  color: #fff;
}
</style>	

<body>
    <nav>
        <div class="location-dropdown-container">
            <div style="width: 100%;">
                <button class="location-dropdown">
                    <img src="assets/images/uae.png"> <span>Dubai</span> <i id="filter-arrow-down" class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <button id="menuBtn" class="menu-btn"><i class="fa-solid fa-bars" id="hamburger-icon"></i></button>
        </div>
        
    </nav>

        <!-- Menu Modal -->
        <div id="menuModal" class="modal">

            <!-- Menu Modal -->
            <div class="modal-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">
                <div class="modal-content-box" style="">
                    <div style="width: 100%; height: auto; display: flex; justify-content: center;"><img src="assets/images/logo-anl.png" class="modal-logo"></div><br>
                    <div class="modal-item-box">
                        <div class="modal-item"><img src="assets/images/home-menu.png" class="modal-item-icon"></div>
                        <div class="modal-item"><img src="assets/images/appointment-menu.png" class="modal-item-icon"></div>
                        <div class="modal-item"><img src="assets/images/logo-menu.png" class="modal-item-icon"></div>
                        <div class="modal-item"><img src="assets/images/user-menu.png" class="modal-item-icon"></div>
                    </div>
    
                    <div class="modal-name-box">
                        
                        <a href="/landing-page" style="text-decoration: none; color: #000;">
                            <div class="modal-name">
                                <p class="modal-p">Home</p>
                            </div>
                        </a>
                        
                        <a href="/landing-page" style="text-decoration: none; color: #000;">
                            <div class="modal-name">
                                <p class="modal-p-1">Appointments</p>
                            </div>
                        </a>
                        
                        <a href="/landing-page" style="text-decoration: none; color: #000;">
                            <div class="modal-name">
                                <p class="modal-p">Discover</p>
                            </div>
                        </a>
                        
                        <a href="profile.blade.php" style="text-decoration: none; color: #000;">
                            <div class="modal-name">
                                <p class="modal-p">User</p>
                            </div>
                        </a>
                        
                    </div>
                </div>
    
                <div class="closeMenu"><i class="fa-solid fa-xmark" style="font-size: 28px; color: #444444;"></i></div>
    
                <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                    <div class="black-bar"></div>
                </div>
                
                
            
            </div>
        
        </div>
    
        <!-- ----------------------------menu modal end------------------------ -->

    
        <section class="map">
            <iframe src="https://my.atlist.com/map/42858242-a96b-4aa3-88fd-b80c84d59953?share=true" allow="geolocation 'self' https://my.atlist.com" width="100%" height="400px" loading="lazy" frameborder="0" scrolling="no" allowfullscreen></iframe>
        </section>        

    
	<?php require_once 'server.blade.php';?>
	
	<div class="control-bar">
        
        <div class="black-bar-content"></div>
    
        <div class="control-bar-container">
            <div style="width: 100%;"><input type="text" class="search-bar-landing" placeholder="Search for Clinics, Experts, Services..."></div>
            <div class="landing-page-filters">
                <div>
                    <button class="filter-btn">
                        Gender <i class="fa-solid fa-angle-down" id="filter-arrow-down"></i>
                    </button>
                </div>

                <div>
                    <button class="filter-btn">
                        Services <i class="fa-solid fa-angle-down" id="filter-arrow-down"></i>
                    </button>
                </div>

                <div>
                    <button class="filter-btn">
                        Filters
                    </button>
                </div>

                <div>
                    <button class="filter-btn">
                        <i class="fa-solid fa-arrow-down-wide-short" id="filter-arrow-down" style="color: #0CB4BF;"></i>
                    </button>
                </div>

            </div>
            
        </div>

        <div class="divider"></div>
		
		<!----- Call Data for Clinics ---->
	<?php
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	
	// Define your SQL query to select all projects
	$stmt = "SELECT * FROM clinics WHERE approval = 'approved'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);
	
	
	
	
	?>
		
		<?php
						
						while ($row = $result->fetch_assoc()) {

		
			echo				
            '<div class="content-container">
                <a href="/clinic-details" style=" width: 100%; height: auto; text-decoration: none; cursor: pointer; color: #444444;">
                    <div class="card-item">
                        <div class="clinic-img-container">
                            <div class="clinic-text-location">
                                <h1>' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
                            </div>
                            <div class="clinic-small-logo">
                                <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" class="clinic-small-logo-img">
                            </div>
                            <img src="assets/images/clinic-images/' . $row['cunique'] . '.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                        </div>
                        
                        
                        <div class="text-container">
                            <div style="width: 100%; display: flex; justify-content: space-between;">
                                <div><p class="paragraph-1">' . $row['cname'] . '</p></div>
                                <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle"></i></div>
                                <div><p class="paragraph-2"><i class="fa-solid fa-venus" style="color: #0CB4BF;"></i> ' . $row['ctype'] . ' patients</p></div>
                                <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle"></i></div>
                                
                                <div><p class="paragraph-2" style="color: #0CB4BF;">' . $row['rating'] . ' <i class="fa-solid fa-star" id="star"></i></p></div>
                                
                                <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle"></i></div>
                                <div class="money-icon-container">
                                    <div><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>
                                    <div><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>
                                    <div><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>
                                </div>                        
                                
                            </div>
                            <div style="width: 100%;"><p class="paragraph-2">' . $row['specialty'] . '</p></div>
                            <div style="width: 100%; height: auto;"><hr class="solid"></div>
                        </div>
                    </div>                
                </a>
			

                
				
	


            </div>';        
			}
						
			?>


            <button class="view-all-clinics">
                <a href="/clinic-list-view" style="font-family: 'Poppins', sans-serif; width: 100%; text-decoration: none; color: #fff;">View all</a>
            </button>
        

        
    </div>

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
	
	<script>
//Make the DIV element draggagle:
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
   
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
    
</body>
</html>