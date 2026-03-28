<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "WEATHER";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get form values (UNCHANGED)
$fullname = $_POST['fullname'];
$email    = $_POST['email'];
$pass     = $_POST['password'];
$city     = $_POST['city'];
$unit     = $_POST['unit'];

// Hash password for security
 $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Insert into User_details table
$sql = "INSERT INTO User_details (fullname, email, password, city, unit)
        VALUES ('$fullname', '$email', '$hashed_password', '$city', '$unit')";

if (mysqli_query($conn, $sql)) {
    // Redirect to existing login form
    header("Location: LoginForm.html");
    exit();
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
