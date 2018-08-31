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
                                <strong>Exito!</strong>Se ha registrado correctamente </a>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="text-center text-custom" style="color: #0b2e13">FORMULARIO DE VISITAS</h3>




                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlFuncionarios.php?accion=Crear">

                                <fieldset >
                                    <legend>Datos básicos  </legend>

                                    <div class="row m-t-20">
                                        <div class="col-lg-6">
                                            <label for="Cedula">Cédula </label>
                                            <input type="text" class="form-control" id="Cedula" name="Cedula" data-parsley-type="number" required>
                                            <form action="">
                                            <button name="BuscarDatos" value="..." id="BuscarDatos"></button>
                                            </form>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="Nombre1">Primer nombre</label>
                                            <input type="text" value="<?php echo $objFuncionario->getNombre1(); ?>" name="Nombre1" id="Nombre1"
                                                   class="form-control"  required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="Nombre2">Segundo nombre </label>
                                            <input type="text" value="<?php echo $objFuncionario->getNombre2(); ?>" name="Nombre2" id="Nombre2"
                                                   class="form-control"  />
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="Apellido1">Primer apellido </label>
                                            <input type="text" value="<?php echo $objFuncionario->getApellido1(); ?>" name="Apellido1" id="Apellido1"
                                                   class="form-control" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="FechaNacimiento"> Fecha de nacimiento </label>
                                            <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento"  required>
                                        </div>
                                        <div class="col-sm-6">


                                            <div class="form-group ">

                                            </div>
                                            <div class="form-group">
                                               <?php
                                               include ("conexion.php");
                                               $query = "Select UrlImagen from tbVisitante ";
                                               $resultado= $conexion->query($query);
                                               ?>
                                               <?php echo $row ["UrlImagen"] ;  ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="Rango">Rango</label>
                                                <input type="text" class="form-control" id="Rango" name="Rango"
                                                       parsley-trigger="change" required>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset title="2">
                                    <legend>Datos Inicio Sesión </legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">



                                            <div class="form-group">
                                                <label for="Usuario">Usuario</label>
                                                <input type="text" class="form-control" id="Usuario" name="Usuario"
                                                       parsley-trigger="change" required>

                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Contraseña</label>
                                                <input type="password" class="form-control" id="Password" name="Password"
                                                       placeholder="" parsley-trigger="change" required>
                                            </div>


                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="Password2">Confirmar Contraseña</label>
                                                <input data-parsley-equalto="#Password"type="password" class="form-control"
                                                       id="Password2" name="Password2" placeholder="" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Permiso</label>
                                                <select class="form-control" id="Permiso" required name="Permiso">

                                                    <option value="3">Administrador 1</option>
                                                    <option value="4">Administrador 2</option>
                                                    <option value="5">Administrador 3</option>
                                                    <option value="6">Auxiliar 1</option>
                                                    <option value="7">Auxiliar 2</option>
                                                    <option value="8">Auxiliar 3</option>

                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="departamentp">Departamento </label>
                                                <select class="form-control" name="departamento" id="departamento">
                                                    <option value="0">Seleccionar departamento</option>
                                                    <?php while($row = $resultado->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['id_departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                                    <?php } ?>
                                                </select>


                                                <div class="form-group">
                                                    <label for="municipio">Municipio </label>
                                                    <select class="form-control" name="municipio" id="municipio">

                                                    </select>
                                                </div>
                                            </div>

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