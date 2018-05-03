-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 mai 2018 à 14:58
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `excepert`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `file_album` longblob NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_album` text NOT NULL,
  `date_file` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `structure_exp` text NOT NULL,
  `description_ext` text NOT NULL,
  `date_exp` int(11) NOT NULL,
  `type_exp` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE IF NOT EXISTS `friend` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `notif_friend` text NOT NULL,
  PRIMARY KEY (`id_user1`,`id_user2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joboffer`
--

DROP TABLE IF EXISTS `joboffer`;
CREATE TABLE IF NOT EXISTS `joboffer` (
  `id_emploi` int(11) NOT NULL,
  `entreprise_job` text NOT NULL,
  `type_job` text NOT NULL,
  `date_embauche` int(11) NOT NULL,
  `date_publication` int(11) NOT NULL,
  `description_job` text NOT NULL,
  `contact_job` text NOT NULL,
  PRIMARY KEY (`id_emploi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `date_message` int(11) NOT NULL,
  `content_message` text NOT NULL,
  PRIMARY KEY (`id_user1`,`id_user2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_user` int(11) NOT NULL,
  `date_post` int(11) NOT NULL,
  `content_post` text NOT NULL,
  `mood_post` text NOT NULL,
  `file_post` longblob NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `pseudo_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `tel_user` int(11) NOT NULL,
  `age_user` int(11) NOT NULL,
  `photo_user` int(11) NOT NULL,
  `sexe_user` varchar(255) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `current_status_user` text NOT NULL,
  `bio_user` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `prenom_user`, `pseudo_user`, `password_user`, `tel_user`, `age_user`, `photo_user`, `sexe_user`, `mail_user`, `current_status_user`, `bio_user`) VALUES
(1, 'chollet', 'nico', 'nico', '12345', 1, 1, 1, 'male', 'rahan@hotmail.fr', 'I am in', 'voila ma page');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
