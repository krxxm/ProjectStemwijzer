DROP TABLE IF EXISTS `party`;

CREATE TABLE `party` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `contact` text,
  `description` text,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `party` VALUES 
(1,'VVD',NULL,NULL,'De Volkspartij voor Vrijheid en Democratie richt zich op economische groei, vrijheid en veiligheid.','1948-01-24 00:00:00'),
(2,'PvdA',NULL,NULL,'De Partij van de Arbeid zet zich in voor sociale gelijkheid en rechtvaardigheid.','1946-02-09 00:00:00'),
(3,'GroenLinks',NULL,NULL,'GroenLinks richt zich op duurzaamheid, gelijkheid en progressieve waarden.','1989-03-01 00:00:00'),
(4,'D66',NULL,NULL,'Democraten 66 zijn progressief-liberaal en pleiten voor onderwijs, democratie en Europa.','1966-10-14 00:00:00'),
(5,'CDA',NULL,NULL,'Het Christen-Democratisch Appèl staat voor solidariteit, gespreide verantwoordelijkheid en rentmeesterschap.','1980-10-11 00:00:00'),
(6,'SP',NULL,NULL,'De Socialistische Partij focust op eerlijkheid, zorg en bestaanszekerheid.','1972-10-22 00:00:00'),
(7,'PVV',NULL,NULL,'De Partij voor de Vrijheid pleit voor nationale identiteit en streng immigratiebeleid.','2006-02-22 00:00:00'),
(8,'Partij voor de Dieren',NULL,NULL,'Zet zich in voor dierenrechten, natuur en duurzaamheid.','2002-10-28 00:00:00'),
(9,'ChristenUnie',NULL,NULL,'Een christelijk-sociale partij die zich richt op gezin, zorg en naastenliefde.','2000-01-11 00:00:00'),
(10,'SGP',NULL,NULL,'Een orthodox-christelijke partij die vasthoudt aan Bijbelse principes in beleid.','1918-04-24 00:00:00'),
(11,'DENK',NULL,NULL,'DENK komt op voor inclusie, diversiteit en gelijke kansen.','2015-02-09 00:00:00'),
(12,'Volt Nederland',NULL,NULL,'Een pan-Europese partij met focus op Europese samenwerking, klimaat en innovatie.','2018-06-23 00:00:00'),
(13,'JA21',NULL,NULL,'JA21 is conservatief-liberaal, kritisch op EU en pleit voor strenge immigratie.','2020-12-18 00:00:00'),
(14,'BBB',NULL,NULL,'De BoerBurgerBeweging richt zich op het platteland, agrarische sector en burgerbelangen.','2019-10-01 00:00:00'),
(15,'BIJ1',NULL,NULL,'BIJ1 is radicaal progressief en strijdt tegen racisme, ongelijkheid en discriminatie.','2016-12-18 00:00:00');
