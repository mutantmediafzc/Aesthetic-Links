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
$client->setRedirectUri('https://aestheticlinks.com/app/views/google-auth.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

$loginType = $_SESSION['login_type'];

if(isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if(!isset($token["error"])){
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        if ($stmt = $con->prepare('SELECT id, password, userlevel FROM accounts WHERE email = ? AND social_id IS NULL')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $google_account_info->email);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $_SESSION['error_message'] = 'This email has already been associated with an existing account';
                header('Location: ' . $loginType);
                exit;
            }

            if ($stmt2 = $con->prepare('SELECT id, userlevel FROM accounts WHERE email = ? AND social_id = ?')) {
                $stmt2->bind_param('ss', $google_account_info->email, $google_account_info->id);
                $stmt2->execute();
                $stmt2->store_result();

                if ($stmt2->num_rows > 0) {
                    $stmt2->bind_result($id, $userlevel);
                    $stmt2->fetch();
    
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $google_account_info->name;
                    $_SESSION['id'] = $id;
                    $_SESSION['userlevel'] = $userlevel;

                    header('Location: ' . $_SESSION['login_redirection_url'] ?? 'profile.blade.php');
                    exit;
                } else {
                    if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, verified, userunique, userlevel, profilelevel, social_id, social_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                        $password = password_hash('my-google', PASSWORD_DEFAULT);
                        $userunique = uniqid();
                        $verified = 1;
                        $userlevel = 0;
                        $profilelevel = 1;
                        $socialId = $google_account_info->id;
                        $socialType = 'google';
                        $stmt->bind_param('sssssssss', $google_account_info->name, $password, $google_account_info->email, $verified, $profilelevel, $userlevel, $userunique, $socialId, $socialType);
                        $stmt->execute();
                        $lastUserId = $stmt->insert_id;
        
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $google_account_info->name;
                        $_SESSION['id'] = $lastUserId;
                        $_SESSION['userlevel'] = $userlevel;
                    }
        
                    header('Location: ' . $_SESSION['login_redirection_url'] ?? 'profile.blade.php');
                    exit;
                }
            }
        } 
    } else{
        $_SESSION['error_message'] = 'Something went wrong with your login. Please try again';
        header('Location: ' . $loginType);
        exit;
    }
    
} else {
    header("Location: " . $client->createAuthUrl());
}
