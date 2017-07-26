<?php
require_once("escuela.php");
session_start();

$id =$_POST['id_escuela'];
$_SESSION['id']=$id;    

$nombre_area= $_POST['nombre_area'];
$nombre= $_POST['nombre'];

$categoria=$_POST['categoria'];
/*
    if($id_detalle<>"noseusa")
    {
        $sql="UPDATE detalle_participante set facultad='$fc', regimen='$regi', dependencia='',id_escuela='$id',categoria='$categoria' where id_detalle_participante = $id_detalle";

    }
    else
    {

         $sql="INSERT INTO detalle_participante (facultad,regimen,dependencia,id_escuela,categoria) VALUES ('$fc','$regi','','$id','$categoria')";


    }*/
    $enlace= new conectar();
    $conexion= $enlace->conexion;

    $resultado1=mysqli_query($conexion,$sql);
    $escuela= new escuela($id,$nombre_area,$nombre);
    
    
    if( $resultado=$escuela->actualizar() and $resultado1)
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

