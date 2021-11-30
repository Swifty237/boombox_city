-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 30 nov. 2021 à 01:24
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boombox_city`
--

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `liked` tinyint(1) DEFAULT NULL,
  `disliked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `exp_id`, `dest_id`, `message`, `date_message`) VALUES
(144, 34, 35, 'salut toto ca va ?', '2021-11-26 02:45:39'),
(145, 34, 36, 'salut tata ca va ?', '2021-11-26 02:46:21'),
(146, 36, 35, 'salut toto c\'est tata', '2021-11-26 03:05:53'),
(147, 36, 34, 'ca va merci et toi yannick ?', '2021-11-26 03:06:15'),
(148, 35, 34, 'super et toi yannick ?', '2021-11-26 03:07:19'),
(149, 35, 36, 'salut tata tu vas bien ?', '2021-11-26 03:07:42'),
(150, 35, 35, 'salut toto', '2021-11-26 03:13:49'),
(151, 35, 34, 're', '2021-11-26 03:17:52'),
(152, 34, 35, 'toujours la moi', '2021-11-26 06:37:24'),
(153, 35, 34, 'yop', '2021-11-26 06:56:23'),
(154, 34, 36, 'crop top', '2021-11-26 06:58:07'),
(155, 34, 36, 'c\'est quoi ?', '2021-11-27 09:42:26');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `picture_name` varchar(255) DEFAULT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `resident_id` int(11) NOT NULL,
  `like_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `picture_name`, `posted`, `date`, `title`, `description`, `resident_id`, `like_id`) VALUES
(18, '18.jpg', 1, '2021-11-28 01:41:53', 'Test image', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 34, NULL),
(19, '19.png', 0, '2021-11-28 01:42:53', 'second test image', 't has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 34, NULL),
(20, '20.jpg', 0, '2021-11-28 01:43:45', 'Test image 3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 34, NULL),
(21, '21.jpg', 1, '2021-11-28 01:48:20', 'test photos toto', 'generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 35, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthdate` datetime NOT NULL,
  `sex` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `date_validation` datetime DEFAULT NULL,
  `presentation` text DEFAULT NULL,
  `profil_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `residents`
--

INSERT INTO `residents` (`id`, `name`, `firstname`, `birthdate`, `sex`, `email`, `password`, `token`, `pseudo`, `status`, `date_inscription`, `date_validation`, `presentation`, `profil_picture`) VALUES
(34, 'Kamdem', 'Yannick', '2021-11-03 00:00:00', 'masculin', 'yannickkamdemkouam@yahoo.fr', '$2y$10$8vxzYhND.1SYFfGU6sR0s.gfTWEglSSWLvoaOZcKElZtPSJHK1xf6', NULL, 'Oggy', 0, '2021-11-20 17:38:43', '2021-11-20 17:39:06', 'Oggy comme oggy et les cafards', '34.jpg'),
(35, 'toto', 'toto', '2021-11-02 00:00:00', 'masculin', 'toto@exemple.com', '$2y$10$akZKBv34MTYBTiJ0VVyjX.v1RM2lQMC7J4UpyHdtBgek6oc67OYka', NULL, NULL, 0, '2021-11-23 19:15:25', '2021-11-23 19:15:57', NULL, NULL),
(36, 'tata', 'tata', '2021-11-11 00:00:00', 'feminin', 'tata@exemple.com', '$2y$10$HzMKgP5oM/uS3AiKSmZAF.ZkrUsqdqPOvalbClTSQcSUpr2SX8kK2', NULL, NULL, 0, '2021-11-23 19:17:06', '2021-11-23 19:17:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `resident_id` int(11) DEFAULT NULL,
  `like_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `video_name`, `posted`, `date`, `title`, `description`, `resident_id`, `like_id`) VALUES
(4, '4.mp4', 1, '2021-11-28 01:44:21', 'nouveau test modif', 'Nouveau test modif contenu :\r\nt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\',', 34, NULL),
(5, '5.mp4', 0, '2021-11-28 01:45:13', 'Test 2 vidéo', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum', 34, NULL),
(6, '6.mp4', 1, '2021-11-28 01:46:34', 'Vidéo de toto', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 35, NULL),
(7, '7.mp4', 0, '2021-11-28 01:47:27', 'teest video de toto 2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 35, NULL),
(8, '8.mp4', 0, '2021-11-28 01:50:47', 'Test vidéo de tata', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', 36, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;