<?php

require_once 'connection.php';


if (!isset($_POST['email']) || empty($_POST['email'])) {
    http_response_code(400);
    echo "Email not found";
    exit();
}

$email = $_POST['email'];

$query = "SELECT a.* FROM accounts a WHERE a.email = '$email'" ;
$result = $con->query($query);
$results = $result->fetch_all(MYSQLI_ASSOC);


if (count($results) == 0) {
    http_response_code(400);
    echo "Email not found";
    exit();
} else {
    $email = $results[0]['email'];
    $token = bin2hex(random_bytes(32));

    $query = "INSERT INTO password_resets (email, token, created_at) VALUES ('$email', '$token', NOW())";
    mysqli_query($con, $query);

    $to = $email;
    $reset_link = "https://aestheticlinks.com/app/views/reset-password-token.blade.php?token=$token";
    $subject = "Forgot Password";
    $message = "Click the following link to reset your password: $reset_link";
    $headers = "From: accounts@aestheticlinks.com";

    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200);
        echo "Email sent successfully!";
    } else {
        http_response_code(500);
        echo "Failed to send the email.";
    }
}
