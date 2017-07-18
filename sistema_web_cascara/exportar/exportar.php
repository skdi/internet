<?php
  $tabla=$_POST['tabla'];
  $formato=$_POST['formato'];
  $connect=mysqli_connect("localhost","root","","proyecto");
  $output='';
  if(isset($_POST["export"])){
    $query="SELECT *FROM "."$tabla";
    $result=mysqli_query($connect,$query); 
    if (mysqli_num_rows($result)>0) {
      $output .= '
      <table class="table" bordered="1">
        <tr>
          <th>Edad</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Facultad</th>
          <th>Teléfono</th>
          <th>Correo</th>
          <th>Categoria</th>
          <th>Régimen</th>
          <th>Cargo</th>
        </tr>
      ';
      while($row=mysqli_fetch_array($result)){
        $output.='
          <tr>
            <td>'.$row["dni"].'</td>
            <td>'.$row["nombre"].'</td>
            <td>'.$row["apellidos"].'</td>
            <td>'.$row["facultad"].'</td>
            <td>'.$row["telefono"].'</td>
            <td>'.$row["correo"].'</td>
            <td>'.$row["categoria"].'</td>
            <td>'.$row["regimen"].'</td>
            <td>'.$row["cargo"].'</td>
          </tr>
        ';
      }
      $output .='</table>';
      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=download.xls');
      echo $output;
    }
    else{
      echo "<center><h4>No hay datos almacenados</h4></center>"
    }
  }
?>
