<?php

    require_once("ClassUsuario.php");

    $objUsuarioUno = new Usuario("Stefania Lissa","stefi@gmail.com","Admin");
    $objUsuarioDos = new Usuario("Miguel","miguel@gmail.com","Cliente");

    echo $objUsuarioUno->gerPerfil();
	echo "<br><br>";

	echo $objUsuarioDos->gerPerfil();
	$objUsuarioDos->setCambiarClave("hola123");
    //Cambio de contraseña
	echo "<br><br>";
	echo $objUsuarioDos->gerPerfil();

?>