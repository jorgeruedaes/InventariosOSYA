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
                                <?php include('../Encabezado.php'); ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <h2 style="color:#27AE60;">Crear Perfil</h2><hr>
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
                                                <label>Apellido:</label>
                                                <input type="text" class="form-control apellido" name="nombre1" required>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2"> 
                                                <label>Cédula:</label>
                                                <input type="number" class="form-control cc" name="codigobarras">
                                            </div>
                                            <div class="col-md-4 "> 
                                                <label>Email:</label>
                                                <input type="email" class="form-control email" name="valor" required>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2">

                                                <label>Tipo:</label>
                                                <select class="form-control tipo" required="required" name="proveedor">
                                                    <option value="" selected></option>
                                                    <option value="Bodega" >Bodega</option>
                                                    <option value="Administrador" >Administrador</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <h3 style="color:#27AE60;">Datos logueo</h3><hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2"> 
                                                <label>Usuario:</label>
                                                <input type="text" class="form-control usuario" name="nombre1" required>
                                            </div>
                                            <div class="col-md-1"> 
                                                <button type="button" class="btn btn-default validado" aria-label="Left Align" style="margin-top: 25px;display:none;">
                                                    <span class="glyphicon glyphicon-ok  valido" aria-hidden="true" style="display:none"></span>
                                                    <span class="glyphicon glyphicon-remove novalido" aria-hidden="true" style="display:none"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2">
                                                <label>Contraseña:</label>
                                                <input type="password" class="form-control contrasena1" name="nombre1" required>
                                            </div>
                                            <div class="col-md-4 "> 
                                                <label>Repetir Contraseña:</label>
                                                <input type="password" class="form-control contrasena2" name="valor" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2">
                                                <label>Pregunta secreta:</label>
                                                <textarea class="form-control pregunta"  style="resize: inherit"rows="3"></textarea>
                                            </div>
                                            <div class="col-md-4 ">
                                                <label>Respuesta secreta:</label>
                                                <textarea class="form-control respuesta" style="resize: inherit" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <br>
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
                                            var perfil = {
                                                Inicio: function () {
                                                    perfil.EnviarDatos();
                                                    perfil.ComprobarUsuario();
                                                    perfil.EnviarDatos();
                                                    perfil.ProbarCedula();
                                                },
                                                RecargarEventos: function () {

                                                },
                                                ComprobarUsuario: function () {
                                                    $('.usuario').off('keyup').on('keyup', function () {
                                                        var usuario = $('.usuario').val();
                                                        $.ajax({
                                                            url: 'PeticionesUsuarios.php',
                                                            type: 'POST',
                                                            data: {
                                                                Bandera: "PruebaExistenciaUsuario",
                                                                id: usuario,
                                                                async: true
                                                            },
                                                            success: function (resp) {

                                                                var resp = $.parseJSON(resp);
                                                                if (resp.Salida === true && resp.Mensaje === true) {
                                                                    $('.validado').css({display: ""});
                                                                    $('.valido').css({display: ""});
                                                                    $('.novalido').css({display: "none"});
                                                                    return true;
                                                                } else {

                                                                    $('.validado').css({display: ""});
                                                                    $('.valido').css({display: "none"});
                                                                    $('.novalido').css({display: ""});
                                                                    swal("Importante!", "El usuario  ya existe, ingresa uno diferente.", "error");
                                                                    return false;
                                                                }

                                                            }
                                                        });
                                                            perfil.ComprobarUsuario();
                                                    });

                                                

                                                },
                                                ProbarContraseña: function () {
                                                        if ($('.contrasena1').val() === $('.contrasena2').val()) {
                                                            return true;
                                                        } else {
                                                            swal("Importante!", "Las contraseñas no coinciden,intenta nuevamente.", "error");
                                                            return false;
                                                        }
                                                   

                                                },
                                                EnviarDatos: function () {
                                                    $('.guardar').off('click').on('click', function () {
                                                        if (perfil.ValidarGeneral()) {
                                                            if (perfil.ProbarContraseña()) {
                                                                        $.ajax({
                                                                            url: 'PeticionesUsuarios.php',
                                                                            type: 'POST',
                                                                            data: {
                                                                                Bandera: "CrearPerfil",
                                                                                nombre: $('.nombre').val(),
                                                                                apellido: $('.apellido').val(),
                                                                                usuario: $('.usuario').val(),
                                                                                pass: $('.contrasena1').val(),
                                                                                email: $('.email').val(),
                                                                                cc: $('.cc').val(),
                                                                                pregunta: $('.pregunta').val(),
                                                                                respuesta: $('.respuesta').val(),
                                                                                tipo: $('.tipo').val(),
                                                                            },
                                                                            success: function (resp) {
                                                                                var resp = $.parseJSON(resp);
                                                                                if (resp.Salida === true && resp.Mensaje === true) {
                                                                                      swal("", "El usuario se ha creado exitosamente.", "success");
                                                                                } else {
                                                                                    swal("Importante!", "Ha ocurrido un error y el usuario no se ha podido crear,intenta nuevamente", "error");
                                                                                  
                                                                                }

                                                                            }
                                                                        });
                                                                    }
                                                                
                                                            
                                                        }
                                                    });



                                                },
                                                ValidarGeneral: function () {
                                                    if (/\w/gi.test($('.nombre').val())) {
                                                        if (/\w/gi.test($('.apellido').val())) {
                                                            if (/[0-9]{1,9}(\.[0-9]{0,10})?$/.test($('.cc').val()) && $('.cc').val() > 5) {
                                                                if ($('.email').val().length > 0) {
                                                                    if (/^[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,3}$/.test($('.email').val())) {
                                                                        if ($('.tipo').val() !== "") {
                                                                            return perfil.ValidacionDeLogueo();
                                                                        } else {
                                                                            $('.tipo').focus();
                                                                            swal("", "Debes seleccionar un tipo de usuario.", "error");
                                                                            return false;
                                                                        }
                                                                    } else {
                                                                        $('.apellido').focus();
                                                                        swal("", "El perfil debe tener un email valido.", "error");
                                                                        return false;
                                                                    }
                                                                } else {
                                                                    if ($('.tipo').val() !== "") {
                                                                        return perfil.ValidacionDeLogueo();
                                                                    } else {
                                                                        $('.tipo').focus();
                                                                        swal("", "Debes seleccionar un tipo de usuario.", "error");
                                                                        return false;
                                                                    }
                                                                }
                                                            } else {
                                                                $('.apellido').focus();
                                                                swal("", "El perfil debe tener una cedula valida.", "error");
                                                                return false;
                                                            }

                                                        } else {
                                                            $('.apellido').focus();
                                                            swal("", "El perfil debe tener un apellido valido.", "error");
                                                            return false;
                                                        }
                                                    } else {
                                                        $('.nombre').focus();
                                                        swal("", "El perfil debe tener un nombre valido.", "error");
                                                        return false;
                                                    }
                                                },
                                                ProbarCedula: function () {
                                                    $('.cc').off('keyup').on('keyup',function(){
                                                         $.ajax({
                                                        url: 'PeticionesUsuarios.php',
                                                        type: 'POST',
                                                        data: {
                                                            Bandera: "PruebaExistencia",
                                                            valor: $(this).val(),
                                                            async: true
                                                        },
                                                        success: function (resp) {

                                                            var resp = $.parseJSON(resp);
                                                            if (resp.Salida === true && resp.Mensaje === true) {
                                                            
                                                            } else {
                                                                swal("", "La cedula que intentas ingresar ya existe,intenta nuevamente.", "error");
                                                                
                                                            }

                                                        }
                                                    });
                                                    });
                                                   

                                                },
                                                ValidacionDeLogueo: function () {
                                                    if (/\w/gi.test($('.usuario').val())) {
                                                        if (/\w/gi.test($('.contrasena1').val())) {
                                                            if (/\w/gi.test($('.contrasena2').val())) {
                                                                if (/\w/gi.test($('.pregunta').val())) {
                                                                    if (/\w/gi.test($('.respuesta').val())) {
                                                                        return true;
                                                                    } else {
                                                                        $('.respuesta').focus();
                                                                        swal("", "Ingresa la respuesta.", "error");
                                                                        return false;
                                                                    }

                                                                } else {
                                                                    $('.pregunta').focus();
                                                                    swal("", "Ingresa una pregunta.", "error");
                                                                    return false;
                                                                }
                                                            } else {
                                                                $('.contrasena2').focus();
                                                                swal("", "Las contraseñas deben coincidir,intenta nuevamente  .", "error");
                                                                return false;
                                                            }
                                                        } else {
                                                            $('.contrasena1').focus();
                                                            swal("", "Ingresa una contraseña valida.", "error");
                                                            return false;
                                                        }
                                                    } else {
                                                        $('.usuario').focus();
                                                        swal("", "El perfil debe tener un usuario valido.", "error");
                                                        return false;
                                                    }
                                                }
                                            };
                                            $(document).ready(function () {

                                                perfil.Inicio();

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
