<?php
require_once("participante.php");
session_start();

$dni= $_POST['dni'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$correo= $_POST['correo'];
$telefono= $_POST['telefono'];
$participacion= $_POST['participacion'];


$categoria=$_POST['categoria'];
$fc=$_POST['fc'];
$regi=$_POST['rg'];

$participante= new participante('',$dni,$nombre,$apellido,$telefono,$correo,'Docente',0,$participacion,'a');
$resultado=$participante->crear();

$enlace= new conectar();
$conexion= $enlace->conexion;

if($resultado)
{
    $sql1="Select id_participante from participante where dni='$dni'";
    $datos=mysqli_fetch_array(mysqli_query($conexion,$sql1));
    $id=$datos['id_participante'];
    
}


$sql="INSERT INTO detalle_participante (facultad,regimen,dependencia,id_participante,categoria) VALUES ('$fc','$regi','','$id','$categoria')";


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

