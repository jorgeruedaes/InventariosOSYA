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
            <title>Inventarios OSYA</title>
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
            include("../Encabezado.php");
            ?>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="nav nav-tabs" role="tablist" id="principal">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Usuarios Activos</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Usuarios Inactivos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">

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
                                                <th>Identificación</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $consulta = mysql_query("SELECT * FROM tb_usuarios WHERE estado='Activo' and (tipo='Proveedor' or tipo='Cliente')");
                                            while ($listajugadores = mysql_fetch_array($consulta)) {
                                                $usuario = $listajugadores["cc"];
                                                ?>
                                                <tr class="default caja">
                                                    <th scope="row"><?php echo $listajugadores["cc"] ?></th> 
                                                    <td><?php echo $listajugadores["nombre"]; ?></td>
                                                    <td> <?php echo $listajugadores["tipo"]; ?> </td>
                                                    <td>
        <!--                                                <button id="editar" type="button" class="btn btn-success editar" data-id="<?php echo $listajugadores["cc"] ?>" 
                                                                data-toggle="modal" >Editar</button>-->
                                                        <button class="btn btn-default eliminar" data-id="<?php echo $listajugadores["cc"] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2"><br></div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2"><br></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="tablajugadores1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Identificación</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $consulta = mysql_query("SELECT * FROM tb_usuarios WHERE estado='Inactivo' and (tipo='Proveedor' or tipo='Cliente')");
                                            while ($listajugadores = mysql_fetch_array($consulta)) {
                                                $usuario = $listajugadores["cc"];
                                                ?>
                                                <tr class="default caja">
                                                    <th scope="row"><?php echo $listajugadores["cc"] ?></th> 
                                                    <td><?php echo $listajugadores["nombre"]; ?></td>
                                                    <td> <?php echo $listajugadores["tipo"]; ?> </td>
                                                    <td>
        <!--                                                <button id="editar" type="button" class="btn btn-success editar" data-id="<?php echo $listajugadores["cc"] ?>" 
                                                                data-toggle="modal" >Editar</button>-->
                                                        <button class="btn btn-default activar"  data-id="<?php echo $listajugadores["cc"] ?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
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
                        </div>  
                    </div>
                </div>
            </div>


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
                                            <div class="col-md-5 col-md-offset-1"> 
                                                <label>Valor Compra:</label>
                                                <input type="text" class="form-control valor" name="apellido1" required  id="apellido1" >
                                            </div>
                                            <div class="col-md-5 "> 
                                                <label>Estado:</label>
                                                <select class="form-control estado" style=""  name="estado">
                                                    <option value=""></option>
                                                    <option value="Activo" selected>Activo</option>
                                                    <option value="Inactivo">Inactivo</option>

                                                </select>

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
                $(document).ready(function () {
                    editarClientes.inicio();
                });
                var editarClientes = {
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
                            editarClientes.recargarEventos();
                        });
                        editarClientes.recargarEventos();
                    },
                    recargarEventos: function () {
    //                        editarClientes.EventoConsultarDatos();
    //                        editarClientes.EventoEnviarDatos();
                        editarClientes.EventoEliminarUsuario();
                        editarClientes.EventoActivarUsuario();

                    }, EventoConsultarDatos: function () {
                        $('.editar').off('click').on('click', function () {
                            var id = $(this).data('id');
                            $.ajax({
                                url: 'PeticionesProductos.php',
                                type: 'POST',
                                data: {
                                    Bandera: "MostrarProducto",
                                    id: id
                                },
                                success: function (resp) {
                                    $('.modal').modal('show');
                                    var resp = $.parseJSON(resp);
                                    if (resp.Salida === true && resp.Mensaje === true) {
                                        $('.nombre').val(resp.producto.nombre);
                                        $('.valor').val(resp.producto.valor);
                                        $('.descripcion').val(resp.producto.descripcion);
                                        $('.estado  option[value="' + resp.producto.estado + '"]').attr('selected', 'selected');
                                        $('#identificador').val(id);
                                    } else {
                                        swal("", "Ha habido un error, intenta nuevamente", "error");
                                    }
                                }
                            });
                        });
                    },
                    EventoEnviarDatos: function () {
                        $('.guardar').off('click').on('click', function () {
                            if (editarClientes.ValidarInformacion()) {
                                $.ajax({
                                    url: 'PeticionesProductos.php',
                                    type: 'POST',
                                    data: {
                                        Bandera: "EditarProducto",
                                        nombre: $('.nombre').val(),
                                        valor: $('.valor').val(),
                                        descripcion: $('.descripcion').val(),
                                        estado: $('.estado').val(),
                                        id: $('#identificador').val()
                                    },
                                    success: function (resp) {
                                        var resp = $.parseJSON(resp);
                                        if (resp.Salida === true && resp.Mensaje === true) {
                                            swal({title: "",
                                                text: "El producto se ha modificado exitosamente!",
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
                                            $('.modal').modal('hide');
                                        } else {
                                            swal("", "Ha habido un error, intenta nuevamente", "error");
                                        }
                                    }

                                });
                            }
                        });


                    },
                    ValidarInformacion: function () {
                        if (/\w/gi.test($('.nombre').val())) {
                            if (/[0-9]{1,9}(\.[0-9]{0,10})?$/.test($('.valor').val()) && $('.valor').val() > 0) {
                                if (/\w/gi.test($('.estado').val())) {
                                    return true;
                                } else {
                                    $('.estado').focus();
                                    swal("", "Debes seleccionar un estado válido, intenta nuevamente.", "error");
                                    return false;
                                }
                            } else {
                                $('.valor').focus();
                                swal("", "El valor de compra no es válido, intenta nuevamente.", "error");
                                return false;
                            }

                        } else {
                            $('.nombre').focus();
                            swal("", "El producto debe tener un nombre.", "error");
                            return false;
                        }
                    },
                    EventoActivarUsuario: function () {
                        $('.activar').off('click').on('click', function () {
                            var id = $(this).data('id');
                            swal({title: "",
                                text: "¿El usuario se activará, está seguro?",
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
                                            Bandera: "ActivarUsuario",
                                            id: id
                                        },
                                        success: function (resp) {
                                            var resp = $.parseJSON(resp);
                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                swal({title: "",
                                                    text: "El usuario se ha activado!",
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
                                                swal("", "Ha habido un error, intenta nuevamente", "error");
                                            }
                                        }

                                    });
                                }
                            });

                        });
                    },
                    EventoEliminarUsuario: function () {
                        $('.eliminar').off('click').on('click', function () {
                            var id = $(this).data('id');
                            swal({title: "",
                                text: "¿El usuario se eliminará, está seguro?",
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
                                            Bandera: "EliminarUsuario",
                                            id: id
                                        },
                                        success: function (resp) {
                                            var resp = $.parseJSON(resp);
                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                swal({title: "",
                                                    text: "El usuario se ha eliminado exitosamente!",
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
                                                swal("", "Ha habido un error, intenta nuevamente", "error");
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
            <button type="button" class="btn btn-success"><a href="iniciox.php" style="color: white">Volver</a></button></center>
            <?php
        }
        ?>

</body></html>
