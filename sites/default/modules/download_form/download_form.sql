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
-- Structure de la table `download_form`
--

CREATE TABLE IF NOT EXISTS `download_form` (
  `sid` int(11) NOT NULL auto_increment,
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `cle` varchar(32) NOT NULL,
  `downloaded` tinyint(4) NOT NULL,
  `user` text NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=312 ;
