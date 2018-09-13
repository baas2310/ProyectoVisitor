<?php

session_start();

require "../../../Modelo/Interno.php";

if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
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
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlInternos.php" ?>
    <?php require "../../../Controlador/ControlSelectores.php" ?>
    <?php include("Includes/imports.php") ?>

    <script language="javascript" src="assets/"></script>
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
        function IsNumeric(valor)
        {
        var log=valor.length; var sw="S";
        for (x=0; x<log; x++)
        { v1=valor.substr(x,1);
        v2 = parseInt(v1);
        //Compruebo si es un valor numérico
        if (isNaN(v2)) { sw= "N";}
        }
        if (sw=="S") {return true;} else {return false; }
        }
        function formateafecha(fecha)
        {
          var primerslap=false;
          var segundoslap=false;
          var long = fecha.length;
          var dia;
          var mes;
          var ano;
          if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2);
          if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; }
          else { fecha=""; primerslap=false;}
          }
          else
          { dia=fecha.substr(0,1);
          if (IsNumeric(dia)==false)
          {fecha="";}
          if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; }
          }
          if ((long>=5) && (segundoslap==false))
          { mes=fecha.substr(3,2);
          if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; }
          else { fecha=fecha.substr(0,3); segundoslap=false;}
          }
          else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } }
          if (long>=7)
          { ano=fecha.substr(6,4);
          if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); }
          else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>2018)) { fecha=fecha.substr(0,6); } } }
          }
          if (long>=10)
          {
          fecha=fecha.substr(0,10);
          dia=fecha.substr(0,2);
          mes=fecha.substr(3,2);
          ano=fecha.substr(6,4);
          // Año no viciesto y es febrero y el dia es mayor a 28
          if ( (ano%4 != 0) && (mes == 2) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; }
          }
          return (fecha);
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
        function valida(e){
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8 ){
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
</head>


<body oncontextmenu="return false">

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
                                <li class="breadcrumb-item"><a href="#">Gestión de Visitantes</a></li>
                                <li class="breadcrumb-item active">Registro de internos</li>
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
                            <h3 class="text-center text-custom"  >REGISTRO DE INTERNOS</h3>



                            <form id="wizard-clickeable" role="form" method="post" action="../../../Controlador/ControlInternos.php?accion=crear" enctype='multipart/form-data'>

                                <fieldset >
                                    <legend style="color: #38586c;">Información </legend>
                                    <div class="form-group">
                                        <label for="IdRegistrador"></label>
                                        <input type="text" value="<?php echo $_SESSION["DataUser"]["IdFuncionario"]?>" class="form-control" id="IdRegistrador" name="IdRegistrador"  hidden>

                                    </div>

                                    <div class="row m-t-20">
                                        <div class="col-sm-5">

                                            <div class="form-group">
                                                <label for="Cedula">Cedula</label>
                                                <input type="text" class="form-control" id="Cedula" name="Cedula"  minlength="7" maxlength="15"  onkeypress="return valida(event)" required autocomplete="off">
                                                <span id="name-format" class="help">Campo requerido</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="PrimerNombre">Primer nombre</label>
                                                <input type="text" class="form-control" id="PrimerNombre" name="PrimerNombre" minlength="2" maxlength="30" onkeypress="return check(event) " required autocomplete="off">
                                                <span id="name-format" class="help">Campo requerido</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="SegundoNombre">Segundo nombre</label>
                                                <input type="text" class="form-control" id="SegundoNombre" name="SegundoNombre"  maxlength="30" onkeypress="return check(event) " autocomplete="off">
                                                <span id="name-format" class="help">Campo no requerido</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="FechaNacimiento"> Fecha de nacimiento </label>
                                                <input type="text" size="10" class="form-control" id="FechaNacimiento" name="FechaNacimiento" onKeyUp = "this.value=formateafecha(this.value);" max=<?php $hoy=date("Y-m-d"); echo $hoy;?> required maxlength="10" autocomplete="off">
                                                <small id="fileHelp" class="form-text text-muted">(dd/mm/aaaa)</small>
                                                <span id="name-format" class="help">Campo requerido</span>
                                            </div>

                                          </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="PrimerApellido">Primer apellido</label>
                                                <input type="text" class="form-control" id="PrimerApellido" name="PrimerApellido" minlength="2" maxlength="30" onkeypress="return check(event) " required autocomplete="off">
                                                <span id="name-format" class="help">Campo requerido</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="SegundoApellido">Segundo apellido</label>
                                                <input type="text" class="form-control" id="SegundoApellido" name="SegundoApellido"  maxlength="30" required autocomplete="off">
                                                <span id="name-format" class="help">Campo  requerido</span>
                                            </div>

                                            <div class="form-group">
                                                <input type='file' id="urlImagen" name="urlImagen" required autocomplete="off"/>
                                                <div id='img_contain'><img id="preview" align='middle' src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title='' aria-describedby="fileHelp" /></div>
                                                <small id="fileHelp" class="form-text text-muted">Archivos permitidos (.jpg .png .gif)</small>
                                                <span id="name-format" class="help">Campo requerido</span>
                                            </div>


                                        </div>
                                    </div>







                                <div class="row m-t-17">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="TD">TD</label>
                                            <input type="text" class="form-control" id="TD" name="TD"
                                                    maxlength="30" onkeypress="return valida(event) " autocomplete="off"  required>
                                            <span id="name-format" class="help">Campo  requerido</span>
                                        </div>
                                        <label>Tipo Interno</label>
                                        <?php echo ControlSelectores::SelectTipoInterno(); ?>
                                        <label>Tipo Reclucion</label>
                                        <?php echo ControlSelectores::SelectTipoReclusion(); ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="cbx_Carcel">Carcel</label>
                                    <select class="form-control" name="cbx_Carcel" required id="cbx_Carcel">
                                        <option value="">Selecciona una opción...</option>
                                        <?php while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['IdCarcel']; ?>"><?php echo $row['NombreCarcel']; ?></option>
                                        <?php } ?>
                                    </select>


                                        <div class="form-group">
                                            <label for="cbx_Ubicacion">Ubicacion </label>
                                            <select class="form-control" name="cbx_Ubicacion" id="cbx_Ubicacion">
                                                <option value="">Selecciona una opción</option>
                                            </select>
                                            <label for="UbicacionDom">Ubicacion Domiciliaria </label>
                                            <input type="text" class="form-control" id="UbicacionDom" name="UbicacionDom" >
                                        </div>

                                        <div class="form-group">
                                            <label>Delito</label>
                                            <?php echo ControlSelectores::SelectDelito(); ?>
                                        </div>



                                    </div>




                                        </div>
                                    </div>

                                </div>


                                <input type="submit" class="btn btn-primary stepy-finish" name="boton" id="boton" value="Registrar interno">






                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 Software ADSI Visitor
        </footer>




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
</body>
</html>
