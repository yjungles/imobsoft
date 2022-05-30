-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.24 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para vistasoft
CREATE DATABASE IF NOT EXISTS `vistasoft` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `vistasoft`;

-- Copiando estrutura para tabela vistasoft.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dia_repasse` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela vistasoft.clientes: ~13 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `dia_repasse`) VALUES
	(1, 'Cliente um', 'cliente1@teste.com', '(41) 99988-9977', 5),
	(2, 'Cliente dois', 'cliente2@teste.com', '(41) 99988-9977', 6),
	(3, 'Cliente tres', 'cliente3@teste.com', '(41) 99988-9977', 5),
	(4, 'Cliente quatro', 'cliente4@teste.com', '(41) 99988-9977', 12),
	(5, 'Cliente cinco', 'cliente5@teste.com', '(41) 99988-9977', 5),
	(6, 'Cliente seis', 'cliente6@teste.com', '(41) 99988-9977', 7),
	(7, 'Cliente sete', 'cliente7@teste.com', '(41) 99988-9977', 5),
	(8, 'Cliente oito', 'cliente8@teste.com', '(41) 99988-9977', 25),
	(10, 'Cliente dez', 'cliente10@teste.com', '(41) 99988-9977', 5);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela vistasoft.contratos
CREATE TABLE IF NOT EXISTS `contratos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_inicio` date NOT NULL,
  `dt_fim` date NOT NULL,
  `tx_administracao` decimal(10,2) NOT NULL DEFAULT '0.00',
  `val_aluguel` decimal(10,2) NOT NULL DEFAULT '0.00',
  `val_condominio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `val_iptu` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cliente_id` int NOT NULL,
  `imovel_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `contrato_cliente` (`cliente_id`),
  KEY `contrato_imovel` (`imovel_id`),
  CONSTRAINT `contrato_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `contrato_imovel` FOREIGN KEY (`imovel_id`) REFERENCES `imoveis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela vistasoft.contratos: ~8 rows (aproximadamente)
DELETE FROM `contratos`;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;

-- Copiando estrutura para tabela vistasoft.imoveis
CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(125) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `proprietario_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `imovel_proprietario` (`proprietario_id`),
  CONSTRAINT `imovel_proprietario` FOREIGN KEY (`proprietario_id`) REFERENCES `proprietarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela vistasoft.imoveis: ~5 rows (aproximadamente)
DELETE FROM `imoveis`;
/*!40000 ALTER TABLE `imoveis` DISABLE KEYS */;
INSERT INTO `imoveis` (`id`, `nome`, `endereco`, `proprietario_id`) VALUES
	(2, 'imovel de campo', 'Rua dos campos', 3),
	(3, 'imóvel na praia', 'Rua das areias', 1);
/*!40000 ALTER TABLE `imoveis` ENABLE KEYS */;

-- Copiando estrutura para tabela vistasoft.mensalidades
CREATE TABLE IF NOT EXISTS `mensalidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_vencimento` date NOT NULL,
  `val_mensalidade` decimal(10,2) NOT NULL,
  `contrato_id` int NOT NULL,
  `is_paga` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mensalidade_status` (`is_paga`) USING BTREE,
  KEY `mensalidade_contrato` (`contrato_id`),
  CONSTRAINT `mensalidade_contrato` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela vistasoft.mensalidades: ~64 rows (aproximadamente)
DELETE FROM `mensalidades`;
/*!40000 ALTER TABLE `mensalidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensalidades` ENABLE KEYS */;

-- Copiando estrutura para tabela vistasoft.proprietarios
CREATE TABLE IF NOT EXISTS `proprietarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dia_repasse` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela vistasoft.proprietarios: ~3 rows (aproximadamente)
DELETE FROM `proprietarios`;
/*!40000 ALTER TABLE `proprietarios` DISABLE KEYS */;
INSERT INTO `proprietarios` (`id`, `nome`, `email`, `telefone`, `dia_repasse`) VALUES
	(1, 'Proprietario', 'prop@email.com', '(41) 99999-9999', 1),
	(3, 'Proprietário 2', 'prop2@gmail.com', '(41) 99999-9999', 16),
	(4, 'Proprietário 3', 'prop2@gmail.com', '(45) 46551-6515', 7);
/*!40000 ALTER TABLE `proprietarios` ENABLE KEYS */;

-- Copiando estrutura para tabela vistasoft.repasses
CREATE TABLE IF NOT EXISTS `repasses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_repasse` date NOT NULL,
  `val_repasse` decimal(10,2) NOT NULL,
  `contrato_id` int NOT NULL,
  `is_repassada` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `repasse_contrato` (`contrato_id`),
  KEY `repasse_status` (`is_repassada`) USING BTREE,
  CONSTRAINT `repasse_contrato` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela vistasoft.repasses: ~24 rows (aproximadamente)
DELETE FROM `repasses`;
/*!40000 ALTER TABLE `repasses` DISABLE KEYS */;
/*!40000 ALTER TABLE `repasses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
