-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2020 at 06:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL,
  `stream_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`, `stream_url`) VALUES
(1, 1, 'Spy', 'Film', 'Publié', '2015-06-17', 'Susan Cooper est une modeste et discrète analyste au siège de la CIA.\r\nHéroïne méconnue, elle assiste à distance l’un des meilleurs espions de l’agence, Bradley Fine, dans ses missions les plus périlleuses.\r\nLorsque Fine disparaît et que la couverture d’un autre agent est compromise, Susan se porte volontaire pour infiltrer le redoutable univers des marchands d’armes et tenter d’éviter une attaque nucléaire…', 'https://www.youtube.com/embed/a9EHVHubO6Q', 'https://www.youtube.com/embed/wSyoH933vw8'),
(2, 1, 'Captain Marvel', 'Film', 'Publié', '2019-03-06', 'Captain Marvel raconte l’histoire de Carol Danvers qui va devenir l’une des super-héroïnes les plus puissantes de l’univers lorsque la Terre se révèle l’enjeu d’une guerre galactique entre deux races extraterrestres.', 'https://www.youtube.com/embed/rndLWLmwgeA', 'https://www.youtube.com/embed/zd0BraSdHAY'),
(3, 1, 'Umbrella Academy', 'Série', 'Publié', '2019-01-01', 'En 1989, le même jour, quarante-trois bébés sont inexplicablement nés de femmes qui n\'étaient pas enceintes et que rien ne relie. Sir Reginald Hargreeves, un industriel milliardaire, adopte sept de ces enfants et crée The Umbrella Academy pour les préparer à sauver le monde. Mais tout ne se déroule pas comme prévu. Les enfants devenus adolescents, la famille se désagrège et l\'équipe est dispersée. Les six membres toujours en vie, désormais trentenaires, se retrouvent à l\'occasion de la mort de Hargreeves. Luther, Diego, Allison, Klaus, Vanya et Numéro Cinq travaillent ensemble pour résoudre le mystère qui entoure la mort de leur père. La famille désunie se sépare cependant de nouveau, incapable de gérer des personnalités et des pouvoirs trop différents, sans même parler de l\'apocalypse qui menace...', 'https://www.youtube.com/embed/Rz4J6tM_tuQ', NULL),
(4, 2, 'Conjuring : Les dossiers Warren', 'Film', 'Publié', '2013-08-21', 'Avant Amityville, il y avait Harrisville… Conjuring : Les dossiers Warren, raconte l\'histoire horrible, mais vraie, d\'Ed et Lorraine Warren, enquêteurs paranormaux réputés dans le monde entier, venus en aide à une famille terrorisée par une présence inquiétante dans leur ferme isolée… Contraints d\'affronter une créature démoniaque d\'une force redoutable, les Warren se retrouvent face à l\'affaire la plus terrifiante de leur carrière…', 'https://www.youtube.com/embed/Mkf9rGLXeuE', 'https://www.youtube.com/embed/8q82DRVRIL0'),
(5, 3, 'Retour vers le futur', 'Film', 'Publié', '1985-10-30', '1985. Le jeune Marty McFly mène une existence anonyme auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycée. Ami de l\'excentrique professeur Emmett Brown, il l\'accompagne un soir tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d\'armes débarquent et assassinent le scientifique. Marty se réfugie dans la voiture et se retrouve transporté en 1955. Là, il empêche malgré lui la rencontre de ses parents, et doit tout faire pour les remettre ensemble, sous peine de ne pouvoir exister...', 'https://www.youtube.com/embed/cU5BREZ9ke0', 'https://www.youtube.com/embed/mzieT_WUAHg');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `season` varchar(255) DEFAULT NULL,
  `episode` varchar(255) DEFAULT NULL,
  `episode_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `title`, `season`, `episode`, `episode_url`) VALUES
(1, 'Umbrella Academy', '1', '1', 'https://www.youtube.com/embed/l6EJ0XzKUaQ'),
(2, 'Umbrella Academy', '1', '2', 'https://www.youtube.com/embed/awUeEdIrVdg'),
(3, 'Umbrella Academy', '1', '3', 'https://www.youtube.com/embed/oT-ayC_n3dw'),
(4, 'Umbrella Academy', '2', '1', 'https://www.youtube.com/embed/QGAlNkI3mJQ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `confirm_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `active`, `confirm_key`) VALUES
(59, 'coding@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0, '1689682732947348968'),
(60, 'ivann.galic@edu.itescia.fr', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 1, '2987299663705928367');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
