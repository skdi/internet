
<?php

session_start();
require("../clases/conexion/conexion.php");
$enlace=new conectar();
$conexion=$enlace->conexion;

$curso=$_POST['curso'];
$participante= $_POST['participante'];
$titulo=$_POST['titulo'];
$tema=$_POST['tema'];
$proceso=$_POST['proceso'];
$area=$_POST['area'];
$enunciado=$_POST['enunciado'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$estado=$_POST['estado'];
$alternativa=$_POST['alternativa'];
$sustento=$_POST['sustento'];


$sql="INSERT INTO `pregunta` (`nombre`, `enunciado`, `curso`, `tema`, `sustento`, `respuesta`, `id_participante`, `id_proceso`, `a`, `b`, `c`, `d`, `e`, `estado`, `area`) VALUES ('$titulo','$enunciado','$curso','$tema','$sustento','$alternativa','$participante','$proceso','$a','$b','$c','$d','$e','$estado','$area')";


$resultado1=mysqli_query($conexion,$sql)or die("Error en: $sql: " . mysqli_error()); 

if($resultado1)
{
   
    header("location:proceso.php");
}
else
{
    echo '<div class="alert alert-danger" align="center"><strong>ERROR: Participante no fue Agregado a Proceso ...!!!</strong></div>' ;
    header("location:../seleccionar/error.php");
}

?>



