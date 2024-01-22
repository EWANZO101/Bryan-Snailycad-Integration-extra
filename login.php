<?php
// login.php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $license_key = $_POST['license_key'];

    $query = "SELECT * FROM users WHERE username = '$username' AND license_key = '$license_key'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $file_query = "SELECT file_path FROM user_files WHERE username = '$username'";
        $file_result = $conn->query($file_query);

        if ($file_result->num_rows > 0) {
            while ($row = $file_result->fetch_assoc()) {
                $file_path = $row['file_path'];
                echo "<a href=\"download.php?username=$username&filename=$file_path\">Download $file_path</a><br>";
            }
        } else {
            echo "No files found for this user.";
        }
    } else {
        echo "Invalid credentials";
    }
}

$conn->close();
?>
