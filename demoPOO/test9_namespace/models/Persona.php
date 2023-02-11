<?php

	namespace models;

	class Persona{

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

		public function getDatosPersonales()
		{
			$datos = "
				<h2>DATOS PERSONALES</h2>
				DNI: {$this->intDni}<br>
				Nombre: {$this->strNombre}<br>
				Edad: {$this->intEdad}<br>
			"; //No funciona con comillas simples
			return $datos;
		}

	}

 ?>