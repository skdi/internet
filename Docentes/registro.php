
<html>

	<head>
		
		<meta http-equiv="Content-Type" content="text/html"; charset=UTF-8>
		<title>Registro</title>
		<style type="text/css">
			#caja{
				background:#CACACA;
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
				background-image:url("img/unsa-compressor-tarea.jpg");
				background-size:cover;
				}
		</style>

	</head>
	<body>
		<div id="caja" id="registro">
		<h1>Registro</h1>
			<form onsubmit="return false" class="formulario" id="FormRegistro" style="max-width: 300px">
			<div class="formulario-grupo">
				<label for="user">Usuario</label><br>
				<input type="text" name="user" id"user" placeholder="Usuario..."><br>
			</div>
			<div>
				<label for="NombresApellidos">Nombres Y Apellidos</label><br>
				<input type="text" name="NombresApellidos" id"NombresApellidos" placeholder="Nombres Y Apellidos..."><br>
			</div>
			<div>
				<label for="password">password</label><br>
				<input type="password" name="password" id"password" placeholder="password..."><br>
			</div>
			<div>
				<label for="error">Repita Password</label><br>
				<input type="password" name="RepitaPassword" id"RepitaPassword" placeholder="Repita Password...">
			</div>
			<div>
				<label for="error"></label><br>
				<input type="hidden" name="error" id"error">
			</div>
			<input type="submit" name="botonR" value="registro" onclick="registro(user.value,NombresApellidos.value,password.value,error.value);"/>
			</form>


		</div>

<?php
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
	$array=array($datos_reg["nombre"],$datos_reg["usuario"],$datos_reg["password"],$datos_reg["repassword"]);
	//Sacar datos con $datos;
	mysqli_free_result($consulta_reg);
	include("funciones.php");
?>










	</body>
</html>