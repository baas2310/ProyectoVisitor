<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registro de Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/LogoColtenaz18.ico">

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
                                <li class="breadcrumb-item active">Registrar Alumno</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->
                <!-- Clickable Wizard -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title" align="center">Registro de alumnos</h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede registrar el Alumno de acuerdo a su Estado(Inscrito, Matriculado,etc...) y al Grado (Primero, Sexto, Once, etc...) que va a cursar; tambien usted debe registrar al Acudiente del mismo.
                            </p>

                            <form id="wizard-clickable">
                                <fieldset title="1">
                                    <legend>Información Básica del Estudiante</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Documento">* Documento</label>
                                                <input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese aquí el No. de Documento">
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombres">* Nombres</label>
                                                <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Ingrese aquí el Nombre completo">
                                            </div>

                                            <div class="form-group">
                                                <label for="Email">* Email</label>
                                                <input type="email" class="form-control" id="Email" name="Email" placeholder="direccionEmail@dominio.com">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="TipoDocumento">* Tipo de Documento</label>
                                                <select class="form-control">
                                                    <option>T.I</option>
                                                    <option>Registro Civil</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Apellidos">* Apellidos</label>
                                                <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Ingrese aquí los Apellidos">
                                            </div>

                                            <div class="form-group">
                                                <label for="ConfirmarEmail">* Confirmar Email</label>
                                                <input type="email" class="form-control" id="password2" placeholder="direccionEmail@dominio.com">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset title="2">
                                    <legend>Información Básica del Acudiente</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Documento">* Documento</label>
                                                <input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese aquí el No. de Documento">
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombres">* Nombres</label>
                                                <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Ingrese aquí el Nombre completo">
                                            </div>

                                            <div class="form-group">
                                                <label for="Email">* Email</label>
                                                <input type="email" class="form-control" id="Email" name="Email" placeholder="direccionEmail@dominio.com">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="TipoDocumento">* Tipo de Documento</label>
                                                <select class="form-control">
                                                    <option>C.C</option>
                                                    <option>C.E</option>
                                                    <option>Registro Civil</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Apellidos">* Apellidos</label>
                                                <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Ingrese aquí los Apellidos">
                                            </div>

                                            <div class="form-group">
                                                <label for="ConfirmarEmail">* Confirmar Email</label>
                                                <input type="email" class="form-control" id="password2" placeholder="direccionEmail@dominio.com">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset title="3">
                                    <legend>Datos Adicionales del Acudiente</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Numero">* Número de Celular</label>
                                                <input type="text" class="form-control" id="Numero" name="Numero" placeholder="3xx xxx xxxx">
                                            </div>

                                            <div class="form-group">
                                                <label for="Direccion">* Dirección</label>
                                                <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Calle xx No. xx - xx">
                                            </div>

                                            <div class="form-group">
                                                <label for="Password">* Contraseña</label>
                                                <input type="password" class="form-control" id="Password" name="Password" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Estado">* Estado</label>
                                                <select class="form-control">
                                                    <option>Activo</option>
                                                    <option>Inactivo</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Cargo">* Cargo</label>
                                                <select class="form-control">
                                                    <option>Acudiente</option>
                                                    <option>Padre</option>
                                                    <option>Madre</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ConfirmPassword">* Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset title="4">
                                    <legend>Finalización del Registro</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Numero">* No Celular del Estudiante</label>
                                                <input type="text" class="form-control" id="Numero" name="Numero" placeholder="3xx xxx xxxx">
                                            </div>

                                            <div class="form-group">
                                                <label for="Direccion">* Dirección del Estudiante</label>
                                                <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Calle xx No. xx - xx">
                                            </div>

                                            <div class="form-group">
                                                <label for="Password">* Contraseña del Estudiante</label>
                                                <input type="password" class="form-control" id="Password" name="Password" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Estado">* Estado</label>
                                                <select class="form-control">
                                                    <option>Inscrito</option>
                                                    <option>Matriculado</option>
                                                    <option>Expulsado</option>
                                                    <option>Retirado</option>
                                                    <option>Egresado</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Cargo">* Grado a Cursar</label>
                                                <select class="form-control">
                                                    <option>Primero</option>
                                                    <option>Tercero</option>
                                                    <option>Sexto</option>
                                                    <option>Undecimo</option>
                                                    <option>Preescolar</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ConfirmPassword">* Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <button type="submit" class="btn btn-primary stepy-finish"><i class="fa fa-check-square-o"></i>&nbspRegistrar</button>
                            </form>

                            <p class="text-muted m-b-30 font-13">
                                Los campos con un * son obligatorios para completar el Registro.
                            </p>

                        </div>
                    </div>
                </div>
                <!-- End row -->

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