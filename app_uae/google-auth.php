<?php

require 'google-api/vendor/autoload.php';
require_once 'server-connect.php';

// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('836723864516-jajq36gaqipl1gh64tp9jau8mo5cbltt.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('https://aestheticlinks.com/app/uae/google-auth.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

$loginType = $_SESSION['login_type'] ?? "social";
$errors = [];
$query_params = $_SESSION['query_params'] ?? [];

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

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token["error"])) {
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $password = password_hash('my-google', PASSWORD_DEFAULT);
        $userunique = uniqid();
        $verified = 1;
        $userlevel = 0;
        $profilelevel = 1;
        $socialId = $google_account_info->id;
        $socialType = 'google';

        // Storing data into database
        if ($stmt = $con->prepare('SELECT id, password, userlevel FROM accounts WHERE email = ? AND social_id IS NULL')) {
            $stmt->bind_param('s', $google_account_info->email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $errors['error_message'] = 'This email has already been associated with an existing account';
                $_SESSION['errors_register'] = $errors;
                header('Location: ../../register.blade.php');
                exit;
            }

            if ($stmt2 = $con->prepare('SELECT * FROM accounts WHERE email = ? AND social_id = ?')) {
                $stmt2->bind_param('ss', $google_account_info->email, $google_account_info->id);
                $stmt2->execute();
                $result = $stmt2->get_result();
                $row_2 = $result->fetch_assoc();
                $verified = $row_2['verified'];
                $id = $row_2['id'];

                if ($result->num_rows > 0) {

                    if ($verified == 1) {

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

                        setcookie('remember_token', $session_token, time() + (86400 * 30));
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $google_account_info->name;
                        $_SESSION['id'] = $id;
                        $_SESSION['currency'] = $selectedCurrency;
                        $_SESSION['userlevel'] = $userlevel;
                        header('Location: ' . $url);
                    } else {

                        $registration_data_social = [
                            'full_name' => isset($google_account_info->name) ? $google_account_info->name : '',
                            'email' => isset($google_account_info->email) ? $google_account_info->email : '',
                            'password' => $password,
                            'userunique' => $userunique,
                            'socialType' => $socialType,
                            'verified' => 0,
                            'userlevel' => $userlevel,
                            'profilelevel' => $profilelevel,
                            'socialId' => $socialId,
                        ];
                        $_SESSION['registration_data_social'] = $registration_data_social;
                        header('Location: ./verify-account.blade.php');
                        exit;
                    }
                    // session_regenerate_id();
                    // $_SESSION['loggedin'] = TRUE;
                    // $_SESSION['name'] = $google_account_info->name;
                    // $_SESSION['id'] = $id;
                    // $_SESSION['userlevel'] = $userlevel;

                    exit;
                } else {
                    // if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, verified, userunique, userlevel, profilelevel, social_id, social_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)')) {

                    //     $stmt->bind_param('sssssssss', $google_account_info->name, $password, $google_account_info->email, $verified, $profilelevel, $userlevel, $userunique, $socialId, $socialType);
                    //     $stmt->execute();
                    //     $lastUserId = $stmt->insert_id;

                    //     session_regenerate_id();
                    //     $_SESSION['loggedin'] = TRUE;
                    //     $_SESSION['name'] = $google_account_info->name;
                    //     $_SESSION['id'] = $lastUserId;
                    //     $_SESSION['userlevel'] = $userlevel;
                    // }

                    $registration_data_social = [
                        'full_name' => isset($google_account_info->name) ? $google_account_info->name : '',
                        'email' => isset($google_account_info->email) ? $google_account_info->email : '',
                        'password' => $password,
                        'userunique' => $userunique,
                        'socialType' => $socialType,
                        'verified' => 0,
                        'userlevel' => $userlevel,
                        'profilelevel' => $profilelevel,
                        'socialId' => $socialId,
                    ];

                    $_SESSION['registration_data_social'] = $registration_data_social;

                    header('Location: ./verify-account.blade.php');
                    exit;
                }
            }
        }
    } else {
        $errors['error'] = 'Something went wrong with your login. Please try again';
        $_SESSION['errors_register'] = $errors;
        header('Location: ../../register.blade.php');
        exit;
    }
} else {
    header("Location: " . $client->createAuthUrl());
}
