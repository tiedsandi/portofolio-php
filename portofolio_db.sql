-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 03:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `education_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `education_name`, `start_date`, `finish_date`, `content`) VALUES
(2, 'Master Degree', '2025-03-03', '2025-03-26', '<div style=\"line-height: 24px;\">Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</div>'),
(3, 'Bachelor Degree', '2025-02-25', '2025-03-25', '<div style=\"line-height: 24px;\">Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</div>'),
(4, 'Associate Degree', '2025-02-25', '2025-03-14', '<p>Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `experience_name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `experience_name`, `position`, `location`, `start_date`, `finish_date`, `content`) VALUES
(3, 'Codex Solution', 'Project Manager', 'San Francisco, CA', '2025-03-04', '2025-03-12', '<p>Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</p>'),
(4, 'Soft Solution Ltd', 'Web Developer', 'San Francisco, CA', '2025-03-04', '2025-03-18', '<div>Langkah-langkah roll depan dimulai dengan&nbsp;</div><ol><li><mark class=\"QVRyCf\" style=\"border-radius: 4px; padding: 0px 2px;\">posisi jongkok, </mark></li><li><mark class=\"QVRyCf\" style=\"border-radius: 4px; padding: 0px 2px;\">kedua tangan di depan, </mark></li><li><mark class=\"QVRyCf\" style=\"border-radius: 4px; padding: 0px 2px;\">lalu tekuk lutut dan dorong badan ke depan, </mark></li><li><mark class=\"QVRyCf\" style=\"border-radius: 4px; padding: 0px 2px;\">letakkan pundak di matras, berguling ke depan, </mark></li><li><mark class=\"QVRyCf\" style=\"border-radius: 4px; padding: 0px 2px;\">dan akhiri dengan posisi jongkok</mark></li></ol><p></p>'),
(5, 'ABC Soft Ltd', 'Web Designer', 'San Francisco, CA', '2025-02-25', '2025-03-19', '<p>Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `messages` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `reply_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `link_preview` varchar(100) NOT NULL,
  `link_repository` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `id_type`, `project_name`, `link_preview`, `link_repository`, `photo`) VALUES
(5, 7, 'Warteg 88', 'http://localhost/portofolio-php/', 'https://www.youtube.com/', '67e0077860149_es teh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `description`, `icon`) VALUES
(2, 'Digital Marketing', '<p>testingngn</p>', 'fa-envelope-open-text'),
(3, ' Web Design', '<div style=\"line-height: 24px;\">Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</div>', 'fa-desktop'),
(4, 'Web Development', '<div style=\"line-height: 24px;\">Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</div>', 'fa-laptop'),
(5, 'SEO', '<p>Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</p>', 'fa-search');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(50) NOT NULL,
  `level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `level`) VALUES
(2, 'React JS', 31),
(3, 'PHP', 30),
(4, 'Laravel', 68);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`) VALUES
(7, 'Frontend'),
(8, 'Backend'),
(9, 'Fullstack');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
