<?php

session_start();
require "../../../Modelo/usuario.php";


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
    <title>Actualizar Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/LogoColtenaz18.ico">

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
                            <h4 class="page-title float-left">Sistema de Gestión de Procesos Academicos Institución Educativa Técnica de Nazareth Nobsa.</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Administración</a></li>
                                <li class="breadcrumb-item active">Actualizar Alumno</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">


                    <?php if (!isset($_GET["IdEstudiante"])){ ?>
                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al Alumno.<strong>Error: no se encontro la informacion del Alumno.</strong> Puede administrar los Alumnos desde <a href="adminAlumnos.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                        $IdEstudiante = $_GET["IdEstudiante"];
                        $_SESSION["IdEstudiante"] = $IdEstudiante;
                        $objEstudiante = Estudiante::buscarForId($IdEstudiante);
                        ?>






                        <div class="col-lg-10 center-page">

                            <div class="card-box">

                                <h4 class="text-center text-custom"><strong>ACTUALIZAR ESTUDIANTE</strong></h4>

                                <br>

                                <form role="form" method="post" action="estudianteController.php?action=editar">

                                    <div class="row ">
                                        <div class="col-xs-9 center-page" style="width: 83%">

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <label for="Documento"><strong>Documento Identidad</strong><span class="text-danger">*</span> </label>
                                                    <input type="text" value="<?php echo $objEstudiante->getDocumento(); ?>" name="Documento" id="Documento"
                                                           class="form-control" data-parsley-type="number" required
                                                           placeholder="Ingrese número de documento"/>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="TipoDocumento"><strong>Tipo Documento</strong><span class="text-danger">*</span></label>
                                                    <select class="form-control" data-style="btn-verde btn-bordered" id="TipoDocumento" required name="TipoDocumento">
                                                        <option <?php echo  ($objEstudiante->getTipoDocumento() == "T.I") ? "selected" : ""; ?> value="T.I">T.I</option>
                                                        <option <?php echo ($objEstudiante->getTipoDocumento() == "Registro Civil") ? "selected" : ""; ?> value="Registro Civil">Registro Civil</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row ">

                                                <div class="col-lg-6">
                                                    <label for="Apellidos"><strong>Apellidos</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objEstudiante->getApellidos(); ?>" name="Apellidos" parsley-trigger="change" required
                                                           placeholder="Ingrese apellidos completos" class="form-control" id="Apellidos" >
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Nombres"><strong>Nombres</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objEstudiante->getNombres(); ?>" name="Nombres" required
                                                           parsley-trigger="change" placeholder="Ingrese nombres completos" class="form-control" id="Nombres" >
                                                </div>

                                            </div>

                                            <br>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="Email"><strong>Email</strong><span class="text-danger">*</span></label>
                                                    <input type="email" value="<?php echo $objEstudiante->getEmail(); ?>" name="Email" parsley-trigger="change" required
                                                           placeholder="direccionEmail@dominio.com" class="form-control" id="Email">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Celular"><strong>Celular</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objEstudiante->getCelular(); ?>" placeholder="3xx xxx xxxx" name="Celular" id="Celular" required
                                                           data-mask="3xx xxx xxxx" class="form-control">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <label for="Direccion"><strong>Direccion</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objEstudiante->getDireccion(); ?>" name="Direccion" parsley-trigger="change" required
                                                           placeholder="Ingrese Dirección de Residencia" class="form-control" id="Direccion" >
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="idRol"><strong>Rol</strong><span class="text-danger">*</span></label>
                                                    <select class="form-control" data-style="btn-verde btn-bordered" id="idRol" required name="idRol">
                                                        <option <?php echo ($objEstudiante->getIdRol() == "7") ? "selected" : ""; ?> value="7">Estudiante</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <br>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <label for="Password"><strong>Contraseña</strong><span class="text-danger">*</span></label>
                                                    <input id="Password" value="<?php echo $objEstudiante->getPassword(); ?>" name="Password" type="password" placeholder="Contraseña" required
                                                           class="form-control">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Password2"><strong>Confirme Contraseña</strong><span class="text-danger">*</span></label>
                                                    <input data-parsley-equalto="#Password" type="password" required
                                                           placeholder="Repetir contraseña" class="form-control" id="Password2">
                                                </div>

                                            </div>

                                            <br>

                                            <br>

                                            <div class="form-group text-center">

                                                <button onclick=" location.href='adminAlumnos.php'" type="reset" class="btn btn-gris font-15" style="border-radius: 5px">
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

<?php include("Includes/scripts.php") ?>

</body>
</html>
