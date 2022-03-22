-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 mars 2022 à 13:40
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
-- Base de données :  `ktntbi_schoolnow`
--

--
-- Déchargement des données de la table `bloc_heure`
--

INSERT INTO `bloc_heure` (`id_bloc_heure`, `jour`, `heure_debut`, `heure_fin`, `ref_professeur`, `ref_classe`, `ref_matiere`) VALUES
(1, 'Lundi', 9.5, 10, 1, 1, 1),
(2, 'Mardi', 13, 14, 1, 1, 1),
(3, 'Mercredi', 14, 16, 1, 1, 1),
(4, 'Jeudi', 9, 9.5, 1, 1, 1),
(5, 'Vendredi', 10, 12, 1, 1, 1);

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `libelle`, `description`) VALUES
(1, 'Mathématique', 'On calcule'),
(2, 'CEJM', 'Culture économique juridique et management'),
(3, 'Français', 'Projet Voltaire'),
(4, 'Informatique', 'Ca code');

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `nom`, `prenom`, `mot_de_passe`, `email`, `tel_portable`) VALUES
(1, 'Raoult', 'Didier', 'Chloroquine', 'dr@gmail.com', NULL),
(2, 'Dubois', 'Ivern', 'Marguerite', 'id@gmail.com', NULL),
(3, 'Phine', 'Sera', 'egirl', 'sp@gmail.com', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
