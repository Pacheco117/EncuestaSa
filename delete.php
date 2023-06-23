<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Encuesta";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener el ID del registro a eliminar desde la URL
$id = $_GET['ID_Dato'];

// Eliminar el registro de la base de datos
$query = "DELETE FROM Datos WHERE id_Dato = $id";
mysqli_query($conn, $query);

// Redirigir a la página 
header("Location: admin.php");
exit();

// Cerrar conexión
$conn->close();
?>

