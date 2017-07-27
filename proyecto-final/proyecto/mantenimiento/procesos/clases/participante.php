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
        return $resultado=mysqli_query($this->conexion,"Delete From proceso Where id_proceso='$this->id'");
        $this->conexion->desconectar();
    }
    
}

class Proceso
{
	var $id_proceso;
	var $nombre;
	var $fecha;
    var $conexion;
		
	
    function __construct($id_proceso,$nombre,$fecha)
    {
        $this->id_proceso=$id_proceso;
        $this->nombre=$nombre;
        $this->fecha=$fecha;
        
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
							
	}
		
	function crear()
    {
        $id_proceso='';
        $nombre=$this->nombre;
        $fecha=$this->fecha;
    // 
		return $resultado=mysqli_query($this->conexion,"INSERT INTO proceso (nombre,fecha) 
				VALUES ('$nombre','$fecha')");

	    }
    	
	function actualizar()
    {
        $id_proceso=$this->id_proceso;
        $nombre=$this->nombre;
        $fecha=$this->fecha;
    	
		return $resultado =mysqli_query($this->conexion,"Update proceso Set nombre='$nombre',fecha='$fecha'
									    Where id_proceso='$id_proceso'");

	}
   

}


?>