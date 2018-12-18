-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 18 déc. 2018 à 17:49
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
  `emergency` varchar(10) DEFAULT NULL,
  `remember` text NOT NULL,
  `pays` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ceci est la table client';

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `lastName`, `firstName`, `email`, `phone`, `adress`, `mdp`, `postalcode`, `emergency`, `remember`, `pays`) VALUES
(6, 'test', 'test', 'test@test.test', '0878656787', '11 rue test', '$2y$10$HbmptPgcFCCaPSErfmqTq.T2PqdQr65tTN1vgelzrrFFdsCF4HICi', 77689, '1234567890', '', '0'),
(7, 'michel', 'dupont', 'michel.dupond@gmail.com', '160246659', '111 rue de la fontaine sarrazin', '$2y$10$uSfTopZeyZ8G.LTZWWyeyuYmdcOgUrXh34RCv0kQbH9D2p7XpNgEa', 77124, '160246659', '', '0'),
(9, 'abcd', 'efgh', 'ijkl@mno.pq', '0179234478', '13 rue bac', '$2y$10$MVPAiw3EiwEkAVhyJhLN4O3wu48GQtxwMO1GQnzqY1OXV3AiAkthu', 33333, '1234322454', '', '0'),
(10, 'test', 'testest', 'test@ttest.fr', '035463256', '12 rue re', '$2y$10$VPqLoFaECHbUH1tkRdFfke1akFUPOJDbS4Iwbrf3G7hCPgqL1DsHe', 77100, '123433432', '', '0'),
(11, 'bonjour', 'billy', 'comen@cv.fr', '1234567654', '12 fgg', '$2y$10$sIthAa8IVi6j.MUiJ4TW5uKrf4KE5iU9ULd0.AVSwSjklhDjXK8D.', 77100, '1234543223', '', 'fRANCE'),
(12, 'bonjou', 'billy', 'comen@cv.fr', '1234567654', '12 fgg', '$2y$10$nT7KaKNS/YXFLjZwY3JHZuafJNtINeNAmHck8PMRyEA.Cborf7IFW', 77100, '1234543223', '', 'fRANCE'),
(13, '<b> BLOP <b>', 'vff', 'billy.travail@gmail.com', '160246659', '111 rue de la fontaine sarrazin', '$2y$10$K3wEzQuVUCQUYDdPGo1GNOPRVvv4cQhx9qEg8.kVE0nSaPi1xEIJi', 77124, '2345433454', '', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `forummessage`
--

CREATE TABLE `forummessage` (
  `idMessage` int(11) NOT NULL,
  `idTopic` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `message` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `forumtopic`
--

CREATE TABLE `forumtopic` (
  `idTopic` int(11) NOT NULL,
  `name` text NOT NULL,
  `creationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `house`
--

CREATE TABLE `house` (
  `idHouse` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `house`
--

INSERT INTO `house` (`idHouse`, `idClient`, `adress`) VALUES
(1, 1, '0'),
(2, 2, '0');

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
  `blindOpenTime` time DEFAULT NULL,
  `blindCloseTime` time DEFAULT NULL,
  `voletsManu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`idRoom`, `idHouse`, `roomName`, `surface`, `mode`, `tempAuto`, `tempManu`, `lumAuto`, `lumManu`, `blindOpenTime`, `blindCloseTime`, `voletsManu`) VALUES
(1, 1, 'Salon', 42, 'Auto', 23, 20, 100, 300, '16:30:00', '08:00:00', 0),
(2, 1, 'Chambre 1', 18, 'Auto', 19, 21, 200, 200, '00:00:00', '00:00:00', 0);

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
-- Index pour la table `forummessage`
--
ALTER TABLE `forummessage`
  ADD PRIMARY KEY (`idMessage`);

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
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `forummessage`
--
ALTER TABLE `forummessage`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `house`
--
ALTER TABLE `house`
  MODIFY `idHouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
