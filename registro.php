<html>
<body>
<link rel="stylesheet" href="css/registro.css">
<a href="index.php" class="buton_inicio">Inicio</a>
<form id="registroForm" onsubmit="return validarFormulario()">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="apellido">Apellido:</label><br>
    <input type="text" id="apellido" name="apellido" required><br><br>

    <label for="telefono">Número de Teléfono:</label><br>
    <input type="tel" id="telefono" name="telefono" required><br><br>

    <label for="dni">DNI:</label><br>
    <input type="text" id="dni" name="dni" required><br><br>

    <label for="usuario">Usuario:</label><br>
    <input type="text" id="usuario" name="usuario" required><br><br>

    <label for="contraseña">Contraseña:</label><br>
    <input type="password" id="contraseña" name="contraseña" required><br><br>

    <input type="submit" value="Enviar">
</form>

<script>
function validarFormulario() {
    // Obtener valores de los campos
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let telefono = document.getElementById("telefono").value;
    let dni = document.getElementById("dni").value;
    let usuario = document.getElementById("usuario").value;
    let contraseña = document.getElementById("contraseña").value;

    // Expresiones regulares para validación
    let soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/;
    let soloNumeros = /^[0-9]+$/;
    let telefonoPattern = /^\d{9,12}$/; // 9-12 dígitos para teléfono
    let dniPattern = /^\d{7,8}$/; // 7-8 dígitos para DNI

    // Validación de nombre
    if (!soloLetras.test(nombre) || nombre.length < 2) {
        alert("El nombre solo debe contener letras y tener al menos 2 caracteres");
        return false;
    }

    // Validación de apellido
    if (!soloLetras.test(apellido) || apellido.length < 2) {
        alert("El apellido solo debe contener letras y tener al menos 2 caracteres");
        return false;
    }

    // Validación de teléfono
    if (!telefonoPattern.test(telefono)) {
        alert("El teléfono debe contener entre 9 y 12 dígitos");
        return false;
    }

    // Validación de DNI
    if (!dniPattern.test(dni)) {
        alert("El DNI debe contener entre 7 y 8 dígitos");
        return false;
    }

    // Validación de usuario
    if (usuario.length < 4) {
        alert("El usuario debe tener al menos 4 caracteres");
        return false;
    }

    // Validación de contraseña
    if (contraseña.length < 8 || !/[A-Z]/.test(contraseña) || !/[0-9]/.test(contraseña)) {
        alert("La contraseña debe tener al menos 8 caracteres, una mayúscula y un número");
        return false;
    }

    // Si todas las validaciones pasan
    alert("Formulario enviado correctamente");
    return true;
}
</script>
</body>
</html>
