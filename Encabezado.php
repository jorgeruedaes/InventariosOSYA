<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styler.css" type="text/css" media="all" />
        <script type="text/javascript"  src="../DataTables-1.10.7/media/js/jquery.js"></script>
        <!-- DataTables -->
        <script type="text/javascript"  src="../DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript"  src="../DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        if ($pruebadeinicio == 2) {
            ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="header">


                        <div><img src="../images/osya.png" style="padding-left: 20px"/></div>

                    </div>

                    <nav class="navbar navbar-default"  style="background-image:none;background-color:#27AE60">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="container-fluid" style="width: 800px">   
                                    <div class="navbar-header">
                                        <a class="navbar-brand" href="../modulobodega.php">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Productos/AgregarProductos.php">Nuevo Producto</a></li>
                                                    <li><a href="../Productos/ModificarProductos.php">Editar Productos</a></li>
                                                    <!--<li><a href="Jugadores/Profesion.php">Nueva profesión</a></li>-->
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Consultas/Inventario.php">Inventario</a></li>
                                                    <!--<li><a href="Equipos/ModificarEquipos.php"></a></li>-->
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Movimientos <span class="caret"></span></a>
                                                <ul class="dropdown-menu multi-level" role="menu">                                
                                                    <li class="dropdown-submenu">
                                                        <a tabindex="-1" href="#">Entradas</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="../Movimientos/Entradas.php">Nueva entrada</a></li>
                                                             <li><a href="../Movimientos/ConsultaEntradas.php">Consultar</a></li>
                                                            <!--<li><a href="Amonestaciones/Jugadores/ModificarAmonestacionesDePartidos.php">Por partido</a></li>-->
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a tabindex="-1" href="#">Salidas</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="../Movimientos/Salidas.php">Nueva salida</a></li>
                                                             <li><a href="../Movimientos/ConsultaSalidas.php">Consultar</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informes <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Informes/Kardex.php">Kardex</a></li>
                                                    <!--<li><a href="Noticias/ModificarNoticias.php">Editar noticia</a></li>-->
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
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Usuarios/AgregarUsuarios.php">Nuevo Usuario</a></li>
                                                    <li><a href="../Usuarios/EditarUsuarios.php">Editar Usuarios</a></li>
                                                     <li><a href="../Usuarios/CrearPerfil.php">Crear Perfil</a></li>
                                                <li><a href="../Usuarios/EditarPerfil.php">Ver Perfiles</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <?php
        } else if ($pruebadeinicio == 1) {
            ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="header">
                        <div><img src="../images/osya.png" style="padding-left: 20px"/></div>
                    </div>

                    <nav class="navbar navbar-default"  style="background-image:none;background-color:#27AE60">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="container-fluid" style="width: 800px">   
                                    <div class="navbar-header">
                                        <a class="navbar-brand" href="../moduloadministracion.php">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Productos/AgregarProductos.php">Nuevo Producto</a></li>
                                                    <li><a href="../Productos/ModificarProductos.php">Editar Productos</a></li>
                                                    <!--<li><a href="Jugadores/Profesion.php">Nueva profesión</a></li>-->
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Consultas/Inventario.php">Inventario</a></li>
                                                    <!--<li><a href="Equipos/ModificarEquipos.php"></a></li>-->
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Movimientos <span class="caret"></span></a>
                                                <ul class="dropdown-menu multi-level" role="menu">                                
                                                    <li class="dropdown-submenu">
                                                        <a tabindex="-1" href="#">Entradas</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="../Movimientos/Entradas.php">Nueva</a></li>
                                                            <!--<li><a href="Amonestaciones/Jugadores/ModificarAmonestacionesDePartidos.php">Por partido</a></li>-->
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a tabindex="-1" href="#">Salidas</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="../Movimientos/Salidas.php">Nueva</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
<!--                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informes <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Informes/Kardex.php">Kardex</a></li>
                                                    <li><a href="Noticias/ModificarNoticias.php">Editar noticia</a></li>
                                                </ul>
                                            </li>-->

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
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="../Usuarios/AgregarUsuarios.php">Nuevo Usuario</a></li>
                                                    <li><a href="../Usuarios/EditarUsuarios.php">Editar Usuarios</a></li>
                                                    <!--                                                <li><a href="Partidos/ModificarResultados.php">Editar resultado</a></li>
                                                                                                    <li><a href="Partidos/ModificarCalendario.php">Editar calendario</a></li>
                                                                                                    <li><a href="Partidos/ModificarAsistencia.php">Editar asistencia</a></li>-->
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
    <?php
}
?>

        <script>
            $(function () {
                $('.dropdown-toggle').dropdown();
            })


        </script>
    </body>
</html>
