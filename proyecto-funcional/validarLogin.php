<?php
    //clase encargada de validad al usuario que esta queriendo loguearse
    session_start();
    $hostName="localhost";
    $dataBaseName="proyecto";
    $user="root";
    $password="";       
    $connect=mysqli_connect($hostName,$user,$password,$dataBaseName);//conect to data base
    if(isset($_POST["user"]) && isset($_POST["pass"]) )//si las variables existen
    {
        $user=mysqli_real_escape_string($connect,$_POST["user"]);//por si hay inyecsion sql
        $pass=mysqli_real_escape_string($connect,$_POST["pass"]);
        $sql="SELECT user FROM usuario WHERE (user ='$user' OR correo='$user') AND pass='$pass'";
        $result=mysqli_query($connect,$sql);
        $num_row=mysqli_num_rows($result);
        if ($num_row=="1") {//si se auntentifico correctamente 
            $data=mysqli_fetch_array($result);
            $_SESSION["user"]=$data["user"];
            echo "1";
        }
        else {
            echo "error";
        }
    }
    else
    {
        echo "error";
    }
?>
