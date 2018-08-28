<?php

session_start();

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
    <title>Observador del Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/cursoController.php" ?>

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
                                <li class="breadcrumb-item active">Observador del Alumno</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="text-center text-custom"><strong>OBSERVADOR DEL ALUMNO</strong></h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede ver el Observador del Alumno y realizar el debido Proceso.
                            </p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-20">
                                                    <div class="form-group">
                                                        <label for="Curso">Seleccione el Curso o Grado al cual va a realizar la Observación:</label>
                                                        <?php echo cursoController::selectCursos(true, "idCurso", "idCurso", "form-control"); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-20">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Alumno o Estudiante</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="idEstudiante" name="idEstudiante" placeholder="Ingrese el Nombre del Alumno">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Docente</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="idDocente" name="idDocente" placeholder="Ingrese Nombre del Docente">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Fecha y Hora en que se realiza</label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="date" id="Fecha" name="Fecha">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Observación</label>
                                                            <div class="col-10">
                                                                <textarea class="form-control" rows="5" id="Observacion" name="Observacion" placeholder="Ingrese el detalle de la Observación a realizar..."></textarea>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary stepy-finish"><i class="fa fa-check-square-o"></i>&nbspRegistrar Observación</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                    </div> <!-- end card-box -->
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title" align="center"><b>Lista de Observaciones</b></h4>
                                        <p class="text-muted m-b-30 font-13" align="center">
                                            Aquí usted puede ver que Ovservaciones se han realizado a los alumnos pertenecientes a la Institución Educativa.
                                        </p>

                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table m-0 table-colored-bordered table-bordered-inverse" data-page-size="7">
                                                <thead>
                                                <tr>
                                                    <th>Curso</th>
                                                    <th>Documento</th>
                                                    <th>Tipo de Documento</th>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th>Email</th>
                                                    <th>Tipo de Observación</th>
                                                    <th>Fecha</th>
                                                    <th>Observación</th>
                                                    <th>Autor de la Observación</th>
                                                </tr>
                                                </thead>
                                                <div class="form-inline m-b-20">
                                                    <div class="row">
                                                        <div class="col-md-6 text-xs-center">
                                                            <div class="form-group">
                                                                <label class="control-label m-r-5">Status</label>
                                                                <select id="demo-foo-filter-status" class="form-control input-sm">
                                                                    <option value="">Mostrar Todos</option>
                                                                    <option value="leve">Leve</option>
                                                                    <option value="Grave">Grave</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 text-center text-right">
                                                            <div class="form-group float-right">
                                                                <input id="demo-foo-search" type="text" placeholder="Buscar" class="form-control" autocomplete="on">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <tbody>
                                                <tr>
                                                    <td>Cuarto</td>
                                                    <td>1023456789</td>
                                                    <td>C.C</td>
                                                    <td>Rincón Fonseca</td>
                                                    <td>Dayana Milena</td>
                                                    <td>dmrincon@misena.edu.co</td>
                                                    <td><span class="label label-table label-success">Leve</span></td>
                                                    <td>00-00-0000</td>
                                                    <td>Buen Estudiante</td>
                                                    <td>Profesor a Cargo</td>
                                                </tr>
                                                <tr>
                                                    <td>Sexto</td>
                                                    <td>1023456788</td>
                                                    <td>C.C</td>
                                                    <td>Salcedo Alarcon</td>
                                                    <td>Angie Lorena</td>
                                                    <td>alsalcedo@misena.edu.co</td>
                                                    <td><span class="label label-table label-success">Leve</span></td>
                                                    <td>00-00-0000</td>
                                                    <td>Buen Estudiante</td>
                                                    <td>Profesor a Cargo</td>
                                                </tr>
                                                <tr>
                                                    <td>Decimo</td>
                                                    <td>1023456700</td>
                                                    <td>C.C</td>
                                                    <td>Martinez</td>
                                                    <td>Luis</td>
                                                    <td>mllll@misena.edu.co</td>
                                                    <td><span class="label label-table label-success">Leve</span></td>
                                                    <td>00-00-0000</td>
                                                    <td>Buen Estudiante</td>
                                                    <td>Profesor a Cargo</td>
                                                </tr>
                                                <tr>
                                                    <td>Preescolar</td>
                                                    <td>1023456781</td>
                                                    <td>C.C</td>
                                                    <td>Benavides Flores</td>
                                                    <td>Santiago</td>
                                                    <td>sbenavides@misena.edu.co</td>
                                                    <td><span class="label label-table label-danger">Grave</span></td>
                                                    <td>00-00-0000</td>
                                                    <td>Mal Estudiante</td>
                                                    <td>Profesor a Cargo</td>
                                                </tr>
                                                <tr>
                                                    <td>Undecimo</td>
                                                    <td>1023456700</td>
                                                    <td>C.C</td>
                                                    <td>Fonseca Castro</td>
                                                    <td>Mireya</td>
                                                    <td>mfcastro@misena.edu.co</td>
                                                    <td><span class="label label-table label-success">Leve</span></td>
                                                    <td>00-00-0000</td>
                                                    <td>Buen Estudiante</td>
                                                    <td>Profesor a Cargo</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr class="active">
                                                    <td colspan="5">
                                                        <div class="text-right">
                                                            <ul class="pagination pagination-split footable-pagination m-t-10 m-b-0"></ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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