
-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Juin 2018 à 11:33
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restoappli`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idA` int(10) NOT NULL,
  `nomA` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `categ` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idA`, `nomA`, `mdp`, `categ`) VALUES
(2, 'adBocal', 'adBocal', 'AdminReserv'),
(3, 'adAjMe', 'adAjMe', 'AdminMenu');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idCli` int(10) NOT NULL,
  `NomPrenom` varchar(50) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `Tel` varchar(14) NOT NULL,
  `fidelite` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idCli`, `NomPrenom`, `mail`, `Tel`, `fidelite`) VALUES
(12, 'Adams', 'wendeline.swart.lnd@gmail.com', '0570434483', 0),
(13, 'Becker', 'in.hendrerit.consectetuer@infelis.co.uk', '0443957667', 1),
(11, 'Morgan', 'Cirill.ferrier@gmail.com', '0443957667', 0),
(9, 'Crampon', '', '0666497676', 2),
(10, 'Mme Boyer', '', '0466650396', 1);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `idM` int(10) NOT NULL,
  `dateM` date NOT NULL,
  `MidiSoir` tinyint(1) DEFAULT NULL,
  `nbMaxClient` int(5) NOT NULL,
  `nbReserv` int(11) NOT NULL DEFAULT '0',
  `Titre` varchar(50) DEFAULT NULL,
  `libelleE` varchar(100) DEFAULT NULL,
  `libelleP` varchar(100) DEFAULT NULL,
  `libelleD` varchar(100) DEFAULT NULL,
  `Fromage` tinyint(1) DEFAULT NULL,
  `autres` varchar(50) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '1',
  `Com` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`idM`, `dateM`, `MidiSoir`, `nbMaxClient`, `nbReserv`, `Titre`, `libelleE`, `libelleP`, `libelleD`, `Fromage`, `autres`, `etat`, `Com`) VALUES
(17, '2018-06-20', 1, 20, 6, '', 'Velouté de potiron aux châtaignes\r<br/>Crème fouettée', 'Rôti de porc sauce forestière\r<br/>Gratin bayeldi', 'Nems chocolat et framboises', 1, '', 1, ' acheter 3 baguettes et 6 flûtes'),
(15, '2018-06-22', 1, 20, 9, '', 'Tartin de pommes et boudin noir', 'Côte de porc Vallée d\'Auge\r<br/>Pommes arlie', 'Trio gourmand', 1, '', 1, NULL),
(16, '2018-06-23', 1, 30, 0, '', 'Tarte fine aux sardines ', ' Magret de canard à l\'orange\r<br/><br/>Flan de courgettes ', ' Chocolat Liégeois ', 1, '', 1, ''),
(18, '2018-06-19', 0, 45, 0, NULL, 'entree', 'libelle', 'dessert', 0, NULL, 1, NULL),
(19, '2018-06-21', 0, 30, 0, NULL, 'entree de courgette', 'plat de courgette', 'dessert de courgette', 0, NULL, 0, NULL),
(20, '2018-06-19', 1, 35, 0, NULL, 'Entre du midi', 'plat de midi', 'dessert du midi', 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `numR` int(10) NOT NULL,
  `nbPerso` int(10) NOT NULL,
  `idCli` int(20) NOT NULL,
  `idM` int(10) NOT NULL,
  `etatReserv` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`numR`, `nbPerso`, `idCli`, `idM`, `etatReserv`) VALUES
(12, 3, 9, 17, 'Confirmé'),
(13, 6, 12, 17, 'Annulé'),
(14, 4, 13, 17, 'Confirmé'),
(10, 4, 10, 15, 'Confirmé'),
(9, 5, 9, 15, 'Annulé');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idA`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idCli`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idM`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`numR`),
  ADD KEY `reser_frK1` (`idCli`),
  ADD KEY `reser_frK2` (`idM`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idCli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `idM` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> .r74
