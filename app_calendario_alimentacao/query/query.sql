create database bd_alimentacao;

create table tb_logins(
	id_login int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50),
    email varchar(100),
    senha varchar(15),
    autoridade varchar(15) default 'aluno'
);

insert into tb_logins(nome, email, senha, autoridade) 
VALUES
('adm', 'adm@gmail.com', 1234, 'adm'),
('funcionario', 'funcionario@gmail.com', 1234, 'funcionario'),
('aluno', 'aluno@gmail.com', 1234, 'aluno');

create table tb_cardapio( 
    id_cardapio int PRIMARY KEY AUTO_INCREMENT, 
    dia_inicial date not null, 
    dia_final date not null, 
    dia_cardapio date not null, 
    cardapio_manha text, 
    cardapio_almoco text, 
    cardapio_tarde text 
);

insert into tb_cardapio(dia_inicial, dia_final, dia_cardapio, cardapio_manha, cardapio_almoco, cardapio_tarde) 
values 
('2023-10-16', '2023-10-20', '2023-10-16', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'pao frances, suco de uva'), 
('2023-10-16', '2023-10-20', '2023-10-17', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'pao frances, suco de uva'),
('2023-10-16', '2023-10-20', '2023-10-18', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'pao frances, suco de uva'),
('2023-10-16', '2023-10-20', '2023-10-19', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'pao frances, suco de uva'),
('2023-10-16', '2023-10-20', '2023-10-20', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'pao frances, suco de uva');