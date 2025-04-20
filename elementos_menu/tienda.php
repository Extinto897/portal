<?php
session_start();


if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], ["usuario", "administrador"])) {
include "../partes_portal/cabezera.php";
include "../partes_portal/menu.php";
include "../partes_portal/error.php";
include "../partes_portal/pie.php";
exit();
}

// Si el rol es "usuario", mostrar el contenido
include "../partes_portal/cabezera.php";
include "../partes_portal/menu_tienda.php";
include "../contenido_portal/cont_tienda.php";
include "../partes_portal/pie.php";
?>