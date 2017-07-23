<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("location:login.php");
	}
		
	echo '<h1 align=center>Welcome :'.$_SESSION["user"].'</h1>';
	echo '<p align=center><a href="logout.php">Logout</a></p>';

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta name="viewport" content="width-device-width,use-scalable-no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">

		<title>Pagina del postulante</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="estilos.css">
		<style type="text/css">
			#caja{
				background:#CACACA;
				width:200px;
				border:1px solid white;
				margin :auto 83%;
				padding:0em;
				border-radius:0px;
			}
			#registro{
				background:#CACACA;
				width:200px;
				border:1px solid white;
				margin :auto 83%;
				padding:0em;
				border-radius:0px;
			}
			h1,h2,h3,h4{
				front-family:arial;
				color:#000;
			}
		</style>
		
		</head>
	<body>

</body>

</html>	
