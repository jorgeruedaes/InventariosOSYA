<?php
if (isset($_SESSION['admin'])) {
    if ($_SESSION['tipo_usuario'] == "Administrador") {
        $pruebadeinicio = 1;
    } elseif ($_SESSION['tipo_usuario'] == "Bodega") {
        $pruebadeinicio = 2;
 
     }else {
        echo "Usted no está autorizado para ingresar";
        header("location:index.php");
    }
}
?>