<?php
	# conectare la base de datos
	 					$con = @mysqli_connect('localhost', 'root', '');
                        if (!$con){
                         die('ERROR DE CONEXION CON MYSQL: ' . mysqli_connect_error());
                        }
                       /* CONECTA CON LA BASE DE DATOS  **************** */
                          $database = @mysqli_select_db($con,'proyecto');
                          if (!$database){
                          die('ERROR CONEXION CON LA BD: '. mysqli_connect_error());
                          }
                          
	$participantes = fopen ("products.csv" , "r" );//leo el archivo que contiene los datos del producto
while (($datos =fgetcsv($participantes,1000,";")) !== FALSE )//Leo linea por linea del archivo hasta un maximo de 1000 caracteres por linea leida usando coma(,) como delimitador
{//DNI	Apellidos	Nombres	Facultad	Telefono	Correo	Categoria	Regimen	Cargo

 $linea[]=array('dni'=>$datos[0],'apellidos'=>$datos[1],'nombre'=>$datos[2],'facultad'=>$datos[3],'telefono'=>$datos[4],
 'correo'=>$datos[5],'categoria'=>$datos[6],'regimen'=>$datos[7]);//Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
}
fclose ($participantes);//Cierra el archivo
 
	$ingresado=0;//Variable que almacenara los insert exitosos
	$error=0;//Variable que almacenara los errores en almacenamiento
	$duplicado=0;//Variable que almacenara los registros duplicados
	$i=0;   
    foreach($linea as $indice=>$value) //Iteracion el array para extraer cada uno de los valores almacenados en cada items
	{
	if($i != 0) {
		$dni=$value["dni"];//Codigo del producto
		$apellidos=$value["apellidos"];//descripcion del producto
		$nombre=$value["nombre"];//fabricante del producto
		$facultad=$value["facultad"];
		$telefono=$value["telefono"];//precio del producto
		$correo=$value["correo"];
		$categoria=$value["categoria"];
		$regimen=$value["regimen"];
	
	$sql=mysqli_query($con,"SELECT * FROM participante ");//Consulta a la tabla participantes
	$num=mysqli_num_rows($sql);//Cuenta el numero de registros devueltos por la consulta
		if ($num!=0)//Si es != 0 inserto
		{
		if ($insert=mysqli_query($con,"INSERT INTO participante (dni, apellidos, nombre,facultad, telefono ,correo, categoria, regimen) 
			VALUES('$dni','$apellidos','$nombre','$facultad','$telefono','$correo','$categoria','$regimen')"))
		{
		echo $msj='<font color=green>Producto <b>'."bien".'</b> Guardado</font><br/>';
		$ingresado+=1;
		}//fin del if que comprueba que se guarden los datos
		else//sino ingresa el producto
		{
		$error+=1;
		}
		}//fin de if que comprueba que no haya en registro duplicado
		else
		{
		$duplicado+=1;
		echo $duplicate='<font color=red>El Producto codigo <b>'.$dni.'</b> Esta duplicado<br></font>';
		}
	} $i++; }
	echo "<font color=green>".number_format($ingresado,2)." participantes Almacenados con exito<br/>";
	echo "<font color=red>".number_format($duplicado,2)." participantes Duplicados<br/>";
	echo "<font color=red>".number_format($error,2)." Errores de almacenamiento<br/>";
	?>