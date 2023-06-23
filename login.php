<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="css.css">
</head>
<body>
  <h1>Iniciar Sesión</h1>
  <form method="POST" action="login.php">
  <label for="username">Nombre de usuario:</label>
  <input type="text" id="username" name="username" required><br>

  <label for="password">Contraseña:</label>
  <input type="password" id="password" name="password" required><br>

  <button type="submit">Iniciar sesión</button>
</form>
<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar si el nombre de usuario y la contraseña son válidos
    if ($username === "usuario" && $password === "contraseña") {
        // Autenticación exitosa, redirigir al usuario a la página de administración
        header("Location: admin.php");
        exit();
    } else {
        // Autenticación fallida, mostrar un mensaje de error
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

  <script src="script.js"></script>
</body>
</html>
