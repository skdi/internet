
<?php

class conectar
{
    protected $conexion;
    protected $db;
	private $hostname_db="localhost";
	private $database_db="internetdatabase";
	private $username_db="root";
	private $password_db="";
    public function conectar(){	
    	//Conectar a la base de datos
        $this->conexion = mysqli_connect($hostname_db, $username_db, $password_db,$database_db) 
        or die("no se ha podido conectar con MySQL: " .mysqli_connect_error());
        //Seleccionar la base de datos
        $this->db = mysqli_select_db($conexion,$database_db) or die ("Ninguna DB seleccionada");
	    if(conexion && db)
        	echo "conexion establecida ";
        return true;

    }

    public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysql_close($this->$conexion);
        }

    }

    public function pruebadb($table)
    {
        $tabla = $table;
        $query = mysql_query("SELECT * from $tabla ", $this->conexion);
        if (!$query ) echo "Error en la tabla seleccionada";
        else {
            $nregistrostotal = mysql_result($query, 0, 0);
            echo "Hay $nregistrostotal registros en la tabla: $tabla.";
            mysql_free_result($query);
        }
    }
}







?>
