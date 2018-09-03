<?php

session_start();

require "../../../Modelo/Interno.php";

if (empty($_SESSION["DataUser"]["IdFuncionario"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
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

    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>

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
                                        <input type="text" value="<?php echo $_SESSION["DataUser"]["IdFuncionario"]?>" class="form-control" id="IdRegistrador" name="IdRegistrador" hidden>
                                    </div>

                                    <div class="row m-t-20">
                                        <div class="col-sm-5">

                                            <div class="form-group">
                                                <label for="Cedula">Cedula</label>
                                                <input type="text" class="form-control" id="Cedula" name="Cedula"  maxlength="15" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="PrimerNombre">Primer nombre</label>
                                                <input type="text" class="form-control" id="PrimerNombre" name="PrimerNombre"  maxlength="30"  required>
                                            </div>

                                            <div class="form-group">
                                                <label for="SegundoNombre">Segundo nombre</label>
                                                <input type="text" class="form-control" id="SegundoNombre" name="SegundoNombre"  maxlength="30" >
                                            </div>
                                            <div class="form-group">
                                                <label for="FechaNacimiento"> Fecha de nacimiento </label>
                                                <input type="text" size="10" class="form-control" id="FechaNacimiento" name="FechaNacimiento" onKeyUp = "this.value=formateafecha(this.value);" max=<?php $hoy=date("Y-m-d"); echo $hoy;?> required maxlength="10">
                                                <small id="fileHelp" class="form-text text-muted">(dd/mm/aaaa)</small>
                                            </div>

                                          </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="PrimerApellido">Primer apellido</label>
                                                <input type="text" class="form-control" id="PrimerApellido" name="PrimerApellido"  maxlength="30" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="SegundoApellido">Segundo apellido</label>
                                                <input type="text" class="form-control" id="SegundoApellido" name="SegundoApellido"  maxlength="30" >
                                            </div>

                                            <div class="form-group">
                                                <label for="UrlImagen">Imagen </label>
                                                <input type="file" class="form-control-file" id="UrlImagen" aria-describedby="fileHelp" name="UrlImagen">
                                                <small id="fileHelp" class="form-text text-muted">Archivos permitidos (.jpg .png .gif)</small>
                                            </div>


                                        </div>
                                    </div>







                                <div class="row m-t-17">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="TD">TD</label>
                                            <input type="text" class="form-control" id="TD" name="TD"
                                                    maxlength="30" required>
                                        </div>
                                        <label>Tipo Interno</label>
                                        <?php echo ControlSelectores::SelectTipoInterno(); ?>
                                        <label>Tipo Reclucion</label>
                                        <?php echo ControlSelectores::SelectTipoReclusion(); ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="cbx_Carcel">Carcel</label>
                                    <select class="form-control" name="cbx_Carcel" id="cbx_Carcel">
                                        <option value="0">Seleccionar Carcel</option>
                                        <?php while($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['IdCarcel']; ?>"><?php echo $row['NombreCarcel']; ?></option>
                                        <?php } ?>
                                    </select>


                                        <div class="form-group">
                                            <label for="cbx_Ubicacion">Ubicacion </label>
                                            <select class="form-control" name="cbx_Ubicacion" id="cbx_Ubicacion"></select>
                                            <label for="UbicacionDom">Ubicacion Domiciliaria </label>
                                            <input type="text" class="form-control" id="UbicacionDom" name="UbicacionDom"parsley-trigger="change" >
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

</body>
</html>
