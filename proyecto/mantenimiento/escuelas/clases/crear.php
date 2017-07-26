<?php
require_once("escuela.php");
session_start();

$area_nombre= $_POST['area'];
$nombre= $_POST['nombre'];



$escuela= new escuela('',$area_nombre,$nombre);
$resultado=$escuela->crear();


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

