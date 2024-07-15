<?php session_start();
require("./auth-check.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N7QLJTK5');
    </script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<style>
    .otp-input-container {
        display: flex;
        justify-content: flex-start;
        flex-direction: row;
    }

    .otp-input {
        width: 68px;
        margin: 0px 10px;
        height: 68px;
        font-size: 18px;
        background: #F4F4F4;
        text-align: center;
        border: 1px solid #F4F4F4;
        border-radius: 15px;
        font-weight: 800 !important;
    }
</style>
<!-- <style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
    }

    /* Add padding to containers */
    .register-container {
        width: 100%;
        margin: 0;
        background-color: white;
        margin-top: 20vw;
    }

    .register-container h1 {
        margin: 0;
        font-size: 28px;
        margin-bottom: 10px;
        text-align: center;
    }

    .register-container p {
        margin: 0;
        font-size: 14px;
        margin-bottom: 10px;
        text-align: center;
    }



    /* Set a style for the submit button */
    .registerbtn {
        background-color: #0C1E36;
        font-family: "Poppins", sans-serif;
        height: 45px;
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

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        text-align: center;
    }

    /*--------------------------------------*/

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: max-content;
        margin-bottom: 15vw;
    }

    .input {
        width: 45px;
        height: 45px;
        border: 1px solid #e3e3e3;
        border-radius: 14px;
        margin: 0 10px;
        text-align: center;
        font-size: 18px;
        cursor: not-allowed;
        pointer-events: none;
    }

    .input:focus {
        border: 1px solid #666;
        outline: none;
    }

    .input:nth-child(1) {
        cursor: pointer;
        pointer-events: all;
    }
