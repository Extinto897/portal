<?php
session_start();
include "conexion.php";

// Habilitar depuración (quitar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario y limpiar
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $telefono = trim($_POST['telefono']);
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);
    
    // Validaciones en el servidor
    if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/", $nombre) || strlen($nombre) < 2) {
        echo "<script>alert('El nombre solo debe contener letras y tener al menos 2 caracteres.'); window.location.href='Base_de_datos/registro.php';</script>";
        exit;
    }
    if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/", $apellido) || strlen($apellido) < 2) {
        echo "<script>alert('El apellido solo debe contener letras y tener al menos 2 caracteres.'); window.location.href='Base_de_datos/registro.php';</script>";
        exit;
    }
    if (!preg_match("/^\d{9,12}$/", $telefono)) {
        echo "<script>alert('El teléfono debe contener entre 9 y 12 dígitos.'); window.location.href='Base_de_datos/registro.php';</script>";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Por favor, ingrese un correo electrónico válido.'); window.location.href='Base_de_datos/registro.php';</script>";
        exit;
    }
    if (strlen($contrasena) < 8 || !preg_match("/[A-Z]/", $contrasena) || !preg_match("/[0-9]/", $contrasena)) {
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.'); window.location.href='Base_de_datos/registro.php';</script>";
        exit;
    }
    
    // Encriptar la contraseña
    if (empty($contrasena)) {
        echo "<script>alert('La contraseña no puede estar vacía.'); window.location.href='Base_de_datos/registro.php';</script>";
        exit;
    }
    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);
    
    // Establecer la fecha de registro
    $fecha_registro = date("Y-m-d H:i:s");
    
    // Establecer el rol por defecto
    $rol = "usuario";
    
    // Verificar si el correo ya está registrado
    $stmt = $conexion->prepare("SELECT email FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href='Base_de_datos/registro.php';</script>";
    } else {
        // Insertar usuario en la base de datos
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, telefono, email, contrasena, fecha_registro, rol) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nombre, $apellido, $telefono, $email, $contrasena_hash, $fecha_registro, $rol);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registro exitoso. Por favor, inicia sesión.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error al registrar: " . $conexion->error . "'); window.location.href='Base_de_datos/registro.php';</script>";
        }
    }
    $stmt->close();
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

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <input type="submit" value="Enviar">
    </form>

    <noscript>
        <p style="color: red;">Por favor, habilita JavaScript para usar este formulario.</p>
    </noscript>

    <script>
    function validarFormulario() {
        let nombre = document.getElementById("nombre").value.trim();
        let apellido = document.getElementById("apellido").value.trim();
        let telefono = document.getElementById("telefono").value.trim();
        let email = document.getElementById("email").value.trim();
        let contrasena = document.getElementById("contrasena").value.trim();

        let soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/;
        let telefonoPattern = /^\d{9,12}$/;
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