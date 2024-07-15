<?php

require_once 'connection.php';

if (!isset($_POST['token']) || empty($_POST['token']) || !isset($_POST['password']) || empty($_POST['password'])) {
    http_response_code(400);
    echo "Token or password not provided.";
    exit();
}

// Retrieve token and password from the POST request
$token = $_POST['token'];
$password = $_POST['password'];

// Query the database to find the token
$query = "SELECT email, created_at FROM password_resets WHERE token = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('s', $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $created_at = $row['created_at'];

    // Check if the token has expired
    $expiration_time = strtotime($created_at) + 3600; // 3600 seconds = 1 hour
    if (time() <= $expiration_time) {
        // Retrieve user information from the accounts table
        $stmt = $con->prepare('SELECT username, email, userunique, userlevel, profilelevel FROM accounts WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($username, $email, $userunique, $userlevel, $profilelevel);
        $stmt->fetch();
        $stmt->close();

        // Update the password in the accounts table
        $stmt = $con->prepare('UPDATE accounts SET password = ? WHERE email = ?');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param('ss', $hashed_password, $email);
        $stmt->execute();

        http_response_code(200);
        echo "Password successfully reset.";
    } else {
        echo "This password reset link has expired. Please request a new one.";
    }
} else {
    echo "Invalid password reset link.";
}

$stmt->close();
$con->close();