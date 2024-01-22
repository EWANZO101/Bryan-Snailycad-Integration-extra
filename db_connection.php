<?php
// db_connection.php

$servername = "90.247.138.228:3306";
$username = "snaily script";
$password = "#MeE!fGtCUavUyrEFdoiK@6zgAQ^akwVrojrYGcnX6tovHxGt8AP5VU7DnrNp!";
$dbname = "snaily script";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
