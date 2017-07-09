
<?php

$user= $_POST['dni'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$con = $_POST['con'];
		
	//Conectar a la base de datos
    require_once("conect.php");

    $sql = "insert into usuario (dni,nombre,correo,usuario,con) values ('$user','$nombre','$correo','$usuario','$con')";
    $result = @mysqli_query($con,$sql);
    if (! $result){
        echo "La consulta SQL contiene errores.".mysqli_connect_error();
        header("refresh:3;0 url=registro.html" ); 
        exit();
    }else {
        echo "Datos ingresados";
        //header("refresh:3; url=verRegistrados.php" ); 
        
    }


?>

