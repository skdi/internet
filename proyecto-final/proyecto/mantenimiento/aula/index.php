<?php
session_start();
require_once("../../clases/conexion/conexion.php");
    $_SESSION['id']="0";
$_SESSION['ejecuto']=FALSE;         
$_SESSION['error']=FALSE;
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
                    <div class="row">
                        
                   
                    <div class="col-sm-1">    
                    <div class="container">
                       <a href="../" class="btn btn-default btn-lg ">
                        <span class="fa fa-reply"></span> Volver
                        </a>
                        
                    </div>       
                        
                    </div>
                    <div class="col-sm-2">  </div>
                     <div class="col-sm-6" align="left">   
                            <h1>LISTADO DE AULAS</h1>
                    </div> 


                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">

              
            
            <div class="row" id="m_tabla" >
                            
                            
                    <div class="col-sm-3 col-md-3">
                                    <a href="crear.php" class="btn btn-success ">
                                        <span class="fa fa-plus"></span> Ingresar nueva Aula
                                            </a>
                                    
                    </div>
                    <div class="col-sm-1 col-md-1"></div>
                    <div class="col-sm-1 col md-1"></div>
                    <div class="col-sm-3 col-md-3"></div>
                   <div class="col-sm-3 col-md-3"> 
                    <div class="btn-group">
                        <button class="btn btn-primary " data-toggle="dropdown" id="boton">
                            	  Filtrar por año <span class="caret"></span>
                        </button>
                                    <ul class="dropdown-menu" id="filtro">
                                        <?php
									       $query=mysqli_query($con,"SELECT * FROM escuela" );
									       while($d=mysqli_fetch_array($query)){
                                                    echo '<li><a href="index.php?escuela='.$d['id_escuela'].'">'.$d['nombre'].'</a></li>';	
                                            }
                                        ?>
                                <li class="divider"></li>
                                <li><a href="index.php?escuela=todos">Todas</a></li>
                            </ul>
                        </div> 
                    </div>
        
        </div>
        <div class="row" id="tabla_ad">
                   <br>
            <div class="col-sm-12">
            <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>Escuela</th>
                        <th>Nro de aula</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                       if(empty($_GET['escuela']))
                       {
						  $sql="SELECT * FROM aula ";
					      //$sql2="SELECT *FROM escuela WHERE escuela.id_escuela=aula.id_escuela"; 
                       }else{
						      $bus=$_GET['escuela'];
                              $sql="select * from aula where id_escuela='$bus'";
					          //$sql2="SELECT *FROM escuela WHERE escuela.id_escuela=aula.id_escuela"; 
                       }

                       
                       $query=mysqli_query($con,$sql);
                        
                        while($d=mysqli_fetch_array($query))
                            {

                                $id_escuela=$d['id_escuela'];
                                $sql="select nombre from escuela where id_escuela=$id_escuela";
                                $query1=mysqli_query($con,$sql);

                                $dato=mysqli_fetch_array($query1);

                             echo '<tr><td>'.$dato['nombre'].'</td><td>'.$d['n_aula'].'</td><td><a href="actualizar.php?id='.$d['id_aula'].'" class="btn btn-primary"><span class="fa fa-edit "></span> Editar </a></td>
                             <td><a href="clases/eliminar.php?id='.$d['id_aula'].'" class="btn btn-danger"><span class="fa fa-trash "></span>Eliminar </a></td>';
                            }
                       
                       
                        ?>

                    
                </tbody>
                </table>
            </div>
                    
            

                <?php
                 if(!mysqli_num_rows($query))
                 {
                     echo '<div class="alert alert-info" align="center"><strong>No hay Aula Registradas</strong></div>' ;
                     
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