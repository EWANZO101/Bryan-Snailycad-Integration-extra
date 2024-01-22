<?php
$servername = "90.247.138.228:3306";
$username = "snaily script";
$password = "#MeE!fGtCUavUyrEFdoiK@6zgAQ^akwVrojrYGcnX6tovHxGt8AP5VU7DnrNp!";
$dbname = "snaily script";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function validateLicenseKey($username, $licenseKey, $conn) {
    $sql = "SELECT * FROM users WHERE username='$username' AND license_key='$licenseKey'";
    $result = $conn->query($sql);

    return ($result->num_rows > 0);
}

$conn->close();
?>
