<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encuesta de Satisfacción</title>
<link rel="stylesheet" href="css.css">
</head>
<body>
  <h1>Datos recopilados</h1>

  <?php
  $id = $_GET['id_dato'];
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
  $query = "SELECT * FROM Datos";
  $resultado = mysqli_query($conn, $query);
  
  // Verificar si hay registros
  if (mysqli_num_rows($resultado) > 0) {
      // Imprimir los registros en una tabla
      echo "<table>";
      echo "<tr><th>Nombre</th><th>Edad</th><th>Hora de comida</th><th>Correo electrónico</th><th>Opciones</th><th>Mes</th><th>Color favorito</th><th>URL</th><th>Rango</th></tr>";
  
      while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['edad'] . "</td>";
        echo "<td>" . $fila['hora_comida'] . "</td>";
        echo "<td>" . $fila['correo_electronico'] . "</td>";
        echo "<td>" . $fila['opciones'] . "</td>";
        echo "<td>" . $fila['mes'] . "</td>";
        $colorFavorito = $fila['color_favorito'];
        echo "<td style='background-color: $colorFavorito;'></td>";
        echo "<td>" . $fila['url'] . "</td>";
        echo "<td>" . $fila['rango'] . "</td>";
  
        // Agregar enlaces o botones para editar y eliminar
        echo "<td><a href='edit.php?id=" . $fila['id_dato'] . "'>Editar</a></td>";
        echo "<td><a href='delete.php?id=" . $fila['id_dato'] . "'>Eliminar</a></td>";
  
        echo "</tr>";
    }
  
    // ...
  
    
  

  
      echo "</table>";
  } else {
      echo "No hay registros en la tabla Datos.";
  }
  
  // Liberar memoria
  mysqli_free_result($resultado);
  
  
  ?>

</body>
</html>





