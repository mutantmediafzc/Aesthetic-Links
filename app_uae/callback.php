<?php
require 'vendor/autoload.php'; // Ensure you have composer installed and the JWT library added

use \Firebase\JWT\JWT;

function handleAppleSignIn()
{
    $clientID = 'com.your.client.id';
    $clientSecret = createClientSecret();
    $code = $_POST['code'];
    $id_token = $_POST['id_token'];

    // Exchange the authorization code for tokens
    $response = file_get_contents("https://appleid.apple.com/auth/token", false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query([
                'client_id' => $clientID,
                'client_secret' => $clientSecret,
                'code' => $code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'https://aestheticlinks.com/app/uae/callback.php'
            ])
        ]
    ]));

    $data = json_decode($response, true);

    // Decode the identity token
    $jwt = $data['id_token'];
    $applePublicKey = getApplePublicKey(); // Implement this function to fetch Apple's public key
    $decoded = JWT::decode($jwt, $applePublicKey, ['RS256']);

    // Store the tokens and user information in the database
    storeTokensAndUserInfo($decoded, $data);
}

function createClientSecret()
{
    $keyfile = 'path/to/AuthKey_YOUR_KEY_ID.p8';
    $key_id = 'YOUR_KEY_ID';
    $team_id = 'YOUR_TEAM_ID';
    $client_id = 'com.your.client.id';

    $header = [
        'alg' => 'ES256',
        'kid' => $key_id
    ];

    $claims = [
        'iss' => $team_id,
        'iat' => time(),
        'exp' => time() + (86400 * 180),
        'aud' => 'https://appleid.apple.com',
        'sub' => $client_id
    ];

    $pkey = openssl_pkey_get_private('file://' . $keyfile);
    $payload = JWT::encode($claims, $pkey, 'ES256', $header['kid']);

    return $payload;
}

function storeTokensAndUserInfo($userInfo, $tokens)
{
    // Implement your database logic here
    $db = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
    $stmt = $db->prepare('INSERT INTO users (apple_id, access_token, refresh_token) VALUES (?, ?, ?)');
    $stmt->execute([$userInfo->sub, $tokens['access_token'], $tokens['refresh_token']]);
}

handleAppleSignIn();
