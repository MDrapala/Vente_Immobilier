-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 05 avr. 2018 à 08:56
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `id_b` smallint(5) UNSIGNED NOT NULL,
  `description` text,
  `prix` int(11) DEFAULT NULL,
  `nb_pieces` int(11) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `id_u` smallint(5) UNSIGNED NOT NULL,
  `id_adr` smallint(5) UNSIGNED NOT NULL,
  `id_cat` smallint(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` smallint(5) UNSIGNED NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `libelle`) VALUES
(1, 'Appartement'),
(2, 'Demeures');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_b` smallint(5) UNSIGNED NOT NULL,
  `description` text,
  `prix` int(11) DEFAULT NULL,
  `nb_pieces` int(11) DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `id_u` smallint(5) UNSIGNED NOT NULL,
  `id_adr` smallint(5) UNSIGNED NOT NULL,
  `id_cat` smallint(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_p` int(11) NOT NULL,
  `contenu` text,
  `date_p` datetime DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post2`
--

CREATE TABLE `post2` (
  `id_p` int(11) NOT NULL,
  `contenu` text,
  `date_p` datetime DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post2`
--

INSERT INTO `post2` (`id_p`, `contenu`, `date_p`, `u_id`, `t_id`) VALUES
(52, '<p>hey2</p>\r\n', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post3`
--

CREATE TABLE `post3` (
  `id_p` int(11) NOT NULL,
  `contenu` text,
  `date_p` datetime DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post3`
--

INSERT INTO `post3` (`id_p`, `contenu`, `date_p`, `u_id`, `t_id`) VALUES
(1, '<p>hey</p>\r\n', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_u` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `question` int(1) NOT NULL,
  `reponse` varchar(20) NOT NULL,
  `lvl` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `prenom`, `email`, `mdp`, `question`, `reponse`, `lvl`) VALUES
(1, 'Drapala', 'Mathieu', 'drapala@gmail.com', '0f777fbcbc9d14cf9a65e30d7a6961aa82dee485', 1, 'fri', NULL),
(7, 'DRAPALA', 'Mathieu', 'admin@admin.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 'Dam', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`id_b`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_adr` (`id_adr`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_b`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_adr` (`id_adr`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Index pour la table `post2`
--
ALTER TABLE `post2`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Index pour la table `post3`
--
ALTER TABLE `post3`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `id_b` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id_b` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `post2`
--
ALTER TABLE `post2`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `post3`
--
ALTER TABLE `post3`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
