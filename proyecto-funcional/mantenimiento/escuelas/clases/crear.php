<?php
require_once("escuela.php");
session_start();

$area_nombre= $_POST['area_nombre'];
$nombre= $_POST['nombre'];



$escuela= new escuela('',$area_nombre,$nombre);
$resultado=$escuela->crear();

$enlace= new conectar();
$conexion= $enlace->conexion;

if($resultado)
{
    $sql1="Select id_escuela from escuela where area_nombre='$area_nombre'";
    $datos=mysqli_fetch_array(mysqli_query($conexion,$sql1));
    $id=$datos['id_escuela'];
    
}


$sql="INSERT INTO escuela (nombre,area_nombre) VALUES ('$nombre','$area_nombre')";


$resultado1=mysqli_query($conexion,$sql); 

    if($resultado1)
    {
        $_SESSION['ejecuto']=TRUE;
        header("location:../crear.php" );
    }
else
{
    $_SESSION['error']=TRUE;
    header("location:../crear.php" );
}


?>

