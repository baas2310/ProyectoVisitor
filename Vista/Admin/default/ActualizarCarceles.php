<?php

session_start();

require "../../../Modelo/Funcionario.php";

if (empty($_SESSION["DataUser"]["IdFuncionario"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3"){
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
    <title>Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlCarceles.php" ?>

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

    </script>

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
                                <li class="breadcrumb-item"><a href="#">Gestión de carceles</a></li>
                                <li class="breadcrumb-item active">Crear carceles</li>
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
                            <h3 class="text-center text-custom" style="color: #0b2e13">ACTUALIZACIÓN DE CARCELES</h3>



                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlCarceles.php?accion=Crear">

                                <fieldset title="1">
                                    <legend>Información </legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <<div class="col-sm-6">
                                                <label for="departamento">Departamento </label>
                                                <select class="form-control" name="departamento" id="departamento">
                                                    <option value="0">Seleccionar departamento</option>
                                                    <?php while($row = $resultado->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['id_departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                                    <?php } ?>
                                                </select>


                                                <div class="form-group">
                                                    <label for="municipio">Municipio </label>
                                                    <select class="form-control" name="municipio" id="municipio">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="NombreCarcel">Nombre Carcel</label>
                                                <input type="text" class="form-control" id="NombreCarcel" name="NombreCarcel" minlength="3" maxlength="30" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="Cedula">Cedula Director Carcel</label>
                                                <input type="text" class="form-control" id="Cedula" name="Cedula" minlength="7" maxlength="15"  onkeypress="return valida(event)" >
                                                <small id="fileHelp" class="form-text text-muted">El Funcionario debe estar priviamente registrado</small>

                                            </div>

                                        </div>




                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary stepy-finish" value="Registrar Carcel">




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



<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>

</body>
</html>
