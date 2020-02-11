-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 07:29 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) DEFAULT NULL,
  `naslov` varchar(64) DEFAULT NULL,
  `sazetak` text,
  `tekst` text,
  `slika` varchar(64) DEFAULT NULL,
  `kategorija` varchar(64) DEFAULT NULL,
  `arhiva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(4, '2019-06-20', 'Snagator sa prava prebio studenta TVZ-a', 'Filip Armday Turkovic (20) je 14.6.2019 u nocnom klubu \"Bunga Bunga\" bio napadnut od strane poznatog snagatora sa pravnog fakluteta. Filip je zadobio lakse tjelesne ozljede.', 'Filip Armday Turkovic (20) je 14.6.2019 u nocnom klubu \"Bunga Bunga\" bio napadnut od strane poznatog snagatora sa pravnog fakluteta. Filip je zadobio lakse tjelesne ozljede.\r\n\r\nFilip Armday Turkovic (20) je 14.6.2019 u nocnom klubu \"Bunga Bunga\" bio napadnut od strane poznatog snagatora sa pravnog fakluteta. Filip je zadobio lakse tjelesne ozljede.\r\n\r\nFilip Armday Turkovic (20) je 14.6.2019 u nocnom klubu \"Bunga Bunga\" bio napadnut od strane poznatog snagatora sa pravnog fakluteta. Filip je zadobio lakse tjelesne ozljede.', 'images/minicover1.jpg', 'Zabava', 0),
(5, '2019-06-20', 'Team Leader otkriva smjernice uspjesnog Software Developmenta', 'Ekskluzivno! Matija Novosel (21), poznat zbog svoje uloge \"Maidea Team Leadera\", je sjeo sa nama i poslozio listu prioriteta koje svaki Software Developer mora zadovoljiti', 'Ekskluzivno! Matija Novosel (21), poznat zbog svoje uloge \"Maidea Team Leadera\", je sjeo sa nama i poslozio listu prioriteta koje svaki Software Developer mora zadovoljiti\r\n\r\nEkskluzivno! Matija Novosel (21), poznat zbog svoje uloge \"Maidea Team Leadera\", je sjeo sa nama i poslozio listu prioriteta koje svaki Software Developer mora zadovoljiti\r\n\r\nEkskluzivno! Matija Novosel (21), poznat zbog svoje uloge \"Maidea Team Leadera\", je sjeo sa nama i poslozio listu prioriteta koje svaki Software Developer mora zadovoljiti', 'images/minicover2.jpg', 'Zabava', 0),
(6, '2019-06-20', 'Profesor uzrokovao pozar ispred zgrade TVZ-a', 'Sokantne vijesti nam dolaze iz Vrbika! Stajala sam ispred zgrade TVZ-a i pusila kao i svaki drugi dan kada se odjednom ispred mene pojavila ogromna plamena lopta. Sve biljke ispred zgrade TVZ-a su se zapalile u trenutku kaze Brigita Cafuta (25)', 'Sokantne vijesti nam dolaze iz Vrbika! Stajala sam ispred zgrade TVZ-a i pusila kao i svaki drugi dan kada se odjednom ispred mene pojavila ogromna plamena lopta. Sve biljke ispred zgrade TVZ-a su se zapalile u trenutku kaze Brigita Cafuta (25)\r\n\r\nSokantne vijesti nam dolaze iz Vrbika! Stajala sam ispred zgrade TVZ-a i pusila kao i svaki drugi dan kada se odjednom ispred mene pojavila ogromna plamena lopta. Sve biljke ispred zgrade TVZ-a su se zapalile u trenutku kaze Brigita Cafuta (25)\r\n\r\nSokantne vijesti nam dolaze iz Vrbika! Stajala sam ispred zgrade TVZ-a i pusila kao i svaki drugi dan kada se odjednom ispred mene pojavila ogromna plamena lopta. Sve biljke ispred zgrade TVZ-a su se zapalile u trenutku kaze Brigita Cafuta (25)', 'images/minicover3.jpg', 'Zabava', 0),
(7, '2019-06-20', 'Najbolji student TVZ-a: \"Lagano sam kolokvirao citavi studij\"', 'Danijel Martinec (20) otkriva tajne svojeg ogromnog uspjeha. Kolega danijel je poznat po tome sto je svaki kolegij na prediplomskom studiju kolokvirao sa ocjenom izvrstan', 'Danijel Martinec (20) otkriva tajne svojeg ogromnog uspjeha. Kolega danijel je poznat po tome sto je svaki kolegij na prediplomskom studiju kolokvirao sa ocjenom izvrstan\r\n\r\nDanijel Martinec (20) otkriva tajne svojeg ogromnog uspjeha. Kolega danijel je poznat po tome sto je svaki kolegij na prediplomskom studiju kolokvirao sa ocjenom izvrstan\r\n\r\nDanijel Martinec (20) otkriva tajne svojeg ogromnog uspjeha. Kolega danijel je poznat po tome sto je svaki kolegij na prediplomskom studiju kolokvirao sa ocjenom izvrstan', 'images/minicover4.jpg', 'Ozbiljno', 0),
(8, '2019-06-20', 'Galeb TVZ-a otkriva tajne svojih romanticnih uspjeha', 'Mate Burazer (21) poznat kao \"Galeb\" TVZ-a vam otkriva tajne svojih romanticnih uspjeha. Saznajte kako lagano pronaci novu djevojku za svaki semestar studiranja', 'Mate Burazer (21) poznat kao \"Galeb\" TVZ-a vam otkriva tajne svojih romanticnih uspjeha. Saznajte kako lagano pronaci novu djevojku za svaki semestar studiranja\r\n\r\nMate Burazer (21) poznat kao \"Galeb\" TVZ-a vam otkriva tajne svojih romanticnih uspjeha. Saznajte kako lagano pronaci novu djevojku za svaki semestar studiranja\r\n\r\nMate Burazer (21) poznat kao \"Galeb\" TVZ-a vam otkriva tajne svojih romanticnih uspjeha. Saznajte kako lagano pronaci novu djevojku za svaki semestar studiranja', 'images/minicover5.jpg', 'Ozbiljno', 0),
(9, '2019-06-20', 'Saznajte gdje izlaze studenti TVZ-a - 10 najpopularnijih mjesta ', 'Provjereno! Pripremili smo vam listu najpopularnijih klubova gdje izlaze vasi kolege sa TVZ-a.', 'Provjereno! Pripremili smo vam listu najpopularnijih klubova gdje izlaze vasi kolege sa TVZ-a.\r\n\r\nProvjereno! Pripremili smo vam listu najpopularnijih klubova gdje izlaze vasi kolege sa TVZ-a.\r\n\r\nProvjereno! Pripremili smo vam listu najpopularnijih klubova gdje izlaze vasi kolege sa TVZ-a.', 'images/minicover6.jpg', 'Ozbiljno', 0),
(16, '2019-06-23', 'Batman Batman Batman Batman Ba', 'Batman Batman Batman Batman Ba Batman Batman Batman Batman Ba Batman Batman Batman Batman Ba Batman ', 'Batman Batman Batman Batman Ba Batman Batman Batman Batman Ba Batman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman Ba', 'images/batamn.jpg', 'Ozbiljno', 1),
(17, '2019-06-23', 'Batman Batman Batman Batman Ba', 'Batman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Bat', 'Batman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman BaBatman Batman Batman Batman Ba', 'images/batamn.jpg', 'Zabava', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) DEFAULT NULL,
  `prezime` varchar(32) DEFAULT NULL,
  `korisnicko_ime` varchar(32) DEFAULT NULL,
  `lozinka` varchar(255) DEFAULT NULL,
  `razina` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(3, 'korisnik', 'korisnik', 'korisnik', '$2y$10$wKJpbAXy2YsuiaSNEMQTIu2SnSMYP6HUDtEz/pfGQPzHi6F3kvkgK', 0),
(4, 'admin', 'admin', 'admin', '$2y$10$2d20/Gc0ebYpM4qR1UPn4.qUnwjq/kC2TsjcEnaylkE8RBjvH8xe.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
