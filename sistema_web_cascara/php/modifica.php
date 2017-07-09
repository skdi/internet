<?php 
	require_once("conect.php");

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$facultad= $_POST['facultad'];
	$dependencia = $_POST['dependencia'];
	$cargo = $_POST['cargo'];
	$regimen = $_POST['regimen'];
	//Facultad	Categoria	Regimen	Cargo

		if($regimen){//si es docente
		mysqli_query("UPDATE $participante set regimen='$regimen' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}
		if($cargo){//si es docente
		mysqli_query("UPDATE $participante set cargo='$cargo' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}
		if($facultad){//si es docente
		mysqli_query("UPDATE $participante set facultad='$facultad' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}
		if($dependencia){//si es docente
		mysqli_query("UPDATE $participante set dependencia='$dependencia' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}

}
?>
