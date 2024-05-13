<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "medicalrecords"; 
$link = mysqli_connect($host, $user, $password, $db) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST['id'];
    $patientName = $_REQUEST['patient_name'];
    $patientLastName = $_REQUEST['patient_last_name'];
    $patientAddress = $_REQUEST['patient_address'];
    $patientPhoneNumber = $_REQUEST['patient_phone'];
    $patientEmail = $_REQUEST['patient_email'];

    $query = "UPDATE Patients SET PatientName = '$patientName', PatientLastName = '$patientLastName', PatientAddress = '$patientAddress', PatientPhoneNumber = '$patientPhoneNumber', PatientEmail = '$patientEmail' WHERE ID = '$id'";

    if (mysqli_query($link, $query)) {
        echo "<p>Se ha modificado el registro de " . $patientName . "</p>";
    } else {
        echo "<p>Error al modificar el registro: " . mysqli_error($link) . "</p>";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Patients WHERE ID = '$id'";
    $result = mysqli_query($link, $query);
    $patient = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
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
        <h1>Edit Patient</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <?php if (isset($patient)): ?>
        <form method="post" action="edit_patient.php?id=<?php echo $patient['ID']; ?>">
            <input type="hidden" name="id" value="<?php echo $patient['ID']; ?>">
            <input type="text" name="patient_name" value="<?php echo $patient['PatientName']; ?>" required>
            <input type="text" name="patient_last_name" value="<?php echo $patient['PatientLastName']; ?>" required>
            <input type="text" name="patient_address" value="<?php echo $patient['PatientAddress']; ?>" required>
            <input type="text" name="patient_phone" value="<?php echo $patient['PatientPhoneNumber']; ?>" required>
            <input type="email" name="patient_email" value="<?php echo $patient['PatientEmail']; ?>" required>
            <button type="submit">Update Patient</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
