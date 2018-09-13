<?php
session_start();

require "../../../Modelo/Ubicacion.php";

if (empty($_SESSION["DataUser"]["IdFuncionario"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4" && $_SESSION["user"] != "5") {
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
    <?php require "../../../Controlador/ControlUbicacion.php" ?>

    <?php include("Includes/imports.php") ?>

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
                                <li class="breadcrumb-item"><a href="#">Gestión de internos</a></li>
                                <li class="breadcrumb-item active">Crear tipo de interno</li>
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
                            <h3 class="text-center text-custom" style="color: #0b2e13">REGISTRO TIPO DE INTERNOS</h3>



                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlUbicacion.php?accion=Crear">


                        <fieldset >
                            <legend>Información </legend>

                            <div class="col-sm-5">
                                <label for="cbx_Carcel">Carcel</label>
                                <select class="form-control" name="cbx_Carcel" id="cbx_Carcel">
                                    <option value="0">Seleccionar Carcel</option>
                                    <?php while($row = $resultado->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['IdCarcel']; ?>"><?php echo $row['NombreCarcel']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="row m-t-20">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="Patio">Patio</label>
                                      <input type="text" class="form-control" id="Patio" name="Patio" required>
                                  </div>






                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="Seccion">Sección</label>
                                              <input type="text" class="form-control" id="Seccion" name="Seccion" required>
                                          </div>

                                          <div class="form-group">
                                              <label for="Celda">Celda</label>
                                              <input type="text" class="form-control" id="Celda" name="Celda" required>
                                          </div>

                        </fieldset>




                                <input type="submit" class="btn btn-primary stepy-finish" value="Registrar">

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
