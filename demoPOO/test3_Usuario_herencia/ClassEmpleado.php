<?php

	require_once ("ClassPersona.php");

	class Empleado extends Persona{

		protected $strPuesto;

		function __construct(int $dni, string $nombre, int $edad){

			// Constructor de clase padre/parent ClasePersona
			parent::__construct($dni, $nombre, $edad);

		}

		public function setPuesto(string $puesto){
			$this->strPuesto = $puesto;
		}

		public function getPuesto():string
		{
			return $this->strPuesto;
		}

	}//End class empleado

 ?>