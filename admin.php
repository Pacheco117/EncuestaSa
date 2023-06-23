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
        echo "<td><a href='edit.php?ID_Dato=" . $fila['ID_Dato'] . "'>Editar</a></td>";
        echo "<td><a href='delete.php?ID_Dato=" . $fila['ID_Dato'] . "'>Eliminar</a></td>";
  
        echo "</tr>";
        
    }
  
      echo "</table>";
  } else {
      echo "No hay registros en la tabla Datos.";
  }
  
  // Liberar memoria
  mysqli_free_result($resultado);
  
  // Mostrar registros duplicados si se hizo clic en el botón correspondiente
if (isset($_POST['mostrar_duplicados'])) {
  // Realizar consulta para obtener los registros duplicados
  $query_duplicados = "SELECT * FROM Datos WHERE opciones LIKE '%gato%'";
  $resultado_duplicados = mysqli_query($conn, $query_duplicados);

  // Verificar si hay registros duplicados
  if (mysqli_num_rows($resultado_duplicados) > 0) {
      echo "<h2>Gente que le gusta los gatos:</h2>";
      echo "<table>";
      echo "<tr><th>Nombre</th><th>Edad</th><th>Hora de comida</th><th>Correo electrónico</th><th>Opciones</th><th>Mes</th><th>Color favorito</th><th>URL</th><th>Rango</th></tr>";

      while ($fila_duplicados = mysqli_fetch_assoc($resultado_duplicados)) {
          echo "<tr>";
          echo "<td>" . $fila_duplicados['nombre'] . "</td>";
          echo "<td>" . $fila_duplicados['edad'] . "</td>";
          echo "<td>" . $fila_duplicados['hora_comida'] . "</td>";
          echo "<td>" . $fila_duplicados['correo_electronico'] . "</td>";
          echo "<td>" . $fila_duplicados['opciones'] . "</td>";
          echo "<td>" . $fila_duplicados['mes'] . "</td>";
          $colorFavorito_duplicados = $fila_duplicados['color_favorito'];
          echo "<td style='background-color: $colorFavorito_duplicados;'></td>";
          echo "<td>" . $fila_duplicados['url'] . "</td>";
          echo "<td>" . $fila_duplicados['rango'] . "</td>";

          // Agregar enlaces o botones para editar y eliminar
          echo "<td><a href='edit.php?ID_Dato=" . $fila_duplicados['ID_Dato'] . "'>Editar</a></td>";
          echo "<td><a href='delete.php?ID_Dato=" . $fila_duplicados['ID_Dato'] . "'>Eliminar</a></td>";

          echo "</tr>";
      }

      echo "</table>";
  } else {
      echo "<p>No hay registros duplicados.</p>";
  }

  // Liberar memoria
  mysqli_free_result($resultado_duplicados);
}




// Llamar al procedimiento almacenado para mostrar la vista
if (isset($_POST['mostrar_vista'])) {
  $query_vista = "CALL MostrarVistaEncuesta()";
  $resultado_vista = mysqli_query($conn, $query_vista);

  // Verificar si hay registros en la vista
  if (mysqli_num_rows($resultado_vista) > 0) {
      echo "<h2>Vista Encuesta:</h2>";
      echo "<table>";
      echo "<tr><th>Nombre</th><th>Edad</th><th>Mes</th></tr>";

      while ($fila_vista = mysqli_fetch_assoc($resultado_vista)) {
          echo "<tr>";
          echo "<td>" . $fila_vista['nombre'] . "</td>";
          echo "<td>" . $fila_vista['edad'] . "</td>";
          echo "<td>" . $fila_vista['mes'] . "</td>";
          echo "</tr>";
      }

      echo "</table>";
  } else {
      echo "<p>No hay registros en la vista Encuesta.</p>";
  }

  // Liberar memoria
  mysqli_free_result($resultado_vista);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <button type="submit" name="mostrar_duplicados">Mostrar gente que le gustan los gatos</button>
  <br>
  <button type="submit" name="mostrar_vista">Mostrar vista Encuesta</button>
</form>

</body>
</html>





