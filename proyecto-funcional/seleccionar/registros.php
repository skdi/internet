<?php
session_start();
require_once("../clases/conexion/conexion.php");
require_once("class.php");
    if(empty($_GET['id']))
         $id_proceso=$_SESSION['id']; 
    else
    {
        $_SESSION['id']=$_GET['id'];
         $id_proceso=$_SESSION['id']; 
        
    }
    $con=$conexion;
    
    $sql ="SELECT * FROM proceso WHERE (id_proceso='".$id_proceso."')";
    $consulta = mysqli_query($con,$sql);
    if ($result=mysqli_fetch_array($consulta))
    {
        
        $nombre=$result['nombre'];
        $fecha=$result['fecha'];
    }
    $id_al='no';
    $bus='no';
    $cantidad='si';
    $cant=0;
    if(!empty($_GET['fu']))
    {
        $fu=$_GET['fu'];
    }

    if(!empty($_GET['id_al']))
    {
        $id_al='si';
    }

    if(!empty($_POST['bus_es'])){
        $busqueda=$_POST['bus_es'];
        $bus='si';
    }

    if(!empty($_POST['bus_par']) )
    {
        $cant=intval($_POST['bus_par']);
        $cantidad='si';
    }
    
    if(!empty($_POST['fu']))
    {
        $fu=$_POST['fu'];
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
                            <li>
                                <a href="../" ><span> INICIO </span></a>
                            </li>
                            <li>
                                <a href="../mantenimiento/" ><span> MANTENIMIENTO </span></a>
                            </li>
                            <li >
                                <a href="../visualizar/"><span> VISUALIZAR </span></a>
                            </li>
                            <li>
                                <a href="#"><span> PREGUNTAS </span></a>
                            </li>
                            <li class="activado" >
                                <a href="#"><span> ASIGNAR PERSONAL </span></a>
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
       
                        
                    </div>
                    <div class="col-sm-2">  </div>
                     <div class="col-sm-9" align="left">   
                            <h1>Proceso <?php echo $nombre; ?></h1>
                            <h2>Fecha : <?php echo $fecha; ?></h2>
                            <h3>Funcion: <?php echo $fu ;?></h3>
                    </div> 


                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">

              
            
            <div class="row" id="tabla_sel" >
                            
                    <div class="container">
                        <p><span class="fa fa-info-circle"></span>
                            Se muestran todos los datos de los participantes en la funcion de <?php echo $fu; ?> <span class="fa fa-keyboard-o"></span>
                        </p>
                </div>
            </div>
                
        
  
        <div class="row" id="tabla_a1">
            <div class="col-sm-12 col-md-12">
                <br>
                    <?php
                          if($id_al==='si')
                          {
                            $aleatorio=new Preguntas($id_proceso);
                            $registros=$aleatorio->aleatorio($id_proceso,$fu);
                          }
                          else if($bus==='si')
                          {
                              $bus=new Preguntas($id_proceso);
                              $registros=$bus->especifico($id_proceso,$fu,$busqueda);
                          }
                         else if($cantidad=='si')
                            {
                              $bus=new Preguntas($id_proceso);
                             $registros=$bus->parti($cant,$id_proceso,$fu);
                          }
  

                        ?>
                       <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>ESTADO</th>
                            <th>TIPO</th>   
                            <th>CARGO</th>   
                            <th>Gestionar</th>
                            </tr>
                        </thead>
                            <tbody>
                               <?php
                                 echo $registros;
                                ?>

                            </tbody>
                        </table>
                
                <?php


                ?>
            
            </div>
                
            </div>       
        </div>
                <div class="container" id="volver">     
                <br><br><br>
               <a href="pro_sel.php" class="btn btn-default btn-lg ">
               <span class="fa fv"></span> Regresar
                        </a>
                        </div> 
                 
        </div><!-- pagina contenido -->
          </div> 
  
                

            <!-- Fin del contenido de la pagina-->

        <!-- Fin de la envoltura-->
    </body>
</html>