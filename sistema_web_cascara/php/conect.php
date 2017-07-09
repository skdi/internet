 <?php                       
 						$con = @mysqli_connect('localhost', 'root', '');
                        if (!$con){
                         die('ERROR DE CONEXION CON MYSQL: ' . mysqli_connect_error());
                        }
                       /* CONECTA CON LA BASE DE DATOS  **************** */
                          $database = @mysqli_select_db($con,'internetdatabase');
                          if (!$database){
                          die('ERROR CONEXION CON LA BD: '. mysqli_connect_error());
                          }
                          ?>
