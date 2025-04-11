<?php
session_start();
include "conexion.php";

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    
    // Preparar la consulta
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        $error = "Correo o contraseña incorrectos.";
    } else {
        $usuario = $result->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Asignar el rol desde la base de datos
            $_SESSION['rol'] = $usuario['rol'] ?? "usuario"; // Usa "usuario" si rol no está definido
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
    $stmt->close();
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