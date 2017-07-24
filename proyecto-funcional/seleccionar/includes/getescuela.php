<?php
    require_once("../clases/conexion/conexion.php")
    $con=$conexion;
	$area = $_POST['area'];
	
	$query = "SELECT * FROM escuela WHERE area_nombre = '$area' ORDER BY nombre";
	$resultado=mysqli_query($con,$query);
	$opciones="<option value='aaa'>aaa</option>";
	while($row = mysqli_fetch_array($resultado))
	{
		$opciones.="<option value='".$row['id_escuela']."'>".$row['nombre']."</option>";
	}
	echo $opciones;

?>