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

?>

<!DOCTYPE html>
<html>
<head>


    <meta charset="utf-8" />
    <title>Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlFuncionarios.php" ?>

    <?php include("Includes/imports.php") ?>

    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>



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





                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlFuncionarios.php?accion=Crear">




                                <fieldset >

                                    <legend>Datos del visitante </legend>

                                    <div class="row m-t-20">
                                        <div class="col-lg-6">
                                            <label for="Cedula">Cédula </label>
                                            <input type="text" class="form-control" id="Cedula" name="Cedula"  required>
                                            <br>
                                            <form action="">
                                                <input type="button" value="Buscar" name="BuscarCedula" id="BuscarCedula" class="btn btn-primary stepy-finish" >
                                            </form>
                                        </div>

                                        <div class="col-lg-6">
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                                            <label for="urlImagen">Imagen del visitante</label>
                                            <br>
                                            <div id='img_contain'><img id="preview" align='middle' src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image"/></div>
                                        </div>

                                        <div class = "col-lg-6">
                                            <label for="Nombre1">Primer nombre</label>
                                            <input type="text" value="" name="Nombre1" id="Nombre1"
                                                   class="form-control"  required/>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="Apellido1">Primer apellido </label>
                                            <input type="text" value="" name="Apellido1" id="Apellido1"
                                                   class="form-control" required />
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="TipoVisitante">Tipo de visitante </label>
                                            <select class="form-control" id="UbicacionInterno" required name="UbicacionInterno">
                                                <option value="3">Tipo de visitante 1</option>
                                                <option value="4">Administrador 2</option>
                                                <option value="5">Administrador 3</option>
                                                <option value="6">Auxiliar 1</option>
                                                <option value="7">Auxiliar 2</option>
                                                <option value="8">Auxiliar 3</option>
                                            </select>
                                            <br> <br>
                                        </div>

                                        </div>
                                    <fieldset >
                                        <legend>Datos del interno  </legend>

                                        <div class="row m-t-20">
                                            <div class="col-lg-6">
                                                <label for="TD">TD </label>
                                                <input type="text" class="form-control" id="TD" name="TD"  required minlength="7" maxlength="15">
                                                <br>
                                                <form action="">
                                                    <input type="button" value="Buscar" name="BuscarCedula" id="BuscarCedula" class="btn btn-primary stepy-finish" >
                                                </form>
                                            </div>

                                            <div class="col-lg-6">
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                                                <label for="urlImagen">Imagen del interno</label>
                                                <br>
                                                <div id='img_contain'><img id="preview" align='middle' src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image"/></div>
                                            </div>

                                            <div class = "col-lg-6">
                                                <label for="Nombre1">Primer nombre</label>
                                                <input type="text" value="" name="Nombre1" id="Nombre1"
                                                       class="form-control"  required/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido1">Primer apellido </label>
                                                <input type="text" value="" name="Apellido1" id="Apellido1"
                                                       class="form-control" required />
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="UbicacionInterno">Ubicación del interno </label>
                                                <select class="form-control" id="UbicacionInterno" required name="UbicacionInterno">
                                                    <option value="3">Ubicacion del interno 1</option>
                                                    <option value="4">Administrador 2</option>
                                                    <option value="5">Administrador 3</option>
                                                    <option value="6">Auxiliar 1</option>
                                                    <option value="7">Auxiliar 2</option>
                                                    <option value="8">Auxiliar 3</option>
                                                </select>
                                            </div>


                                            <div class="col-lg-6">
                                                <label for="TipoInterno">Tipo de Interno </label>
                                                <select class="form-control" id="TipoInterno" required name="TipoInterno">
                                                    <option value="3">Tipo Interno 1</option>
                                                    <option value="4">Administrador 2</option>
                                                    <option value="5">Administrador 3</option>
                                                    <option value="6">Auxiliar 1</option>
                                                    <option value="7">Auxiliar 2</option>
                                                    <option value="8">Auxiliar 3</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Delito">Delito </label>
                                                <select class="form-control" id="Delito" required name="Delito">
                                                    <option value="3">Delito 1</option>
                                                    <option value="4">Administrador 2</option>
                                                    <option value="5">Administrador 3</option>
                                                    <option value="6">Auxiliar 1</option>
                                                    <option value="7">Auxiliar 2</option>
                                                    <option value="8">Auxiliar 3</option>
                                                </select>
                                                <br>
                                            </div>



                                        </div>

                                        <br> <br>

                                    <input type="submit" class="btn btn-primary stepy-finish" value="Visita">

                                    </div>
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

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>

</body>
</html>
