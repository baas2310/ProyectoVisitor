<?php

/*session_start();

require "../../../Modelo/estudiante.php";

if (empty($_SESSION["DataUser"]["idRol"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["idRol"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
    header('Location: Index.php');
}*/

$Documento = $_POST['Documento'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['Sujeto'];

  if (!empty($documento)|| !empty($asunto) || !empty($mensaje)) {
      if (mail('jramirez485@misena.edu.co', $asunto,$mensaje)
          echo "email enviado con exito";
  }else{
  echo "Por favor verifique los datos e intente nuevamente ";
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
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Summernote css -->
    <link href="../plugins/summernote/summernote-bs4.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>


    <!-- Controlador Necesario -->
    <?php /*require "../../../Controlador/InternoController.php" */?>

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

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Visitor</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Gestión de funcionario</a></li>
                                <li class="breadcrumb-item active">Help desk</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <!-- Right Sidebar -->
                    <div class="col-lg-12">
                        <div class="card-box">
                            <!-- Left sidebar -->
                            <div class="inbox-leftbar">


                            </div>
                            <!-- End Left sidebar -->

                            <div class="inbox-rightbar">
                            </div>



                                <div class="card-box m-t-20">

                                    <form role="form">
                                        <!-- <div class="form-group">
                                          <label for="Documento">Documento</label>
                                           <?php /*echo Controlador::selectDocumento(true, "idDocumento", "Documento", "form-control");*/ ?>
                                        </div> -->

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Receptor" id="Receptor" name="Receptor">
                                        </div>
                                        <div class="form-group">
                                            <div class="summernote">

                                            </div>
                                        </div>

                                        <div class="form-group m-b-0">
                                            <div class="text-right">
                                                <button class="btn btn-purple waves-effect waves-light"> <span>Enviar</span> <i class="fa fa-send m-l-10"></i> </button>
                                            </div>
                                        </div>

                                    </form>
                                </div> <!-- end card-->

                            </div>

                            <div class="clearfix"></div>
                        </div>

                    </div> <!-- end Col -->

                </div><!-- End row -->


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



<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>

<!--Summernote js-->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 250,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
    });
</script>

</body>
</html>
