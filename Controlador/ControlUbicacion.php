<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Ubicacion.php');
if (!empty($_GET['accion'])){
    ControlUbicacion::main($_GET['accion']);
}
class ControlUbicacion
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlUbicacion::Crear();
        } elseif ($action == 'Editar') {
            ControlUbicacion::Editar();
        } elseif ($action == 'Select') {
            ControlUbicacion::Select();
        }
    }

    static public function Crear()
    {
        try {


            if (Ubicacion::getLimite($_POST["Patio"],$_POST["Seccion"],$_POST["Celda"],$_POST["cbx_Carcel"])<1) {
                $ArrayUbicacion = Array();
                $ArrayUbicacion['Patio'] = $_POST['Patio'];
                $ArrayUbicacion['Seccion'] = $_POST['Seccion'];
                $ArrayUbicacion['Celda'] = $_POST['Celda'];
                $ArrayUbicacion['IdLocalizacion'] = $_POST['cbx_Carcel'];

                var_dump($ArrayUbicacion);


                $Ubicacion = new Ubicacion($ArrayUbicacion);
                $Ubicacion->insertar();
                header("location: ../Vista/Admin/default/CrearUbicacionInterno.php?respuesta=Correcto");
            }
        } catch (Exception $e) {
            var_dump($e);

        }
    }


    static public function Editar()
    {
        try {
            $tmpObject = Ubicacion::buscarId($_SESSION["IdUbicacion"]);
            $ArrayUbicacion = Array();
            $ArrayUbicacion['Ubicacion'] = $_POST['Ubicacion'];
            $ArrayUbicacion['Seccion'] = $_POST['Seccion'];

            $Ubicacion = new Ubicacion($ArrayUbicacion);

            var_dump($ArrayUbicacion);

            $Ubicacion->editar();
            unset($_SESSION["IdUbicacion"]);
            header("Location: ../Vista/Admin/default/CrearUbicaciones.php?respuesta=correcto&IdUbicacion=" . $ArrayUbicacion['IdUbicacion']);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    static public function Select($isRequired = true, $id = "IdUbicacion", $nombre = "IdUbicacion", $class = "")
    {
        $ArrayUbicaciones = Ubicacion::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayUbicaciones) > 0) {
            foreach ($ArrayUbicaciones as $Ubicacion)
                $htmlSelect .= "<option value='" . $Ubicacion->getIdUbicacion() . "'>" . $Ubicacion->getUbicacion() . " - " . $Ubicacion->getSeccion() . " " . $Ubicacion->getNombre2() . " " . $Ubicacion->getApellido1() . " " . $Ubicacion->getApellido2() . " - Celular: " . $Ubicacion->getCelular() . " - Rango: " . $Ubicacion->getRango() . " - Permiso: " . $Ubicacion->getIdPermiso() . " " . $Ubicacion->getUsuario() . " " . $Ubicacion->getPass() . " " . $Ubicacion->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableUbicacion()
    {

        $ArrayUbicaciones = Ubicacion::getAll();;
        //$tmpUbicacion = new Ubicacion();
        $arrColumnas = [/*"Código",*/
            "Ubicacion", "Seccion"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }


        $htmltable .= "<tbody>";
        foreach ($ArrayUbicaciones as $objUbicacion) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objUbicacion->getUbicacion() . "</td>";
            $htmltable .= "<td>" . $objUbicacion->getSeccion() . "</td>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }

}
