-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2023 às 23:54
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_pj`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_pj`
--

CREATE TABLE `tbl_pj` (
  `id_cliente` int(6) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cep` int(8) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `data_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tbl_pj`
--

INSERT INTO `tbl_pj` (`id_cliente`, `nome`, `email`, `cpf`, `cep`, `telefone`, `senha`, `data_reg`) VALUES
(14, 'Augusto Cesar', 'augusto@email.com', '501165458-4', 2548070, 11945678901, '$2y$10$E3182ZR8V71e3Vas7SmUn.NiO4zGXIKbWYSdlmFn3FYO3gth7fL/u', '2023-12-08 22:52:28');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_pj`
--
ALTER TABLE `tbl_pj`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_pj`
--
ALTER TABLE `tbl_pj`
  MODIFY `id_cliente` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
