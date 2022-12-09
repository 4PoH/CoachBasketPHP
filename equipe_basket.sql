-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 déc. 2022 à 07:41
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
-- Base de données : `equipe_basket`
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

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `Titulaire` tinyint(1) NOT NULL,
  `Notation` char(1) NOT NULL,
  `NumLicence` char(8) NOT NULL,
  `IdRencontre` int(11) NOT NULL,
  KEY `FK_Participer` (`NumLicence`),
  KEY `FK_Participer_Rencontre` (`IdRencontre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
