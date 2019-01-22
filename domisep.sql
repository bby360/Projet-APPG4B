-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 22 jan. 2019 à 22:26
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
  `email` varchar(255) NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `lastName`, `firstName`, `email`, `mdp`) VALUES
(1, 'Isep', 'Admin', 'admin@isep.fr', '$2y$10$G5BGV00Wu79VSL3LnpLcquH1OGp8P.Pmfsp29Bv1/nqVkSR7gSYzK');

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `idAlert` int(255) NOT NULL,
  `idCapteur` int(255) NOT NULL,
  `idRoom` int(255) NOT NULL,
  `typeAlerte` varchar(1000) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alerte`
--

INSERT INTO `alerte` (`idAlert`, `idCapteur`, `idRoom`, `typeAlerte`, `message`) VALUES
(1, 5, 4, 'Ne fonctionne pas', 'Clignote en rouge'),
(2, 3, 2, 'fonctionne par intermittence', 'La lumière ne s\'adapte pas toujours bien'),
(3, 12, 9, 'met du temps à repondre', 'Notamment si il y a beaucoup de monde');

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `idCapteur` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL,
  `consommation` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`idCapteur`, `idRoom`, `consommation`, `type`, `idProduit`) VALUES
(1, 1, 12, 'Lumiere', 1),
(2, 1, 12, 'Temperature', 2),
(3, 2, 12, 'Lumiere', 1),
(4, 2, 12, 'Presence', 3),
(5, 4, 12, 'Lumiere', 1),
(6, 5, 12, 'Presence', 3),
(7, 6, 12, 'Lumiere', 1),
(8, 6, 12, 'Temperature', 2),
(9, 7, 12, 'Temperature', 2),
(10, 7, 12, 'Presence', 3),
(11, 8, 12, 'Lumiere', 1),
(12, 9, 12, 'Presence', 3);

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
(1, 'Luminosité', '15', '12'),
(2, 'Temperature', '11', '10'),
(3, 'Présence', '20', '22');

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
(1, 'Bonisseur', 'Hubert', 'hubert.bonisseur@gmail.com', '0656347625', '26 rue des Ternes', '$2y$10$ktQ6o/BNOForZQt322V0n.q/WHkJ/caUhUn/bF2h4USW7QlFrXcbi', 75016, '0648044412', NULL, 'France'),
(2, 'Flantier', 'Noel', 'noel.flantier@gmail.com', '0694371292', '99 avenue du Marechal de Lattre de Tassigny', '$2y$10$n0xPrpXDkq4X/2jO7S/eq.spWuaJjWFtNaRszyCWz5kUNH7d8Ygoe', 1210, '0694857601', NULL, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idQuestionReponse` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idQuestionReponse`, `question`, `reponse`) VALUES
(1, 'Comment changer mon numéro de téléphone', 'cliquez sur le bouton \'modifier votre profil\' sur la page Profil'),
(2, 'Comment ajouter une pièce', 'cliquer sur \'ajouter une pièce\' dans le menu déroulant \'pièces\'');

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
(1, 1, 'Hubert', 'Mon volet reste bloqué à mi-hauteur. Je n\'arrive pas à le débloquer, j\'ai peur de tout casser', '2019-01-22 20:51:09'),
(2, 2, 'Noel', 'On m\'indique une consommation excessive aux mois de juillet et août, alors que je n’étais pas chez moi durant cette période !', '2019-01-22 20:59:02'),
(3, 1, 'Admin', 'Avez-vous essayé de changer de mode ?', '2019-01-22 21:02:33'),
(4, 2, 'Admin', 'êtes vous certain de regarder la consommation de la bonne maison ?', '2019-01-22 21:03:51'),
(5, 1, 'Hubert', 'Ça fonctionne ! Merci Beaucoup !', '2019-01-22 21:05:01');

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
(1, 'Volet bloqué', '2019-01-22'),
(2, 'Consommation pas cohérante', '2019-01-22');

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
(1, 1, '26 rue des Ternes'),
(2, 1, '32 rue de la mer'),
(3, 2, '99 avenue du Marechal de Lattre de Tassigny'),
(4, 2, 'maison de vacances');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `idRoom` int(11) NOT NULL,
  `idHouse` int(11) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `surface` int(4) NOT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `tempAuto` int(11) DEFAULT NULL,
  `tempManu` int(11) DEFAULT NULL,
  `lumAuto` int(11) DEFAULT NULL,
  `lumManu` int(11) DEFAULT NULL,
  `blindOpenTime` time DEFAULT NULL,
  `blindCloseTime` time DEFAULT NULL,
  `voletsManu` int(11) DEFAULT NULL,
  `lum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`idRoom`, `idHouse`, `roomName`, `surface`, `mode`, `tempAuto`, `tempManu`, `lumAuto`, `lumManu`, `blindOpenTime`, `blindCloseTime`, `voletsManu`, `lum`) VALUES
(1, 1, 'Salon', 25, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Cuisine', 15, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Chambre', 12, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 'Salon', 30, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'Bibliothèque', 20, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'Petit Salon', 15, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, 'Grand Salon', 40, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 4, 'Chambre', 15, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 4, 'Cuisine', 9, 'Manuel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`idAlert`);

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
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idQuestionReponse`);

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
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `idAlert` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `idCapteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idQuestionReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `forummessage`
--
ALTER TABLE `forummessage`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `forumtopic`
--
ALTER TABLE `forumtopic`
  MODIFY `idTopic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `house`
--
ALTER TABLE `house`
  MODIFY `idHouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
