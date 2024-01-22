<?php

// Database configuration
$servername = "90.247.138.228:3306";
$username = "snaily script";
$password = "#MeE!fGtCUavUyrEFdoiK@6zgAQ^akwVrojrYGcnX6tovHxGt8AP5VU7DnrNp!";
$dbname = "snaily script";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle login form submission
    $username = $_POST['username'];
    $license_key = $_POST['license_key'];

    // Validate user credentials
    $query = "SELECT * FROM users WHERE username = '$username' AND license_key = '$license_key'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User authenticated, provide download link
        $download_link = "download.php?username=$username&filename=example_file.txt";
        echo "Welcome, $username! Click <a href=\"$download_link\">here</a> to download your file.";
        exit();
    } else {
        echo "Invalid credentials";
    }
}

// Handle file download
if (isset($_GET['username']) && isset($_GET['filename'])) {
    $username = $_GET['username'];
    $filename = $_GET['filename'];

    // Check if the user exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User exists, provide file for download
        $file_path = "/Bryan-Snailycad-Integration-/cad scripts/bryan_snaily/$username/$filename";
        if (file_exists($file_path)) {
            header("Content-Disposition: attachment; filename=$filename");
            readfile($file_path);
            exit();
        } else {
            echo "File not found";
        }
    } else {
        echo "Invalid username";
    }
}

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="license_key">License Key:</label>
        <input type="text" id="license_key" name="license_key" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>