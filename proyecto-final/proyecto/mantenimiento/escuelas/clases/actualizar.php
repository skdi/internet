<?php
require_once("escuela.php");
session_start();
if(!empty($_GET['id']))
{
    $id =$_GET['id'];
    $_SESSION['id']=$id; 
}
else
{
    $id=$_SESSION['id'];
} 

$nombre_area= $_POST['area'];
$nombre= $_POST['nom'];

$escuela= new escuela($id,$nombre_area,$nombre);
    
    
if( $resultado=$escuela->actualizar())
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

