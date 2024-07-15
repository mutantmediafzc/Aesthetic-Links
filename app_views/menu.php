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
<!-- Menu Modal -->

<style>
    .closeModalMenu {
        position: absolute;
        border-style: none;
        width: 100%;
        height: 65vh;
        background-color: transparent;
    }
</style>

<style>
    @font-face {
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
            url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }

    a {
        -webkit-tap-highlight-color: transparent;
        font-family: 'poppinsregular';
    }

    buttons {
        -webkit-tap-highlight-color: transparent;
        font-family: 'poppinsregular';
    }

    /* --------------------------------menu------------------------------------- */

    .custom-modal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.6);
    }

    .custom-modal-content {
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
        top: 0;
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
        display: none;
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
        font-size: 28pt;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
        font-family: 'poppinsregular';
    }

    .overlay-black {
        display: flex;
        justify-content: flex-end;
        flex-direction: column;
        position: absolute;
        top: 0;
        right: 0px;
        bottom: 0;
        left: 0px;
        padding: 0;
        background-size: cover;
        background-position: center center;
        border-radius: 20px;
    }

    .overlay-black:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0.6));
        border-radius: 20px;
    }

    #hamburger-icon {
        color: #fff;
        font-size: 48px;
    }

    .custom-modal-logo {
        width: 375px;
        height: auto;
    }

    .custom-modal-item-box {
        width: min-content;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        column-gap: 0px;
    }


    .custom-modal-item {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 110px;
        height: 110px;
        border: 1px solid #444444;
        border-radius: 50%;
    }

    .custom-modal-item-icon {
        width: 45px;
        height: auto;
    }

    .custom-modal-name-box {
        width: fit-content;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        column-gap: 60px;
        justify-items: center;
    }

    .custom-modal-name {
        width: 100%;
        height: auto;
    }

    .custom-modal-p {
        width: 100%;
        text-align: center;
        font-size: 24px;
        margin-top: 10px;
    }

    .custom-modal-p-1 {
        width: 100%;
        text-align: center;
        font-size: 24px;
        margin-left: -35px;
    }

    .custom-modal-content-box {
        margin: auto;
        width: 65%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        margin-top: 12%;
    }

    #circle {
        color: #444444;
        font-size: 10px;
    }

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {

        nav {
            display: block;
            padding-top: 10pt;
            padding-bottom: 10pt;
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

        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;

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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .location-dropdown img {
            margin: 0;
        }

        .custom-modal-logo {
            width: 125pt;
            height: auto;
        }

        .custom-modal-item {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35pt;
            height: 35pt;
            border: 1px solid #444444;
            border-radius: 50%;
        }

        .custom-modal-item-icon {
            width: 15pt;
            height: auto;
        }

        .custom-modal-item-box {
            width: min-content;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 0pt;
        }


        .custom-modal-name-box {
            width: fit-content;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 15pt;
            justify-items: center;
        }

        .custom-modal-name {
            width: 35pt;
            height: auto;
        }

        .custom-modal-p {
            width: 100%;
            text-align: center;
            font-size: 8pt;
        }

        .custom-modal-p-1 {
            width: 100%;
            text-align: center;
            font-size: 8pt;
            margin-left: -7pt;
        }

        .custom-modal-content-box {
            margin: auto;
            width: 40%;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 10%;
        }

        #circle {
            color: #444444;
            font-size: 6pt;
        }
    }

    @media only screen and (max-device-width: 767px) {

        .black-bar {
            width: 55px;
            height: 3px;
            border-radius: 10px;
            background-color: #000;
            margin-bottom: 10px;
        }

        .second-line {
            width: 100%;
            display: flex;
            width: 100%;
            display: flex;
            justify-content: flex-start;
            column-gap: 5px;
        }

        .custom-modal-content {
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

        nav {
            display: block;
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
            right: 4%;
            margin-top: 18pt;
        }

        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;

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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .location-dropdown img {
            margin: 0;
        }

        .custom-modal-logo {
            width: 125pt;
            height: auto;
        }

        .custom-modal-item {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40pt;
            height: 40pt;
            border: 1px solid #444444;
            border-radius: 50%;
        }

        .custom-modal-item a {
            height: max-content;
        }

        .custom-modal-item-icon {
            width: 15pt;
            height: auto;
        }

        .custom-modal-item-box {
            width: min-content;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 0pt;
        }


        .custom-modal-name-box {
            width: fit-content;
            height: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 15pt;
            justify-items: center;
        }

        .custom-modal-name {
            width: 40pt;
            height: auto;
        }

        .custom-modal-p {
            width: fit-content;
            text-align: center;
            font-size: 8pt;
        }

        .custom-modal-p-1 {
            width: 100%;
            text-align: center;
            font-size: 8pt;
            margin-left: -7pt;
        }

        .custom-modal-content-box {
            margin: auto;
            width: max-content;
            height: auto;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin-top: 5%;
        }

        #circle {
            color: #444444;
            font-size: 3pt;
        }

    }
