<?php
require_once("participante.php");
session_start();

$id =$_POST['id_participante'];
$_SESSION['id']=$id;    
$id_detalle=$_POST['id_detalle'];

$dni= $_POST['dni'];
$nombre= $_POST['nom'];
$apellido= $_POST['apll'];
$correo= $_POST['correo'];
$telefono= $_POST['telf'];
$participacion= $_POST['participacion'];
$veces=$_POST['veces'];
$estado=$_POST['estado'];

$categoria=$_POST['categoria'];
$dependecia=$_POST['dependencia'];

    if($id_detalle<>"noseusa")
    {
        $sql="UPDATE detalle_participante set facultad='', regimen='', dependencia='$dependecia',id_participante='$id',categoria='$categoria' where id_detalle_participante = $id_detalle";

    }
    else
    {

         $sql="INSERT INTO detalle_participante (facultad,regimen,dependencia,id_participante,categoria) VALUES ('','','$dependencia','$id','$categoria')";


    }
    $enlace= new conectar();
    $conexion= $enlace->conexion;

    $resultado1=mysqli_query($conexion,$sql);
    $participante= new participante($id,$dni,$nombre,$apellido,$telefono,$correo,'Administrativo',$veces,$participacion,$estado);
    
    
    if( $resultado=$participante->actualizar() and $resultado1)
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
