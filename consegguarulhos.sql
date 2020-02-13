# Host: 23.229.222.66  (Version 5.6.44-cll-lve)
# Date: 2020-02-13 07:24:23
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "cidadao"
#

DROP TABLE IF EXISTS `cidadao`;
CREATE TABLE `cidadao` (
  `CIDIDCIDADAO` int(255) DEFAULT NULL,
  `CIDNOME` varchar(150) DEFAULT NULL,
  `CIDEMAIL` varchar(150) DEFAULT NULL,
  `CIDCELULAR` int(11) DEFAULT NULL,
  `CIDSTATUS` int(10) DEFAULT NULL,
  `CONIDCONSEG` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "cidadao"
#


#
# Structure for table "comentarios"
#

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `COMIDCODIGO` int(255) NOT NULL,
  `DEMIDDEMANDA` int(10) NOT NULL,
  `USUIDCODIGO` int(10) NOT NULL,
  `COMDATA` date NOT NULL,
  `COMHORA` time NOT NULL,
  `COMTEXTO` blob NOT NULL,
  PRIMARY KEY (`COMIDCODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "comentarios"
#


#
# Structure for table "conseg"
#

DROP TABLE IF EXISTS `conseg`;
CREATE TABLE `conseg` (
  `CONIDCONSEG` int(255) NOT NULL AUTO_INCREMENT,
  `CONNOME` varchar(100) DEFAULT NULL,
  `CONPRESIDENTE` varchar(100) DEFAULT NULL,
  `CONPRESIDENTETELEFONE` int(11) DEFAULT NULL,
  `CONPRESIDENTEEMAIL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CONIDCONSEG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "conseg"
#


#
# Structure for table "demanda"
#

DROP TABLE IF EXISTS `demanda`;
CREATE TABLE `demanda` (
  `DEMIDDEMANDA` int(255) DEFAULT NULL,
  `DEMIDCODIGO` int(10) DEFAULT NULL,
  `CIDIDCIDADAO` int(10) DEFAULT NULL,
  `DEMDATA` date DEFAULT NULL,
  `DEMHORA` time DEFAULT NULL,
  `DEMTEXTO` blob,
  `SECIDSECRETARIA` int(10) DEFAULT NULL,
  `STAIDSTATUS` int(255) NOT NULL AUTO_INCREMENT,
  `DEMIDPRIVACIDADE` binary(1) NOT NULL,
  `DEMENDERECO` varchar(150) NOT NULL,
  `DEMCOMPLEMENTO` varchar(100) NOT NULL,
  `DEMBAIRRO` varchar(50) NOT NULL,
  `DEMESTADO` varchar(30) NOT NULL,
  `DEMCEP` varchar(8) NOT NULL,
  `DEMUF` varchar(2) NOT NULL,
  PRIMARY KEY (`STAIDSTATUS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "demanda"
#


#
# Structure for table "historicostatus"
#

DROP TABLE IF EXISTS `historicostatus`;
CREATE TABLE `historicostatus` (
  `STAIDCODIGO` int(255) NOT NULL,
  `DEMIDDEMANDA` int(255) NOT NULL,
  `USUIDCODIGO` int(255) NOT NULL,
  `HISIDCODIGO` int(255) NOT NULL,
  `HISDATA` date NOT NULL,
  `HISHORA` time NOT NULL,
  PRIMARY KEY (`STAIDCODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "historicostatus"
#


#
# Structure for table "secretaria"
#

DROP TABLE IF EXISTS `secretaria`;
CREATE TABLE `secretaria` (
  `SECIDSECRETARIA` int(255) NOT NULL AUTO_INCREMENT,
  `SECNOME` varchar(150) DEFAULT NULL,
  `SECRESPONSAVEL` varchar(100) DEFAULT NULL,
  `SECRESPONSAVELTELEFONE` int(11) DEFAULT NULL,
  `SECRESPONSAVELEMAIL` varchar(100) DEFAULT NULL,
  `CONIDCONSEG` int(10) DEFAULT NULL,
  PRIMARY KEY (`SECIDSECRETARIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "secretaria"
#


#
# Structure for table "status"
#

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `STAIDCODIGO` int(255) NOT NULL AUTO_INCREMENT,
  `STANOME` varchar(50) NOT NULL,
  PRIMARY KEY (`STAIDCODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "status"
#


#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `USUIDUSUARIO` int(255) NOT NULL AUTO_INCREMENT,
  `USUNOME` varchar(100) NOT NULL,
  `USUCPF` varchar(11) NOT NULL,
  `USUTELEFONE` int(11) NOT NULL,
  `USUEMAIL` varchar(100) NOT NULL,
  `USUSENHA` varchar(50) NOT NULL,
  `USUSTATUS` tinyint(2) NOT NULL,
  `USUINCLUSAO` datetime NOT NULL,
  `USUALTERACAO` datetime NOT NULL,
  `USURELATORIOS` int(10) DEFAULT NULL,
  `USUADMINISTRADOR` int(2) NOT NULL,
  `CONIDCONSEG` int(10) NOT NULL,
  PRIMARY KEY (`USUIDUSUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "usuario"
#

