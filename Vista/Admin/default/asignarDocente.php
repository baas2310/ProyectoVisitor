<?php

session_start();

require "../../../Modelo/asignarDocente.php";

if (empty($_SESSION["DataUser"]["idRol"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["idRol"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
    header('Location: Index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Asignación de Docentes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/asignarDocenteController.php" ?>
    <?php require "../../../Controlador/cursoController.php" ?>
    <?php require "../../../Controlador/materiaController.php" ?>
    <?php require "../../../Controlador/usuarioController.php" ?>

    <?php include ("Includes/imports.php")?>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include ("Includes/topBar.php")?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("Includes/leftSideBar.php")?>
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
                            <h4 class="page-title float-left">Sistema de Gestión de Procesos Academicos Institución Educativa Técnica de Nazareth Nobsa.</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Administración</a></li>
                                <li class="breadcrumb-item active">Asignación Docente</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="text-center text-custom"><strong>ASIGNACIÓN DE DOCENTES</strong></h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede Asignar los Docentes de acuerdo a la Asignatura o Materia que van a dictar dentro del plantel educativo.
                            </p>
                            <div class="pad-btm form-inline">
                                <div class="row">
                                    <div class="col-sm-6 text-xs-center">
                                        <div class="form-group">
                                            <button onclick="location.href='registrarUsuarios.php'" id="Registrar" class="btn btn-success m-b-20"><i class="fa fa-plus m-r-5"></i>Añadir Nuevo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form role="form" method="post" action="../../../Controlador/asignarDocenteController.php?action=crear">
                                <div class="row m-t-20">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Year">Año:</label>
                                            <input type="text" class="form-control" id="Year" name="Year"
                                                   required placeholder="Ingrese el año">
                                        </div>

                                        <div class="form-group">
                                            <label for="Curso"><span class="text-danger">*</span> Curso o Grado al que Dicta:</label>
                                            <?php echo cursoController::selectCursos(true, "idCurso", "idCurso", "form-control"); ?>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="Usuairo"><span class="text-danger">*</span> Datos del Docente:</label>
                                            <?php echo usuarioController::selectUsuariosDocentes(true, "idUsuario", "idUsuario", "form-control"); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="Materia"><span class="text-danger">*</span> Asignatura o Materia que Dicta:</label>
                                            <?php echo materiaController::selectMaterias(true, "idMateria", "idMateria", "form-control"); ?>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary stepy-finish" value="validate"   style= "border-radius: 5px">
                                            <i class="fa fa-check-square-o"></i><strong>&nbspRegistrar</strong>
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- End row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="text-center text-custom"><strong>LISTA DE DOCENTES ASIGNADOS</strong></h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede ver la lista de Docentes Registrados y asignados en el sistema.
                            </p>

                            <div class="panel-body">
                                <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">

                                    <?php echo asignarDocenteController::adminTableDocente(); ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 © Institución Educativa Técnica de Nazareth Nobsa
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php include ("Includes/scripts.php")?>

</body>
</html>