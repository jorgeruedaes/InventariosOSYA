
<?php

session_start();
include('Conexion.php');
if (isset($_SESSION['admin'])) {
    include('RutinaDeLogueo.php');
    if ($_SESSION['tipo_usuario'] == "Administrador") {
        header("location:moduloadministracion.php");
    } if ($_SESSION['tipo_usuario'] == "Bodega") {
        header("location:modulobodega.php");
    } else {
        echo "Usted no está autorizado para ingresar";
        header("location:index.php");
    }
} else {
    ?>
    <style type="text/css">

        body { 

        }

        .panel-default {
            opacity: 0.9;
            margin-top:30px;
        }
        .form-group.last {
            margin-bottom:0px;
        }

    </style>

    <html>
        <head>
            <meta charset="utf-8" />
            <title>Inventarios OSYA</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
            <script src="bootstrap/js/bootstrap.min.js"></script>
   

        </head>

        <body>
            <div class="container">
                <center>                                
                    <img src="images/osya.png">
                </center>

                <center> <div class="panel panel-default" style="width:410px">
                        <div class="panel-heading"><center> <strong style="font-size:21px"class="">Módulo de Inventarios</strong></center>

                        </div>
                        <div class="panel-body" style="padding-bottom:0px;">
                            <form action="comprobar.php" class="form-horizontal" role="form" method="post">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Usuario" name="user" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" name="pass" required="">
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" name="enviar" class="btn btn-info" style="color:white">Iniciar sesión</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="font-size:13px"class="panel-footer"><strong>¿Olvidaste tu contraseña? <a href="#" class="">Click aquí</a></strong>
                        </div>
                    </div></center>

            </div>
        </body>
    </html>
    <?php

}if (isset($_SESSION['error'])) {
    header("location:index.php");
}
?>