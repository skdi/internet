                        <?php
						$nombre = $_POST['nombre'];
						$apellido = $_POST['apellido'];

                        require_once("conect.php");
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
           
