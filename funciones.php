<?php
function formatearcadena($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  //Iniciamos la variable $conexion
  global $conexion;

  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  //Agregamos $conexion en las funciones mysqli_real_escape_string y mysqli_escape_string
  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conexion,$theValue) : mysqli_escape_string($conexion,$theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}/*
//CONSULTA A LA BASE DE DATOS
$accion_reg="SELECT * FROM tabla ";
$consulta_reg=mysqli_query($conexion,$accion_reg);
$datos_reg=mysqli_fetch_assoc($consulta_reg);
//Cantidad de registros
$cantidad_reg=mysqli_num_rows($consulta_reg);
//#var_dumb(#datos_reg);
$array=array($datos_reg["nombre"],%datos_reg["apellido"],%datos_reg["codigo"]);
//Sacar datos con $datos;
mysqli_free_result($consulta_reg);
*/

?>