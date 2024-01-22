<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $username = $_POST["username"];
    $license_key = $_POST["license_key"];

    // Your login logic goes here (replace this with actual authentication logic)
    if ($username === "demo" && $license_key === "demo123") {
        echo "Login successful!";
    } else {
        echo "Login failed. Please check your credentials.";
    }
}
?>
<?php
echo "Hello from login.php!";
?>
