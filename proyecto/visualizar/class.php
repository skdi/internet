
<?php
//SELECT COUNT(*) FROM `proceso_participante` inner join (SELECT * from participante where tipo_nombre= "ADMINISTRATIVO" ) as A ON proceso_participante.id_participante= A.id_participante


require_once("../clases/conexion/conexion.php");
$con=$conexion;

class Preguntas
{
    var $id;
    var $conexion;
 
    function __construct($id)
    {
        $this->id=$id;
        $enlace= new conectar();
        $this->conexion=$enlace->conexion;
       
    }
    function cantidad_partipacion($participacion)
    {   
        
        $sql="SELECT COUNT(*) FROM proceso_participante WHERE id_proceso='$this->id' and participacion='$participacion'";
        $resultado=mysqli_query($this->conexion,$sql) or die("Error en: $sql: " . mysqli_error());;

        if($r=mysqli_fetch_array($resultado))
        {
             return $this->resultado=$r['COUNT(*)'];
        }
        
        return 'error';

    }
    function nombre_escuela($id)
    {
        $sql="SELECT nombre from escuela where id_escuela='$id'";
        $resultado=mysqli_query($this->conexion,$sql);
        
        if($r=mysqli_fetch_array($resultado))
        {
            return $this->resultado=$r['nombre'];
        }
    } 
    function aula($id)
    {
        $sql="SELECT n_aula from aula where id_aula='$id'";
        $resultado=mysqli_query($this->conexion,$sql);
        
        if($r=mysqli_fetch_array($resultado))
        {
            return $this->resultado=$r['n_aula'];
        }
    }

}
?>