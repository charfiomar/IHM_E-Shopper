-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 04 Décembre 2017 à 14:35
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mybestdeal`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `idAnn` int(11) NOT NULL,
  `titreAnn` varchar(100) NOT NULL,
  `prixAnn` float NOT NULL,
  `descriptionAnn` varchar(500) NOT NULL,
  `dateCreAnn` datetime NOT NULL,
  `dateExpAnn` datetime NOT NULL,
  `etatAnn` enum('Neuf','Occasion') NOT NULL,
  `idUsr` int(11) NOT NULL,
  `idCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Details annonce';

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`idAnn`, `titreAnn`, `prixAnn`, `descriptionAnn`, `dateCreAnn`, `dateExpAnn`, `etatAnn`, `idUsr`, `idCat`) VALUES
(1, 'Leatherman Squirt ps4 Bleu Mini Outil', 10.8, 'Le vendeur assume l\'entière responsabilité de cette annonce.', '2017-12-04 12:58:37', '2017-12-04 12:58:37', 'Neuf', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCat` int(11) NOT NULL,
  `nomCat` varchar(20) NOT NULL,
  `desCat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCat`, `nomCat`, `desCat`) VALUES
(1, 'Technology', 'Technology in all its forms'),
(2, 'DIY', 'Do-it-Yourself tools'),
(3, 'LifeStyle', 'LifeStyle tools');

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE `enchere` (
  `idEn` int(11) NOT NULL,
  `sommeEn` float NOT NULL,
  `idUsr` int(11) NOT NULL,
  `idAnn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `idUsr` int(11) NOT NULL,
  `idCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`idUsr`, `idCat`) VALUES
(1, 1),
(5, 1),
(6, 1),
(7, 1),
(5, 2),
(7, 2),
(5, 3),
(6, 3),
(7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `idVille` int(11) NOT NULL,
  `idAnn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL,
  `nomPays` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`idPays`, `nomPays`) VALUES
(1, 'Tunisie'),
(2, 'Algérie'),
(3, 'Maroc'),
(4, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPh` int(11) NOT NULL,
  `nomPh` varchar(250) NOT NULL,
  `extensionPh` varchar(4) NOT NULL,
  `descPh` varchar(250) NOT NULL,
  `idAnn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPh`, `nomPh`, `extensionPh`, `descPh`, `idAnn`) VALUES
(1, 's-l1600', 'jpg', 'Leatherman Squirt ps4 Bleu Mini Outil', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE `recherche` (
  `idRech` int(11) NOT NULL,
  `titreRech` varchar(50) NOT NULL,
  `idCat` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `idVille` int(11) DEFAULT NULL,
  `prixMin` int(11) DEFAULT NULL,
  `prixMax` int(11) DEFAULT NULL,
  `etat` enum('''Neuf'',''Occasion''') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUsr` int(11) NOT NULL,
  `loginUsr` varchar(20) NOT NULL,
  `mdpsUsr` varchar(20) NOT NULL,
  `mailUsr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='La table de l''utilisateur';

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUsr`, `loginUsr`, `mdpsUsr`, `mailUsr`) VALUES
(1, 'omarcharfi', 'Omar180794', 'omar.charfi@iit.ens.tn'),
(2, 'charfiomar85', 'Omar180794', 'omarcharfi85@gmail.com'),
(3, 'HajjejMaha', 'Mitcha52', 'maha.hajjej@iit.ens.tn'),
(4, 'Anonymous12', '147258', 'myMail@yahoo.fr'),
(5, 'oommoo', 'Omar1111', 'oo@ii.aa'),
(6, 'Hamouda', 'katout1', 'hamouda125.fh@gmail.com'),
(7, 'Maha', 'Mitcha52', 'mahahajjej4@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `idVille` int(11) NOT NULL,
  `nomVille` varchar(20) NOT NULL,
  `idPays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`idVille`, `nomVille`, `idPays`) VALUES
(1, 'Tunis', 1),
(2, 'Sfax', 1),
(3, 'Sousse', 1),
(4, 'Monastir', 1),
(5, 'Gabes', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`idAnn`),
  ADD KEY `idUsr` (`idUsr`),
  ADD KEY `idCat` (`idCat`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCat`);

--
-- Index pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`idEn`),
  ADD KEY `idUsr` (`idUsr`),
  ADD KEY `idAnn` (`idAnn`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`idUsr`,`idCat`),
  ADD KEY `idCat` (`idCat`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idVille`,`idAnn`),
  ADD KEY `idAnn` (`idAnn`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPays`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPh`),
  ADD KEY `idAnn` (`idAnn`);

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD PRIMARY KEY (`idRech`),
  ADD KEY `idVille` (`idVille`),
  ADD KEY `idUsr` (`idUsr`),
  ADD KEY `idCat` (`idCat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUsr`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`idVille`),
  ADD KEY `idPays` (`idPays`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `idAnn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `idEn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `idPays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
  MODIFY `idRech` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUsr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `idVille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateur` (`idUsr`),
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`idCat`) REFERENCES `categorie` (`idCat`);

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateur` (`idUsr`),
  ADD CONSTRAINT `enchere_ibfk_2` FOREIGN KEY (`idAnn`) REFERENCES `annonce` (`idAnn`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateur` (`idUsr`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`idCat`) REFERENCES `categorie` (`idCat`);

--
-- Contraintes pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD CONSTRAINT `lieu_ibfk_1` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`),
  ADD CONSTRAINT `lieu_ibfk_2` FOREIGN KEY (`idAnn`) REFERENCES `annonce` (`idAnn`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idAnn`) REFERENCES `annonce` (`idAnn`);

--
-- Contraintes pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD CONSTRAINT `recherche_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `categorie` (`idCat`),
  ADD CONSTRAINT `recherche_ibfk_2` FOREIGN KEY (`idUsr`) REFERENCES `utilisateur` (`idUsr`),
  ADD CONSTRAINT `recherche_ibfk_3` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`idPays`) REFERENCES `pays` (`idPays`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
