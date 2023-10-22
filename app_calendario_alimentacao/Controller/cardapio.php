<?php
    class Cardapio{
        private $id;
        private $data_inicial;
        private $data_final;
        private $data_dia;
        private $lanche_manha;
        private $lanche_almoco;
        private $lanche_tarde;

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr, $valor){
            $this->$attr = $valor;
        }
    }
?>