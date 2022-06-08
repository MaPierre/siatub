-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 16 mars 2022 à 12:59
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `otas_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive_list`
--

CREATE TABLE `archive_list` (
  `id` int(30) NOT NULL,
  `archive_code` varchar(100) NOT NULL,
  `curriculum_id` int(30) NOT NULL,
  `year` year(4) NOT NULL,
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `members` text NOT NULL,
  `banner_path` text NOT NULL,
  `document_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `student_id` int(30) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `archive_list`
--

INSERT INTO `archive_list` (`id`, `archive_code`, `curriculum_id`, `year`, `title`, `abstract`, `members`, `banner_path`, `document_path`, `status`, `student_id`, `date_created`, `date_updated`) VALUES
(4, '2021120004', 10, 2021, 'SYSTEME DE GESTION DES RENDEZ-VOUS DES PATIENTS', '&lt;p&gt;est un systeme qui va permettre de gerer les patients dans un hopital&lt;/p&gt;', '&lt;p&gt;1.Pierre&lt;/p&gt;&lt;p&gt;2.Pacifique&lt;/p&gt;', 'uploads/banners/archive-4.png?v=1639773933', 'uploads/pdf/archive-4.pdf?v=1639773933', 1, 4, '2021-12-17 22:45:33', '2021-12-17 22:46:44'),
(6, '2021120001', 10, 2021, 'power daddy,rich daddy', '&lt;p&gt;il parle comment les p&egrave;res pauvres&amp;nbsp; et les p&egrave;res riches se comportent devant leurs enfants&lt;/p&gt;', '&lt;p&gt;1.KIOSAKI ROBERT&lt;/p&gt;', 'uploads/banners/archive-6.png?v=1639928983', 'uploads/pdf/archive-6.pdf?v=1639928983', 1, 5, '2021-12-19 17:49:42', '2021-12-19 17:50:50'),
(7, '2021120002', 10, 2021, 'la beauté', '&lt;p&gt;c\'est un livre qui nous parle comment avoir la beaut&eacute; naturelle&lt;/p&gt;', '&lt;p&gt;1.Pierre&lt;/p&gt;', 'uploads/banners/archive-7.png?v=1640071683', 'uploads/pdf/archive-7.pdf?v=1640071683', 1, 4, '2021-12-21 09:28:03', '2021-12-21 22:00:54'),
(8, '2021120003', 11, 2021, 'Controle des courses de 100m', '&lt;p&gt;c\'est un syst&egrave;me qui va aider &agrave; automatiser les arriv&eacute;es en course de 100m&lt;/p&gt;', '&lt;p&gt;1.BIRUKUNDI Annah&lt;/p&gt;&lt;p&gt;2.IRANZI Alain&lt;/p&gt;', 'uploads/banners/archive-8.png?v=1640890212', 'uploads/pdf/archive-8.pdf?v=1640890212', 1, 6, '2021-12-30 20:50:11', '2021-12-30 20:53:43'),
(9, '2021120005', 10, 2021, 'Data Mining', '&lt;p&gt;c\'est une th&egrave;se qui parle la fouille des donn&eacute;es&lt;/p&gt;', '&lt;p&gt;1.Longin IRAMBONA&lt;/p&gt;', 'uploads/banners/archive-9.png?v=1640963985', 'uploads/pdf/archive-9.pdf?v=1640963985', 1, 4, '2021-12-31 17:19:44', '2021-12-31 17:21:32'),
(10, '2022010001', 10, 2022, 'Un système automatisé de gestion de chaleur d\'une maison', '&lt;p&gt;c\'est un syst&egrave;me de domotique construit grace &agrave; l\'arduino qui va permettre de g&eacute;rer la chaleur int&eacute;rieur d\'une maison d\'une fa&ccedil;con automatique&lt;/p&gt;', '&lt;p&gt;1.Dr Hilaire NKUZIMANA&lt;/p&gt;&lt;p&gt;2.Dr Th&eacute;rence IGIRANEZA&lt;/p&gt;', 'uploads/banners/archive-10.png?v=1641062695', 'uploads/pdf/archive-10.pdf?v=1641062695', 1, 4, '2022-01-01 20:44:54', '2022-01-01 20:47:06'),
(11, '2022020001', 11, 2022, 'Machine learning', '&lt;p&gt;Cette th&egrave;se parle de l\'utilisation de l\'intelligence artificielle en impl&eacute;mentant Machine learning pour la fouille des donn&eacute;es ,pr&eacute;diction du futur&lt;/p&gt;', '&lt;p&gt;1.Ndayiziga Annonciatte&lt;/p&gt;', 'uploads/banners/archive-11.png?v=1645308014', 'uploads/pdf/archive-11.pdf?v=1645308014', 1, 6, '2022-02-20 00:00:13', '2022-02-20 00:01:48');

-- --------------------------------------------------------

--
-- Structure de la table `curriculum_list`
--

CREATE TABLE `curriculum_list` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `curriculum_list`
--

INSERT INTO `curriculum_list` (`id`, `department_id`, `name`, `description`, `status`, `date_created`, `date_updated`) VALUES
(10, 7, 'GI', 'Génie Informatique', 1, '2021-12-17 22:40:53', NULL),
(11, 8, 'EB', 'Entrainement Basketball', 1, '2021-12-17 22:41:30', NULL),
(12, 9, 'HE', 'hydroélectrique et environnement', 1, '2021-12-21 22:55:22', NULL),
(13, 10, 'IPA MATHS', 'Dans cette département on enseigne les mathétiques utilisés dans l\'enseignement primaire et secondqire', 1, '2022-01-31 21:17:23', '2022-01-31 21:17:40');



--
-- Structure de la table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `department_list`
--

INSERT INTO `department_list` (`id`, `name`, `description`, `status`, `date_created`, `date_updated`) VALUES
(7, 'TIC', 'Technologies de l\'information et de la  communication', 1, '2021-12-17 22:39:02', '2021-12-21 22:33:48'),
(8, 'IEPS', 'Institut d\'Education Physique Supérieur', 1, '2021-12-17 22:39:55', NULL),
(9, 'GCE', 'génie civil et environnement', 1, '2021-12-21 22:53:59', NULL),
(10, 'IPA', 'Institut des pédagogies appliquées', 1, '2022-01-31 21:16:13', '2022-01-31 22:27:27');

-- --------------------------------------------------------

--
-- Structure de la table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `department_id` int(30) NOT NULL,
  `curriculum_id` int(30) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student_list`
--

INSERT INTO `student_list` (`id`, `firstname`, `middlename`, `lastname`, `department_id`, `curriculum_id`, `email`, `password`, `gender`, `status`, `avatar`, `date_created`, `date_updated`) VALUES
(4, 'Pierre', 'Stein', 'Manirakoze', 7, 10, 'irakozepierre2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, 'uploads/student-4.png?v=1639774267', '2021-12-17 22:42:17', '2021-12-19 14:32:54'),
(5, 'PACIFIQUE', 'MOSOZI', 'NKENGURUTSE', 7, 10, 'nkengu@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, '', '2021-12-19 17:35:14', '2021-12-19 17:38:37'),
(6, 'Annociatte', '', 'NDAYIZIGA', 8, 11, 'ndayiziga@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Female', 1, '', '2021-12-30 20:44:31', '2021-12-30 20:46:52'),
(7, 'Pierre', '', 'NKURUNZIZA', 8, 11, 'pierre2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, '', '2021-12-31 17:39:28', '2021-12-31 17:40:53'),
(8, 'Jean ', '', 'IRAMBONA', 8, 11, 'jean@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, '', '2021-12-31 17:49:49', '2022-01-01 13:36:18');

-- --------------------------------------------------------

--
-- Structure de la table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Système d&apos;Archivage des Thèses en ligne à l&apos;Université du Burundi'),
(6, 'short_name', 'SATUB'),
(11, 'logo', 'uploads/logo-1639920709.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1639920879.png'),
(15, 'content', 'Array'),
(16, 'email', 'irakozepierre2@gmail.com'),
(17, 'contact', '79040907 - 68211201'),
(18, 'from_time', '11:00'),
(19, 'to_time', '21:30'),
(20, 'address', 'Bujumbura Mairie-Quartier Rohero,Avenue de l&apos;Université');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1640962158', NULL, 1, 1, '2021-01-20 14:02:37', '2021-12-31 17:03:37'),
(3, 'Beathe', NULL, 'BIGIRIMANA', 'beathe', '25f9e794323b453885f5181f1b624d0b', 'uploads/avatar-3.png?v=1639774383', NULL, 2, 1, '2021-12-17 22:53:03', '2021-12-17 22:53:03'),
(4, 'Nicodème', NULL, 'NTUYAHAGA', 'ntuya', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 2, 1, '2021-12-21 09:02:34', NULL),
(5, 'Aicha', NULL, 'AHISHAKIYE', 'aicha', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 1, 1, '2021-12-31 16:47:36', '2021-12-31 17:05:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `archive_list`
--
ALTER TABLE `archive_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curriculum_id` (`curriculum_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `curriculum_list`
--
ALTER TABLE `curriculum_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Index pour la table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD UNIQUE KEY `email_2` (`email`) USING HASH,
  ADD UNIQUE KEY `email_3` (`email`) USING HASH,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `curriculum_id` (`curriculum_id`);

--
-- Index pour la table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `archive_list`
--
ALTER TABLE `archive_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `curriculum_list`
--
ALTER TABLE `curriculum_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `archive_list`
--
ALTER TABLE `archive_list`
  ADD CONSTRAINT `archive_list_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_list` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `curriculum_list`
--
ALTER TABLE `curriculum_list`
  ADD CONSTRAINT `curriculum_list_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `student_list`
--
ALTER TABLE `student_list`
  ADD CONSTRAINT `student_list_ibfk_1` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculum_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_list_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
