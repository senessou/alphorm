-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 23 Juin 2016 à 13:15
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `tutoriel_lamp`
--

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE `Personne` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `sexe` enum('masc','fem','neutre') DEFAULT NULL,
  `date_naissance` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`id`, `prenom`, `nom`, `e-mail`, `sexe`, `date_naissance`) VALUES
(1, 'Albert', 'Kleene', 'ak@lamp.edu', 'masc', '0000-00-00 00:00:00'),
(2, 'Max', 'Planck', 'mp@lamp.edu', 'masc', '0000-00-00 00:00:00'),
(3, 'Anne', 'Shelley', 'as@lamp.edu', 'fem', '0000-00-00 00:00:00'),
(4, 'Christine', 'Grand', 'cg@lamp.edu', 'fem', '0000-00-00 00:00:00'),
(5, 'Luc', 'Gromov', 'lg@lamp.edu', 'masc', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Personne`
--
ALTER TABLE `Personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
