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

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = $_POST['id_dato'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $horaComida = $_POST['horaComida'];
    $correoElectronico = $_POST['correo_electronico'];
    $opciones = $_POST['opciones'];
    $mes = $_POST['mes'];
    $colorFavorito = $_POST['color_favorito'];
    $url = $_POST['url'];
    $rango = $_POST['rango'];

    // Actualizar el registro en la base de datos
    $query = "UPDATE Datos SET nombre='$nombre', edad='$edad', hora_comida='$horaComida', correo_electronico='$correoElectronico', opciones='$opciones', mes='$mes', color_favorito='$colorFavorito', url='$url', rango='$rango' WHERE id=$id_dato";

    if ($conn->query($query) === TRUE) {
        // Redireccionar a la página admin.php después de la edición
        header("Location: admin.php");
        exit();
    } else {
        echo "Error al editar el registro: " . $conn->error;
    }
}

// Obtener el ID del registro a editar
if (isset($_GET['id_dato'])) {
    $id = $_GET['id_dato'];

    // Obtener los datos del registro de la base de datos
    $query = "SELECT * FROM Datos WHERE id=$id_dato";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        // Mostrar el formulario de edición con los valores actuales
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Registro</title>
            <link rel="stylesheet" href="css.css">
        </head>
        <body>
            <h1>Editar Registro</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value="<?php echo $fila['id_dato']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>

                <!-- Agregar los demás campos del formulario con los valores actuales -->

                <button type="submit">Guardar</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró el registro.";
    }
} else {
    echo "ID de registro no especificado.";
}

// Cerrar la conexión
$conn->close();
?>
