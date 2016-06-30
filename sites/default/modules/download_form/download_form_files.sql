-- phpMyAdmin SQL Dump
-- version 3.3.5.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 20 Février 2012 à 14:15
-- Version du serveur: 5.0.44
-- Version de PHP: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `sicmarki`
--

-- --------------------------------------------------------

--
-- Structure de la table `download_form_files`
--

CREATE TABLE IF NOT EXISTS `download_form_files` (
  `fid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
