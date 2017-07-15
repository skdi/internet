<?php

require_once("../../../clases/conexion/conexion.php")

class Administrador
{
    
DNI	Apellidos	Nombres	Dependencia	Telefono	Correo	Categoria	Cargo

	var $id;			var $tipo;		    var $apellidos;
	var $nombre;		var $dni;			var $dependencia;     
	var $facultad;		var $telefono;		var $correo;	
	var $categoria;		var $cargo;			
		
	function __construct($id,$nombre,$facultad,$categoria,$tipo,$dni,$telefono,$cargo,$apellidos,$dependencia,$correo)
    {
		$this->id=$id;						$this->nombre=$nombre;			    $this->facultad=$facultad;
		$this->categoria=$categoria;	    $this->tipo=$tipo;                  $this->dni=$dni;
		$this->telefono=$telefono;			$this->cargo=$cargo;                $this->apellidos=$apellidos;
		$this->dependencia=$dependencia;	$this->correo=$correo;	
							
	}
		
	function crear()
    {
		$id=$this->id;						        $nombre=$this->nombre;			    $facultad=$this->facultad;
		$categoria=$this->categoria;	            $tipo=$this->tipo;                  $dni=$this->dni;
		$telefono=$this->telefono;			        $cargo=$this->cargo;                $apellidos=$this->apellidos;
		$dependencia=$this->dependencia;			$correo=$this->correo;	
			
		mysqli_query($conexion,"INSERT INTO participante (tipo, dni,apellidos,nombre,dependencia,telefono,correo,categoria,cargo) 
				VALUES ('$tipo','$dni','$apellidos','$nombre','$dependencia','$telefono','$correo','$categoria','$cargo')");
	   }
	
	function actualizar()
    {
        $id=$this->id;						        $nombre=$this->nombre;			    $facultad=$this->facultad;
		$categoria=$this->categoria;	            $tipo=$this->tipo;                  $dni=$this->dni;
		$telefono=$this->telefono;			        $cargo=$this->cargo;                $apellidos=$this->apellidos;
		$dependencia=$this->dependencia;			$correo=$this->correo;	
		
		mysqli_query($conexion,"Update participante Set	tipo='$tipo',
										dni='$dni',
										apellidos='$apellidos',
										nombre='$nombre',
										dependencia='$dependencia',
										telefono='$telefono',
										correo='$correo',
										categoria='$categoria',
										cargo='$cargo'.
									    Where id=$id");
	}	
}
?>