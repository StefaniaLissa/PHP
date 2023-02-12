<?php 
	require_once("Config/Config.php");
	require_once("Helpers/Helpers.php");

	$url = $_GET['url'] ?? 'home/home'; //Si no hay parametros ($_GET['url'] = null), 
	//se utiliza en controlador home y el método home (localhost/ecommerce/home/home).

	$arrUrl = explode("/", $url); //$arrUrl, array con todos los parametros, "/" es el delimitador
	
	$controller = $arrUrl[0]; //El 1º parametro SIEMPRE es un controlador

	$method = $arrUrl[1] ?? $arrUrl[0]; //Si no hay 2º parametro/método, toma el valor del controller. 
    //Todos los controllers van a tener un método llamado como el mismo
	
    $params = implode(',', array_slice($arrUrl, 2)); //Toma los parametros restantes, los convierte en un array (array_slice)
    //Une los elementos del array en una cadena separados por comas.

    //PRUEBAS
    // echo $arrUrl;
    // echo $controller;
    // echo $method;
    // echo $params;
    // echo "controlador: {$controller}<br>método: {$method}<br>parámetros: {$params}";
    //Si las pruebas dan bien, probablemente sean las importaciones (require_once)s

    require_once("Libraries/Core/Autoload.php");    //Importa todo lo necesario automáticamente
	require_once("Libraries/Core/Load.php");        //cargara el controlador buscado con el método y params
 ?>

