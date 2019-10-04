
USE `quizsnct`;
DROP TABLE IF EXISTS `perguntas`;
CREATE TABLE `perguntas` (
  `id_pergunta` int(11) NOT NULL auto_increment,
  `pergunta` varchar(200) default NULL,
  `data_cadastro` datetime default NULL,
  `id_usuario` int(11) default NULL,
  `id_tema` int(11) default NULL,
  PRIMARY KEY  (`id_pergunta`),
  KEY `id_tema` (`id_tema`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `perguntas` VALUES (1,'Em qual cidade fica localizado o Santuário de Pedra Caída?','2019-09-19 10:58:49',1,2);
INSERT INTO `perguntas` VALUES (2,'Qual é o valor da entrada no Santuário de Pedra Caída?','2019-09-19 11:32:49',1,2);
INSERT INTO `perguntas` VALUES (3,'Em qual cidade ficam localizadas as cachoeiras do Itapecuru?','2019-09-19 11:33:49',1,1);
INSERT INTO `perguntas` VALUES (4,'Qual a profundidade do poço azul?','2019-09-19 11:34:16',1,3);
INSERT INTO `perguntas` VALUES (5,'Qual a diferença do Poço Azul para o Encanto Azul?','2019-09-19 11:34:47',1,3);
INSERT INTO `perguntas` VALUES (6,'Qual é o nome da Cachoeira que fica no Poço Azul?','2019-09-19 11:35:06',1,3);
INSERT INTO `perguntas` VALUES (7,'Quantos Km separam as cachoeiras do Itapecuru da cidade de Carolina?','2019-09-19 11:40:29',1,1);
INSERT INTO `perguntas` VALUES (8,'Quantos alunos têm na turma?','2019-09-26 12:00:35',1,7);
DROP TABLE IF EXISTS `respostas`;
CREATE TABLE `respostas` (
  `id_resposta` int(11) NOT NULL auto_increment,
  `id_pergunta` int(11) default NULL,
  `resposta` varchar(200) default NULL,
  `correta` int(1) default NULL,
  PRIMARY KEY  (`id_resposta`),
  KEY `id_pergunta` (`id_pergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `respostas` VALUES (1,4,'20m',1);
INSERT INTO `respostas` VALUES (2,4,'30m',0);
INSERT INTO `respostas` VALUES (3,4,'40m',0);
INSERT INTO `respostas` VALUES (4,4,'50m',0);
INSERT INTO `respostas` VALUES (5,1,'São Raimundo das Mangabeiras',1);
INSERT INTO `respostas` VALUES (6,1,'Carolina',0);
INSERT INTO `respostas` VALUES (7,1,'Riachão',0);
INSERT INTO `respostas` VALUES (8,1,'Fortaleza dos Nogueiras',0);
INSERT INTO `respostas` VALUES (9,2,'R$ 10,00',0);
INSERT INTO `respostas` VALUES (10,2,'R$ 20,00',0);
INSERT INTO `respostas` VALUES (11,2,'R$ 50,00',0);
INSERT INTO `respostas` VALUES (12,2,'R$ 100,00',1);
INSERT INTO `respostas` VALUES (13,3,'Carolina',0);
INSERT INTO `respostas` VALUES (14,3,'Riachão',0);
INSERT INTO `respostas` VALUES (15,3,'Itapecuru',1);
INSERT INTO `respostas` VALUES (16,3,'Sambaíba',0);
INSERT INTO `respostas` VALUES (17,5,'Tudo',0);
INSERT INTO `respostas` VALUES (18,5,'Nada',0);
INSERT INTO `respostas` VALUES (19,5,'Algumas coisas',1);
INSERT INTO `respostas` VALUES (20,8,'20',0);
INSERT INTO `respostas` VALUES (21,8,'30',0);
INSERT INTO `respostas` VALUES (22,8,'40',0);
INSERT INTO `respostas` VALUES (23,8,'50',0);
INSERT INTO `respostas` VALUES (24,8,'44',1);
DROP TABLE IF EXISTS `temas`;
CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL auto_increment,
  `tema` varchar(50) default NULL,
  `data_cadastro` datetime default NULL,
  `id_usuario` int(11) default '1',
  PRIMARY KEY  (`id_tema`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED;

INSERT INTO `temas` VALUES (1,'Cachoeiras do Itapecuru','2019-09-12 11:50:22',1);
INSERT INTO `temas` VALUES (2,'Pedra Caída','2019-09-12 12:29:27',2);
INSERT INTO `temas` VALUES (3,'Poço Azul','2019-09-13 13:12:05',1);
INSERT INTO `temas` VALUES (4,'Parque do Mirador','2019-09-19 12:15:31',1);
INSERT INTO `temas` VALUES (5,'IFMA Mangabeiras','2019-09-26 10:51:02',1);
INSERT INTO `temas` VALUES (6,'Balneário Cachoeira Clube','2019-09-26 11:40:08',1);
INSERT INTO `temas` VALUES (7,'INFO 20','2019-09-26 12:00:12',1);
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `nome` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  `senha` varchar(40) default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` VALUES (1,'Sebastião Ricardo','admin','admin');
INSERT INTO `usuarios` VALUES (2,'Paulo Henrique','phenrique','phenrique');
INSERT INTO `usuarios` VALUES (3,'Isadora de Faria','isadora','isadora');

ALTER TABLE `perguntas`
  ADD FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `respostas`
  ADD FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id_pergunta`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `temas`
  ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

