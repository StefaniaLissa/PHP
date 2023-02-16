<?php 
	
	class Producto{
		public $strDescripcion;
		public $fltPrecio;
		protected $intStockMinimo = 10;
		protected $strStatus = "Activo";

		public function __construct(string $descripcion, float $precio)
		{
			$this->strDescripcion = $descripcion;
			$this->fltPrecio = $precio;
		}

		public function getInfoProducto(){

			$arrProducto = array('producto' => $this->strDescripcion,
								'precio' =>  $this->fltPrecio,
								'stok_minimo' => $this->intStockMinimo,
								'estado' => $this->strStatus
							); //Array asociativo
			return $arrProducto;
		}

	}//end class producto

 ?>