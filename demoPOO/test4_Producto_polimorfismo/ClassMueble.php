<?php 
	
	require_once ("ClassProducto.php");

	class Mueble extends Producto{

		public $strColor;
		public $strMaterial;
		public $strStatus = "Agotado";

		public function __construct(string $descripcion, float $precio, string $marca, string $color, string $material){
			//constructor padre
			parent::__construct($descripcion, $precio);
			//extencion: pripedades subclase
			$this->strMaterial = $material;
			$this->strColor = $color;
		}

		public function getInfoProducto(){
			$arrProducto = array('producto' => $this->strDescripcion,
								'precio' =>  $this->fltPrecio,
								'stok_minimo' => $this->intStockMinimo,
								'estado' => $this->strStatus,
								'color' => $this->strColor,
								'Material' => $this->strMaterial
							);
			return $arrProducto;
		}
	}

 ?>