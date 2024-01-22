<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: secured_files/bryan_snaily/server/server.lua');
    exit();
}

// Check login credentials
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $license_key = $_POST["license_key"];

    // Your login logic goes here (replace this with actual authentication logic)
    if ($username === "demo" && $license_key === "demo123") {
        // Authentication successful
        $_SESSION['loggedin'] = true;
        header('Location: secured_files/bryan_snaily/server/server.lua');
        exit();
    } else {
        echo "Login failed. Please check your credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="license_key">License Key:</label>
        <input type="text" id="license_key" name="license_key" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
