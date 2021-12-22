-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 déc. 2021 à 12:25
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `framework3wablog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `text`, `category_id`, `created`) VALUES
(1, 'ok', '&lt;p&gt;bbbaaaa image abc  &lt;/p&gt;\n\n&lt;h1&gt;google&lt;/h1&gt;\n\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://a-static.besthdwallpaper.com/joli-visage-du-mannequin-americain-alexandra-daddario-fond-d-ecran-1024x768-60686_18.jpg&quot; style=&quot;width:30%&quot; /&gt;&lt;/p&gt;', 24, '2021-12-20'),
(2, 'cccc', '&lt;p&gt;cccaaa&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://localhost:8000/public/photos/61bf199c9ffc5.jpg&quot; style=&quot;height:1536px; width:2048px&quot; /&gt;&lt;/p&gt;', 23, '2021-12-20'),
(3, 'symfony 4.4', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://localhost:8000/public/photos/61bf2553bbf63.png&quot; style=&quot;height:512px; width:1024px&quot; /&gt;&lt;/p&gt;', 2, '2021-12-22');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `created`) VALUES
(1, 'PHP', '2021-12-16 16:21:18'),
(2, 'Symfony', '2021-12-16 17:01:09'),
(21, 'Sveltejs', '2021-12-18 15:36:03'),
(22, 'Javascript', '2021-12-18 16:04:11'),
(23, 'Angular', '2021-12-18 16:04:44'),
(24, 'c', '2021-12-20 14:33:57');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `origin`, `name`, `created`) VALUES
(1, 'sky.png', '61bf192735821.png', '2021-12-19 12:36:07'),
(2, 'BtWi.jpg', '61bf199c88ee6.jpg', '2021-12-19 12:38:04'),
(3, 'alexandra_daddario_ap.png_423682103.png', '61bf199c9956b.png', '2021-12-19 12:38:04'),
(4, 'unieke-schoonheid-en-ogen-van-amerikaans-model-alexandra-daddario-behang-2048x1536_26.jpg', '61bf199c9ffc5.jpg', '2021-12-19 12:38:04'),
(5, 'téléchargement.png', '61bf2540c0039.png', '2021-12-19 13:27:44'),
(6, 'php-leader1.png', '61bf2553ac418.png', '2021-12-19 13:28:03'),
(7, 'angular.png', '61bf2553b7897.png', '2021-12-19 13:28:03'),
(8, 'symfony-4.png', '61bf2553bbf63.png', '2021-12-19 13:28:03');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `role` int(10) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `created`, `role`) VALUES
(1, 'zhen@gmail.com', '$2y$10$8Zl5biOixFjvriqo5SR0F.EGK7lQnxsrrUGx.VTRBxeL5.7yNXh4K', 'zhen', '2021-12-13 18:01:25', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
