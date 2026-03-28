<?php
require 'config.php';

if(isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $oauth = new Google_Service_Oauth2($client);
    $userinfo = $oauth->userinfo->get();

    $_SESSION['user'] = [
        'name' => $userinfo->name,
        'email' => $userinfo->email
    ];

    header('Location: index.php');
    exit();
}
?>
