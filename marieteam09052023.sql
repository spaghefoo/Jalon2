-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mai 2023 à 15:36
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribuer`
--

DROP TABLE IF EXISTS `attribuer`;
CREATE TABLE IF NOT EXISTS `attribuer` (
  `IdBateau` int NOT NULL,
  `IdEquipement` int NOT NULL,
  PRIMARY KEY (`IdBateau`,`IdEquipement`),
  KEY `IdEquipement` (`IdEquipement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `attribuer`
--

INSERT INTO `attribuer` (`IdBateau`, `IdEquipement`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
CREATE TABLE IF NOT EXISTS `bateau` (
  `IdBateau` int NOT NULL,
  `nomBateau` varchar(50) DEFAULT NULL,
  `Longueur` double DEFAULT NULL,
  `Largeur` double DEFAULT NULL,
  `Vitesse` double DEFAULT NULL,
  PRIMARY KEY (`IdBateau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`IdBateau`, `nomBateau`, `Longueur`, `Largeur`, `Vitesse`) VALUES
(1, 'Luce isle', 37.2, 8.6, 26),
(2, 'Al xi', 25, 7, 16),
(3, 'Big Boat', 35, 12, 18),
(4, 'Titanic', 112, 28, 22);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `IdCategorie` int NOT NULL,
  `libelleCategorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IdCategorie`, `libelleCategorie`) VALUES
(1, 'Passager'),
(2, 'Véh.inf.2m'),
(3, 'Véh.sup.2m');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `IdClient` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `AdresseMail` varchar(50) DEFAULT NULL,
  `CP` varchar(50) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `motPasse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `AdresseMail`, `CP`, `Ville`, `motPasse`) VALUES
(1, 'Rayane', 'rayane.meyfroot@gmail.com', '59115', 'Leers', 'gaL4tc/24VGIk'),
(2, 'Tingaud', 'galdric.tingaud@gmail.com', '59000', 'Lille', 'gaIORblCehC6U'),
(3, 'Legrand', 'théophane.legrand@gmail.com', '59100', 'Roubaix', 'gaahweaPwW5Ps'),
(4, 'Cheraiou', 'sofiane.cheraiou@gmail.com', '59660', 'Merville', 'plastic'),
(6, 'Me', 'Jame.me@gmail.com', '94000', 'Rocquefor-laBedouille', 'nox14456'),
(7, 'Perceval', 'tristepin.perceval@gmail.com', '59100', 'Roubaix', 'titi'),
(10, 'Julien', 'siphano@gmail.com', '59800', 'Lille', 'gatZINOAuvl7U'),
(11, 'Theophane55@gmail.com', 'Theophane55@gmail.com', '', '', 'gaJZc.3nNXwKQ'),
(12, 'Theo', 'Theo59@gmail.com', '', '', 'gajbxnQXKEtTo'),
(13, 'AdminMarieTeam59@gmail.com', 'AdminMarieTeam@gmail.com', '', '', 'gafpOf89DnrN.'),
(14, 'Sofiane', 'sofiane@acheraiou.fr', '59660', 'Merville', 'gaXQzuQlyBwtE');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `IdCategorie` int NOT NULL,
  `IdType` varchar(50) NOT NULL,
  `IdBateau` int NOT NULL,
  `QuantiteMaxDisponible` int DEFAULT NULL,
  PRIMARY KEY (`IdCategorie`,`IdType`,`IdBateau`),
  KEY `IdBateau` (`IdBateau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `IdEquipement` int NOT NULL,
  `Equipement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdEquipement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`IdEquipement`, `Equipement`) VALUES
(1, 'Accès Handicapé'),
(2, 'Bar'),
(3, 'Pont Promenade'),
(4, 'Salon Vidéo');

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
CREATE TABLE IF NOT EXISTS `liaison` (
  `CodeLiaison` int NOT NULL,
  `DistanceEnMillesMarin` double DEFAULT NULL,
  `IdPort` int NOT NULL,
  `IdPort_1` int NOT NULL,
  `IdSecteur` int NOT NULL,
  PRIMARY KEY (`CodeLiaison`),
  KEY `IdPort` (`IdPort`),
  KEY `IdPort_1` (`IdPort_1`),
  KEY `IdSecteur` (`IdSecteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`CodeLiaison`, `DistanceEnMillesMarin`, `IdPort`, `IdPort_1`, `IdSecteur`) VALUES
(1, 52.1, 1, 2, 1),
(2, 60, 3, 4, 1),
(3, 10, 1, 6, 2),
(4, 100.1, 6, 1, 2),
(5, 80.9, 2, 3, 3),
(6, 50.1, 4, 5, 3),
(16, 15, 3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `marchandise`
--

DROP TABLE IF EXISTS `marchandise`;
CREATE TABLE IF NOT EXISTS `marchandise` (
  `IdBateau` int NOT NULL,
  PRIMARY KEY (`IdBateau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `IdPeriode` int NOT NULL,
  `DebutPeriode` date DEFAULT NULL,
  `FinPeriode` date DEFAULT NULL,
  PRIMARY KEY (`IdPeriode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`IdPeriode`, `DebutPeriode`, `FinPeriode`) VALUES
(1, '2023-01-01', '2023-06-30'),
(2, '2077-10-11', '2078-10-12'),
(3, '2022-11-11', '2022-11-02'),
(4, '2022-05-03', '2022-09-03'),
(5, '2023-07-01', '2023-09-30'),
(6, '2023-10-02', '2024-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

DROP TABLE IF EXISTS `port`;
CREATE TABLE IF NOT EXISTS `port` (
  `IdPort` int NOT NULL,
  `libellePort` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdPort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`IdPort`, `libellePort`) VALUES
(1, 'Quiberon'),
(2, 'Le Palais'),
(3, 'Sauzon'),
(4, 'Vannes'),
(5, 'Quiberon'),
(6, 'Vannes'),
(7, 'Port St Gildas'),
(8, 'Lorient'),
(9, 'Port-Tudy');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `IdReservation` int NOT NULL AUTO_INCREMENT,
  `DateReservation` datetime DEFAULT NULL,
  `IdClient` int NOT NULL,
  `numeroTraversee` int NOT NULL,
  PRIMARY KEY (`IdReservation`),
  KEY `IdClient` (`IdClient`),
  KEY `numeroTraversee` (`numeroTraversee`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`IdReservation`, `DateReservation`, `IdClient`, `numeroTraversee`) VALUES
(1, '2022-12-03 23:52:29', 2, 1),
(2, '2022-12-04 12:19:56', 2, 1),
(3, '2023-04-13 17:41:05', 13, 3),
(4, '2023-05-17 00:00:00', 13, 6),
(5, '2023-05-10 00:00:00', 14, 6),
(6, '2023-05-10 00:00:00', 14, 6),
(7, '2023-05-08 00:00:00', 14, 6);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `IdSecteur` int NOT NULL,
  `nomSecteur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdSecteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`IdSecteur`, `nomSecteur`) VALUES
(1, 'Belle-Ile-en-Mer'),
(2, 'Houat'),
(3, 'Ile de Groix');

-- --------------------------------------------------------

--
-- Structure de la table `stocker`
--

DROP TABLE IF EXISTS `stocker`;
CREATE TABLE IF NOT EXISTS `stocker` (
  `IdCategorie` int NOT NULL,
  `IdType` varchar(50) NOT NULL,
  `IdReservation` int NOT NULL,
  `Quantite` int DEFAULT NULL,
  PRIMARY KEY (`IdCategorie`,`IdType`,`IdReservation`),
  KEY `IdReservation` (`IdReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `stocker`
--

INSERT INTO `stocker` (`IdCategorie`, `IdType`, `IdReservation`, `Quantite`) VALUES
(1, 'A1', 4, 2),
(1, 'A1', 5, 1),
(1, 'A1', 7, 1),
(1, 'A2', 1, 5),
(1, 'A2', 4, 1),
(1, 'A2', 5, 1),
(1, 'A2', 7, 1),
(1, 'A3', 1, 10),
(1, 'A3', 4, 1),
(1, 'A3', 5, 1),
(1, 'A3', 7, 1),
(2, 'B1', 4, 1),
(2, 'B1', 5, 1),
(2, 'B1', 7, 1),
(2, 'B2', 4, 1),
(2, 'B2', 5, 1),
(2, 'B2', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tarifer`
--

DROP TABLE IF EXISTS `tarifer`;
CREATE TABLE IF NOT EXISTS `tarifer` (
  `IdCategorie` int NOT NULL,
  `IdType` varchar(50) NOT NULL,
  `CodeLiaison` int NOT NULL,
  `IdPeriode` int NOT NULL,
  `Tarif` double DEFAULT NULL,
  PRIMARY KEY (`IdCategorie`,`IdType`,`CodeLiaison`,`IdPeriode`),
  KEY `CodeLiaison` (`CodeLiaison`),
  KEY `IdPeriode` (`IdPeriode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tarifer`
--

INSERT INTO `tarifer` (`IdCategorie`, `IdType`, `CodeLiaison`, `IdPeriode`, `Tarif`) VALUES
(1, 'A1', 1, 1, 41),
(1, 'A1', 1, 2, 91),
(1, 'A1', 1, 3, 68),
(1, 'A1', 1, 4, 68),
(1, 'A1', 1, 5, 75),
(1, 'A1', 1, 6, 100),
(1, 'A1', 2, 1, 56),
(1, 'A1', 2, 2, 87),
(1, 'A1', 2, 3, 15),
(1, 'A1', 2, 4, 38),
(1, 'A1', 2, 5, 86),
(1, 'A1', 2, 6, 65),
(1, 'A1', 3, 1, 9),
(1, 'A1', 3, 2, 57),
(1, 'A1', 3, 3, 52),
(1, 'A1', 3, 4, 69),
(1, 'A1', 3, 5, 21),
(1, 'A1', 3, 6, 72),
(1, 'A1', 4, 1, 11),
(1, 'A1', 4, 2, 24),
(1, 'A1', 4, 3, 41),
(1, 'A1', 4, 4, 47),
(1, 'A1', 4, 5, 64),
(1, 'A1', 4, 6, 99),
(1, 'A1', 5, 1, 10),
(1, 'A1', 5, 2, 9),
(1, 'A1', 5, 3, 54),
(1, 'A1', 5, 4, 11),
(1, 'A1', 5, 5, 36),
(1, 'A1', 5, 6, 51),
(1, 'A1', 6, 1, 30),
(1, 'A1', 6, 2, 15),
(1, 'A1', 6, 3, 20),
(1, 'A1', 6, 4, 74),
(1, 'A1', 6, 5, 39),
(1, 'A1', 6, 6, 56),
(1, 'A1', 16, 1, 69),
(1, 'A1', 16, 2, 33),
(1, 'A1', 16, 3, 26),
(1, 'A1', 16, 4, 57),
(1, 'A1', 16, 5, 93),
(1, 'A1', 16, 6, 49),
(1, 'A2', 1, 1, 14),
(1, 'A2', 1, 2, 56),
(1, 'A2', 1, 3, 48),
(1, 'A2', 1, 4, 96),
(1, 'A2', 1, 5, 19),
(1, 'A2', 1, 6, 49),
(1, 'A2', 2, 1, 87),
(1, 'A2', 2, 2, 31),
(1, 'A2', 2, 3, 76),
(1, 'A2', 2, 4, 79),
(1, 'A2', 2, 5, 8),
(1, 'A2', 2, 6, 70),
(1, 'A2', 3, 1, 6),
(1, 'A2', 3, 2, 83),
(1, 'A2', 3, 3, 97),
(1, 'A2', 3, 4, 13),
(1, 'A2', 3, 5, 66),
(1, 'A2', 3, 6, 49),
(1, 'A2', 4, 1, 27),
(1, 'A2', 4, 2, 98),
(1, 'A2', 4, 3, 47),
(1, 'A2', 4, 4, 44),
(1, 'A2', 4, 5, 18),
(1, 'A2', 4, 6, 45),
(1, 'A2', 5, 1, 18),
(1, 'A2', 5, 2, 72),
(1, 'A2', 5, 3, 75),
(1, 'A2', 5, 4, 97),
(1, 'A2', 5, 5, 80),
(1, 'A2', 5, 6, 32),
(1, 'A2', 6, 1, 65),
(1, 'A2', 6, 2, 94),
(1, 'A2', 6, 3, 36),
(1, 'A2', 6, 4, 95),
(1, 'A2', 6, 5, 55),
(1, 'A2', 6, 6, 52),
(1, 'A2', 16, 1, 100),
(1, 'A2', 16, 2, 66),
(1, 'A2', 16, 3, 30),
(1, 'A2', 16, 4, 75),
(1, 'A2', 16, 5, 22),
(1, 'A2', 16, 6, 59),
(1, 'A3', 1, 1, 30),
(1, 'A3', 1, 2, 42),
(1, 'A3', 1, 3, 39),
(1, 'A3', 1, 4, 28),
(1, 'A3', 1, 5, 28),
(1, 'A3', 1, 6, 67),
(1, 'A3', 2, 1, 22),
(1, 'A3', 2, 2, 93),
(1, 'A3', 2, 3, 17),
(1, 'A3', 2, 4, 84),
(1, 'A3', 2, 5, 92),
(1, 'A3', 2, 6, 59),
(1, 'A3', 3, 1, 66),
(1, 'A3', 3, 2, 76),
(1, 'A3', 3, 3, 10),
(1, 'A3', 3, 4, 5),
(1, 'A3', 3, 5, 78),
(1, 'A3', 3, 6, 69),
(1, 'A3', 4, 1, 50),
(1, 'A3', 4, 2, 37),
(1, 'A3', 4, 3, 22),
(1, 'A3', 4, 4, 76),
(1, 'A3', 4, 5, 57),
(1, 'A3', 4, 6, 71),
(1, 'A3', 5, 1, 92),
(1, 'A3', 5, 2, 25),
(1, 'A3', 5, 3, 54),
(1, 'A3', 5, 4, 90),
(1, 'A3', 5, 5, 15),
(1, 'A3', 5, 6, 51),
(1, 'A3', 6, 1, 52),
(1, 'A3', 6, 2, 15),
(1, 'A3', 6, 3, 31),
(1, 'A3', 6, 4, 81),
(1, 'A3', 6, 5, 31),
(1, 'A3', 6, 6, 75),
(1, 'A3', 16, 1, 46),
(1, 'A3', 16, 2, 16),
(1, 'A3', 16, 3, 6),
(1, 'A3', 16, 4, 77),
(1, 'A3', 16, 5, 81),
(1, 'A3', 16, 6, 48),
(2, 'B1', 1, 1, 92),
(2, 'B1', 1, 2, 5),
(2, 'B1', 1, 3, 42),
(2, 'B1', 1, 4, 39),
(2, 'B1', 1, 5, 62),
(2, 'B1', 1, 6, 39),
(2, 'B1', 2, 1, 89),
(2, 'B1', 2, 2, 97),
(2, 'B1', 2, 3, 7),
(2, 'B1', 2, 4, 11),
(2, 'B1', 2, 5, 31),
(2, 'B1', 2, 6, 10),
(2, 'B1', 3, 1, 18),
(2, 'B1', 3, 2, 49),
(2, 'B1', 3, 3, 35),
(2, 'B1', 3, 4, 88),
(2, 'B1', 3, 5, 32),
(2, 'B1', 3, 6, 71),
(2, 'B1', 4, 1, 75),
(2, 'B1', 4, 2, 17),
(2, 'B1', 4, 3, 89),
(2, 'B1', 4, 4, 39),
(2, 'B1', 4, 5, 87),
(2, 'B1', 4, 6, 97),
(2, 'B1', 5, 1, 30),
(2, 'B1', 5, 2, 81),
(2, 'B1', 5, 3, 25),
(2, 'B1', 5, 4, 35),
(2, 'B1', 5, 5, 73),
(2, 'B1', 5, 6, 21),
(2, 'B1', 6, 1, 93),
(2, 'B1', 6, 2, 33),
(2, 'B1', 6, 3, 11),
(2, 'B1', 6, 4, 68),
(2, 'B1', 6, 5, 72),
(2, 'B1', 6, 6, 29),
(2, 'B1', 16, 1, 23),
(2, 'B1', 16, 2, 50),
(2, 'B1', 16, 3, 37),
(2, 'B1', 16, 4, 39),
(2, 'B1', 16, 5, 62),
(2, 'B1', 16, 6, 54),
(2, 'B2', 1, 1, 89),
(2, 'B2', 1, 2, 77),
(2, 'B2', 1, 3, 99),
(2, 'B2', 1, 4, 98),
(2, 'B2', 1, 5, 50),
(2, 'B2', 1, 6, 73),
(2, 'B2', 2, 1, 35),
(2, 'B2', 2, 2, 42),
(2, 'B2', 2, 3, 52),
(2, 'B2', 2, 4, 83),
(2, 'B2', 2, 5, 59),
(2, 'B2', 2, 6, 55),
(2, 'B2', 3, 1, 54),
(2, 'B2', 3, 2, 73),
(2, 'B2', 3, 3, 91),
(2, 'B2', 3, 4, 31),
(2, 'B2', 3, 5, 83),
(2, 'B2', 3, 6, 13),
(2, 'B2', 4, 1, 47),
(2, 'B2', 4, 2, 7),
(2, 'B2', 4, 3, 5),
(2, 'B2', 4, 4, 19),
(2, 'B2', 4, 5, 12),
(2, 'B2', 4, 6, 89),
(2, 'B2', 5, 1, 40),
(2, 'B2', 5, 2, 17),
(2, 'B2', 5, 3, 94),
(2, 'B2', 5, 4, 23),
(2, 'B2', 5, 5, 21),
(2, 'B2', 5, 6, 10),
(2, 'B2', 6, 1, 59),
(2, 'B2', 6, 2, 20),
(2, 'B2', 6, 3, 69),
(2, 'B2', 6, 4, 38),
(2, 'B2', 6, 5, 26),
(2, 'B2', 6, 6, 47),
(2, 'B2', 16, 1, 70),
(2, 'B2', 16, 2, 7),
(2, 'B2', 16, 3, 79),
(2, 'B2', 16, 4, 80),
(2, 'B2', 16, 5, 19),
(2, 'B2', 16, 6, 80),
(3, 'C1', 1, 1, 48),
(3, 'C1', 1, 2, 46),
(3, 'C1', 1, 3, 65),
(3, 'C1', 1, 4, 6),
(3, 'C1', 1, 5, 85),
(3, 'C1', 1, 6, 33),
(3, 'C1', 2, 1, 61),
(3, 'C1', 2, 2, 32),
(3, 'C1', 2, 3, 38),
(3, 'C1', 2, 4, 67),
(3, 'C1', 2, 5, 90),
(3, 'C1', 2, 6, 59),
(3, 'C1', 3, 1, 59),
(3, 'C1', 3, 2, 9),
(3, 'C1', 3, 3, 89),
(3, 'C1', 3, 4, 89),
(3, 'C1', 3, 5, 88),
(3, 'C1', 3, 6, 46),
(3, 'C1', 4, 1, 30),
(3, 'C1', 4, 2, 99),
(3, 'C1', 4, 3, 90),
(3, 'C1', 4, 4, 76),
(3, 'C1', 4, 5, 68),
(3, 'C1', 4, 6, 52),
(3, 'C1', 5, 1, 74),
(3, 'C1', 5, 2, 45),
(3, 'C1', 5, 3, 76),
(3, 'C1', 5, 4, 33),
(3, 'C1', 5, 5, 90),
(3, 'C1', 5, 6, 31),
(3, 'C1', 6, 1, 78),
(3, 'C1', 6, 2, 89),
(3, 'C1', 6, 3, 62),
(3, 'C1', 6, 4, 50),
(3, 'C1', 6, 5, 30),
(3, 'C1', 6, 6, 33),
(3, 'C1', 16, 1, 8),
(3, 'C1', 16, 2, 16),
(3, 'C1', 16, 3, 9),
(3, 'C1', 16, 4, 95),
(3, 'C1', 16, 5, 17),
(3, 'C1', 16, 6, 82),
(3, 'C2', 1, 1, 34),
(3, 'C2', 1, 2, 27),
(3, 'C2', 1, 3, 69),
(3, 'C2', 1, 4, 21),
(3, 'C2', 1, 5, 9),
(3, 'C2', 1, 6, 62),
(3, 'C2', 2, 1, 8),
(3, 'C2', 2, 2, 6),
(3, 'C2', 2, 3, 30),
(3, 'C2', 2, 4, 31),
(3, 'C2', 2, 5, 85),
(3, 'C2', 2, 6, 80),
(3, 'C2', 3, 1, 80),
(3, 'C2', 3, 2, 79),
(3, 'C2', 3, 3, 93),
(3, 'C2', 3, 4, 87),
(3, 'C2', 3, 5, 98),
(3, 'C2', 3, 6, 21),
(3, 'C2', 4, 1, 89),
(3, 'C2', 4, 2, 94),
(3, 'C2', 4, 3, 99),
(3, 'C2', 4, 4, 36),
(3, 'C2', 4, 5, 12),
(3, 'C2', 4, 6, 6),
(3, 'C2', 5, 1, 26),
(3, 'C2', 5, 2, 44),
(3, 'C2', 5, 3, 93),
(3, 'C2', 5, 4, 49),
(3, 'C2', 5, 5, 60),
(3, 'C2', 5, 6, 65),
(3, 'C2', 6, 1, 85),
(3, 'C2', 6, 2, 12),
(3, 'C2', 6, 3, 100),
(3, 'C2', 6, 4, 100),
(3, 'C2', 6, 5, 15),
(3, 'C2', 6, 6, 78),
(3, 'C2', 16, 1, 80),
(3, 'C2', 16, 2, 90),
(3, 'C2', 16, 3, 87),
(3, 'C2', 16, 4, 44),
(3, 'C2', 16, 5, 75),
(3, 'C2', 16, 6, 22),
(3, 'C3', 1, 1, 60),
(3, 'C3', 1, 2, 18),
(3, 'C3', 1, 3, 52),
(3, 'C3', 1, 4, 94),
(3, 'C3', 1, 5, 88),
(3, 'C3', 1, 6, 93),
(3, 'C3', 2, 1, 46),
(3, 'C3', 2, 2, 67),
(3, 'C3', 2, 3, 84),
(3, 'C3', 2, 4, 11),
(3, 'C3', 2, 5, 11),
(3, 'C3', 2, 6, 86),
(3, 'C3', 3, 1, 7),
(3, 'C3', 3, 2, 80),
(3, 'C3', 3, 3, 14),
(3, 'C3', 3, 4, 53),
(3, 'C3', 3, 5, 32),
(3, 'C3', 3, 6, 75),
(3, 'C3', 4, 1, 18),
(3, 'C3', 4, 2, 83),
(3, 'C3', 4, 3, 71),
(3, 'C3', 4, 4, 13),
(3, 'C3', 4, 5, 16),
(3, 'C3', 4, 6, 19),
(3, 'C3', 5, 1, 16),
(3, 'C3', 5, 2, 99),
(3, 'C3', 5, 3, 13),
(3, 'C3', 5, 4, 90),
(3, 'C3', 5, 5, 77),
(3, 'C3', 5, 6, 51),
(3, 'C3', 6, 1, 83),
(3, 'C3', 6, 2, 88),
(3, 'C3', 6, 3, 67),
(3, 'C3', 6, 4, 32),
(3, 'C3', 6, 5, 91),
(3, 'C3', 6, 6, 88),
(3, 'C3', 16, 1, 43),
(3, 'C3', 16, 2, 33),
(3, 'C3', 16, 3, 88),
(3, 'C3', 16, 4, 56),
(3, 'C3', 16, 5, 48),
(3, 'C3', 16, 6, 19);

-- --------------------------------------------------------

--
-- Structure de la table `traversee`
--

DROP TABLE IF EXISTS `traversee`;
CREATE TABLE IF NOT EXISTS `traversee` (
  `numeroTraversee` int NOT NULL AUTO_INCREMENT,
  `dateTraversee` date DEFAULT NULL,
  `heureTraversee` time DEFAULT NULL,
  `CodeLiaison` int NOT NULL,
  `IdBateau` int NOT NULL,
  PRIMARY KEY (`numeroTraversee`),
  KEY `CodeLiaison` (`CodeLiaison`),
  KEY `IdBateau` (`IdBateau`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `traversee`
--

INSERT INTO `traversee` (`numeroTraversee`, `dateTraversee`, `heureTraversee`, `CodeLiaison`, `IdBateau`) VALUES
(1, '2023-01-15', '10:24:37', 1, 2),
(2, '2023-02-15', '10:24:37', 1, 1),
(3, '2023-02-15', '20:24:37', 1, 1),
(4, '2023-03-15', '20:24:37', 1, 3),
(5, '2023-03-15', '20:24:37', 1, 1),
(6, '2023-05-10', '00:00:15', 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `IdCategorie` int NOT NULL,
  `IdType` varchar(50) NOT NULL,
  `TypeTarif` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCategorie`,`IdType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`IdCategorie`, `IdType`, `TypeTarif`) VALUES
(1, 'A1', 'Adulte'),
(1, 'A2', 'Junior'),
(1, 'A3', 'Enfant'),
(2, 'B1', 'Voiture long.inf.4m'),
(2, 'B2', 'Voiture long.inf.5m'),
(3, 'C1', 'Fourgon'),
(3, 'C2', 'Camping Car'),
(3, 'C3', 'Camion');

-- --------------------------------------------------------

--
-- Structure de la table `voyageurs`
--

DROP TABLE IF EXISTS `voyageurs`;
CREATE TABLE IF NOT EXISTS `voyageurs` (
  `IdBateau` int NOT NULL,
  PRIMARY KEY (`IdBateau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `attribuer_ibfk_1` FOREIGN KEY (`IdBateau`) REFERENCES `bateau` (`IdBateau`),
  ADD CONSTRAINT `attribuer_ibfk_2` FOREIGN KEY (`IdEquipement`) REFERENCES `equipement` (`IdEquipement`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`IdCategorie`,`IdType`) REFERENCES `type` (`IdCategorie`, `IdType`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`IdBateau`) REFERENCES `bateau` (`IdBateau`);

--
-- Contraintes pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD CONSTRAINT `liaison_ibfk_1` FOREIGN KEY (`IdPort`) REFERENCES `port` (`IdPort`),
  ADD CONSTRAINT `liaison_ibfk_2` FOREIGN KEY (`IdPort_1`) REFERENCES `port` (`IdPort`),
  ADD CONSTRAINT `liaison_ibfk_3` FOREIGN KEY (`IdSecteur`) REFERENCES `secteur` (`IdSecteur`);

--
-- Contraintes pour la table `marchandise`
--
ALTER TABLE `marchandise`
  ADD CONSTRAINT `marchandise_ibfk_1` FOREIGN KEY (`IdBateau`) REFERENCES `bateau` (`IdBateau`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`numeroTraversee`) REFERENCES `traversee` (`numeroTraversee`);

--
-- Contraintes pour la table `stocker`
--
ALTER TABLE `stocker`
  ADD CONSTRAINT `stocker_ibfk_1` FOREIGN KEY (`IdCategorie`,`IdType`) REFERENCES `type` (`IdCategorie`, `IdType`),
  ADD CONSTRAINT `stocker_ibfk_2` FOREIGN KEY (`IdReservation`) REFERENCES `reservation` (`IdReservation`);

--
-- Contraintes pour la table `tarifer`
--
ALTER TABLE `tarifer`
  ADD CONSTRAINT `tarifer_ibfk_1` FOREIGN KEY (`IdCategorie`,`IdType`) REFERENCES `type` (`IdCategorie`, `IdType`),
  ADD CONSTRAINT `tarifer_ibfk_2` FOREIGN KEY (`CodeLiaison`) REFERENCES `liaison` (`CodeLiaison`),
  ADD CONSTRAINT `tarifer_ibfk_3` FOREIGN KEY (`IdPeriode`) REFERENCES `periode` (`IdPeriode`);

--
-- Contraintes pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD CONSTRAINT `traversee_ibfk_1` FOREIGN KEY (`CodeLiaison`) REFERENCES `liaison` (`CodeLiaison`),
  ADD CONSTRAINT `traversee_ibfk_3` FOREIGN KEY (`IdBateau`) REFERENCES `bateau` (`IdBateau`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`IdCategorie`) REFERENCES `categorie` (`IdCategorie`);

--
-- Contraintes pour la table `voyageurs`
--
ALTER TABLE `voyageurs`
  ADD CONSTRAINT `voyageurs_ibfk_1` FOREIGN KEY (`IdBateau`) REFERENCES `bateau` (`IdBateau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
