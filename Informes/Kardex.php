
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

                                margin: 0 auto;
                            }

                        </style>
                        <body>


                            <?php include('../Encabezado.php'); ?>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <h2 style="color:#27AE60;">Generador de Kardex</h2><hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-2"> 
                                            <label>Tipo:</label>
                                            <select class="form-control tipo" required="required" name="proveedor">
                                                <option value="" selected></option>
                                                <option value="Producto" >Producto</option>
                                                <option value="Proveedor" >Proveedor</option>
                                                <option value="Cliente" >Cliente</option>
                                                <option value="Total" >Total</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 rango"> 
                                            <label>Con rango de fechas:</label>
                                            <select class="form-control pruebafecha" required="required" name="proveedor">
                                                <option value="Si" >Si</option>
                                                <option value="No" selected>No</option>

                                            </select>
                                        </div>
                                        <div class="col-md-2 fechainicialmostrar" style="display:none"> 
                                            <label>Fecha inicial:</label>
                                            <div class="controls">
                                                <div data-date="" class="input-append date datepicker fecha" id="dp" style="padding-left:0px">
                                                    <input type="text" format="AAAA-MM-DD" class="span4 form-control fecha" value="" name="fecha" id="fechaInicio" required="required"/>	
                                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-2 fechafinalmostrar "style="display:none"> 
                                            <label>Fecha final:</label>
                                            <div class="controls">
                                                <div data-date="" class="input-append date datepicker fecha" id="dp1" style="padding-left:0px">
                                                    <input type="text" format="AAAA-MM-DD" class="span4 form-control fecha" value="" name="fecha" id="fechaIfinal" required="required"/>	
                                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
                                            </div>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-8">
                                            <button class="btn btn-info agregar" style="display:none" >Agregar</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <label class="mensaje" style="display:none" >Productos para reporte:</label>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-2">
                                            <div class="col-md-4">

                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2 secciontabla" style="display:none">
                                                <table class="table table-bordered tablaproductos" style="  font-size: 13px;">
                                                    <thead style=" background-color: rgb(242, 241, 239);">
                                                        <tr>
                                                            <th width="13%">Código</th>
                                                            <th >Nombre</th>

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
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2 text-right"> 
                                                <button name="enviar" class="btn btn-success generar">Generar</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br><br><br>
                                        <link rel="stylesheet" href="../datepicker/css/datepicker.css"/>
                                        <script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script>
                                        <script src="../datepicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>





                                        <!--                                            //modal seleccion de cosas-->
                                        <!--                                            //modal seleccion de cosas-->
                                        <!--                                            //modal seleccion de cosas-->

                                        <div class="modal fade" id="myModal" tabindex="-1" data-jugador="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Agregar  un item</h4>

                                                    </div>
                                                    <div class="modal-body">  



                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" id="identificador"/>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <script>


                                            var Creador = '<?php echo $_SESSION['identificacion']; ?>'  // creador del producto o quien lo agrega
                                            var Kardex = {
                                                Inicio: function () {
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
                                                    $("#dp1").datepicker({
                                                        format: "yyyy-mm-dd",
                                                        language: "es",
                                                        autoclose: true

                                                    });
                                                    $("#dp1").datepicker().on('changeDate', function (ev)
                                                    {
                                                        fdp2 = new Date(ev.date);
                                                        $('#fechafinal').text($('#dp1').data('date'));
                                                        $('#dp1').datepicker('hide');
                                                    });
                                                    Kardex.RecargarEventos();


                                                    //PARA QUITAR


                                                },
                                                RecargarEventos: function () {
                                                    Kardex.EventoCambioTipo();
                                                    Kardex.EventoCambioUsarFechas();
                                                    Kardex.AgregarTabla();
                                                    Kardex.GenerarKardex();
                                                },
                                                EventoCambioTipo: function () {
                                                    $('.tipo').off('change').on('change', function () {
                                                        var valor = $(this).val();
                                                        if (valor === "Producto") {
                                                            $('.secciontabla tbody').html('');
                                                            $('.agregar').css({display: ""});
                                                            $('.agregar').text('Agregar Productos');
                                                            $('.mensaje').css({display: ""});
                                                            $('.mensaje').text('Productos Agregados');
                                                            $('.rango').css({display: ""});
                                                            $('.fechainicialmostrar').css({display: "none"});
                                                            $('.fechafinalmostrar').css({display: "none"});
                                                            $('.secciontabla').css({display: ""});
                                                        } else if (valor === "Proveedor") {
                                                            $('.secciontabla tbody').html('');
                                                            $('.agregar').css({display: ""});
                                                            $('.agregar').text('Agregar Proveedores');
                                                            $('.mensaje').css({display: ""});
                                                            $('.mensaje').text('Proveedores Agregados');
                                                            $('.rango').css({display: ""});
                                                            $('.fechainicialmostrar').css({display: "none"});
                                                            $('.fechafinalmostrar').css({display: "none"});
                                                            $('.secciontabla').css({display: ""});
                                                        } else if (valor === "Cliente") {
                                                            $('.secciontabla tbody').html('');
                                                            $('.agregar').css({display: ""});
                                                            $('.agregar').text('Agregar Clientes');
                                                            $('.mensaje').css({display: ""});
                                                            $('.mensaje').text('Clientes Agregados');
                                                            $('.rango').css({display: ""});
                                                            $('.fechainicialmostrar').css({display: "none"});
                                                            $('.fechafinalmostrar').css({display: "none"});
                                                            $('.secciontabla').css({display: ""});
                                                        } else if (valor === "") {
                                                            $('.rango').css({display: ""});
                                                            $('.agregar').css({display: "none"});
                                                            $('.mensaje').css({display: "none"});
                                                            $('.fechainicialmostrar').css({display: "none"});
                                                            $('.fechafinalmostrar').css({display: "none"});
                                                            $('.secciontabla').css({display: "none"});

                                                        } else {
                                                            $('.secciontabla tbody').html('');
                                                            $('.agregar').css({display: "none"});
                                                            $('.mensaje').css({display: "none"});
                                                            $('.rango').css({display: "none"});
                                                            $('.fechainicialmostrar').css({display: "none"});
                                                            $('.fechafinalmostrar').css({display: "none"});
                                                            $('.secciontabla').css({display: "none"});
                                                            Kardex.CargasCasoTodos();
                                                        }
                                                        Kardex.AgregarTabla();

                                                    });

                                                },
                                                CargarArticulos: function () {
                                                    $('.modal').modal('show');
                                                    $.ajax({
                                                        url: 'PeticionesKardex.php',
                                                        type: 'POST',
                                                        data: {
                                                            Bandera: "TraerTodosProductos",
                                                        },
                                                        success: function (resp) {
                                                            var resp = $.parseJSON(resp);
                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                $('#myModal').children().children('.modal-content').children('.modal-body').html('');
                                                                $('#myModal').children().children('.modal-content').children('.modal-body').html('<div class="row"> <div class="col-md-7 col-md-offset-2"><table id="productos" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Codigo</th><th>Nombre</th></tr></thead><tbody></tbody></table></div></div>');

                                                                $.each(resp.Productos, function (i, item) {
                                                                    var nombre = item.nombre;
                                                                    var nit = item.id;
                                                                    $('#productos tbody').append('<tr class="caja" ><td scope="row" class="seleccionarnit">' + nit + '</td><td scope="row" class="seleccionarnombre">' + nombre + '</td></tr>');
                                                                });
                                                                Kardex.EventoTablaProductos();
                                                                Kardex.AgregarElemento();
                                                            } else {
                                                                swal("", "Ha habido un error,intenta nuevamente", "error");
                                                            }
                                                        }

                                                    });

                                                },
                                                CargarProveedores: function () {
                                                    $('.modal').modal('show');
                                                    $.ajax({
                                                        url: 'PeticionesKardex.php',
                                                        type: 'POST',
                                                        data: {
                                                            Bandera: "TraerTodosProveedores",
                                                        },
                                                        success: function (resp) {
                                                            var resp = $.parseJSON(resp);
                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                $('#myModal').children().children('.modal-content').children('.modal-body').html('<div class="row"> <div class="col-md-7 col-md-offset-2"><table id="proveedores" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Codigo</th><th>Nombre</th></tr></thead><tbody></tbody></table></div></div>');

                                                                $.each(resp.Productos, function (i, item) {
                                                                    var nombre = item.nombre;
                                                                    var nit = item.id;
                                                                    $('#proveedores tbody').append('<tr class="caja" ><td scope="row" class="seleccionarnit">' + nit + '</td><td scope="row" class="seleccionarnombre">' + nombre + '</td></tr>');
                                                                });
                                                                Kardex.EventoTablaProveedores();
                                                                Kardex.AgregarElemento();
                                                            } else {
                                                                swal("", "Ha habido un error,intenta nuevamente", "error");
                                                            }
                                                        }

                                                    });

                                                },
                                                CargarClientes: function () {
                                                    $('.modal').modal('show');
                                                    $.ajax({
                                                        url: 'PeticionesKardex.php',
                                                        type: 'POST',
                                                        data: {
                                                            Bandera: "TraerTodoClientes",
                                                        },
                                                        success: function (resp) {
                                                            var resp = $.parseJSON(resp);
                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                                $('#myModal').children().children('.modal-content').children('.modal-body').html('<div class="row"> <div class="col-md-7 col-md-offset-2"><table id="clientes" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Codigo</th><th>Nombre</th></tr></thead><tbody></tbody></table></div></div>');

                                                                $.each(resp.Productos, function (i, item) {
                                                                    var nombre = item.nombre;
                                                                    var nit = item.id;
                                                                    $('#clientes tbody').append('<tr class="caja" ><td scope="row" class="seleccionarnit">' + nit + '</td><td scope="row" class="seleccionarnombre">' + nombre + '</td></tr>');
                                                                });
                                                                Kardex.EventoTablaClientes();
                                                                Kardex.AgregarElemento();
                                                            } else {
                                                                swal("", "Ha habido un error,intenta nuevamente", "error");
                                                            }
                                                        }

                                                    });

                                                },
                                                EventoCambioUsarFechas: function () {
                                                    $('.pruebafecha').off('change').on('change', function () {
                                                        if ($('.pruebafecha').val() === "Si") {
                                                            $('.fechainicialmostrar').css({display: ""});
                                                            $('.fechafinalmostrar').css({display: ""});
                                                        } else {
                                                            $('.fechainicialmostrar').css({display: "none"});
                                                            $('.fechafinalmostrar').css({display: "none"});
                                                        }
                                                    });
                                                },
                                                AgregarTabla: function () {
                                                    $('.agregar').off('click').on('click', function () {

                                                        $('.modal').children().children().children('.modal-body').html('');
                                                        if ($('.tipo').val() === "Proveedor") {
                                                            Kardex.CargarProveedores();

                                                        } else if ($('.tipo').val() === "Cliente") {
                                                            Kardex.CargarClientes();

                                                        } else if ($('.tipo').val() === "Producto") {
                                                            Kardex.CargarArticulos();

                                                        }

                                                    });
                                                },
                                                EventoTablaProductos: function () {
                                                    $('#productos').DataTable({
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
                                                EventoTablaProveedores: function () {
                                                    $('#proveedores').DataTable({
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
                                                EventoTablaClientes: function () {
                                                    $('#clientes').DataTable({
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
                                                AgregarElemento: function () {
                                                    $('.caja').off('click').on('click', function () {
                                                        var nit = $(this).children('.seleccionarnit').text();
                                                        if (Kardex.ValidarExisteciadeproductoenLista(nit)) {
                                                            $('#myModal').modal('hide');
                                                            $('.secciontabla tbody').append('<tr class="cajaproductos" ><td scope="row" style="  padding-top: 16px;" class="nit">' + $(this).children('.seleccionarnit').text() + '</td><td style="  padding-top: 16px;" class="nombre">' + $(this).children('.seleccionarnombre').text() + '</td><td><center><div class="btn-group"><button type="button" title="Eliminar producto" class="btn btn-default eliminarproducto" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div></center></td></tr>');

                                                        } else {
                                                            swal("Importante!", "El item que intentas ingresar ya esta en la lista, selecciona uno diferente porfavor", "error");
                                                        }
                                                        $('.eliminarproducto').off('click').on('click', function () {
                                                            $(this).parent().parent().parent().parent().remove();
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
                                                GenerarKardex: function () {
                                                    $('.generar').off('click').on('click', function () {
                                                        if (Kardex.ValidacionGeneral()) {
                                                        if ($('.pruebafecha').val() === "No") {
                                                            if ($('.tipo').val() === "Cliente") {
                                                                if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexClientesSinFecha",
                                                                            datos: JSON.stringify(Kardex.TomarDatosNO()),
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de clientes, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            } else if ($('.tipo').val() === "Proveedor") {
                                                                      if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexProveedorSinFecha",
                                                                            datos: JSON.stringify(Kardex.TomarDatosNO()),
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de proveedores, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            } else if ($('.tipo').val() === "Producto") {
                                                                     if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexProductosSinFecha",
                                                                            datos: JSON.stringify(Kardex.TomarDatosNO()),
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de productos, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            } else if ($('.tipo').val() === "Total") {
                                                                  if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexTotal",
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de productos, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            }
                                                        } else {
                                                              if ($('.tipo').val() === "Cliente") {
                                                                if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexClientesSinFecha",
                                                                            datos: JSON.stringify(Kardex.TomarDatosNO()),
                                                                            fechainicial:$('#fechaInicla').val(),
                                                                            fechafinal:$('#fechaIfinal').val(),
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de clientes, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            } else if ($('.tipo').val() === "Proveedor") {
                                                                      if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexProveedorSinFecha",
                                                                            datos: JSON.stringify(Kardex.TomarDatosNO()),
                                                                            fechainicial:$('#fechaInicla').val(),
                                                                            fechafinal:$('#fechaIfinal').val(),
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de proveedores, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            } else if ($('.tipo').val() === "Producto") {
                                                                     if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexProductosSinFecha",
                                                                            datos: JSON.stringify(Kardex.TomarDatosNO()),
                                                                            fechainicial:$('#fechaInicla').val(),
                                                                            fechafinal:$('#fechaIfinal').val(),
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de productos, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            } else if ($('.tipo').val() === "Total") {
                                                                  if (Kardex.ValidacionGeneral()) {
                                                                    $.ajax({
                                                                        url: 'PeticionesMovimientos.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            Bandera: "KardexTotal",
                                                                            creador: Creador

                                                                        },
                                                                        success: function (resp) {

                                                                            var resp = $.parseJSON(resp);
                                                                            if (resp.Salida === true && resp.Mensaje === true) {

                                                                            } else {
                                                                                swal("", "Se ha producido un error al intentar generar el kardex de productos, intenta nuevamente..", "error");
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            }
                                                           
                                                        }
                                                    } 
                                                    });
                                                }, TomarDatosNO: function () {
                                                    var Entrada = new Object();

                                                    var productos = new Array();
                                                    $('.tablaproductos tbody tr').each(function () {
                                                        var unidad = new Object();
                                                        unidad.id = $(this).children('.nit').text();
                                                        productos.push(unidad);
                                                    });
                                                    Entrada.productos = productos;
                                                    return Entrada;
                                                },
                                                TomarDatosSI: function () {
                                                    var Entrada = new Object();

                                                    var productos = new Array();

                                                    Entrada.fechainical = $('#fechaInicio').val();
                                                    Entrada.fechafinal = $('#fechaIfinal').val();
                                                    $('.tablaproductos tbody tr').each(function () {
                                                        var unidad = new Object();
                                                        unidad.id = $(this).children('.nit').text();
                                                        productos.push(unidad);
                                                    });
                                                    Entrada.productos = productos;
                                                    return Entrada;
                                                },
                                                ValidacionGeneral: function () {
                                                    if ($('.tipo').val() !== "") {
                                                        if ($('.tipo').val() === "Total") {
                                                            return true;
                                                        } else {
                                                              if ($('.pruebafecha').val() === "Si") {
                                                                   if ($('#fechaInicio').val() !== "") {
                                                                       if ($('#fechaIfinal').val() !== "") {
                                                                           return true;
                                                                       }else{
                                                                               swal("", "Debes seleccionar una fecha final.", "error");
                                                                            return false;
                                                                    
                                                                       }
                                                                   }else{
                                                                       swal("", "Debes seleccionar una fecha Iniclal.", "error");
                                                                       return false;
                                                                        
                                                                   }
                                                        }else{
                                                          return true;
                                                        }
                                                    }
                                                    } else {
                                                        swal("", "Debes seleccionar un tipo de items para generar el kardex.", "error");
                                                        return false;
                                                    }
                                                }
                                            
                                            };
                                            $(document).ready(function () {

                                                Kardex.Inicio();

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
                                                    <button type="button" class="btn btn-success"><a href="../index.php" style="color: white">Volver</a></button></center>
                                                    <?php
                                                }
                                                ?>




                                            </body>
                                            </html>
