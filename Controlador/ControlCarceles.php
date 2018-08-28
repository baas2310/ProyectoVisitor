<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Carcel.php');
if (!empty($_GET['accion'])){
    ControlCarceles::main($_GET['accion']);
}
class ControlCarceles
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlCarceles::Crear();
        } elseif ($action == 'Editar') {
            ControlCarceles::Editar();
        } elseif ($action == 'Select') {
            ControlCarceles::Select();
        }
    }

    static public function Crear()
    {
        try {
            $IdRegistrado=Carcel::buscarIdRegistrado($_POST["Cedula"]);

            //var_dump($IdRegistrado->getIdDirector());
            $IdDirector=$IdRegistrado->getIdDirector();
            if ($IdDirector>0) {
                $ArrayCarcel = Array();
                $ArrayCarcel['IdUbicacion'] = $_POST['municipio'];
                $ArrayCarcel['IdDirector'] = $IdDirector;
                $ArrayCarcel['NombreCarcel'] = $_POST['NombreCarcel'];


                var_dump($ArrayCarcel);

                $Carcel = new Carcel($ArrayCarcel);

                $Carcel->insertar();

            }
                header("location: ../Vista/Admin/default/CrearCarceles.php?respuesta=Correcto");

        } catch (Exception $e) {
            var_dump($e);

        }
    }
    /*static public function CrearRegistro($IdRegistrado)
    {
        try {
            //var_dump($_POST);
            $ArrayCarcel = Array();
            $ArrayCarcel['IdRegistrador'] = $_POST['IdRegistrador'];
            $ArrayCarcel['IdModificado'] = $IdRegistrado;
            $ArrayCarcel['FechaRegistro'] =$_POST["Fecha"];


            var_dump($ArrayCarcel);

            $Carcel = new Carcel($ArrayCarcel);
            $Carcel->insertarAlerta();
            //header("location: ../Vista/Admin/default/RegistrarCarceles.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }*/


    static public function Editar()
    {
        try {
            $tmpObject = Carcel::buscarId($_SESSION["IdCarcel"]);
            $ArrayCarcel = Array();
            $ArrayCarcel['Cedula'] = $_POST['Cedula'];
            $ArrayCarcel['Nombre1'] = $_POST['Nombre1'];
            $ArrayCarcel['Nombre2'] = $_POST['Nombre2'];
            $ArrayCarcel['Apellido1'] = $_POST['Apellido1'];
            $ArrayCarcel['Apellido2'] = $_POST['Apellido2'];
            $ArrayCarcel['UrlImagen'] = $_POST['UrlImagen'];
            $ArrayCarcel['TipoCarcel'] = $_POST['TipoCarcel'];
            $ArrayCarcel['TarjetaProfesional'] = $_POST['TarjetaProfesional'];
            $ArrayCarcel['Observaciones'] = $_POST['Observaciones'];
            $ArrayCarcel['IdCarcel']=$_SESSION['IdCarcel'];
            $Carcel = new Carcel($ArrayCarcel);

            var_dump($ArrayCarcel);

            $Carcel->editar();

            unset($_SESSION["IdCarcel"]);
            //header("Location: ../Vista/Admin/default/ListarCarceles.php?respuesta=correcto&IdCarcel=" . $ArrayCarcel['IdCarcel']);
        } catch (Exception $e) {
            var_dump($e);
        }

    }
    /*static public function CrearAlerta($IdRegistrado)
    {
        try {
            //var_dump($_POST);
            $ArrayCarcel = Array();
            $ArrayCarcel['IdRegistrador'] = $_POST['IdRegistrador'];
            $ArrayCarcel['IdModificado'] = $IdRegistrado;
            $ArrayCarcel['Alerta']="Modificacion de datos Personales";
            $ArrayCarcel['FechaRegistro'] =$_POST["Fecha"];


            var_dump($ArrayCarcel);

            $Carcel = new Carcel($ArrayCarcel);
            $Carcel->insertarAlertaMod();
            header("location: ../Vista/Admin/default/RegistrarCarceles.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }*/

    static public function Select($isRequired = true, $id = "IdCarcel", $nombre = "IdCarcel", $class = "")
    {
        $ArrayCarceles = Carcel::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayCarceles) > 0) {
            foreach ($ArrayCarceles as $Carcel)
                $htmlSelect .= "<option value='" . $Carcel->getIdCarcel() . "'>" . $Carcel->getCedula() . " - " . $Carcel->getNombre1() . " " . $Carcel->getNombre2() . " " . $Carcel->getApellido1() . " " . $Carcel->getApellido2() . " - Celular: " . $Carcel->getCelular() . " - Rango: " . $Carcel->getRango() . " - Permiso: " . $Carcel->getIdPermiso() . " " . $Carcel->getUsuario() . " " . $Carcel->getPass() . " " . $Carcel->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableCarcel()
    {

        $ArrayCarceles = Carcel::getAll();;
        //$tmpCarcel = new Carcel();
        $arrColumnas = [/*"Código",*/
            "Nombre Carcel", "Nombre Director", "Apellido Director", "Cedula ", "Ubicacion"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($ArrayCarceles as $objCarcel) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objCarcel->getNombreCarcel() . "</td>";
            $htmltable .= "<td>" . $objCarcel->getNombre1() . "</td>";
            $htmltable .= "<td>" . $objCarcel->getApellido1() . "</td>";
            $htmltable .= "<td>" . $objCarcel->getCedula() . "</td>";
            $htmltable .= "<td>" . $objCarcel->getUbicacion() . "</td>";
            //$htmltable .= "<td>" . $objCarcel->getEstado() . "</td>";

            $icons = "";

            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarCarcel.php?IdCarcel=" . $objCarcel->getIdCarcel() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";



        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function Estado ($Estado){
        try {

            $IdCarcel = $_GET["IdCarcel"];
            $objCarcel = Carcel::buscarId($IdCarcel);
            $objCarcel->setEstado($Estado);
            var_dump($objCarcel);
            $objCarcel->editar();
            header("Location: ../Vista/Admin/default/ListarCarcel.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/ListarCarcel.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }


}
