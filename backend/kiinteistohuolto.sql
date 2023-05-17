-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 10:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiinteistohuolto`
--

-- --------------------------------------------------------

--
-- Table structure for table `roolit`
--

CREATE TABLE `roolit` (
  `rooliid` int(11) NOT NULL,
  `rooli` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roolit`
--

INSERT INTO `roolit` (`rooliid`, `rooli`) VALUES
(1, 'asukas'),
(2, 'asiakas'),
(3, 'isännöitsijä'),
(4, 'työntekijä');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusid` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusid`, `status`) VALUES
(1, 'Avoin'),
(2, 'Työn alla'),
(3, 'Suljettu');

-- --------------------------------------------------------

--
-- Table structure for table `tila`
--

CREATE TABLE `tila` (
  `tilaid` int(11) NOT NULL,
  `tila` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tila`
--

INSERT INTO `tila` (`tilaid`, `tila`) VALUES
(1, 'vapaa'),
(2, 'varattu');

-- --------------------------------------------------------

--
-- Table structure for table `tunnukset`
--

CREATE TABLE `tunnukset` (
  `tunnusid` int(11) NOT NULL,
  `tunnus` varchar(10) NOT NULL,
  `salasana` varchar(200) NOT NULL,
  `rooliid` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tunnukset`
--

INSERT INTO `tunnukset` (`tunnusid`, `tunnus`, `salasana`, `rooliid`, `nimi`) VALUES
(1, '0', '0', 4, 'tyhjä'),
(4, 'admin', '$2y$10$nxl7lrrQ8ifFym8ebwIONuJja.IXLzGmwQNLUNrdDtWkiedI5V5yC', 3, 'R Autio'),
(5, 'apuumaki', '$2y$10$u/hur5QCSP.ZdcGth22WnezupfcpXXIwdGkc8OVB95wdKkYGO79Vq', 4, 'A. Puumäki'),
(8, 'asiakas', '$2y$10$SB3dSs7n4RQIvN..7im6meItNbIVcHT4YWaJNjr3wO1be7dg.L3cK', 2, 'Pihla D'),
(9, 'asukas', '$2y$10$K3CGNU7.avYQtyQrVU5BxuCT933tdBKMRrlDM9jpR/o8MIU7z9HCO', 1, 'Pekka'),
(10, 'jarajarvi', '$2y$10$P5NvNn61xn6h/y.O9TMhS.TOTsWbIHF7x0UxigC5onguVDX2vSSoK', 4, 'J. Arajärvi'),
(11, 'yylanne', '$2y$10$P7SUn72SCpDGIi2IldJ3nOSA32bufFRxzfd9N64VDylJ62Evbh9om', 4, 'Y. Ylänne'),
(12, 'otalas', '$2y$10$keib4N9ABBfY7NIFTzE7gu5NwmlkEtAnPodlJogoXcp8zhlW6XYg6', 4, 'O. Talas'),
(14, 'phattara', '$2y$10$8M9I9yPDNyBtUQDMuNOgjesXyWR//sDNV2s9LKQzq3bXDaiD72IGG', 4, 'P. Hattara'),
(15, 'minä', '$2y$10$c5iBPYXODUNrXx3Qt8PDcuQs9.9YzYeqvC8ls9cj/IsykERKb4iWW', 1, 'Minä'),
(16, 'minä', '$2y$10$i.mLwOLj4N749XXt6YUncemDyZZuGXutyLivKdudGdIIny/PXp6fe', 1, 'minä');

-- --------------------------------------------------------

--
-- Table structure for table `tyontekijat`
--

CREATE TABLE `tyontekijat` (
  `tyontekijaid` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `tunnusid` int(11) NOT NULL,
  `tilaid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tyontekijat`
--

INSERT INTO `tyontekijat` (`tyontekijaid`, `nimi`, `tunnusid`, `tilaid`) VALUES
(1, 'tyhjä', 1, 1),
(3, 'A. Puumäki', 5, 2),
(7, 'J. Arajärvi', 10, 1),
(8, 'O. Talas', 12, 1),
(9, 'A. Hattara', 14, 2),
(10, 'Y. Ylänne', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vikailmoitukset`
--

CREATE TABLE `vikailmoitukset` (
  `vikaid` int(11) NOT NULL,
  `vika` text NOT NULL,
  `osoite` varchar(30) NOT NULL,
  `tilanne` int(11) NOT NULL DEFAULT 1,
  `tekija` varchar(30) NOT NULL,
  `tyontekijaid` int(11) NOT NULL,
  `kirjausaika` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vikailmoitukset`
--

INSERT INTO `vikailmoitukset` (`vikaid`, `vika`, `osoite`, `tilanne`, `tekija`, `tyontekijaid`, `kirjausaika`) VALUES
(2, 'Hana vuotaa', 'puistolammentie', 3, '5', 3, '2023-05-14 04:38:13'),
(11, 'avain hukassa', 'Saarenpäänkatu 30 A 4', 2, 'Veera', 1, '2023-05-14 23:04:53'),
(12, 'oven lukko ei toimi', 'Kauppakatu 40 A 14', 3, 'Pentti', 1, '2023-05-14 23:07:05'),
(13, 'hana vuotaa', 'kivirannantie 1', 3, 'minä', 1, '2023-05-15 20:04:15'),
(14, 'hana vuotaa', 'Isopalontie 3 a', 1, 'minä', 1, '2023-05-17 23:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `yhteydenottopyynnot`
--

CREATE TABLE `yhteydenottopyynnot` (
  `pyyntoid` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `sposti` varchar(30) NOT NULL,
  `osoite` text NOT NULL,
  `viesti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `yhteydenottopyynnot`
--

INSERT INTO `yhteydenottopyynnot` (`pyyntoid`, `nimi`, `sposti`, `osoite`, `viesti`) VALUES
(4, 'Pentti', 'ppentti@sähköposti.fi', 'Kauppakatu 40 A 14', 'oven lukko ei toimi'),
(5, 'Veera', 'vlampsij@sposti.com', 'Saarenpäänkatu 30 A 4', 'avain hukassa'),
(7, 'minä', 'minä@sposti.fi', 'Isopalontie 3 a', 'haluan asukastilin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roolit`
--
ALTER TABLE `roolit`
  ADD PRIMARY KEY (`rooliid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusid`);

--
-- Indexes for table `tila`
--
ALTER TABLE `tila`
  ADD PRIMARY KEY (`tilaid`);

--
-- Indexes for table `tunnukset`
--
ALTER TABLE `tunnukset`
  ADD PRIMARY KEY (`tunnusid`),
  ADD KEY `rooliid` (`rooliid`),
  ADD KEY `tunnusid` (`tunnusid`);

--
-- Indexes for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD PRIMARY KEY (`tyontekijaid`),
  ADD KEY `status` (`tilaid`),
  ADD KEY `tunnusid` (`tunnusid`);

--
-- Indexes for table `vikailmoitukset`
--
ALTER TABLE `vikailmoitukset`
  ADD PRIMARY KEY (`vikaid`),
  ADD KEY `tyontekijaid` (`tyontekijaid`),
  ADD KEY `tilanne` (`tilanne`);

--
-- Indexes for table `yhteydenottopyynnot`
--
ALTER TABLE `yhteydenottopyynnot`
  ADD PRIMARY KEY (`pyyntoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roolit`
--
ALTER TABLE `roolit`
  MODIFY `rooliid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tila`
--
ALTER TABLE `tila`
  MODIFY `tilaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tunnukset`
--
ALTER TABLE `tunnukset`
  MODIFY `tunnusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  MODIFY `tyontekijaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vikailmoitukset`
--
ALTER TABLE `vikailmoitukset`
  MODIFY `vikaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `yhteydenottopyynnot`
--
ALTER TABLE `yhteydenottopyynnot`
  MODIFY `pyyntoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tunnukset`
--
ALTER TABLE `tunnukset`
  ADD CONSTRAINT `tunnukset_ibfk_1` FOREIGN KEY (`rooliid`) REFERENCES `roolit` (`rooliid`);

--
-- Constraints for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD CONSTRAINT `tyontekijat_ibfk_2` FOREIGN KEY (`tilaid`) REFERENCES `tila` (`tilaid`),
  ADD CONSTRAINT `tyontekijat_ibfk_3` FOREIGN KEY (`tunnusid`) REFERENCES `tunnukset` (`tunnusid`);

--
-- Constraints for table `vikailmoitukset`
--
ALTER TABLE `vikailmoitukset`
  ADD CONSTRAINT `vikailmoitukset_ibfk_1` FOREIGN KEY (`tilanne`) REFERENCES `status` (`statusid`),
  ADD CONSTRAINT `vikailmoitukset_ibfk_2` FOREIGN KEY (`tyontekijaid`) REFERENCES `tyontekijat` (`tyontekijaid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
