<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data
    $sql = "SELECT name, registration_no, roll_no, semester, year FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Update Student Form</h1>
        <form id="updateForm" method="POST" action="updateform.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $student['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="registration_no">Registration No:</label>
                <input type="text" class="form-control" id="registration_no" name="registration_no" value="<?php echo $student['registration_no']; ?>" required>
            </div>
            <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" class="form-control" id="roll_no" name="roll_no" value="<?php echo $student['roll_no']; ?>" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="number" class="form-control" id="semester" name="semester" value="<?php echo $student['semester']; ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" value="<?php echo $student['year']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button onclick="window.location.href='formlist.php'" class="btn btn-secondary">Back to Form List</button>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $registration_no = $_POST['registration_no'];
    $roll_no = $_POST['roll_no'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];

    // Update query
    $updateQuery = "UPDATE students SET name='$name', registration_no='$registration_no', roll_no='$roll_no', semester=$semester, year=$year WHERE id=$id";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    // Redirect back to the form list
    header("Location: formlist.php");
    exit;
}
?>
