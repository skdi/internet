<?php
	session_start();
  //si aun el usuario no ah iniciado secion redirecciona a login
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
						  <input type="button" name="logut" id="logout" value="Logout" class="btn btn-success" onclick=" location.href='logout.php'">
					</div>
					<br>
				</form>
				</div>
			</div>
		</div>
	</body>

</html>	
<!--
<!DOCTYPE html>
<html lang="es">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/icons.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <title>PROCESO ADMISION</title>
</head>
<body>

  <div class="wrapper">
    <form action="validacion.php" class="form-signin" method="post" id="FormRegistro" >       
      <h2 class="form-signin-heading">INGRESAR</h2>
      <input type="text" class="form-control" name="usuario" placeholder="Direccion Correo o usuario" required="" autofocus="" />
      <input type="password" class="form-control" name="pass" placeholder="Contraseña" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>   
    </form>
  </div>

    
</body>
</html>-->