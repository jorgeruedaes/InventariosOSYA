<?php

session_start();
include '../Conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "AgregarProductos") {
        $creador = $_POST['creador'];
        $valor = $_POST['valor'];
        $proveedor = $_POST['proveedor'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
         $descripcion = $_POST['descripcion'];
        $query=  mysql_query("INSERT INTO `tb_productos`(`id_producto`, `nombre`, `descripcion`, `valor`, `creador`, `estado`, `proveedor`)"
                . " VALUES ('$codigo','$nombre','$descripcion','$valor','$creador','Activo','$proveedor')");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "PruebaExistencia") {
        $valor = $_POST['valor'];
        $query = mysql_query("SELECT COUNT(*)as cantidad FROM `tb_productos` WHERE id_producto='$valor'");
        $query1=  mysql_fetch_array($query);
        if ($query && $query1['cantidad']==0) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }
     else if ($Bandera === "MostrarProducto") {
        $id = $_POST['id'];
        $query = mysql_query("SELECT * FROM `tb_productos` WHERE id_producto='$id'");
        $query1=  mysql_fetch_array($query);
        $nombre=$query1['nombre'];
         $descripcion=$query1['descripcion'];
          $estado=$query1['estado'];
          $valor=$query1['valor'];
        if ($query) {
                   $resultado.='"producto":{"nombre": "' . $nombre . '","descripcion": "' . $descripcion . '","estado": "' . $estado . '","valor": "'.$valor.'"}';
            $resultado.=',"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }
     else if ($Bandera === "EditarProducto") {
        $id = $_POST['id'];
        $nombre= $_POST['nombre'];
         $descripcion= $_POST['descripcion'];
          $estado= $_POST['estado'];
          $valor= $_POST['valor'];
          $query=  mysql_query("UPDATE `tb_productos` SET `nombre`='$nombre',`descripcion`='$descripcion',`valor`='$valor',`estado`='$estado' "
                  . "WHERE `id_producto`='$id'");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }
    else if ($Bandera === "EliminarProducto") {
        $id = $_POST['id'];

          $query=  mysql_query("UPDATE `tb_productos` SET `estado`='Inactivo' "
                  . "WHERE `id_producto`='$id'");
        if ($query) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    }else if ($Bandera === "ActivarProducto") {
        $id = $_POST['id'];
        $query = mysql_query("UPDATE `tb_productos` SET`estado`='Activo' WHERE `id_producto`=$id");
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