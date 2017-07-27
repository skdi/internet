<?php
	session_start();
  //si aun el usuario no ah iniciado secion redirecciona a login
	if (!isset($_SESSION["user"])) {
		header("location:login.php");
	}
		
	echo '<h1 align=center>Welcome :'.$_SESSION["user"].'</h1>';
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
        <link href="css/icons.css" rel="stylesheet" type="text/css">
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

                    <a href="index.html" class="logo">MENU</a>
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
                            <li class="activado" >
                                <a href="index.php" ><span> INICIO </span></a>
                            </li>
                            <li>
                                <a href="mantenimiento/" ><span> MANTENIMIENTO </span></a>
                            </li>
                            <li  >
                                <a href="visualizar/"><span> VISUALIZAR </span></a>
                            </li>
                            <li>
                                <a href="preguntas/"><span> REGISTRAR PREGUNTAS</span></a>
                            </li>
                            <li>
                                <a href="seleccionar/"><span> ASIGNAR PERSONAL </span></a>
                            </li>
                            <li>
                                <a href="historial/"><span> HISTORIAL GRAFICO</span></a>
                            </li>
                            <li>
                                 <a href="logout.php"><span> SALIR </span></a>
                            </li>

                        </ul>
                    </div>
                  
                    <div class="clearfix"></div>
                </div> <!-- MENU INTERIOR -->
            </div>
            <!-- MENU IZQUIERDA -->

            <!-- CONTENIDO AQUI -->

            <div class="pagina-contenido">
                <!-- Contenido -->
                <div class="contenido">

                    <div class="">
                        <div class="cabecera-titulo">
                          <center><img src="img/logo_unsayfacultad.png">  </center> 
                            <h2 class="titulo-pagina">SISTEMA SELECCION DE PERSONAL DE PROCESOS DE ADMISION</h2>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container">
                      
                        </div><!-- contenedor -->


                    </div> <!-- pagina contenido envoltura -->

                </div> <!-- contenido -->

                <footer class="footer">
                     © 2017 UNIVERSIDAD NACIONAL DE SAN AGUSTIN
                </footer>

            </div>
            <!-- Fin del contenido de la pagina-->

        </div>
        <!-- Fin de la envoltura-->
    </body>
</html>

<!--
<!DOCTYPE html>
<html lang="es">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/icons.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <title>PROCESO ADMISION</title>
</head>
<body>
  <div class="wrapper">
    <form action="validacion.php" class="form-signin" method="post" id="FormRegistro" >       
      <h2 class="form-signin-heading">INGRESAR</h2>
      <input type="text" class="form-control" name="usuario" placeholder="Direccion Correo o usuario" required="" autofocus="" />
      <input type="password" class="form-control" name="pass" placeholder="Contraseña" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>   
    </form>
  </div>
    
</body>
</html>-->