<?php
session_start();
if(isset($_SESSION["user"])) 
{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title"
        charset="utf-8">
        <script>
            src="js/jquery-3.2.1.js"
        </script>
        <script>
            src="bootstrap/js/bootstrap.min.js"
        </script>
    </head>
    <body style ="background:url(img/32-2.jpg) ;background-size:110%" >
        <br><br><br><br><br><br>
        <div class="container">
            <div class = "row">
                <div class ="col-md-3 col-md-offset-4">
                    <form method="post">
                        <h1 class ="text-muted"><p class="text-center">Login</p></h1>
                        <br>
                        <div class="form group">
                            <label class ="text-info" for="user">Usuario o Email</label>
                            <input type="text" name="user" id="user" class="form-control">
                        </div>
                        <br>
                        <div class="form group">
                            <label class ="text-info" for="password">Contraseña</label>
                            <input type="password" name="pass " id="pass" class="form-control">
                            
                        </div>
                        <br>
                        <div class "form group">
                            <input type="button" name="Login" id="login" value="Login" class= "btn btn-success">
                        </div>
                        <span id="result"></span>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function()
    {
        $('#Login').clik(function()
        {
            var user = ('#user').val();
            var pass = ('#pass').val();
            if ($.trim(user).length>0  && $.trim(pass).length>0) {
                url="logueame.php",
                method="POST";
                data:{user:user,pass:pass},
                cache="false",
                beforeSend:function()
                {
                    $('#Login').val("Conectando....");
                },
                success:function(data=="1"){
                    $('#Login').val("Login");
                    if (data=="1") {
                        $(location).attr('href','index.php');
                    }
                    else
                    {
                        $("#result").html("error");
                    }
                }
            }

        });
    });
</script>