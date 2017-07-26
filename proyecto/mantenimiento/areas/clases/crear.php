<?php
require_once("participante.php");
session_start();

$nombre= $_POST['nombre'];
$area= new area($nombre);
$resultado=$area->crear();

$enlace= new conectar();
$conexion= $enlace->conexion;

if($resultado)
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

