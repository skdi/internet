<?php
class Importar(){
  private $archivo="datos.csv";
    public set_archivo($archivo){
    $this->archivo=$archivo;
  }
  public function importar($tipo){
    if($tipo='A')
      importarAdministrativos();
    else if($tipo='D')
      importarDocentes();
  }
  private function importarDocentes(){
  //obtenemos el archivo .csv
  //cargamos el archivo
  $lineas = file($this->archivo);   
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
         $dni=trim($docente[1]);
         $apellidos=trim($docente[2]);
         $nombre = trim($docente[3]);
         $facultad =trim($docente[4]);
         $telefono = trim($docente[5]);
         $correo = trim($docente[6]);
         $categoria = trim($docente[7]);
         $regimen = trim($docente[8]);
         $cargo= trim($docente[9]);   
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
private function importarAdministrativos(){
  //obtenemos el archivo .csv
  $lineas = file($this->archivo);   
  $i=0;   
  foreach ($lineas as $linea_num => $linea)
  { 
     if($i != 0) 
     { 
         $administrativos = explode(";",$linea);
         $dni=trim($administrativos[1]);
         $apellidos=trim($administrativos[2]);
         $nombre = trim($administrativos[3]);
         $dependencia =trim($administrativos[4]);
         $telefono = trim($administrativos[5]);
         $correo = trim($administrativos[6]);
         $categoria = trim($administrativos[7]);
         $cargo= trim($administrativos[8]);   
         mysql_query("INSERT INTO administrativos(nombre,edad,profesion) 
          VALUES('$dni,'$apellidos','$nombre','$dependencia','$telefono','$correo','$categoria','$cargo')");
     }   
     $i++;
  }
}
}
?>
