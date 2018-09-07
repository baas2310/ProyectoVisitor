<?php
require_once ('db_abstract_class.php');

Class Visita extends db_abstract_class{
    private $IdRegistro;
    private $IdRegistrado;
    private $TD;
    private $Nombre1;
    private $Nombre2;
    private $nombre2;
    private $Apellido1;
    private $Apellido2;
    private $FechaNacimiento;
    private $UrlImagen;
    private $TipoVisita;
    private $Delito;
    private $TipoReclucion;
    private $IdUbicacionInterna;
    private $Ubicacion;
    private $Patio;
    private $Seccion;
    private $Celda;
    private $NombreCarcel;
    private $Municipio;
    private $Estado;
    private $FechaIngreso;
    private $IdCarcel;
    private $IdRegistradorSalida;
    private $FechaSalida;

    private $IdVisitante;
    private $CedulaVisitante;
    private $Nombre1Visitante;
    private $Nombre2Visitante;
    private $Apellido1Visitante;
    private $Apellido2Visitante;
    private $TipoVisitante;
    private $IdParentesco;
    private $Parentesco;
    private $UrlImagenVisitante;
    private $TargetaProfecional;

    private $IdRegistradorVisita;


    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdRegistro="";
            $this->IdRegistradorIngreso="";
            $this->IdRegistrado="";
            $this->TD="";
            $this->Nombre1="";
            $this->Nombre2="";
            $this->Apellido1="";
            $this->Apellido2="";
            $this->FechaNacimiento="";
            $this->UrlImagen="";
            $this->TipoVisita="";
            $this->Delito="";
            $this->TipoReclucion="";
            $this->IdUbicacionInterna;
            $this->Ubicacion;
            $this->Patio="";
            $this->Seccion="";
            $this->Celda="";
            $this->NombreCarcel="";
            $this->Municipio="";
            $this->Estado="";
            $this->FechaIngreso="";
            $this->IdCarcel="";
            $this->IdRegistradorSalida="";
            $this->FechaSalida="";

            $this->IdVisitante="";
            $this->CedulaVisitante="";
            $this->Nombre1Visitante="";
            $this->Nombre2Visitante="";
            $this->Apellido1Visitante="";
            $this->Apellido2Visitante="";
            $this->TipoVisitante="";
            $this->IdParentesco="";
            $this->Parentesco="";
            $this->TargetaProfecional="";


    }
    }
    function __destruct()
    {
        $this->Disconnect();
    }

    /**
     * @return string
     */
    public function getIdRegistro()
    {
        return $this->IdRegistro;
    }

    /**
     * @param string $IdRegistro
     */
    public function setIdRegistro($IdRegistro)
    {
        $this->IdRegistro = $IdRegistro;
    }

    /**
     * @return mixed
     */
    public function getIdRegistradorIngreso()
    {
        return $this->IdRegistradorIngreso;
    }

    /**
     * @param mixed $IdRegistradorVisita
     */
    public function setIdRegistradorIngreso($IdRegistradorVisita)
    {
        $this->IdRegistradorIngreso = $IdRegistradorVisita;
    }


    /**
     * @return string
     */
    public function getIdRegistrado()
    {
        return $this->IdRegistrado;
    }

    /**
     * @param string $IdRegistrado
     */
    public function setIdRegistrado($IdRegistrado)
    {
        $this->IdRegistrado = $IdRegistrado;
    }

    /**
     * @return string
     */
    public function getTD()
    {
        return $this->TD;
    }

    /**
     * @param string $TD
     */
    public function setTD($TD)
    {
        $this->TD = $TD;
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
    public function getFechaNacimiento()
    {
        return $this->FechaNacimiento;
    }

    /**
     * @param string $FechaNacimiento
     */
    public function setFechaNacimiento($FechaNacimiento)
    {
        $this->FechaNacimiento = $FechaNacimiento;
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
    public function getTipoVisita()
    {
        return $this->TipoVisita;
    }

    /**
     * @param string $TipoVisita
     */
    public function setTipoVisita($TipoVisita)
    {
        $this->TipoVisita = $TipoVisita;
    }

    /**
     * @return string
     */
    public function geTDelito()
    {
        return $this->Delito;
    }

    /**
     * @param string $Delito
     */
    public function seTDelito($Delito)
    {
        $this->Delito = $Delito;
    }

    /**
     * @return string
     */
    public function getTipoReclucion()
    {
        return $this->TipoReclucion;
    }

    /**
     * @param string $TipoReclucion
     */
    public function setTipoReclucion($TipoReclucion)
    {
        $this->TipoReclucion = $TipoReclucion;
    }

    /**
     * @return mixed
     */
    public function getIdUbicacionInterna()
    {
        return $this->IdUbicacionInterna;
    }

    /**
     * @param mixed $IdUbicacionInterna
     */
    public function setIdUbicacionInterna($IdUbicacionInterna)
    {
        $this->IdUbicacionInterna = $IdUbicacionInterna;
    }

    /**
     * @return mixed
     */
    public function getUbicacion()
    {
        return $this->Ubicacion;
    }

    /**
     * @param mixed $Ubicacion
     */
    public function setUbicacion($Ubicacion)
    {
        $this->Ubicacion = $Ubicacion;
    }


    /**
     * @return string
     */

    public function getPatio()
    {
        return $this->Patio;
    }

    /**
     * @param string $Patio
     */
    public function setPatio($Patio)
    {
        $this->Patio = $Patio;
    }

    /**
     * @return string
     */
    public function getSeccion()
    {
        return $this->Seccion;
    }

    /**
     * @param string $Seccion
     */
    public function setSeccion($Seccion)
    {
        $this->Seccion = $Seccion;
    }

    /**
     * @return string
     */
    public function getCelda()
    {
        return $this->Celda;
    }

    /**
     * @param string $Celda
     */
    public function setCelda($Celda)
    {
        $this->Celda = $Celda;
    }

    /**
     * @return string
     */
    public function getNombreCarcel()
    {
        return $this->NombreCarcel;
    }

    /**
     * @param string $NombreCarcel
     */
    public function setNombreCarcel($NombreCarcel)
    {
        $this->NombreCarcel = $NombreCarcel;
    }

    /**
     * @return string
     */
    public function getMunicipio()
    {
        return $this->Municipio;
    }

    /**
     * @param string $Municipio
     */
    public function setMunicipio($Municipio)
    {
        $this->Municipio = $Municipio;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return string
     */
    public function getFechaIngreso()
    {
        return $this->FechaIngreso;
    }

    /**
     * @param string $FechaIngreso
     */
    public function setFechaIngreso($FechaIngreso)
    {
        $this->FechaIngreso = $FechaIngreso;
    }

    /**
     * @return string
     */
    public function getIdCarcel()
    {
        return $this->IdCarcel;
    }

    /**
     * @param string $IdCarcel
     */
    public function setIdCarcel($IdCarcel)
    {
        $this->IdCarcel = $IdCarcel;
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
    public function getCedulaVisitante()
    {
        return $this->CedulaVisitante;
    }

    /**
     * @param string $CedulaVisitante
     */
    public function setCedulaVisitante($CedulaVisitante)
    {
        $this->CedulaVisitante = $CedulaVisitante;
    }

    /**
     * @return string
     */
    public function getNombre1Visitante()
    {
        return $this->Nombre1Visitante;
    }

    /**
     * @param string $Nombre1Visitante
     */
    public function setNombre1Visitante($Nombre1Visitante)
    {
        $this->Nombre1Visitante = $Nombre1Visitante;
    }

    /**
     * @return string
     */
    public function getNombre2Visitante()
    {
        return $this->Nombre2Visitante;
    }

    /**
     * @param string $Nombre2Visitante
     */
    public function setNombre2Visitante($Nombre2Visitante)
    {
        $this->Nombre2Visitante = $Nombre2Visitante;
    }

    /**
     * @return string
     */
    public function getApellido1Visitante()
    {
        return $this->Apellido1Visitante;
    }

    /**
     * @param string $Apellido1Visitante
     */
    public function setApellido1Visitante($Apellido1Visitante)
    {
        $this->Apellido1Visitante = $Apellido1Visitante;
    }

    /**
     * @return string
     */
    public function getApellido2Visitante()
    {
        return $this->Apellido2Visitante;
    }

    /**
     * @param string $Apellido2Visitante
     */
    public function setApellido2Visitante($Apellido2Visitante)
    {
        $this->Apellido2Visitante = $Apellido2Visitante;
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
    public function getUrlImagenVisitante()
    {
        return $this->UrlImagenVisitante;
    }

    /**
     * @param mixed $UrlImagenVisitante
     */
    public function setUrlImagenVisitante($UrlImagenVisitante)
    {
        $this->UrlImagenVisitante = $UrlImagenVisitante;
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
    public function getIdRegistradorSalida()
    {
        return $this->IdRegistradorSalida;
    }

    /**
     * @param string $IdRegistradorSalida
     */
    public function setIdRegistradorSalida($IdRegistradorSalida)
    {
        $this->IdRegistradorSalida = $IdRegistradorSalida;
    }

    /**
     * @return string
     */
    public function getFechaSalida()
    {
        return $this->FechaSalida;
    }

    /**
     * @param string $FechaSalida
     */
    public function setFechaSalida($FechaSalida)
    {
        $this->FechaSalida = $FechaSalida;
    }

    /**
     * @return string
     */
    public function getTargetaProfecional()
    {
        return $this->TargetaProfecional;
    }

    /**
     * @param string $TargetaProfecional
     */
    public function setTargetaProfecional($TargetaProfecional)
    {
        $this->TargetaProfecional = $TargetaProfecional;
    }





    public static function buscarId($id){
        $Visita = new Visita();
        if ($id>0){
            $getRow = $Visita->getRow("SELECT IdRegistro, tbInterno.IdInterno, tbregistro.TD,tbInterno.Nombre1,tbInterno.Nombre2,tbInterno.Apellido1,tbInterno.Apellido2,tbInterno.FechaNacimiento,tbInterno.UrlImagen, tbregistro.FechaIngreso,tbtipoVisita.TipoVisita,tbdelito.Delito,tbtiporeclucion.TipoReclucion,tbubicacionVisita.Patio,tbubicacionVisita.Seccion,tbubicacionVisita.Celda,tbubicacionVisita.IdCarcel, tbubicacionVisita.IdUbicacionVisita ,tbCarcel.NombreCarcel, municipios.municipio, tbestado.Estado ,tbregistro.FechaSalida FROM `tbregistro`INNER JOIN tbVisita ON tbVisita.IdVisita = tbregistro.IdRegistrado INNER JOIN tbtipoVisita on tbtipoVisita.IdTipoVisita = tbregistro.IdTipoVisita INNER JOIN tbtiporeclucion on tbtiporeclucion.IdTipoReclucion = tbregistro.IdTipodeReclucion INNER JOIN tbubicacionVisita on tbubicacionVisita.IdUbicacionVisita = tbregistro.IdUbicacionInterna INNER JOIN tbdelito ON tbdelito.IdDelito = tbregistro.IdDelito INNER JOIN tbCarcel on tbCarcel.IdCarcel = tbubicacionVisita.IdCarcel INNER JOIN municipios on municipios.id_municipio = tbCarcel.IdUbicacion INNER JOIN tbestado on tbestado.IdEstado = tbregistro.IdEstado where IdVisita = ?" , array($id));
            $Visita->IdRegistro=$getRow['IdRegistro'];
            $Visita->IdRegistrado=$getRow['IdInterno'];
            $Visita->TD=$getRow['TD'];
            $Visita->Nombre1=$getRow['Nombre1'];
            $Visita->Nombre2=$getRow['Nombre2'];
            $Visita->Apellido1=$getRow['Apellido1'];
            $Visita->Apellido2=$getRow['Apellido2'];
            $Visita->FechaNacimiento=$getRow['FechaNacimiento'];
            $Visita->UrlImagen=$getRow['UrlImagen'];
            $Visita->FechaIngreso=$getRow['FechaIngreso'];
            $Visita->TipoVisita=$getRow['TipoVisita'];
            $Visita->Delito=$getRow['Delito'];
            $Visita->TipoReclucion=$getRow['TipoReclucion'];
            $Visita->Patio=$getRow['Patio'];
            $Visita->Seccion=$getRow['Seccion'];
            $Visita->Celda=$getRow['Celda'];
            $Visita->IdCarcel=$getRow['IdCarcel'];
            $Visita->IdUbicacionInterna=$getRow['IdUbicacionVisita'];
            $Visita->NombreCarcel=$getRow['NombreCarcel'];
            $Visita->Municipio=$getRow['municipio'];
            $Visita->Estado=$getRow['Estado'];
            $Visita->FechaSalida=$getRow['FechaSalida'];

            $Visita->Disconnect();
            return $Visita;
        }else{
            return NULL;
        }
    }

    protected static function buscar($query)
    {
        $arrayVisita = array();
        $tmp = new Visita();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Visita = new Visita();
            $Visita->IdRegistro=$valor['IdRegistro'];
            $Visita->IdRegistrado=$valor['IdVisita'];
            $Visita->TD=$valor['TD'];
            $Visita->Nombre1=$valor['Nombre1'];
            $Visita->Nombre2=$valor['Nombre2'];
            $Visita->Apellido1=$valor['Apellido1'];
            $Visita->Apellido2=$valor['Apellido2'];
            $Visita->FechaNacimiento=$valor['FechaNacimiento'];
            $Visita->UrlImagen=$valor['UrlImagen'];
            $Visita->TipoVisita=$valor['TipoVisita'];
            $Visita->Delito=$valor['Delito'];
            $Visita->TipoReclucion=$valor['TipoReclucion'];
            $Visita->Patio=$valor['Patio'];
            $Visita->Seccion=$valor['Seccion'];
            $Visita->Celda=$valor['Celda'];
            $Visita->NombreCarcel=$valor['NombreCarcel'];
            $Visita->Municipio=$valor['municipio'];
            $Visita->Estado=$valor['Estado'];

            array_push($arrayVisita,$Visita);

    }
    $tmp->Disconnect();
        return $arrayVisita;
    }
    public static function buscarVisitante($Cedula){
        $Visita = new Visita();
        if ($Cedula>"") {
            $getRow = $Visita->getRow("SELECT * FROM `tbVisita`WHERE Cedula =?", array($Cedula));
            $Visita->IdRegistrado = $getRow['IdVisitante'];
            $Visita->CedulaVisitante = $getRow['Cedula'];
            $Visita->Nombre1Visitante = $getRow['Nombre1'];
            $Visita->Nombre2Visitante = $getRow['Nombre2'];
            $Visita->Apellido1Visitante = $getRow['Apellido1'];
            $Visita->Apellido2Visitante = $getRow['Apellido2'];
            $Visita->UrlImagenVisitante = $getRow['UrlImagen'];
            $Visita->TipoVisitante = $getRow['IdTipoVisitante'];
            $Visita->TargetaProfecional = $getRow['TargetaProfecional'];
            $Visita->Estado = $getRow['IdEstado'];


            array_push($arrayVisita,$Visita);

            $Visita->Disconnect();
            return $Visita;

        }else{
            return NULL;
        }

        }
        protected function buscarIdRegistrado($query)
    {
        $arrayVisita = array();
        $tmp = new Visita();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Visita = new Visita();
            $Visita->IdRegistro=$valor['IdRegistrado'];
            array_push($arrayVisita,$Visita);
    }
        $tmp->Disconnect();
        return $arrayVisita;
    }

    public static function getAll()
    {

    }

    public static function buscarVisita($query)
    {
        $arrayVisitante = array();
        $tmp = new Visita();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Visitante = new Visita();
            $Visitante->IdVisitante=$valor['IdVisitante'];
            $Visitante->CedulaVisitante=$valor['Cedula'];
            $Visitante->Nombre1Visitante=$valor['Nombre1'];
            $Visitante->Nombre2Visitante=$valor['Nombre2'];
            $Visitante->Apellido1Visitante=$valor['Apellido1'];
            $Visitante->Apellido2Visitante2=$valor['Apellido2'];
            $Visitante->UrlImagenVisitante=$valor['UrlImagen'];
            $Visitante->TipoVisitante=$valor['IdTipoVisitante'];
            $Visitante->Estado=$valor['IdEstado'];


            array_push($arrayVisitante,$Visitante);
        }
        $tmp->Disconnect();

        return $arrayVisitante;
    }
    public static function getVisita($Cedula)
    {

        var_dump(Visita::buscarVisita("SELECT * FROM `tbvisitante`"));

        return Visita::buscarVisita("SELECT * FROM tbvisitante WHERE Cedula ="."$Cedula"." AND IdEstado = 1");
    }
    public static function buscarLimite($query)
    {

        $tmp = new Visita();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Limite = $valor['COUNT(IdVinculo)'];

        }
        $tmp->Disconnect();
        return $Limite;
    }


    public function insertar()
    {
        $this->insertRow("insert into tbVisita values(NULL ,?,?,?,?,NULL ,NULL )",array(

                $this->IdRegistradorVisita,
                $this->IdRegistro,
                $this->IdVisitante,
                $this->FechaIngreso,

            )
        );
$this->Disconnect();

    }

    public function insertarRegistro()
    {
        $this->insertRow("insert into tbRegistro values(NULL ,?,?,?,NULL ,NULL ,?,?,?,?,?,?,?)",array(

                $this->IdRegistradorIngreso,
                $this->IdRegistrado,
                $this->FechaIngreso,
                $this->TD,
                $this->IdTipoVisita,
                $this->IdTipoReclucion,
                $this->IdUbicacionInterna,
                $this->Ubicacion,
                $this->IdDelito,
                $this->Estado

            )
        );
        $this->Disconnect();

    }
    public function editar()
    {
        $this->updateRow("update tbRegistro set IdUbicacionInterna= ? where IdRegistrado = ?",array(


                $this->IdUbicacionInterna,
                $this->IdRegistrado,
            )
        );
        $this->Disconnect();

    }
    public function editarEstado()
    {
        $this->updateRow("UPDATE `tbregistro` set IdEstado =?, IdRegistradorSalida = ?,  FechaSalida = ? WHERE IdRegistrado = ? ",array(



                $this->Estado,
                $this->IdRegistradorIngreso,
                $this->FechaIngreso,
                $this->IdRegistrado,
            )
        );
        $this->Disconnect();

    }
    public function insertarAlerta()
    {
        $this->insertRow("insert into tbAlerta values(NULL ,?,?,?,? )",array(


                $this->IdRegistrador,
                $this->IdModificado,
                $this->Alerta,
                $this->FechaRegistro,

            )
        );
        $this->Disconnect();

    }
    public function editarEstadoVisitante()
    {
        $this->updateRow("UPDATE `tbVisitante` set IdEstado =?WHERE IdVisitante = ? ",array(



                $this->Estado,
                $this->IdVisitante,
            )
        );
        $this->Disconnect();

    }
    public function insertarAlertaModVisita()
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

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}