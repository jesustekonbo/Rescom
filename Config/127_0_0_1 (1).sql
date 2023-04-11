-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mars 2023 à 12:12
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_reservation`
--
CREATE DATABASE IF NOT EXISTS `db_reservation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_reservation`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(254) DEFAULT NULL,
  `TELEPHONE` varchar(254) DEFAULT NULL,
  `EMAIL` varchar(254) DEFAULT NULL,
  `PASSWORD` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID`, `NOM`, `TELEPHONE`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Harold FOTSEU ', '697438841', 'hrldbrian@yahoo.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `localite`
--

CREATE TABLE `localite` (
  `IDLOCALITE` int(11) NOT NULL,
  `NOM_LOCALITE` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `IDPAIEMENT` int(11) NOT NULL,
  `MONTANT` decimal(8,0) DEFAULT NULL,
  `MODE_DE_PAIEMENT` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire_salle`
--

CREATE TABLE `proprietaire_salle` (
  `IDPROPRIETAIRE` int(11) NOT NULL,
  `NOM` varchar(254) DEFAULT NULL,
  `EMAIL` varchar(254) DEFAULT NULL,
  `TELEPHONE` varchar(254) DEFAULT NULL,
  `ADRESSE` varchar(254) NOT NULL,
  `AVATAR` varchar(254) NOT NULL,
  `PASSWORD` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proprietaire_salle`
--

INSERT INTO `proprietaire_salle` (`IDPROPRIETAIRE`, `NOM`, `EMAIL`, `TELEPHONE`, `ADRESSE`, `AVATAR`, `PASSWORD`) VALUES
(6, 'Harold FOTSEU ', 'hrldbrian@gmail.com', '697438841', 'Non definie', 'avatar.jpg', NULL),
(7, 'jesus wilfried', 'jesus@gmail.com', '123456789', 'Non definie', 'avatar.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `IDRESERVATION` int(11) NOT NULL,
  `IDPAIEMENT` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `IDSALLE` int(11) NOT NULL,
  `DATE_DE_DEBUT` datetime DEFAULT NULL,
  `DATE_DE_FIN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `IDSALLE` int(11) NOT NULL,
  `IDTYPE_DE_SALLE` int(11) NOT NULL,
  `IDLOCALITE` int(11) NOT NULL,
  `IDPROPRIETAIRE` int(11) NOT NULL,
  `SUPERFICIE` int(11) NOT NULL,
  `NBRE_PLACE` int(11) NOT NULL,
  `NBRE_BATH` int(11) DEFAULT NULL,
  `NBRE_BED` int(11) DEFAULT NULL,
  `PARKING` tinyint(1) DEFAULT NULL,
  `PRIX` decimal(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_de_salle`
--

CREATE TABLE `type_de_salle` (
  `IDTYPE_DE_SALLE` int(11) NOT NULL,
  `NOM_TYPE_BIEN` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_USER` int(2) NOT NULL,
  `LOGIN` char(32) DEFAULT NULL,
  `PASSWORD` char(32) DEFAULT NULL,
  `ROLE` char(32) DEFAULT NULL,
  `ETAT` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_USER`, `LOGIN`, `PASSWORD`, `ROLE`, `ETAT`) VALUES
(1, 'hrldbrian@yahoo.com', '123456', 'client', 1),
(2, 'hrldbrian@gmail.com', '123456', 'proprietaire', 1),
(3, 'jesus@gmail.com', '123456', 'proprietaire', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `localite`
--
ALTER TABLE `localite`
  ADD PRIMARY KEY (`IDLOCALITE`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`IDPAIEMENT`);

--
-- Index pour la table `proprietaire_salle`
--
ALTER TABLE `proprietaire_salle`
  ADD PRIMARY KEY (`IDPROPRIETAIRE`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`IDRESERVATION`),
  ADD KEY `FK_approuver` (`IDPAIEMENT`),
  ADD KEY `FK_concerner` (`IDSALLE`),
  ADD KEY `FK_faire` (`ID`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`IDSALLE`),
  ADD KEY `FK_correspondre` (`IDTYPE_DE_SALLE`),
  ADD KEY `FK_localiser` (`IDLOCALITE`),
  ADD KEY `FK_posseder` (`IDPROPRIETAIRE`);

--
-- Index pour la table `type_de_salle`
--
ALTER TABLE `type_de_salle`
  ADD PRIMARY KEY (`IDTYPE_DE_SALLE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `localite`
--
ALTER TABLE `localite`
  MODIFY `IDLOCALITE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `IDPAIEMENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proprietaire_salle`
--
ALTER TABLE `proprietaire_salle`
  MODIFY `IDPROPRIETAIRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `IDRESERVATION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `IDSALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_de_salle`
--
ALTER TABLE `type_de_salle`
  MODIFY `IDTYPE_DE_SALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_USER` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_approuver` FOREIGN KEY (`IDPAIEMENT`) REFERENCES `paiement` (`IDPAIEMENT`),
  ADD CONSTRAINT `FK_concerner` FOREIGN KEY (`IDSALLE`) REFERENCES `salle` (`IDSALLE`),
  ADD CONSTRAINT `FK_faire` FOREIGN KEY (`ID`) REFERENCES `client` (`ID`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `FK_correspondre` FOREIGN KEY (`IDTYPE_DE_SALLE`) REFERENCES `type_de_salle` (`IDTYPE_DE_SALLE`),
  ADD CONSTRAINT `FK_localiser` FOREIGN KEY (`IDLOCALITE`) REFERENCES `localite` (`IDLOCALITE`),
  ADD CONSTRAINT `FK_posseder` FOREIGN KEY (`IDPROPRIETAIRE`) REFERENCES `proprietaire_salle` (`IDPROPRIETAIRE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
