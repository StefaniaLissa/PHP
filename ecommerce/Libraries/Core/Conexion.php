<?php
class Conexion{
	private $conect;

	public function __construct(){
		$connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
		try{
			$this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);
			$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "<br>conexión exitosa<br>";
		}catch(PDOException $e){
			$this->conect = 'Error de conexión';
		    echo "<br>ERROR conexión: " . $e->getMessage()."<br>";
		}
	}

	public function conect(){
		return $this->conect;
	}
}

?>