<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Doctor - Hospital Madero</title>
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
        input[type=text], input[type=email] {
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
        <h1>Register Doctor</h1>
    </header>
    <div class="container">
        <!-- Formulario para registrar a un doctor -->
        <form action="register_doctor.php" method="post">
            <div class="form-group">
                <label for="doctor-name">Doctor Name:</label>
                <input type="text" id="doctor-name" name="doctor_name" required>
            </div>
            <div class="form-group">
                <label for="doctor-last-name">Doctor Last Name:</label>
                <input type="text" id="doctor-last-name" name="doctor_last_name" required>
            </div>
            <div class="form-group">
                <label for="doctor-specialty">Specialty:</label>
                <input type="text" id="doctor-specialty" name="doctor_specialty" required>
            </div>
            <div class="form-group">
                <label for="doctor-phone">Phone Number:</label>
                <input type="text" id="doctor-phone" name="doctor_phone" required>
            </div>
            <div class="form-group">
                <label for="doctor-email">Email:</label>
                <input type="email" id="doctor-email" name="doctor_email" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
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
    $database = "medicalrecords";  // Asegúrate de cambiar esto si la base de datos es diferente
    $link = mysqli_connect($host, $user, $password, $database) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

    $doctorName = $_POST['doctor_name'];
    $doctorLastName = $_POST['doctor_last_name'];
    $doctorSpecialty = $_POST['doctor_specialty'];
    $doctorPhone = $_POST['doctor_phone'];
    $doctorEmail = $_POST['doctor_email'];

    $query = "INSERT INTO Doctors (DoctorName, DoctorLastName, DoctorSpecialty, DoctorPhoneNumber, DoctorEmail) 
              VALUES ('$doctorName', '$doctorLastName', '$doctorSpecialty', '$doctorPhone', '$doctorEmail')";

    if (mysqli_query($link, $query)) {
        echo "Se ha guardado el registro: " . $doctorName . " " . $doctorLastName;
    } else {
        echo "Error al almacenar el registro: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
