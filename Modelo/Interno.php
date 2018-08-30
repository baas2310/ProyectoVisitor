<?php
require_once ('db_abstract_class.php');

Class Interno extends db_abstract_class{
    private $IdRegistro;
    private $IdRegistradorIngreso;
    private $IdRegistrado;
    private $TD;
    private $Nombre1;
    private $Nombre2;
    private $nombre2;
    private $Apellido1;
    private $Apellido2;
    private $FechaNacimiento;
    private $UrlImagen;
    private $TipoInterno;
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

    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdRegistro="";
            $this->IdRegistradorIngreso;
            $this->IdRegistrado="";
            $this->TD="";
            $this->Nombre1="";
            $this->Nombre2="";
            $this->Apellido1="";
            $this->Apellido2="";
            $this->FechaNacimiento="";
            $this->UrlImagen="";
            $this->TipoInterno="";
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
     * @param mixed $IdRegistradorIngreso
     */
    public function setIdRegistradorIngreso($IdRegistradorIngreso)
    {
        $this->IdRegistradorIngreso = $IdRegistradorIngreso;
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
    public function getTipoInterno()
    {
        return $this->TipoInterno;
    }

    /**
     * @param string $TipoInterno
     */
    public function setTipoInterno($TipoInterno)
    {
        $this->TipoInterno = $TipoInterno;
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




    public static function buscarId($id){
        $Interno = new Interno();
        if ($id>0){
            $getRow = $Interno->getRow("SELECT IdRegistro, tbinterno.IdInterno, tbregistro.TD,tbinterno.Nombre1,tbinterno.Nombre2,tbinterno.Apellido1,tbinterno.Apellido2,tbinterno.FechaNacimiento,tbinterno.UrlImagen, tbregistro.FechaIngreso,tbtipointerno.TipoInterno,tbdelito.Delito,tbtiporeclucion.TipoReclucion,tbubicacioninterno.Patio,tbubicacioninterno.Seccion,tbubicacioninterno.Celda,tbubicacioninterno.IdCarcel, tbubicacioninterno.IdUbicacionInterno ,tbCarcel.NombreCarcel, municipios.municipio, tbestado.Estado FROM `tbregistro`INNER JOIN tbinterno ON tbinterno.IdInterno = tbregistro.IdRegistrado INNER JOIN tbtipointerno on tbtipointerno.IdTipoInterno = tbregistro.IdTipoInterno INNER JOIN tbtiporeclucion on tbtiporeclucion.IdTipoReclucion = tbregistro.IdTipodeReclucion INNER JOIN tbubicacioninterno on tbubicacioninterno.IdUbicacionInterno = tbregistro.IdUbicacionInterna INNER JOIN tbdelito ON tbdelito.IdDelito = tbregistro.IdDelito INNER JOIN tbCarcel on tbCarcel.IdCarcel = tbubicacioninterno.IdCarcel INNER JOIN municipios on municipios.id_municipio = tbCarcel.IdUbicacion INNER JOIN tbestado on tbestado.IdEstado = tbregistro.IdEstado where IdInterno = ?" , array($id));
            $Interno->IdRegistro=$getRow['IdRegistro'];
            $Interno->IdRegistrado=$getRow['IdInterno'];
            $Interno->TD=$getRow['TD'];
            $Interno->Nombre1=$getRow['Nombre1'];
            $Interno->Nombre2=$getRow['Nombre2'];
            $Interno->Apellido1=$getRow['Apellido1'];
            $Interno->Apellido2=$getRow['Apellido2'];
            $Interno->FechaNacimiento=$getRow['FechaNacimiento'];
            $Interno->UrlImagen=$getRow['UrlImagen'];
            $Interno->FechaIngreso=$getRow['FechaIngreso'];
            $Interno->TipoInterno=$getRow['TipoInterno'];
            $Interno->Delito=$getRow['Delito'];
            $Interno->TipoReclucion=$getRow['TipoReclucion'];
            $Interno->Patio=$getRow['Patio'];
            $Interno->Seccion=$getRow['Seccion'];
            $Interno->Celda=$getRow['Celda'];
            $Interno->IdCarcel=$getRow['IdCarcel'];
            $Interno->IdUbicacionInterna=$getRow['IdUbicacionInterno'];
            $Interno->NombreCarcel=$getRow['NombreCarcel'];
            $Interno->Municipio=$getRow['municipio'];
            $Interno->Estado=$getRow['Estado'];

            $Interno->Disconnect();
            return $Interno;
        }else{
            return NULL;
        }
    }

    protected static function buscar($query)
    {
        $arrayInterno = array();
        $tmp = new Interno();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Interno = new Interno();
            $Interno->IdRegistro=$valor['IdRegistro'];
            $Interno->IdRegistrado=$valor['IdInterno'];
            $Interno->TD=$valor['TD'];
            $Interno->Nombre1=$valor['Nombre1'];
            $Interno->Nombre2=$valor['Nombre2'];
            $Interno->Apellido1=$valor['Apellido1'];
            $Interno->Apellido2=$valor['Apellido2'];
            $Interno->FechaNacimiento=$valor['FechaNacimiento'];
            $Interno->UrlImagen=$valor['UrlImagen'];
            $Interno->TipoInterno=$valor['TipoInterno'];
            $Interno->Delito=$valor['Delito'];
            $Interno->TipoReclucion=$valor['TipoReclucion'];
            $Interno->Patio=$valor['Patio'];
            $Interno->Seccion=$valor['Seccion'];
            $Interno->Celda=$valor['Celda'];
            $Interno->NombreCarcel=$valor['NombreCarcel'];
            $Interno->Municipio=$valor['municipio'];
            $Interno->Estado=$valor['Estado'];

            array_push($arrayInterno,$Interno);

    }
    $tmp->Disconnect();
        return $arrayInterno;
    }
    public static function buscarIdInterno($Cedula){
        $Interno = new Interno();
        if ($Cedula>"") {
            $getRow = $Interno->getRow("SELECT IdInterno FROM `tbInterno`WHERE Cedula =?", array($Cedula));
            $Interno->IdRegistrado = $getRow['IdInterno'];

            $Interno->Disconnect();
            return $Interno;

        }else{
            return NULL;
        }

        }
        protected function buscarIdRegistrado($query)
    {
        $arrayInterno = array();
        $tmp = new Interno();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Interno = new Interno();
            $Interno->IdRegistro=$valor['IdRegistrado'];
            array_push($arrayInterno,$Interno);
    }
        $tmp->Disconnect();
        return $arrayInterno;
    }

    public static function getAll()
    {
        return Interno::buscar("SELECT IdRegistro, tbinterno.IdInterno, tbregistro.TD,tbinterno.Nombre1,tbinterno.Nombre2,tbinterno.Apellido1,tbinterno.Apellido2,tbinterno.FechaNacimiento,tbinterno.UrlImagen,tbtipointerno.TipoInterno,tbdelito.Delito,tbtiporeclucion.TipoReclucion,tbubicacioninterno.Patio,tbubicacioninterno.Seccion,tbubicacioninterno.Celda,tbCarcel.NombreCarcel, municipios.municipio, tbestado.Estado FROM `tbregistro`
                                        INNER JOIN tbinterno ON tbinterno.IdInterno = tbregistro.IdRegistrado 
                                        INNER JOIN tbtipointerno on tbtipointerno.IdTipoInterno = tbregistro.IdTipoInterno 
                                        INNER JOIN tbtiporeclucion on tbtiporeclucion.IdTipoReclucion = tbregistro.IdTipodeReclucion 
                                        INNER JOIN tbubicacioninterno on tbubicacioninterno.IdUbicacionInterno = tbregistro.IdUbicacionInterna 
                                        INNER JOIN tbdelito ON tbdelito.IdDelito = tbregistro.IdDelito 
                                        INNER JOIN tbCarcel on tbCarcel.IdCarcel = tbubicacioninterno.IdCarcel 
                                        INNER JOIN municipios on municipios.id_municipio = tbCarcel.IdUbicacion 
                                        INNER JOIN tbestado on tbestado.IdEstado = tbregistro.IdEstado ");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbInterno values(NULL ,?,?,?,?,?,?,?)",array(

                $this->Cedula,
                $this->Nombre1,
                $this->Nombre2,
                $this->Apellido1,
                $this->Apellido2,
                $this->FechaNacimiento,
                $this->UrlImagen,
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
                $this->IdTipoInterno,
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
        $this->updateRow("update tbInterno set TD= ?, Nombre1= ?, Nombre2= ?, Apellido1= ?, Apellido2= ?, FechaNacimiento= ?, UrlImagen= ?, IdDelito= ?, TipoReclucion= ?, Patio= ? where IdRegistrado = ?",array(


                $this->TD,
                $this->Nombre1,
                $this->Nombre2,
                $this->Apellido1,
                $this->Apellido2,
                $this->FechaNacimiento,
                $this->UrlImagen,
                $this->Delito,
                $this->TipoReclucion,
                $this->Patio,
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
    {var_dump($this);
        $this->insertRow("insert into tbAlerta values(NULL ,?,?,?,? )",array(


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