<?php 
	$controller = ucwords($controller); //TODOS los controladores tiene que tener la 1º letra Mayus, el reto minus
	$controllerFile = "Controllers/".$controller.".php"; //supuesta ubicación del archivo
	
	if(file_exists($controllerFile)){
		require_once($controllerFile);
		$controller = new $controller();

		if(method_exists($controller, $method)){
			$controller->{$method}($params);

		}else{
			require_once("Controllers/Error.php"); //No existe el método, devería haber uno llamado igual que su controlador
			//echo "Error: método o params";
		}

	}else{
		require_once("Controllers/Error.php"); //Controlador no existe
		//echo "Error: controllador";
	}
 ?>