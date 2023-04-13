-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 avr. 2023 à 14:27
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bsshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parentId` int(11) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parentId`, `statut`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(1, 'Quincaillerie', 1, 0, '2022-11-14 13:55:09', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(2, 'Fixation & Assemblage', 1, 0, '2022-11-14 13:54:54', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(3, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 15:08:24', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(6, 'Quincaillerie', 1, 0, '2022-11-14 15:08:24', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(7, 'Fixation & Assemblage', 1, 0, '2022-11-14 15:08:24', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(8, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(9, 'Quincaillerie', 1, 0, '2022-11-14 17:02:12', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(10, 'Fixation & Assemblage', 1, 0, '2022-11-14 13:54:54', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(11, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(12, 'Quincaillerie', 1, 0, '2022-11-14 13:55:10', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(13, 'Fixation & Assemblage', 1, 0, '2022-11-14 13:54:55', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(14, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(15, 'Quincaillerie', 1, 0, '2022-11-14 13:55:10', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(16, 'Fixation & Assemblage', 1, 0, '2022-11-14 13:54:55', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(17, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(18, 'Quincaillerie', 1, 0, '2022-11-14 13:55:10', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(19, 'Fixation & Assemblage', 1, 0, '2022-11-14 13:54:55', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(20, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(21, 'Quincaillerie', 1, 0, '2022-11-14 13:55:10', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(22, 'Fixation & Assemblage', 1, 0, '2022-11-14 13:54:55', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(23, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(24, 'Quincaillerie', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(25, 'Fixation & Assemblage', 1, 0, '2022-11-14 13:55:09', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(26, 'Quincaillerie du bâtiment', 1, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 22:41:22', NULL),
(27, 'douffi', 0, 0, '2022-11-14 13:54:54', 'DOUFFI#1', '2022-11-13 23:11:11', 'DOUFFI#1'),
(28, 'test', 0, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 23:12:01', 'DOUFFI#1'),
(29, 'test2', 0, 0, '2022-11-14 13:55:38', 'DOUFFI#1', '2022-11-13 23:14:46', 'DOUFFI#1'),
(30, 'test3', 0, 0, '2022-11-14 13:55:38', 'DOUFFI#1', '2022-11-13 23:15:32', 'DOUFFI#1'),
(31, 'AGBODJAMA GROS GRAIN', 0, 1, '2022-11-24 10:51:59', 'DOUFFI#1', '2022-11-14 11:38:12', 'DOUFFI#1'),
(32, 'AGBODJAMA PETITS GRAINS', 0, 1, '2022-11-15 14:16:53', 'DOUFFI#1', '2022-11-14 12:10:31', 'DOUFFI#1'),
(33, 'test', 0, 0, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-14 13:27:38', 'DOUFFI#1'),
(34, 'test', 0, 0, '2022-11-14 13:55:38', 'DOUFFI#1', '2022-11-14 13:46:17', 'DOUFFI#1'),
(35, 'test', 0, 0, '2022-11-14 16:29:54', 'DOUFFI#1', '2022-11-14 16:26:58', 'DOUFFI#1'),
(36, 'PRODUITS DE PREMIERE NECESSITE', 0, 1, '2022-11-24 15:05:57', 'DOUFFI#1', '2022-11-15 15:08:05', 'DOUFFI#1'),
(37, 'POISSONNERIE', 0, 1, NULL, NULL, '2022-11-22 09:31:19', 'DOUFFI#1'),
(38, 'Spaghetti Maman Pâte Alimentaire', 0, 0, '2022-12-19 16:36:14', 'DOUFFI#1', '2022-12-19 16:35:49', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `code_promo`
--

CREATE TABLE `code_promo` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `id_type_code_promo` int(11) NOT NULL,
  `max_usage` int(11) NOT NULL,
  `discount` varchar(15) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `validity` date NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `code_promo`
--

INSERT INTO `code_promo` (`id`, `code`, `id_type_code_promo`, `max_usage`, `discount`, `statut`, `validity`, `valid`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(7, 'EAVU4467', 15, 15, '15%', 1, '2022-12-31', 1, '2022-12-26 11:02:51', '2022-12-26 13:41:00', 'DOUFFI#1', 'DOUFFI#1'),
(8, 'EAVU4468', 14, 10, '5000', 1, '2023-01-01', 1, '2022-12-26 11:03:14', '2022-12-26 14:09:01', 'DOUFFI#1', 'DOUFFI#1'),
(9, '1663664645514', 14, 5, '3000', 1, '2022-12-25', 0, '2022-12-26 11:03:30', '2022-12-26 11:19:55', 'DOUFFI#1', 'DOUFFI#1'),
(10, '1663664772412', 15, 10, '50%', 1, '2022-12-24', 1, '2022-12-26 11:04:03', '2022-12-26 11:04:03', 'DOUFFI#1', '');

-- --------------------------------------------------------

--
-- Structure de la table `comment_by_product`
--

CREATE TABLE `comment_by_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `nomClient` varchar(255) NOT NULL,
  `prenomClient` varchar(255) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  `commentaires` text NOT NULL,
  `etoiles` int(11) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment_by_product`
--

INSERT INTO `comment_by_product` (`id`, `product_id`, `nomClient`, `prenomClient`, `clientId`, `commentaires`, `etoiles`, `statut`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 44, 'Douffi', 'Kouame alexandre', NULL, 'Ce produit est vraiment juteux,et vraiment frais malgre le trajet,je peux en deduire que le service livraison merite son tarif ', 4, 1, '2022-12-23 14:02:16', '2022-12-23 15:00:43', ''),
(2, 44, 'Toure', 'Mariam', NULL, 'pas mal pour un produit de premiere necessite,cet aricle merite vraiment son prix', 3, 1, '2022-12-23 14:02:00', '2022-12-23 15:00:43', ''),
(14, 44, 'Touretest', 'Mariam', NULL, 'pas mal pour un produit de premiere necessite,cet aricle merite vraiment son prix', 3, 0, '2022-12-23 14:02:00', '2022-12-23 16:55:46', 'DOUFFI#1'),
(15, 44, 'Touretest', 'Mariam', NULL, 'pas mal pour un produit de premiere necessite,cet aricle merite vraiment son prix', 3, 0, '2022-12-23 14:02:00', '2022-12-23 16:55:46', 'DOUFFI#1'),
(16, 44, 'Touretest', 'Mariam', NULL, 'pas mal pour un produit de premiere necessite,cet aricle merite vraiment son prix', 3, 0, '2022-12-23 14:02:00', '2022-12-23 16:46:01', 'DOUFFI#1'),
(17, 44, 'Touretest', 'Mariam', NULL, 'pas mal pour un produit de premiere necessite,cet aricle merite vraiment son prix', 3, 0, '2022-12-23 14:02:00', '2022-12-23 16:43:45', 'DOUFFI#1'),
(18, 30, 'DOUFFI ', 'KOUAME ALEXANDRE', NULL, 'Tel produit telle illustration', 4, 0, '2022-12-24 00:01:39', '2022-12-24 00:02:41', 'DOUFFI#1'),
(19, 30, 'dOUFFI ', 'Alexandre ', NULL, '', 4, 0, '2022-12-24 00:02:04', '2022-12-24 00:02:35', 'DOUFFI#1'),
(20, 44, 'TEST', 'TEST', NULL, 'CECI EST UN TEST', 5, 0, '2022-12-24 15:56:54', '2022-12-24 15:57:19', 'DOUFFI#1'),
(21, 29, 'DOUFFI ', 'alexandre', NULL, 'Ces amendes ont l\'air d\'etre plus secs mais vraiment enrichis en huile', 4, 0, '2022-12-24 16:03:26', '2022-12-26 11:23:28', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `iduser` int(11) NOT NULL,
  `photo` text NOT NULL,
  `nom` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `login` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `profil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `connected` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`iduser`, `photo`, `nom`, `prenom`, `login`, `password`, `profil`, `statut`, `created_at`, `created_by`, `updated_at`, `updated_by`, `connected`) VALUES
(1, 'WhatsApp Image 2022-11-08 at 07.24.56.jpeg', 'DOUFFI', 'ALEXANDRE', 'alexandrekdouffi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', 1, NULL, '', '2022-12-20 20:22:42', 'DOUFFI#1', 1),
(74, '', 'ADMIN', 'admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2', 0, '2022-11-15 13:38:33', 'DOUFFI#1', '2022-11-15 13:52:47', 'DOUFFI#1', 0),
(75, 'WhatsApp Image 2022-11-08 at 07.24.56.jpeg', 'test', 'KOUADIO FRANCK', 'asc@acs.com', '81dc9bdb52d04dc20036dbd8313ed055', '2', 0, '2022-11-15 13:48:30', 'DOUFFI#1', '2022-11-15 13:52:47', 'DOUFFI#1', 0),
(76, 'logo.jpeg', 'ADMINISTRATEUR', 'ATTIEKE SERVICE', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2', 1, '2022-11-15 13:53:17', 'DOUFFI#1', '2022-11-22 19:11:11', 'DOUFFI#1', 0),
(77, 'test@casa-651x600.png', 'VALIDATEUR', 'VALIDATEUR', 'validateur@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '27', 1, '2022-11-15 14:24:22', 'DOUFFI#1', '2022-12-21 12:52:41', 'VALIDATEUR#77', 0),
(78, 'Demi-Sac-attiéké-5Kg.jpg', 'DOUFFI ', 'KOUAME ALEXANDRE', 'asc@acs.com', '81dc9bdb52d04dc20036dbd8313ed055', '2', 0, '2022-11-15 14:26:54', 'DOUFFI#1', '2022-11-15 14:27:03', 'DOUFFI#1', 0),
(79, 'popup-bg.png', 'GESTIONNAIRE', ' DE STOCK', 'gestionnaire@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '26', 1, '2022-11-15 15:04:02', 'DOUFFI#1', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `histo_stock`
--

CREATE TABLE `histo_stock` (
  `id` int(11) NOT NULL,
  `disponible` int(11) NOT NULL,
  `en_stock` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_appro` datetime NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `histo_stock`
--

INSERT INTO `histo_stock` (`id`, `disponible`, `en_stock`, `product_id`, `date_appro`, `statut`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(10, 50, 50, 29, '2022-11-25 10:16:00', 1, NULL, NULL, '2022-11-24 10:16:59', 'DOUFFI#1'),
(11, 10, 10, 21, '2022-11-26 10:17:00', 1, NULL, NULL, '2022-11-24 10:17:10', 'DOUFFI#1'),
(12, 50, 50, 44, '2022-11-24 10:19:00', 1, NULL, NULL, '2022-11-24 10:17:23', 'DOUFFI#1'),
(13, 50, 50, 50, '2022-11-24 10:17:00', 1, NULL, NULL, '2022-11-24 10:17:37', 'DOUFFI#1'),
(14, 20, 20, 21, '2022-11-25 10:17:00', 1, NULL, NULL, '2022-11-24 10:18:03', 'DOUFFI#1'),
(15, 50, 50, 32, '2022-11-24 10:22:00', 1, NULL, NULL, '2022-11-24 10:18:26', 'DOUFFI#1'),
(16, 40, 40, 31, '2022-11-26 10:18:00', 1, NULL, NULL, '2022-11-24 10:18:47', 'DOUFFI#1'),
(17, 10, 10, 35, '2022-11-26 10:19:00', 1, NULL, NULL, '2022-11-24 10:19:27', 'DOUFFI#1'),
(18, 10, 10, 30, '2022-11-19 11:00:00', 1, NULL, NULL, '2022-11-24 11:00:23', 'DOUFFI#1'),
(19, 10, 10, 47, '2022-11-24 15:07:00', 1, NULL, NULL, '2022-11-24 15:06:47', 'DOUFFI#1'),
(20, 10, 10, 48, '2022-11-24 15:06:00', 1, NULL, NULL, '2022-11-24 15:07:02', 'DOUFFI#1'),
(21, 10, 10, 51, '2022-11-24 15:07:00', 1, NULL, NULL, '2022-11-24 15:07:32', 'DOUFFI#1'),
(22, 10, 10, 49, '2022-11-24 15:07:00', 1, NULL, NULL, '2022-11-24 15:07:52', 'DOUFFI#1'),
(23, 10, 10, 46, '2022-11-24 15:08:00', 1, NULL, NULL, '2022-11-24 15:08:06', 'DOUFFI#1'),
(24, 10, 10, 28, '2022-11-24 15:09:00', 1, NULL, NULL, '2022-11-24 15:09:21', 'DOUFFI#1'),
(25, 11, 11, 27, '2022-11-24 15:09:00', 1, NULL, NULL, '2022-11-24 15:09:36', 'DOUFFI#1'),
(26, 12, 12, 36, '2022-11-24 15:09:00', 1, NULL, NULL, '2022-11-24 15:09:53', 'DOUFFI#1'),
(27, 25, 25, 33, '2022-11-24 15:10:00', 1, NULL, NULL, '2022-11-24 15:10:11', 'DOUFFI#1'),
(28, 12, 12, 34, '2022-11-24 15:10:00', 1, NULL, NULL, '2022-11-24 15:10:25', 'DOUFFI#1'),
(29, 22, 22, 24, '2022-11-24 15:10:00', 1, NULL, NULL, '2022-11-24 15:10:41', 'DOUFFI#1'),
(30, 22, 22, 19, '2022-11-25 15:10:00', 1, NULL, NULL, '2022-11-24 15:10:57', 'DOUFFI#1'),
(31, 49, 49, 25, '2022-11-24 15:12:00', 1, NULL, NULL, '2022-11-24 15:11:16', 'DOUFFI#1'),
(32, 11, 11, 20, '2022-11-24 15:11:00', 1, NULL, NULL, '2022-11-24 15:11:33', 'DOUFFI#1'),
(33, 32, 32, 39, '2022-11-24 15:11:00', 1, NULL, NULL, '2022-11-24 15:12:01', 'DOUFFI#1'),
(34, 90, 90, 41, '2022-11-24 15:12:00', 1, NULL, NULL, '2022-11-24 15:12:20', 'DOUFFI#1'),
(35, 13, 13, 40, '2022-11-24 15:15:00', 1, NULL, NULL, '2022-11-24 15:12:43', 'DOUFFI#1'),
(36, 17, 17, 26, '2022-11-24 17:12:00', 1, NULL, NULL, '2022-11-24 15:13:00', 'DOUFFI#1'),
(37, 20, 20, 22, '2022-11-24 17:16:00', 1, NULL, NULL, '2022-11-24 15:16:08', 'DOUFFI#1'),
(38, 13, 13, 23, '2022-11-24 15:20:00', 1, NULL, NULL, '2022-11-24 15:20:08', 'DOUFFI#1'),
(39, 16, 16, 37, '2022-11-24 15:20:00', 1, NULL, NULL, '2022-11-24 15:20:24', 'DOUFFI#1'),
(40, 32, 32, 38, '2022-11-24 15:20:00', 1, NULL, NULL, '2022-11-24 15:20:44', 'DOUFFI#1'),
(41, 27, 27, 45, '2022-11-24 15:24:00', 1, NULL, NULL, '2022-11-24 15:24:35', 'DOUFFI#1'),
(42, 18, 18, 42, '2022-11-24 15:24:00', 1, NULL, NULL, '2022-11-24 15:24:50', 'DOUFFI#1'),
(43, 18, 18, 43, '2022-11-24 15:25:00', 1, NULL, NULL, '2022-11-24 15:25:08', 'DOUFFI#1'),
(44, 10, 10, 44, '2022-11-26 13:46:00', 1, '0000-00-00 00:00:00', NULL, '2022-11-26 13:46:44', NULL),
(45, 10, 10, 30, '2022-12-04 14:38:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-04 14:38:17', NULL),
(46, 10, 10, 50, '2022-12-05 08:35:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-05 08:35:07', NULL),
(47, 50, 50, 30, '2022-12-05 08:35:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-05 08:35:27', NULL),
(48, 10, 10, 35, '2022-12-05 11:42:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-05 11:42:11', NULL),
(49, 130, 130, 23, '2022-12-05 11:49:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-05 11:49:29', NULL),
(50, 10, 10, 52, '2022-12-20 16:47:00', 1, NULL, NULL, '2022-12-20 16:47:29', 'DOUFFI#1'),
(51, 30, 30, 50, '2022-12-20 20:03:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-20 20:03:08', NULL),
(52, 50, 50, 47, '2022-12-20 20:03:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-20 20:03:28', NULL),
(53, 40, 40, 48, '2022-12-20 20:03:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-20 20:03:59', NULL),
(54, 10, 10, 36, '2022-12-20 20:04:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-20 20:04:15', NULL),
(55, 30, 30, 28, '2022-12-22 19:40:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-22 19:40:57', NULL),
(56, 30, 30, 51, '2022-12-22 19:41:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-22 19:41:37', NULL),
(57, 30, 30, 49, '2022-12-22 19:41:00', 1, '0000-00-00 00:00:00', NULL, '2022-12-22 19:42:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `name`, `statut`, `product_id`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(1, 'test@casa-651x600.png', 1, 1, NULL, NULL, '2022-11-14 16:12:26', 'DOUFFI#1'),
(2, 'test@casa-651x600.png', 1, 2, NULL, NULL, '2022-11-14 16:31:58', 'DOUFFI#1'),
(3, 'WhatsApp Image 2022-11-14 at 10.09.57.jpeg', 1, 3, NULL, NULL, '2022-11-14 16:34:43', 'DOUFFI#1'),
(4, 'images.jfif', 1, 4, NULL, NULL, '2022-11-14 16:49:30', 'DOUFFI#1'),
(5, 'test@casa-651x600.png', 1, 5, NULL, NULL, '2022-11-14 16:50:49', 'DOUFFI#1'),
(6, 'Demi-Sac-attiéké-5Kg.jpg', 0, 6, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-14 16:54:22', 'DOUFFI#1'),
(7, 'téléchargement.jfif', 0, 7, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-14 16:56:40', 'DOUFFI#1'),
(8, 'Demi-simple-Sac-attieke-5Kg.jpg', 0, 8, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-14 16:57:33', 'DOUFFI#1'),
(9, 'téléchargement.jfif', 0, 9, '2022-11-14 17:05:11', 'DOUFFI#1', '2022-11-14 16:59:12', 'DOUFFI#1'),
(10, 'test@casa-651x600.png', 1, 10, NULL, NULL, '2022-11-14 16:59:33', 'DOUFFI#1'),
(11, 'attieke-abodjaman.jpg', 0, 11, '2022-11-21 13:11:49', 'DOUFFI#1', '2022-11-14 17:06:07', 'DOUFFI#1'),
(12, 'images.jfif', 0, 12, '2022-11-14 17:24:42', 'DOUFFI#1', '2022-11-14 17:09:40', 'DOUFFI#1'),
(13, 'images.jfif', 0, 13, '2022-11-14 17:11:12', 'DOUFFI#1', '2022-11-14 17:11:02', 'DOUFFI#1'),
(14, 'WhatsApp Image 2022-11-14 at 10.18.14.jpeg', 0, 14, '2022-11-14 17:45:14', 'DOUFFI#1', '2022-11-14 17:36:21', 'DOUFFI#1'),
(15, 'psb.jpg', 0, 15, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-15 15:08:48', 'DOUFFI#1'),
(16, 'huile aya.jpg', 0, 16, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-15 15:14:41', 'DOUFFI#1'),
(17, 'huile-sans-cholesterol-90-cl-dinor.jpg', 0, 17, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-15 15:15:43', 'DOUFFI#1'),
(18, 'tomat.png', 0, 18, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-15 15:16:24', 'DOUFFI#1'),
(19, '1.jpg', 1, 19, '2022-11-21 19:58:51', 'DOUFFI#1', '2022-11-21 13:39:42', 'DOUFFI#1'),
(20, '131-large_default.jpg', 1, 20, NULL, NULL, '2022-11-21 20:01:25', 'DOUFFI#1'),
(21, '610a77529bb17_arome-maggi-225.jpg', 1, 21, NULL, NULL, '2022-11-21 20:02:30', 'DOUFFI#1'),
(22, 'Capsicum_annuum_fruits_IMGP0049.jpg', 1, 22, NULL, NULL, '2022-11-21 20:03:24', 'DOUFFI#1'),
(23, 'Capture-2.png', 1, 23, NULL, NULL, '2022-11-21 20:04:18', 'DOUFFI#1'),
(24, 'image_1024.jfif', 1, 24, NULL, NULL, '2022-11-21 20:05:09', 'DOUFFI#1'),
(25, 'P1022874-scaled-1.jpg', 1, 25, NULL, NULL, '2022-11-21 20:06:10', 'DOUFFI#1'),
(26, 'tomate.jpg', 1, 26, NULL, NULL, '2022-11-21 20:07:25', 'DOUFFI#1'),
(27, 'yy.jpg', 1, 27, NULL, NULL, '2022-11-21 20:08:40', 'DOUFFI#1'),
(28, '98dc1bf6d8_50144432_2-arachide-cacahuete.jpg', 1, 28, NULL, NULL, '2022-11-21 20:09:43', 'DOUFFI#1'),
(29, 'amande.jpg', 1, 29, '2022-12-20 15:38:55', 'DOUFFI#1', '2022-11-21 20:10:35', 'DOUFFI#1'),
(30, 'banane.jpg', 1, 30, '2022-12-19 17:27:46', 'DOUFFI#1', '2022-11-21 20:11:10', 'DOUFFI#1'),
(31, 'Carotte.jpg', 1, 31, NULL, NULL, '2022-11-21 20:12:11', 'DOUFFI#1'),
(32, 'Chou-vert.png', 1, 32, NULL, NULL, '2022-11-21 20:12:55', 'DOUFFI#1'),
(33, 'concombre.jpeg', 1, 33, NULL, NULL, '2022-11-21 20:13:39', 'DOUFFI#1'),
(34, 'courgette-scaled-e1639688670152-700x700.jpg', 1, 34, NULL, NULL, '2022-11-21 20:14:14', 'DOUFFI#1'),
(35, 'IMG_CAT_87IDRX.jpeg', 1, 35, NULL, NULL, '2022-11-21 20:15:11', 'DOUFFI#1'),
(36, 'Orange-Fruit-Pieces.jpg', 1, 36, NULL, NULL, '2022-11-21 20:15:57', 'DOUFFI#1'),
(37, 'oignons.jpg', 1, 37, NULL, NULL, '2022-11-21 20:16:46', 'DOUFFI#1'),
(38, 'Oignon-vert-700x700.png', 1, 38, NULL, NULL, '2022-11-21 20:17:29', 'DOUFFI#1'),
(39, 'les-5-vertus-sante-de-l-oeuf.jpeg', 1, 39, NULL, NULL, '2022-11-21 20:18:40', 'DOUFFI#1'),
(40, 'noix-de-coco.jpg', 1, 40, NULL, NULL, '2022-11-21 20:19:22', 'DOUFFI#1'),
(41, 'piment-1.jpg', 1, 41, NULL, NULL, '2022-11-21 20:20:05', 'DOUFFI#1'),
(42, 'téléchargement (1).jfif', 1, 42, NULL, NULL, '2022-11-21 20:20:53', 'DOUFFI#1'),
(43, 'téléchargement (2).jfif', 1, 43, NULL, NULL, '2022-11-21 20:21:33', 'DOUFFI#1'),
(44, 'shutterstock_186916061.jpg', 1, 44, '2022-11-22 09:32:14', 'DOUFFI#1', '2022-11-21 20:22:18', 'DOUFFI#1'),
(45, 'packshot-gl-entier-3.png', 1, 45, NULL, NULL, '2022-11-21 20:23:14', 'DOUFFI#1'),
(46, 'sole-grosse-piece-de-11kg.jpg', 1, 46, NULL, NULL, '2022-11-22 09:32:03', 'DOUFFI#1'),
(47, 'thon_rouge.png', 1, 47, '2022-11-22 10:01:56', 'DOUFFI#1', '2022-11-22 09:32:49', 'DOUFFI#1'),
(48, 'thon-blanc.jpg', 1, 48, '2022-11-22 10:01:42', 'DOUFFI#1', '2022-11-22 09:33:22', 'DOUFFI#1'),
(49, 'Silure_Boutique.png', 1, 49, NULL, NULL, '2022-11-22 09:34:03', 'DOUFFI#1'),
(50, '235-large_default.jpg', 1, 50, NULL, NULL, '2022-11-22 09:34:53', 'DOUFFI#1'),
(51, 'Catfish.jpg', 1, 51, NULL, NULL, '2022-11-22 09:36:11', 'DOUFFI#1'),
(52, '6s-1.jpg', 1, 52, NULL, NULL, '2022-12-19 16:37:27', 'DOUFFI#1'),
(53, 'images.jfif', 0, 54, '2022-12-24 00:19:42', 'DOUFFI#1', '2022-12-24 00:17:17', 'DOUFFI#1'),
(54, 'WhatsApp Image 2022-11-21 at 19.14.41.jpeg', 0, 55, '2022-12-24 00:22:01', 'DOUFFI#1', '2022-12-24 00:20:26', 'DOUFFI#1'),
(55, 'base de donnees.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 00:22:47', 'DOUFFI#1'),
(56, 'logo.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 00:22:47', 'DOUFFI#1'),
(57, 'WhatsApp Image 2022-10-17 at 09.50.35.jpeg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 00:22:47', 'DOUFFI#1'),
(58, 'WhatsApp Image 2022-11-08 at 07.24.56.jpeg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 00:22:47', 'DOUFFI#1'),
(59, 'WhatsApp Image 2022-11-14 at 10.18.14.jpeg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 00:22:47', 'DOUFFI#1'),
(60, 'WhatsApp Image 2022-11-21 at 19.14.41.jpeg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 00:22:47', 'DOUFFI#1'),
(61, 'ppn.jpg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:38:52', NULL),
(62, 'product-47.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:38:53', NULL),
(63, 'product-48.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:38:53', NULL),
(64, 'product-49.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:38:53', NULL),
(65, 'bg-image-12.jpg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:39:46', NULL),
(66, 'ppn.jpg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:39:46', NULL),
(67, 'product-47.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:39:46', NULL),
(68, 'product-48.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:39:47', NULL),
(69, 'bg-image-12.jpg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:41:33', NULL),
(70, 'piment-1.jpg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:41:33', NULL),
(71, 'ppn.jpg', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:41:33', NULL),
(72, 'product-47.png', 0, 56, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:41:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images_category`
--

CREATE TABLE `images_category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images_category`
--

INSERT INTO `images_category` (`id`, `name`, `category_id`, `updated_at`, `updated_by`, `created_at`, `created_by`, `statut`) VALUES
(1, 'bg1.png', 28, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 23:12:02', 'DOUFFI#1', 0),
(2, 'origamiweb.png', 29, '2022-11-14 13:55:38', 'DOUFFI#1', '2022-11-13 23:14:46', 'DOUFFI#1', 0),
(3, 'bg.png', 30, '2022-11-14 13:55:38', 'DOUFFI#1', '2022-11-13 23:15:32', 'DOUFFI#1', 0),
(4, 'bg1.png', 28, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-13 23:12:02', 'DOUFFI#1', 0),
(5, 'WhatsApp Image 2022-11-14 at 10.09.57.jpeg', 31, '2022-11-24 10:51:59', 'DOUFFI#1', '2022-11-14 11:38:12', 'DOUFFI#1', 1),
(6, 'images.jfif', 32, '2022-11-15 14:16:53', 'DOUFFI#1', '2022-11-14 12:10:31', 'DOUFFI#1', 1),
(7, 'test@casa-651x600.png', 33, '2022-11-14 13:55:37', 'DOUFFI#1', '2022-11-14 13:27:38', 'DOUFFI#1', 0),
(8, 'test@casa-651x600.png', 34, '2022-11-14 13:55:38', 'DOUFFI#1', '2022-11-14 13:46:17', 'DOUFFI#1', 0),
(9, 'WhatsApp Image 2022-11-14 at 10.18.14.jpeg', 35, '2022-11-14 16:29:54', 'DOUFFI#1', '2022-11-14 16:26:58', 'DOUFFI#1', 0),
(10, 'IMGBN46683ministre-agriculture.jpg', 36, '2022-11-24 15:05:58', 'DOUFFI#1', '2022-11-15 15:08:05', 'DOUFFI#1', 1),
(11, 'slider04-1920x1080-1.jpg', 37, NULL, NULL, '2022-11-22 09:31:19', 'DOUFFI#1', 1),
(12, '6s-1.jpg', 38, '2022-12-19 16:36:14', 'DOUFFI#1', '2022-12-19 16:35:49', 'DOUFFI#1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `masse`
--

CREATE TABLE `masse` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `masse`
--

INSERT INTO `masse` (`id`, `libelle`, `statut`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(1, '0', 0, '2022-11-28 13:31:30', 'DOUFFI#1', '2022-11-14 15:27:39', 'DOUFFI#1'),
(2, '0', 0, '2022-11-28 13:31:30', 'DOUFFI#1', '2022-11-14 15:27:55', 'DOUFFI#1'),
(3, 'test', 0, '2022-11-28 13:31:30', 'DOUFFI#1', '2022-11-14 15:28:40', 'DOUFFI#1'),
(4, '1 kg ', 0, '2022-11-14 15:33:41', 'DOUFFI#1', '2022-11-14 15:29:00', 'DOUFFI#1'),
(5, '1 kg ', 1, '2022-11-14 15:34:07', 'DOUFFI#1', '2022-11-14 15:29:09', 'DOUFFI#1'),
(6, '5 kg ', 1, '2022-11-15 09:14:21', 'DOUFFI#1', '2022-11-14 15:29:16', 'DOUFFI#1'),
(7, '5 kg', 0, '2022-11-14 23:53:15', 'DOUFFI#1', '2022-11-14 15:33:56', 'DOUFFI#1'),
(8, '10 Kg', 0, '2022-11-15 14:17:31', 'DOUFFI#1', '2022-11-15 09:06:01', 'DOUFFI#1'),
(9, '1,5 L', 1, NULL, NULL, '2022-11-15 15:14:57', 'DOUFFI#1'),
(10, '1 L', 1, '2022-11-21 13:03:37', 'DOUFFI#1', '2022-11-21 13:03:29', 'DOUFFI#1'),
(11, '50 mg', 1, NULL, NULL, '2022-11-21 13:40:20', 'DOUFFI#1'),
(12, '500 mg', 1, NULL, NULL, '2022-11-21 13:40:30', 'DOUFFI#1'),
(13, '800 mg', 1, NULL, NULL, '2022-11-21 13:42:28', 'DOUFFI#1'),
(14, '300 ml', 1, NULL, NULL, '2022-11-21 13:42:37', 'DOUFFI#1'),
(15, '5 kg - 10 kg', 0, '2022-12-20 19:51:09', 'DOUFFI#1', '2022-12-20 19:50:58', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference` text NOT NULL,
  `statut` varchar(5) NOT NULL DEFAULT 'EAV',
  `codes_promo_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `reference`, `statut`, `codes_promo_id`, `users_id`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(5, 'Commande de :<br><b>5x</b> ANANAS<br><b>5x</b> POISSON MAQUEREAU<br><b>3x</b> POISSON SILURE <br><b>4x</b> CLEMENTINE<br><b>7x</b> THON ROUGE', 'L', 0, 2, '2022-12-19 18:36:28', 'DOUFFI#1', '2022-12-19 18:19:38', NULL),
(6, 'Commande de :<br><b>1x</b> NOIX DE COCO<br><b>1x</b> MAYONNAISE CALVE EN BOITE<br><b>2x</b> POISSON CHAT<br><b>1x</b> PLAQUETTE D\'OEUFS<br><b>1x</b> YOPLAIT VANILLE SUCRE<br><b>1x</b> Spaghetti Maman Pâte Alimentaire<br><b>1x</b> POIVRON<br><b>4x</b> THON BLANC<br><b>1x</b> POISSON MAQUEREAU<br><b>1x</b> POISSON SILURE ', 'V', 0, 2, NULL, NULL, '2022-12-20 16:36:15', NULL),
(7, 'Commande de :<br><b>5x</b> NOIX DE COCO<br><b>5x</b> MAYONNAISE CALVE EN BOITE', 'L', 0, 2, '2022-12-22 16:45:18', 'DOUFFI#1', '2022-12-22 16:42:57', NULL),
(8, 'Commande de :<br><b>5x</b> AMENDES MAROCCAINES<br><b>5x</b> BOITE D\'ARRACHIDES<br><b>1x</b> MAYONNAISE CALVE EN BOITE<br><b>5x</b> PLAQUETTE D\'OEUFS<br><b>5x</b> Spaghetti Maman Pâte Alimentaire<br><b>2x</b> TOMATE CERISE<br><b>2x</b> COURGETTES', 'X', 0, 14, '2022-12-30 23:05:30', 'DOUFFI#1', '2022-12-22 18:06:23', NULL),
(9, 'Commande de :<br><b>4x</b> BOITE D\'ARRACHIDES', 'L', 0, 14, '2022-12-22 18:37:19', 'DOUFFI#1', '2022-12-22 18:36:25', NULL),
(10, 'Commande de :<br><b>30x</b> PIMENT', 'XV', 0, 15, '2022-12-24 09:06:18', 'DOUFFI#1', '2022-12-22 19:43:57', NULL),
(11, 'Commande de :<br><b>9x</b> AMENDES MAROCCAINES<br><b>4x</b> ANANAS', 'X', 0, 14, '2022-12-24 16:00:48', 'DOUFFI#1', '2022-12-23 16:59:52', NULL),
(12, 'Commande de :<br><b>1x</b> BOITE DE PETIT YOPLAIT<br><b>2x</b> BOITE D\'ARRACHIDES<br><b>2x</b> AROME MAGGY<br><b>5x</b> AMENDES MAROCCAINES', 'L', 0, 14, '2022-12-30 23:05:10', 'DOUFFI#1', '2022-12-24 16:04:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `orders_details`
--

CREATE TABLE `orders_details` (
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'EAV',
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders_details`
--

INSERT INTO `orders_details` (`orders_id`, `products_id`, `quantity`, `price`, `statut`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(5, 44, 5, 6000, 'L', '2022-12-19 18:36:28', 'DOUFFI#1', NULL, NULL),
(5, 50, 5, 15000, 'L', '2022-12-19 18:36:28', 'DOUFFI#1', NULL, NULL),
(5, 49, 3, 6600, 'L', '2022-12-19 18:36:28', 'DOUFFI#1', NULL, NULL),
(5, 36, 4, 14400, 'L', '2022-12-19 18:36:28', 'DOUFFI#1', NULL, NULL),
(5, 47, 7, 25200, 'L', '2022-12-19 18:36:28', 'DOUFFI#1', NULL, NULL),
(6, 40, 1, 800, 'V', NULL, NULL, NULL, NULL),
(6, 23, 1, 2000, 'V', NULL, NULL, NULL, NULL),
(6, 51, 2, 4400, 'V', NULL, NULL, NULL, NULL),
(6, 39, 1, 2200, 'V', NULL, NULL, NULL, NULL),
(6, 43, 1, 800, 'V', NULL, NULL, NULL, NULL),
(6, 52, 1, 1200, 'V', NULL, NULL, NULL, NULL),
(6, 22, 1, 500, 'V', NULL, NULL, NULL, NULL),
(6, 48, 4, 14400, 'V', NULL, NULL, NULL, NULL),
(6, 50, 1, 3000, 'V', NULL, NULL, NULL, NULL),
(6, 49, 1, 2200, 'V', NULL, NULL, NULL, NULL),
(7, 40, 5, 4000, 'L', '2022-12-22 16:45:18', 'DOUFFI#1', NULL, NULL),
(7, 23, 5, 10000, 'L', '2022-12-22 16:45:18', 'DOUFFI#1', NULL, NULL),
(8, 29, 5, 18000, 'X', '2022-12-30 23:05:30', 'DOUFFI#1', NULL, NULL),
(8, 28, 5, 4000, 'X', '2022-12-30 23:05:30', 'DOUFFI#1', NULL, NULL),
(8, 23, 1, 2000, 'X', '2022-12-30 23:05:30', 'DOUFFI#1', NULL, NULL),
(8, 39, 5, 11000, 'X', '2022-12-30 23:05:30', 'DOUFFI#1', NULL, NULL),
(8, 52, 5, 6000, 'X', '2022-12-30 23:05:30', 'DOUFFI#1', NULL, NULL),
(8, 26, 2, 4000, 'X', '2022-12-30 23:05:30', 'DOUFFI#1', NULL, NULL),
(8, 34, 2, 2400, 'X', '2022-12-30 23:05:30', 'DOUFFI#1', NULL, NULL),
(9, 28, 4, 3200, 'L', '2022-12-22 18:37:19', 'DOUFFI#1', NULL, NULL),
(10, 41, 30, 60000, 'XV', '2022-12-24 09:06:18', 'DOUFFI#1', NULL, NULL),
(11, 29, 9, 32400, 'X', '2022-12-24 16:00:48', 'DOUFFI#1', NULL, NULL),
(11, 44, 4, 4800, 'X', '2022-12-24 16:00:48', 'DOUFFI#1', NULL, NULL),
(12, 27, 1, 1200, 'L', '2022-12-30 23:05:10', 'DOUFFI#1', NULL, NULL),
(12, 28, 2, 1600, 'L', '2022-12-30 23:05:10', 'DOUFFI#1', NULL, NULL),
(12, 21, 2, 1600, 'L', '2022-12-30 23:05:10', 'DOUFFI#1', NULL, NULL),
(12, 29, 5, 18000, 'L', '2022-12-30 23:05:10', 'DOUFFI#1', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page` varchar(50) NOT NULL,
  `parentID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `page`, `parentID`) VALUES
(1, 'produits', NULL),
(2, 'commandes', NULL),
(3, 'stocks', NULL),
(4, 'administration', NULL),
(29, 'codespromo', NULL),
(28, 'messages', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE `prix` (
  `id` int(11) NOT NULL,
  `valeur` float NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prix`
--

INSERT INTO `prix` (`id`, `valeur`, `statut`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(1, 2000, 1, NULL, NULL, '2022-11-14 15:00:30', NULL),
(2, 1000, 1, NULL, NULL, '2022-11-14 15:00:30', NULL),
(3, 500, 0, '2022-11-14 15:10:51', 'DOUFFI#1', '2022-11-14 15:00:30', NULL),
(4, 3000, 1, '2022-11-14 15:15:35', 'DOUFFI#1', '2022-11-14 15:00:30', NULL),
(5, 800, 0, '2022-11-14 15:06:19', 'DOUFFI#1', '2022-11-14 15:00:35', 'DOUFFI#1'),
(6, 800, 0, '2022-11-14 15:10:51', 'DOUFFI#1', '2022-11-14 15:07:49', 'DOUFFI#1'),
(7, 550, 0, '2022-11-14 15:10:51', 'DOUFFI#1', '2022-11-14 15:08:03', 'DOUFFI#1'),
(8, 500, 1, '2022-11-14 15:15:17', 'DOUFFI#1', '2022-11-14 15:10:58', 'DOUFFI#1'),
(9, 800, 1, NULL, NULL, '2022-11-14 15:11:03', 'DOUFFI#1'),
(10, 3600, 1, NULL, NULL, '2022-11-21 13:12:01', 'DOUFFI#1'),
(11, 2200, 1, NULL, NULL, '2022-11-21 13:12:10', 'DOUFFI#1'),
(12, 1200, 1, NULL, NULL, '2022-11-21 13:12:16', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `mass` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `mass`, `categories_id`, `statut`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, 'SAC D\'ATTIEKE 5KG', 'SACHET DE ABODIAMA 5KG', 9, NULL, 5, 31, 0, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-21 13:11:50', 'DOUFFI#1'),
(7, 'ATTIEKE ABODJAMA 1 KG', '', 2, NULL, 5, 32, 0, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-21 13:11:50', 'DOUFFI#1'),
(8, 'ATTIEKE GROS GRAINS 10 KG', 'ATTIEKE GROS GRAINS 10 KG', 1, NULL, 6, 32, 0, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-21 13:11:50', 'DOUFFI#1'),
(9, 'SAC D\'ATTIEKE 5KG', '', 0, NULL, 0, 0, 0, '2022-11-14 17:05:11', 'DOUFFI#1', '2022-11-14 17:05:11', 'DOUFFI#1'),
(10, 'ATTIEKE ABODJAMA 1 KG', '', 0, NULL, 0, 0, 0, '2022-11-14 17:04:04', 'DOUFFI#1', '2022-11-14 17:04:04', 'DOUFFI#1'),
(11, 'ATTIEKE ABODJAMA', '', 8, NULL, 5, 31, 0, '2022-11-21 13:11:49', 'DOUFFI#1', '2022-11-21 13:11:49', 'DOUFFI#1'),
(12, 'douffi', '', 0, NULL, 0, 0, 0, '2022-11-14 17:24:42', 'DOUFFI#1', '2022-11-14 17:24:42', 'DOUFFI#1'),
(13, 'douffi', '', 0, NULL, 0, 0, 0, '2022-11-14 17:11:12', 'DOUFFI#1', '2022-11-14 17:11:12', 'DOUFFI#1'),
(14, 'douffi', 'test\r\n', 2, NULL, 6, 32, 0, '2022-11-14 17:45:14', 'DOUFFI#1', '2022-11-14 17:45:14', 'DOUFFI#1'),
(15, 'Piment Sent Bon', '', 9, NULL, 5, 36, 0, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-21 13:11:50', 'DOUFFI#1'),
(16, 'HUILE AYA', '', 1, NULL, 9, 36, 0, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-21 13:11:50', 'DOUFFI#1'),
(17, 'HUILE DINOR', '', 2, NULL, 9, 36, 0, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-21 13:11:50', 'DOUFFI#1'),
(18, 'TOMATE PERRETTI', '', 9, NULL, 5, 36, 0, '2022-11-21 13:11:50', 'DOUFFI#1', '2022-11-21 13:11:50', 'DOUFFI#1'),
(19, 'MAYONNAISE AROMATE', 'BOITE DE MAYONNAISE AROMATE 1KG ', 12, NULL, 13, 36, 1, '2022-11-21 19:58:51', 'DOUFFI#1', '2022-11-21 19:58:51', 'DOUFFI#1'),
(20, 'MAYONNAISE CALVE 1 PAQUET', '1 PAQUET DE MAYONNAISE CALVE EN SACHET DE 8 MG ', 12, NULL, 12, 36, 1, '2022-11-21 20:01:25', 'DOUFFI#1', NULL, ''),
(21, 'AROME MAGGY', 'AROME MAGGY BON POUR LA CUISINE', 9, NULL, 11, 36, 1, '2022-11-21 20:02:30', 'DOUFFI#1', NULL, ''),
(22, 'POIVRON', 'MELANGE DE POIVRONS DE TOUTES LES COULEURS', 8, NULL, 13, 36, 1, '2022-11-21 20:03:24', 'DOUFFI#1', NULL, ''),
(23, 'MAYONNAISE CALVE EN BOITE', '1 BOITE DE MAYONNAISE CALVE ', 1, NULL, 13, 36, 1, '2022-11-21 20:04:18', 'DOUFFI#1', NULL, ''),
(24, 'CUBE MAGGY', '1 PAQUET DE  MAGGY CUBE', 9, NULL, 12, 36, 1, '2022-11-21 20:05:09', 'DOUFFI#1', NULL, ''),
(25, 'MAYONNAISE AROMATE EN BIDON', '1 BIDON DE MAYONNAISE AROMATE ', 2, NULL, 12, 36, 1, '2022-11-21 20:06:09', 'DOUFFI#1', NULL, ''),
(26, 'TOMATE CERISE', '1 KG DE TOMATE CERISE', 1, NULL, 5, 36, 1, '2022-11-21 20:07:25', 'DOUFFI#1', NULL, ''),
(27, 'BOITE DE PETIT YOPLAIT', '1 PAQUET DE 6 BOITES DE YAOURT PETIT YOPLAIT', 12, NULL, 5, 36, 1, '2022-11-21 20:08:40', 'DOUFFI#1', NULL, ''),
(28, 'BOITE D\'ARRACHIDES', '1 BOITE DE GRAINE D\'ARRACHIDES', 9, NULL, 13, 36, 1, '2022-11-21 20:09:43', 'DOUFFI#1', NULL, ''),
(29, 'AMENDES MAROCCAINES', '1 KG D\'AMENDES MAROCCAINES', 10, NULL, 5, 36, 1, '2022-12-20 15:38:55', 'DOUFFI#1', '2022-12-20 15:38:55', 'DOUFFI#1'),
(30, '1 KG DE BANANE DOUCE', '1 KG DE BANANES DOUCES POUR LE DESSERT', 2, NULL, 5, 36, 1, '2022-12-19 17:27:46', 'DOUFFI#1', '2022-12-19 17:27:46', 'DOUFFI#1'),
(31, 'TIGES DE CAROTTES', '20 TIGES DE CAROTTES', 12, NULL, 13, 36, 1, '2022-11-21 20:12:11', 'DOUFFI#1', NULL, ''),
(32, 'SAC DE CHOUX', 'UN SAC DE 5 KG DE CHOUX ', 10, NULL, 6, 36, 1, '2022-11-21 20:12:55', 'DOUFFI#1', NULL, ''),
(33, 'CONCOMBRE', 'UN SAC DE 800 MG DE CONCOMBRE', 1, NULL, 13, 36, 1, '2022-11-21 20:13:39', 'DOUFFI#1', NULL, ''),
(34, 'COURGETTES', '500 MG DE COURGETTES', 12, NULL, 12, 36, 1, '2022-11-21 20:14:14', 'DOUFFI#1', NULL, ''),
(35, 'POMMES ROUGES', '1KG DE POMMES ROUGES D\'AMERIQUE DU NORD', 4, NULL, 5, 36, 1, '2022-11-21 20:15:11', 'DOUFFI#1', NULL, ''),
(36, 'CLEMENTINE', '1 KG DE CLEMENTINE', 10, NULL, 5, 36, 1, '2022-11-21 20:15:57', 'DOUFFI#1', NULL, ''),
(37, 'OIGNON BLANC', 'OIGNON BLANC D\'AFRIQUE DU NORD', 2, NULL, 12, 36, 1, '2022-11-21 20:16:46', 'DOUFFI#1', NULL, ''),
(38, 'OIGNONS VERTS', 'OIGNONS VERTS', 8, NULL, 11, 36, 1, '2022-11-21 20:17:29', 'DOUFFI#1', NULL, ''),
(39, 'PLAQUETTE D\'OEUFS', '1 PLAQUETTE D\'OEUFS FRAIS COQUIVOIRE', 11, NULL, 5, 36, 1, '2022-11-21 20:18:40', 'DOUFFI#1', NULL, ''),
(40, 'NOIX DE COCO', '1 KG DE NOIX DE COCO', 9, NULL, 5, 36, 1, '2022-11-21 20:19:22', 'DOUFFI#1', NULL, ''),
(41, 'PIMENT', '1 PETIT SAC DE PIMENT DE TOUTE COULEUR', 1, NULL, 13, 36, 1, '2022-11-21 20:20:05', 'DOUFFI#1', NULL, ''),
(42, 'YOPLAIT VANILLE', 'UNE BOITE DE YOPLAIT VANILLE', 2, NULL, 12, 36, 1, '2022-11-21 20:20:53', 'DOUFFI#1', NULL, ''),
(43, 'YOPLAIT VANILLE SUCRE', '1 SACHET DE YOPLAIT VANILLE SUCRE', 9, NULL, 11, 36, 1, '2022-11-21 20:21:33', 'DOUFFI#1', NULL, ''),
(44, 'ANANAS', 'ANANAS PUR AFRICAIN', 12, NULL, 12, 36, 1, '2022-11-22 09:32:14', 'DOUFFI#1', '2022-11-22 09:32:14', 'DOUFFI#1'),
(45, 'YOPLAIT GRAND LAIT', 'UN POT DE YOPLAIT GRAND LAIT', 12, NULL, 13, 36, 1, '2022-11-21 20:23:14', 'DOUFFI#1', NULL, ''),
(46, 'POISSON SOLE', '1 KG DE POISSON SOLE', 1, NULL, 5, 37, 1, '2022-11-22 09:32:03', 'DOUFFI#1', NULL, ''),
(47, 'THON ROUGE', '1 KG DE THON ROUGE', 10, NULL, 5, 37, 1, '2022-11-22 10:01:56', 'DOUFFI#1', '2022-11-22 10:01:56', 'DOUFFI#1'),
(48, 'THON BLANC', '1 KG DE THON BLANC', 10, NULL, 5, 37, 1, '2022-11-22 10:01:42', 'DOUFFI#1', '2022-11-22 10:01:42', 'DOUFFI#1'),
(49, 'POISSON SILURE ', '1 KG DE POISSON SILURE ', 11, NULL, 5, 37, 1, '2022-11-22 09:34:03', 'DOUFFI#1', NULL, ''),
(50, 'POISSON MAQUEREAU', '1 KG DE POISSON MAQUEREAU', 4, NULL, 5, 37, 1, '2022-11-22 09:34:53', 'DOUFFI#1', NULL, ''),
(51, 'POISSON CHAT', '1 KG DE POISSON CHAT', 11, NULL, 5, 37, 1, '2022-11-22 09:36:11', 'DOUFFI#1', NULL, ''),
(52, 'Spaghetti Maman Pâte Alimentaire', 'Spaghetti Maman Pâte Alimentaire 500 G', 12, NULL, 12, 36, 1, '2022-12-19 16:37:27', 'DOUFFI#1', NULL, ''),
(53, 'test', 'sdfgfd', 9, NULL, 11, 31, 0, '2022-12-24 00:15:42', 'DOUFFI#1', '2022-12-24 00:15:42', 'DOUFFI#1'),
(54, 'LAIT YOPLAIT GRAND LAIT', 'LAIT YOPLAIT', 4, NULL, 9, 31, 0, '2022-12-24 00:19:42', 'DOUFFI#1', '2022-12-24 00:19:42', 'DOUFFI#1'),
(55, 'douffi', 'CVBNM', 8, NULL, 12, 31, 0, '2022-12-24 00:22:01', 'DOUFFI#1', '2022-12-24 00:22:01', 'DOUFFI#1'),
(56, 'douffi', 'WSEDRTFGYUHIJOPKLKJIUH', 12, NULL, 10, 31, 0, '2022-12-24 08:54:13', 'DOUFFI#1', '2022-12-24 08:54:13', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `jsonPage` text DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `profil`, `jsonPage`, `statut`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(2, 'ADMINISTRATEUR', '[\"codespromo\",\"commandes\",\"messages\",\"produits\",\"stocks\"]', 1, '2022-12-23 11:12:54', 'DOUFFI#1', '2022-11-13 22:44:10', NULL),
(1, 'SUPER ADMINISTRATEUR', '[\"administration\",\"codespromo\",\"commandes\",\"messages\",\"produits\",\"stocks\"]', 1, '2022-12-23 11:12:44', 'DOUFFI#1', '2022-11-13 22:44:10', NULL),
(25, 'test', '[\"2\",\"1\",\"3\"]', 0, '2022-11-15 12:00:02', 'DOUFFI#1', '2022-11-15 11:51:41', 'DOUFFI#1'),
(26, 'GESTIONNAIRE DE STOCK', '[\"produits\",\"stocks\"]', 1, '2022-11-15 12:36:11', 'DOUFFI#1', '2022-11-15 11:59:53', 'DOUFFI#1'),
(27, 'VALIDATEUR DE COMMANDES', '[\"commandes\"]', 1, NULL, NULL, '2022-11-15 12:35:36', 'DOUFFI#1'),
(28, 'GESTIONNAIRE DES PRODUITS', '[\"produits\"]', 0, '2022-12-20 20:10:14', 'DOUFFI#1', '2022-11-15 12:36:00', 'DOUFFI#1'),
(29, 'test', '[\"administration\"]', 0, '2022-11-15 12:39:30', 'DOUFFI#1', '2022-11-15 12:37:14', 'DOUFFI#1'),
(30, 'ADMINISTRATEUR CENTRE', '[\"commandes\"]', 0, '2022-11-15 12:39:30', 'DOUFFI#1', '2022-11-15 12:37:35', 'DOUFFI#1'),
(31, 'test2', '[\"produits\"]', 0, '2022-11-15 12:41:20', 'DOUFFI#1', '2022-11-15 12:41:05', 'DOUFFI#1'),
(32, 'text', '[\"produits\"]', 0, '2022-11-17 12:00:00', 'DOUFFI#1', '2022-11-17 11:59:46', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `disponible` int(11) NOT NULL,
  `en_stock` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_appro` datetime NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `disponible`, `en_stock`, `product_id`, `date_appro`, `statut`, `updated_at`, `updated_by`, `created_at`, `created_by`) VALUES
(6, 26, 50, 29, '2022-11-25 10:16:00', 1, '2022-12-24 16:04:04', 'DOUFFI#1', '2022-11-24 10:16:59', 'DOUFFI#1'),
(7, 28, 30, 21, '2022-11-25 10:17:00', 1, '2022-12-24 16:04:04', 'DOUFFI#1', '2022-11-24 10:17:10', 'DOUFFI#1'),
(8, 39, 60, 44, '2022-11-26 13:46:00', 1, '2022-12-23 16:59:52', 'DOUFFI#1', '2022-11-24 10:17:23', 'DOUFFI#1'),
(9, 27, 90, 50, '2022-12-20 20:03:00', 1, '2022-12-20 20:03:08', 'DOUFFI#1', '2022-11-24 10:17:36', 'DOUFFI#1'),
(10, 44, 50, 32, '2022-11-24 10:22:00', 1, '2022-11-24 14:31:43', 'DOUFFI#1', '2022-11-24 10:18:26', 'DOUFFI#1'),
(11, 40, 40, 31, '2022-11-26 10:18:00', 1, NULL, NULL, '2022-11-24 10:18:47', 'DOUFFI#1'),
(12, 14, 20, 35, '2022-12-05 11:42:00', 1, '2022-12-05 11:42:11', 'DOUFFI#1', '2022-11-24 10:19:27', 'DOUFFI#1'),
(13, 49, 70, 30, '2022-12-05 08:35:00', 1, '2022-12-05 08:35:27', 'DOUFFI#1', '2022-11-24 11:00:23', 'DOUFFI#1'),
(14, 43, 60, 47, '2022-12-20 20:03:00', 1, '2022-12-20 20:03:28', 'DOUFFI#1', '2022-11-24 15:06:47', 'DOUFFI#1'),
(15, 37, 50, 48, '2022-12-20 20:03:00', 1, '2022-12-20 20:03:59', 'DOUFFI#1', '2022-11-24 15:07:02', 'DOUFFI#1'),
(16, 34, 40, 51, '2022-12-22 19:41:00', 1, '2022-12-22 19:41:36', 'DOUFFI#1', '2022-11-24 15:07:32', 'DOUFFI#1'),
(17, 33, 40, 49, '2022-12-22 19:41:00', 1, '2022-12-22 19:42:00', 'DOUFFI#1', '2022-11-24 15:07:52', 'DOUFFI#1'),
(18, 6, 10, 46, '2022-11-24 15:08:00', 1, '2022-12-05 09:31:34', 'DOUFFI#1', '2022-11-24 15:08:06', 'DOUFFI#1'),
(19, 24, 40, 28, '2022-12-22 19:40:00', 1, '2022-12-24 16:04:04', 'DOUFFI#1', '2022-11-24 15:09:21', 'DOUFFI#1'),
(20, 10, 11, 27, '2022-11-24 15:09:00', 1, '2022-12-24 16:04:04', 'DOUFFI#1', '2022-11-24 15:09:36', 'DOUFFI#1'),
(21, 8, 22, 36, '2022-12-20 20:04:00', 1, '2022-12-20 20:04:15', 'DOUFFI#1', '2022-11-24 15:09:52', 'DOUFFI#1'),
(22, 25, 25, 33, '2022-11-24 15:10:00', 1, NULL, NULL, '2022-11-24 15:10:11', 'DOUFFI#1'),
(23, 5, 12, 34, '2022-11-24 15:10:00', 1, '2022-12-22 18:06:23', '#', '2022-11-24 15:10:25', 'DOUFFI#1'),
(24, 22, 22, 24, '2022-11-24 15:10:00', 1, NULL, NULL, '2022-11-24 15:10:41', 'DOUFFI#1'),
(25, 22, 22, 19, '2022-11-25 15:10:00', 1, NULL, NULL, '2022-11-24 15:10:57', 'DOUFFI#1'),
(26, 49, 49, 25, '2022-11-24 15:12:00', 1, NULL, NULL, '2022-11-24 15:11:16', 'DOUFFI#1'),
(27, 11, 11, 20, '2022-11-24 15:11:00', 1, NULL, NULL, '2022-11-24 15:11:33', 'DOUFFI#1'),
(28, 26, 32, 39, '2022-11-24 15:11:00', 1, '2022-12-22 18:06:23', '#', '2022-11-24 15:12:01', 'DOUFFI#1'),
(29, 60, 90, 41, '2022-11-24 15:12:00', 1, '2022-12-22 19:43:57', 'DOUFFI#1', '2022-11-24 15:12:20', 'DOUFFI#1'),
(30, 7, 13, 40, '2022-11-24 15:15:00', 1, '2022-12-22 16:42:56', '#', '2022-11-24 15:12:43', 'DOUFFI#1'),
(31, 15, 17, 26, '2022-11-24 17:12:00', 1, '2022-12-22 18:06:23', '#', '2022-11-24 15:13:00', 'DOUFFI#1'),
(32, 19, 20, 22, '2022-11-24 17:16:00', 1, '2022-12-20 16:36:15', 'DOUFFI#1', '2022-11-24 15:16:08', 'DOUFFI#1'),
(33, 86, 143, 23, '2022-12-05 11:49:00', 1, '2022-12-22 18:06:23', '#', '2022-11-24 15:20:08', 'DOUFFI#1'),
(34, 16, 16, 37, '2022-11-24 15:20:00', 1, NULL, NULL, '2022-11-24 15:20:24', 'DOUFFI#1'),
(35, 32, 32, 38, '2022-11-24 15:20:00', 1, NULL, NULL, '2022-11-24 15:20:44', 'DOUFFI#1'),
(36, 27, 27, 45, '2022-11-24 15:24:00', 1, NULL, NULL, '2022-11-24 15:24:35', 'DOUFFI#1'),
(37, 18, 18, 42, '2022-11-24 15:24:00', 1, NULL, NULL, '2022-11-24 15:24:50', 'DOUFFI#1'),
(38, 17, 18, 43, '2022-11-24 15:25:00', 1, '2022-12-20 16:36:15', 'DOUFFI#1', '2022-11-24 15:25:07', 'DOUFFI#1'),
(39, 5, 10, 52, '2022-12-20 16:47:00', 1, '2022-12-22 18:06:23', '#', '2022-12-20 16:47:29', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `type_code_promos`
--

CREATE TABLE `type_code_promos` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `update_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_code_promos`
--

INSERT INTO `type_code_promos` (`id`, `name`, `description`, `statut`, `update_at`, `update_by`, `created_at`, `created_by`) VALUES
(1, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:00:58', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(2, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:01:03', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(3, 'douffi', 'juste un testdkdi', 0, '2022-12-26 10:43:31', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(4, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(5, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(6, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(7, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(8, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(9, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(10, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(11, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(12, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:38', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(13, 'douffi', 'juste un testdkdi', 0, '2022-12-25 10:02:49', 'DOUFFI#1', '2022-12-25 09:45:12', 'DOUFFI#1'),
(14, 'CODE ESPECE SUR LA COMMANDE', 'CE TYPE DE CODE PROMO EST REDUIT SUR LE PRIX EN ESPECE ', 1, NULL, NULL, '2022-12-25 10:05:13', 'DOUFFI#1'),
(15, 'CODE POURCENTAGE SUR LA COMMANDE', 'CE TYPE DE CODE PROMO EST REDUIT SUR LE PRIX EN POURCENTAGE ', 1, NULL, NULL, '2022-12-25 10:05:49', 'DOUFFI#1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomentreprise` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `NCC` varchar(255) DEFAULT NULL,
  `DFE` text DEFAULT NULL,
  `particulier` varchar(3) NOT NULL,
  `city` varchar(255) NOT NULL,
  `quartier` text NOT NULL,
  `carrefour` text NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `connected` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `nomentreprise`, `password`, `lastname`, `firstname`, `phone`, `whatsapp`, `address`, `NCC`, `DFE`, `particulier`, `city`, `quartier`, `carrefour`, `statut`, `connected`, `created_at`, `Updated_at`, `updated_by`) VALUES
(1, 'alexandrekdouffi@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'DOUFFI ', ' Kouame alexandre', '(+225) 0767080820', '(+225) 0767080820', 'Abobo Marahoue en face de l\'institut de Formation Sainte Marie Abobo Marahoue', NULL, NULL, 'oui', 'Abidjan', 'Abobo PK 18', 'Marahoue', 0, 0, '2022-11-23 16:08:19', '0000-00-00 00:00:00', NULL),
(2, 'mariamtoure@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Toure', 'Mariam', '(+225) 0555554433', '(+225) 0555554433', 'Treichville Avenue 15 Rue 24 non loin de la mosquée du roi du Maroc', NULL, NULL, 'non', 'Abidjan', 'Treichville Avenue 15', 'Rue 24', 1, 0, '2022-11-24 14:24:58', '2022-12-28 16:48:13', 'DOUFFI#1'),
(3, 'mariamtoure@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'TOURE', ' Mariam', '(+225) 0555554433', '(+225) 0555554433', 'Treichville Avenue 15 Rue 24 non loin de la\r\nmosquée du roi du Maroc', NULL, NULL, 'oui', 'Abidjan', 'Treichville Avenue 15', ' Rue 24 non loin de la', 0, 0, '2022-11-24 14:31:43', '0000-00-00 00:00:00', NULL),
(4, 'andre.debleza@origami-ci.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'DOUFFI ', ' Kouame alexandre', '(+225) 0767080820', '(+225) 0767080820', 'xdcfgvbhnm ', NULL, NULL, 'oui', 'Abidjan', 'ertfgyuhj', 'fghjnm', 0, 0, '2022-11-26 13:43:22', '0000-00-00 00:00:00', NULL),
(7, 'asko@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'ASSOUMOU', 'KOUADIO FRANCK', '(+225) 0566200105', '(+225) 0566200105', 'YOPOUGON SAINT ANDRE non loin de la station située a Saint André', NULL, NULL, 'oui', 'Abidjan', 'YOPOUGON SAINT ANDRE', 'SAINT ANDRE', 0, 0, '2022-12-05 09:31:34', '0000-00-00 00:00:00', NULL),
(8, 'kkgerard@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Koffi', 'kouassi gerard', '(+225) 0566899003', '(+225) 0566899003', 'anyama  non loin de la sodeci', NULL, NULL, 'oui', 'Abidjan', 'ANYAMA SODECI', 'SODECI', 0, 0, '2022-12-05 11:46:56', '0000-00-00 00:00:00', NULL),
(11, 'mahelpinso@gamil.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'MAHEL', 'PINSO', '(+225) 0566200105', '(+225) 0566899003', 'Abobo Pk18 ,en face de l\'institut de formation Sainte Marie Abobo Marahoue', NULL, NULL, 'oui', 'Abidjan', 'ABOBO PK18', 'MARAHOUE', 0, 0, '2022-12-19 18:19:38', '0000-00-00 00:00:00', NULL),
(12, 'asko@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'ASSOUMOU', 'KOUADIO FRANCK', '(+225) 0566200105', '(+225) 0566899003', 'Yopougon Saint André Non loin de la pharmacie Saint Alexandre de la roja', NULL, NULL, 'oui', 'Abidjan', 'YOPOUGON SAINT ANDRE', 'SAINT ANDRE', 0, 0, '2022-12-20 16:36:15', '0000-00-00 00:00:00', NULL),
(14, 'alexandrekdouffi@gmail.com', 'ORIGAMI SARL', '81dc9bdb52d04dc20036dbd8313ed055', 'Kouame Alexandre', 'Douffi', '(+225) 0767080820', '', 'Abobo Marahoue en face de l\'institut de Formation Sainte Marie Abobo Marahoue', '76889 4553', 'SALAIRE EPV MA NOV 22 OK.pdf', 'non', 'Abidjan', 'ABOBO PK18', 'MARAHOUE', 1, 1, '2022-12-22 18:02:05', '2022-12-23 23:34:58', 'DOUFFI#1'),
(15, 'andre.debleza@origami-ci.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'test', 'test', '(225) ', '(+225) 0566200105', 'test test test test test test test test test', NULL, NULL, 'oui', 'Abidjan', 'ABOBO PK18', 'SAINT ANDRE', 1, 0, '2022-12-22 19:43:57', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_message`
--

CREATE TABLE `users_message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_message`
--

INSERT INTO `users_message` (`id`, `nom`, `telephone`, `email`, `message`, `statut`, `created_at`, `updated_by`, `updated_at`) VALUES
(6, 'Douffi Kouame Alexandre', '0767080820', 'alexandrekdouffi@gmail.com', 'Madame/Monsieur, Ma personne Douffi Kouame Alexandre, agissant en tant que DSI représente la société ORIGAMI. C\'est avec le plus grand plaisir que je vous contacte pour vous demander de bien vouloir nous accorder un rendez-vous pour une proposition de partenariat.', 1, '2022-11-28 14:20:07', '', '2022-11-28 14:20:07'),
(7, NULL, NULL, 'test@gmail.com', 'sfjdfjnldfldfkfkpd;kf', 0, '2022-12-22 16:44:22', 'DOUFFI#1', '2022-12-23 11:04:35');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `code_promo`
--
ALTER TABLE `code_promo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment_by_product`
--
ALTER TABLE `comment_by_product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`iduser`);

--
-- Index pour la table `histo_stock`
--
ALTER TABLE `histo_stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images_category`
--
ALTER TABLE `images_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `masse`
--
ALTER TABLE `masse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_code_promos`
--
ALTER TABLE `type_code_promos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_message`
--
ALTER TABLE `users_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `code_promo`
--
ALTER TABLE `code_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `comment_by_product`
--
ALTER TABLE `comment_by_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `histo_stock`
--
ALTER TABLE `histo_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `images_category`
--
ALTER TABLE `images_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `masse`
--
ALTER TABLE `masse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `prix`
--
ALTER TABLE `prix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `type_code_promos`
--
ALTER TABLE `type_code_promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users_message`
--
ALTER TABLE `users_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
