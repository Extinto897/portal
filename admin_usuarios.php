<?php
session_start();


if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "administrador") {
include "cabezera.php";
include "menu.php";
include "error.php";
include "pie.php";
exit();
}

// Si el rol es "administrador", mostrar el contenido
include "cabezera.php";
include "menu.php";
include "cont_admin_ususarios.php";
include "pie.php";
?>