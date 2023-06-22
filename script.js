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
    if (!opcion1.checked && !opcion2.checked) {
      alert('Por favor, seleccione al menos una opción entre perros y gatos.');
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