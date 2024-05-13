<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect("localhost", "root", "", "medicalrecords");
    $patientID = $_POST['patient_id'];
    $doctorID = $_POST['doctor_id'];
    $dateTime = $_POST['date_time'];
    $cause = $_POST['cause'];
    $status = $_POST['status'];

    $query = "INSERT INTO Appointments (ID_Patients, ID_Doctor, DateTime, Cause, Status)
              VALUES ('$patientID', '$doctorID', '$dateTime', '$cause', '$status')";

    if (mysqli_query($link, $query)) {
        header("Location: manage_appointments.php"); // Redirect after post
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
    <title>Add Appointment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Common styles here */
    </style>
</head>
<body>
    <header>
        <h1>Add New Appointment</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <form method="post" action="add_appointment.php">
            <input type="text" name="patient_id" placeholder="Patient ID" required>
            <input type="text" name="doctor_id" placeholder="Doctor ID" required>
            <input type="datetime-local" name="date_time" required>
            <input type="text" name="cause" placeholder="Cause" required>
            <input type="text" name="status" placeholder="Status" required>
            <button type="submit">Add Appointment</button>
        </form>
    </div>
</body>
</html>
