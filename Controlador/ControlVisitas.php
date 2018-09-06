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

    static public function CrearRegistro($IdRegistrado)
    {
        try {

            $ArrayVisita = Array();
            $ArrayVisita['IdRegistradorIngreso'] = $_POST['IdRegistrador'];
            $ArrayVisita['IdRegistrado'] = $IdRegistrado;
            $ArrayVisita['FechaIngreso'] = date('Y/m/d H:i:s');
            $ArrayVisita['TD'] = $_POST['TD'];
            $ArrayVisita['IdTipoVisita'] = $_POST['TipoVisita'];
            $ArrayVisita['IdTipoReclucion'] = $_POST['TipoReclusion'];
            $ArrayVisita['IdUbicacionInterna'] = $_POST['cbx_Ubicacion'];
            $ArrayVisita['Ubicacion'] = $_POST['UbicacionDom'];
            $ArrayVisita['IdDelito'] = $_POST['Delito'];
            $ArrayVisita['Estado'] = 1;


            //var_dump($ArrayVisita);

            $Visita = new Visita($ArrayVisita);
            var_dump($Visita);
            $Visita->insertarRegistro();
            header("location: ../Vista/Admin/default/RegistrarVisitas.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }
    static public function Editar()
    {
        try {
            $tmpObject = Visita::buscarId($_SESSION["IdVisita"]);
            $ArrayVisita = Array();
            $ArrayVisita['IdUbicacionInterna'] = $_POST['cbx_Ubicacion'];
            $ArrayVisita['IdVisita']=$_SESSION['IdVisita'];
            $Visita = new Visita($ArrayVisita);

            var_dump($ArrayVisita);


            $Visita->editar();
            self::CrearAlerta($_SESSION["IdVisita"],"Translado");
            self::EstadoTranslado(2);
            unset($_SESSION["IdVisita"]);
            header("Location: ../Vista/Admin/default/ListarVisita.php");
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    static public function Select($isRequired = true, $id = "IdVisita", $nombre = "IdVisita", $class = "")
    {
        $ArrayVisitas = Visita::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayVisitas) > 0) {
            foreach ($ArrayVisitas as $Visita)
                $htmlSelect .= "<option value='" . $Visita->getIdVisita() . "'>" . $Visita->getCedula() . " - " . $Visita->getNombre1() . " " . $Visita->getNombre2() . " " . $Visita->getApellido1() . " " . $Visita->getApellido2() . " - Celular: " . $Visita->getCelular() . " - Rango: " . $Visita->getRango() . " - Permiso: " . $Visita->getIdPermiso() . " " . $Visita->getUsuario() . " " . $Visita->getPass() . " " . $Visita->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableVisita()
{

    $ArrayVisitas = Visita::getAll();;
    //$tmpVisita = new Visita();
    $arrColumnas = [/*"Código",*/
        "No. TD", "Nombre 1", "Apellido 1", "Tipo Visita", "Delito", "Tipo Reclusion", "Cárcel","Municipio","Estado"];
    $htmltable = "<thead>";
    $htmltable .= "<tr>";

    foreach ($arrColumnas as $NameColumna) {

        $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

    }
    $htmltable .= "<th style='text-align: center'>Acciones</th>";
    $htmltable .= "</tr>";
    $htmltable .= "</thead>";

    $htmltable .= "<tbody>";
    foreach ($ArrayVisitas as $objVisita) {
        $htmltable .= "<tr>";

        /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
        $htmltable .= "<td>" . $objVisita->getTD() . "</td>";
        $htmltable .= "<td>" . $objVisita->getNombre1() . "</td>";
        $htmltable .= "<td>" . $objVisita->getApellido1() . "</td>";
        $htmltable .= "<td>" . $objVisita->getTipoVisita() . "</td>";
        $htmltable .= "<td>" . $objVisita->getDelito() . "</td>";
        $htmltable .= "<td>" . $objVisita->getTipoReclucion() . "</td>";
        $htmltable .= "<td>" . $objVisita->getNombreCarcel() . "</td>";
        $htmltable .= "<td>" . $objVisita->getMunicipio() . "</td>";

        if ($objVisita->getEstado() == "Activo") {
            $htmltable .= "<td><span class= 'label label-success'>" . $objVisita->getEstado() . "</span></td>";
        } else {
            $htmltable .= "<td><span class='label label-inverse' >" . $objVisita->getEstado() . "</span></td>";
        }

        $icons = "";
        if ($objVisita->getEstado() == "Activo") {
            $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/ControlVisitas.php?accion=DesactivarVisita&IdRegistrado=" . $objVisita->getIdRegistrado() . "'><i class='fa fa-remove'></i></a>";
            $icons .= "<a data-toggle='tooltip' title='Generar translado' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarVisita.php?IdVisita=" . $objVisita->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";

        } else {
            $icons .= "<a data-toggle='tooltip' title='Visita en libertad' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' '><i class='fa fa-check'></i></a>";
        }

        //$icons .= "<a data-toggle='tooltip' title='Generar translado' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarVisita.php?IdVisita=" . $objVisita->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";


        $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
        $htmltable .= "</tr>";

    }
    $htmltable .= "</tbody>";
    return $htmltable;

}static public function adminTableTargetas()
{

    $ArrayVisitas = Visita::getAll();;
    //$tmpVisita = new Visita();
    $arrColumnas = [/*"Código",*/
        "No. TD", "Nombre 1", "Apellido 1", "Tipo Visita", "Delito", "Tipo Reclusion", "Cárcel","Municipio","Estado"];
    $htmltable = "<thead>";
    $htmltable .= "<tr>";

    foreach ($arrColumnas as $NameColumna) {

        $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

    }
    $htmltable .= "<th style='text-align: center'>Acciones</th>";
    $htmltable .= "</tr>";
    $htmltable .= "</thead>";

    $htmltable .= "<tbody>";
    foreach ($ArrayVisitas as $objVisita) {
        $htmltable .= "<tr>";

        /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
        $htmltable .= "<td>" . $objVisita->getTD() . "</td>";
        $htmltable .= "<td>" . $objVisita->getNombre1() . "</td>";
        $htmltable .= "<td>" . $objVisita->getApellido1() . "</td>";
        $htmltable .= "<td>" . $objVisita->getTipoVisita() . "</td>";
        $htmltable .= "<td>" . $objVisita->getDelito() . "</td>";
        $htmltable .= "<td>" . $objVisita->getTipoReclucion() . "</td>";
        $htmltable .= "<td>" . $objVisita->getNombreCarcel() . "</td>";
        $htmltable .= "<td>" . $objVisita->getMunicipio() . "</td>";

        if ($objVisita->getEstado() == "Activo") {
            $htmltable .= "<td><span class= 'label label-success'>" . $objVisita->getEstado() . "</span></td>";
        } else {
            $htmltable .= "<td><span class='label label-inverse' >" . $objVisita->getEstado() . "</span></td>";
        }

        $icons = "";
        if ($objVisita->getEstado() == "Activo") {

            $icons .= "<a data-toggle='tooltip' title='Generar Targeta' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='TarjetaVisita.php?IdVisita=" . $objVisita->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";

        } else {
            $icons .= "<a data-toggle='tooltip' title='Visita en libertad' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' '><i class='fa fa-check'></i></a>";
            $icons .= "<a data-toggle='tooltip' title='Generar Targeta' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='TarjetaVisita.php?IdVisita=" . $objVisita->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";
        }

        //$icons .= "<a data-toggle='tooltip' title='Generar translado' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarVisita.php?IdVisita=" . $objVisita->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";


        $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
        $htmltable .= "</tr>";

    }
    $htmltable .= "</tbody>";
    return $htmltable;

}
    static public function adminTableVisitaVisitas()
    {

        $ArrayVisitas = Visita::getAllVisitaVisita();;
        //$tmpVisita = new Visita();
        $arrColumnas = [/*"Código",*/
            "No. TD", "Nombre 1", "Apellido 1", "Tipo Visita", "Delito", "Tipo Reclusion", "Cárcel","Municipio","Estado"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($ArrayVisitas as $objVisita) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objVisita->getTD() . "</td>";
            $htmltable .= "<td>" . $objVisita->getNombre1() . "</td>";
            $htmltable .= "<td>" . $objVisita->getApellido1() . "</td>";
            $htmltable .= "<td>" . $objVisita->getTipoVisita() . "</td>";
            $htmltable .= "<td>" . $objVisita->getDelito() . "</td>";
            $htmltable .= "<td>" . $objVisita->getTipoReclucion() . "</td>";
            $htmltable .= "<td>" . $objVisita->getNombreCarcel() . "</td>";
            $htmltable .= "<td>" . $objVisita->getMunicipio() . "</td>";

            if ($objVisita->getEstado() == "Activo") {
                $htmltable .= "<td><span class= 'label label-success'>" . $objVisita->getEstado() . "</span></td>";
            } else {
                $htmltable .= "<td><span class='label label-inverse' >" . $objVisita->getEstado() . "</span></td>";
            }

            $icons = "";
            if ($objVisita->getEstado() == "Activo") {

                $icons .= "<a data-toggle='tooltip' title='Visitas del Visita' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='RegistroVisitasVisita.php?IdRegistro=" . $objVisita->getIdRegistro() . "'><i class='fa fa-pencil'></i></a>";

            }

            //$icons .= "<a data-toggle='tooltip' title='Generar translado' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarVisita.php?IdVisita=" . $objVisita->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function adminTableVisitante()
    {

        $ArrayVisitantes = Visita::getAllVisita($_SESSION["IdRegistro"]);;
        //$tmpVisitante = new Visitante();
        $arrColumnas = [/*"Código",*/
            "No. Documento", "Nombre 1", "Nombre 2", "Apellido 1", "Apellido 2", "Tipo Visitante", "Parentesco", "Estado"];
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
            $htmltable .= "<td>" . $objVisitante->getCedulaVisitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre1Visitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre2Visitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getApellido1Visitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getApellido2Visitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getTipoVisitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getParentesco() . "</td>";

            if ($objVisitante->getEstado() == "1") {
                $htmltable .= "<td><span class= 'label label-success'>" . "Activo" . "</span></td>";
            }

            $icons = "";

            if ($objVisitante->getEstado() == "1") {
                $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/ControlVisitas.php?accion=DesactivarVisitante&IdVisitante=" . $objVisitante->getIdVisitante() . "'><i class='fa fa-remove'></i></a>";
            }


            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarVisitantesVisita.php?IdVisitante=" . $objVisitante->getIdVisitante() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function Estado ($Estado){
        try {

            $IdRegistrado = $_GET["IdRegistrado"];
            $idRegistrador = $_SESSION["DataUser"]["IdFuncionario"];
            echo ($IdRegistrado);
            $objRegistro = Visita::buscarId($IdRegistrado);
            $objRegistro->setEstado($Estado);
            $objRegistro->setIdRegistradorIngreso($idRegistrador);
            $objRegistro->setFechaIngreso(date('Y/m/d H:i:s'));
            $objRegistro->editarEstado();
            $Alerta = " Dio salida o baja";
            self::CrearAlerta($IdRegistrado,$Alerta);
            header("Location: ../Vista/Admin/default/ListarVisita.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/ListarVisita.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

    static public function EstadoTranslado ($Estado){
        try {

            $IdRegistrado = $_SESSION["IdVisita"];
            $idRegistrador = $_SESSION["DataUser"]["IdFuncionario"];
            echo ($IdRegistrado);
            $objRegistro = Visita::buscarId($IdRegistrado);
            $objRegistro->setEstado($Estado);
            $objRegistro->setIdRegistradorIngreso($idRegistrador);
            $objRegistro->setFechaIngreso(date('Y/m/d H:i:s'));
            $objRegistro->editarEstado();
            $Alerta = " Dio salida o baja";
            self::CrearAlerta($IdRegistrado,$Alerta);
            //header("Location: ../Vista/Admin/default/ListarVisita.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/ListarVisita.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }
    static public function CrearAlerta($IdRegistrado,$alerta)
    {
        try {
            //var_dump($_POST);
            $ArrayVisita = Array();
            $ArrayVisita['IdRegistrador'] = $_SESSION["DataUser"]["IdFuncionario"];
            $ArrayVisita['IdModificado'] = $IdRegistrado;
            $ArrayVisita['Alerta']=$alerta;
            $ArrayVisita['FechaRegistro'] =date('Y/m/d H:i:s');


            var_dump($ArrayVisita);

            $Visita = new Visita($ArrayVisita);
            $Visita->insertarAlerta();
            //header("location: ../Vista/Admin/default/RegistrarVisitantes.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }
    static public function BusquedaVisitante (){
        try {


            $objVisita=Visita::getVisita($_POST["Cedula"]);


            header("Location: ../Vista/Admin/default/RegistroVisitasVisita.php?IdRegistro=".$_SESSION["IdRegistro"]);
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/RegistroVisitasVisita.php?IdRegistro='".$_SESSION["IdRegistro"]);
        }
    }
    static public function CrearAlertaVisita($IdRegistrado)
    {
        try {
            //var_dump($_POST);
            $ArrayVisitante = Array();
            $ArrayVisitante['IdRegistrador'] = $_SESSION["DataUser"]['IdFuncionario'];
            $ArrayVisitante['IdModificado'] =  $IdRegistrado;
            $ArrayVisitante['Alerta']="Inactivacion de Usuario";
            $ArrayVisitante['FechaRegistro'] =date('Y/m/d H:i:s');


            var_dump($ArrayVisitante);

            $visitante = new Visitante($ArrayVisitante);
            $visitante->insertarAlertaMod();
            //header("location: ../Vista/Admin/default/RegistrarVisitantes.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }

}
