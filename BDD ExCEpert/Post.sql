-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: sql-users.ece.fr:3305
-- Généré le : Jeu 03 Mai 2018 à 13:38
-- Version du serveur: 5.0.13
-- Version de PHP: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `md151895`
--

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE IF NOT EXISTS `Post` (
  `id_user` int(11) NOT NULL,
  `date_post` int(11) NOT NULL,
  `content_post` text NOT NULL,
  `mood_post` text NOT NULL,
  `file_post` longblob NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Post`
--

