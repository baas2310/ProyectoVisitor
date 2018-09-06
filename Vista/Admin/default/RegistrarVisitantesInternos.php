<?php

session_start();

require "../../../Modelo/Visitante.php";

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
    <title>Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlVisitantes.php" ?>

    <?php require "../../../Controlador/ControlSelectores.php" ?>

    <?php include("Includes/imports.php") ?>
    <script src="assets/jquery/lib/jquery.js"></script>
    <script src="assets/jquery/lib/jquery.form.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/Validator.js"></script>

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);

                    $('#preview').hide();
                    $('#preview').fadeIn(650);

                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $("input:file").change(function (){
                var fileName = $(this).val();
                readURL(this);
            });
        });
        function valida(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros
            patron = /[0-9]/;
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
                                <li class="breadcrumb-item"><a href="#">Gestión de visitante</a></li>
                                <li class="breadcrumb-item active">Registro de visitantes</li>
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
                            <h3 class="text-center text-custom" style="color: #0b2e13">REGISTRO DE VISITANTE</h3>




                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlVisitantes.php?accion=CrearVisitInt" enctype='multipart/form-data'>

                                <div class="form-group">
                                    <label for="IdRegistrador"></label>
                                    <input type="text" value="<?php echo $_SESSION["DataUser"]["IdFuncionario"]?>" class="form-control" id="IdRegistrador" name="IdRegistrador" hidden>
                                </div>
                                <fieldset title="1">
                                    <legend>Información </legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for="Cedula"> Cédula </label>
                                                <input type="text" class="form-control" id="Cedula" name="Cedula" minlength="7" maxlength="15"  onkeypress="return valida(event)" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombre1">Primer nombre</label>
                                                <input type="text" class="form-control" id="Nombre1" name="Nombre1" minlength="2" maxlength="30" onkeypress="return check(event) " required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombre2">Segundo nombre</label>
                                                <input type="text" class="form-control" id="Nombre2" name="Nombre2" maxlength="30">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Patentesco</label>

                                                <?php echo ControlSelectores::SelectParentesco()?>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Apellido1">Primer apellido</label>
                                                <input type="text" class="form-control" id="Apellido1" name="Apellido1" minlength="2" maxlength="30" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Apellido2">Segundo apellido</label>
                                                <input type="text" class="form-control" id="Apellido2" name="Apellido2"  minlength="2" maxlength="30" >
                                            </div>

                                            <div class="form-group">
                                                <input type='file' id="urlImagen" />
                                                <div id='img_contain'><img id="preview" name="preview" align='middle' src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title='' aria-describedby="fileHelp" /></div>
                                                <small id="fileHelp" class="form-text text-muted">Archivos permitidos (.jpg .png .gif)</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="Observaciones">Observaciones</label>
                                                <input type="text" class="form-control" id="Observaciones" name="Observaciones" maxlength="125" required >
                                            </div>

                                            <div class="form-group">
                                                <label for="Fecha"></label>
                                                <input type="text" value="<?php echo date('Y/m/d H:i:s')?>" class="form-control" id="Fecha" name="Fecha"  hidden>
                                            </div>
                                    </div>

                                </fieldset>



                                <input type="submit" class="btn btn-primary stepy-finish" value="Registrar persona">

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
<script>
    $("#wizard-clickeable").validate({
        rules: {
            Nombre1: {
                required: true,
                minlenght: 2,
                maxlenght: 30
            },
            Apellido1: {
                required: true,
                minlenght: 2,
                maxlenght: 30
            },
            Cedula: {
                required: true,
                minlenght: 7,
                maxlenght: 15
            },


            Observaciones: {
                required: true,
                minlenght:5,
                maxlenght:150
            }

        }
        messages:{
            Nombre1:{
                required: "Por favor digite su nombre",
                minlenght: "Por favor digite un nombre válido"
                maxlenght:"Por favor digite un nombre válido"
            },
            Apellido1:{
                required: "Por favor digite su primer apellido",
                minlenght:"Por favor digite un apellido válido",
                maxlenght: "Por favor digite un apellido válido"
            },
            Cedula:{
                required: "Por favor digite su cédula"
                minlenght:"Por favor digite una cédula válida",
                maxlenght:"Por favor digite una cédula válida"
            }
            Observaciones:{
                required:"Por favor digite la observación respectiva",
                minlenght:"Por favor digite una observación de por lo menos 5 caracteres",
                maxlenght:"Ha alcanzado el limite de caracteres"
            }


        }


    });

</script>

</body>
</html>
