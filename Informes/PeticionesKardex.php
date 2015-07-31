
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
     else if ($Bandera === "TraerTodosProveedores") {
        $query = mysql_query("SELECT * FROM `tb_usuarios` WHERE  Estado='Activo' and tipo='Proveedor' ");
        $productos = new stdClass();
        $array = array();
        while ($query1 = mysql_fetch_array($query)) {
            $id = $query1['cc'];
            $nombre = $query1['nombre'];
            $productos = array("id" => $id, "nombre" => $nombre);
            array_push($array, $productos);
        }
        $json = json_encode($array);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Productos":' . $json . '';
        } else {
            $resultado.='"Mensaje":false';
        }
    }else if ($Bandera === "TraerTodoClientes") {
        $query = mysql_query("SELECT * FROM `tb_usuarios` WHERE  Estado='Activo' and tipo='Cliente' ");
        $productos = new stdClass();
        $array = array();
        while ($query1 = mysql_fetch_array($query)) {
            $id = $query1['cc'];
            $nombre = $query1['nombre'];
            $productos = array("id" => $id, "nombre" => $nombre);
            array_push($array, $productos);
        }
        $json = json_encode($array);
        if ($query) {
            $resultado.='"Mensaje":true';
            $resultado.=',"Productos":' . $json . '';
        } else {
            $resultado.='"Mensaje":false';
        }
    }else if ($Bandera === "ProductoSinFecha") {
        
        $_SESSION["datos"]  = $_POST["Objeto"];
        $resultado.='"Mensaje":true';
    }
    else if ($Bandera === "ProductosTodos") {
        
        $_SESSION["datos"]  = true;
        $resultado.='"Mensaje":true';
    }
} else {
    $resultado = '{"Salida":false,';
}
$resultado.='}';
echo ($resultado);
?>