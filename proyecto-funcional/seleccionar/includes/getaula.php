<?php
    require_once("../clases/conexion/conexion.php")
    $con=$conexion;
	$id_escuela = $_POST['id_escuela'];
	
	$query = "SELECT * FROM escuela WHERE id_escuela = '$id_escuela' ORDER BY n_aula";
	$resultado=mysqli_query($con,$query);
	$html=;
	while($row = mysqli_fetch_array($resultado))
	{
		$data.= "<option value='".$row['id_aula']."'>".$row['n_aula']."</option>";
	}
	echo $data;

?>