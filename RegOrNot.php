<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "WEATHER");
if (!$conn) {
    die("Connection failed");
}

$email = $_POST['email'];
$pass  = $_POST['password'];

echo "Email entered: [$email]<br>";

$sql_all = "SELECT email FROM User_details";
$res = mysqli_query($conn, $sql_all);

while ($r = mysqli_fetch_assoc($res)) {
    echo "DB email: [" . $r['email'] . "]<br>";
}


$sql = "SELECT * FROM User_details WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['password'])) {

        $_SESSION['email'] = $row['email'];
        $_SESSION['city']  = $row['city'];

        header("Location: weather.php");
        exit();

    } else {
        echo "Incorrect password";
    }

} else {
    echo "User not registered";
}

mysqli_close($conn);
?>
