<?php
require_once ('db_abstract_class.php');

Class Delito extends db_abstract_class{
    private $IdDelito;
    private $Delito;
    private $Descripcion;


    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdDelito="";
            $this->Delito="";
            $this->Descripcion="";


    }
    }
    function __destruct()
    {
        $this->Disconnect();
    }

    /**
     * @return string
     */
    public function getIdDelito()
    {
        return $this->IdDelito;
    }

    /**
     * @param string $IdDelito
     */
    public function setIdDelito($IdDelito)
    {
        $this->IdDelito = $IdDelito;
    }

    /**
     * @return string
     */
    public function getDelito()
    {
        return $this->Delito;
    }

    /**
     * @param string $Delito
     */
    public function setDelito($Delito)
    {
        $this->Delito = $Delito;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param string $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }




    public static function buscarId($id){
        $Delito = new Delito();
        if ($id>0){
            $getRow = $Delito->getRow("select IdDelito,Delito,Descripcion from tbDelito WHERE IdDelito =?", array($id));
            $Delito->IdDelito=$getRow['IdDelito'];
            $Delito->Delito=$getRow['Delito'];
            $Delito->Descripcion=$getRow['Descripcion'];


            $Delito->Disconnect();
            return $Delito;
        }else{
            return NULL;
        }
    }
    public static function buscarLimite($query)
    {

        $tmp = new Delito();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Limite = $valor['COUNT(IdDelito)'];

        }
        $tmp->Disconnect();
        return $Limite;
    }

    public static function getLimite($Delito)
    {

        return Delito::buscarLimite("select COUNT(IdDelito) from tbDelito WHERE Delito = '"."$Delito"."'");
    }
    public static function buscar($query)
    {
        $arrayDelito = array();
        $tmp = new Delito();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Delito = new Delito();
            $Delito->IdDelito=$valor['IdDelito'];
            $Delito->Delito=$valor['Delito'];
            $Delito->Descripcion=$valor['Descripcion'];

            array_push($arrayDelito,$Delito);
    }
    $tmp->Disconnect();
        return $arrayDelito;
    }

    public static function getAll()
    {
        return Delito::buscar("select IdDelito,Delito,Descripcion from tbDelito ");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbDelito values(NULL ,?,? )",array(


                $this->Delito,
                $this->Descripcion,

            )
        );
$this->Disconnect();

    }


    public function editar()
    {
        $this->updateRow("update tbDelito set Delito= ?, Descripcion= ? where IdDelito = ?",array(


                $this->Delito,
                $this->Descripcion,
                $this->IdDelito,


            )
        );
        $this->Disconnect();

    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}