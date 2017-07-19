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
        return $resultado=mysqli_query($this->conexion,"Delete From participante Where id_participante='$this->id'");
        $this->conexion->desconectar();
    }
    function eliminar_detalle()
    {
        return $resultado=mysqli_query($this->conexion,"Delete From participante Where id_participante='$this->id'");

    }

    
}

class Participante
{
    

	var $id_participante;				    
    var $dni;
	var $nombre;		
    var $apellido;			
    var $telefono;     
	var $correo;				
	var $tipo_nombre;				
    var $veces_participo;
    var $tipo_participacion;
    var $estado;
    var $conexion;
		
	
    function __construct($id,$dni,$nombre,$apellido,$telefono,$correo,$tipo_nombre,$veces_participo,$tipo_participacion,$estado)
    {
		$this->id_participante=$id;
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->telefono=$telefono;
        $this->correo=$correo;
        $this->tipo_nombre=$tipo_nombre;
        $this->veces_participo=$veces_participo;
        $this->tipo_participacion=$tipo_participacion;
        $this->estado=$estado;
        
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
							
	}
		
	function crear()
    {
		$id=$this->id_participante;
        $dni=$this->dni;
        $nombre=$this->nombre;
        $apellido=$this->apellido;
        $telefono=$this->telefono;
        $correo=$this->correo;
        $tipo_nombre=$this->tipo_nombre;
        $veces_participo=$this->veces_participo;
        $tipo_participacion=$this->tipo_participacion;
        $estado=$this->estado;
    // 
		return $resultado=mysqli_query($this->conexion,"INSERT INTO participante (dni,nombre,apellido,telefono,correo,tipo_nombre,veces_participo,tipo_participacion,estado) 
				VALUES ('$dni','$nombre','$apellido','$telefono','$correo','$tipo_nombre','$veces_participo','$tipo_participacion','$estado')");
        

	    }
    	
	function actualizar()
    {
        $id=$this->id_participante;
        $dni=$this->dni;
        $nombre=$this->nombre;
        $apellido=$this->apellido;
        $telefono=$this->telefono;
        $correo=$this->correo;
        $tipo_nombre=$this->tipo_nombre;
        $veces_participo=$this->veces_participo;
        $tipo_participacion=$this->tipo_participacion;
        $estado=$this->estado;
		
		return $resultado =mysqli_query($this->conexion,"Update participante Set	dni='$dni',nombre='$nombre',apellido='$apellido',telefono='$telefono',correo='$correo',tipo_nombre='$tipo_nombre',veces_participo='$veces_participo',tipo_participacion='$tipo_participacion',estado='$estado'
									    Where id_participante=$id");

	}
   

}


?>