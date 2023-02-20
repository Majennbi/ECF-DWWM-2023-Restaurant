-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 20 fév. 2023 à 19:00
-- Version du serveur : 8.0.32
-- Version de PHP : 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `le_quai_antique`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `guests_number` int NOT NULL,
  `booking_date` date NOT NULL COMMENT '(DC2Type:date_immutable)',
  `booking_hour` time NOT NULL,
  `booking_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_hours_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id`, `guests_number`, `booking_date`, `booking_hour`, `booking_name`, `opening_hours_id`) VALUES
(178, 1, '2023-02-20', '00:00:00', 'Raymond Germain', 1),
(179, 1, '2023-02-20', '00:00:00', 'Amélie Goncalves', 1),
(180, 4, '2023-02-20', '00:00:00', 'Laurence Benard', 1),
(181, 4, '2023-02-20', '00:00:00', 'Gabrielle Klein', 1),
(182, 5, '2023-02-20', '00:00:00', 'Alix Godard', 1);

-- --------------------------------------------------------

--
-- Structure de la table `deal`
--

CREATE TABLE `deal` (
  `id` int NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dish`
--

CREATE TABLE `dish` (
  `id` int NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dish`
--

INSERT INTO `dish` (`id`, `category`, `title`, `description`, `price`, `updated_at`) VALUES
(63, 'Entrée', 'blanditiis', 'Velit magni dolore est eveniet sunt est. Ducimus sint perspiciatis neque.', 13, '2023-02-20 16:04:25'),
(64, 'Entrée', 'quidem', 'Nostrum omnis nihil soluta adipisci corrupti libero. Illum dolorem officiis aliquid vel. Maiores quo maiores aut ipsam eligendi a.', 50, '2023-02-20 16:04:25'),
(65, 'Entrée', 'natus', 'Dolor quia reiciendis maxime. Totam ducimus ut praesentium praesentium.', 8, '2023-02-20 16:04:25');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230123020521', '2023-02-09 23:34:30', 43),
('DoctrineMigrations\\Version20230124224946', '2023-02-09 23:34:30', 10),
('DoctrineMigrations\\Version20230129201019', '2023-02-09 23:34:30', 13),
('DoctrineMigrations\\Version20230131234237', '2023-02-09 23:34:30', 4),
('DoctrineMigrations\\Version20230201002922', '2023-02-09 23:34:30', 5),
('DoctrineMigrations\\Version20230201165743', '2023-02-09 23:34:30', 7),
('DoctrineMigrations\\Version20230202224004', '2023-02-09 23:34:30', 3),
('DoctrineMigrations\\Version20230203224634', '2023-02-09 23:34:30', 7),
('DoctrineMigrations\\Version20230203230243', '2023-02-09 23:34:30', 10),
('DoctrineMigrations\\Version20230205113454', '2023-02-09 23:34:30', 3),
('DoctrineMigrations\\Version20230205120610', '2023-02-09 23:34:30', 6),
('DoctrineMigrations\\Version20230205171428', '2023-02-09 23:34:30', 3),
('DoctrineMigrations\\Version20230205231720', '2023-02-09 23:34:30', 3),
('DoctrineMigrations\\Version20230209234104', '2023-02-09 23:41:18', 47),
('DoctrineMigrations\\Version20230210002827', '2023-02-10 00:28:35', 38),
('DoctrineMigrations\\Version20230210164018', '2023-02-10 16:40:26', 58),
('DoctrineMigrations\\Version20230211234316', '2023-02-11 23:43:55', 40),
('DoctrineMigrations\\Version20230212001125', '2023-02-12 00:11:32', 46);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `start_hour`, `end_hour`) VALUES
(1, '12:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `roles`, `password`, `created_at`, `updated_at`) VALUES
(203, 'Administrateur de l\'application', 'admin@lequaiantique.fr', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', '$2y$13$Q4ehC9Eav3cB0ukkJNfEwOpywh8ES3eQlILhuuV6IcVDFw/2ifHEe', '2023-02-20 16:04:25', '2023-02-20 16:04:25'),
(204, 'Luc Le Tanguy', 'voisin.gilbert@orange.fr', '[\"ROLE_USER\"]', '$2y$13$ZNQUbduRooO0hJ9QLBhiduuVJ0GaokYjkpHSrDtmBlwJPULywz4ZG', '2023-02-20 16:04:25', '2023-02-20 16:04:25'),
(205, 'Édith Marques', 'omahe@gmail.com', '[\"ROLE_USER\"]', '$2y$13$HY2w0RgVZEhVTgtZUuwsmut9jm7tgX2CME8dcwZ8Zervi7.grAL2G', '2023-02-20 16:04:26', '2023-02-20 16:04:26'),
(206, 'Virginie de Dupont', 'margaux98@dbmail.com', '[\"ROLE_USER\"]', '$2y$13$eKAm7JlFNkgu.Jik1i7olOImRt3rdtINqBNyhTymIsDN6OwEUtjLi', '2023-02-20 16:04:26', '2023-02-20 16:04:26'),
(207, 'Xavier Maillot', 'petit.marthe@orange.fr', '[\"ROLE_USER\"]', '$2y$13$mGp6/.HIA.MLOVbo5gllQeOyrooENfxNKuGgggaHY2UisFqF9aPce', '2023-02-20 16:04:27', '2023-02-20 16:04:27'),
(208, 'Manon Richard', 'lboucher@mace.com', '[\"ROLE_USER\"]', '$2y$13$HYsgt8QNlloD0GWzJ8gz1.GRFwNTj1Ju..ZEm8H/gi818UjtP3876', '2023-02-20 16:04:27', '2023-02-20 16:04:27'),
(209, 'Victoire-Mathilde Imbert', 'lorraine.gosselin@mahe.com', '[\"ROLE_USER\"]', '$2y$13$orq9UYb039Y.a83xUGftLO2L/VF/C8yp3rsQvvlU1kH8zw3/Px75K', '2023-02-20 16:04:28', '2023-02-20 16:04:28'),
(210, 'Philippine de Guilbert', 'nath17@gmail.com', '[\"ROLE_USER\"]', '$2y$13$TbPicm5ay.A/uOZeebzInOnhcCqaEKSdOAInbcxW27zkVBeCB5EuG', '2023-02-20 16:04:28', '2023-02-20 16:04:28'),
(211, 'Alphonse de Texier', 'tmasse@gmail.com', '[\"ROLE_USER\"]', '$2y$13$aXhxRDFSI6giRosK2HMYkuHB7TPbmr73kz4zZi/fLZmde5MgvU/pm', '2023-02-20 16:04:29', '2023-02-20 16:04:29'),
(212, 'Louis Brun', 'pichon.georges@leroux.fr', '[\"ROLE_USER\"]', '$2y$13$GB7yAPJYzgI7/6NibbN6i.vgUQrJPo3WOZqnmE1wC8c3prXu6u0cG', '2023-02-20 16:04:29', '2023-02-20 16:04:29'),
(213, 'Roger Delaunay', 'jgaillard@perrin.org', '[\"ROLE_USER\"]', '$2y$13$r52JLBb/66KtXZZXCnKRYePu1ekbRF.4CXhIyp2Etqz0H7ZEx0Cym', '2023-02-20 16:04:30', '2023-02-20 16:04:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E00CEDDECE298D68` (`opening_hours_id`);

--
-- Index pour la table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT pour la table `deal`
--
ALTER TABLE `deal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_E00CEDDECE298D68` FOREIGN KEY (`opening_hours_id`) REFERENCES `opening_hours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
