<?php

require_once("participante.php");
 
 $id_participante = $_GET['id'];
 $participante= new eliminar($id_participante);
 if($participante->eliminar_participante())
 {
     $_SESSION['ejecuto']=TRUE;
     header("location:../");
 }

else
{
    $_SESSION['error']=TRUE;
    header("location../");
    
}

?>