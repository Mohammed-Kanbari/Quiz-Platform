-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 06:17 AM
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
-- Database: `aau_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `id` int(11) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`id`, `quiz_title`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 'Final', 'What is the value of Pi to two decimal places?', '3.12', '3.14', '3.16', '3.18', 2),
(2, 'Final', 'What is the hardest natural substance on Earth?', 'Gold', 'Iron', 'Diamond', 'Graphite', 3),
(3, 'Final', 'Which muscle is known as the strongest in the human body based on its weight?', 'Biceps', 'Quadriceps', 'Gluteus Maximus', 'Masseter', 4),
(4, 'Final', 'How many degrees are in a right angle?', '45', '90', '180', '360', 2),
(5, 'Final', 'Which layer of the Earth is liquid?', 'Crust', 'Mantle', 'Outer Core', 'Inner Core', 3),
(6, 'Final', 'Which exercise primarily works the pectoral muscles?', 'Squats', 'Push-ups', 'Lunges', 'Crunches', 2),
(7, 'Final', 'What is the formula for the area of a circle?', 'πr²', '2πr', 'πr', 'πd', 1),
(8, 'Final', 'What type of rock is formed from cooled lava or magma?', 'Sedimentary', 'Metamorphic', 'Igneous', 'Fossil', 3),
(9, 'Final', 'What is the primary muscle used in a bicep curl?', 'Tricep', 'Bicep', 'Deltoid', 'Latissimus Dorsi', 2),
(10, 'Final', 'What is the sum of the angles in a triangle?', '180 degrees', '360 degrees', '90 degrees', '270 degrees', 1);

-- --------------------------------------------------------

--
-- Table structure for table `midterm`
--

CREATE TABLE `midterm` (
  `id` int(11) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midterm`
--

INSERT INTO `midterm` (`id`, `quiz_title`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 'Midterm', 'What is 5 + 3?', '6', '7', '8', '9', 3),
(2, 'Midterm', 'What is the square root of 16?', '2', '3', '4', '5', 3),
(3, 'Midterm', 'What is 12 divided by 4?', '1', '2', '3', '4', 4),
(4, 'Midterm', 'What is the value of pi (π) to two decimal places?', '3.12', '3.13', '3.14', '3.15', 3),
(5, 'Midterm', 'What is the area of a triangle with base 5 and height 4?', '10', '20', '25', '15', 1),
(6, 'Midterm', 'What is 9 * 6?', '54', '56', '58', '60', 1),
(7, 'Midterm', 'What is the derivative of x^2?', 'x', '2x', 'x^2', '2x^2', 2),
(8, 'Midterm', 'What is 2^5?', '32', '16', '25', '64', 1),
(9, 'Midterm', 'What is the value of 7 factorial (7!)?', '720', '5040', '40320', '504', 2),
(10, 'Midterm', 'What is the sum of the angles in a triangle?', '90 degrees', '180 degrees', '270 degrees', '360 degrees', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz1`
--

CREATE TABLE `quiz1` (
  `id` int(11) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz1`
--

INSERT INTO `quiz1` (`id`, `quiz_title`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 'Quiz1', 'What is the primary muscle worked in a bench press exercise?', 'Biceps', 'Triceps', 'Pectorals', 'Deltoids', 3),
(2, 'Quiz1', 'Which exercise is best for strengthening the quadriceps?', 'Bicep curls', 'Squats', 'Deadlifts', 'Bench press', 2),
(3, 'Quiz1', 'How long should you rest between sets for muscle hypertrophy?', '30 seconds', '1-2 minutes', '3-5 minutes', '5-7 minutes', 2),
(4, 'Quiz1', 'What is the recommended daily protein intake for muscle building?', '0.5 grams per kg of body weight', '1.0 grams per kg of body weight', '1.6-2.2 grams per kg of body weight', '2.5 grams per kg of body weight', 3),
(5, 'Quiz1', 'Which piece of equipment is typically used for cardiovascular exercises?', 'Dumbbells', 'Kettlebells', 'Treadmill', 'Barbell', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quiz2`
--

CREATE TABLE `quiz2` (
  `id` int(11) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz2`
--

INSERT INTO `quiz2` (`id`, `quiz_title`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 'Quiz2', 'What is the approximate age of the Earth?', '4.5 billion years', '3.5 billion years', '2.5 billion years', '1.5 billion years', 1),
(2, 'Quiz2', 'Which layer of the Earth is the hottest?', 'Crust', 'Mantle', 'Outer Core', 'Inner Core', 4),
(3, 'Quiz2', 'What is the main gas in the Earth’s atmosphere?', 'Oxygen', 'Nitrogen', 'Carbon Dioxide', 'Hydrogen', 2),
(4, 'Quiz2', 'What is the longest river on Earth?', 'Amazon River', 'Nile River', 'Yangtze River', 'Mississippi River', 2),
(5, 'Quiz2', 'Which is the largest ocean on Earth?', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tips` text DEFAULT NULL,
  `totalquestions` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `total_marks`, `time_limit`, `description`, `tips`, `totalquestions`) VALUES
(1, 'Quiz1', 5, 10, 'This quiz covers basic questions for Quiz1.', 'Read each question carefully.', 5),
(2, 'Quiz2', 5, 10, 'This quiz covers basic questions for Quiz2.', 'Pay attention to details.', 5),
(3, 'Midterm', 30, 30, 'This is the midterm exam covering various topics.', 'Manage your time well.', 10),
(4, 'Final', 60, 60, 'This is the final exam covering the entire course.', 'Stay calm and focused.', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final`
--
ALTER TABLE `final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midterm`
--
ALTER TABLE `midterm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz1`
--
ALTER TABLE `quiz1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz2`
--
ALTER TABLE `quiz2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `final`
--
ALTER TABLE `final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `midterm`
--
ALTER TABLE `midterm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quiz1`
--
ALTER TABLE `quiz1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quiz2`
--
ALTER TABLE `quiz2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
