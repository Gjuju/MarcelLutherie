-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 déc. 2020 à 09:06
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mluth`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `ref` varchar(13) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `prix` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `ref`, `designation`, `prix`) VALUES
(1, 'GS1', 'Guitare Strat', '1850.00'),
(2, 'BJ1', 'Basse jazz', '1750.00');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom_cat` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_cat`) VALUES
(1, 'Manche'),
(2, 'Touche'),
(3, 'Corps'),
(4, 'Finition'),
(5, 'Micros');

-- --------------------------------------------------------

--
-- Structure de la table `compo_art_cat`
--

CREATE TABLE `compo_art_cat` (
  `id` int(11) NOT NULL,
  `id_art` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compo_art_cat`
--

INSERT INTO `compo_art_cat` (`id`, `id_art`, `id_cat`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(9, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_art` int(11) NOT NULL,
  `date_devis` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id`, `id_user`, `id_art`, `date_devis`) VALUES
(6, 2, 2, '2020-12-02'),
(7, 16, 2, '2020-12-02'),
(8, 16, 2, '2020-12-02'),
(9, 16, 1, '2020-12-02'),
(10, 16, 1, '2020-12-02'),
(11, 16, 1, '2020-12-02'),
(12, 16, 1, '2020-12-02'),
(13, 16, 2, '2020-12-02'),
(14, 16, 2, '2020-12-02'),
(15, 16, 2, '2020-12-02'),
(16, 16, 2, '2020-12-02'),
(17, 16, 2, '2020-12-02'),
(18, 16, 2, '2020-12-02'),
(19, 16, 1, '2020-12-02'),
(20, 16, 1, '2020-12-02'),
(21, 16, 2, '2020-12-02'),
(22, 16, 2, '2020-12-02'),
(23, 16, 2, '2020-12-02'),
(24, 16, 2, '2020-12-02'),
(25, 16, 2, '2020-12-02'),
(26, 16, 2, '2020-12-02'),
(27, 16, 2, '2020-12-02'),
(28, 16, 2, '2020-12-02'),
(29, 16, 2, '2020-12-02'),
(30, 16, 2, '2020-12-02'),
(31, 16, 2, '2020-12-02'),
(32, 16, 2, '2020-12-02'),
(33, 16, 2, '2020-12-02'),
(34, 16, 2, '2020-12-02'),
(35, 16, 2, '2020-12-02'),
(36, 16, 2, '2020-12-02'),
(37, 16, 2, '2020-12-02'),
(38, 16, 2, '2020-12-02'),
(39, 16, 2, '2020-12-02'),
(40, 16, 2, '2020-12-02'),
(41, 16, 2, '2020-12-02'),
(42, 16, 2, '2020-12-02'),
(43, 16, 2, '2020-12-02'),
(44, 16, 2, '2020-12-02'),
(45, 16, 1, '2020-12-02'),
(46, 2, 1, '2020-12-02'),
(47, 2, 1, '2020-12-02'),
(48, 2, 2, '2020-12-03'),
(49, 1, 2, '2020-12-03'),
(50, 2, 2, '2020-12-03'),
(51, 2, 2, '2020-12-03'),
(52, 2, 1, '2020-12-03'),
(53, 2, 2, '2020-12-03'),
(54, 7, 1, '2020-12-04'),
(55, 2, 1, '2020-12-04');

-- --------------------------------------------------------

--
-- Structure de la table `dev_opt`
--

CREATE TABLE `dev_opt` (
  `id` int(11) NOT NULL,
  `id_dev` int(11) NOT NULL,
  `id_opt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dev_opt`
--

INSERT INTO `dev_opt` (`id`, `id_dev`, `id_opt`) VALUES
(68, 6, 2),
(69, 6, 6),
(70, 6, 10),
(71, 6, 18),
(72, 7, 2),
(73, 7, 6),
(74, 7, 11),
(75, 7, 18),
(76, 8, 2),
(77, 8, 6),
(78, 8, 11),
(79, 8, 18),
(80, 9, 3),
(81, 9, 6),
(82, 9, 8),
(83, 9, 12),
(84, 10, 3),
(85, 10, 6),
(86, 10, 8),
(87, 10, 12),
(88, 11, 3),
(89, 11, 6),
(90, 11, 8),
(91, 11, 12),
(92, 12, 3),
(93, 12, 6),
(94, 12, 8),
(95, 12, 12),
(96, 13, 3),
(97, 13, 4),
(98, 13, 8),
(99, 13, 17),
(100, 14, 3),
(101, 14, 4),
(102, 14, 8),
(103, 14, 17),
(104, 15, 3),
(105, 15, 4),
(106, 15, 8),
(107, 15, 17),
(108, 16, 3),
(109, 16, 4),
(110, 16, 8),
(111, 16, 17),
(112, 17, 3),
(113, 17, 4),
(114, 17, 8),
(115, 17, 17),
(116, 18, 3),
(117, 18, 4),
(118, 18, 8),
(119, 18, 17),
(120, 19, 1),
(121, 19, 6),
(122, 19, 8),
(123, 19, 12),
(124, 20, 1),
(125, 20, 6),
(126, 20, 8),
(127, 20, 12),
(128, 21, 1),
(129, 21, 4),
(130, 21, 8),
(131, 21, 17),
(136, 22, 1),
(137, 22, 4),
(138, 22, 8),
(139, 22, 17),
(140, 23, 1),
(141, 23, 4),
(142, 23, 8),
(143, 23, 17),
(144, 24, 3),
(145, 24, 6),
(146, 24, 10),
(147, 24, 18),
(148, 25, 3),
(149, 25, 6),
(150, 25, 10),
(151, 25, 18),
(152, 26, 2),
(153, 26, 6),
(154, 26, 8),
(155, 26, 18),
(156, 27, 2),
(157, 27, 6),
(158, 27, 8),
(159, 27, 18),
(160, 28, 2),
(161, 28, 6),
(162, 28, 8),
(163, 28, 18),
(164, 29, 2),
(165, 29, 6),
(166, 29, 8),
(167, 29, 18),
(168, 30, 2),
(169, 30, 6),
(170, 30, 8),
(171, 30, 18),
(172, 31, 2),
(173, 31, 6),
(174, 31, 8),
(175, 31, 18),
(176, 32, 2),
(177, 32, 6),
(178, 32, 8),
(179, 32, 18),
(180, 33, 2),
(181, 33, 6),
(182, 33, 8),
(183, 33, 18),
(184, 34, 2),
(185, 34, 6),
(186, 34, 8),
(187, 34, 18),
(188, 35, 2),
(189, 35, 6),
(190, 35, 8),
(191, 35, 18),
(192, 36, 2),
(193, 36, 6),
(194, 36, 8),
(195, 36, 18),
(196, 37, 2),
(197, 37, 6),
(198, 37, 8),
(199, 37, 18),
(200, 38, 2),
(201, 38, 6),
(202, 38, 8),
(203, 38, 18),
(204, 39, 2),
(205, 39, 6),
(206, 39, 8),
(207, 39, 18),
(208, 40, 2),
(209, 40, 6),
(210, 40, 8),
(211, 40, 18),
(212, 41, 2),
(213, 41, 6),
(214, 41, 8),
(215, 41, 18),
(216, 42, 2),
(217, 42, 6),
(218, 42, 8),
(219, 42, 18),
(220, 43, 2),
(221, 43, 6),
(222, 43, 8),
(223, 43, 18),
(224, 44, 2),
(225, 44, 6),
(226, 44, 8),
(227, 44, 18),
(228, 45, 2),
(229, 45, 7),
(230, 45, 10),
(231, 45, 14),
(232, 46, 3),
(233, 46, 4),
(234, 46, 8),
(235, 46, 12),
(236, 47, 3),
(237, 47, 4),
(238, 47, 8),
(239, 47, 12),
(240, 48, 3),
(241, 48, 6),
(242, 48, 10),
(243, 48, 18),
(244, 49, 1),
(245, 49, 4),
(246, 49, 8),
(247, 49, 18),
(248, 50, 1),
(249, 50, 4),
(250, 50, 8),
(251, 50, 18),
(252, 51, 1),
(253, 51, 4),
(254, 51, 8),
(255, 51, 18),
(256, 52, 2),
(257, 52, 6),
(258, 52, 10),
(259, 52, 14),
(260, 53, 2),
(261, 53, 7),
(262, 53, 10),
(263, 53, 18),
(264, 54, 1),
(265, 54, 6),
(266, 54, 10),
(267, 54, 14),
(268, 55, 2),
(269, 55, 7),
(270, 55, 10),
(271, 55, 16);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `nom_opt` varchar(25) NOT NULL,
  `prix` decimal(7,2) NOT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `nom_opt`, `prix`, `id_cat`) VALUES
(1, 'Érable', '0.00', 1),
(2, 'Padouk', '80.00', 1),
(3, 'Acajou', '120.00', 1),
(4, 'Érable', '0.00', 2),
(5, 'Palissandre Inde', '40.00', 2),
(6, 'Palissandre Rio', '100.00', 2),
(7, 'Ebene Macassar', '140.00', 2),
(8, 'Aulne', '0.00', 3),
(9, 'Tilleul', '0.00', 3),
(10, 'Frêne', '120.00', 3),
(11, 'Acajou', '180.00', 3),
(12, 'Huilée Naturelle', '0.00', 4),
(13, 'Poly Naturelle', '0.00', 4),
(14, 'Poly Rouge', '180.00', 4),
(15, 'Poly Noire', '180.00', 4),
(16, 'Poly SunBurst', '220.00', 4),
(17, 'Micros simples', '0.00', 5),
(18, 'Micros doubles', '60.00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `admin` int(2) DEFAULT 0,
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `adresse`, `cp`, `ville`, `admin`, `mdp`) VALUES
(1, 'Lutherie', 'Marcel', 'marcel@lutherie.com', '17 rue des guitares', '34270', 'le triadou', 1, '$2y$10$SOr0E6MDjRKMBdyLIIanvuZdSSrMEKHh406PgfXorUE.im5c2sSCO'),
(2, 'Sawyer', 'Tom', 'tom@test.com', '3 boulevard de test', '33000', 'bordeaux', 0, '$2y$10$yuDNCMx8LKQ22mqdYWCi4uBqr/OBRfNWstOnn90irylJ1Gf4M1CZC'),
(7, 'Martin', 'Alain', 'alain@gmail.com', '18 rue du pont', '75000', 'Paris', 0, '$2y$10$DLIlKNO.1vGjIHGNWHBe/.myTql1C.kA.3QjT8A/Pg9CMA1g/Iw2q'),
(12, 'Toto', 'Tata', 'toto@tata.com', '16 av le cours', '13000', 'Mars', 0, '$2y$10$T5RACkcTVxnY8vN1oDtsJO3qHi7CI5.W3rGxlo4T6DxgMT/6saNaG'),
(14, 'Rob', 'Carmet', 'rob@carmet.com', '55 av de la libé', '84000', 'Avignon', 0, '$2y$10$d3iYOQVd0zY2ejsVfHR.ZuOFIv3yjHV4x.MGHSsYU0QtOH0hNg8/u'),
(16, 'Gainza', 'Julien', 'julien@gainza.com', '17 Rue de la montagne', '34270', 'Le Triadou', 0, '$2y$10$qrizb4V6d9ROBSvVds1x2..MtuHpbiTo.GUOj1okhnEVdsmT9QQvG'),
(18, 'Castro', 'Fidel', 'fidel@castro.com', '66 rue de la démocratie', '48', 'La Havane', 0, '$2y$10$UQIQu20xoVJviR/uYAe9X.Uc89DMADXUHZqPykkFETTL91MFZCfp6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compo_art_cat`
--
ALTER TABLE `compo_art_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_COMP_ART` (`id_art`),
  ADD KEY `FK_COMP_CAT` (`id_cat`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEV_USR` (`id_user`),
  ADD KEY `FK_DEV_ART` (`id_art`);

--
-- Index pour la table `dev_opt`
--
ALTER TABLE `dev_opt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEVOPT_DEV` (`id_dev`),
  ADD KEY `FK_DEVOPT_OPT` (`id_opt`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_OPT_CAT` (`id_cat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `compo_art_cat`
--
ALTER TABLE `compo_art_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `dev_opt`
--
ALTER TABLE `dev_opt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compo_art_cat`
--
ALTER TABLE `compo_art_cat`
  ADD CONSTRAINT `FK_COMP_ART` FOREIGN KEY (`id_art`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_COMP_CAT` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `FK_DEV_ART` FOREIGN KEY (`id_art`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_DEV_USR` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `dev_opt`
--
ALTER TABLE `dev_opt`
  ADD CONSTRAINT `FK_DEVOPT_DEV` FOREIGN KEY (`id_dev`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `FK_DEVOPT_OPT` FOREIGN KEY (`id_opt`) REFERENCES `options` (`id`);

--
-- Contraintes pour la table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `FK_OPT_CAT` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
