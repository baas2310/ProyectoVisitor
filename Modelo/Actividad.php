<?php
require_once ('db_abstract_class.php');

Class Actividad extends db_abstract_class{

    private $Rango;

    private $Alerta;
    private $NombreInterno;
    private $ApellidoInterno;
    private $TD;
    private $FechaAlert;
    private $Delito;
    private $TipoVisita;

    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{

            $this->Rango="";

            $this->Alerta;
            $this->NombreInterno;
            $this->ApellidoInterno;
            $this->TD;
            $this->FechaAlert;
            $this->Delito;
            $this->TipoVisita;

    }
    }
    function __destruct()
    {
        $this->Disconnect();
    }



    /**
     * @return string
     */
    public function getRango()
    {
        return $this->Rango;
    }

    /**
     * @param string $Rango
     */
    public function setRango($Rango)
    {
        $this->Rango = $Rango;
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
     * @return mixed
     */
    public function getNombreInterno()
    {
        return $this->NombreInterno;
    }

    /**
     * @param mixed $NombreInterno
     */
    public function setNombreInterno($NombreInterno)
    {
        $this->NombreInterno = $NombreInterno;
    }

    /**
     * @return mixed
     */
    public function getApellidoInterno()
    {
        return $this->ApellidoInterno;
    }

    /**
     * @param mixed $ApellidoInterno
     */
    public function setApellidoInterno($ApellidoInterno)
    {
        $this->ApellidoInterno = $ApellidoInterno;
    }

    /**
     * @return mixed
     */
    public function getTD()
    {
        return $this->TD;
    }

    /**
     * @param mixed $TD
     */
    public function setTD($TD)
    {
        $this->TD = $TD;
    }

    /**
     * @return mixed
     */
    public function getFechaAlert()
    {
        return $this->FechaAlert;
    }

    /**
     * @param mixed $FechaAlert
     */
    public function setFechaAlert($FechaAlert)
    {
        $this->FechaAlert = $FechaAlert;
    }

    /**
     * @return mixed
     */
    public function getDelito()
    {
        return $this->Delito;
    }

    /**
     * @param mixed $Delito
     */
    public function setDelito($Delito)
    {
        $this->Delito = $Delito;
    }

    /**
     * @return mixed
     */
    public function getTipoVisita()
    {
        return $this->TipoVisita;
    }

    /**
     * @param mixed $TipoVisita
     */
    public function setTipoVisita($TipoVisita)
    {
        $this->TipoVisita = $TipoVisita;
    }



    public static function buscarId($id){

    }

    protected static function buscar($query)
    {

    }

    public static function getAll()
    {
        return Actividad::buscar("select IdAlerta,Cedula,Nombre1,Nombre2,Apellido1,Apellido2,Celular,Rango,Permiso,Estado,Usuario,Pass from tbAlerta inner join tbPermiso on tbAlerta.IdPermiso = tbPermiso.IdPermiso inner join tbEstado on tbAlerta.IdEstado = tbEstado.IdEstado where tbAlerta.IdPermiso !=1");
    }
    protected static function buscarAlerta($query)
    {
        $arrayAlerta = array();
        $tmp = new Actividad();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $Alerta = new Actividad();
            $Alerta->Rango=$valor['CONCAT(tbfuncionario.Rango,\' : \', tbfuncionario.Apellido1)'];
            $Alerta->Alerta=$valor['Alerta'];
            $Alerta->FechaAlert=$valor['Fecha'];
            $Alerta->NombreInterno=$valor['Nombre1'];
            $Alerta->ApellidoInterno=$valor['Apellido1'];
            $Alerta->TD=$valor['TD'];


            array_push($arrayAlerta,$Alerta);
        }
        $tmp->Disconnect();
        return $arrayAlerta;
    }

    public static function getAlert()
    {
        return Actividad::buscarAlerta("SELECT CONCAT(tbfuncionario.Rango,' : ', tbfuncionario.Apellido1), tbalerta.Alerta,tbalerta.Fecha, tbinterno.Nombre1,tbinterno.Apellido1, tbregistro.TD FROM `tbalerta` INNER JOIN tbfuncionario on tbfuncionario.IdFuncionario = tbalerta.IdRegistrador INNER JOIN tbinterno on tbinterno.IdInterno = tbalerta.IdModificado INNER JOIN tbregistro on tbregistro.IdRegistrado = tbinterno.IdInterno");
    }
    protected static function buscarRegistro($query)
    {
        $arrayAlerta = array();
        $tmp = new Actividad();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){
            $Alerta = new Actividad();
            $Alerta->Rango=$valor['CONCAT(tbfuncionario.Rango,\' : \', tbfuncionario.Apellido1)'];
            $Alerta->Alerta="Registró a";
            $Alerta->FechaAlert=$valor['FechaIngreso'];
            $Alerta->NombreInterno=$valor['CONCAT(tbinterno.Nombre1,\' : \', tbinterno.Apellido1)'];
            $Alerta->TD=$valor['TD'];
            $Alerta->Delito=$valor['Delito'];


            array_push($arrayAlerta,$Alerta);
        }
        $tmp->Disconnect();
        return $arrayAlerta;
    }

    public static function getReg()
    {
        return Actividad::buscarRegistro("SELECT CONCAT(tbfuncionario.Rango,' : ', tbfuncionario.Apellido1),tbregistro.FechaIngreso, CONCAT(tbinterno.Nombre1,' : ', tbinterno.Apellido1),tbregistro.TD,tbdelito.Delito FROM `tbregistro` INNER JOIN tbfuncionario on tbfuncionario.IdFuncionario = tbregistro.IdRegistradorIngreso INNER JOIN tbinterno ON tbinterno.IdInterno = tbregistro.IdRegistrado INNER JOIN tbdelito on tbdelito.IdDelito= tbregistro.IdDelito");
    }
    protected static function buscarRegistroVisita($query)
    {
        $arrayAlerta = array();
        $tmp = new Actividad();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){
            $Alerta = new Actividad();
            $Alerta->Rango=$valor['CONCAT(tbfuncionario.Rango,\' : \', tbfuncionario.Apellido1)'];
            $Alerta->Alerta="Registró a";
            $Alerta->FechaAlert=$valor['FechaRegistro'];
            $Alerta->NombreInterno=$valor['CONCAT(tbvisitante.Nombre1,\' : \', tbvisitante.Apellido1)'];
            $Alerta->TipoVisita=$valor['TipoVisitante'];


            array_push($arrayAlerta,$Alerta);
        }
        $tmp->Disconnect();
        return $arrayAlerta;
    }

    public static function getRegVisita()
    {
        return Actividad::buscarRegistroVisita("SELECT CONCAT(tbfuncionario.Rango,' : ', tbfuncionario.Apellido1),registrovisitantes.FechaRegistro, CONCAT(tbvisitante.Nombre1,' : ', tbvisitante.Apellido1), tbtipovisitante.TipoVisitante FROM registrovisitantes INNER JOIN tbfuncionario on tbfuncionario.IdFuncionario = registrovisitantes.IdRegistrador INNER JOIN tbvisitante on tbvisitante.IdVisitante = registrovisitantes.IdRegistrado INNER JOIN tbtipovisitante on tbvisitante.IdTipoVisitante = tbtipovisitante.IdTipoVisitante");
    }
    protected static function buscarAlertaVisita($query)
    {
        $arrayAlerta = array();
        $tmp = new Actividad();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){
            $Alerta = new Actividad();
            $Alerta->Rango=$valor['CONCAT(tbfuncionario.Rango,\' : \', tbfuncionario.Apellido1)'];
            $Alerta->Alerta=$valor["Alerta"];
            $Alerta->FechaAlert=$valor['Fecha'];
            $Alerta->NombreInterno=$valor['CONCAT(tbvisitante.Nombre1,\' : \', tbvisitante.Apellido1)'];
            $Alerta->TipoVisita=$valor['TipoVisitante'];


            array_push($arrayAlerta,$Alerta);
        }
        $tmp->Disconnect();
        return $arrayAlerta;
    }

    public static function getAlertVisita()
    {
        return Actividad::buscarAlertaVisita("SELECT CONCAT(tbfuncionario.Rango,' : ', tbfuncionario.Apellido1),tbalertavisitante.Alerta ,tbalertavisitante.Fecha, CONCAT(tbvisitante.Nombre1,' : ', tbvisitante.Apellido1), tbtipovisitante.TipoVisitante FROM tbalertavisitante INNER JOIN tbfuncionario on tbfuncionario.IdFuncionario = tbalertavisitante.IdRegistrador INNER JOIN tbvisitante on tbvisitante.IdVisitante = tbalertavisitante.IdModificado INNER JOIN tbtipovisitante on tbvisitante.IdTipoVisitante = tbtipovisitante.IdTipoVisitante");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbAlerta values(NULL ,?,?,?,?,?,?,?,?,?,?,?,?)",array(


                $this->Cedula,
                $this->Nombre1,
                $this->Nombre2,
                $this->Apellido1,
                $this->Apellido2,
                $this->Celular,
                $this->Rango,
                $this->Permiso,
                1,
                $this->Usuario,
                $this->Pass,
                $this->IdUbicacion,
            )
        );
$this->Disconnect();

    }


    public function editar()
    {
        $this->updateRow("update tbAlerta set Cedula= ?, Nombre1= ?, Nombre2= ?, Apellido1= ?, Apellido2= ?, Celular= ?, Rango= ?,IdPermiso=?, IdEstado= ?, Usuario= ?, Pass= ?, IdUbicacion = ? where IdAlerta = ?",array(


                $this->Cedula,
                $this->Nombre1,
                $this->Nombre2,
                $this->Apellido1,
                $this->Apellido2,
                $this->Celular,
                $this->Rango,
                $this->Permiso,
                $this->Estado,
                $this->Usuario,
                $this->Pass,
                $this->IdUbicacion,
                $this->IdAlerta,
            )
        );
        $this->Disconnect();

    }

    public function editarEstado()
    {
        $this->updateRow("update tbAlerta set IdEstado= ? where IdAlerta = ?",array(

                $this->Estado,
                $this->IdAlerta,
            )
        );
        $this->Disconnect();

    }
    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}