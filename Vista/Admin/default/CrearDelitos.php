<?php


session_start();
if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3"){
    header('Location: Index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlDelito.php" ?>

    <?php include("Includes/imports.php") ?>
    <script src="assets/jquery/lib/jquery.js"></script>
    <script src="assets/jquery/lib/jquery.form.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery.form.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/Validator.js"></script>

</head>


<body oncontextmenu="return false">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include("Includes/topBar.php") ?>
    <script>
        function valida(e){
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8){
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros
            patron =/[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
        function check(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[A-Za-z]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
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
                                <li class="breadcrumb-item"><a href="#">Gestión de funcionarios</a></li>
                                <li class="breadcrumb-item active">Crear delito</li>
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
                                <strong>Exito!</strong>Se ha registrado correctamente
                            </div>
                        <?php } ?>

                    </div>

                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="text-center text-custom" style="color: #0b2e13">REGISTRO DE DELITOS</h3>

                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlDelito.php?accion=Crear">

                                <fieldset title="1">
                                    <legend>Información</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label for="Delito"> Delito</label>
                                                <input type="text" class="form-control" id="Delito" name="Delito" minlength="3" maxlength="35" onkeypress="return check(event)" required autocomplete="off">
                                                <span id="name-format" class="help">Campo requerido</span>


                                            <div class="form-group">
                                                <label for="Descripcion">Descripcion</label>
                                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" minlength="5" maxlength="150" autocomplete="off" required>
                                                <span id="name-format" class="help">Campo requerido</span>
                                            </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                                                <?php echo ControlDelito::adminTableDelito()?>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                                    <input type="submit" class="btn btn-primary stepy-finish" value="Registrar">

                            </form>
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
    <script>

        $("#wizard-clickable").validate({
            rules:{
                Delito:{
                    required: true,
                    minlenght: 2,
                    maxlenght: 30

                },
                Descripcion: {
                    required: true,
                    minlenght: 2,
                    maxlenght: 150

                }
                messages:{

                    Delito: {
                        required:"Por favor ingrese un delito",
                        minlenght:"Ingrese un delito válido",
                        maxlenght:"Ingrese un delito válido"
                    },

                    Descripcion: {
                        required:"Por favor ingrese una descripción",
                        minlenght:"Ingrese una descripción válida",
                        maxlenght:"Ingrese un descripción válida"
                    }



                }

            });

        })

    </script>

</body>
</html>
