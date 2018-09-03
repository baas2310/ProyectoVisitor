<?php
require_once ('db_abstract_class.php');

Class Visitante extends db_abstract_class{
    private $IdVisitante;
    private $Cedula;
    private $Nombre1;
    private $Nombre2;
    private $nombre2;
    private $Apellido1;
    private $Apellido2;
    private $UrlImagen;
    private $TipoVisitante;
    private $TarjetaProfesional;
    private $Observaciones;
    private $IdParentesco;
    private $Parentesco;

    Private $IdRegistrador;
    private $IdModificado;
    private $FechaRegistro;
    private $Alerta;

    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdVisitante="";
            $this->Cedula="";
            $this->Nombre1="";
            $this->Nombre2="";
            $this->Apellido1="";
            $this->Apellido2="";
            $this->UrlImagen="";
            $this->TipoVisitante="";
            $this->TarjetaProfesional="";
            $this->Observaciones="";
            $this->IdParentesco="";
            $this->Parentesco="";

            $this->IdRegistrador;
            $this->IdModificado;
            $this->FechaRegistro;
            $this->Alerta;

    }
    }
    function __destruct()
    {
        $this->Disconnect();
    }

    /**
     * @return string
     */
    public function getIdVisitante()
    {
        return $this->IdVisitante;
    }

    /**
     * @param string $IdVisitante
     */
    public function setIdVisitante($IdVisitante)
    {
        $this->IdVisitante = $IdVisitante;
    }

    /**
     * @return string
     */
    public function getCedula()
    {
        return $this->Cedula;
    }

    /**
     * @param string $Cedula
     */
    public function setCedula($Cedula)
    {
        $this->Cedula = $Cedula;
    }

    /**
     * @return string
     */
    public function getNombre1()
    {
        return $this->Nombre1;
    }

    /**
     * @param string $Nombre1
     */
    public function setNombre1($Nombre1)
    {
        $this->Nombre1 = $Nombre1;
    }

    /**
     * @return mixed
     */
    public function getNombre2()
    {
        return $this->Nombre2;
    }

    /**
     * @param mixed $nombre2
     */
    public function setNombre2($nombre2)
    {
        $this->nombre2 = $nombre2;
    }

    /**
     * @return string
     */
    public function getApellido1()
    {
        return $this->Apellido1;
    }

    /**
     * @param string $Apellido1
     */
    public function setApellido1($Apellido1)
    {
        $this->Apellido1 = $Apellido1;
    }

    /**
     * @return string
     */
    public function getApellido2()
    {
        return $this->Apellido2;
    }

    /**
     * @param string $Apellido2
     */
    public function setApellido2($Apellido2)
    {
        $this->Apellido2 = $Apellido2;
    }

    /**
     * @return string
     */
    public function getUrlImagen()
    {
        return $this->UrlImagen;
    }

    /**
     * @param string $UrlImagen
     */
    public function setUrlImagen($UrlImagen)
    {
        $this->UrlImagen = $UrlImagen;
    }

    /**
     * @return string
     */
    public function getTipoVisitante()
    {
        return $this->TipoVisitante;
    }

    /**
     * @param string $TipoVisitante
     */
    public function setTipoVisitante($TipoVisitante)
    {
        $this->TipoVisitante = $TipoVisitante;
    }

    /**
     * @return string
     */
    public function getTarjetaProfesional()
    {
        return $this->TarjetaProfesional;
    }

    /**
     * @param string $TarjetaProfesional
     */
    public function setTarjetaProfesional($TarjetaProfesional)
    {
        $this->TarjetaProfesional = $TarjetaProfesional;
    }

    /**
     * @return string
     */
    public function getObservaciones()
    {
        return $this->Observaciones;
    }

    /**
     * @param string $Observaciones
     */
    public function setObservaciones($Observaciones)
    {
        $this->Observaciones = $Observaciones;
    }

    /**
     * @return mixed
     */
    public function getIdRegistrador()
    {
        return $this->IdRegistrador;
    }

    /**
     * @param mixed $IdRegistrador
     */
    public function setIdRegistrador($IdRegistrador)
    {
        $this->IdRegistrador = $IdRegistrador;
    }

    /**
     * @return mixed
     */
    public function getIdModificado()
    {
        return $this->IdModificado;
    }

    /**
     * @param mixed $IdModificado
     */
    public function setIdModificado($IdModificado)
    {
        $this->IdModificado = $IdModificado;
    }

    /**
     * @return mixed
     */
    public function getAlerta()
    {
        return $this->Alerta;
    }

    /**
     * @param mixed $Alerta
     */
    public function setAlerta($Alerta)
    {
        $this->Alerta = $Alerta;
    }

    /**
     * @return string
     */
    public function getIdParentesco()
    {
        return $this->IdParentesco;
    }

    /**
     * @param string $IdParentesco
     */
    public function setIdParentesco($IdParentesco)
    {
        $this->IdParentesco = $IdParentesco;
    }

    /**
     * @return string
     */
    public function getParentesco()
    {
        return $this->Parentesco;
    }

    /**
     * @param string $Parentesco
     */
    public function setParentesco($Parentesco)
    {
        $this->Parentesco = $Parentesco;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->FechaRegistro;
    }

    /**
     * @param mixed $FechaRegistro
     */
    public function setFechaRegistro($FechaRegistro)
    {
        $this->FechaRegistro = $FechaRegistro;
    }

    public static function buscarId($id){
        $Visitante = new Visitante();
        if ($id>0){
            $getRow = $Visitante->getRow("select tbvisitante.IdVisitante,Cedula,Nombre1,Nombre2,Apellido1,Apellido2,UrlImagen,TipoVisitante,TarjetaProfesional,Observaciones from tbVisitante inner join tbTipoVisitante on tbVisitante.IdTipoVisitante = tbTipoVisitante.IdTipoVisitante WHERE tbvisitante.IdVisitante = ?", array($id));
            $Visitante->IdVisitante=$getRow['IdVisitante'];
            $Visitante->Cedula=$getRow['Cedula'];
            $Visitante->Nombre1=$getRow['Nombre1'];
            $Visitante->Nombre2=$getRow['Nombre2'];
            $Visitante->Apellido1=$getRow['Apellido1'];
            $Visitante->Apellido2=$getRow['Apellido2'];
            $Visitante->UrlImagen=$getRow['UrlImagen'];
            $Visitante->TipoVisitante=$getRow['TipoVisitante'];
            $Visitante->TarjetaProfesional=$getRow['TarjetaProfesional'];
            $Visitante->Observaciones=$getRow['Observaciones'];


            $Visitante->Disconnect();
            return $Visitante;
        }else{
            return NULL;
        }
    }



    public static function buscarIdVint($id){
        $Visitante = new Visitante();
        if ($id>0){
            $getRow = $Visitante->getRow("select tbvisitante.IdVisitante,Cedula,Nombre1,Nombre2,Apellido1,Apellido2,UrlImagen,TipoVisitante,TarjetaProfesional,Observaciones,tbparentesco.Parentesco, tbparentesco.IdParentesco from tbVisitante inner join tbTipoVisitante on tbVisitante.IdTipoVisitante = tbTipoVisitante.IdTipoVisitante INNER JOIN tbvinvulo on tbvinvulo.IdVisitante = tbvisitante.IdVisitante INNER JOIN tbparentesco on tbparentesco.IdParentesco = tbvinvulo.IdParentesco  WHERE tbvisitante.IdVisitante = ?", array($id));
            $Visitante->IdVisitante=$getRow['IdVisitante'];
            $Visitante->Cedula=$getRow['Cedula'];
            $Visitante->Nombre1=$getRow['Nombre1'];
            $Visitante->Nombre2=$getRow['Nombre2'];
            $Visitante->Apellido1=$getRow['Apellido1'];
            $Visitante->Apellido2=$getRow['Apellido2'];
            $Visitante->UrlImagen=$getRow['UrlImagen'];
            $Visitante->TipoVisitante=$getRow['TipoVisitante'];
            $Visitante->TarjetaProfesional=$getRow['TarjetaProfesional'];
            $Visitante->Observaciones=$getRow['Observaciones'];
            $Visitante->IdParentesco=$getRow['IdParentesco'];
            $Visitante->Parentesco=$getRow['Parentesco'];

            $Visitante->Disconnect();
            return $Visitante;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayVisitante = array();
        $tmp = new Visitante();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Visitante = new Visitante();
            $Visitante->IdVisitante=$valor['IdVisitante'];
            $Visitante->Cedula=$valor['Cedula'];
            $Visitante->Nombre1=$valor['Nombre1'];
            $Visitante->Nombre2=$valor['Nombre2'];
            $Visitante->Apellido1=$valor['Apellido1'];
            $Visitante->Apellido2=$valor['Apellido2'];
            $Visitante->UrlImagen=$valor['UrlImagen'];
            $Visitante->TipoVisitante=$valor['TipoVisitante'];
            $Visitante->TarjetaProfesional=$valor['TarjetaProfesional'];

            array_push($arrayVisitante,$Visitante);
    }
    $tmp->Disconnect();
        return $arrayVisitante;
    }

    public static function getAll()
    {
        return Visitante::buscar("select IdVisitante,Cedula,Nombre1,Nombre2,Apellido1,Apellido2,UrlImagen,TipoVisitante,TarjetaProfesional from tbVisitante inner join tbTipoVisitante on tbVisitante.IdTipoVisitante = tbTipoVisitante.IdTipoVisitante ");
    }

    public static function buscarIdVisitante($query)
    {
        $arrayVisitante = array();
        $tmp = new Visitante();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Visitante = new Visitante();
            $Visitante->IdVisitante=$valor['IdVisitante'];

            array_push($arrayVisitante,$Visitante);
        }
        $tmp->Disconnect();
        return $arrayVisitante;
    }
    public static function buscarIdRegistrado($Cedula){
        $Visitante = new Visitante();
        if ($Cedula>"") {
            $getRow = $Visitante->getRow("SELECT IdVisitante FROM `tbVisitante`WHERE Cedula =?", array($Cedula));
            $Visitante->IdVisitante = $getRow['IdVisitante'];

            $Visitante->Disconnect();
            return $Visitante;

        }else{
            return NULL;
        }

    }
    public function insertar()
    {
        $this->insertRow("insert into tbVisitante values(NULL ,?,?,?,?,?,?,?,?,NULL )",array(


                $this->Cedula,
                $this->Nombre1,
                $this->Nombre2,
                $this->Apellido1,
                $this->Apellido2,
                $this->UrlImagen,
                $this->TipoVisitante,
                $this->TarjetaProfesional,
            )
        );
$this->Disconnect();

    }
    public function insertarAlerta()
    {
        $this->insertRow("insert into RegistroVisitantes values(NULL ,?,?,? )",array(


                $this->IdRegistrador,
                $this->IdModificado,
                $this->FechaRegistro,

            )
        );
        $this->Disconnect();

    }
    public function insertarAlertaMod()
    {
        $this->insertRow("insert into tbAlertaVisitante values(NULL ,?,?,?,? )",array(


                $this->IdRegistrador,
                $this->IdModificado,
                $this->Alerta,
                $this->FechaRegistro,

            )
        );
        $this->Disconnect();

    }


    public function editar()
    {
        $this->updateRow("update tbVisitante set Cedula= ?, Nombre1= ?, Nombre2= ?, Apellido1= ?, Apellido2= ?, UrlImagen= ?, IdTipoVisitante= ?, TarjetaProfesional= ?,Observaciones= ? where IdVisitante = ?",array(


                $this->Cedula,
                $this->Nombre1,
                $this->Nombre2,
                $this->Apellido1,
                $this->Apellido2,
                $this->UrlImagen,
                $this->TipoVisitante,
                $this->TarjetaProfesional,
                $this->Observaciones.date(' m/d/Y'),
                $this->IdVisitante,


            )
        );
        $this->Disconnect();

    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    public static function Login($Usuario, $Password){
        $arrayVisitantes = array();
        $tmp = new Visitante();
        $getTempUser = $tmp->getRows("select * from tbVisitante WHERE Usuario = '$Usuario'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("select * from tbVisitante WHERE Usuario = '$Usuario' AND Pass = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Contraseña Incorrecta";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrayVisitantes;
    }
}