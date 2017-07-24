<?php

session_start();
require("..\clases/conexion/conexion.php");
    $_SESSION['id']="0";
    $con=$conexion;

?>
<!-- SELECT * FROM `proceso` WHERE YEAR(fecha)= 2015 -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>SISTEMA DE PROCESOS DE ADMISION</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <li class="activado">
                                <a href="../preguntas/"><span> REGISTRAR PREGUNTAS</span></a>
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
       
                        
                    </div>
                    <div class="col-sm-3">  </div>
                     <div class="col-sm-6" align="left">   
                            <h1>PROCESOS DE ADMISION</h1>
                    </div> 


                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">

              
            
            <div class="row" id="m_tabla" >
                               
               
                <div class="col-sm-3 col-md-3"> 
                 <div class="btn-group">
                        <button class="btn btn-primary " data-toggle="dropdown" id="boton">
                            	  Filtrar por año <span class="caret"></span>
                        </button>
                                    <ul class="dropdown-menu" id="filtro">
                                        <?php
									       $query=mysqli_query($con,"SELECT DISTINCT YEAR(fecha) FROM proceso" );
									       while($d=mysqli_fetch_array($query)){
                                                    echo '<li><a href="index.php?fecha='.$d['YEAR(fecha)'].'">'.$d['YEAR(fecha)'].'</a></li>';	
                                            }
                                        ?>
                                <li class="divider"></li>
                                <li><a href="index.php?cargo=todos">Todas</a></li>
                            </ul>
                    </div> 
                </div>
                <div class="col-sm-9 col-md-9"> <p>Se muestran todos los procesos ,seleccione sobre cual desea asignar las preguntas</p> </div>

            </div>


  
       
                
        
       
        <div class="row" id="tabla_ad">
       
            <div class="col-sm-12 col-md-12">
                <br>
                    <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Accion</th>
                        
                    </thead>
                    <tbody>
                    <?php
                       if(empty($_GET['fecha'])){
                           
						      $sql="SELECT id_proceso,nombre,YEAR(fecha) FROM proceso ORDER BY fecha";
                           
					   }
				        
                      else
                        {
					       $bus=$_GET['fecha'];
					       if($bus<>"todas"){
						          $sql="SELECT id_proceso,nombre,YEAR(fecha) FROM `proceso` WHERE YEAR(fecha)='$bus' ";
					           }
                           else{
						          $sql="SELECTid_proceso,nombre,YEAR(fecha) FROM `proceso` ORDER BY fecha";
					           }
				        
                        }
                     $query=mysqli_query($con,$sql);


                        
                        while($d=mysqli_fetch_array($query))               
                             echo '<tr><td>'.$d['nombre'].'</td><td>'.$d['YEAR(fecha)'].'</td><td><a href="proceso.php?id='.$d['id_proceso'].'" class="btn btn-danger"><span class="fa fa-eye "></span> Asignar Preguntas</a></td>';
                            
                       
                       
                        ?>

                    
                </tbody>
                </table>
            

                <?php
                 if(!mysqli_num_rows($query))
                 {
                     echo '<div class="alert alert-info" align="center"><strong>NO NAY PROCESOS REGISTRADOS</strong></div>' ;
                     
                 }
                ?>
                </div>
            
 
        </div>
                
                

            <!-- Fin del contenido de la pagina-->
                </div>
                <div class="container" id="volver">     
                <br><br><br>
               <a href="../admin.html" class="btn btn-default btn-lg ">
               <span class="fa fa-reply"></span> Volver a Inicio
                        </a>
                        </div> 
        </div>

        
        <!-- Fin de la envoltura-->
    </body>
</html>