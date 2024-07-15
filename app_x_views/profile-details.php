	<style>
	    a { -webkit-tap-highlight-color: transparent; }
	  /* phones */
@media only screen and (max-width: 767px) {
    #logoAr {
        display: none !important;
    }
    #logoEn {
        display: none !important;
    }
}

/*  tablets */
@media only screen and (min-width: 768px) and (max-width: 1023px) {

    .progress-value {
        height: 5px;
    }
    
        #logoEn{
    width: 200px;
    position: absolute;
    left:10%;
    /*background: #222;*/
    }
    
    #logoAr{
    width: 200px;
    position: absolute;
    right:10%;
    /*background: #222;*/
    }
    
    
    
    
    
}



/*  laptops and larger screens */
@media only screen and (min-width: 1024px) {
    .progress-value {
        height: 8px;
    }
        #logoEn{
    width: 200px;
    position: absolute;
    left:10%;
    /*background: #222;*/
    }
    
    #logoAr{
    width: 200px;
    position: absolute;
    right:10%;
    /*background: #222;*/
    }
    
    
    
    
    
    
    
    
    
}
	</style>
	
		<section class="profile-details">
        <div class="profile-container">
                   <img src="assets/images/anl-logo-white.png"  id='logoEn' class=' show-el-en'>
	               <img src="assets/images/anl-logo-white.png"  id='logoAr' class=' show-el-ar'>
            <button class="back" style="-webkit-tap-highlight-color: transparent;">
				<a style="" href="discover-page.blade.php">
					<i class="fa-solid fa-angle-left show-el-en "></i>
				    <i class="fa-solid fa-angle-right show-el-ar"></i>
				</a>
			</button>
            <div class="profile-details-container">
                <div class="profile-details-box"><h3>Profile</h3></div>
                <div class="profile-img">
                    <div class="profile-img-box">
                        <img src="assets/images/placeholder.jpeg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                    </div>
                </div>
                <div class="name-container">
                    <h2><?=$username?></h2>
                </div>
                <div class="user-level-box">
                    <p><?=$userlevel?>/8000</p>
                </div> 
                <div class="progress-bar">
                    <div class="progress">
                        <div class="progress-value"></div>
                    </div>
                    <div class="diamond">
                        <a href="legal-rewards.blade.php"><i class="fa-regular fa-gem"></i></a>
                    </div>
                </div>
                <div class="progress-description">
                    <p>
                        Get more discounts & a VIP experience!
                    </p>
                </div> 

            </div>

        </div>
    </section>
    
	
<script>
    document.getElementById("avatar").addEventListener("change", function() {
        if (this.files && this.files[0]) {
            var file = this.files[0]; // Store the file object
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                document.getElementById('profileImg').src = e.target.result;
                uploadFile(file);
            }
            
            reader.readAsDataURL(file);
        }
    });

    function uploadFile(file) {
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        formData.append('avatar', file);

        xhr.open('POST', '', true); // Empty string means it will submit to the same page
        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    console.log('Upload successful');
                } else {
                    console.error('Upload failed:', response.message);
                }
            } else {
                console.error('An error occurred during the upload.');
            }
        };
        xhr.send(formData);
    }
    


// hide element 

        document.addEventListener("DOMContentLoaded", function() {
        // Check if the URL contains "ar."
        var isArabic = window.location.hostname.startsWith('ar.');
        
        if (isArabic) {
            // Hide all elements with the class "show-el-en" and show all elements with the class "show-el-ar"
            var englishSpans = document.querySelectorAll('.show-el-en');
            englishSpans.forEach(function(span) {
                span.style.display = 'none';
            });
            
          var englishParagraphs = document.querySelectorAll('.show-p-en');
            englishParagraphs.forEach(function(p) {
                p.style.textAlign = 'right';
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

    