-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mars 2021 à 16:16
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `getride`
--

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `idMembre` int(11) NOT NULL,
  `typeVoiture` varchar(50) NOT NULL,
  `numeroVoiture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`idMembre`, `typeVoiture`, `numeroVoiture`) VALUES
(0, 'voiture', 'AA-229-AA');

-- --------------------------------------------------------

--
-- Structure de la table `copassager`
--

CREATE TABLE `copassager` (
  `idMembre` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `copassager`
--

INSERT INTO `copassager` (`idMembre`, `idOffre`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `idOffre` int(11) NOT NULL,
  `idEtape` int(11) NOT NULL,
  `idVille` int(11) NOT NULL,
  `horaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`idOffre`, `idEtape`, `idVille`, `horaire`) VALUES
(1, 1, 5, '2021-02-08 14:01:37');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `nom`, `idAdmin`, `commentaire`) VALUES
(0, 'no name', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `groupemembre`
--

CREATE TABLE `groupemembre` (
  `idGroupe` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupemembre`
--

INSERT INTO `groupemembre` (`idGroupe`, `idUtilisateur`) VALUES
(0, 1),
(0, 0),
(0, 0),
(0, 10),
(0, 10),
(0, 1),
(0, 1),
(0, 2),
(0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `historiquerecherche`
--

CREATE TABLE `historiquerecherche` (
  `idMembre` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  `dateRecherche` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `historiquerecherche`
--

INSERT INTO `historiquerecherche` (`idMembre`, `idOffre`, `dateRecherche`) VALUES
(0, 0, '2020-03-09');

-- --------------------------------------------------------

--
-- Structure de la table `historiquetrajet`
--

CREATE TABLE `historiquetrajet` (
  `idMembre` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  `dateTrajet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `historiquetrajet`
--

INSERT INTO `historiquetrajet` (`idMembre`, `idOffre`, `dateTrajet`) VALUES
(0, 0, '2020-05-04'),
(1, 0, '2020-05-04');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `motDePasse` varchar(32) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `naissance` date DEFAULT NULL,
  `telephone` varchar(10) NOT NULL,
  `genre` varchar(1) NOT NULL,
  `pathPhoto` varchar(50) DEFAULT NULL,
  `estConducteur` varchar(3) NOT NULL,
  `idUtilisateurFavo` int(11) DEFAULT NULL,
  `idHistoriqueTrajet` int(11) DEFAULT NULL,
  `idHistoriqueRecherche` int(11) DEFAULT NULL,
  `idNotation` int(11) DEFAULT NULL,
  `noteMoyenne` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `nom`, `prenom`, `motDePasse`, `mail`, `naissance`, `telephone`, `genre`, `pathPhoto`, `estConducteur`, `idUtilisateurFavo`, `idHistoriqueTrajet`, `idHistoriqueRecherche`, `idNotation`, `noteMoyenne`) VALUES
(1, 'y(ry(er(y', 'yyereyrye', '$2y$10$pvmVMORGRRuWNILpWQkQjepau', 'nat.birtel@gmail.com', '2021-03-10', '6868578678', 'm', '', 'Oui', NULL, NULL, NULL, NULL, NULL),
(2, 'Birtel', 'Yannfezfez', '$2y$10$oC6Hl4FP1548y/T2L1XGzOKs/', 'htrrthfefezhtr@rgrrg', '2021-03-20', '4898490948', 'm', '1494-full.jpg', 'Oui', NULL, NULL, NULL, NULL, NULL),
(3, 'rffrefrefre', 'frefrefrefre', '$2y$10$3pJ1A6eTvAA4kAv4iMfT9uf6z', 'rfefrefrfr@gmail.com', '2021-03-05', '5644654564', 'm', '', 'Oui', NULL, NULL, NULL, NULL, NULL),
(4, 'Birtel', 'Yann', '$2y$10$aPx65xLxYfZlXatAe37gCu4UO', 'rfefrefefezfefrfr@gmail.com', '2021-03-05', '5644654564', 'm', '', 'Oui', NULL, NULL, NULL, NULL, NULL),
(5, 'Birtel', 'test', '$2y$10$EikBM6MC6K1SleJOIFWGpuvPu', 'rfefezfdezdezzdeezeffzefrefrfr@gmail.com', '2021-03-05', '5644654564', 'm', NULL, 'Oui', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membrefavo`
--

CREATE TABLE `membrefavo` (
  `idMembre` int(11) NOT NULL,
  `idMembreFavo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membrefavo`
--

INSERT INTO `membrefavo` (`idMembre`, `idMembreFavo`) VALUES
(0, 1),
(0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `idOffre` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idNotation` int(11) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notation`
--

INSERT INTO `notation` (`idOffre`, `idUtilisateur`, `idNotation`, `note`) VALUES
(0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `idMembre` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `estLue` tinyint(1) NOT NULL,
  `necessiteReponse` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`idMembre`, `message`, `estLue`, `necessiteReponse`) VALUES
(0, 'bienvenue !', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `horaireDepart` datetime NOT NULL,
  `horaireArrivee` datetime NOT NULL,
  `nbPassagersMax` int(2) NOT NULL,
  `idVilleDepart` int(11) NOT NULL,
  `idVilleArrivee` int(11) NOT NULL,
  `idConducteur` int(11) NOT NULL,
  `prix` double NOT NULL,
  `idEtape` int(11) DEFAULT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  `estPrivee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `horaireDepart`, `horaireArrivee`, `nbPassagersMax`, `idVilleDepart`, `idVilleArrivee`, `idConducteur`, `prix`, `idEtape`, `idGroupe`, `estPrivee`) VALUES
(0, '2020-05-04 10:10:47', '2020-05-04 12:10:47', 2, 0, 10, 0, 15.5, NULL, NULL, 0),
(1, '2021-02-08 13:32:30', '2021-02-08 14:32:30', 3, 2, 3, 1, 25.5, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`) VALUES
(0),
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `idVille` int(11) NOT NULL,
  `nomVille` varchar(50) NOT NULL,
  `codePostal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`idVille`, `nomVille`, `codePostal`) VALUES
(0, 'Paris', 75000),
(2, 'Nantes', 44000),
(3, 'Metz', 57000),
(5, 'Marseille', 13000),
(10, 'Nancy', 54000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD PRIMARY KEY (`idMembre`);

--
-- Index pour la table `copassager`
--
ALTER TABLE `copassager`
  ADD PRIMARY KEY (`idMembre`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`idEtape`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`idNotation`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`idVille`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
