<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/TipoReclusion.php');
if (!empty($_GET['accion'])){
    ControlTipoReclusion::main($_GET['accion']);
}
class ControlTipoReclusion
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlTipoReclusion::Crear();
        } elseif ($action == 'Editar') {
            ControlTipoReclusion::Editar();
        } elseif ($action == 'Select') {
            ControlTipoReclusion::Select();
        }
    }

    static public function Crear()
    {
        try {

            if (TipoReclusion::getLimite($_POST['TipoReclusion'])==0) {
                $ArrayTipoReclusion = Array();
                $ArrayTipoReclusion['TipoReclucion'] = $_POST['TipoReclusion'];
                $ArrayTipoReclusion['Descripcion'] = $_POST['Descripcion'];

                var_dump($ArrayTipoReclusion);

                $TipoReclusion = new TipoReclusion($ArrayTipoReclusion);
                $TipoReclusion->insertar();
                header("location: ../Vista/Admin/default/CrearTipoReclusion.php?respuesta=Correcto");
            }else{
                header("location: ../Vista/Admin/default/CrearTipoReclusion.php?respuesta=Existente");

            }
            } catch (Exception $e) {
            var_dump($e);

        }
    }

    static public function Editar()
    {
        try {
            $tmpObject = TipoReclucion::buscarId($_SESSION["IdTipoReclusion"]);
            $ArrayTipoReclusion = Array();
            $ArrayTipoReclusion['TipoTipoReclusion'] = $_POST['TipoTipoReclusion'];
            $ArrayTipoReclusion['Descripcion'] = $_POST['Descripcion'];

            $TipoReclusion = new TipoReclucion($ArrayTipoReclusion);

            var_dump($ArrayTipoReclusion);

            $TipoReclusion->editar();
            unset($_SESSION["IdTipoReclusion"]);
            header("Location: ../Vista/Admin/default/ListarTipoReclusion.php?respuesta=correcto&IdTipoReclusion=" . $ArrayTipoReclusion['IdTipoReclusion']);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    static public function Select($isRequired = true, $id = "IdTipoReclusion", $nombre = "IdTipoReclusion", $class = "")
    {
        $ArrayTipoReclusion = TipoReclucion::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayTipoReclusion) > 0) {
            foreach ($ArrayTipoReclusion as $TipoReclusion)
                $htmlSelect .= "<option value='" . $TipoReclusion->getIdTipoReclucion() . "'>" . $TipoReclusion->getTipoReclucion() . " - " . $TipoReclusion->getDescripcion() . " " . $TipoReclusion->getNombre2() . " " . $TipoReclusion->getApellido1() . " " . $TipoReclusion->getApellido2() . " - Celular: " . $TipoReclusion->getCelular() . " - Rango: " . $TipoReclusion->getRango() . " - Permiso: " . $TipoReclusion->getIdPermiso() . " " . $TipoReclusion->getUsuario() . " " . $TipoReclusion->getPass() . " " . $TipoReclusion->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableTipoReclusion()
    {

        $ArrayTipoReclusion = TipoReclusion::getAll();;
        //$tmpTipoReclusion = new TipoReclusion();
        $arrColumnas = [/*"Código",*/
            "Tipo", "Descripcion"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }

        $htmltable .= "<tbody>";
        foreach ($ArrayTipoReclusion as $objTipoReclusion) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objTipoReclusion->getTipoReclucion() . "</td>";
            $htmltable .= "<td>" . $objTipoReclusion->getDescripcion() . "</td>";


        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }


}
