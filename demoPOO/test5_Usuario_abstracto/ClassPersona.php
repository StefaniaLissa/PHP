<?php
	abstract class Persona{ //Clase abstracta, no se puede instanciar, simula herencia multiple

		public $intDni;
		public $strNombre;
		public $intEdad;
		public $mensaje;

		function __construct (int $dni, string $nombre, int $edad)
		{
			$this->intDni = $dni;
			$this->strNombre = $nombre;
			$this->intEdad = $edad;
		}

		abstract public function getDatosPersonales();
		abstract public function setMensaje(string $mensaje);
		abstract public function getMensaje():string;

	}//End class persona

 ?>