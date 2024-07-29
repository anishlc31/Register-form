<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $registration_no = $_POST['registration_no'];
    $roll_no = $_POST['roll_no'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];
    
    // Handling file upload
   // $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

    $insertQuery = "INSERT INTO students (name, registration_no, roll_no, semester, year) VALUES ('$name', '$registration_no', '$roll_no', $semester, $year)";
    
    if ($conn->query($insertQuery) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
