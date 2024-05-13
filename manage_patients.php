<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "medicalrecords"; // Cambia el nombre de la base de datos según tus necesidades
$link = mysqli_connect($host, $user, $password, $db) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

$query = "SELECT * FROM Patients";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Patients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Estilos comunes */
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
        <h1>Manage Patients</h1>
        <a href="index.php" class="btn">Return to Home</a>
    </header>
    <div class="container">
        <a href="add_patient.php">Add New Patient</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['PatientName'] . " " . $row['PatientLastName']; ?></td>
                <td><?php echo $row['PatientAddress']; ?></td>
                <td><?php echo $row['PatientPhoneNumber']; ?></td>
                <td><?php echo $row['PatientEmail']; ?></td>
                <td>
                    <a href="edit_patient.php?id=<?php echo $row['ID']; ?>">Edit</a>
                    <a href="delete_patient.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
