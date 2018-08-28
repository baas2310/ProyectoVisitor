<?php
require_once ('db_abstract_class.php');

Class Funcionario extends db_abstract_class{
    private $IdFuncionario;
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
            $this->IdFuncionario="";
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
    public function getIdFuncionario()
    {
        return $this->IdFuncionario;
    }

    /**
     * @param string $IdFuncionario
     */
    public function setIdFuncionario($IdFuncionario)
    {
        $this->IdFuncionario = $IdFuncionario;
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
    public function getCelular()
    {
        return $this->Celular;
    }

    /**
     * @param string $Celular
     */
    public function setCelular($Celular)
    {
        $this->Celular = $Celular;
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
     * @return string
     */
    public function getPermiso()
    {
        return $this->Permiso;
    }

    /**
     * @param string $Permiso
     */
    public function setPermiso($Permiso)
    {
        $this->Permiso = $Permiso;
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
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * @param string $Usuario
     */
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->Pass;
    }

    /**
     * @param string $Pass
     */
    public function setPass($Pass)
    {
        $this->Pass = $Pass;
    }

    /**
     * @return mixed
     */
    public function getIdUbicacion()
    {
        return $this->IdUbicacion;
    }

    /**
     * @param mixed $IdUbicacion
     */
    public function setIdUbicacion($IdUbicacion)
    {
        $this->IdUbicacion = $IdUbicacion;
    }

    /**
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->id_departamento;
    }

    /**
     * @param mixed $id_departamento
     */
    public function setIdDepartamento($id_departamento)
    {
        $this->id_departamento = $id_departamento;
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
     * @return mixed
     */
    public function getDepartamento()
    {
        return $this->Departamento;
    }

    /**
     * @param mixed $Departamento
     */
    public function setDepartamento($Departamento)
    {
        $this->Departamento = $Departamento;
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
        $funcionario = new Funcionario();
        if ($id>0){
            $getRow = $funcionario->getRow("select IdFuncionario,Cedula,Nombre1,Nombre2,Apellido1,Apellido2,Celular,Rango,Permiso,tbestado.Estado,Usuario,Pass,IdUbicacion, departamentos.id_departamento,municipios.municipio,departamentos.departamento from tbFuncionario inner join tbPermiso on tbFuncionario.IdPermiso = tbPermiso.IdPermiso inner join tbEstado on tbFuncionario.IdEstado = tbEstado.IdEstado INNER JOIN municipios on tbfuncionario.IdUbicacion = municipios.id_municipio INNER JOIN departamentos ON municipios.departamento_id = departamentos.id_departamento WHERE IdFuncionario =?", array($id));
            $funcionario->IdFuncionario=$getRow['IdFuncionario'];
            $funcionario->Cedula=$getRow['Cedula'];
            $funcionario->Nombre1=$getRow['Nombre1'];
            $funcionario->Nombre2=$getRow['Nombre2'];
            $funcionario->Apellido1=$getRow['Apellido1'];
            $funcionario->Apellido2=$getRow['Apellido2'];
            $funcionario->Celular=$getRow['Celular'];
            $funcionario->Rango=$getRow['Rango'];
            $funcionario->Permiso=$getRow['Permiso'];
            $funcionario->Estdo=$getRow['Estado'];
            $funcionario->Usuario=$getRow['Usuario'];
            $funcionario->Pass=$getRow['Pass'];
            $funcionario->IdUbicacion=$getRow['IdUbicacion'];
            $funcionario->id_departamento=$getRow['id_departamento'];
            $funcionario->Departamento=$getRow['departamento'];
            $funcionario->Ubicacion=$getRow['municipio'];

            $funcionario->Disconnect();
            return $funcionario;
        }else{
            return NULL;
        }
    }

    protected static function buscar($query)
    {
        $arrayFuncionario = array();
        $tmp = new Funcionario();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $funcionario = new Funcionario();
            $funcionario->IdFuncionario=$valor['IdFuncionario'];
            $funcionario->Cedula=$valor['Cedula'];
            $funcionario->Nombre1=$valor['Nombre1'];
            $funcionario->Nombre2=$valor['Nombre2'];
            $funcionario->Apellido1=$valor['Apellido1'];
            $funcionario->Apellido2=$valor['Apellido2'];
            $funcionario->Celular=$valor['Celular'];
            $funcionario->Rango=$valor['Rango'];
            $funcionario->Permiso=$valor['Permiso'];
            $funcionario->Estado=$valor['Estado'];
            $funcionario->Usuario=$valor['Usuario'];
            $funcionario->Pass=$valor['Pass'];

            array_push($arrayFuncionario,$funcionario);
    }
    $tmp->Disconnect();
        return $arrayFuncionario;
    }

    public static function getAll()
    {
        return Funcionario::buscar("select IdFuncionario,Cedula,Nombre1,Nombre2,Apellido1,Apellido2,Celular,Rango,Permiso,Estado,Usuario,Pass from tbFuncionario inner join tbPermiso on tbFuncionario.IdPermiso = tbPermiso.IdPermiso inner join tbEstado on tbFuncionario.IdEstado = tbEstado.IdEstado where tbfuncionario.IdPermiso !=1");
    }
    protected static function buscarAlerta($query)
    {
        $arrayFuncionario = array();
        $tmp = new Funcionario();
        $getRows= $tmp->getRows($query);
        foreach ($getRows as $valor){

            $funcionario = new Funcionario();
            $funcionario->Rango=$valor['CONCAT(tbfuncionario.Rango,\' : \', tbfuncionario.Apellido1)'];
            $funcionario->Alerta=$valor['Alerta'];
            $funcionario->FechaAlert=$valor['Fecha'];
            $funcionario->NombreInterno=$valor['Nombre1'];
            $funcionario->ApellidoInterno=$valor['Apellido1'];
            $funcionario->TD=$valor['TD'];


            array_push($arrayFuncionario,$funcionario);
        }
        $tmp->Disconnect();
        return $arrayFuncionario;
    }

    public static function getAlert()
    {
        return Funcionario::buscarAlerta("SELECT CONCAT(tbfuncionario.Rango,' : ', tbfuncionario.Apellido1), tbalerta.Alerta,tbalerta.Fecha, tbinterno.Nombre1,tbinterno.Apellido1, tbregistro.TD FROM `tbalerta` INNER JOIN tbfuncionario on tbfuncionario.IdFuncionario = tbalerta.IdRegistrador INNER JOIN tbinterno on tbinterno.IdInterno = tbalerta.IdModificado INNER JOIN tbregistro on tbregistro.IdRegistrado = tbinterno.IdInterno");
    }

    public function insertar()
    {
        $this->insertRow("insert into tbFuncionario values(NULL ,?,?,?,?,?,?,?,?,?,?,?,?)",array(


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
        $this->updateRow("update tbFuncionario set Cedula= ?, Nombre1= ?, Nombre2= ?, Apellido1= ?, Apellido2= ?, Celular= ?, Rango= ?,IdPermiso=?, IdEstado= ?, Usuario= ?, Pass= ?, IdUbicacion = ? where IdFuncionario = ?",array(


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
                $this->IdFuncionario,
            )
        );
        $this->Disconnect();

    }

    public function editarEstado()
    {
        $this->updateRow("update tbFuncionario set IdEstado= ? where IdFuncionario = ?",array(

                $this->Estado,
                $this->IdFuncionario,
            )
        );
        $this->Disconnect();

    }
    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    public static function Login($Usuario, $Password){
        $arrayFuncionarios = array();
        $tmp = new Funcionario();
        $getTempUser = $tmp->getRows("select * from tbFuncionario WHERE Usuario = '$Usuario'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("select * from tbFuncionario WHERE Usuario = '$Usuario' AND Pass = '$Password'");
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
        return $arrayFuncionarios;
    }
}