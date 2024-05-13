<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "medicalrecords"; 
$link = mysqli_connect($host, $user, $password, $db) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST['id'];
    $doctorName = $_REQUEST['doctor_name'];
    $doctorLastName = $_REQUEST['doctor_last_name'];
    $doctorSpecialty = $_REQUEST['doctor_specialty'];
    $doctorPhoneNumber = $_REQUEST['doctor_phone'];
    $doctorEmail = $_REQUEST['doctor_email'];

    $query = "UPDATE Doctors SET DoctorName = '$doctorName', DoctorLastName = '$doctorLastName', DoctorSpecialty = '$doctorSpecialty', DoctorPhoneNumber = '$doctorPhoneNumber', DoctorEmail = '$doctorEmail' WHERE ID = '$id'";

    if (mysqli_query($link, $query)) {
        echo "<p>Se ha modificado el registro de " . $doctorName . "</p>";
    } else {
        echo "<p>Error al modificar el registro: " . mysqli_error($link) . "</p>";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Doctors WHERE ID = '$id'";
    $result = mysqli_query($link, $query);
    $doctor = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Doctor</title>
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
        <h1>Edit Doctor</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <?php if (isset($doctor)): ?>
        <form method="post" action="edit_doctor.php?id=<?php echo $doctor['ID']; ?>">
            <input type="hidden" name="id" value="<?php echo $doctor['ID']; ?>">
            <input type="text" name="doctor_name" value="<?php echo $doctor['DoctorName']; ?>" required>
            <input type="text" name="doctor_last_name" value="<?php echo $doctor['DoctorLastName']; ?>" required>
            <input type="text" name="doctor_specialty" value="<?php echo $doctor['DoctorSpecialty']; ?>" required>
            <input type="text" name="doctor_phone" value="<?php echo $doctor['DoctorPhoneNumber']; ?>" required>
            <input type="email" name="doctor_email" value="<?php echo $doctor['DoctorEmail']; ?>" required>
            <button type="submit">Update Doctor</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
