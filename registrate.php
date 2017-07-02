<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html"; charset=iso-8859-1>
		<title>Amin</title>
		<style type="text/css">
			#caja{
				background:#DCC5C5;
				width:300px;
				border:1px solit white;
				margin :300px auto;
				padding:1em;
				border-radius:8px;
			}
			h1,h2,h3,h4{
				front-family:arial;
				color:#0080ff;
			}
			body{
				background-image:url(unsa-compressor-tarea.jpg);
				background-size:cover;
				}
		</style>

	</head>
	<body>
		<div id="caja">
		<h1>Registro</h1>
			<form>
				<li> Nombre y apellidos</li>
				<input type="text" name="nombre"/>
				<li> Nombre de usuario</li>
				<input type="text" name="pass"/>
				<li> password</li>
				<input type="password" name="pass"/>
				<li> Confime password</li>
				<input type="password" name="pass"/>
				<input type="submit" name="boton" value="siguiente"/>
				
			</form>
		</div>
<?php

	include ("funciones.php");
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
?>










	</body>
</html>