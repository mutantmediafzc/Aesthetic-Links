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
    $htmlOutput .= '<a id="div" class="div" href="clinic-details.blade.php?id=' . $row['id'] . '&cunique=' . $row['cunique'] . '" style="width: 100%; height: auto; text-decoration: none; cursor: pointer; color: #444444;">
        <div class="card-item">
            <div class="clinic-img-container">
                <div class="clinic-text-location" style="z-index: 1;">
                    <h1>' . $row['ccity'] . ', ' . $row['ccountry'] . '</h1>
                </div>
                <div class="clinic-small-logo" style="z-index: 1;">
                    <img src="assets/images/clinic-logos/' . $row['cunique'] . '.png" class="clinic-small-logo-img">
                </div>
                <div class="overlay-black" style="z-index: 0;">
                    <img src="assets/images/clinic-images/' . $row['cunique'] . '.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                </div>
            </div>
            <div class="text-container">
                <div style="width: 100%; height: auto;">
                    <div><p class="paragraph-1">' . $row['cname'] . '</p></div>
                </div>
                <div class="second-line">
                    <div><p class="paragraph-2"><i class="fa-solid fa-mars-stroke-up" style="color: #0C1E36;"></i><i class="fa-solid fa-venus" style="color: #0CB4BF;"></i> ' . $row['ctype'] . '</p></div>
                    <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle"></i></div>
                    <div><p class="paragraph-2" style="color: #0CB4BF;">' .  $avgRating . ' <i class="fa-solid fa-star" id="star"></i>&nbsp; <span style="color: #212121;"><u>' . $row['total_reviews'] . ' reviews</u></span></p></div>
                    <div style="display: flex; justify-content: center; align-items: center;"><i class="fa-solid fa-circle" id="circle"></i></div>
                    <div class="money-icon-container">';

    if ($row['cpricelevel'] >= 3) {
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
    } elseif ($row['cpricelevel'] == 2) {
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>';
    } else {
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon-2"></i></div>';
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>';
        $htmlOutput .= '<div style="display: flex; align-items: center;"><i class="fa-solid fa-dollar-sign" id="money-icon"></i></div>';
    }

    $htmlOutput .= '</div>
                </div>
                <div style="width: 100%; height: auto;"><div style="margin-top: 8px;" class="solid"></div></div>
            </div>
        </div>
    </a>';
}

echo "<div>" . $htmlOutput . "</div>";

?>