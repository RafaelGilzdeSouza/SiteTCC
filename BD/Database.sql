create database Webhealth;
use webhealth;

create table User(
id int(4) auto_increment,
nome varchar(40) not null,
email varchar(50),
telefone varchar(12) not null,
primary key(id)
);

SELECT * FROM User;

create table Login(
id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO Login (username, password) VALUES
    ('Rafael', 'root'),
    ('usuario2', 'senha2');


