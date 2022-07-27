-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 05:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_quiz_questions`
--

CREATE TABLE `mst_quiz_questions` (
  `question_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_quiz_questions`
--

INSERT INTO `mst_quiz_questions` (`question_id`, `question`, `level_id`, `subject_id`, `create_date`, `update_date`, `is_active`) VALUES
(1, 'What is the world record time for the 100 metres?', 1, 1, '2022-07-25 13:07:12', NULL, 1),
(2, 'How many regulation strokes are there in swimming?', 1, 1, '2022-07-25 13:07:12', NULL, 1),
(3, 'What sport is described as “the beautiful game?', 1, 1, '2022-07-25 13:07:12', NULL, 1),
(4, 'What five colours make up the Olympic rings?', 1, 1, '2022-07-25 13:07:12', NULL, 1),
(5, 'In which sport do teams compete to win the Stanley Cup?', 2, 1, '2022-07-25 13:07:12', NULL, 1),
(6, 'Which country won the first ever football world cup?', 2, 1, '2022-07-25 13:07:12', NULL, 1),
(7, 'The Chicago Cubs and Boston Red Sox play which sport?', 2, 1, '2022-07-25 13:07:12', NULL, 1),
(8, 'What is the maximum break you can score in snooker?', 3, 1, '2022-07-25 13:07:12', NULL, 1),
(9, 'What is Canada’s national sport?', 3, 1, '2022-07-25 13:07:12', NULL, 1),
(10, 'Which Formula 1 driver has won the most races in the history of the sport?', 3, 1, '2022-07-25 13:07:12', NULL, 1),
(11, 'The scientists released world’s smallest stop motion film called ‘A Boy and His Atom’ by', 1, 2, '2022-07-27 15:27:03', NULL, 1),
(12, 'Which country launched first ever deep UV laser device?', 1, 2, '2022-07-27 15:27:03', NULL, 1),
(13, 'Which of the following waves are used for telecommunication?', 1, 2, '2022-07-27 15:27:03', NULL, 1),
(14, 'NASA recently marks 10th anniversary of space shuttle disaster of', 1, 2, '2022-07-27 15:27:03', NULL, 1),
(15, 'ISRO’s 100th space mission completed by the launch of', 2, 2, '2022-07-27 15:27:03', NULL, 1),
(16, 'Study of life in outer space is', 2, 2, '2022-07-27 15:27:03', NULL, 1),
(17, 'The oldest super predator living on earth discovered was the', 2, 2, '2022-07-27 15:27:03', NULL, 1),
(18, 'On January 5, 2014 India launched which satellite?', 3, 2, '2022-07-27 15:27:03', NULL, 1),
(19, 'In January, 2014, a gray whale species has been found in', 3, 2, '2022-07-27 15:27:03', NULL, 1),
(20, 'Inventor and founder of www is', 3, 2, '2022-07-27 15:27:03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_quiz_question_options`
--

