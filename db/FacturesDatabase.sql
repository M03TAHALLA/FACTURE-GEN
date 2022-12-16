-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql7.freesqldatabase.com
-- Generation Time: Dec 16, 2022 at 09:20 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql7584997`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `IdArticle` int(100) NOT NULL,
  `NomArticle` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `Prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `IdClient` int(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sexe` varchar(10) NOT NULL,
  `Adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `NumCommande` int(100) NOT NULL,
  `TotalePrix` int(11) NOT NULL,
  `DateCréation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commercial`
--

CREATE TABLE `commercial` (
  `IdCommercial` int(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `Sexe` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dvs_article`
--

CREATE TABLE `dvs_article` (
  `NumDevis` int(100) NOT NULL,
  `idArticle` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fichdevis`
--

CREATE TABLE `fichdevis` (
  `NumDevis` int(100) NOT NULL,
  `IdClient` int(100) NOT NULL,
  `DateCréation` date NOT NULL,
  `DateExpiration` date NOT NULL,
  `TotalePrix` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fornisseur`
--

CREATE TABLE `fornisseur` (
  `IdFornisseur` int(100) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Sexe` varchar(10) NOT NULL,
  `Adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`IdArticle`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`NumCommande`);

--
-- Indexes for table `commercial`
--
ALTER TABLE `commercial`
  ADD PRIMARY KEY (`IdCommercial`);

--
-- Indexes for table `dvs_article`
--
ALTER TABLE `dvs_article`
  ADD KEY `ArticleKey` (`idArticle`),
  ADD KEY `DevisKey` (`NumDevis`);

--
-- Indexes for table `fichdevis`
--
ALTER TABLE `fichdevis`
  ADD PRIMARY KEY (`NumDevis`),
  ADD KEY `ForKey` (`IdClient`);

--
-- Indexes for table `fornisseur`
--
ALTER TABLE `fornisseur`
  ADD PRIMARY KEY (`IdFornisseur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `IdArticle` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `IdClient` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `NumCommande` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commercial`
--
ALTER TABLE `commercial`
  MODIFY `IdCommercial` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fichdevis`
--
ALTER TABLE `fichdevis`
  MODIFY `NumDevis` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fornisseur`
--
ALTER TABLE `fornisseur`
  MODIFY `IdFornisseur` int(100) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dvs_article`
--
ALTER TABLE `dvs_article`
  ADD CONSTRAINT `ArticleKey` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`IdArticle`),
  ADD CONSTRAINT `DevisKey` FOREIGN KEY (`NumDevis`) REFERENCES `fichdevis` (`NumDevis`);

--
-- Constraints for table `fichdevis`
--
ALTER TABLE `fichdevis`
  ADD CONSTRAINT `ForKey` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
