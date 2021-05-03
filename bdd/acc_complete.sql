-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 03 mai 2021 à 19:43
-- Version du serveur :  10.2.37-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uftuqcvv_acc`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_min` int(11) DEFAULT NULL,
  `age_max` int(11) DEFAULT NULL,
  `tarif_cours` double DEFAULT NULL,
  `tarif_hors_cours` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`id`, `libelle`, `age_min`, `age_max`, `tarif_cours`, `tarif_hors_cours`) VALUES
(3, 'Hip-Hop', 3, 21, 120, 140),
(4, 'Guitare', 10, 90, 190, 210),
(5, 'Ludothéque', 2, 12, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `activites_adherent`
--

CREATE TABLE `activites_adherent` (
  `activites_id` int(11) NOT NULL,
  `adherent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activites_adherent`
--

INSERT INTO `activites_adherent` (`activites_id`, `adherent_id`) VALUES
(3, 3),
(3, 4),
(3, 5),
(3, 7),
(4, 2),
(4, 6),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `famille_id` int(11) DEFAULT NULL,
  `adhesion_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id`, `famille_id`, `adhesion_id`, `nom`, `prenom`, `date_naissance`, `genre`) VALUES
(2, 2, 2, 'DUPONT', 'Marine', '14/02/2010', 'Féminin'),
(3, 2, 3, 'DUPONT', 'Théo', '24/05/2012', 'Masculin'),
(4, 3, 4, 'GABA', 'Zoé', '17/12/2015', 'Féminin'),
(5, 4, 5, 'TROUNAN', 'Marie', '02/10/2007', 'Féminin'),
(6, 5, 6, 'ERIKA', 'Marianne', '29/03/1963', 'Féminin'),
(7, 7, 7, 'ZATI', 'Paul', '15/09/1939', 'Masculin');

-- --------------------------------------------------------

--
-- Structure de la table `adhesion`
--

CREATE TABLE `adhesion` (
  `id` int(11) NOT NULL,
  `annee_id` int(11) DEFAULT NULL,
  `banque` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant_total` double DEFAULT NULL,
  `montant_cb` double DEFAULT NULL,
  `montant_sepa` double DEFAULT NULL,
  `montant_ancv` double DEFAULT NULL,
  `montant_can` double DEFAULT NULL,
  `montant_cheque` double DEFAULT NULL,
  `montant_espece` double DEFAULT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adhesion`
--

INSERT INTO `adhesion` (`id`, `annee_id`, `banque`, `montant_total`, `montant_cb`, `montant_sepa`, `montant_ancv`, `montant_can`, `montant_cheque`, `montant_espece`, `commentaire`) VALUES
(2, 1, 'Société Générale', 120, 0, 0, 0, 0, 0, 0, NULL),
(3, 1, 'Société Générale', 200, 100, 0, 0, 0, 0, 0, NULL),
(4, 1, 'Crédit Agricole', 260, 120, 0, 50, 0, 0, 0, 'Carte bancaire en 4 fois. Prochaine échéance : 25/08/2021'),
(5, 1, 'Boursorama Banque', 120, 0, 0, 0, 0, 120, 0, 'Chèque à encaisser le 25/05/2021'),
(6, 1, 'HSBC', 200, 100, 0, 0, 0, 0, 0, NULL),
(7, 1, NULL, 120, 0, 0, 0, 0, 120, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `id` int(11) NOT NULL,
  `libelle` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`id`, `libelle`) VALUES
(1, '2021-2022');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
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

CREATE TABLE `famille` (
  `id` int(11) NOT NULL,
  `libelle` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `libelle`) VALUES
(2, 'DUPONT'),
(3, 'DIBAMA-GABA'),
(4, 'TROUNAN'),
(5, 'ERIKA'),
(7, 'ZATI');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `activites_id` int(11) DEFAULT NULL,
  `jour` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `activites_id`, `jour`, `date_debut`, `date_fin`) VALUES
(1, 3, 'Mercredi', '12h00', '14h00'),
(2, 3, 'Samedi', '10h00', '12h00'),
(3, 4, 'Mardi', '17h00', '18h00'),
(4, 5, 'Mercredi', '10h00', '12h00'),
(5, 5, 'Mercredi', '14h00', '18h00');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `id` int(11) NOT NULL,
  `genre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portable` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`id`, `genre`, `nom`, `prenom`, `telephone`, `portable`, `mail`, `adresse`, `ville`, `cp`) VALUES
(2, 'Masculin', 'DUPONT', 'Martin', '0231548741', '0687451202', 'dupont.martin@gmail.com', '27 rue de la Concorde', 'Caen', '14000'),
(3, 'Féminin', 'DUPONT', 'Denise', '0254874151', '0684542101', 'dupont.denise@live.fr', '27 rue de la concorde', 'Caen', '14000'),
(5, 'Féminin', 'GABA', 'Ginny', NULL, '0654847412', 'gabagin@gmail.com', '20 rue Guillaume le Conquérant', 'Courseulles-sur-Mer', '14470'),
(6, 'Féminin', 'DIBAMA', 'Hama', NULL, '0745121333', 'hama.dibama14@hotmail.fr', '20 rue Guillaume le Conquérant', 'Courseulles-sur-Mer', '14470'),
(7, 'Masculin', 'TROUNAN', 'Hervé', '0231548741', '0699541102', 'mu.trounan@orange.fr', '277 Avenue de la Miséricorde', 'Courseulles-sur-Mer', '14470'),
(8, 'Féminin', 'ERIKA', 'Marianne', NULL, '0784541220', 'erika.marianne@gmail.com', '2 rue Docteur Boulanger', 'Courseulles-sur-Mer', '14470'),
(9, 'Masculin', 'ZATI', 'Paul', '0231548741', '0699451120', NULL, '99 chemin de la croix', 'Caen', '14000');

-- --------------------------------------------------------

--
-- Structure de la table `responsable_adherent`
--

CREATE TABLE `responsable_adherent` (
  `responsable_id` int(11) NOT NULL,
  `adherent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `responsable_adherent`
--

INSERT INTO `responsable_adherent` (`responsable_id`, `adherent_id`) VALUES
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(5, 4),
(6, 4),
(7, 5),
(8, 6),
(9, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `activites_adherent`
--
ALTER TABLE `activites_adherent`
  ADD PRIMARY KEY (`activites_id`,`adherent_id`),
  ADD KEY `IDX_A88627E55B8C31B7` (`activites_id`),
  ADD KEY `IDX_A88627E525F06C53` (`adherent_id`);

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_90D3F060F68139D7` (`adhesion_id`),
  ADD KEY `IDX_90D3F06097A77B84` (`famille_id`);

--
-- Index pour la table `adhesion`
--
ALTER TABLE `adhesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C50CA65A543EC5F0` (`annee_id`);

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BBC83DB65B8C31B7` (`activites_id`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `responsable_adherent`
--
ALTER TABLE `responsable_adherent`
  ADD PRIMARY KEY (`responsable_id`,`adherent_id`),
  ADD KEY `IDX_B47B9C7A53C59D72` (`responsable_id`),
  ADD KEY `IDX_B47B9C7A25F06C53` (`adherent_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `adhesion`
--
ALTER TABLE `adhesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `annee`
--
ALTER TABLE `annee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
