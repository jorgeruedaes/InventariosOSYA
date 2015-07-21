<?php

session_start();
include '../Conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "AgregarUsuarios") {
        $creador = $_POST['creador'];
        $nombre = $_POST['nombre'];
        $cc = $_POST['codigo'];
        $email = $_POST['email'];
        $tipo = $_POST['tipo'];
        $query = mysql_query("INSERT INTO `tb_usuarios`(`cc`, `nombre`, `apellido`, `usuario`, `contrasena`, `email`, `pregunta`, `respuesta`, `estado`, `tipo`)"
                . " VALUES ('$cc','$nombre',NULL,NULL,NULL,'$email',NULL,NULL,'Activo','$tipo')");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "PruebaExistencia") {
        $valor = $_POST['valor'];
        $query = mysql_query("SELECT COUNT(*)as cantidad FROM `tb_usuarios` WHERE cc='$valor'");
        $query1 = mysql_fetch_array($query);
        if ($query && $query1['cantidad'] == 0) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "EliminarUsuario") {
        $id = $_POST['id'];
        $query = mysql_query("UPDATE `tb_usuarios` SET`estado`='Inactivo' WHERE `cc`=$id");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "ActivarUsuario") {
        $id = $_POST['id'];
        $query = mysql_query("UPDATE `tb_usuarios` SET`estado`='Activo' WHERE `cc`=$id");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }
} else {
    $resultado = '{"Salida":false,';
}
$resultado.='}';
echo ($resultado);
?>