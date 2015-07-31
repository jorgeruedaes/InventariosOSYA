<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('../Conexion.php');
session_start();
$productos = $_SESSION['datos'];
if ($productos == true) {
    $consultaproductosactivos = mysql_query("SELECT id_producto FROM tb_productos WHERE estado='Activo'");
    while ($result = mysql_fetch_array($consultaproductosactivos)) {
        $id = $result["id_producto"];
        $consulta = mysql_query("(SELECT fecha,tb_entradas.tipo,cantidad,tb_entradas.factura,'entrada' "
                . "as tipom FROM tr_productos_entradas,tb_entradas WHERE id_producto=$id "
                . "and tb_entradas.id_entrada=tr_productos_entradas.id_entrada) UNION ALL"
                . "(SELECT fecha,tb_salidas.tipo,cantidad,tb_salidas.factura_salida,'salida' as tipom  "
                . "FROM tr_productos_salidas,tb_salidas WHERE id_producto=$id and "
                . "tb_salidas.id_salida=tr_productos_salidas.id_salida) ORDER BY fecha asc");
        while($res = mysql_fetch_array($consulta)){
        echo $res["fecha"];
        echo $res["tipo"];}
    }
} else {
    $productos = json_decode($productos, true);
    $p = $productos["productos"];


    foreach ($p as $cosa) {
        $id = $cosa['id'];
        $consulta = mysql_query("(SELECT fecha,tb_entradas.tipo,cantidad,tb_entradas.factura,'entrada' "
                . "as tipom FROM tr_productos_entradas,tb_entradas WHERE id_producto=$id "
                . "and tb_entradas.id_entrada=tr_productos_entradas.id_entrada) UNION ALL"
                . "(SELECT fecha,tb_salidas.tipo,cantidad,tb_salidas.factura_salida,'salida' as tipom  "
                . "FROM tr_productos_salidas,tb_salidas WHERE id_producto=$id and "
                . "tb_salidas.id_salida=tr_productos_salidas.id_salida) ORDER BY fecha asc");

        while ($resultado = mysql_fetch_array($consulta)) {

            echo $resultado["fecha"];
            echo $resultado["tipo"];
        }
    }
}
?>