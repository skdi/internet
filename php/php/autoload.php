<?php
  function autoload($clase){
  include _GET['action'] "/" $clase ".php";
  }
  sql_autoload_register(autoload);
  clase1 metodo();
  clase2 metodo2();


?>
