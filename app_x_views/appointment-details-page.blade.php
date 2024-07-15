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

    if ( isset($_GET['keydate'], $_GET['keytime'], $_GET['id'] ) ) {
        $updateStmt = $con->prepare("UPDATE appointments SET date = ? , time = ? WHERE id = ? ");
    $updateStmt->bind_param('sss',$_GET['keydate'],$_GET['keytime'], $_GET['id']);
    $updateStmt->execute();

    $updateStmt->close();


}
	
?>	
<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
          <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>
          <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.min.css">
  <script src="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.iife.js"></script>
  
      <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <script src="js/mobiscroll.javascript.min.js"></script>
    
    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <script src="js/mobiscroll.javascript.min.js"></script>
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>


    /* -------------------------------exoert modal-------------------------------------- */

    .expertmodal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }
    
    .expert-content {
        position: absolute;
        bottom: 0;
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: max-content;
        bottom: 0;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

/* -------------------------------time-------------------------------------- */

.timemodal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }
    
    .time-content {
        position: absolute;
        bottom: 0;
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: max-content;
        bottom: 0;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /* -------------------------------calendar-------------------------------------- */

.calendarmodal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }
    
    .calendar-content {
        position: absolute;
        bottom: 0;
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: max-content;
        bottom: 0;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

  /* --------------------------------calendar--------------------------------- */
    
    .calendar {
    width: 95%;
    height: 100%;
    margin: auto;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 30px;
}

.month {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: transparent;
    color: #0C1E36;
    font-size: 38px;
    padding: 20px;
}

.prev,
.next {
    font-size: 34px;
    cursor: pointer;
}

.days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

.day {
    padding: 35px;
    text-align: center;
    font-size: 34px
}

.current-day {
    color: #0C1E36;
}

hr.solid {
    width: 100%;
  border-top: 1px solid #0CB4BF;
  margin: 0;
}

hr.solid-thin-line {
width: 90%;
  border-top: 1px solid #ccc;
  margin: 0;
  margin: auto;
}

.book-now-calendar {
        margin: auto;
        width: 90%;
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin-top: 0;
}

    /* --------------------------------calendar--------------------------------- */
    
    .time {
    width: 95%;
    height: max-content;
    margin: auto;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 30px;
}

/* ------------------------------------------------------------------------------------------- */

    .expert {
        width: 95%;
        height: max-content;
        margin: auto;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
        overflow-x: hidden;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }


    .expert::-webkit-scrollbar {
        display: none;
    }


/* ------------------------------------------------------------------------------------------- */

.radio-section {
    width: 100%;
    height: auto;
	display: grid;
    grid-template-columns: repeat(2, 1fr);
    column-gap: 25px;
    row-gap: 25px;
    margin-bottom: 30px;
}

.radio-item [type="radio"] {
	display: none;
    
}
.radio-item {
    width: 100%;
	margin: auto;
}
.radio-item label {
	display: block;
	padding: 18px 10px;
	background: #ffffff;
	border: 1px solid rgba(255, 255, 255, 0.1);
	border-radius: 15px;
	cursor: pointer;
	font-size: 38px;
	font-weight: 400;
	white-space: nowrap;
	position: relative;
	transition: 0.4s ease-in-out 0s;
    text-align: center;
    border: 2px solid #444444;
	
}
.radio-item label:after,
.radio-item label:before {
	content: "";
	position: absolute;
	border: 0px;
	
}
.radio-item label:after {
	height: 19px;
	width: 19px;
	border: 0px solid #524eee;
	left: 19px;
	top: calc(50% - 12px);
	
}
.radio-item label:before {
	background: #524eee;
	height: 20px;
	width: 20px;
	left: 21px;
	top: calc(50%-5px);
	transform: scale(5);
	opacity: 0;
	visibility: hidden;
	transition: 0.4s ease-in-out 0s;
}
.radio-item [type="radio"]:checked ~ label {
	border-color: #0CB4BF;
    background-color: rgba(12, 180, 191, 0.5);
    border: 2px solid #0CB4BF;
	color: #fff;
}

/* ------------------------------------------------------------------------------------------- */



label{
  display:block;
  line-height:40px;
}
.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  right: 0;
  bottom: 0;
  left: 0;
  height: 40px;
  width: 40px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #0CB4BF;
}
.option-input:checked::before {
  width: 40px;
  height: 40px;
  display:flex;
  content: '\f00c';
  font-size: 25px;
  font-weight:bold;
  position: absolute;
  align-items:center;
  justify-content:center;
  font-family:'Font Awesome 5 Free';
}
.option-input:checked::after {
  background: #0CB4BF;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}

/*--------------------*/
    
    .line-divider-box {
        margin-bottom: 50px; 
        margin-top: 50px;
    }
    
    hr.solid-thin-line {
        width: 85%;
        border-bottom: 1px solid #ccc;
        margin: auto;
    }
    
        .spacer-modal h1 {
        margin: auto;
        width: 90%;
        font-size: 38px;
        margin-top: 20px;
    }


    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 15%;
        background-color: #F1F1F1;
        
    }

    .filter-arrow-down {
        font-size: 24pt;
    }
    
    #hamburger-icon {
        color: #fff; 
        font-size: 48px;
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

    .back-now {
        width: 25%;
        height: 40px;
        font-size: 16px;
        font-weight: 300;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin-top: 5px;
        margin-left: 15px;
    }
    .explore-btn {
        width: 100%; 
        height:auto; 
        margin: 0; 
        padding: 0; 
        font-size: 28px; 
        color: #DC143C;
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
    
    .paragraph-5 {
        margin: auto;
        width: 90%; 
        margin: 0; 
        padding: 0; 
        font-size: 10pt; 
        color: #444444; 
        text-align: left; 
        margin-top: 1vw;
    }
    
    .mbsc-ios-dark.mbsc-page {
        background-color: #fff !important;
    }
    
    .mbsc-ios-dark.mbsc-textfield-wrapper-underline {
        background-color: #fff !important;
    }
    
    .spacer-modal .back-modal {
        margin-top: 20px;
        width: 45%;
        font-size: 38px;
        font-weight: 500;
        color: #212121;
        font-family: 'poppinsregular';
        text-align: right;
        background-color: transparent;
        border-style: none;
        -webkit-tap-highlight-color: transparent;
    }
    
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        
        .spacer-modal .back-modal {
            font-size: 14pt;
        }
        
        .paragraph-5 {
            margin: auto;
            width: 90%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt; 
            color: #444444; 
            text-align: left; 
            margin-top: 1vw;
        }
            
        .spacer-modal h1 {
            font-size: 14pt;
        }
        
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
            color: #DC143C;
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
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        #hamburger-icon {
            color: #fff; 
            font-size: 16pt;
        }
        
        .book-now {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #0C1E36;
            background-color: #fff;
            border: 2px solid #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }
    
        .calendar-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
    /*------------------------------*/
    
        .calendar {
            width: 95%;
            height: 100%;
            margin: auto;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1px;
        }
        
        .month {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: transparent;
            color: #0C1E36;
            font-size: 14pt;
            padding: 5px;
        }
        
        .prev,
        .next {
            font-size: 10pt;
            cursor: pointer;
        }
        
        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }
        
        .day {
            padding: 15px;
            text-align: center;
            font-size: 12pt;
        }
        
        .current-day {
            color: #0C1E36;
        }
        
        hr.solid {
            width: 100%;
            border-top: 5px solid #0CB4BF;
            margin: 0;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        hr.solid-thin-line {
            width: 90%;
            border-top: 1px solid #ccc;
            margin: auto;
        }
        
        .book-now-calendar {
                margin: auto;
                width: 90%;
                height: 45px;
                font-size: 12pt;
                font-weight: 600;
                color: #fff;
                background-color: #0C1E36;
                border-radius: 10px;
                margin-top: 0;
        }
        
        .choose-date-title {
            margin: auto; 
            width: 90%; 
            font-size: 14pt;
            margin-bottom: 10px;
        }
        
    
        
        .spacer-modal {
            margin-bottom: 10px;
        }
        
        
        .btn-container-modal {
            display: flex; 
            justify-content: center;
            width: 100%; 
            margin-bottom: 10px;
        }
    
    /*------------------------------------------*/
    
    /* -------------------------------time-------------------------------------- */

        .timemodal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
        }
        
        .time-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .radio-section {
            width: 100%;
            height: auto;
        	display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 10px;
            row-gap: 10px;
            margin-bottom: 10px;
        }
        
        .radio-item label {
        	display: block;
        	padding: 0px 5px;
        	background: #ffffff;
        	border: 1px solid rgba(255, 255, 255, 0.1);
        	border-radius: 5px;
        	cursor: pointer;
        	font-size: 12pt;
        	font-weight: 400;
        	white-space: nowrap;
        	position: relative;
        	transition: 0.4s ease-in-out 0s;
            text-align: center;
            border: 1px solid #444444;
    	
        }
        .radio-item label:after,
        .radio-item label:before {
        	content: "";
        	position: absolute;
        	border: 0px;
    	
        }
        .radio-item label:after {
        	height: 19px;
        	width: 19px;
        	border: 0px solid #524eee;
        	left: 19px;
        	top: calc(50% - 12px);
    	
        }
        
        .radio-item label:before {
        	background: #524eee;
        	height: 20px;
        	width: 20px;
        	left: 21px;
        	top: calc(50%-5px);
        	transform: scale(5);
        	opacity: 0;
        	visibility: hidden;
        	transition: 0.4s ease-in-out 0s;
        }
        
        .radio-item [type="radio"]:checked ~ label {
        	border-color: #0CB4BF;
            background-color: rgba(12, 180, 191, 0.5);
            border: 1px solid #0CB4BF;
        	color: #fff;
        }
        
        .service-name-box {
            width: 90%; 
            display: grid; 
            grid-template-columns: repeat(2, auto 1fr); 
            margin-top: 5%; 
            column-gap: 10px;
        }
        
        .consultation-fee-box {
            width: 100%; 
            display: flex; 
            justify-content: center; 
            margin-top: 10px;
        }
        
        .spacer-modal h1 {
            font-size: 14pt;
        }
        
        .confirm-btn-box {
            display: flex; 
            width: 100; 
            margin-bottom: 25px;
        }
    
    /*------------------------------------------*/
    
        .expert-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .line-divider-box {
            margin-bottom: 10px; 
            margin-top: 10px;
        }
        
        .doc-img {
            width: 65px; 
            height: 65px; 
            object-fit: cover; 
            border-radius: 8px;
        }
        
        .doc-name {
            font-size: 10pt;
        }
    
    /*------------------------------------------*/
    
        .option-input {
    
          height: 20px;
          width: 20px;
    
        }
        
        .option-input:checked::before {
          width: 20px;
          height: 20px;
          font-size: 10pt;
    
        }
        
        .expert-radio-section {
            height: 27vh;
            margin-bottom: 10px; 
            overflow: scroll;
                overflow-x: hidden;
        }
        
    }
    
    @media only screen and (max-device-width: 767px) {
        
        .spacer-modal .back-modal {
            font-size: 12pt;
        }
        
        .paragraph-5 {
            margin: auto;
            width: 90%; 
            margin: 0; 
            padding: 0; 
            font-size: 10pt; 
            color: #444444; 
            text-align: left; 
            margin-top: 1vw;
        }
        
        .spacer-modal h1 {
            font-size: 14pt;
        }
        
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
            color: #DC143C;
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
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        #hamburger-icon {
            color: #fff; 
            font-size: 16pt;
        }
        
        .book-now {
            width: 100%;
            height: 45px;
            font-size: 12pt;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border: 2px solid #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }
    
        .calendar-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: max-content;
            bottom: 0;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
    /*------------------------------*/
    
        .calendar {
            width: 95%;
            height: 100%;
            margin: auto;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1px;
        }
        
        .month {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: transparent;
            color: #0C1E36;
            font-size: 14pt;
            padding: 5px;
        }
        
        .prev,
        .next {
            font-size: 10pt;
            cursor: pointer;
        }
        
        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }
        
        .day {
            padding: 15px;
            text-align: center;
            font-size: 12pt;
        }
        
        .current-day {
            color: #0C1E36;
        }
        
        hr.solid {
            width: 100%;
            border-top: 5px solid #0CB4BF;
            margin: 0;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        hr.solid-thin-line {
            width: 90%;
            border-top: 1px solid #ccc;
            margin: auto;
        }
        
        .book-now-calendar {
                margin: auto;
                width: 90%;
                height: 45px;
                font-size: 12pt;
                font-weight: 600;
                color: #fff;
                background-color: #0C1E36;
                border-radius: 10px;
                margin-top: 0;
        }
        
        .choose-date-title {
            margin: auto; 
            width: 90%; 
            font-size: 14pt;
            margin-bottom: 10px;
        }
        
        
        
        .spacer-modal {
            margin-bottom: 10px;
        }
        
        
        .btn-container-modal {
            display: flex; 
            justify-content: center;
            width: 100%; 
            margin-bottom: 10px;
        }
    
    /*------------------------------------------*/
    
    /* -------------------------------time-------------------------------------- */

        .timemodal {
            display: none;
            position: fixed;
            z-index: 5;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.6);
        }
        
        .time-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .radio-section {
            width: 100%;
            height: auto;
        	display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 10px;
            row-gap: 10px;
            margin-bottom: 10px;
        }
        
        .radio-item label {
        	display: block;
        	padding: 0px 5px;
        	background: #ffffff;
        	border: 1px solid rgba(255, 255, 255, 0.1);
        	border-radius: 5px;
        	cursor: pointer;
        	font-size: 12pt;
        	font-weight: 400;
        	white-space: nowrap;
        	position: relative;
        	transition: 0.4s ease-in-out 0s;
            text-align: center;
            border: 1px solid #444444;
    	
        }
        .radio-item label:after,
        .radio-item label:before {
        	content: "";
        	position: absolute;
        	border: 0px;
    	
        }
        .radio-item label:after {
        	height: 19px;
        	width: 19px;
        	border: 0px solid #524eee;
        	left: 19px;
        	top: calc(50% - 12px);
    	
        }
        
        .radio-item label:before {
        	background: #524eee;
        	height: 20px;
        	width: 20px;
        	left: 21px;
        	top: calc(50%-5px);
        	transform: scale(5);
        	opacity: 0;
        	visibility: hidden;
        	transition: 0.4s ease-in-out 0s;
        }
        
        .radio-item [type="radio"]:checked ~ label {
        	border-color: #0CB4BF;
            background-color: rgba(12, 180, 191, 0.5);
            border: 1px solid #0CB4BF;
        	color: #fff;
        }
        
        .service-name-box {
            width: 90%; 
            display: grid; 
            grid-template-columns: repeat(2, auto 1fr); 
            margin-top: 5%; 
            column-gap: 10px;
        }
        
        .consultation-fee-box {
            width: 100%; 
            display: flex; 
            justify-content: center; 
            margin-top: 10px;
        }
        
        .spacer-modal h1 {
            font-size: 14pt;
        }
        
        .confirm-btn-box {
            display: flex; 
            width: 100; 
            margin-bottom: 25px;
        }
        
        /*------------------------------------------*/
        
        .expert-content {
            position: absolute;
            bottom: 0;
            background-color: #fefefe;
            margin: auto;
            width: 100%;
            height: auto;
            bottom: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .line-divider-box {
            margin-bottom: 10px; 
            margin-top: 10px;
        }
        
        .doc-img {
            width: 65px; 
            height: 65px; 
            object-fit: cover; 
            border-radius: 8px;
        }
        
        .doc-name {
            font-size: 10pt;
        }
        
        /*------------------------------------------*/
        
        .option-input {
    
          height: 20px;
          width: 20px;
    
        }
        
        .option-input:checked::before {
          width: 20px;
          height: 20px;
          font-size: 10pt;
    
        }
        
        .expert-radio-section {
            height: 27vh;
            margin-bottom: 10px; 
            overflow: scroll;
                overflow-x: hidden;
        }
        
    }
    
        .button {
            display: inline-block;
            margin: 5px 5px 0 0;
            padding: 10px 30px;
            outline: 0;
            border: 0;
            cursor: pointer;
            background: #5185a8;
            color: #fff;
            text-decoration: none;
            font-family: arial, verdana, sans-serif;
            font-size: 14px;
            font-weight: 100;
        }
    
        input {
            width: 100%;
            margin: 0 0 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 0;
            font-family: arial, verdana, sans-serif;
            font-size: 14px;
            box-sizing: border-box;
            -webkit-appearance: none;
        }
    
        .mbsc-page {
            padding: 1em;
        }

