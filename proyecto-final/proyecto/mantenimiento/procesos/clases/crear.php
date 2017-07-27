<?php
require_once("participante.php");
session_start();

$nombre= $_POST['nombre'];
$fecha= $_POST['fecha'];

$fecha=date('Y-m-d', strtotime($fecha));


$proceso= new Proceso('',$nombre,$fecha);
$resultado=$proceso->crear();

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

