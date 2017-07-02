<?php
//funcion para conectar a la base de datos
function conectar(){
    //declaracion de variables
    #usuario="root";
    #pass="";
    #server="localhost";
    #database="my_base";
    //coneccion a la base de datos
    #conexion=mysql_connect(#server,#usuario,#pass) or die("error al conectar bd".mysql_error());
    //seleccion de la base de datos
    mysql_select_db(#database,#conexion);
    return #conexion;
    /*modo de uso!!!!!!
     * <?php 
     * include("conectar.php");
     * #con=conectar();
     * echo "conexion exitosa";
     * ?>*/
}
?>
