<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Visitante.php');
if (!empty($_GET['accion'])){
    ControlVisitantes::main($_GET['accion']);
}
class ControlVisitantes
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlVisitantes::Crear();
        } elseif ($action == 'Editar') {
            ControlVisitantes::Editar();
        } elseif ($action == 'EditarVisitaInt') {
            ControlVisitantes::EditarVisitaInterno();
        }elseif ($action == 'Select') {
            ControlVisitantes::Select();
        }
    }

    static public function Crear()
    {
        try {

            $ArrayVisitante = Array();
            $ArrayVisitante['Cedula'] = $_POST['Cedula'];
            $ArrayVisitante['Nombre1'] = $_POST['Nombre1'];
            $ArrayVisitante['Nombre2'] = $_POST['Nombre2'];
            $ArrayVisitante['Apellido1'] = $_POST['Apellido1'];
            $ArrayVisitante['Apellido2'] = $_POST['Apellido2'];
            //$ArrayVisitante['UrlImagen'] = $_POST['UrlImagen'];
            $ArrayVisitante['TipoVisitante'] = $_POST['TipoVisitante'];
            $ArrayVisitante['TarjetaProfesional'] = $_POST['TarjetaProfesional'];

            //var_dump($ArrayVisitante);
            $dir_subida = __DIR__.'../../ImagenesVisitas/';
            $fichero_subido = $dir_subida . basename($_FILES['UrlImagen']['name']);

            echo '<pre>';
            if (move_uploaded_file($_FILES['UrlImagen']['tmp_name'], $fichero_subido)) {
                //echo "El fichero es válido y se subió con éxito.\n";
            } else {
                // echo "¡Posible ataque de subida de ficheros!\n";
            }
            $ArrayVisitante['UrlImagen'] = $_FILES['UrlImagen']['name'];



            $visitante = new Visitante($ArrayVisitante);

            $visitante->insertar();

            $IdRegistrado=Visitante::buscarIdRegistrado($_POST["Cedula"]);
            //var_dump($IdRegistrado->getIdVisitante());
            self::CrearRegistro($IdRegistrado->getIdVisitante());
            header("location: ../Vista/Admin/default/RegistrarVisitantes.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }
    static public function CrearRegistro($IdRegistrado)
    {
        try {
            //var_dump($_POST);
            $ArrayVisitante = Array();
            $ArrayVisitante['IdRegistrador'] = $_POST['IdRegistrador'];
            $ArrayVisitante['IdModificado'] = $IdRegistrado;
            $ArrayVisitante['FechaRegistro'] =$_POST["Fecha"];


            var_dump($ArrayVisitante);

            $visitante = new Visitante($ArrayVisitante);
            $visitante->insertarAlerta();
            //header("location: ../Vista/Admin/default/RegistrarVisitantes.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }


    static public function Editar()
    {
        try {
            $tmpObject = Visitante::buscarId($_SESSION["IdVisitante"]);
            $ArrayVisitante = Array();
            $ArrayVisitante['Cedula'] = $_POST['Cedula'];
            $ArrayVisitante['Nombre1'] = $_POST['Nombre1'];
            $ArrayVisitante['Nombre2'] = $_POST['Nombre2'];
            $ArrayVisitante['Apellido1'] = $_POST['Apellido1'];
            $ArrayVisitante['Apellido2'] = $_POST['Apellido2'];
            //$ArrayVisitante['UrlImagen'] = $_POST['UrlImagen'];
            $ArrayVisitante['TipoVisitante'] = $_POST['TipoVisitante'];
            $ArrayVisitante['TarjetaProfesional'] = $_POST['TarjetaProfesional'];
            $ArrayVisitante['Observaciones'] = $_POST['Observaciones'];
            $ArrayVisitante['IdVisitante']=$_SESSION['IdVisitante'];

            $dir_subida = __DIR__.'../../ImagenesVisitas/';
            $fichero_subido = $dir_subida . basename($_FILES['UrlImagen']['name']);

            echo '<pre>';
            if (move_uploaded_file($_FILES['UrlImagen']['tmp_name'], $fichero_subido)) {
                //echo "El fichero es válido y se subió con éxito.\n";
            } else {
                // echo "¡Posible ataque de subida de ficheros!\n";
            }
            $ArrayVisitante['UrlImagen'] = $_FILES['UrlImagen']['name'];



            $visitante = new Visitante($ArrayVisitante);

            var_dump($ArrayVisitante);

            $visitante->editar();
            self::CrearAlerta($_SESSION["IdVisitante"]);
            unset($_SESSION["IdVisitante"]);
            header("Location: ../Vista/Admin/default/ListarVisitantes.php?respuesta=correcto&IdVisitante=" . $ArrayVisitante['IdVisitante']);
        } catch (Exception $e) {
            var_dump($e);
        }
    }
    static public function EditarVisitaInterno()
    {
        try {
            $tmpObject = Visitante::buscarId($_SESSION["IdVisitante"]);
            $ArrayVisitante = Array();
            $ArrayVisitante['Cedula'] = $_POST['Cedula'];
            $ArrayVisitante['Nombre1'] = $_POST['Nombre1'];
            $ArrayVisitante['Nombre2'] = $_POST['Nombre2'];
            $ArrayVisitante['Apellido1'] = $_POST['Apellido1'];
            $ArrayVisitante['Apellido2'] = $_POST['Apellido2'];
            //$ArrayVisitante['UrlImagen'] = $_POST['UrlImagen'];
            $ArrayVisitante['TipoVisitante'] = $_POST['TipoVisitante'];
            $ArrayVisitante['Observaciones'] = $_POST['Observaciones'];
            $ArrayVisitante['IdVisitante']=$_SESSION['IdVisitante'];

            $dir_subida = __DIR__.'../../ImagenesVisitas/';
            $fichero_subido = $dir_subida . basename($_FILES['UrlImagen']['name']);

            echo '<pre>';
            if (move_uploaded_file($_FILES['UrlImagen']['tmp_name'], $fichero_subido)) {
                //echo "El fichero es válido y se subió con éxito.\n";
            } else {
                // echo "¡Posible ataque de subida de ficheros!\n";
            }
            $ArrayVisitante['UrlImagen'] = $_FILES['UrlImagen']['name'];



            $visitante = new Visitante($ArrayVisitante);

            var_dump($ArrayVisitante);

            $visitante->editar();
            self::CrearAlerta($_SESSION["IdVisitante"]);
            unset($_SESSION["IdVisitante"]);
            header("Location: ../Vista/Admin/default/RegistroVisitasInterno.php?IdRegistro=".$_SESSION["IdRegistro"]);
        } catch (Exception $e) {
            var_dump($e);
        }
    }
    static public function CrearAlerta($IdRegistrado)
    {
        try {
            //var_dump($_POST);
            $ArrayVisitante = Array();
            $ArrayVisitante['IdRegistrador'] = $_POST['IdRegistrador'];
            $ArrayVisitante['IdModificado'] = $IdRegistrado;
            $ArrayVisitante['Alerta']="Modificacion de datos Personales";
            $ArrayVisitante['FechaRegistro'] =$_POST["Fecha"];


            var_dump($ArrayVisitante);

            $visitante = new Visitante($ArrayVisitante);
            $visitante->insertarAlertaMod();
            //header("location: ../Vista/Admin/default/RegistrarVisitantes.php?respuesta=Correcto");
        } catch (Exception $e) {
            var_dump($e);

        }
    }

    static public function Select($isRequired = true, $id = "IdVisitante", $nombre = "IdVisitante", $class = "")
    {
        $ArrayVisitantes = Visitante::getAll();
        $htmlSelect = "<select class=\"form-control\" " . (($isRequired) ? "required" : "") . "id= '" . $id . "' name='" . $nombre . "' class='" . $class . "'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($ArrayVisitantes) > 0) {
            foreach ($ArrayVisitantes as $visitante)
                $htmlSelect .= "<option value='" . $visitante->getIdVisitante() . "'>" . $visitante->getCedula() . " - " . $visitante->getNombre1() . " " . $visitante->getNombre2() . " " . $visitante->getApellido1() . " " . $visitante->getApellido2() . " - Celular: " . $visitante->getCelular() . " - Rango: " . $visitante->getRango() . " - Permiso: " . $visitante->getIdPermiso() . " " . $visitante->getUsuario() . " " . $visitante->getPass() . " " . $visitante->getIdEstado() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function adminTableVisitante()
    {

        $ArrayVisitantes = Visitante::getAll();;
        //$tmpVisitante = new Visitante();
        $arrColumnas = [/*"Código",*/
            "No. Documento", "Nombre 1", "Nombre 2", "Apellido 1", "Apellido 2", "Tipo Visitante", "Tarjeta Profesional"];
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
            $htmltable .= "<td>" . $objVisitante->getCedula() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre1() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getNombre2() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getApellido1() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getApellido2() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getTipoVisitante() . "</td>";
            $htmltable .= "<td>" . $objVisitante->getTarjetaProfesional() . "</td>";
            //$htmltable .= "<td>" . $objVisitante->getEstado() . "</td>";



            $icons = "";


            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='ActualizarVisitantes.php?IdVisitante=" . $objVisitante->getIdVisitante() . "'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>" . $icons . "</td>";
            $htmltable .= "</tr>";

        }
        $htmltable .= "</tbody>";
        return $htmltable;

    }
    static public function Estado ($Estado){
        try {

            $IdVisitante = $_GET["IdVisitante"];
            $objVisitante = Visitante::buscarId($IdVisitante);
            $objVisitante->setEstado($Estado);
            var_dump($objVisitante);
            $objVisitante->editar();
            header("Location: ../Vista/Admin/default/ListarVisitante.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/ListarVisitante.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }


}
