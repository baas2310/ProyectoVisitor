<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Delito.php');
if (!empty($_GET['accion'])){
    ControlDelito::main($_GET['accion']);
}
class ControlDelito
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlDelito::Crear();
        } elseif ($action == 'Editar') {
            ControlDelito::Editar();
        } elseif ($action == 'Select') {
            ControlDelito::Select();
        }
    }

    static public function Crear()
    {
        try {
            if (Delito::getLimite($_POST['Delito'])==0) {

                $ArrayDelito = Array();
                $ArrayDelito['Delito'] = $_POST['Delito'];
                $ArrayDelito['Descripcion'] = $_POST['Descripcion'];

                var_dump($ArrayDelito);

                $Delito = new Delito($ArrayDelito);
                $Delito->insertar();
                header("location: ../Vista/Admin/default/CrearDelitos.php?respuesta=Correcto");
            }else{
                header("location: ../Vista/Admin/default/CrearDelitos.php?respuesta=Existente");
            }
        } catch (Exception $e) {
            var_dump($e);

        }
    }


    static public function Editar()
    {
        try {
            $tmpObject = Delito::buscarId($_SESSION["IdDelito"]);
            $ArrayDelito = Array();
            $ArrayDelito['Delito'] = $_POST['Delito'];
            $ArrayDelito['Descripcion'] = $_POST['Descripcion'];

            $Delito = new Delito($ArrayDelito);

            var_dump($ArrayDelito);

            $Delito->editar();
            unset($_SESSION["IdDelito"]);
            header("Location: ../Vista/Admin/default/CrearDelitos.php?respuesta=correcto&IdDelito=" . $ArrayDelito['IdDelito']);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    static public function Select($isRequired = true, $id = "IdDelito", $nombre = "IdDelito", $class = "")
    {
        $ArrayDelitos = Delito::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayDelitos) > 0) {
            foreach ($ArrayDelitos as $Delito)
                $htmlSelect .= "<option value='" . $Delito->getIdDelito() . "'>" . $Delito->getDelito() . " - " . $Delito->getDescripcion() . " " . $Delito->getNombre2() . " " . $Delito->getApellido1() . " " . $Delito->getApellido2() . " - Celular: " . $Delito->getCelular() . " - Rango: " . $Delito->getRango() . " - Permiso: " . $Delito->getIdPermiso() . " " . $Delito->getUsuario() . " " . $Delito->getPass() . " " . $Delito->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableDelito()
    {

        $ArrayDelitos = Delito::getAll();;
        //$tmpDelito = new Delito();
        $arrColumnas = [/*"Código",*/
            "Delito", "Descripcion"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }


        $htmltable .= "<tbody>";
        foreach ($ArrayDelitos as $objDelito) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objDelito->getDelito() . "</td>";
            $htmltable .= "<td>" . $objDelito->getDescripcion() . "</td>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }

}
