-- Criando tabela de exemplo

CREATE TABLE `example` (
  `id` bigint(20) AUTO_INCREMENT,
  `name` varchar(255) NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Inserindo dados de exemplo

INSERT INTO `example` (`id`, `name`) VALUES (1, 'Exemplo 1');
INSERT INTO `example` (`id`, `name`) VALUES (2, 'Exemplo 2');
INSERT INTO `example` (`id`, `name`) VALUES (3, 'Exemplo 3');
INSERT INTO `example` (`id`, `name`) VALUES (4, 'Exemplo 4');
INSERT INTO `example` (`id`, `name`) VALUES (5, 'Exemplo 5');
