<?php
include 'session.php';
require_once 'server-connect.php';

$cunique = $_POST['cunique'];
$id = $_POST['id'];

if (! $cunique || ! $id) {
    header('Location: discover-page.blade.php');
}

if (! isset($_SESSION['loggedin'])) {
    header('Location: login.blade.bookings.php?cunique=' . $cunique . '&id=' . $id);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $con->prepare("SELECT id FROM clinics WHERE cunique = ? AND id = ?");
    $stmt->bind_param('ii', $cunique, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $userId = $_SESSION['id'];
        
        $checkFavorites = $con->prepare("SELECT * FROM account_favorites WHERE account_id = ? AND clinic_id = ?");
        $checkFavorites->bind_param('ii', $userId, $id);
        $checkFavorites->execute();
        $resultCheck = $checkFavorites->get_result();

        if ($resultCheck->num_rows > 0) {
            $removeFromFavorites = $con->prepare("DELETE FROM account_favorites WHERE account_id = ? AND clinic_id = ?");
            $removeFromFavorites->bind_param('ii', $userId, $id);
            $removeFromFavorites->execute();

            header('Location: clinic-details.blade.php?cunique=' . $cunique . '&id=' . $id);
            exit();
        }

        $addToFavorites = $con->prepare("INSERT INTO account_favorites (account_id, clinic_id) VALUES (?, ?)");
        $addToFavorites->bind_param('ii', $userId, $id);
        $addToFavorites->execute();

        header('Location: clinic-details.blade.php?cunique=' . $cunique . '&id=' . $id);
        exit;
    } else {
        header('Location: clinic-details.blade.php?cunique=' . $cunique . '&id=' . $id);
        exit;
    }
}
