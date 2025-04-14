<?php
include "conexion.php"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Alejandro Sanahuja Benitez">
    <title>portal web de pruebas</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="img/favicon.ico"> 
    <script src="https://kit.fontawesome.com/8dd92a9059.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="logo-section">
            <img src="img/logo.jpg" alt="logo de la empresa" class="logo-placeholder">
        </div>
        <div class="text-section_2">
            <h1 class="text">Cimientos & Sueños</h1>
        </div>
        <div class="login-section">
            <?php
            // Verificar si hay un usuario autenticado
            if (isset($_SESSION['rol']) && $_SESSION['rol'] !== "invitado" && isset($_SESSION['nombre'])) {
                $nombre = htmlspecialchars($_SESSION['nombre']); // Escapar el nombre para seguridad
                echo "<p>Bienvenido, $nombre</p>";
            } else {
                echo "<p>Bienvenido, Invitado</p>";
            }
            ?>
        </div>
    </header>
</body>
</html>