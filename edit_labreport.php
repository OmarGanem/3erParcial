<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "medicalrecords"; 
$link = mysqli_connect($host, $user, $password, $db) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST['id'];
    $patientID = $_REQUEST['patient_id'];
    $doctorID = $_REQUEST['doctor_id'];
    $date = $_REQUEST['date'];
    $departmentID = $_REQUEST['department_id'];
    $findings = $_REQUEST['findings'];

    $query = "UPDATE LabReports SET ID_Patient = '$patientID', ID_Doctor = '$doctorID', Date = '$date', ID_Department = '$departmentID', Findings = '$findings' WHERE ID = '$id'";

    if (mysqli_query($link, $query)) {
        echo "<p>Se ha modificado el registro del informe de laboratorio.</p>";
    } else {
        echo "<p>Error al modificar el registro: " . mysqli_error($link) . "</p>";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM LabReports WHERE ID = '$id'";
    $result = mysqli_query($link, $query);
    $labreport = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Lab Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 15px; padding: 0; color: #333; }
        header { background-color: #007bff; color: white; padding: 10px 20px; text-align: center; }
        .container { padding: 20px; }
        input[type="text"], input[type="email"], input[type="tel"], input[type="datetime-local"], input[type="date"], input[type="time"] {
            width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;
        }
        button, .btn {
            background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;
        }
        button:hover, .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Lab Report</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <?php if (isset($labreport)): ?>
        <form method="post" action="edit_labreport.php?id=<?php echo $labreport['ID']; ?>">
            <input type="hidden" name="id" value="<?php echo $labreport['ID']; ?>">
            <div class="form-group">
                <label>Patient ID:</label>
                <input type="text" name="patient_id" value="<?php echo $labreport['ID_Patient']; ?>" required>
            </div>
            <div class="form-group">
                <label>Doctor ID:</label>
                <input type="text" name="doctor_id" value="<?php echo $labreport['ID_Doctor']; ?>" required>
            </div>
            <div class="form-group">
                <label>Date and Time:</label>
                <input type="datetime-local" name="date" value="<?php echo str_replace(' ', 'T', $labreport['Date']); ?>" required>
            </div>
            <div class="form-group">
                <label>Department ID:</label>
                <input type="text" name="department_id" value="<?php echo $labreport['ID_Department']; ?>" required>
            </div>
            <div class="form-group">
                <label>Findings:</label>
                <input type="text" name="findings" value="<?php echo $labreport['Findings']; ?>" required>
            </div>
            <button type="submit">Update Lab Report</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
