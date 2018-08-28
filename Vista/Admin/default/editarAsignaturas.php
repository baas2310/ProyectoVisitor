<?php

session_start();
require "../../../Modelo/materia.php";


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
    <title>Actualizar Asignatura o Materia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Scripts -->
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
                                <li class="breadcrumb-item active">Actualizar Asignatura</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">


                    <?php if (!isset($_GET["IdMateria"])){ ?>
                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar la Asignatura.<strong>Error: no se encontro la informacion de la Asignatura.</strong> Puede administrar las Asignaturas o Materias desde <a href="adminAsignaturas.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                        $IdMateria = $_GET["IdMateria"];
                        $_SESSION["IdMateria"] = $IdMateria;
                        $objMateria = Materia::buscarForId($IdMateria);
                        ?>






                        <div class="col-lg-10 center-page">

                            <div class="card-box">

                                <h4 class="text-center text-custom"><strong>ACTUALIZAR ASIGNATURA</strong></h4>

                                <br>

                                <form role="form" method="post" action="../../../Controlador/materiaController.php?action=editar">

                                    <div class="row ">
                                        <div class="col-xs-9 center-page" style="width: 83%">

                                            <p class="text-muted m-b-30 font-13">
                                                Los campos con un <span class="text-danger">*</span> son obligatorios para completar la Actualización de Datos de la Asignatura.
                                            </p>

                                            <div class="row">

                                                <label for="Materia"><strong>Asignatura o Materia </strong><span class="text-danger">*</span> </label>
                                                <input type="text" value="<?php echo $objMateria->getMateria(); ?>" name="Materia" id="Materia"
                                                       class="form-control" data-parsley-type="number" required
                                                       placeholder=""/>

                                                <div class="col-lg-6">

                                                </div>

                                            </div>

                                            <br>

                                            <br>

                                            <br>

                                            <div class="form-group text-center">

                                                <button onclick=" location.href='adminAsignaturas.php'" type="reset" class="btn btn-gris font-15" style="border-radius: 5px">
                                                    <strong>Cancelar</strong>
                                                </button>

                                                &nbsp;

                                                <button type="submit" class="btn btn-verde  font-15" value="validate"   style= "border-radius: 5px">
                                                    <strong>Guardar</strong>
                                                </button>

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


