create database Webhealth;
use webhealth;

create table usuarios(
id int not null auto_increment,
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
drop table usuarios;

INSERT INTO usuarios (nome, sobrenome, email, senha, telefone, sexo, endereco, cidade, estado,  cep) VALUES
    ('Rafael', 'Gilz', 'gilzrafa@gmail.com', 'root','44444444444', 'Masculino', 'rua dos bobos', 'Bom retiro', 'sc', '00000000');

CREATE TABLE Medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255) NOT NULL,
    data_nascimento DATE,
    sexo ENUM('M', 'F'),
    email VARCHAR(255) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    CRM VARCHAR(20) UNIQUE NOT NULL,
    especialidade VARCHAR(255),
    endereco VARCHAR(255),
    cidade VARCHAR(100),
    estado VARCHAR(2),
    cep VARCHAR(10),
    img_data VARCHAR(255),
    senha VARCHAR(255) NOT NULL
);


select * from Medico;

-- Crie uma tabela de números (se não existir)
CREATE TABLE IF NOT EXISTS Numbers (n INT PRIMARY KEY);
INSERT IGNORE INTO Numbers VALUES (0),(1),(2),(3),(4),(5),(6),(7),(8),(9);


-- Crie uma tabela para armazenar os horários disponíveis
CREATE TABLE HorariosDisponiveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_medico INT,
    FOREIGN KEY (id_medico) REFERENCES Medico(id),
    data DATE NOT NULL,
    horario TIME NOT NULL
);
drop table HorariosDisponiveis;

select * from HorariosDisponiveis;

ALTER TABLE HorariosDisponiveis
ADD FOREIGN KEY (id_medico) REFERENCES Medico(id);
--------------------------------------------------------------------------------
-- Remover o procedimento existente, se existir
DROP PROCEDURE IF EXISTS inserir_horarios;

-- Defina o ID do médico
SET @id_medico := 1;

-- Defina a data inicial do mês
SET @data_inicial := '2023-12-01';
SET @horario := '11:00:00'; -- Horário inicial

-- Criar o novo procedimento
DELIMITER //
CREATE PROCEDURE inserir_horarios()
BEGIN
  DECLARE n INT DEFAULT 0;

  WHILE n < 31 DO
   

    -- Verificar se já existe um horário para o médico na data específica
    IF NOT EXISTS (
        SELECT 1
        FROM HorariosDisponiveis hd
        WHERE hd.id_medico = @id_medico AND
          hd.data = DATE_ADD(@data_inicial, INTERVAL n DAY) AND
          hd.horario = @horario
      ) THEN
      -- Se não existir, então podemos inserir
      INSERT INTO HorariosDisponiveis (id_medico, data, horario)
      VALUES (@id_medico, DATE_ADD(@data_inicial, INTERVAL n DAY), @horario);
    END IF;
     SET n = n + 1;
  END WHILE;
END //
DELIMITER ;

-- Chame o procedimento para inserir os horários
CALL inserir_horarios();

---------------------------------------------------------------------------------
select * from HorariosDisponiveis;

CREATE TABLE Consulta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_consulta DATE,
    horario_consulta TIME,
    nivel_sintomas VARCHAR(50),
    sintomas TEXT,
    outros_sintomas TEXT,
    historia_medica VARCHAR(50),
    medicamentos VARCHAR(50),
    historico_familiar VARCHAR(50),
    estilo_vida VARCHAR(50),
    vacinas VARCHAR(50),
    id_usuario INT,
    id_medico INT
);
ALTER TABLE Consulta
ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id);

ALTER TABLE Consulta
ADD FOREIGN KEY (id_medico) REFERENCES Medico(id);

select * from Consulta;

