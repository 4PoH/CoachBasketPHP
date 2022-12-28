-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 déc. 2022 à 08:21
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

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`NumLicence`, `Prenom`, `Nom`, `DateNaissance`, `Photo`, `Taille`, `Poids`, `PostePref`, `Commentaire`, `idStatus`) VALUES
('NR343536', 'Nino', 'Rigal', '2003-05-16', '', 179, 74, 'Ailier droit', '', 1),
('AC950236', 'Alexandre', 'Calmet', '2003-03-09', '', 181, 72, 'Allié gauche', '', 1),
('RD847425', 'Raphael', 'Durand', '2000-08-24', '', 184, 91, 'Interieur droit', '', 1),
('CS485696', 'Chloe', 'Sechi', '2003-08-14', '', 170, 60, 'Meneur', '', 1),
('EC587410', 'Elena', 'Chelle', '2003-04-02', '', 175, 60, 'Allié droit', '', 1),
('AM693256', 'Alexandre', 'Mole', '1998-10-29', '', 185, 85, 'Interieur gauche', '', 1),
('NL685320', 'Nelson', 'Lima', '2002-07-09', '', 173, 78, 'Meneur', '', 1),
('YA563201', 'Yanis', 'Afrite', '2003-05-16', '', 187, 90, 'Interieur droit', '', 1),
('TN745896', 'Theo', 'Nunes Varela ', '2001-06-26', '', 178, 76, 'Allié droit', '', 1),
('NG569820', 'Nina', 'Girard', '2001-02-21', '', 168, 62, 'Meneur', '', 1),
('GD620357', 'Gaia', 'Ducournau', '2003-08-21', '', 164, 58, 'Interieur gauche', '', 1),
('GM849630', 'Guillaume', 'Pomies', '2000-01-01', '', 200, 93, 'Allié gauche', '', 1),
('FE445638', 'Fantin', 'Elalouf', '2002-07-09', '', 182, 73, 'Allié droit', '', 4),
('BL541039', 'Benoit', 'Leclerc', '2004-11-14', '', 193, 84, 'Interieur gauche', '', 2),
('YT002289', 'Young Way', 'Tsan', '2002-03-19', '', 168, 65, 'Meneur', '', 4),
('MC960236', 'Mickael', 'Calmet', '2003-09-03', '', 181, 73, 'Allié droit', '', 4),
('TW447787', 'Theo', 'Wazidrag', '2002-12-03', '', 173, 92, 'Meneur', '', 2),
('BV663599', 'Bruno', 'Van Den Berg', '2001-09-03', '', 201, 76, 'Allié Gauche', '', 3),
('NR444562', 'Nicolas', 'Rousseau', '1998-02-25', '', 185, 86, 'Interieur droit', '', 2),
('RB111200', 'Remi', 'Barberi', '2002-09-03', '', 163, 92, 'Allié droit', '', 3),
('LC889632', 'Louis', 'Cazals', '2000-04-27', '', 186, 78, 'Interieur droit', '', 3),
('MI036985', 'Makima', 'Inomiya', '2003-08-14', '', 170, 60, 'Meneur', '', 1),
('DA554422', 'Denji', 'Arashi', '2003-03-09', '', 181, 72, 'Allié gauche', '', 2),
('JA503377', 'Jules', 'Alves', '2000-09-22', '', 172, 73, 'Interieur droit', '', 1),
('SB887306', 'Sasha', 'Birindelli', '2005-04-19', '', 161, 61, 'Allié gauche', '', 4),
('FG110258', 'Farouk', 'Gonzales', '2001-01-22', '', 165, 86, 'Interieur gauche', '', 1);

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

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`Titulaire`, `Notation`, `NumLicence`, `IdRencontre`) VALUES
(1, '', 'NG569820', 1),
(1, '', 'NG569820', 6),
(1, '', 'RD847425', 1),
(1, '', 'RD847425', 3),
(1, '', 'AC950236', 1),
(1, '', 'AC950236', 10),
(1, '', 'NR343536', 1),
(0, '', 'NR343536', 5),
(1, '', 'CS485696', 1),
(1, '', 'CS485696', 10),
(1, '', 'NL685320', 3),
(1, '', 'NL685320', 6),
(1, '', 'EC587410', 2),
(0, '', 'EC587410', 3),
(1, '', 'YA563201', 3),
(1, '', 'YA563201', 4),
(0, '', 'YA563201', 1),
(1, '', 'TN745896', 4),
(1, '', 'TN745896', 6),
(1, '', 'GD620357', 3),
(1, '', 'GD620357', 2),
(0, '', 'GD620357', 6),
(1, '', 'GM849630', 2),
(1, '', 'GM849630', 3),
(1, '', 'MI036985', 4),
(1, '', 'MI036985', 2),
(0, '', 'MI036985', 7),
(1, '', 'JA503377', 7),
(1, '', 'JA503377', 10);

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
(1, 'Toulouse BC', 'Toulouse', 0, '2021-01-23', '15:00:00', 84, 79),
(2, 'Agen BC', 'Toulouse', 1, '2021-02-04', '17:30:00', 63, 91),
(3, 'Chateauroux', 'Chateauroux', 0, '2021-02-16', '16:00:00', 21, 75),
(4, 'Tournefeuille BC', 'Tournefeuille', 0, '2021-03-08', '14:45:00', 101, 35),
(5, 'Columier BC', 'Toulouse', 1, '2021-03-23', '14:00:00', 85, 83),
(6, 'Saint Orens', 'Toulouse', 1, '2021-04-16', '15:00:00', 79, 79),
(7, 'Castres BC', 'Castres', 0, '2021-04-25', '16:35:00', 45, 90),
(8, 'Montpellier', 'Toulouse', 1, '2021-05-10', '16:20:00', 60, 103),
(9, 'Albi BC', 'Albi', 0, '2021-05-17', '10:00:00', 96, 66),
(10, 'Castelnaudary', 'Toulouse', 1, '2021-06-01', '20:00:00', 52, 58);

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
(1, 'Actif'),
(3, 'Suspendu'),
(2, 'Blesse'),
(4, 'Absent');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
