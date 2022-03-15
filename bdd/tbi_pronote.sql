-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 mars 2022 à 14:20
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
-- Base de données :  `tbi_pronote`
--

-- --------------------------------------------------------

--
-- Structure de la table `bloc_heure`
--

DROP TABLE IF EXISTS `bloc_heure`;
CREATE TABLE IF NOT EXISTS `bloc_heure` (
  `id_bloc_heure` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(50) NOT NULL,
  `heure_debut` varchar(11) NOT NULL,
  `heure_fin` varchar(11) NOT NULL,
  `ref_professeur` int(11) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  `ref_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_bloc_heure`),
  KEY `fk_bloc_heure_classe` (`ref_classe`),
  KEY `fk_bloc_heure_professeur` (`ref_professeur`),
  KEY `fk_bloc_heure_matiere` (`ref_matiere`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `specialite` varchar(50) NOT NULL,
  `diplome` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_portable` int(11) NOT NULL,
  PRIMARY KEY (`id_professeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `id_devoir` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date_debut` varchar(11) NOT NULL,
  `date_fin` varchar(11) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  `ref_professeur` int(11) NOT NULL,
  PRIMARY KEY (`id_devoir`),
  KEY `fk_devoir_classe` (`ref_classe`),
  KEY `fk_devoir_professeur` (`ref_professeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `direction`
--

DROP TABLE IF EXISTS `direction`;
CREATE TABLE IF NOT EXISTS `direction` (
  `id_direction` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_portable` int(11) NOT NULL,
  PRIMARY KEY (`id_direction`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `tel_etudiant` int(11) NOT NULL,
  `tel_resp_legal` int(11) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  KEY `fk_etudiant_classe` (`ref_classe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `nb_place_reservation` int(11) NOT NULL,
  `moyen_paiement` varchar(50) NOT NULL,
  `date_reservation` varchar(11) NOT NULL,
  `ref_client` int(11) NOT NULL,
  `ref_salle` int(11) NOT NULL,
  `ref_tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
