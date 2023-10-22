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

INSERT INTO tb_logins (nome, email, senha) VALUES
('Alice Johnson', 'alice.johnson@example.com', 'senha123'),
('Bob Smith', 'bob.smith@example.com', 'senha456'),
('Charlie Brown', 'charlie.brown@example.com', 'senha789'),
('David Davis', 'david.davis@example.com', 'senhaabc'),
('Eva White', 'eva.white@example.com', 'senhaxyz'),
('Frank Williams', 'frank.williams@example.com', 'senhalmn'),
('Grace Wilson', 'grace.wilson@example.com', 'senha456'),
('Henry Lee', 'henry.lee@example.com', 'senha123'),
('Ivy Miller', 'ivy.miller@example.com', 'senha789'),
('Jack Hall', 'jack.hall@example.com', 'senhaabc'),
('Katherine Moore', 'katherine.moore@example.com', 'senhaxyz'),
('Liam King', 'liam.king@example.com', 'senhalmn'),
('Mia Scott', 'mia.scott@example.com', 'senha456'),
('Noah Johnson', 'noah.johnson@example.com', 'senha123'),
('Olivia Martin', 'olivia.martin@example.com', 'senha789'),
('Parker Harris', 'parker.harris@example.com', 'senhaabc'),
('Quinn Davis', 'quinn.davis@example.com', 'senhaxyz'),
('Riley Wilson', 'riley.wilson@example.com', 'senhalmn'),
('Sophia Anderson', 'sophia.anderson@example.com', 'senha456'),
('Thomas Clark', 'thomas.clark@example.com', 'senha123'),
('Uma White', 'uma.white@example.com', 'senha789'),
('Victor Smith', 'victor.smith@example.com', 'senhaabc'),
('Willow Miller', 'willow.miller@example.com', 'senhaxyz'),
('Xander Hall', 'xander.hall@example.com', 'senhalmn'),
('Yara Moore', 'yara.moore@example.com', 'senha456'),
('Zane Brown', 'zane.brown@example.com', 'senha123'),
('Aaron Davis', 'aaron.davis@example.com', 'senha789'),
('Bella Johnson', 'bella.johnson@example.com', 'senhaabc'),
('Carter Lee', 'carter.lee@example.com', 'senhaxyz'),
('Delilah Scott', 'delilah.scott@example.com', 'senhalmn'),
('Ethan Williams', 'ethan.williams@example.com', 'senha456');

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
('2023-10-16', '2023-10-20', '2023-10-16', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'Pao frances, suco de uva'), 
('2023-10-16', '2023-10-20', '2023-10-17', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'Pao frances, suco de uva'),
('2023-10-16', '2023-10-20', '2023-10-18', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'Pao frances, suco de uva'),
('2023-10-16', '2023-10-20', '2023-10-19', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'Pao frances, suco de uva'),
('2023-10-16', '2023-10-20', '2023-10-20', 'Pão francês, leite com chocolate', 'Arroz, feijao, carne de panela, maçã', 'Pao frances, suco de uva');
