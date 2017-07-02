
<html> 
<head>

    <meta charset="utf-8" />
    <title>Estado</title>
   
</head>

<body>
                        <?php
						$nombre = $_POST['nombre'];
						$apellido = $_POST['apellido'];

                        $con = @mysqli_connect('localhost', 'root', '');
                        if (!$con){
                         die('ERROR DE CONEXION CON MYSQL: ' . mysqli_connect_error());
                        }
                       /* CONECTA CON LA BASE DE DATOS  **************** */
                          $database = @mysqli_select_db($con,'internetdatabase');
                          if (!$database){
                          die('ERROR CONEXION CON LA BD: '. mysqli_connect_error());
                          }
      
                            $peticion_usuario = mysqli_query($con,"SELECT * FROM docente WHERE nombre='$nombre' ");
                            //$fila_usuario= mysqli_fetch_array($peticion_usuario);
                         
                        echo "<table>"; 
                        echo "<tr>";  
                        echo "<th>DNI</th>";  
                        echo "<th>Nombre</th>"; 
                        echo "<th>Pass</th>";  
                        echo "</tr>";  

                        $row = mysqli_fetch_row($peticion_usuario); 
                            echo "<tr>";  
                            echo "<td>$row[1]</td>"; 
                            echo "<td>$row[2]</td>"; 
                            echo "<td>$row[3]</td>";
                            echo "</tr>";   
                        echo "</table>";  

                         ?>
           
 
   
</body>

</html>
