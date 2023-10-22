<?php
    class UserService{
        private $conexao;
        private $user;

        public function __construct(Conexao $conexao,User $user){
            $this->conexao = $conexao->conectar();
            $this->user = $user;
        }

        public function  recuperarUsers(){
            $query = 'select
                        nome, email, senha
                      from
                        tb_logins';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function  recuperarUsersEspecificos($autoridade){
            $query = '';
            if($autoridade == 'aluno' || $autoridade == 'funcionario' || $autoridade == 'adm'){
                $query = 'select
                        nome, email, autoridade
                      from
                        tb_logins
                       where autoridade = :autoridade';

                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':autoridade', $autoridade);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else{
                $query_alunos = 'select nome, email, autoridade FROM tb_logins WHERE autoridade = "aluno"';
                $query_funcionarios = 'select nome, email, autoridade FROM tb_logins WHERE autoridade = "funcionario"';
                $query_adm = 'select nome, email, autoridade FROM tb_logins WHERE autoridade = "adm"';

                $stmt_alunos = $this->conexao->prepare($query_alunos);
                $stmt_funcionarios = $this->conexao->prepare($query_funcionarios);
                $stmt_adm = $this->conexao->prepare($query_adm);

                $stmt_alunos->execute();
                $stmt_funcionarios->execute();
                $stmt_adm->execute();

                $alunos = $stmt_alunos->fetchAll(PDO::FETCH_OBJ);
                $funcionarios = $stmt_funcionarios->fetchAll(PDO::FETCH_OBJ);
                $adm = $stmt_adm->fetchAll(PDO::FETCH_OBJ);

                $usuarios = array_merge($alunos, $funcionarios, $adm);

                return $usuarios;
            }
        }
        public function adicionarUsers(){
            $query = 'insert into tb_logins (nome, email, senha)
                      values(:nome , :email , :senha)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->user->__get('nome'));
            $stmt->bindValue(':email', $this->user->__get('email'));
            $stmt->bindValue(':senha', $this->user->__get('senha'));
            $stmt->execute();
        }
        public function contarUsers($autoridade){
            $query = '';
            if($autoridade == 'aluno' || $autoridade == 'funcionario' || $autoridade == 'adm'){
                $query = "select
                            count(*) as total 
                          FROM tb_logins
                            where autoridade = :titulo" ;
            }else if($autoridade == 'total'){
                $query = "select
                            count(*) as total 
                          FROM tb_logins";
            }
            if (!empty($query)) {
                $stmt = $this->conexao->prepare($query);
                if ($autoridade == 'aluno' || $autoridade == 'funcionario' || $autoridade == 'adm') {
                    $stmt->bindValue(':titulo', $autoridade);
                }
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ)->total;
            } else {
                return 0; // Consulta não definida
            }
        }
        public function recuperarAutoridade($email){
            $query = 'select
                        autoridade
                      from
                        tb_logins
                      where
                        email = :email';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $autoReturn = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $autoReturn[0]->autoridade;
        }
    }
?>