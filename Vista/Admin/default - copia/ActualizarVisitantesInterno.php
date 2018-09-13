<?php

session_start();
require "../../../Modelo/Visitante.php";
require "../../../Modelo/Interno.php";


if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

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

    <!-- Scripts -->
    <?php include("Includes/imports.php") ?>
    <?php require "../../../Controlador/ControlSelectores.php" ?>
    <script src="assets/jquery/lib/jquery.js"></script>
    <script src="assets/jquery/lib/jquery.form.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/Validator.js"></script>

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
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);

                    $('#preview').hide();
                    $('#preview').fadeIn(650);

                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $("input:file").change(function (){
                var fileName = $(this).val();
                readURL(this);
            });
        });
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
                                <li class="breadcrumb-item"><a href="#">Gestión de visitantes</a></li>
                                <li class="breadcrumb-item active">Actualizar visitantes</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">

                    <?php if (!isset($_GET["IdVisitante"])){ ?>
                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al visitante.<strong> Error: no se encontro la informacion del visitante.</strong> Puede administrar los visitantes desde <a href="ListarVisitantes.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                    $IdVisitante = $_GET["IdVisitante"];
                    $_SESSION["IdVisitante"] = $IdVisitante;
                    $objVisitante = Visitante::buscarIdVint($IdVisitante);
                    ?>



                    <div class="col-lg-10 center-page">

                        <div class="card-box">


                            <h4 class="text-center text-custom">ACTUALIZAR VISITANTES</h4>



                            <br>

                            <form role="form" method="post" action="../../../Controlador/ControlVisitantes.php?accion=EditarVisitaInt" enctype='multipart/form-data'>
                                <div class="row ">
                                    <div class="col-xs-9 center-page" style="width: 83%">
                                        <label for="IdRegistrador"></label>
                                            <input type="text" value="<?php echo $_SESSION["DataUser"]["IdFuncionario"]?>" name="IdRegistrador" id="IdRegistrador"
                                                   class="form-control"  hidden/>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="Cedula">Cedula </label>
                                                <input type="text" value="<?php echo $objVisitante->getCedula(); ?>" name="Cedula" id="Cedula"
                                                 class="form-control" minlength="7" maxlength="15"  onkeypress="return valida(event)" required/>
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="Nombre1">Primer nombre </label>
                                                <input type="text" value="<?php echo $objVisitante->getNombre1(); ?>" name="Nombre1" id="Nombre1"
                                                       class="form-control" onkeypress="check(event)" required/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Nombre2">Segundo nombre </label>
                                                <input type="text" value="<?php echo $objVisitante->getNombre2(); ?>" name="Nombre2" id="Nombre2"
                                                       class="form-control" maxlength="30" onkeypress="check(event)"  />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido1">Primer apellido </label>
                                                <input type="text" value="<?php echo $objVisitante->getApellido1(); ?>" name="Apellido1" id="Apellido1"
                                                       class="form-control" minlength="2" maxlength="30" onkeypress="check(event)" required />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido2">Segundo apellido </label>
                                                <input type="text" value="<?php echo $objVisitante->getApellido2(); ?>" name="Apellido2" id="Apellido2"
                                                       class="form-control" maxlength="30" onkeypress="check(event)"  />
                                            </div>

                                            <div class="col-lg-6">


                                                <label for="TipoVisitante">Tipo de visitante</label>
                                                <select class="form-control" id="TipoVisitante" required name="TipoVisitante">
                                                    <option <?php echo ($objVisitante->getTipoVisitante() == "Visitante Ocasional") ? "selected" : ""; ?> value="1">Visitante Ocasional</option>
                                                    <option <?php echo ($objVisitante->getTipoVisitante() == "Visitante Interno") ? "selected" : ""; ?> value="2">Visitante Interno</option>
                                                    <option <?php echo ($objVisitante->getTipoVisitante() == "Abogados") ? "selected" : ""; ?> value="3">Abogados</option>
                                                    </select>


                                            </div>


                                            <div class="col-lg-6">
                                                <label for="Observaciones">Observaciones</label>
                                                <input type="text"  name="Observaciones" id="Observaciones"
                                                       class="form-control" minlength="5" maxlength="150" />
                                            </div>

                                            <div class="form-group">
                                                <label for="Parentesco">Parentesco</label>
                                                <input type="text" value="<?php echo $objVisitante->getParentesco(); ?>" name="Parentesco" id="Parentesco" class="form-control"  maxlength="30" disabled />
                                            </div>

                                            <div class="form-group">
                                              <label for="Fecha"></label>
                                                <input type="text" value="<?php echo date('Y/m/d H:i:s')?>" class="form-control" id="Fecha" name="Fecha" hidden >
                                            </div>
                                            <br><br>
                                            <div class="col-lg-6">
                                                <label for="mod">Ultima modificacion</label>
                                                <input type="text" value="<?php echo $objVisitante->getObservaciones(); ?>" name="mod" id="mod" class="form-control"  disabled />
                                            </div>
                                            <br><br>

                                            <div class="form-group">
                                                <img src="../../../ImagenesVisitas/<?php echo $objVisitante->getUrlImagen(); ?>" id="preview"/>
                                                <label for="urlImagen">Foto</label>
                                                <input type='file' id="urlImagen" name="urlImagen" />
                                                <small id="fileHelp" class="form-text text-muted">Archivos permitidos (.jpg .png .gif)</small>
                                            </div>

                                        </div>


                                        <div class="form-group text-center">


                                            <button onclick=" location.href='RegistroVisitasInterno.php?IdRegistro=<?php echo $_SESSION["IdRegistro"]?>' " type="reset" class="btn btn-gris font-15" style="border-radius: 5px">
                                                <strong>Cancelar</strong>
                                            </button>



                                            <button type="submit" class="btn btn-verde  font-15" value="validate"   style= "border-radius: 5px">
                                                <strong>Guardar</strong>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                        </div>



                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->

                <?php }?>

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
