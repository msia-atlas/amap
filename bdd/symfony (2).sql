-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Juin 2016 à 09:29
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `amap`
--

CREATE TABLE `amap` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `amap`
--

INSERT INTO `amap` (`id`, `adresse`, `nom`) VALUES
(1, '7 place george Courtelien', 'Amap de Luynes');

-- --------------------------------------------------------

--
-- Structure de la table `contratconsommateur`
--

CREATE TABLE `contratconsommateur` (
  `id` int(11) NOT NULL,
  `dateSignature` date DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consommateur` int(11) DEFAULT NULL,
  `listeLivraison` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `saison` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `contratconsommateur`
--

INSERT INTO `contratconsommateur` (`id`, `dateSignature`, `statut`, `consommateur`, `listeLivraison`, `saison`) VALUES
(3, NULL, 'A valider', 12, 'N;', 2);

-- --------------------------------------------------------

--
-- Structure de la table `contratproducteur`
--

CREATE TABLE `contratproducteur` (
  `id` int(11) NOT NULL,
  `dateSignature` date DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `producteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantiteAProduire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fosgroup`
--

CREATE TABLE `fosgroup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `publique` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fosgroup`
--

INSERT INTO `fosgroup` (`id`, `name`, `roles`, `publique`) VALUES
(1, 'ResponsableAmap\r\n', 'a:1:{i:0;s:16:"ROLE_RESPONSABLE";}', 1),
(2, 'Consommateur', 'a:1:{i:0;s:17:"ROLE_CONSOMMATEUR";}', 1),
(3, 'Volontaire', 'a:1:{i:0;s:15:"ROLE_VOLONTAIRE";}', 1),
(4, 'Producteur', 'a:1:{i:0;s:15:"ROLE_PRODUCTEUR";}\n', 1),
(5, 'Administrateur', 'a:1:{i:0;s:10:"ROLE_ADMIN";}\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `typeES` tinyint(1) NOT NULL,
  `produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` double NOT NULL,
  `producteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignecontratconsommateur`
--

CREATE TABLE `lignecontratconsommateur` (
  `id` int(11) NOT NULL,
  `contrat` int(11) DEFAULT NULL,
  `panier` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignepanier`
--

CREATE TABLE `lignepanier` (
  `id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `produit` int(11) DEFAULT NULL,
  `quantiteParDefaut` int(11) NOT NULL,
  `panier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `lignepanier`
--

INSERT INTO `lignepanier` (`id`, `quantite`, `produit`, `quantiteParDefaut`, `panier`) VALUES
(1, NULL, 4, 13, 1),
(2, NULL, 5, 16, 1),
(3, NULL, 1, 12, 1),
(4, NULL, 11, 7, 2),
(5, NULL, 13, 45, 2),
(6, NULL, 15, 47, 2),
(7, NULL, 17, 74, 2);

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE `magasin` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `typePanier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` date NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saison` int(11) DEFAULT NULL,
  `amap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id`, `typePanier`, `dateCreation`, `statut`, `prix`, `libelle`, `saison`, `amap`) VALUES
(1, '0', '2016-06-17', 'Panier Type', '8', 'Panier de fruit', 2, 1),
(2, '0', '2016-06-17', 'Panier Type', '9', 'Legume', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `procuration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disponibilite` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `indiceConfiance` int(11) DEFAULT NULL,
  `groupName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `adresse`, `nom`, `prenom`, `procuration`, `disponibilite`, `indiceConfiance`, `groupName`, `amap`) VALUES
(4, 'producteur', 'producteur', 'producteur@producteur.com', 'producteur@producteur.com', 1, 'hoj3fpte7c0gos8ws08wco8ooccc8c4', '$2y$13$hoj3fpte7c0gos8ws08wceFgqYZfOobMjoJxR.ffPlX2TFxKyCSNe', '2016-06-24 09:25:42', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2 allé du Mortier 37360 Neuillé', 'Deschamps', 'Didier', NULL, 'N;', NULL, NULL, 1),
(10, 'responsable', 'responsable', 'resonposable@responsable.fr', 'resonposable@responsable.fr', 1, 'rn3b283zbdww84w8k0ogkkw8cgo4oks', '$2y$13$rn3b283zbdww84w8k0ogkehn//V9vCRYdJCfmRYhdEC8lRBAs8jRO', '2016-06-24 09:24:23', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Rue du Grand Marcher 36100 Chateauroux', 'Henry', 'Thierry', NULL, 'N;', NULL, 'ResponsableAmap', 1),
(11, 'administrateur', 'administrateur', 'administrateur@amap.com', 'administrateur@amap.com', 1, '3paiqb1ya9icssk40c8wksk44gosc8w', '$2y$13$3paiqb1ya9icssk40c8wke1wBaCcFIA64IMXfmCW51NrIMBeD4nS2', '2016-06-24 09:15:20', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '7 chemin des Prunes 37100 Tours', 'Blanc', 'Laurent', NULL, 'N;', NULL, '', 1),
(12, 'consommateur', 'consommateur', 'consommateur@consommateur.fr', 'consommateur@consommateur.fr', 1, '5ykj3k85ytk4gs44g0w4o8s40c08s8g', '$2y$13$5ykj3k85ytk4gs44g0w4ouwCrwxeYrr3bGYE9K3ykBjhWOZeF4dwi', '2016-06-24 09:13:12', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '15 rue du ballon D''or 36190 Issoudin', 'Zinedine', 'Zidane', NULL, 'N;', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnegroupe`
--

CREATE TABLE `personnegroupe` (
  `idPersonne` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `personnegroupe`
--

INSERT INTO `personnegroupe` (`idPersonne`, `idGroupe`) VALUES
(4, 4),
(10, 1),
(11, 5),
(12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pointlivraison`
--

CREATE TABLE `pointlivraison` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomPointLivraison` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `preferenceconsommateur`
--

CREATE TABLE `preferenceconsommateur` (
  `id` int(11) NOT NULL,
  `preference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `idComsommateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `preferenceconsommateur`
--

INSERT INTO `preferenceconsommateur` (`id`, `preference`, `idProduit`, `idComsommateur`) VALUES
(36, 'oui', 1, 12),
(37, 'oui', 3, 12),
(38, 'non', 4, 12),
(39, 'oui', 5, 12),
(40, 'oui', 6, 12),
(41, 'non', 7, 12),
(42, 'oui', 8, 12),
(43, 'non', 9, 12),
(44, 'oui', 10, 12),
(45, 'oui', 11, 12),
(46, 'oui', 12, 12),
(47, 'oui', 13, 12),
(48, 'oui', 14, 12),
(49, 'oui', 15, 12),
(50, 'non', 16, 12),
(51, 'oui', 17, 12),
(52, 'non', 18, 12);

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `quantiteLivree` double NOT NULL,
  `dateLivraison` date NOT NULL,
  `dateLancement` date NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idProducteur` int(11) DEFAULT NULL,
  `idProduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `production`
--

INSERT INTO `production` (`id`, `quantiteLivree`, `dateLivraison`, `dateLancement`, `statut`, `idProducteur`, `idProduit`) VALUES
(1, 1500, '2016-09-09', '2016-08-16', 'Proposé', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeProduit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uniteMesure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prixUnitaire` double NOT NULL,
  `idSaison` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `typeProduit`, `uniteMesure`, `prixUnitaire`, `idSaison`) VALUES
(1, 'Radis', 'Légumes', 'Botte', 5, 1),
(3, 'Ail', 'Légumes', 'Botte', 3.25, 1),
(4, 'Fruit de la passion', 'Fruit', 'Kilo', 12, 1),
(5, 'Mangue', 'Fruit', 'Kilo', 13, 1),
(6, 'Litchi', 'Fruit', 'Kilo', 10, 1),
(7, 'Banane', 'Fruit', 'Kilo', 8, 1),
(8, 'Oignon', 'Légumes', 'Kilo', 3, 1),
(9, 'Cerise', 'Fruit', 'Kilo', 10, 1),
(10, 'Avocat', 'Fruit', 'Kilo', 7, 1),
(11, 'Pomme de terre', 'Légumes', 'Kilo', 3, 1),
(12, 'Melon', 'Fruit', 'Kilo', 6, 1),
(13, 'Céleri', 'Légumes', 'Kilo', 2, 2),
(14, 'Poire', 'Fruit', 'Kilo', 8, 2),
(15, 'Poireau', 'Légumes', 'Kilo', 3, 2),
(16, 'Datte', 'Fruit', 'Kilo', 9, 2),
(17, 'Chou', 'Légumes', 'Kilo', 5, 2),
(18, 'Asperge', 'Légume', 'Conserve', 2.5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`id`, `libelle`, `dateDebut`, `dateFin`) VALUES
(1, 'Printemps/Été', '2016-01-01', '2016-06-30'),
(2, 'Automne/Hiver', '2016-07-01', '2016-12-31');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `amap`
--
ALTER TABLE `amap`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contratconsommateur`
--
ALTER TABLE `contratconsommateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EE703E6554A5AF52` (`consommateur`),
  ADD KEY `IDX_EE703E65C0D0D586` (`saison`);

--
-- Index pour la table `contratproducteur`
--
ALTER TABLE `contratproducteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fosgroup`
--
ALTER TABLE `fosgroup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_10BBCBBC5E237E06` (`name`);

--
-- Index pour la table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignecontratconsommateur`
--
ALTER TABLE `lignecontratconsommateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5EB12FB60349993` (`contrat`),
  ADD KEY `IDX_5EB12FB24CC0DF2` (`panier`);

--
-- Index pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2C6881BF29A5EC27` (`produit`),
  ADD KEY `IDX_2C6881BF24CC0DF2` (`panier`);

--
-- Index pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_236008C4C0D0D586` (`saison`),
  ADD KEY `IDX_236008C4CE323CD3` (`amap`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F6B8ABB992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_F6B8ABB9A0D96FBF` (`email_canonical`),
  ADD KEY `IDX_F6B8ABB9CE323CD3` (`amap`);

--
-- Index pour la table `personnegroupe`
--
ALTER TABLE `personnegroupe`
  ADD PRIMARY KEY (`idPersonne`,`idGroupe`),
  ADD KEY `IDX_9DCC74E25C6DE3B4` (`idPersonne`),
  ADD KEY `IDX_9DCC74E267A824BB` (`idGroupe`);

--
-- Index pour la table `pointlivraison`
--
ALTER TABLE `pointlivraison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `preferenceconsommateur`
--
ALTER TABLE `preferenceconsommateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7E8A998D391C87D5` (`idProduit`),
  ADD KEY `IDX_7E8A998DE10CB0A0` (`idComsommateur`);

--
-- Index pour la table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9CB0B230FC2FF0FA` (`idProducteur`),
  ADD KEY `IDX_9CB0B230391C87D5` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E618D5BBA3C17D1C` (`idSaison`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `amap`
--
ALTER TABLE `amap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `contratconsommateur`
--
ALTER TABLE `contratconsommateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `contratproducteur`
--
ALTER TABLE `contratproducteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fosgroup`
--
ALTER TABLE `fosgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lignecontratconsommateur`
--
ALTER TABLE `lignecontratconsommateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `magasin`
--
ALTER TABLE `magasin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `pointlivraison`
--
ALTER TABLE `pointlivraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `preferenceconsommateur`
--
ALTER TABLE `preferenceconsommateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contratconsommateur`
--
ALTER TABLE `contratconsommateur`
  ADD CONSTRAINT `FK_EE703E6554A5AF52` FOREIGN KEY (`consommateur`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `FK_EE703E65C0D0D586` FOREIGN KEY (`saison`) REFERENCES `saison` (`id`);

--
-- Contraintes pour la table `lignecontratconsommateur`
--
ALTER TABLE `lignecontratconsommateur`
  ADD CONSTRAINT `FK_5EB12FB24CC0DF2` FOREIGN KEY (`panier`) REFERENCES `panier` (`id`),
  ADD CONSTRAINT `FK_5EB12FB60349993` FOREIGN KEY (`contrat`) REFERENCES `contrat` (`id`);

--
-- Contraintes pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  ADD CONSTRAINT `FK_2C6881BF24CC0DF2` FOREIGN KEY (`panier`) REFERENCES `panier` (`id`),
  ADD CONSTRAINT `FK_2C6881BF29A5EC27` FOREIGN KEY (`produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_236008C4C0D0D586` FOREIGN KEY (`saison`) REFERENCES `saison` (`id`),
  ADD CONSTRAINT `FK_236008C4CE323CD3` FOREIGN KEY (`amap`) REFERENCES `amap` (`id`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `FK_F6B8ABB9CE323CD3` FOREIGN KEY (`amap`) REFERENCES `amap` (`id`);

--
-- Contraintes pour la table `personnegroupe`
--
ALTER TABLE `personnegroupe`
  ADD CONSTRAINT `FK_9DCC74E25C6DE3B4` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `FK_9DCC74E267A824BB` FOREIGN KEY (`idGroupe`) REFERENCES `fosgroup` (`id`);

--
-- Contraintes pour la table `preferenceconsommateur`
--
ALTER TABLE `preferenceconsommateur`
  ADD CONSTRAINT `FK_7E8A998D391C87D5` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `FK_7E8A998DE10CB0A0` FOREIGN KEY (`idComsommateur`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `FK_9CB0B230391C87D5` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `FK_9CB0B230FC2FF0FA` FOREIGN KEY (`idProducteur`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_E618D5BBA3C17D1C` FOREIGN KEY (`idSaison`) REFERENCES `saison` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
