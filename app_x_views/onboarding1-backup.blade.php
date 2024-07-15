<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Filters</title>
  </head>
  <script
    src="https://kit.fontawesome.com/a49b3edde3.js"
    crossorigin="anonymous"
  ></script>
  <style>
    body {
        width: 100vw;
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      height: 100vh;
    }

    nav {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: auto;
      padding-top: 15%;
      z-index: 2;
      background-color: #fff;
    }

    .location-dropdown-container {
      display: flex;
      justify-content: flex-end;
      width: 90%;
      height: auto;
      margin-bottom: 25px;
    }

    .back-btn {
      position: absolute;
      left: 5%;
      width: 75px;
      height: 75px;
      border-radius: 50%;
      border: 2px solid #a1a1a1;
      background-color: transparent;
    }

    .location-dropdown {
      width: 100%;
      height: 100px;
      background-color: transparent;
      border-style: none;
    }

    .dropdown-container {
      width: 90%;
      height: 150px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      column-gap: 25px;
    }

    .dropdown-field {
      width: 100%;
      height: auto;
      grid-template-columns: repeat(1, 1fr);
      row-gap: 20px;
    }

    .gender-pref {
        width: 90%;
        height: 150px;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
    }

    /* -------------------------------------------------------------------- */

    select {

        width: 100%;
        height: auto;
        border: 1px solid #444444;
        border-radius: 5pt;
        font-size: 28pt;
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 7pt;
        padding-top: 10px;
                padding-bottom: 10px;
    }

    select:focus {
        outline: none;
    }

    option {
        width: 80%;
        border: 1px solid #444444;
        border-radius: 5pt;
        font-size: 14pt;
    }


    /* -------------------------------------------------------- */

    a {
	text-decoration: none;
}
ul {
	list-style-type: none;
}

.radio-section {
    width: 100%;
    height: auto;
	display: grid;
    grid-template-columns: repeat(3, 1fr);
    column-gap: 10px;
}

.radio-item [type="radio"] {
	display: none;
    
}
.radio-item {
    width: 95%;
	margin: auto;
}
.radio-item label {
	display: block;
	padding: 10px 10px;
	background: #ffffff;
	border: 1px solid rgba(255, 255, 255, 0.1);
	border-radius: 8px;
	cursor: pointer;
	font-size: 28px;
	font-weight: 400;
	white-space: nowrap;
	position: relative;
	transition: 0.4s ease-in-out 0s;
    text-align: center;
	
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
    background-color: #0cb3bfe3;
	color: #fff;
}

    /* --------- */

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
    
      .header {
    margin: 0; 
    width: 100%; 
    font-size: 68pt; 
    font-weight: 600; 
    text-align: center;
      }
      
      .paragraph {
          margin: auto; 
          width: 75%; 
          font-size: 28pt; 
          text-align: center; 
          color: #444444; 
          font-weight: 500;
      }
      
    /*-----------------------------------------------------*/
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        
        .anl-logo {
            width: 40%; 
            height: auto; 
            margin-top: 25%;
        }
        
        .box1 {
            margin: auto; 
            width: 100%; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 25%;
        }
        
        .header {
            margin: 0; 
            width: 100%; 
            font-size: 28pt; 
            font-weight: 600; 
            text-align: center;
        }
      
        .paragraph {
            margin: auto; 
            width: 75%; 
            font-size: 12pt; 
            text-align: center; 
            color: #444444; 
            font-weight: 500;
        }
        
        .language-box {
            margin: auto; 
            width: 80%; 
            margin-top: 30px;
        }
        
        select {
            font-size: 14pt; 
        }
        
        option {
            font-size: 14pt; 
        }
    }
      
    
    /*---------------------------------------------------*/
    
    @media only screen and (max-device-width: 767px) {
        
        .anl-logo {
            width: 60%; 
            height: auto; 
            margin-top: 25%;
        }
        
        .box1 {
            margin: auto; 
            width: 100%; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 35%;
        }
        
        .header {
            margin: 0; 
            width: 100%; 
            font-size: 28pt; 
            font-weight: 600; 
            text-align: center;
        }
      
        .paragraph {
            margin: auto; 
            width: 75%; 
            font-size: 12pt; 
            text-align: center; 
            color: #444444; 
            font-weight: 500;
        }
        
        .language-box {
            margin: auto; 
            width: 80%; 
            margin-top: 30px;
        }
        
        select {
            font-size: 14pt; 
        }
        
        option {
            font-size: 14pt; 
        }
    }




  </style>
  <body>
      
    
    <div style="display: flex; justify-content: center;">
        <img src="assets/images/logo-anl.png" class="anl-logo">
    </div>

    <div class="box1">
        <h1 class="header">
            Welcome to<br>Aesthetic Links!
        </h1>
        <p class="paragraph">Choose your preferred language for the ultimate app experience.</p>
        
        <div class="language-box">
            <select name="city" id="city">
                <option value="1">Select a language</option>
                <option value="2">English</option>
            </select>
        </div>
    </div>

    <div style="margin: auto; width: 80%; height: auto; display: flex; justify-content:space-between; position: relative;">
        
        <h1 style="margin: 0; padding: 0; color: #fff; font-size: 48px; font-weight: 600;">.</h1>
        
        <a href="onboarding2.blade.php" style="text-decoration: none; color: #0C1E36;">
            <h3 onboardingstyle="margin: 0; padding: 0; color: #0C1E36; font-size: 14pt; font-weight: 500; bottom: 5%; right: 20%;">
                Next <i class="fa-solid fa-arrow-right" style="color: #000; font-size: 14pt;"></i>
            </h3>
        </a>
    </div>
    

    

  </body>
</html>
