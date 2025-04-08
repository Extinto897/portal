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
        <div class="text-section">
            <h1>Cimientos & Sueños</h1>
        </div>
        <div class="login-section">
            <?php
                // Mostrar el botón de Registro solo si el rol es "invitado"
                if (isset($_SESSION['rol']) && $_SESSION['rol'] == "invitado") {
                    echo '<a href="registro.php" class="login-button">Registro</a>';
                    echo '<a href="login.php" class="login-button">Iniciar sesión</a>';
                } else {
                    echo '<a href="index.php?salir=S" class="login-button">Cerrar sesión</a>';
                }
            ?>
        </div>
    </header>
</body>
</html>