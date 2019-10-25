# Host: localhost  (Version 8.0.17)
# Date: 2019-10-25 01:05:33
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "perguntas"
#

DROP TABLE IF EXISTS `perguntas`;
CREATE TABLE `perguntas` (
  `id_pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(200) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pergunta`),
  KEY `id_tema` (`id_tema`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perguntas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "perguntas"
#


#
# Structure for table "respostas"
#

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE `respostas` (
  `id_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pergunta` int(11) DEFAULT NULL,
  `resposta` varchar(200) DEFAULT NULL,
  `correta` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_resposta`),
  KEY `id_pergunta` (`id_pergunta`),
  CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id_pergunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "respostas"
#


#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'Sebastião Ricardo','admin','admin'),(2,'Paulo Henrique','phenrique','phenrique'),(3,'Isadora de Faria','isadora','isadora');

#
# Structure for table "temas"
#

DROP TABLE IF EXISTS `temas`;
CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT '1',
  PRIMARY KEY (`id_tema`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED;

#
# Data for table "temas"
#


#
# Structure for table "participantes"
#

DROP TABLE IF EXISTS `participantes`;
CREATE TABLE `participantes` (
  `id_participante` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `data_participacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_participante`),
  KEY `id_tema` (`id_tema`),
  CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "participantes"
#

