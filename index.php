<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Student Registration Form</h1>
        <form id="registrationForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="registration_no">Registration No:</label>
                <input type="text" class="form-control" id="registration_no" name="registration_no" required>
            </div>
            <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" class="form-control" id="roll_no" name="roll_no" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="number" class="form-control" id="semester" name="semester" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <button onclick="window.location.href='formlist.php'" class="btn btn-secondary mt-3">Form List</button>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            const formData = new FormData(this);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'register.php', true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    if (xhr.responseText === 'success') {
                        alert('Form submitted successfully!');
                        document.getElementById('registrationForm').reset(); // Reset the form
                    } else {
                        alert('Error: ' + xhr.responseText);
                    }
                } else {
                    alert('An error occurred while submitting the form.');
                }
            };

            xhr.send(formData);
        });
    </script>
</body>
</html>
