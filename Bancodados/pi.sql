CREATE TABLE `cadastro` (
  `codigoUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


---------------------------

CREATE TABLE `cadastinst` (
  `codInst` int(11) NOT NULL,
  `NomeInstituicao` varchar(255) NOT NULL,
  `LinkInstituicao` varchar(255) NOT NULL,
  `EmailInstituicao` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `tipoInst` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--------------Exemplo de alterar/AUTO_INCREMENT--------------
ALTER TABLE `cadastinst`
  ADD PRIMARY KEY (`codInst`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`codigoUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `cadastinst`
  MODIFY `codInst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `cadastro`
  MODIFY `codigoUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;