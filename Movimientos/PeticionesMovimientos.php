
<?php

session_start();
include '../Conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "AgregarEntrada") {
        $creador = $_POST['creador'];
        $datos = $_POST['datos'];
        $datos = json_decode($datos,true);
        $factura = $datos['factura'];
        $tipo = $datos['tipo'];
        $fecha = $datos['fecha'];
        $query = mysql_query("INSERT INTO `tb_entradas`(`id_entrada`, `fecha`, `tipo`, `encargado`, `factura`)"
                . " VALUES (NULL,'$fecha','$tipo','$creador',$factura)");
        $producto = $datos['productos'];


        if ($query) {
            $query1 = mysql_fetch_array(mysql_query("SELECT MAX(id_entrada)as entrada FROM `tb_entradas` WHERE factura=$factura"));
            $entrada = $query1['entrada'];
            if ($query1) {
                foreach ($producto as $cosa) {
                    $id = $cosa['id'];
                    $cantidad = $cosa['cantidad'];
                    $query3 = mysql_query("INSERT INTO `tr_productos_entradas`(`factura`, `id_producto`, `cantidad`, `id_entrada`)"
                            . " VALUES ($factura,$id,$cantidad,$entrada)");
                }
                $resultado.='"Mensaje":true';
            } else {
                $resultado.='"Mensaje":false';
            }
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "TraerProductos") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT * FROM `tb_productos` WHERE proveedor='$valor' and Estado='Activo'");
        $productos = new stdClass();
        $array = array();
        while ($query1 = mysql_fetch_array($query)) {
            $id = $query1['id_producto'];
            $nombre = $query1['nombre'];
            $valor = $query1['valor'];
            $productos = array("id" => $id, "nombre" => $nombre, "valor" => $valor);
            array_push($array, $productos);
        }
        $json = json_encode($array);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Productos":' . $json . '';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "PruebaExistencia") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT COUNT(*)as cantidad FROM `tb_entradas` WHERE factura='$valor'");
        $query1=  mysql_fetch_array($query);
        if ($query && $query1['cantidad']==0) {
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