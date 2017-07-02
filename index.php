<!DOCTYPE html>
<html lang="es">
	<head>
		<meta name="viewport" content="width-device-width,use-scalable-no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">

		<title>menu desplegable horizontal</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="estilos.css">
		<style type="text/css">
			#caja{
				background:#B2BABB;
				width:200px;
				border:1px solit white;
				margin :auto 80%;
				padding:0.3em;
				border-radius:8px;
			}
			h1,h2,h3,h4{
				front-family:arial;
				color:#0080ff;
			}
		</style>
	</head>
	<body>
		<div id="caja">
		<h1>Adminitrador</h1>
			<form>
				<li> Usuario</li>
				<input type="text" name="nombre"/>
				<li> Password</li>
				<input type="password" name="pass"/>
				<input type="submit" name="boton" value="login"/>
				
			</form>
		</div>
	</body>
	<body>
		<div id="header">
			<ul class="nav">
				<li><a href="docentes">Docentes</a>
				<ul>
					<li><a href="Perfil docente">Perfiles docente<?php
						#include("Docente/perfil_docente.php");		
					?></a></li>
					<li><a href="formuladores">Formuladores<?php
						#include("Docente/formuladores.php");		
					?></a></li>
					<li><a href="controladores">Comtroladores<?php
						#include("Docente/controladores.php");		
					?></a></li>
					<li><a href="registro">Registro<?php
						#include("Docente/registros.php");		
					?></a></li>
					<li><a href="seleccion">Seleccion<?php
						#include("Docente/seleccion.php");		
					?></a></li>
				</ul>
				</li>
				<li><a href="personal adimistrativo">Personal Adminitrativo</a>
					<ul>
						<li><a href="Perfil Adminitrativo">Perfil adimistrativo</a></li>
						<li><a href="tecnicos">Tecnicos</a></li>
						<li><a href="contadores">Contadores</a></li>
						<li><a href="conserjes">Concerjes</a></li>
						<li><a href="porteros">Porteros</a></li>
						<li><a href="Controladores de puerta">Controladores de puerta</a></li>
						<li><a href="registro">Registro</a></li>
						<li><a href="seleccion">Seleccion</a></li>
					</ul>
				</li>
				<li><a href="postulante">Postulante</a></li>
			</ul>
		</div>
	</body>
</html>	
