-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 juin 2025 à 13:51
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hallane`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(1, 'adnane887@gmail.com', '$2y$10$R7kUcD4Nbqqq8TCr4eyUrOL6zl79d.ymWYeO2p5paOtfBJMPTbBEy');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`user_id`, `username`, `email`, `password`) VALUES
(6, 'ayoub', 'ayoub@gmail.com', '$2y$10$BaraZm9WdYUsTg9U13izDuV5SGryLKqgUslWhNqInjbcEL.CoXBsa'),
(7, 'lokas', 'lokas@gmail.com', '$2y$10$sCtjOOW6n0Yjr5ukver8V.jpl2wPCLUd5qwkWEekbPjz5/HRp3sfW');

-- --------------------------------------------------------

--
-- Structure de la table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `arabic_title` varchar(255) DEFAULT NULL,
  `arabic_description` varchar(1000) DEFAULT NULL,
  `arabic_local` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `arabic_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hall`
--

INSERT INTO `hall` (`hall_id`, `title`, `description`, `capacity`, `local`, `price`, `image`, `arabic_title`, `arabic_description`, `arabic_local`, `time`, `arabic_time`) VALUES
(1, 'main hall', 'A spacious and versatile venue ideal for various events and gatherings. Features comfortable seating, a prominent stage, excellent lighting, and quality sound system to enhance presentations and performances.', 500, 'Tangier,iberia', 4000, 'main.png', 'القاعة الرئيسية\r\n\r\n', 'مكان واسع ومتعدد الاستخدامات، مثالي لمختلف الفعاليات والاجتماعات. يتميز بمقاعد مريحة، ومنصة بارزة، وإضاءة ممتازة، ونظام صوت عالي الجودة لتعزيز العروض والعروض الأدائية.\r\n\r\n', 'طنجة، إيبيريا', '1/DAY', '1/يوم'),
(2, 'meeting hall', 'A modern and quiet space ideal for meetings, workshops, and business events. Equipped with high-speed Wi-Fi, projector, screen, whiteboard, and sound system.', 14, 'Tangier,Gueznaia', 500, 'meeting.png', 'قاعة الاجتماعات', 'مساحة عصرية وهادئة مثالية للاجتماعات وورش العمل وفعاليات الأعمال. مجهزة بشبكة واي فاي عالية السرعة، وجهاز عرض، وشاشة، ولوحة بيضاء، ونظام صوت.', 'طنجة، جزناية', '1/DAY', '1/يوم'),
(3, 'Birthday Hall', 'A cheerful and colorful venue ideal for birthday parties of all ages. Includes decoration options, sound system, and a fun atmosphere for unforgettable celebrations.', 40, 'tangier, Branes', 700, 'birthday.png', 'قاعة أعياد الميلاد', 'مكانٌ مُبهجٌ ومُبهج، مثاليٌّ لحفلات أعياد الميلاد لجميع الأعمار. يشمل خياراتٍ مُختلفة للديكور، ونظام صوت، وأجواءً مُمتعةً لاحتفالاتٍ لا تُنسى.', 'طنجة، برانص ', '1/day', '1/يوم '),
(4, 'Football hall', 'An indoor football hall with high-quality turf, perfect for friendly matches, training, or tournaments. Well-lit, ventilated, and designed for safety and performance.', 22, 'tangier, Dradeb', 300, 'football.png', 'صالة كرة القدم', 'صالة كرة قدم داخلية بعشب عالي الجودة، مثالية للمباريات الودية والتدريبات والبطولات. تتميز بإضاءة وتهوية جيدتين، ومصممة لضمان السلامة والأداء.', 'طنجة، درادب', '1/Hour', '1/ساعة'),
(5, 'sleep room', 'A stylish and hotel-like sleep hall offering modern comfort and privacy. Furnished with high-quality beds, elegant lighting, private bathrooms, and a relaxing ambiance. Perfect for overnight stays after events or long activities.', 2, 'tangier, Medina', 300, 'sleep.png', 'غرفة النوم', 'قاعة نوم أنيقة تُشبه الفنادق، تُوفر راحةً وخصوصيةً عصريتين. مُجهزة بأسرّة عالية الجودة، وإضاءة أنيقة، وحمامات خاصة، وأجواءً مُريحة. مثالية للمبيت بعد الفعاليات أو الأنشطة الطويلة.', 'طنجة، المدينة', '1/day', '1/يوم '),
(6, 'wedding hall', 'A beautiful and elegant venue perfect for weddings and receptions. Features luxurious décor, ambient lighting, premium sound system, and a stylish stage and dance floor.', 180, 'tangier, mister khouch', 5000, 'wedding.png', 'قاعة الزفاف', 'مكانٌ جميلٌ وأنيقٌ مثاليٌّ لحفلات الزفاف والاستقبال. يتميز بديكورٍ فاخر، وإضاءةٍ محيطة، ونظام صوتٍ فاخر، ومسرحٍ أنيقٍ وحلبةِ رقص.', 'طنجة، مسترخوش', '1/day', '1/يوم ');

-- --------------------------------------------------------

--
-- Structure de la table `reserve`
--

CREATE TABLE `reserve` (
  `id_reserve` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reserve`
--

INSERT INTO `reserve` (`id_reserve`, `first_name`, `number`, `email`, `hall_id`, `client_id`, `date`, `last_name`) VALUES
(1, 'ADNANE', '+212688199181', 'adnane@gmail.com', 1, 1, '2025-06-18', 'KESKSU'),
(2, 'LOKAY', '078726272', 'lok@gmail.com', 6, 1, '2025-06-26', 'FIIT'),
(3, 'elmansoiri', '06756761', 'aymenel@gamail.com', 3, 1, '2025-07-03', 'ayman');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Index pour la table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_reserve`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
