-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 19 Septembre 2019 à 13:17
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `employers`
--

CREATE TABLE `employers` (
  `Matricule` varchar(50) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Date_de_naissance` varchar(21) NOT NULL,
  `Salaire` int(22) NOT NULL,
  `Telephone` int(22) NOT NULL,
  `Email` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employers`
--

INSERT INTO `employers` (`Matricule`, `Nom`, `Prenom`, `Date_de_naissance`, `Salaire`, `Telephone`, `Email`) VALUES
('EM-00001', 'Sow', 'Fatou', '20/12/1990', 25000, 773881854, 'toufa312@gmail.com'),
('EM-00002', 'Diaw', 'Pape', '12/04/1994', 25000, 773881854, 'dany322@gmail.com'),
('EM-00003', 'Ndiaye', 'Sidi', '20/12/1990', 50000, 765436754, 'dero23@gmail.com'),
('EM-00004', 'BÃ¢', 'Mory', '11/04/1990', 45000, 778768765, 'bamory09@gmail.com'),
('EM-00005', 'Barry', 'Alph', '05/05/1980', 65000, 765436754, 'barry555@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
