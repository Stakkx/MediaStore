-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 déc. 2019 à 15:07
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediastore`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`type_id`),
  KEY `fk_Categories_type1_idx` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `type_id`) VALUES
(1, 'rock', 'rock-n-roll', 1),
(2, 'action', 'film de type action', 2);

-- --------------------------------------------------------

--
-- Structure de la table `comandes`
--

DROP TABLE IF EXISTS `comandes`;
CREATE TABLE IF NOT EXISTS `comandes` (
  `id` int(11) NOT NULL,
  `facture_id` int(11) NOT NULL,
  `quantite` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`facture_id`),
  KEY `fk_comandes_facture1_idx` (`facture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `name`, `description`) VALUES
(1, 'en stock', 'en stock'),
(2, 'hors stock', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Users_id` int(11) NOT NULL,
  `ref_facture` varchar(45) DEFAULT NULL,
  `date_payement` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`Users_id`),
  KEY `fk_commandes_Users1_idx` (`Users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` longblob,
  `etat_id` int(11) NOT NULL,
  `Categories_id` int(11) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`etat_id`,`Categories_id`,`type_id`),
  KEY `fk_Produits_etat1_idx` (`etat_id`),
  KEY `fk_Produits_Categories1_idx` (`Categories_id`),
  KEY `fk_Produits_type1_idx` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `description`, `etat_id`, `Categories_id`, `prix`, `type_id`) VALUES
(21, 'Fast & Furious', 0x426f6e6a6f7572, 2, 2, 145, 2),
(145, 'Rock20', NULL, 1, 1, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `adresse1` varchar(45) DEFAULT NULL,
  `adresse2` varchar(45) DEFAULT NULL,
  `codepost` varchar(45) DEFAULT NULL,
  `commune` varchar(45) DEFAULT NULL,
  `Users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Users_id`),
  KEY `fk_profile_Users1_idx` (`Users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantite_commande` int(11) DEFAULT NULL,
  `quantite_stock` varchar(45) DEFAULT NULL,
  `Produits_id` int(11) NOT NULL,
  `comandes_facture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Produits_id`,`comandes_facture_id`),
  KEY `fk_stock_Produits1_idx` (`Produits_id`),
  KEY `fk_stock_comandes1_idx` (`comandes_facture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`, `description`) VALUES
(1, 'CD', 'CD-ROM'),
(2, 'DVD', 'DVD-ROM');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@free.fr', 'admin', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_Categories_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comandes`
--
ALTER TABLE `comandes`
  ADD CONSTRAINT `fk_comandes_facture1` FOREIGN KEY (`facture_id`) REFERENCES `facture` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_commandes_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_Produits_Categories1` FOREIGN KEY (`Categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produits_etat1` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produits_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_Produits1` FOREIGN KEY (`Produits_id`) REFERENCES `produits` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_comandes1` FOREIGN KEY (`comandes_facture_id`) REFERENCES `comandes` (`facture_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
