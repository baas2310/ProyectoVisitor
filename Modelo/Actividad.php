<?php
require_once ('db_abstract_class.php');

Class Actividad extends db_abstract_class{
    private $IdAlerta;
    private $Cedula;
    private $Nombre1;
    private $Nombre2;
    private $nombre2;
    private $Apellido1;
    private $Apellido2;
    private $Celular;
    private $Rango;
    private $Permiso;
    private $Estado;
    private $Usuario;
    private $Pass;
    private $IdUbicacion;
    private $id_departamento;
    private $Ubicacion;
    private $Departamento;

    private $Alerta;
    private $NombreInterno;
    private $ApellidoInterno;
    private $TD;
    private $FechaAlert;

    public function __construct($Visitor_data=array())
    {
        parent::__construct();
        if (count($Visitor_data)>1){
            foreach ($Visitor_data as $campo => $valor){
                $this->$campo = $valor;
            }
    }else{
            $this->IdAlerta="";
            $this->Cedula="";
            $this->Nombre1="";
            $this->Nombre2="";
            $this->Apellido1="";
            $this->Apellido2="";
            $this->Celular="";
            $this->Rango="";
            $this->Permiso="";
            $this->Estado="";
            $this->Usuario="";
            $this->Pass="";
            $this->IdUbicacion;
            $this->id_departamento;
            $this->Ubicacion;
            $this->Departamento;

            $this->Alerta;
            $this->NombreInterno;
            $this->ApellidoInterno;
            $this->TD;
            $this->FechaAlert;
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
        return Actividad::buscarRegistro("SELECT CONCAT(tbfuncionario.Rango,' : ', tbfuncionario.Apellido1), tbalerta.Alerta,tbalerta.Fecha, tbinterno.Nombre1,tbinterno.Apellido1, tbregistro.TD FROM `tbalerta` INNER JOIN tbfuncionario on tbfuncionario.IdFuncionario = tbalerta.IdRegistrador INNER JOIN tbinterno on tbinterno.IdInterno = tbalerta.IdModificado INNER JOIN tbregistro on tbregistro.IdRegistrado = tbinterno.IdInterno");
    }
    protected static function buscarRegistro($query)
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

    public static function getReg()
    {
        return Actividad::buscarRegistro("SELECT CONCAT(tbfuncionario.Rango,' : ', tbfuncionario.Apellido1), tbalerta.Alerta,tbalerta.Fecha, tbinterno.Nombre1,tbinterno.Apellido1, tbregistro.TD FROM `tbalerta` INNER JOIN tbfuncionario on tbfuncionario.IdFuncionario = tbalerta.IdRegistrador INNER JOIN tbinterno on tbinterno.IdInterno = tbalerta.IdModificado INNER JOIN tbregistro on tbregistro.IdRegistrado = tbinterno.IdInterno");
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
    public static function Login($Usuario, $Password){
        $arrayAlertas = array();
        $tmp = new Alerta();
        $getTempUser = $tmp->getRows("select * from tbAlerta WHERE Usuario = '$Usuario'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("select * from tbAlerta WHERE Usuario = '$Usuario' AND Pass = '$Password'");
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
        return $arrayAlertas;
    }
}