<?php 
	require_once("conect.php");

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$facultad= $_POST['facultad'];
	$dependencia = $_POST['dependencia'];
	$cargo = $_POST['cargo'];
	$regimen = $_POST['regimen'];
	//Facultad	Categoria	Regimen	Cargo

		if($regimen){
		mysqli_query($con,"UPDATE participante set regimen='$regimen' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}
		if($cargo){
		mysqli_query($con,"UPDATE participante set cargo='$cargo' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}
		if($facultad){
		mysqli_query($con,"UPDATE participante set facultad='$facultad' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}
		if($dependencia){
		mysqli_query($con,"UPDATE participante set dependencia='$dependencia' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}


?>
