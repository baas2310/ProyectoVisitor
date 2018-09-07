<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Visita.php');
if (!empty($_GET['accion'])){
    ControlVisitas::main($_GET['accion']);
}
class ControlVisitas
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlVisitas::Crear();
        } elseif ($action == 'Editar') {
            ControlVisitas::Editar();
        } elseif ($action == 'Select') {
            ControlVisitas::Select();
        } elseif ($action == 'ActivarVisita') {
            ControlVisitas::Estado('1');
        } elseif ($action == 'DesactivarVisita') {
            ControlVisitas::Estado('2');
        }elseif ($action == 'BuscarVisitante') {
            ControlVisitas::BusquedaVisitante();
        }elseif ($action == 'CargarVisitante') {
            ControlVisitas::CargarVisitante($_POST['Cedula']);
        }
    }

    static public function Crear()
{
    try {

        $ArrayVisita = Array();
        $ArrayVisita['IdVisitante'] = $_POST['Cedula'];
        $ArrayVisita['IdRegistro'] = $_POST['TD'];
        $ArrayVisita['IdRegistradorVisita'] = $_SESSION["DataUser"]["IdFuncionario"];
        $ArrayVisita['FechaIngreso'] = date('Y/m/d H:i:s');


            $Visita = new Visita($ArrayVisita);
            var_dump($ArrayVisita);

            $Visita->insertar();

            header("location: ../Vista/Admin/default/FormularioVisitas.php?respuesta=Correcto");

    } catch (Exception $e) {
        var_dump($e);

    }
}

    static public function adminTableIngresos()
    {

        $ArrayVisitantes = Visita::getAll();;
        //$tmpVisitante = new Visitante();
        $arrColumnas = ["Funcionario","No. Documento", "Visitante", "TD", "Visitado", "Fecha Ingreso"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($ArrayVisitantes as $objVisitante) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objVisitante->getNombreCarcel() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getCedulaVisitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre1Visitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getTD() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre1() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getFechaIngreso() . "</td>";

            //$htmltable .= "<td>" . $objVisitante->getEstado() . "</td>";



            $icons = "";


            $icons .= "<a data-toggle='tooltip' title='Salida Visitante' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/ControlVisitas.php?accion=Editar&IdVisita=" . $objVisitante->getIdRegistro() . "'><i class='fa fa-remove'></i></a>";

            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function adminTableHistorial()
    {

        $ArrayVisitantes = Visita::getHistorial();;
        //$tmpVisitante = new Visitante();
        $arrColumnas = ["Funcionario","No. Documento", "Visitante", "TD", "Visitado", "Fecha Ingreso", "Fecha Salida"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }

        $htmltable .= "<tbody>";
        foreach ($ArrayVisitantes as $objVisitante) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objVisitante->getPatio() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getCedulaVisitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre1Visitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getTD() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre1() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getFechaIngreso() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getFechaSalida() . "</td>";


        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function Editar()
    {
        try {

            $ArrayVisita = Array();
            $ArrayVisita['IdRegistradorSalida'] = $_SESSION['DataUser']["IdFuncionario"];
            $ArrayVisita['FechaSalida'] = date('Y/m/d H:i:s');
            $ArrayVisita['IdRegistro']=$_GET['IdVisita'];
            $Visita = new Visita($ArrayVisita);

            var_dump($ArrayVisita);


            $Visita->editar();

            header("Location: ../Vista/Admin/default/FormularioVisitas.php");
        } catch (Exception $e) {
            var_dump($e);
        }
    }




}
