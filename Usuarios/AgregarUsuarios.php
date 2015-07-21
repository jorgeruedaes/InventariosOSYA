<?php
session_start();
$pruebadeinicio = 20;
include('../Conexion.php');
include('../RutinaDeLogueo.php');

if ($pruebadeinicio == 1 or $pruebadeinicio == 2) {
    ?>

    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Inventario OSYA</title>
            <link rel="stylesheet" href="../css/styler.css" type="text/css" media="all" />
            <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
                <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">

                    <script src="../bootstrap/js/bootstrap.min.js"></script>
                    <!-- ALERTS-->
                    <script src="../dist/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">


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
                            .contenido{

                                /*width: 1000px;*/
                                margin: 0 auto;
                            }
                            /*                            label{margin-left: 20px;}
                                                        #datepicker{width:180px; margin: 0 20px 20px 20px;}
                                                        #datepicker > span:hover{cursor: pointer;}*/
                        </style>
                        <body>

                            <div class="contenido">
                                <?php include('../Encabezado.html'); ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <h2 style="color:#27AE60;">Nuevo Cliente y/o Proveedor</h2><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2"> 
                                                <label>Nombre:</label>
                                                <input type="text" class="form-control nombre" name="nombre1" required>
                                            </div>
                                            <div class="col-md-4 "> 
                                                <label>Nit ó Cedula:</label>
                                                <input type="number" class="form-control cc" name="codigobarras">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2"> 
                                                <label>Email:</label>
                                                <input type="email" class="form-control email" name="valor" required>

                                            </div>
                                              <div class="col-md-4 "> 
                                                <label>Tipo:</label>
                                                <select class="form-control tipo" required="required" name="proveedor">
                                                    <option value="" selected></option>
                                                    <option value="Cliente" >Cliente</option>
                                                   <option value="Proveedor" >Proveedor</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2 text-right"> 
                                                <button type="reset" class="btn btn-default limpiar">Limpiar</button>
                                                <button name="enviar" class="btn btn-success guardar">Guardar</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br><br><br>

                                        <script>

                                            var Creador = '<?php echo $_SESSION['identificacion']; ?>'  // creador del producto o quien lo agrega
                                            var Usuarios = {
                                                Inicio: function () {
                                                    Usuarios.RecargarEventos();
                                                },
                                                RecargarEventos: function () {
                                                    Usuarios.EventosEnviarDatos();
                                                    Usuarios.EventosPruebaExistencia();
                                                    Usuarios.Limpiar();
                                                },
                                                EventosEnviarDatos: function () {
                                                    $('.guardar').off('click').on('click', function () {
                                                        if (Usuarios.ValidarGeneral()) {
                                                            $.ajax({
                                                                url: 'PeticionesUsuarios.php',
                                                                type: 'POST',
                                                                data: {
                                                                    Bandera: "AgregarUsuarios",
                                                                    codigo: $('.cc').val(),
                                                                    nombre: $('.nombre').val(),
                                                                    tipo: $('.tipo').val(),
                                                                     email: $('.email').val(),
                                                                    creador: Creador

                                                                },
                                                                success: function (resp) {

                                                                    var resp = $.parseJSON(resp);
                                                                    if (resp.Salida === true && resp.Mensaje === true) {
                                                                        swal({title: "",
                                                                            text: "El usuario se ha agregado  exitosamente!",
                                                                            type: "success",
                                                                            showCancelButton: false,
                                                                            confirmButtonColor: "rgb(174, 222, 244)",
                                                                            confirmButtonText: "Ok",
                                                                            closeOnConfirm: false
                                                                        }, function (isConfirm) {
                                                                            if (isConfirm) {
                                                                                window.location.reload();
                                                                            }
                                                                        });
                                                                    } else {
                                                                        swal("", "Ha habido un error, intenta nuevamente.", "error");
                                                                    }
                                                                }
                                                            });
                                                        }

                                                    });

                                                },
                                                EventosPruebaExistencia: function () {
                                                    $('.cc').off("keyup").on("keyup", function () {
                                                        $.ajax({
                                                            url: 'PeticionesUsuarios.php',
                                                            type: 'POST',
                                                            data: {
                                                                Bandera: "PruebaExistencia",
                                                                valor: $('.cc').val()
                                                            },
                                                            success: function (resp) {

                                                                var resp = $.parseJSON(resp);
                                                                if (resp.Salida === true && resp.Mensaje === true) {

                                                                } else {
                                                                    swal("Importante!", "El código, la cédula o el NIT  ya existe, intenta nuevamente.", "error");
                                                                }
                                                            }
                                                        });

                                                    });
                                                },
                                                ValidarGeneral: function () {
                                                    if (/\w/gi.test($('.nombre').val())) {
                                                        if ($('.cc').val().length>5) {
                                                                if (/\w/gi.test($('.tipo').val())) {
                                                                    return true;
                                                                } else {
                                                                    $('.tipo').focus();
                                                                    swal("", "Debes seleccionar un tipo de usuario, intenta nuevamente.", "error");
                                                                    return false;
                                                                }
                                                            
                                                        } else {
                                                            $('.cc').focus();
                                                            swal("", "La cédula o el NIT no son válidos, intenta nuevamente.", "error");
                                                            return false;
                                                        }
                                                    } else {
                                                        $('.nombre').focus();
                                                        swal("", "El cliente y/o proveedor debe tener un nombre.", "error");
                                                        return false;
                                                    }
                                                },
                                                Limpiar: function () {
                                                    $('.limpiar').off('click').on('click', function () {
                                                        $('.cc').val('');
                                                        $('.nombre').val('');
                                                        $('.tipo').val('');
                                                        $('.email').val('');
                                                    });
                                                }
                                            };
                                            $(document).ready(function () {

                                                Usuarios.Inicio();

                                            });</script>



                                        <?php
                                    } else {
                                        ?>
                                        <!-- CUANDO EL PERSONAJE NO ESTA AUTORIZADO PARA EL INGRESO-->
                                        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
                                            <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
                                                <script src="../bootstrap/js/bootstrap.min.js"></script>
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
                                                ?>




                                            </body>
                                            </html>
