  


<nav>
    <div class="location-dropdown-container" style="height:45px;">
        <div style="width: 100%;">
            <a href="./city-filters.php" class="location-dropdown" id="location-dropdown"
                style="-webkit-tap-highlight-color: transparent; text-decoration:none !important;">
                <img id="location-flag"
                    style="width: 20px; height: 20px; margin-top: -3px; position: relative;margin-right:5px;"
                    src="assets/images/language-flag/united-arab-emirates.svg">
                <span id="location-name">Dubai </span>
                <i id="filter-arrow-down" class="fa-solid fa-angle-down" style="margin-left: 5px;"></i>
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
<?php require_once 'server.blade.php'; ?>