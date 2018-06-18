-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Mer 11 Avril 2012 à 13:43
-- Version du serveur: 5.1.41
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `jaimelageo`
--

-- --------------------------------------------------------

--
-- Structure de la table `indice`
--

DROP TABLE IF EXISTS `indice`;
CREATE TABLE IF NOT EXISTS `indice` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_lieu` int(11) NOT NULL,
  `texte` varchar(200) NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `indice`
--

INSERT INTO `indice` (`Id`, `Id_lieu`, `texte`, `ordre`) VALUES
(5, 2, 'Cette photo a été prise en Rhône-Alpes', 1),
(2, 1, 'Cette photo a été prise en Ile de France', 1),
(3, 1, 'Cette photo a été prise à Paris ', 2),
(4, 1, 'Cette photo a été prise au bord de la Seine', 3),
(6, 2, 'Cette photo a été prise à Lyon', 2);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Id_pays` int(11) NOT NULL,
  `Image` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`Id`, `Nom`, `Latitude`, `Longitude`, `Id_pays`, `Image`) VALUES
(1, 'Tour Eiffel', 48.86, 2.29, 1, 'tour-eiffel.jpg'),
(2, 'Château d''eau', 45.79, 4.8, 1, 'chateaudeau.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `lieu_choisi`
--

DROP TABLE IF EXISTS `lieu_choisi`;
CREATE TABLE IF NOT EXISTS `lieu_choisi` (
  `Id_user` int(11) NOT NULL,
  `Id_lieu` int(11) NOT NULL,
  `Id_niveau` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Temps_seconde` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`Id`, `Libelle`) VALUES
(1, 'Débutant'),
(2, 'Intermédiaire'),
(3, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`Id`, `Libelle`) VALUES
(1, 'France'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Score` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Id_user` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Email` varchar(150) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`Id`, `Login`, `Password`, `Pseudo`, `Age`, `Email`) VALUES
(1, 'Olivier', 'olivier', 'Olivier', 37, 'toto@toto.fr'),
(2, 'toto', 'toto', 'toto', 25, 'toto@toto.fr'),
(3, 'bob', 'bob', 'bob', 24, 'qfsd@qsdf.gt'),
(4, '', '', '', 0, '');
