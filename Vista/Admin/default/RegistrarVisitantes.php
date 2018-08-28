<?php

/*session_start();

require "../../../Modelo/estudiante.php";

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
    <title>Registro de Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlVisitantes.php" ?>

    <?php include("Includes/imports.php") ?>

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
                                <li class="breadcrumb-item"><a href="#">Gestión de visitante</a></li>
                                <li class="breadcrumb-item active">Registro de visitantes</li>
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
                                <strong>Exito!</strong>Se ha registrado correctamente </a>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="text-center text-custom" style="color: #0b2e13">REGISTRO DE VISITANTE</h3>



                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlVisitantes.php?accion=Crear">

                                <div class="form-group">
                                    <input type="text" value="<?php echo $_SESSION["DataUser"]["IdFuncionario"]?>" class="form-control" id="IdRegistrador" name="IdRegistrador"parsley-trigger="change" hidden>
                                </div>
                                <fieldset title="1">
                                    <legend>Información </legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for="Cedula"> Cedula </label>
                                                <input type="text" class="form-control" id="Cedula" name="Cedula" >
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombre1">Primer nombre</label>
                                                <input type="text" class="form-control" id="Nombre1" name="Nombre1"parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombre2">Segundo nombre</label>
                                                <input type="text" class="form-control" id="Nombre2" name="Nombre2"parsley-trigger="change" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Tipo Visitante</label>
                                                <select class="form-control" id="TipoVisitante" required name="TipoVisitante">

                                                    <option value="1">Visitante Ocasional</option>
                                                    <option value="3">Abogados</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Apellido1">Primer apellido</label>
                                                <input type="text" class="form-control" id="Apellido1" name="Apellido1"parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Apellido2">Segundo apellido</label>
                                                <input type="text" class="form-control" id="Apellido2" name="Apellido2"parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Url">Url Imagen</label>
                                                <input type="file" class="form-control" id="UrlImagen" name="UrlImagen" parsley-trigger="change" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TargetaProfecional">Tarjeta Profesional</label>
                                                <input type="text" class="form-control" id="TarjetaProfesional" name="TarjetaProfesional" parsley-trigger="change">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" value="<?php echo date('Y/m/d H:i:s')?>" class="form-control" id="Fecha" name="Fecha" parsley-trigger="change" hidden>
                                            </div>
                                    </div>

                                </fieldset>



                                <input type="submit" class="btn btn-primary stepy-finish" value="Registrar persona"></input>

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
