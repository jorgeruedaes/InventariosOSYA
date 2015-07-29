
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
    } else if ($Bandera === "PruebaExistenciaR") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT COUNT(*)as cantidad,nombre,cc FROM `tb_salidas`,tb_usuarios WHERE id_salida='$valor' and cliente=cc");
        $query1=  mysql_fetch_array($query);
        
        if ($query && $query1['cantidad']>0) {
            $nombre=$query1['nombre'];
            $id=$query1['cc'];
            $resultado.='"Mensaje":true';
            $resultado.=',"Nombre":" '. $nombre .' " ';
            $resultado.=',"Nit":' . $id . '';
        } else {
            $resultado.='"Mensaje":false';
        }
    } else if ($Bandera === "TraerProductosPorSalida") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT nombre,cantidad,`tr_productos_salidas`.id_producto as id,valor FROM `tr_productos_salidas`,tb_productos WHERE id_salida='$valor'and tb_productos.id_producto=`tr_productos_salidas`.id_producto");
        $productos = new stdClass();
        $array = array();
        while ($query1 = mysql_fetch_array($query)) {
            $id = $query1['id'];
            $nombre = $query1['nombre'];
            $valor = $query1['valor'];
            $cantidad = $query1['cantidad'];
            $productos = array("id" => $id, "nombre" => $nombre, "valor" => $valor, "cantidad" => $cantidad);
            array_push($array, $productos);
        }
        $json = json_encode($array);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Productos":' . $json . '';
        } else {
            $resultado.='"Mensaje":false';
    }
    
        } else if ($Bandera === "PruebaCantidadesSalida") {
        $id = $_POST['id'];
        $cantidad=$_POST['cantidad'];
        $salida=$_POST['salida'];
        
    $query1= mysql_fetch_array(mysql_query("SELECT cantidad FROM `tr_productos_salidas`,tb_productos WHERE id_salida='$salida' and tb_productos.id_producto=`tr_productos_salidas`.id_producto and `tr_productos_salidas`.id_producto=$id"));
        $cantidadreal= $query1['cantidad'];
      $myquery= mysql_query("SELECT SUM(cantidad)as cantidad FROM tb_entradas,tr_productos_entradas WHERE tipo='Devolucion' and tb_entradas.factura=$salida and id_producto=$id and tb_entradas.id_entrada=tr_productos_entradas.id_entrada group by tr_productos_entradas.factura");
      if(mysql_num_rows($myquery)>0){
            $query2= mysql_fetch_array($myquery);
       $cantidadesentradas= $query2['cantidad'];
             if(($cantidadreal-$cantidadesentradas)>=$cantidad){
                $resultado.='"Mensaje":true';
             }else{
                $resultado.='"Mensaje":false';
            $resultado.=',"Numero":  "'.($cantidadreal-$cantidadesentradas).'"';
             }
      }else{
          if($cantidadreal>=$cantidad){
               $resultado.='"Mensaje":true';
          }else{
               $resultado.='"Mensaje":false';
            $resultado.=',"Numero":  "'.$cantidadreal.'" ';
          }
          
      }
     
    }else if ($Bandera === "PruebaExistenciaF") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT tb_usuarios.nombre,cc,Count(*) as cantidad FROM `tb_entradas`,tr_productos_entradas,tb_productos,tb_usuarios WHERE tb_entradas.tipo='Factura'  and tb_entradas.factura='$valor' and tb_usuarios.tipo='Proveedor' and 
tb_entradas.factura=tr_productos_entradas.factura group by proveedor");
        $query1=  mysql_fetch_array($query);
        
        if ($query && $query1['cantidad']>0) {
            $nombre=$query1['nombre'];
            $id=$query1['cc'];
            $resultado.='"Mensaje":true';
            $resultado.=',"Nombre":" '. $nombre .' " ';
            $resultado.=',"Nit":' . $id . '';
        } else {
            $resultado.='"Mensaje":false';
        }
    }     else if ($Bandera === "TraerProductosPorEntrada") {
        $valor = $_POST['id'];
        $query = mysql_query("SELECT cantidad,tr_productos_entradas.id_producto as id,nombre,valor FROM tb_entradas,tr_productos_entradas,tb_productos WHERE tipo='Factura' and tb_entradas.factura='$valor' and tr_productos_entradas.factura=tb_entradas.factura and tr_productos_entradas.id_entrada=tb_entradas.id_entrada and tr_productos_entradas.id_producto=tb_productos.id_producto");
        $productos = new stdClass();
        $array = array();
        while ($query1 = mysql_fetch_array($query)) {
            $id = $query1['id'];
            $nombre = $query1['nombre'];
            $valor = $query1['valor'];
            $cantidad = $query1['cantidad'];
            $productos = array("id" => $id, "nombre" => $nombre, "valor" => $valor, "cantidad" => $cantidad);
            array_push($array, $productos);
        }
        $json = json_encode($array);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Productos":' . $json . '';
        } else {
            $resultado.='"Mensaje":false';
    }
    
        }else if ($Bandera === "PruebaCantidadesEntrada") {
        $id = $_POST['id'];
        $cantidad=$_POST['cantidad'];
        $salida=$_POST['salida'];
        
    $query1= mysql_fetch_array(mysql_query("SELECT cantidad FROM `tr_productos_entradas`,tb_productos WHERE factura='$salida' and tb_productos.id_producto=tr_productos_entradas.id_producto and `tr_productos_entradas`.id_producto=$id"));
        $cantidadreal= $query1['cantidad'];
      $myquery= mysql_query("SELECT SUM(cantidad)as cantidad FROM `tb_salidas`,tr_productos_salidas WHERE tb_salidas.id_salida='$salida' and tipo='Devolucion'  and tb_salidas.id_salida=tr_productos_salidas.id_salida='$salida' id_producto='$id' group by id_producto");
      if(mysql_num_rows($myquery)>0){
            $query2= mysql_fetch_array($myquery);
       $cantidadesentradas= $query2['cantidad'];
             if(($cantidadreal-$cantidadesentradas)>=$cantidad){
                $resultado.='"Mensaje":true';
             }else{
                $resultado.='"Mensaje":false';
            $resultado.=',"Numero":  "'.($cantidadreal-$cantidadesentradas).'"';
             }
      }else{
          if($cantidadreal>=$cantidad){
               $resultado.='"Mensaje":true';
          }else{
               $resultado.='"Mensaje":false';
            $resultado.=',"Numero":  "'.$cantidadreal.'" ';
          }
          
      }
     
    }
} else {
    $resultado = '{"Salida":false,';
}
$resultado.='}';
echo ($resultado);
?>