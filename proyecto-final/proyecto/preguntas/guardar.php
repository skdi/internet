
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
$nombre_pre="notieneimagen";
$img_pre="notieneimagen";
$nombre_susten="notieneimagen";
$img_sus="notieneimagen";

///IMAGENES /// 
if($_FILES['img_pre']['size']>0)
{
    $nombre_pre=$_POST['nombre_pre'];
    $img_pre=$_FILES['img_pre']['name'];
    $ruta=$_FILES['img_pre']['tmp_name'];
    $destino="imagenes_preguntas/".$img_pre;
    copy($ruta,$destino);
}

if($_FILES['img_sus']['size']>0)
{
    $nombre_susten=$_POST['nombre_susten'];
    $img_sus=$_FILES['img_sus']['name'];
    $ruta=$_FILES['img_sus']['tmp_name'];
    $destino="imagenes_respuestas/".$img_sus;
    copy($ruta,$destino);
}

$sql="INSERT INTO `pregunta` (`nombre`, `enunciado`, `curso`, `tema`, `sustento`, `respuesta`, `id_participante`, `id_proceso`, `a`, `b`, `c`, `d`, `e`, `estado`,`area`,`nombre_preg`,`nombre_susten`,`img_pre`,`img_sus`) VALUES ('$titulo','$enunciado','$curso','$tema','$sustento','$alternativa','$participante','$proceso','$a','$b','$c','$d','$e','$estado','$area','$nombre_pre','$nombre_susten','$img_pre','$img_sus')";


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



