<?php
    $_SESSION['error']=FALSE;
    $_SESSION['ejecuto']=FALSE;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>SISTEMA DE PROCESOS DE ADMISION</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link href="../css/style.css" rel="stylesheet" type="text/css">
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
                            <img src="img/admin.jpg" alt="" class="img-circle">
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
                            <li class="activado" >
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
                            <li>
                                <a href="../historial"><span> HISTORIAL GRAFICO </span></a>
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
                    <div class="container">
                    <center> <h1 class="titulo-pagina">MANTENIMIENTO</h1> </center>
                    </div>
                    
                    <br>
                    <div class="container">
                        <div class="row" id="m_tabla">

                            <div class="col-sm-4 col-md-4">
                                    <a href="procesos/" class="thumbnail">
                                        <center><h3>PROCESOS</h3></center>
                                        <img src="img/estudiantes.jpg" alt="..." class="img-rounded">
                                        
                                    </a>
                                </div>
                            <div class="col-sm-4 col-md-4">
                                    <a href="administrativos/" class="thumbnail">
                                        <center><h3>ADMINISTRATIVOS</h3></center>
                                        <img src="img/administrativo.jpg" alt="..." class="img-rounded">
                                        
                                    </a>
                                </div><div class="col-sm-4 col-md-4">
                                    <a href="docentes/" class="thumbnail">
                                        <center><h3>DOCENTES</h3></center>
                                        <img src="img/docente1.jpg" alt="..." class="img-rounded">
                                        
                                    </a>
                                </div>
                            <div class="col-sm-12 col-md-12"></div>
                            
                         <div class="col-sm-4 col-md-4">
                                    <a href="areas/" class="thumbnail">
                                        <center><h3>AREAS</h3></center>
                                        <img src="img/area.jpeg" alt="..." class="img-rounded">
                                        
                                    </a>
                                </div>
                            <div class="col-sm-4 col-md-4">
                                    <a href="escuelas/" class="thumbnail">
                                        <center><h3>ESCUELAS</h3></center>
                                        <img src="img/escuelas.jpg" alt="..." class="img-rounded">
                                        
                                    </a>
                                </div><div class="col-sm-4 col-md-4">
                                    <a href="aula/" class="thumbnail">
                                        <center><h3>AULAS</h3></center>
                                        <img src="img/aula.jpeg" alt="..." class="img-rounded">
                                        
                                    </a>
                                </div>

                        </div>
                    
                    
                    </div>


                

            </div>
                
                <div class="container">

                       <a href="../admin.html" class="btn btn-default btn-lg ">
                        <span class="fa fa-reply"></span> Volver a Inicio
                        </a>
                        </div> 
                 
                        
                    </div>       
            <!-- Fin del contenido de la pagina-->

        </div>
        <!-- Fin de la envoltura-->
    </body>
</html>