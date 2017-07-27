<?php
session_start();

require_once("..\..\clases/conexion/conexion.php");
    $con=$conexion;
    $id=$_GET['id'];
    $sql ="SELECT nombre,nombre_area from escuela WHERE (id_escuela='".$id."')";
    $consulta = mysqli_query($con,$sql);
    if ($result=mysqli_fetch_array($consulta))
    {

        $nombre=$result['nombre'];
        $nombre_area=$result['nombre_area'];
    }

    $sql= "SELECT * from escuela WHERE (id_escuela='".$id."')";
    $consulta = mysqli_query($con,$sql);

    if($resultado=mysqli_fetch_array($consulta))
    {
           $flag=TRUE;
            $categoria=$resultado['categoria'];
            $facultad=$resultado['facultad'];
            $regimen=$resultado['regimen'];


    }
    else
        $flag=FALSE;


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        
    </head>


    <body class="fixed-left">

              <!-- COMIENZO DE PAGINA -->
        <div id="envoltura">

            <!-- COMIENZO DE BARRA TOP -->
            <div class="barra-top">
                <!-- LOGO -->
                <div class="barra-top-izquierda">

                    <a href="../../admin.html" class="logo">MENU</a>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ADMINISTRADOR</a>
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
                                <a href="../../admin.html" ><span> INICIO </span></a>
                            </li>
                            <li class="activado" >
                                <a href="../../mantenimiento" ><span> MANTENIMIENTO </span></a>
                            </li>
                            <li>
                                <a href="../../visualizar"><span> VISUALIZAR </span></a>
                            </li>
                            <li>
                                <a href="../../preguntas"><span> REGISTRAR PREGUNTAS</span></a>
                            </li>
                            <li>
                                <a href="../../seleccionar"><span> ASIGNAR PERSONAL </span></a>
                            </li>
                            <li>
                                <a href="../../historial"><span> HISTORIAL GRAFICO</span></a>
                            </li>
                            <li>
                                <a href="../../"><span> SALIR </span></a>
                            </li>

                        </ul>
                    </div>
                    
                    <div class="clearfix"></div>
                </div> <!-- MENU INTERIOR -->
            </div>
            <!-- MENU IZQUIERDA -->


            <!-- CONTENIDO AQUI -->
        </div>
            <!-- MENU IZQUIERDA -->


            <!-- CONTENIDO AQUI -->

            <div class="pagina-contenido">
                <!-- Contenido -->
               
                <div class="contenido">
                      
    
                </div><!-- contenedor -->
             <div class="container">
              
            
            <div class="row" id="tabla_detalle" >
                            
                            
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-sm-3-col-md-3"><h1>Detalle de <?php  echo "<strong>$nombre $nombre_area</strong>";?> </h1></div>           
                <div class="col-sm-4 col-md-4"></div>

        
        </div>
                 
        <div class="row" id="detalle">
                   <br>
         <?php if($flag)
                {?>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
            <tr>
            
                <th>Campo</th>
                <th>Dato</th>
            </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <th scope="row">FACULTAD</th>
                     <td><?php echo $facultad ;?></td>

                    </tr>
                    <tr>
                    <th scope="row">CATEGORIA</th>
                     <td><?php echo $categoria; ?></td>

                    </tr>
                    <tr>
                    <th scope="row">REGIMEN</th>
                     <td><?php echo $regimen; ?></td>

                    </tr>
                    </tbody>
                    </table>
            <?php }
            else 
                echo '<div class="alert alert-danger" align="center"><strong>No Tiene detalle</strong></div>' ;
            ?>
            <div class="container">     

                <div class="col-sm-12"align="left" ><a href="../docentes/" class="btn btn-danger ">
                                                <span class="fa fa-sign-out"></span> Volver
                                                </a></div>   
            </div>
            <br>
            </div>

            </div> <!-- pagina contenido -->
        </div> 
              


            <!-- Fin del contenido de la pagina-->


        <!-- Fin de la envoltura-->
    </body>
</html>