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

// Realizar consulta para obtener los registros
// Obtener el ID del registro a editar desde la URL
$id = $_GET['id_dato'];<

// Realizar consulta para obtener el registro
$query = "SELECT * FROM Datos WHERE id = $id";
$resultado = mysqli_query($conn, $query);

// Verificar si hay registros
if (mysqli_num_rows($resultado) > 0) {
    // Imprimir los registros en una tabla
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Edad</th><th>Hora de comida</th><th>Correo electrónico</th><th>Opciones</th><th>Mes</th><th>Color favorito</th><th>URL</th><th>Rango</th><th>Acciones</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['edad'] . "</td>";
        echo "<td>" . $fila['hora_comida'] . "</td>";
        echo "<td>" . $fila['correo_electronico'] . "</td>";
        echo "<td>" . $fila['opciones'] . "</td>";
        echo "<td>" . $fila['mes'] . "</td>";
        echo "<td style='background-color: " . $fila['color_favorito'] . ";'></td>";
        echo "<td>" . $fila['url'] . "</td>";
        echo "<td>" . $fila['rango'] . "</td>";
        echo "<td><a href='edit.php?id=" . $fila['id_dato'] . "'>Editar</a> | <a href='delete.php?id=" . $fila['id_dato'] . "'>Eliminar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros en la tabla Datos.";
}

// Liberar memoria
mysqli_free_result($resultado);

// Cerrar conexión
$conn->close();
?>
