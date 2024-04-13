<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Patient - Hospital Madero</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Register Patient</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="register_patient.php">Register Patient</a>
        <a href="register_doctor.php">Register Doctor</a>
        <a href="search.php">Search</a>
    </nav>
    <div class="container">
        <form action="register_patient.php" method="post">
            <div class="form-group">
                <label for="patient-id">Patient Id:</label>
                <input type="text" id="patient-id" name="patient_id">
            </div>
            <div class="form-group">
                <label for="patient-name">Patient Name:</label>
                <input type="text" id="patient-name" name="patient_name" required>
            </div>
            <div class="form-group">
                <label for="patient-dob">Date of Birth:</label>
                <input type="date" id="patient-dob" name="patient_dob" required>
            </div>
            <div class="form-group">
                <label for="patient-phone">Phone Number:</label>
                <input type="text" id="patient-phone" name="patient_phone" required>
            </div>
            <div class="form-group">
                <label for="patient-symptoms">Symptoms:</label>
                <input type="text" id="patient-symptoms" name="symptoms" required>
            </div>
            <div class="form-group">
                <label for="assigned-doctor">Assigned Doctor:</label>
                <input type="text" id="assigned-doctor" name="assigned_doctor" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "hospitaldb";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Sanitize input
            $patient_id = htmlspecialchars($_POST['patient_id']);
            $patient_name = htmlspecialchars($_POST['patient_name']);
            $patient_dob = htmlspecialchars($_POST['patient_dob']);
            $patient_phone = htmlspecialchars($_POST['patient_phone']);
            $symptoms = htmlspecialchars($_POST['symptoms']);
            $assigned_doctor = htmlspecialchars($_POST['assigned_doctor']);

            // SQL to insert data
            $sql = "INSERT INTO Patients (patient_id, patient_name, patient_dob, patient_phone, symptoms, assigned_doctor)
                    VALUES ('$patient_id', '$patient_name', '$patient_dob', '$patient_phone', '$symptoms', '$assigned_doctor')";

            if ($connection->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Patient registered successfully!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . "<br>" . $connection->error . '</div>';
            }

            $connection->close();
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2024 Hospital Madero</p>
    </footer>
</body>
</html>