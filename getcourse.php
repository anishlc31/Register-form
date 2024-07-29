<?php
$servername = "localhost";
$username = "root"; // Change this if your MySQL username is different
$password = "";
$dbname = "course"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//console.log('it works')


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch data from the 1sem table
$table = '1sem';

// Output the content type and the start of HTML
header('Content-Type: text/html; charset=UTF-8');
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List for 1st Semester</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Course List for 1st Semester</h1>';

// Check if the table exists
$checkTableQuery = "SHOW TABLES LIKE '$table'";
$tableResult = $conn->query($checkTableQuery);

if ($tableResult && $tableResult->num_rows > 0) {
    echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                </tr>
            </thead>
            <tbody>';

    // Fetch data from the table
    $query = "SELECT `s.n`, `course_code`, `course_name` FROM `$table`";
    $result = $conn->query($query);

    if ($result) {
        $sn = 1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $sn++ . '</td>
                    <td>' . htmlspecialchars($row['course_code']) . '</td>
                    <td>' . htmlspecialchars($row['course_name']) . '</td>
                  </tr>';
        }
        if ($sn === 1) {
            echo '<tr><td colspan="3">No data found.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="3">Error executing query: ' . $conn->error . '</td></tr>';
    }
} else {
    echo '<p>The table ' . htmlspecialchars($table) . ' does not exist.</p>';
}

echo '</tbody></table>
    </div>
</body>
</html>';

$conn->close();
?>