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

        $this->Cell(0, 10, 'Kardex de Clientes', 0, 0, 'C');
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

$productos = $_SESSION['datosclientef'];
$fecha1 = $_SESSION['fecha1'];
$fecha2 = $_SESSION['fecha2'];
    $pdf->Ln();
                $aux = $salida;
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Write(6, 'Rango de fechas  de : '.$fecha1.' hasta :'.$fecha2);             
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln();

if ($productos === true) {
    $consultaproductosactivos = mysql_query("SELECT cc FROM tb_usuarios WHERE estado='Activo' and tipo='Cliente'");
    while ($result = mysql_fetch_array($consultaproductosactivos)) {
        $id = $result["cc"];
         $consulta = mysql_query("SELECT id_salida,fecha,factura_salida FROM tb_salidas WHERE tipo='Remision' and fecha between '$fecha1' and '$fecha2' and cliente='$id' order by fecha asc");
$consulta1 =  mysql_fetch_array(mysql_query("SELECT nombre from tb_usuarios WHERE cc='$id'  "));
$nombre="Cliente : ".$consulta1['nombre'];        

if(mysql_num_rows($consulta)>0){
                $pdf->Ln();
                $aux = $salida;
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Write(6, $nombre);             
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln();
}
                
while ($resultado = mysql_fetch_array($consulta)) {
            $salida = $resultado["id_salida"];
            $factura =$resultado["factura_salida"];
            $fecha=$resultado['fecha'];
                   $pdf->Ln();
                   
                $aux = $salida;
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Write(8,'   '.'  Remision : '.$factura.'  '.'Fecha '.$fecha);
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln();

                      $pdf->Cell(50, 10, 'Codigo', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Nombre', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Cantidad', 0, 0, 'C');
                $pdf->Cell(20, 10, 'Valor', 0, 0, 'C');
                $pdf->Cell(40, 10, 'Total', 0, 0, 'C');
           
            $nombreproducto = mysql_query("SELECT tb_productos.id_producto as id,nombre,cantidad,valor FROM tr_productos_salidas,tb_productos WHERE  tb_productos.id_producto=tr_productos_salidas.id_producto and id_salida='$salida' ");
            $valor=0;
            while($resultadonombre = mysql_fetch_array($nombreproducto)){

            $pdf->Ln();

              $pdf->Cell(50, 10, $resultadonombre['id'], 0, 0, 'C');
                $pdf->Cell(60, 10,$resultadonombre['nombre'], 0, 0, 'C');
                $pdf->Cell(60, 10,$resultadonombre['cantidad'], 0, 0, 'C');
                $pdf->Cell(20, 10, $resultadonombre['valor'], 0, 0, 'C');
                $pdf->Cell(40, 10,$resultadonombre['valor']*$resultadonombre['cantidad'], 0, 0, 'C');
                $valor=$valor+$resultadonombre['valor']*$resultadonombre['cantidad'];
            }
             $pdf->Ln();
        }
        $pdf->Ln();
    }
} else {

    $productos = json_decode($productos, true);
    $p = $productos["productos"];
    $aux = 0;

    foreach ($p as $cosa) {
        $id = $cosa['id'];
        $consulta = mysql_query("SELECT id_salida,fecha,factura_salida FROM tb_salidas WHERE tipo='Remision' and cliente='$id' and fecha between '$fecha1' and '$fecha2'  order by fecha asc");
$consulta1 =  mysql_fetch_array(mysql_query("SELECT nombre from tb_usuarios WHERE cc='$id'  "));
$nombre="Cliente : ".$consulta1['nombre'];        

if(mysql_num_rows($consulta)>0){
                $pdf->Ln();
                $aux = $salida;
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Write(6, $nombre);             
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln();
}
                
while ($resultado = mysql_fetch_array($consulta)) {
            $salida = $resultado["id_salida"];
            $factura =$resultado["factura_salida"];
            $fecha=$resultado['fecha'];
                   $pdf->Ln();
                   
                $aux = $salida;
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Write(8,'   '.'  Remision : '.$factura.'  '.'Fecha '.$fecha);
                $pdf->SetFont('Arial', '', 10);
                $pdf->Ln();

                      $pdf->Cell(50, 10, 'Codigo', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Nombre', 0, 0, 'C');
                $pdf->Cell(60, 10, 'Cantidad', 0, 0, 'C');
                $pdf->Cell(20, 10, 'Valor', 0, 0, 'C');
                $pdf->Cell(40, 10, 'Total', 0, 0, 'C');
           
            $nombreproducto = mysql_query("SELECT tb_productos.id_producto as id,nombre,cantidad,valor FROM tr_productos_salidas,tb_productos WHERE  tb_productos.id_producto=tr_productos_salidas.id_producto and id_salida='$salida' ");
            $valor=0;
            while($resultadonombre = mysql_fetch_array($nombreproducto)){

            $pdf->Ln();

              $pdf->Cell(50, 10, $resultadonombre['id'], 0, 0, 'C');
                $pdf->Cell(60, 10,$resultadonombre['nombre'], 0, 0, 'C');
                $pdf->Cell(60, 10,$resultadonombre['cantidad'], 0, 0, 'C');
                $pdf->Cell(20, 10, $resultadonombre['valor'], 0, 0, 'C');
                $pdf->Cell(40, 10,$resultadonombre['valor']*$resultadonombre['cantidad'], 0, 0, 'C');
                $valor=$valor+$resultadonombre['valor']*$resultadonombre['cantidad'];
            }
             $pdf->Ln();
        }
        $pdf->Ln();
    }
}
ob_end_clean();
$pdf->Output();
?>