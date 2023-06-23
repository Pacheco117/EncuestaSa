function validarNombre(nombre) {
  var patron = /^[A-Za-z]+$/;
  return patron.test(nombre);
}
function enviarEncuesta() {
    // Obtener los valores de los campos
    var nombre = document.getElementById("nombre").value;
    var edad = document.getElementById("edad").value;
    var horaComida = document.getElementById("horaComida").value;
    var correoElectronico = document.getElementById("correoElectronico").value;
    var opcionesSeleccionadas = document.querySelectorAll('input[name="opciones"]:checked');
    var opciones = [];

    for (var i = 0; i < opcionesSeleccionadas.length; i++) {
      opciones.push(opcionesSeleccionadas[i].value);
    }

    var mes = document.getElementById("mes").value;
    var colorFavorito = document.getElementById("colorFavorito").value;
    var url = document.getElementById("url").value;
    var contrasena = document.getElementById("contrasena").value;
    var rango = document.getElementById("rango").value;
    const opcion1 = document.getElementById('opcion1');
    const opcion2 = document.getElementById('opcion2');
  
    // Verificar si al menos una opción ha sido seleccionada

      if (!validarNombre(nombre)) {
        alert("Por favor, ingrese un nombre válido.");
        return;
      }

  // Validar edad (debe ser un número mayor a 0)
  if (isNaN(edad) || edad <= 0) {
    alert("Por favor, ingrese una edad válida.");
    return;
  }

  // Validar hora de comida (debe estar en el formato HH:MM)
  if (!/^\d{2}:\d{2}$/.test(horaComida)) {
    alert("Por favor, ingrese una hora de comida válida en el formato HH:MM.");
    return;
  }
  if (!opcion1.checked && !opcion2.checked) {
    alert('Por favor, seleccione al menos una opción entre perros y gatos.');
    return;
  }
  // Validar correo electrónico
  if (!/\S+@\S+\.\S+/.test(correoElectronico)) {
    alert("Por favor, ingrese un correo electrónico válido que contenga @");
    return;
  }

  // Validar al menos una opción seleccionada
  if (opcionesSeleccionadas.length === 0) {
    alert("Por favor, seleccione al menos una opción entre perros y gatos.");
    return;
  }

  // Validar mes seleccionado
  if (mes === "") {
    alert("Por favor, seleccione un mes.");
    return;
  }

  // Validar URL del perfil de Facebook
  if (!/^(ftp|http|https):\/\/[^ "]+$/.test(url)) {
    alert("Por favor, ingrese una URL válida para el perfil de Facebook.al inicio contenga https");
    return;
  }

  // Validar contraseña (debe contener al menos 6 caracteres)
  if (contrasena.length < 6) {
    alert("Por favor, ingrese una contraseña válida (mínimo 6 caracteres).");
    return;
  }

  // Validar rango (debe ser un número entre 1 y 100)
  if (isNaN(rango) || rango < 1 || rango > 100) {
    alert("Por favor, ingrese una calificación válida (entre 1 y 100).");
    return;
  }
    
    

    // Crear un objeto FormData y agregar los valores
    var formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("edad", edad);
    formData.append("horaComida", horaComida);
    formData.append("correoElectronico", correoElectronico);
    formData.append("opciones", opciones.join(","));
    formData.append("mes", mes);
    formData.append("colorFavorito", colorFavorito);
    formData.append("url", url);
    formData.append("contrasena", contrasena);
    formData.append("rango", rango);

    // Enviar los datos al archivo PHP que los procesará y los guardará en la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_encuesta.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Aquí puedes realizar acciones adicionales después de guardar los datos, como mostrar un mensaje de éxito
        console.log(xhr.responseText);
      }
    };
    xhr.send(formData);
    
  }
  function iniciarSesion(){

}