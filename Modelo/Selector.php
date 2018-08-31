<?php
require_once ('db_abstract_class.php');

Class Selector extends db_abstract_class{
    private $IdDelito;
    private $Delito;

    private $IdTipoInterno;
    Private $TipoInterno;

    private $IdTipoReclucion;
    private  $TipoReclucion;

    private $IdParentesco;
    private $Parentesco;


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

            $this->IdTipoInterno="";
            $this->TipoInterno="";

            $this->IdParentesco="";
            $this->Parentesco="";


    }
    }
    function __destruct()
    {
        $this->Disconnect();
    }
    /*________________Delito_________________*/
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
    /*____________Tipo interno_______________*/
    /**
     * @return string
     */
    public function getIdTipoInterno()
    {
        return $this->IdTipoInterno;
    }

    /**
     * @param string $IdTipoInterno
     */
    public function setIdTipoInterno($IdTipoInterno)
    {
        $this->IdTipoInterno = $IdTipoInterno;
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
    /*________________Tipo Reclucion__________________*/
    /**
     * @return mixed
     */
    public function getIdTipoReclucion()
    {
        return $this->IdTipoReclucion;
    }

    /**
     * @param mixed $IdTipoReclucion
     */
    public function setIdTipoReclucion($IdTipoReclucion)
    {
        $this->IdTipoReclucion = $IdTipoReclucion;
    }

    /**
     * @return mixed
     */
    public function getTipoReclucion()
    {
        return $this->TipoReclucion;
    }

    /**
     * @param mixed $TipoReclucion
     */
    public function setTipoReclucion($TipoReclucion)
    {
        $this->TipoReclucion = $TipoReclucion;
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


/*______________________________________________________*/






    public static function buscar($query)
    {
        $arraySelector = array();
        $tmp = new Selector();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Selector = new Selector();
            $Selector->IdDelito=$valor['IdDelito'];
            $Selector->Delito=$valor['Delito'];

            array_push($arraySelector,$Selector);
    }
    $tmp->Disconnect();
        return $arraySelector;
    }
    public static function buscarTipoInterno($query)
    {
        $arraySelector = array();
        $tmp = new Selector();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Selector = new Selector();
            $Selector->IdTipoInterno=$valor['IdTipoInterno'];
            $Selector->TipoInterno=$valor['TipoInterno'];

            array_push($arraySelector,$Selector);
        }
        $tmp->Disconnect();
        return $arraySelector;
    }
    public static function buscarTipoReclucion($query)
    {
        $arraySelector = array();
        $tmp = new Selector();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Selector = new Selector();
            $Selector->IdTipoReclucion=$valor['IdTipoReclucion'];
            $Selector->TipoReclucion=$valor['TipoReclucion'];

            array_push($arraySelector,$Selector);
        }
        $tmp->Disconnect();
        return $arraySelector;
    }
    public static function buscarParentesco($query)
    {
        $arraySelector = array();
        $tmp = new Selector();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Selector = new Selector();
            $Selector->IdParentesco=$valor['IdParentesco'];
            $Selector->Parentesco=$valor['Parentesco'];

            array_push($arraySelector,$Selector);
        }
        $tmp->Disconnect();
        return $arraySelector;
    }

    public static function SelectDelito()
    {
        return Selector::buscar("SELECT * FROM tbDelito");
    }

    public static function SelectTipoInteno()
    {
        return Selector::buscarTipoInterno("SELECT * FROM tbTipoInterno");
    }
    public static function SelectTipoReclucion()
    {
        return Selector::buscarTipoReclucion("SELECT * FROM tbTipoReclucion");
    }
    public static function SelectParentesco()
    {
        return Selector::buscarParentesco("SELECT * FROM tbParentesco");
    }
    public function editar()
    {
//metodo editar
    }
    public function insertar()
    {
//metodo editar
    }
    public static function buscarId($id){
//metodo editar
    }
    public static function getAll(){
//metodo editar
    }
    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}