/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.6.15-log : Database - loja_virtual
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`loja_virtual` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `loja_virtual`;

/*Table structure for table `boleto` */

DROP TABLE IF EXISTS `boleto`;

CREATE TABLE `boleto` (
  `Parcelas_idParcela` int(10) unsigned NOT NULL,
  `banco` varchar(20) NOT NULL,
  `codigoBancario` varchar(20) NOT NULL,
  PRIMARY KEY (`Parcelas_idParcela`),
  KEY `Boleto_FKIndex1` (`Parcelas_idParcela`),
  CONSTRAINT `boleto_ibfk_1` FOREIGN KEY (`Parcelas_idParcela`) REFERENCES `parcelas` (`idParcela`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `cartao` */

DROP TABLE IF EXISTS `cartao`;

CREATE TABLE `cartao` (
  `Parcelas_idParcela` int(10) unsigned NOT NULL,
  `bandeira` varchar(20) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `validade` date NOT NULL,
  PRIMARY KEY (`Parcelas_idParcela`,`bandeira`,`numero`,`validade`),
  KEY `Cartao_FKIndex1` (`Parcelas_idParcela`),
  CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`Parcelas_idParcela`) REFERENCES `parcelas` (`idParcela`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `estadoCivil` varchar(20) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idCliente` int(11) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idEndereco`),
  KEY `endereco_FKIndex1` (`cliente_idCliente`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `estoque_midia` */

DROP TABLE IF EXISTS `estoque_midia`;

CREATE TABLE `estoque_midia` (
  `idEstoque_Midia` int(11) NOT NULL AUTO_INCREMENT,
  `Midia_idMidia` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`idEstoque_Midia`),
  KEY `Estoque_Midia_FKIndex1` (`Midia_idMidia`),
  CONSTRAINT `estoque_midia_ibfk_1` FOREIGN KEY (`Midia_idMidia`) REFERENCES `midia` (`idMidia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `genero_catalogo` */

DROP TABLE IF EXISTS `genero_catalogo`;

CREATE TABLE `genero_catalogo` (
  `idGenero_Catalogo` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(30) NOT NULL,
  PRIMARY KEY (`idGenero_Catalogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `midia` */

DROP TABLE IF EXISTS `midia`;

CREATE TABLE `midia` (
  `idMidia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `subtitulo` varchar(30) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `idPlataforma` int(11) NOT NULL,
  PRIMARY KEY (`idMidia`),
  KEY `fk_idPlataforma` (`idPlataforma`),
  CONSTRAINT `fk_idPlataforma` FOREIGN KEY (`idPlataforma`) REFERENCES `plataforma_catalogo` (`idPlataforma_Catalogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `midia_genero` */

DROP TABLE IF EXISTS `midia_genero`;

CREATE TABLE `midia_genero` (
  `idGenero_Catalogo` int(11) NOT NULL,
  `Midia_idMidia` int(11) NOT NULL,
  KEY `Midia_Genero_FKIndex1` (`Midia_idMidia`),
  KEY `Midia_Genero_FKIndex2` (`idGenero_Catalogo`),
  CONSTRAINT `midia_genero_ibfk_1` FOREIGN KEY (`Midia_idMidia`) REFERENCES `midia` (`idMidia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `midia_genero_ibfk_2` FOREIGN KEY (`idGenero_Catalogo`) REFERENCES `genero_catalogo` (`idGenero_Catalogo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `movimentacao_estoque` */

DROP TABLE IF EXISTS `movimentacao_estoque`;

CREATE TABLE `movimentacao_estoque` (
  `idMov_Estoque` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo_Mov_idTipo_Mov` int(10) unsigned NOT NULL,
  `Estoque_Midia_idEstoque_Midia` int(11) NOT NULL,
  `dataRegistro` date NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idMov_Estoque`),
  KEY `Registro_Estoque_FKIndex1` (`Estoque_Midia_idEstoque_Midia`),
  KEY `Registro_Estoque_FKIndex2` (`Tipo_Mov_idTipo_Mov`),
  CONSTRAINT `movimentacao_estoque_ibfk_1` FOREIGN KEY (`Estoque_Midia_idEstoque_Midia`) REFERENCES `estoque_midia` (`idEstoque_Midia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `movimentacao_estoque_ibfk_2` FOREIGN KEY (`Tipo_Mov_idTipo_Mov`) REFERENCES `tipo_mov` (`idTipo_Mov`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `parcelas` */

DROP TABLE IF EXISTS `parcelas`;

CREATE TABLE `parcelas` (
  `idParcela` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pedido_idPedido` int(11) NOT NULL,
  `dataCadastro` date NOT NULL,
  `valorParcela` decimal(10,2) NOT NULL,
  `valorDesconto` decimal(10,2) DEFAULT NULL,
  `valorJuros` decimal(10,2) DEFAULT NULL,
  `valorRecebido` decimal(10,2) DEFAULT NULL,
  `vencimento` date NOT NULL,
  `tipoPagamento` set('Boleto','Cartão') NOT NULL,
  `situcacao` set('Em aberto','Pago') NOT NULL,
  PRIMARY KEY (`idParcela`),
  KEY `Parcelas_FKIndex1` (`Pedido_idPedido`),
  CONSTRAINT `parcelas_ibfk_1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idCliente` int(11) NOT NULL,
  `situacao` set('Em análise','Aprovado','Separado','Entregue','Finalizado') NOT NULL,
  `dataPedido` datetime NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `formaPagamento` set('A vista','Parcelado') NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `Pedido_FKIndex1` (`cliente_idCliente`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `pedido_midias` */

DROP TABLE IF EXISTS `pedido_midias`;

CREATE TABLE `pedido_midias` (
  `idPedido_Midia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pedido_idPedido` int(11) NOT NULL,
  `Midia_idMidia` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valorUnitario` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idPedido_Midia`),
  KEY `Quantidade_Pedidos_FKIndex1` (`Pedido_idPedido`),
  KEY `Quantidade_Pedidos_FKIndex2` (`Midia_idMidia`),
  CONSTRAINT `pedido_midias_ibfk_1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pedido_midias_ibfk_2` FOREIGN KEY (`Midia_idMidia`) REFERENCES `midia` (`idMidia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `plataforma_catalogo` */

DROP TABLE IF EXISTS `plataforma_catalogo`;

CREATE TABLE `plataforma_catalogo` (
  `idPlataforma_Catalogo` int(11) NOT NULL AUTO_INCREMENT,
  `plataforma` varchar(30) NOT NULL,
  PRIMARY KEY (`idPlataforma_Catalogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `recados` */

DROP TABLE IF EXISTS `recados`;

CREATE TABLE `recados` (
  `idRecado` int(11) NOT NULL AUTO_INCREMENT,
  `remetente` varchar(50) NOT NULL,
  `mensagem` longtext NOT NULL,
  `dataRecado` date NOT NULL,
  `lido` tinyint(1) NOT NULL,
  `assunto` varchar(30) NOT NULL,
  PRIMARY KEY (`idRecado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `telefone` */

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE `telefone` (
  `idTelefone` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idCliente` int(11) NOT NULL,
  `prefixo` varchar(3) DEFAULT NULL,
  `numTel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idTelefone`),
  KEY `telefone_FKIndex1` (`cliente_idCliente`),
  CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `tipo_mov` */

DROP TABLE IF EXISTS `tipo_mov`;

CREATE TABLE `tipo_mov` (
  `idTipo_Mov` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` longtext NOT NULL,
  `tipoMov` set('Entrada','Sa�da') NOT NULL,
  PRIMARY KEY (`idTipo_Mov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `cliente_idCliente` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel` enum('0','1') NOT NULL,
  PRIMARY KEY (`cliente_idCliente`),
  KEY `usuario_FKIndex1` (`cliente_idCliente`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
