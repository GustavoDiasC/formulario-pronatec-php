-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/05/2023 às 20:25
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `form_pronatec`
--

CREATE TABLE `form_pronatec` (
  `nome` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `estado_civil` varchar(30) NOT NULL,
  `sexo` varchar(40) NOT NULL,
  `mae` varchar(45) NOT NULL,
  `pai` varchar(45) NOT NULL,
  `nacionalidade` varchar(45) NOT NULL,
  `naturalidade` varchar(45) NOT NULL,
  `cor_etnia` varchar(45) NOT NULL,
  `situacoes_ocup` varchar(20) NOT NULL,
  `nome_empresa` varchar(30) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `funcao` varchar(30) NOT NULL,
  `necessidades_esp` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `telefone1` varchar(45) NOT NULL,
  `telefone2` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `seguro_des` varchar(45) NOT NULL,
  `aux_financ` varchar(45) NOT NULL,
  `oferta_emprego` varchar(45) NOT NULL,
  `uso_imagem` varchar(45) NOT NULL,
  `divulg_produtos` varchar(45) NOT NULL,
  `nome_resp` varchar(45) NOT NULL,
  `cpf_resp` varchar(45) NOT NULL,
  `rg_resp` varchar(45) NOT NULL,
  `orgao_exp` varchar(45) NOT NULL,
  `ensino_fund` varchar(45) NOT NULL,
  `ensino_med` varchar(45) NOT NULL,
  `ensino_sup` varchar(45) NOT NULL,
  `escola_nome` varchar(45) NOT NULL,
  `escola_municipio` varchar(45) NOT NULL,
  `uf_escola` varchar(45) NOT NULL,
  `tipo_ensino` varchar(45) NOT NULL,
  `modalidade_ensino` varchar(45) NOT NULL,
  `mat_redepub` varchar(45) NOT NULL,
  `tipo_matricula` varchar(45) NOT NULL,
  `tipo_curso` varchar(30) NOT NULL,
  `curso_fic` varchar(45) NOT NULL,
  `curso_tecnico` varchar(45) NOT NULL,
  `turno_curso` varchar(45) NOT NULL,
  `horario_curso` varchar(45) NOT NULL,
  `id` int(11) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `form_pronatec`
--

INSERT INTO `form_pronatec` (`nome`, `data_nasc`, `estado_civil`, `sexo`, `mae`, `pai`, `nacionalidade`, `naturalidade`, `cor_etnia`, `situacoes_ocup`, `nome_empresa`, `cnpj`, `funcao`, `necessidades_esp`, `endereco`, `bairro`, `cidade`, `uf`, `cep`, `telefone1`, `telefone2`, `email`, `seguro_des`, `aux_financ`, `oferta_emprego`, `uso_imagem`, `divulg_produtos`, `nome_resp`, `cpf_resp`, `rg_resp`, `orgao_exp`, `ensino_fund`, `ensino_med`, `ensino_sup`, `escola_nome`, `escola_municipio`, `uf_escola`, `tipo_ensino`, `modalidade_ensino`, `mat_redepub`, `tipo_matricula`, `tipo_curso`, `curso_fic`, `curso_tecnico`, `turno_curso`, `horario_curso`, `id`, `senha`) VALUES
('raul denis', '1995-08-24', 'Solteiro', 'Masculino', 'Júlia', 'Valdemar', 'Brasileiro', 'Cachoeiro de itapermirm', 'Parda', 'Autônomo', '', '', '', 'Nenhuma', 'confins do universo', 'jabuticabeira', 'viana', 'Es', '29026300', '28977557666', '2785645999', 'zeca@gmail.com', 'Sim', 'Sim', 'Sim', 'Sim', 'Não', '', '', '', '', 'Completo', 'Completo', 'Completo', 'escolinha poderosa municipal da rua lovecraft', 'Betim', 'MG', 'Regular', 'Público Municipal', 'Sim', 'Ensino médio', 'Curso fic', 'WORD E EXCEL', '', 'NOTURNO', '18h às 22h', 4, '12345678'),
('zeca marcodes', '1998-08-24', 'Solteiro', 'Masculino', 'maruina', 'lokeine', 'Brasileiro', 'Espirito santo', 'Indígena', 'Autônomo', '', '', '', 'Nenhuma', 'rua das palmeiras', 'bairro chique', 'intanhanhem', 'ES', '29056433222', '28995656577', '2796565546', 'sfgsd@gmask.com', 'Sim', 'Sim', 'Sim', 'Sim', 'Sim', '', '', '', '', 'Completo', 'Completo', 'Completo', 'escolinha dos loucos', 'Tatuape', 'ES', 'Regular', 'Público Federal', 'Sim', 'EJA - Ensino médio', 'Curso fic', 'AUXILIAR ADMINISTRATIVO', '', 'MATUTINO', '7h às 11h', 5, '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `form_pronatec`
--
ALTER TABLE `form_pronatec`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `form_pronatec`
--
ALTER TABLE `form_pronatec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
