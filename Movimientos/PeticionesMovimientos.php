
<?php

session_start();
include ('../Conexion.php');
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
        $query = mysql_query("SELECT * FROM `tb_productos` WHERE  Estado='Activo' and proveedor=$valor");
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
    } else if ($Bandera === "PruebaCantidades") {
        $id = $_POST['id'];
        $cantidad=$_POST['cantidad'];
        $query1= mysql_fetch_array(mysql_query("SELECT Sum(cantidad) as cantidad FROM `tr_productos_salidas` WHERE id_producto=$id group by id_producto "));
     $salidas= $query1['cantidad'];
     $query2= mysql_fetch_array(mysql_query("SELECT Sum(cantidad) as cantidad FROM `tr_productos_entradas` WHERE id_producto=$id group by id_producto "));
     $entradas= $query2['cantidad'];
     $totalreal=$entradas-$salidas;
        if ($totalreal>=$cantidad) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
            $resultado.=',"Numero":  "'.$totalreal.'" ';
        }
     }else if ($Bandera === "AgregarSalida") {
        $creador = $_POST['creador'];
        $datos = $_POST['datos'];
        $datos = json_decode($datos,true);
        $factura = $datos['factura'];
        $tipo = $datos['tipo'];
        $fecha = $datos['fecha'];
        $cliente=$datos['proveedor'];
        $query = mysql_query("INSERT INTO `tb_salidas`(`id_salida`, `fecha`, `tipo`, `encargado`,cliente)"
                . " VALUES ($factura,'$fecha','$tipo','$creador','$cliente')");
        $producto = $datos['productos'];
        if ($query) {
                foreach ($producto as $cosa) {
                    $id = $cosa['id'];
                    $cantidad = $cosa['cantidad'];
                    $query3 = mysql_query("INSERT INTO `tr_productos_salidas`( `id_producto`, `cantidad`, `id_salida`)"
                            . " VALUES ($id,$cantidad,$factura)");
                }
                $resultado.='"Mensaje":true';
            
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "PruebaExistenciaSalida") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT COUNT(*)as cantidad FROM `tb_salidas` WHERE id_salida='$valor'");
        $query1=  mysql_fetch_array($query);
        if ($query && $query1['cantidad']==0) {
            $resultado.='"Mensaje":true';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "TraerTodosProductos") {
        $query = mysql_query("SELECT * FROM `tb_productos` WHERE  Estado='Activo' ");
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
    } 
} else {
    $resultado = '{"Salida":false,';
}
$resultado.='}';
echo ($resultado);
?>