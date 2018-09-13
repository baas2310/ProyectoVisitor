<?php


session_start();
if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3" ){
    header('Location: Index.php');
}

    require ('conexion.php');
    $query = "SELECT id_departamento, departamento FROM departamentos ORDER BY departamento";
    $resultado=$mysqli->query($query);

?>

<!DOCTYPE html>
<html>
<head>


        <meta charset="utf-8" />
    <title>Registro de Funcionario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlFuncionarios.php" ?>

    <?php include("Includes/imports.php") ?>

    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>

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

    <script src="assets/jquery/lib/jquery.js"></script>
    <script src="assets/jquery/lib/jquery.form.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/Validator.js"></script>
</head>


<body>

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
                                <li class="breadcrumb-item"><a href="#">Gestión de funcionarios</a></li>
                                <li class="breadcrumb-item active">Registro de funcionarios</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->
                <!-- Clickable Wizard -->
                <div class="row">

                    <div id="alertas" class="center-page">
                        <?php if(!empty($_GET["respuesta"]) && $_GET["respuesta"] == "correcto"){ ?>
                            <div class="alert alert-icon alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="mdi mdi-check-all"></i>
                                <strong>Exito!</strong>Se ha registrado correctamente
                            </div>
                        <?php } ?>

                    </div>

                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="text-center text-custom" style="color: #0b2e13">REGISTRO DE FUNCIONARIO</h3>




                            <form id="FormFuncionario" role="form" method="post" action="../../../Controlador/ControlFuncionarios.php?accion=Crear">

                                <fieldset title="Datos básicos">
                                    <legend>Información </legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Cedula"> Documento </label>
                                                <input type="text" class="form-control" id="Cedula" name="Cedula" minlength="7" maxlength="15" onkeypress="return valida(event)" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombre1">Primer nombre</label>
                                                <input type="text" class="form-control" id="Nombre1" name="Nombre1" onkeypress="return check(event)"  maxlength="30" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombre2">Segundo nombre</label>
                                                <input type="text" class="form-control" id="Nombre2" name="Nombre2" onkeypress="return check(event)"  maxlength="30" >
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Apellido1">Primer apellido</label>
                                                <input type="text" class="form-control" id="Apellido1" name="Apellido1" maxlength="30" onkeypress="return check(event)" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Apellido2">Segundo apellido</label>
                                                <input type="text" class="form-control" id="Apellido2" name="Apellido2" onkeypress="return check(event)" maxlength="30" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="Celular">Celular</label>
                                                <input type="text" class="form-control" id="Celular" name="Celular" minlength="7" maxlength="10" onkeypress=" return valida(event)" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Rango">Rango</label>
                                                <input type="text" class="form-control" id="Rango" name="Rango"
                                                       required maxlength="30">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                            <fieldset title="Datos de inicio de sesión">
                                <legend>Datos Inicio Sesión </legend>

                                <div class="row m-t-20">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="Usuario">Usuario</label>
                                            <input type="text" class="form-control" id="Usuario" name="Usuario"
                                                   maxlength="30" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Contraseña</label>
                                            <input type="password" class="form-control" id="Password" name="Password"
                                                   maxlength="30" required>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="Password2">Confirmar Contraseña</label>
                                            <input data-parsley-equalto="#Password" type="password" class="form-control"
                                            id="Password2" name="Password2" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="Permiso">Permiso</label>
                                            <select class="form-control" id="Permiso" required name="Permiso">
                                                <option value="3">Administrador 1</option>
                                                <option value="4">Administrador 2</option>
                                                <option value="5">Administrador 3</option>
                                                <option value="6">Auxiliar 1</option>
                                                <option value="7">Auxiliar 2</option>
                                                <option value="8">Auxiliar 3</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="departamento">Departamento </label>
                                        <select class="form-control" name="departamento" id="departamento">
                                            <option value="0">Seleccionar departamento</option>
                                            <?php while($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id_departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                            <?php } ?>
                                        </select>


                                        <div class="form-group">
                                            <label for="municipio">Municipio </label>
                                            <select class="form-control" name="municipio" id="municipio" >
                                            </select>
                                        </div>

                                        </div>

                                    </div>
                                </div>
                                </fieldset>

                                <input type="submit" class="btn btn-primary stepy-finish" value="Registrar persona">

                            </form>



                        </div>
                    </div>
                </div>
                <!-- End row -->

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

</body>
</html>
