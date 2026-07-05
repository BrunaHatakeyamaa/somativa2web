SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `unidades` (
  `idUnidade` INT AUTO_INCREMENT PRIMARY KEY,
  `nomeUnidade` varchar(100) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `imagem` varchar(100) NOT NULL
)

INSERT INTO `unidades` (nomeUnidade, endereco, imagem)
VALUES (
  "Unidade Bigorrilho",
  "Rua Alferes Ângelo Sampaio, 1250 – Bigorrilho, Curitiba – PR, CEP 80730-460",
  "unidade1.png"
)

INSERT INTO `unidades` (nomeUnidade, endereco, imagem)
VALUES (
  "Unidade Batel",
  "Avenida Sete de Setembro, 3845 – Batel, Curitiba – PR, CEP 80230-010",
  "unidade2.png"
)

INSERT INTO `unidades` (nomeUnidade, endereco, imagem)
VALUES (
  "Unidade Mercês",
  "Rua Padre Anchieta, 2155 – Mercês, Curitiba – PR, CEP 80730-000",
  "unidade3.png"
)

INSERT INTO `unidades` (nomeUnidade, endereco, imagem)
VALUES (
  "Unidade Alto da XV",
  "Rua Itupava, 980 – Alto da XV, Curitiba – PR, CEP 80045-305",
  "unidade4.png"
)

CREATE TABLE `usuarios` (
  `idUsuario` INT AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
)

CREATE TABLE `alunos` (
  `idAluno` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `idUnidade` int(11) DEFAULT NULL,
  CONSTRAINT fk_aluno_unidade 
  FOREIGN KEY (idUnidade) 
  REFERENCES unidades(idUnidade)
  ON DELETE CASCADE
  ON UPDATE CASCADE
)

INSERT INTO `usuarios` (`email`, `senha`) VALUES
('admin@pilates.com', '$2y$10$Ld4aADuzg8eQv9B8ecDT..CWuQnEga/aiT.fvrjVR.lq/ZjyTOsku')

