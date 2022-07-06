-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 08:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive_list`
--

CREATE TABLE `archive_list` (
  `id` int(30) NOT NULL,
  `archive_code` varchar(100) NOT NULL,
  `curriculum_id` int(30) NOT NULL,
  `year` year(4) NOT NULL,
  `title` text NOT NULL,
  `cote` varchar(50) DEFAULT NULL,
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
-- Dumping data for table `archive_list`
--

INSERT INTO `archive_list` (`id`, `archive_code`, `curriculum_id`, `year`, `title`, `cote`, `abstract`, `members`, `banner_path`, `document_path`, `status`, `student_id`, `date_created`, `date_updated`) VALUES
(4, '2021120004', 10, 2021, 'SYSTEME DE GESTION DES RENDEZ-VOUS DES PATIENTS', NULL, '&lt;p&gt;est un systeme qui va permettre de gerer les patients dans un hopital&lt;/p&gt;', '&lt;p&gt;1.Pierre&lt;/p&gt;&lt;p&gt;2.Pacifique&lt;/p&gt;', 'uploads/banners/archive-4.png?v=1639773933', 'uploads/pdf/archive-4.pdf?v=1639773933', 1, 4, '2021-12-17 22:45:33', '2021-12-17 22:46:44'),
(6, '2021120001', 10, 2021, 'power daddy,rich daddy', NULL, '&lt;p&gt;il parle comment les p&egrave;res pauvres&amp;nbsp; et les p&egrave;res riches se comportent devant leurs enfants&lt;/p&gt;', '&lt;p&gt;1.KIOSAKI ROBERT&lt;/p&gt;', 'uploads/banners/archive-6.png?v=1639928983', 'uploads/pdf/archive-6.pdf?v=1639928983', 1, 5, '2021-12-19 17:49:42', '2021-12-19 17:50:50'),
(7, '2021120002', 10, 2021, 'la beauté', NULL, '&lt;p&gt;c\'est un livre qui nous parle comment avoir la beaut&eacute; naturelle&lt;/p&gt;', '&lt;p&gt;1.Pierre&lt;/p&gt;', 'uploads/banners/archive-7.png?v=1640071683', 'uploads/pdf/archive-7.pdf?v=1640071683', 1, 4, '2021-12-21 09:28:03', '2021-12-21 22:00:54'),
(8, '2021120003', 11, 2021, 'Controle des courses de 100m', NULL, '&lt;p&gt;c\'est un syst&egrave;me qui va aider &agrave; automatiser les arriv&eacute;es en course de 100m&lt;/p&gt;', '&lt;p&gt;1.BIRUKUNDI Annah&lt;/p&gt;&lt;p&gt;2.IRANZI Alain&lt;/p&gt;', 'uploads/banners/archive-8.png?v=1640890212', 'uploads/pdf/archive-8.pdf?v=1640890212', 1, 6, '2021-12-30 20:50:11', '2021-12-30 20:53:43'),
(9, '2021120005', 10, 2021, 'Data Mining', NULL, '&lt;p&gt;c\'est une th&egrave;se qui parle la fouille des donn&eacute;es&lt;/p&gt;', '&lt;p&gt;1.Longin IRAMBONA&lt;/p&gt;', 'uploads/banners/archive-9.png?v=1640963985', 'uploads/pdf/archive-9.pdf?v=1640963985', 1, 4, '2021-12-31 17:19:44', '2021-12-31 17:21:32'),
(10, '2022010001', 10, 2022, 'Un système automatisé de gestion de chaleur d\'une maison', NULL, '&lt;p&gt;c\'est un syst&egrave;me de domotique construit grace &agrave; l\'arduino qui va permettre de g&eacute;rer la chaleur int&eacute;rieur d\'une maison d\'une fa&ccedil;con automatique&lt;/p&gt;', '&lt;p&gt;1.Dr Hilaire NKUZIMANA&lt;/p&gt;&lt;p&gt;2.Dr Th&eacute;rence IGIRANEZA&lt;/p&gt;', 'uploads/banners/archive-10.png?v=1641062695', 'uploads/pdf/archive-10.pdf?v=1641062695', 1, 4, '2022-01-01 20:44:54', '2022-01-01 20:47:06'),
(11, '2022020001', 11, 2022, 'Machine learning', NULL, '&lt;p&gt;Cette th&egrave;se parle de l\'utilisation de l\'intelligence artificielle en impl&eacute;mentant Machine learning pour la fouille des donn&eacute;es ,pr&eacute;diction du futur&lt;/p&gt;', '&lt;p&gt;1.Ndayiziga Annonciatte&lt;/p&gt;', 'uploads/banners/archive-11.png?v=1645308014', 'uploads/pdf/archive-11.pdf?v=1645308014', 1, 6, '2022-02-20 00:00:13', '2022-02-20 00:01:48'),
(12, '2022060001', 11, 2022, 'informatique pour les enfants', NULL, '&lt;p&gt;Ce livre va etre utiliser &agrave; enseigner les enfants&amp;nbsp; &agrave; avoir la logique de la programmation au bas age&lt;/p&gt;', '&lt;p&gt;1.Directeur de M&eacute;moire :Dr Hilaire NKUNZIMANA&lt;/p&gt;&lt;p&gt;2.Secr&eacute;taire du Jury:Dr Mich&egrave;le MUKESHIMANA&lt;/p&gt;', 'uploads/banners/archive-12.png?v=1654772018', 'uploads/pdf/archive-12.pdf?v=1654772019', 1, 8, '2022-06-09 12:53:37', '2022-06-09 12:56:21'),
(13, '2022060002', 11, 2022, 'Conception et Réalisation d\'un Système Intelligent d\'Archivage des thèmes de mémoire à l\'Université du Burundi', NULL, '&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;font-size:13.0pt;line-height:115%;font-family:\r\n&amp;quot;Times New Roman&amp;quot;,serif&quot;&gt;Ce projet s\'intitule &lt;b&gt;syst&egrave;me Intelligent d\'archivage des th&egrave;ses en ligne &agrave; l&rsquo;universit&eacute; du\r\nBurundi(SIATUB) en sigle&lt;/b&gt; et a &eacute;t&eacute; d&eacute;velopp&eacute; en utilisant PHP et MySQL\r\nDatabase. Il s\'agit d\'une application Web qui fournit une plate-forme en ligne\r\npour stocker la th&egrave;se ou les projets de synth&egrave;se des &eacute;tudiants. L\'objectif\r\nprincipal de cette application est de donner aux &eacute;tudiants d\'une certaine\r\nuniversit&eacute; ou coll&egrave;ge un acc&egrave;s en ligne pour stocker leurs projets de derni&egrave;re\r\nann&eacute;e et de permettre aux &eacute;tudiants de premi&egrave;re ann&eacute;e de trouver des r&eacute;f&eacute;rences\r\net des id&eacute;es pour leur futur ou prochain projet de derni&egrave;re ann&eacute;e. Le syst&egrave;me a\r\n&eacute;t&eacute; &eacute;crit en PHP/OOP (programmation orient&eacute;e objet) et poss&egrave;de de multiples\r\ncaract&eacute;ristiques et fonctionnalit&eacute;s li&eacute;es &agrave; ce type de syst&egrave;me. Cela a des\r\nfonctionnalit&eacute;s conviviales et une interface utilisateur agr&eacute;able utilisant le\r\ncadre Bootstrap et le mod&egrave;le AdminLTE.&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;', '&lt;ol&gt;&lt;li&gt;Pr&eacute;sident du Jury:Pr. Dr. J&eacute;r&eacute;mie NDIKUMAGEGE&lt;/li&gt;&lt;li&gt;Membre du Jury:Dr. Mich&egrave;le MUKESHIMANA&lt;/li&gt;&lt;li&gt;Directeur de m&eacute;moire: Dr. Hilaire NKUNZIMANA&lt;/li&gt;&lt;/ol&gt;', 'uploads/banners/archive-13.png?v=1655223261', 'uploads/pdf/archive-13.pdf?v=1655223263', 1, 8, '2022-06-14 18:14:20', '2022-06-14 18:16:22'),
(14, '2022060003', 11, 2022, 'Pratique active de l\'informatique par l\'enfant ', NULL, '&lt;p&gt;&lt;span class=&quot;fontstyle0&quot;&gt;Les syst&egrave;mes informatiques actuellement disponibles offrent peu de possibilit&eacute;s de&lt;br&gt;mise en &oelig;uvre par des enfants et par toute personne non sp&eacute;cialis&eacute;e dans l\'informatique. Les travaux de recherche dans le domaine du langage et du mat&eacute;riel informatique ont le plus souvent pour objet d\'am&eacute;liorer la capacit&eacute; de compr&eacute;hension et&lt;br&gt;de description de processus complexes, d\'augmenter la puissance des outils informatiques. Inversement les ordinateurs mis &agrave; la disposition du grand public ne permettent&lt;br&gt;qu\'un dialogue &eacute;cran-clavier tr&egrave;s pauvre n&eacute;cessitant par ailleurs des connaissances&lt;br&gt;informatiques non n&eacute;gligeables.&lt;br&gt;Dans le contexte d\'un projet p&eacute;dagogique o&ugrave; l\'ordinateur doit servir d\'outil permettant&lt;br&gt;&agrave; un enfant d\'exprimer les concepts n&eacute;cessaires dans la r&eacute;alisation d\'une t&acirc;che qu\'il&lt;br&gt;s\'est assign&eacute;, un syst&egrave;me informatique pour &ecirc;tre accessible requiert un certain nombre&lt;br&gt;de pr&eacute;alables :&lt;br&gt;1 Susciter l\'int&eacute;r&ecirc;t par les possibilit&eacute;s d\'actions disponibles et permettre d\'obtenir&lt;br&gt;rap/dement des r&eacute;sultats int&eacute;ressants (motivants), c\'est-&agrave;-dire sans obliger l\'utilisateur&lt;br&gt;&agrave; l\'acquisition pr&eacute;alable d\'un sous-ensemble trop important de concepts et d\'habilet&eacute;s&lt;br&gt;n&eacute;cessaires &agrave; la ma&icirc;trise du syst&egrave;me. Ceci implique que ces habilet&eacute;s et concepts soient&lt;br&gt;&agrave; la port&eacute;e du public vis&eacute; et que la finalit&eacute; des activit&eacute;s ait un sens pour ce public.&lt;br&gt;Les p&eacute;riph&eacute;riques associ&eacute;s au syst&egrave;me devraient offrir non seulement les possibilit&eacute;s&lt;br&gt;d\'&eacute;criture habituelles, mais aussi des terminaux graphiques, musicaux, des automates, etc.&lt;br&gt;et des communications avec d\'autres types d\'appareils (audio-visuels par exemple).&lt;br&gt;2 Permettre une mise en &oelig;uvre progressive du syst&egrave;me, c\'est-&agrave;-dire que toute&lt;br&gt;acquisition, construction, mise au point de concept nouveau, etc. devra &ecirc;tre mat&eacute;rialis&eacute;e&lt;br&gt;sous la forme de la cr&eacute;ation d\'un objet, d\'une proc&eacute;dure, d\'une r&egrave;gle, etc. et&lt;br&gt;(r&eacute;) utilisable &agrave; un niveau ult&eacute;rieur d\'int&eacute;gration, ce qui implique que cet &eacute;l&eacute;ment&lt;br&gt;est devenu un membre permanent et disponible (quoique modifiable) du syst&egrave;me.&lt;br&gt;Il para&icirc;t essentiel que le progr&egrave;s ne consiste pas uniquement dans une meilleure&lt;br&gt;utilisation du syst&egrave;me et une manipulation plus ais&eacute;e de ses outils et concepts, mais&lt;br&gt;aussi dans la cr&eacute;ation parall&egrave;le d\'objets et concepts nouveaux int&eacute;gr&eacute;s &agrave; l\'ensemble&lt;br&gt;en expansion.&lt;br&gt;3 Le langage qui sert &agrave; la communication avec le syst&egrave;me doit donc &ecirc;tre con&ccedil;u&lt;br&gt;pour permettre cette expansion: il doit d&eacute;crire des actions et des &eacute;tats simples de&lt;br&gt;mani&egrave;re compr&eacute;hensible et non ambigu&euml; pour des enfants, avec une syntaxe et des&lt;br&gt;mots semblables &agrave; ceux du vocabulaire utilis&eacute; quotidiennement, et permettre la cr&eacute;ation&lt;br&gt;de nouveaux vocables pour d&eacute;signer les actions et objets construits par les utilisateurs.&lt;/span&gt; \r\n&lt;br style=&quot;font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;&quot;&gt;&lt;/p&gt;', '&lt;ol&gt;&lt;li&gt;Pierre MANIRAKOZE&lt;/li&gt;&lt;li&gt;BIGIRIMANA B&eacute;athe&lt;/li&gt;&lt;li&gt;NTUYAHAGA Nicod&egrave;me&lt;/li&gt;&lt;/ol&gt;', 'uploads/banners/archive-14.png?v=1656513813', 'uploads/pdf/archive-14.pdf?v=1656513813', 1, 6, '2022-06-29 16:43:32', '2022-06-29 16:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(30) NOT NULL,
  `id_faculte` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `id_faculte`, `name`, `description`, `status`, `date_created`, `date_updated`) VALUES
(7, 1, 'TIC', 'Technologies de l\'information et de la  communication', 1, '2021-12-17 22:39:02', '2022-07-05 20:10:57'),
(8, 18, 'IEPS', 'Institut d\'Education Physique Supérieur', 1, '2021-12-17 22:39:55', '2022-07-05 20:11:33'),
(9, 1, 'GCE', 'génie civil et environnement', 1, '2021-12-21 22:53:59', '2022-07-05 20:11:38'),
(10, 4, 'IPA', 'Institut des pédagogies appliquées', 1, '2022-01-31 21:16:13', '2022-07-05 20:11:45'),
(11, 0, 'Département de Gestion ', 'C\'est un département de la Faculté des Sciences Economiques et de Gestion', 1, '2022-05-25 22:13:08', '2022-05-25 22:16:17'),
(12, 0, 'Economie Politique', 'Département de la Faculté des Sciences Economiques et de Gestion\r\n', 1, '2022-05-25 22:18:18', NULL),
(13, 0, 'Département d’Economie Rurale', 'Département de la Faculté des Sciences Economiques et de Gestion', 1, '2022-05-25 22:20:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculte`
--

