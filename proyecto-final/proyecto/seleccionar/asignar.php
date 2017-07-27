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

    if(!empty($_GET['fu']))
    {
        $fu=$_GET['fu'];
    }

    if(!empty($_GET['tipo_participante']))
    {
        $tipo=$_GET['tipo_participante'];
    }

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
                            <li>
                                <a href="../preguntas"><span> REGISTRAR PREGUNTAS</span></a>
                            </li>
                            <li class="activado">
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
                     <div class="col-sm-9" align="left">   
                            <h1>Proceso <?php echo $nombre; ?></h1>
                            <h2>Fecha : <?php echo $fecha; ?></h2>
                            <h3>Asignacion de participantes a la funcion: <?php echo $fu ;?></h3>
                           
                    </div> 


                    </div>
                   
                </div><!-- contenedor -->
        <div class="container">

              
            
            <div class="row" id="tabla_sel" >
                            
                    <div class="container">
                        
                    <div class="col-xs-6">
                      <div class="row">
                         <form name="form1" action="registros.php" method="post">    
                             <div class="col-xs-12">
                                  <h3><span class="glyphicon glyphicon-search"> </span> Buscar por N° de participaciones</h3>
                                  <input class="form-control"  id="par" type="number" name="bus_par" placeholder="N° participaciones" autocomplete="off" required>
                             </div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-sm-3">
                                 <input type="hidden"  name="fu" value="<?php echo $fu ?>">
                                 <input type="submit" class="btn btn-success" value="Buscar por participaciones">
                             </div>
                          </form>
                         </div>        
                    </div>
                      
                    <div class="col-xs-6">
                       <form name="form2" action="registros.php" method="post">
                            <div class="row">
                                 <div class="col-xs-12">
                                    <h3><span class="glyphicon glyphicon-search"> </span> Busqueda especifica</h3>
                                <input type="text" id="doc" class="form-control" name="bus_es" placeholder="Ingrese Nombre/Apellido/DNI" aria-describedby="basic-addon2" autocomplete="off" required>
                                  </div>
                                <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                              <div class="col-sm-3">
                                  <input type="hidden"  name="fu" value="<?php echo $fu ?>">
                                  <input type="submit" class="btn btn-danger" value="Buscar especificamente">
                              </div>
                            </div>   
                        </form>
                    </div>
                      <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"></div>
                             <div class="col-xs-12"><br></div>
                    
                    <div class="col-xs-12">
                        <h3><span class="glyphicon glyphicon-search"> </span> Busqueda Aleatoria </h3>
                    </div>
                        <div class="col-xs-4">
                    
                            <a href="registros.php?id_al=si&fu=<?php echo $fu ?>" class="btn btn-warning">Buscar Aleatoriamente</a>
                    </div>
                    </div>
            </div>

        </div>     
             <div class="container" id="volver">     
                <br><br><br>
                <a href="pro_sel.php" class="btn btn-default btn-lg ">
                <span class="fa fv"></span> Volver
                </a>
            </div> 
    </div>


            <!-- Fin del contenido de la pagina-->

        <!-- Fin de la envoltura-->
    </body>
</html>