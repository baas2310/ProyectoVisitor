<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Actividad.php');
if (!empty($_GET['accion'])){
    ControlActividades::main($_GET['accion']);
}
class ControlActividades
{

    static public function adminTableAlertas()
{


    $arrayActividades = Actividad::getAlert();;
    //$tmpActividad = new Actividad();
    $arrColumnas = [/*"Código",*/
        "Actividad", "Actividad","Fecha", "Nombre Interno", "Apellido Interno", "TD"];
    $htmltable = "<thead>";
    $htmltable .= "<tr>";

    foreach ($arrColumnas as $NameColumna) {

        $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

    }


    $htmltable .= "<tbody>";
    foreach ($arrayActividades as $objActividad) {
        $htmltable .= "<tr>";

        /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
        $htmltable .= "<td>" . $objActividad->getRango() . "</td>";
        $htmltable .= "<td>" . $objActividad->getAlerta() . "</td>";
        $htmltable .= "<td>" . $objActividad->getFechaAlert() . "</td>";
        $htmltable .= "<td>" . $objActividad->getNombreInterno() . "</td>";
        $htmltable .= "<td>" . $objActividad->getApellidoInterno() . "</td>";
        $htmltable .= "<td>" . $objActividad->getTD() . "</td>";






    }
    $htmltable .= "</tbody>";
    return $htmltable;

}

    static public function adminTableRegistroInterno()
    {

        $arrayActividades = Actividad::getReg();;
        //$tmpActividad = new Actividad();
        $arrColumnas = [/*"Código",*/
            "Funcionario", "Actividad","Interno", "Fecha", "TD", "Delito"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }


        $htmltable .= "<tbody>";
        foreach ($arrayActividades as $objActividad) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objActividad->getRango() . "</td>";
            $htmltable .= "<td>" . $objActividad->getAlerta() . "</td>";
            $htmltable .= "<td>" . $objActividad->getNombreInterno() . "</td>";
            $htmltable .= "<td>" . $objActividad->getFechaAlert() . "</td>";
            $htmltable .= "<td>" . $objActividad->getTD() . "</td>";
            $htmltable .= "<td>" . $objActividad->getDelito() . "</td>";






        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function adminTableRegistroVisita()
    {

        $arrayActividades = Actividad::getRegVisita();;
        //$tmpActividad = new Actividad();
        $arrColumnas = [/*"Código",*/
            "Funcionario", "Actividad","Visitante", "Fecha", "Tipo Visitante"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }


        $htmltable .= "<tbody>";
        foreach ($arrayActividades as $objActividad) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objActividad->getRango() . "</td>";
            $htmltable .= "<td>" . $objActividad->getAlerta() . "</td>";
            $htmltable .= "<td>" . $objActividad->getNombreInterno() . "</td>";
            $htmltable .= "<td>" . $objActividad->getFechaAlert() . "</td>";
            $htmltable .= "<td>" . $objActividad->getTipoVisita() . "</td>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function adminTableAlertaVisita()
    {

        $arrayActividades = Actividad::getAlertVisita();;
        //$tmpActividad = new Actividad();
        $arrColumnas = [/*"Código",*/
            "Funcionario", "Actividad","Visitante", "Fecha", "Tipo Visitante"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }


        $htmltable .= "<tbody>";
        foreach ($arrayActividades as $objActividad) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objActividad->getRango() . "</td>";
            $htmltable .= "<td>" . $objActividad->getAlerta() . "</td>";
            $htmltable .= "<td>" . $objActividad->getNombreInterno() . "</td>";
            $htmltable .= "<td>" . $objActividad->getFechaAlert() . "</td>";
            $htmltable .= "<td>" . $objActividad->getTipoVisita() . "</td>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
}
