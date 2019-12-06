-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 déc. 2019 à 14:51
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `diamond`
--

-- --------------------------------------------------------

--
-- Structure de la table `a`
--

DROP TABLE IF EXISTS `a`;
CREATE TABLE IF NOT EXISTS `a` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `iduser` int(100) NOT NULL,
  `nom` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` int(20) DEFAULT NULL,
  `idproduit` int(11) NOT NULL,
  `libelle` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `addresse` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codepostal` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datelivraison` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateachat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `a`
--

INSERT INTO `a` (`id`, `iduser`, `nom`, `prenom`, `tel`, `idproduit`, `libelle`, `prix`, `addresse`, `codepostal`, `ville`, `datelivraison`, `etat`, `dateachat`) VALUES
(65, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 20, 'bridal', 480, '44B immeuble jasmins', '2037', 'centre urbain nord', '26/01/19', 'active', '2019-01-23 14:38:52'),
(60, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 28, 'Fancy Tassel Diamant', 34900, '44B immeuble jasmins', '2037', 'centre urbain nord', '12/01/19', 'valide', '2019-01-09 07:41:37'),
(62, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 31, 'Bijoux luxe Paris', 3450, '44B immeuble jasmins', '2037', 'centre urbain nord', '12/01/19', 'valide', '2019-01-09 13:02:16'),
(58, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 26, 'Floralla ', 880, '44B immeuble jasmins', '2037', 'centre urbain nord', '11/01/19', 'valide', '2019-01-08 22:18:12'),
(61, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 20, 'bridal', 480, '44B immeuble jasmins', '2037', 'centre urbain nord', '12/01/19', 'valide', '2019-01-09 11:49:46'),
(56, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 21, 'Argor Valenciennes 2 carats', 1090, '44B immeuble jasmins', '2037', 'centre urbain nord', '11/01/19', 'valide', '2019-01-08 22:18:08'),
(63, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 21, 'Argor Valenciennes 2 carats', 1090, '44B immeuble jasmins', '2037', 'centre urbain nord', '12/01/19', 'valide', '2019-01-09 13:02:19'),
(64, 4, 'Mohamed Aziz', 'belkhodja', 23224821, 22, 'rose piaget', 590, '44B immeuble jasmins', '2037', 'centre urbain nord', '12/01/19', 'valide', '2019-01-09 13:02:22'),
(69, 11, 'Issam', 'Souissi', 23188936, 21, 'Argor Valenciennes 2 carats', 1090, '8 rue commandant bjaoui ', '2000', 'Bardo', '28/01/19', 'valide', '2019-01-25 10:40:35'),
(68, 11, 'Issam', 'Souissi', 23188936, 31, 'Bijoux luxe Paris', 3450, '8 rue commandant bjaoui ', '2000', 'Bardo', '28/01/19', 'valide', '2019-01-25 10:40:33'),
(71, 11, 'Issam', 'Souissi', 23188936, 31, 'Bijoux luxe Paris', 3450, '8 rue commandant bjaoui ', '2000', 'Bardo', '28/01/19', 'valide', '2019-01-25 11:06:25'),
(72, 11, 'Issam', 'Souissi', 23188936, 27, 'Traditionnel indien', 1900, '8 rue commandant bjaoui ', '2000', 'Bardo', '28/01/19', 'valide', '2019-01-25 12:18:11'),
(73, 11, 'Issam', 'Souissi', 23188936, 30, 'AUDEMARS PUGUET', 9999, '8 rue commandant bjaoui ', '2000', 'Bardo', '28/01/19', 'valide', '2019-01-25 12:18:14');

-- --------------------------------------------------------

--
-- Structure de la table `c`
--

DROP TABLE IF EXISTS `c`;
CREATE TABLE IF NOT EXISTS `c` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idprod` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `dateachat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `c`
--

INSERT INTO `c` (`id`, `idprod`, `iduser`, `dateachat`, `etat`) VALUES
(22, 20, 4, '2019-01-04 11:04:32', 'valide'),
(2, 21, 4, '2018-12-25 22:16:22', 'valide'),
(15, 21, 4, '2019-01-04 09:52:08', 'valide'),
(10, 27, 4, '2018-12-26 00:24:18', 'valide'),
(6, 22, 4, '2018-12-25 22:16:51', 'valide'),
(16, 22, 4, '2019-01-04 09:52:10', 'valide'),
(8, 22, 4, '2018-12-25 22:18:58', 'valide'),
(14, 20, 4, '2019-01-04 09:52:05', 'valide'),
(21, 22, 4, '2019-01-04 11:04:30', 'valide'),
(20, 25, 4, '2019-01-04 11:04:28', 'valide'),
(23, 27, 4, '2019-01-04 11:04:35', 'valide'),
(24, 27, 4, '2019-01-04 11:04:37', 'valide'),
(25, 30, 4, '2019-01-05 11:16:14', 'valide'),
(26, 25, 4, '2019-01-05 11:16:18', 'valide'),
(27, 21, 4, '2019-01-05 11:56:10', 'valide'),
(28, 29, 4, '2019-01-05 11:56:13', 'valide');

-- --------------------------------------------------------

--
-- Structure de la table `m`
--

DROP TABLE IF EXISTS `m`;
CREATE TABLE IF NOT EXISTS `m` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nom` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `contenu` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `m`
--

