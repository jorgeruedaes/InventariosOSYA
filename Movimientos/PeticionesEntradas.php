<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include '../Conexion.php';
include('../RutinaDeLogueo.php');
if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    $resultado = '{"Salida":true,';
    $Bandera = $_POST['Bandera'];
    if ($Bandera === "ConsultarFra") {
        $id = $_POST["id"];

        $query = mysql_query("SELECT * FROM tb_entradas WHERE id_entrada = '$id'");
        $query2 = mysql_query("SELECT valor,tb_productos.nombre as producto,tb_usuarios.nombre as "
                . "proveedornombre,cantidad,tr_productos_entradas.id_producto FROM `tr_productos_entradas`,"
                . "tb_productos,tb_usuarios WHERE id_entrada='$id' and tr_productos_entradas.id_producto="
                . "tb_productos.id_producto and proveedor=cc");
        $datos = mysql_fetch_array($query);
        $idencargado = $datos["encargado"];
        $consultanombreencargado = mysql_query("SELECT * FROM tb_usuarios WHERE cc =$idencargado");
        $result = mysql_fetch_array($consultanombreencargado);

        $encargado = $result["nombre"];
        $entradas = new stdClass();
        $array = array();
        $arrayp = array();
        while ($datostotales = mysql_fetch_array($query2)) {

            $fra = $datos["factura"];
            $fecha = $datos["fecha"];
            $tipo = $datos["tipo"];
            $nombreproveedor = $datostotales["proveedornombre"];
            $cantidad = $datostotales["cantidad"];
            $idproducto = $datostotales["id_producto"];
            $nombreproducto = $datostotales["producto"];
            $valor = $datostotales["valor"];

            $entradas = array("fecha" => $fecha, "factura" => $fra, "tipo" => $tipo,
                "encargado" => $encargado, "proveedor" => $nombreproveedor);
            $productos = array("id" => $idproducto, "nombre" => $nombreproducto, "cantidad" => $cantidad, "valor" => $valor);

            array_push($arrayp, $productos);
        }
        array_push($array, $entradas);
        $json = json_encode($array);
        $jsonp = json_encode($arrayp);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Entradas":' . $json . '';
            $resultado.=',"Productos":' . $jsonp . '';
        } else {
            $resultado.='"Mensaje":false';
        }
    }else if ($Bandera === "EliminarEntrada") {

        $id = $_POST["id"];
        $consultaproductos = mysql_query("SELECT * FROM tr_productos_entradas WHERE id_entrada = '$id'");
        $bandera = true;
        while ($resultado1 = mysql_fetch_array($consultaproductos)) {
            $idproducto = $resultado1["id_producto"];
            $cantidad = $resultado1["cantidad"];
            $query1 = mysql_fetch_array(mysql_query("SELECT Sum(cantidad) as cantidad FROM `tr_productos_salidas` WHERE id_producto=$idproducto group by id_producto "));
            $salidas = $query1['cantidad'];
            $query2 = mysql_fetch_array(mysql_query("SELECT Sum(cantidad) as cantidad FROM `tr_productos_entradas` WHERE id_producto=$idproducto group by id_producto "));
            $entradas = $query2['cantidad'];
            $stock = $entradas - $salidas;
            if ($stock >= $cantidad) {
                
            } else {
                $bandera = false;
            }
        }
        if ($bandera == true) {
            $query2 = mysql_query("DELETE  FROM tr_productos_entradas WHERE id_entrada = '$id'");
            $query = mysql_query("DELETE  FROM tb_entradas WHERE id_entrada = '$id'");
            if($query2 &&$query){
                 $resultado.='"Mensaje":true';
            }else{
                 $resultado.='"Mensaje":false'; 
            }
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