<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect("localhost", "root", "", "medicalrecords");
    $patientName = $_POST['patient_name'];
    $patientLastName = $_POST['patient_last_name'];
    $patientAddress = $_POST['patient_address'];
    $patientPhoneNumber = $_POST['patient_phone'];
    $patientEmail = $_POST['patient_email'];

    $query = "INSERT INTO Patients (PatientName, PatientLastName, PatientAddress, PatientPhoneNumber, PatientEmail)
              VALUES ('$patientName', '$patientLastName', '$patientAddress', '$patientPhoneNumber', '$patientEmail')";

    if (mysqli_query($link, $query)) {
        header("Location: manage_patients.php"); // Redirect after post
    } else {
        echo "Error al añadir registro: " . mysqli_error($link);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Estilos comunes */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 15px; padding: 0; color: #333; }
        header { background-color: #007bff; color: white; padding: 10px 20px; text-align: center; }
        .container { padding: 20px; }
        input[type="text"], input[type="email"], input[type="tel"] { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px; }
        button, .btn { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover, .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <header>
        <h1>Add New Patient</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <form method="post" action="add_patient.php">
            <input type="text" name="patient_name" placeholder="First Name" required>
            <input type="text" name="patient_last_name" placeholder="Last Name" required>
            <input type="text" name="patient_address" placeholder="Address" required>
            <input type="text" name="patient_phone" placeholder="Phone Number" required>
            <input type="email" name="patient_email" placeholder="Email" required>
            <button type="submit">Add Patient</button>
        </form>
    </div>
</body>
</html>
