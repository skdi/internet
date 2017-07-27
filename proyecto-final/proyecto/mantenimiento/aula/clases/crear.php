<?php
require_once("participante.php");
session_start();

$id_escuela= $_POST['id_escuela'];
$n_aula= $_POST['n_aula'];


$participante= new participante('',$id_escuela,$n_aula);
$resultado=$participante->crear();

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

