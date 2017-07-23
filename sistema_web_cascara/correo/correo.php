<?php 
	require_once("..\clases/conexion/conexion.php");
	if(isset($_POST('asunto')) && !empty($_POST('asunto')) && isset($_POST('mensaje')) && !empty($_POST('mensaje'))){
		
	    session_start();
	    $con=$conexion;    
	    $sql="SELECT correo FROM participante";
	    $query=mysqli_query($con,$sql);

		while($destino){
			$destino=$query;
			$destino=$destino;
			$desde = "FROM:"."Administradivo UNSA";
			$asunto =($_POST('asunto'));
			$mensaje =($_POST('mensaje'));
			mail($destino,$asunto,$mensaje,$desde);

		}
		echo "Correos Enviados...";

	}else {
		echo "Problemas al enviar el correo ,porfavor verifique los datos";
	}
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="correo.php" method="post">
	<input type="text" name="asunto"/><br /><br />
	<textarea name="mensaje"></textarea><br /><br />
	<input type="submit" value="Enviar Correo">
</form>

</body>
</html>