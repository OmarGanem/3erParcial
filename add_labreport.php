<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect("localhost", "root", "", "medicalrecords");
    $patientID = $_POST['patient_id'];
    $doctorID = $_POST['doctor_id'];
    $date = $_POST['date'];
    $departmentID = $_POST['department_id'];
    $findings = $_POST['findings'];

    $query = "INSERT INTO LabReports (ID_Patient, ID_Doctor, Date, ID_Department, Findings)
              VALUES ('$patientID', '$doctorID', '$date', '$departmentID', '$findings')";

    if (mysqli_query($link, $query)) {
        header("Location: manage_labreports.php"); // Redirect after post
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
    <title>Add Lab Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Common styles here */
    </style>
</head>
<body>
    <header>
        <h1>Add New Lab Report</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <form method="post" action="add_labreport.php">
            <input type="text" name="patient_id" placeholder="Patient ID" required>
            <input type="text" name="doctor_id" placeholder="Doctor ID" required>
            <input type="datetime-local" name="date" required>
            <input type="text" name="department_id" placeholder="Department ID" required>
            <input type="text" name="findings" placeholder="Findings" required>
            <button type="submit">Add Lab Report</button>
        </form>
    </div>
</body>
</html>
