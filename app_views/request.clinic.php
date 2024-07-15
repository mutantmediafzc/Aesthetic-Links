<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cname = $_POST["cname"];
    $relation = $_POST["relation"];
    $srelation = $_POST["srelation"];
    $email = $_POST["email"];
    $message = $email . ' is requesting for a clinic called ' . $cname . '. Their relation with the clinic is ' . $relation . ', ' . $srelation;

    // Set the recipient email address
    $to = "ivan@aestheticlinks.com";
    
    // Set the sender email address
    $from = "webmaster@example.com";

    // Set the subject of the email
    $subject = "New Contact Form Submission";

    // Compose the email message
    $body = "Name: $email\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $from";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
        header("Location: request-clinic-success.blade.php");
        exit();
    } else {
        echo "Error sending the email. Please try again later.";
        header("Location: request-clinic-failed.blade.php");
        exit();
    }
}

?>
