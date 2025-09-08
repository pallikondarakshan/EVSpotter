<?php
// db.php – Database connection file
$host = "localhost";
$user = "root";        // change if you have a custom username
$pass = "";            // change if you have a MySQL password
$dbname = "spotter";   // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>