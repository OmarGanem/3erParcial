<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "medicalrecords"; 
$link = mysqli_connect($host, $user, $password, $db) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM Appointments WHERE ID = '$id'";

    if (mysqli_query($link, $query)) {
        header("Location: manage_appointments.php"); // Redirecciona después de eliminar
    } else {
        echo "Error al eliminar registro: " . mysqli_error($link);
    }
}
?>
