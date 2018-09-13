<?php

session_start();
require "../../../Modelo/Funcionario.php";


if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3"){
    header('Location: Index.php');
}
require ('conexion.php');
$query = "SELECT id_departamento, departamento FROM departamentos ORDER BY departamento";
$resultado=$mysqli->query($query);


?>
va
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Scripts -->
    <?php include("Includes/imports.php") ?>
    <script src="assets/jquery/lib/jquery.js"></script>
    <script src="assets/jquery/lib/jquery.form.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/Validator.js"></script>

    <script language="javascript">
        $(document).ready(function(){
            $("#departamento").change(function () {

                $("#departamento option:selected").each(function () {
                    id_departamento = $(this).val();
                    $.post("includes/getMunicipio.php", { id_departamento: id_departamento }, function(data){
                        $("#municipio").html(data);
                    });
                });
            })
        });
        function valida(e){
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8){
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros
            patron =/[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
        function check(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[A-Za-z]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

    </script>

</head>


<body oncontextmenu="return false">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include("Includes/topBar.php") ?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("Includes/leftSideBar.php") ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- start row -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Visitor</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Gestión de funcionario</a></li>
                                <li class="breadcrumb-item active">Actualizar Funcionario</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">

                    <?php if (!isset($_GET["IdFuncionarioEditar"])){ ?>
                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al Funcionario.<strong> Error: no se encontro la informacion del Funcionario.</strong> Puede administrar los Usuarios desde <a href="ListarFuncionarios.php" class="alert-link">Aquí</a>.
                        </div>

                    <?php }else{
                    $IdFuncionario = $_GET["IdFuncionarioEditar"];
                    $_SESSION["IdFuncionario"] = $IdFuncionario;
                    $objFuncionario = Funcionario::buscarId($IdFuncionario);
                    ?>



                        <div class="col-lg-10 center-page">

                            <div class="card-box">


                                <h4 class="text-center text-custom">ACTUALIZAR FUNCIONARIO</h4>

                                <br>

                                <form role="form" method="post" id="FormFuncionario" name="FormFuncionario" action="../../../Controlador/ControlFuncionarios.php?accion=EditarFuncionario">
                                    <div class="row ">
                                        <div class="col-xs-9 center-page" style="width: 83%">


                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <label for="Cedula">Cedula </label>

                                                    <input type="text" value="<?php echo $objFuncionario->getCedula(); ?>" name="Cedula" id="Cedula"
                                                           class="form-control" minlength="7" maxlength="15"  onkeypress="return valida(event)" required/>
                                                </div>
                                                <br> <br>
                                                <div class="col-lg-6">
                                                    <label for="Nombre1">Primer nombre </label>
                                                    <input type="text" value="<?php echo $objFuncionario->getNombre1(); ?>" name="Nombre1" id="Nombre1"
                                                    class="form-control" maxlength="30" minlength="2" onkeypress="check(event)" required autocomplete="off"/>
                                                    <span id="name-format" class="help">Campo requerido</span>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Nombre2">Segundo nombre</label>
                                                    <input type="text" value="<?php echo $objFuncionario->getNombre2(); ?>" name="Nombre2" id="Nombre2"
                                                    class="form-control"  maxlength="30" onkeypress="check(event)" autocomplete="off"/>
                                                    <span id="name-format" class="help">Campo no requerido</span>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Apellido1">Primer apellido </label>
                                                    <input type="text" value="<?php echo $objFuncionario->getApellido1(); ?>" name="Apellido1" id="Apellido1"
                                                    class="form-control" minlength="2" maxlength="30" onkeypress="check(event)" required autocomplete="off"/>
                                                </div>

                                            <div class="col-lg-6">
                                                <label for="Apellido2">Segundo apellido </label>
                                                <input type="text" value="<?php echo $objFuncionario->getApellido2(); ?>" name="Apellido2" id="Apellido2"
                                                       class="form-control"  maxlength="30" onkeypress="check(event)" autocomplete="off"/>
                                                <span id="name-format" class="help">Campo no requerido</span>
                                            </div>

                                                <div class="col-lg-6">
                                                    <label for="Rango">Rango </label>
                                                    <input type="text" value="<?php echo $objFuncionario->getRango(); ?>" name="Rango" id="Rango"
                                                           class="form-control"  required autocomplete="off"/>
                                                    <span id="name-format" class="help">Campo requerido</span>
                                                </div>
                                                <div class="col-lg-6" hidden>
                                                    <label for="Estado">Estado </label>
                                                    <input type="text" value="1" name="Estado" id="Estado"
                                                           class="form-control" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="departamento">Departamento </label>
                                                    <select class="form-control" name="departamento" id="departamento">
                                                        <option value="<?php echo $objFuncionario->getIdDepartamento(); ?>"><?php echo $objFuncionario->getDepartamento(); ?></option>
                                                        <?php while($row = $resultado->fetch_assoc()) { ?>
                                                            <option value="<?php echo $row['id_departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                                        <?php } ?>
                                                    </select>



                                                </div>

                                                <div class="col-lg-6">
                                                        <label for="Permiso">Permiso</label>
                                                        <select class="form-control" id="Permiso" required name="Permiso">
                                                            <option <?php echo ($objFuncionario->getPermiso() == "Administrador 1") ? "selected" : ""; ?> value="3">Administrador 1</option>
                                                            <option <?php echo ($objFuncionario->getPermiso() == "Administrador 2") ? "selected" : ""; ?> value="4">Administrador 2</option>
                                                            <option <?php echo ($objFuncionario->getPermiso() == "Administrador 3") ? "selected" : ""; ?> value="5">Administrador 3</option>
                                                            <option <?php echo ($objFuncionario->getPermiso() == "Auxiliar 1") ? "selected" : ""; ?> value="6">Auxiliar 1</option>
                                                            <option <?php echo ($objFuncionario->getPermiso() == "Auxiliar 2") ? "selected" : ""; ?> value="7">Auxiliar 2</option>
                                                            <option <?php echo ($objFuncionario->getPermiso() == "Auxiliar 3") ? "selected" : ""; ?> value="8">Auxiliar 3</option>
                                                        </select>
                                                    </div>

                                                <div class="col-lg-6">
                                                    <label for="municipio">Municipio </label>
                                                    <select class="form-control" name="municipio" id="municipio">
                                                        <option value="<?php echo $objFuncionario->getIdUbicacion(); ?>"><?php echo $objFuncionario->getUbicacion(); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="Usuario">Usuario</label>
                                                    <input type="text" value="<?php echo $objFuncionario->getUsuario(); ?>" name="Usuario" id="Usuario"
                                                           class="form-control"  required autocomplete="off"/>
                                                    <span id="name-format" class="help">Campo requerido</span>

                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="Celular"><strong>Celular</strong></span></label>
                                                    <input type="text" value="<?php echo $objFuncionario->getCelular(); ?>" name="Celular"  required
                                                            class="form-control" id="Celular" minlength="7" maxlength="10" onkeypress="valida(event)" autocomplete="off">
                                                    <span id="name-format" class="help">Campo requerido</span>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="Password"><strong>Contraseña</label>
                                                        <input id="Password" value="<?php echo $objFuncionario->getPass(); ?>" name="Password" type="password"  required
                                                         class="form-control" minlength="3" maxlength="50" autocomplete="off">
                                                        <span id="name-format" class="help">Campo requerido</span>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label for="Password2"><strong>Confirme Contraseña</strong><span class="text-danger">*</span></label>
                                                        <input data-parsley-equalto="#Password" type="password" required minlength="3" maxlength="50"
                                                        class="form-control" id="Password2"  autocomplete="off">
                                                        <span id="name-format" class="help">Campo requerido</span>
                                                    </div>
                                                <br><br>




                                            </div>


                                            <div class="form-group text-center">

                                                <button onclick=" location.href='ListarFuncionarios.php'" type="reset" class="btn btn-gris font-15" style="border-radius: 5px">
                                                    <strong>Cancelar</strong>
                                                </button>



                                                <button type="submit" class="btn btn-verde  font-15" value="validate"   style= "border-radius: 5px">
                                                    <strong>Guardar</strong>
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                            </div>


                                </form>
                            </div> <!-- end card-box -->
                        </div>
                        <!-- end col -->

                <?php }?>

                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
           2018 Software ADSI Visitor
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>
<script>
    $().ready(function () {

        $("#FormFuncionario").validate({
            rules:{
                Nombre1:{
                    required: true,
                    minlenght: 2,
                    maxlenght: 30
                },
                Apellido1: {
                    required: true,
                    minlenght: 2,
                    maxlenght: 30
                },
                Celular: {
                    required: true,
                    minlenght:7,
                    maxlenght:10

                },
                Cedula:{
                    required: true,
                    minlenght:7,
                    maxlenght:15
                },

                Rango: {
                    required: true,
                    minlenght:4,
                    maxlenght:30
                },
                Usuario:{
                    required: true,
                    minlenght:2
                },
                Pass:{
                    required:true,
                    minlenght:5
                },
                Password2:{
                    required: true,
                    equalTo: "#Pass"
                },
                messages:{

                    Nombre1: {
                        required:"Por favor ingrese su primer nombre",
                        minlenght:"Ingrese un nombre válido",
                        maxlenght:"Ingrese un nombre válido"
                    },

                    Apellido1: {
                        required:"Por favor ingrese su primer apellido",
                        minlenght:"Ingrese un apellido válido",
                        maxlenght:"Ingrese un apellido válido"
                    },

                    Celular: {
                        required:"Por favor ingrese su celular",
                        minlenght:"Ingrese un celular válido",
                        maxlenght:"Ingrese un celular válido"
                    },

                    Cedula: {
                        required:"Por favor ingrese su cedula",
                        minlenght:"Ingrese una cédula válida",
                        maxlenght:"Ingrese una cédula válida"
                    },

                    Rango: {
                        required:"Por favor ingrese su Rango",
                        minlenght:"Ingrese un rango válido",
                        maxlenght:"Ingrese un rango válido"
                    },

                    Usuario: {
                        required:"Por favor ingrese un usuario",
                        minlenght:"Ingrese un usuario de por lo menos 5 caracteres",
                        maxlenght:"Ingrese un usuario de máximo 30 caracteres"
                    },

                    Pass: {
                        required:"Por favor ingrese su contraseña",
                        minlenght:"Su contraseña debe ser de por lo menos 5 caracteres",
                        maxlenght:"Su contraseña no debe superar los 30 caracteres"
                    },

                    Password2: {
                        required:"Por favor ingrese confirme su contraseña",
                        equalTo: "Las contraseñas no coinciden, por favor verifiquelas"
                    }

                }
            }

        });

    });


</script>

</body>
</html>
