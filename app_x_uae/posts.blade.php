<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...

?>
<?php require_once 'server.blade.php';?>
	
	
<!--- Fetch User Details ----->
	
<?php
	
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
	// In this case we can use the account ID to get the account info.
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
	$stmt->fetch();
	$stmt->close();
	
?>	
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Posts</title>

    <link rel="stylesheet" href="assets/styles/swiper-bundle.min.css">
</head>
<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>

<style>

    @font-face {
        font-family: 'poppinsregular';
        src: url('poppins-regular-webfont.woff2') format('woff2'),
        url('poppins-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }
    


    
    /* --------------------------------menu------------------------------------- */
    
    .spacer {
        width: 100%; 
        height: 20vw; 
    }

    /* ------------------------------------------------------------------------- */

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
		line-height: 0.9;
    }






    



    @media only screen and (min-device-width: 1025px) and (max-device-width: 1440px) {
        .spacer {
            height: 150px;
        }

    }


    
    @media only screen and (min-device-width: 1441px) {
        .spacer {
            height: 100px;
        }



        /*.custom-container {*/
        /*    width: 75% !important;*/
        /*}*/
    }

   /*/////////////*/
   
   .cards-title{
           align-self: flex-start;
    font-size: 20px;
   }
   
.custom-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.posts-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    align-self: flex-start;
    margin-top: 20px;
}

.post-card {
background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s;
    width: 400px;
    height: 100%;
    display: flex;
    /* text-align: center; */
    flex-direction: column;
    justify-content: space-between;
}

.post-card:hover {
    transform: translateY(-10px);
}


.post-card-image {
    width: 100%;
    /*height: 200px;*/
    background: #ccc;
}


.post-card-image img {
    width: 100%;
    height: 400px !important;
    height: auto;
}

.post-card-content {
    padding: 20px;
}

.post-card-content h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.post-card-content p {
    color: #666;
    font-size: 1em;
    margin-bottom: 10px;
}

.pagination {
    margin-top: 20px;
}

.pagination button {
    background-color: #fff;
    border: 1px solid #ccc;
    color: #333;
    cursor: pointer;
    padding: 5px 10px;
    margin-right: 5px;
    border-radius: 4px;
}



.pagination button.active {
    background-color: #0CB4BF;
    color: #fff;
}
.cards-p{
    display: flex;
    font-size: 12px;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}
    
</style>



<body>
	   
	<?php include 'web-nav.php'; ?>
	<?php include 'nav.php'; ?>
    <?php require_once 'server.blade.php';?>
    <?php include 'menu.php'; ?>

    <section class="spacer"></section>




<!--///////////////-->


<section style="margin: auto; width: 100%; margin: 3% 0;">
    <div class="custom-container" style="margin: auto; width: 90%; height: auto;">
        <div class='cards-title'>
            <h1>Latest Posts</h1>
        </div>
        
        <div class="posts-container">
            <?php
            $stmt = "
                SELECT posts.*, categories.name as category_name
                FROM posts
                INNER JOIN categories ON posts.category_id = categories.id
                ORDER BY posts.created_at DESC
            ";
        
            $result = $con->query($stmt);
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="card">
                        <div class="post-card">
                            <div class="post-card-image">
                                <a href="view-post.blade.php?id=' . $row['id'] . '">
                                    <img src="https://aestheticlinks.com/blog-new/images/large/' . $row['big_image'] . '" alt="Post Image">
                                </a>
                            </div>
                            <div class="post-card-content">
                                <h2>' . $row['title'] . '</h2>
                                <p class="body">' . $row['body_1'] . '</p>
                            </div>
                                      <div class="cards-p">
                                <p 
                                     style="
                                    background: #ccc;
                                    padding: 8px;
                                    border-radius: 5px;
                                "
                                > ' . $row['category_name'] . '</p>
                                <p>' . $row['created_at'] . '</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p>No posts found.</p>';
            }
            ?>
        </div>
        <div id="pagination" class="pagination"></div>
    </div>
</section>

<!--///////////-->

    <script>
        // Get the modal
        var modal = document.getElementById("menuModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("menuBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closeMenu")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        } 

        var downloadBtnEl = document.getElementById('download-btn')
        var downloadSectionEl = document.getElementById('download-app-section')

        downloadBtnEl.addEventListener('click', () => {
            downloadSectionEl.scrollIntoView({ behavior: 'smooth' })
        })
    </script>
    
    <?php
	
	// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
	$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
	// In this case we can use the account ID to get the account info.
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
	$stmt->fetch();
	$stmt->close();
    ?>	
    
    <!--- Sharing Referral Code -->
    <script>
    const shareButton = document.getElementById('share-button');
    const textToShare = "Join me and Download the Aesthetic Links App! Get a 5% discount on your first booking with my Referral Code: *<?=$profilelevel?>*. Download the App on https://apps.apple.com/app/id6477182130";

    shareButton.addEventListener('click', () => {
      if (navigator.share) {
        navigator.share({
          title: 'Share Text',
          text: textToShare
        })
          .then(() => console.log('Text shared successfully!'))
          .catch(error => console.error('Sharing failed:', error));
      } else {
        console.warn('Navigator.share API is not supported by your browser.');
        // Implement an alternative sharing method if needed
      }
    });
    
    
    

  </script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll('.card');
    const itemsPerPage = 3; // Number of cards per page
    const numPages = Math.ceil(cards.length / itemsPerPage);
    let currentPage = 1;

    // Show cards based on the current page
    function showPage(page) {
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = page * itemsPerPage;

        cards.forEach((card, index) => {
            if (index >= startIndex && index < endIndex) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Create pagination buttons
    function createPaginationButtons() {
        const paginationContainer = document.getElementById('pagination');
        for (let i = 1; i <= numPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.addEventListener('click', function () {
                currentPage = i;
                showPage(currentPage);
                updatePaginationButtons();
            });
            paginationContainer.appendChild(button);
        }
    }

    // Update pagination buttons' active state
    function updatePaginationButtons() {
        const buttons = document.querySelectorAll('#pagination button');
        buttons.forEach(button => {
            if (parseInt(button.textContent) === currentPage) {
                button.classList.add('active');
            } else {
                button.classList.remove('active');
            }
        });
    }

    // Initialize pagination
    showPage(currentPage);
    createPaginationButtons();
    updatePaginationButtons();
});
</script>

</body>
</html>