<?php
    class CardapioService{
        private $conexao;
        private $cardapio;

        public function __construct(Conexao $conexao,Cardapio $cardapio){
            $this->conexao = $conexao->conectar();
            $this->cardapio = $cardapio;
        }

        public function verificarRepeticaoDeDias($dia){
            $query = 'select
                        dia_cardapio
                      from 
                        tb_cardapio
                      where
                        dia_cardapio = :dia';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':dia',$dia);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function adicionarCardapio(){
            $query = 'insert into tb_cardapio(dia_inicial, dia_final, dia_cardapio, cardapio_manha, cardapio_almoco, cardapio_tarde)
            values
            (:dia_inicial, :dia_final, :dia_cardapio, :cardapio_manha, :cardapio_almoco, :cardapio_tarde)';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':dia_inicial', $this->cardapio->data_inicial);
            $stmt->bindValue(':dia_final', $this->cardapio->data_final);
            $stmt->bindValue(':dia_cardapio', $this->cardapio->data_dia);
            $stmt->bindValue(':cardapio_manha', $this->cardapio->lanche_manha);
            $stmt->bindValue(':cardapio_almoco', $this->cardapio->lanche_almoco);
            $stmt->bindValue(':cardapio_tarde', $this->cardapio->lanche_tarde);
            $stmt->execute();
        }
        public function recuperarCardapio(){
            $query = 'select
                        id_cardapio, dia_inicial, dia_final, dia_cardapio, cardapio_manha, cardapio_almoco, cardapio_tarde
                      from 
                        tb_cardapio';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function removerCardapio($id){
            $query = 'delete from tb_cardapio where id_cardapio = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }
        public function pegarCardapioSemanal($data){
            $query = 'select 
                        dia_cardapio, cardapio_manha, cardapio_almoco, cardapio_tarde
                      from 
                        tb_cardapio
                      where 
                        dia_inicial = :data';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':data', $data);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>