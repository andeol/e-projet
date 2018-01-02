-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Décembre 2017 à 16:00
-- Version du serveur :  5.5.52-MariaDB
-- Version de PHP :  5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `e-projet`
--
CREATE DATABASE IF NOT EXISTS `e-projet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-projet`;

-- --------------------------------------------------------

--
-- Structure de la table `Activite`
--

CREATE TABLE IF NOT EXISTS `Activite` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `duree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ChefProjet`
--

CREATE TABLE IF NOT EXISTS `ChefProjet` (
  `id` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Log`
--

CREATE TABLE IF NOT EXISTS `Log` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `action` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Objectif`
--

CREATE TABLE IF NOT EXISTS `Objectif` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Projet`
--

CREATE TABLE IF NOT EXISTS `Projet` (
  `id` int(11) NOT NULL,
  `Che_id` int(11) NOT NULL,
  `code` varchar(254) DEFAULT NULL,
  `intitule` varchar(254) DEFAULT NULL,
  `objet` varchar(254) DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `datedemarrage` datetime DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `maitriseOeuvre` varchar(254) DEFAULT NULL,
  `financement` varchar(254) DEFAULT NULL,
  `coucheSI` varchar(254) DEFAULT NULL,
  `perspectives` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Resultat`
--

CREATE TABLE IF NOT EXISTS `Resultat` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) DEFAULT NULL,
  `indicateurs` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Risque`
--

CREATE TABLE IF NOT EXISTS `Risque` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Activite`
--
ALTER TABLE `Activite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association2` (`Pro_id`);

--
-- Index pour la table `ChefProjet`
--
ALTER TABLE `ChefProjet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Log`
--
ALTER TABLE `Log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association6` (`Pro_id`);

--
-- Index pour la table `Objectif`
--
ALTER TABLE `Objectif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association3` (`Pro_id`);

--
-- Index pour la table `Projet`
--
ALTER TABLE `Projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association1` (`Che_id`);

--
-- Index pour la table `Resultat`
--
ALTER TABLE `Resultat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association5` (`Pro_id`);

--
-- Index pour la table `Risque`
--
ALTER TABLE `Risque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association4` (`Pro_id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Activite`
--
ALTER TABLE `Activite`
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Contraintes pour la table `Log`
--
ALTER TABLE `Log`
  ADD CONSTRAINT `FK_association6` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Contraintes pour la table `Objectif`
--
ALTER TABLE `Objectif`
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Contraintes pour la table `Projet`
--
ALTER TABLE `Projet`
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`Che_id`) REFERENCES `ChefProjet` (`id`);

--
-- Contraintes pour la table `Resultat`
--
ALTER TABLE `Resultat`
  ADD CONSTRAINT `FK_association5` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Contraintes pour la table `Risque`
--
ALTER TABLE `Risque`
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
