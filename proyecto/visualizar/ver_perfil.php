<?php
session_start();

require_once("../clases/conexion/conexion.php");
require_once("class.php");
if(empty($_GET['id']))
         $id=$_SESSION['id']; 
    else
    {
        $_SESSION['id']=$_GET['id'];
         $id=$_SESSION['id']; 
        
    }
if(empty($_GET['dni']))
{
    header("location:pro_sel.php");
}
else
    $dni=$_GET['dni'];
    $con=$conexion;
    
    $sql ="SELECT * FROM proceso WHERE (id_proceso='".$id."')";
    $consulta = mysqli_query($con,$sql);
    if ($result=mysqli_fetch_array($consulta))
    {
        
        $nombre_p=$result['nombre'];
        $fecha=$result['fecha'];
    }

    $sql ="SELECT * FROM participante WHERE (dni='".$dni."')";
    $consulta = mysqli_query($con,$sql);
    if ($result=mysqli_fetch_array($consulta))
    {
        $id_participante=$result['id_participante'];
        $nombre=$result['nombre'];
        $apellido=$result['apellido'];
        $correo=$result['correo'];
        $estado=$result['estado'];
        if($estado==='a')
        {
            $estado="activo";
        }
        else
        {
            $estado="inactivo";
        }

    }
        
    $sql="select COUNT(*) from proceso_participante where proceso_participante.id_participante='$id_participante'";
    $consulta =mysqli_query($con,$sql);
    if($result=mysqli_fetch_array($consulta))
        $asistencia = $result['COUNT(*)'] ;

    $sql="select area,id_aula,id_escuela,participacion from proceso_participante where proceso_participante.id_participante='$id_participante' and proceso_participante.id_proceso='$id'";

    $consulta =mysqli_query( $con, $sql );
    
    if($result=mysqli_fetch_array($consulta))
    {
        $fu = $result['participacion'] ;
        $id_escuela = $result['id_escuela'] ;
        $id_aula = $result['id_aula'] ;
        $area = $result['area'] ;
        
    }
    $consulta=new Preguntas($id);
    $nombre_escuela=$consulta->nombre_escuela($id_escuela);
    $aula=$consulta->aula($id_aula);
    
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
        <script src="js/Chart.js"> </script>
        
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


            <div class="pagina-contenido">
                <!-- Contenido -->
               
                 <div class="contenido">
                    <div class="row">
                        
                   
                    <div class="col-sm-1">    
       
                        
                    </div>
                    <div class="col-sm-2">  </div>
                     <div class="col-sm-9" align="left">   
                            <h1>Proceso <?php echo $nombre_p; ?></h1>
                            <h2>Fecha : <?php echo $fecha; ?></h2>
                            
                    </div> 


                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">
              
            
            <div class="row" id="tabla_detalle" >
                            
                            
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-sm-3-col-md-3"><h1>Perfil de:  <?php  echo "<strong>$nombre $apellido</strong>";?> </h1></div>           
                <div class="col-sm-4 col-md-4"></div>

        
        </div>
        <?php
        
                 
                 
        ?>
        <form action="mostrar.php"  method="post" >
        <div class="row" id="detalle">
            <input type="hidden" name="id_par" value="<?php echo $id_participante ?>" />
            <input type="hidden" name="id_pro" value="<?php echo $id ?>" />
            <div class="col-sm-12">
                    <div class="form-group row"> 
                    <div class="col-xs-6">
                        <h3>Datos Personales</h3>
                     </div>
                    <div class="col-xs-6">
                        <h3>Datos del Proceso en que se Desempeño</h3>
                    </div> 
                    <div class="col-xs-3">
                        <label for="apll">Dni:</label>
                        <input class="form-control" id="apll"  value="<?php echo $dni; ?>" name="dni" type="text" required readonly>
                    </div> 
                    
                     
                    <div class="col-xs-3">
                        <label for="apll">Estado</label>
                        <input class="form-control" id="apll"  value="<?php echo $estado; ?>" name="apll" type="text" required readonly>
                    </div>
                    
                    <div class="col-xs-3">
                        <label for="nom">Funcion que desempeño</label>
                        <input class="form-control" id="nom" value="<?php echo $fu ;?>" name="nom" type="text" required readonly>
                    </div>
                      
                  <div class="col-xs-3">
                        <label for="correo">Area en que se Desempeño :</label>
                         <input class="form-control" id="correo" value="<?php echo $area; ?>" name="correo" type="text" required readonly>
                   </div> 
                   
                    
                    <div class="col-xs-3">
                        <label for="telf">Correo:</label>
                        <input class="form-control" id="telf" value="<?php echo $correo; ?>" name="telf" type="text" readonly>
                    </div>
                    
                    <div class="col-xs-3">
                        <label for="correo">Cantidad de Procesos asistidos :</label>
                        <input class="form-control" id="correo" value="<?php echo $asistencia; ?>" name="correo" type="text" required readonly>
                    </div> 
                    <?php 
                        if($fu==='Controlador' or $fu==='Tecnico' or $fu==='Conserje' or $fu==='Controlador_puerta')
                        { ?> 
                        <div class="col-xs-3">
                                <label for="correo">Escuela en que se Desempeño :</label>
                                <input class="form-control" id="correo" value="<?php echo $nombre_escuela; ?>" name="correo" type="text" required readonly>
                        </div>
                    <?php }
                        if($fu==="Controlador" or $fu==="Tecnico" )
                        { ?>  
                        <div class="col-xs-3">
                                <label for="correo">N°Aula en que se Desempeño:</label>
                                    <input class="form-control" id="correo" value="<?php echo  $aula; ?>" name="correo" type="text" required readonly>
                        </div> 
                    <?php }?>       

                                  <div class="col-xs-12">
                                </div>
                    </div>
                  
            </div>

            <div class="col-sm-6">
             <p></p>
            </div> <div class="col-sm-6">
             <p></p>
            </div> 
 
        </div>
        </form>
                 
                
        </div>
        <div class="container" id="volver">     
        <br><br><br>
               <a href="pro_sel.php" class="btn btn-default btn-lg ">
               <span class="fa fa-reply"></span> Regresar
                        </a>
                        </div> 
                 
        </div><!-- pagina contenido -->
        </div> 

            <!-- Fin del contenido de la pagina-->

        <!-- Fin de la envoltura-->

    </body>
</html>