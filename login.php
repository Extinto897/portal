<?php
session_start();
include "conexion.php";

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
    
    // Consulta para buscar usuario
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$contrasena'";
    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
        $error = "Error en la consulta: " . mysqli_error($conexion);
    } elseif (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
        // Establecer variables de sesión
        $_SESSION['rol'] = "usuario";
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nombre'] = $usuario['nombre'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Cimientos & Sueños</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/8dd92a9059.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "menu.php"; ?>
    
    <main>
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <form id="loginForm" method="POST" action="login.php">
                <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
                <div id="emailError" class="error"></div>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                <div id="passwordError" class="error"><?php echo $error; ?></div>
                <div class="button-container">
                    <button type="submit" class="login-submit">Iniciar Sesión</button>
                    <button type="button" class="register-btn" onclick="window.location.href='registro.php'">Registrarse</button>
                </div>
            </form>
        </div>
    </main>

    <?php include "pie.php"; ?>
</body>
</html>