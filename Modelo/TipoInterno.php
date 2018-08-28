<?php
require_once ('db_abstract_class.php');

Class TipoInterno extends db_abstract_class{
    private $IdTipoInterno;
    private $TipoInterno;
    private $Descripcion;


    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdTipoInterno="";
            $this->TipoInterno="";
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
        $TipoInterno = new TipoInterno();
        if ($id>0){
            $getRow = $TipoInterno->getRow("select IdTipoInterno,TipoInterno,Descripcion,Nombre2,Apellido1,Apellido2,UrlImagen,TipoTipoInterno,TarjetaProfesional,Observaciones from tbTipoInterno inner join tbTipoTipoInterno on tbTipoInterno.IdTipoTipoInterno = tbTipoTipoInterno.IdTipoTipoInterno  WHERE IdTipoInterno =?", array($id));
            $TipoInterno->IdTipoInterno=$getRow['IdTipoInterno'];
            $TipoInterno->TipoInterno=$getRow['TipoInterno'];
            $TipoInterno->Descripcion=$getRow['Descripcion'];
            $TipoInterno->Nombre2=$getRow['Nombre2'];
            $TipoInterno->Apellido1=$getRow['Apellido1'];
            $TipoInterno->Apellido2=$getRow['Apellido2'];
            $TipoInterno->UrlImagen=$getRow['UrlImagen'];
            $TipoInterno->TipoTipoInterno=$getRow['TipoTipoInterno'];
            $TipoInterno->TarjetaProfesional=$getRow['TarjetaProfesional'];
            $TipoInterno->Observaciones=$getRow['Observaciones'];

            $TipoInterno->Disconnect();
            return $TipoInterno;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayTipoInterno = array();
        $tmp = new TipoInterno();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $TipoInterno = new TipoInterno();
            $TipoInterno->IdTipoInterno=$valor['IdTipoInterno'];
            $TipoInterno->TipoInterno=$valor['TipoInterno'];
            $TipoInterno->Descripcion=$valor['Descripcion'];

            array_push($arrayTipoInterno,$TipoInterno);
    }
    $tmp->Disconnect();
        return $arrayTipoInterno;
    }

    public static function getAll()
    {
        return TipoInterno::buscar("select IdTipoInterno,TipoInterno,Descripcion from tbTipoInterno ");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbTipoInterno values(NULL ,?,? )",array(


                $this->TipoInterno,
                $this->Descripcion,

            )
        );
$this->Disconnect();

    }


    public function editar()
    {
        $this->updateRow("update tbTipoInterno set TipoInterno= ?, Descripcion= ? where IdTipoInterno = ?",array(


                $this->TipoInterno,
                $this->Descripcion,
                $this->IdTipoInterno,


            )
        );
        $this->Disconnect();

    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}