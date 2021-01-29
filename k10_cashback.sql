# Host: localhost  (Version 5.5.5-10.4.11-MariaDB)
# Date: 2021-01-28 14:56:57
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'Felipe Carvalho','admin@admin.com','21232f297a57a5a743894a0e4a801fc3','img1.png');

#
# Structure for table "cliente"
#

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `nascimento` date NOT NULL,
  `nome_equipe` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `url_img_cliente` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "cliente"
#


#
# Structure for table "loja"
#

DROP TABLE IF EXISTS `loja`;
CREATE TABLE `loja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_responsavel` varchar(50) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `nome_loja` varchar(50) NOT NULL,
  `valor_cashback` decimal(10,2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `url_img_loja` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "loja"
#


#
# Structure for table "cashback"
#

DROP TABLE IF EXISTS `cashback`;
CREATE TABLE `cashback` (
  `id` int(11) NOT NULL,
  `id_loja` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_cashback` decimal(10,2) NOT NULL,
  `img_cupom_fiscal` varchar(200) NOT NULL,
  `data_compra` date NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `inserido_por` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkcashback_id_loja` (`id_loja`),
  KEY `fkcashback_id_cliente` (`id_cliente`),
  CONSTRAINT `fkcashback_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `fkcashback_id_loja` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "cashback"
#

