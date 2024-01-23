<?php
define('DB_HOST', '90.247.138.228');
define('DB_PORT', '3306'); // Define the port separately if it's not the default (3306)
define('DB_USER', 'snaily scriptr');
define('DB_PASSWORD', 'BKu00iFf(TJgGHm)');
define('DB_NAME', 'snaily script');

function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
