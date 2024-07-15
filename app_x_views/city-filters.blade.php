<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Aesthetic Links | City Filters</title>
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
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
    </style>
<body>

    <nav>
        <div class="location-dropdown-container">
            <button class="back-btn"><i class="fa-solid fa-angle-left" style="color: #a1a1a1; font-size: 28px;"></i></button>
                <div class="location-dropdown">
                    <h1 style="margin: auto; padding: 0; font-size: 54px; text-indent: 100px; font-weight: 700;">Select a city</h1>
                </div>
        </div>
        
    </nav>

    <section class="profile-dashboard">
        <div class="your-account">

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/globe.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">show all clinic locations</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->            

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/current-location.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">use my current location</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
            
            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/uae.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">Abu Dhabi</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- --> 

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/uae.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">Dubai</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- --> 

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/uae.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">Sharjah</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- --> 

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/uae.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">Ajman</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- --> 

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/uae.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">Ras Al Khaimah</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- --> 

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/uae.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">Fujairah</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- --> 

            <div class="button-your-account">
                <button>
                    <div style="width: 100%; height: auto; display: grid; grid-template-columns: repeat(2, 10% 90%); column-gap: 2%; margin: auto;">
                        <div style="width: 100%; height: auto;"><img src="assets/images/uae.png" style="width: 45px; height: auto;"></div>
                        <div style="text-align: left;">Umm Al Quwain</div>
                    </div>
                    <input type="checkbox" style="width: 30px; height: 30px; margin: auto;">

                </button>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- --> 

        </div>
    </section>
    
</body>
</html>