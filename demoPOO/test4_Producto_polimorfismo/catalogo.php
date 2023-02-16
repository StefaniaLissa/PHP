<?php 
	require_once ("ClassMesa.php");

	//string $descripcion, float $precio
	$objCama = new Producto("Cama",10500);
	$arrInfoProducto = $objCama->getInfoProducto();

	print_r('<pre>');
	print_r($arrInfoProducto);
	print_r('</pre>');

	//string $descripcion, float $precio, string $marca, string $color, string $material
	$objMueble = new Mueble("Closet",20000,"Casita","Café","Madera");
	$arrInfoMueble = $objMueble->getInfoProducto();

	print_r('<pre>');
	print_r($arrInfoMueble);
	print_r('</pre>');

	//string $descripcion, float $precio, string $marca, string $color, string $material, string $tamanio
	$objMesa = new Mesa("Mesa de noche",800,"Nochesita","Negro","Melamina","3mt.");
	$objMesa->setForma("Redonda");
	$arrInfoMesa = $objMesa->getInfoProducto();

	print_r('<pre>');
	print_r($arrInfoMesa);
	print_r('</pre>');

 ?>