
<?php
session_start();
require_once("..\clases/conexion/conexion.php");
if(empty($_GET['id']))
         $id=$_SESSION['id']; 
    else
    {
        $_SESSION['id']=$_GET['id'];
         $id=$_SESSION['id']; 
        
    }

$curso=$_POST['curso'];
$participante= $_POST['participante'];
$titulo=$_POST['titulo'];
$tema=$_POST['tema'];
$proceso=$_POST['proceso'];
$area=$_POST['area'];
$enunciado=$_POST['enunciado'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
if($_FILES['img_pre']['size']>0)
{
    $img_pre=addslashes(file_get_contents($_FILES['img_pre']['tmp_name']));
}
$nombre_pre=$_POST['nombre_pre'];   
$estado=$_POST['estado'];
$con=$conexion;
$sql ="SELECT * FROM proceso WHERE (id_proceso='".$id."')";
$consulta = mysqli_query($con,$sql);
if ($result=mysqli_fetch_array($consulta))
 {
        
  $nombre=$result['nombre'];
  $fecha=$result['fecha'];
}
$sql="select * from participante where(tipo_participacion='formulador')";
$resultado=mysqli_query($con,$sql);
        
        
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>SISTEMA DE PROCESOS DE ADMISION</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- COMIENZO DE PAGINA -->
        <div id="envoltura">

            <!-- COMIENZO DE BARRA TOP -->
            <div class="barra-top">
                <!-- LOGO -->
                <div class="barra-top-izquierda">

                    <a href="../admin.html" class="logo">MENU</a>
                </div>
                
                
            </div>
            <!-- Barra top fin -->


            <!-- ========== MENU Izquierda ========== -->

            <div class="izq menu-lateral">
                <div class="menu-dentro slimscrollleft">

                   
                    <div class="detalles-usuario">
                        <div class="text-center">
                            <img src="../img/admin.jpg" alt="" class="img-circle">
                        </div>
                        <div class="info-usuario">  
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ADMINISTRADOR <span class="glyphicon glyphicon-menu-down"></span></a>
                               
                                <ul class="dropdown-menu">
                                    <li><a href=""> Perfil</a></li>
                                    <li><a href=""> Configuracion   </a></li>
                                    <li class="divider"></li>
                                    <li><a href=""> Cerrar Sesion</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                    <!--- DIVISOR -->

                   <div id="menu-barra">
                        <ul>
                            <li >
                                <a href="../admin.html" ><span> INICIO </span></a>
                            </li>
                            <li>
                                <a href="../mantenimiento" ><span> MANTENIMIENTO </span></a>
                            </li>
                            <li>
                                <a href="../visualizar"><span> VISUALIZAR </span></a>
                            </li>
                            <li class="activado" >
                                <a href="../preguntas"><span> REGISTRAR PREGUNTAS</span></a>
                            </li>
                            <li>
                                <a href="../seleccionar"><span> ASIGNAR PERSONAL </span></a>
                            </li>
                            <li>
                                <a href="../historial"><span> HISTORIAL GRAFICO</span></a>
                            </li>
                            <li>
                                  <a href="../"><span> SALIR </span></a>
                            </li>

                        </ul>
                    </div>
                  
                    <div class="clearfix"></div>
                </div> <!-- MENU INTERIOR -->
            </div>
        </div>
            <!-- MENU IZQUIERDA -->

            <!-- CONTENIDO AQUI -->

            <div class="pagina-contenido">
                <!-- Contenido -->
                
                 <div class="contenido">
                    <div class="row">
                        
                   
                    <div class="col-sm-1">    
       
                        
                    </div>
                    <div class="col-sm-2">  </div>

                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">

            <div class="row" id="tabla_sel" >
                <form id="preguntas" action="guardar.php" method="post">
                   <input type="hidden"  name="curso" value="<?php echo $curso ?>">
                   <input type="hidden"  name="participante" value="<?php echo $participante ?>">
                   <input type="hidden"  name="titulo" value="<?php echo $titulo ?>">
                   <input type="hidden"  name="tema" value="<?php echo $tema ?>">
                   <input type="hidden"  name="proceso" value="<?php echo $proceso ?>">
                   <input type="hidden"  name="area" value="<?php echo $area ?>">
                   <input type="hidden"  name="enunciado" value="<?php echo $enunciado ?>">
                   <input type="hidden"  name="a" value="<?php echo $a ?>">
                   <input type="hidden"  name="b" value="<?php echo $b ?>">
                   <input type="hidden"  name="c" value="<?php echo $c ?>">
                   <input type="hidden"  name="d" value="<?php echo $d ?>">
                   <input type="hidden"  name="e" value="<?php echo $e ?>">
                   <input type="hidden"  name="nombre_pre" value="<?php echo $nombre_pre ?>">
                   <input type="hidden"  name="img_pre" value="<?php echo $img_pre ?>">
                   <input type="hidden"  name="estado" value="<?php echo $estado ?>">

                    <div class="container">
                       <h1 align="center">Formato Resoluciones</h1>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="curso">PREGUNTA:</label>
                                    <textarea name="sustento" class="form-control" rows="3" readonly><?php echo $enunciado;?></textarea>

                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label for="proceso">Alternativa Correcta:</label>
                                     <select class="form-control" id="alternativa" name="alternativa" required>
                                    <option value='a'>a</option>
                                    <option value='b'>b</option>
                                    <option value='c'>c</option>
                                    <option value='d'>d</option>
                                    <option value='e'>e</option>
            
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Sustento:</label>
                                    <textarea name="sustento" class="form-control" rows="6"></textarea>
                                </div>
                            </div>
                            
                            
                           
                        </div>
                        </div>
                    
                    <div class="col-xs-3">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                </form>    
                    </div>
                   
                
                
            </div>
  
        </div><!-- pagina contenido -->
  
        </div>
                

            <!-- Fin del contenido de la pagina-->

        <!-- Fin de la envoltura-->
    </body>
</html>