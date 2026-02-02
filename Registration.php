<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>

    <div class="register-box">
        <h2>Weather Dashboard Registration</h2>

        <form action="connect.php" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>

            <input type="email" name="email" placeholder="Email Address" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="text" name="city" placeholder="Preferred City (Weather)" required>

            <select name="unit" required>
                <option value="">Temperature Unit</option>
                <option value="Celsius">Celsius</option>
                <option value="Fahrenheit">Fahrenheit</option>
            </select>

            <button type="submit">Register</button>
        </form>

        <p>Already registered? <a href="LoginForm.html">Login</a></p>
    </div>

</body>
</html>
