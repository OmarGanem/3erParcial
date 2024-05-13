<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect("localhost", "root", "", "medicalrecords");
    $doctorName = $_POST['doctor_name'];
    $doctorLastName = $_POST['doctor_last_name'];
    $doctorSpecialty = $_POST['doctor_specialty'];
    $doctorPhoneNumber = $_POST['doctor_phone'];
    $doctorEmail = $_POST['doctor_email'];

    $query = "INSERT INTO Doctors (DoctorName, DoctorLastName, DoctorSpecialty, DoctorPhoneNumber, DoctorEmail)
              VALUES ('$doctorName', '$doctorLastName', '$doctorSpecialty', '$doctorPhoneNumber', '$doctorEmail')";

    if (mysqli_query($link, $query)) {
        header("Location: manage_doctors.php"); // Redirect after post
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
    <title>Add Doctor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
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
        <h1>Add New Doctor</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <form method="post" action="add_doctor.php">
            <input type="text" name="doctor_name" placeholder="First Name" required>
            <input type="text" name="doctor_last_name" placeholder="Last Name" required>
            <input type="text" name="doctor_specialty" placeholder="Specialty" required>
            <input type="text" name="doctor_phone" placeholder="Phone Number" required>
            <input type="email" name="doctor_email" placeholder="Email" required>
            <button type="submit">Add Doctor</button>
        </form>
    </div>
</body>
</html>
