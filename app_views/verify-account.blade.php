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
    <!-- End Google Tag Manager -->

</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<style>
    .iti {
        width: 100%;
    }

    .iti-mobile .iti--container {
        top: 38%;
        transform: translate(-50%);
        bottom: 0;
        left: 50%;
        right: 0;
        width: 98%;
        position: fixed;
    }

    .iti__selected-flag::after {
        content: "";
        height: 25px;
        width: 1px;
        background-color: #DFE1E3;
        position: absolute;
        transform: translate(0%, -50%);
        top: 50%;
        right: -9px;
    }

    .country_code {
        position: absolute;
        top: 48%;
        left: 21%;
        transform: translate(-50%, 0%);
        color: #87898D;
    }
</style>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <div class="position-absolute back-btn-wrap mt-5  d-flex justify-content-center align-items-center">
        <a href="./register.blade.php" class="back-container">
            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.000839496 7.28098C0.00735402 7.0313 0.116999 6.79267 0.308549 6.61127L7.06059 0.307974C7.26834 0.115614 7.55272 0.00492265 7.85139 0.000160568C8.15006 -0.00460151 8.43865 0.0969545 8.65391 0.282569C8.86917 0.468184 8.99355 0.722714 8.99976 0.990367C9.00596 1.25802 8.8935 1.51696 8.68703 1.71043L2.68231 7.3125L8.68703 12.9146C8.8935 13.108 9.00596 13.367 8.99976 13.6346C8.99355 13.9023 8.86917 14.1568 8.65391 14.3424C8.43865 14.528 8.15006 14.6296 7.85139 14.6248C7.55272 14.6201 7.26834 14.5094 7.06059 14.317L0.308549 8.01373C0.205353 7.91614 0.124961 7.80104 0.0721174 7.6752C0.0192741 7.54937 -0.00495415 7.41533 0.000839496 7.28098Z" fill="#0C1E36" />
            </svg>

        </a>
    </div>
    <div class="container-fluid">
        <div class="col-12 title-main">
            <h1 class="heading_main_verify"> <span class="required-astrict">Verify</span> Your Account</h1>

            <div class="main-info small-text  ">
                <p>Please enter your phone number so we can </p>
                <p>verify your account</p>
            </div>
        </div>
        <div class="col-12  main-content">
            <form action="./backend/insert/verify-number.php" class=" mt-3" method="POST">
                <?php
                $old_input = isset($_SESSION['old_input']) ? $_SESSION['old_input'] : [];
                if (isset($_SESSION['errors_validation'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    foreach ($_SESSION['errors_validation'] as $error) {
                        echo '<p>' . $error . '</p>';
                    }
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';

                    unset($_SESSION['errors_validation']);
                }
                ?>
                <div class="mb-2 position-relative">
                    <label for="phone" class="form-label m-0">Phone Number <span class="required-astrict">*</span></label>
                    <input type="tel" required class="form-control" name="mobile" id="phone" placeholder="794123789" style="padding-left: 100px !important;" value="<?php echo htmlspecialchars($old_input['mobile'] ?? ''); ?>">
                    <span class="country_code">+41</span>
                </div>
                <input type="hidden" name="mobile_code" id="mobile_code" value="<?php echo htmlspecialchars($old_input['mobile_code'] ?? ''); ?>">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                <script>
                    const phoneInputField = document.querySelector("#phone");
                    const iti = window.intlTelInput(phoneInputField, {
                        initialCountry: "AE",
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                    });

                    updateCountryCode();

                    phoneInputField.addEventListener('countrychange', function() {
                        updateCountryCode();
                    });

                    function updateCountryCode() {
                        const selectedCountryData = iti.getSelectedCountryData();
                        const countryCodeSpan = document.querySelector(".country_code");
                        const mobile_code = document.querySelector("#mobile_code");

                        if (selectedCountryData && selectedCountryData.dialCode) {
                            countryCodeSpan.textContent = "+" + selectedCountryData.dialCode;
                            mobile_code.value = "+" + selectedCountryData.dialCode;
                        } else {
                            countryCodeSpan.textContent = "";
                        }
                    }
                </script>




                <button type="submit" class="btn w-100 btn-primary mt-4">Get Verification Code</button>
                <!-- Form End -->
            </form>
        </div>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            console.log("Document ready"); // Debugging statement

            $('#TogglePassword').change(function() {
                console.log("Checkbox change event fired"); // Debugging statement

                const passwordInput = $('#exampleInputPassword1');
                if ($(this).is(':checked')) {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });

            function updateIconAndText(isCollapsed) {
                const svg = $('#toggleIcon');
                const link = $('#referralLink');

                if (!isCollapsed) {
                    svg.html('<path d="M12.328 7.152H7.216V12.336H5.176V7.152H0.0880001V5.304H5.176V0.0959988H7.216V5.304H12.328V7.152Z" fill="#10B2BD" />');
                    link.text('Got a Referral Code?').addClass('collapsed');
                } else {
                    svg.html('<path d="M9.968 0.279999V2.128H0.392V0.279999H9.968Z" fill="#0C1E36"/>');
                    link.text('Referral Code').removeClass('collapsed');
                }
            }

            $('#referralLink, #toggleIcon').on('click', function(e) {
                e.preventDefault();
                const collapseElement = $('#collapseExample');
                const isCollapsed = !collapseElement.hasClass('show');
                collapseElement.toggleClass('show');
                updateIconAndText(isCollapsed);
            });

            // Initial update based on initial state
            updateIconAndText($('#collapseExample').hasClass('show'));

        });
    </script>
    <script>
        // function validatePhoneNumber(input) {
        //     const phoneNumber = input.value.trim();

        //     // Check if the input starts with "971"
        //     if (!phoneNumber.startsWith("971")) {
        //         // If not, add "971" to the beginning of the input
        //         input.value = "971" + phoneNumber;
        //     }
        // }
    </script>
    <script>
        // Fetch countries data from REST Countries API
        fetch('https://restcountries.com/v2/all')
            .then(response => response.json())
            .then(data => {
                const countrySelect = document.getElementById('countrySelect');
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.callingCodes[0]; // Use alpha2Code as the value
                    option.textContent = country.name + ' (' + country.callingCodes[0] + ')';
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));
    </script>

    <!-- <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script> -->
</body>

</html>