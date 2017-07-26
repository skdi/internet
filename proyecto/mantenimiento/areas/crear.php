<?php
session_start();

$flag=FALSE;



require_once("../../clases/conexion/conexion.php");
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
                                <a href="#"><span> IMPORTAR DATOS </span></a>
                            </li>
                            <li>
                                <a href="../../exportar"><span> EXPORTAR SELECCION</span></a>
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
          <form action="clases/crear.php" method="post">
            <div class="row" id="table_re">  <!--TABLA PARA LOS REGISTROS-->
                   <br>
                    <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <center><h1>INGRESAR NUEVA AREA</h1> </center>

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
                                    DATOS
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <div class="form-group row"> 
                                            <br>
                                            <div class="col-xs-9">
                                                <label for="dni">NOMBRE :</label>
                                                <input class="form-control" id="nombre" type="text" name="nombre" required>
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
                                <table class="table table-striped table-bordered table-hover table-condensed"> <!--TColumna 2 -->
                                <thead>
                                <tr>
                                    <br>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                     <div class="form-group row">
                                      <br>         
                                            <div class="col-sm-6 col-md-6">
                                                <input type="submit" class="btn btn-success" value="Crear Area">
                                            </form>
                                            </div>
                                          <div class="col-xs-12">
                                            <br>
                                                 
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <a href="../areas/" class="btn btn-danger ">
                                                <span class="fa fa-sign-out"></span> Volver
                                                </a>
                                            
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
            <br>

<?php

if($_SESSION['ejecuto']===TRUE)
    $flag=$_SESSION['ejecuto'];

if($flag)
{
    echo '<div class="alert alert-success" align="center"><strong>Area creada correctamente</strong></div>' ; 
}

if($_SESSION['error']===TRUE)
{
    echo '<div class="alert alert-danger" align="center"><strong>Area no creada</strong></div>' ;

}

$_SESSION['ejecuto']=FALSE;         
$_SESSION['error']=FALSE;  

?>
            </div> <!-- pagina contenido -->




            <!-- Fin del contenido de la pagina-->


        <!-- Fin de la envoltura-->

    </body>
</html>