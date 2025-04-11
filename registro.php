<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
    
    // Encriptar la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);
    
    // Establecer la fecha de registro
    $fecha_registro = date("Y-m-d H:i:s");
    
    // Verificar si el correo ya está registrado
    $query = "SELECT email FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexion, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href='registro.php';</script>";
    } else {
        // Insertar usuario en la base de datos
        $query = "INSERT INTO usuarios (nombre, apellido, telefono, dni, email, contrasena, fecha_registro) 
                  VALUES ('$nombre', '$apellido', '$telefono', '$dni', '$email', '$contrasena_hash', '$fecha_registro')";
        
        if (mysqli_query($conexion, $query)) {
            echo "<script>alert('Registro exitoso. Por favor, inicia sesión.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error al registrar: " . mysqli_error($conexion) . "'); window.location.href='registro.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Cimientos & Sueños</title>
    <link rel="stylesheet" href="css/registro.css">
    <script src="https://kit.fontawesome.com/8dd92a9059.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="index.php" class="buton_inicio">Inicio</a>
    <form id="registroForm" method="POST" onsubmit="return validarFormulario()">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="telefono">Número de Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" required><br><br>

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <input type="submit" value="Enviar">
    </form>

    <script>
    function validarFormulario() {
        let nombre = document.getElementById("nombre").value;
        let apellido = document.getElementById("apellido").value;
        let telefono = document.getElementById("telefono").value;
        let dni = document.getElementById("dni").value;
        let email = document.getElementById("email").value;
        let contrasena = document.getElementById("contrasena").value;

        let soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/;
        let telefonoPattern = /^\d{9,12}$/;
        /*let dniPattern = /^[0-9]{7,8}$/;*/
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!soloLetras.test(nombre) || nombre.length < 2) {
            alert("El nombre solo debe contener letras y tener al menos 2 caracteres");
            return false;
        }
        if (!soloLetras.test(apellido) || apellido.length < 2) {
            alert("El apellido solo debe contener letras y tener al menos 2 caracteres");
            return false;
        }
        if (!telefonoPattern.test(telefono)) {
            alert("El teléfono debe contener entre 9 y 12 dígitos");
            return false;
        }
        /*if (!dniPattern.test(dni)) {
            alert("El DNI debe contener entre 7 y 8 dígitos");
            return false;
        }*/
        if (!emailPattern.test(email)) {
            alert("Por favor, ingrese un correo electrónico válido");
            return false;
        }
        if (contrasena.length < 8 || !/[A-Z]/.test(contrasena) || !/[0-9]/.test(contrasena)) {
            alert("La contraseña debe tener al menos 8 caracteres, una mayúscula y un número");
            return false;
        }
        return true;
    }
    </script>
</body>
</html>