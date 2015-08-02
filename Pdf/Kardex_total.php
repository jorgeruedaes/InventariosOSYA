<?php

require('../fpdf17/fpdf.php');

class PDF extends FPDF {

    function Header() {

        $this->Image('../images/aseoblanco.jpg', 10, 8, 100);
        $this->SetFont('Arial', 'B', 16);

        $this->Cell(0, 10, 'Inventario total de productos', 0, 0, 'C');
        $this->Ln();
        $this->Ln();
    }
    function Footer()
{

$this->SetY(-10);

$this->SetFont('Arial','I',10);
date_default_timezone_set('America/Bogota');
$this->Cell(0,10,date("d").'/'.date("m").'/'.date("Y"),0,0,'C');
   }

}

require('../Conexion.php');
$pdf = new PDF('L', 'mm', 'A4');
$pdf->SetMargins(20, 25, 30);
$pdf->SetFont('Arial', '', 10);
$pdf->SetAutoPageBreak(true, 25);
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 10, 'Codigo', 1, 0, 'C');
$pdf->Cell(65, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(65, 10, 'Proveedor', 1, 0, 'C');
$pdf->Cell(25, 10, 'Unidades', 1, 0, 'C');
$pdf->Cell(35, 10, 'Vr Unitario', 1, 0, 'C');
$pdf->Cell(35, 10, 'Vr Total', 1, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$totalfinal = 0;
$consulta = mysql_query("SELECT * FROM tb_productos WHERE estado='Activo' order by nombre asc");
while ($lista = mysql_fetch_array($consulta)) {
    $producto = $lista["id_producto"];
    $query = mysql_fetch_array(mysql_query("SELECT tb_usuarios.nombre as nombre FROM `tb_productos`,tb_usuarios "
                    . "Where id_producto=$producto and proveedor=cc"));

    $id = $lista["id_producto"];
    $query1 = mysql_fetch_array(mysql_query("SELECT Sum(cantidad) as cantidad FROM `tr_productos_salidas` WHERE id_producto=$id group by id_producto "));
    $salidas = $query1['cantidad'];
    $query2 = mysql_fetch_array(mysql_query("SELECT Sum(cantidad) as cantidad FROM `tr_productos_entradas` WHERE id_producto=$id group by id_producto "));
    $entradas = $query2['cantidad'];
    $totalreal = $entradas - $salidas;
    $valor = $lista["valor"];
    $valor = number_format($valor, 0, ',', ' ');
    $totalnormal = $totalreal * $lista["valor"];
    $total = number_format($totalnormal, 0, ',', ' ');
    $pdf->Cell(35, 10, $id, 1, 0, 'C');
    $pdf->Cell(65, 10, $lista["nombre"], 1, 0, 'L');
    $pdf->Cell(65, 10, $query["nombre"], 1, 0, 'L');
    $pdf->Cell(25, 10, $totalreal, 1, 0, 'C');
    $pdf->Cell(35, 10, $valor, 1, 0, 'C');
    $pdf->Cell(35, 10, $total, 1, 1, 'C');
    $totalfinal = $totalfinal + $totalnormal;
}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$tot = number_format($totalfinal, 0, ',', ' ');
$pdf->Cell(255, 5, 'Total en inventario:   ' . $tot, 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
ob_end_clean();
$pdf->Output();
?>