</style>
<body>
<?php include 'nav.php'; ?>	
	
    <!---- Menu Start --->
	
	<?php include 'menu.php'; ?>
	
	<!---- Menu End ----->
    
    <!-- ----------------------------menu modal end-------------------------->
    <?php
    if ($stmt) {
        $sql = "SELECT * FROM appointments WHERE id = ?";
        $appointment = $con->prepare($sql);
        $appointment->bind_param("s",$_GET['id'] );
        $appointment->execute();
        $result = $appointment->get_result();
        $row = $result->fetch_assoc();
      }
      $today_date = date("m/d/Y");
              echo '
    <div class="spacer"></div>
    <input type="hidden" id="appointment_id" value="'.$_GET['id'].'">
    <input type="hidden" id="today_date" value="'.$today_date.'">
    <input type="hidden" id="status" value="'.$row['status'].'">
    <div class="success-box">
        <div class="first-box">
            <div class="header-text-box">
                <h1>Appointment Details</h1>
            </div>
            <div class="paragraph-text-box">
            </div>
        </div>
        
        <div class="line-divider-box">
            <hr class="solid-thin-line">
        </div>
        
        <div class="second-box">
            <div class="info-box">
                <h1 class="header-details">Name</h1>
                <p class="paragraph-details">'.$username.'</p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Service name</h1>
                <p class="paragraph-details">'. $row['sname'] .'</p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Clinic name</h1>
                <p class="paragraph-details">'. $row['cname'] .'</p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Expert name</h1>
                <p class="paragraph-details">'. $row['expert_name'] .'</p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Clinic location</h1>
                <p class="paragraph-details">'. $row['location'] .'</p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Date</h1>
                <p class="paragraph-details">'. $row['date'] .'</p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Time</h1>
                <p class="paragraph-details">'. $row['time'] .'</p>
            </div>
        </div>
        
        <div class="line-divider-box">
            <hr class="solid-thin-line">
        </div>
        <p style="font-size: 12px; margin-left: 28px; margin-bottom: 5px;">By editing your appointment you agree to our <a href="legal-cancellation.blade.php" style="text-decoration: none; color: #46AFB4;">Cancellation & Rescheduling Policy</a> </p>
        <a href="support.php"><div><button class="back-now">Edit</button></div></a>
        

        <!---->
    </div>

    '
