<?php

require('../fpdf17/fpdf.php');
require('../Conexion.php');

$id = $_GET["id"];
$fecha = $_GET["fecha"];
$proveedor = utf8_decode($_GET["proveedor"]);
$idproveedor = $_GET["idproveedor"];
$tipo = $_GET["tipo"];
$encargado = utf8_decode($_GET["encargado"]);
$identrada = $_GET["identrada"];
$totalsiniva= $_GET["totalsiniva"];
$iva = $_GET["iva"];
$totalconiva = $_GET["totalconiva"];

$consulta = mysql_query("SELECT valor,tb_productos.nombre as nombre, cantidad,tr_productos_entradas.id_producto as id "
        . "FROM tr_productos_entradas,tb_productos,tb_usuarios WHERE id_entrada='$identrada' "
        . "and tr_productos_entradas.id_producto=tb_productos.id_producto and proveedor=cc");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(30, 25, 30);
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../images/aseoblanco.jpg', 30, 30, 70);

$pdf->SetXY(29, 10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 100, 'Proveedor:', 0, 0, 'L');
$pdf->SetXY(50, 10);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 100, $proveedor, 0, 0, 'L');
if ($tipo == "Factura") {
    $pdf->SetXY(126, 30);
    $pdf->Cell(1, 10, $tipo, 0, 0, 'R');
    $pdf->SetXY(124, 40);
    $pdf->Cell(1, 10, 'Fecha', 0, 0, 'R');
    $pdf->SetXY(119, 55);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(1, 10, 'Nit:', 0, 0, 'R');
    $pdf->SetFont('Arial', '', 10);
} else {
    $pdf->SetXY(126, 30);
    $pdf->Cell(1, 10, $tipo, 0, 0, 'R');
    $pdf->SetXY(119, 40);
    $pdf->Cell(1, 10, 'Fecha', 0, 0, 'R');
    $pdf->SetXY(114, 55);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(1, 10, 'Nit:', 0, 0, 'R');
    $pdf->SetFont('Arial', '', 10);
}

$pdf->SetXY(135, 30);
$pdf->Cell(30, 10, $id, 1, 0, 'C');

$pdf->SetXY(135, 40);
$pdf->Cell(30, 10, $fecha, 1, 0, 'C');

$pdf->SetXY(144, 55);
$pdf->Cell(1, 10, $idproveedor, 0, 0, 'R');
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 10, 'Codigo', 1, 0, 'C');
$pdf->Cell(55, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(18, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(20, 10, 'Valor', 1, 0, 'C');
$pdf->Cell(30, 10, 'Total', 1, 1, 'C');
$pdf->SetFont('Arial', '', 10);

while ($resultado = mysql_fetch_array($consulta)) {
    $pdf->Cell(30, 10, $resultado["id"], 1, 0, 'C');
    $pdf->Cell(55, 10, $resultado["nombre"], 1, 0, 'C');
    $pdf->Cell(18, 10, $resultado["cantidad"], 1, 0, 'C');
    $pdf->Cell(20, 10, $resultado["valor"], 1, 0, 'C');
    $total = $resultado["cantidad"] * $resultado["valor"];
    $pdf->Cell(30, 10, $total, 1, 1, 'C');
}
$pdf->Ln();
$pdf->Cell(150,5,'Total: '.$totalsiniva,0,1,'R');
$pdf->Cell(150,5,'Iva: '.$iva,0,1,'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(150,5,'Total: '.$totalconiva,0,1,'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Ln();
$pdf ->Write(6,'Elaborado por: ');
$pdf ->Write(6,$encargado);

$pdf->Output();
?>