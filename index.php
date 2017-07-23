<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("location:login.php");
	}
		
	echo '<h1 align=center>Welcome :'.$_SESSION["user"].'</h1>';
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta name="viewport" content="width-device-width,use-scalable-no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
		<script src="js/jquery-3.2.1.js" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>

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
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-md-offset-4">
				<form method="post">
					</div>
					<div class="form-group">
						  <input type="button" name="login" id="login" value="Lgout" class="btn btn-success">
						  
					</div>
					<br>
				</form>
				</div>
			</div>
		</div>
	</body>

</html>	
