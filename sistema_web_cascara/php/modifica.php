<?php 
	require_once("conect.php");

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$facultad= $_POST['facultad'];
	$dependencia = $_POST['dependencia'];
	$cargo = $_POST['cargo'];
	$regimen = $_POST['regimen'];
	if($regimen){//si es docente
		mysqli_query("UPDATE $participante set regimen='$regimen',facultad='$facultad',
	 cargo='$cargo',categoria='$categoria' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}
	else if($dependencia){//si es administrativo
	mysqli_query("UPDATE $participante set dependencia='$dependencia',cargo='$cargo',
		categoria='$categoria' WHERE nombre='$nombre' AND  apellido='$apellido'");
	}


}
?>
