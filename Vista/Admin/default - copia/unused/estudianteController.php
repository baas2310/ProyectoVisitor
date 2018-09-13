<?php

if(session_id() == "" )
    session_start();

require_once (__DIR__ . '/../Modelo/estudiante.php');

if (!empty($_GET['action'])){
    estudianteController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion... ";
}

class estudianteController
{
    static function main($action){

        if ($action=="crear"){
            estudianteController::crear();
        }else if ($action=="editar"){
            estudianteController::editar();
        }else if ($action=="selectUsuarios"){
            estudianteController::selectUsuarios();
        }else if ($action=="adminTableUsuario"){
            estudianteController::adminTableUsuario();
        }else if ($action=="inactivarUsuario"){
            estudianteController::CambiarEstado("Inactivo");
        }else if ($action=="activarUsuario"){
            estudianteController::CambiarEstado("Activo");
        }else if ($action=="Login"){
            estudianteController::Login();
        }else if ($action=="CerrarSesion"){
            estudianteController::CerrarSession();
        }

    }

    static public function crear(){

        try{

            $arrayEstudiante = array();
            $arrayEstudiante['Documento'] = $_POST['Documento'];
            $arrayEstudiante['TipoDocumento'] = $_POST['TipoDocumento'];
            $arrayEstudiante['Apellidos'] = $_POST['Apellidos'];
            $arrayEstudiante['Nombres'] = $_POST['Nombres'];
            $arrayEstudiante['Email'] = $_POST['Email'];
            $arrayEstudiante['Password'] = $_POST['Password'];
            $arrayEstudiante['Celular'] = $_POST['Celular'];
            $arrayEstudiante['Direccion'] = $_POST['Direccion'];
            $arrayEstudiante['Estado'] = $_POST['Estado'];
            $arrayEstudiante['idCurso'] = $_POST['idCurso'];
            $arrayEstudiante['idAcudiente'] = $_POST['idAcudiente'];
            $arrayEstudiante['idRol'] = $_POST['idRol'];


            var_dump($arrayEstudiante);

            $estudiante = new Usuario($arrayEstudiante);
            $estudiante->insertar();

            header("Location: ../Vista/Admin/default/adminAlumnos.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/registrarAlumnos.php?respuesta=errorXUsuario"); */
        }

    }

    static public function editar(){

        try{
            $tmpObject = Estudiante::buscarForId($_SESSION["IdEstudiante"]);
            $Estado = $tmpObject->getEstado();
            $arrayEstudiante = array();
            $arrayEstudiante['Documento'] = $_POST['Documento'];
            $arrayEstudiante['TipoDocumento'] = $_POST['TipoDocumento'];
            $arrayEstudiante['Apellidos'] = $_POST['Apellidos'];
            $arrayEstudiante['Nombres'] = $_POST['Nombres'];
            $arrayEstudiante['Email'] = $_POST['Email'];
            $arrayEstudiante['Password'] = $_POST['Password'];
            $arrayEstudiante['Celular'] = $_POST['Celular'];
            $arrayEstudiante['Direccion'] = $_POST['Direccion'];
            $arrayEstudiante['Estado'] = $Estado;
            $arrayEstudiante['idCurso'] = $_POST['idCurso'];
            $arrayEstudiante['idAcudiente'] = $_POST['idAcudiente'];
            $arrayEstudiante['idRol'] = $_POST['idRol'];
            $arrayEstudiante['idUsuario'] = $_SESSION['IdUsuario'];
            $estudiante = new Estudiante($arrayEstudiante);

            var_dump($arrayEstudiante);

            $estudiante->editar();
            unset($_SESSION["IdEstudiante"]);
            header("Location: ../Vista/Admin/default/adminAlumnos.php?respuesta=correcto&IdUsuario=".$arrayEstudiante['idEstudiante']);

        }catch (Exception $e){

            var_dump($e);
            /* $txtMensaje = $e->getMessage();

             header("Location: ../Vista/Admin/default/adminalumnos.php?respuesta=error&Mensaje=".$txtMensaje); */
        }

    }

    static public function selectEstudiantes($isRequired = true, $id = "idEstudiante", $nombre = "idEstudiante", $class = ""){

        $arrEstudiantes = Estudiante::getAll();
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")."id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($arrEstudiantes) > 0){
            foreach ($arrEstudiantes as $estudiante)
                $htmlSelect .= "<option value='".$estudiante->getIdEstudiante()."'>".$estudiante->getApellidos()." ".$estudiante->getNombres()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;

    }

