<?php

require("../../../clases/conexion/conexion.php");

class eliminar
{
    var $id;
    var $conexion;
    function __construct($id)
    {
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
        $this->id=$id;
    }
    function eliminar_participante()
    {
        return $resultado=mysqli_query($this->conexion,"Delete From area Where nombre='$this->id'");
        $this->conexion->desconectar();
    }
    
}

class Area
{
	var $nombre;
    var $conexion;
		
	
    function __construct($nombre)
    {
        $this->nombre=$nombre;
        
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
							
	}
		
	function crear()
    {
        $nombre=$this->nombre;
    // 
		return $resultado=mysqli_query($this->conexion,"INSERT INTO area (nombre) 
				VALUES ('$nombre')");
        

	    }
    	
	function actualizar($nombre_original)
    {
        $nombre=$this->nombre;
    	
		return $resultado =mysqli_query($this->conexion,"Update area Set  nombre='$nombre'
									    Where nombre='$nombre_original'");

	}
   

}


?>