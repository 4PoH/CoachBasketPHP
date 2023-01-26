-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 jan. 2023 à 22:44
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
-- Structure de la table `adversaire`
--

DROP TABLE IF EXISTS `adversaire`;
CREATE TABLE IF NOT EXISTS `adversaire` (
  `IdAdversaire` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Logo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`IdAdversaire`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adversaire`
--

INSERT INTO `adversaire` (`IdAdversaire`, `Nom`, `Logo`) VALUES
(1, 'Toulouse BC', NULL),
(2, 'Chateauroux BC', NULL),
(3, 'Tournefeuille BC', NULL),
(4, 'Castres BC', NULL),
(5, 'Albi BC', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `Nom` varchar(50) NOT NULL,
  `Logo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`Nom`, `Logo`) VALUES
('Rangeuil BC', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `NumLicence` char(8) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `DateNaissance` date DEFAULT NULL,
  `Photo` varchar(150) DEFAULT NULL,
  `Taille` int(3) DEFAULT NULL,
  `Poids` int(3) DEFAULT NULL,
  `PostePref` varchar(50) DEFAULT NULL,
  `Commentaire` text,
  `idStatut` int(11) NOT NULL,
  PRIMARY KEY (`NumLicence`),
  KEY `FK_Joueur_status` (`idStatut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`NumLicence`, `Prenom`, `Nom`, `DateNaissance`, `Photo`, `Taille`, `Poids`, `PostePref`, `Commentaire`, `idStatut`) VALUES
('NR343536', 'Nino', 'Rigal', '2003-10-12', '', 179, 74, 'Ailier droit', 'test de commentaire', 1),
('AC950236', 'Alexandre', 'Calmet', '2003-03-09', '', 181, 72, 'Allier gauche', '', 1),
('RD847425', 'Raphael', 'Durand', '2000-08-24', '', 184, 91, 'Interieur droit', '', 1),
('CS485696', 'Chloe', 'Sechi', '2003-08-14', '', 195, 60, 'Meneur', '', 1),
('EC587410', 'Elena', 'Chelle', '2003-04-02', '', 175, 60, 'Ailier droit', '', 1),
('AM693256', 'Alexandre', 'Mole', '1998-10-29', '', 185, 85, 'Interieur gauche', '', 1),
('NL685320', 'Nelson', 'Lima', '2002-07-09', '', 173, 78, 'Meneur', '', 1),
('TN745896', 'Theo', 'Nunes Varela ', '2001-06-26', '', 178, 76, 'Ailier droit', '', 1),
('NG569820', 'Nina', 'Girard', '2001-02-21', '', 168, 62, 'Joueuse fantÃ´me ', '', 4),
('GD620357', 'Gaia', 'Ducournau', '2003-08-21', '', 164, 58, 'Interieur gauche', '', 1),
('GM849630', 'Guillaume', 'Pomies', '2002-02-24', '', 160, 93, 'Pivot', 'Point faible : dunk en apprentissage', 1),
('FE445638', 'Fantin', 'Elalouf', '2002-07-09', '', 182, 73, 'Ailier droit', '', 4),
('BL541039', 'Benoit', 'Leclerc', '2004-11-14', '', 193, 84, 'Interieur gauche', '', 2),
('YT002289', 'Young Way', 'Tsan', '2002-03-19', '', 168, 65, 'Meneur', '', 4),
('MC960236', 'Mickael', 'Calmet', '2003-09-03', '', 181, 73, 'Ailier droit', '', 4),
('TW447787', 'Theo', 'Wazidrag', '2002-12-03', '', 173, 92, 'Meneur', '', 2),
('BV663599', 'Bruno', 'Van Den Berg', '2001-09-03', '', 201, 76, 'Allier gauche', '', 3),
('NR444562', 'Nicolas', 'Rousseau', '1998-02-25', '', 185, 86, 'Interieur droit', '', 2),
('RB111200', 'Remi', 'Barberi', '2002-09-03', '', 163, 92, 'Ailier droit', '', 3),
('LC889632', 'Louis', 'Cazals', '2000-04-27', '', 186, 78, 'Interieur droit', '', 3),
('MI036985', 'Makima', 'Inomiya', '2003-08-14', '', 170, 60, 'Meneur', '', 1),
('DA554422', 'Denji', 'Arashi', '2003-03-09', '', 181, 72, 'Allier gauche', '', 2),
('JA503377', 'Jules', 'Alves', '2000-09-22', '', 172, 73, 'Interieur droit', '', 1),
('SB887306', 'Sasha', 'Birindelli', '2005-04-19', '', 161, 61, 'Allier gauche', '', 4);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `Titulaire` tinyint(1) DEFAULT NULL,
  `Notation` char(1) DEFAULT NULL,
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
(1, '3', 'NR343536', 1),
(1, '3', 'NR343536', 5),
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
  `IDRencontre` int(11) NOT NULL AUTO_INCREMENT,
  `LieuRencontre` varchar(50) DEFAULT NULL,
  `Domicile` tinyint(1) DEFAULT NULL,
  `DateRencontre` date NOT NULL,
  `HeureRencontre` time DEFAULT NULL,
  `ScoreEquipe` smallint(6) DEFAULT NULL,
  `ScoreAdverse` smallint(6) DEFAULT NULL,
  `IdAdversaire` int(11) NOT NULL,
  PRIMARY KEY (`IDRencontre`),
  KEY `IdAdversaire` (`IdAdversaire`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rencontre`
--

INSERT INTO `rencontre` (`IDRencontre`, `LieuRencontre`, `Domicile`, `DateRencontre`, `HeureRencontre`, `ScoreEquipe`, `ScoreAdverse`, `IdAdversaire`) VALUES
(1, 'Toulouse', 0, '2021-02-25', '15:00:00', 84, 79, 1),
(2, '', 1, '2021-01-23', '15:00:00', 63, 91, 1),
(3, 'Chateauroux', 0, '2021-02-16', '16:00:00', 21, 75, 2),
(4, 'Tournefeuille', 0, '2021-03-08', '14:45:00', 101, 35, 3),
(5, 'Toulouse', 1, '2021-03-23', '14:00:00', 85, 83, 5),
(6, 'Toulouse', 1, '2021-03-16', '15:00:00', 79, 79, 4),
(7, 'Castres', 0, '2021-04-25', '16:35:00', 45, 90, 4),
(8, 'Toulouse', 1, '2021-05-10', '16:20:00', 60, 103, 3),
(9, 'Toulouse', 1, '2021-05-17', '10:00:00', 96, 66, 2),
(10, 'Albi', 0, '2021-06-01', '20:00:00', 52, 58, 5),
(12, 'ofnzhog', 1, '2023-01-26', '08:00:00', 91, 63, 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `idStatut` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`idStatut`, `Libelle`) VALUES
(1, 'Actif'),
(3, 'Suspendu'),
(2, 'Blesse'),
(4, 'Absent');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$owdZDxSlGOxf2ZnK3/0qEekM0mkbKad7iguiXzFX5y6C5D4pIRel2'),
(2, 'Nino', '$2y$10$ZdRfYao3wjOoY6vjq9wYFugdU9bxsNsYgbgc/3EPEnL8RxCGsKQlG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
