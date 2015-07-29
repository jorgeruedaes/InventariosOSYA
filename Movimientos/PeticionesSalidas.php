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
        $query = mysql_query("SELECT * FROM tb_salidas WHERE id_salida = '$id'");
        $query2 = mysql_query("SELECT tb_productos.nombre as nombreproducto, cantidad, tr_productos_salidas.id_producto "
                . "as idproducto,tb_productos.valor as valor "
                . "from tr_productos_salidas,tb_productos WHERE id_salida='$id' "
                . "AND tb_productos.id_producto = tr_productos_salidas.id_producto");

        $datos = mysql_fetch_array($query);
        $idencargado = $datos["encargado"];
        $idcliente = $datos["cliente"];
        $consultanombreencargado = mysql_query("SELECT * FROM tb_usuarios WHERE cc =$idencargado");
        $consultanombrecliente = mysql_query("SELECT * FROM tb_usuarios WHERE cc =$idcliente");
        $result = mysql_fetch_array($consultanombreencargado);
        $results = mysql_fetch_array($consultanombrecliente);

        $encargado = $result["nombre"];
        $cliente = $results["nombre"];
        $salidas = new stdClass();
        $array = array();
        $arrayp = array();
        while ($datostotales = mysql_fetch_array($query2)) {

            $fra = $datos["id_salida"];
            $fecha = $datos["fecha"];
            $tipo = $datos["tipo"];
            $cantidad = $datostotales["cantidad"];
            $idproducto = $datostotales["idproducto"];
            $nombreproducto = $datostotales["nombreproducto"];
            $valor = $datostotales["valor"];

            $salidas = array("fecha" => $fecha, "factura" => $fra, "tipo" => $tipo,
                "encargado" => $encargado, "cliente" => $cliente, "idcliente" => $idcliente);
            $productos = array("cantidad" => $cantidad, "producto" => $nombreproducto, "id" => $idproducto, "valor" => $valor);

            array_push($arrayp, $productos);
        }
        array_push($array, $salidas);
        $json = json_encode($array);
        $jsonp = json_encode($arrayp);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Salidas":' . $json . '';
            $resultado.=',"Productos":' . $jsonp . '';
        } else {
            $resultado.='"Mensaje":false';
        }
    }
    else if ($Bandera === "EliminarSalida") {

        $id = $_POST["id"];
        $consultaproductos = mysql_query("SELECT * FROM tr_productos_salidas WHERE id_salida = '$id'");
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
            $query2 = mysql_query("DELETE  FROM tr_productos_salidas WHERE id_salida = '$id'");
            $query = mysql_query("DELETE  FROM tb_salidas WHERE id_salida = '$id'");
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