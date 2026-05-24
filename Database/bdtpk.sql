-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/05/2026 às 20:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtpk`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `campanha`
--

CREATE TABLE `campanha` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `sistema` varchar(100) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `campanha`
--

INSERT INTO `campanha` (`id`, `nome`, `descricao`, `imagem`, `sistema`, `usuario_id`) VALUES
(1, 'Campanha teste', 'Esta é uma campanha teste que acontece varias aventuras.', NULL, 'Dungeons and Dragons', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `personagem`
--

CREATE TABLE `personagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `classe` varchar(100) DEFAULT NULL,
  `subclasse` varchar(100) DEFAULT NULL,
  `historia` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `forca` int(11) DEFAULT NULL,
  `destreza` int(11) DEFAULT NULL,
  `constituicao` int(11) DEFAULT NULL,
  `inteligencia` int(11) DEFAULT NULL,
  `sabedoria` int(11) DEFAULT NULL,
  `carisma` int(11) DEFAULT NULL,
  `vida` int(11) DEFAULT NULL,
  `armadura` int(11) DEFAULT NULL,
  `velocidade` varchar(20) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `campanha_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `personagem`
--

INSERT INTO `personagem` (`id`, `nome`, `classe`, `subclasse`, `historia`, `level`, `forca`, `destreza`, `constituicao`, `inteligencia`, `sabedoria`, `carisma`, `vida`, `armadura`, `velocidade`, `usuario_id`, `campanha_id`) VALUES
(1, 'Personagem teste', 'Barbaro', 'Fanático', 'Ele é um guerreiro forasteiro preso numa terra misteriosa.', 10, 20, 15, 16, 10, 12, 13, 88, 16, '9 m', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessao`
--

CREATE TABLE `sessao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data_sessao` date DEFAULT NULL,
  `resumo` varchar(255) DEFAULT NULL,
  `campanha_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sessao`
--

INSERT INTO `sessao` (`id`, `nome`, `data_sessao`, `resumo`, `campanha_id`) VALUES
(1, 'Sessao 0', '2026-05-16', 'Esta foi a primeira sessão, comecou a aventura.', 1),
(2, 'Sessao 1', '2026-05-23', 'Os herois enfrentaram goblins e ganharam a batalha.', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Daniel', 'daniel@gmail.com', 'a12345678'),
(2, 'Joao', 'joaozinho@hotmail.com', 'senha123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `campanha`
--
ALTER TABLE `campanha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `campanha_id` (`campanha_id`);

--
-- Índices de tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campanha_id` (`campanha_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `campanha`
--
ALTER TABLE `campanha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `campanha`
--
ALTER TABLE `campanha`
  ADD CONSTRAINT `campanha_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `personagem`
--
ALTER TABLE `personagem`
  ADD CONSTRAINT `personagem_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personagem_ibfk_2` FOREIGN KEY (`campanha_id`) REFERENCES `campanha` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `sessao`
--
ALTER TABLE `sessao`
  ADD CONSTRAINT `sessao_ibfk_1` FOREIGN KEY (`campanha_id`) REFERENCES `campanha` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
