<?php

session_start();

require "../../../Modelo/Funcionario.php";

if (empty($_SESSION["DataUser"]["IdFuncionario"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4" && $_SESSION["user"] != "5") {
    header('Location: Index.php');
}
require ('conexion.php');
$query = "SELECT * FROM tbVisitante ";
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
    <?php require "../../../Controlador/ControlVisitas.php" ?>

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
            $("#Cedula").change(function () {

                $("#Cedula option:selected").each(function () {
                    IdVisitante = $(this).val();
                    $.post("includes/getVinculado.php", { IdVisitante: IdVisitante }, function(data){
                        $("#TD").html(data);
                    });
                });
            })
        });
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
                                <li class="breadcrumb-item"><a href="#">Gestión de visitantes</a></li>
                                <li class="breadcrumb-item active">Formularios de visitas</li>
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
                            <h3 class="text-center text-custom" style="color: #0b2e13">FORMULARIO DE VISITAS</h3>





                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlVisitas.php?accion=Crear">




                                <fieldset >

                                    <legend>Datos del visitante </legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-5">
                                            <label for="Cedula">Cedula</label>
                                            <select class="form-control" name="Cedula" id="Cedula" required>
                                                <option value="0">Cedula del Visitante</option>
                                                <?php while($row = $resultado->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['IdVisitante']; ?>"><?php echo $row['Cedula']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        </div>
                                    <fieldset >
                                        <legend>Datos del interno  </legend>

                                        <div class="row m-t-20">
                                            <div class="form-group">
                                                <label for="TD">TD </label>
                                                <select class="form-control" name="TD" id="TD" required></select>

                                            </div>





                                        </div>

                                        <br> <br>

                                        <input type="submit" class="btn btn-primary stepy-finish" name="boton" id="boton" value="Generar Ingreso">

                                    </div>
                        <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">



                            <?php echo ControlVisitas::adminTableIngresos(); ?>

                        </table>
                        </div>







                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->


        <footer class="footer text-right">
            2018 Software ADSI Visitor
        </footer>


<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>

</body>
</html>
