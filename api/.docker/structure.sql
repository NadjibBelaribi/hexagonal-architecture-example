
DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(11) unsigned NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `todos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `task_id`, `created_by`, `created_at`, `comment`)
VALUES
	(1,1,1,'2019-08-11 16:33:50','Je pense qu il manque l\'architecture Héxagonale'),
	(2,2,1,'2020-09-02 23:14:58','Je viens de prendre un abonemment à basic Fit !'),
    (3,3,1,'2020-10-01 03:03:49','Alllez les lakers ! LeBron on compte sur toi !'),
    (4,4,1,'2019-08-11 16:33:51','Je ne comprends pas pourquoi jai cette tache ! si vous voulez de laide en js dites moi'),
    (5,5,2,'2019-08-11 09:31:00','J\'ai hate d\'apprendre les tests unitaires avec M. Ebabil ! Il sait de quoi il parle !'),
    (6,6,2,'2020-11-11 20:45:00','500euros le billet ! Trop cher !!!!'),
    (7,7,2,'2019-08-11 14:54:02','Moi je16:33:51 préfère Hollyfood, ils font tacos et crêpes et cest trop bon !'),
    (8,8,3,'2020-11-24 21:30:25','Analyse lexicale et syntaxique faite par danyl, je vais faire la sémantique après'),
    (9,9,3,'2020-11-20 23:47:41','Inchallah je rentre bientôt à la maison voir ma famille'),
    (10,10,3,'2019-25-11 10:47:12','Quelquun connait une mosquée à illkirch ? je suis toujours aller a galia ou la grande mosquée !'),
    (11,11,3,'2020-09-01 11:12:01','Un jeu à installer sur mobile ? Trop long attendre le consulat. Même le rdv est loooong'),
    (12,12,4,'2020-09-12 12:00:00','Il y a beaucoup de Kengals en Turquie ? J\'ai peur des chiens...'),
    (13,13,4,'2019-11-24 19:38:14','Jai oublié d\'acheter les tomates et les oignons ! Les magasins sont fermés, vous en aurez pas pour moi ?'),
    (14,14,4,'2020-10-31 00:47:18','Mando a trop la classe !!!! Et baby Yoda il est mignon haha'),
    (15,15,5,'2019-10-30 16:33:51','On avance doucement mais lentement ! Et toi Nadjib ça se passe comment le projet ?'),
    (16,16,5,'2019-08-11 09:40:45','Inchallah je vais bien et je n\'ai pas de blessures'),
    (17,17,5,'2019-08-11 16:38:16','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet iaculis nisi. Etiam lorem nunc, tempor id molestie eu, sollicitudin non odio. Ut malesuada ut nisi eget vehicula. Interdum et malesuada fames ac ante ipsum primis  faucibus. Vivamus consequat ex  ex eleifend porta. Nulla facilisi. Maecenas placerat urna neque. Praesent gravida  mi  tristique. Nunc  massa varius lorem imperdiet pulvinar vitae ex. Morbi nec nisi ut dolor tempor lobortis vel a mauris.');

    /*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) unsigned NOT NULL,
  `assigned_to` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `due_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `assigned_to` (`assigned_to`),
  CONSTRAINT `todos_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `todos_ibfk_2` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;

INSERT INTO `todos` (`id`, `created_by`, `assigned_to`, `title`, `description`, `created_at`, `due_date`)
VALUES
	(1,1,2,'Développer le premier TP','Faire la présentation de l\'architecture MVC','2019-08-11 16:32:16','2019-09-09 16:32:20'),
    (2,1,3,'Faire du sport','Aller à la salle 3 fois dans la semaine et faire du basket le mercredi ','2020-09-02 16:00:00','2020-12-11 16:00:00'),
    (3,1,4,'Regarder la NBA','Regarder la finale : lakers contre miami','2020-10-01 03:00:00','2020-10-12 07:00:00'),
    (4,1,5,'Apprendre JS','Je ne comprends pas pourquoi jai cette tache alors que je le suis boss du JS','2019-08-11 16:32:16','2019-09-09 16:32:20'),
    (5,1,1,'Réunion','Réunion avec les stagiaires pour leur expliquer les tests unitaires et leur importance !','2019-08-11 09:30:00','2019-08-11 12:30:00'),
    (6,2,1,'Réserver un billet ','Je rentre aux USA fêter la victoire de Biden ! Vive la democratie !','2020-11-11 18:45:15','2020-11-20 23:30:30'),
    (7,2,2,'Manger au resto','On a le choix entre Hollyfood Kebab House ou Pizza boston. Choisissez !','2019-08-11 14:00:00','2019-08-11 18:45:00'),
    (8,2,3,'Projet Compilation','Le projet de compilation doit être fait en plusieurs phases, phase lexicale phase syntaxique phase semantique generation de code et executable. Il faut une bonne organisation afin de pouvoir avoir la meilleure note possible','2020-11-10 08:30:00','2021-01-05 10:30:00'),
    (9,3,2,'Aller en Algérie','Ca fait deux ans que je ne suis plus rentrer voir ma famille en Algérie il faut que je programme un départ cette année','2020-11-20 21:00:00','2021-08-30 21:00:00'),
    (10,3,4,'Mosquée','Je dois trouver la mosquée la plus proche à illkirch pour vendredi ','2020-11-24 15:00:00','2020-11-27 12:00:00'),
    (11,3,5,'Régler les papiers administratifs','Il faut prendre rendez-vous au consulat afin de pouvoir finir mes papiers','2020-09-01 08:00:00','2020-12-01 16:00:00'),
    (12,4,3,'Visiter la Turquie','Le pays est trop beau, je veux le visiter voir Istanbul Ankara, les forêts au nord du pays. Goûter les plats qui sont trop bons ! Mais les kengals me font un peu peur','2020-09-11 16:00:00','2021-09-01 08:00:00'),
    (13,4,1,'Faire les courses','Pâtes riz tomates salade haricots poisson viande halal gâteaux eau fromage -> je dois survivre encore un mois et après les vacances !','2019-11-24 12:00:00','2020-11-24 20:00:00'),
    (14,4,2,'The Mandalorian','La série reprend sur Disney+, elle est incroyable ! Elle sera aussi bien que la saison 1 voir même meilleur !','2020-10-30 00:00:00','2020-10-31 01:00:00'),
    (15,4,1,'Projet Compilation Phase 1','Le projet de compilation doit être fait en plusieurs phases, il faut faire une première génération de code avant décembre','2019-10-02 14:30:00','2020-12-05 10:00:00'),
    (16,5,2,'Rendez-vous medecin','Kine et osteo le même jour, problème au dos et aux epaules a cause de mon dernier match UFC','2019-08-11 09:32:16','2019-09-09 22:45:30'),
    (17,5,3,'Apprendre le latin','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet iaculis nisi. Etiam lorem nunc, tempor id molestie eu, sollicitudin non odio. Ut malesuada ut nisi eget vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus consequat ex at ex eleifend porta. Nulla facilisi. Maecenas placerat urna neque. Praesent gravida in mi at tristique. Nunc at massa varius lorem imperdiet pulvinar in vitae ex. Morbi nec nisi ut dolor tempor lobortis vel a mauris. ','2019-08-11 16:32:16','2019-09-09 17:32:20');



    /*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`)
VALUES
	(1,'hakan@ebabil.fr','tartenpion'),
	(2,'john@doe.com','johnny'),
	(3,'nadjib@web.dz','p'),
	(4,'amir@web.mr','arap'),
     (5,'khabib@ufc.ru','p') ;


    /*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
