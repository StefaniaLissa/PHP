<?php

	namespace controllers;
	// require_once ("../models/Persona.php");
	require_once ("../autoload.php");
	use Models\Persona;

	class Cliente extends Persona{

		protected $fltCredito;

		function __construct(int $dni, string $nombre, int $edad){
			// Constructor de clase padre/parent ClasePersona
			parent::__construct($dni, $nombre, $edad);

		}

		public function setCredito(string $credito){
			$this->fltCredito = $credito;
		}

		public function getCredito():float
		{
			return $this->fltCredito;
		}

	}//End class cliente

 ?>