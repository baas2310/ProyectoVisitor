<?php

/*session_start();

require "../../../Modelo/curso.php";

if (empty($_SESSION["DataUser"]["idRol"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["idRol"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
    header('Location: Index.php');
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Administrar Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/cursoController.php" ?>

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
                                <li class="breadcrumb-item active">Administrar Cursos</li>
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
                            <h4 class="text-center text-custom"><strong>REGISTRO DE CURSOS</strong></h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede registrar y Administrar los Cursos del plantel educativo.
                            </p>

                            <form role="form" method="post" action="../../../Controlador/cursoController.php?action=crear">
                                <div class="row m-t-20">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="Curso">Curso o Grado a Registrar:</label>
                                            <input type="text" class="form-control" id="Curso" name="Curso"
                                                   required placeholder="Ingrese el nuevo curso">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group" style="display: none">
                                            <label for="Estado"><span class="text-danger">*</span> Estado</label>
                                            <select class="form-control" id="Estado" required name="Estado">
                                                <option>Activo</option>
                                                <option>Inactivo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
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
                            <h4 class="text-center text-custom"><strong>LISTA DE CURSOS</strong></h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede ver la lista de Cursos Registrados en el sistema.
                            </p>

                            <div class="panel-body">
                                <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">

                                    <?php echo cursoController::adminTableCurso(); ?>

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