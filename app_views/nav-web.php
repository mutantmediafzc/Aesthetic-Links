        <script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
        <script src="public/assets/script/filter-dropdown.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    /* ------------------------------navbar------------------------------ */

.navivation-bar-container {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: show;
    background-color: #fff;
    position: fixed;
    top: 0;
    width: 100%;
    height: 10vh;
    box-shadow:  0px 0px 5px rgba(0, 0, 0, 0.1);
    z-index: 10;
}

.navivation-bar {
    display: grid;
    grid-template-columns: repeat(3, 25% 50% 25%);
    width: 70%;
    height: max-content;
}

.nav-item-container {
    display: flex;
    align-items: center;
    width: 100%;
    height: max-content;
    margin: auto;
}

.nav-item-container img {
    width: 135px;
    height: auto;
}

.top-right {
    display: grid;
    grid-template-columns: repeat(2, max-content);
    column-gap: 20px;
    width: max-content;
    height: 40px;
    position: relative;
}

.download-btn {
    width: 145px;
    height: 40px;
    border-radius: 5px;
    font-size: 14px;
    background-color: #0C1E36;
    border-style: none;
    font-family: 'Poppins', sans-serif;
    color:#fff;
    cursor: pointer;
}

/* --------------------------------navbar dropdown menu top right --------------- */
  
.sec-center {
    right: 0;
    position: relative;
    max-width: 100%;
    text-align: center;
    z-index: 200;
}
  
[type="checkbox"]:checked,
[type="checkbox"]:not(:checked){
    position: absolute;
    left: -9999px;
    opacity: 0;
    pointer-events: none;
}
  
.dropdown:checked + label,
.dropdown:not(:checked) + label{
    position: relative;
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    line-height: 1;
    height: 40px;
    transition: all 200ms linear;
    border-radius: 50px;
    border: 1px solid #ccc;
    width: 100px;
    letter-spacing: 1px;
    display: -webkit-inline-flex;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    align-items: center;
    -webkit-justify-content: center;
    -moz-justify-content: center;
    -ms-justify-content: center;
    justify-content: center;
    -ms-flex-pack: center;
    text-align: center;
    background-color: transparent;
    cursor: pointer;
    color: #212121;
    box-shadow: 0 12px 35px 0 rgba(255,235,167,.15);
}
  
.dropdown:checked + label:before,
.dropdown:not(:checked) + label:before{
    position: fixed;
    top: 0;
    left: 0;
    content: '';
    width: 100%;
    height: 100%;
    z-index: -1;
    cursor: auto;
    pointer-events: none;
}

.dropdown:checked + label:before{
    pointer-events: auto;
}

.section-dropdown {
    position: absolute;
    padding: 5px;
    background-color: #fff;
    top: 60px;
    left: -30px;
    width: 150%;
    border-radius: 7px;
    display: block;
    box-shadow:  0px 0px 20px rgba(0, 0, 0, 0.1);
    z-index: 2;
    opacity: 0;
    pointer-events: none;
    transform: translateY(20px);
    transition: all 200ms linear;
}
  
.dropdown:checked ~ .section-dropdown{
    opacity: 1;
    pointer-events: auto;
    transform: translateY(0);
}

.section-dropdown:before {
    position: absolute;
    top: -20px;
    left: 0;
    width: 100%;
    height: 20px;
    content: '';
    display: block;
    z-index: 1;
}

.section-dropdown:after {
    position: absolute;
    top: -7px;
    right: 75px;
    width: 0; 
    height: 0; 
    border-left: 8px solid transparent;
    border-right: 8px solid transparent; 
    border-bottom: 8px solid #fff;
    content: '';
    display: block;
    z-index: 2;
    transition: all 200ms linear;
}
  
a {
    position: relative;
    color: #212121;
    transition: all 200ms linear;
    font-weight: 500;
    font-size: 14px;
    border-radius: 2px;
    padding: 5px 0;
    padding-left: 10px;
    padding-right: 10px;
    margin: 2px 0;
    text-align: left;
    text-decoration: none;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    align-items: center;
      -ms-flex-pack: distribute;
}
  
a:hover {
    color: #212121;
    background-color: #f1f1f1;
}

.dropdown-sub:checked + label,
.dropdown-sub:not(:checked) + label{
    position: relative;
    color: #212121;
    transition: all 200ms linear;
    font-weight: 500;
    font-size: 14px;
    border-radius: 2px;
    padding: 5px 0;
    padding-left: 10px;
    padding-right: 10px;
    text-align: left;
    text-decoration: none;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    align-items: center;
    justify-content: space-between;
        -ms-flex-pack: distribute;
        cursor: pointer;
}

.dropdown-sub:checked + label:hover,
.dropdown-sub:not(:checked) + label:hover{
    color: #212121;
    background-color: #fafafa;
}
  
.section-dropdown-sub {
    position: relative;
    display: block;
    width: 100%;
    pointer-events: none;
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: all 200ms linear;
}

