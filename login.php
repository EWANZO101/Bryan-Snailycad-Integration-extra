<?php
include 'license_verification.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $licenseKey = $_POST['license_key'];

    if (validateLicenseKey($username, $licenseKey, $conn)) {
        // Valid license key, allow access to the application
        echo "Access granted!";
        // Add your application logic here
    } else {
        // Invalid license key, deny access
        echo "Invalid license key. Access denied.";
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
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="license_key">License Key:</label>
        <input type="text" name="license_key" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