INSERT INTO Medico (nome, sobrenome, data_nascimento, sexo, email, telefone, CRM, especialidade, endereco, cidade, estado, cep)
VALUES
    ('João', 'Silva', '1980-05-15', 'M', 'joao.silva@example.com', '(11) 1234-5678', 'CRM12345-SP', 'Cardiologista', 'Rua A, 123', 'São Paulo', 'SP', '01234-567'),
    ('Maria', 'Santos', '1975-08-22', 'F', 'maria.santos@example.com', '(21) 9876-5432', 'CRM54321-RJ', 'Pediatra', 'Avenida B, 456', 'Rio de Janeiro', 'RJ', '21098-765'),
    ('Carlos', 'Pereira', '1990-03-10', 'M', 'carlos.pereira@example.com', '(31) 2222-3333', 'CRM98765-MG', 'Dentista', 'Rua C, 789', 'Belo Horizonte', 'MG', '30123-456'),
    ('Ana', 'Fernandes', '1988-11-05', 'F', 'ana.fernandes@example.com', '(41) 5555-4444', 'CRM54321-PR', 'Ortopedista', 'Avenida D, 101', 'Curitiba', 'PR', '80001-234'),
    ('Pedro', 'Oliveira', '1985-12-20', 'M', 'pedro.oliveira@example.com', '(51) 9876-5432', 'CRM12346-RS', 'Ginecologista', 'Rua E, 246', 'Porto Alegre', 'RS', '90012-345'),
    ('Lucia', 'Rocha', '1995-02-14', 'F', 'lucia.rocha@example.com', '(71) 4444-5555', 'CRM98765-BA', 'Neurologista', 'Avenida F, 789', 'Salvador', 'BA', '40023-456'),
    ('Marcos', 'Carvalho', '1983-07-30', 'M', 'marcos.carvalho@example.com', '(81) 1234-5678', 'CRM54321-PE', 'Oftalmologista', 'Rua G, 123', 'Recife', 'PE', '50001-234'),
    ('Isabel', 'Mendes', '1970-09-02', 'F', 'isabel.mendes@example.com', '(61) 5555-4444', 'CRM12345-DF', 'Dermatologista', 'Avenida H, 456', 'Brasília', 'DF', '70012-345'),
    ('Ricardo', 'Sousa', '1982-04-18', 'M', 'ricardo.sousa@example.com', '(91) 9876-5432', 'CRM98766-PA', 'Cirurgião Geral', 'Rua I, 101', 'Belém', 'PA', '66001-234'),
    ('Paula', 'Ferreira', '1978-01-07', 'F', 'paula.ferreira@example.com', '(98) 1234-5678', 'CRM54322-MA', 'Oncologista', 'Avenida J, 246', 'São Luís', 'MA', '65023-456'),
    ('Gustavo', 'Vieira', '1991-06-25', 'M', 'gustavo.vieira@example.com', '(35) 5555-4444', 'CRM12347-MG', 'Cirurgião Plástico', 'Rua K, 123', 'Belo Horizonte', 'MG', '30123-456'),
    ('Larissa', 'Alves', '1989-10-12', 'F', 'larissa.alves@example.com', '(84) 9876-5432', 'CRM98767-RN', 'Endocrinologista', 'Avenida L, 456', 'Natal', 'RN', '59001-234'),
    ('Fernando', 'Santana', '1981-03-27', 'M', 'fernando.santana@example.com', '(14) 1234-5678', 'CRM54323-SP', 'Cirurgião Vascular', 'Rua M, 101', 'São Paulo', 'SP', '01234-567'),
    ('Camila', 'Oliveira', '1993-12-05', 'F', 'camila.oliveira@example.com', '(45) 5555-4444', 'CRM12348-PR', 'Urologista', 'Rua N, 123', 'Curitiba', 'PR', '80001-234'),
    ('Antônio', 'Ramos', '1973-11-18', 'M', 'antonio.ramos@example.com', '(55) 9876-5432', 'CRM98768-RS', 'Médico de Família', 'Avenida O, 456', 'Porto Alegre', 'RS', '90012-345'),
    ('Marta', 'Ferreira', '1987-06-29', 'F', 'marta.ferreira@example.com', '(66) 1234-5678', 'CRM54324-MT', 'Dentista', 'Rua P, 101', 'Cuiabá', 'MT', '78001-234'),
    ('Roberto', 'Almeida', '1974-09-14', 'M', 'roberto.almeida@example.com', '(15) 5555-4444', 'CRM12349-SP', 'Oncologista', 'Avenida Q, 246', 'Sorocaba', 'SP', '18001-234'),
    ('Sandra', 'Machado', '1990-08-07', 'F', 'sandra.machado@example.com', '(17) 9876-5432', 'CRM98769-SP', 'Pneumologista', 'Rua R, 123', 'São José do Rio Preto', 'SP', '15001-234'),
    ('Marcelo', 'Cavalcante', '1986-02-22', 'M', 'marcelo.cavalcante@example.com', '(12) 1234-5678', 'CRM54325-SP', 'Cardiologista', 'Avenida S, 456', 'São Paulo', 'SP', '01234-567'),
    ('Eduarda', 'Lima', '1984-05-10', 'F', 'eduarda.lima@example.com', '(23) 5555-4444', 'CRM12350-ES', 'Pediatra', 'Rua T, 123', 'Vitória', 'ES', '29001-234');
    
    
    INSERT INTO Medico (nome, sobrenome, data_nascimento, sexo, email, telefone, CRM, especialidade, endereco, cidade, estado, cep, img_url)
VALUES
    ('Jão', 'Silva', '1980-05-15', 'M', 'joao.silvas@example.com', '(11) 1234-5678', 'CRM12355-SP', 'Cardiologista', 'Rua A, 123', 'São Paulo', 'SP', '01234-567','https://br.freepik.com/fotos-gratis/medico-sorridente-com-estretoscopio-isolado-em-cinza_26673614.htm');
  
    
    
    DELETE FROM HorariosDisponiveis WHERE id_medico = 2;
DELETE FROM Medico WHERE id = 2;
    DELETE FROM Medico WHERE id = 2;