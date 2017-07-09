
<html> 
<head>

    <meta charset="utf-8" />
    <title>Estado</title>
   
</head>

<body>
                        <?php
                        require_once("conect.php");
      
                            $peticion_usuario3 = mysqli_query($con,"SELECT * FROM docente ");
                            $fila_usuario3 = mysqli_fetch_array($peticion_usuario3);
                         
                          echo "<table>"; 
                        echo "<tr>";  
                       echo "<th>DNI</th>";  
                         echo "<th>Nombre</th>"; 
                        echo "<th>Apellido</th>";  
                        echo "</tr>";  
                      
                        while ($row = mysqli_fetch_row($peticion_usuario3)){   
                            echo "<tr>";  
                            echo "<td>$row[1]</td>"; 
                            echo "<td>$row[2]</td>"; 
                            echo "<td>$row[3]</td>";
                            echo "</tr>";  
                        }  
                        echo "</table>";  

                         ?>
           
 
   
</body>

</html>
