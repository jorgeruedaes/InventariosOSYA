 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    session_start();
    $pruebadeinicio=20;
    include('Conexion.php');
    include('RutinaDeLogueo.php');
    if ($pruebadeinicio == 2) {
        ?>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Inventarios OSYA</title>
            <link rel="stylesheet" href="css/styler.css" type="text/css" media="all" />
            <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
            <script type="text/javascript" src="js/jquery-1.11.2.js"></script>
            <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
                <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
                    <script src="bootstrap/js/bootstrap.min.js"></script>
                    </head>
                    <style type="text/css">

                        #bienvenido{

                            width: auto;
                            margin-left: 0px;
                            margin-right: 15px;
                            margin-top: 0px;
                            float: right;
                            color: black;

                        }
                        .cerrar{

                            color: #000000;
                            float: right;
                            clear: right;
                            padding-right:  15px;
                        }
                    </style>
                    <body>

                        <div id="header">
                            <br>
                                <!--<b><p style="color:#3CB371;font-size:16px"id="bienvenido"><?php echo $_SESSION['admin'] ?></p></b>-->

                                <a style="font-size:15px;font-family: sans-serif"class="cerrar" href="cerrarsesion.php">Cerrar sesión 
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>

                                <div><img src="images/osya.png" style="padding-left: 20px;width: 180px;height: 100px"/></div>
                        </div>

                        <nav class="navbar navbar-default">
                            <div class="container-fluid" style="width: 800px"> 
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="modulobodega.php">
                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Productos/AgregarProductos.php">Nuevo Producto</a></li>
                                                <li><a href="Productos/ModificarProductos.php">Editar Productos</a></li>
                                                <!--<li><a href="Jugadores/Profesion.php">Nueva profesión</a></li>-->
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Consultas/Inventario.php">Inventario</a></li>
                                                <!--<li><a href="Equipos/ModificarEquipos.php"></a></li>-->
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Movimientos <span class="caret"></span></a>
                                            <ul class="dropdown-menu multi-level" role="menu">                                
                                                <li class="dropdown-submenu">
                                                    <a tabindex="-1" href="#">Entradas</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="Movimientos/Entradas/Entradas.php">Nueva</a></li>
                                                        <!--<li><a href="Amonestaciones/Jugadores/ModificarAmonestacionesDePartidos.php">Por partido</a></li>-->
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu">
                                                    <a tabindex="-1" href="#">Salidas</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="Movimientos/Salidas/Salidas.php">Nueva</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informes <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Informes/Kardex.php">Kardex</a></li>
                                                <!--<li><a href="Noticias/ModificarNoticias.php">Editar noticia</a></li>-->
                                            </ul>
                                        </li>
                                        
                                         <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="Usuarios/AgregarUsuarios.php">Nuevo Usuario</a></li>
                                                <li><a href="Usuarios/EditarUsuarios.php">Editar Usuarios</a></li>
<!--                                                <li><a href="Partidos/ModificarResultados.php">Editar resultado</a></li>
                                                <li><a href="Partidos/ModificarCalendario.php">Editar calendario</a></li>
                                                <li><a href="Partidos/ModificarAsistencia.php">Editar asistencia</a></li>-->
                                            </ul>
                                        </li>
                                        <!--                                        <li class="dropdown disabled">
                                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Estadísticas</a>
                                                                                    <ul class="dropdown-menu" role="menu">
                                                                                        <li><a href="#">Jugadores</a></li>
                                                                                        <li><a href="#">Equipos</a></li>
                                                                                        <li><a href="#">Partidos</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li class="dropdown disabled">
                                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Traspasos</a>
                                                                                    <ul class="dropdown-menu" role="menu">
                                                                                        <li><a href="#">Jugadores</a></li>
                                                                                        <li><a href="#">Equipos</a></li>
                                                                                        <li><a href="#">Partidos</a></li>
                                                                                    </ul>
                                                                                </li>-->
                                       
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <script>
                            $(function () {
                                $('.dropdown-toggle').dropdown();
                            })


                        </script>
                    </body>
                    </html>
                    <?php
                } else {
                    ?>
                    <!-- CUANDO EL PERSONAJE NO ESTA AUTORIZADO PARA EL INGRESO-->
                             <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
                <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
                    <script src="bootstrap/js/bootstrap.min.js"></script>
                            <center>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1"><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                    <div class="alert alert-danger" role="alert">Lo sentimos pero usted no tiene autorización para estar en este lugar.</div>
                                    </div>
                                </div>
                            </center>
                            <center>
                                <button type="button" class="btn btn-success"><a href="index.php" style="color: white">Volver</a></button></center>
                            <?php
                        }
                        