<?php /*lista_formuladores*/
     include("conectar.php");
     #resultado=mysql_query("SELECT * from nombretabla");
     while(#file=mysql_fetch_array(#resultado)){
          echo " #file[Nombre]."|".#file[Apellido]."|".#file[Codigo] <br>";
     }
     
?>
