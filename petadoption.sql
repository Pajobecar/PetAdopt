-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 12:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petadoption`
--
CREATE DATABASE IF NOT EXISTS `petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230417080801', '2023-04-17 10:08:19', 29),
('DoctrineMigrations\\Version20230422115531', '2023-04-22 13:55:49', 183),
('DoctrineMigrations\\Version20230424081059', '2023-04-24 10:11:13', 79);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `species` varchar(100) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `needs` varchar(100) NOT NULL,
  `adopted_bz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id`, `name`, `species`, `breed`, `age`, `location`, `image`, `status`, `description`, `needs`, `adopted_bz_id`) VALUES
(1, 'Fluffy', 'Cat', 'Persian', 2, 'New York', 'animal.jpg', 'Adopted', 'A cute and cuddly Persian cat.', 'Regular grooming needed.', 5),
(2, 'Max', 'Dog', 'Golden Retriever', 3, 'Los Angeles', 'max.jpg', 'Adopted', 'A loyal and friendly Golden Retriever.', 'Requires daily exercise.', NULL),
(3, 'Luna', 'Snake', 'Siamese', 1, 'Chicago', 'luna1.jpg', 'Adopted', 'A beautiful Siamese Snake with blue eyes.', 'Loves to play with toys.', 5),
(4, 'Buddy', 'Rabbit', 'Lionhead', 4, 'San Francisco', 'buddy.jpg', 'Adopted', 'A gentle and obedient Rabbit.', 'Loves to swim.', NULL),
(5, 'Mittens', 'Fish', 'Goldfish', 5, 'Seattle', 'mittens.jpg', 'Adopted', 'A spunky and adventurous Goldfish.', 'Loves to explore new places.', 5),
(6, 'Charlie', 'Parrot', 'Red Parrot', 2, 'Miami', 'charlie.jpg', 'Adopted', 'A cute and curly Parrot.', 'Requires regular grooming.', 5),
(7, 'Whiskers', 'Turtle', 'Big Turtle', 3, 'Denver', 'whiskers.jpg', 'Available', 'A friendly Turtle with a unique pattern.', 'Loves to cuddle.', NULL),
(8, 'Duke', 'Cat', 'Persian', 1, 'Houston', 'duke.jpg', 'Available', 'A brave and loyal Persian.', 'Needs daily training.', NULL),
(9, 'Socks', 'Hamster ', 'Syrian', 2, 'Portland', 'socks.jpg', 'Available', 'A playful and energetic Tuxedo Hamster.', 'Loves to chase toys.', NULL),
(10, 'Rocky', 'Bird ', 'Lovebird', 4, 'Dallas', 'rocky.jpg', 'Adopted', 'A strong and playful Lovebird.', 'Loves to play fetch.', NULL),
(11, 'Gizmo', 'Hedgehog ', 'Algerian', 1, 'Las Vegas', 'gizmo.jpg', 'Available', 'A unique and hairless Sphynx Hedgehog.', 'Needs regular baths.', NULL),
(12, 'Bailey', 'Gerbil ', 'Mongolian', 5, 'Atlanta', 'bailey.jpg', 'Available', 'A curious and friendly Mongolian.', 'Loves to follow scents.', NULL),
(13, 'Cleo', 'Tarantula ', 'Chilean Rose', 2, 'Boston', 'cleo.jpg', 'Adopted', 'A quiet and independent Chilean Rose Tarantula.', 'Loves to lounge.', NULL),
(14, 'Cooper', 'Axolotl ', 'Melanoid', 3, 'Phoenix', 'cooper.jpg', 'Available', 'A cute and wrinkly Melanoid.', 'Needs daily walks.', NULL),
(15, 'Tiger', 'Sugar glider', 'Leucistic', 4, 'San Diego', 'sugar.jpg', 'Available', 'A wild and exotic Leucistic Sugar glider.', 'Needs lots of playtime.', NULL),
(16, 'Molly', 'Guinea pig', 'Abyssinian', 2, 'Austin', 'molly.jpg', 'Adopted', 'A tiny and spunky Abyssinian.', 'Loves to cuddle.', NULL),
(17, 'Oreo', 'Lizard ', 'Crested Gecko', 3, 'New Orleans', 'oreo.jpg', 'Available', 'A cuteand friendly Crested Gecko Lizard.', 'Loves to play with string.', NULL),
(18, 'Zeus', 'Dog', 'Rottweiler', 4, 'Washington D.C.', 'zeus.jpg', 'Available', 'A powerful and protective Rottweiler.', 'Needs experienced owner.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pet_user`
--

CREATE TABLE `pet_user` (
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `fname`, `lname`, `gender`, `city`, `bdate`, `image`) VALUES
(3, 'admin@gmail.com', '[]', '$2y$13$0s/Qu.k0wCQIo5NQcyjqNOV758/9pdysToLWIgBY6zpWfcg.Y8iae', 'admin', 'Aadmin', 'M', 'Vienna', '2018-01-01', ''),
(5, 'adminn@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$mMCj2djHeBjUKSp3ANO.BetqcgA3VPMYNtOFMAK4/ayLUUPH3MdbC', 'admin', 'Aadmin', 'M', 'Vienna', '2018-01-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_pet`
--

CREATE TABLE `user_pet` (
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_pet`
--

INSERT INTO `user_pet` (`user_id`, `pet_id`) VALUES
(5, 1),
(5, 3),
(5, 6),
(5, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E4529B85B35636D` (`adopted_bz_id`);

--
-- Indexes for table `pet_user`
--
ALTER TABLE `pet_user`
  ADD PRIMARY KEY (`pet_id`,`user_id`),
  ADD KEY `IDX_96DB3323966F7FB6` (`pet_id`),
  ADD KEY `IDX_96DB3323A76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indexes for table `user_pet`
--
ALTER TABLE `user_pet`
  ADD PRIMARY KEY (`user_id`,`pet_id`),
  ADD KEY `IDX_F44FA0EA76ED395` (`user_id`),
  ADD KEY `IDX_F44FA0E966F7FB6` (`pet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `FK_E4529B85B35636D` FOREIGN KEY (`adopted_bz_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `pet_user`
--
ALTER TABLE `pet_user`
  ADD CONSTRAINT `FK_96DB3323966F7FB6` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_96DB3323A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_pet`
--
ALTER TABLE `user_pet`
  ADD CONSTRAINT `FK_F44FA0E966F7FB6` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F44FA0EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
