<?php
    session_start();
    $hostName="localhost";
    $dataBaseName="internetProjectDataBase";
    $user="root";
    $password="";       
    $connect=mysqli_connect($hostName,$user,$password,$dataBaseName);//conect to data base 
    if(isset($_POST["user"]) && isset($_POST["pass"]) )
    {
        $user=mysqli_real_escape_string($connect,$_POST["user"]);
        $pass=mysqli_real_escape_string($connect,$_POST["pass"]);
        $sql="SELECT user FROM usuario WHERE (user ='$user' OR email='$user') AND pass='$pass'";
        $result=mysqli_query($connect,$sql);
        $num_row=mysqli_num_rows($result);
        if ($num_row=="1") {
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
