<?php
session_start();

require_once("..\..\clases/conexion/conexion.php");
    $con=$conexion;


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
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

                    <a href="index.html" class="logo">MENU</a>
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


                    <div id="menu-barra" >
                        <ul>
                            <li>
                                <a href="index.html" ><span> INICIO </span></a>
                            </li>
                            <li class="activado" >
                                <a href="../" ><span> MANTENIMIENTO </span></a>
                            </li>
                            <li>
                                <a href="#"><span> CREAR PREGUNTA </span></a>
                            </li>
                            <li>
                                <a href="#"><span> SELECCIONAR PREGUNTAS</span></a>
                            </li>
                            <li>
                                <a href="#"><span> SELECCIONAR PROCESO </span></a>
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
            <!-- MENU IZQUIERDA -->


            <!-- CONTENIDO AQUI -->
        </div>
        <div class="pagina-contenido">
                <!-- Contenido -->
               
                <div class="contenido">

                </div><!-- contenedor -->
         <div class="container">
          <form action="" method="post">
            <div class="row" id="table_re">  <!--TABLA PARA LOS REGISTROS-->
                   <br>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <center><h1>INGRESAR NUEVO DOCENTE</h1> </center>

                    </tr>
                    </thead>
                    <tbody>
                        
                    <tr>
                     <th>
                         <div class="row">
                         
                            <div class="col-xs-6">  <!--tamañño 1 -->
                             
                                <div class="container">
                                <div class="table_re">
                                <table class="table table-striped"> <!--TColumna 1 -->
                                <thead>
                                <tr>
                                    <br>
                                    DATOS PERSONALES
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <div class="form-group row"> 
                                            <br>
                                            <div class="col-xs-9">
                                                <label for="ex2">DNI :</label>
                                                <input class="form-control" id="ex2" type="text">
                                            </div>
                                            <div class="col-xs-9">
                                                <label for="ex2">Apellidos :</label>
                                                <input class="form-control" id="ex2" type="text">
                                            </div>

                                            <div class="col-xs-9">
                                                <label for="ex3">Nombres :</label>
                                                <input class="form-control" id="ex2" type="text" >
                                            </div>
                                            <div class="col-xs-9">
                                                <label for="ex2">Telefono :</label>
                                                <input class="form-control" id="ex2" type="text">
                                            </div>
                                            <div class="col-xs-9">
                                            <label for="ex2">Correo :</label>
                                            <input class="form-control" id="ex2" type="text">
                                            </div>

                                  <div class="col-xs-12">
                                </div>
                              </div>
                            </th>
                                </tr>
                                </tbody>
                            
                            
                                </table>
                         
                                </div>
                                </div>
                        </div>
                         <div class="col-xs-6">  <!--tamañño 2 -->
                            <div class="container">
                                <div class="table_re">
                                <table class="table table-striped"> <!--TColumna 2 -->
                                <thead>
                                <tr>
                                    <br>
                                    DATOS CARGO
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                     <div class="form-group row">
                                      <br>
                                      <div class="col-xs-9">
                                        <label for="ex2">Dependencia :</label>
                                        <input class="form-control" id="ex2" type="text">
                                      </div>
                                      <div class="col-xs-9">
                                        <label for="sel1">Cargo :</label>
                                        <select class="form-control" id="sel1" name="tipo_participante">
                                         <?php
									       $query=mysqli_query($con,"SELECT * FROM tipo_participante WHERE tipo='admin' ");
									       while($d=mysqli_fetch_array($query)){
                                                    echo '<option value='.$d['cargo'].'>'.$d['cargo'].'</option>';
                                            }
                                          ?>
                                        
                                        </select>
                                      </div>
                                      <div class="col-xs-9">
                                       <label for="ex2">Categoria :</label>
                                       <input class="form-control" id="ex2" type="text">
                                      </div>
                                     <div class="col-xs-12">
                                     </div>
                                    </div>
                                  </th>
                                </tr>
                               </tbody>
                             </table>
                         
                            </div>
                             </div>
                            </div>
                         </div>
         
                    </tr>
                    
                </tbody>

                </table>


            </div>
            
            </div>
            </div> <!-- pagina contenido -->




            <!-- Fin del contenido de la pagina-->


        <!-- Fin de la envoltura-->
    </body>
</html>