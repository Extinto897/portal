<?php
session_start();


if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], ["usuario", "administrador"])) {
include "cabezera.php";
include "menu.php";
include "error.php";
include "pie.php";
exit();
}

// Si el rol es "usuario", mostrar el contenido
include "cabezera.php";
include "menu.php";
include "cont_alquilar.php";
include "pie.php";
?>