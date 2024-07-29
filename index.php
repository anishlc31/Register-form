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
        table {
            margin-top: 30px;
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
                <select class="form-control" id="semester" name="semester" required onchange="fetchCourses()">
    <option value="">Select Semester</option>
    <option value="1sem">1</option>
    <option value="2sem">2</option>
    <option value="3sem">3</option>
    <option value="4sem">4</option>
    <option value="5sem">5</option>
    <option value="6sem">6</option>
    <option value="7sem">7</option>
    <option value="8sem">8</option>
</select>

            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>      
              <button onclick="window.location.href='getcourse.php'" class="btn btn-primary mt-3">Get course</button>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Table to display courses -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>S.N</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                </tr>
            </thead>
            <tbody id="courseTableBody">
                <!-- Table rows will be inserted here by JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        // Function to fetch courses based on selected semester
        function fetchCourses() {
            const semester = document.getElementById('semester').value;
            const tableBody = document.getElementById('courseTableBody');
            tableBody.innerHTML = ''; // Clear existing table rows

            if (semester) {
                fetch(`getcourse.php?semester=${semester}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach((course, index) => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td><input type="checkbox"></td>
                                <td>${index + 1}</td>
                                <td>${course.course_code}</td>
                                <td>${course.course_name}</td>
                            `;
                            tableBody.appendChild(row);
                        });
                    })
                    .catch(error => console.error('Error fetching courses:', error));
            }
        }

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
                        document.getElementById('courseTableBody').innerHTML = ''; // Clear the table
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
