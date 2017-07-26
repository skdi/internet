<?php
session_start();
require_once("..\clases/conexion/conexion.php");
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
    $sql="select * from participante where(tipo_participacion='formulador')";
    $resultado=mysqli_query($con,$sql);
        
        
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
                            <li>
                                <a href="../visualizar"><span> VISUALIZAR </span></a>
                            </li>
                            <li class="activado" >
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
   

                    </div>
                   
                </div><!-- contenedor -->
             <div class="container">

            <div class="row" id="tabla_sel" >
                <form id="preguntas" action="siguiente.php" method="post">
                    <div class="container">
                       <h1 align="center">Formato Ingresar Pregunta</h1>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="curso">Curso:</label>
                                    <input type="text   " class="form-control" name="curso" id="curso" placeholder="Curso correspondiente">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Participante:</label>
                                    <select class="form-control" id="participante" name="participante" required>
                                    <?php
									       while($d=mysqli_fetch_array($resultado)){
                                             echo '<option value='.$d['id_participante'].'>'.$d['dni'].' - '.$d['apellido'].' '.$d['nombre'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="proceso">Proceso:</label>
                                    <input class="form-control" id="proceso"  value="<?php echo $nombre; ?>" type="text"  readonly>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="curso">Fecha:</label>
                                    <input class="form-control" id="apll"  value="<?php echo $fecha; ?>" type="text"  readonly>
                                </div>
                            </div>
                           
                        </div>
                            
                    </div>
                   
                <div class="col-xs-12"></div>
                <div class="col-xs-2"></div>
                    <div class="col-xs-9">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                          <thead>
                              <tr>
                                <td></td><td>Datos Generales</td>
                              </tr>
                              
                          </thead>
                          <tbody>
                             <tr>
                                <td>BALOTA</td><td><div class="form-group">
                                    <label for="curso">Titulo:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el titulo de la pregunta">
                                </div><div class="form-group">
                                    <label for="tema">Tema:</label>
                                    <input type="text" class="form-control" id="tema" name="tema" placeholder="Ingrese el Tema de la pregunta">
                                    <input type="hidden" class="form-control" id="proceso" name="proceso"  value="<?php echo $id; ?>">
                                </div></td>
                              </tr>

                        </tbody>
                        </table>
                    </div>
                <div class="col-xs-1"></div>
                <div class="col-xs-6">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                          <thead>
                              <tr>
                                <td><center><h4>Estado</h4></center></td>
                              </tr>
                              
                          </thead>
                          <tbody>
                            <td><center><label class="radio-inline"><input type="radio" value="e" name="estado">Elegido</label>
                                 <label class="radio-inline"><input type="radio" value="n" name="estado">No Elegido</label>
                        </tbody>
                        </table>
                </div>
                <div class="col-xs-6">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                          <thead>
                              <tr>
                                <td><center><h4>Area Destinado</h4></center></td>
                              </tr>
                              
                          </thead>
                          <tbody>
                            <td><center><label class="radio-inline"><input type="radio" value="Ingenierias" name="area">Ingenierias</label>
                                 <label class="radio-inline"><input type="radio" value="Biomedicas" name="area">Biomedicas</label>
                                <label class="radio-inline"><input type="radio" value="Sociales" name="area">Sociales</label></center></td>

                        </tbody>
                        </table>
                </div>
                
                <div class="col-xs-12"></div>
                
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                          <thead>
                              <tr>
                                <td><h4>Enunciado de la Propuesta:</h4></td>
                              </tr>
                              
                          </thead>
                          <tbody>
                            <td><textarea name="enunciado" class="form-control" rows="3"></textarea></td>

                        </tbody>
                        </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                          <thead>
                              <tr>
                                <td><h4>Distractores: </h4></td>
                              </tr>
                              
                          </thead>
                          <tbody>
                            <tr>
                            <td>Alternativa a</td><td><textarea name="a" class="form-control" rows="2"></textarea></td>
                            </tr>
                               <tr>
                            <td>Alternativa b</td><td><textarea name="b" class="form-control" rows="2"></textarea></td>
                            </tr>
                               <tr>
                            <td>Alternativa c</td><td><textarea name="c" class="form-control" rows="2"></textarea></td>
                            </tr>
                               <tr>
                            <td>Alternativa d</td><td><textarea name="d" class="form-control" rows="2"></textarea></td>
                            </tr>
                               <tr>
                            <td>Alternativa e</td><td><textarea name="e" class="form-control" rows="2"></textarea></td>
                            </tr>
                            

                        </tbody>
                        </table>
                </div>
                    <div class="col-xs-9"></div>
                    <div class="col-xs-3">
                    <input type="submit" class="btn btn-success" value="SIGUIENTE">
                    </div>
                </form>
            </div>
  
        </div><!-- pagina contenido -->
  
  
                

            <!-- Fin del contenido de la pagina-->

        <!-- Fin de la envoltura-->
    </body>
</html>