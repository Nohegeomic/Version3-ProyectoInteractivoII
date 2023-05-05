-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2022 at 02:28 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redsocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `userL_ID` int(11) NOT NULL,
  `userF_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `historias`
--

CREATE TABLE `historias` (
  `imgId` tinyint(3) NOT NULL,
  `imgType` varchar(25) NOT NULL DEFAULT '',
  `imgData` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `ID` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `banner` varchar(30) NOT NULL,
  `nivel_estudio` varchar(10) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `campus` varchar(15) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `software` varchar(15) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tag` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `imagen`, `descripcion`, `tag`, `fecha`, `user_ID`) VALUES
(1, '1.png', 'kladnasdnladknda', '', '2022-09-27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `imagen` longblob NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tag` varchar(15) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `imgType` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `post_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `reaccion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(14) NOT NULL,
  `apellido` varchar(14) NOT NULL,
  `num_cuenta` varchar(25) NOT NULL,
  `num_telefono` varchar(25) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nombre`, `apellido`, `num_cuenta`, `num_telefono`, `correo`, `contrasenia`) VALUES
(3, 'Marvin', 'Cáceres', '11611077', '33455071', 'marvindcaceres@gmail.com', 'pepe123'),
(4, 'angela', 'karvali', '12011512', '000000000', 'angelakarvali@yahoo.com', '123'),
(5, 'Marcos', 'Figer', '11511422', '000000000', 'figger@ggg.kj', '$2y$10$a9WkVQ91IjsZATVFCzXGe.iI4863EFBnRPR4l8epZERvYGcm4RTmO'),
(6, 'Ariela', 'Mencilla', '12112213', '000000000', 'arimencilla@yahoo.com', 'ari122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`userL_ID`,`userF_ID`),
  ADD KEY `userF_ID` (`userF_ID`);

--
-- Indexes for table `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD KEY `post_ID` (`post_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historias`
--
ALTER TABLE `historias`
  MODIFY `imgId` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`userL_ID`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`userF_ID`) REFERENCES `usuarios` (`ID`);

--
-- Constraints for table `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `usuarios` (`ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `usuarios` (`ID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `usuarios` (`ID`);

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_ibfk_1` FOREIGN KEY (`post_ID`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `reactions_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `post` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
