-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 14 jan. 2019 à 18:05
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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `idCapteur` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL,
  `consommation` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `typeAlerte` text,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`idCapteur`, `idRoom`, `consommation`, `type`, `typeAlerte`, `message`) VALUES
(1, 6, 22, 'lumiere', 'je l\'ai cassé', 'dommage'),
(2, 6, 22, 'temperature', '', ''),
(3, 7, 22, 'volet', '', '');

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
(1, 'Température', '', '6,99'),
(2, 'Présence', '', '12,49');

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
  `remember` text,
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
(13, '<b> BLOP <b>', 'vff', 'billy.travail@gmail.com', '160246659', '111 rue de la fontaine sarrazin', '$2y$10$K3wEzQuVUCQUYDdPGo1GNOPRVvv4cQhx9qEg8.kVE0nSaPi1xEIJi', 77124, '2345433454', '', 'France'),
(14, 'p', 'p', 'p@p.com', '1', 'p', '$2y$10$d48wvdlPFYt3ln6qfJ87n.Etwq.QvbJYXxmaJsTaM7IzDgqE1DTMm', 1, '1', '', 'p'),
(15, 'a', 'a', 'a@a.com', '1', 'a', '$2y$10$DAMljxwesRBH4zgCyGr1EupY33upNHRX6FnX.lcgB1iTWbYrMoOWC', 1, '1', '', 'a'),
(16, 'b', 'b', 'b@b.com', '1', 'b', '$2y$10$0bYk.2NV2fam/g4W0w.FCOErdIjhde/B6bh6.Ios8wxzBYbEkRO1S', 1, '1', '', 'b'),
(17, 'gabriel', 'astieres', 'gabriel.astieres@gmail.com', '0615434238', '115 route du plan de la tour, villa 64 parc de ste Maxime', '$2y$10$545YzgDhhq06xI9nTmsTleS.7yA32YWhNrkpNglQYCdmTmn5N.PTu', 83120, '', '', 'France'),
(18, 'sdfsd', 'sdfs', 'sdfasdheilly@gmail.com', '56456', 'dsfgsd', '$2y$10$LzxdZu0NT19V1J2MDabBAO4HoJ2J/E7P2Kyu16CKUNB0enldpGFl.', 654, '5646', NULL, 'dfgdfg'),
(19, 'd\'Heilly', 'Mathias', 'mathiasdheilly@gmail.com', '0645454545', '123 dsfgdf', '$2y$10$7PiRszbB7yPUQHD496ov..GhpE4/CRyZuHeFGfEISq/x4lsG26ajW', 92150, '', NULL, 'france');

-- --------------------------------------------------------

--
-- Structure de la table `forummessage`
--

CREATE TABLE `forummessage` (
  `idMessage` int(11) NOT NULL,
  `idTopic` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `forummessage`
--

INSERT INTO `forummessage` (`idMessage`, `idTopic`, `author`, `message`, `date`) VALUES
(13, 1, 'fghfg', 'fghfgh', '2019-01-09 10:48:58'),
(14, 2, 'klkl', 'klklk', '2019-01-09 10:49:03'),
(15, 2, 'yti', 'yti', '2019-01-09 10:49:10'),
(16, 1, 'rzeere', 'ererere', '2019-01-09 10:49:17');

-- --------------------------------------------------------

--
-- Structure de la table `forumtopic`
--

CREATE TABLE `forumtopic` (
  `idTopic` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `forumtopic`
--

INSERT INTO `forumtopic` (`idTopic`, `name`, `creationDate`) VALUES
(1, 'hfgh', '2019-01-09'),
(2, 'klkl', '2019-01-09');

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
(2, 2, '0'),
(3, 15, '15 pignon sur rue'),
(4, 5, '123 fjk'),
(5, 19, '12312'),
(6, 19, 'chez moi');

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
(1, 1, 'Salon', 42, 'Auto', 0, 20, 15, 300, '00:00:00', '00:00:00', 0),
(2, 1, 'Chambre 1', 18, 'Auto', 19, 21, 200, 200, '00:00:00', '00:00:00', 0),
(3, 3, 'garage', 20, 'automatique', 0, 0, 0, 0, NULL, NULL, 0),
(4, 3, 'garage', 20, 'automatique', 0, 0, 0, 0, NULL, NULL, 1),
(5, 4, 'oui', 22, 'Auto', 22, 22, 22, 22, '22:22:00', '23:23:00', 22),
(6, 5, 'chambre', 22, 'Auto', 0, 100, 20, 100, '22:22:00', '22:23:00', 100),
(7, 5, 'ed', 22, 'Auto', 23232, 100, 25, 100, '05:05:00', '21:11:00', 100),
(8, 5, 'billy', 22, 'Auto', 14, 0, 100, 0, '12:13:00', '12:14:00', 0),
(9, 5, 'hugo', 22, 'Auto', 24, 0, 20, 15, '22:23:00', '23:24:00', 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`idCapteur`);

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
-- Index pour la table `forumtopic`
--
ALTER TABLE `forumtopic`
  ADD PRIMARY KEY (`idTopic`);

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
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `idCapteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `forummessage`
--
ALTER TABLE `forummessage`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `forumtopic`
--
ALTER TABLE `forumtopic`
  MODIFY `idTopic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `house`
--
ALTER TABLE `house`
  MODIFY `idHouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
