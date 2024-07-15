<?php
session_start();
?>
<?php require_once 'server.blade.php';?>

<?php
$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
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
    <title>Aesthetic Links | Discover Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: 'poppinsregular';
            src: url('poppins-regular-webfont.woff2') format('woff2'),
            url('poppins-regular-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .clinic-text-location h1, .clinic-text-service h1 {
            color: #fff;
            font-size: 38px;
            font-weight: 500;
        }

        .clinic-text-location {
            position: absolute;
            left: 15px;
            bottom: 15px;
        }

        .clinic-text-service {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .spacer {
            height: 5vw;
        }

        .radio-section {
            display: flex;
            gap: 1rem;
        }

        .book-now {
            background-color: rgb(31, 41, 55);
            color: white;
        }

        .book-now1 {
            background-color: transparent;
            color: #0C1E36;
            border: 2px solid #0C1E36;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-item label {
            margin: 0;
        }

        .book-now, .book-now1 {
            margin-top: 1rem;
        }

        .form-check-input:checked {
            background-color: #0CB4BF;
            border-color: #0CB4BF;
        }

        .btn.book-now:hover {
            background-color: rgb(31, 41, 55);
            color: white;
        }

        .btn.book-now1:hover {
            background-color: transparent;
            color: #0C1E36;
        }


    </style>
</head>
<body>
<?php include 'web-nav.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'menu.php'; ?>

<div class="spacer"></div>
<section class="container my-5">
    <h3 class="mb-4 mt-4">Gender Preferences</h3>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender_preference" id="radio1" value="all" <?php echo (isset($_GET['gender_preference']) && $_GET['gender_preference'] == 'all') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="radio1">All</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender_preference" id="radio2" value="male" <?php echo (isset($_GET['gender_preference']) && $_GET['gender_preference'] == 'male') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="radio2">Male</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender_preference" id="radio3" value="female" <?php echo (isset($_GET['gender_preference']) && $_GET['gender_preference'] == 'female') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="radio3">Female</label>
    </div>
</section>

<?php require_once 'server.blade.php';?>
<?php
$sql = "SELECT DISTINCT services.subcat FROM services INNER JOIN clinics ON clinics.cunique = services.cunique WHERE clinics.ccountry = 'UAE' ORDER BY services.subcat ASC";
$stmt = $con->prepare($sql);

$stmt->execute();
$result = $stmt->get_result();
?>
<div class="container my-5">
    <h3 class="mb-4 mt-4">Treatment Type</h3>
</div>

<form action="search-result.blade.php" method="post" class="container">
    <input type="hidden" id="price_preference" name="price_preference" value="">
    <input type="hidden" id="gender_preference" name="gender_preference" value="">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $isChecked = isset($_GET['selectedFilters']) && !empty($_GET['selectedFilters']) && in_array($row['subcat'], explode(",", urldecode($_GET['selectedFilters'])));
                echo '
                    <div class="col-md-4 checkbox-item">
                        <input type="checkbox" name="filters[]" id="' . $row['subcat'] . '" value="' . $row['subcat'] . '" class="form-check-input" ' . ($isChecked ? 'checked' : '') . '>
                        <label class="form-check-label" for="' . $row['subcat'] . '">' . $row['subcat'] . '</label>
                    </div>';
            }
        } else {
            echo "No subcategories found";
        }
        ?>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary book-now">Apply</button>
        <a href="filter-page.php" class="btn btn-secondary book-now1">Reset</a>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        breakpoints: {
            360: { slidesPerView: 1.5, spaceBetween: 20 },
            540: { slidesPerView: 2, spaceBetween: 20 },
            1200: { slidesPerView: 4, spaceBetween: 40 },
            1024: { slidesPerView: 3, spaceBetween: 20 },
            1440: { slidesPerView: 5, spaceBetween: 10 },
            1770: { slidesPerView: 5.5, spaceBetween: 5 },
            1920: { slidesPerView: 6, spaceBetween: 5 }
        }
    });
</script>

<?php
$stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
$stmt->fetch();
$stmt->close();
?>

<script>
    function setGenderPreference() {
        var genderPreference = document.querySelector('input[name="radio"]:checked').value;
        document.getElementById('gender_preference').value = genderPreference;
    }

    function setPricePreference() {
        var pricePreference = document.querySelector('input[name="price_radio"]:checked').value;
        document.getElementById('price_preference').value = pricePreference;
    }

    var radioButtons = document.querySelectorAll('input[name="radio"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', setGenderPreference);
    });

    var priceRadioButtons = document.querySelectorAll('input[name="price_radio"]');
    priceRadioButtons.forEach(function(priceRadioButton) {
        priceRadioButton.addEventListener('change', setPricePreference);
    });


    document.addEventListener("DOMContentLoaded", function() {
        const params = new URLSearchParams(window.location.search);

        const genderPref = params.get('gender_preference') || 'all';
        document.querySelector('input[name="radio"][value="' + genderPref + '"]').checked = true;
        document.getElementById('gender_preference').value = genderPref;

        const pricePref = params.get('price_preference') || '1';
        document.querySelector('input[name="price_radio"][value="' + pricePref + '"]').checked = true;
        document.getElementById('price_preference').value = pricePref;
    });
</script>
</body>
</html>