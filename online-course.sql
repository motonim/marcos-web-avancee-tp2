-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 14, 2022 at 11:02 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-course`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `idcours` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `description` varchar(300) NOT NULL,
  `enseignant_idenseignant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`idcours`, `titre`, `description`, `enseignant_idenseignant`) VALUES
(1, 'Programmation Web avancées', 'Cours portant sur la programmation orientée objet avec PHP. Introduction au patron de conception utile en Web pour le traitement des requêtes HTTP.', 1),
(2, 'Design UX/UI appliqué au projet', 'Cours de design appliqué. Dans ce cours, l’étudiant développe une maquette complète en HTML/CSS qui répond à un besoin spécifique. Il apprend à créer une maquette complète et à définir les paramètres de test de l’interface Web.', 4),
(3, 'Programmation d\'interface Web 2', 'L’étudiant est introduit à la programmation des interfaces en POO. Il utilise les requêtes asynchrones pour mettre à jour ces interfaces. Il est introduit au concept avancé en programmation front-end tel que le routage, les gestionnaires d’état, etc.', 3),
(4, 'Introduction à un gestionnaire de contenu', 'Cours d’introduction à un gestionnaire de contenu. L’étudiant apprend à installer, configurer, mettre à jour, installer et créer un thème et créer des fonctionnalités supplémentaires.', 3),
(7, 'Programmation Web dynamique', 'L’étudiant apprendra à créer des structures de données et les principales opérations liés à la manipulation de ces données. Il apprendra aussi à se connecter à une base de données par programmation et à y effectuer des opérations.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cours_has_groupe`
--

CREATE TABLE `cours_has_groupe` (
  `cours_idcours` int(11) NOT NULL,
  `groupe_idgroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours_has_groupe`
--

INSERT INTO `cours_has_groupe` (`cours_idcours`, `groupe_idgroupe`) VALUES
(1, 1),
(4, 1),
(7, 2),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `idenseignant` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `courriel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`idenseignant`, `prenom`, `nom`, `phone`, `courriel`) VALUES
(1, 'Marcos', 'Sanches', '111-111-1111', 'marcosSanches@cmaisonneuve.qc.ca'),
(2, 'Guillaume', 'Harvey', '222-222-2222', 'guillaumeHarvey@cmaisonneuve.qc.ca\r\n'),
(3, 'Simon ', 'Côte-Bouchard', '333-333-3333', 'simonCote@cmaisonneuve.qc.ca'),
(4, 'Marc-André', 'Charpentier', '444-444-4444', 'marcChaprentier@cmaisonneuve.qc.ca');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `idetudiant` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  `groupe_idgroupe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`idetudiant`, `prenom`, `nom`, `phone`, `courriel`, `groupe_idgroupe`) VALUES
(1, 'Shinbi', 'Leez', '111-111-1111', 'kjsdhg@cmsodihf.ca', 1),
(14, 'Francis', 'Prudhomme', '333-444-2222', 'francisp@cmaisonneuve.qc.ca', 2),
(15, 'Jaeri', 'Park', '222-333-4444', 'jaeriparkk@cmaisonneuve.qc.ca', 1),
(17, 'Johnny', 'Depp', '555-444-3536', 'johnnydepp@cmaisonneuve.qc.ca', 3),
(18, 'Ive', 'Adam', '222-334-1313', 'iveadam@cmaisonneuve.qc.ca', 1),
(19, 'Lina', 'Kim', '998-087-0909', 'linakim@cmaisonneuve.qc.ca', 2),
(20, 'Celine', 'Dion', '514-515-5151', 'celinedion@cmaisonneuve.qc.ca', 2),
(22, 'Peter', 'Pano', '234-556-7039', 'peterpan@cmaiosonneuve.qc.ca', 3);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `idgroupe` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`idgroupe`, `nom`) VALUES
(1, '21603'),
(2, '21604'),
(3, '21605');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idcours`),
  ADD KEY `fk_cours_enseignant1_idx` (`enseignant_idenseignant`);

--
-- Indexes for table `cours_has_groupe`
--
ALTER TABLE `cours_has_groupe`
  ADD PRIMARY KEY (`cours_idcours`,`groupe_idgroupe`),
  ADD KEY `fk_cours_has_groupe_groupe1_idx` (`groupe_idgroupe`),
  ADD KEY `fk_cours_has_groupe_cours1_idx` (`cours_idcours`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`idenseignant`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idetudiant`),
  ADD KEY `fk_etudiant_groupe_idx` (`groupe_idgroupe`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idgroupe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `idcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `idenseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idetudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_cours_enseignant1` FOREIGN KEY (`enseignant_idenseignant`) REFERENCES `enseignant` (`idenseignant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cours_has_groupe`
--
ALTER TABLE `cours_has_groupe`
  ADD CONSTRAINT `fk_cours_has_groupe_cours1` FOREIGN KEY (`cours_idcours`) REFERENCES `cours` (`idcours`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cours_has_groupe_groupe1` FOREIGN KEY (`groupe_idgroupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_etudiant_groupe` FOREIGN KEY (`groupe_idgroupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