    static public function adminTableEstudiante(){

        $arrEstudiantes = Estudiante::getAll();
        $tmpEstudiantes = new Estudiante();
        $arrColumnas = [/*"idUsuario",*/ "No. Documento", "Tipo de Documento", "Apellidos", "Nombres", "Email", "Celular", "Direccion", "Curso o Grado", "Acudiente", "Cargo o Rol", "Estado" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th>".$NameColumna."</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrEstudiantes as $objEstudiante){
            $htmltable .="<tr>";

            // $htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";
            $htmltable .= "<td>".$objEstudiante->getDocumento()."</td>";
            $htmltable .= "<td>".$objEstudiante->getTipoDocumento()."</td>";
            $htmltable .= "<td>".$objEstudiante->getApellidos()."</td>";
            $htmltable .= "<td>".$objEstudiante->getNombres()."</td>";
            $htmltable .= "<td>".$objEstudiante->getEmail()."</td>";
            $htmltable .= "<td>".$objEstudiante->getCelular()."</td>";
            $htmltable .= "<td>".$objEstudiante->getDireccion()."</td>";

            if ($objEstudiante->getIdCurso() == "1"){
                $htmltable .= "<td>"."Primero"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "2"){
                $htmltable .= "<td>"."Segundo"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "3"){
                $htmltable .= "<td>"."Tercero"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "4"){
                $htmltable .= "<td>"."Cuarto"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "5"){
                $htmltable .= "<td>"."Quinto"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "6"){
                $htmltable .= "<td>"."Sexto"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "7"){
                $htmltable .= "<td>"."Septimo"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "8"){
                $htmltable .= "<td>"."Octavo"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "9"){
                $htmltable .= "<td>"."Noveno"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "10"){
                $htmltable .= "<td>"."Decimo"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "11"){
                $htmltable .= "<td>"."Undecimo"."</td>";
            }elseif ($objEstudiante->getIdCurso() == "12"){
                $htmltable .= "<td>"."Preescolar"."</td>";
            }

            $htmltable .= "<td>".$objEstudiante->getAcudiente()."</td>";

            if ($objEstudiante->getIdRol() == "7"){
                $htmltable .= "<td>"."Estudiante"."</td>";
            }

            if ($objEstudiante->getEstado() == "Activo"){
                $htmltable .= "<td><span class= 'label label-success'>".$objEstudiante->getEstado()."</span></td>";
            }else{
                $htmltable .= "<td><span class='label label-inverse' >".$objEstudiante->getEstado()."</span></td>";
            }


            $icons = "";

            if ($objEstudiante->getEstado()=="Activo"){
                $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/estudianteController.php?action=inactivarUsuario&idUsuario=".$objEstudiante->getIdEstudiante()."'><i class='fa fa-remove'></i></a>";
            }else{
                $icons .= "<a data-toggle='tooltip' title='Activar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' href='../../../Controlador/estudianteController.php?action=activarUsuario&idUsuario=".$objEstudiante->getIdEstudiante()."'><i class='fa fa-check'></i></a>";
            }

            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='editarAlumnos.php?IdEstudiante=".$objEstudiante->getIdEstudiante()."'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>".$icons."</td>";
            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

    static public function CambiarEstado ($Estado){
        try {
            $idEstudiante = $_GET["idEstudiante"];
            $ObjEstudiante = Estudiante::buscarForId($idEstudiante);
            $ObjEstudiante->setEstado($Estado);
            var_dump($ObjEstudiante);
            $ObjEstudiante->editar();
            header("Location: ../Vista/Admin/default/adminAlumnos.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/adminalumnos.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

    public function Login (){

        try {
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            if(!empty($Email) && !empty($Password)){
                $respuesta = Estudiante::Login($Email, $Password);
                if (is_array($respuesta)) {
                    if($respuesta["Estado"] == "Activo" ){
                        if ($respuesta["idRol"] == "7"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Estudiante";
                        }
                    }else{
                        echo "El usuario se encuentra Inactivo";
                    }
                }else if($respuesta == "Contraseña Incorrecta"){
                    echo "La Contraseña No Coincide Con El Usuario";
                }else if($respuesta == "No existe el usuario"){
                    echo "No Existe Un Usuario Con Estos Datos";
                }
            }else{
                echo "Datos Vacios";
            }
        } catch (Exception $e) {
            echo "Error No Identificado!!! ".$e;
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../Vista/Admin/default/login.php");
    }

}