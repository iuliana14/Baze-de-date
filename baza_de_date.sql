-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 09:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `politie`
--

-- --------------------------------------------------------

--
-- Table structure for table `cazier`
--

CREATE TABLE `cazier` (
  `Cazier_ID` int(5) NOT NULL,
  `Individ_ID` int(5) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cazier`
--

INSERT INTO `cazier` (`Cazier_ID`, `Individ_ID`, `Data`, `Ora`) VALUES
(1, 1, '2022-01-19', '10:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `cazierinfractiune`
--

CREATE TABLE `cazierinfractiune` (
  `Cazier_ID` int(5) NOT NULL,
  `Infractiune_ID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cazierinfractiune`
--

INSERT INTO `cazierinfractiune` (`Cazier_ID`, `Infractiune_ID`, `Data`, `Ora`) VALUES
(1, 1, '2022-01-01', '10:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `domiciliu`
--

CREATE TABLE `domiciliu` (
  `Domiciliu_ID` int(5) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `Localitate` varchar(50) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Numar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domiciliu`
--

INSERT INTO `domiciliu` (`Domiciliu_ID`, `Judet`, `Localitate`, `Strada`, `Numar`) VALUES
(1, 'Constanta', 'Constanta', 'Viilor', '18'),
(2, 'Braila', 'Braila', 'Noua', '2'),
(7, 'Tulcea', 'Tulcea', 'Primaverii', '6');

-- --------------------------------------------------------

--
-- Table structure for table `individ`
--

CREATE TABLE `individ` (
  `Individ_ID` int(5) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Domiciliu_ID` int(5) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Sex` char(1) DEFAULT 'F',
  `DataNasterii` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individ`
--

INSERT INTO `individ` (`Individ_ID`, `User_ID`, `Domiciliu_ID`, `Nume`, `Prenume`, `CNP`, `Sex`, `DataNasterii`) VALUES
(1, 1, 1, 'Ionescu', 'Madalina', '6000114133251', 'F', '2022-01-15'),
(2, 1, 1, 'Popescu', 'Ionel', '5991112133251', 'M', '2012-01-01'),
(3, 1, 1, 'Buriu', 'Maria', '6990114133255', 'F', '2015-01-07'),
(4, 1, 2, 'Tudose', 'Mihai', '5991412233254', 'M', '2022-01-22'),
(5, 1, 2, 'Simion', 'Elena', '6980105133255', 'F', '1989-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `infractiune`
--

CREATE TABLE `infractiune` (
  `Infractiune_ID` int(11) NOT NULL,
  `Denumire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infractiune`
--

INSERT INTO `infractiune` (`Infractiune_ID`, `Denumire`) VALUES
(1, 'Conducerea unui vehicul fara permis de conducere.');

-- --------------------------------------------------------

--
-- Table structure for table `masina`
--

CREATE TABLE `masina` (
  `Masina_ID` int(5) NOT NULL,
  `Individ_ID` int(5) NOT NULL,
  `NrInmatriculare` char(10) NOT NULL,
  `Firma` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masina`
--

INSERT INTO `masina` (`Masina_ID`, `Individ_ID`, `NrInmatriculare`, `Firma`, `Model`) VALUES
(1, 1, 'BR10AAA', 'Nissan', 'Qashqai'),
(2, 1, 'BR10AND', 'Ford', 'Modeo'),
(17, 2, 'CT14YOU', 'Mercedes', 'CClass');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'procop.iuliana', 'procop.iuliana@yahoo.com', 'iuliana'),
(2, 'popescu.andrei', 'popescu.andrei@yahoo.com', 'andrei'),
(3, 'x', 'x@yahoo.com', 'x'),
(8, 'ana', 'anamaria@gmail.com', 'ana'),
(9, 'Maria', 'maria@yahoo.com', 'maria');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cazier`
--
ALTER TABLE `cazier`
  ADD PRIMARY KEY (`Cazier_ID`),
  ADD KEY `Individ_ID` (`Individ_ID`);

--
-- Indexes for table `cazierinfractiune`
--
ALTER TABLE `cazierinfractiune`
  ADD PRIMARY KEY (`Cazier_ID`,`Infractiune_ID`),
  ADD KEY `Infractiune_ID` (`Infractiune_ID`);

--
-- Indexes for table `domiciliu`
--
ALTER TABLE `domiciliu`
  ADD PRIMARY KEY (`Domiciliu_ID`);

--
-- Indexes for table `individ`
--
ALTER TABLE `individ`
  ADD PRIMARY KEY (`Individ_ID`),
  ADD UNIQUE KEY `CNP` (`CNP`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Domiciliu_ID` (`Domiciliu_ID`);

--
-- Indexes for table `infractiune`
--
ALTER TABLE `infractiune`
  ADD PRIMARY KEY (`Infractiune_ID`);

--
-- Indexes for table `masina`
--
ALTER TABLE `masina`
  ADD PRIMARY KEY (`Masina_ID`),
  ADD UNIQUE KEY `NrInmatriculare` (`NrInmatriculare`),
  ADD KEY `Individ_ID` (`Individ_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cazier`
--
ALTER TABLE `cazier`
  MODIFY `Cazier_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domiciliu`
--
ALTER TABLE `domiciliu`
  MODIFY `Domiciliu_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `individ`
--
ALTER TABLE `individ`
  MODIFY `Individ_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `infractiune`
--
ALTER TABLE `infractiune`
  MODIFY `Infractiune_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masina`
--
ALTER TABLE `masina`
  MODIFY `Masina_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cazier`
--
ALTER TABLE `cazier`
  ADD CONSTRAINT `cazier_ibfk_1` FOREIGN KEY (`Individ_ID`) REFERENCES `individ` (`Individ_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cazier_ibfk_2` FOREIGN KEY (`Cazier_ID`) REFERENCES `cazierinfractiune` (`Cazier_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cazierinfractiune`
--
ALTER TABLE `cazierinfractiune`
  ADD CONSTRAINT `cazierinfractiune_ibfk_1` FOREIGN KEY (`Infractiune_ID`) REFERENCES `infractiune` (`Infractiune_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `individ`
--
ALTER TABLE `individ`
  ADD CONSTRAINT `individ_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `individ_ibfk_2` FOREIGN KEY (`Domiciliu_ID`) REFERENCES `domiciliu` (`Domiciliu_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `masina`
--
ALTER TABLE `masina`
  ADD CONSTRAINT `masina_ibfk_1` FOREIGN KEY (`Individ_ID`) REFERENCES `individ` (`Individ_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
