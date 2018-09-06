<?php
require_once ('db_abstract_class.php');

Class Ubicacion extends db_abstract_class{

    private $IdUbicacion;
    private $Ubicacion;
    private $Seccion;
    private $Celda;

    private $IdLocalizacion;


    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdUbicacion="";
            $this->Ubicacion="";
            $this->Seccion="";
            $this->Celda="";
            $this->IdLocalizacion;


    }
    }
    function __destruct()
    {
        $this->Disconnect();
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
     * @return mixed
     */
    public function getIdLocalizacion()
    {
        return $this->IdLocalizacion;
    }

    /**
     * @param mixed $IdLocalizacion
     */
    public function setIdLocalizacion($IdLocalizacion)
    {
        $this->IdLocalizacion = $IdLocalizacion;
    }


    public static function buscarId($id){
        $Ubicacion = new Ubicacion();
        if ($id>0){
            $getRow = $Ubicacion->getRow("select IdUbicacion,Ubicacion,Seccion,Celda from tbUbicacion WHERE IdUbicacion =?", array($id));
            $Ubicacion->IdUbicacion=$getRow['IdUbicacion'];
            $Ubicacion->Ubicacion=$getRow['Ubicacion'];
            $Ubicacion->Seccion=$getRow['Seccion'];
            $Ubicacion->Celda=$getRow['Celda'];


            $Ubicacion->Disconnect();
            return $Ubicacion;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayUbicacion = array();
        $tmp = new Ubicacion();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Ubicacion = new Ubicacion();
            $Ubicacion->IdUbicacion=$valor['IdUbicacion'];
            $Ubicacion->Ubicacion=$valor['Ubicacion'];
            $Ubicacion->Seccion=$valor['Seccion'];
            $Ubicacion->Celda=$valor['Celda'];

            array_push($arrayUbicacion,$Ubicacion);
    }
    $tmp->Disconnect();
        return $arrayUbicacion;
    }

    public static function getAll()
    {
        return Ubicacion::buscar("select IdUbicacion,Ubicacion,Seccion,Celda from tbUbicacion ");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbUbicacionInterno values(NULL ,?,?,?,? )",array(


                $this->Patio,
                $this->Seccion,
                $this->Celda,
                $this->IdLocalizacion
            )
        );
$this->Disconnect();

    }


    public function editar()
    {
        $this->updateRow("update tbUbicacionInterno set Ubicacion= ?, Seccion= ? where IdUbicacion = ?",array(


                $this->Ubicacion,
                $this->Seccion,
                $this->IdUbicacion,


            )
        );
        $this->Disconnect();

    }
    public static function buscarLimite($query)
    {

        $tmp = new Ubicacion();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Limite = $valor['COUNT(IdUbicacionInterno)'];

        }
        $tmp->Disconnect();
        return $Limite;
    }

    public static function getLimite($Patio,$Seccion,$Celda,$IdCarcel)
    {

        return Ubicacion::buscarLimite("select COUNT(IdUbicacionInterno) from tbUbicacionInterno WHERE patio = ".$Patio." AND seccion = '"."$Seccion"."' AND Celda =".$Celda." AND IdCarcel =".$IdCarcel);
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}