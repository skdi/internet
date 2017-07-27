
<?php
//SELECT COUNT(*) FROM `proceso_participante` inner join (SELECT * from participante where tipo_nombre= "ADMINISTRATIVO" ) as A ON proceso_participante.id_participante= A.id_participante


require_once("..\clases/conexion/conexion.php");
$con=$conexion;

function esta_proceso($id_proceso,$id_participante,$conexion)
    {
        $sql="Select COUNT(*) from proceso_participante where id_participante='$id_participante' and id_proceso='$id_proceso'";
        
        $consulta=mysqli_query($conexion,$sql);
        $array_fila = mysqli_fetch_array($consulta);
        $fila= $array_fila[0];
        if($fila > 0)
        {
            return FALSE;
        }
        else
            return TRUE;

    }
function numb_procesos($num,$id_par,$conexion)
    {
        $sql="select COUNT(*) from proceso_participante where proceso_participante.id_participante='$id_par'";
        $consulta=mysqli_query($conexion,$sql) or die("Error en: $sql: " . mysqli_error());
        $array_fila=mysqli_fetch_array($consulta);
        $fila= $array_fila['COUNT(*)'];
        if($fila==$num)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }
function consultar_e_n($id_escuela,$con)
{

    $sql="select nombre from escuela where id_escuela='$id_escuela'";
    $consulta=mysqli_query($con,$sql) or die("Error en: $sql: " . mysqli_error());
    $array_fila=mysqli_fetch_array($consulta);
    $nombre=$array_fila['nombre'];
    return $nombre;
}
function consultar_a_n($id_aula,$con)
{

    $sql="select n_aula from aula where id_aula='$id_aula'";
    $consulta=mysqli_query($con,$sql) or die("Error en: $sql: " . mysqli_error());
    $array_fila=mysqli_fetch_array($consulta);
    $nombre=$array_fila['n_aula'];
    return $nombre;
}

    class Registrar
{
    var $id_proceso;
    var $id_participante;
    var $id_aula;
    var $id_escuela;
    var $area;
    var $participacion;
    
    
}

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
        $resultado=mysqli_query($this->conexion,$sql) or die("Error en: $sql: " . mysqli_error());

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
    
    function parti($num,$id_proceso,$funcion)
    {
         $funcion=mysqli_real_escape_string($this->conexion, $funcion);
         $id_proceso=mysqli_real_escape_string($this->conexion, $id_proceso);
            
            
            $sql="Select * from participante WHERE id_participante NOT IN ( SELECT id_participante from proceso_participante where id_proceso='$id_proceso' ) ";
            $registros='';
            $consulta=mysqli_query($this->conexion,$sql);
            while($d=mysqli_fetch_array($consulta))
             {
                $o=$d['estado'];
                if($o<>'a')
                $esta="no activo";
                else{
                    $esta="activo";
                }
                if(numb_procesos($num,$d['id_participante'],$this->conexion))
                {
                   $registros.='<tr><td>'.$d['dni'].'</td><td>'.$d['apellido'].'</td><td>'.$d['nombre'].'</td><td>'.$esta.'</td><td>'.$d['tipo_nombre'].'</td><td>'.$d['tipo_participacion'].'</td><td><a href="ver_perfil.php?id_personal='.$d['id_participante'].'&fu='.$funcion.'" class="btn btn-warning"><span class="fa fa-address-book"></span> Gestionar</a></td>';

                }
                
                                    
            }

            return $registros;
        
    }
    
    function aleatorio($id_proceso,$funcion)
    {
            $funcion=mysqli_real_escape_string($this->conexion, $funcion);
            $id_proceso=mysqli_real_escape_string($this->conexion, $id_proceso);
            
            $sql="Select COUNT(*) from participante WHERE id_participante NOT IN ( SELECT id_participante from proceso_participante where id_proceso='$id_proceso' ) and tipo_participacion='$funcion'";
            
            $query_filas = mysqli_query($this->conexion,$sql);
            $array_fila = mysqli_fetch_array($query_filas);
            $fila = $array_fila[0];
            $aleatorio = rand(0, $fila-1);
            $sql="Select * from participante WHERE id_participante NOT IN ( SELECT id_participante from proceso_participante where id_proceso='$id_proceso' ) and tipo_participacion='$funcion' LIMIT $aleatorio, 1";
            $registros='';
            $consulta=mysqli_query($this->conexion,$sql);
            while($d=mysqli_fetch_array($consulta))
             {
                $o=$d['estado'];
                if($o<>'a')
                $esta="no activo";
                else{
                    $esta="activo";
                }
                $registros.='<tr><td>'.$d['dni'].'</td><td>'.$d['apellido'].'</td><td>'.$d['nombre'].'</td><td>'.$esta.'</td><td>'.$d['tipo_nombre'].'</td><td>'.$d['tipo_participacion'].'</td><td><a href="ver_perfil.php?id_personal='.$d['id_participante'].'&fu='.$funcion.'" class="btn btn-warning"><span class="fa fa-address-book"></span> Gestionar</a></td>';

                $registros.="<a href='registros.php?id_al=si&fu=$funcion' class='btn btn-success'>Buscar Nuevamente Aleatoriamente</a>" ;
                $registros.="<br/>";
                $registros.="<br/>";
                                    
            }
            if(!mysqli_num_rows($consulta))
            {
            $registros.='<div class="alert alert-danger " align="center"><strong>No existen registros para escoger aleatoriamente</strong></div>' ;
                     
            }

            return $registros;
    }
   
    function especifico($id_proceso,$funcion,$identificador)
    {
        $funcion=mysqli_real_escape_string($this->conexion, $funcion);
        $id_proceso=mysqli_real_escape_string($this->conexion, $id_proceso);
        $identificador=mysqli_real_escape_string($this->conexion, $identificador);
        
        $sql="SELECT * FROM participante WHERE nombre LIKE '$identificador%' or apellido LIKE '$identificador%' or dni='$identificador' ORDER BY apellido";
        $registros='';
        $consulta=mysqli_query($this->conexion,$sql);
        while($d=mysqli_fetch_array($consulta))
        {
            $o=$d['estado'];
                if($o<>'a')
                $esta="no activo";
                else
                {
                    $esta="activo";
                }
            if(esta_proceso($id_proceso,$d['id_participante'],$this->conexion))
            {

                $registros.='<tr><td>'.$d['dni'].'</td><td>'.$d['apellido'].'</td><td>'.$d['nombre'].'</td><td>'.$esta.'</td><td>'.$d['tipo_nombre'].'</td><td>'.$d['tipo_participacion'].'</td><td><a href="ver_perfil.php?id_personal='.$d['id_participante'].'&fu='.$funcion.'" class="btn btn-warning"><span class="fa fa-address-book"></span> Gestionar</a></td>';
            }
            else
            {
                $registros.='<tr><td>'.$d['dni'].'</td><td>'.$d['apellido'].'</td><td>'.$d['nombre'].'</td><td>'.$esta.'</td><td>'.$d['tipo_nombre'].'</td> <td>Ya Asignado</td>';

            }
                
        } 
        if(!mysqli_num_rows($consulta))
        {
            $registros.='<div class="alert alert-danger " align="center"><strong>La persona que busca no se ha encontrado</strong></div>' ;
                     
        }
 
        return $registros;
    }
    
    function get_participante($dni)
    {
        $sql="select * from participante where dni='$dni'";
        
        $query=mysqli_query($this->conexion,$sql);
        $resultado=mysqli_fetch_array($query);
        return $this->resultado;
        
        
    }
    function opciones_escuela($area)
    {
        $sql="select * from escuela where nombre_area='$area'";
        $options='';
        $consulta=mysqli_query($this->conexion,$sql);
        while($d=mysqli_fetch_array($consulta))
        {
            $options.='<option value='.$d['id_escuela'].'>'.$d['nombre'].'</option>';
        }
        return $options;
    }
    function opciones_aula($id_escuela)
    {
        $sql="select * from aula where nombre_area='$id_escuela'";
        $options='';
        $consulta=mysqli_query($this->conexion,$sql);
        while($d=mysqli_fetch_array($consulta))
        {
            $options.='<option value='.$d['id_aula'].'>'.$d['n_aula'].'</option>';
        }
        return $options;
    }
    
}
?>