<?php
class ConexionPDO{
    private $host;
    private $dbname;
    private $usuario;
    private $contraseña;
    private $conexion;

    public function __construct($host,$dbname, $usuario,$contraseña)
    {
        $this->host=$host;
        $this->dbname=$dbname;
        $this->usuario=$usuario;
        $this->contraseña=$contraseña;
    }

    public function conectar()
    {
        try{
            $opcion=array(
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
            );
        $this->conexion=new PDO('mysql:host='.$this->host.';
        dbname='.$this->dbname,
        $this->usuario,
        $this->contraseña,
        $opcion
        );
        if($this->conexion){
            //echo"Conectado";
        }else{
            //echo"Desconectado";
        }
        }
        catch(PDOException $e){
            echo "Error de conexion" .$e->getMessage();
            die();
        }

    }
    //Nuevo Método que nos ayudara aparte de conectar a obtener la conexion al momento
    //de realizar los procesos de consulta al gestor de base de datos.
    public function getConnection(){
        return $this->conexion;
    }
    
    public function desconectar(){
        $this->conexion=null;
        //echo "desconectado";
    }
}

?>