?>
    <section id="reschedule" style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">
           <button class="book-now" onclick="goBack()">Go Back</button>
            
          <div>

            </div> 
        </div>
    </section>


 <!-- ----------------------------timings modal end------------------------ -->

                        <!-- time Modal -->
                        <div id="calendarModal" class="calendarmodal">

                            

                            <!-- time Modal -->
                            <div class="time-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">





                                <div class="spacer-modal">
                                    <h1>Choose a Date</h1>
                                </div>
                                <div style="color:#DC143C;width:90%;display:none; margin: auto;" id="error_message">
                                    please select date after two days from today
                                </div>
                                <div class="spacer-modal">
                                    <hr class="solid">
                                </div>

            
                                    <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 10px;">
                                        <div mbsc-page class="demo-date-picker">
                                            <div style="height: 35vh;">
                                                <!--<div id="demo"></div>-->
                                                <input id="date-input" mbsc-input style="display:none; height: none; widthL none;"/>
                                            </div>
                                        </div>
                                    </div>

                                <div class="confirm-btn-box"><button class="book-now-calendar" id="confirm-time" onclick="openTime()">Confirm</button></div>
                                
                            
                            </div>
                        
                        </div>
                    
        <!-- ----------------------------timings modal end------------------------ -->


                <!-- ----------------------------timings modal end------------------------ -->

                        <!-- time Modal -->
                        <div id="timeModal" class="timemodal">

                            

                            <!-- time Modal -->
                            <div class="time-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">

                                <div class="spacer-modal" style="display:flex; justify-content: center; align-items: center; width: 90%; margin: auto;">
                                    <h1 style="margin-top: 20px;">Choose a Time</h1>
                                    <button class="back-modal" onclick="backCalendar()"><i class="fa-solid fa-arrow-left" style="-webkit-text-stroke: 0.5px white;"></i>&nbsp;Back</button>
                                </div>
                                
                                
                                <div class="spacer-modal">
                                    <hr class="solid">
                                </div>
                                
                                <div class="spacer-modal" style="display:flex; justify-content: center; align-items: center; width: 100%; margin: auto;">
                                    <p class="paragraph-5">If the clinic needs to reschedule, they will reach out to you directly.</p>
                                </div>
            
                                <div class="time">
                                    <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 10px;">
                                        <div class="radio-section">
                                                <div class="radio-item"><input name="radio" id="radio1" onclick="function1()" type="radio"><label for="radio1">9:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio2" onclick="function2()" type="radio"><label for="radio2">10:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio3" onclick="function3()" type="radio"><label for="radio3">11:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio4" onclick="function4()" type="radio"><label for="radio4">12:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio5" onclick="function5()" type="radio"><label for="radio5">13:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio6" onclick="function6()" type="radio"><label for="radio6">14:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio7" onclick="function7()" type="radio"><label for="radio7">15:00</label></div>
                                                <div class="radio-item"><input name="radio" id="radio8" onclick="function8()" type="radio"><label for="radio8">16:00</label></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="confirm-btn-box"><button class="book-now-calendar" id="confirm-time" onclick="confirmSched()">Confirm</button></div>
                                
                            
                            </div>
                        
                        </div>
                    
        <!-- ----------------------------timings modal end------------------------ -->

                                            <!-- ----------------------------experts modal end------------------------ -->
                        <?php

