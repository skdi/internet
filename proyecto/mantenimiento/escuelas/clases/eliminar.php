<?php

require_once("escuela.php");
 
 $id_escuela = $_GET['id'];
 $escuela= new eliminar($id_escuela);
 if($escuela->eliminar_escuela())
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
