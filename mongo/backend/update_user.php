<?php
require '../config/database.php';

$users = $db->users;

$users->updateOne(
    ['email' => $_POST['email']],
    ['$set' => ['name' => $_POST['new_name']]]
);

echo "User updated successfully!";
?>