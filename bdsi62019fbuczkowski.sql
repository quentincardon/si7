-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 22 Mai 2019 à 15:12
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdsi62019hattencourt`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `idactu` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`idactu`, `titre`, `message`, `date`) VALUES
(67, 'Bienvenue a Legendarium le Cabinet très Fantasy', 'Le site est actuellement en construction , nous sommes dÃ©solÃ© si des bugs sont prÃ©sent.', '2019-05-05'),
(69, 'Bienvenue sur le site de Legendarium', 'Le site est en construction ', '2019-05-21');

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE `catalogue` (
  `titre` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) NOT NULL,
  `idlivre` int(255) NOT NULL,
  `gerne` int(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `catalogue`
--

INSERT INTO `catalogue` (`titre`, `resume`, `photo`, `auteur`, `idlivre`, `gerne`, `prix`, `quantite`) VALUES
('Le plus grand défi de l\'histoire de l\'humanité', 'Écologie : il faut agir maintenant, il n\'est pas trop tard pour éviter le pire ! La question écologique engage notre survie. Elle ne peut pas être considérée comme secondaire.  \" La vie, sur Terre, est en train de mourir. L\'ampleur du désastre est à la dé', 'Le_plus_grand_defi_de_l_histoire_de_l_humanite.jpg', 'AURÉLIEN BARRAU', 113, 4, 8, 15);

-- --------------------------------------------------------

--
-- Structure de la table `etatcatalogue`
--

CREATE TABLE `etatcatalogue` (
  `Etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gerne`
--

CREATE TABLE `gerne` (
  `id` int(255) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `gerne`
--

INSERT INTO `gerne` (`id`, `libelle`) VALUES
(1, 'Fantasy'),
(2, 'Fantastique'),
(3, 'BD'),
(4, 'Roman'),
(5, 'Policier'),
(6, 'Science fiction'),
(7, 'Tragédie'),
(8, 'Comédie'),
(9, 'Fable');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idrole` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`iduser`, `nom`, `prenom`, `pseudo`, `email`, `pass`, `idrole`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@legendarium.fr', '$2y$10$GSj/3W0gmvOHOsKkHui6de7v4EBeADDvDIdwthMZ66R7uhcprAS7G', '2'),
(4, 'attencourt', 'hugo', 'test', 'hugopoker@aim.com', '$2y$10$CMqfbQggA4c/OkHYpXrKT.ZvliKo67jO2F1mUwHDwPORVZjP/apky', '1'),
(5, 'djender', 'medjhi', 'djr', 'djr.medhi@gmail.com', '$2y$10$PsMQ8m1ndhIaO0Qg.PR8m.l9vhPIyqpnUaBI7/uMZBiKzz3Iu8b5q', '1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`idactu`);

--
-- Index pour la table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`idlivre`),
  ADD KEY `gerne` (`gerne`),
  ADD KEY `gerne_2` (`gerne`),
  ADD KEY `gerne_3` (`gerne`),
  ADD KEY `gerne_4` (`gerne`),
  ADD KEY `gerne_5` (`gerne`);

--
-- Index pour la table `etatcatalogue`
--
ALTER TABLE `etatcatalogue`
  ADD PRIMARY KEY (`Etat`);

--
-- Index pour la table `gerne`
--
ALTER TABLE `gerne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `iduser` (`iduser`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idrole` (`idrole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `idactu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `idlivre` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `catalogue`
--
ALTER TABLE `catalogue`
  ADD CONSTRAINT `catalogue_ibfk_1` FOREIGN KEY (`gerne`) REFERENCES `gerne` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
