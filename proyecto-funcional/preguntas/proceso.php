<?php
session_start();
require_once("..\clases/conexion/conexion.php");
require_once("class.php");
    if(empty($_GET['id']))
         $id=$_SESSION['id']; 
    else
    {
        $_SESSION['id']=$_GET['id'];
         $id=$_SESSION['id']; 
        
    }
    $con=$conexion;
    
    $sql ="SELECT * FROM proceso WHERE (id_proceso='".$id."')";
    $consulta = mysqli_query($con,$sql);
    if ($result=mysqli_fetch_array($consulta))
    {
        
        $nombre=$result['nombre'];
        $fecha=$result['fecha'];
    }
    $query = "SELECT nombre FROM area ORDER BY nombre";
	$resultado=mysqli_query($con,$query);

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
                                    <li><a href=""> Configuracion  </a></li>
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
                            <li class="activado">
                                <a href="../prepreguntas"><span> REGISTRAR PREGUNTAS</span></a>
                            </li>
                            <li>
                                <a href="../seleccionar"><span> ASIGNAR PERSONAL </span></a>
                            </li>
                            <li>
                                <a href="#"><span> IMPORTAR DATOS </span></a>
                            </li>
                            <li>
                                <a href="#"><span> EXPORTAR SELECCION</span></a>
                            </li>
                            <li>
                                <a href="#"><span> SALIR </span></a>
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
                    <div class="container">     

                <div class="col-sm-12"align="left" >
                        <a href="index.php" class="btn btn-danger"><span class="fa fa-reply"></span>Volver</a>
                        </div>   
            </div>
                        
                    </div>
                    <div class="col-sm-2">  </div>
                     <div class="col-sm-9" align="left">   
                            <h1>Proceso <?php echo $nombre; ?></h1>
                            <h2>Fecha : <?php echo $fecha; ?></h2>
                    </div> 


                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">

              
            
            <div class="row" id="tabla_sel" >
                       <div class="container">
                        <p><span class="fa fa-info-circle"></span>
                            Se muestra la lista de todas las preguntas pertenecientes al Proceso <?php echo $nombre ?> puedes filtrarlas de acuerdo a su area,y estado 
                            <span class="fa fa-keyboard-o"></span>
                        </p>
                        <div class="col-sm-6">
                            <a href="crear_p.php" class="btn btn-success ">
                                        <span class="fa fa-plus"></span> INGRESAR NUEVA PREGUNTA
                            </a>
                        </div>   
                        <div class="col-sm-6">
                         <div class="row">
                            <form name="form1" method="POST" action="pro_sel.php">
                              <div class="col-sm-12">
                                    <label>Area:</label>
                                    <select class="form-control" id="area" name="area" required>
                                    <option value='0'>Todas</option>
                                    <?php
									       while($d=mysqli_fetch_array($resultado)){
                                                    echo '<option value='.$d['nombre'].'>'.$d['nombre'].'</option>';
                                            }
                                        ?>
                                    </select>
                              </div>
                                        

                                  
                              <div class="col-sm-9">
                                  <br>
                                 <label class="radio-inline"><input type="radio" name="estado">Activos</label>
                                 <label class="radio-inline"><input type="radio" name="estado">Inactivas</label>
                                <label class="radio-inline"><input type="radio" name="estado">Ambas</label> 
                            </div>
                                  
                            <div class="col-sm-3 ">
                                <br>
                                <input type="submit" class="btn btn-warning" value="Buscar">
                            </div>
                        </form>         
                            
                        </div>

                        </div>
                        
                          

                </div>
            </div>
                
        
  
        <div class="row" id="tabla_a1">
            <div class="col-sm-12 col-md-12">
                <br>
                      
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                            <th>CARGO</th>
                            <th>Cantidad_Total</th>
                            <th>Acciones</th>
                            <th>VER</th>
                            
                            </tr>
                        </thead>
                            <tbody>
                                 
                            </tbody>
                        </table>
                  
					

                
                
                   
            

                
            </div>
            
             
           

            </div>       
        </div>

          </div> 
  
                

            <!-- Fin del contenido de la pagina-->

        <!-- Fin de la envoltura-->
    </body>
</html>