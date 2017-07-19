<?php
session_start();

require_once("..\clases/conexion/conexion.php");

    $id_par=$_POST['id_par'];
    $id_p=$_POST['id_pro'];
    $desde=(int) $_POST['desde'];
    $hasta=(int) $_POST['hasta'];
    $con=$conexion;
    
    $sql="select apellido,nombre from participante where id_participante='$id_par'";
    $query=mysqli_query($con,$sql);
    if($r=mysqli_fetch_array($query))
    {
        $nombre=$r['nombre'];
        $apellido=$r['apellido'];
    
    }
    

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



                    <div id="menu-barra" >
                        <ul>
                            <li>
                                <a href="../../admin.html" ><span> INICIO </span></a>
                            </li>
                            <li >
                                <a href="../" ><span> MANTENIMIENTO </span></a>
                            </li>
                            <li class="activado" >
                                <a href="#"><span> VISUALIZAR </span></a>
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

        </div>


            <div class="pagina-contenido">
                <!-- Contenido -->
               
                 <div class="contenido">
                   
                   
                </div><!-- contenedor -->
             <div class="container">
              
            
            <div class="row" id="tabla_detalle" >
                            
                            
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-sm-3-col-md-3"><h1>Grafica  de Historial Participante:  <?php  echo "<strong>$nombre $apellido</strong>";?> </h1></div>           
                <div class="col-sm-4 col-md-4"></div>

            </div>
          
        <div class="row" id="detalle">
                
            <div class="col-sm-12">
              <form action="mostrar.php"  method="post" >  
                <input type="hidden" name="id_par" value="<?php echo $id_par ?>" />
                <input type="hidden" name="id_pro" value="<?php echo $id_p ?>" />
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>Año desde: </p>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="desde" name="desde">
                                <?php
                                    $query=mysqli_query($con,"SELECT DISTINCT YEAR(fecha) FROM proceso");
                                    while($d=mysqli_fetch_array($query)){
                                    echo '<option value='.$d['YEAR(fecha)'].'>'.$d['YEAR(fecha)'].'</option>';
                                           }
                                ?>             
                                </select>
                            </div>
                            <div class="col-sm-2"><p>Hasta:</p></div>
                            <div class="col-sm-4">
                            <select class="form-control" id="hasta" name="hasta">
                                <?php
                                    $query=mysqli_query($con,"SELECT DISTINCT YEAR(fecha) FROM proceso ORDER BY FECHA" );
				                    while($d=mysqli_fetch_array($query)){
                                    echo '<option value='.$d['YEAR(fecha)'].'>'.$d['YEAR(fecha)'].'</option>';
                                           }
                                ?>            
                            </select>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4"> 
                        <input type="submit" class="btn btn-warning" value="Filtrar Por Año">
                    </div>
                    <br><br>
                </div>
              </form>
            <div class="col-sm-3"> 
                <div class="row">
                   <div class="col-sm-12"><button class="btn btn-success" onclick="mostrar()"> Mostrar Grafico </button> </div>
                    <br><br><br>
                    <div class="col-sm-12"><p>Historial desde el año: <?php echo $desde ?></p></div>
                    <div class="col-sm-12"><p>Hasta el año: <?php echo $hasta ?></p></div>
                </div>
                </div>
       
            <div class="col-sm-9">
                 <div id="canvas-holder">
                <canvas id="chart-area4" width="300" height="150"></canvas>
                </div>
            </div>    
               
            </div>
            

            <div class="container">     

                <div class="col-sm-12"align="left" ><a href="pro_sel.php" class="btn btn-danger "><span class="fa fa-times"></span>Cerrar
                                                </a></div>   
            </div>
            <br>
            </div>
                 
                <br>
                 <br>
                 <br>
            </div> <!-- pagina contenido -->
        </div> 
              


            <!-- Fin del contenido de la pagina-->


        <!-- Fin de la envoltura-->
        <script> 
            function mostrar()
            {
                var ctx4 = document.getElementById("chart-area4").getContext("2d");
        
            var lineChartData = {
			labels : [0,
                <?php 
                    $i=$desde;
                    while($i<=$hasta)
                    {
                        ?>
                            '<?php echo $i; ?>',
                        <?php
                        $i++;
                    }
                ?>
                
            ],
			datasets : [
				{
					label: "Primera serie de datos",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "#6b9dfa",
					pointColor : "#1e45d7",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [0,
 
                   
                    <?php 
                        $sql="select COUNT(*),YEAR(fecha) from proceso_participante inner join (SELECT * from proceso where YEAR(fecha) BETWEEN '$desde' And '$hasta' ) as B on proceso_participante.id_proceso=B.id_proceso and proceso_participante.id_participante='$id_par'";
                        $query=mysqli_query($con,$sql);
                        $i=0;
                        while($valor=mysqli_fetch_array($query,MYSQLI_NUM)) 
                        {
                             ?>
                                '<?php echo $valor[$i] ?>',
                            <?php
                            $i++;
                            
                        }
                        ?>]
				},

			]
            }


            window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});

                
            }
		    

        </script>

    </body>
</html>