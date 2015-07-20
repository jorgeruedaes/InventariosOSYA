
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
</head>
<body>

</body>
</html>

<?php 
    include('Conexion.php');
    session_start();
 $contraseña= $_POST['pass'];
 $usuario = $_POST['user'];
$contra_encriptada = md5($contraseña);
$usuario_encriptado= md5($usuario);
$primero=mysql_query("SELECT usuario,contrasena,tipo,estado,cc FROM tb_usuarios ");
while ($var=mysql_fetch_array($primero)) {
if ($usuario_encriptado==$var['usuario']
  and $contra_encriptada==$var['contrasena']
   and $var['estado']=='Activo') {
if($var['tipo']=="Administrador" ){
// AdminNormal
      $_SESSION['admin']=$_POST['user'];
      $_SESSION['identificacion']=$var['cc'];
      $_SESSION['tipo_usuario']=$var['tipo'];
header("location:moduloadministracion.php");
          }else if($var['tipo']=="Bodega"){
// Bodega
      $_SESSION['admin']=$_POST['user'];
      $_SESSION['identificacion']=$var['cc'];
      $_SESSION['tipo_usuario']=$var['tipo'];
header("location:modulobodega.php");

        	}
}else{

echo "<script language='JavaScript' type='text/javascript'>
alert('Usuario y/o contraseña incorrectos, intenta de nuevo.');
  $(location).attr('href','index.php'); 
</script>";

}
}
echo "<script language='JavaScript' type='text/javascript'>
alert('Usuario y/o contraseña incorrectos, intenta de nuevo.');
  $(location).attr('href','index.php'); 
</script>";

?>