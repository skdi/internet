<?php
  $connect=mysqli_connect("localhost","root","","proyecto");
  $output='';
  if(isset($_POST["export"])){
    $query="SELECT *FROM Docente";
    $result=mysqli_query($connect,$query); 
    if (mysqli_num_rows($result)>0) {
      $output .= '
      <table class="table" bordered="1">
        <tr>
          <th>Edad</th>
          <th>Nombre</th>
          <th>Apellido</th>          
        </tr>
      ';
      while($row=mysqli_fetch_array($result)){
        $output.='
          <tr>
            <td>'.$row["dni"].'</td>
            <td>'.$row["nombre"].'</td>
            <td>'.$row["Apellido"].'</td>
          </tr>
        ';
      }
      $output .='</table>';
      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=download.xls');
      echo $output;
    }
  }
?>