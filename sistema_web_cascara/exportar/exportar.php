<?php
  $proceso=$_POST["proceso"];
  $formato=$_POST["formato"];
  $connect=mysqli_connect("localhost","root","","proyecto");
  $output='';
  if(isset($_POST["export"])){
    $query="SELECT participante.dni, participante.nombre, participante.apellido FROM participante, proceso_participante WHERE participante.id_participante=proceso_participante.id_participante AND proceso_participante.id_proceso="."$proceso"; 
    //$query="SELECT *FROM "."$tabla";
    $result=mysqli_query($connect,$query); 
    if (mysqli_num_rows($result)>0) {
      $output .= '
      <table class="table" bordered="1">
        <tr>
          <th>Edad</th>
          <th>Nombre</th>
          <th>Apellido</th>
      ';
      while($row=mysqli_fetch_array($result)){
        $output.='
          <tr>
            <td>'.$row["dni"].'</td>
            <td>'.$row["nombre"].'</td>
            <td>'.$row["apellido"].'</td>
          </tr>
        ';
      }
      $output .='</table>';

      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=download.xls');
      echo $output;
    }
    else{
      echo "<center><h4>No hay datos almacenados</h4></center>";
    }
  }
?>

