<?php
	//include ('php/conectar.php');
	$connect=mysqli_connect("localhost","root","","proyecto");
	$sql="SELECT *FROM participante";
	$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
?>
<html>
	<head>
		<title>Export MySQL data to Excel in PHP</title>
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<br />
			<div class="tabla responsive">
				<h2 align="center"> Export MySQL data to Excel in PHP</h2><br />
				<table class="table table-bordered">
					<tr>
						<th>"Edad"</th>	
						<th>"Nombre"</th>
						<th>"Apellido"</th>					
					</tr>
					<?php
						while($row=mysqli_fetch_array($result)){
							echo '
								<tr>

									<td>'.$row["dni"].'</td>
									<td>'.$row["nombre"].'</td>
									<td>'.$row["apellidos"].'</td>
									<td>'.$row["facultad"].'</td>
									<td>'.$row["telefono"].'</td>
									<td>'.$row["correo"].'</td>
									<td>'.$row["categoria"].'</td>
									<td>'.$row["regimen"].'</td>
								</tr>
							';
						}
					?>
				</table>
				<br />
				<form method="post" action="exportar.php">
  					<input type="submit" name="export" class="btn btn-success" value="Exportar">
				</form>
			</div>
		</div>
	</body>
</html>