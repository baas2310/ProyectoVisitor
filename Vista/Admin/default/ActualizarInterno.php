<?php

session_start();
require "../../../Modelo/Interno.php";


if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
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

    <!-- Scripts -->
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
                                <li class="breadcrumb-item"><a href="#">Gestión de internos</a></li>
                                <li class="breadcrumb-item active">Actualizar internos</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">

                    <?php if (!isset($_GET["IdFuncionario"])){ ?>
                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al interno.<strong> Error: no se encontro la informacion del interno.</strong> Puede administrar los Usuarios desde <a href="ListarInterno.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                    $IdFuncionario = $_GET["IdFuncionario"];
                    $_SESSION["IdFuncionario"] = $IdFuncionario;
                    $objFuncionario = Funcionario::buscarId($IdFuncionario);
                    ?>



                    <div class="col-lg-10 center-page">

                        <div class="card-box">


                            <h4 class="text-center text-custom">ACTUALIZAR INTERNO</h4>

                            <br>

                            <form role="form" method="post" action="../../../Controlador/ControlInterno.php?action=EditarInterno">
                                <div class="row ">
                                    <div class="col-xs-9 center-page" style="width: 83%">


                                        <div class="row">
                                            <div class="col-lg-6">

                                                <label for="Nombre1">Primer nombre </label>

                                                <input type="text" value="<?php echo $objInterno->getNombre1(); ?>" name="Nombre1" id="Nombre1"
                                                       class="form-control"  disabled/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Nombre2">Segundo nombre </label>
                                                <input type="text" value="<?php echo $objInterno->getNombre2(); ?>" name="Nombre2" id="Nombre2"
                                                       class="form-control"  disabled/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido1">Primer apellido </label>
                                                <input type="text" value="<?php echo $objInterno->getApellido1(); ?>" name="Apellido1" id="Apellido1"
                                                       class="form-control" disabled />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido2">Segundo apellido </label>
                                                <input type="text" value="<?php echo $objInterno->getApellido2(); ?>" name="Apellido2" id="Apellido2"
                                                       class="form-control" disabled />
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="FechaNacimiento">Fecha de nacimiento </label>
                                                <input type="date" value="<?php echo $objInterno->getFechaNacimiento(); ?>" name="FechaNacimiento" id="FechaNacimiento"
                                                       class="form-control"  />
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="UrlImagen">Url de la imagen</label>
                                                <input type="file" value="<?php echo $objInterno->getUrlImagen(); ?>" name="UrlImagen" id="UrlImagen"
                                                       class="form-control" />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="FechaIngreso">Fecha de ingreso </label>
                                                <input type="date" value="<?php echo $objInterno->getFechaIngreso(); ?>" name="FechaIngreso" id="FechaIngreso"
                                                       class="form-control"  />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="FechaSalida">Fecha de salida </label>
                                                <input type="date" value="<?php echo $objInterno->getFechaSalida(); ?>" name="FechaSalida" id="FechaSalida"
                                                       class="form-control"  />
                                            </div>

                                              <div class="col-lg-6">
                                                <label for="TD">TD</label>
                                                <input type="text" value="<?php echo $objInterno->getTD(); ?>" name="TD" id="TD"
                                                       class="form-control" />
                                              </div>

                                                <div class="col-lg-6">
                                                  <label for="IdTipoInterno">Tipo de interno</label>
                                                  <input type="text" value="<?php echo $objInterno->getIdTipoInterno(); ?>" name="idTipoInterno" id="idTipoInterno"
                                                         class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="idTipoReclusion">Tipo de reclusión</label>
                                                  <input type="text" value="<?php echo $objInterno->getIdTipoReclusion(); ?>" name="idTipoReclusion" id="idTipoReclusion"
                                                         class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="idUbicacionInterno">Ubicacion del interno</label>
                                                  <input type="text" value="<?php echo $objInterno->getIdUbicacionInterno(); ?>" name="idUbicacionInterno" id="idUbicacionInterno"
                                                         class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="Ubicacion">Ubicacion</label>
                                                  <input type="text" value="<?php echo $objInterno->getIdUbicacion(); ?>" name="idUbicacion" id="idUbicacion"
                                                         class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="Delito">Delito</label>
                                                  <input type="text" value="<?php echo $objInterno->getDelito(); ?>" name="Delito" id="Delito"
                                                         class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="Estado">Estado</label>
                                                  <input type="text" value="<?php echo $objInterno->getEstado(); ?>" name="Estado" id="Estado"
                                                         class="form-control" />
                                                </div>


                                            <br><br>



                                        </div>


                                        <div class="form-group text-center">

                                            <button onclick=" location.href='ListarInterno.php'" type="reset" class="btn btn-gris font-15" style="border-radius: 5px">
                                                <strong>Cancelar</strong>
                                            </button>



                                            <button type="submit" class="btn btn-verde  font-15" value="validate"   style= "border-radius: 5px">
                                                <strong>Guardar</strong>
                                            </button>

                                        </div>

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
