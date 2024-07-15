<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../login.blade.php');
    exit;
}

require_once '../../server.blade.php';
session_start();

$errors = [];
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['full_name'])) {
        $errors['full_name'] = 'Full Name is required.';
    } else {
        $full_name = trim($_POST['full_name']);
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required.';
    } else {
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        } else {
            if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE  email = ?')) {
                $stmt->bind_param('s',  $_POST['email']);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $errors['email'] = "This email is already registered. Please use a different one.";
                }
            }
        }
    }

    // Validate Password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required.';
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 6) {
            $errors['password'] = 'Password must be at least 6 characters long.';
        }
    }



    if (empty($errors)) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $registration_data = [
            'full_name' => isset($_POST['full_name']) ? $_POST['full_name'] : '',
            'email' => isset($_POST['email']) ? $_POST['email'] : '',
            'password' => $password,
            'referral' => isset($_POST['referral']) ? $_POST['referral'] : '',
            'userlevel' => isset($_POST['userlevel']) ? $_POST['userlevel'] : 1,
            'profilelevel' => isset($_POST['profilelevel']) ? $_POST['profilelevel'] : 0
        ];

        $_SESSION['registration_data'] = $registration_data;

        header('Location: ../../verify-account.blade.php');
        exit;
    } else {
        $_SESSION['registration_data'] = $_POST;
        $_SESSION['errors_register'] = $errors;
        header('Location: ../../register.blade.php');
        exit;
    }
}
