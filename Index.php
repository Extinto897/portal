<?php
session_start();

if (!isset($_SESSION['rol']))
    $_SESSION['rol'] = "invitado";


include "cabezera.php";
include "menu.php";
include "contenido.php";
include "pie.php";

if (isset($_GET['salir'])) {
    session_unset();
    session_destroy();
}
var_dump($_SESSION)
?>