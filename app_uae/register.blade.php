<?php
session_start();
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
  <!-- <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      line-height: 1.7;
      width: 100%;
    }

    /* Add padding to containers */
    .register-container {
      width: 90%;
      margin: auto;
      background-color: white;
      margin-top: 20vw;
    }

    .register-container h1 {
      margin: 0;
      font-size: 28px;
      margin-bottom: 10px;
    }

    .register-container p {
      margin: 0;
      font-size: 14px;
      margin-bottom: 10px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      margin: 5px 0 22px 0;
      display: inline-block;
      height: 50px;
      : none;
      background: #fff;
      : 1px solid #ccc;
      -radius: 5px;
      text-indent: 15px;
      font-family: "Poppins", sans-serif;
      font-size: 16px;
      padding: 0;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #fff;
      : 1px solid #ccc;
      outline: none;
    }

    /*Mobile number  */
    input[type=text],
    input[type=number],
    input[type=email] {
      width: 100%;
      margin: 5px 0 22px 0;
      display: inline-block;
      height: 50px;
      : none;
      background: #fff;
      : 1px solid #ccc;
      -radius: 5px;
      text-indent: 15px;
      font-family: "Poppins", sans-serif;
      font-size: 16px;
    }



    input[type=text]:focus,
    input[type=number]:focus,
    input[type=email]:focus {
      background-color: #fff;
      : 1px solid #ccc;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      : 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
      background-color: #0C1E36;
      font-family: "Poppins", sans-serif;
      height: 50px;
      font-size: 16px;
      font-weight: 500;
      -radius: 5px;
      color: white;
      : none;
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

    .select-code {
      width: 100%;
      margin: 5px 0 22px 0;
      display: inline-block;
      height: 40pt;
      : none;
      background: #fff;
      : 1px solid #ccc;
      -radius: 5px;
      font-family: "Poppins", sans-serif;
      font-size: 16px;
      text-indent: 14px;

      background: url("data:image/svg+xml,<svg height='10px' width='10px' viewBox='0 0 16 16' fill='%23000000' xmlns='http://www.w3.org/2000/svg'><path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/></svg>") no-repeat;
      background-position: calc(100% - 0.75rem) center !important;
      -moz-appearance: none !important;
      -webkit-appearance: none !important;
      appearance: none !important;
      padding-right: 2rem !important;
    }

    .select-code:focus {
      outline: none;
    }

    .option-mobile-code {
      color: #212121;
    }
  </style> -->
</head>

<?php //require_once 'server.blade.php'; 
?>


<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- <form action="register-user.blade.php" method="POST">

    <div class="register-container">
      <?php
      // session_start();

      // // Check if an error message is set
      // if (isset($_SESSION['error_message'])) {
      //   // Display the error message
      //   echo "<p style='color:red;' >Error: " . $_SESSION['error_message'] . '</p><br><br>';

      //   // Clear the error message to show it only once
      //   unset($_SESSION['error_message']);
      // }
      ?>
      <h1 style="margin-top: -60px;">Getting started!</h1>
      <p style="margin-top:-10px;">Create an account to start your journey</p>
      <p style="font-size: 12pt; color: #444444; margin-top: -5px;"> Please fill all the (*)</p>

      <div style="width: 100%; display: grid; grid-template-columns: repeat(1, 1fr); height: max-content;">
        <div>
          <label for="name" style="font-weight: 500;">Full Name *</label>
          <input type="text" placeholder="John Doe" name="username" id="name" required>
        </div>
        <div>
          <label for="email" style="font-weight: 500;">Email *</label>
          <input style="float: left;" type="email" placeholder="johndoe@gmail.com" name="email" id="email" required>
        </div>
        <div>
          <label for="psw" style="font-weight: 500;">Password *</label>
          <input style="float: left;" type="password" placeholder="Password" name="password" id="password" required>
          <a onclick="myFunction()" style="margin-top:-58px; margin-right: 20px; float:right; z-index: 1000;"><img src="assets/images/password-reveal.svg" height="20px" width="20px"></a>
        </div>
        <div>
          <label for="mbl" style="font-weight: 500;">Mobile * <span style="font-size:12px; color:#6f6f6f"><i>Country Code & Mobile - without
                (+)</i></span></label>
          <div style="display: grid; grid-template-columns: repeat(2, 63% 34%); column-gap: 3%">
            <div style="width: 100%">
              <select class="select-code" name="mobile_code" id="countrySelect">
              </select>
            </div>
            <div style="width: 100%">
              <input type="number" id="phone" placeholder="505005050" name="mobile" id="mobile" style="width: 100%; padding: 0;" required>
            </div>

          </div>
        </div>

        <div>
          <label for="rfr" style="font-weight: 500;">Referral Code (Optional)</label>
          <input type="text" placeholder="Enter a Referral Code" name="referral" id="referral">
        </div>

      </div>

      <input type="hidden" name="userlevel" value="1">
      <input type="hidden" name="profilelevel" value="0">

      <p style="font-size: 12px; width: 100%; text-align: center; font-weight: 500; margin-bottom: 20px; margin-top: 0px">
        By signing up I agree with <a href="register-legal-terms-and-conditions.blade.php" style="color: #0CB4BF; text-decoration: none;">Terms of Service</a> and <a href="register-legal-privacy-policy.blade.php" style="color: #0CB4BF; text-decoration: none;">Privacy Policy</a>.</p>

      <button style="margin-top:-40px;" type="submit" class="registerbtn">Register</button>

    </div>

    <div class="container signin">
      <p>Already a member? <a href="login.blade.php" style="color: #0CB4BF; text-decoration: none; font-weight: 500;">Login</a>.</p>
    </div>
  </form> -->

  <div class="position-absolute back-btn-wrap mt-5 d-flex justify-content-center align-items-center">
    <a href="login.blade.php" class="back-container">
      <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.000839496 7.28098C0.00735402 7.0313 0.116999 6.79267 0.308549 6.61127L7.06059 0.307974C7.26834 0.115614 7.55272 0.00492265 7.85139 0.000160568C8.15006 -0.00460151 8.43865 0.0969545 8.65391 0.282569C8.86917 0.468184 8.99355 0.722714 8.99976 0.990367C9.00596 1.25802 8.8935 1.51696 8.68703 1.71043L2.68231 7.3125L8.68703 12.9146C8.8935 13.108 9.00596 13.367 8.99976 13.6346C8.99355 13.9023 8.86917 14.1568 8.65391 14.3424C8.43865 14.528 8.15006 14.6296 7.85139 14.6248C7.55272 14.6201 7.26834 14.5094 7.06059 14.317L0.308549 8.01373C0.205353 7.91614 0.124961 7.80104 0.0721174 7.6752C0.0192741 7.54937 -0.00495415 7.41533 0.000839496 7.28098Z" fill="#0C1E36" />
      </svg>

    </a>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mt-5 d-flex justify-content-center align-items-center logo-component-2">
        <div class="logo text-center ">
          <img src="./assets/images/logo.png" class=" h-75 img-fluid" alt="logo" srcset="./assets/images/logo.png">
        </div>
      </div>
    </div>
    <div class="col-10 mx-auto my-4">
      <div class="main-info small-text text-center">
        <p>Register & get started in less than 1 minute!</p>
      </div>
    </div>
    <div class="col-12 main-content">
      <form action="./backend/insert/register.php" method="POST">
        <?php

        if (isset($_SESSION['errors_register'])) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
          foreach ($_SESSION['errors_register'] as $error) {
            echo '<p>' . $error . '</p>';
          }
          echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
          echo '</div>';

          unset($_SESSION['errors_register']);
        }
        ?>
        <!-- Full Name -->
        <div class="mb-2">
          <label for="FullName" class="form-label m-0">Full Name <span class="required-astrict">*</span></label>
          <input type="text" required class="form-control" name="full_name" id="FullName" placeholder="Jhon Doe" value="<?php echo isset($_SESSION['registration_data']['full_name']) ? htmlspecialchars($_SESSION['registration_data']['full_name']) : ''; ?>">
        </div>
        <!-- Full Name -->
        <div class="mb-2">
          <label for="exampleInputEmail1" class="form-label m-0">Email address <span class="required-astrict">*</span></label>
          <div class="input-icon">
            <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email ..." value="<?php echo isset($_SESSION['registration_data']['email']) ? htmlspecialchars($_SESSION['registration_data']['email']) : ''; ?>">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g opacity="0.5" clip-path="url(#clip0_0_70)">
                <path d="M7.99997 0C5.87894 0.00229405 3.84544 0.845885 2.34564 2.34568C0.84585 3.84547 0.00225896 5.87897 -3.50902e-05 8C-0.0840351 14.382 7.4393 18.286 12.6 14.5447C12.6741 14.4953 12.7377 14.4316 12.7868 14.3574C12.8359 14.2831 12.8697 14.1997 12.886 14.1121C12.9024 14.0246 12.9011 13.9346 12.8821 13.8476C12.8631 13.7606 12.8269 13.6782 12.7756 13.6054C12.7243 13.5326 12.6589 13.4709 12.5833 13.4238C12.5077 13.3767 12.4234 13.3452 12.3355 13.3312C12.2475 13.3172 12.1576 13.321 12.0712 13.3423C11.9847 13.3636 11.9033 13.4021 11.832 13.4553C7.5333 16.5707 1.26663 13.3187 1.3333 8C1.6993 -0.844 14.302 -0.842 14.6666 8V9.33333C14.6666 9.68696 14.5262 10.0261 14.2761 10.2761C14.0261 10.5262 13.6869 10.6667 13.3333 10.6667C12.9797 10.6667 12.6405 10.5262 12.3905 10.2761C12.1404 10.0261 12 9.68696 12 9.33333V8C11.832 2.714 4.1673 2.71467 3.99997 8C4.00772 8.81066 4.26093 9.59995 4.72622 10.2638C5.19151 10.9277 5.84703 11.435 6.6064 11.7189C7.36577 12.0028 8.19334 12.05 8.98003 11.8542C9.76673 11.6583 10.4756 11.2287 11.0133 10.622C11.3025 11.1324 11.7519 11.5332 12.292 11.7623C12.8321 11.9914 13.4326 12.036 14.0006 11.8893C14.5686 11.7425 15.0724 11.4125 15.4338 10.9504C15.7953 10.4883 15.9943 9.91996 16 9.33333V8C15.9977 5.87897 15.1541 3.84547 13.6543 2.34568C12.1545 0.845885 10.121 0.00229405 7.99997 0ZM7.99997 10.6667C7.29272 10.6667 6.61444 10.3857 6.11435 9.88562C5.61425 9.38552 5.3333 8.70724 5.3333 8C5.3333 7.29276 5.61425 6.61448 6.11435 6.11438C6.61444 5.61428 7.29272 5.33333 7.99997 5.33333C8.70721 5.33333 9.38549 5.61428 9.88558 6.11438C10.3857 6.61448 10.6666 7.29276 10.6666 8C10.6666 8.70724 10.3857 9.38552 9.88558 9.88562C9.38549 10.3857 8.70721 10.6667 7.99997 10.6667Z" fill="#0C1E36" />
              </g>
              <defs>
                <clipPath id="clip0_0_70">
                  <rect width="16" height="16" fill="white" />
                </clipPath>
              </defs>
            </svg>

          </div>
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label m-0">Password <span class="required-astrict">*</span></label>
          <div class="input-icon">

            <input type="password" name="password" required class="form-control w-100" id="exampleInputPassword1" placeholder="Enter Your Password ...">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g opacity="0.5" clip-path="url(#clip0_0_39)">
                <path d="M12.6667 5.616V4.66667C12.6667 3.42899 12.175 2.242 11.2998 1.36684C10.4247 0.491665 9.23769 0 8.00001 0C6.76233 0 5.57535 0.491665 4.70018 1.36684C3.82501 2.242 3.33334 3.42899 3.33334 4.66667V5.616C2.73958 5.87514 2.23421 6.30168 1.87901 6.84347C1.52381 7.38527 1.3342 8.01882 1.33334 8.66667V12.6667C1.3344 13.5504 1.68593 14.3976 2.31082 15.0225C2.93572 15.6474 3.78295 15.9989 4.66668 16H11.3333C12.2171 15.9989 13.0643 15.6474 13.6892 15.0225C14.3141 14.3976 14.6656 13.5504 14.6667 12.6667V8.66667C14.6658 8.01882 14.4762 7.38527 14.121 6.84347C13.7658 6.30168 13.2604 5.87514 12.6667 5.616ZM4.66668 4.66667C4.66668 3.78261 5.01787 2.93477 5.64299 2.30964C6.26811 1.68452 7.11596 1.33333 8.00001 1.33333C8.88407 1.33333 9.73191 1.68452 10.357 2.30964C10.9822 2.93477 11.3333 3.78261 11.3333 4.66667V5.33333H4.66668V4.66667ZM13.3333 12.6667C13.3333 13.1971 13.1226 13.7058 12.7476 14.0809C12.3725 14.456 11.8638 14.6667 11.3333 14.6667H4.66668C4.13624 14.6667 3.62754 14.456 3.25246 14.0809C2.87739 13.7058 2.66668 13.1971 2.66668 12.6667V8.66667C2.66668 8.13623 2.87739 7.62753 3.25246 7.25245C3.62754 6.87738 4.13624 6.66667 4.66668 6.66667H11.3333C11.8638 6.66667 12.3725 6.87738 12.7476 7.25245C13.1226 7.62753 13.3333 8.13623 13.3333 8.66667V12.6667Z" fill="#0C1E36" />
                <path d="M8.00001 9.33331C7.8232 9.33331 7.65363 9.40355 7.52861 9.52858C7.40358 9.6536 7.33334 9.82317 7.33334 9.99998V11.3333C7.33334 11.5101 7.40358 11.6797 7.52861 11.8047C7.65363 11.9297 7.8232 12 8.00001 12C8.17682 12 8.34639 11.9297 8.47141 11.8047C8.59644 11.6797 8.66668 11.5101 8.66668 11.3333V9.99998C8.66668 9.82317 8.59644 9.6536 8.47141 9.52858C8.34639 9.40355 8.17682 9.33331 8.00001 9.33331Z" fill="#0C1E36" />
              </g>
              <defs>
                <clipPath id="clip0_0_39">
                  <rect width="16" height="16" fill="white" />
                </clipPath>
              </defs>
            </svg>

          </div>
        </div>
        <div class="mb-1 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="TogglePassword">
            <label class="form-check-label" for="TogglePassword">Show My Password</label>
          </div>
        </div>
        <div class="divider-1"></div>
        <div class="col-12 d-flex align-items-center justify-content-between">
          <a class="referral_link collapsed" id="referralLink">
            Got a Referral Code?
          </a>

          <!-- Plus Icon -->
          <svg id="toggleIcon" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.328 7.152H7.216V12.336H5.176V7.152H0.0880001V5.304H5.176V0.0959988H7.216V5.304H12.328V7.152Z" fill="#10B2BD" />
          </svg>
          <!-- Plus Icon -->
        </div>
        <div class="collapse" id="collapseExample">
          <!-- Referral Code -->
          <div class="mb-2">
            <input type="number" class="form-control" id="referral_code" placeholder="Enter your Code" name="referral" value="<?php echo isset($_SESSION['registration_data']['referral']) ? htmlspecialchars($_SESSION['registration_data']['referral']) : ''; ?>">
          </div>
          <!-- Referral Code -->
        </div>
        <p class="privacy-text mb-3 mt-2">
          By creating my account I agree with <a href="register-legal-terms-and-conditions.blade.php">Terms & Services</a> and <a href="register-legal-privacy-policy.blade.php">Privacy Policy</a>
        </p>
        <input type="hidden" name="userlevel" value="1">
        <input type="hidden" name="profilelevel" value="0">
        <button type="submit" class="btn w-100 btn-primary">Register</button>
        <!-- Form End -->
      </form>
    </div>

    <div class="divider my-4">OR</div>
    <div class="col-12 my-3 login-buttons">
      <div class="row">
        <a class="col-6">
          <div class="sso-logo d-flex justify-content-center align-items-center">
            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_0_34)">
                <path d="M17.7732 12.2312C17.7962 10.4391 18.7354 8.78409 20.262 7.84588C19.2951 6.46397 17.732 5.61968 16.0463 5.56697C14.2725 5.38105 12.5532 6.62784 11.6495 6.62784C10.7285 6.62784 9.33704 5.58518 7.83821 5.61584C5.86692 5.68005 4.07292 6.77351 3.11362 8.49755C1.07142 12.0338 2.59421 17.2318 4.55112 20.0905C5.53054 21.4906 6.67383 23.0537 8.17171 22.9991C9.637 22.9387 10.1842 22.0647 11.9523 22.0647C13.7042 22.0647 14.2178 22.9991 15.7454 22.9636C17.3171 22.9377 18.308 21.5577 19.2529 20.1442C19.9563 19.1466 20.4978 18.0445 20.8562 16.8782C18.9894 16.0885 17.7752 14.2591 17.7732 12.2312Z" fill="#0C1E36" />
                <path d="M14.8877 3.68671C15.7445 2.65746 16.1671 1.33496 16.0646 0C14.7555 0.138 13.5451 0.763792 12.6768 1.75279C11.8191 2.72933 11.3841 4.00583 11.4684 5.30342C12.7957 5.31683 14.0559 4.72075 14.8877 3.68671Z" fill="#0C1E36" />
              </g>
              <defs>
                <clipPath id="clip0_0_34">
                  <rect width="23" height="23" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </div>
        </a>
        <a href="google-auth.php" class="col-6">
          <div class="sso-logo d-flex justify-content-center align-items-center">
            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <rect y="0.5" width="21" height="21" fill="url(#pattern0_0_15)" />
              <defs>
                <pattern id="pattern0_0_15" patternContentUnits="objectBoundingBox" width="1" height="1">
                  <use xlink:href="#image0_0_15" transform="scale(0.00195312)" />
                </pattern>
                <image id="image0_0_15" width="512" height="512" xlink:href="data:image/png;base64,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" />
              </defs>
            </svg>
          </div>
        </a>
      </div>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      console.log("Document ready");

      $('#TogglePassword').change(function() {
        console.log("Checkbox change event fired");

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