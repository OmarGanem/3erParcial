<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "medicalrecords"; 
$link = mysqli_connect($host, $user, $password, the db) or die("Error al conectar a la base de datos: " . mysqli_connect_error());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM LabReports WHERE ID = '$id'";

    if (mysqli_query($link, $query)) {
        header("Location: manage_labreports.php"); // Redirects after deletion
    } else {
        echo "Error al eliminar registro: " . mysqli_error($link);
    }
}
?>
