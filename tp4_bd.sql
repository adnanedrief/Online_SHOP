-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 29 avr. 2020 à 15:18
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp4_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `NCommande` int(5) NOT NULL AUTO_INCREMENT,
  `Client` varchar(20) NOT NULL,
  `Produits` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Total` double NOT NULL,
  PRIMARY KEY (`NCommande`)
) ENGINE=MyISAM AUTO_INCREMENT=1072 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`NCommande`, `Client`, `Produits`, `Total`) VALUES
(1000, 'adnanedinox1230', '||SAMSUNG_GALAXY_S9||HUAWEI_P30||Apple_iPhone_8', 36000),
(1068, 'batman', '||Apple_iPhone_8', 6500),
(1066, 'adnane', '||SAMSUNG_GALAXY_S9||HUAWEI_P30', 15000),
(1070, 'admin', '||SAMSUNG_GALAXY_S9||HUAWEI_P30||Apple_iPhone_8', 50000),
(1069, 'admin', '||SAMSUNG_GALAXY_S9||HUAWEI_P30||Apple_iPhone_8', 43500),
(1067, 'batman', '||Apple_iPhone_8', 14000),
(1047, 'adnane', '||SAMSUNG_GALAXY_S9||HUAWEI_P30', 21500);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `passwrd` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `passwrd`, `email`) VALUES
(1, 'adnane', '123', 'adnane@email.com'),
(3, 'adnane1', '1230', 'adnanedrief@gmail.co'),
(9, 'adnane1010', '10', 'cdcdc@live.de'),
(10, 'admin', 'admin', 'cdcdc@live.de'),
(12, 'batman', '123456', 'batman@live.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
