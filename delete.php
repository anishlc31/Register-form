<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $deleteQuery = "DELETE FROM students WHERE id = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

// Redirect back to the form list
header("Location: formlist.php");
exit;
?>
