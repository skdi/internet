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
    function eliminar_escuela()
    {
        return $resultado=mysqli_query($this->conexion,"Delete From escuela Where id_escuela='$this->id'");
        $this->conexion->desconectar();
    }
    function eliminar_detalle()
    {
        return $resultado=mysqli_query($this->conexion,"Delete From escuela Where id_escuela='$this->id'");

    }

    
}

class escuela
{
    

	var $id_escuela;				    
    var $nombre_area;
	var $nombre;		
    var $conexion;
		
	
    function __construct($id,$nombre_area,$nombre)
    {
		$this->id_escuela=$id;
        $this->nombre_area=$nombre_area;
        $this->nombre=$nombre;
        
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
							
	}
		
	function crear()
    {
		$id=$this->id_escuela;
        $nombre_area=$this->nombre_area;
        $nombre=$this->nombre;
    // 
		return $resultado=mysqli_query($this->conexion,"INSERT INTO escuela (nombre,nombre_area) 
				VALUES ('$nombre','$nombre_area')");
        

	    }
    	
	function actualizar()
    {
        $id=$this->id_escuela;
        $nombre=$this->nombre;
        $nombre_area=$this->nombre_area;
		
		return $resultado =mysqli_query($this->conexion,"Update escuela Set	nombre='$nombre',nombre_area='$nombre_area' where id_escuela=$id");

	}
   

}


?>
