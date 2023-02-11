<?php 

	//Un trait en PHP es una forma de compartir código entre múltiples clases, 
	//es similar a una interface pero proporciona la implementación real de los métodos.

	trait Carrito{
		public $strProducto;
		public $intCantidad;

		public function setCarrito(string $producto, int $cantidad)
		{
			$this->strProducto = $producto;
			$this->intCantidad = $cantidad;
		}

		abstract function getCarrito();
	}

 ?>