</style> -->

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- <form action="verified-otp-post.blade.php" method="POST">
        <?php


        ?>
        <div class="register-container">
            <h1>Mobile Verification</h1>
            <p>Enter the verification code we sent you on:<br> XXX XXX XXXX</p>

            <div class="container">
                <div id="inputs" class="inputs">
                    <input class="input" name="code1" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input" name="code2" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input" name="code3" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input" name="code4" type="text" inputmode="numeric" maxlength="1" />
                </div>
            </div>
            <input type="hidden" name="mobile" value="<?= $_GET['m'] ?>">

            <button type="submit" class="registerbtn">Verify</button>

        </div>

        <div class="container signin">
            <p><a href="resend-otp.blade.php?m=<?= $_GET['m'] ?>" style="color: #0CB4BF; text-decoration: none; font-weight: 500;">resend OTP</a>.</p>
        </div>
        <a onclick="goBack()" style="text-decoration: none;">Go Back </a>

    </form> -->
    <div class="position-absolute back-btn-wrap mt-5  d-flex justify-content-center align-items-center">
        <a href="verify-account.blade.php" class="back-container">
            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.000839496 7.28098C0.00735402 7.0313 0.116999 6.79267 0.308549 6.61127L7.06059 0.307974C7.26834 0.115614 7.55272 0.00492265 7.85139 0.000160568C8.15006 -0.00460151 8.43865 0.0969545 8.65391 0.282569C8.86917 0.468184 8.99355 0.722714 8.99976 0.990367C9.00596 1.25802 8.8935 1.51696 8.68703 1.71043L2.68231 7.3125L8.68703 12.9146C8.8935 13.108 9.00596 13.367 8.99976 13.6346C8.99355 13.9023 8.86917 14.1568 8.65391 14.3424C8.43865 14.528 8.15006 14.6296 7.85139 14.6248C7.55272 14.6201 7.26834 14.5094 7.06059 14.317L0.308549 8.01373C0.205353 7.91614 0.124961 7.80104 0.0721174 7.6752C0.0192741 7.54937 -0.00495415 7.41533 0.000839496 7.28098Z" fill="#0C1E36" />
            </svg>

        </a>
    </div>

    <div class="container-fluid">
        <div class="col-12 title-main">
            <h1 class="heading_main_verify">Mobile <span class="required-astrict">Verification</span></h1>

            <div class="main-info small-text  ">
                <p>Please enter the OTP Verification Code</p>
            </div>
        </div>
        <div class="col-12  main-content">
            <form action="./backend/insert/verify-otp.php" class=" mt-3" method="POST">
                <?php
                $old_input = isset($_SESSION['error_otp']) ? $_SESSION['error_otp'] : [];
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert  alert-success alert-dismissible fade show" role="alert">';
                    echo $_SESSION['message'];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                    unset($_SESSION['message']);
                } elseif (isset($_SESSION['error_message'])) {
                    echo '<div class="alert  alert-danger alert-dismissible fade show" role="alert">';
                    echo $_SESSION['error_message'];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                    unset($_SESSION['error_message']);
                } else if (isset($_SESSION['error_otp'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    foreach ($_SESSION['error_otp'] as $error) {
                        echo '<p>' . $error . '</p>';
                    }
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';

                    unset($_SESSION['error_otp']);
                }

                ?>

                <div class="mb-2  ">
                    <div class="otp-input-container">
                        <input type="text" class="otp-input" name="code1" required style="margin-left: 0 !important;" maxlength="1" onkeyup="moveToNext(event)">
                        <input type="text" class="otp-input" name="code2" required maxlength="1" onkeyup="moveToNext(event)">
                        <input type="text" class="otp-input" name="code3" required maxlength="1" onkeyup="moveToNext(event)">
                        <input type="text" class="otp-input" name="code4" required maxlength="1" onkeyup="moveToNext(event)">
                    </div>
                </div>
                <input type="hidden" name="mobile" value="<?= $_GET['m'] ?? "" ?>">
                <div class="col-12 text-center mt-3">
                    <p>I didn’t get any code.<a href="./backend/insert/resend-otp.php" class="text-primary"> Resend OTP</a></p>
                </div>
                <button type="submit" class="btn w-100 btn-primary" style="margin-top: 75px !important;">Verify</button>

            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function goBack() {
            window.history.back();
        }
        // script.js
        const inputs = document.getElementById("inputs");

        inputs.addEventListener("input", function(e) {
            const target = e.target;
            const val = target.value;

            if (isNaN(val)) {
                target.value = "";
                return;
            }

            if (val != "") {
                const next = target.nextElementSibling;
                if (next) {
                    next.focus();
                }
            }
        });

        inputs.addEventListener("keyup", function(e) {
            const target = e.target;
            const key = e.key.toLowerCase();

            if (key == "backspace" || key == "delete") {
                target.value = "";
                const prev = target.previousElementSibling;
                if (prev) {
                    prev.focus();
                }
                return;
            }
        });
    </script>
    <script>
        function moveToNext(event) {
            const currentInput = event.target;
            const maxLength = parseInt(currentInput.getAttribute('maxlength'));
            const keyCode = event.keyCode || event.which;

            if (keyCode === 8) { // Handle backspace
                const previousInput = currentInput.previousElementSibling;
                if (previousInput && previousInput.classList.contains('otp-input')) {
                    previousInput.focus();
                }
            } else if (keyCode === 86 && event.ctrlKey) { // Handle paste (Ctrl+V)
                event.preventDefault();
                const clipboardData = event.clipboardData || window.clipboardData;
                const pastedData = clipboardData.getData('text');
                if (/^\d{4}$/.test(pastedData)) {
                    const otpInputs = document.querySelectorAll('.otp-input');
                    let index = 0;
                    otpInputs.forEach((input, i) => {
                        if (input === currentInput) {
                            index = i;
                        }
                    });

                    otpInputs[index].value = pastedData[0];
                    otpInputs[index + 1].value = pastedData[1];
                    otpInputs[index + 2].value = pastedData[2];
                    otpInputs[index + 3].value = pastedData[3];

                    // Move focus to the next input after pasting
                    if (index + 3 < otpInputs.length) {
                        setTimeout(() => { // Add a slight delay after pasting
                            otpInputs[index + 3].focus();
                        }, 50);
                    }
                }
            } else if (keyCode >= 48 && keyCode <= 57) { // Handle numeric keys (0-9)
                if (currentInput.value.length === maxLength) {
                    const nextInput = currentInput.nextElementSibling;
                    if (nextInput && nextInput.classList.contains('otp-input')) {
                        setTimeout(() => { // Add a slight delay after typing
                            nextInput.focus();
                        }, 50);
                    }
                }
            }
        }
    </script>


</body>

</html>