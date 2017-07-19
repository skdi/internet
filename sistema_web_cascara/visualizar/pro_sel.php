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
                            <li class="activado">
                                <a href="../visualizar/"><span> VISUALIZAR </span></a>
                            </li>
                            <li>
                                <a href="#"><span> PREGUNTAS </span></a>
                            </li>
                            <li>
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
                    <div class="container">     

                <div class="col-sm-12"align="left" ><a href="index.php" class="btn btn-danger"><span class="fa fa-reply"></span>Volver
                                                </a></div>   
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
                            Ingrese al participante que desea buscar en este proceso <span class="fa fa-keyboard-o"></span>
                        </p>

                        <div class="col-sm-9">
                          <form name="form1" method="POST" action="pro_sel.php">
                              <div class="input-group">
                                    <input type="text" class="form-control" name="doc" placeholder="Buscar por Nombres o Apellidos o DNI" aria-describedby="basic-addon2">
                                    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search"> Docente/Administrativo</span>
                              </div>
                            <br>              
                        </div>
                        <div class="col-sm-3 ">
                                                <input type="submit" class="btn btn-warning" value="Buscar">
                                                
                                                </a>
                                            
                            </div>
                        </form>         

                </div>
  
            </div>
                
        
  
        <div class="row" id="tabla_a1">
            <div class="col-sm-12 col-md-12">
                <br>
                    <?php
                       
                       if(empty($_POST['doc'])){
                           $dato=new Preguntas($id);
						    ?>
                                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>CARGO</th>
                            <th>Cantidad_Total</th>
                            
                            <th>VER</th>
                            </tr>
                        </thead>
                            <tbody>
                                 <tr>
                                    <th>Formuladores</th>
                                    <th><?php echo $dato->cantidad_partipacion('formulador') ; ?></th>
                                    <th><a href="seleccionado.php?fu=formulador" class="btn btn-success"><span class="fa fa-eye "></span> Seleccionar</a></th>
                                </tr> <tr>
                                    <th>Tecnicos</th>
                                    <th><?php echo $dato->cantidad_partipacion('tecnico') ; ?></th>

                                    <th><a href="seleccionado.php?fu=tecnico" class="btn btn-success"><span class="fa fa-eye "></span> Seleccionar</a></th>
                                </tr> <tr>
                                    <th>Controladores</th>
                                    <th><?php echo $dato->cantidad_partipacion('controlador') ; ?></th>

                                    <th><a href="seleccionado.php?fu=controlador" class="btn btn-success"><span class="fa fa-eye "></span> Seleccionar</a></th>
                                </tr> <tr>
                                    <th>Contadores</th>
                                    <th><?php echo $dato->cantidad_partipacion('contador') ; ?></th>

                                    <th><a href="seleccionado.php?fu=contador" class="btn btn-success"><span class="fa fa-eye "></span> Seleccionar</a></th>
                                </tr> <tr>
                                    <th>Conserjes</th>
                                    <th><?php echo $dato->cantidad_partipacion('conserje') ; ?></th>

                                    <th><a href="seleccionado.php?fu=conserje" class="btn btn-success"><span class="fa fa-eye "></span> Seleccionar</a></th>
                                </tr> <tr>
                                    <th>Porteros</th>
                                    <th><?php echo $dato->cantidad_partipacion('portero') ; ?></th>

                                    <th><a href="seleccionado.php?fu=portero" class="btn btn-success"><span class="fa fa-eye "></span> Seleccionar</a></th>
                                </tr> <tr>
                                    <th>Controlador Puerta</th>
                                    <th><?php echo $dato->cantidad_partipacion('controlador_puerta') ; ?></th>
                                    <th><a href="seleccionado.php?fu=controlador_puerta" class="btn btn-success"><span class="fa fa-eye "></span> Seleccionar</a></th>
                                </tr>
                            </tbody>
                        </table>
                    <?php
					   }
				        
                      else
                        {
                          $bus=$_POST['doc'];
                          $sql="SELECT nombre,dni,apellido,estado,veces_participo,participacion FROM proceso_participante inner join (SELECT * from participante where nombre LIKE '$bus%' or apellido LIKE '$bus%' or dni='$bus' ) as A ON proceso_participante.id_participante= A.id_participante and id_proceso='$id'";
                        ?>
                       <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>ESTADO</th>
                             
                            <th>Cargo Desempeñado</th>    
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
                                echo '<tr><td>'.$d['dni'].'</td><td>'.$d['apellido'].'</td><td>'.$d['nombre'].'</td><td>'.$esta.'</td><td>'.$d['participacion'].'</td>
                                <td><a href="ver_perfil.php?dni='.$d['dni'].'" class="btn btn-info"><span class="fa fa-address-book"></span> Ver Perfil</a></td>';
                            }
                       
                       
                        ?>

                            </tbody>
                        </table>
                
                
                <?php
                        if(!mysqli_num_rows($query))
                        {
                        echo '<div class="alert alert-info" align="center"><strong>La persona que busca no ha participado en este proceso o quizas o ingreso un dato incorrecto</strong></div>' ;
                     
                        }
                

                      }
                       
                        ?>
                
                
                   
            

                
            </div>
            
             
           

            </div>       
        </div>

          </div> 
  
                

            <!-- Fin del contenido de la pagina-->

        <!-- Fin de la envoltura-->
    </body>
</html>