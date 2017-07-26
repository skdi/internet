<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location:index.php");
}

?>
<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="inicio/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-3.2.1.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
 
  </head>
	<body class="loading">
		<div id="wrapper">
      
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
            <h1>Welcome</h1>
            <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form method="post">
              <div class="form-group">
                <label  class ="text-info" for="user">Usuario o Email</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" name="user" id="user" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class ="text-info" for="pass">Password</label> 
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>                                   
                <input type="password" name="pass" id="pass" class="form-control">                
                </div>
              </div>
              <div class="form-group">
                <input type="button" name="login" id="login" value="Login" class="btn btn-success">
              </div>
              <br>
              <div>
                  <p align=center><a href="recuperarPass.php">Se ah olvidado la contraseña?</a></p>'
              </div>
              <span id="result"></span>
            </form>
          </div>
        </div>
      </div>  
					</header>
          

				<!-- Footer -->
			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>

<script>
    //script para cuando se haga click en el boton login se llame a validacion
    //de login.php tambien le pasa los datos user y pass por medio de ajax 
  $(document).ready(function() {
    $('#login').click(function(){
      var user = $('#user').val();
      var pass = $('#pass').val();
      if($.trim(user).length > 0 && $.trim(pass).length > 0){
        $.ajax({
          url:"validarLogin.php",
          method:"POST",
          data:{user:user, pass:pass},
          cache:"false",
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(data) {
            $('#login').val("Login");
            if (data=="1") {
              $(location).attr('href','index.php');
            } else {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> las credenciales son incorrectas.</div>");
            }
          }
        });
      };
    });
  });
</script>
<!--<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-3.2.1.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body style ="background:url(img/32-2.jpg) ;background-size:110%" >

    <div class="container">
      <div class="row">
        <div class="col-md-3 col-md-offset-4">
          <form method="post">
            <br><br>
            <h1 class ="text-muted"><p class="text-center">WELCOME</p></h1>
            <br><br>
            <div class="form-group">
              <label  class ="text-info" for="user">Usuario o Email</label>
              <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                  <input type="text" name="user" id="user" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class ="text-info" for="pass">Password</label> 
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>                                   
               <input type="password" name="pass" id="pass" class="form-control">                
              </div>
            </div>
            <div class="form-group">
              <input type="button" name="login" id="login" value="Login" class="btn btn-success">
            </div>
            <br>
            <div>
                <p align=center><a href="recuperarPass.php">Se ah olvidado la contraseña?</a></p>'
            </div>
            <span id="result"></span>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
-->