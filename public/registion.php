<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registion (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

if ($stmt->execute()) {
  echo "New record created successfully";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
