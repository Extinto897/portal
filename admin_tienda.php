<?php
session_start();


if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "administrador") {
include "cabezera.php";
include "menu.php";
include "error.php";
include "pie.php";
exit();
}

// Si el rol es "usuario", mostrar el contenido
include "cabezera.php";
include "menu.php";
include "cont_admin_tienda.php";
include "pie.php";
?>