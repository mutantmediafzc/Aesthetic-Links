<?php include 'session.php';
require_once 'server-connect.php';

?>
<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let queryParams = new URLSearchParams(window.location.search);

            $.ajax({
                url: 'reviews.php',
                type: 'POST',
                data: {
                    id: queryParams.get('cunique')
                },
                success: function(response) {
                    let reviews = JSON.parse(response);
                    var $scrollContainer = $('.scroll-container');

                    reviews.forEach(function(review) {
                        var $customerReviewCard = $(
                            '<div class="customer-reviews-card"></div>');
                        var $userName = $(
                            '<div style="margin: auto; width: 90%;"><p style="margin: 0 auto 10px auto; width: 100%; height: auto; padding: 0; font-size: 16px; font-weight: 500;">' +
                            review.user + '</p></div>');
                        var $content = $(
                            '<div style="margin: auto; width: 90%; height: 100px; max-height: 100px;"><p style="margin: 0 auto 10px auto; width: auto; height: auto; padding: 0; font-size: 12px; font-weight: 400; overflow-wrap: break-word;">' +
                            review.content + '</p></div>');
                        var $stars = $('<div style="margin: auto; width: 90%;"></div>');

                        // Add stars based on rating
                        for (var i = 0; i < parseInt(review.rating); i++) {
                            $stars.append(
                                '<i class="fa-solid fa-star" style="font-size: 12px; color: #0CB4BF;"></i>'
                            );
                        }
                        for (var i = parseInt(review.rating); i < 5; i++) {
                            $stars.append(
                                '<i class="fa-solid fa-star" style="font-size: 12px; color: #444444;"></i>'
                            );
                        }

                        // Append elements to customer review card
                        $customerReviewCard.append($userName, $content, $stars);
                        // Append customer review card to scroll container
                        $scrollContainer.append($customerReviewCard);
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });
        });
    </script>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
</head>



<body>

    <?php include 'nav.php'; ?>

    <!---- Menu Start --->

    <?php include 'menu.php'; ?>


    <!---- Menu End ----->

    <!-- ----------------------------menu modal end------------------------ -->


    <?php


    // Connect to database


    // Get project ID from URL
    $clinicId = isset($_GET['id']) ? strval($_GET['id']) : null;

    // Validate and query project details
    if ($clinicId) {
        $sql = "SELECT c.*, AVG(r.rating) AS average_rating  FROM clinics c LEFT JOIN reviews r ON c.cunique = r.cunique COLLATE utf8mb4_unicode_ci  WHERE c.id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $clinicId);
        $stmt->execute();
        $result = $stmt->get_result();

        $isFavorite = null;
        if (isset($_SESSION['loggedin'])) {
            $userId = $_SESSION['id'];
            $userFavorite = $con->prepare("SELECT id FROM account_favorites WHERE account_id = ? AND clinic_id = ?");
            $userFavorite->bind_param('ii', $userId, $clinicId);
            $userFavorite->execute();
            $isFavorite = $userFavorite->get_result();
        }
    ?>

        <?php

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $views = $row['views'] + 1;
            $updateStmt = $con->prepare("UPDATE clinics SET views = ? WHERE id = ?");
            $updateStmt->bind_param('ss', $views, $clinicId);
            $updateStmt->execute();

            $updateStmt->close();

            $avgRating = round($row['average_rating'], 1) == 0 ? 'New' :  round($row['average_rating'], 1);
            if ($row['ctype'] == 'Male Only') {
                $imgClinic = '<img style="height:14px; margin-right:2px; vertical-align:middle;" src="assets/images/gender/3.svg">';
            } else if ($row['ctype'] == 'Female Only') {
                $imgClinic = '<img style="height:14px; margin-right:2px; vertical-align:middle;" src="assets/images/gender/2.svg">';
            } else {
                $imgClinic = '<img style="height:14px; margin-right:2px; vertical-align:middle;" src="assets/images/gender/1.svg">';
            }
        ?>


            <?php
            $clinicId = $_GET["id"];
            $sql = "SELECT * FROM clinic_images WHERE clinic_id = ? ORDER BY `sort_no` ASC";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $clinicId);
            $stmt->execute();
            $result = $stmt->get_result();
            ?>



            <?php echo '
    <div class="service-details-img-section">
        <div class="service-details-img-container">
            <button class="back-btn">
                <a href="landing-page.blade.php" style="height: max-content; width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                    <i class="fa-solid fa-angle-left" id="back-arrow"></i>
                </a>
            </button>
    '; ?>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php if ($result->num_rows === 0) {  ?>
                        <div class="swiper-slide">
                            <img src="assets/images/clinic-images/<?php echo $row['cunique']; ?>.png">
                        </div>
                        <?php } else {
                        while ($row_img = $result->fetch_assoc()) {
                        ?>
                            <div class="swiper-slide">
                                <img src="assets/images/clinic-images/<?php echo  $row_img['image']; ?>">
                            </div>
                    <?php
                        }
                    } ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="clinic-small-logo" style="z-index: 1;">
                    <img src="assets/images/clinic-logos/<?php echo $row['cunique']; ?>.png" class="clinic-small-logo-img">
                </div>
            </div>

            <?php echo '
        </div>
    </div>
 


            <div class="service-details-section">
                <div class="service-details-section-container my-0 mt-2">
                    <h3 class="clinic-title-name">' .
                $row['cname'] .
                '</h3>
                    <form id="addToFavoritesForm" action="add-to-favorites.php" method="POST" style="margin-left: 65px;">
                        <input type="hidden" value="' .
                $_GET['cunique'] .
                '" name="cunique">
                        <input type="hidden" value="' .
                $clinicId .
                '" name="id">
                        <div class="icons" onclick="addToFavorites(event)">
                            ' .
                ($isFavorite?->num_rows > 0
                    ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke-width="2.5" style="height: 18px; color: red;    height: 24px;">
                                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>'
                    : '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="height: 18px; color: #D4D4D5;    height: 24px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>') .
                '
                        </div>
                    </form>
                </div>


            </div>


            <div class="more-details-section">
                <div class="address">
                    <div style="display: flex; align-items: center; margin-top: -13px;">
                        <p class="paragraph-2" style="margin-top: 0 !important; width: 20%;">' .
                $avgRating .
                ' <i class="fa-solid fa-star" style="color: #0CB4BF; font-size: 8pt;"></i></p>
                        <span style="margin: 0 10px; color: #f1f1f1;">|</span>
                        <div class="cost-container">
                            <div style="display: flex;">
                                <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                                <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                                <i class="fa-solid fa-dollar-sign" id="cost"></i>
                            </div>
                        </div>

                    </div>
                    <p class="paragraph-3" style="margin-top: 2px;"><i class="fa-solid fa-location-dot" style="color: #0c1e36; margin-right: 5px"></i>' .
                $row['ccity'] .
                ', ' .
                $row['ccountry'] .
                '</p>
                    <div style="width: 100%; display: grid; grid-template-columns: repeat(1, 1fr);">
                        <div style="width: 100%;">
                            <p class="paragraph-3" style="display:inline-block"><i class="fa-solid fa-mars-and-venus" style="color: #0c1e36; margin-right: -1px; margin-left: -2px"></i> ' .
                $row['ctype'] .
                '</p>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, 1fr);">

                        <div class="cost-container" style="visibility:hidden">
                            <div style="display: flex;">
                                <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                                <i class="fa-solid fa-dollar-sign" id="cost-1"></i>
                                <i class="fa-solid fa-dollar-sign" id="cost"></i>
                            </div>
                        </div>

                        <div class="right-icon-box">
                            <div class="right-icons-container">
                                <a href="' .
                $row['clocation'] .
                '" style="color: black; text-decoration:none;" target="_blank">
                                    <div class="circle-icon">
                                        <i class="fa-solid fa-map-location-dot" id="icon-right"></i>
                                    </div>
                                </a>
                                <div class="circle-icon">
                                    <button id="share-button">
                                        <i class="fa-solid fa-share" id="icon-right"></i>
                                    </button>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </div>


            </div>

            <div style="width: 100%; display: flex; justify-content: center; margin-top: -1vh;">
                <div class="service-description">
                    <p class="paragraph" id="cbio-short" style="font-size: 12px; display: none;">
                        ' .
                substr($row['cbio'], 0, 100) .
                '...
                        <span id="read-more" style="color: #0CB4BF; cursor: pointer;" onclick="toggleReadMore()">Read More</span>
                    </p>
                    <p class="paragraph" id="cbio-full" style="font-size: 12px;">
                        ' .
                $row['cbio'] .
                '
                        <span id="read-less" style="color: #0CB4BF; cursor: pointer; display: none;" onclick="toggleReadMore()">Read Less</span>
                    </p>
                </div>
            </div>

            '; ?>

    <?php
        } else {
            echo "Project not found.";
        }
    } else {
        echo "Invalid project ID.";
    }



    ?>

    <!--- Expert Search -->
    <?php

    $expertId = isset($_GET['cunique']) ? strval($_GET['cunique']) : null;
    // Connect to database
    // Define your SQL query to select all projects
    $stmt = "SELECT * FROM experts WHERE cunique = '$expertId'";
    // In this case we can use the account ID to get the account info.

    $result = $con->query($stmt);
    ?>
    <div class="our-expert-section mt-2">
        <div style="margin: auto;  width: 90%; height: auto; display: flex; justify-content:space-between;">
            <h1 class="section-title" id="face-tab">Our Experts</h1>
        </div>
        <div class="example expert-scroll">
            <?php
            $experts = [];

            // Fetch all results into an array
            while ($row = $result->fetch_assoc()) {
                $experts[] = $row;
            }

            // Check if 'priority' is not null for any of the rows
            $hasPriority = false;
            foreach ($experts as $row) {
                if (!is_null($row['priority'])) {
                    $hasPriority = true;
                    break;
                }
            }

            // Sort the array by 'priority' field in ascending order if 'priority' is not null
            if ($hasPriority) {
                usort($experts, function ($a, $b) {
                    return $a['priority'] <=> $b['priority'];
                });
            }














            // Iterate over the (possibly sorted) array to generate the HTML
            foreach ($experts as $row) {
                echo '
                    <div class="col-md-4 mb-2">
                        <a href="#" class="card expert-item text-decoration-none" style="background:transparent;" data-bs-toggle="modal" data-bs-target="#expertModal' . $row['id'] . '">
                            <div class="expert-img-container">
                                <img src="assets/images/experts/' . $row['id'] . '.jpg" class="card-img-top" alt="Expert Image">
                            </div>
                            <div class="card-body expert-details">
                                <h5 class="card-title expert-name">' . $row['expname'] . '</h5>
                            </div>
                        </a>
                    </div>';

            ?>
                <!-- Modal -->
                <div class="modal fade" id="expertModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content" style="z-index: 98765435678 !important;">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-expert-img-container text-center mb-3">
                                    <img src="assets/images/experts/<?php echo $row['id']; ?>.jpg" class="img-fluid" alt="Expert Image">
                                </div>
                                <h2 class="modal-expert-name"><?php echo $row['expname']; ?></h2>
                                <div class="row">
                                    <div class="col-6">
                                        <span class="modal-expert-language-heading">Language</span>
                                        <h1 class="modal-expert-language">
                                            <?php
                                            $languages = [$row['language1'], $row['language2'], $row['language3']];
                                            $languages = array_filter($languages); // Remove null or empty values
                                            $languages = array_map('ucfirst', $languages); // Capitalize the first letter of each language
                                            echo implode(', ', $languages); // Join the array into a string separated by commas
                                            ?>
                                        </h1>
                                    </div>

                                    <div class="col-6 text-end">
                                        <span class="modal-expert-language-heading ">Type</span>
                                        <h1 class="modal-expert-language"><?= $row['ex_type'] ?? "N/A" ?></h1>
                                    </div>
                                </div>
                                <hr style="background-color: #D9D9D9;">
                                <h4 class="about-modal-heading">About me</h4>
                                <p class="modal-expert-paragraph"><?= $row['bio'] ?? "N/A" ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php
            }


            // Modal
            // Custom modal 


            ?>
        </div>
    </div>



    <!----------End Experts ----------->

    <?php

    $cid_url = $_GET['id'];
    $cunique_url = $_GET['cunique'];
    $gender = $_GET['gender'] ?? '';
    $treatments = isset($_GET['treatments']) ? $_GET['treatments'] : [];

    $treatmentsString = http_build_query(['treatments' => $treatments]);

    ?>

    <div class="filter-box">
        <div class="wrapper" id="search-bar-section">
            <div class="search-bar-container">
                <div class="search-bar">
                    <i class="fas fa-search search-icon"></i>
                    <input id="search-box" type="text" placeholder="Search here for services..">
                    <a href="new-filter-clinic-page.blade.php?id=<?= $cid_url ?>&cunique=<?= $cunique_url ?>&gender=<?= $gender ?>&<?= $treatmentsString ?>" class="filter-button"><i class="fas fa-filter" style="color: #0CB4BF"></i></a>
                </div>
            </div>
        </div>
        <!--<div class="divider"></div>-->
        <!-- <div class="category-container">
            <div style="width: 100%; height: auto;">
                <button id="defaultOpen" class="tablinks active" onclick="openService(event, 'Face')">
                    <a href="#face-tab" style="text-decoration: none; color: inherit">Face</a>
                </button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Body')">
                    <a href="#body-tab" style="text-decoration: none; color: inherit">Body</a>
                </button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'Health')">
                    <a href="#health-tab" style="text-decoration: none; color: inherit">Health & Wellness</a>
                </button>
            </div>
        </div> -->
        <div class="category-container">
            <div style="width: 100%; height: auto;">
                <button id="defaultOpen" class="tablinks active" onclick="openService(event, 'face_tab')">
                    <a href="#face_tab" style="text-decoration: none; color: inherit">Face</a>
                </button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'body_tab')">
                    <a href="#body_tab" style="text-decoration: none; color: inherit">Body</a>
                </button>
            </div>
            <div style="width: 100%; height: auto;">
                <button class="tablinks" onclick="openService(event, 'health_tab')">
                    <a href="#health_tab" style="text-decoration: none; color: inherit">Health & Wellness</a>
                </button>
            </div>
        </div>

    </div>


    <div class="tab-sections">



        <div class=" sortable-container">

            <!-- Face Cards -->
            <div id="face_tab" class="" style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                <h1 class="tab-title">Face</h1>
                <?php
                if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                    $whereClause = "WHERE s.cunique = '$expertId' AND s.scat = 'Face'";

                    if (isset($_GET['treatments'])) {
                        $treatments = implode("','", $_GET['treatments']);
                        $whereClause .= " AND s.subcat IN ('$treatments')";
                    }

                    if (isset($_GET['gender'])) {
                        $gender = $_GET['gender'];
                        if ($gender === 'male') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                        } elseif ($gender === 'female') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                        }
                    }

                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
                             FROM services s
                             LEFT JOIN reviews r ON s.id = r.sunique
                             $whereClause
                             GROUP BY s.id
                             ORDER BY CASE WHEN s.featured = 1 THEN 0 ELSE 1 END, s.sname ASC ";
                } else {
                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
                             FROM services s
                             LEFT JOIN reviews r ON s.id = r.sunique
                             WHERE s.cunique = '$expertId' AND s.scat = 'Face'
                             GROUP BY s.id
                             ORDER BY CASE WHEN s.featured = 1 THEN 0 ELSE 1 END, s.sname ASC ";
                }

                $result = $con->query($stmt);

                $rows = [];
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }

                $rowCount = count($rows);
                $currentRow = 0;

                if ($rowCount > 0) {
                    foreach ($rows as $row) {
                        $currentRow++;
                        $avgRating = round($row['average_rating'], 1) == 0 ? 'New' : round($row['average_rating'], 1);

                        $isHiddenFace = true;
                        if ($row['discount_duration'] >= date('Y-m-d')) {
                            $isHiddenFace = false;
                        }

                        switch ($row['stype']) {
                            case 'Male Only':
                                $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                break;
                            case 'Female Only':
                                $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                break;
                            default:
                                $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                        }

                        $treatmentType = $row['transaction_type'];
                        $treatmentUrl = '';

                        switch ($treatmentType) {
                            case 'consultation':
                                $treatmentUrl = 'book.php?cunique=';
                                break;
                            case 'treatment':
                                $treatmentUrl = 'book-treatment.php?cunique=';
                                break;
                            case 'maxservice':
                                $treatmentUrl = 'book-max.php?cunique=';
                                break;
                        }

                        $divId = $currentRow === $rowCount ? 'id="body-tab"' : '';
                        $featuredClass = ($row['featured'] == true || $row['featured'] == 1) ? 'featured-card' : '';
                ?>

                        <!--Variant 1-->
                        <a href="<?= $treatmentUrl . $row['cunique'] . '&id=' . $row['id'] ?>" class="detail-page-cards " data-text="<?= $row['sname'] ?>" data-show="<?= $row['genderid'] ?>">
                            <div class="container bg-white <?php echo $featuredClass; ?> mt-3 position-relative" style="width: 90%;border-radius:20px">
                                <div class="row mx-0 py-2 ">
                                    <div class="col-4 p-0 px-2">
                                        <div class="detail-page-card-image p-0 m-0">
                                            <img src="assets/images/services/<?= $row['id'] ?>.png" class="img-fluid detail-page-image p-0">
                                        </div>
                                    </div>
                                    <div class="col-8 px-1">
                                        <h1 class="detail-page-card-heading pt-2"><?= $row['sname'] ?></h1>
                                        <div class="gender-box m-0">
                                            <div>
                                                <p class="service-rating" style="width: 100% !important">
                                                    <?= $avgRating ?>
                                                    <i class="fa-solid fa-star" id="service-star"></i>
                                                    <?php if ($row['ratings_count'] >= 10) : ?>
                                                        <u><?= $row['ratings_count'] ?> reviews</u>
                                                    <?php endif; ?>
                                                </p>
                                            </div>



                                            <div>
                                                <p class="service-gender m-0">
                                                    <span style="margin: 0 5px; color: #f1f1f1;">|</span>
                                                    <?= $img ?>
                                                    <?= $row['stype'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div>
                                                <div class="row">
                                                    <div class="col-4 ">
                                                        <p class="varies"><i class="fa-solid fa-stopwatch"></i>
                                                            <?= $treatmentType === 'consultation' ? $row['stime'] : $row['sduration'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                                                        ?>
                                                            <div style="<?= $isHiddenFace ? 'display: none;' : '' ?>">
                                                                <div class="old-price-detail-card text-end">
                                                                    <del class="old-price-del ">
                                                                        <?= convertCurrency($row['sprice']) ?>
                                                                    </del>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <?php if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') : ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <?php if (!$isHiddenFace) { ?>
                                                                <h4 class="orig-price-face service-price d-inline">
                                                                    <span style="font-weight:400; font-size:8px;"></span>
                                                                    <?= convertCurrency($row['final_price']) ?>
                                                                    <span style="font-weight:400; font-size:10px; <?= $isHiddenFace ? 'display: none;' : '' ?>">until <?= $row['discount_duration'] ?></span>

                                                                </h4>
                                                            <?php } else {
                                                            ?>
                                                                <h4 class="orig-price-face service-price d-inline">
                                                                    <?= convertCurrency($row['sprice']) ?>
                                                                </h4>
                                                            <?php
                                                            } ?>

                                                        </div>

                                                    </div>


                                                <?php else : ?>
                                                    <h4 class="orig-price-face service-price d-inline">
                                                        <span style="font-weight:400; font-size:8px;">from</span>
                                                        <?= convertCurrency($row['sprice']) ?>
                                                    </h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--Varient 1-->
                <?php
                    }

                    if (empty($rows)) {
                        echo '<p>No service to display at the moment.</p>';
                    }
                }
                ?>
            </div>
            <!-- Body Cards -->
            <div id="body_tab" class="example " style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                <h1 class="tab-title" style="margin-top: 20px">Body</h1>
                <?php
                // Define your SQL query to select all projects
                if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                    $whereClause = "WHERE s.cunique = '$expertId' AND s.scat = 'Body'";

                    if (isset($_GET['treatments'])) {
                        $treatments = implode("','", $_GET['treatments']);
                        $whereClause .= " AND s.subcat IN ('$treatments')";
                    }

                    if (isset($_GET['gender'])) {
                        $gender = $_GET['gender'];
                        if ($gender === 'male') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                        } elseif ($gender === 'female') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                        }
                    }

                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
                         FROM services s
                         LEFT JOIN reviews r ON s.id = r.sunique
                         $whereClause
                         GROUP BY s.id
                         ORDER BY CASE WHEN s.featured = 1 THEN 0 ELSE 1 END, s.sname ASC ";
                } else {
                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
                         FROM services s
                         LEFT JOIN reviews r ON s.id = r.sunique
                         WHERE s.cunique = '$expertId' AND s.scat = 'Body'
                         GROUP BY s.id
                         ORDER BY CASE WHEN s.featured = 1 THEN 0 ELSE 1 END, s.sname ASC ";
                }

                $result = $con->query($stmt);

                $rows = [];
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }

                $rowCount = count($rows);
                $currentRow = 0;

                if ($rowCount > 0) {
                    foreach ($rows as $k => $row) {
                        $currentRow++;
                        $treatmentType = $row['transaction_type'];
                        $avgRating = round($row['average_rating'], 1) == 0 ? 'New' : round($row['average_rating'], 1);

                        $isHiddenBody = true;
                        if ($row['discount_duration'] >= date('Y-m-d')) {
                            $isHiddenBody = false;
                        }

                        switch ($row['stype']) {
                            case 'Male Only':
                                $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                break;
                            case 'Female Only':
                                $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                break;
                            default:
                                $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                        }

                        $treatmentUrl = '';
                        switch ($treatmentType) {
                            case 'consultation':
                                $treatmentUrl = 'book.php?cunique=';
                                break;
                            case 'treatment':
                                $treatmentUrl = 'book-treatment.php?cunique=';
                                break;
                            case 'maxservice':
                                $treatmentUrl = 'book-max.php?cunique=';
                                break;
                        }

                        $divId = $currentRow === $rowCount ? 'id="health-tab"' : '';
                        $featuredClass = ($row['featured'] == true || $row['featured'] == 1) ? 'featured-card' : '';

                        // Body
                ?>
                        <a href="<?= $treatmentUrl . $row['cunique'] . '&id=' . $row['id'] ?>" class="detail-page-cards " data-show="<?= $row['genderid'] ?>" data-text="<?= $row['sname'] ?>">
                            <div class="container bg-white   <?php echo $featuredClass; ?> detail-card-container mt-3 position-relative" style="width: 90%;border-radius:20px">
                                <div class="row mx-0 py-2 ">
                                    <div class="col-4 p-0 px-2">
                                        <div class="detail-page-card-image p-0 m-0">
                                            <img src="assets/images/services/<?= $row['id'] ?>.png" class="img-fluid detail-page-image p-0">
                                        </div>
                                    </div>
                                    <div class="col-8 px-1">
                                        <h1 class="detail-page-card-heading pt-2 mb-1"><?= $row['sname'] ?></h1>
                                        <!-- <div class="pt-0 mb-1">
                                            <p class="service-location"><?= $row['scity'] . $row['scountry']  ?></p>
                                        </div> -->

                                        <!-- <div class="gender-box m-0 mb-1">
                                            <div><?= $img ?></div>
                                            <div>
                                                <p class="service-gender"><?= $row['stype'] ?></p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="service-rating">
                                                <?= $avgRating ?> <i class="fa-solid fa-star" id="service-star"></i>
                                                <?php if ($row['ratings_count'] >= 10) : ?>
                                                    <u><?= $row['ratings_count'] ?> reviews</u>
                                                <?php endif; ?>
                                            </p>
                                        </div> -->
                                        <div class="gender-box m-0">
                                            <div>
                                                <p class="service-rating" style="width: 100% !important">
                                                    <?= $avgRating ?>
                                                    <i class="fa-solid fa-star" id="service-star"></i>
                                                    <?php if ($row['ratings_count'] >= 10) : ?>
                                                        <u><?= $row['ratings_count'] ?> reviews</u>
                                                    <?php endif; ?>
                                                </p>
                                            </div>



                                            <div>
                                                <p class="service-gender m-0">
                                                    <span style="margin: 0 5px; color: #f1f1f1;">|</span>
                                                    <?= $img ?>
                                                    <?= $row['stype'] ?>
                                                </p>
                                            </div>
                                        </div>


                                        <div class="mt-2">
                                            <div>
                                                <div class="row">
                                                    <div class="col-4 ">
                                                        <p class="varies"><i class="fa-solid fa-stopwatch"></i>
                                                            <?= $treatmentType === 'consultation' ? $row['stime'] : $row['sduration'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                                                        ?>
                                                            <div style="<?= $isHiddenFace ? 'display: none;' : '' ?>">
                                                                <div class="old-price-detail-card text-end">
                                                                    <del class="old-price-del ">
                                                                        <?= convertCurrency($row['sprice']) ?>
                                                                    </del>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <?php if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') : ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <?php if (!$isHiddenFace) { ?>
                                                                <h4 class="orig-price-face service-price d-inline">
                                                                    <span style="font-weight:400; font-size:8px;"></span>
                                                                    <?= convertCurrency($row['final_price']) ?>
                                                                    <span style="font-weight:400; font-size:10px; <?= $isHiddenFace ? 'display: none;' : '' ?>">until <?= $row['discount_duration'] ?></span>

                                                                </h4>
                                                            <?php } else {
                                                            ?>
                                                                <h4 class="orig-price-face service-price d-inline">
                                                                    <?= convertCurrency($row['sprice']) ?>
                                                                </h4>
                                                            <?php
                                                            } ?>

                                                        </div>

                                                    </div>

                                                <?php else : ?>
                                                    <h4 class="orig-price-face service-price">
                                                        <span style="font-weight:400; font-size:8px;">from</span>
                                                        <?= convertCurrency($row['sprice']) ?>
                                                    </h4>
                                                <?php endif; ?>
                                                <!-- <div class="col-8">

                                                        <div class="old-price-detail-card m-0 text-end">
                                                            <del class="old-price-del">
                                                                <?= convertCurrency(3244) ?>
                                                            </del>

                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') : ?>
                                                    <h4 class="orig-price-face service-price ">
                                                        <span style="font-weight:400; font-size:8px;"></span>
                                                        <?= convertCurrency($row['sprice']) ?>
                                                    </h4>
                                                    <div style="<?= $isHiddenFace ? 'display: none;' : '' ?>">
                                                        <h4 class="service-price that-<?= $row['discountdisplay'] ?>">
                                                            <span style="font-weight:400; font-size:8px;"></span>
                                                            <?= convertCurrency($row['final_price']) ?>
                                                        </h4>
                                                        <p class="varies then-<?= $row['discountdisplay'] ?>">till <?= $row['discount_duration'] ?></p>
                                                    </div>
                                                <?php else : ?>
                                                    <h4 class="orig-price-face service-price">
                                                        <span style="font-weight:400; font-size:8px;">from</span>
                                                        <?= convertCurrency($row['sprice']) ?>
                                                    </h4>
                                                <?php endif; ?> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php
                        // Body



                        //                     echo '
                        //                 <div data-show="' .
                        //                         $row['genderid'] .
                        //                         '" class="item" style="width: 90%; margin: auto;" data-text="' .
                        //                         $row['sname'] .
                        //                         '"> 

                        //                     <a class="div" id="div" href="' .
                        //                         $treatmentUrl .
                        //                         $row['cunique'] .
                        //                         '&id=' .
                        //                         $row['id'] .
                        //                         '" style="width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                        //                         <div class="services-list" ' .
                        //                         $divId .
                        //                         '>
                        //                             <div class="service-img-container">
                        //                                 <img src="assets/images/services/' .
                        //                         $row['id'] .
                        //                         '.png">
                        //                             </div>
                        //                             <div class="service-details-list">
                        //                                 <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8px; margin-top: -3px;">
                        //                                     <h3 class="service-item-title" style="max-width:240px;">' .
                        //                         $row['sname'] .
                        //                         '</h3>
                        //                                 </div>
                        //                                 <div style="width: 90%; margin: auto; margin-bottom: 4px; margin-top: 8px;">
                        //                                     <p class="service-location">' .
                        //                         $row['scity'] .
                        //                         ', ' .
                        //                         $row['scountry'] .
                        //                         '</p>
                        //                                 </div>
                        //                                 <div class="gender-box">
                        //                                     <div style="width: auto;">' .
                        //                         $img .
                        //                         '</div>
                        //                                     <div style="width: 100%;">
                        //                                         <p class="service-gender">' .
                        //                         $row['stype'] .
                        //                         '</p>
                        //                                     </div>
                        //                                 </div>
                        //                                 <div style="width: 90%; margin: auto; margin-top: 4px;">
                        //                                     <p class="service-rating">' .
                        //                         $avgRating .
                        //                         ' <i class="fa-solid fa-star" id="service-star"></i>';

                        //                     if ($row['ratings_count'] >= 10) {
                        //                         echo ' <u>' . $row['ratings_count'] . ' reviews</u>';
                        //                     }


                        //                     echo '</p>
                        //                                 </div>


                        //                                 <div class="service-price-list" style="padding-left: 14px;
                        // padding-top: 5px;">
                        //                                 <p class="varies"><i class="fa-solid fa-stopwatch"></i> ';

                        //                     if ($treatmentType === 'consultation') {
                        //                         echo $row['stime'];
                        //                     } else {
                        //                         echo $row['sduration'];
                        //                     }

                        //                     if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                        //                         echo '
                        //                                     <h4 class="orig-price-body service-price this-' .
                        //                             $row['discountdisplay'] .
                        //                             '"><span style="font-weight:400; font-size:8px;"></span> ' .
                        //                             convertCurrency($row['sprice']) .
                        //                             '  </h4>
                        //                                     <div style="' .
                        //                             ($isHiddenBody ? 'display: none;' : '') .
                        //                             '">
                        //                                         <h4 class="service-price that-' .
                        //                             $row['discountdisplay'] .
                        //                             '"><span style="font-weight:400; font-size:8px;"></span> ' .
                        //                             convertCurrency($row['final_price']) .
                        //                             '  </h4>
                        //                                         <p class="varies then-' .
                        //                             $row['discountdisplay'] .
                        //                             '">till ' .
                        //                             $row['discount_duration'] .
                        //                             '</p>
                        //                                     </div>';
                        //                     } else {
                        //                         echo '</p>
                        //                                     <h4 class="service-price"><span style="font-weight:400; font-size:8px;">from</span> ' .
                        //                             convertCurrency($row['sprice']) .
                        //                             '  </h4>';
                        //                     }

                        //                     echo '
                        //                             </div>
                        //                             </div>

                        //                         </div>
                        //                     </a>
                        //                 </div>';
                    }

                    if (empty($rows)) {
                        echo '<p>No service to display at the moment.</p>';
                    }
                } ?>

            </div>
            <!-- Body Cards -->

            <!-- Health Cards -->
            <div id="health_tab" class="example " style="margin: auto;  width: 100%; height: max-content; overflow-x: hidden;">
                <h1 class="tab-title" style="margin-top: 20px">Health & Wellness</h1>

                <?php
                // Define your SQL query to select all projects
                if (isset($_GET['treatments']) || isset($_GET['gender'])) {
                    $whereClause = "WHERE s.cunique = '$expertId' AND s.scat LIKE 'Health%'";

                    if (isset($_GET['treatments'])) {
                        $treatments = implode("','", $_GET['treatments']);
                        $whereClause .= " AND s.subcat IN ('$treatments')";
                    }

                    if (isset($_GET['gender'])) {
                        $gender = $_GET['gender'];
                        if ($gender === 'male') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Male only')";
                        } elseif ($gender === 'female') {
                            $whereClause .= " AND s.stype IN ('Male & Female', 'Female only')";
                        }
                    }

                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
             FROM services s
             LEFT JOIN reviews r ON s.id = r.sunique
             $whereClause
             GROUP BY s.id
             ORDER BY CASE WHEN s.featured = 1 THEN 0 ELSE 1 END, s.sname ASC";
                } else {
                    $stmt = "SELECT s.*, COUNT(r.id) AS ratings_count, AVG(r.rating) AS average_rating
             FROM services s
             LEFT JOIN reviews r ON s.id = r.sunique
             WHERE s.cunique = '$expertId' AND s.scat = 'Health'
             GROUP BY s.id
             ORDER BY CASE WHEN s.featured = 1 THEN 0 ELSE 1 END, s.sname ASC";
                }

                $result = $con->query($stmt);
                ?>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $treatmentType = $row['transaction_type'];
                        $avgRating = round($row['average_rating'], 1) == 0 ? 'New' : round($row['average_rating'], 1);

                        $isHiddenHealth = true;
                        if ($row['discount_duration'] >= date('Y-m-d')) {
                            $isHiddenHealth = false;
                        }

                        switch ($row['stype']) {
                            case 'Male Only':
                                $img = '<img style="height:13px" src="assets/images/gender/3.svg">';
                                break;
                            case 'Female Only':
                                $img = '<img style="height:13px" src="assets/images/gender/2.svg">';
                                break;
                            default:
                                $img = '<img style="height:13px" src="assets/images/gender/1.svg">';
                        }

                        $treatmentUrl = '';
                        switch ($treatmentType) {
                            case 'consultation':
                                $treatmentUrl = 'book-now.php?cunique=';
                                break;
                            case 'treatment':
                                $treatmentUrl = 'book-now-treatment.php?cunique=';
                                break;
                            case 'maxservice':
                                $treatmentUrl = 'book-now-max.php?cunique=';
                                break;
                        }


                        $featuredClass = ($row['featured'] == true || $row['featured'] == 1) ? 'featured-card' : '';


                ?>

                        <!--Variant 1-->
                        <a href="<?= $treatmentUrl . $row['cunique'] . '&id=' . $row['id'] ?>" class="detail-page-cards " data-text="<?= $row['sname'] ?>" data-show="<?= $row['genderid'] ?>">
                            <div class="container bg-white  <?php echo $featuredClass; ?> mt-3 position-relative" style="width: 90%;border-radius:20px">
                                <div class="row mx-0 py-2 ">
                                    <div class="col-4 p-0 px-2">
                                        <div class="detail-page-card-image p-0 m-0">
                                            <img src="assets/images/services/<?= $row['id'] ?>.png" class="img-fluid detail-page-image p-0">
                                        </div>
                                    </div>
                                    <div class="col-8 px-1">
                                        <h1 class="detail-page-card-heading pt-2"><?= $row['sname'] ?></h1>
                                        <!-- <div class="gender-box m-0">
                                            <div>
                                                <p class="service-rating" style="width: 100%; !important">
                                                    <?= $avgRating ?>
                                                    <i class="fa-solid fa-star" id="service-star"></i>
                                                    <?php if ($row['ratings_count'] >= 10) : ?>
                                                        <u><?= $row['ratings_count'] ?> reviews</u>
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="service-gender m-0">
                                                    <span style="margin: 0 5px; color: #f1f1f1;">|</span>
                                                    <i class="fa-solid fa-mars-and-venus" style="color: #0cb4bf; margin-right: 3px; margin-left: -2px"></i>
                                                    <?= $row['stype'] ?>
                                                </p>
                                            </div>
                                        </div> -->
                                        <div class="gender-box m-0">
                                            <div>
                                                <p class="service-rating" style="width: 100% !important">
                                                    <?= $avgRating ?>
                                                    <i class="fa-solid fa-star" id="service-star"></i>
                                                    <?php if ($row['ratings_count'] >= 10) : ?>
                                                        <u><?= $row['ratings_count'] ?> reviews</u>
                                                    <?php endif; ?>
                                                </p>
                                            </div>



                                            <div>
                                                <p class="service-gender m-0">
                                                    <span style="margin: 0 5px; color: #f1f1f1;">|</span>
                                                    <?= $img ?>
                                                    <?= $row['stype'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div>
                                                <div class="row">
                                                    <div class="col-4 ">
                                                        <p class="varies"><i class="fa-solid fa-stopwatch"></i>
                                                            <?= $treatmentType === 'consultation' ? $row['stime'] : $row['sduration'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                                                        ?>
                                                            <div style="<?= $isHiddenFace ? 'display: none;' : '' ?>">
                                                                <div class="old-price-detail-card text-end">
                                                                    <del class="old-price-del ">
                                                                        <?= convertCurrency($row['sprice']) ?>
                                                                    </del>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <?php if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') : ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <?php if (!$isHiddenFace) { ?>
                                                                <h4 class="orig-price-face service-price d-inline">
                                                                    <span style="font-weight:400; font-size:8px;"></span>
                                                                    <?= convertCurrency($row['final_price']) ?>
                                                                    <span style="font-weight:400; font-size:10px; <?= $isHiddenFace ? 'display: none;' : '' ?>">until <?= $row['discount_duration'] ?></span>

                                                                </h4>
                                                            <?php } else {
                                                            ?>
                                                                <h4 class="orig-price-face service-price d-inline">
                                                                    <?= convertCurrency($row['sprice']) ?>
                                                                </h4>
                                                            <?php
                                                            } ?>

                                                        </div>

                                                    </div>

                                                <?php else : ?>
                                                    <h4 class="orig-price-face service-price">
                                                        <span style="font-weight:400; font-size:8px;">from</span>
                                                        <?= convertCurrency($row['sprice']) ?>
                                                    </h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--Varient 1-->
                <?php










                        //                 echo '
                        // <div data-show="' . $row['genderid'] . '" class="item" data-text="' . $row['sname'] . '">
                        //     <a class="div" id="div" href="' . $treatmentUrl . $row['cunique'] . '&id=' . $row['id'] . '" style="width: 100%; text-decoration: none; cursor: pointer; color: #000;">
                        //         <div class="services-list">
                        //             <div class="service-img-container">
                        //                 <img src="assets/images/services/' . $row['id'] . '.png">
                        //             </div>
                        //             <div class="service-details-list">
                        //                 <div style="margin: auto; width: 90%; display: grid; grid-template-columns: repeat(2, max-content 30%); column-gap: 20px; margin-bottom: 8px; margin-top: -3px;">
                        //                     <h3 class="service-item-title" style="max-width:240px;">' . $row['sname'] . '</h3>
                        //                 </div>
                        //                 <div class="gender-box">
                        //                      <div>
                        //                       <p class="service-rating" style="width: 100%; !important">' . $avgRating . ' <i class="fa-solid fa-star" id="service-star"></i>';

                        //                 if ($row['ratings_count'] >= 10) {
                        //                     echo ' <u>' . $row['ratings_count'] . ' reviews</u>';
                        //                 }

                        //                 echo '</p>


                        //                     </div>
                        //                     <div>
                        //                         <p class="service-gender"> <span style="margin: 0 5px; color: #f1f1f1;">|</span><i class="fa-solid fa-mars-and-venus" style="color: ##0cb4bf; margin-right: 3px; margin-left: -2px"></i>' . $row['stype'] . '</p>
                        //                     </div>

                        //                 </div>
                        //                 <div style="width: 90%; margin: auto; margin-top: 4px;">
                        //                     <div>
                        //                         <p class="varies" style="text-align:left !important"><i class="fa-solid fa-stopwatch"></i> ';

                        //                 if ($treatmentType === 'consultation') {
                        //                     echo $row['stime'];
                        //                 } else {
                        //                     echo $row['sduration'];
                        //                 }

                        //                 if ($treatmentType === 'treatment' || $treatmentType === 'maxservice') {
                        //                     echo '
                        //                                 <h4 style="text-align:left !important; color: #0CB4BF;  font-size: 20px" class="orig-price-face service-price this-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['sprice']) . '  </h4>
                        //                                 <div style="' . ($isHiddenFace ? 'display: none;' : '') . '">
                        //                                     <h4 class="service-price that-' . $row['discountdisplay'] . '"><span style="font-weight:400; font-size:8px;"></span> ' . convertCurrency($row['final_price']) . '  </h4>
                        //                                     <p class="varies then-' . $row['discountdisplay'] . '">till ' . $row['discount_duration'] . '</p>
                        //                                 </div>';
                        //                 } else {
                        //                     echo '</p>
                        //                                 <h4 style="text-align:left !important; color: #0CB4BF; font-size: 20px " class="orig-price-face service-price"><span style="font-weight:400; font-size:8px;">from</span> ' . convertCurrency($row['sprice']) . '  </h4>';
                        //                 }

                        //                 echo '

                        //                     </div>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //     </a>
                        // </div>';
                    }

                    if (empty($result)) {
                        echo '<p>No service to display at the moment.</p>';
                    }
                }
                ?>


            </div>
            <!-- Health Cards -->

        </div>
    </div>

    <div id="scroll" style="margin: auto; width: 100%; height: auto; overflow-x: auto;">
        <div style="margin: auto; width: 90%; height: auto; margin-top: 40px;">
            <h1 style="margin: 0; padding: 0; color: #000; font-size: 20px; font-weight: 600;">Customer Reviews</h1>
        </div>

        <div class="scroll-container">


            <!-- Second customer-reviews-card -->
        </div>
    </div>



    <script>
        window.addEventListener('scroll', function() {
            var filterBox = document.querySelector('.filter-box');
            var offsetTop = filterBox.offsetTop;

            if (window.pageYOffset > offsetTop) {
                filterBox.classList.add('fixed-filter-box');
            } else {
                filterBox.classList.remove('fixed-filter-box');
            }
        });


        const shareButton = document.getElementById('share-button');
        const id = <?php echo json_encode($cid_url); ?>;
        const cunique = <?php echo json_encode($cunique_url); ?>;
        const textToShare =
            "Check out this awesome clinic on Aesthetic Links: https://aestheticlinks.com/app/uae/clinic-details.blade.php?id=" +
            id + "&cunique=" + cunique;

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



    <!------ End Clinic Fetch --->



    <script>
        function closeSort() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>

    <script>
        function addToFavorites(e) {
            e.preventDefault()
            let form = document.getElementById('addToFavoritesForm')
            form.submit()
        }

        function copyCurrentUrl() {
            let tempInput = document.createElement("input");
            tempInput.value = window.location.href;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            var tooltip = document.createElement("div");
            tooltip.textContent = "URL Copied!";
            tooltip.classList.add("tooltip");
            document.body.appendChild(tooltip);

            var iconRect = document.querySelector("#share-service").getBoundingClientRect();
            tooltip.style.top = (iconRect.top - tooltip.offsetHeight - 5) +
                "px"; // Adjusted for the tooltip height and margin
            tooltip.style.left = (iconRect.left + (iconRect.width / 2) - (tooltip.offsetWidth / 2)) +
                "px"; // Centered above the icon

            setTimeout(function() {
                document.body.removeChild(tooltip);
            }, 2000);
        }
    </script>

    <script>
        var isHiddenFace = '<?= $isHiddenFace ?>'
        var isHiddenBody = '<?= $isHiddenBody ?>'

        if (isHiddenFace) {
            var origPrice = document.querySelectorAll('.orig-price-face')

            if (origPrice != []) {
                origPrice.forEach(el => el.classList.remove('this-discountdisplay'))
            }
        }

        if (isHiddenBody) {
            var origPrice = document.querySelectorAll('.orig-price-body')

            if (origPrice != []) {
                origPrice.forEach(el => el.classList.remove('this-discountdisplay'))
            }
        }
    </script>



    <!-- <script>
        function openService(evt, serviceName) {
            if (serviceName == 'body') {
                document.querySelector('#body-tab').scrollIntoView({
                    behavior: 'smooth'
                });
            }

            // var i, tabcontent, tablinks;
            // tabcontent = document.getElementsByClassName("tabcontent");
            // for (i = 0; i < tabcontent.length; i++) {
            //     tabcontent[i].style.display = "none";
            // }
            // tablinks = document.getElementsByClassName("tablinks");
            // for (i = 0; i < tablinks.length; i++) {
            //     tablinks[i].className = tablinks[i].className.replace(" active", "");
            // }
            document.getElementById(serviceName).style.display = "block";
            // evt.currentTarget.className += " active";
        }

        // Trigger click event on the button for 'London' tab to open it by default
        document.querySelector(".tablinks:first-child").click();
    </script> -->


    <!----- Start Dropdown Java ---------->
    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <!----- Start Dropdown Java ---------->
    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction2() {
            document.getElementById("myDropdown2").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn2')) {
                var dropdowns = document.getElementsByClassName("dropdown-content2");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <!-------- Start Filter JS --------->

    <script>
        const selectElement = document.getElementById('mySelect');

        selectElement.addEventListener('change', handleSelectChange);

        function handleSelectChange(event) {
            const value = event.target.value;

            // Hide all elements with the `data-show` attribute
            const dataShowElements = document.querySelectorAll('[data-show]');
            dataShowElements.forEach(element => element.hidden = true);

            // Show only elements whose `data-show` attribute matches the selected value
            dataShowElements.forEach(element => {
                if (element.dataset.show === value) {
                    element.hidden = false;
                }
            });

            // Hide all elements with the `data-hide` attribute
            const dataHideElements = document.querySelectorAll('[data-hide]');
            dataHideElements.forEach(element => element.hidden = true);

            // Show only elements whose `data-hide` attribute matches the selected value
            dataHideElements.forEach(element => {
                if (element.dataset.hide === value) {
                    element.hidden = false;
                }
            });
        }
    </script>


    <!-------- Start Sort A-Z & Price ----------->
    <script>
        const radioContainer = document.querySelector('.radio-container');
        const sortButtons = radioContainer.querySelectorAll('input[type="radio"]');

        const sortableContainer1 = document.querySelector('.sortable-container');
        const sortableContainer2 = document.querySelector('.sortable-container2');
        const sortableContainer3 = document.querySelector('.sortable-container3');

        sortButtons.forEach(button => {
            button.addEventListener('change', () => {
                const order = button.value; // asc or desc

                // Sort and re-arrange each container individually
                sortItems(sortableContainer1, order);
                sortItems(sortableContainer2, order);
                sortItems(sortableContainer3, order);
            });
        });

        function sortItems(container, order) {
            const items = container.querySelectorAll('.detail-card-container');
            const sortedItems = Array.from(items)
                .sort((a, b) => {
                    const textA = a.dataset.text.toUpperCase();
                    const textB = b.dataset.text.toUpperCase();
                    return order === 'asc' ? textA.localeCompare(textB) : textB.localeCompare(textA);
                });

            container.innerHTML = ""; // Clear existing items
            sortedItems.forEach(item => {
                container.appendChild(item); // Append in sorted order
            });
        }
    </script>


    <!--- Search Script -->
    <script>
        // const searchBox = document.getElementById("search-box");
        // const divs = document.querySelectorAll(".div");

        // // Function to filter divs based on search keywords
        // function filterDivs(keywords) {
        //     keywords = keywords.toLowerCase().split(/\s+/); // Split keywords and lowercase
        //     for (const div of divs) {
        //         const content = div.textContent.toLowerCase(); // Get content and lowercase
        //         let matchFound = false;
        //         for (const keyword of keywords) {
        //             if (content.includes(keyword)) {
        //                 matchFound = true;
        //                 break; // Stop searching if any keyword matches
        //             }
        //         }
        //         div.style.display = matchFound ? "block" : "none";
        //     }
        // }

        // // Event listener for input changes in the search box
        // searchBox.addEventListener("input", () => {
        //     const keywords = searchBox.value.trim(); // Get trimmed search keywords
        //     filterDivs(keywords); // Call filter function with keywords
        // });

        // // Show all divs by default on page load
        // filterDivs(""); // Empty string to show all divs

        // function toggleReadMore() {
        //     var shortBio = document.getElementById("cbio-short");
        //     var fullBio = document.getElementById("cbio-full");
        //     var readMoreBtn = document.getElementById("read-more");
        //     var readLessBtn = document.getElementById("read-less");

        //     if (shortBio.style.display === "none") {
        //         shortBio.style.display = "block";
        //         fullBio.style.display = "none";
        //         readMoreBtn.style.display = "inline";
        //         readLessBtn.style.display = "none";
        //     } else {
        //         shortBio.style.display = "none";
        //         fullBio.style.display = "block";
        //         readMoreBtn.style.display = "none";
        //         readLessBtn.style.display = "inline";
        //     }
        // }

        // // Initially display the short bio if it exceeds 100 characters
        // document.addEventListener("DOMContentLoaded", function() {
        //     var cbioFullText = document.getElementById("cbio-full").innerText;
        //     if (cbioFullText.length > 100) {
        //         document.getElementById("cbio-short").style.display = "block";
        //         document.getElementById("cbio-full").style.display = "none";
        //     } else {
        //         document.getElementById("read-more").style.display = "none";
        //     }
        // });


        document.addEventListener("DOMContentLoaded", function() {
            const searchBox = document.getElementById("search-box");
            const divs = document.querySelectorAll(".detail-page-cards");

            // Function to filter divs based on search keywords
            function filterDivs(keywords) {
                keywords = keywords.toLowerCase().split(/\s+/); // Split keywords and lowercase
                for (const div of divs) {
                    const content = div.textContent.toLowerCase(); // Get content and lowercase
                    let matchFound = false;
                    for (const keyword of keywords) {
                        if (content.includes(keyword)) {
                            matchFound = true;
                            break; // Stop searching if any keyword matches
                        }
                    }
                    div.style.display = matchFound ? "block" : "none";
                }
            }

            // Event listener for input changes in the search box
            searchBox.addEventListener("input", () => {
                const keywords = searchBox.value.trim(); // Get trimmed search keywords
                filterDivs(keywords); // Call filter function with keywords
            });

            // Show all divs by default on page load
            filterDivs(""); // Empty string to show all divs

            function toggleReadMore() {
                var shortBio = document.getElementById("cbio-short");
                var fullBio = document.getElementById("cbio-full");
                var readMoreBtn = document.getElementById("read-more");
                var readLessBtn = document.getElementById("read-less");

                if (shortBio.style.display === "none") {
                    shortBio.style.display = "block";
                    fullBio.style.display = "none";
                    readMoreBtn.style.display = "inline";
                    readLessBtn.style.display = "none";
                } else {
                    shortBio.style.display = "none";
                    fullBio.style.display = "block";
                    readMoreBtn.style.display = "none";
                    readLessBtn.style.display = "inline";
                }
            }

            // Initially display the short bio if it exceeds 100 characters
            var cbioFullText = document.getElementById("cbio-full").innerText;
            if (cbioFullText.length > 100) {
                document.getElementById("cbio-short").style.display = "block";
                document.getElementById("cbio-full").style.display = "none";
            } else {
                document.getElementById("read-more").style.display = "none";
            }

            document.getElementById("read-more").addEventListener("click", toggleReadMore);
            document.getElementById("read-less").addEventListener("click", toggleReadMore);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        // external js: isotope.pkgd.js


        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            getSortData: {
                name: '.name',
                symbol: '.symbol',
                number: '.number parseInt',
                category: '[data-category]',
                weight: function(itemElem) {
                    var weight = $(itemElem).find('.weight').text();
                    return parseFloat(weight.replace(/[\(\)]/g, ''));
                }
            }
        });

        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt(number, 10) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match(/ium$/);
            }
        };

        // bind filter button click
        $('#filters').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[filterValue] || filterValue;
            $grid.isotope({
                filter: filterValue
            });
        });

        // bind sort button click
        $('#sorts').on('click', 'button', function() {
            var sortByValue = $(this).attr('data-sort-by');
            $grid.isotope({
                sortBy: sortByValue
            });
        });

        // change is-checked class on buttons
        $('.button-group').each(function(i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });
    </script>
    <script>
        // function openService(evt, serviceName) {
        //     // Get all elements with class="tablinks" and remove the class "active"
        //     var tablinks = document.getElementsByClassName("tablinks");
        //     for (var i = 0; i < tablinks.length; i++) {
        //         tablinks[i].classList.remove("active");
        //     }

        //     // Add the active class to the current/clicked button
        //     evt.currentTarget.classList.add("active");
        // }

        // // By default, open the first tab
        // document.getElementById("defaultOpen").click();


        document.addEventListener('DOMContentLoaded', (event) => {
            const sections = [
                document.getElementById('face_tab'),
                document.getElementById('body_tab'),
                document.getElementById('health_tab')
            ];
            const links = document.querySelectorAll('.tablinks');
            let isClickScrolling = false;
            const offset = 270; // Adjust this value as needed

            function setActiveTab() {
                if (isClickScrolling) return;

                let index = sections.length;

                while (--index && window.scrollY + offset < sections[index].offsetTop) {}

                // Add a slight delay for smoothness
                setTimeout(() => {
                    links.forEach((link) => link.classList.remove('active'));
                    if (links[index]) {
                        links[index].classList.add('active');
                    }
                }, 100); // Adjust the delay as needed (100 milliseconds in this example)
            }

            function openService(event, serviceId) {
                // Prevent default action if any
                event.preventDefault();

                // Get all elements with class="tablinks" and remove the class "active"
                links.forEach((link) => link.classList.remove("active"));

                // Add the active class to the clicked button
                event.currentTarget.classList.add("active");

                // Scroll to the section with offset
                var element = document.getElementById(serviceId);
                if (element) {
                    isClickScrolling = true;
                    window.scrollTo({
                        top: element.offsetTop - 220,
                        behavior: 'smooth'
                    });

                    // Set a timeout to allow smooth scrolling to complete
                    setTimeout(() => {
                        isClickScrolling = false;
                        setActiveTab();
                    }, 500);
                }
            }

            window.addEventListener('scroll', setActiveTab);
            setActiveTab();

            // Expose the function to global scope
            window.openService = openService;
        });

        // Latest COde
        // function openService(event, serviceId) {
        //     // Prevent default action if any
        //     event.preventDefault();

        //     // Scroll to the section with offset
        //     var element = document.getElementById(serviceId);
        //     if (element) {
        //         window.scrollTo({
        //             top: element.offsetTop - 220,
        //             behavior: 'smooth'
        //         });
        //     }

        //     // Get all elements with class="tablinks" and remove the class "active"
        //     var tablinks = document.getElementsByClassName("tablinks");
        //     for (var i = 0; i < tablinks.length; i++) {
        //         tablinks[i].classList.remove("active");
        //     }

        //     // Add the active class to the clicked button
        //     event.currentTarget.classList.add("active");
        // }


        // Optionally, you can add this script to handle default open tab on page load
        // document.addEventListener("DOMContentLoaded", function() {
        //     document.getElementById("defaultOpen").click();
        // });
        document.addEventListener("DOMContentLoaded", function() {
            // Scroll to the top of the page
            window.scrollTo(0, 0);
        });
    </script>
</body>

<script>
    var modal = document.querySelector(".modal");
    var triggers = document.querySelectorAll(".trigger");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    for (var i = 0, len = triggers.length; i < len; i++) {
        triggers[i].addEventListener("click", toggleModal);
    }
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);


    // Scroll tab active
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</script>