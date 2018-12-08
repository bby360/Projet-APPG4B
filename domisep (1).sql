-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 08 déc. 2018 à 21:54
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `domisep`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `idCapteur` int(11) DEFAULT NULL,
  `idRoom` int(11) NOT NULL,
  `consommation` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE `catalogue` (
  `idProduit` int(11) NOT NULL,
  `typeProduct` varchar(255) NOT NULL,
  `consumption` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `catalogue`
--

INSERT INTO `catalogue` (`idProduit`, `typeProduct`, `consumption`, `price`) VALUES
(1, 'Capteur Température 1', '', '6,99'),
(2, 'Capteur présence 1', '', '12,49');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(10) NOT NULL,
  `adress` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` text CHARACTER SET utf8 NOT NULL,
  `postalcode` int(5) NOT NULL,
  `emergency` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ceci est la table client';

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `lastName`, `firstName`, `email`, `phone`, `adress`, `mdp`, `postalcode`, `emergency`) VALUES
(1, 'Dupond', 'Michel', 'michel.dupond@gmail.com', '0654398723', '13 avenue du général de Gaulle', 'motdepasse', 92170, '0'),
(2, 'Martin', 'Stéphanie', 'stphmar@yahoo.fr', '0688231062', '6 impasse des oliviers', 'iseppromo2021', 93370, '0654690217'),
(3, 'Diallo', 'Billy', 'billy.travail@gmail.com', '160246659', '111 rue de la fontaine sarrazin', '$2y$10$i5F4iaJCKjzcUAIfURlGSOHcOzIOl6z8v7ZGa70CJNyxtkOSfaiPG', 77124, '1827364958');

-- --------------------------------------------------------

--
-- Structure de la table `house`
--

CREATE TABLE `house` (
  `idHouse` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `house`
--

INSERT INTO `house` (`idHouse`, `idClient`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `idRoom` int(11) NOT NULL,
  `idHouse` int(11) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `surface` int(4) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `tempAuto` int(11) NOT NULL,
  `tempManu` int(11) NOT NULL,
  `lumAuto` int(11) NOT NULL,
  `lumManu` int(11) NOT NULL,
  `blindOpenTime` int(11) DEFAULT NULL,
  `blindCloseTime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`idRoom`, `idHouse`, `roomName`, `surface`, `mode`, `tempAuto`, `tempManu`, `lumAuto`, `lumManu`, `blindOpenTime`, `blindCloseTime`) VALUES
(1, 1, 'Salon', 42, 'Auto', 21, 20, 300, 300, 0, 0),
(2, 1, 'Chambre 1', 18, 'Auto', 19, 21, 200, 200, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`idHouse`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idClient_2` (`idClient`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idRoom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `house`
--
ALTER TABLE `house`
  MODIFY `idHouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
