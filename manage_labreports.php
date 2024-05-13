<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "medicalrecords";
$link = mysqli_connect($host, $user, $password, $db) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

$query = "SELECT l.ID, p.PatientName, d.DoctorName, l.Date, dep.DepartmentName, l.Findings
          FROM LabReports l
          JOIN Patients p ON l.ID_Patient = p.ID
          JOIN Doctors d ON l.ID_Doctor = d.ID
          JOIN Departments dep ON l.ID_Department = dep.ID";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Lab Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 15px; padding: 0; color: #333; }
        header { background-color: #007bff; color: white; padding: 10px 20px; text-align: center; }
        .container { padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        a, .btn { color: #007bff; background-color: transparent; border: none; cursor: pointer; }
        a:hover, .btn:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <header>
        <h1>Manage Lab Reports</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <a href="add_labreport.php">Add New Lab Report</a>
        <table>
            <tr>
                <th>Date</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Findings</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['PatientName']; ?></td>
                <td><?php echo $row['DoctorName']; ?></td>
                <td><?php echo $row['DepartmentName']; ?></td>
                <td><?php echo $row['Findings']; ?></td>
                <td>
                    <a href="edit_labreport.php?id=<?php echo $row['ID']; ?>">Edit</a>
                    <a href="delete_labreport.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
