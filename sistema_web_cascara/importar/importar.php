<?php
    session_start();
    $conexion = mysql_connect("localhost","root","");
    mysql_select_db("proyecto",$conexion);

    
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Soft Unicorn</title>
</head>

<body>
<div align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table width="90%" border="0">
  <tr>
    <td>
      <strong>Agregar Archivo de Excel [Productos]</strong>
      
      <input type="file" name="archivo" id="archivo">
      <strong>Desea Actualizar la BD</strong>
      <label><input type="radio" name="radio" value="s" checked />SI</label>
      <label><input type="radio" name="radio" value="n" />NO</label>
      
<input type="submit" name="button" class="btn" id="button" value="Actualizar Base de Datos">
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?php
  if(isset($_POST['radio'])){
    //subir la imagen del articulo
    $nameEXCEL = $_FILES['archivo']['name'];
    $tmpEXCEL = $_FILES['archivo']['tmp_name'];
    $extEXCEL = pathinfo($nameEXCEL);
    $urlnueva = "xls/listadocentes.xls";      
    if(is_uploaded_file($tmpEXCEL)){
      copy($tmpEXCEL,$urlnueva);  
      echo '<div align="center"><strong>Datos Actualizados con Exito</strong></div>';
    }
    
  }
?>
<table border="1" width="100%">
  <thead>
      <tr>
          <th><center><strong>A</strong></center></th>
            <th><center><strong>B</strong></center></th>
            <th><center><strong>C</strong></center></th>
            <th><center><strong>D</strong></center></th>
            <th><center><strong>E</strong></center></th>
            <th><center><strong>F</strong></center></th>
            <th><center><strong>G</strong></center></th>
            <th><center><strong>H</strong></center></th>
            <th><center><strong>I</strong></center></th>
        </tr>
      <tr>
          <th>DNI</th>
            <th>APELLIDOS</th>
            <th>NOMBRES</th>
            <th>FACULTAD</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>CATEGORIA</th>
            <th>REGIMEN</th>
            <th>CARGO</th>
        </tr>
  </thead>
    <tbody>
    <?php

    if(isset($_POST['radio'])){
      require_once 'IOFactory.php';
      
      $objPHPExcel = PHPExcel_IOFactory::load('xls/listadocentes.xls');
      $objHoja=$objPHPExcel->getActiveSheet()->toArray(true,true,true,true,true,true,true,true,true);
      foreach ($objHoja as $iIndice=>$objCelda) {
  
            echo '
              <tr>
                <td>'.$objCelda['A'].'</td>
                <td>'.$objCelda['B'].'</td>
                <td>'.$objCelda['C'].'</td>
                <td>'.$objCelda['D'].'</td>
                <td>'.$objCelda['E'].'</td>
                <td>'.$objCelda['F'].'</td>
                <td>'.$objCelda['G'].'</td>
                <td>'.$objCelda['H'].'</td>
                <td>'.$objCelda['I'].'</td>
              </tr>
            '; 
        $dni=$objCelda['A'];    
         $apellidos=$objCelda['B'];
        $nombre=$objCelda['C'];  $facultad=$objCelda['D'];
        $telefono=$objCelda['E']; $correo=$objCelda['F'];
        $categoria=$objCelda['G'];  $regimen=$objCelda['H'];
        //$cargo=$objCelda['G'];
                  
        if($_POST['radio']=='s'){
            $sql="INSERT INTO participantes
          (dni, apellidos, nombre, facultad, telefono, correo, categoria, regimen) 
            VALUES  ('$dni','$apellidos','$nombre','$facultad','$telefono','$correo','$categoria','$regimen')";
            mysql_query($sql);
        }
          }
      }
  ?>
    
    </tbody>
</table>
</div>
</body>
</html>