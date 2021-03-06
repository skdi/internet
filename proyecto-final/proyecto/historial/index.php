<?php
session_start();
require_once("..\clases/conexion/conexion.php");
    $_SESSION['id']="0";
    $con=$conexion;


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
        <link href="css/style.css" rel="stylesheet" type="text/css">
        
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
                                <a href="   ../admin.html" ><span> INICIO </span></a>
                            </li>
                            <li  >
                                <a href="../mantenimiento" ><span> MANTENIMIENTO </span></a>
                            </li>
                            <li>
                                <a href="../visualizar"><span> VISUALIZAR </span></a>
                            </li>
                            <li>
                                <a href="../preguntas"><span> REGISTRAR PREGUNTAS</span></a>
                            </li>
                            <li>
                                <a href="../seleccionar"><span> ASIGNAR PERSONAL </span></a>
                            </li>
                            <li class="activado">
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
            <!-- MENU IZQUIERDA -->


            <!-- CONTENIDO AQUI -->
        </div>
            <!-- MENU IZQUIERDA -->


            <!-- CONTENIDO AQUI -->

            <div class="pagina-contenido">
                <!-- Contenido -->
               
                <div class="contenido">
                    <div class="row">
                        
                   
                    <div class="col-sm-1">    
                    <div class="container">
                       <a href="../admin.html" class="btn btn-default btn-lg ">
                        <span class="fa fa-reply"></span> Volver
                        </a>
                        
                    </div>       
                        
                    </div>
                    <div class="col-sm-2">  </div>
                     <div class="col-sm-6" align="left">   
                            <h1>PARTICIPANTES EN PROCESOS</h1>
                    </div> 


                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">

              
            
            <div class="row" id="m_tabla" >
                <div class="col-sm-12">
                <p><span class="fa fa-info-circle"></span>
                            Seleccion el participante del que desea ver el Grafico de su Historial <span class="fa fa-keyboard-o"></span>
                        </p>
                </div>
                
                    <div class="col-sm-3 col-md-3">
                             <div class="btn-group">
                                <button class="btn btn-primary " data-toggle="dropdown" id="boton">
                            	  Filtrar por cargo <span class="caret"></span>
                                </button>
                                    <ul class="dropdown-menu" id="filtro">
                                        <?php
									       $query=mysqli_query($con,"SELECT * FROM tipo_participacion ");
									       while($d=mysqli_fetch_array($query)){
                                                    echo '<li><a href="index.php?cargo='.$d['nombre'].'">'.$d['nombre'].'</a></li>';	
                                            }
                                        ?>
                                        <li class="divider"></li>
                                        <li><a href="index.php?cargo=todos">Todos</a></li>
                                    </ul>
                                </div> 
                            </div>
                 <div class="col-sm-1 col md-1"></div>
                 <div class="col-sm-3 col md-3"></div>
                    <div class="col-sm-4 col-md-4">
                            <form name="form1" method="post" action="index.php">
                              <div class="input-group">
                                    <input type="text" class="form-control" name= "busqueda" placeholder="Buscar por Nombres / Apellidos / DNI" aria-describedby="basic-addon2">
                                    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search"></span>
                              </div>
                               
                            </form> 
                           
                            </div>
                
        
        </div>
        <div class="row" id="tabla_ad">
                   <br>
                    <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>Dni</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Ver Grafico</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                       if(empty($_GET['cargo'])){
					   if(empty($_POST['busqueda']))
                       {
						  $sql="SELECT * FROM participante ORDER BY apellido ";
					   }else{
						      $bus=$_POST['busqueda'];
						      $sql="SELECT * FROM participante WHERE nombre LIKE '$bus%' or apellido LIKE '$bus%' or dni='$bus' ORDER BY apellido";
					       }
				        }
                        else
                        {
					       $bus=$_GET['cargo'];
					       if($bus<>"todos"){
						          $sql="SELECT * FROM participante WHERE tipo_participacion='$bus' ORDER BY apellido";
					           }
                           else{
						          $sql="SELECT * FROM participante ORDER BY apellido";
					           }
				        
                        }
                       
                       $query=mysqli_query($con,$sql) or die(mysqli_error());


                        
                        while($d=mysqli_fetch_array($query))
                            {
                                $o=$d['estado'];
                                if($o<>'a')
                                    $esta="no activo";
                                else{
                                    $esta="activo";
                                
                            }
                             echo '<tr><td>'.$d['dni'].'</td><td>'.$d['apellido'].'</td><td>'.$d['nombre'].'</td><td>'.$d['tipo_nombre'].'</td>
                             <td><a href="mostrar.php?id='.$d['id_participante'].'" class="btn btn-info"><span class="fa fa-address-book"></span> Detalle </a></td>';
                            }
                       
                       
                        ?>

                    
                </tbody>
                </table>
            

                <?php
                 if(!mysqli_num_rows($query))
                 {
                     echo '<div class="alert alert-info" align="center"><strong>No hay Administrativos Registrados</strong></div>' ;
                     
                 }
                ?>
                </div>

            </div>
                

             
                    <!-- pagina contenido -->

        </div> 



            <!-- Fin del contenido de la pagina-->


        <!-- Fin de la envoltura-->
    </body>
</html>