$serviceId = isset($_GET['cunique']) ? intval($_GET['cunique']) : null;
$cserviceId = isset($_GET['id']) ? intval($_GET['id']) : null;
// Connect to database
// Define your SQL query to select all projects
	$stmt = "SELECT * FROM services WHERE cunique = '$serviceId' AND id = '$cserviceId'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);


?>

<?php
	
	if ($result->num_rows > 0) {					
	while ($row = $result->fetch_assoc()) {
		 
?>
	
<?php

	    echo '
        <div id="expertModal" class="expertmodal">

                            

        <!-- expert Modal -->
        <div class="expert-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">


            <div class="spacer-modal">
                <h1>Choose an Expert</h1>
            </div>
            <div class="spacer-modal">
                <hr class="solid">
            </div>

            <div class="expert">
                <div style="margin: auto; width: 95%; height: auto; border-radius: 10px; display: grid; grid-template-columns: repeat(1, 1fr); column-gap: 15px; overflow-x: hidden:">
                    <div class="expert-radio-section">
                        <div class="py">
                            
                            <!---------------------------------------------------------------------------->
                            
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 80%); column-gap: 2%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/placeholder.jpeg" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">Any / No Preference</h1></div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="any" onclick="anyexpert()" value="any" name="example" checked />
                                    </label>                                                        
                                </div>
                                
                                

                            </div>
                            
                            <!---------------------------------------------------------------------------->
                            
                            <div class="line-divider-box">
                                <hr class="solid-thin-line">
                            </div>
                            <div id="firstDiv">
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 75%); column-gap: 5%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/DrDanielEspinoza.jpg" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">'.$row['expert_name_1'].'</h1></div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="firstEX" onclick="firstexpert()" value="'.$row['expert_id_1'].'" name="example" checked />
                                    </label>                                                        
                                </div>

                            </div>
                            <!---------------------------------------------------------------------------->
                            
                            <div class="line-divider-box">
                                <hr class="solid-thin-line">
                            </div>
                            </div>

                            <div id="secondDiv">
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 75%); column-gap: 5%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/DrDanielEspinoza.jpg" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">'.$row['expert_name_2'].'</h1></div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="secondEX"  onclick="secondexpert()" value="'.$row['expert_id_2'].'" name="example" checked />
                                    </label>                                                        
                                </div>

                            </div>
                         
                            <!---------------------------------------------------------------------------->
                            
                            <div class="line-divider-box">
                                <hr class="solid-thin-line">
                            </div>
                            </div>
                            <div id="thirdDiv" >
                            <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 95% 5%);">
                                <div>
                                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 20% 75%); column-gap: 5%;">
                                        <div style="width: 100%; height: 100%;"><img src="assets/images/DrDanielEspinoza.jpg" alt="" class="doc-img"></div>
                                        <div style="display: flex; align-items: center;"><h1 class="doc-name">'.$row['expert_name_3'].'</h1></div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <label>
                                        <input type="radio" class="option-input radio" id="thirdEX"  onclick="thirdexpert()" value="'.$row['expert_id_3'].'" name="example" checked />
                                    </label>                                                        
                                </div>

                            </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>

            <div class="confirm-btn-box"><button class="book-now-calendar" id="confirm-expert" onclick="confirmSched()">Confirm</button></div>
        </div>
    
    </div>


