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
    $area='';
    $escuela='';
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

   if(!empty($_GET['escuela']))
    {
        $escuela=$_GET['escuela'];
    }
   if(!empty($_GET['area']))
    {
        $area=$_GET['area'];
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
                            <li class="activado" >
                                <a href="../visualizar"><span> VISUALIZAR </span></a>
                            </li>
                            <li>
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
                
                <div class="col-sm-3 col-md-3"> 
                 <div class="btn-group">
                        <button class="btn btn-danger " data-toggle="dropdown" id="boton">
                            	  Filtrar por Escuela <span class="caret"></span>
                        </button>
                                    <ul class="dropdown-menu" id="filtro">
                                        <?php
									       $query=mysqli_query($con,"SELECT * FROM escuela" );
									       while($d=mysqli_fetch_array($query)){
                                                    echo '<li><a href="seleccionado.php?escuela='.$d['id_escuela'].'&fu='.$fu.'">'.$d['nombre'].'</a></li>';	
                                            }
                                        ?>
                                <li class="divider"></li>
                                <li><a href="seleccionado.php?escuela=todos&fu=<?php echo $fu; ?>">Todas</a></li>
                            </ul>
                    </div> 
                </div>
            </div>
                
        
  
        <div class="row" id="tabla_a1">
            <div class="col-sm-12 col-md-12">
                <br>
                    <?php
                           $sql="SELECT area,nombre,dni,apellido,tipo_nombre,estado,veces_participo,participacion FROM proceso_participante inner join (SELECT * from participante ) as A ON proceso_participante.id_participante= A.id_participante and id_proceso='$id' and participacion='$fu'" ;
                         if($escuela<>"todos")
                          {
                            $sql="SELECT area,nombre,dni,apellido,tipo_nombre,estado,veces_participo,participacion FROM proceso_participante inner join (SELECT * from participante ) as A ON proceso_participante.id_participante= A.id_participante and id_proceso='$id' and participacion='$fu' and id_escuela='$escuela'" ;
                          }
                        if($escuela=="")
                        {
                            $sql="SELECT area,nombre,dni,apellido,tipo_nombre,estado,veces_participo,participacion FROM proceso_participante inner join (SELECT * from participante ) as A ON proceso_participante.id_participante= A.id_participante and id_proceso='$id' and participacion='$fu'" ;
                          
                        }
                          
                          
                          
                          
                        ?>
                       <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>ESTADO</th>
                            <th>AREA</th>
                            <th>TIPO</th>   
                            <th>VER</th>
                            </tr>
                        </thead>
                            <tbody>
                               <?php
                                 $query=mysqli_query($conexion,$sql);
                                 while($d=mysqli_fetch_array($query))
                                 {
                                     $o=$d['estado'];
                                     if($o<>'a')
                                        $esta="no activo";
                                    else{
                                        $esta="activo";
                                
                                }
                                echo '<tr><td>'.$d['dni'].'</td><td>'.$d['apellido'].'</td><td>'.$d['nombre'].'</td><td>'.$esta.'</td><td>'.$d['area'].'</td><td>'.$d['tipo_nombre'].'</td><td><a href="ver_perfil.php?dni='.$d['dni'].'" class="btn btn-info"><span class="fa fa-address-book"></span> Ver Perfil</a></td>';
                            }
                       
                       
                        ?>

                            </tbody>
                        </table>
                
                <?php
                        if(!mysqli_num_rows($query))
                        {
                        echo '<div class="alert alert-info" align="center"><strong>No hay participantes con el cargo de '.$fu.' registradas en este proceso</strong></div>' ;
                     
                        }

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