.dropdown-sub:checked ~ .section-dropdown-sub{
    pointer-events: auto;
    opacity: 1;
    max-height: 999px;
}

.section-dropdown-sub a {
    font-size: 14px;
    padding-left: 25px;
}

/* --------------------------------------------------------------------------------- */

.location-dropbtn {
    display: flex;
    justify-content: space-between;
    justify-content: space-evenly;
    align-items: center;
    width: 100%;
    height: 25px;
    background-color: transparent;
    color: #212121;
    font-size: 12px;
    padding: 0;
    border: none;
    cursor: pointer;
}
  
.location-dropdown {
    width: 100%;
    position: relative;
    display: inline-block;
    border-right: 1px solid #e3e3e3;
}
  
.location-dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 90%;
    overflow: auto;
    box-shadow:  0px 0px 20px rgba(0, 0, 0, 0.1);
    border-radius: 7px;
    z-index: 1;
    margin-top: 20px;
    padding: 5px;
}
  
.location-dropdown-content a {
    color: black;
    text-decoration: none;
    font-size: 12px;
    display: block;
  
}
  
.location-dropdown a:hover {
    background-color: #f1f1f1;
}
  
.location-show {
    display: block;
}

/* --------------------------------------------------------------------------------- */

.location-dropbtn-1 {
    display: flex;
    justify-content: space-between;
    justify-content: space-evenly;
    align-items: center;
    width: 100%;
    height: 50px;
    background-color: transparent;
    color: #212121;
    font-size: 12px;
    padding: 0;
    border: none;
    cursor: pointer;
}

.location-dropdown-1-1 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
}
  
.location-dropdown-1 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
    border-left: 1px solid #e3e3e3;
}
  
.location-dropdown-content-1 {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 90%;
    overflow: auto;
    box-shadow:  0px 0px 20px rgba(0, 0, 0, 0.1);
    border-radius: 7px;
    z-index: 1;
    margin-top: 20px;
    padding: 5px;
}
  
.location-dropdown-content-1 a {
    color: black;
    text-decoration: none;
    font-size: 12px;
    display: block;
  
}
  
.location-dropdown-1 a:hover {
    background-color: #f1f1f1;
}
  
.location-show-1 {
    display: block;
}

/* --------------------------------------------------------------------------------- */

.location-dropbtn-2 {
    display: flex;
    justify-content: space-between;
    justify-content: space-evenly;
    align-items: center;
    width: 100%;
    height: 50px;
    background-color: transparent;
    color: #212121;
    font-size: 12px;
    padding: 0;
    border: none;
    cursor: pointer;
}

.location-dropdown-2-1 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
}
  
.location-dropdown-2 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
    border-left: 1px solid #e3e3e3;
}
  
.location-dropdown-content-2 {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 90%;
    overflow: auto;
    box-shadow:  0px 0px 20px rgba(0, 0, 0, 0.1);
    border-radius: 7px;
    z-index: 1;
    margin-top: 20px;
    padding: 5px;
}
  
.location-dropdown-content-2 a {
    color: black;
    text-decoration: none;
    font-size: 12px;
    display: block;
  
}
  
.location-dropdown-2 a:hover {
    background-color: #f1f1f1;
}
  
.location-show-2 {
    display: block;
}

/* --------------------------------------------------------------------------------- */

.location-dropbtn-3 {
    display: flex;
    justify-content: space-between;
    justify-content: space-evenly;
    align-items: center;
    width: 100%;
    height: 50px;
    background-color: transparent;
    color: #212121;
    font-size: 12px;
    padding: 0;
    border: none;
    cursor: pointer;
}

.location-dropdown-3-1 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
}
  
.location-dropdown-3 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
    border-left: 1px solid #e3e3e3;
}
  
.location-dropdown-content-3 {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 90%;
    overflow: auto;
    box-shadow:  0px 0px 20px rgba(0, 0, 0, 0.1);
    border-radius: 7px;
    z-index: 1;
    margin-top: 20px;
    padding: 5px;
}
  
.location-dropdown-content-3 a {
    color: black;
    text-decoration: none;
    font-size: 12px;
    display: block;
  
}
  
.location-dropdown-3 a:hover {
    background-color: #f1f1f1;
}
  
.location-show-3 {
    display: block;
}

/* --------------------------------------------------------------------------------- */

.location-dropbtn-4 {
    display: flex;
    justify-content: space-between;
    justify-content: space-evenly;
    align-items: center;
    width: 100%;
    height: 50px;
    background-color: transparent;
    color: #212121;
    font-size: 12px;
    padding: 0;
    border: none;
    cursor: pointer;
}

.location-dropdown-4-1 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
}
  
.location-dropdown-4 {
    width: 100%;
    height: 35px;
    position: relative;
    display: inline-block;
    border-left: 1px solid #e3e3e3;
}
  
.location-dropdown-content-4 {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 90%;
    overflow: auto;
    box-shadow:  0px 0px 20px rgba(0, 0, 0, 0.1);
    border-radius: 7px;
    z-index: 1;
    margin-top: 20px;
    padding: 5px;
}
  
