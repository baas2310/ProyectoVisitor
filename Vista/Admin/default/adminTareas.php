<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Administrar Asignaturas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

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
                                <li class="breadcrumb-item"><a href="#">Docentes</a></li>
                                <li class="breadcrumb-item active">Administrar Tareas</li>
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
                            <h4 class="m-t-0 header-title" align="center">Registrar Tarea</h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede ver las Tareas asiganadas a los Cursos y realizar el debido Proceso.
                            </p>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-20">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Docente</label>
                                                            <div class="col-10">
                                                                <input disabled type="text" class="form-control" id="idDocente" name="idDocente" placeholder="Carga el Nombre del Docente...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Curso</label>
                                                            <div class="col-10">
                                                                <select class="form-control">
                                                                    <option>Selecciones el Curso o Grado en que Dicta clases...</option>
                                                                    <option>Primero</option>
                                                                    <option>Tercero</option>
                                                                    <option>Sexto</option>
                                                                    <option>Octavo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Materia</label>
                                                            <div class="col-10">
                                                                <select class="form-control">
                                                                    <option>Selecciones la Asignatura o Materia que Dicta clases...</option>
                                                                    <option>Matematicas</option>
                                                                    <option>Informatica</option>
                                                                    <option>Sociales</option>
                                                                    <option>Filosofia</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Tarea</label>
                                                            <div class="col-10">
                                                                <textarea class="form-control" rows="5" id="Observacion" name="Observacion" placeholder="Ingrese la descripción de la Tarea..."></textarea>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary stepy-finish"><i class="fa fa-check-square-o"></i>&nbspRegistrar Tarea</button>
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
                                        <h4 class="m-t-0 header-title" align="center"><b>Lista de Tareas</b></h4>
                                        <p class="text-muted m-b-30 font-13" align="center">
                                            Aquí usted puede ver que Tareas se han asignado a los Cursos en los cuales usted dicta clases.
                                        </p>

                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table m-0 table-colored-bordered table-bordered-inverse" data-page-size="7">
                                                <thead>
                                                <tr>
                                                    <th>Curso o Grado</th>
                                                    <th>Asignatura o Materia</th>
                                                    <th>Docente</th>
                                                    <th>Alumno o Estudiante</th>
                                                    <th>Tarea</th>
                                                    <th>Estado de la Tarea</th>
                                                </tr>
                                                </thead>
                                                <div class="form-inline m-b-20">
                                                    <div class="row">
                                                        <div class="col-md-6 text-xs-center">
                                                            <div class="form-group">
                                                                <label class="control-label m-r-5">Status</label>
                                                                <select id="demo-foo-filter-status" class="form-control input-sm">
                                                                    <option value="">Mostrar Todos</option>
                                                                    <option value="calificada">Calificada</option>
                                                                    <option value="por revisar">Por Revisar</option>
                                                                    <option value="pendiente">Pendiente</option>
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
                                                    <td>Undecimo</td>
                                                    <td>Informatica</td>
                                                    <td>Gustavo Jimenez</td>
                                                    <td>Dayana Milena Rincón Fonseca</td>
                                                    <td>Programar como los dioses</td>
                                                    <td><span class="label label-table label-inverse">Por Revisar</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Undecimo</td>
                                                    <td>Informatica</td>
                                                    <td>Gustavo Jimenez</td>
                                                    <td>Angie Lorena Salcedo Alarcon</td>
                                                    <td>Programar como los dioses</td>
                                                    <td><span class="label label-table label-inverse">Por Revisar</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Undecimo</td>
                                                    <td>Informatica</td>
                                                    <td>Gustavo Jimenez</td>
                                                    <td>Néstor Javier Riaño Nossa</td>
                                                    <td>Programar como los dioses</td>
                                                    <td><span class="label label-table label-success">Calificada</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Undecimo</td>
                                                    <td>Informatica</td>
                                                    <td>Gustavo Jimenez</td>
                                                    <td>Duvan Arnulfo Ponguta</td>
                                                    <td>Programar como los dioses</td>
                                                    <td><span class="label label-table label-danger">Pendiente</span></td>
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