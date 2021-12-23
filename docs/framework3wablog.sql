-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 déc. 2021 à 11:42
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
(1, 'Le langage C', '&lt;p&gt;Le C a été conçu en 1972 par Dennis Richie et Ken Thompson, chercheurs aux Bell Labs, afin de développer un système d&amp;#39;exploitation UNIX sur un DEC PDP-11. En 1978, Brian Kernighan et Dennis Richie publient la définition classique du C dans le livre &lt;em&gt;The C Programming language&lt;/em&gt; [&lt;cite&gt;&lt;a href=&quot;https://www.rocq.inria.fr/secret/Anne.Canteaut/COURS_C/chapitre1.html#KR&quot;&gt;&lt;cite&gt;6&lt;/cite&gt;&lt;/a&gt;&lt;/cite&gt;]. Le C devenant de plus en plus populaire dans les années 80, plusieurs groupes mirent sur le marché des compilateurs comportant des extensions particulières. En 1983, l&amp;#39;ANSI (American National Standards Institute) décida de normaliser le langage ; ce travail s&amp;#39;acheva en 1989 par la définition de la norme ANSI C. Celle-ci fut reprise telle quelle par l&amp;#39;ISO (International Standards Organization) en 1990. C&amp;#39;est ce standard, ANSI C, qui est décrit dans le présent document.&lt;/p&gt;', 24, '2021-12-20'),
(2, 'Angular', '&lt;p&gt;Angular est une plateforme de développement, construite sur TypeScript. En tant que plateforme, Angular comprend :&lt;/p&gt;\r\n\r\n&lt;p&gt;Un cadre basé sur des composants pour la création d&amp;#39;applications web évolutives.&lt;/p&gt;\r\n\r\n&lt;p&gt;Une collection de bibliothèques bien intégrées qui couvrent une grande variété de fonctionnalités, notamment le routage, la gestion des formulaires, la communication client-serveur, etc.&lt;/p&gt;\r\n\r\n&lt;p&gt;Une suite d&amp;#39;outils de développement pour vous aider à développer, construire, tester et mettre à jour votre code.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.50a.fr/img/upload/Angular.png&quot; style=&quot;height:448px; width:700px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Avec Angular, vous bénéficiez d&amp;#39;une plateforme capable de s&amp;#39;adapter aux projets d&amp;#39;un seul développeur comme aux applications d&amp;#39;entreprise. Angular est conçu pour faciliter au maximum les mises à jour, afin que vous puissiez profiter des dernières évolutions avec un minimum d&amp;#39;efforts. Mieux encore, l&amp;#39;écosystème Angular est constitué d&amp;#39;un groupe diversifié de plus de 1,7 million de développeurs, d&amp;#39;auteurs de bibliothèques et de créateurs de contenu.&lt;/p&gt;\r\n\r\n&lt;p&gt;Angular fait partie de l&amp;#39;écosystème JavaScript et constitue l&amp;#39;un des instruments de développement logiciel les plus populaires aujourd&amp;#39;hui. Il a été introduit par Google en 2009 et a reçu des éloges chaleureux de la part de la communauté des développeurs. Selon l&amp;#39;enquête 2019 de StackOverflow, 30,7 % des ingénieurs logiciels appliquent désormais AngularJS et la nouvelle version Angular 2+ pour créer des interfaces utilisateur. Depuis le début de l&amp;#39;année 2019, la communauté des développeurs Angular a augmenté de 50 % par rapport à 2018, comme l&amp;#39;indique la NG-Conf 2019.&lt;/p&gt;\r\n\r\n&lt;h2&gt;CARACTÉRISTIQUES CLÉS&lt;/h2&gt;\r\n\r\n&lt;h3&gt;PLATEFORME CROISÉE&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Applications Web progressives&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Utilisez les capacités des plateformes Web modernes pour offrir des expériences semblables à celles des applications. Haute performance, zero-step installation hors ligne.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Native&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Créez des applications mobiles natives avec les stratégies de Cordova, Ionic ou NativeScript.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Desktop&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Créez des applications installées sur le desktop sur Mac, Windows et Linux en utilisant les mêmes méthodes Angular que vous avez apprises pour le Web, ainsi que la possibilité d&amp;#39;accéder aux API des systèmes d&amp;#39;exploitation natifs.&lt;/p&gt;\r\n\r\n&lt;h3&gt;VITESSE ET PERFORMANCES&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Génération de code&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Angular transforme vos modèles en code hautement optimisé pour les machines virtuelles JavaScript actuelles, vous offrant ainsi tous les avantages d&amp;#39;un code écrit à la main avec la productivité d&amp;#39;un framework.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Universel&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Servez la première vue de votre application sur des serveurs Node.js®, .NET, PHP et autres pour un rendu quasi instantané en HTML et CSS uniquement. Ouvre également la voie aux sites optimisés pour le référencement.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Fractionnement du code&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Les applications Angular se chargent rapidement grâce au nouveau Component Router, qui permet de diviser automatiquement le code afin que les utilisateurs ne chargent que le code nécessaire au rendu de la vue qu&amp;#39;ils demandent.&lt;/p&gt;\r\n\r\n&lt;h3&gt;PRODUCTIVITÉ&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Modèles&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Créez rapidement des vues d&amp;#39;interface utilisateur grâce à une syntaxe de modèle simple et puissante.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;CLI Angular&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Outils en ligne de commande : commencez à construire rapidement, ajoutez des composants et des tests, puis déployez instantanément.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;IDE&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Bénéficiez d&amp;#39;une complétion de code intelligente, d&amp;#39;erreurs instantanées et d&amp;#39;autres commentaires dans les éditeurs et les IDE les plus populaires.&lt;/p&gt;\r\n\r\n&lt;h3&gt;HISTOIRE COMPLÈTE DU DÉVELOPPEMENT&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Tests&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Avec Karma pour les tests unitaires, vous pouvez savoir si vous avez cassé des choses à chaque fois que vous enregistrez. Et Protractor permet à vos tests de scénario de s&amp;#39;exécuter plus rapidement et de manière stable.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Animation&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Créez des chorégraphies et des chronologies d&amp;#39;animation complexes et performantes avec très peu de code grâce à l&amp;#39;API intuitive d&amp;#39;Angular.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Accessibilité&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Créez des applications accessibles grâce aux composants compatibles ARIA, aux guides du développeur et à l&amp;#39;infrastructure de test a11y intégrée.&lt;/p&gt;', 23, '2021-12-20'),
(3, 'Symfony 4, une nouvelle façon de développer des applications', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://miro.medium.com/max/2000/1*fr7_twoEgSkSBrRv50qEeA.jpeg&quot; style=&quot;height:310px; width:1000px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Symfony 4 est la nouvelle version du framework qui sera lancée le 30 Novembre prochain. Le but de cet article est de vous présenter quelques-unes des nouveautés présentes dans cette version du framework PHP.&lt;/p&gt;\r\n\r\n&lt;h1&gt;Symfony 4, il y a quoi de nouveau?&lt;/h1&gt;\r\n\r\n&lt;blockquote&gt;\r\n&lt;p&gt;« &lt;em&gt;Symfony 4.0 = Symfony 3.0 + toutes les fonctionnalités présentes dans la version 3.x — fonctionnalités obsolètes + une &lt;/em&gt;nouvelle façon de développer des applications »&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n\r\n&lt;p&gt;Symfony 4 représente une refonte complète des versions antérieures du framework.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Faites vos adieux à Symfony Installer!&lt;/h2&gt;\r\n\r\n&lt;p&gt;Plus besoin d’installer un outil tierce pour installer et démarrer un projet Symfony. Flex et composer viendront à votre rescousse! Avec la commande ci-dessous, nous créons une nouvelle application Symfony 4.&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\ncomposer create-project \\\r\n-s beta \\\r\nsymfony/skeleton blog&lt;/pre&gt;\r\n\r\n&lt;h2&gt;La légèreté au programme!&lt;/h2&gt;\r\n\r\n&lt;p&gt;C’est l’un des constats que vous ferez lors de l’installation. Symfony 4 ou plutôt Flex installe juste des paquets minimums pour “crafter” votre application. Regardons comment il fonctionne.&lt;/p&gt;\r\n\r\n&lt;p&gt;Référons nous au dépôt Github symfony/skeleton. Un seul fichier s’y trouve, composer.json.&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n{\r\n    &quot;name&quot;: &quot;symfony/skeleton&quot;,\r\n    &quot;type&quot;: &quot;project&quot;,\r\n    &quot;license&quot;: &quot;proprietary&quot;,\r\n    &quot;description&quot;: &quot;Project description&quot;,\r\n    &quot;minimum-stability&quot;: &quot;dev&quot;,\r\n    &quot;require&quot;: {\r\n        &quot;php&quot;: &quot;^7.1.3&quot;,\r\n        &quot;symfony/console&quot;: &quot;^4.1&quot;,\r\n        &quot;symfony/flex&quot;: &quot;^1.0&quot;,\r\n        &quot;symfony/framework-bundle&quot;: &quot;^4.1&quot;,\r\n        &quot;symfony/lts&quot;: &quot;^4@dev&quot;,\r\n        &quot;symfony/yaml&quot;: &quot;^4.1&quot;\r\n    },\r\n    &quot;require-dev&quot;: {\r\n        &quot;symfony/dotenv&quot;: &quot;^4.1&quot;\r\n    },\r\n    &quot;config&quot;: {\r\n        &quot;preferred-install&quot;: {\r\n            &quot;*&quot;: &quot;dist&quot;\r\n        },\r\n        &quot;sort-packages&quot;: true\r\n    },\r\n    &quot;autoload&quot;: {\r\n        &quot;psr-4&quot;: {\r\n            &quot;App\\\\&quot;: &quot;src/&quot;\r\n        }\r\n    },\r\n    &quot;autoload-dev&quot;: {\r\n        &quot;psr-4&quot;: {\r\n            &quot;App\\\\Tests\\\\&quot;: &quot;tests/&quot;\r\n        }\r\n    },\r\n    &quot;scripts&quot;: {\r\n        &quot;auto-scripts&quot;: [\r\n        ],\r\n        &quot;post-install-cmd&quot;: [\r\n            &quot;@auto-scripts&quot;\r\n        ],\r\n        &quot;post-update-cmd&quot;: [\r\n            &quot;@auto-scripts&quot;\r\n        ]\r\n    },\r\n    &quot;conflict&quot;: {\r\n        &quot;symfony/symfony&quot;: &quot;*&quot;\r\n    },\r\n    &quot;extra&quot;: {\r\n        &quot;symfony&quot;: {\r\n            &quot;id&quot;: &quot;&quot;,\r\n            &quot;allow-contrib&quot;: false\r\n        }\r\n    }\r\n}&lt;/pre&gt;\r\n\r\n&lt;p&gt;Très peu de dépendances: 6 plus exactement.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;PHP 7: C’est la toute dernière version du langage, elle vient avec des nouveautés comme le nouvel opérateur &lt;=&gt;, le spaceship operator et bien d’autres.&lt;/li&gt;\r\n	&lt;li&gt;Flex: Un plugin composer qui vous permet de crafter vos applications plus simplement en vous aidant à gérer vos dépendances.&lt;/li&gt;\r\n	&lt;li&gt;Console: La console ????&lt;/li&gt;\r\n	&lt;li&gt;Framework-bundle, le coeur du framework Symfony&lt;/li&gt;\r\n	&lt;li&gt;lts pour le support des composants Symfony et yaml pour les configurations&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;La structure d’une application Symfony 4&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://miro.medium.com/max/30/1*2c8FM6B7inTCOIg_VGQYyA.png?q=20&quot; style=&quot;height:339px; width:168px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://miro.medium.com/max/210/1*2c8FM6B7inTCOIg_VGQYyA.png&quot; style=&quot;height:339px; width:168px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;C’est une toute nouvelle structure que nous propose Symfony 4, proche de celle de Laravel.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;un fichier de configuration .env&lt;/li&gt;\r\n	&lt;li&gt;le dossier www/ renommé en public/&lt;/li&gt;\r\n	&lt;li&gt;le dossier config/ est toujours présent mais les fichiers de configurations sont minimales&lt;/li&gt;\r\n	&lt;li&gt;le dossier bin/ contient l’utilitaire console&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;Symfony est léger d’accord! Mais comment je me débrouille pour installer des bundles?&lt;/h2&gt;\r\n\r\n&lt;p&gt;Le but avec Symfony 4 c’ est de garder une structure assez légère afin de réduire la complexité des applications. Votre code devient “Bundleless”, sans besoins de “Bundles”. Vous êtes libres d’organiser votre code dans le dossier ‘src/’. Cela ne veut pas pour autant dire que vous les bundles sont obsolètes. Les “bundles” que vous utilisez habituellement seront disponibles pour mettre en place des fonctionnalités dans votre application, mais juste que vous n’êtes pas obligé d’en créer dans votre application.&lt;/p&gt;\r\n\r\n&lt;p&gt;Symfony 4 introduit les recipes (recettes), une suite de ligne de commandes à exécuter lors de l’installation des bundles. Deux dépôts regroupent les recettes (recipes) pour installer des paquets tiers: &lt;a href=&quot;https://github.com/symfony/recipes&quot; rel=&quot;noopener ugc nofollow&quot; target=&quot;_blank&quot;&gt;https://github.com/symfony/recipes&lt;/a&gt; et &lt;a href=&quot;https://github.com/symfony/recipes-contrib&quot; rel=&quot;noopener ugc nofollow&quot; target=&quot;_blank&quot;&gt;https://github.com/symfony/recipes-contrib&lt;/a&gt; pour la communauté.&lt;/p&gt;\r\n\r\n&lt;p&gt;Plus de 150 &lt;a href=&quot;https://symfony.sh/&quot; rel=&quot;noopener ugc nofollow&quot; target=&quot;_blank&quot;&gt;recettes&lt;/a&gt; existent déjà: api-platform, graphql-bundle, etc… L’installation d’un bundle devient plus simple.&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\ncomposer req admin&lt;/pre&gt;\r\n\r\n&lt;h2&gt;Webpack Encore, API Platform, etc&lt;/h2&gt;\r\n\r\n&lt;p&gt;Symfony 4 s’est donné les armes necessaires afin de faciliter la création d’applications de tous types: microservices, API, monolithes, etc. Juste un pur bonheur.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Contribuez à la communauté&lt;/h2&gt;\r\n\r\n&lt;p&gt;Pour pouvoir faire adopter cette nouvelle version de Symfony, il faudrait faire migrer les bundles Symfony existants vers la nouvelle version ????, contribuer à la créations des recettes, …&lt;/p&gt;\r\n\r\n&lt;p&gt;Happy Symfony 4!&lt;/p&gt;', 2, '2021-12-22'),
(4, 'abc', '&lt;p&gt;fazefzef&lt;/p&gt;', 24, '2021-12-22');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