.location-dropdown-content-4 a {
    color: black;
    text-decoration: none;
    font-size: 12px;
    display: block;
  
}
  
.location-dropdown-4 a:hover {
    background-color: #f1f1f1;
}
  
.location-show-4 {
    display: block;
}

/* -----------------------------navbar search------------------------------------- */

.search-bar-container {
    width: 100%;
    height: 40px;
    background-color: #f1f1f1;
    border-radius: 7px;
    display: grid;
    grid-template-columns: repeat(3, 25% 50% 25%);
}

.search-bar-item {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 40px;
}

.search-map-btn {
    width: 100%;
    height: 25px;
    background-color: transparent;
    border-style: none;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    border-left: 1px solid #e3e3e3;
    cursor: pointer;

}

/* -----------------------search bar--------------------------------------------- */

.search-container {
    width: 75%;
    height: max-content;
    display: flex;
    align-items: center;
    margin: auto;
}

.input-container {
    width: 250px;
    height: max-content;
}

.input-container input {
    width: 100%;
    height: 25px;
    background-color: transparent;
    border-style: none;
    color: #ccc;
    font-size: 12px;
    padding: 0;
}

.input-container input:focus {
    outline: none;
    color: #212121;
}

/* ---------------------------end navbar -------------------------------------- */

    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .navivation-bar-container {
            display: none;
        }
    }
    
    @media only screen and (max-device-width: 767px) {
        .navivation-bar-container {
            display: none;
        }
    }
</style>

<div class="navivation-bar-container">
    <div class="navivation-bar">
        <div class="nav-item-container">
            <a href="/"><img src="assets/images/web-logo.png"></a>
        </div>

        <div class="nav-item-container">
            <div class="search-bar-container">
                <div class="search-bar-item">    
                    <div class="location-dropdown">

                        <button onclick="locationFunction()" class="location-dropbtn"><img src="assets/images/city-icons/switzerland.png" style="width: 14px; height: 14px; margin: 0; margin-left: 20px;">
                            Switzerland&nbsp;<i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i> &nbsp;
                        </button>

                        <div id="location-Dropdown" class="location-dropdown-content">
                            @foreach ($location as $city)
                                <a href="#" style="display: grid; grid-template-columns: repeat(2, max-content 1fr); column-gap: 10px;"><img src="{{$city->city_icon}}" style="width: 16px; height: 16px; object-fit: cover;">{{$city->city_name}}</a>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="search-bar-item">
                    <div class="search-container">
                        <i class="fa-solid fa-magnifying-glass" style="font-size: 12px; color: #ccc;"></i> &nbsp;
                        <form action="{{ route('login')}}" method="POST">
                                <div class="input-container">
                                    <input type="text" placeholder="Search for Clinics, Experts, Services..." name="search" id="search">
                                </div>
                        </form>                        
                    </div>
                </div>

                <div class="search-bar-item">
                    <a href="/mapview"><button class="search-map-btn"><i class="fa-solid fa-map"></i>&nbsp; Map view</button></a>
                </div>
            </div>
        </div>

        <div class="nav-item-container" style=" display: flex; justify-content: end;">
            <div class="top-right">
                <div><button class="download-btn">Download now</button></div>
                <div class="sec-center"> 	
                    <input class="dropdown" type="checkbox" id="dropdown" name="dropdown"/>
                    <label class="for-dropdown" for="dropdown">Menu</label>
                    <div class="section-dropdown"> 
                        @if(Auth::user()!=null)
                        <a href="/account">My Account</a>

                        <form method="POST"  action="{{ route('logout') }}">
                            @csrf
        
                            <x-dropdown-link class="nav-link" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                        <input class="dropdown-sub" type="checkbox" id="dropdown-sub" name="dropdown-sub"/>
                        <label class="for-dropdown-sub" for="dropdown-sub">Language<i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></label>
                        <div class="section-dropdown-sub"> 
                            <a href="#">English</i></a>
                            <a href="#">French</i></a>
                        </div>
                        @else
                        <a href="/login">Login</a>
                        
                        <input class="dropdown-sub" type="checkbox" id="dropdown-sub" name="dropdown-sub"/>
                        <label class="for-dropdown-sub" for="dropdown-sub">Language<i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></label>
                        <div class="section-dropdown-sub"> 
                            <a href="#"><img src="assets/images/city-icons/uk.png" style="width: 15px; height: 15px; object-fit:cover; border-radius: 50px;">&nbsp;English</i></a>
                            <a href="#"><img src="assets/images/city-icons/france.png" style="width: 15px; height: 15px; object-fit:cover; border-radius: 50px;">&nbsp;French</i></a>
                            <a href="#"><img src="assets/images/city-icons/germany.png" style="width: 15px; height: 15px; object-fit:cover; border-radius: 50px;">&nbsp;Germany</i></a>
                        </div>
                        @endif
                    </div>
                </div>           
            </div>

        </div>
    </div>
</div>

<?php require_once 'server.blade.php';?>