INSERT INTO `m` (`id`, `nom`, `prenom`, `email`, `date`, `contenu`) VALUES
(1, 'test', 'de la base', 'ee@ee.e', '2019-01-09 08:54:26', 'test de la base de données '),
(2, NULL, NULL, NULL, '2019-01-09 11:22:38', 'hahahhahahahh'),
(3, NULL, NULL, NULL, '2019-01-09 11:22:38', 'hahahhahahahh'),
(4, 'Mohamed Aziz', 'belkhodja', 'aa@aa.aa', '2019-01-09 11:38:07', 'test final reclamation'),
(5, 'Mohamed Aziz', 'belkhodja', 'aa@aa.aa', '2019-01-09 11:38:07', 'test final reclamation'),
(6, 'test', '--', 'final@final', '2019-01-09 11:45:08', 'azertyuiop');

-- --------------------------------------------------------

--
-- Structure de la table `p`
--

DROP TABLE IF EXISTS `p`;
CREATE TABLE IF NOT EXISTS `p` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `matiere` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `qte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `p`
--

INSERT INTO `p` (`id`, `libelle`, `matiere`, `categorie`, `prix`, `photo`, `qte`) VALUES
(31, 'Bijoux luxe Paris', 'or', 'bague', 3450, 'Bijoux luxe Paris.jpg', 89),
(20, 'bridal', 'argent', 'bracelet', 480, 'bridal_jewelry_CB10.jpg', 13),
(21, 'Argor Valenciennes 2 carats', 'plaque', 'bague', 1090, 'bijou-exception-cover-1352x900.jpg', 3),
(22, 'rose piaget', 'argent', 'bague', 590, 'bague-rose-piaget.jpg', 0),
(23, 'SELENA pendentifs en diamant 5 carats', 'plaque', 'colier', 45000, 'Collier-pendentif-plaque-or-blanc-zirconium-9mm-2-75-carat-Suisse-grand-modele-elegant-raffine-bijou-luxe-fashion-chic-soiree-cadeau-engagement-collier6-450x450.jpg', 3),
(25, 'Saphire de mariage', 'or', 'bague', 700, 'mariage-bague-saphir-bijoux-de-luxe-18k-jaune-plaq.jpg', 5),
(26, 'Floralla ', 'or', 'colier', 880, 'prom-jewelry-ideas-gold-layered-necklace-design.jpg', 12),
(27, 'Traditionnel indien', 'or', 'parrure', 1900, 'contemporary-necklace-designs-layout-design-minimalist-9-awesome-50-gram-gold-india-styles-at-life-traditional-in-with-price-weight.jpg', 1),
(28, 'Fancy Tassel Diamant', 'or', 'parrure', 34900, 'Fancy-Tassel-Diamond-Crystal-Necklace-Set.jpg', 1),
(29, 'Joyas De Oro', 'or', 'colier', 2000, '8dc0a195e14f8075af745b125010d6be.jpg', 1),
(30, 'AUDEMARS PUGUET', 'or', 'montre', 9999, '210.jpg', 90);

-- --------------------------------------------------------

--
-- Structure de la table `u`
--

DROP TABLE IF EXISTS `u`;
CREATE TABLE IF NOT EXISTS `u` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `dateinscription` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `couleur` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fonction` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `buycount` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastconnection` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connecte` int(2) DEFAULT NULL,
  `addresse` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codepostal` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `u`
--

INSERT INTO `u` (`id`, `email`, `nom`, `prenom`, `sexe`, `motdepasse`, `dateinscription`, `couleur`, `fonction`, `buycount`, `lastconnection`, `tel`, `connecte`, `addresse`, `codepostal`, `ville`) VALUES
(4, 'aa@aa.aa', 'Mohamed Aziz', 'belkhodja', 'homme', '\n» ©%®hŽF{ö/W!w', NULL, NULL, 'administrateur', NULL, '2019-01-25 12:18:45pm', '23224821', 1, '44B immeuble jasmins', '2037', 'centre urbain nord'),
(10, 'is@sesame.com.tn', 'souissi', 'issam', 'homme', '\n» ©%®hŽF{ö/W!w', '2019-01-09 12:55:22pm', '#0000ff', 'magasinier', '0', '2019-01-09 12:57:33pm', '54678900', 0, '22 RUE HABIB THAMER', '2037', 'ARIANA'),
(11, 'issam.souissi@sesame.com.tn', 'Issam', 'Souissi', 'homme', 'eµÐN¢üß¶QÈPnŒÐõ', '2019-01-25 10:37:33am', '#0000a0', 'client', '0', '2019-01-25 12:18:03pm', '23188936', 1, '8 rue commandant bjaoui ', '2000', 'Bardo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
