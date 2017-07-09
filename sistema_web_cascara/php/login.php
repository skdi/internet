<?php
class login{
	private $username_db='root';
	private $password_db='';
	private $database_db='internetdatabase';
	private $hostname_db='localhost';
	private $conx;
 
	function __construct(){
		$this->conx= new mysqli($this->hostname_db,$this->username_db,$this->password_db,$this->database_db);
	}
 
	public function login($user, $clave){
		$login= $this->conx->query("SELECT * FROM  usuarios  WHERE nombre='".$user."' AND password='".$clave."' ");
		return $login;
	}
}
?>
