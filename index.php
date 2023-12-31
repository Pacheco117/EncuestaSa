
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> registro</title>
  <link rel="stylesheet" href="css.css">

</head>
<body>
  <h1>Encuesta para encontrar pareja</h1>
  <form>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" required><br>

    <label for="edad">Edad:</label>
    <input type="number" id="edad" required><br>

    <label for="horaComida">Hora de comida favorita:</label>
    <input type="time" id="horaComida" required><br>

    <label for="correoElectronico">Correo electrónico de contacto:</label>
    <input type="email" id="correoElectronico" required><br>

    <label>Escoje que prefieres: </label><br>
  <input type="checkbox" id="opcion1" name="opciones" value="Perros" required> Perros<br>
  <input type="checkbox" id="opcion2" name="opciones" value="Gatos"> Gatos<br>

    <label for="mes">Mes de cumpleaños:</label>
    <select id="mes" required>
      <option value="Enero">Enero</option>
      <option value="Febrero">Febrero</option>
      <option value="Marzo">Marzo</option>
      <option value="Abril">Abril</option>
      <option value="Mayo">Mayo</option>
      <option value="Junio">Junio</option>
      <option value="Agosto">Agosto</option>
      <option value="Septiembre">Septiembre</option>
      <option value="Octubre">Octubre</option>
      <option value="Noviembre">Noviembre</option>
      <option value="Diciembre">Diciembre</option>
      <!-- Agrega las opciones de los demás meses aquí -->
    </select><br>

    <label for="colorFavorito">Color favorito:</label>
    <input type="color" id="colorFavorito" required><br>

    <label for="url">Link de tu perfil de facebook:</label>
     <input type="url" id="url" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" required><br>

    <label for="rango">cuanto te das de calificacion? (1-100):</label>
    <input type="range" id="rango" min="1" max="100" required><br>

    <button type="button" onclick="enviarEncuesta()">Enviar</button>

  </form>

  <a href="login.php" class="admin-link">Administrar datos</a>

  <script src="script.js"></script>

</body>
</html>
