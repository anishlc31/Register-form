<?php
$servername = "localhost";
$username = "root"; // Change this if your MySQL username is different
$password = "";
$dbname = "student_db"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
