-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 mars 2021 à 17:28
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `acc`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

DROP TABLE IF EXISTS `activites`;
CREATE TABLE IF NOT EXISTS `activites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_min` int(11) DEFAULT NULL,
  `age_max` int(11) DEFAULT NULL,
  `tarif_cours` double DEFAULT NULL,
  `tarif_hors_cours` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activites_adherent`
--

DROP TABLE IF EXISTS `activites_adherent`;
CREATE TABLE IF NOT EXISTS `activites_adherent` (
  `activites_id` int(11) NOT NULL,
  `adherent_id` int(11) NOT NULL,
  PRIMARY KEY (`activites_id`,`adherent_id`),
  KEY `IDX_A88627E55B8C31B7` (`activites_id`),
  KEY `IDX_A88627E525F06C53` (`adherent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `famille_id` int(11) DEFAULT NULL,
  `adhesion_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_90D3F060F68139D7` (`adhesion_id`),
  KEY `IDX_90D3F06097A77B84` (`famille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adhesion`
--

DROP TABLE IF EXISTS `adhesion`;
CREATE TABLE IF NOT EXISTS `adhesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee_id` int(11) DEFAULT NULL,
  `banque` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant_total` double DEFAULT NULL,
  `montant_cb` double DEFAULT NULL,
  `montant_sepa` double DEFAULT NULL,
  `montant_ancv` double DEFAULT NULL,
  `montant_can` double DEFAULT NULL,
  `montant_cheque` double DEFAULT NULL,
  `montant_espece` double DEFAULT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C50CA65A543EC5F0` (`annee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

DROP TABLE IF EXISTS `annee`;
CREATE TABLE IF NOT EXISTS `annee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`id`, `libelle`) VALUES
(1, '2021-2022');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210128084130', '2021-01-28 08:41:38', 721),
('DoctrineMigrations\\Version20210128100300', '2021-01-28 10:03:06', 76),
('DoctrineMigrations\\Version20210326171506', '2021-03-26 17:15:25', 57);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `libelle`) VALUES
(1, 'DUPONT');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

DROP TABLE IF EXISTS `horaire`;
CREATE TABLE IF NOT EXISTS `horaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activites_id` int(11) DEFAULT NULL,
  `jour` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BBC83DB65B8C31B7` (`activites_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portable` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `responsable_adherent`
--

DROP TABLE IF EXISTS `responsable_adherent`;
CREATE TABLE IF NOT EXISTS `responsable_adherent` (
  `responsable_id` int(11) NOT NULL,
  `adherent_id` int(11) NOT NULL,
  PRIMARY KEY (`responsable_id`,`adherent_id`),
  KEY `IDX_B47B9C7A53C59D72` (`responsable_id`),
  KEY `IDX_B47B9C7A25F06C53` (`adherent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activites_adherent`
--
ALTER TABLE `activites_adherent`
  ADD CONSTRAINT `FK_A88627E525F06C53` FOREIGN KEY (`adherent_id`) REFERENCES `adherent` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A88627E55B8C31B7` FOREIGN KEY (`activites_id`) REFERENCES `activites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `FK_90D3F06097A77B84` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `FK_90D3F060F68139D7` FOREIGN KEY (`adhesion_id`) REFERENCES `adhesion` (`id`);

--
-- Contraintes pour la table `adhesion`
--
ALTER TABLE `adhesion`
  ADD CONSTRAINT `FK_C50CA65A543EC5F0` FOREIGN KEY (`annee_id`) REFERENCES `annee` (`id`);

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `FK_BBC83DB65B8C31B7` FOREIGN KEY (`activites_id`) REFERENCES `activites` (`id`);

--
-- Contraintes pour la table `responsable_adherent`
--
ALTER TABLE `responsable_adherent`
  ADD CONSTRAINT `FK_B47B9C7A25F06C53` FOREIGN KEY (`adherent_id`) REFERENCES `adherent` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B47B9C7A53C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
