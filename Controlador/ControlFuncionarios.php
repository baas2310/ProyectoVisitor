<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Funcionario.php');
if (!empty($_GET['accion'])){
    ControlFuncionarios::main($_GET['accion']);
}
class ControlFuncionarios
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlFuncionarios::Crear();
        } elseif ($action == 'EditarFuncionario') {
            ControlFuncionarios::Editar();
        } elseif ($action == 'selectFuncionarios') {
            ControlFuncionarios::Select();
        } elseif ($action == 'ActivarFuncionario') {
            ControlFuncionarios::Estado('1');
        } elseif ($action == 'DesactivarFuncionario') {
            ControlFuncionarios::Estado('2');
        } elseif ($action == 'IniciarSesion') {

            ControlFuncionarios::login();
        } elseif ($action == 'CerrarSesion') {
            ControlFuncionarios::Logout();
        }
    }

    static public function crear()
    {
        try {

            $ArrayFuncionario = Array();
            $ArrayFuncionario['Cedula'] = $_POST['Cedula'];
            $ArrayFuncionario['Nombre1'] = $_POST['Nombre1'];
            $ArrayFuncionario['Nombre2'] = $_POST['Nombre2'];
            $ArrayFuncionario['Apellido1'] = $_POST['Apellido1'];
            $ArrayFuncionario['Apellido2'] = $_POST['Apellido2'];
            $ArrayFuncionario['Celular'] = $_POST['Celular'];
            $ArrayFuncionario['Rango'] = $_POST['Rango'];
            $ArrayFuncionario['Permiso'] = $_POST['Permiso'];
            $ArrayFuncionario['Usuario'] = $_POST['Usuario'];
            $ArrayFuncionario['Pass'] = $_POST['Password'];
            $ArrayFuncionario['IdUbicacion'] = $_POST['municipio'];

            //var_dump($ArrayFuncionario);

            $funcionario = new Funcionario($ArrayFuncionario);
            var_dump($funcionario);
            $funcionario->insertar();
            header("location: ../Vista/Admin/default/RegistrarFuncionarios.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }

    static public function Editar()
    {
        try {
            $tmpObject = Funcionario::buscarId($_SESSION["IdFuncionario"]);
            var_dump($tmpObject);
            $ArrayFuncionario = Array();
            $ArrayFuncionario['Cedula'] = $_POST['Cedula'];
            $ArrayFuncionario['Nombre1'] = $_POST['Nombre1'];
            $ArrayFuncionario['Nombre2'] = $_POST['Nombre2'];
            $ArrayFuncionario['Apellido1'] = $_POST['Apellido1'];
            $ArrayFuncionario['Apellido2'] = $_POST['Apellido2'];
            $ArrayFuncionario['Celular'] = $_POST['Celular'];
            $ArrayFuncionario['Rango'] = $_POST['Rango'];
            $ArrayFuncionario['Permiso'] = $_POST['Permiso'];
            $ArrayFuncionario['Estado'] = $_POST['Estado'];
            $ArrayFuncionario['Usuario'] = $_POST['Usuario'];
            $ArrayFuncionario['Pass'] = $_POST['Password'];
            $ArrayFuncionario['IdUbicacion'] = $_POST['municipio'];
            $ArrayFuncionario['IdFuncionario']=$_SESSION['IdFuncionario'];
            $funcionario = new Funcionario($ArrayFuncionario);

            var_dump($ArrayFuncionario);

            var_dump($funcionario);

            $funcionario->editar();
            unset($_SESSION["IdFuncionario"]);
            header("Location: ../Vista/Admin/default/ListarFuncionarios.php?respuesta=correcto&IdFuncionario=" . $ArrayFuncionario['IdFuncionario']);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    static public function SelecTFuncionarios($isRequired = true, $id = "IdFuncionario", $nombre = "IdFuncionario", $class = "")
    {
        $arrayFuncionarios = Funcionario::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($arrayFuncionarios) > 0) {
            foreach ($arrayFuncionarios as $funcionario)
                $htmlSelect .= "<option value='" . $funcionario->getIdFuncionario() . "'>" . $funcionario->getCedula() . " - " . $funcionario->getNombre1() . " " . $funcionario->getNombre2() . " " . $funcionario->getApellido1() . " " . $funcionario->getApellido2() . " - Celular: " . $funcionario->getCelular() . " - Rango: " . $funcionario->getRango() . " - Permiso: " . $funcionario->getIdPermiso() . " " . $funcionario->getUsuario() . " " . $funcionario->getPass() . " " . $funcionario->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableFuncionario()
    {

        $arrayFuncionarios = Funcionario::getAll();;
        //$tmpFuncionario = new Funcionario();
        $arrColumnas = [/*"Código",*/
            "No. Documento", "Nombre 1", "Nombre 2", "Apellido 1", "Apellido 2", "Celular", "Rango", "Usuario", "Permiso", "Estado"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }
            $htmltable .= "<th style='text-align: center'>Acciones</th>";
            $htmltable .= "</tr>";
            $htmltable .= "</thead>";

            $htmltable .= "<tbody>";
            foreach ($arrayFuncionarios as $objFuncionario) {
                $htmltable .= "<tr>";

                /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
                $htmltable .= "<td>" . $objFuncionario->getCedula() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getNombre1() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getNombre2() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getApellido1() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getApellido2() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getCelular() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getRango() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getUsuario() . "</td>";
                $htmltable .= "<td>" . $objFuncionario->getPermiso() . "</td>";
                //$htmltable .= "<td>" . $objFuncionario->getEstado() . "</td>";


                if ($objFuncionario->getEstado() == "Activo") {
                    $htmltable .= "<td><span class= 'label label-success'>" . $objFuncionario->getEstado() . "</span></td>";
                } else {
                    $htmltable .= "<td><span class='label label-inverse' >" . $objFuncionario->getEstado() . "</span></td>";
                }

            $icons = "";

            if ($objFuncionario->getEstado() == "Activo") {
                $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/ControlFuncionarios.php?accion=DesactivarFuncionario&IdFuncionario=" . $objFuncionario->getIdFuncionario() . "'><i class='fa fa-remove'></i></a>";
            } else {
                $icons .= "<a data-toggle='tooltip' title='Activar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' href='../../../Controlador/ControlFuncionarios.php?accion=ActivarFuncionario&IdFuncionario=" . $objFuncionario->getIdFuncionario() . "'><i class='fa fa-check'></i></a>";
            }

            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarFuncionarios.php?IdFuncionarioEditar=" . $objFuncionario->getIdFuncionario() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function adminTableAlertas()
    {

        $arrayFuncionarios = Funcionario::getAlert();;
        //$tmpFuncionario = new Funcionario();
        $arrColumnas = [/*"Código",*/
            "Funcionario", "Actividad","Fecha", "Nombre Interno", "Apellido Interno", "TD"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }


        $htmltable .= "<tbody>";
        foreach ($arrayFuncionarios as $objFuncionario) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objFuncionario->getRango() . "</td>";
            $htmltable .= "<td>" . $objFuncionario->getAlerta() . "</td>";
            $htmltable .= "<td>" . $objFuncionario->getFechaAlert() . "</td>";
            $htmltable .= "<td>" . $objFuncionario->getNombreInterno() . "</td>";
            $htmltable .= "<td>" . $objFuncionario->getApellidoInterno() . "</td>";
            $htmltable .= "<td>" . $objFuncionario->getTD() . "</td>";






        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function Estado ($Estado){
        try {

            $IdFuncionario = $_GET["IdFuncionario"];
            $objFuncionario = Funcionario::buscarId($IdFuncionario);
            $objFuncionario->setEstado($Estado);
            print_r( var_dump($objFuncionario));
            var_dump($objFuncionario);
            $objFuncionario->editarEstado();
            header("Location: ../Vista/Admin/default/ListarFuncionarios.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/ListarFuncionarios.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

    public function Login (){

        try {
            $Usuario = $_POST['Usuario'];
            $Password = $_POST['Password'];
            if(!empty($Usuario) && !empty($Password)) {
                $respuesta = Funcionario::Login($Usuario, $Password);
                if (is_array($respuesta)) {
                    if ($respuesta["IdEstado"] == "1") {
                        if ($respuesta["IdPermiso"] == "1") {
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acceso total";
                        } elseif ($respuesta["IdPermiso"] == "3") {
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acceso avanzado";
                        } elseif ($respuesta["IdPermiso"] == "4") {
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acceso alto/medio";
                        } elseif ($respuesta['IdPermiso'] == "5") {
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acceso medio";
                        } elseif ($respuesta['IdPermiso'] == "6") {
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acceso medio/bajo";
                        } elseif ($respuesta['IdPermiso'] == "7") {
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acceso bajo";
                        } elseif ($respuesta['IdPermiso'] == "8") {
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acceso basico";
                        } else {
                            echo "El usuario se encuentra Inactivo";
                        }
                    } else if ($respuesta == "Contraseña Incorrecta") {
                        echo "La Contraseña No Coincide Con El Usuario";
                    } else if ($respuesta == "No existe el usuario") {
                        echo "No Existe Un Usuario Con Estos Datos";
                    }
                } else {
                    echo "Datos Vacios";
                }
            }
        } catch (Exception $e) {
            echo "Error No Identificado!!! ".$e;
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../Vista/Admin/default/login.php");
    }
}
