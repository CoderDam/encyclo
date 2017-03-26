-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 27 Mars 2017 à 00:05
-- Version du serveur :  5.7.11-0ubuntu6
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `_WebDevPedia`
--
CREATE DATABASE IF NOT EXISTS `_WebDevPedia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `_WebDevPedia`;

-- --------------------------------------------------------

--
-- Structure de la table `links`
--
-- Création :  Sam 25 Mars 2017 à 17:38
-- Dernière modification :  Dim 26 Mars 2017 à 21:44
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `name` varchar(63) NOT NULL,
  `url` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `links`
--

INSERT INTO `links` (`id`, `name`, `url`, `post_id`) VALUES
(1, 'O&#39;Clock Big-Bang', 'https://oclock-bigbang.slack.com/', 11),
(2, 'O&#39;Clock Big Bang', 'https://discordapp.com/channels/273380708184096768/273380708184096768', 12),
(3, 'Fiche rÃ©cap&#39;', 'https://github.com/O-clock/bigbang-fiches-recap/blob/master/js/ajax.md', 13),
(4, 'Article &#34;fondateur&#34;', 'http://adaptivepath.org/ideas/ajax-new-approach-web-applications/', 13),
(5, 'Site d\'O\'clock', 'https://oclock.io/', 15);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--
-- Création :  Sam 25 Mars 2017 à 17:34
-- Dernière modification :  Dim 26 Mars 2017 à 22:02
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `core` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `core`, `date`) VALUES
(11, 'Slack', 'Plateforme de travail collaboratif pour dÃ©veloppeurs principalement centrÃ©e sur un chat organisÃ© en diffÃ©rentes canaux publics (channels) et privÃ©s (PM).\nIl propose en plus des fonctions d&#39;envoi et partage de fichiers et de code (snippets).', '2017-03-26 15:53:08'),
(12, 'Discord', 'Discord est, comme Slack, une plateforme de chat particuliÃ¨rement adaptÃ©e aux dÃ©veloppeurs. Cependant, contrairement Ã  Slack, Discord est pensÃ© pour les Ã©changes vocaux.', '2017-03-26 18:02:45'),
(13, 'Ajax', 'Ajax est une mÃ©thode de dÃ©veloppement web qui permet le traitement asynchrone des requÃªtes vers le serveur.', '2017-03-26 21:14:26'),
(15, 'Cockpit', 'Plateforme dÃ©veloppÃ©e par O&#39;clock pour assurer ses cours au format tÃ©lÃ©prÃ©sentiel. Elle comprend un chat (public et privÃ©), le partage d&#39;Ã©cran du formateur, un systÃ¨me de diaporama interactif et la transmission en direct des webcams du formateur (audio et vidÃ©o) ainsi que de tous les Ã©tudiants (vidÃ©o seulement, Ã  1 FPS pour Ã©viter la surcharge de bande passante).', '2017-03-26 21:37:34');

-- --------------------------------------------------------

--
-- Structure de la table `post_tag`
--
-- Création :  Sam 25 Mars 2017 à 21:51
-- Dernière modification :  Dim 26 Mars 2017 à 22:02
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(11, 14),
(11, 15),
(12, 15),
(15, 15),
(13, 16),
(13, 17),
(13, 18),
(13, 19),
(15, 20);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--
-- Création :  Sam 25 Mars 2017 à 17:35
-- Dernière modification :  Dim 26 Mars 2017 à 21:54
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(14, 'slack'),
(15, 'chat'),
(16, 'ajax'),
(17, 'mÃ©thode'),
(18, 'asynchrone'),
(19, 'lazy-loading'),
(20, 'o-clock');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `post_id` (`post_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Contraintes pour la table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
