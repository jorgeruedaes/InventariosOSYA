<?php

require('../fpdf17/fpdf.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('../Conexion.php');

class PDF extends FPDF {

    function Header() {

        $this->Image('../images/aseoblanco.jpg', 10, 8, 100);
        $this->SetFont('Arial', 'B', 16);

        $this->Cell(0, 10, 'Kardex de productos', 0, 0, 'C');
        $this->Ln();
        $this->Ln();
    }

}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->SetMargins(20, 25, 30);
$pdf->SetFont('Arial', '', 10);
$pdf->SetAutoPageBreak(true, 25);
$pdf->AddPage();

session_start();

$productos = $_SESSION['datos'];
if ($productos === true) {
    $consultaproductosactivos = mysql_query("SELECT id_producto FROM tb_productos WHERE estado='Activo'");
    while ($result = mysql_fetch_array($consultaproductosactivos)) {
        $id = $result["id_producto"];
        $consulta = mysql_query("(SELECT fecha,tr_productos_entradas.id_producto,tb_entradas.tipo,cantidad,"
                . "tb_entradas.factura,'entrada' as tipom FROM tr_productos_entradas,tb_entradas "
                . "WHERE id_producto=$id and tb_entradas.id_entrada=tr_productos_entradas.id_entrada) "
                . "UNION ALL (SELECT fecha,tr_productos_salidas.id_producto,tb_salidas.tipo,cantidad,"
                . "tb_salidas.factura_salida,'salida' as tipom FROM tr_productos_salidas,tb_salidas "
                . "WHERE id_producto=$id and tb_salidas.id_salida=tr_productos_salidas.id_salida) ORDER BY fecha asc");
        while ($resultado = mysql_fetch_array($consulta)) {
            $idproducto = $resultado["id_producto"];
            $nombreproducto = mysql_query("SELECT * FROM tb_productos WHERE id_producto=$idproducto");
            $resultadonombre = mysql_fetch_array($nombreproducto);
            $nombre = $resultadonombre["nombre"];
            if ($aux === $idproducto) {
                
            } else {
                $pdf->Ln();
                $aux = $idproducto;
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Write(6, $nombre);
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln();

                $pdf->Cell(80, 10, 'Fecha', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Tipo', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Entrada', 0, 0, 'C');
                $pdf->Cell(40, 10, 'Salida', 0, 0, 'C');
            }


            $pdf->Ln();

            $pdf->Cell(80, 10, $resultado["fecha"], 0, 0, 'C');
            $pdf->Cell(60, 10, $resultado["tipo"], 0, 0, 'C');
            if ($resultado["tipom"] === "entrada") {
                $pdf->Cell(60, 10, $resultado["cantidad"], 0, 0, 'C');
            } else {

                $pdf->Cell(160, 10, $resultado["cantidad"], 0, 0, 'C');
            }
        }
    }
} else {

    $productos = json_decode($productos, true);
    $p = $productos["productos"];
    $aux = 0;

    foreach ($p as $cosa) {
        $id = $cosa['id'];
        $consulta = mysql_query("(SELECT fecha,tb_entradas.tipo,tr_productos_entradas.id_producto,cantidad,tb_entradas.factura,'entrada' "
                . "as tipom FROM tr_productos_entradas,tb_entradas WHERE id_producto=$id "
                . "and tb_entradas.id_entrada=tr_productos_entradas.id_entrada) UNION ALL"
                . "(SELECT fecha,tb_salidas.tipo,tr_productos_salidas.id_producto,cantidad,tb_salidas.factura_salida,'salida' as tipom  "
                . "FROM tr_productos_salidas,tb_salidas WHERE id_producto=$id and "
                . "tb_salidas.id_salida=tr_productos_salidas.id_salida) ORDER BY fecha asc");

        while ($resultado = mysql_fetch_array($consulta)) {
            $idproducto = $resultado["id_producto"];
            $nombreproducto = mysql_query("SELECT * FROM tb_productos WHERE id_producto=$idproducto");
            $resultadonombre = mysql_fetch_array($nombreproducto);
            $nombre = $resultadonombre["nombre"];
            if ($aux === $idproducto) {
                
            } else {
                $pdf->Ln();
                $aux = $idproducto;
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Write(6, $nombre);
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln();

                $pdf->Cell(80, 10, 'Fecha', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Tipo', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Entrada', 0, 0, 'C');
                $pdf->Cell(40, 10, 'Salida', 0, 0, 'C');
            }


            $pdf->Ln();

            $pdf->Cell(80, 10, $resultado["fecha"], 0, 0, 'C');
            $pdf->Cell(60, 10, $resultado["tipo"], 0, 0, 'C');
            if ($resultado["tipom"] === "entrada") {
                $pdf->Cell(60, 10, $resultado["cantidad"], 0, 0, 'C');
            } else {

                $pdf->Cell(160, 10, $resultado["cantidad"], 0, 0, 'C');
            }
        }
    }
}
ob_end_clean();
$pdf->Output();
?>