CREATE TABLE `mst_quiz_question_options` (
  `option_id` int(11) NOT NULL,
  `voption` varchar(500) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_correct` tinyint(4) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_quiz_question_options`
--

INSERT INTO `mst_quiz_question_options` (`option_id`, `voption`, `question_id`, `is_correct`, `create_date`, `update_date`, `is_active`) VALUES
(1, '9.58 seconds', 1, 1, '2022-07-25 13:07:12', NULL, 1),
(2, '9.50 seconds', 1, 0, '2022-07-25 13:07:12', NULL, 1),
(3, '9.52 seconds', 1, 0, '2022-07-25 13:07:12', NULL, 1),
(4, '9.40 seconds', 1, 0, '2022-07-25 13:07:12', NULL, 1),
(5, '5', 2, 0, '2022-07-25 13:07:12', NULL, 1),
(6, '4', 2, 1, '2022-07-25 13:07:12', NULL, 1),
(7, '2', 2, 0, '2022-07-25 13:07:12', NULL, 1),
(8, '1', 2, 0, '2022-07-25 13:07:12', NULL, 1),
(9, 'Golf', 3, 0, '2022-07-25 13:07:12', NULL, 1),
(10, 'Tennis', 3, 0, '2022-07-25 13:07:12', NULL, 1),
(11, 'Cricket', 3, 0, '2022-07-25 13:07:12', NULL, 1),
(12, 'Football', 3, 1, '2022-07-25 13:07:12', NULL, 1),
(13, 'Blue, black, green, red and yellow', 4, 1, '2022-07-25 13:07:12', NULL, 1),
(14, 'Blue, black, green, red and orange', 4, 0, '2022-07-25 13:07:12', NULL, 1),
(15, 'Pink, black, green, red and yellow.', 4, 0, '2022-07-25 13:07:12', NULL, 1),
(16, 'Blue, white, green, red and yellow', 4, 0, '2022-07-25 13:07:12', NULL, 1),
(17, 'Women\'s ice hockey', 5, 0, '2022-07-25 13:07:12', NULL, 1),
(18, 'Men\'s ice hockey', 5, 1, '2022-07-25 13:07:12', NULL, 1),
(19, 'Men\'s tennis', 5, 0, '2022-07-25 13:07:12', NULL, 1),
(20, 'Women\'s tennis', 5, 0, '2022-07-25 13:07:12', NULL, 1),
(21, 'Germany', 6, 0, '2022-07-25 13:07:12', NULL, 1),
(22, 'Brazil', 6, 0, '2022-07-25 13:07:12', NULL, 1),
(23, 'India', 6, 0, '2022-07-25 13:07:12', NULL, 1),
(24, 'Uruguay', 6, 1, '2022-07-25 13:07:12', NULL, 1),
(25, 'Basketball', 7, 0, '2022-07-25 13:07:12', NULL, 1),
(26, 'Baseball', 7, 1, '2022-07-25 13:07:12', NULL, 1),
(27, 'Tennis', 7, 0, '2022-07-25 13:07:12', NULL, 1),
(28, 'Golf', 7, 0, '2022-07-25 13:07:12', NULL, 1),
(29, '125', 8, 0, '2022-07-25 13:07:12', NULL, 1),
(30, '182', 8, 0, '2022-07-25 13:07:12', NULL, 1),
(31, '120', 8, 0, '2022-07-25 13:07:12', NULL, 1),
(32, '147', 8, 1, '2022-07-25 13:07:12', NULL, 1),
(33, 'Hockey', 9, 0, '2022-07-25 13:07:12', NULL, 1),
(34, 'Golf', 9, 0, '2022-07-25 13:07:12', NULL, 1),
(35, 'Lacrosse', 9, 1, '2022-07-25 13:07:12', NULL, 1),
(36, 'Tennis', 9, 0, '2022-07-25 13:07:12', NULL, 1),
(37, 'Michael Schumacher', 10, 0, '2022-07-25 13:07:12', NULL, 1),
(38, 'Lewis Hamilton', 10, 1, '2022-07-25 13:07:12', NULL, 1),
(39, 'Sebastian Vettel', 10, 0, '2022-07-25 13:07:12', NULL, 1),
(40, 'Alain Prost', 10, 0, '2022-07-25 13:07:12', NULL, 1),
(41, 'IBN', 11, 1, '2022-07-27 15:41:07', NULL, 1),
(42, 'Microsoft', 11, 0, '2022-07-27 15:41:07', NULL, 1),
(43, 'Amazon', 11, 0, '2022-07-27 15:41:07', NULL, 1),
(44, 'Google', 11, 0, '2022-07-27 15:41:07', NULL, 1),
(45, 'Canada', 12, 0, '2022-07-27 15:41:07', NULL, 1),
(46, 'USA', 12, 0, '2022-07-27 15:41:07', NULL, 1),
(47, 'UK', 12, 0, '2022-07-27 15:41:07', NULL, 1),
(48, 'China', 12, 1, '2022-07-27 15:41:07', NULL, 1),
(49, 'Infra red rays', 13, 0, '2022-07-27 15:41:07', NULL, 1),
(50, 'Micro waves', 13, 1, '2022-07-27 15:41:07', NULL, 1),
(51, 'X-rays', 13, 0, '2022-07-27 15:41:07', NULL, 1),
(52, 'Ultra violet rays', 13, 0, '2022-07-27 15:41:07', NULL, 1),
(53, 'Phoenix', 14, 0, '2022-07-27 15:41:07', NULL, 1),
(54, 'Avenger', 14, 0, '2022-07-27 15:41:07', NULL, 1),
(55, 'Columbia', 14, 1, '2022-07-27 15:41:07', NULL, 1),
(56, 'Discovery', 14, 0, '2022-07-27 15:41:07', NULL, 1),
(57, 'PSLVC-21', 15, 1, '2022-07-27 15:41:07', NULL, 1),
(58, 'PSLVC-20', 15, 0, '2022-07-27 15:41:07', NULL, 1),
(59, 'PSLVC-22', 15, 0, '2022-07-27 15:41:07', NULL, 1),
(60, 'PSLVC-27', 15, 0, '2022-07-27 15:41:07', NULL, 1),
(61, 'Entro biology', 16, 0, '2022-07-27 15:41:07', NULL, 1),
(62, 'Endo biology', 16, 0, '2022-07-27 15:41:07', NULL, 1),
(63, 'Exobiology', 16, 1, '2022-07-27 15:41:07', NULL, 1),
(64, 'Neo biology', 16, 0, '2022-07-27 15:41:07', NULL, 1),
(65, 'Yellow Whale', 17, 0, '2022-07-27 15:41:07', NULL, 1),
(66, 'Marine Cobra', 17, 0, '2022-07-27 15:41:07', NULL, 1),
(67, 'Blue Dolphin', 17, 0, '2022-07-27 15:41:07', NULL, 1),
(68, 'Marine crocodile', 17, 1, '2022-07-27 15:41:07', NULL, 1),
(69, 'GSAT-14', 18, 1, '2022-07-27 15:41:07', NULL, 1),
(70, 'GSAT-10', 18, 0, '2022-07-27 15:41:07', NULL, 1),
(71, 'PSLU-C22', 18, 0, '2022-07-27 15:41:07', NULL, 1),
(72, 'INSAT-3D', 18, 0, '2022-07-27 15:41:07', NULL, 1),
(73, 'Peru', 19, 0, '2022-07-27 15:41:07', NULL, 1),
(74, 'Korea', 19, 0, '2022-07-27 15:41:07', NULL, 1),
(75, 'Indonesia', 19, 0, '2022-07-27 15:41:07', NULL, 1),
(76, 'Baja California', 19, 1, '2022-07-27 15:41:07', NULL, 1),
(77, 'Lee N. Fiyong', 20, 0, '2022-07-27 15:41:07', NULL, 1),
(78, 'N.Russell', 20, 0, '2022-07-27 15:41:07', NULL, 1),
(79, 'Tim Burners Lee', 20, 1, '2022-07-27 15:41:07', NULL, 1),
(80, ' Bill Gates', 20, 0, '2022-07-27 15:41:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_quiz_subjects`
--

CREATE TABLE `mst_quiz_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_quiz_subjects`
--

INSERT INTO `mst_quiz_subjects` (`subject_id`, `subject`, `create_date`, `update_date`, `is_active`) VALUES
(1, 'Sports', '2022-07-25 13:07:11', NULL, 1),
(2, 'Science & Technology', '2022-07-25 13:07:11', NULL, 1),
(3, 'Arts', '2022-07-25 13:07:11', NULL, 1),
(4, 'Politics', '2022-07-25 13:07:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_subject_levels`
--

CREATE TABLE `mst_subject_levels` (
  `level_id` int(11) NOT NULL,
  `vlevel` varchar(100) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_subject_levels`
--

INSERT INTO `mst_subject_levels` (`level_id`, `vlevel`, `create_date`, `update_date`, `is_active`) VALUES
(1, 'Beginner', '2022-07-25 13:07:11', NULL, 1),
(2, 'Intermediate', '2022-07-25 13:07:11', NULL, 1),
(3, 'Professional', '2022-07-25 13:07:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_quiz_attempts`
--

CREATE TABLE `trn_quiz_attempts` (
  `attempt_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_quiz_attempts`
--

INSERT INTO `trn_quiz_attempts` (`attempt_id`, `user_name`, `user_email`, `score`, `subject_id`, `create_date`, `is_active`) VALUES
(3, 'Satish Damodaran', 'satish.j.damodaran@gmail.com', 0, 1, '2022-07-27 13:06:03', 1),
(4, 'Satish Damodaran', 'satish.j.damodaran@gmail.com', 0, 1, '2022-07-27 13:18:36', 1),
(5, 'Satish Damodaran', 'satish.j.damodaran@gmail.com', 0, 1, '2022-07-27 13:29:46', 1),
(7, 'Satish Damodaran', 'satish.j.damodaran@gmail.com', 0, 1, '2022-07-27 15:07:13', 1),
(8, 'Satish Damodaran', 'satish.j.damodaran@gmail.com', 6, 1, '2022-07-27 15:11:06', 1),
(10, 'Satish Damodaran', 'satish.j.damodaran@gmail.com', 3, 1, '2022-07-27 15:13:11', 1),
(12, 'testing2 test', 'testing0415048@gmail.com', 2, 2, '2022-07-27 20:46:43', 1),
(13, 'testing2 test', 'testing0415048@gmail.com', 0, 2, '2022-07-27 20:48:57', 1),
(14, 'testing2 test', 'testing0415048@gmail.com', 3, 1, '2022-07-27 20:49:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_quiz_attempt_answers`
--

CREATE TABLE `trn_quiz_attempt_answers` (
  `answers_id` int(11) NOT NULL,
  `attempt_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_quiz_attempt_answers`
--

INSERT INTO `trn_quiz_attempt_answers` (`answers_id`, `attempt_id`, `question_id`, `option_id`, `create_date`, `is_active`) VALUES
(1, 7, 1, 2, '2022-07-27 15:08:26', 1),
(2, 7, 2, 8, '2022-07-27 15:08:26', 1),
(3, 7, 3, 12, '2022-07-27 15:08:26', 1),
(4, 7, 4, 14, '2022-07-27 15:08:26', 1),
(5, 7, 5, 18, '2022-07-27 15:08:26', 1),
(6, 7, 6, 24, '2022-07-27 15:08:26', 1),
(7, 7, 7, 26, '2022-07-27 15:08:26', 1),
(8, 7, 8, 30, '2022-07-27 15:08:26', 1),
(9, 7, 9, 33, '2022-07-27 15:08:26', 1),
(10, 7, 10, 38, '2022-07-27 15:08:26', 1),
(11, 8, 1, 1, '2022-07-27 15:12:12', 1),
(12, 8, 2, 7, '2022-07-27 15:12:12', 1),
(13, 8, 3, 12, '2022-07-27 15:12:12', 1),
(14, 8, 4, 16, '2022-07-27 15:12:12', 1),
(15, 8, 5, 18, '2022-07-27 15:12:12', 1),
(16, 8, 6, 24, '2022-07-27 15:12:12', 1),
(17, 8, 7, 26, '2022-07-27 15:12:12', 1),
(18, 8, 8, 30, '2022-07-27 15:12:12', 1),
(19, 8, 9, 35, '2022-07-27 15:12:12', 1),
(20, 8, 10, 38, '2022-07-27 15:12:12', 1),
(21, 10, 1, 4, '2022-07-27 15:13:54', 1),
(22, 10, 2, 8, '2022-07-27 15:13:54', 1),
(23, 10, 3, 11, '2022-07-27 15:13:54', 1),
(24, 10, 4, 15, '2022-07-27 15:13:54', 1),
(25, 10, 5, 19, '2022-07-27 15:13:54', 1),
(26, 10, 6, 24, '2022-07-27 15:13:54', 1),
(27, 10, 7, 28, '2022-07-27 15:13:54', 1),
(28, 10, 8, 31, '2022-07-27 15:13:54', 1),
(29, 10, 9, 35, '2022-07-27 15:13:54', 1),
(30, 10, 10, 38, '2022-07-27 15:13:54', 1),
(31, 12, 11, 41, '2022-07-27 20:47:38', 1),
(32, 12, 12, 46, '2022-07-27 20:47:38', 1),
(33, 12, 14, 53, '2022-07-27 20:47:38', 1),
(34, 12, 16, 64, '2022-07-27 20:47:38', 1),
(35, 12, 15, 60, '2022-07-27 20:47:38', 1),
(36, 12, 13, 51, '2022-07-27 20:47:38', 1),
(37, 12, 17, 65, '2022-07-27 20:47:38', 1),
(38, 12, 18, 71, '2022-07-27 20:47:38', 1),
(39, 12, 19, 74, '2022-07-27 20:47:38', 1),
(40, 12, 20, 79, '2022-07-27 20:47:38', 1),
(41, 14, 1, 1, '2022-07-27 20:51:32', 1),
(42, 14, 2, 8, '2022-07-27 20:51:32', 1),
(43, 14, 3, 12, '2022-07-27 20:51:32', 1),
(44, 14, 4, 16, '2022-07-27 20:51:32', 1),
(45, 14, 5, 17, '2022-07-27 20:51:32', 1),
(46, 14, 6, 21, '2022-07-27 20:51:32', 1),
(47, 14, 7, 27, '2022-07-27 20:51:32', 1),
(48, 14, 8, 29, '2022-07-27 20:51:32', 1),
(49, 14, 9, 36, '2022-07-27 20:51:32', 1),
(50, 14, 10, 38, '2022-07-27 20:51:32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_quiz_questions`
--
ALTER TABLE `mst_quiz_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `mst_quiz_question_options`
--
ALTER TABLE `mst_quiz_question_options`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `mst_quiz_subjects`
--
ALTER TABLE `mst_quiz_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `mst_subject_levels`
--
ALTER TABLE `mst_subject_levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `trn_quiz_attempts`
--
ALTER TABLE `trn_quiz_attempts`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `trn_quiz_attempt_answers`
--
ALTER TABLE `trn_quiz_attempt_answers`
  ADD PRIMARY KEY (`answers_id`),
  ADD KEY `option_id` (`option_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `attempt_id` (`attempt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_quiz_questions`
--
ALTER TABLE `mst_quiz_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mst_quiz_question_options`
--
ALTER TABLE `mst_quiz_question_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `mst_quiz_subjects`
--
ALTER TABLE `mst_quiz_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_subject_levels`
--
ALTER TABLE `mst_subject_levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trn_quiz_attempts`
--
ALTER TABLE `trn_quiz_attempts`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trn_quiz_attempt_answers`
--
ALTER TABLE `trn_quiz_attempt_answers`
  MODIFY `answers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_quiz_questions`
--
ALTER TABLE `mst_quiz_questions`
  ADD CONSTRAINT `mst_quiz_questions_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `mst_subject_levels` (`level_id`),
  ADD CONSTRAINT `mst_quiz_questions_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `mst_quiz_subjects` (`subject_id`);

--
-- Constraints for table `mst_quiz_question_options`
--
ALTER TABLE `mst_quiz_question_options`
  ADD CONSTRAINT `mst_quiz_question_options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `mst_quiz_questions` (`question_id`);

--
-- Constraints for table `trn_quiz_attempts`
--
ALTER TABLE `trn_quiz_attempts`
  ADD CONSTRAINT `trn_quiz_attempts_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `mst_quiz_subjects` (`subject_id`);

--
-- Constraints for table `trn_quiz_attempt_answers`
--
ALTER TABLE `trn_quiz_attempt_answers`
  ADD CONSTRAINT `trn_quiz_attempt_answers_ibfk_1` FOREIGN KEY (`option_id`) REFERENCES `mst_quiz_question_options` (`option_id`),
  ADD CONSTRAINT `trn_quiz_attempt_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `mst_quiz_questions` (`question_id`),
  ADD CONSTRAINT `trn_quiz_attempt_answers_ibfk_3` FOREIGN KEY (`attempt_id`) REFERENCES `trn_quiz_attempts` (`attempt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
