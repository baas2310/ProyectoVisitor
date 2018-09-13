<?php

session_start();
require "../../../Modelo/Interno.php";


if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3"){
    header('Location: Index.php');
}
require ('conexion.php');
$query = "SELECT IdCarcel, NombreCarcel FROM tbCarcel ORDER BY NombreCarcel";
$resultado=$mysqli->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Scripts -->
    <?php include("Includes/imports.php") ?>
    <script src="assets/jquery/lib/jquery.js"></script>
    <script src="assets/jquery/lib/jquery.form.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script language="javascript" src="assets/jquery/lib/jquery-3.1.1.js"></script>
    <script language="javascript" src="assets/jquery/lib/Validator.js"></script>

    <script language="javascript">
        $(document).ready(function(){
            $("#cbx_Carcel").change(function () {

                $("#cbx_Carcel option:selected").each(function () {
                    IdCarcel = $(this).val();
                    $.post("includes/getCarcel.php", { IdCarcel: IdCarcel }, function(data){
                        $("#cbx_Ubicacion").html(data);
                    });
                });
            })
        });
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

    </script>
</head>


<body onunload="funcionCalculo()">

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
                                <li class="breadcrumb-item"><a href="#">Gestión de internos</a></li>
                                <li class="breadcrumb-item active">Actualizar internos</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">


                    <?php if (!isset($_GET["IdInterno"])){ ?>

                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al interno.<strong> Error: no se encontro la informacion del interno.</strong> Puede administrar los Usuarios desde <a href="ListarInterno.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                    $IdInterno = $_GET["IdInterno"];
                    $_SESSION["IdInterno"] = $IdInterno;
                    $objInterno = Interno::buscarId($IdInterno);
                    ?>



                    <div class="col-lg-10 center-page">

                        <div class="card-box">


                            <h4 class="text-center text-custom">ACTUALIZAR INTERNO</h4>


                            <br>

                            <form role="form" method="post" action="../../../Controlador/ControlInternos.php?accion=Editar">
                                <div class="row ">
                                    <div class="col-xs-9 center-page" style="width: 83%">



                                        <div class="row">
                                            <div class=""col-lg-6">
                                            <label for="urlImagen">Foto</label>
                                            <br>
                                            <img src="../../../ImagenesVisitas/<?php echo $objInterno->getUrlImagen(); ?>" id="preview"/>
                                        </div>
                                        <br>
                                        <div class="col-lg-6">
                                            <label for="TD">TD</label>
                                            <input type="text" value="<?php echo $objInterno->getTD(); ?>" name="TD" id="TD"
                                                   class="form-control" disabled/>
                                        </div>
                                            <div class="col-lg-6">

                                                <label for="Nombre1">Primer nombre </label>

                                                <input type="text" value="<?php echo $objInterno->getNombre1(); ?>" name="Nombre1" id="Nombre1"
                                                       class="form-control"  maxlength="30"  disabled/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Nombre2">Segundo nombre </label>
                                                <input type="text" value="<?php echo $objInterno->getNombre2(); ?>" name="Nombre2" id="Nombre2"
                                                       class="form-control"  maxlength="30" disabled/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido1">Primer apellido </label>
                                                <input type="text" value="<?php echo $objInterno->getApellido1(); ?>" name="Apellido1" id="Apellido1"
                                                       class="form-control" minlength="2" maxlength="30" disabled />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido2">Segundo apellido </label>
                                                <input type="text" value="<?php echo $objInterno->getApellido2(); ?>" name="Apellido2" id="Apellido2"
                                                       class="form-control"  maxlength="30" disabled />
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="FechaNacimiento">Fecha de nacimiento </label>
                                                <input type="date" value="<?php echo $objInterno->getFechaNacimiento(); ?>" name="FechaNacimiento" id="FechaNacimiento"
                                                       class="form-control" disabled  />
                                            </div>


                                            <div class="col-lg-6">
                                                <label for="FechaIngreso">Fecha de ingreso </label>
                                                <input type="text" value="<?php echo $objInterno->getFechaIngreso(); ?>" name="FechaIngreso" id="FechaIngreso"
                                                       class="form-control" disabled />
                                            </div>
                                                <div class="col-lg-6">
                                                  <label for="idTipoInterno">Tipo de interno</label>
                                                  <input type="text" value="<?php echo $objInterno->getTipoInterno(); ?>" name="idTipoInterno" id="idTipoInterno"
                                                         class="form-control" disabled />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="idTipoReclusion">Tipo de reclusión</label>
                                                  <input type="text" value="<?php echo $objInterno->getTipoReclucion(); ?>" name="idTipoReclusion" id="idTipoReclusion"
                                                         class="form-control" disabled />
                                                </div>
                                            <div class="col-lg-6">
                                                <label for="Delito">Delito</label>
                                                <input type="text" value="<?php echo $objInterno->getDelito(); ?>" name="Delito" id="Delito"
                                                       class="form-control" disabled/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="TipoVisitante">Estado</label>
                                                <select class="form-control" id="TipoVisitante" required name="TipoVisitante" disabled>
                                                    <option <?php echo ($objInterno->getEstado() == "Activo") ? "selected" : ""; ?> value="1">Interno</option>
                                                    <option <?php echo ($objInterno->getEstado() == "Inactivo") ? "selected" : ""; ?> value="2">En Libertad o Estado de baja</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="cbx_Carcel">Carcel</label>
                                                <select class="form-control" name="cbx_Carcel" required id="cbx_Carcel">
                                                    <option value=""><?php echo $objInterno->getNombreCarcel()?> </option>
                                                    <?php while($row = $resultado->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['IdCarcel']; ?>"><?php echo $row['NombreCarcel']; ?></option>
                                                    <?php } ?>
                                                </select>


                                                <div class="form-group">
                                                    <label for="cbx_Ubicacion">Ubicación </label>
                                                    <select class="form-control" name="cbx_Ubicacion" required id="cbx_Ubicacion" >
                                                        <option value=""><?php echo "Patio: ".$objInterno->getPatio()." Seccion : ".$objInterno->getSeccion()." Celda: ".$objInterno->getCelda()?> </option>
                                                    </select>
                                                <div class="form-group">
                                                </div>
                                                  <label for="idUbicacion">Ubicacion Domiciliaria</label>
                                                  <input type="text" value="<?php echo $objInterno->getUbicacion(); ?>" name="idUbicacion" id="idUbicacion"
                                                         class="form-control" />
                                                </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <br><br>  <br> <br> <br>
                                            <button onclick=" location.href='ListarInterno.php'" type="reset" class="btn btn-gris font-15">
                                                <strong>Cancelar</strong>
                                            </button>




                                            <button type="submit" class="btn btn-verde  font-15" value="validate"   style= "border-radius: 5px">
                                                <strong>Guardar</strong>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                        </div>


                        </form>
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


</div>
<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>
<script>
    $("#wizard-clickeable").validate({
        rules:{
            Nombre1:{
                required: true,
                minlenght: 2,
                maxlenght: 30
            },
            Apellido1: {
                required: true,
                minlenght: 2,
                maxlenght: 30
            },
            Cedula:{
                required: true,
                minlenght:7,
                maxlenght:15
            },

            TD: {
                required: true,
                minlenght:5
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
            TD:{
                required:"Por favor digite el TD",
                minlenght:"Por favor digite un TD válido"
            }




        }




    });

</script>
<script type="text/javascript">
    function funcionCalculo() {
        //Llamada XMLHttpRequest de JavaScript (para evitar un pedazo de código, pongo la solución en JQUERY)
        $.ajax({
            session_destroy();
            success: function(){
                alert("TODO CORRECTO");
            }
        });
    }
</script>

</body>
</html>
