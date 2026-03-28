<?php
require_once 'vendor/autoload.php';
session_start();

$client = new Google_Client();

$client->setClientId("631525988418-idsp3sgisk9fu24bc18kobe80ebe0j39.apps.googleusercontent.com");
$client->setClientSecret("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");

$client->setRedirectUri("http://localhost/wT/oauth/callback.php");

$client->addScope("email");
$client->addScope("profile");
?>
