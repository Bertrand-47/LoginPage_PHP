-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 03:54 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Security_Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `Username`, `Password`, `Security_Question`, `Answer`, `Role`) VALUES
('Alain', 'SIBOMANA', 'Alain49', 'e10adc3949ba59abbe56e057f20f883e', 'f3257e3e595c9cfaee4c0da521b8a8b3', 'Maxu', 'user'),
('Bertrand', 'SIBOMANA', 'Bertrand47', '3990600d4e7067924a24b600f3fff20f', 'What is the Name of Your Father Nurse?', 'Agent47', 'user'),
('Bertrande', 'Umhire', 'Bertrande47', '3990600d4e7067924a24b600f3fff20f', '378d640220ea595e1700f5c7b9e48cc6', '0bd067e6c3a0eed893275778ffc0a070', 'user'),
('Carlos', 'Eduard', 'Carlos47', '3990600d4e7067924a24b600f3fff20f', 'What is Your Pet Name?', 'Maxu', 'user'),
('Eduard', 'Smarkov', 'Eduard47', '3990600d4e7067924a24b600f3fff20f', 'f3257e3e595c9cfaee4c0da521b8a8b3', 'fe0707cc476fa27a17508867b2b95d14', 'user'),
('Martine', 'Umuhire', 'Martinr47', '3990600d4e7067924a24b600f3fff20f', '626e550b6ce4e4902bd1804eb1a5e7e0', 'b4a6cee9cedf3887220431a7337745b3', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
