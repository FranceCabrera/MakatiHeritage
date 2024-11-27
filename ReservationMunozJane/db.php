<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db_reservationmunoz";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_reservationmunoz);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
