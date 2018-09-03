<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Interno.php');
if (!empty($_GET['accion'])){
    ControlInternos::main($_GET['accion']);
}
class ControlInternos
{
    static function main($action)
    {
        if ($action == 'crear') {
            ControlInternos::Crear();
        } elseif ($action == 'Editar') {
            ControlInternos::Editar();
        } elseif ($action == 'Select') {
            ControlInternos::Select();
        } elseif ($action == 'ActivarInterno') {
            ControlInternos::Estado('1');
        } elseif ($action == 'DesactivarInterno') {
            ControlInternos::Estado('2');
        }
    }

    static public function Crear()
{
    try {

        $ArrayInterno = Array();
        $ArrayInterno['Cedula'] = $_POST['Cedula'];
        $ArrayInterno['Nombre1'] = $_POST['PrimerNombre'];
        $ArrayInterno['Nombre2'] = $_POST['SegundoNombre'];
        $ArrayInterno['Apellido1'] = $_POST['PrimerApellido'];
        $ArrayInterno['Apellido2'] = $_POST['SegundoApellido'];
        $ArrayInterno['FechaNacimiento'] = $_POST['FechaNacimiento'];


        $formatos   = array('.jpg', '.png');
        $dir_subida = __DIR__.'../../ImagenesInternos/';
        $fichero_subido = $dir_subida . basename($_FILES['UrlImagen']['name']);
        $ext              = substr($fichero_subido, strrpos($fichero_subido, '.'));

        echo '<pre>';
        if (in_array($ext, $formatos)){
            move_uploaded_file($_FILES['UrlImagen']['tmp_name'], $fichero_subido);
            //echo "El fichero es válido y se subió con éxito.\n";
            $Interno = new Interno($ArrayInterno);

            $Interno->insertar();
            $IdRegistrado=(Interno::buscarIdInterno($_POST['Cedula']));
            var_dump($IdRegistrado->getIdRegistrado());
            var_dump(self::CrearRegistro($IdRegistrado->getIdRegistrado()));
            //header("location: ../Vista/Admin/default/RegistrarInternos.php?respuesta=Correcto");
        } else {
           // echo "¡Posible ataque de subida de ficheros!\n";
        }
        $ArrayInterno['UrlImagen'] = $_FILES['UrlImagen']['name'];



    } catch (Exception $e) {
        var_dump($e);

    }
}

