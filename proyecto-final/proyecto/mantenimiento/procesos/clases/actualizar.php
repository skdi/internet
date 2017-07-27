<?php
require_once("participante.php");
session_start();
if(empty($_GET['id']))
    {
        $id=$_SESSION['id'];
    }
else
    {
        $id=$_GET["id"];
        $_SESSION['id']=$_GET['id'];
    }
$nombre= $_POST['nombre'];
$fecha= $_POST['fecha'];
$fecha=date('Y-m-d', strtotime($fecha));


$proceso= new Proceso($id,$nombre,$fecha);
$resultado=$proceso->actualizar();

if($resultado)
{
    $_SESSION['ejecuto']=TRUE;
    header("location:../actualizar.php" );
}
else
{
    $_SESSION['error']=TRUE;
    header("location:../actualizar.php" );
}


?>
