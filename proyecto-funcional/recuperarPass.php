<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location:index.php");
}

?>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
        <script src="js/jquery-3.2.1.js" charset="utf-8"></script>
        <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    
    </head>
    <body>
    <br><br><br><br><br><br> 
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-md-offset-4">
          <form method="post">
            <br><br>
            <h1 class ="text-muted"><p class="text-center">Recuperar contraseña </p></h1>
            <br><br>
            <div class="form-group">
              <label  class ="text-info" for="user">Usuario o Email</label>
              <input type="text" name="user" id="user" class="form-control">
            </div>
            <div class="form-group">
              <input type="button" name="login" id="login" value="Recuperar" class="btn btn-success">
            </div>
            <br>
            <span id="result"></span>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>