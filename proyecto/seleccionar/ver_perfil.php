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
    $area='Seleccion Area';
    $escuela='';
    $aula='';
    $nombre_escuela='Seleccion Escuela';
    $mostrar_escuela='no';
    $nombre_aula='Seleccion Aula';

    if(!empty($_GET['id_personal']))
        $id_participante=$_GET['id_personal'];

    if(!empty($_GET['fu']))
       $fu=$_GET['fu'];
    $con=$conexion;
    // PARA EL SELECT DINAMICO
    if(!empty($_POST['area']))
       {
           $area=$_POST['area'];
           $mostrar_es='si';
       }
    if(!empty($_POST['id_participante']))
       {
           $id_participante=$_POST['id_participante'];
       }
    if(!empty($_POST['escuela']))
       {
           $escuela=$_POST['escuela'];
           $nombre_escuela=consultar_e_n($escuela,$con);
       }
    if(!empty($_POST['fu']))
       {
           $fu=$_POST['fu'];
       }
    if(!empty($_POST['aula']))
       {
           $aula=$_POST['aula'];
           $nombre_aula=consultar_a_n($aula,$con);
       }
       
    $sql ="SELECT id_proceso,nombre,YEAR(fecha) FROM proceso WHERE (id_proceso='".$id."')";
    $consulta = mysqli_query($con,$sql);
    if ($result=mysqli_fetch_array($consulta))
    {
        
        $nombre_p=$result['nombre'];
        $fecha=$result['YEAR(fecha)'];
    }
        
    $sql="select COUNT(*) from proceso_participante where proceso_participante.id_participante='$id_participante'";
    $consulta =mysqli_query($con,$sql);
    if($result=mysqli_fetch_array($consulta))
        $asistencia = $result['COUNT(*)'] ;

    $sql ="SELECT * FROM participante WHERE (id_participante='".$id_participante."')";
    $consulta = mysqli_query($con,$sql);
    if ($result=mysqli_fetch_array($consulta))
    {
        $dni=$result['id_participante'];
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
    $query = "SELECT nombre FROM area ORDER BY nombre";
	$resultado=mysqli_query($con,$query);

    if($area<>'')
    {
        $sql1="select * from escuela where area_nombre='$area' ORDER BY NOMBRE";
       
    }
    else
    {
        $sql1="select * from escuela ORDER BY nombre";
    }

    $resultado1=mysqli_query($con,$sql1);
    
    if($escuela!=='')
    {
        $sql="select * from aula where id_escuela='$escuela' ORDER BY n_aula    ";
    }
    else
    {
        $sql="select * from aula ORDER BY n_aula";
    }

   
    $resultado2=mysqli_query($con,$sql);
   
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
    
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    
$(document).ready(function(){
    $('#area').on('change',function(){
        var areaID = $(this).val();
        if(areaID){
            $.ajax({
                type:'POST',
                url:'columnas.php',
                data:'nombre='+areaID,
                success:function(html){
                    $('#escuela').html(html);
                    $('#aula').html('<option value="">Seleccion area primero</option>'); 
                }
            }); 
        }else{
            $('#escuela').html('<option value="">Selecciona area primero</option>');
            $('#aula').html('<option value="">Selecciona escuela primero</option>'); 
        }
    });
    
    $('#escuela').on('change',function(){
        var escuelaID = $(this).val();
        if(escuelaID){
            $.ajax({
                type:'POST',
                url:'columnas.php',
                data:'id_escuela='+escuelaID,
                success:function(html){
                    $('#aula').html(html);
                }
            }); 
        }else{
            $('#aula').html('<option value="">Selecciona area primero</option>'); 
        }
    });
});
</script>
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
                            <li>
                                <a href="../visualizar"><span> VISUALIZAR </span></a>
                            </li>
                            <li>
                                <a href="../preguntas"><span> REGISTRAR PREGUNTAS</span></a>
                            </li>
                            <li class="activado">
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
                <div class="col-sm-3-col-md-3"><h1>Asignando a:  <?php  echo "<strong>$nombre $apellido</strong>";?> </h1></div>           
                <div class="col-sm-3-col-md-3"><h2>Cargo de :  <?php  echo "<strong>$fu</strong>";?> </h1></div>           
                <div class="col-sm-4 col-md-4"></div>

        
        </div>
        <?php
        
                 
                 
        ?>
        <div class="row" id="detalle">
            <form id="general" action="ver_perfil.php" method="post">
                <input type="hidden"  name="id_participante" value="<?php echo $id_participante ?>">
                <input type="hidden"  name="fu" value="<?php echo $fu ?>">
                    <div class="col-sm-12">
                    <div class="form-group row"> 
                    <div class="col-xs-6">
                        <h3>Datos Personales</h3>
                     </div>
                    <div class="col-xs-6">
                        <h3>Lugar en que se Desempeñara</h3>
                    </div> 
                    <div class="col-xs-3">
                        <label for="apll">Dni:</label>
                        <input class="form-control" id="apll"  value="<?php echo $dni; ?>" name="dni" type="text"  readonly>
                    </div> 

                    <div class="col-xs-3">
                        <label for="apll">Estado</label>
                        <input class="form-control" id="apll"  value="<?php echo $estado; ?>" name="apll" type="text"  readonly>
                    </div>

                    <div class="col-xs-3">
                       <label for="area">Area :</label>
                        <select class="form-control" id="area" name="area" required>
                            <option value='<?php echo $area; ?>'><?php echo $area; ?></option>
                            <?php
									       while($d=mysqli_fetch_array($resultado)){
                                                    echo '<option value='.$d['nombre'].'>'.$d['nombre'].'</option>';
                                            }
                                          ?>
                        </select>
                    </div>
                    <div class="col-xs-12"></div>
                    
                    <div class="col-xs-3">
                        <label for="telf">Correo:</label>
                        <input class="form-control" id="telf" value="<?php echo $correo; ?>" name="telf" type="text" readonly >
                    </div>
                    
                    <div class="col-xs-3">
                        <label for="correo">Cantidad de Procesos asistidos:</label>
                        <input class="form-control" id="correo" value="<?php echo $asistencia; ?>" name="correo" type="text" readonly>
                    </div> 
                    <?php 
                        if($fu==='controlador' or $fu==='tecnico' or $fu==='conserje' or $fu==='controlador_puerta')
                        {               
                        ?>
                            <div class="col-xs-3">
                                <label for="escuela">Escuela:</label>
                                <select class="form-control" name="escuela" id="escuela">
                                        <option value="">Selecciona area primero</option>
                                </select>
                                 
                            </div>
                        <?php }
                        if($fu==="controlador" or $fu==="tecnico" )
                        { ?>
                        <div class="col-xs-12"></div>
                        <div class="col-xs-6"></div>
                        
                            
                            <div class="col-xs-3">
                                <label for="aula">Aula:</label>
                                <select name="aula" class="form-control" id="aula">
                                    <option value="">Selecciona escuela primero</option>
                                </select>
                            </div>
                             
                        
                        <?php } ?>
                        <div class="col-xs-3">
                                <br>
                                <input type="submit" class="btn btn-danger" value="GENERAR ASIGNACION">
                            </div>
                        </form>
            </div>
            <div class="col-sm-12">
            <form id="registrar" action="registrar.php" method="post">
            <h3>Resumen de Asignacion</h3>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="apll">Dni:</label>
                        <input class="form-control" id="apll"  value="<?php echo $dni; ?>" name="dni" type="text"  readonly>
                    </div> 
                    <div class="col-xs-3">
                        <label for="apll">Proceso:</label>
                        <input class="form-control" id="apll"  value="<?php echo $nombre_p; ?>" name="dni" type="text"  readonly>
                    </div>
                    <div class="col-xs-3">
                        <label for="apll">Participacion:</label>
                        <input class="form-control" id="apll"  value="<?php echo $fu; ?>" name="fu" type="text"  readonly>
                    </div>
                    <div class="col-xs-3">
                        <label for="apll">Area:</label>
                        <input class="form-control" id="apll"  value="<?php echo $area; ?>" placeholder="<?php echo $area; ?>" name="dni" type="text"  readonly>
                    </div>
                    <?php
                    if($fu==='controlador' or $fu==='tecnico' or $fu==='conserje' or $fu==='controlador_puerta')
                        {               
                        ?>
                    <div class="col-xs-3">
                        <label for="apll">Escuela:</label>
                        <input class="form-control" id="apll"  value="<?php echo $nombre_escuela; ?>" placeholder="<?php echo $nombre_escuela; ?>"  type="text"  readonly>
                    </div> 
                    <?php }  
                        if($fu==="controlador" or $fu==="tecnico" )
                        { ?>
                    <div class="col-xs-3">
                        <label for="apll">Aula:</label>
                        <input class="form-control" id="apll"  value="<?php echo $nombre_aula; ?>" type="text"  readonly>
                    </div> 
                     <?php } ?>
                      <input type="hidden"  name="area" value="<?php echo $area ?>">
                      <input type="hidden"  name="escuela" value="<?php echo $escuela ?>">
                      <input type="hidden"  name="aula" value="<?php echo $aula ?>">
                      <input type="hidden"  name="id_participante" value="<?php echo $id_participante ?>">
                      <input type="hidden"  name="fu" value="<?php echo $fu ?>">
                      <input type="hidden"  name="id_proceso" value="<?php echo $id ?>">
                    <div class="col-sm-12"> 
                        <br>
                        <input type="submit" class="btn btn-success" value="REGISTRAR EN PROCESO">
                    </div>

            </div>
             </form>  
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