<?php
require_once ('db_abstract_class.php');

Class TipoReclusion extends db_abstract_class{
    private $IdTipoReclucion;
    private $TipoReclucion;
    private $Descripcion;


    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdTipoReclucion="";
            $this->TipoReclucion="";
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
    public function getIdTipoReclucion()
    {
        return $this->IdTipoReclucion;
    }

    /**
     * @param string $IdTipoReclucion
     */
    public function setIdTipoReclucion($IdTipoReclucion)
    {
        $this->IdTipoReclucion = $IdTipoReclucion;
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
        $TipoReclucion = new TipoReclucion();
        if ($id>0){
            $getRow = $TipoReclucion->getRow("select IdTipoReclucion,TipoReclucion,Descripcion,Nombre2,Apellido1,Apellido2,UrlImagen,TipoTipoReclucion,TarjetaProfesional,Observaciones from tbTipoReclucion inner join tbTipoTipoReclucion on tbTipoReclucion.IdTipoTipoReclucion = tbTipoTipoReclucion.IdTipoTipoReclucion  WHERE IdTipoReclucion =?", array($id));
            $TipoReclucion->IdTipoReclucion=$getRow['IdTipoReclucion'];
            $TipoReclucion->TipoReclucion=$getRow['TipoReclucion'];
            $TipoReclucion->Descripcion=$getRow['Descripcion'];
            $TipoReclucion->Nombre2=$getRow['Nombre2'];
            $TipoReclucion->Apellido1=$getRow['Apellido1'];
            $TipoReclucion->Apellido2=$getRow['Apellido2'];
            $TipoReclucion->UrlImagen=$getRow['UrlImagen'];
            $TipoReclucion->TipoTipoReclucion=$getRow['TipoTipoReclucion'];
            $TipoReclucion->TarjetaProfesional=$getRow['TarjetaProfesional'];
            $TipoReclucion->Observaciones=$getRow['Observaciones'];

            $TipoReclucion->Disconnect();
            return $TipoReclucion;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayTipoReclucion = array();
        $tmp = new TipoReclucion();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $TipoReclucion = new TipoReclucion();
            $TipoReclucion->IdTipoReclucion=$valor['IdTipoReclucion'];
            $TipoReclucion->TipoReclucion=$valor['TipoReclucion'];
            $TipoReclucion->Descripcion=$valor['Descripcion'];

            array_push($arrayTipoReclucion,$TipoReclucion);
    }
    $tmp->Disconnect();
        return $arrayTipoReclucion;
    }

    public static function getAll()
    {
        return TipoReclucion::buscar("select IdTipoReclucion,TipoReclucion,Descripcion from tbTipoReclucion ");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbTipoReclucion values(NULL ,?,? )",array(


                $this->TipoReclucion,
                $this->Descripcion,

            )
        );
$this->Disconnect();

    }


    public function editar()
    {
        $this->updateRow("update tbTipoReclucion set TipoReclucion= ?, Descripcion= ? where IdTipoReclucion = ?",array(


                $this->TipoReclucion,
                $this->Descripcion,
                $this->IdTipoReclucion,


            )
        );
        $this->Disconnect();

    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}