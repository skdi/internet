<?php

include 'conectar.php';

class Exportar{
      public function exportar($tabla){
          $output='';
          $connect= new conectar();
          $exportData=$connect->pruebadb($tabla);
          //$connect=mysqli_connect("localhost","root","","internetdatabase");
          //$query="SELECT *FROM Docente";
          //$exportData=mysqli_query($connect,$query);

          if(mysqli_num_rows($exportData)>0){
            $output .= '
            <table class="table" bordered="1">
              <tr>
                <th>dni</th>
                <th>nombre</th>
                <th>Apellido</th>          
              </tr>
            ';
            while($row=mysqli_fetch_array($exportData)){
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
}
?>