</style>

<div id="menuModal" class="custom-modal">

    <!-- Menu Modal -->
    <div class="custom-modal-content" style=" display: grid; grid-template-columns: repeat(1, 1fr);">
        <div class="custom-modal-content-box" style="">
            <div style="width: 100%; height: auto; display: flex; justify-content: center;"><img src="assets/images/logo-anl.png" class="custom-modal-logo"></div><br>
            <div class="custom-modal-item-box">
                <div style="
                        display: flex;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            width: 90px;
                        ">

                    <div style="
                        display: flex;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                                width: 90px;
                        ">

                        <div class="custom-modal-item">
                            <a href="landing-page.blade.php" style="display: flex; justify-content: center; align-items: center; text-decoration: none; color: #000;">
                                <img src="assets/images/home.svg" class="custom-modal-item-icon">
                            </a>
                        </div>
                        <a href="landing-page.blade.php" style="text-decoration: none; color: #000;">
                            <div>
                                <p class="custom-modal-p">Home</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div style="
                        display: flex;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                                width: 90px;
                        ">


                    <div class="custom-modal-item">
                        <a href="myappointments.php?profilelevel=<?= $profilelevel ?>" style="display: flex; justify-content: center; align-items: center; text-decoration: none; color: #000;">
                            <img src="assets/images/appointment.svg" class="custom-modal-item-icon">
                        </a>
                    </div>
                    <a href="myappointments.php?profilelevel=<?= $profilelevel ?>" style="text-decoration: none; color: #000;">
                        <div>
                            <p class="custom-modal-p">Appointments</p>
                        </div>
                    </a>
                </div>

                <div style="
                        display: flex;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                                width: 90px;
                        ">


                    <div class="custom-modal-item">
                        <a href="discover-page.blade.php" style="display: flex; justify-content: center; align-items: center; text-decoration: none; color: #000;">
                            <img src="assets/images/discover1.svg" class="custom-modal-item-icon" style="width: 30px; height: 30px;">

                        </a>
                    </div>

                    <a href="discover-page.blade.php" style="text-decoration: none; color: #000;">
                        <div>
                            <p class="custom-modal-p" style="">Discover</p>
                        </div>
                    </a>
                </div>

                <div style="
                        display: flex;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                                width: 90px;
                            
                        ">

                    <div class="custom-modal-item">
                        <a href="profile.blade.php" style="display: flex; justify-content: center; align-items: center; text-decoration: none; color: #000;">
                            <img src="assets/images/usermenu.svg" class="custom-modal-item-icon">
                        </a>
                    </div>

                    <a href="profile.blade.php" style="text-decoration: none; color: #000;">
                        <div>
                            <p class="custom-modal-p" style="">User</p>
                        </div>
                    </a>

                </div>

            </div>

        </div>

        <div class="closeMenu"><i class="fa-solid fa-xmark"></i></div>

        <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
            <div class="black-bar"></div>
        </div>



    </div>

    <button class="closeModalMenu" id="closeMenuModal"></button>

</div>

<!-- ----------------------------menu custom-modal end------------------------ -->


<script>
    $(document).ready(function() {
        // When the user clicks the button, open the modal
        $('#menuBtn').click(function() {
            $('#menuModal').show();
        });

        // When the user clicks on close button, close the modal
        $('#closeMenuModal').click(function() {
            $('#menuModal').hide();
        });
        $('.closeMenu').click(function() {
            $('#menuModal').hide();
        });

        // Optional: When the user clicks anywhere outside of the modal, close it
        $(window).click(function(event) {
            if ($(event.target).is('#menuModal')) {
                $('#menuModal').hide();
            }
        });
    });


    var modal = document.getElementById("menuModal");
    var closeBtn = document.getElementById("closeMenuModal");

    // When the user clicks the button, close the modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }
</script>