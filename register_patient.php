<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Patient - Hospital Madero</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 15px;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], input[type=date] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Register Patient</h1>
    </header>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label for="patient-name">Patient Name:</label>
                <input type="text" id="patient-name" name="patient_name">
            </div>
            <div class="form-group">
                <label for="patient-id">Patient Id:</label>
                <input type="text" id="patient-id" name="patient_id">
            </div>
            <div class="form-group">
                <label for="patient-dob">Date of Birth:</label>
                <input type="date" id="patient-dob" name="patient_dob">
            </div>
            <div class="form-group">
                <label for="patient-phone">Phone Number:</label>
                <input type="text" id="patient-phone" name="patient_phone">
            </div>
            <div class="form-group">
                <label for="patient-symptoms">Symptoms:</label>
                <input type="text" id="symptoms" name="symptoms">
            </div>
            <div class="form-group">
                <label for="assigned-doctor">Assigned doctor:</label>
                <input type="text" id="assigned-doctor" name="assigned_doctor">
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo '<div class="alert">Patient registered successfully!</div>';
                }
            ?>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Hospital Madero</p>
    </footer>
</body>
</html>

