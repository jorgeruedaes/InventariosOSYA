
<?php

session_start();
include '../Conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "AgregarEntrada") {
        $creador = $_POST['creador'];
        $datos=$_POST['datos'];
        json_decode($datos);
        
        $query = mysql_query("INSERT INTO `tb_usuarios`(`cc`, `nombre`, `apellido`, `usuario`, `contrasena`, `email`, `pregunta`, `respuesta`, `estado`, `tipo`)"
                . " VALUES ('$cc','$nombre',NULL,NULL,NULL,'$email',NULL,NULL,'Activo','$tipo')");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "TraerProductos") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT * FROM `tb_productos` WHERE proveedor='$valor' and Estado='Activo'");
        $productos = new stdClass();
          $array = array();
        while($query1=mysql_fetch_array($query)){
        $id=$query1['id_producto'];
        $nombre=$query1['nombre'];
        $valor=$query1['valor'];
        $productos = array("id"=>$id,"nombre"=>$nombre,"valor"=>$valor);
        array_push($array,$productos);
        }
        $json = json_encode($array);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Productos":'.$json.'';
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