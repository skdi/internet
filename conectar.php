<?php
//funcion para conectar a la base de datos
//CONEXIÓN A LA BASE DE DATOS
$hostname_db = "host";
$database_db = "nombre";
$username_db = "usuario";
$password_db = "password";
//Conectar a la base de datos
$conexion = mysqli_connect($hostname_db, $username_db, $password_db);
//Seleccionar la base de datos
mysqli_select_db($conexion,$database_db) or die ("Ninguna DB seleccionada");
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
include("funciones.php");
}
?>
