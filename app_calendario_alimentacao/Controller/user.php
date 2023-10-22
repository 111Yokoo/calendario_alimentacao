<?php
    class User{
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $autoridade;

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr, $valor){
            $this->$attr = $valor;
        }
    }
?>