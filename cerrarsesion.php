<?php
session_start();
if(!isset($_SESSION['admin']))
	
   {
        echo "No hay ninguna sesión";
//esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
     session_destroy();
header("location:index.php");
   }
?>
