<?php 

	// require_once ("../controllers/Empleado.php");
	// require_once ("../controllers/Cliente.php");
	// require_once ("../controllers/Persona.php");
	require_once ("../autoload.php");
	use controllers\Empleado;
	use controllers\Cliente;
	use controllers\Persona;

	$objEmpleado = new Empleado(78978,"Stefania Lissa",20);
	$objEmpleado->setPuesto("Administrador");

	echo $objEmpleado->getDatosPersonales();
	echo "Puesto:".$objEmpleado->getPuesto();

	$objCliente = new Cliente(434543,"Miguel B",20);
	$objCliente->setCredito(1000);

	echo $objCliente->getDatosPersonales();
	echo "Créditos:".$objCliente->getCredito();

	$msg = new Persona();
	echo "<br><br>".$msg->saludar();

 ?>