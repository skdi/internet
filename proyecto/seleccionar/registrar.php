<?php

session_start();
require("../clases/conexion/conexion.php");
$enlace=new conectar();
$conexion=$enlace->conexion;

$id_participante= $_POST['id_participante'];
$funcion= $_POST['fu'];
$aula= $_POST['aula'];
$escuela= $_POST['escuela'];
$area= $_POST['area'];
$id_proceso=$_POST['id_proceso'];


$sql="INSERT INTO proceso_participante (id_proceso,id_participante,area,id_aula,id_escuela,participacion) VALUES ('$id_proceso','$id_participante','$area','$aula','$escuela','$funcion')";


$resultado1=mysqli_query($conexion,$sql)or die("Error en: $sql: " . mysqli_error()); 

if($resultado1)
{
   echo '<div class="alert alert-success" align="center"><strong>Exito Participante Agregado a Proceso correctamente !!!</strong></div>' ;
    header("location:pro_sel.php");
}
else
{
    echo '<div class="alert alert-danger" align="center"><strong>ERROR: Participante no fue Agregado a Proceso ...!!!</strong></div>' ;
    header("location:error.php");
}

?>

