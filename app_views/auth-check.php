<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'server-connect.php';
if (!isset($_SESSION['loggedin']) && isset($_COOKIE['remember_token'])) {

    $remember_token = $_COOKIE['remember_token'];

    if ($stmt = $con->prepare('SELECT user_id, token FROM remember_tokens WHERE token = ?')) {

        $stmt->bind_param('s', $remember_token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $db_token);
            $stmt->fetch();


            $stmt_user = $con->prepare('SELECT id, userlevel, username FROM accounts WHERE id = ?');
            $stmt_user->bind_param('i', $user_id);
            $stmt_user->execute();
            $stmt_user->store_result();

            if ($stmt_user->num_rows > 0) {
                $stmt_user->bind_result($id, $userlevel, $username);
                $stmt_user->fetch();
                print_r($_COOKIE['remember_token']);

                $stmt_crr = $con->prepare('SELECT currency FROM user_currency WHERE user_id = ? ORDER BY created_at DESC LIMIT 1');
                $stmt_crr->bind_param('i', $id);
                $stmt_crr->execute();
                $result_crr = $stmt_crr->get_result();
                if ($row_crr = $result_crr->fetch_assoc()) {
                    $selectedCurrency = $row_crr['currency'];
                } else {
                    $selectedCurrency = "USD";
                }

                $_SESSION['name'] = $username;
                $_SESSION['currency'] = $selectedCurrency;
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['id'] = $id;
                $_SESSION['userlevel'] = $userlevel;

                // Redirect to landing page
                header('Location: landing-page.blade.php');
                exit();
            }
            $stmt_user->close();
        }
        $stmt->close();
    }
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
    header('Location: landing-page.blade.php');
    exit();
}
