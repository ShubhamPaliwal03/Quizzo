-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 07:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ques_id` int(11) NOT NULL,
  `ques` varchar(300) NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `d` varchar(50) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `explanation` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ques_id`, `ques`, `a`, `b`, `c`, `d`, `answer`, `explanation`) VALUES
(1, 'What is the capital of India?', 'Mumbai', 'Pakistan', 'New Jersey', 'New Delhi', 'd', 'New Delhi is the capital of India.'),
(7, 'What is the smallest unit of life?', 'Cell', 'Tissue', 'Organ', 'Bone', 'a', 'Explanation: Cells are the fundamental unit of life and all living things are made up of one or more cells.'),
(8, 'Which of these is NOT a primary color?', 'Red', 'Yellow', 'Green', 'Purple', 'd', 'Red, yellow, and blue are the primary colors, which can be mixed to create other colors. Purple is a secondary color, made by mixing red and blue.'),
(9, 'The study of weather is called:', 'Geology', 'Meteorology', 'Biology', 'Chemistry', 'b', 'Meteorology is the branch of science concerned with the atmosphere and its weather conditions.'),
(10, 'What is the part of a plant that absorbs sunlight for photosynthesis?', 'Roots', 'Stem', 'Leaves', 'Flowers', 'c', 'Leaves contain chlorophyll, a pigment that absorbs sunlight for photosynthesis, the process by which plants make their own food.'),
(11, 'The internet is an example of what kind of technology?', 'Mechanical', 'Communication', 'Medical', 'Agricultural', 'b', 'The internet is a global network of interconnected computer networks that allows communication and information sharing.'),
(12, 'What is the device that measures temperature?', 'Microscope', 'Thermometer', 'Telescope', 'Calculator', 'b', 'A thermometer is an instrument used to measure temperature.'),
(13, 'The process of changing a liquid into a gas is called?', 'Condensation', 'Evaporation', 'Precipitation', 'Freezing', 'b', 'Evaporation is the process by which a liquid changes into a gas.'),
(14, 'What is the largest planet in our solar system?', 'Earth', 'Mars', 'Jupiter', 'Venus', 'c', 'Jupiter is the largest planet in our solar system, with a diameter more than 11 times that of Earth.'),
(15, 'What does CPU stand for in computers?', 'Central Processing Unit', 'Computerized Processing Unit', 'Connecting Power Unit', 'Central Power User', 'a', 'CPU, or Central Processing Unit, is the brain of a computer, responsible for processing instructions and data.'),
(16, 'What kind of material allows electricity to flow through it easily?', 'Plastic', 'Conductor', 'Insulator', 'Wood', 'b', 'Conductors are materials that allow electricity to flow through them easily, while insulators prevent electricity flow.'),
(17, 'Which of these is a social media platform?', 'Email', 'GPS', 'Printer', 'Calculator', 'a', 'Email and social media platforms like Facebook or Twitter allow communication and sharing of information.'),
(18, 'What is the process of changing a gas into a liquid called?', 'Evaporation', 'Condensation', 'Precipitation', 'Boiling', 'b', 'Condensation is the process by which a gas changes into a liquid.'),
(19, 'The scientific study of insects is called:', 'Ornithology (study of birds)', 'Entomology', 'Herpetology (study of reptiles)', 'Ichthyology (study of fish)', 'b', 'Entomology is the scientific study of insects.'),
(20, 'What is the device that shows us images of very small objects?', 'Telescope (for distant objects)', 'Microscope', 'X-ray machine', 'Calculator', 'b', 'A microscope is an instrument that allows us to see magnified images of very small objects.');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `ques_id` int(11) NOT NULL,
  `selected_answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`ques_id`, `selected_answer`) VALUES
(1, 'n'),
(7, 'n'),
(8, 'n'),
(9, 'n'),
(10, 'n'),
(11, 'n'),
(12, 'n'),
(13, 'n'),
(14, 'n'),
(15, 'n'),
(16, 'n'),
(17, 'n'),
(18, 'n'),
(19, 'n'),
(20, 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ques_id`),
  ADD UNIQUE KEY `ques` (`ques`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`ques_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
