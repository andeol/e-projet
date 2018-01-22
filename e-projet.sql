-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2018 at 03:21 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activite`
--

CREATE TABLE `Activite` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `duree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Activite`
--

INSERT INTO `Activite` (`id`, `Pro_id`, `libelle`, `dateDebut`, `duree`) VALUES
(36, 43, '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ChefProjet`
--

CREATE TABLE `ChefProjet` (
  `id` int(11) NOT NULL,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `prenoms` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ChefProjet`
--

INSERT INTO `ChefProjet` (`id`, `nom`, `prenoms`, `code`) VALUES
(11, 'Ayantome', 'jislain', 1304),
(12, 'DJROLO', 'Isaie', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `CoucheSI`
--

CREATE TABLE `CoucheSI` (
  `id` int(11) NOT NULL,
  `libelle` varchar(254) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CoucheSI`
--

INSERT INTO `CoucheSI` (`id`, `libelle`) VALUES
(1, 'Applicatif');

-- --------------------------------------------------------

--
-- Table structure for table `Log`
--

CREATE TABLE `Log` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `action` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Log`
--

INSERT INTO `Log` (`id`, `Pro_id`, `date`, `action`) VALUES
(37, 43, '2018-01-18', 'creation'),
(38, 43, '2018-01-18', 'modification');

-- --------------------------------------------------------

--
-- Table structure for table `MaitriseOeuvre`
--

CREATE TABLE `MaitriseOeuvre` (
  `id` int(11) NOT NULL,
  `libelle` varchar(254) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MaitriseOeuvre`
--

INSERT INTO `MaitriseOeuvre` (`id`, `libelle`) VALUES
(1, 'ASSI');

-- --------------------------------------------------------

--
-- Table structure for table `Objectif`
--

CREATE TABLE `Objectif` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Objectif`
--

INSERT INTO `Objectif` (`id`, `Pro_id`, `libelle`) VALUES
(36, 43, '');

-- --------------------------------------------------------

--
-- Table structure for table `Projet`
--

CREATE TABLE `Projet` (
  `id` int(11) NOT NULL,
  `Che_id` int(11) NOT NULL,
  `code` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `intitule` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `objet` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `datedemarrage` date DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `mo_id` int(11) NOT NULL,
  `srcFin_id` int(11) NOT NULL,
  `cSI_id` int(11) NOT NULL,
  `perspectives` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `tauxExecution` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Projet`
--

INSERT INTO `Projet` (`id`, `Che_id`, `code`, `intitule`, `objet`, `description`, `duree`, `datedemarrage`, `cout`, `mo_id`, `srcFin_id`, `cSI_id`, `perspectives`, `tauxExecution`, `etat`, `dateFin`) VALUES
(43, 11, '43', 'ok', 'ok', ' ok ', 0, '2018-01-18', 0, 1, 2, 1, ' ok ', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `Resultat`
--

CREATE TABLE `Resultat` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `indicateurs` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Resultat`
--

INSERT INTO `Resultat` (`id`, `Pro_id`, `libelle`, `indicateurs`) VALUES
(36, 43, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Risque`
--

CREATE TABLE `Risque` (
  `id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Risque`
--

INSERT INTO `Risque` (`id`, `Pro_id`, `libelle`) VALUES
(36, 43, '');

-- --------------------------------------------------------

--
-- Table structure for table `SourceFinancement`
--

CREATE TABLE `SourceFinancement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(254) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `SourceFinancement`
--

INSERT INTO `SourceFinancement` (`id`, `libelle`) VALUES
(2, 'KfW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activite`
--
ALTER TABLE `Activite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association2` (`Pro_id`);

--
-- Indexes for table `ChefProjet`
--
ALTER TABLE `ChefProjet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CoucheSI`
--
ALTER TABLE `CoucheSI`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Log`
--
ALTER TABLE `Log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association6` (`Pro_id`);

--
-- Indexes for table `MaitriseOeuvre`
--
ALTER TABLE `MaitriseOeuvre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Objectif`
--
ALTER TABLE `Objectif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association3` (`Pro_id`);

--
-- Indexes for table `Projet`
--
ALTER TABLE `Projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association1` (`Che_id`),
  ADD KEY `FK_association7` (`mo_id`),
  ADD KEY `FK_association9` (`srcFin_id`),
  ADD KEY `FK_association8` (`cSI_id`) USING BTREE;

--
-- Indexes for table `Resultat`
--
ALTER TABLE `Resultat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association5` (`Pro_id`);

--
-- Indexes for table `Risque`
--
ALTER TABLE `Risque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_association4` (`Pro_id`);

--
-- Indexes for table `SourceFinancement`
--
ALTER TABLE `SourceFinancement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activite`
--
ALTER TABLE `Activite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ChefProjet`
--
ALTER TABLE `ChefProjet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `CoucheSI`
--
ALTER TABLE `CoucheSI`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Log`
--
ALTER TABLE `Log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `MaitriseOeuvre`
--
ALTER TABLE `MaitriseOeuvre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Objectif`
--
ALTER TABLE `Objectif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `Projet`
--
ALTER TABLE `Projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `Resultat`
--
ALTER TABLE `Resultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `Risque`
--
ALTER TABLE `Risque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `SourceFinancement`
--
ALTER TABLE `SourceFinancement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Activite`
--
ALTER TABLE `Activite`
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Log`
--
ALTER TABLE `Log`
  ADD CONSTRAINT `FK_association6` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Objectif`
--
ALTER TABLE `Objectif`
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Projet`
--
ALTER TABLE `Projet`
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`Che_id`) REFERENCES `ChefProjet` (`id`),
  ADD CONSTRAINT `FK_association7` FOREIGN KEY (`mo_id`) REFERENCES `MaitriseOeuvre` (`id`),
  ADD CONSTRAINT `FK_association8` FOREIGN KEY (`cSI_id`) REFERENCES `CoucheSI` (`id`),
  ADD CONSTRAINT `FK_association9` FOREIGN KEY (`srcFin_id`) REFERENCES `SourceFinancement` (`id`);

--
-- Constraints for table `Resultat`
--
ALTER TABLE `Resultat`
  ADD CONSTRAINT `FK_association5` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);

--
-- Constraints for table `Risque`
--
ALTER TABLE `Risque`
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`Pro_id`) REFERENCES `Projet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
