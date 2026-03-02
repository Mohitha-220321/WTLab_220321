<?php
session_start();
require '../config/database.php';

$users = $db->users;

$user = $users->findOne(['email' => $_POST['email']]);

if(!$user) {
    die("User not found!");
}

if(!password_verify($_POST['password'], $user['password'])) {
    die("Invalid password!");
}

$_SESSION['user'] = $user['name'];

header("Location: ../public/dashboard.php");

?>