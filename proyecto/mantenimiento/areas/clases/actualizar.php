<?php
require_once("participante.php");
session_start();

$nombre= $_POST['nombre'];
$nombre_original = $_SESSION['id'];
    $enlace= new conectar();
    $conexion= $enlace->conexion;

    $area= new Area($nombre_original,$nombre);
    
    if( $resultado=$area->actualizar())
    {
        $_SESSION['ejecuto']=TRUE;
        header("location:../actualizar.php" );
    }
else
{
    $_SESSION['error']=TRUE;
    header("location:../actualizar.php");
}




?>
