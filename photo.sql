-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

CREATE TABLE `photo` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
`id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `album` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `suit`
--

CREATE TABLE `suit` (
`id` int(11) NOT NULL,
  `suiveur_id` int(11) NOT NULL,
  `suivi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------



--
-- AUTO_INCREMENT pour les tables déchargées
--


--
-- Index pour la table `chanson`
--
ALTER TABLE `photo`
 ADD PRIMARY KEY (`id`);



--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlist`
--
ALTER TABLE `album`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suit`
--
ALTER TABLE `suit`
 ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT pour les tables exportees
--

--
-- AUTO_INCREMENT pour la table `chanson`
--
ALTER TABLE `photo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `contient`
--
ALTER TABLE `contient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `playlist`
--
ALTER TABLE `album`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `suit`
--
ALTER TABLE `suit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
