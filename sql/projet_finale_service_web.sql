-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 11, 2023 at 01:02 PM
-- Server version: 10.7.3-MariaDB-1:10.7.3+maria~focal
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_finale_service_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `usagers`
--

CREATE TABLE `usagers` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `cle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usagers`
--

INSERT INTO `usagers` (`id`, `nom`, `code`, `cle`) VALUES
(1, 'Tourigny', '$2y$10$8eJxg/AYTrlsajP.OejgFuUpI6SxqwQXqB0SK9NNLOAV7R8/0Mmoi', '75546dda5cb1107b53f628fa542f854a8f44b3e9559d3a4ff5d35bc06a403328'),
(2, 'admin', '$2y$10$2fsGaZuD47WueAoT1O7nJ.1XfWwvr7Dqvip5VphEMaxWfnec3ybiW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

CREATE TABLE `voitures` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `annee` int(11) NOT NULL,
  `couleur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voitures`
--

INSERT INTO `voitures` (`id`, `marque`, `model`, `annee`, `couleur`) VALUES
(3, 'Honda', 'Civic', 1989, 'vert'),
(4, 'Honda', 'Accord', 2008, 'blanc'),
(5, 'Toyota', 'tarcel', 1983, 'noir rouille'),
(8, 'Mazda', '3', 2016, 'Bleu'),
(9, 'Ferrari', 'purosangue', 2023, 'Gris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usagers`
--
ALTER TABLE `usagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usagers`
--
ALTER TABLE `usagers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
