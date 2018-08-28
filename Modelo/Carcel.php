<?php
require_once ('db_abstract_class.php');

Class Carcel extends db_abstract_class{
    private $IdCarcel;
    private $NombreCarcel;
    private $IdDirector;
    private $IdUbicacion;
    private $Ubicacion;
    private $Nombre1;
    private $Apellido1;
    private $Cedula;



    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdCarcel="";
            $this->NombreCarcel="";
            $this->IdDirector="";
            $this->IdUbicacion="";
            $this->Ubicacion="";
            $this->Nombre1="";
            $this->Apellido1="";
            $this->Cedula="";

    }
    }
    function __destruct()
    {
        $this->Disconnect();
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
    public function getIdDirector()
    {
        return $this->IdDirector;
    }

    /**
     * @param string $IdDirector
     */
    public function setIdDirector($IdDirector)
    {
        $this->IdDirector = $IdDirector;
    }

    /**
     * @return string
     */
    public function getIdUbicacion()
    {
        return $this->IdUbicacion;
    }

    /**
     * @param string $IdUbicacion
     */
    public function setIdUbicacion($IdUbicacion)
    {
        $this->IdUbicacion = $IdUbicacion;
    }

    /**
     * @return string
     */
    public function getUbicacion()
    {
        return $this->Ubicacion;
    }

    /**
     * @param string $Ubicacion
     */
    public function setUbicacion($Ubicacion)
    {
        $this->Ubicacion = $Ubicacion;
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






    public static function buscarId($id){
        $Carcel = new Carcel();
        if ($id>0){
            $getRow = $Carcel->getRow("select IdCarcel,Carcel,Descripcion,Nombre2,Apellido1,Apellido2,UrlImagen,TipoCarcel,TarjetaProfesional,Observaciones from tbCarcel inner join tbTipoCarcel on tbCarcel.IdTipoCarcel = tbTipoCarcel.IdTipoCarcel  WHERE IdCarcel =?", array($id));
            $Carcel->IdCarcel=$getRow['IdCarcel'];
            $Carcel->NombreCarcel=$getRow['NombreCarcel'];
            $Carcel->Cedula=$getRow['Cedula'];
            $Carcel->Nombre2=$getRow['Nombre2'];
            $Carcel->Apellido1=$getRow['Apellido1'];
            $Carcel->Apellido2=$getRow['Apellido2'];
            $Carcel->UrlImagen=$getRow['UrlImagen'];
            $Carcel->TipoCarcel=$getRow['TipoCarcel'];
            $Carcel->TarjetaProfesional=$getRow['TarjetaProfesional'];
            $Carcel->Observaciones=$getRow['Observaciones'];

            $Carcel->Disconnect();
            return $Carcel;
        }else{
            return NULL;
        }
    }
    public static function buscarIdDirector($query)
    {
        $arrayDirector = array();
        $tmp = new Director();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Director = new Director();
            $Director->IdDirector=$valor['IdFuncionario'];

            array_push($arrayDirector,$Director);
        }
        $tmp->Disconnect();
        return $arrayDirector;
    }
    public static function buscarIdRegistrado($Cedula){
        $Director = new Carcel();
        if ($Cedula>"") {
            $getRow = $Director->getRow("SELECT IdFuncionario FROM `tbFuncionario`WHERE Cedula =?", array($Cedula));
            $Director->IdDirector = $getRow['IdFuncionario'];

            $Director->Disconnect();
            return $Director;

        }else{
            return NULL;
        }

    }
    public static function buscar($query)
    {
        $arrayCarcel = array();
        $tmp = new Carcel();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Carcel = new Carcel();
            $Carcel->IdCarcel=$valor['IdCarcel'];
            $Carcel->NombreCarcel=$valor['NombreCarcel'];
            $Carcel->Nombre1=$valor['Nombre1'];
            $Carcel->Apellido1=$valor['Apellido1'];
            $Carcel->Cedula=$valor['Cedula'];
            $Carcel->Ubicacion=$valor['municipio'];

            array_push($arrayCarcel,$Carcel);
    }
    $tmp->Disconnect();
        return $arrayCarcel;
    }

    public static function getAll()
    {
        return Carcel::buscar("SELECT IdCarcel, NombreCarcel, tbfuncionario.Nombre1, tbfuncionario.Apellido1, tbfuncionario.Cedula, municipio FROM `tbcarcel` INNER JOIN municipios ON municipios.id_municipio = tbcarcel.IdUbicacion INNER JOIN tbfuncionario ON tbfuncionario.IdFuncionario = tbcarcel.IdDirector");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbCarcel values(NULL ,?,?,? )",array(


                $this->NombreCarcel,
                $this->IdDirector,
                $this->IdUbicacion,

            )
        );
$this->Disconnect();

    }


    public function editar()
    {
        $this->updateRow("update tbCarcel set Carcel= ?, Descripcion= ? where IdCarcel = ?",array(


                $this->Carcel,
                $this->Descripcion,
                $this->IdCarcel,


            )
        );
        $this->Disconnect();

    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}