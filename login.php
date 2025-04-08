<?php

session_start();

// Verificar si ya está logueado
if (isset($_SESSION['rol']) && $_SESSION['rol'] === "administrador") {
    header('Location: index.php');
    exit();
}

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    // Validaciones
    if (empty($usuario)) {
        $error = "El usuario no puede estar vacío!";
    } elseif (empty($password)) {
        $error = "La contraseña no puede estar vacía!";
    } elseif ($usuario === "admin" && $password === "admin") {
        $_SESSION['rol'] = "administrador";
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } else {
        $error = "Credenciales incorrectas!";
    }
}

// Incluir componentes de la página
include "cabezera.php";
include "menu.php";
include "formulario_inicio_sesion.php";
include "pie.php";

// Debug (opcional)
var_dump($_SESSION);
?>