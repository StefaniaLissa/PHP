<?php

    class Operacion{

        public $cantidadUno = 0;
        public $cantidadDos = 0;
        public $resultado = 0;

        function __construct($intCant1, $intCAnt2){

            $this->cantidadUno = $intCant1;
            $this->cantidadDos = $intCAnt2;

        }

        public function getSuma(){
            $this->resultado = $this->cantidadUno + $this->cantidadDos;
            return $this->resultado;
        }

        public function getResta(){
            $this->resultado = $this->cantidadUno - $this->cantidadDos;
            return $this->resultado;
        }

        public function getMultiplica(){
            $this->resultado = $this->cantidadUno * $this->cantidadDos;
            return $this->resultado;
        }

        public function getDivide(){
            $this->resultado = $this->cantidadUno / $this->cantidadDos;
            return $this->resultado;
        }

    }

?>