<?php

include('Conexion.php');

$resultado = '{"Salida":true,';
$Bandera = $_POST['Bandera'];
if ($Bandera === "Comprobar") {

    $user = $_POST['Usuario'];
    $userenc = md5($user);
    $correo = $_POST['Correo'];
    $query = mysql_query("SELECT * FROM tb_usuarios WHERE usuario = '$userenc' AND email='$correo'");
    $datos = mysql_fetch_array($query);
    $pregunta = $datos['pregunta'];
    $respuesta = $datos['respuesta'];
    $idusr = $datos['cc'];
    if (mysql_num_rows($query) > 0) {

        $resultado.='"Mensaje":true,"Pregunta":"' . $pregunta . '","Respuesta":"' . $respuesta . '","IdUsuario":"' . $idusr . '"';
    } else {
        $resultado.='"Mensaje":false';
    }
    $resultado.='}';
}
else if ($Bandera === "Cambiar") {

    $pass = $_POST['NuevaContraseña'];
    $passenc = md5($pass);
    $user = $_POST['Usuario'];
    
    $query = mysql_query("UPDATE tb_usuarios SET contrasena = '$passenc' WHERE cc='$user'");
  
    if ($query) {

        $resultado.='"Mensaje":true';
    } else {
        $resultado.='"Mensaje":false';
    }
    $resultado.='}';
}
echo ($resultado);

mysql_close($con);


