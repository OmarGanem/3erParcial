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
        input[type=text], input[type=email], input[type=date] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button, .btn {
            background-color: #007bff; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
        }
        button:hover, .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Register Patient</h1>
    </header>
    <div class="container">
        <!-- Formulario para registrar a un paciente -->
        <form action="register_patient.php" method="post">
            <div class="form-group">
                <label for="patient-name">Patient Name:</label>
                <input type="text" id="patient-name" name="patient_name" required>
            </div>
            <div class="form-group">
                <label for="patient-last-name">Patient Last Name:</label>
                <input type="text" id="patient-last-name" name="patient_last_name" required>
            </div>
            <div class="form-group">
                <label for="patient-address">Patient Address:</label>
                <input type="text" id="patient-address" name="patient_address" required>
            </div>
            <div class="form-group">
                <label for="patient-phone">Phone Number:</label>
                <input type="text" id="patient-phone" name="patient_phone" required>
            </div>
            <div class="form-group">
                <label for="patient-email">Patient Email:</label>
                <input type="email" id="patient-email" name="patient_email" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
                <!-- Botón para regresar al index -->
                <a href="index.php" class="btn">Return to Home</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "medicalrecords";
    $link = mysqli_connect($host, $user, $password, $database) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

    $patientName = $_POST['patient_name'];
    $patientLastName = $_POST['patient_last_name'];
    $patientAddress = $_POST['patient_address'];
    $patientPhoneNumber = $_POST['patient_phone'];
    $patientEmail = $_POST['patient_email'];

    $query = "INSERT INTO Patients (PatientName, PatientLastName, PatientAddress, PatientPhoneNumber, PatientEmail) 
              VALUES ('$patientName', '$patientLastName', '$patientAddress', '$patientPhoneNumber', '$patientEmail')";

    if (mysqli_query($link, $query)) {
        echo "Se ha guardado el registro: " . $patientName . " " . $patientLastName;
    } else {
        echo "Error al almacenar el registro: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
