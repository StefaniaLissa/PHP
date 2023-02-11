<?php
	function autload($class) // recibe como param el nombre de la clase
	{
		require_once ($class.".php"); // la clase que se manda y la extenci{o}n
		echo "Autoload: ".$class.".php"."<br>"; // imprime clases requeridas
	}
	
	spl_autoload_register('autload');

 ?>