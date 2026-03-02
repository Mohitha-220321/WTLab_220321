<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../config/database.php';
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
    die("All fields are required!");
}

if(strlen($_POST['password']) < 6) {
    die("Password must be at least 6 characters.");
}

$users = $db->users;

/* Duplicate Check */
$existingUser = $users->findOne(['email' => $_POST['email']]);

if($existingUser) {
    die("Email already registered!");
}

/* Insert */
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

$users->insertOne([
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => $hashedPassword,
    'created_at' => new MongoDB\BSON\UTCDateTime()
]);

echo "Signup successful! <a href='../public/login.php'>Login here</a>";
?>