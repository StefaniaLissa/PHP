<?php 

	require_once("ClassOperacion.php");


	$objRaiz = new Calcular();

	echo "<br>Raiz de 9: ".$objRaiz->raizCuadrada(9);
	echo "<br>Potencia 4 a la 2: ".$objRaiz->potencia(4,3);

	echo "<br><br>50 y 2 :<br>Suma ".$objRaiz->op_basica(50,2,'+');
	echo "<br>Resta ".$objRaiz->op_basica(50,2,'-');
	echo "<br>Multiplica ".$objRaiz->op_basica(50,2,'*');
	echo "<br>Divide ".$objRaiz->op_basica(50,2,'/');

 ?>