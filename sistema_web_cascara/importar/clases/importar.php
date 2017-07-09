<?php
include_once("../../clases/conexion/conexion.php");

$archivo = $_POST['archivo'];

$conect=new conectar();
$con=$conect->conexion;
/*
$import= new Importar();
$import->set_archivo($archivo);
$import->importar();
*/
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
         $dni=trim($docente[1]);
         $apellidos=trim($docente[2]);
         $nombre = trim($docente[3]);
         $facultad = trim($docente[4]);
         $telefono = trim($docente[5]);
         $correo = trim($docente[6]);
         $categoria = trim($docente[7]);
         $regimen= trim($docente[9]); 
         $cargo = trim($docente[10]);
         if(!mysqli_query($con,"SELECT * FROM tipo_participante WHERE cargo='$cargo'")){
            mysqli_query($con,"INSERT INTO tipo_participante (cargo) VALUES ('$cargo')");} 
         //guardamos en base de docente la línea leida
         mysqli_query($con,"INSERT INTO participante(dni,apellidos,nombre,dependencia,facultad,telefono,correo,categoria,regimen) 
          VALUES('$dni,'$apellidos','$nombre','$dependencia','$facultad','$telefono','$correo','$categoria','$regimen')");   
         //cerramos condición
     }   
     /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
     entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
     $i++;
     //cerramos bucle
  }






?>
