<?php
$host = "localhost"; // Host de la base de datos
$usuario = "root";   // Nombre de usuario de la base de datos
$contrasena = "";    // Contraseña de la base de datos (vacía por defecto en XAMPP)
$base_datos = "Cimientos & Sueños"; // Nombre de la base de datos

// Crear conexión
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>