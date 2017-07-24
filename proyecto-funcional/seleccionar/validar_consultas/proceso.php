<?php

$nombre= $_POST['nombre'];
$fecha = $_POST['fecha'];

$info = date_parse($fecha);


$año=$info['year'];
$mes=$info['month'];
$dia=$info['day'];

$fecha = $año."-".$mes."-".$dia;


//Conectar a la base de datos
require_once("../../clases/conexion/conexion.php");
$con=$conexion;
$nombre=mysqli_real_escape_string($con,$nombre);
$fecha=mysqli_real_escape_string($con,$fecha);

    $sql="INSERT INTO proceso (nombre,fecha) VALUES ('$nombre','$fecha')";
    $consulta = mysqli_query($con,$sql);
    if (!$result=mysqli_fetch_array($consulta)){
         
        header("location:../" ); 
        exit();
    }else {
 
        header('location:../');
        //header("refresh:3; url=verRegistrados.php" ); 
        
    }

?>