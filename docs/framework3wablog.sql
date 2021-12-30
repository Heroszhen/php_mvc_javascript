-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 déc. 2021 à 15:31
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
(1, 'php', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://localhost:8000/public/photos/61cc618400f45.png&quot; style=&quot;width:100%&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Le &lt;strong&gt;PHP&lt;/strong&gt;, pour Hypertext Preprocessor, désigne un langage informatique, ou un langage de &lt;a href=&quot;https://www.journaldunet.fr/web-tech/dictionnaire-du-webmastering/1203599-script-definition/&quot;&gt;script&lt;/a&gt;, utilisé principalement pour la conception de sites web dynamiques. Il s&amp;#39;agit d&amp;#39;un langage de programmation sous licence libre qui peut donc être utilisé par n&amp;#39;importe qui de façon totalement gratuite.&lt;/p&gt;\r\n\r\n&lt;p&gt;Créé au début des années 1990 par le Canadien et Groenlandais Rasmus Lerdorf, le langage &lt;strong&gt;PHP&lt;/strong&gt; est souvent associé au serveur de base de données &lt;a href=&quot;https://www.journaldunet.fr/web-tech/dictionnaire-du-webmastering/1203595-mysql-my-structured-query-language-definition/&quot;&gt;MySQL&lt;/a&gt; et au serveur Apache. Avec le système d&amp;#39;exploitation Linux, il fait partie intégrante de la suite de logiciels libres &lt;a href=&quot;https://www.journaldunet.fr/web-tech/dictionnaire-du-webmastering/1203347-lamp-linux-apache-mysql-php-definition/&quot;&gt;LAMP&lt;/a&gt;.&lt;/p&gt;', 1, '2021-12-29'),
(2, 'La version 5.0 du framework Bootstrap va supprimer jQuery, sa plus grande dépendance côté client', '&lt;p&gt;Bootstrap n&amp;#39;est plus à présenter aux développeurs Web, car c&amp;#39;est sans doute le framework HTML, CSS et JavaScript le plus populaire pour développer des projets mobiles first et responsives sur le Web. Il offre des outils utiles à la création du design de sites et d&amp;#39;applications Web. C&amp;#39;est un ensemble qui contient des codes HTML et CSS, des formulaires, boutons, outils de navigation et autres éléments interactifs, ainsi que des extensions JavaScript en option. La dernière version majeure, &lt;a href=&quot;https://www.developpez.com/actu/183556&quot; target=&quot;_blank&quot;&gt;Bootstrap 4.0&lt;/a&gt; a été publiée en janvier 2018, après plus de trois 3 ans de développement et une réécriture majeure de l&amp;#39;ensemble du projet. Elle a donc introduit des changements incompatibles que les développeurs devraient prendre en compte dans leurs projets.&lt;br /&gt;\r\n&lt;br /&gt;\r\nPlus d&amp;#39;un an après la version 4.0, des versions mineures ont été livrées. La dernière, Bootstrap 4.3, date du 11 février. Bootstrap v4.3 vient avec des améliorations aux utilitaires du framework, des corrections de bogues, mais surtout des tailles de polices responsives. Un nouveau projet Bootstrap permet en effet d’automatiser le calcul d’une taille de police appropriée en fonction des dimensions du périphérique du visiteur ou de la fenêtre du navigateur.&lt;br /&gt;\r\n&lt;br /&gt;\r\nMais juste après la livraison de la v4.3, l&amp;#39;équipe Bootstrap a décidé d&amp;#39;aborder quelques changements clés à venir dans la version v5. À la Une, elle annonce l&amp;#39;abandon de jQuery pour du pur JavaScript. « Le chat est sorti du sac - nous abandonnons notre plus grande dépendance côté client pour du JavaScript pur. Nous y travaillons depuis longtemps et un pull request est en cours et presque terminé », a affirmé l&amp;#39;équipe Bootstrap.&lt;br /&gt;\r\n&lt;br /&gt;\r\nIl s&amp;#39;agit d&amp;#39;un énorme pull request avec des centaines de commentaires étalés sur un an et demi. Selon les commentaires, jQuery a été remplacé par du pur JavaScript (également désigné par le nom Vanilla JS) qui appelle directement les API du navigateur. S&amp;#39;il est souvent désigné comme étant un framework, Vanilla JS ne l&amp;#39;est pas vraiment, c&amp;#39;est du JavaScript sans bibliothèque.&lt;br /&gt;\r\n&lt;br /&gt;\r\nLe concept Vanilla JS a été popularisé fin 2012, avec pour objectif de contrecarrer l’omniprésence des bibliothèques JS comme jQuery. Si vous avez déjà effectué une recherche sur un moteur de recherche suite à une question ou à un problème en codant en JavaScript, vous vous êtes peut-être rendu compte que jQuery et d’autres étaient omniprésents et toujours présentés comme la solution, même sur des questions génériques. C&amp;#39;est pour lutter contre cela que le concept Vanilla JS a été mis en avant. Il vante les mérites de JavaScript. Plutôt que d’utiliser une bibliothèque en surcouche, on peut en effet trouver une solution équivalente qui utilise les fonctions du core JavaScript.&lt;/p&gt;', 2, '2021-12-30');

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
(1, 'PHP', '2021-12-29 14:22:17'),
(2, 'Javascript', '2021-12-29 14:22:34'),
(3, 'Symfony', '2021-12-29 14:22:43'),
(4, 'Angular', '2021-12-29 14:23:18');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `article_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'BtWi.jpg', '61cc6183bffdc.jpg', '2021-12-29 14:24:19'),
(2, 'téléchargement.png', '61cc6183db04e.png', '2021-12-29 14:24:19'),
(3, 'angular.png', '61cc6183e8dc8.png', '2021-12-29 14:24:19'),
(4, 'php-leader1.png', '61cc618400f45.png', '2021-12-29 14:24:20'),
(5, 'symfony-4.png', '61cc61840fdcb.png', '2021-12-29 14:24:20'),
(6, 'alexandra_daddario_ap.png_423682103.png', '61cc618419499.png', '2021-12-29 14:24:20'),
(7, 'unieke-schoonheid-en-ogen-van-amerikaans-model-alexandra-daddario-behang-2048x1536_26.jpg', '61cc6184348da.jpg', '2021-12-29 14:24:20'),
(8, 'sky.png', '61cc618440c49.png', '2021-12-29 14:24:20');

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
  `role` int(10) NOT NULL DEFAULT 2,
  `photo` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `created`, `role`, `photo`) VALUES
(1, 'exemple@gmail.com', '$2y$10$8Zl5biOixFjvriqo5SR0F.EGK7lQnxsrrUGx.VTRBxeL5.7yNXh4K', 'zhen', '2021-12-13 18:01:25', 1, '');

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
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
