<?php

session_start();
include ('../Conexion.php');
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
    else if ($Bandera === "PruebaExistenciaUsuario") {
       $valor = $_POST['id'];
        $valor= md5($valor);
        $query = mysql_query("SELECT COUNT(*)as cantidad FROM `tb_usuarios` WHERE usuario='$valor'");
        $query1 = mysql_fetch_array($query);
        if ($query && $query1['cantidad'] == 0) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }else if ($Bandera === "CrearPerfil") {
       $cc=$_POST['cc'];
       $nombre=$_POST['nombre'];
       $apellido=$_POST['apellido'];
       $usuario= md5($_POST['usuario']);
       $pass= md5($_POST['pass']);
       $email=$_POST['email'];
       $pregunta=$_POST['pregunta'];
       $respuesta=$_POST['respuesta'];
       $tipo=$_POST['tipo'];
        $query = mysql_query("INSERT INTO `tb_usuarios`(`cc`, `nombre`, `apellido`, `usuario`, `contrasena`, `email`, `pregunta`, `respuesta`, `estado`, `tipo`) VALUES('$cc','$nombre','$apellido','$usuario','$pass','$email','$pregunta','$respuesta','Activo','$tipo')");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }
    else if ($Bandera === "DesactivarUsuario") {
       $cc=$_POST['id'];
           $query = mysql_query("UPDATE `tb_usuarios` SET`estado`='Inactivo' WHERE `cc`=$cc");
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