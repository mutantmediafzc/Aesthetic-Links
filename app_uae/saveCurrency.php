<?php
session_start();
include 'server-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currency = $_POST['currency'];
    $user_id = $_SESSION['id'];

    // Prepare the SQL statement with ON DUPLICATE KEY UPDATE
    $stmt = $con->prepare("INSERT INTO `user_currency` (currency, user_id) VALUES (?, ?)
                           ON DUPLICATE KEY UPDATE currency = VALUES(currency)");
    $stmt->bind_param("ss", $currency, $user_id);

    if ($stmt->execute()) {
        $_SESSION['currency'] = $currency;
        echo json_encode(['success' => true, 'message' => 'Currency saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save currency']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

$con->close();
?>