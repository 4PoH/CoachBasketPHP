-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 déc. 2022 à 15:34
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coachbasket`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `NumLicence` char(8) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Taille` int(3) NOT NULL,
  `Poids` int(3) NOT NULL,
  `PostePref` varchar(50) NOT NULL,
  `Commentaire` text NOT NULL,
  `idStatus` int(11) NOT NULL,
  PRIMARY KEY (`NumLicence`),
  KEY `FK_Joueur_status` (`idStatus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`NumLicence`, `Prenom`, `Nom`, `DateNaissance`, `Photo`, `Taille`, `Poids`, `PostePref`, `Commentaire`, `idStatus`) VALUES
('1', 'Kylian', 'Mbappé', '1998-12-20', '', 178, 73, 'Meneur', '', 1),
('2', 'Junior', 'Neymar', '1992-02-05', '', 175, 68, 'Interieur', '', 2),
('3', 'Antoine', 'Dupont', '1996-10-05', '', 174, 96, 'Aile', '', 1),
('4', 'Guillaume', 'Marchand', '1998-06-05', '', 186, 98, 'Aile', '', 1),
('5', 'Alexandre', 'Mole', '1995-10-10', '', 186, 73, 'Aile', '', 1),
('6', 'Durand', 'Raphael', '2000-07-12', '', 183, 80, 'Intérieur', '', 1),
('12', 'Nino', 'Rigal', '2003-10-12', '', 180, 65, 'Meneur', '', 1),
('7', 'Nicolas', 'Rousseau', '2002-07-19', '', 175, 70, 'Meneur', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `Titulaire` tinyint(1) NOT NULL,
  `Notation` char(1) NOT NULL,
  `NumLicence` char(8) NOT NULL,
  `IdRencontre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`Titulaire`, `Notation`, `NumLicence`, `IdRencontre`) VALUES
(1, '', '1', 1),
(1, '', '2', 1),
(1, '', '3', 1),
(1, '', '4', 1),
(1, '', '5', 1),
(0, '', '6', 1),
(0, '', '6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

DROP TABLE IF EXISTS `rencontre`;
CREATE TABLE IF NOT EXISTS `rencontre` (
  `IdRencontre` int(11) NOT NULL,
  `NomEAdverse` varchar(50) NOT NULL,
  `LieuRencontre` varchar(50) NOT NULL,
  `Domicile` tinyint(1) NOT NULL,
  `DateRencontre` date NOT NULL,
  `HeureRencontre` time NOT NULL,
  `ScoreEquipe` int(3) NOT NULL,
  `ScoreAdverse` int(3) NOT NULL,
  PRIMARY KEY (`IdRencontre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rencontre`
--

INSERT INTO `rencontre` (`IdRencontre`, `NomEAdverse`, `LieuRencontre`, `Domicile`, `DateRencontre`, `HeureRencontre`, `ScoreEquipe`, `ScoreAdverse`) VALUES
(1, 'TournefeuilleBC', 'Tournefeuille', 0, '2022-10-12', '08:00:00', 66, 48),
(2, 'Chicago Bulls', 'Chicago', 0, '2022-03-09', '21:00:00', 12, 98);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`idStatus`, `Libelle`) VALUES
(2, 'Blessé(e)'),
(3, 'En vacances'),
(1, 'Disponible');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
