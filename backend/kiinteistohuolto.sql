-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11.05.2023 klo 23:57
-- Palvelimen versio: 10.4.27-MariaDB
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
-- Rakenne taululle `roolit`
--

CREATE TABLE `roolit` (
  `rooliid` int(11) NOT NULL,
  `rooli` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `roolit`
--

INSERT INTO `roolit` (`rooliid`, `rooli`) VALUES
(1, 'asukas'),
(2, 'asiakas'),
(3, 'isännöitsijä'),
(4, 'työntekijä');

-- --------------------------------------------------------

--
-- Rakenne taululle `status`
--

CREATE TABLE `status` (
  `statusid` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `status`
--

INSERT INTO `status` (`statusid`, `status`) VALUES
(1, 'Avoin'),
(2, 'Työn alla'),
(3, 'Suljettu');

-- --------------------------------------------------------

--
-- Rakenne taululle `tila`
--

CREATE TABLE `tila` (
  `tilaid` int(11) NOT NULL,
  `tila` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `tila`
--

INSERT INTO `tila` (`tilaid`, `tila`) VALUES
(1, 'vapaa'),
(2, 'varattu');

-- --------------------------------------------------------

--
-- Rakenne taululle `tunnukset`
--

CREATE TABLE `tunnukset` (
  `tunnusid` int(11) NOT NULL,
  `tunnus` varchar(10) NOT NULL,
  `salasana` varchar(200) NOT NULL,
  `rooliid` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `tunnukset`
--

INSERT INTO `tunnukset` (`tunnusid`, `tunnus`, `salasana`, `rooliid`, `nimi`) VALUES
(1, '0', '0', 4, 'tyhjä'),
(2, 'rautio', 'a', 4, 'R. Autio'),
(3, 'pentti', 'a', 1, 'Pentti');

-- --------------------------------------------------------

--
-- Rakenne taululle `tyontekijat`
--

CREATE TABLE `tyontekijat` (
  `tyontekijaid` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `tunnusid` int(11) NOT NULL,
  `tilaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `tyontekijat`
--

INSERT INTO `tyontekijat` (`tyontekijaid`, `nimi`, `tunnusid`, `tilaid`) VALUES
(1, 'tyhjä', 1, 1),
(2, 'R. Autio', 2, 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `vikailmoitukset`
--

CREATE TABLE `vikailmoitukset` (
  `vikaid` int(11) NOT NULL,
  `vika` text NOT NULL,
  `osoite` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `tekija` int(11) NOT NULL,
  `tyontekijaid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `vikailmoitukset`
--

INSERT INTO `vikailmoitukset` (`vikaid`, `vika`, `osoite`, `status`, `tekija`, `tyontekijaid`) VALUES
(1, 'Hana vuotaa', '', 1, 3, 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `yhteydenottopyynnot`
--

CREATE TABLE `yhteydenottopyynnot` (
  `pyyntoid` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `sposti` varchar(30) NOT NULL,
  `viesti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  ADD KEY `rooliid` (`rooliid`);

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
  ADD KEY `status` (`status`),
  ADD KEY `tyontekijaid` (`tyontekijaid`),
  ADD KEY `tekija` (`tekija`);

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
  MODIFY `tunnusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  MODIFY `tyontekijaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vikailmoitukset`
--
ALTER TABLE `vikailmoitukset`
  MODIFY `vikaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yhteydenottopyynnot`
--
ALTER TABLE `yhteydenottopyynnot`
  MODIFY `pyyntoid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `tunnukset`
--
ALTER TABLE `tunnukset`
  ADD CONSTRAINT `tunnukset_ibfk_1` FOREIGN KEY (`rooliid`) REFERENCES `roolit` (`rooliid`);

--
-- Rajoitteet taululle `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD CONSTRAINT `tyontekijat_ibfk_1` FOREIGN KEY (`tunnusid`) REFERENCES `tunnukset` (`tunnusid`),
  ADD CONSTRAINT `tyontekijat_ibfk_2` FOREIGN KEY (`tilaid`) REFERENCES `tila` (`tilaid`);

--
-- Rajoitteet taululle `vikailmoitukset`
--
ALTER TABLE `vikailmoitukset`
  ADD CONSTRAINT `vikailmoitukset_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`statusid`),
  ADD CONSTRAINT `vikailmoitukset_ibfk_2` FOREIGN KEY (`tyontekijaid`) REFERENCES `tyontekijat` (`tyontekijaid`),
  ADD CONSTRAINT `vikailmoitukset_ibfk_3` FOREIGN KEY (`tekija`) REFERENCES `tunnukset` (`tunnusid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
