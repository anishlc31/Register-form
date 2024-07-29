<?php
include 'connect.php';

// Fetch all records from the students table
$sql = "SELECT id, name, registration_no, roll_no, semester, year FROM students";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">List of Submitted Forms</h1>
        <?php
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>Registration No</th>';
            echo '<th>Roll No</th>';
            echo '<th>Semester</th>';
            echo '<th>Year</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['registration_no'] . '</td>';
                echo '<td>' . $row['roll_no'] . '</td>';
                echo '<td>' . $row['semester'] . '</td>';
                echo '<td>' . $row['year'] . '</td>';
                echo '<td>';
                echo '<a href="updateform.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Update</a> ';
                echo '<a href="deleteform.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this form?\')">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No forms submitted yet.</p>';
        }

        $conn->close();
        ?>
        <button onclick="window.location.href='index.php'" class="btn btn-primary mt-3">Back to Form</button>
    </div>
</body>
</html>
