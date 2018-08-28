<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Administrar Cursos</title>
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
                            <h4 class="page-title float-left">Visitor</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Gestión de funcionarios</a></li>
                                <li class="breadcrumb-item active">Actualizar Funcionarios</li>
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
                            <h4 class="m-t-0 header-title" align="center">Listado general de funcionarios</h4>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Funcionarios</b></h4>

                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table m-0 table-colored-bordered table-bordered-inverse" data-page-size="6">
                                                <thead>
                                                <tr>
                                                    <th>Primer nombre</th>
                                                    <th>Segundo nombre</th>
                                                    <th>Primer apellido</th>
                                                    <th>Segundo apellido</th>
                                                    <th>Documento</th>
                                                    <th>Ruta imagen</th>

                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr>
                                                    <td>John </td>
                                                    <td>Sebastian</td>
                                                    <td>Rosero</td>
                                                    <td>Gonzales</td>
                                                    <td>1203812371</td>
                                                    <td>Koala.jpg</td>
                                                </tr>
                                                <tr>
                                                    <td>John </td>
                                                    <td>Sebastian</td>
                                                    <td>Rosero</td>
                                                    <td>Gonzales</td>
                                                    <td>1203812371</td>
                                                    <td>Koala.jpg</td>
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
