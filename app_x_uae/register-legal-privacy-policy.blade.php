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
                <a href="register.blade.php">
                    <i class="fa-solid fa-angle-left"></i>
                </a> 
            </button>

            <div style="width: 100%; height: auto; margin-top: 5%;">
                <h2 style="">Privacy Policy</h2><br><br><br>

                <p>Aesthetic Links ("we," "us," or "our") is committed to protecting the privacy and security 
                    of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your personal information when you access or use our website (the "Website") 
                    and mobile application (the "App"). By using the Website and the App, you consent to the practices described in this Privacy Policy.</p><br>

                <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                <h1>Topics</h1><br>
                <ul>
                    <li>
                        <p>What data do we collect?</p><br>
                    </li>
                    <li>
                        <p>How do we collect your data?</p><br>
                    </li>
                    <li>
                        <p>How will we use your data?</p><br>
                    </li>
                    <li>
                        <p>How do we store your data?</p><br>
                    </li>
                    <li>
                        <p>Marketing</p><br>
                    </li>
                    <li>
                        <p>What are your data protection rights?</p><br>
                    </li>
                    <li>
                        <p>What are cookies?</p><br>
                    </li>
                    <li>
                        <p>How do we use cookies?</p><br>
                    </li>
                    <li>
                        <p>What types of cookies do we use?</p><br>
                    </li>
                    <li>
                        <p>How to manage your cookies</p><br>
                    </li>
                    <li>
                        <p>Privacy policies of other websites</p><br>
                    </li>
                    <li>
                        <p>Changes to our privacy policy?</p><br>
                    </li>
                    <li>
                        <p>How to contact us</p><br>
                    </li>
                    <li>
                        <p>How to contact the appropriate authorities</p><br>
                    </li>
                </ul>

                <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                <h1>What Data do we collect?</h1><br>
                <ul>
                    <li>
                        <p><b>Information You Provide:</b> We collect information that you 
                            voluntarily provide when you use the Website and the App. This may include personal information such as your name, email address, phone number, 
                            and other contact information when you create an account, book appointments, or interact with our services.</p><br>
                    </li>
                    <li>
                        <p><b>If you are a Customer,</b> the personal data we will process to facilitate 
                            your booking depends on your healthcare provider but usually includes detailed personal information such as name, age, sex, date of birth, contact details 
                            (telephone numbers and email addresses) insurance authorisation code, address, details of your general practitioner, insurance policy number, 
                            healthcare provider booked, Customer registration number, time of booking, date and location of booking. </p><br>
                    </li>        
                    <li>
                        <p><b>If you are a Clinic,</b> the personal data we will handle includes but is not limited 
                            to, age, sex, date of birth, contact details (telephone numbers and email addresses), details of your place of work, your qualifications, key search words, patient 
                            booking slots and/or languages spoken.</p><br>
                    </li>
                    <li>
                        <p><b>Payment Information:</b> If you make payments for bookings through the Website or the 
                            App, we may collect payment card information and billing details. This information is processed securely through our payment processor, and we do not store your payment 
                            card details.</p><br>
                    </li>
                    <li>
                        <p><b>User Content:</b> Any content, reviews, feedback, or other information you post, upload, or 
                            submit to the Website or the App is collected, including user-generated content.</p><br>
                    </li>
                    <li>
                        <p><b>Device Information:</b> We may collect information about your device, including your IP 
                            address, device type, operating system, and browser type.</p><br>
                    </li>  
                </ul>

                <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                <h1>How do we collect your Data?</h1><br>

                <p>You directly provide Aesthetic Links with most of the data we collect. We collect data and process 
                    data when you:</p><br>

                <ul>
                    <li>
                        <p>Register online or place an order for any of our products or services.</p><br>
                    </li>
                    <li>
                        <p>Voluntarily complete a customer survey or provide feedback on any of our message.</p><br>
                    </li>
                    <li>
                        <p>Boards or via email.</p><br>
                    </li>
                    <li>
                        <p>Use or view our website via your browser's cookies.</p><br>
                    </li>
                </ul>

                <p>Aesthetic Links may also receive your data indirectly from the following sources:</p><br>

                <ul>
                    <li>
                        <p>Clinics and healthcare facilities that provide service to our customers.</p><br>
                    </li>
                </ul>

                <h1>How do we use your Data?</h1><br>

                <p>Aesthetic Links collects your data so that we can:</p><br>

                <ul>
                    <li>
                        <p><b>Provide and Improve Our Services:</b> We use your information to provide and maintain 
                            our services, such as booking appointments, improving user experience, and developing new features.</p><br>
                    </li>
                    <li>
                        <p><b>Communication:</b> We may use your contact information to communicate with you, respond to 
                            inquiries, and send you transactional or promotional information.</p><br>
                    </li>
                    <li>
                        <p><b>Payment Processing:</b> If you make payments through our services, your payment information is used 
                            to process transactions securely.</p><br>
                    </li>
                </ul>

                <p>If you agree, Aesthetic Links will share your data with our partner companies so that they may offer you their products and services.</p><br>
            
                <ul>
                    <li>
                        <p><b>Service Providers:</b> We may share your information with third-party service providers who help us operate, improve, and secure our services.</p><br>
                    </li>
                    <li>
                        <p><b>Legal Compliance:</b> We may disclose your information when required by law or to protect our rights, privacy, safety, or property.</p><br>
                    </li>
                </ul>

                <p>When Aesthetic Links processes a service for you, it may send your data to, and also use the resulting 
                    information from, credit reference agencies to prevent fraudulent purchases.</p><br>

                <h1>How do we store your Data?</h1><br>

                <p>We securely store your data, including personal information, is stored and processed by Wix, a third-party 
                    service provider. Wix utilizes various data centers located globally to deliver its services. These data centers may be situated in different regions or countries. Wix is committed to maintaining 
                    the security and confidentiality of your data in compliance with applicable data protection regulations, including the General Data Protection Regulation (GDPR).</p><br>
                    
                <p>Please note that the location of data centers and service providers may change over time, and Wix's own privacy 
                    policies and terms of service may provide additional details on data storage and processing practices. For the most current information regarding data processing and storage, we recommend reviewing 
                    Wix's official documentation.By using our services, you acknowledge and consent to the storage and processing of your data by Wix as described herein.</p><br>

                <p>We employ reasonable security measures to protect your personal information. However, no method of transmission 
                    over the internet or electronic storage is entirely secure. Therefore, we cannot guarantee absolute security.</p><br>

                <p>We will keep your Personal Data for the duration that you are a customer and a period 
                    of 7 years post your last transaction[enter time period]. Once this time period has expired, we will delete your data by erasing any and all data shared by you on the Portal.</p><br>

                <h1>Children’s Privacy</h1><br>

                <p>Our services are not intended for users under the age of 18. We do not knowingly collect personal information 
                    from children under 18. If you believe we have inadvertently collected information from a child under 18, please contact us, and we will promptly delete such information.</p><br>

                <h1>Marketing</h1><br>

                <p>Aesthetic Links would like to send you information about products and services of ours that we think you might 
                    like, as well as those of our partner companies.</p><br>
                <ul>
                    <li>
                        <p>Clinics and healthcare facilities regardless if they are registered on our Portal or not.</p>
                    </li>
                </ul>

                <p>If you have agreed to receive marketing, you may always opt out at a later date.</p><br>
            
                <p>You have the right at any time to stop Aesthetic Links from contacting you for marketing purposes or giving your 
                    data to other members of the Aesthetic Links Group.</p><br>
            
                <p>If you no longer wish to be contacted for marketing purposes, please click here.</p><br>
            
                <h1>What are your Data protection rights?</h1><br>
            
                <p>Aesthetic Links would like to make sure you are fully aware of all of your data protection rights. Every user is 
                    entitled to the following:</p><br>

                <ul>
                    <li>
                        <p><b>The right to access -</b> You have the right to request Aesthetic Links for copies of your personal data. We may charge you a small fee for this service.</p><br>
                    </li>
                    <li>
                        <p><b>The right to rectification -</b> You have the right to request that Aesthetic Links correct any information you believe is inaccurate. You also have the right to request Aesthetic Links to complete information you believe is incomplete.</p><br>
                    </li>
                    <li>
                        <p><b>The right to erasure -</b> You have the right to request that Aesthetic Links erase your personal data, under certain conditions.</p><br>
                    </li>
                    <li>
                        <p><b>The right to restrict processing -</b> You have the right to request that Aesthetic Links restrict the processing of your personal data, under certain conditions.</p><br>
                    </li>
                    <li>
                        <p><b>The right to object to processing -</b> You have the right to object to Aesthetic Links's processing of your personal data, under certain conditions.</p><br>
                    </li>
                    <li>
                        <p><b>The right to data portability -</b> You have the right to request that Aesthetic Links transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p><br>
                    </li>
                    <li>
                        <p>If you are located in the UAE, you have the rights under the Personal Data Protection Law. You can find more information about this law and how to exercise your rights on this website.</p><br>
                    </li>
                    <li>
                        <p>If you are located in the USA, you may have rights under the California Consumer Privacy Act (CCPA), which applies to residents of California. You can find more information about this law and how to exercise your rights on this website.</p><br>
                    </li>
                    <li>
                        <p>If you are located in Europe, you have the rights under the General Data Protection Regulation (GDPR), which applies to residents of the European Union and the European Economic Area. You can find more information about this law and how to exercise your rights on this website.</p><br>
                    </li>
                    <li>
                        <p>To exercise any of these rights we may ask you to provide some verification information before we can process your request. We will respond to your request within a reasonable time frame of one month at the earliest and in accordance with our legal obligations. If you would like to exercise any of these rights, please contact us at our email:</p><br>
                    </li>
                </ul>

                <p>Call us at:</p><br>

                <p>Or write to us: support@aestheticLinkss.com</p><br>

                <h1>What are cookies?</h1><br>
            
                <p>Cookies are text files placed on your computer to collect standard Internet log information and visitor behavior information. When you visit our websites, we may collect information from you automatically through cookies or similar technology.</p><br>

                <p>For further information, visit our Cookies Policy.</p><br>

                <h1>How do we use your cookies?</h1><br>

                <p>Aesthetic Links uses cookies in a range of ways to improve your experience on our website, including: </p><br>

                <ul>
                    <li>
                        <p>Keeping you signed in</p><br>
                    </li>
                    <li>
                        <p>Understanding how you use our website</p><br>
                    </li>
                    <li>
                        <p>Recognizing you when you sign-in to use our services. This allows us to provide you with product recommendations, display personalized content, recognize you as a Diamond member, enable you to use 1-Click booking, and provide other customized features and services.</p><br>
                    </li>
                    <li>
                        <p>Keeping track of your specified preferences. This allows us to honor your preferences, such as whether or not you would like to see interest-based ads. You may set your preferences through Your Account.</p><br>
                    </li>
                    <li>
                        <p>Keeping track of items stored in your shopping basket.</p><br>
                    </li>
                    <li>
                        <p>Conducting research and diagnostics to improve Amazon's content, products, and services.</p><br>
                    </li>
                    <li>
                        <p>Preventing fraudulent activity.</p><br>
                    </li>
                    <li>
                        <p>Improving security.</p><br>
                    </li>
                    <li>
                        <p>Delivering content, including ads, relevant to your interests on Amazon sites and third-party sites (see the Interest-Based Ads notice for how we use cookies in serving interest-based ads).</p><br>
                    </li>
                    <li>
                        <p>Reporting. This allows us to measure and analyze the performance of our services.</p><br>
                    </li>
                </ul>

                <h1>What type of cookies do we use?</h1><br>

                <p>There are a number of different types of cookies, however, our website uses:</p><br>
                
                <ul>
                    <li>
                        <p><b>Functionality -</b> Aesthetic Links uses these cookies so that we recognize you on our website and remember your previously selected preferences. These could include what language you prefer and location you are in. A mix of first-party and third-party cookies are used</p><br>
                    </li>
                    <li>
                        <p><b>Advertising -</b> Aesthetic Links uses these cookies to collect information about your visit to our website, the content you viewed, the Linkss you followed and information about your browser, device, and your IP address. Aesthetic Links sometimes shares some limited aspects of this data with third parties for advertising purposes. We may also share online data collected through cookies with our advertising partners. This means that when you visit another website, you may be shown advertising based on your browsing patterns on our website.</p><br>
                    </li>     
                    <li>
                        <p><b>Session Cookies -</b> These cookies are temporary and are deleted from the user's device when they close their web browser. They are often used for basic functions like maintaining a user's session on a website.</p><br>
                    </li>     
                    <li>
                        <p><b>Persistent Cookies -</b> Persistent cookies remain on the user's device for a set period, even after they close their browser. They are often used for tasks like remembering login credentials or user preferences.</p><br>
                    </li>      
                    <li>
                        <p><b>First-party Cookies -</b> First-party cookies are set by the website the user is currently visiting. They are typically used for site functionality and analytics.</p><br>
                    </li>     
                    <li>
                        <p><b>Third-party Cookies -</b> Third-party cookies are set by domains other than the one the user is currently visiting. They are often used for advertising, tracking, and analytics by external services like Google Analytics or social media platforms.</p><br>
                    </li>   
                    <li>
                        <p><b>Secure Cookies -</b> These cookies are only transmitted over secure (HTTPS) connections. They are used for sensitive information like login credentials.</p><br>
                    </li>  
                    <li>
                        <p><b>HttpOnly Cookies -</b> HttpOnly cookies cannot be accessed via JavaScript and are typically used for security purposes, like preventing cross-site scripting (XSS) attacks.</p><br>
                    </li> 
                    <li>
                        <p><b>Analytics Cookies -</b> These cookies collect data about how users interact with a website, helping website owners understand and improve their site's performance and user experience.</p><br>
                    </li>
                    <li>
                        <p><b>Marketing Cookies -</b> Marketing cookies are used for tracking user behavior and providing personalized content and advertisements. They are often set by advertising networks.</p><br>
                    </li>
                </ul>

                <h1>How to manage cookies?</h1><br>

                <p>You can set your browser not to accept cookies, and the above website tells you how to remove cookies from your browser. However, in a few cases, some of our website features may not function as a result.</p><br>

                <h1>Privacy Policies of other websites</h1><br>

                <p>The Aesthetic Links website contains Linkss to other websites. Our privacy policy applies only to our website, so if you click on a Links to another website, you should read their privacy policy.</p><br>

                <h1>Changes to our privacy policy</h1><br>

                <p>Aesthetic Links keeps its privacy policy under regular review and places any updates on this webpage. This privacy policy was last updated on 31 October 2023.</p><br>

                <h1>How to contact us</h1><br>

                <p>If you have any questions about Aesthetic Links's privacy policy, the data we hold on you, or you would like to exercise one of your data protection rights, please do not hesitate to contact us.</p><br>

                <p>Email us at: support@aestheticLinkss.com</p><br>

                <h1>How to contact the appropriate authority</h1><br>

                <p>Should you wish to report a complaint or if you feel that Aesthetic Links has not addressed your concern in a satisfactory manner, you may contact the Information Commissioner's Office.</p><br>

            
            </div>
        </div>

    </section>
    

    
    
</body>
</html>