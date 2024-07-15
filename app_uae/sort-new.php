<?php

require_once 'connection.php';

$query = $_POST['query'];

$stmt = match ($_POST['sort']) {
    'cname-asc' => str_replace(" AND c.recommended = 1", "", $query) . ' ORDER BY c.cname ASC',
    'cname-desc' => str_replace(" AND c.recommended = 1", "", $query) . ' ORDER BY c.cname DESC',
    'top-rated' => str_replace(" AND c.recommended = 1", "", $query) . ' ORDER BY c.rating DESC',
    'recommended' => $query,
    default => str_replace(" AND c.recommended = 1", "", $query)
};

$result = $con->query($stmt);
$results = $result->fetch_all(MYSQLI_ASSOC);

$htmlOutput = '';
foreach ($results as $row) {
    $avgRating = round($row['average_rating'],1) == 0 ? 'New' :  round($row['average_rating'],1);

    if ($row['ctype'] == 'Male Only') {
        $imgClinic = '<img style="height:14px; margin-right:2px;" src="assets/images/gender/3.svg">';
    } else if ($row['ctype'] == 'Female Only') {
        $imgClinic = '<img style="height:14px; margin-right:2px;" src="assets/images/gender/2.svg">';
    } else {
        $imgClinic = '<img style="height:14px; margin-right:2px;" src="assets/images/gender/1.svg">';
    }


    $htmlOutput .= '
        <a id="div" class="div" href="clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] . '" style="text-decoration: none">
            <div class="wrapper">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/images/clinic-images/' . $row['cunique'] . '.png" alt="Clinic">
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i>' . $row['ccity'] . ', ' . $row['ccountry'] . '</div>
                        <div class="card-logo">
                            <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" alt="Clinic Logo">
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h2>' . $row['cname'] . '</h2>
                            <div class="card-price">';
    if ($row['cpricelevel'] == 3) {
        $htmlOutput .= '<span class="price-tier">$$$</span>';
    }
    if ($row['cpricelevel'] == 2) {
        $htmlOutput .= '<span class="price-tier">$$</span><span class="ordinary-price-tier">$</span>';
    }
    if ($row['cpricelevel'] == 1) {
        $htmlOutput .= '<span class="price-tier">$</span><span class="ordinary-price-tier">$$</span>';
    }
    $htmlOutput .= '
                            </div>
                        </div>
                        <div class="card-rating">';
    if ($avgRating != 'New') {
        $htmlOutput .= '<span class="rating">' . $avgRating . '<i class="fas fa-star"></i></span><span class="reviews" style="margin-right: 0;">Reviews</span>';
    } else {
        $htmlOutput .= '<span class="reviews" style="margin-right: 0; color: #0CB4BF">New</span>';
    }
    $htmlOutput .= '
                            <div class="vertical-line"></div>
                            <span class="gender">' . $imgClinic . ' ' . $row['ctype'] . '</span>
                        </div>
                        <p>';
    $bio = $row['cbio'];
    if (strlen($bio) > 50) {
        $bio = substr($bio, 0, 100) . '...';
    }
    $htmlOutput .= $bio;
    $htmlOutput .= '
                        </p>
                    </div>
                </div>
            </div>
        </a>';

}

echo $htmlOutput;

?>