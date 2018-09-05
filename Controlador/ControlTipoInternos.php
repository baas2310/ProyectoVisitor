<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/TipoInterno.php');
if (!empty($_GET['accion'])){
    ControlTipoInternos::main($_GET['accion']);
}
class ControlTipoInternos
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlTipoInternos::Crear();
        } elseif ($action == 'Editar') {
            ControlTipoInternos::Editar();
        } elseif ($action == 'Select') {
            ControlTipoInternos::Select();
        }
    }

    static public function Crear()
    {
        try {

            $ArrayTipoInterno = Array();
            $ArrayTipoInterno['TipoInterno'] = $_POST['TipoInterno'];
            $ArrayTipoInterno['Descripcion'] = $_POST['Descripcion'];

            var_dump($ArrayTipoInterno);

            $TipoInterno = new TipoInterno($ArrayTipoInterno);
            $TipoInterno->insertar();
            header("location: ../Vista/Admin/default/CrearTipoInterno.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }

    static public function Editar()
    {
        try {
            $tmpObject = TipoInterno::buscarId($_SESSION["IdTipoInterno"]);
            $ArrayTipoInterno = Array();
            $ArrayTipoInterno['TipoTipoInterno'] = $_POST['TipoTipoInterno'];
            $ArrayTipoInterno['Descripcion'] = $_POST['Descripcion'];

            $TipoInterno = new TipoInterno($ArrayTipoInterno);

            var_dump($ArrayTipoInterno);

            $TipoInterno->editar();
            unset($_SESSION["IdTipoInterno"]);
            header("Location: ../Vista/Admin/default/ListarTipoInternos.php?respuesta=correcto&IdTipoInterno=" . $ArrayTipoInterno['IdTipoInterno']);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    static public function Select($isRequired = true, $id = "IdTipoInterno", $nombre = "IdTipoInterno", $class = "")
    {
        $ArrayTipoInternos = TipoInterno::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayTipoInternos) > 0) {
            foreach ($ArrayTipoInternos as $TipoInterno)
                $htmlSelect .= "<option value='" . $TipoInterno->getIdTipoInterno() . "'>" . $TipoInterno->getTipoInterno() . " - " . $TipoInterno->getDescripcion() . " " . $TipoInterno->getNombre2() . " " . $TipoInterno->getApellido1() . " " . $TipoInterno->getApellido2() . " - Celular: " . $TipoInterno->getCelular() . " - Rango: " . $TipoInterno->getRango() . " - Permiso: " . $TipoInterno->getIdPermiso() . " " . $TipoInterno->getUsuario() . " " . $TipoInterno->getPass() . " " . $TipoInterno->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableTipoInterno()
    {

        $ArrayTipoInternos = TipoInterno::getAll();;
        //$tmpTipoInterno = new TipoInterno();
        $arrColumnas = [/*"Código",*/
            "Tipo", "Descripcion"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }


        $htmltable .= "<tbody>";
        foreach ($ArrayTipoInternos as $objTipoInterno) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objTipoInterno->getTipoInterno() . "</td>";
            $htmltable .= "<td>" . $objTipoInterno->getDescripcion() . "</td>";



        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }



}
