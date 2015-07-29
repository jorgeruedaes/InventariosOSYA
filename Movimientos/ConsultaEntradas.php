<?php
session_start();
$pruebadeinicio = 20;
include('../Conexion.php');
include('../RutinaDeLogueo.php');
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Inventarios ASEO</title>            
        <link rel="stylesheet" href="../css/styler.css" type="text/css" media="all" />
        <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/jquery.js"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- ALERTS-->
        <script src="../dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">

    </head>
    <style>
        .info{

            font-weight: normal;
        }
    </style>
    <body>

        <div class="modal fade" id="myModal" tabindex="-1" data-jugador="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Consulta de entrada</h4>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-8">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Nro. Entrada:</label>
                                        <label class="info" id="entrada"></label>
                                        <label class="info" id="identrada" hidden></label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Fecha:</label>
                                        <label class="info" id="fecha"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Tipo:</label>
                                        <label class="info" id="tipo"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Encargado:</label>
                                        <label class="info" id="encargado"></label>
                                    </div>
                                    <div class="col-md-4 col-md-offset-3">
                                        <label>Proveedor:</label>
                                        <label class="info" id="proveedor"></label>
                                        <label class="info" id="idproveedor" hidden></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered tablaproductos" style="  font-size: 13px;">
                                            <thead style=" background-color: rgb(242, 241, 239);">
                                                <tr>
                                                    <th width="20%">Código</th>
                                                    <th width="30%">Nombre</th>
                                                    <th width="15%">Cantidad</th>
                                                    <th width="15%">Valor</th>
                                                    <th width="20%">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-9">
                                        <br>
                                        <label  class="col-md-3">Total:</label>
                                        <label class="col-md-6  totales">$ 0</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-9">
                                        <label  class="col-md-3 ">Iva:</label>
                                        <label class="col-md-6 ivatotales">$ 0</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-9">
                                        <label  class="col-md-3 ">Total:</label>
                                        <label class="col-md-6  totalesreales">$ 0</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        if ($pruebadeinicio == 1) {
                            ?>
                            <input type="hidden" id="identificador"/>
                            <button type="button" class="btn btn-default pdf">
                                <span class="glyphicon glyphicon-file" aria-hidden="true" class="identrada"></span> Pdf
                            </button>
                            <?php
                        } else if ($pruebadeinicio == 2) {
                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("../Encabezado.php");

        if ($pruebadeinicio == 1) {
            ?>

          
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="color:#27AE60;">Listado de entradas</h2><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table id="tablaentradas" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>No. Entrada</th>
                                <th>Fecha</th>
                                <th>Encargado</th>
                                <th>Proveedor</th>
                                <th>Tipo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $consulta = mysql_query("SELECT * FROM tb_entradas");

                            while ($listaentradas = mysql_fetch_array($consulta)) {
                                $idencargado = $listaentradas["encargado"];
                                $identrada = $listaentradas["id_entrada"];


                                //para consultar el proveedor
                                $consultae = mysql_query("SELECT  * FROM tr_productos_entradas WHERE id_entrada = '$identrada'");
                                if ($consultaedatos = mysql_fetch_array($consultae)) {

                                    $idproducto = $consultaedatos["id_producto"];

                                    $consultaproveedor = mysql_query("SELECT * FROM tb_productos WHERE id_producto = '$idproducto'");
                                    $proveedor = mysql_fetch_array($consultaproveedor);
                                    $idproveedor = $proveedor["proveedor"];

                                    $consultanombreproveedor = mysql_query("SELECT * FROM tb_usuarios WHERE cc = '$idproveedor'");
                                    $cons = mysql_fetch_array($consultanombreproveedor);

                                    $consultanombreencargado = mysql_query("SELECT * FROM tb_usuarios WHERE cc =$idencargado");
                                    $resultado = mysql_fetch_array($consultanombreencargado);
                                    ?>
                                    <tr class="default caja">
                                        <th scope="row"><?php echo $listaentradas["factura"] ?></th> 
                                        <td><?php echo $listaentradas["fecha"]; ?></td>
                                        <td><?php echo $resultado["nombre"]; ?></td>
                                        <td><?php echo $cons["nombre"]; ?></td>
                                        <td><?php echo $listaentradas["tipo"]; ?></td>
                                        <td>
                                            <button data-id="<?php echo $listaentradas["id_entrada"] ?>" class="btn btn-default consultar" data-toggle="modal">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

                                            <button data-id="<?php echo $listaentradas["id_entrada"] ?>" class="btn btn-default eliminar">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                        </td>

                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>

                </div></div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>
            <?php
        } else if ($pruebadeinicio == 2) {
            ?>

            
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="color:#27AE60;">Listado de entradas</h2><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table id="tablaentradas1" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>No. Entrada</th>
                                <th>Fecha</th>
                                <th>Encargado</th>
                                <th>Proveedor</th>
                                <th>Tipo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $consulta = mysql_query("SELECT * FROM tb_entradas");

                            while ($listaentradas = mysql_fetch_array($consulta)) {
                                $idencargado = $listaentradas["encargado"];
                                $identrada = $listaentradas["id_entrada"];


                                //para consultar el proveedor
                                $consultae = mysql_query("SELECT  * FROM tr_productos_entradas WHERE id_entrada = '$identrada'");
                                if ($consultaedatos = mysql_fetch_array($consultae)) {

                                    $idproducto = $consultaedatos["id_producto"];

                                    $consultaproveedor = mysql_query("SELECT * FROM tb_productos WHERE id_producto = '$idproducto'");
                                    $proveedor = mysql_fetch_array($consultaproveedor);
                                    $idproveedor = $proveedor["proveedor"];

                                    $consultanombreproveedor = mysql_query("SELECT * FROM tb_usuarios WHERE cc = '$idproveedor'");
                                    $cons = mysql_fetch_array($consultanombreproveedor);

                                    $consultanombreencargado = mysql_query("SELECT * FROM tb_usuarios WHERE cc =$idencargado");
                                    $resultado = mysql_fetch_array($consultanombreencargado);
                                    ?>
                                    <tr class="default caja">
                                        <th scope="row"><?php echo $listaentradas["factura"] ?></th> 
                                        <td><?php echo $listaentradas["fecha"]; ?></td>
                                        <td><?php echo $resultado["nombre"]; ?></td>
                                        <td><?php echo $cons["nombre"]; ?></td>
                                        <td><?php echo $listaentradas["tipo"]; ?></td>
                                        <td>
                                            <button data-id="<?php echo $listaentradas["id_entrada"] ?>" class="btn btn-default consultar" data-toggle="modal">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

                                        </td>

                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>

                </div></div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2"><br></div>
            </div>

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



<script>

    $(document).ready(function () {

        Entradas.inicio();

    });
    var Entradas = {
        inicio: function () {
            $('#tablaentradas').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_",
                    "search": "Buscar:",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "zeroRecords": "No se encontraron resultados",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(filtrado de _MAX_ entradas)",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }

            });
            $('#tablaentradas1').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_",
                    "search": "Buscar:",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "zeroRecords": "No se encontraron resultados",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(filtrado de _MAX_ entradas)",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }

            });
            Entradas.recargarEventos();
        }, recargarEventos: function () {
            Entradas.EventoConsultarFra();
            Entradas.EventoEliminarFra();
            Entradas.Eventopdf();

        },
        EventoConsultarFra: function () {
            $('.consultar').off('click').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: 'PeticionesEntradas.php',
                    type: 'POST',
                    data: {
                        Bandera: "ConsultarFra",
                        id: id
                    },
                    success: function (resp) {
                        $('.modal').modal('show');
                        var resp = $.parseJSON(resp);
                        if (resp.Salida === true && resp.Mensaje === true) {
                            $('.tablaproductos tbody').html("");
                            $.each(resp.Entradas, function (i, item) {
                                var fecha = item.fecha;
                                var tipo = item.tipo;
                                var factura = item.factura;
                                var encargado = item.encargado;
                                var proveedor = item.proveedor;
                                var idproveedor=item.idproveedor;
                                var id= item.identrada;


                                $('#fecha').text(fecha);
                                $('#tipo').text(tipo);
                                $('#entrada').text(factura);
                                $('#encargado').text(encargado);
                                $('#proveedor').text(proveedor);
                                $('#idproveedor').text(idproveedor);
                                $('#identrada').text(id);

                            });
                            $.each(resp.Productos, function (i, item) {
                                var nombre = item.nombre;
                                var id = item.id;
                                var cantidad = item.cantidad;
                                var valor = item.valor;
                                var total = cantidad * valor;
                                $('.tablaproductos tbody').append('<tr class="cajaproductos">\n\
                            <td scope="row" class="id">' + id + '</td><td>' + nombre + '</td>\n\
                            <td>' + cantidad + '</td><td>' + valor + '</td><td class="total">' + total + '</td></tr>');

                            });
                            Entradas.CargarTotales();

                        } else {
                            swal("", "Ha ocurrido un error, intenta nuevamente", "error");

                        }
                    }
                });
            });
        },
        CargarTotales: function () {

            var totales = 0;
            var totaliva = 0;
            var totalreal = 0;
            $('.cajaproductos').each(function () {
                var total = $(this).children('.total').text();
                total = parseInt(total);
                totales = totales + total;
            });
            totales = parseInt(totales);
            $('.totales').text('$' + ' ' + totales);
            var iva = totales * 0.16;
            $('.ivatotales').text('$' + ' ' + iva);
            var total = parseInt(totales) + parseInt(iva)
            $('.totalesreales').text('$' + ' ' + total);
        },
        EventoEliminarFra: function () {
            $('.eliminar').off('click').on('click', function () {
                var id = $(this).data('id');
                swal({title: "",
                    text: "¿La entrada se eliminará, está seguro?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "rgb(174, 222, 244)",
                    confirmButtonText: "Ok",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: 'PeticionesEntradas.php',
                            type: 'POST',
                            data: {
                                Bandera: "EliminarEntrada",
                                id: id
                            },
                            success: function (resp) {
                                var resp = $.parseJSON(resp);
                                console.log(resp);
                                if (resp.Salida === true && resp.Mensaje === true) {
                                    swal({title: "",
                                        text: "La entrada se ha eliminado exitosamente!",
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
                                    swal("", "Ha ocurrido un error, intenta nuevamente", "error");
                                }
                            }

                        });
                    }
                });

            });
        }, Eventopdf: function(){
            
             $('.pdf').off('click').on('click', function () {
                 var id = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('#entrada').text();
                 var fecha = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('#fecha').text();
                 var proveedor = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('#proveedor').text();
                 var idproveedor = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('#idproveedor').text();
                 var tipo = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('#tipo').text();
                 var encargado = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('#encargado').text();
                 var identrada = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('#identrada').text();
                 var totalsiniva = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('.totales').text();
                 var iva = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('.ivatotales').text();
                 var totalconiva = $(this).parents('.modal-dialog').find('.modal-content').find('.modal-body').find('.totalesreales').text();
                 
                  window.open('../Pdf/Entrada.php?id='+id+'&&fecha='+fecha+'&&identrada='+identrada+'&&proveedor='+proveedor+'&&idproveedor='+idproveedor+'&&tipo='+tipo+'&&encargado='+encargado+'&&totalsiniva='+totalsiniva+'&&iva='+iva+'&&totalconiva='+totalconiva+'', "nuevo", "directories=no, location=center, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
             });
        }

    }

</script>
