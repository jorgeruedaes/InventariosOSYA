<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

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
             <link rel="shortcut icon" href="../images/LOGO.png">
            <link rel="stylesheet" href="../css/styler.css" type="text/css" media="all" />
            <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
            <!--<link rel="stylesheet" type="text/css" href="../../DataTables-1.10.7/media/css/jquery.dataTables.css">-->


            <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/jquery.js"></script>
            <!-- DataTables -->
            <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
            <script type="text/javascript" charset="utf8" src="../DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>

            <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
            <link rel="stylesheet" href="../DataTables-1.10.7/media/css/dataTables.bootstrap.css">
            <script src="../bootstrap/js/bootstrap.min.js"></script>
            <!--  ALERTAS-->
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
        </style>
        <body>

            <?php
            $i = 1;
            include('../Encabezado.php');
            ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"><br></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"><br></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tablajugadores" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="6%">Identificación</th>
                                        <th>Nombre</th>
                                        <th width="15%">Tipo</th>
                                        <th width="10%">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $mio = $_SESSION['identificacion'];
                                    $tipousuario = $_SESSION['tipo_usuario'];

                                    $consulta = mysql_query("SELECT * FROM tb_usuarios WHERE estado='Activo' and (tipo='Bodega' or tipo='Administrador') and cc!=$mio ");

                                    while ($listajugadores = mysql_fetch_array($consulta)) {
                                        $producto = $listajugadores["cc"];
                                        ?>
                                        <tr class="default caja">
                                            <th scope="row"><?php echo $listajugadores["cc"] ?></th> 
                                            <?php $nombrecompleto = $listajugadores["nombre"] . " " . $listajugadores["apellido"]; ?>
                                            <td><?php echo utf8_encode($nombrecompleto) ?></td>
                                            <td>
                                                <?php echo $listajugadores["tipo"]; ?>

                                            </td>
                                            <td>
                                                <button type="button" data-id="<?php echo $listajugadores["cc"] ?>" class="btn btn-info desactivar" data-dismiss="modal">Desactivar</button>
                                            </td>

                                        </tr>

                                        <?php
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
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"><br></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"><br></div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"><br></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"><br></div>
                    </div>
                </div></div>

            <!--            MODAL PARA MANEJAR AGREGAR LAS COSAS-->
            <!--            MODAL PARA MANEJAR AGREGAR LAS COSAS-->
            <!--            MODAL PARA MANEJAR AGREGAR LAS COSAS-->

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

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="identificador"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-info guardar">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>

                $(document).ready(function () {
                    editarProductos.inicio();
                });
                var editarProductos = {
                    inicio: function () {
                        $('#tablajugadores').DataTable({
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
                        $('#tablajugadores1').DataTable({
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
                        $('.dataTables_paginate').off('click').on('click', function () {
                            editarProductos.recargarEventos();
                        });
                        editarProductos.recargarEventos();
                    },
                    recargarEventos: function () {
                        editarProductos.EventoDesactivarUsuario();

                    },
                    EventoDesactivarUsuario: function () {
                        $('.desactivar').off('click').on('click', function () {
                            var id = $(this).data('id');
                            swal({title: "",
                                text: "¿El usuario se desactivará, está seguro?",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "rgb(174, 222, 244)",
                                confirmButtonText: "Ok",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                if (isConfirm) {
                                    $.ajax({
                                        url: 'PeticionesUsuarios.php',
                                        type: 'POST',
                                        data: {
                                            Bandera: "DesactivarUsuario",
                                            id: id,
                                        },
                                        success: function (resp) {
                                            var resp = $.parseJSON(resp);
                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                swal({title: "",
                                                    text: "El usuario se ha desactivado exitosamente!",
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
                                                swal("", "Ha ocurrido un error,intenta nuevamente", "error");
                                            }
                                        }

                                    });
                                }
                            });

                        });
                    }
                };


            </script>
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

</body></html>