    static public function CrearRegistro($IdRegistrado)
    {
        try {

            $ArrayInterno = Array();
            $ArrayInterno['IdRegistradorIngreso'] = $_POST['IdRegistrador'];
            $ArrayInterno['IdRegistrado'] = $IdRegistrado;
            $ArrayInterno['FechaIngreso'] = date('Y/m/d H:i:s');
            $ArrayInterno['TD'] = $_POST['TD'];
            $ArrayInterno['IdTipoInterno'] = $_POST['TipoInterno'];
            $ArrayInterno['IdTipoReclucion'] = $_POST['TipoReclusion'];
            $ArrayInterno['IdUbicacionInterna'] = $_POST['cbx_Ubicacion'];
            $ArrayInterno['Ubicacion'] = $_POST['UbicacionDom'];
            $ArrayInterno['IdDelito'] = $_POST['Delito'];
            $ArrayInterno['Estado'] = 1;


            //var_dump($ArrayInterno);

            $Interno = new Interno($ArrayInterno);
            var_dump($Interno);
            $Interno->insertarRegistro();
            header("location: ../Vista/Admin/default/RegistrarInternos.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }
    static public function Editar()
    {
        try {
            $tmpObject = Interno::buscarId($_SESSION["IdInterno"]);
            $ArrayInterno = Array();
            $ArrayInterno['IdUbicacionInterna'] = $_POST['cbx_Ubicacion'];
            $ArrayInterno['IdInterno']=$_SESSION['IdInterno'];
            $Interno = new Interno($ArrayInterno);

            var_dump($ArrayInterno);


            $Interno->editar();
            self::CrearAlerta($_SESSION["IdInterno"],"Translado");
            self::EstadoTranslado(2);
            unset($_SESSION["IdInterno"]);
            header("Location: ../Vista/Admin/default/ListarInterno.php?respuesta=correcto&IdInterno=" . $ArrayInterno['IdInterno']);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    static public function Select($isRequired = true, $id = "IdInterno", $nombre = "IdInterno", $class = "")
    {
        $ArrayInternos = Interno::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayInternos) > 0) {
            foreach ($ArrayInternos as $Interno)
                $htmlSelect .= "<option value='" . $Interno->getIdInterno() . "'>" . $Interno->getCedula() . " - " . $Interno->getNombre1() . " " . $Interno->getNombre2() . " " . $Interno->getApellido1() . " " . $Interno->getApellido2() . " - Celular: " . $Interno->getCelular() . " - Rango: " . $Interno->getRango() . " - Permiso: " . $Interno->getIdPermiso() . " " . $Interno->getUsuario() . " " . $Interno->getPass() . " " . $Interno->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableInterno()
    {

        $ArrayInternos = Interno::getAll();;
        //$tmpInterno = new Interno();
        $arrColumnas = [/*"Código",*/
            "No. TD", "Nombre 1", "Apellido 1", "Tipo Interno", "Delito", "Tipo Reclusion", "Cárcel","Municipio","Estado"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($ArrayInternos as $objInterno) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objInterno->getTD() . "</td>";
            $htmltable .= "<td>" . $objInterno->getNombre1() . "</td>";
            $htmltable .= "<td>" . $objInterno->getApellido1() . "</td>";
            $htmltable .= "<td>" . $objInterno->getTipoInterno() . "</td>";
            $htmltable .= "<td>" . $objInterno->getDelito() . "</td>";
            $htmltable .= "<td>" . $objInterno->getTipoReclucion() . "</td>";
            $htmltable .= "<td>" . $objInterno->getNombreCarcel() . "</td>";
            $htmltable .= "<td>" . $objInterno->getMunicipio() . "</td>";

            if ($objInterno->getEstado() == "Activo") {
                $htmltable .= "<td><span class= 'label label-success'>" . $objInterno->getEstado() . "</span></td>";
            } else {
                $htmltable .= "<td><span class='label label-inverse' >" . $objInterno->getEstado() . "</span></td>";
            }

            $icons = "";
            if ($objInterno->getEstado() == "Activo") {
                $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/ControlInternos.php?accion=DesactivarInterno&IdRegistrado=" . $objInterno->getIdRegistrado() . "'><i class='fa fa-remove'></i></a>";
                $icons .= "<a data-toggle='tooltip' title='Generar translado' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarInterno.php?IdInterno=" . $objInterno->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";

            } else {
                $icons .= "<a data-toggle='tooltip' title='Interno en libertad' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' '><i class='fa fa-check'></i></a>";
            }

            //$icons .= "<a data-toggle='tooltip' title='Generar translado' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarInterno.php?IdInterno=" . $objInterno->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function adminTableInternoVisitas()
    {

        $ArrayInternos = Interno::getAllInternoVisita();;
        //$tmpInterno = new Interno();
        $arrColumnas = [/*"Código",*/
            "No. TD", "Nombre 1", "Apellido 1", "Tipo Interno", "Delito", "Tipo Reclusion", "Cárcel","Municipio","Estado"];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna) {

            $htmltable .= "<th style='text-align: center'>" . $NameColumna . "</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($ArrayInternos as $objInterno) {
            $htmltable .= "<tr>";

            /*$htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";*/
            $htmltable .= "<td>" . $objInterno->getTD() . "</td>";
            $htmltable .= "<td>" . $objInterno->getNombre1() . "</td>";
            $htmltable .= "<td>" . $objInterno->getApellido1() . "</td>";
            $htmltable .= "<td>" . $objInterno->getTipoInterno() . "</td>";
            $htmltable .= "<td>" . $objInterno->getDelito() . "</td>";
            $htmltable .= "<td>" . $objInterno->getTipoReclucion() . "</td>";
            $htmltable .= "<td>" . $objInterno->getNombreCarcel() . "</td>";
            $htmltable .= "<td>" . $objInterno->getMunicipio() . "</td>";

            if ($objInterno->getEstado() == "Activo") {
                $htmltable .= "<td><span class= 'label label-success'>" . $objInterno->getEstado() . "</span></td>";
            } else {
                $htmltable .= "<td><span class='label label-inverse' >" . $objInterno->getEstado() . "</span></td>";
            }

            $icons = "";
            if ($objInterno->getEstado() == "Activo") {

                $icons .= "<a data-toggle='tooltip' title='Visitas del Interno' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='RegistroVisitasInterno.php?IdRegistro=" . $objInterno->getIdRegistro() . "'><i class='fa fa-pencil'></i></a>";

            }

            //$icons .= "<a data-toggle='tooltip' title='Generar translado' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarInterno.php?IdInterno=" . $objInterno->getIdRegistrado() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function adminTableVisitante()
    {

        $ArrayVisitantes = Interno::getAllVisita($_SESSION["IdRegistro"]);;
        //$tmpVisitante = new Visitante();
        $arrColumnas = [/*"Código",*/
            "No. Documento", "Nombre 1", "Nombre 2", "Apellido 1", "Apellido 2", "Tipo Visitante", "Parentesco"];
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
            //$htmltable .= "<td>" . $objVisitante->getEstado() . "</td>";



            $icons = "";


            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarVisitantesInterno.php?IdVisitante=" . $objVisitante->getIdVisitante() . "'><i class='fa fa-pencil'></i></a>";


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
            $objRegistro = Interno::buscarId($IdRegistrado);
            $objRegistro->setEstado($Estado);
            $objRegistro->setIdRegistradorIngreso($idRegistrador);
            $objRegistro->setFechaIngreso(date('Y/m/d H:i:s'));
            $objRegistro->editarEstado();
            $Alerta = " Dio salida o baja";
            self::CrearAlerta($IdRegistrado,$Alerta);
            header("Location: ../Vista/Admin/default/ListarInterno.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/ListarInterno.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }
    static public function EstadoTranslado ($Estado){
        try {

            $IdRegistrado = $_SESSION["IdInterno"];
            $idRegistrador = $_SESSION["DataUser"]["IdFuncionario"];
            echo ($IdRegistrado);
            $objRegistro = Interno::buscarId($IdRegistrado);
            $objRegistro->setEstado($Estado);
            $objRegistro->setIdRegistradorIngreso($idRegistrador);
            $objRegistro->setFechaIngreso(date('Y/m/d H:i:s'));
            $objRegistro->editarEstado();
            $Alerta = " Dio salida o baja";
            self::CrearAlerta($IdRegistrado,$Alerta);
            //header("Location: ../Vista/Admin/default/ListarInterno.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/ListarInterno.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }
    static public function CrearAlerta($IdRegistrado,$alerta)
    {
        try {
            //var_dump($_POST);
            $ArrayInterno = Array();
            $ArrayInterno['IdRegistrador'] = $_SESSION["DataUser"]["IdFuncionario"];
            $ArrayInterno['IdModificado'] = $IdRegistrado;
            $ArrayInterno['Alerta']=$alerta;
            $ArrayInterno['FechaRegistro'] =date('Y/m/d H:i:s');


            var_dump($ArrayInterno);

            $Interno = new Interno($ArrayInterno);
            $Interno->insertarAlerta();
            //header("location: ../Vista/Admin/default/RegistrarVisitantes.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }

}
