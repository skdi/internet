
<?php
//Include database configuration file
include('../clases/conexion/conexion.php');
$con=$conexion;
if(isset($_POST["nombre"]) && !empty($_POST["nombre"])){
    //Get all state data
    $area=$_POST['nombre'];
    
    $query = mysqli_query($con,"SELECT * FROM escuela WHERE area_nombre = '".$area."' ORDER BY nombre ASC");
    
    //Count total number of rows
    $rowCount = mysqli_num_fields($query);
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Selecciona escuela</option>';
        while($row = mysqli_fetch_array($query)){ 
            echo '<option value="'.$row['id_escuela'].'">'.$row['nombre'].'</option>';
        }
    }else{
        echo '<option value="">Escuela no Disponible</option>';
    }
}

if(isset($_POST["id_escuela"]) && !empty($_POST["id_escuela"])){
    //Get all city data
    $query = mysqli_query($con,"SELECT * FROM aula WHERE id_escuela = ".$_POST['id_escuela']." ORDER BY n_aula ASC");
    
    //Count total number of rows
    $rowCount = mysqli_num_fields($query);
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Selcciona aula</option>';
        while($row = mysqli_fetch_array($query)){ 
            echo '<option value="'.$row['id_aula'].'">'.$row['n_aula'].'</option>';
        }
    }else{
        echo '<option value="">Aulas no disponibles</option>';
    }
}
?>
