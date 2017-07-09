<?php/*
<form action="importar.php" enctype="multipart/form-data" method="post">
   <input id="archivo" accept=".csv" name="archivo" type="file" /> 
   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
   <input name="enviar" type="submit" value="Importar" />
</form>*/
class Importar(){
  private $archivo="datos.csv";
  public function importarDocentes($archivo=$this->archivo){
  //obtenemos el archivo .csv
  //cargamos el archivo
  $lineas = file($archivo);   
  //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
  $i=0;   
  //Recorremos el bucle para leer línea por línea
  foreach ($lineas as $linea_num => $linea)
  { 
     //abrimos bucle
     /*si es diferente a 0 significa que no se encuentra en la primera línea 
     (con los títulos de las columnas) y por lo tanto puede leerla*/
     if($i != 0) 
     { 
         //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
         /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
         leyendo hasta que encuentre un ; */
         $docente = explode(";",$linea);
         //Almacenamos los docente que vamos leyendo en una variable
         $dni=trim($docente[0]);
         $apellidos=trim($docente[1]);
         $nombre = trim($docente[2]);
         $facultad =trim($docente[3]);
         $telefono = trim($docente[4]);
         $correo = trim($docente[5]);
         $categoria = trim($docente[6]);
         $regimen = trim($docente[7]);
         $cargo= trim($docente[8]);   
         //guardamos en base de docente la línea leida
         mysql_query("INSERT INTO docente(nombre,edad,profesion) 
          VALUES('$dni,'$apellidos','$nombre','$facultad','$telefono','$correo','$categoria','$regimen','$cargo')");   
         //cerramos condición
     }   
     /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
     entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
     $i++;
     //cerramos bucle
  }
}
public function importarAdministrativos($archivo=$this->archivo){
  //obtenemos el archivo .csv
  $lineas = file($archivo);   
  $i=0;   
  foreach ($lineas as $linea_num => $linea)
  { 
     if($i != 0) 
     { 
         $administrativos = explode(";",$linea);
         $dni=trim($administrativos[0]);
         $apellidos=trim($administrativos[1]);
         $nombre = trim($administrativos[2]);
         $dependencia =trim($administrativos[3]);
         $telefono = trim($administrativos[4]);
         $correo = trim($administrativos[5]);
         $categoria = trim($administrativos[6]);
         $cargo= trim($administrativos[7]);   
         mysql_query("INSERT INTO administrativos(nombre,edad,profesion) 
          VALUES('$dni,'$apellidos','$nombre','$dependencia','$telefono','$correo','$categoria','$cargo')");
     }   
     $i++;
  }
}
}
?>