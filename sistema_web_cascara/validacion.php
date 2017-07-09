<?php
session_start();
$user= $_POST['usuario'];
$contra = $_POST['pass'];
		
	//Conectar a la base de datos
    require_once("clases/conexion/conexion.php");
    $conx=new Conectar();
    $con=$conx->conexion;
    $sql ="SELECT * FROM usuario WHERE (usuario='".$user."' or correo='".$user."') and con='".$contra."'";
    $consulta = mysqli_query($con,$sql);
    if (!$result=mysqli_fetch_array($consulta)){
         
        header("location:index.php" ); 
        exit();
    }else {
        $_SESSION['username']=$result['usuario'];
        $_SESSION['nombre']=$result['nombre'];
        header('location:admin.html');
        //header("refresh:3; url=verRegistrados.php" ); 
        
    }

    if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);
			$can=mysqli_query($conexion,"SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if($dato=mysqli_fetch_array($can)){
				if($dato['estado']=='s'){
					
					
					///////////////////////////////
					if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){						
						
					}
				}
			}
		}
?>