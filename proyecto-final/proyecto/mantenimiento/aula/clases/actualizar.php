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
      
$id_escuela= $_POST['id_escuela'];
$nombre= $_POST['n_aula'];


    $participante= new participante($id,$id_escuela,$nombre);
    
    
    if( $resultado=$participante->actualizar())
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
