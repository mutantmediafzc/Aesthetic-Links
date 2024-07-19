<?php
require_once '../../server.blade.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../login.blade.php');
    exit;
}
$errors = [];

$query_params = $_SESSION['query_params'] ?? [];

// Assign default values if the parameters are not set
$cunique = htmlspecialchars($query_params['cunique'] ?? '');
$cid = htmlspecialchars($query_params['cid'] ?? '');
$keydate = htmlspecialchars($query_params['date'] ?? '');
$keytime = htmlspecialchars($query_params['time'] ?? '');
$keyexpert = htmlspecialchars($query_params['expert'] ?? '');
$keynote = htmlspecialchars($query_params['note'] ?? '');
$redirect = htmlspecialchars($query_params['redirect'] ?? 'landing-page.blade.php');

// die($redirect);
if (!empty($redirect) && isset($redirect)) {
    $url = "$redirect?cunique=$cunique&id=$cid&date=$keydate&time=$keytime&expert=$keyexpert&note=$keynote";
} else {
    $url = "landing-page.blade.php";
}

if ($_POST['code1'] === '' || $_POST['code2'] === '' || $_POST['code3'] === '' || $_POST['code4'] === '') {
    $errors[] = "All OTP fields are required.";
} else {
    $otp = $_POST['code1'] . $_POST['code2'] . $_POST['code3'] . $_POST['code4'];
}

$mobile =  $_SESSION["phone_number"];
if ($stmt = $con->prepare('SELECT id , username , userlevel FROM accounts WHERE mobile = ? AND otp = ?')) {
    $stmt->bind_param('ss', $mobile, $otp);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $uname, $level);
        $stmt->fetch();
        $newstatus = 1;

        if ($updateStmt = $con->prepare('UPDATE accounts SET verified = ?, otp = ? WHERE id = ?')) {
            $updateStmt->bind_param('ssi', $newstatus, $otp, $id);
            $updateStmt->execute();
            $updateStmt->close();


            $stmt_crr = $con->prepare('SELECT currency FROM user_currency WHERE user_id = ? ORDER BY created_at DESC LIMIT 1');
            $stmt_crr->bind_param('i', $id);
            $stmt_crr->execute();
            $result_crr = $stmt_crr->get_result();

            if ($row_crr = $result_crr->fetch_assoc()) {
                $selectedCurrency = $row_crr['currency'];
            } else {
                $selectedCurrency = "USD";
            }

            $session_token = bin2hex(random_bytes(32));
            $hashed_session_token = password_hash($session_token, PASSWORD_DEFAULT);


            // Check if a remember token already exists
            $stmt_check = $con->prepare('SELECT user_id FROM remember_tokens WHERE user_id = ?');
            $stmt_check->bind_param('i', $id);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows > 0) {
                // Update existing token
                $stmt_update = $con->prepare('UPDATE remember_tokens SET token = ? WHERE user_id = ?');
                $stmt_update->bind_param('si', $session_token, $id);
                $stmt_update->execute();
                $stmt_update->close();
            } else {
                // Insert new token
                $stmt_insert = $con->prepare('INSERT INTO remember_tokens (user_id, token) VALUES (?, ?)');
                $stmt_insert->bind_param('is', $id, $session_token);
                $stmt_insert->execute();
                $stmt_insert->close();
            }
            $stmt_check->close();

            setcookie('remember_token', $session_token, time() + (86400 * 30));
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $uname;
            $_SESSION['id'] = $id;
            $_SESSION['currency'] = $selectedCurrency;
            $_SESSION['userlevel'] = $level;

            unset($_SESSION["phone_number"]);
            unset($_SESSION['registration_data']);
            unset($_SESSION['old_input']);
            unset($_SESSION['query_params']);

            header('Location: ../../' . $url);
            exit();
        } else {
            $errors[] = "Failed to prepare the update statement.";
        }
    } else {
        $errors[] = "The OTP you entered is incorrect!";
    }

    $stmt->close();
} else {
    $errors[] = "Failed to prepare the select statement.";
}

if (!empty($errors)) {
    $_SESSION['error_otp'] = $errors;
    header('Location: ../../verified-otp.blade.php');
    exit();
}
