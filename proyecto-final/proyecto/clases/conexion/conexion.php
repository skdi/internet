<?php
class conectar
{
    public $conexion;
    public $db;
    private $hostname_db="localhost";
    private $database_db="proyecto";
    private $username_db="root";
    private $password_db="";
    public function __construct(){  
        //Conectar a la base de datos
        $this->conexion = mysqli_connect($this->hostname_db,$this->username_db, $this->password_db,$this->database_db) 
        or die("no se ha podido conectar con MySQL: " .mysqli_connect_error());
        //Seleccionar la base de datos
        $this->db = mysqli_select_db($this->conexion,$this->database_db) or die ("Ninguna DB seleccionada");
        if($this->conexion && $this->db)
        return true;
    }
    public function getconexion(){
        return $this->conexion;
    }
    public function getdb(){
        return $this->db;
    }
    public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysqli_close($this->$conexion);
        }
    }
    
}

$enlace= new conectar();
$conexion=$enlace->conexion;
?>