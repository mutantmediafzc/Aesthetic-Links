<style>
    #search-icon {
        border: none;
        background: none;
        transition: transform 0.3s ease;
    }

    #search-icon:hover {
        transform: scale(1.2);
    }
    .web-nav {
        display: none;
        padding: 0px;
    }

    .hide {
        display: none;
    }

    .show {
        display: block;
    }

    @media only screen and (min-device-width: 701px) {
        .web-nav {
            background-color: white;
            color: black;
            top: 0;
            display: flex !important;
            margin: auto;
            gap: 25px;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px 0;
        }

        .filter {
            background-color: #f5f5f2;
            padding: 10px 40px;
            display: flex;
            border-radius: 8px;
            position: relative;
        }
        
        .country {
            border: none;
            background-color: #f5f5f2;
            padding-right: 10px;
            outline: none;
        }

        .line {
            border-left: 1px solid #e2e4dc;
            height: 30px;
            margin-left: 8px;
            margin-right: 35px;
        }

        .search {
            border: none;
            background-color: #f5f5f2;
            outline: none;
            margin-left: 5px;
            width: 290px;
        }

        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .line-2 {
            border-left: 1px solid #e2e4dc;
            height: 30px;
            margin-left: 55px;
            margin-right: 10px;
        }

        .switzerland {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 16px;
            color: black !important;
        }
        
        .dubai {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 16px;
            color: black !important;
        }

        .dropdown-box {
            position: absolute;
            background-color: white;
            top: 60px;
            padding: 8px 10px;
            border-radius: 3px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .switzerland-container:hover {
            background-color: #f5f5f2;
        }

        .dubai-container:hover {
            background-color: #f5f5f2;
        }

        .switzerland-img {
            height: 16px;
        }

        .dubai-img {
            height: 16px;
        }

        .search::placeholder {
            font-size: 16px;
        }

        .magnifying-glass {
            height: 20px;
        }

        .map-icon {
            height: 25px;
        }

        .map-txt {
            font-size: 18px;
        }

        .download-now-btn {
            background-color: rgb(31 41 55);
            border: none;
            color: white;
            padding: 16px 35px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .menu-nav-btn {
            background-color: transparent !important;
            border: 1px solid #b1bcbd !important;
            padding: 16px 35px !important;
            font-size: 16px !important;
            border-radius: 9999px !important;
            text-decoration: none !important;
            color: black !important;
        }
    }

    @media only screen and (min-device-width: 2560px) {
        .dubai {
            display: flex;
            align-items: center;
            font-size: 20px !important;
        }
        
        .switzerland {
            display: flex;
            align-items: center;
            font-size: 20px !important;
        }

        .switzerland-img {
            height: 18px;
            margin-top: 3px;
        }

        .dubai-img {
            height: 18px;
        }

        .search::placeholder {
            font-size: 18px;
        }

        .search {
            width: 350px !important;
        }

        .magnifying-glass {
            height: 25px !important;
        }

        .map-icon {
            height: 25px;
        }

        .map-txt {
            font-size: 20px;
        }
    }
    
            .post-nav-btn-two {
        font-size: 18px !important;
        text-decoration: none !important;
        color: #41a0a5 !important;
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
</style>

<nav class="web-nav">
    <a href="index.php"><img src="assets/images/logo-anl.png" alt="" height="30px"></a>
       <div>
            <a href="posts.blade.php" class="post-nav-btn-two ">Posts</a>
        </div>
    <div>
        <div class="filter" style="max-height: 60px !important; min-height: 30px !important;">
            <div class="dropdown-box hide" id="dropdown-box">
                <div style="padding: 5px 8px; margin-bottom: 3px;" class="switzerland-container" id="switzerland-country">
                    <a href="#" class="switzerland">
                        Switzerland
                        <span class="show-el-en" style="margin-left: 5px;">
                            <img src="assets/images/country/switzerland.svg" class="switzerland-img" alt="" height="10px">
                        </span>
                        <span class="show-el-ar" style="margin-right: 5px;">
                            <img src="assets/images/country/switzerland.svg" class="switzerland-img" alt="" height="10px">
                        </span>
                        
                    </a>
                </div>
                <div style="padding: 5px 8px;" class="dubai-container" id="dubai-country">
                    <a href="#" class="dubai">
                        Dubai
                        <span  class="show-el-en" style="margin-left: 5px;">
                            <img src="assets/images/country/uae.svg" alt="" class="dubai-img" height="10px">
                        </span>
                        <span  class="show-el-ar"  style="margin-right: 5px;">
                            <img src="assets/images/country/uae.svg" alt="" class="dubai-img" height="10px">
                        </span>
                    </a>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 5px;" id="toggle-select">
                <div class="" id="switzerland-option">
                    <a href="#" class="switzerland">
                        Switzerland
                        <span class="show-el-en" style="margin-left: 5px;">
                            <img src="assets/images/country/switzerland.svg" alt="" class="switzerland-img" height="10px">
                        </span>
                        <span class="show-el-ar"  style="margin-right: 5px;">
                            <img src="assets/images/country/switzerland.svg" alt="" class="switzerland-img" height="10px">
                        </span>
                    </a>
                </div>
                <div class="hide" id="dubai-option">
                    <a href="#" class="dubai">
                        Dubai
                        <span  lass="show-el-en" style="margin-left: 5px;">
                            <img src="assets/images/country/uae.svg" alt="" class="dubai-img" height="10px">
                        </span>
                        <span  class="show-el-ar"  style="margin-right: 5px;">
                            <img src="assets/images/country/uae.svg" alt="" class="dubai-img" height="10px">
                        </span>
                    </a>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="15px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            <div class="line"></div>
            <form id="search-form" class="flex-container" action="search-result.blade.php" method="get">
                <button id="search-icon" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="20px" style="color: #c6c8b9;" class="magnifying-glass">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
                <input type="text" name="search" placeholder="Search for Clinics, Experts, Services..." class="search" required>
            </form>
            <div class="line-2"></div>
            <div class="flex-container" style="cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="20px" class="map-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                </svg>
                <a href="mapview.php" style="margin: 0; margin-left: 5px; text-decoration: none; color: black;" class="map-txt">Map view</a>
            </div>
        </div>
    </div>
    <div>
        <button class="download-now-btn" id="download-btn">Download Now</button>
        <a href="profile.blade.php" class="menu-nav-btn">Menu</a>
    </div>
</nav>
<script>
    document.getElementById('download-btn').addEventListener('click', function() {
        window.location.href = 'https://apps.apple.com/dk/app/aesthetic-links/id6477182130';
    });
    var selectEl = document.getElementById('toggle-select')
    var switzerlandEl = document.getElementById('switzerland-country')
    var dubaiEl = document.getElementById('dubai-country')
    var dropdownEl = document.getElementById('dropdown-box')

    selectEl.addEventListener('click', (e) => {
        e.preventDefault()

        if (dropdownEl.classList.contains('hide')) {
            dropdownEl.classList.remove('hide')
            dropdownEl.classList.add('show')

            return
        }

        if (dropdownEl.classList.contains('show')) {
            dropdownEl.classList.remove('show')
            dropdownEl.classList.add('hide')

            return
        }
    })

    var switzerlandOpt = document.getElementById('switzerland-option')
    var dubaiOpt = document.getElementById('dubai-option')

    switzerlandEl.addEventListener('click', (e) => {
        e.preventDefault()

        dubaiOpt.classList.remove('show')
        dubaiOpt.classList.add('hide')

        switzerlandOpt.classList.add('show')

        dropdownEl.classList.remove('show')
        dropdownEl.classList.add('hide')

        var currentPage = window.location.pathname.split('/').pop();
        window.location.href = '/app_x/views/' + currentPage;
    })

    dubaiEl.addEventListener('click', (e) => {
        e.preventDefault()

        switzerlandOpt.classList.remove('show')
        switzerlandOpt.classList.add('hide')

        dubaiOpt.classList.add('show')

        dropdownEl.classList.remove('show')
        dropdownEl.classList.add('hide')

        var currentPage = window.location.pathname.split('/').pop();
        window.location.href = '/app_x/uae/' + currentPage;
    })
    


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