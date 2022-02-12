-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 03:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `aircraftID` varchar(100) NOT NULL,
  `aircraftFH` varchar(100) NOT NULL,
  `aircraftSM` varchar(100) NOT NULL,
  `aircraftENG` varchar(100) NOT NULL,
  `aircraftENGT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `aircraftID`, `aircraftFH`, `aircraftSM`, `aircraftENG`, `aircraftENGT`) VALUES
(13, '123466', '8 Hours', '11th of November', 'Hasan Moon', 'Clean Windows');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(12, 6003886, 'Admin', 'Toor', '2021-11-23 13:03:51'),
(13, 777687197974, 'Engineer1', '2b159d158343123c21cb504ae9c133db724d9cfe4e81ce62fc3e35f3aceeda10631b9ae44fe3b4c5ba324eb8fe0d83a72fef', '2021-11-23 13:04:04'),
(14, 193087834, 'Engineer2', 'ee07c352628b1243569acc08b2c363bb2a370ef5e7614bdad3386d279eb86e99983381260b2714b5569100969c0796b2fc06', '2021-11-23 13:04:13'),
(15, 292330327, 'Engineer3', 'bc84f30b116e53ddd983d6289f2983e3dfb7a9ed22148ffe7a0ddaa0f54ea061bce79334c854a3766eea3d00b6ba9da7555e', '2021-11-23 13:04:21'),
(17, 9223372036854775807, 'Admin2', '261997a7728e21d87653c6efacfb47d8ba66e083ffae37391869320b48b55c0834b7bbd9a16a35eb5c7e112dcd35dd6c15f2', '2021-11-23 13:04:40'),
(18, 9223372036854775807, 'Admin3', '561d097db64a55f3f1e9551919100fdbdb7ea27a6d0f5c23466bc3aead8bf6a2a15aa6a5c8e68eab372450af9eb5af2b9036', '2021-11-23 13:04:50'),
(20, 12291369458665, 'Engineer4', 'ab5a04b6406b31f6fe76beb8cb9a12e4ff05e086c7374bba1e0d64636574f8ed1fda320eba09457f6f7706fee5bc6c5f2d24', '2021-11-23 13:05:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