'; }
				} ?>	
                        <!-- expert Modal -->
                        
                    
        <!-- ----------------------------experts modal end------------------------ -->

    <!-- -------------------------------------------------------------------->
    
    <script>
    var time = null;
    var expert= 'any';
    var note =null;
    var status =document.getElementById('status').value;
    
    if(status=='approved'){
    var hidd=document.getElementById('reschedule');
        hidd.style.display = 'none';
    }
    function openCalendar() {
        var calendarmodal = document.getElementById('calendarModal');
        calendarmodal.style.display = 'block';
        
    }

    function openTime() {
       var nowdate=document.getElementById('today_date').value;
       var date = document.getElementById('date-input').value;

       
       var date1 = new Date(date);
    var date2 = new Date(nowdate);

    date2.setDate(date2.getDate() + 3);

       console.log(date1,date2);
        if(date1<date2){
            console.log("1");

    // Create a new div element
    var error = document.getElementById('error_message');
    
    error.style.display = "block";
    // Append the div to the body of the page

        }else{
            var calendarmodal = document.getElementById('calendarModal');
        var timemodal = document.getElementById('timeModal');
        calendarmodal.style.display = 'none';
        timemodal.style.display = 'block';
        }


    }
    
    function backCalendar() {
        var calendarmodal = document.getElementById('calendarModal');
        var timemodal = document.getElementById('timeModal');
        calendarmodal.style.display = 'block';
        timemodal.style.display = 'none';
    }

    function anyexpert(){
        expert = document.getElementById('any').value;
        console.log(expert);
    }
    
    window.onclick = function(event) {
        var calendarmodal = document.getElementById('calendarModal');
        var timemodal = document.getElementById('timeModal');
        
        if (event.target == calendarmodal) {
            calendarmodal.style.display = "none";
        }
        
        if (event.target == timemodal) {
            timemodal.style.display = "none";
        }
        
    }
    
    function confirmSched() {
        // window.location.href = 'create-checkout-session.php';

        var form = document.createElement('form');
    form.setAttribute('method', 'get'); 
    form.setAttribute('action', 'appointment-details-page.blade.php');

    var date = document.getElementById('date-input').value;
        var id = document.getElementById('appointment_id').value;
    // var scprice = document.getElementById('smallprice').value;
    // var sprice = document.getElementById('bigprice').value;
    // var user = document.getElementById('profile').value;
    // var sname = document.getElementById('sname').value;
    // var username = document.getElementById('username').value;
    // var cname = document.getElementById('cname').value;
    // var scountry = document.getElementById('scountry').value;
    // var scity = document.getElementById('scity').value;

    

    // // Add any data you need to pass as hidden input fields
    var inputData = {
        keydate: date,
        keytime: time,
        id:id,
        // keyscprice: scprice,
        // keysprice: sprice,
        // keyuser: user,
        // keysname: sname,
        // keyusername: username,
        // keycname: cname,
        // keyexpert:expert,
        // keyscity:scity,
        // keyscountry:scountry,
        // Add more key-value pairs as needed
    };

    // Iterate through the data and create input fields
    for (var key in inputData) {
        if (inputData.hasOwnProperty(key)) {
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', key);
            input.setAttribute('value', inputData[key]);
            form.appendChild(input);
        }
    }

    // Append the form to the document body
    document.body.appendChild(form);
    // Submit the form
    form.submit();
    }
    </script>

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
        
            mobiscroll.setOptions({
        locale: mobiscroll.localeEn,  // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                 // Specify theme like: theme: 'ios' or omit setting to use default
        themeVariant: 'light',         // More info about themeVariant: https://mobiscroll.com/docs/javascript/calendar/api#opt-themeVariant
    });
    
    mobiscroll.datepicker('#date-input', {
        controls: ['calendar'],       // More info about controls: https://mobiscroll.com/docs/javascript/calendar/api#opt-controls
        display: 'inline'  , 
        touchUi: true

    });
    
    </script>  
<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        // Use history.back() to navigate to the previous page
        window.history.back();
    }
    </script>
</body>
</html>