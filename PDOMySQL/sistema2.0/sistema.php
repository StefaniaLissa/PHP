<?php 
	require_once("autoload.php");

	$objUsuario = new Usuario();

	//INSERT usuario
	//$insert = $objUsuario->insertUsuario("Stefi",78987898,"stefi@info.com");
	//echo $insert;
	//
	//Estrae todos los registros
	$users = $objUsuario->getUsuarios();
	print_r("<pre>");
	print_r($users);
	print_r("</pre>");

	//UPDATE
	$updateUser = $objUsuario->updateUser(2,"Miguel B",134534534,"miguel@info.com");
	echo "Actualizado: ".$updateUser;

	$user = $objUsuario->getUser(2);
	print_r("<pre>");
	print_r($user);
	print_r("</pre>");
	
	//DELETE
	$delete = $objUsuario->deluser(2);
	echo "Eliminado ".$delete;


 ?>