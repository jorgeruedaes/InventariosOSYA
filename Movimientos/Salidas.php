
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

                    <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/jquery.js"></script>
                    <!-- DataTables -->
                    <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
                    <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>

                    <script src="../bootstrap/js/bootstrap.min.js"></script>
                    <link rel="stylesheet" href="../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
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
                                    <?php include('../Encabezado.php'); ?>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">

                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <h2 style="color:#27AE60;">Nueva Salida</h2><hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                              
                                                <div class="col-md-2 col-md-offset-2" >   
                                                    <label>Tipo:</label>
                                                    <select class="form-control tipoentrada" required="required" name="proveedor">
                                                        <option value="" selected></option>
                                                        <option value="Remision">Remision</option>
                                                        <option value="Devolucion">Devolución</option>
                                                    </select>
                                                </div>
                                              
                                                <div class="col-md-1 facturas">      
                                                    <label>Factura:</label>
                                                    <input type="text" class="form-control factura" name="codigobarras">
                                                </div>
                                                 <div class="col-md-2 botonderemision" style="display:none ;  margin-top: 27px;">
                                                <button type="button" class="btn btn-default botonremision" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                               </button>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-md-offset-2"> 
                                                    <label>Cliente:</label>
                                                    <input type="text" class="form-control proveedor" disabled="disabled" name="nombre1" required>
                                                </div>
                                                <div class="col-md-2 "> 
                                                    <label>Nit:</label>
                                                    <input type="text" class="form-control nit" disabled="disabled" name="codigobarras">
                                                </div>
                                                <div class="col-md-2 " style="margin-top: 2%;">      
                                                    <button type="button" class="btn btn-info seleccionar">Seleccionar</button>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <br>
                                                        <hr>
                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8 col-md-offset-8">
                                                                    <button type="button" class="btn btn-default agregarproducto">Agregar producto</button>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8 col-md-offset-8">
                                                                    <br>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8 col-md-offset-2">
                                                                    <table class="table table-bordered tablaproductos" style="  font-size: 13px;">
                                                                        <thead style=" background-color: rgb(242, 241, 239);">
                                                                            <tr>
                                                                                <th width="13%">Código</th>
                                                                                <th width="20%">Nombre</th>
                                                                                <th width="12%">Cantidad</th>
                                                                                <th width="10%">Valor</th>
                                                                                <th width="17%">Total</th>
                                                                                <th  width="10%">Opciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
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
                                                                    <br>
                                                                        <hr>
                                                                            </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-md-offset-7">
                                                                                    <br>
                                                                                        <label  class="col-md-3  ">Total:</label>
                                                                                        <label class="col-md-4  totales">$ 0</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-md-offset-7">
                                                                                    <label  class="col-md-3 ">Iva:</label>
                                                                                    <label class="col-md-4 ivatotales">$ 0</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-md-offset-7">
                                                                                    <label  class="col-md-3 ">Total:</label>
                                                                                    <label class="col-md-4  totalesreales">$ 0</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-8 col-md-offset-2 text-right"> 
                                                                                    <button type="button" class="btn btn-info guardar">Guardar</button>
                                                                                </div>
                                                                            </div>

                                                                            </div>
                                                                            </div>
                                                                            </div>

                                                                            <br><br><br>
                                                                                        <!--Modal de seleccionar el proveedor-->
                                                                                        <!--Modal de seleccionar el proveedor-->
                                                                                        <!--Modal de seleccionar el proveedor-->
                                                                                        <div class="modal fade" id="myModal" tabindex="-1"role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-lg">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                                        <h4 class="modal-title" id="myModalLabel">Selecionar cliente</h4>

                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12">

                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-5 col-md-offset-1">
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-5 col-md-offset-1">
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-7 col-md-offset-2">
                                                                                                                        <table id="tablaproveedores" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                                                                            <thead>
                                                                                                                                <tr>

                                                                                                                                    <th>Nit</th>
                                                                                                                                    <th>Cliente</th>

                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody>

                                                                                                                                <?php
                                                                                                                                $consulta = mysql_query("SELECT * FROM tb_usuarios WHERE estado='Activo' and tipo='Cliente' ");
                                                                                                                                while ($listajugadores = mysql_fetch_array($consulta)) {
                                                                                                                                    $producto = $listajugadores["cc"];
                                                                                                                                    ?>
                                                                                                                                    <tr class="defaultcaja" data-id="$producto">
                                                                                                                                        <th scope="row" class="seleccionarnit"><?php echo $listajugadores["cc"] ?></th> 
                                                                                                                                        <td class="seleccionarnombre"><?php echo $listajugadores["nombre"]; ?></td>
                                                                                                                                    </tr>

                                                                                                                                    <?php
                                                                                                                                }
                                                                                                                                ?>

                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Modal de seleccionar el productos-->
                                                                                        <!--Modal de seleccionar el productos-->
                                                                                        <!--Modal de seleccionar el productos-->
                                                                                        <div class="modal fade" id="myModal1" tabindex="-1"role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-lg">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                                        <h4 class="modal-title" id="myModalLabel">Selecionar producto</h4>

                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12">

                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-5 col-md-offset-1">
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-5 col-md-offset-1">
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-7 col-md-offset-2">
                                                                                                                        <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th>Codigo</th>
                                                                                                                                    <th>Nombre</th>
                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody>

                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <link rel="stylesheet" href="../datepicker/css/datepicker.css"/>
                                                                                        <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script>
                                                                                        <script src="../datepicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
                                                                                        <script>

                                                                                            var Creador = '<?php echo $_SESSION['identificacion']; ?>'  // creador del producto o quien lo agrega
                                                                                            var Prueba=true;
                                                                                            var pruebafactura=false;
                                                                                               var Salida = {
                                                                                                Inicio: function () {
                                                                                                    Salida.EventoSeleccionarProvedoor();
                                                                                                    Salida.EventoAgregarProducto();
                                                                                                    Salida.EventoTablas();
                                                                                                    Salida.EventoDate();
                                                                                                    Salida.EventoParaTipoDeSalida();
                                                                                                    Salida.EnviarDatos();
                                                                                                    Salida.EventosProbarFactura();
                                                                                                    Salida.EventosProbarDe();
                                                                                                    $('.facturas').css({display: "none"});
                                                                                                },
                                                                                                EventoSeleccionarProvedoor: function () {
                                                                                                    $('.seleccionar').off('click').on('click', function () {
                                                                                                        $('#myModal').modal('show');
                                                                                                        Salida.EventoAgregarProveedor();
                                                                                                    });

                                                                                                },
                                                                                                EventoTablas: function () {
                                                                                                    $('#tablaproveedores').DataTable({
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

                                                                                                }, EventoTablaProductos: function () {
                                                                                                    $('#tabla').DataTable({
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
                                                                                                },
                                                                                                EventoAgregarProveedor: function () {
                                                                                                    $('.defaultcaja').off('click').on('click', function () {
                                                                                                        var nit = $(this).children('.seleccionarnit').text();
                                                                                                        var nombre = $(this).children('.seleccionarnombre').text();
                                                                                                        $('.proveedor').val(nombre);
                                                                                                        var producto = $('.nit').val(nit);
                                                                                                        $('#myModal').modal('hide');
                                                                                                        $.ajax({
                                                                                                            url: 'PeticionesMovimientos.php',
                                                                                                            type: 'POST',
                                                                                                            async: true,
                                                                                                            data: {
                                                                                                                Bandera: "TraerTodosProductos",
                                                                                                                id: nit
                                                                                                            },
                                                                                                            success: function (resp) {
                                                                                                                var resp = $.parseJSON(resp);
                                                                                                                if (resp.Salida === true && resp.Mensaje === true) {
                                                                                                                    $('#tabla tbody').html('');
                                                                                                                    $.each(resp.Productos, function (i, item) {
                                                                                                                        var nombre = item.nombre;
                                                                                                                        var nit = item.id;
                                                                                                                        var valor = item.valor;
                                                                                                                        $('#tabla tbody').append('<tr class="caja" ><td scope="row" class="seleccionarnit">' + nit + '</td><td class="seleccionarnombre">' + nombre + '</td><input type="hidden" value="' + valor + '" class="valor"/></tr>');
                                                                                                                    });
                                                                                                                    Salida.EventoTablaProductos();
                                                                                                                } else {
                                                                                                                    swal("", "Ha habido un error,intenta nuevamente", "error");
                                                                                                                }
                                                                                                            }

                                                                                                        });

                                                                                                    });
                                                                                                },
                                                                                                EventoAgregarProducto: function () {
                                                                                                    $('.agregarproducto').off('click').on('click', function () {
                                                                                                        if (Salida.ValidarProveedor()) {
                                                                                                            $('#myModal1').modal('show');
                                                                                                            Salida.EventoAgregarProductos();
                                                                                                            
                                                                                                        }
                                                                                                    });
                                                                                                },
                                                                                                ValidarProveedor: function () {
                                                                                                    if (/\w/gi.test($('.proveedor').val())) {
                                                                                                        return true;
                                                                                                    } else {
                                                                                                        swal("", "Debes seleccionar un cliente primero", "error");
                                                                                                        return false;
                                                                                                    }
                                                                                                },
                                                                                                EventoAgregarProductos: function () {
                                                                                                    $('.caja').off('click').on('click', function () {

                                                                                                        var nit = $(this).children('.seleccionarnit').text();
                                                                                                        if (Salida.ValidarExisteciadeproductoenLista(nit)) {
                                                                                                            $('#myModal1').modal('hide');
                                                                                                            $('.tablaproductos tbody').append('<tr class="cajaproductos" ><td scope="row" style="  padding-top: 16px;" class="nit">' + $(this).children('.seleccionarnit').text() + '</td><td style="  padding-top: 16px;" class="nombre">' + $(this).children('.seleccionarnombre').text() + '</td><td><input  type="text" class="form-control  cantidad" ></td><td scope="row" style="  padding-top: 16px;" class="valor">' + $(this).children('input').val() + '</td><td><input type="text" class="form-control total" value="0" style="  text-align: end;" disabled="disabled"></td><td><center><div class="btn-group"><button type="button" title="Eliminar producto" class="btn btn-default eliminarproducto" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div></center></td></tr>');
                                                                                                            
                                                                                                                Salida.ProbarCantidades();
                                                                                                        } else {
                                                                                                            swal("Importante!", "El producto que intentas ingresar ya esta en la lista, selecciona uno diferente porfavor", "error");
                                                                                                        }
                                                                                                        $('.eliminarproducto').off('click').on('click', function () {
                                                                                                            $(this).parent().parent().parent().parent().remove();
                                                                                                            Salida.CargarTotales();
                                                                                                            Salida.ProbarCantidades();
                                                                                                        });
                                                                                                    });
                                                                                                },
                                                                                                ValidarExisteciadeproductoenLista: function (producto) {
                                                                                                    var valor = true;
                                                                                                    $('.cajaproductos').each(function () {
                                                                                                        if ($(this).children('.nit').text() === producto) {
                                                                                                            valor = false;
                                                                                                        }
                                                                                                    });
                                                                                                    if (!valor) {
                                                                                                        return false;
                                                                                                    } else {
                                                                                                        return true;
                                                                                                    }
                                                                                                },
                                                                                                
                                                                                                CargarTotales: function () {
                                                                                                    var totales = 0;
                                                                                                    var totaliva = 0;
                                                                                                    var totalreal = 0;
                                                                                                    $('.cajaproductos').each(function () {
                                                                                                        var total = $(this).children().children('.total').val();
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
                                                                                                EventoDate: function () {
                                                                                                    $("#dp").datepicker({
                                                                                                        format: "yyyy-mm-dd",
                                                                                                        language: "es",
                                                                                                        autoclose: true

                                                                                                    });
                                                                                                    $("#dp").datepicker().on('changeDate', function (ev)
                                                                                                    {
                                                                                                        fdp2 = new Date(ev.date);
                                                                                                        $('#fechainicio').text($('#dp').data('date'));
                                                                                                        $('#dp').datepicker('hide');
                                                                                                    });
                                                                                                },
                                                                                               EventoParaTipoDeSalida: function () {
                                                                                                    $('.tipoentrada').off('change').on('change', function () {
                                                                                                        if ($(this).val() !== "") {
                                                                                                            $('.facturas').css({display: ""});
                                                                                                            $('.facturas').children().first().text($(this).val() + ':');
                                                                                                             if ($(this).val() !== "Remision") {
                                                                                                                  $('.botonderemision').css({display: ""});
                                                                                                                  $('.seleccionar').css({display: "none"});
                                                                                                             }else{
                                                                                                                  $('.seleccionar').css({display: ""});
                                                                                                            $('.botonderemision').css({display: "none"});
                                                                                                             }
                                                                                                             } else {
                                                                                                            $('.facturas').css({display: "none"});
                                                                                                            $('.botonderemision').css({display: "none"});
                                                                                                            
                                                                                                        }


                                                                                                    });
                                                                                                },
                                                                                                ValidacionGeneral: function () {
                                                                                                    if($('.factura').val()!== "" && /[0-9]{1,9}(\.[0-9]{0,10})?$/.test($('.factura').val())){
                                                                                                        if ($('.tipoentrada').val() !== "") {
                                                                                                            if ($('.nit').val() !== "") {
                                                                                                                if ($('.tablaproductos tbody tr').size() > 0) {
                                                                                                                    var valor = true;
                                                                                                                    $('.tablaproductos tbody tr').each(function () {
                                                                                                                        $(this).children().children('.cantidad').val();
                                                                                                                        if ($(this).children().children('.cantidad').val() <= 0 && !/[0-9]{1,9}(\.[0-9]{0,10})?$/.test($(this).children().children('.cantidad').val())) {
                                                                                                                            valor = false;
                                                                                                                            swal("", "Un valor ingresado en el campo de cantidad no es valido,intenta nuevamente.", "error");
                                                                                                                        }
                                                                                                                    });
                                                                                                                    return valor;
                                                                                                                } else {
                                                                                                                    swal("", "Debes agregar al menos un producto para que pueda ser guardado la salida.", "error");
                                                                                                                    return false;
                                                                                                                }
                                                                                                            } else {
                                                                                                                swal("", "Debes seleccionar un cliente para la salida", "error");
                                                                                                                return false;
                                                                                                            }
                                                                                                        } else {
                                                                                                            $('.tipoentrada').focus();
                                                                                                            swal("", "Debes seleccionar tipo  para la salida", "error");
                                                                                                            return false;
                                                                                                        }
                                                                                                    
                                                                                                }else{
                                                                                                     $('.factura').focus();
                                                                                                        swal("", "Debes ingresar una remision de salida", "error");
                                                                                                        return false;
                                                                                                }
                                                                                                },
                                                                                                EnviarDatos: function () {
                                                                                                    $('.guardar').off('click').on('click', function () {
                                                                                                        if($('tipoentrada').val()=="Remision"){
                                                                                                              Salida.ValidacionFinalSalidasCantidades();
                                                                                                        }else{
                                                                                                        Salida.ValidarCantidadesDeEntradaDevolucion();
                                                                                                            
                                                                                                        }
                                                                                                      
                                                                                                        
                                                                                                        
                                                                                                        if (Salida.ValidacionGeneral()) {
                                                                                                            if(Prueba){
                                                                                                                if(pruebafactura){
                                                                                                            $.ajax({
                                                                                                                url: 'PeticionesMovimientos.php',
                                                                                                                type: 'POST',
                                                                                                                data: {
                                                                                                                    Bandera: "AgregarSalida",
                                                                                                                    datos: JSON.stringify(Salida.TomarDatos()),
                                                                                                                    creador: Creador

                                                                                                                },
                                                                                                                success: function (resp) {

                                                                                                                    var resp = $.parseJSON(resp);
                                                                                                                    if (resp.Salida === true && resp.Mensaje === true) {
                                                                                                                           swal({title: "",
                                                                                                                            text: "La salida se ha realizado exitosamente!",
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
                                                                                                                        swal("Importante!", "Se ha producido un error al intentar guardar la salida, intenta nuevamente.", "error");
                                                                                                                    }
                                                                                                                }
                                                                                                            });
                                                                                                        }else{
                                                                                                               swal("Importante!", "En numero de la factura no es valido.", "error");
                                                                                                        }
                                                                                                        }else{
                                                                                                             swal("Importante!", "Alguna cantidad de un producto de los que estan incluidos en la salida no tiene un valor valido.", "error");
                                                                                                        }
                                                                                                        }
                                                                                                    });

                                                                                                },
                                                                                                TomarDatos: function () {
                                                                                                       var date = new Date();
                                                                                                    var fecha = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
                                                                                                    var Salida = new Object();

                                                                                                    var productos = new Array();
                                                                                                    Salida.proveedor = $('.nit').val();
                                                                                                    Salida.factura = $('.factura').val();
                                                                                                    Salida.tipo = $('.tipoentrada').val();
                                                                                                    Salida.fecha =fecha ;
                                                                                                    $('.tablaproductos tbody tr').each(function () {
                                                                                                        var unidad = new Object();
                                                                                                        unidad.id = $(this).children('.nit').text();
                                                                                                        unidad.cantidad = $(this).children().children('.cantidad').val();
                                                                                                        productos.push(unidad);
                                                                                                    });
                                                                                                    Salida.productos = productos;
                                                                                                    return Salida;
                                                                                                },
                                                                                                EventosProbarFactura: function () {
                                                                                               
                                                                                                  
                                                                                                },
                                                                                                ProbarCantidades:function(){
                                                                                                    $('.cantidad').off('keyup').on('keyup',function(){
                                                                                                       var valores =$(this).val();
                                                                                                       var productos = $(this).parent().parent().children('.nit').text();
                                                                                                       
                                                                                                          var cantidad = $(this).val();
                                                                                                        var valor = $(this).parent().parent().children('.valor').text();
                                                                                                        var numero = cantidad * valor;
                                                                                                        $(this).parent().parent().children().children('.total').val(numero);
                                                                                                        Salida.CargarTotales();
                                                                                                  if($('.tipoentrada').val()==="Remision"){      
                                                                                                    $.ajax({
                                                                                                        url: 'PeticionesMovimientos.php',
                                                                                                        type: 'POST',
                                                                                                        async:false,
                                                                                                        data: {
                                                                                                            Bandera: "PruebaCantidades",
                                                                                                            id: productos,
                                                                                                            cantidad:valores,
                                                                                                           
                                                                                                        },
                                                                                                        success: function (resp) {

                                                                                                            var resp = $.parseJSON(resp);
                                                                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                                              
                                                                                                            } else {
                                                                                                            
                                                                                                                swal("Importante!", "La cantidad en stock del producto es menor a la ingresada. En el stock hay  "+resp.Numero+" unidades. ", "error");
                                                                                                            }
                                                                                                        }
                                                                                                    });
                                                                                                }else{
                                                                                                          $.ajax({
                                                                                                        url: 'PeticionesMovimientos.php',
                                                                                                        type: 'POST',
                                                                                                        async:false,
                                                                                                        data: {
                                                                                                            Bandera: "PruebaCantidadesEntrada",
                                                                                                            id: productos,
                                                                                                            cantidad:valores,
                                                                                                            salida:$('.factura').val()
                                                                                                        },
                                                                                                        success: function (resp) {

                                                                                                            var resp = $.parseJSON(resp);
                                                                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                                              
                                                                                                            } else {
                                                                                                            
                                                                                                                swal("Importante!", "La cantidad que intenta entrar con corresponde a la entrada, en esta  solo hay :  "+resp.Numero+" unidades. ", "error");
                                                                                                            }
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                                    });
                                                                                                    
                                                                                                },
                                                                                                HallarFecha:function(){
                                                                                                    var date = new Date();
                                                                                                    return date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate();
                                                                                                },
                                                                                                ValidacionFinalSalidasCantidades:function(){
                                                                                                    $('.tablaproductos tbody tr').each(function () {
                                                                                                     var  productos= $(this).children('.nit').text();
                                                                                                     var valores =$(this).children().children('.cantidad').val();
                                                                                                          $.ajax({
                                                                                                        url: 'PeticionesMovimientos.php',
                                                                                                        type: 'POST',
                                                                                                    async:false,
                                                                                                        data: {
                                                                                                            Bandera: "PruebaCantidades",
                                                                                                            id: productos,
                                                                                                            cantidad:valores,
                                                                                                            
                                                                                                        },
                                                                                                        success: function (resp) {

                                                                                                            var resp = $.parseJSON(resp);
                                                                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                                                      
                                                                                                      
                                                                                                            } else {
                                                                                                             Prueba=false;
                                                                                                            }
                                                                                                        }
                                                                                                    });
                                                                                                    });
                                                                                                },
                                                                                                 EventosProbarDe: function () {
                                                                                                    $('.botonremision').off('click').on('click', function () {
                                                                                                            $.ajax({
                                                                                                                url: 'PeticionesMovimientos.php',
                                                                                                                type: 'POST',
                                                                                                                data: {
                                                                                                                    Bandera: "PruebaExistenciaF",
                                                                                                                    id: $('.factura').val(),
                                                                                                                },
                                                                                                                success: function (resp) {

                                                                                                                    var resp = $.parseJSON(resp);
                                                                                                                    if (resp.Salida === true && resp.Mensaje === true) {
                                                                                                                        $('.proveedor').val(resp.Nombre);
                                                                                                                        $('.nit').val(resp.Nit);
                                                                                                                        Salida.EventoAgregarProductosdelProveedor();
                                                                                                                    } else {
                                                                                                                        swal("Importante!", "La factura que has introducido no existe.", "warning");
                                                                                                                    }
                                                                                                                }
                                                                                                            });
                                                                                                        
                                                                                                    });

                                                                                                },
                                                                                                EventoAgregarProductosdelProveedor: function () {    
                                                                                                        var nit = $('.factura').val();
                                                                                                        $.ajax({
                                                                                                            url: 'PeticionesMovimientos.php',
                                                                                                            type: 'POST',
                                                                                                            data: {
                                                                                                                Bandera: "TraerProductosPorEntrada",
                                                                                                                id: nit
                                                                                                            },
                                                                                                            success: function (resp) {
                                                                                                                var resp = $.parseJSON(resp);
                                                                                                                if (resp.Salida === true && resp.Mensaje === true) {
                                                                                                                    $('#tabla tbody').html('');
                                                                                                                    $.each(resp.Productos, function (i, item) {
                                                                                                                        var nombre = item.nombre;
                                                                                                                        var nit = item.id;
                                                                                                                        var valor = item.valor;
                                                                                                                        var cantidad = item.cantidad;
                                                                                                                        $('#tabla tbody').append('<tr class="caja" ><td scope="row" class="seleccionarnit">' + nit + '</td><td class="seleccionarnombre">' + nombre + '</td><input type="hidden" value="' + valor + '" class="valor"/></tr>');
                                                                                                                    });
                                                                                                                    Salida.EventoTablaProductos();
                                                                                                                    Salida.EventoAgregarProductos();
                                                                                                                } else {
                                                                                                                    swal("", "Ha habido un error,intenta nuevamente", "error");
                                                                                                                }
                                                                                                            }

                                                                                                        });

                                                                                                 
                                                                                                },
                                                                                                ValidarCantidadesDeEntradaDevolucion:function(){                                                                                    
                                                                                                    Prueba=true;
                                                                                                  $('.tablaproductos tbody tr').each(function () {
                                                                                                     var  productos= $(this).children('.nit').text();
                                                                                                     var valores =$(this).children().children('.cantidad').val();
                                                                                                          $.ajax({
                                                                                                        url: 'PeticionesMovimientos.php',
                                                                                                        type: 'POST',
                                                                                                    async:false,
                                                                                                        data: {
                                                                                                            Bandera: "PruebaCantidadesEntrada",
                                                                                                            id: productos,
                                                                                                            cantidad:valores,
                                                                                                            salida:$('.factura').val()
                                                                                                        },
                                                                                                        success: function (resp) {

                                                                                                            var resp = $.parseJSON(resp);
                                                                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                                                      
                                                                                                      
                                                                                                            } else {
                                                                                                             Prueba=false;
                                                                                                            }
                                                                                                        }
                                                                                                    });
                                                                                                    });
                                                                                            
                                                                                                }
                                                                                            };
                                                                                            $(document).ready(function () {

                                                                                                Salida.Inicio();

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
