<?php
// Obtener los datos enviados por el formulario
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$horaComida = $_POST["horaComida"];
$correoElectronico = $_POST["correoElectronico"];
$opciones = $_POST["opciones"];
$mes = $_POST["mes"];
$colorFavorito = $_POST["colorFavorito"];
$url = $_POST["url"];
$contrasena = $_POST["contrasena"];
$rango = $_POST["rango"];

// Conectar a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Encuesta";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Insertar los datos en la tabla "encuestas"
$sql = "INSERT INTO Datos (nombre, edad, hora_comida, correo_electronico, opciones, mes, color_favorito, url, contraseña, rango) VALUES ('$nombre', '$edad', '$horaComida', '$correoElectronico', '$opciones', '$mes', '$colorFavorito', '$url', '$contrasena', '$rango')";
if ($conn->query($sql) === TRUE) {
    echo "Los datos se guardaron correctamente en la base de datos.";
} else {
    echo "Error al guardar los datos en la base de datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
