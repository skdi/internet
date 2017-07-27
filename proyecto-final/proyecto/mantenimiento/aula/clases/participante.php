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
        return $resultado=mysqli_query($this->conexion,"Delete From aula Where id_aula='$this->id'");
        $this->conexion->desconectar();
    }
    
}

class Participante
{
    
    var $id_aula;
	var $id_escuela;				    
    var $n_aula;	
	
    function __construct($id_aula,$id_escuela,$n_aula)
    {
		$this->id_aula=$id_aula;
        $this->id_escuela=$id_escuela;
        $this->n_aula=$n_aula;
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
							
	}
		
	function crear()
    {
        $id_aula=$this->id_aula;
		$id_escuela=$this->id_escuela;
        $n_aula=$this->n_aula;
    // 
		return $resultado=mysqli_query($this->conexion,"INSERT INTO aula (id_escuela,n_aula) 
				VALUES ('$id_escuela','$n_aula')");
        

	    }
    	
	function actualizar()
    {
        $id_aula=$this->id_aula;
        $id_escuela=$this->id_escuela;
        $n_aula=$this->n_aula;
		
		return $resultado =mysqli_query($this->conexion,"Update aula Set id_escuela='$id_escuela',n_aula='$n_aula'
									    Where id_aula=$id_aula");

	}
   

}


?>