CREATE TABLE `faculte` (
  `id_faculte` int(11) NOT NULL,
  `id_universite` int(11) NOT NULL,
  `nom_faculte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculte`
--

INSERT INTO `faculte` (`id_faculte`, `id_universite`, `nom_faculte`) VALUES
(1, 1, 'FSI'),
(2, 1, 'SCIENCES'),
(3, 1, 'MEDECINE'),
(4, 1, 'IPA'),
(5, 1, 'PYSCHOLOGIE'),
(9, 3, 'ECONOMIE'),
(10, 3, 'INFORMATIQUE'),
(11, 3, 'SOINS INFIRMIERS'),
(12, 2, 'ECONOMIE'),
(13, 2, 'INFORMATIQUE'),
(14, 2, 'SOINS INFIRMIERS'),
(15, 4, 'INFORMATIQUE'),
(16, 4, 'SCIENCES'),
(17, 4, 'GENIE CIVIL'),
(18, 1, 'IEPS\r\n'),
(19, 1, 'FSGE');

-- --------------------------------------------------------

--
-- Table structure for table `graphes`
--

CREATE TABLE `graphes` (
  `id_chart` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `institut`
--

CREATE TABLE `institut` (
  `id_institut` int(50) NOT NULL,
  `id_universite` int(11) NOT NULL,
  `nom_institut` varchar(255) NOT NULL,
  `secteur_education` varchar(50) NOT NULL,
  `annee_creation` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id_personnel` int(11) NOT NULL,
  `nom_personnel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projet_consultation`
--

CREATE TABLE `projet_consultation` (
  `id_consultation` int(30) NOT NULL,
  `project_id` int(30) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_view` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(30) NOT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `firstname` text NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
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
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `matricule`, `firstname`, `middlename`, `lastname`, `department_id`, `curriculum_id`, `email`, `password`, `gender`, `status`, `avatar`, `date_created`, `date_updated`) VALUES
(4, NULL, 'Pierre', 'Stein', 'Manirakoze', 7, 10, 'irakozepierre2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, 'uploads/student-4.png?v=1639774267', '2021-12-17 22:42:17', '2021-12-19 14:32:54'),
(5, NULL, 'PACIFIQUE', 'MOSOZI', 'NKENGURUTSE', 7, 10, 'nkengu@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, '', '2021-12-19 17:35:14', '2021-12-19 17:38:37'),
(6, NULL, 'Annociatte', '', 'NDAYIZIGA', 8, 11, 'ndayiziga@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Female', 1, '', '2021-12-30 20:44:31', '2021-12-30 20:46:52'),
(7, NULL, 'Pierre', '', 'NKURUNZIZA', 8, 11, 'pierre2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, '', '2021-12-31 17:39:28', '2021-12-31 17:40:53'),
(8, NULL, 'Jean ', 'Muzungu', 'IRAMBONA', 8, 11, 'jean@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Male', 1, 'uploads/student-8.png?v=1652786424', '2021-12-31 17:49:49', '2022-05-30 12:48:36'),
(10, '98776', 'test', NULL, 'test', 7, 10, 'admin@burinfohope.bi', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', 1, '', '2022-07-06 08:27:06', '2022-07-06 08:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Système Intelligent  d&apos;Archivage des Thèmes de mémoire   à l&apos;Université du Burundi'),
(6, 'short_name', 'SIATUB'),
(11, 'logo', 'uploads/logo-1647512341.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1647512158.png'),
(15, 'content', 'Array'),
(16, 'email', 'irakozepierre2@gmail.com'),
(17, 'contact', '79040907 - 68211201'),
(18, 'from_time', '11:00'),
(19, 'to_time', '21:30'),
(20, 'address', 'Bujumbura Mairie-Quartier Rohero,Avenue de l&apos;Université');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filieres`
--

CREATE TABLE `tbl_filieres` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_filieres`
--

INSERT INTO `tbl_filieres` (`id`, `department_id`, `name`, `description`, `status`, `date_created`, `date_updated`) VALUES
(10, 7, 'GI', 'Génie Informatique', 1, '2021-12-17 22:40:53', NULL),
(11, 8, 'EB', 'Entrainement Basketball', 1, '2021-12-17 22:41:30', NULL),
(12, 9, 'HE', 'hydroélectrique et environnement', 1, '2021-12-21 22:55:22', NULL),
(13, 10, 'IPA MATHS', 'Dans cette département on enseigne les mathétiques utilisés dans l\'enseignement primaire et secondaire', 1, '2022-01-31 21:17:23', '2022-03-16 14:08:26'),
(14, 11, 'Finance et Comptabilité', '', 1, '2022-05-25 22:16:48', NULL),
(15, 11, 'marketing et Stratégies', '', 1, '2022-05-25 22:17:19', NULL),
(16, 12, 'Economie Publique et Planification', '', 1, '2022-05-25 22:18:48', NULL),
(17, 12, 'Economie Monétaire et Bancaire', '', 1, '2022-05-25 22:19:15', NULL),
(18, 12, 'Economie Internationale', '', 1, '2022-05-25 22:19:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `universite`
--

CREATE TABLE `universite` (
  `id_universite` int(11) NOT NULL,
  `nom_universite` varchar(255) NOT NULL,
  `adresse_uni` varchar(255) NOT NULL,
  `code_postal_uni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universite`
--

INSERT INTO `universite` (`id_universite`, `nom_universite`, `adresse_uni`, `code_postal_uni`) VALUES
(1, 'UB', 'UB', 'UB'),
(2, 'UGL', 'UGL', 'UGL'),
(3, 'LUMIERE', 'LUMIERE', 'LUMIERE'),
(4, 'UPG', 'UPG', 'UPG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1640962158', NULL, 1, 1, '2021-01-20 14:02:37', '2022-06-21 20:36:18'),
(3, 'Beathe', NULL, 'BIGIRIMANA', 'beathe', '25f9e794323b453885f5181f1b624d0b', 'uploads/avatar-3.png?v=1639774383', NULL, 2, 1, '2021-12-17 22:53:03', '2021-12-17 22:53:03'),
(4, 'Nicodème', NULL, 'NTUYAHAGA', 'ntuya', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 2, 1, '2021-12-21 09:02:34', NULL),
(5, 'Pierre', NULL, 'MANIRAKOZE', 'pierre', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 1, 1, '2021-12-31 16:47:36', '2022-05-16 23:08:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `archive_list`
--
ALTER TABLE `archive_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curriculum_id` (`curriculum_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_faculte` (`id_faculte`);

--
-- Indexes for table `faculte`
--
ALTER TABLE `faculte`
  ADD PRIMARY KEY (`id_faculte`),
  ADD KEY `id_universite` (`id_universite`);

--
-- Indexes for table `institut`
--
ALTER TABLE `institut`
  ADD PRIMARY KEY (`id_institut`),
  ADD KEY `id_universite` (`id_universite`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id_personnel`);

--
-- Indexes for table `projet_consultation`
--
ALTER TABLE `projet_consultation`
  ADD PRIMARY KEY (`id_consultation`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD UNIQUE KEY `email_2` (`email`) USING HASH,
  ADD UNIQUE KEY `email_3` (`email`) USING HASH,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `curriculum_id` (`curriculum_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_filieres`
--
ALTER TABLE `tbl_filieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `universite`
--
ALTER TABLE `universite`
  ADD PRIMARY KEY (`id_universite`),
  ADD KEY `id_universite` (`id_universite`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_list`
--
ALTER TABLE `archive_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faculte`
--
ALTER TABLE `faculte`
  MODIFY `id_faculte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `institut`
--
ALTER TABLE `institut`
  MODIFY `id_institut` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id_personnel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projet_consultation`
--
ALTER TABLE `projet_consultation`
  MODIFY `id_consultation` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_filieres`
--
ALTER TABLE `tbl_filieres`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `universite`
--
ALTER TABLE `universite`
  MODIFY `id_universite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archive_list`
--
ALTER TABLE `archive_list`
  ADD CONSTRAINT `archive_list_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_list` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `faculte`
--
ALTER TABLE `faculte`
  ADD CONSTRAINT `faculte_ibfk_1` FOREIGN KEY (`id_universite`) REFERENCES `universite` (`id_universite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `institut`
--
ALTER TABLE `institut`
  ADD CONSTRAINT `institut_ibfk_1` FOREIGN KEY (`id_universite`) REFERENCES `universite` (`id_universite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projet_consultation`
--
ALTER TABLE `projet_consultation`
  ADD CONSTRAINT `projet_consultation_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `archive_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projet_consultation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `student_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_list`
--
ALTER TABLE `student_list`
  ADD CONSTRAINT `student_list_ibfk_1` FOREIGN KEY (`curriculum_id`) REFERENCES `tbl_filieres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_list_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_filieres`
--
ALTER TABLE `tbl_filieres`
  ADD CONSTRAINT `tbl_filieres_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
