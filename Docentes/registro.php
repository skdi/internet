
<?php

$user= $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

		
	//Conectar a la base de datos
    $con = @mysqli_connect('localhost', 'root', '');
    if (!$con){
        die('ERROR DE CONEXION CON MYSQL: ' . mysqli_connect_error());
    }


    /* CONECTA CON LA BASE DE DATOS  **************** */
    $database = @mysqli_select_db($con,'internetdatabase');
    if (!$database){
        die('ERROR CONEXION CON LA BD: '. mysqli_connect_error());
    }


    $sql = "insert into docente (dni,nombre,apellido) values ('$user','$nombre','$apellido')";
    $result = @mysqli_query($con,$sql);
    if (! $result){
        echo "La consulta SQL contiene errores.".mysqli_connect_error();
        header("refresh:30; url=registro.html" ); 
        exit();
    }else {
        echo "Datos ingresados";
        header("refresh:3; url=ver.php" ); 
        
    }


?>

