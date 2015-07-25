
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

                            <div class="contenido">
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
                            <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>

                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form > 
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Nombre:</label>
                                                <input type="text" class="form-control nombre" name="nombre1" required  id="nombre1">
                                            </div>
                                            <div class="col-md-5 "> 
                                                <label>Valor Compra:</label>
                                                <input type="text" class="form-control valor" name="apellido1" required  id="apellido1" >

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label>Estado:</label>
                                                <select class="form-control estado" style=""  name="estado">
                                                    <option value=""></option>
                                                    <option value="Activo" selected>Activo</option>
                                                    <option value="Inactivo">Inactivo</option>

                                                </select>

                                            </div>
                                            <div class="col-md-5 "> 
                                                <label>Descripción:</label>
                                                <textarea class="form-control descripcion" rows="3" style="resize: inherit"></textarea>

                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">


                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="identificador"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success guardar">Guardar cambios</button>
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
                                                },
                                                EventoCambioTipo:function(){
                                                    $('.tipo').off('change').on('change',function(){
                                                       var  valor =$(this).val();
                                                       if(valor==="Producto"){
                                                           $('.agregar').css({display:""});
                                                           $('.agregar').text('Agregar Productos');
                                                           $('.mensaje').css({display:""});
                                                           $('.mensaje').text('Productos Agregados');
                                                           $('.rango').css({display:""});
                                                            $('.fechainicialmostrar').css({display:"none"});
                                                             $('.fechafinalmostrar').css({display:"none"});
                                                             $('.secciontabla').css({display:""});
                                                           Kardex.CargarArticulos();
                                                       }else if(valor==="Proveedor"){
                                                           Kardex.CargarProveedores();
                                                           $('.agregar').css({display:""});
                                                           $('.agregar').text('Agregar Proveedores');
                                                           $('.mensaje').css({display:""});
                                                           $('.mensaje').text('Proveedores Agregados');
                                                           $('.rango').css({display:""});
                                                            $('.fechainicialmostrar').css({display:"none"});
                                                             $('.fechafinalmostrar').css({display:"none"});
                                                               $('.secciontabla').css({display:""});
                                                       }else if(valor==="Cliente"){
                                                            Kardex.CargarArticulos();
                                                            $('.agregar').css({display:""});
                                                           $('.agregar').text('Agregar Clientes');
                                                           $('.mensaje').css({display:""});
                                                           $('.mensaje').text('Clientes Agregados');
                                                           $('.rango').css({display:""});
                                                            $('.fechainicialmostrar').css({display:"none"});
                                                             $('.fechafinalmostrar').css({display:"none"});
                                                               $('.secciontabla').css({display:""});
                                                       } else if(valor===""){
                                                           $('.rango').css({display:""});
                                                           $('.agregar').css({display:"none"});
                                                           $('.mensaje').css({display:"none"});
                                                            $('.fechainicialmostrar').css({display:"none"});
                                                             $('.fechafinalmostrar').css({display:"none"});
                                                               $('.secciontabla').css({display:"none"});
                                                       
                                                       }else{
                                                           $('.agregar').css({display:"none"});
                                                           $('.mensaje').css({display:"none"});
                                                           $('.rango').css({display:"none"});
                                                            $('.fechainicialmostrar').css({display:"none"});
                                                             $('.fechafinalmostrar').css({display:"none"});
                                                               $('.secciontabla').css({display:"none"});
                                                           Kardex.CargasCasoTodos();
                                                       }
                                                    });
                                                },
                                                CargarArticulos:function(){
                                                    
                                                },
                                                CargarProveedores:function(){
                                                    
                                                },
                                                CargarClientes:function(){
                                                    
                                                },
                                                CargasCasoTodos:function(){
                                                    
                                                },
                                                EventoCambioUsarFechas:function(){
                                                     $('.pruebafecha').off('change').on('change',function(){
                                                         if($('.pruebafecha').val()==="Si"){
                                                             $('.fechainicialmostrar').css({display:""});
                                                             $('.fechafinalmostrar').css({display:""});
                                                         }else{
                                                             $('.fechainicialmostrar').css({display:"none"});
                                                             $('.fechafinalmostrar').css({display:"none"});
                                                         }
                                                     });
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
                                                    <button type="button" class="btn btn-success"><a href="index.php" style="color: white">Volver</a></button></center>
                                                    <?php
                                                }
                                                ?>




                                            </body>
                                            </html>
