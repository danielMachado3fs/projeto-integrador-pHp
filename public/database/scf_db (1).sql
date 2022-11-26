-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2022 às 21:29
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `scf_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `dataNascimento` varchar(30) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(150) NOT NULL,
  `cep` varchar(150) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `setor` varchar(50) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `dataNascimento`, `cpf`, `email`, `telefone`, `cep`, `cidade`, `estado`, `logradouro`, `bairro`, `numero`, `complemento`, `setor`, `cargo`, `created_at`, `deleted`) VALUES
(1, 'Daniel', '1990-02-18', '111.111.111-11', 'teste@teste.com', '(33) 33333-3333', '35170-272', 'Coronel Fabriciano', 'MG', 'Rua Vicente Barbosa', 'Santa Rita', 1522, 'Casa', 'logistica', 'Motorista', '2022-11-22 13:37:28', 0),
(2, 'Fabricio', '1991-10-20', '132.468.406-28', 'fabricio@teste.com', '(77) 77755-5555', '35170-300', 'Coronel Fabriciano', 'MG', 'Rua Pedro Nolasco', 'Centro', 963, 'Casa', 'financeiro', 'Gerente', '2022-11-22 22:41:22', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postos`
--

CREATE TABLE `postos` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `nomeFantasia` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postos`
--

INSERT INTO `postos` (`id`, `cnpj`, `email`, `telefone`, `cep`, `cidade`, `estado`, `logradouro`, `bairro`, `numero`, `complemento`, `nomeFantasia`, `created_at`, `deleted`) VALUES
(1, '11.111.111/1111-11', 'shell@teste.com', '33333333333', '35170272', 'Coronel Fabriciano', 'MG', 'Tancredo Neves', 'Caladinho', '1235', 'Posto', 'Posto Shell', '2022-11-23 01:20:06', 0),
(2, '11.111.111/1111-11', 'petro@teste.com', '(33) 3 3333-333', '35170-299', 'Coronel Fabriciano', 'MG', 'Tancredo Neves', 'Coronel Fabriciano', '1235', 'Posto comb', 'Posto Petrobras', '2022-11-23 01:13:14', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `motoristaId` int(11) NOT NULL,
  `postoCombustivelId` int(11) NOT NULL,
  `veiculoId` int(11) NOT NULL,
  `tipoCombustivel` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `dataEmissao` date NOT NULL,
  `dataValidade` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'LIBERADO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tickets`
--

INSERT INTO `tickets` (`id`, `motoristaId`, `postoCombustivelId`, `veiculoId`, `tipoCombustivel`, `valor`, `dataEmissao`, `dataValidade`, `status`, `created_at`, `deleted`) VALUES
(1, 1, 1, 2, 'gasolina-aditivada', 100, '2022-11-26', '2022-11-30', 'LIBERADO', '2022-11-26 02:27:33', 0),
(2, 1, 1, 2, 'gasolina-aditivada', 100, '2022-11-26', '2022-11-30', 'LIBERADO', '2022-11-26 02:27:54', 0),
(3, 1, 2, 1, 'diesel', 350, '2022-11-26', '2022-12-01', 'LIBERADO', '2022-11-26 20:10:26', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created_at`, `deleted`) VALUES
(1, 'Guilherme Aquino', 'guilherme@gmail.com', '123456', '2022-11-23 02:09:58', 0),
(2, 'Daniel Machado', 'daniel@gmail.com', '1234', '2022-11-23 02:09:47', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `anoFabricacao` varchar(10) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `dataAquisicao` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `placa`, `modelo`, `marca`, `anoFabricacao`, `tipo`, `dataAquisicao`, `valor`, `deleted`) VALUES
(1, 'ABC1234', 'S10', 'CHEVROLET', '2020', 'carro', '2022-11-15', '50000.00', 0),
(2, 'HDV2133', 'GOL', 'VOLKSWAGEN', '2022', 'carro', '2022-10-10', '16000.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `_veiculo`
--

CREATE TABLE `_veiculo` (
  `id` int(11) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `anoFabricacao` varchar(10) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `dataAquisicao` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `_veiculo`
--

INSERT INTO `_veiculo` (`id`, `placa`, `modelo`, `marca`, `anoFabricacao`, `tipo`, `dataAquisicao`, `valor`, `deleted`) VALUES
(1, 'ABC1234', 'S10', 'CHEVROLET', '2021', 'carro', '2022-11-15', '50000.00', 1),
(2, 'HDV2133', 'GOL', 'VOLKSWAGEN', '2006', 'carro', '2022-10-10', '16000.00', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `postos`
--
ALTER TABLE `postos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_PLACA` (`placa`),
  ADD KEY `IX_MARCA` (`marca`),
  ADD KEY `IX_MARCA_TIPO` (`marca`,`tipo`);

--
-- Índices para tabela `_veiculo`
--
ALTER TABLE `_veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `postos`
--
ALTER TABLE `postos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de tabela `_veiculo`
--
ALTER TABLE `_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
