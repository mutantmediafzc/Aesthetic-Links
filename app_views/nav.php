 

<nav>
    <div class="location-dropdown-container" style="height:45px;">
        <div style="width: 100%;">
            <a href="./city-filters.php" class="location-dropdown" id="location-dropdown"
                style="-webkit-tap-highlight-color: transparent; text-decoration:none !important;">
                <img id="location-flag"
                 class="show-el-en"
                    style="width: 20px; height: 20px; margin-top: -3px; position: relative;margin-right:5px;"
                    src="assets/images/country/switzerland.svg">
                <span id="location-name">Switzerland </span>
                         <i id="filter-arrow-down" class="fa-solid fa-angle-down" style="margin-left: 5px;"></i>
                <img id="location-flag"
                 class="show-el-ar"
                    style="width: 20px; height: 20px; margin-top: -3px; position: relative;margin-right:5px;"
                    src="assets/images/country/switzerland.svg">
       
            </a>

        </div>
        <button id="menuBtn" class="menu-btn"><i class="fa-solid fa-bars" id="hamburger-icon"></i></button>
    </div>

</nav>

<script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     const locationDropdown = document.getElementById('location-dropdown');
    //     const locationName = document.getElementById('location-name');
    //     const locationFlag = document.getElementById('location-flag');
    //     const cookieName = 'activeCurrency';

    //     function getCookie(name) {
    //         const value = `; ${document.cookie}`;
    //         const parts = value.split(`; ${name}=`);
    //         if (parts.length === 2) return parts.pop().split(';').shift();
    //         return null;
    //     }

    //     const activeCurrency = getCookie(cookieName) || 'AED';

    //     if (activeCurrency === 'CHF') {
    //         locationName.textContent = 'Switzerland';
    //         locationFlag.src = 'assets/images/language-flag/switzerland.svg';

    //     } else {
    //         locationName.textContent = 'UAE';
    //         locationFlag.src = 'assets/images/language-flag/united-arab-emirates.svg';
    //     }
    // });

</script>
<!-- Hotjar Tracking Code for Switzerland -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:4948996,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    
    
    
    
    
    
    
    document.addEventListener("DOMContentLoaded", function() {
        // Check if the URL contains "ar."
        var isArabic = window.location.hostname.startsWith('ar.');
        
        if (isArabic) {
            // Hide all elements with the class "show-el-en" and show all elements with the class "show-el-ar"
            var englishSpans = document.querySelectorAll('.show-el-en');
            englishSpans.forEach(function(span) {
                span.style.display = 'none';
            });

            var arabicSpans = document.querySelectorAll('.show-el-ar');
            arabicSpans.forEach(function(span) {
                span.style.display = 'inline'; // or 'block' based on your layout
            });
        } else {
            // Hide all elements with the class "show-el-ar" and show all elements with the class "show-el-en"
            var arabicSpans = document.querySelectorAll('.show-el-ar');
            arabicSpans.forEach(function(span) {
                span.style.display = 'none';
            });

            var englishSpans = document.querySelectorAll('.show-el-en');
            englishSpans.forEach(function(span) {
                span.style.display = 'inline'; // or 'block' based on your layout
            });
        }
    });
    
    
    
</script>
<?php require_once 'server.blade.php'; ?>