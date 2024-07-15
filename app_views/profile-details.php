	<style>
	    a { -webkit-tap-highlight-color: transparent; }
	</style>
	
		<section class="profile-details">
        <div class="profile-container">
            <button class="back" style="-webkit-tap-highlight-color: transparent;">
				<a style="" href="profile.blade.php">
				  	<i class="fa-solid fa-angle-left show-el-en"></i>
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