
<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$client = new MongoDB\Client($_ENV['MONGO_URI']);
$db = $client->selectDatabase($_ENV['DB_NAME']);
?>