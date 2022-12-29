-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 02:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igrice`
--

-- --------------------------------------------------------

--
-- Table structure for table `igrica`
--

CREATE TABLE `igrica` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `kompanija` varchar(50) NOT NULL,
  `cena` double NOT NULL,
  `slika` varchar(500) NOT NULL,
  `kategorijaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igrica`
--

INSERT INTO `igrica` (`id`, `naziv`, `kompanija`, `cena`, `slika`, `kategorijaID`) VALUES
(1, 'FIFA 23', 'EA Sports', 79.99, 'https://i2-prod.mirror.co.uk/incoming/article27979696.ece/ALTERNATES/s1200b/0_FIFA-23-fut-web-app-and-companion-app-release-date-confirmed.jpg', 1),
(2, 'SIMS 4', 'EA Sports', 49.99, 'https://assets-prd.ignimgs.com/2022/11/01/the-sims-4-1667312977731.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKat` int(11) NOT NULL,
  `nazivKat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKat`, `nazivKat`) VALUES
(1, 'Sport'),
(2, 'Akcija'),
(3, 'Horor'),
(4, 'Društvo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `password`) VALUES
(1, 'Nikolina', 'nina@gmail.com', 'nina123'),
(2, 'Marko', 'marko@gmail.com', 'marko123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igrica`
--
ALTER TABLE `igrica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkKategorija` (`kategorijaID`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igrica`
--
ALTER TABLE `igrica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igrica`
--
ALTER TABLE `igrica`
  ADD CONSTRAINT `fkKategorija` FOREIGN KEY (`kategorijaID`) REFERENCES `kategorija` (`idKat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
