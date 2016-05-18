-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Mai 2016 à 13:39
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
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `consommateur`
--

CREATE TABLE `consommateur` (
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
  `procuration` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `dateSignature` date NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contratconsommateur`
--

CREATE TABLE `contratconsommateur` (
  `id` int(11) NOT NULL,
  `dateSignature` date NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consommateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `listeLivraison` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contratproducteur`
--

CREATE TABLE `contratproducteur` (
  `id` int(11) NOT NULL,
  `dateSignature` date NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `producteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantiteAProduire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrepot`
--

CREATE TABLE `entrepot` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `journal` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
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
(5, 'Administrateur', 'a:1:{i:0;s:10:"ROLE_ADMIN";}\n', 0);

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
-- Structure de la table `lignepanier`
--

CREATE TABLE `lignepanier` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantiteParDefaut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `panier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `pointLivraison` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `lignePanier` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `adresse`, `nom`, `prenom`) VALUES
(2, 'responsable', 'responsable', 'resonposable@responsable.fr', 'resonposable@responsable.fr', 1, 'ge6mc535ccg0o0o0wossccsccwows0w', '$2y$13$ge6mc535ccg0o0o0wosscO2hQQlqhWbxVInIVmX9LKMYkaiUPpkVK', '2016-05-18 12:16:21', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Responsable', 'Responsable', 'Responsable');

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
(2, 1);

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
-- Structure de la table `producteur`
--

CREATE TABLE `producteur` (
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
  `produitsQuantite` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantiteLivree` double NOT NULL,
  `dateLivraison` date NOT NULL,
  `dateLancement` date NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'Radis', 'Légumes', 'Botte', 5, 1),
(3, 'Ail', 'Légumes', 'Botte', 4, 1),
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
(17, 'Chou', 'Légumes', 'Kilo', 5, 2);

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

-- --------------------------------------------------------

--
-- Structure de la table `volontaire`
--

CREATE TABLE `volontaire` (
  `id` int(11) NOT NULL,
  `disponibilite` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `indiceConfiance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `amap`
--
ALTER TABLE `amap`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consommateur`
--
ALTER TABLE `consommateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4C9474AA92FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_4C9474AAA0D96FBF` (`email_canonical`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contratconsommateur`
--
ALTER TABLE `contratconsommateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contratproducteur`
--
ALTER TABLE `contratproducteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entrepot`
--
ALTER TABLE `entrepot`
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
-- Index pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F6B8ABB992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_F6B8ABB9A0D96FBF` (`email_canonical`);

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
-- Index pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3186EDC092FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_3186EDC0A0D96FBF` (`email_canonical`);

--
-- Index pour la table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `volontaire`
--
ALTER TABLE `volontaire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `amap`
--
ALTER TABLE `amap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `consommateur`
--
ALTER TABLE `consommateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contratconsommateur`
--
ALTER TABLE `contratconsommateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contratproducteur`
--
ALTER TABLE `contratproducteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entrepot`
--
ALTER TABLE `entrepot`
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
-- AUTO_INCREMENT pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `magasin`
--
ALTER TABLE `magasin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `pointlivraison`
--
ALTER TABLE `pointlivraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `volontaire`
--
ALTER TABLE `volontaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `personnegroupe`
--
ALTER TABLE `personnegroupe`
  ADD CONSTRAINT `FK_9DCC74E25C6DE3B4` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `FK_9DCC74E267A824BB` FOREIGN KEY (`idGroupe`) REFERENCES `fosgroup` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_E618D5BBA3C17D1C` FOREIGN KEY (`idSaison`) REFERENCES `saison` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
