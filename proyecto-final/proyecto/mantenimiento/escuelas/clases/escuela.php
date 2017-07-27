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
    var $area_nombre;
	var $nombre;		
    var $conexion;
		
	
    function __construct($id,$area_nombre,$nombre)
    {
		$this->id_escuela=$id;
        $this->area_nombre=$area_nombre;
        $this->nombre=$nombre;
        
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
							
	}
		
	function crear()
    {
		$id=$this->id_escuela;
        $area_nombre=$this->area_nombre;
        $nombre=$this->nombre;
    // 
		return $resultado=mysqli_query($this->conexion,"INSERT INTO escuela (nombre,area_nombre) 
				VALUES ('$nombre','$area_nombre')");
        

	    }
    	
	function actualizar()
    {
        $id=$this->id_escuela;
        $nombre=$this->nombre;
        $area_nombre=$this->area_nombre;
		
		return $resultado =mysqli_query($this->conexion,"Update escuela Set	nombre='$nombre',area_nombre='$area_nombre' where id_escuela=$id");

	}
   

}


?>
