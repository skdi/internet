<?php
//funcion para conectar a la base de datos
function conectar(){
//CONEXIÓN A LA BASE DE DATOS
$hostname_db = "host";
$database_db = "nombre";
$username_db = "usuario";
$password_db = "password";
//Conectar a la base de datos
$conexion = mysqli_connect($hostname_db, $username_db, $password_db);
//Seleccionar la base de datos
mysqli_select_db($conexion,$database_db) or die ("Ninguna DB seleccionada");

return #conexion;
    /*modo de uso!!!!!!
     * <?php 
     * include("conectar.php");
     * #con=conectar();
     * echo "conexion exitosa";
     * ?>*/
}
?>
