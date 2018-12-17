-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 17, 2018 at 05:12 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domisep`
--

-- --------------------------------------------------------

--
-- Table structure for table `capteur`
--

CREATE TABLE `capteur` (
  `idCapteur` int(11) DEFAULT NULL,
  `idRoom` int(11) NOT NULL,
  `consommation` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `idProduit` int(11) NOT NULL,
  `typeProduct` varchar(255) NOT NULL,
  `consumption` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`idProduit`, `typeProduct`, `consumption`, `price`) VALUES
(1, 'Capteur Température 1', '', '6,99'),
(2, 'Capteur présence 1', '', '12,49');

-- --------------------------------------------------------

--
-- Table structure for table `client`
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
  `pays` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ceci est la table client';

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `lastName`, `firstName`, `email`, `phone`, `adress`, `mdp`, `postalcode`, `emergency`, `remember`, `pays`) VALUES
(6, 'test', 'test', 'test@test.test', '0878656787', '11 rue test', '$2y$10$HbmptPgcFCCaPSErfmqTq.T2PqdQr65tTN1vgelzrrFFdsCF4HICi', 77689, '1234567890', '', '0'),
(7, 'michel', 'dupont', 'michel.dupond@gmail.com', '160246659', '111 rue de la fontaine sarrazin', '$2y$10$uSfTopZeyZ8G.LTZWWyeyuYmdcOgUrXh34RCv0kQbH9D2p7XpNgEa', 77124, '160246659', '', '0'),
(9, 'abcd', 'efgh', 'ijkl@mno.pq', '0179234478', '13 rue bac', '$2y$10$MVPAiw3EiwEkAVhyJhLN4O3wu48GQtxwMO1GQnzqY1OXV3AiAkthu', 33333, '1234322454', '', '0'),
(10, 'test', 'testest', 'test@ttest.fr', '035463256', '12 rue re', '$2y$10$VPqLoFaECHbUH1tkRdFfke1akFUPOJDbS4Iwbrf3G7hCPgqL1DsHe', 77100, '123433432', '', '0'),
(11, 'bonjour', 'billy', 'comen@cv.fr', '1234567654', '12 fgg', '$2y$10$sIthAa8IVi6j.MUiJ4TW5uKrf4KE5iU9ULd0.AVSwSjklhDjXK8D.', 77100, '1234543223', '', 'fRANCE'),
(12, 'bonjou', 'billy', 'comen@cv.fr', '1234567654', '12 fgg', '$2y$10$nT7KaKNS/YXFLjZwY3JHZuafJNtINeNAmHck8PMRyEA.Cborf7IFW', 77100, '1234543223', '', 'fRANCE'),
(13, '<b> BLOP <b>', 'vff', 'billy.travail@gmail.com', '160246659', '111 rue de la fontaine sarrazin', '$2y$10$K3wEzQuVUCQUYDdPGo1GNOPRVvv4cQhx9qEg8.kVE0nSaPi1xEIJi', 77124, '2345433454', '', 'France'),
(15, 'Lesage', 'Edouard', 'edouard.lesage@yahoo.fr', '0652580563', '121 Boulevard de Grenelle', '$2y$10$eERpxXCiB3mQBQedzs8EAOFqtQgZCbvO4X0PTGxOS/l4XooMEMu2K', 75015, '', NULL, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `idHouse` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`idHouse`, `idClient`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
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
-- Dumping data for table `room`
--

INSERT INTO `room` (`idRoom`, `idHouse`, `roomName`, `surface`, `mode`, `tempAuto`, `tempManu`, `lumAuto`, `lumManu`, `blindOpenTime`, `blindCloseTime`, `voletsManu`) VALUES
(1, 1, 'Salon', 42, 'Auto', 23, 20, 100, 300, '16:30:00', '08:00:00', 0),
(2, 1, 'Chambre 1', 18, 'Auto', 19, 21, 200, 200, '00:00:00', '00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`idHouse`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idClient_2` (`idClient`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idRoom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `idHouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
