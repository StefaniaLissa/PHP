<?php
	function autoload($class) // recibe como param el nombre de la clase
	{
		echo $class.'<br>';
		$url = str_replace("\\","/",$class.".php"); //Reemplaza "\" por "/"
		echo "Autoload: ".$url.'<br>';								//Doble "\", escape de caracter
		require_once ($url);
	}
	
	spl_autoload_register('autoload');

	//IMPORTANTE : namespaces, mejor todo en minuscula!

 ?>