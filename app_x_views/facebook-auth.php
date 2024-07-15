<?php
require_once 'server-connect.php';

// Update the following variables
$facebook_oauth_app_id = '375329468873516';
$facebook_oauth_app_secret = '13de241ac9fbb1b10c8acf51c41c0e8a';
// Must be the direct URL to the facebook-auth.php file
$facebook_oauth_redirect_uri = 'https://aestheticlinks.com/app_x/views/facebook-auth.php';
$facebook_oauth_version = 'v18.0';

if (isset($_GET['code']) && !empty($_GET['code'])) {
    // Execute cURL request to retrieve the access token
    $params = [
        'client_id' => $facebook_oauth_app_id,
        'client_secret' => $facebook_oauth_app_secret,
        'redirect_uri' => $facebook_oauth_redirect_uri,
        'code' => $_GET['code']
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/oauth/access_token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);

    if (isset($response['access_token']) && !empty($response['access_token'])) {
        // Execute cURL request to retrieve the user info associated with the Facebook account
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $facebook_oauth_version . '/me?fields=name,email,picture');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $response['access_token']]);
        $response = curl_exec($ch);
        curl_close($ch);
        $profile = json_decode($response, true);

        if ($stmt = $con->prepare('SELECT id, password, userlevel FROM accounts WHERE email = ? AND social_id IS NULL')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $profile['email']);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $_SESSION['error_message'] = 'This email has already been associated with an existing account';
                header('Location: ' . $loginType);
                exit;
            }

            if ($stmt2 = $con->prepare('SELECT id, userlevel FROM accounts WHERE email = ? AND social_id = ?')) {
                $stmt2->bind_param('ss', $profile['email'], $profile['id']);
                $stmt2->execute();
                $stmt2->store_result();

                if ($stmt2->num_rows > 0) {
                    $stmt2->bind_result($id, $userlevel);
                    $stmt2->fetch();
    
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $profile['name'];
                    $_SESSION['id'] = $id;
                    $_SESSION['userlevel'] = $userlevel;

                    header('Location: ' . $_SESSION['login_redirection_url'] ?? 'profile.blade.php');
                    exit;
                } else {
                    if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, verified, userunique, userlevel, profilelevel, social_id, social_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                        $password = password_hash('my-facebook', PASSWORD_DEFAULT);
                        $userunique = uniqid();
                        $verified = 1;
                        $userlevel = 0;
                        $profilelevel = 1;
                        $socialId = $profile['id'];
                        $socialType = 'facebook';
                        $stmt->bind_param('sssssssss', $profile['name'], $password, $profile['email'], $verified, $profilelevel, $userlevel, $userunique, $socialId, $socialType);
                        $stmt->execute();
                        $lastUserId = $stmt->insert_id;
        
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $profile['name'];
                        $_SESSION['id'] = $lastUserId;
                        $_SESSION['userlevel'] = $userlevel;
                    }
        
                    header('Location: ' . $_SESSION['login_redirection_url'] ?? 'profile.blade.php');
                    exit;
                }
            }
        }
    } else {
        exit('Invalid access token! Please try again later!');
    }

} else {
    // Define params and redirect to Facebook OAuth page
    $params = [
        'client_id' => $facebook_oauth_app_id,
        'redirect_uri' => $facebook_oauth_redirect_uri,
        'response_type' => 'code',
        'scope' => 'email'
    ];
    header('Location: https://www.facebook.com/dialog/oauth?' . http_build_query($params));
    exit;
}

