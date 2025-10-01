<?php

    class soporte {
        public $titulo;
        protected $numero;
        private $precio;
        private const VAT = 0.21;

        public function __construct($titulo, $numero, $precio) {
            $this->titulo = $titulo;
            $this->numero = $numero;
            $this->precio = $precio;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function getPrecio()
        {
            return $this->precio;
        }
        
        public function getPrecioConIVA()
        {
            $iva = ($this->precio * self::VAT)+$this->precio;
            return $iva;
        }

        public function muestraResumen(){
        return $this->titulo . " " . $this->numero . " " . $this->precio;        }
    }

?>