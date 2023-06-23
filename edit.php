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
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $horaComida = $_POST['horaComida'];
    $correo_electronico = $_POST['correo_electronico'];
    $opciones = $_POST['opciones'];
    $mes = $_POST['mes'];
    $color_favorito = $_POST['color_favorito'];
    $url = $_POST['url'];
    $rango = $_POST['rango'];

    // Actualizar el registro en la base de datos
    $query = "UPDATE Datos SET nombre='$nombre', edad='$edad', hora_comida='$horaComida', correo_electronico='$correo_electronico', opciones='$opciones', mes='$mes', color_favorito='$color_favorito', url='$url', rango='$rango' WHERE ID_Dato=$id";

    if ($conn->query($query) === TRUE) {
        // Redireccionar a la página admin.php después de la edición
        header("Location: admin.php");
        exit();
    } else {
        echo "Error al editar el registro: " . $conn->error;
    }
}

// Obtener el ID del registro a editar
if (isset($_GET['ID_Dato'])) {
    $id = $_GET['ID_Dato'];

    // Obtener los datos del registro de la base de datos
    $query = "SELECT * FROM Datos WHERE ID_Dato=$id";
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
                <input type="hidden" name="id" value="<?php echo $fila['ID_Dato']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>
                <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $fila['edad']; ?>" required><br>

        <label for="horaComida">Hora de comida favorita:</label>
        <input type="time" id="horaComida" name="horaComida" value="<?php echo $fila['hora_comida']; ?>" required><br>

        <label for="correoElectronico">Correo electrónico de contacto:</label>
        <input type="email" id="correoElectronico" name="correo_electronico" value="<?php echo $fila['correo_electronico']; ?>" required><br>

        <label>Escoje qué prefieres: </label><br>
        <input type="checkbox" id="opcion1" name="opciones" value="Perros" <?php if ($fila['opciones'] == 'Perros') echo 'checked'; ?> > Perros<br>
        <input type="checkbox" id="opcion2" name="opciones" value="Gatos" <?php if ($fila['opciones'] == 'Gatos') echo 'checked'; ?>> Gatos<br>

        <label for="mes">Mes de cumpleaños:</label>
        <select id="mes" name="mes" required>
            <option value="Enero" <?php if ($fila['mes'] == 'Enero') echo 'selected'; ?>>Enero</option>
            <option value="Febrero" <?php if ($fila['mes'] == 'Febrero') echo 'selected'; ?>>Febrero</option>
            <option value="Marzo" <?php if ($fila['mes'] == 'Marzo') echo 'selected'; ?>>Marzo</option>
            <option value="Abril" <?php if ($fila['mes'] == 'Abril') echo 'selected'; ?>>Abril</option>
            <option value="Mayo" <?php if ($fila['mes'] == 'Mayo') echo 'selected'; ?>>Mayo</option>
            <option value="Junio" <?php if ($fila['mes'] == 'Junio') echo 'selected'; ?>>Junio</option>
            <option value="Agosto" <?php if ($fila['mes'] == 'Agosto') echo 'selected'; ?>>Agosto</option>
            <option value="Septiembre" <?php if ($fila['mes'] == 'Septiembre') echo 'selected'; ?>>Septiembre</option>
            <option value="Octubre" <?php if ($fila['mes'] == 'Octubre') echo 'selected'; ?>>Octubre</option>
            <option value="Noviembre" <?php if ($fila['mes'] == 'Noviembre') echo 'selected'; ?>>Noviembre</option>
            <option value="Diciembre" <?php if ($fila['mes'] == 'Diciembre') echo 'selected'; ?>>Diciembre</option>
        </select><br>

        <label for="colorFavorito">Color favorito:</label>
        <input type="color" id="colorFavorito" name="color_favorito" value="<?php echo $fila['color_favorito']; ?>" required><br>

        <label for="url">Link de tu perfil de Facebook:</label>
        <input type="url" id="url" name="url" value="<?php echo $fila['url']; ?>" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"  value="<?php echo $fila['contraseña']; ?>" required><br>

        <label for="rango">Rango (1-100):</label>
        <input type="range" id="rango" name="rango" min="1" max="100" value="<?php echo $fila['rango']; ?>" required><br>

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
