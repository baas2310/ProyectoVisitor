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

            $ArrayTipoReclusion = Array();
            $ArrayTipoReclusion['TipoReclucion'] = $_POST['TipoReclusion'];
            $ArrayTipoReclusion['Descripcion'] = $_POST['Descripcion'];

            var_dump($ArrayTipoReclusion);

            $TipoReclusion = new TipoReclucion($ArrayTipoReclusion);
            $TipoReclusion->insertar();
            header("location: ../Vista/Admin/default/CrearTipoReclusion.php?respuesta=Correcto");
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
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($ArrayTipoReclusion as $objTipoReclusion) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objTipoReclusion->getTipoReclucion() . "</td>";
            $htmltable .= "<td>" . $objTipoReclusion->getDescripcion() . "</td>";


            $icons = "";


            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarTipoReclusion.php?IdTipoInterno=" . $objTipoReclusion->getIdTipoReclucion() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }



}
