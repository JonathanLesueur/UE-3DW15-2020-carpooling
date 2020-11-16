CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

CREATE TABLE `cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `marque` tinytext NOT NULL,
  `couleur` tinytext NOT NULL,
  `mise_circulation` datetime NOT NULL,
  `puissance_moteur` int(11) NOT NULL,
  `modele` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `marque`, `couleur`, `mise_circulation`, `puissance_moteur`, `modele`) VALUES
(1, 'Peugeot', 'Blanc', '2020-11-14 20:56:27', 120, '306 HDI'),
(2, 'Citroen', 'Bleu', '2020-11-15 00:00:00', 150, 'C6');


CREATE TABLE `reservations` (
  `id` int AUTO_INCREMENT NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `date_depart` datetime NOT NULL,
  `lieu_depart` tinytext NOT NULL,
  `lieu_arrivee` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `annonces` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `lieu_depart` tinytext NOT NULL,
  `lieu_arrivee` tinytext NOT NULL,
  `date_depart` datetime NOT NULL,
  `date_arrivee` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;