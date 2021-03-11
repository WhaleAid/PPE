-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 11 Mars 2021 à 14:20
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb_frais`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('RB', 'Remboursée'),
('VA', 'Validée et mise en paiement');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE `fichefrais` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fichefrais`
--

INSERT INTO `fichefrais` (`idVisiteur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
('8wn', '1', 10, '450.00', '2020-12-10', 'RB'),
('8wn', '2', 15, '350.00', '2020-02-12', 'VA'),
('jsn', '2', 5, '350.00', '2021-03-23', 'CL');

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

CREATE TABLE `fraisforfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', '110.00'),
('KM', 'Frais Kilométrique', '0.62'),
('NUI', 'Nuitée Hôtel', '80.00'),
('REP', 'Repas Restaurant', '25.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE `lignefraisforfait` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`) VALUES
('8wn', '1', 'ETP', 5),
('8wn', '1', 'KM', 4),
('8wn', '1', 'NUI', 2),
('8wn', '1', 'REP', 3),
('8wn', '2', 'ETP', 3),
('8wn', '2', 'KM', 4),
('8wn', '2', 'NUI', 6),
('8wn', '2', 'REP', 8);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

CREATE TABLE `lignefraishorsforfait` (
  `id` int(11) NOT NULL,
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignefraishorsforfait`
--

INSERT INTO `lignefraishorsforfait` (`id`, `idVisiteur`, `mois`, `libelle`, `date`, `montant`) VALUES
(6, '8wn', '1', 'cadeau', '2020-01-06', '120.00'),
(7, '8wn', '2', 'telephone', '2020-02-12', '30.00');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `email` text NOT NULL,
  `mdp` char(200) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `Portrait` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `email`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `Portrait`) VALUES
('0ko', 'aze', 'aze', 'aze', 'aze@g.fr', '$2y$10$bjxfLu1aKrHngsju/XQZN.W02XSJv6aCu.3bcxVxmQv2YmlV96Bdm', 'paname', '75000', 'paname', '2020-11-12', ''),
('175', 'blabla', 'blablal', 'bla145', 'testbla@gmail.com', '$2y$10$MfVPqKBI6Zgcv.hzq6LsiuaeLqkerr6LaqqAMZh71jr1NEPrHxwdi', '148 rue avignon', '45879', 'new york', '2020-11-19', ''),
('2uz', 'blabla', 'blablal', 'bla145', 'testbla@gmail.com', '$2y$10$JFyJ7K/CiWdFC3xDsZjpBOblIwAiIkETcymI/FGxd5Ti8eY.RClb6', '148 rue avignon', '45879', 'new york', '2020-11-19', ''),
('3pc', 'blabla', 'blablal', 'bla145', 'testbla@gmail.com', '$2y$10$j/ZdVh17lpCoJGifOVeg5e.L7j3eg3hob.K9EvQ54k29sfZ97hgpa', '148 rue avignon', '45879', 'new york', '2020-11-19', ''),
('8wn', 'John', 'Doe', 'admin', 'admin@mail.com', '$2y$10$7UHVy6vDWuO1lCTiEMMQ3exRLVqt7DnEEx.pmxGEtFBzhf56DXcYW', '14 rue bla', '75200', 'paris', '2020-12-03', ''),
('a131', 'Villechalane', 'Louis', 'lvillachane', '', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21', ''),
('a17', 'Andre', 'David', 'dandre', '', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23', ''),
('a55', 'Bedos', 'Christian', 'cbedos', '', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12', ''),
('a93', 'Tusseau', 'Louis', 'ltusseau', '', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01', ''),
('b13', 'Bentot', 'Pascal', 'pbentot', '', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09', ''),
('b16', 'Bioret', 'Luc', 'lbioret', '', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11', ''),
('b19', 'Bunisset', 'Francis', 'fbunisset', '', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21', ''),
('b25', 'Bunisset', 'Denise', 'dbunisset', '', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05', ''),
('b28', 'Cacheux', 'Bernard', 'bcacheux', '', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2009-11-12', ''),
('b34', 'Cadic', 'Eric', 'ecadic', '', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23', ''),
('b4', 'Charoze', 'Catherine', 'ccharoze', '', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12', ''),
('b50', 'Clepkens', 'Christophe', 'cclepkens', '', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2003-08-11', ''),
('b59', 'Cottin', 'Vincenne', 'vcottin', '', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18', ''),
('c14', 'Daburon', 'François', 'fdaburon', '', '7oqpv', '13 rue de Chanzy', '94000', 'Créteil', '2002-02-11', ''),
('c3', 'De', 'Philippe', 'pde', '', 'gk9kx', '13 rue Barthes', '94000', 'Créteil', '2010-12-14', ''),
('c54', 'Debelle', 'Michel', 'mdebelle', '', 'od5rt', '181 avenue Barbusse', '93210', 'Rosny', '2006-11-23', ''),
('d13', 'Debelle', 'Jeanne', 'jdebelle', '', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11', ''),
('d51', 'Debroise', 'Michel', 'mdebroise', '', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17', ''),
('djm', 'bla', 'blabl', 'blabla123', 'hello@test.com', '$2y$10$Gj0ZTPVY0ilF03MUX6fTG.4QQugmnn2WseU8tslNEEaRJj1D7fm1K', '148 rue avignon', '75100', 'paris', '2020-11-19', ''),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', '', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2005-11-12', ''),
('e24', 'Desnost', 'Pierre', 'pdesnost', '', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05', ''),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01', ''),
('e49', 'Duncombe', 'Claude', 'cduncombe', '', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10', ''),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', '', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '1995-09-01', ''),
('e52', 'Eynde', 'Valérie', 'veynde', '', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '1999-11-01', ''),
('f21', 'Finck', 'Jacques', 'jfinck', '', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10', ''),
('f39', 'Frémont', 'Fernande', 'ffremont', '', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '1998-10-01', ''),
('g2j', 'test', 'test1', 'test123', 'test@gmail.com', '$2y$10$.CRwn31eiOR2DLBil1Vt0udhU2ldLnxUIjzZ/A6oOWAYfYhGFaj/W', '6584q1dqzfqz', '84516', 'izdagbjkqz', '2020-11-12', ''),
('gvs', '', '', '', '', '', '', '', '', '2020-11-10', ''),
('jsn', 'user_name', 'user_lastname', 'user_identifiant', 'user@mail.com', '$2y$10$N/KF09dCH075PcDqYYYsheLMuLkXsRF8lFoHPo/ameQqgnjBmQ.oi', '14 rue adresse', '75200', 'paris', '2021-03-11', ''),
('pxq', 'test', 'test1', 'test1', 'test@gmail.com', '$2y$10$Y9jSb1qnThnKatp5rCqvfel4i.u/wJ0GoNP.up/peTanUlmFz3oCu', '6584q1dqzfqz', '84516', 'izdagbjkqz', '2020-11-12', ''),
('tno', 'user_name', 'user_lastname', 'user_identifiant', 'user@mail.com', '$2y$10$HrgioyBbqBRINUbcf1iIC.PTjfZ9mIBorJAaeCerEQxyE2zatsPPG', '14 rue adresse', '75200', 'paris', '2021-03-11', ''),
('uxp', '', '', '', '', '', '', '', '', '2020-11-10', ''),
('yc6', 'admin', 'adminlast', 'admin123', 'admin123@gmail.com', '$2y$10$8YDeTxTO8zoT6Rti8rrWFeQ9Fr0nMgorxj.tdSStL1CopDV0ut8Wa', '123 test adresse', '99999', 'test', '2020-11-26', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD PRIMARY KEY (`idVisiteur`,`mois`),
  ADD KEY `idEtat` (`idEtat`);

--
-- Index pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  ADD KEY `idFraisForfait` (`idFraisForfait`);

--
-- Index pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVisiteur` (`idVisiteur`,`mois`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`);

--
-- Contraintes pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD CONSTRAINT `lignefraisforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `fichefrais` (`idVisiteur`, `mois`),
  ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `fraisforfait` (`id`);

--
-- Contraintes pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `fichefrais` (`idVisiteur`, `mois`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
