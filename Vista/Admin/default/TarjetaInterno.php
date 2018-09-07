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

    <!-- Scripts -->
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
                                <li class="breadcrumb-item active">Actualizar internos</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">


                    <?php if (!isset($_GET["IdInterno"])){ ?>

                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al interno.<strong> Error: no se encontro la informacion del interno.</strong> Puede administrar los Usuarios desde <a href="ListarInterno.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                    $IdInterno = $_GET["IdInterno"];
                    $_SESSION["IdInterno"] = $IdInterno;
                    $objInterno = Interno::buscarId($IdInterno);
                    ?>



                    <div class="col-lg-10 center-page">

                        <div class="card-box">


                            <h4 class="text-center text-custom">TARJETA DE INTERNOS</h4>


                            <br>

                            <form role="form" method="post" action="../../../Controlador/ControlInternos.php?accion=Editar">
                                <div class="row ">
                                    <div class="col-xs-9 center-page" style="width: 83%">



                                        <div class="row">

                                            <div class=""col-lg-6">
                                            <label for="urlImagen">Foto</label>
                                            <br>
                                            <img src="../../../ImagenesVisitas/<?php echo $objInterno->getUrlImagen(); ?>"/>
                                            </div>
                                        <br><br>
                                        <div class="col-lg-6">
                                            <label for="nota">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   &nbsp   &nbsp  Para imprimir este documento, oprima control + p </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="Nombre1">Primer nombre </label>
                                            <input type="text" value="<?php echo $objInterno->getNombre1(); ?>" name="Nombre1" id="Nombre1"
                                                   class="form-control"  maxlength="30"  disabled/>
                                        </div>

                                            <div class="col-lg-6">
                                                <label for="Nombre2">Segundo nombre </label>
                                                <input type="text" value="<?php echo $objInterno->getNombre2(); ?>" name="Nombre2" id="Nombre2"
                                                       class="form-control"  maxlength="30" disabled/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido1">Primer apellido </label>
                                                <input type="text" value="<?php echo $objInterno->getApellido1(); ?>" name="Apellido1" id="Apellido1"
                                                       class="form-control"  disabled />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido2">Segundo apellido </label>
                                                <input type="text" value="<?php echo $objInterno->getApellido2(); ?>" name="Apellido2" id="Apellido2"
                                                       class="form-control"  disabled />
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="FechaNacimiento">Fecha de nacimiento </label>
                                                <input type="date" value="<?php echo $objInterno->getFechaNacimiento(); ?>" name="FechaNacimiento" id="FechaNacimiento"
                                                       class="form-control" disabled  />
                                            </div>


                                            <div class="col-lg-6">
                                                <label for="FechaIngreso">Fecha de ingreso </label>
                                                <input type="text" value="<?php echo $objInterno->getFechaIngreso(); ?>" name="FechaIngreso" id="FechaIngreso"
                                                       class="form-control" disabled />
                                            </div>
                                        <div class="col-lg-6">
                                            <label for="FechaSalida">Fecha de Salida</label>
                                            <input type="text" value="<?php echo $objInterno->getFechaSalida(); ?>" name="FechaSalida" id="FechaSalida"
                                                   class="form-control" disabled/>
                                        </div>

                                              <div class="col-lg-6">
                                                <label for="TD">TD</label>
                                                <input type="text" value="<?php echo $objInterno->getTD(); ?>" name="TD" id="TD"
                                                       class="form-control" disabled/>
                                              </div>

                                                <div class="col-lg-6">
                                                  <label for="idTipoInterno">Tipo de interno</label>
                                                  <input type="text" value="<?php echo $objInterno->getTipoInterno(); ?>" name="idTipoInterno" id="idTipoInterno"
                                                         class="form-control" disabled />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="idTipoReclusion">Tipo de reclusión</label>
                                                  <input type="text" value="<?php echo $objInterno->getTipoReclucion(); ?>" name="idTipoReclusion" id="idTipoReclusion"
                                                         class="form-control" disabled />
                                                </div>
                                            <div class="col-lg-6">
                                                <label for="Delito">Delito</label>
                                                <input type="text" value="<?php echo $objInterno->getDelito(); ?>" name="Delito" id="Delito"
                                                       class="form-control" disabled/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="TipoVisitante">Estado</label>
                                                <select class="form-control" id="TipoVisitante" required name="TipoVisitante" disabled>
                                                    <option <?php echo ($objInterno->getEstado() == "Activo") ? "selected" : ""; ?> value="1">Interno</option>
                                                    <option <?php echo ($objInterno->getEstado() == "Inactivo") ? "selected" : ""; ?> value="2">En Libertad o Estado de baja</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="idUbicacion">Ubicacion Domiciliaria</label>
                                                <input type="text" value="<?php echo $objInterno->getUbicacion(); ?>" name="idUbicacion" id="idUbicacion"
                                                       class="form-control"  disabled/>
                                            </div><div class="col-lg-6">
                                                <label for="Carcel">Cárcel</label>
                                                <input type="text" value="<?php echo $objInterno->getNombreCarcel()?>" name="Carcel" id="Carcel"
                                                       class="form-control" disabled/>
                                            </div>
                                        </div><div class="col-lg-6">
                                            <label for="UbicacionInt">Ubicacion Interna</label>
                                            <input type="text" value="<?php echo "Patio: ".$objInterno->getPatio()." Seccion : ".$objInterno->getSeccion()." Celda: ".$objInterno->getCelda()?>" name="UbicacionInt" id="UbicacionInt"
                                                   class="form-control" disabled/>
                                        </div>

                                    </div><div class="col-lg-6">

                                    </div>

                                        </div>

                                        <div class="form-group text-center">
                                            <br><br>  <br> <br> <br>

                                            <br>
                                            <label>Reporte Realizado por: &nbsp </label> <label><?php echo $_SESSION["DataUser"]["Rango"]?></label>
                                            <br>
                                            <label><?php echo $_SESSION["DataUser"]["Apellido1"]." "?> <label><?php echo $_SESSION["DataUser"]["Apellido2"]?></label></label>
                                            <br>
                                            <label>Para la Institucion Penitenciaria:</label>
                                            <label><?php echo $objInterno->getNombreCarcel()?></label>
                                            <label><?php echo date('Y/m/d H:i') ?></label>

                                        </div>

                                    </div>
                                </div>
                        </div>



                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->

                <?php }?>

            </div>

        </div> <!-- container -->



    <footer class="footer text-right">

        2018 Software ADSI Visitor
    </footer>




<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->



<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>

</body>
</html>
