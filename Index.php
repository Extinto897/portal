<?php
session_start(); // Iniciar la sesión aquí, una sola vez
include "conexion.php";

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
    
    // Verificar si el correo existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
        $error = "Error en la consulta: " . mysqli_error($conexion);
    } elseif (mysqli_num_rows($result) == 0) {
        $error = "Correo o contraseña incorrectos.";
    } else {
        $usuario = mysqli_fetch_assoc($result);
        if ($usuario['contrasena'] === $contrasena) {
            $_SESSION['rol'] = "usuario";
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
}

if (!isset($_SESSION['rol'])) {
    $_SESSION['rol'] = "invitado";
}

if (isset($_GET['salir'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

include "cabezera.php";
include "menu.php";
include "contenido.php";
include "pie.php";
?>