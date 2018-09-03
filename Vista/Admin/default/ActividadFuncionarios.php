<?php

session_start();
if (empty($_SESSION["DataUser"]["IdFuncionario"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"];

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

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlActividades.php" ?>

    <!-- Imports -->
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
                                <li class="breadcrumb-item active">Funcionarios</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->
                <!-- Accordion -->
                <!-- <div class="row">
                  <div class="col-lg-6"> -->
                <div id="accordion" class="m-b-20">
                    <div class="card">
                        <div class="card-header p-3" id="headingOne">
                            <h6 class="m-0">
                                <a href="#collapseOne" class="text-dark" data-toggle="collapse"
                                        aria-expanded="false"
                                        aria-controls="collapseOne">
                                    HISTORIAL DE CREACION DE INTERNOS
                                </a>
                            </h6>
                        </div>

                        <div id="collapseOne" class="collapse show"
                                aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              <div class="panel-body">

                                  <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                                        <div class="pad-btm form-inline">
                                          <div class="row">
                                              <div class="col-sm-6 text-xs-center">
                                              </div>
                                          </div>
                                      </div>
                                        <?php echo ControlActividades::adminTableRegistroInterno($_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"]); ?>
                                    </table>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-3" id="headingTwo">
                            <h6 class="m-0">
                                <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse"
                                        aria-expanded="false"
                                        aria-controls="collapseTwo">
                                   HISTORIAL DE MODIFICACIONES INTERNAS
                                </a>
                            </h6>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                            <div class="card-body">
                              <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">

                                      <div class="pad-btm form-inline">
                                          <div class="row">
                                              <div class="col-sm-6 text-xs-center">
                                              </div>
                                          </div>
                                      </div>

                                      <?php echo ControlActividades::adminTableAlertas($_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"]); ?>

                                  </table>

                            </div>
                        </div>
                        <div id="accordion" class="m-b-20">
                            <div class="card">
                                <div class="card-header p-3" id="headingThree">
                                    <h6 class="m-0">
                                        <a href="#collapseThree" class="text-dark" data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="collapseThree">
                                            HISTORIAL DE CREACION DE USUARIOS
                                        </a>
                                    </h6>
                                </div>

                                <div id="collapseThree" class="collapse show"
                                     aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="panel-body">
                                            <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                                                <div class="pad-btm form-inline">
                                                    <div class="row">
                                                        <div class="col-sm-6 text-xs-center">
                                                        </div>
                                                    </div>
                                                </div>
                                              <?php echo ControlActividades::adminTableRegistroVisita($_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"]); ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-3" id="headingFour">
                                    <h6 class="m-0">
                                        <a href="#collapseFour" class="text-dark collapsed" data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="collapseFour">
                                            HISTORIAL DE MODIFICACIONES INTERNAS
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">

                                            <div class="pad-btm form-inline">
                                                <div class="row">
                                                    <div class="col-sm-6 text-xs-center">
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo ControlActividades::adminTableAlertaVisita($_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"]); ?>

                                        </table>

                                    </div>
                                </div>
                    </div>


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

<?php include ("Includes/scripts.php")?>

</body>
</html>
