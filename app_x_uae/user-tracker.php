<?php
require_once 'server-connect.php';

if (isset($_GET['action'], $_GET['field'], $_GET['clinicId'], $_GET['clinic']) && $_GET['action'] == 'userTracker') {
    userTracker($_GET['field'], $_GET['clinicId'], $_GET['clinic']);
}

function userTracker($field, $clinicId, $clinic)
{
    $con = $GLOBALS['con'];
    $dateToday = date("Y-m-d");
    
    $getUserTrackingStmt = "SELECT * FROM user_trackings WHERE clinic_id = '$clinicId' AND date = '$dateToday'";
    $userTrackingResult = $con->query($getUserTrackingStmt);

    $userTrackingCount = 1;
    if ($userTrackingResult->num_rows > 0) {
        while ($userTrackingRow = $userTrackingResult->fetch_assoc()) {
            $userTrackingCount = $userTrackingRow[$field]+1;
            
            $updateStmt = $con->prepare("UPDATE user_trackings SET {$field} = ? WHERE id = ?");
            $updateStmt->bind_param('ss', $userTrackingCount, $userTrackingRow['id']);
            $updateStmt->execute();
        }
    } else {
        $createStmt = $con->prepare("INSERT INTO user_trackings (clinic_id, clinic_name, {$field}, date) VALUES (?, ?, ?, ?)");
        $createStmt->bind_param('ssss', $clinicId, $clinic, $userTrackingCount, $dateToday);
        $createStmt->execute();
    }
}
