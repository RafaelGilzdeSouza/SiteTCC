create database Webhealth;
use webhealth;

create table usuarios(
id int(4) auto_increment,
nome varchar(40) not null,
sobrenome varchar(40) not null,
email varchar(50)not null,
senha varchar (25) not null,
telefone varchar(12) not null,
sexo ENUM('Masculino', 'Feminino') not null,
endereco varchar(50),
cidade varchar(50) not null,
estado varchar(2)not null,
cep varchar (8),
primary key(id)
);
SELECT * FROM usuarios;


INSERT INTO usuarios (nome, sobrenome, email, senha, telefone, sexo, endereco, cidade, estado,  cep) VALUES
    ('Rafael', 'Gilz', 'gilzrafa@gmail.com', 'root','44444444444', 'Masculino', 'rua dos bobos', 'Bom retiro', 'sc', '00000000');


    
    