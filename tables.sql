-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 nov. 2020 à 01:31
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carpooling`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `lieu_depart` tinytext NOT NULL,
  `lieu_arrivee` tinytext NOT NULL,
  `date_depart` datetime NOT NULL,
  `date_arrivee` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `lieu_depart`, `lieu_arrivee`, `date_depart`, `date_arrivee`) VALUES
(1, 'Rouen', 'Marseille', '2020-11-23 00:00:00', '2020-11-25 00:00:00'),
(2, 'Roubaix', 'Nice', '2020-11-24 00:00:00', '2020-11-27 00:00:00'),
(3, 'Limoges', 'Paris', '2020-11-23 00:00:00', '2020-11-24 00:00:00'),
(4, 'Sochaux', 'Brest', '2020-11-24 00:00:00', '2020-11-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `annonces_cars`
--

CREATE TABLE `annonces_cars` (
  `annonce_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces_cars`
--

INSERT INTO `annonces_cars` (`annonce_id`, `car_id`) VALUES
(1, 3),
(2, 1),
(3, 4),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `annonces_comments`
--

CREATE TABLE `annonces_comments` (
  `annonce_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces_comments`
--

INSERT INTO `annonces_comments` (`annonce_id`, `comment_id`) VALUES
(2, 1),
(4, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `annonces_reservations`
--

CREATE TABLE `annonces_reservations` (
  `annonce_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces_reservations`
--

INSERT INTO `annonces_reservations` (`annonce_id`, `reservation_id`) VALUES
(2, 1),
(3, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `marque` tinytext NOT NULL,
  `couleur` tinytext NOT NULL,
  `mise_circulation` datetime NOT NULL,
  `puissance_moteur` int(11) NOT NULL,
  `modele` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `marque`, `couleur`, `mise_circulation`, `puissance_moteur`, `modele`) VALUES
(1, 'Citroen', 'Blanche', '2020-11-23 00:00:00', 6, 'C3'),
(2, 'Mercedes', 'Noire', '2013-11-13 00:00:00', 8, 'Classe A'),
(3, 'Peugeot', 'Grise', '2020-11-05 00:00:00', 7, '406'),
(4, 'Renault', 'Beige', '2020-11-02 00:00:00', 2, '2CH');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `date_ecriture` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `titre`, `contenu`, `date_ecriture`) VALUES
(1, 'Bon voyage !', 'Contenu de test du commentaire', '2020-11-23 01:11:40'),
(2, 'Titre de test', '', '2020-11-23 01:11:45'),
(3, 'Commentaire de Vincent', 'Le voyage s\'est bien déroulé, je recommande !', '2020-11-23 01:11:55'),
(4, 'Titre de test', 'Vincent est très sympathique et le voyage s\'est très bien déroulé.', '2020-11-23 01:12:06');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `date_depart` datetime NOT NULL,
  `lieu_depart` tinytext NOT NULL,
  `lieu_arrivee` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `date_depart`, `lieu_depart`, `lieu_arrivee`) VALUES
(1, '2020-11-23 00:00:00', 'Roubaix', 'Sochaux'),
(2, '2020-11-24 00:00:00', 'Limoges', 'Paris'),
(3, '2020-11-23 00:00:00', 'Roubaix', 'Nice'),
(4, '2020-11-24 00:00:00', 'Roubaix', 'Nice');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08 00:00:00'),
(2, 'Bob', 'Dylan', 'fake@email.fr', '2020-11-03 00:00:00'),
(3, 'Albert', 'Dupond', 'fake@email.com', '2020-11-19 00:00:00'),
(4, 'Thomas', 'Lambert', 'fake@email.fr', '2020-11-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users_annonces`
--

CREATE TABLE `users_annonces` (
  `user_id` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_annonces`
--

INSERT INTO `users_annonces` (`user_id`, `annonce_id`) VALUES
(1, 1),
(2, 2),
(4, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users_cars`
--

CREATE TABLE `users_cars` (
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_cars`
--

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users_comments`
--

CREATE TABLE `users_comments` (
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_comments`
--

INSERT INTO `users_comments` (`user_id`, `comment_id`) VALUES
(2, 1),
(4, 2),
(1, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users_reservations`
--

CREATE TABLE `users_reservations` (
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_reservations`
--

INSERT INTO `users_reservations` (`user_id`, `reservation_id`) VALUES
(1, 1),
(4, 2),
(2, 3),
(3, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
