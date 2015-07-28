
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
            <title>Inventarios ASEO</title>
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

                                margin: 0 auto;
                            }

                        </style>
                        <body>

                            <div class="contenido">
                                <?php include('../Encabezado.php'); ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <h2 style="color:#27AE60;">Nuevo Producto</h2><hr>
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
                                                <label>Código de Barras:</label>
                                                <input type="number" class="form-control codigobarras" name="codigobarras">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2"> 
                                                <label>Valor de compra:</label>
                                                <input type="number" class="form-control valor" name="valor" required>

                                            </div>
                                            <div class="col-md-4 "> 

                                                <label>Proveedor:</label>
                                                <select class="form-control proveedor" required="required" name="proveedor">
                                                    <option value="" selected></option>
                                                    <?php
                                                    $equipos = mysql_query("SELECT * from tb_usuarios where tipo='Proveedor' ORDER BY nombre asc ");
                                                    while ($listaequipos = mysql_fetch_array($equipos)) {
                                                        ?>
                                                        <option value="<?php echo $listaequipos['cc']; ?>"><?php echo $listaequipos['nombre']; ?> </option>

                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2"> 
                                                <label>Descripción:</label>
                                                <textarea class="form-control descripcion" rows="3" style="  resize: inherit;"></textarea>

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
                                                <button name="enviar" class="btn btn-success guardar">Crear</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br><br><br>

                                        <script>

                                            var Creador = '<?php echo $_SESSION['identificacion']; ?>'  // creador del producto o quien lo agrega
                                            var Productos = {
                                                Inicio: function () {
                                                    Productos.RecargarEventos();
                                                },
                                                RecargarEventos: function () {
                                                    Productos.EventosEnviarDatos();
                                                    Productos.EventosPruebaExistencia();
                                                    Productos.Limpiar();
                                                },
                                                EventosEnviarDatos: function () {
                                                    $('.guardar').off('click').on('click', function () {
                                                        if (Productos.ValidarGeneral()) {
                                                            $.ajax({
                                                                url: 'PeticionesProductos.php',
                                                                type: 'POST',
                                                                data: {
                                                                    Bandera: "AgregarProductos",
                                                                    codigo: $('.codigobarras').val(),
                                                                    nombre: $('.nombre').val(),
                                                                    valor: $('.valor').val(),
                                                                    proveedor: $('.proveedor').val(),
                                                                    descripcion: $('.descripcion').val(),
                                                                    creador: Creador

                                                                },
                                                                success: function (resp) {

                                                                    var resp = $.parseJSON(resp);
                                                                    if (resp.Salida === true && resp.Mensaje === true) {
                                                                        swal({title: "",
                                                                            text: "El producto se ha agregado  exitosamente!",
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
                                                                        swal("", "Ha habido un error,intenta nuevamente.", "error");
                                                                    }
                                                                }
                                                            });
                                                        }

                                                    });

                                                },
                                                EventosPruebaExistencia: function () {
                                                    $('.codigobarras').off("keyup").on("keyup", function () {
                                                        $.ajax({
                                                            url: 'PeticionesProductos.php',
                                                            type: 'POST',
                                                            data: {
                                                                Bandera: "PruebaExistencia",
                                                                valor: $('.codigobarras').val()
                                                            },
                                                            success: function (resp) {

                                                                var resp = $.parseJSON(resp);
                                                                if (resp.Salida === true && resp.Mensaje === true) {

                                                                } else {
                                                                    swal("Importante!", "El codigo de barras que has introducido ya existe,intenta nuevamente.", "error");
                                                                }
                                                            }
                                                        });

                                                    });
                                                },
                                                ValidarGeneral: function () {
                                                    if (/\w/gi.test($('.nombre').val())) {
                                                        if (/[0-9]{1,9}(\.[0-9]{0,10})?$/.test($('.codigobarras').val()) && $('.codigobarras').val().length === 13) {
                                                            if (/[0-9]{1,9}(\.[0-9]{0,10})?$/.test($('.valor').val()) && $('.valor').val() > 0) {
                                                                if (/\w/gi.test($('.proveedor').val())) {
                                                                    return true;
                                                                } else {
                                                                    $('.proveedor').focus();
                                                                    swal("", "Debes seleccionar un proveedor, intenta nuevamente.", "error");
                                                                    return false;
                                                                }
                                                            } else {
                                                                $('.valor').focus();
                                                                swal("", "El valor de compra no es válido, intenta nuevamente.", "error");
                                                                return false;
                                                            }
                                                        } else {
                                                            $('.codigobarras').focus();
                                                            swal("", "El código de barras no es válido, intenta nuevamente.", "error");
                                                            return false;
                                                        }
                                                    } else {
                                                        $('.nombre').focus();
                                                        swal("", "Debe digitar un nombre para el producto.", "error");
                                                        return false;
                                                    }
                                                },
                                                Limpiar: function () {
                                                    $('.limpiar').off('click').on('click', function () {
                                                        $('.codigobarras').val('');
                                                        $('.nombre').val('');
                                                        $('.valor').val('');
                                                        $('.proveedor').val('');
                                                        $('.descripcion').val('');
                                                    });
                                                }
                                            };
                                            $(document).ready(function () {

                                                Productos.Inicio();

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
