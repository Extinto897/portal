<?php
session_start();


if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "administrador") {
include "../partes_portal/cabezera.php";
include "../partes_portal/menu.php";
include "../partes_portal/error.php";
include "../partes_portal/pie.php";
exit();
}

// Si el rol es "usuario", mostrar el contenido
include "../partes_portal/cabezera.php";
include "../partes_portal/menu.php";
include "../contenido_portal/cont_admin_tienda.php";
include "../partes_portal/pie.php";
?>