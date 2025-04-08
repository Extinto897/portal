<?php
session_start();
if ($_SESSION['rol'] != "administrador") {
    include "cabezera.php";
    include "menu.php";
    include "error.php";
    include "pie.php";
}
else {
    include "Cabezera.php";
    include "menu.php";
    include "cont_usuarios.php";
    include "pie.php";
}
var_dump($_SESSION)
?>