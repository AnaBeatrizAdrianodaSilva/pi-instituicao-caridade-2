CREATE TABLE `cadastro` (
  `codigoUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


---------------------------

CREATE TABLE `cadastInst` (
  `codInst` int(11) NOT NULL,
  `NomeInstituicao` varchar(255) NOT NULL,
  `TipoInstituicao` varchar(255) NOT NULL,
  `EmailInstituicao` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--------------Exemplo de alterar/AUTO_INCREMENT--------------
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codProduto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `codProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;