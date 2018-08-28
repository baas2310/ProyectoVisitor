<?php
session_start();
if (!empty($_SESSION['idRol'])){
    header("Location: Index.php");
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

    <?php include ("Includes/imports.php")?>



</head>


<body class="bg-accpunt-pages">




<section style="background-image: url(assets/images/ImagenCarcel.jpg); background-position: center center; background-repeat: no-repeat; background-attachment: fixed -webkit-background-size: ;background-size: cover; >

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-box"style="background-color: #38586c">
                            <div class="account-logo-box" >
                                <h2 class="text-uppercase text-center">
                                        <span><a src="assets/images/logo.jpg" alt="" height="160"></span>
                                        <h4 style="color: whitesmoke">Visitor</h4>
                                    </a>
                                </h2>
                            </div>


                            <div class="account-content" style="background-color: #ffffff">
                                <form id="frmLogin" name="frmLogin" method="post" class="form-horizontal">

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">

                                            <input class="form-control" style="background-color: white" id="Usuario" name="Usuario" type="" placeholder="&#128273; Usuario" required >
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">

                                            <input class="form-control" style="background-color:white" type="password" required="" id="Password" name="Password" placeholder="&#128274; Contraseña" >
                                        </div>
                                    </div>

                                    <div class="form-group row text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-success waves-effect waves-light" style="background: linear-gradient(to top,  #38586c, #38586c)" type="submit">Iniciar</button>
                                        </div>
                                    </div>

                                </form>

                                <p>
                                <div id="resultado" name="resultado" class="ui-widget">  </div>
                                </p>


                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->


                </div>


            </div>
        </div>
    </div>
</section>



<script>
    $("#frmLogin").submit(function(e) {
        e.preventDefault();
        var Usuario = $("#Usuario").val();
        var Password = $("#Password").val();

        $.ajax({
            method: "POST",
            url: "../../../Controlador/ControlFuncionarios.php?accion=IniciarSesion",
            data: {Usuario: Usuario, Password: Password}
        })
        .done(function (msg) {
            console.log(msg);
            if (msg == "Acceso total") {
                window.location.href = "index.php";
            } else if (msg == "Acceso avanzado") {
                window.location.href = "index.php";
            } else if (msg == "Acceso alto/medio") {
                window.location.href = "index.php";
            } else if (msg == "Acceso medio") {
                window.location.href = "index.php";
            } else if (msg == "Acceso medio/bajo") {
                window.location.href = "index.php";
            } else if (msg == "Acceso bajo") {
                window.location.href = "index.php";
            } else if (msg == "Acceso basico") {
                window.location.href = "index.php";
            } else {
                /*swal(
                    {
                        title: 'Error!',
                        text: ''+msg,
                        type: 'error',
                        confirmButtonColor: '#e81a2d',
                        timer: 5000
                    }
                );*/
            }
        });
    });
</script>
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>

</body>