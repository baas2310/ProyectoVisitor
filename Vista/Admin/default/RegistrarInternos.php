<?php

session_start();

require "../../../Modelo/Interno.php";

if (empty($_SESSION["DataUser"]["IdFuncionario"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
    header('Location: Index.php');
}
require ('conexion.php');
$query = "SELECT IdCarcel, NombreCarcel FROM tbCarcel ORDER BY NombreCarcel";
$resultado=$mysqli->query($query);



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
    <?php require "../../../Controlador/ControlInternos.php" ?>
    <?php require "../../../Controlador/ControlSelectores.php" ?>
    <?php include("Includes/imports.php") ?>

    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>

    <script language="javascript">
        $(document).ready(function(){
            $("#cbx_Carcel").change(function () {

                $("#cbx_Carcel option:selected").each(function () {
                    IdCarcel = $(this).val();
                    $.post("includes/getCarcel.php", { IdCarcel: IdCarcel }, function(data){
                        $("#cbx_Ubicacion").html(data);
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
                                <li class="breadcrumb-item"><a href="#">Gestión de Visitantes</a></li>
                                <li class="breadcrumb-item active">Registro de internos</li>
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
                            <h3 class="text-center text-custom"  >REGISTRO DE INTERNOS</h3>



                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlInternos.php?accion=crear" enctype='multipart/form-data'>

                                <fieldset >
                                    <legend style="color: #38586c;">Información </legend>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo $_SESSION["DataUser"]["IdFuncionario"]?>" class="form-control" id="IdRegistrador" name="IdRegistrador"parsley-trigger="change" hidden>
                                    </div>

                                    <div class="row m-t-20">
                                        <div class="col-sm-5">

                                            <div class="form-group">
                                                <label for="Cedula">Cedula</label>
                                                <input type="text" class="form-control" id="Cedula" name="Cedula"parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="PrimerNombre">Primer nombre</label>
                                                <input type="text" class="form-control" id="PrimerNombre" name="PrimerNombre"parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="SegundoNombre">Segundo nombre</label>
                                                <input type="text" class="form-control" id="SegundoNombre" name="SegundoNombre"parsley-trigger="change" >
                                            </div>
                                            <div class="form-group">
                                                <label for="FechaNacimiento"> Fecha de nacimiento </label>
                                                <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento"  required>
                                            </div>

                                          </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="PrimerApellido">Primer apellido</label>
                                                <input type="text" class="form-control" id="PrimerApellido" name="PrimerApellido"parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="SegundoApellido">Segundo apellido</label>
                                                <input type="text" class="form-control" id="SegundoApellido" name="SegundoApellido"parsley-trigger="change" >
                                            </div>

                                            <div class="form-group">
                                                <label for="UrlImagen">Imagen </label>
                                                <input type="file" class="form-control-file" id="UrlImagen" aria-describedby="fileHelp" name="UrlImagen">
                                                <small id="fileHelp" class="form-text text-muted">Archivos permitidos (.jpg .png .gif)</small>
                                            </div>


                                        </div>
                                    </div>






                                <div class="row m-t-17">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="TD">TD</label>
                                            <input type="text" class="form-control" id="TD" name="TD"
                                                   parsley-trigger="change" required>
                                        </div>
                                        <label>Tipo Interno</label>
                                        <?php echo ControlSelectores::SelectTipoInterno(); ?>
                                        <label>Tipo Reclucion</label>
                                        <?php echo ControlSelectores::SelectTipoReclusion(); ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="cbx_Carcel">Carcel</label>
                                    <select class="form-control" name="cbx_Carcel" id="cbx_Carcel">
                                        <option value="0">Seleccionar Carcel</option>
                                        <?php while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['IdCarcel']; ?>"><?php echo $row['NombreCarcel']; ?></option>
                                        <?php } ?>
                                    </select>


                                        <div class="form-group">
                                            <label for="cbx_Ubicacion">Ubicacion </label>
                                            <select class="form-control" name="cbx_Ubicacion" id="cbx_Ubicacion"></select>
                                            <label for="UbicacionDom">Ubicacion Domiciliaria </label>
                                            <input type="text" class="form-control" id="UbicacionDom" name="UbicacionDom"parsley-trigger="change" >
                                        </div>

                                        <div class="form-group">
                                            <label>Delito</label>
                                            <?php echo ControlSelectores::SelectDelito(); ?>
                                            <option value="<?php echo $objInterno->getIdParentesco()?>"<?php echo $objInterno->getParentesco()?> </option>

                                        </div>



                                    </div>




                                        </div>
                                    </div>
                                </fieldset>
                                </div>


                                <input type="submit" class="btn btn-primary stepy-finish" name="boton" id="boton" value="Registrar interno">


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
