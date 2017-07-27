<?php
require_once("participante.php");
session_start();

if(empty($_GET['id']))
    {
        $id=$_SESSION['id'];
    }


$nombre= $_POST['nombre'];
$nombre_original =$_SESSION['id'];
$enlace= new conectar();
$conexion= $enlace->conexion;
$area= new Area($nombre);


if( $resultado=$area->actualizar($nombre_original))
    {
        $_SESSION['id']=$nombre;
        $_SESSION['ejecuto']=TRUE;
        header("location:../actualizar.php" );
    }
else
{
    $_SESSION['error']=TRUE;
    header("location:../actualizar.php");
}




?>
