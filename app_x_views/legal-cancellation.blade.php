<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Landing Page</title>
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>

    body {
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
        height: 100px;
        font-size: 38px;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
    }

    .spacer {
        width: 100%; 
        height: 20vw; 
    }

    .first-section {
        display: flex;
        justify-content: center;
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
    }

    .content-container {
        width: 90%;
        height: auto;
        margin: 0;
        padding: 0;
        margin-bottom: 5%;
    }

    .back {
        position: absolute;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 2px solid #212121;
        background-color: transparent;
        margin-top: 5vw;
    }

    .back a {
        width: 100%; 
        text-decoration: none; 
        color:#212121; 
        cursor: pointer;
    }
    
    .back a i {
        color: #212121; 
        font-size: 28px;
    }
    
    .location-dropdown img {
        margin: auto; 
        width: 300px; 
        height: auto;
    }
    
    h1 {
        width: 100%; 
        height: auto; 
        text-align: left; 
        font-size: 34px;
        margin: 0; 
        margin-top: 7%;
    }
    
    h2 {
        width: 100%; 
        height: auto; 
        text-align: center; 
        font-size: 34px; 
        margin: 0; 
        margin-top: 7%;
    }
    
    li {
        font-size: 34px; 
        font-weight: 500;
    }
    
    p {
        width: 100%; 
        height: auto; 
        text-align: justify; 
        font-size: 30px; 
        margin: auto; 
        font-weight: 400;
    }
    
    /*--------------------------------------------*/
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        nav {
            padding-top: 5pt;
            padding-bottom: 5pt;
        }
        
        .back {
            position: absolute;
            width: 30pt;
            height: 30pt;
            border-radius: 50%;
            border: 1px solid #212121;
            background-color: transparent;
            margin-top: 5vw;
        }
    
        .back a {
            width: 100%; 
            text-decoration: none; 
            color:#212121; 
            cursor: pointer;
        }

        .back a i {
            color: #212121; 
            font-size: 18px;
        }
        
        .location-dropdown img {
            margin: auto; 
            width: 175px; 
            height: auto;
        }
        
        .spacer {
            width: 100%; 
            height: 15vw; 
        }
        
        h1 {
            width: 100%; 
            height: auto; 
            text-align: left; 
            font-size: 18px;
            margin: 0; 
            margin-top: 7%;
        }
        
        h2 {
            width: 100%; 
            height: auto; 
            text-align: center; 
            font-size: 18px; 
            margin: 0; 
            margin-top: 7%;
        }
        
        li {
            font-size: 18px; 
            font-weight: 500;
        }
        
        p {
            width: 100%; 
            height: auto; 
            text-align: justify; 
            font-size: 14px; 
            margin: auto; 
            font-weight: 400;
        }
    }
    
    @media only screen and (max-device-width: 767px) {
        nav {
            padding-top: 5pt;
            padding-bottom: 5pt;
        }
        
        .back {
            position: absolute;
            width: 30pt;
            height: 30pt;
            border-radius: 50%;
            border: 1px solid #212121;
            background-color: transparent;
            margin-top: 5vw;
        }
    
        .back a {
            width: 100%; 
            text-decoration: none; 
            color:#212121; 
            cursor: pointer;
        }

        .back a i {
            color: #212121; 
            font-size: 18px;
        }
        
        .location-dropdown img {
            margin: auto; 
            width: 175px; 
            height: auto;
        }
        
        .spacer {
            width: 100%; 
            height: 35vw; 
        }
        
        h1 {
            width: 100%; 
            height: auto; 
            text-align: left; 
            font-size: 18px;
            margin: 0; 
            margin-top: 7%;
        }
        
        h2 {
            width: 100%; 
            height: auto; 
            text-align: center; 
            font-size: 18px; 
            margin: 0; 
            margin-top: 7%;
        }
        
        li {
            font-size: 18px; 
            font-weight: 500;
        }
        
        p {
            width: 100%; 
            height: auto; 
            text-align: justify; 
            font-size: 14px; 
            margin: auto; 
            font-weight: 400;
        }
    }
    
    
    
    
    
        
    /* phones */
@media only screen and (max-width: 767px) {
    
#content-big-container{
  width: 100%; 
  height: auto; 
  margin-top: 5%;
}
}

/*  tablets */
@media only screen and (min-width: 768px) and (max-width: 1023px) {
    
    nav {
    padding-top: 1%;
    padding-bottom: 1%;
}
    
    .spacer {
    height: 10vw;
}
    .content-container {
    display: contents;
}
#content-big-container{
    width: 50%
}
.back {
    left: 10%;
    margin-top: 1vw;
}
p {
    font-size: 20px;
}
h1 {
    font-size: 30px;
}
.first-section {
    margin-top: 50px;
}






}


/*  laptops and larger screens */
@media only screen and (min-width: 1024px) {
nav {
    padding-top: 1%;
    padding-bottom: 1%;
}
.spacer {
    height: 10vw;
}
.content-container {
    display: contents;
}
#content-big-container{
    width: 50%
}
.back {
    left: 10%;
    margin-top: 1vw;
}
p {
    font-size: 20px;
}
h1 {
    font-size: 30px;
}

.first-section {
    margin-top: 50px;
}


    
}
    
    
    
    
    
</style>

<body>
    <nav>
        <div class="location-dropdown-container">
            <div style="width: 100%;">
                <button class="location-dropdown">
                    <img src="assets/images/logo-anl.png"></i>
                </button>
            </div>
        </div>
        
    </nav>
    <section class="spacer"></section>

    <section class="first-section">
        <div class="content-container">
            <button class="back">
                <a href="profile.blade.php">
                    <i class="fa-solid fa-angle-left"></i>
                </a> 
            </button>

            <div id="content-big-container">
                

                <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                <h1>Cancellation</h1><br>
                <ul>
                    <li>
                        <p>Cancellations made 10 minutes after placing the request are free of charge.</p><br>
                    </li>
                    <li>
                        <p>Cancellations made more than 12 hours before the appointment are free of charge.</p><br>                        
                    </li>
                    <li>
                        <p>Cancellations made between 2 and 12 hours before the appointment are subject to a 25% cancellation fee.</p><br>                        
                    </li>
                    <li>
                        <p>In cases where the appointment is missed, a 100% cancellation fee will be charged.</p><br>                        
                    </li>
                </ul>

                <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                <h1>Reschedule</h1><br>
                <ul>
                    <li>
                        <p>Reschedules made 10 minutes after placing the request are free of charge.</p><br>
                    </li>
                    <li>
                        <p>Reschedules made more than 12 hours before the appointment are free of charge.</p><br>                        
                    </li>
                    <li>
                        <p>Reschedules made between 2 and 12 hours before the appointment are free of charge.</p><br>                        
                    </li>
                    <li>
                        <p>Reschedules made less than 2 hours before the appointment are subject to a 25% cancellation fee.</p><br>                        
                    </li>
                </ul>


            </div>
        </div>

    </section>
    

    
    
</body>
</html>