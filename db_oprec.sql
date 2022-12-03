-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2022 at 07:56 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oprec`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int NOT NULL,
  `adminemail` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminemail`, `adminpassword`, `alamat`, `no_hp`) VALUES
(1, 'admin@himatif.com', 'testadmin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profileImg`
--

CREATE TABLE `profileImg` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profileImg`
--

INSERT INTO `profileImg` (`id`, `userid`, `status`) VALUES
(1, 13, 0),
(2, 14, 1),
(3, 15, 1),
(4, 16, 0),
(5, 17, 1),
(6, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrationData`
--

CREATE TABLE `tb_registrationData` (
  `id` int NOT NULL,
  `nim` varchar(255) NOT NULL,
  `angkatan` int NOT NULL,
  `pengalaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `asalSekolah` varchar(255) NOT NULL,
  `motivasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_registrationData`
--

INSERT INTO `tb_registrationData` (`id`, `nim`, `angkatan`, `pengalaman`, `asalSekolah`, `motivasi`) VALUES
(15, 'L200214231', 2021, 'Klaten Sentosa', 'SMK Negri 2 singapura', 'Pengen ikut');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tgldaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `useremail`, `userpassword`, `alamat`, `no_hp`, `nama`, `tgldaftar`) VALUES
(4, 'test@gmail.com', '$2y$10$B5C27S5kkGm8JZvdSQ4XveexPAjtmZd08C/WRn04Oz1/qp1wIgc2W', 'sidorejo, planggu, trucuk, klaten', '085700118018', 'namanya test', '2022-04-24'),
(5, 'test@baru.com', '$2y$10$J3yV4xpcG9vAVb6pTQUr5uDiPBQ8NLoAApKZqlFzGmpwZ75hV1S3.', '', '', 'iniakunbaru', '2022-04-23'),
(6, 'nasrunminalloh@gmail.com', '$2y$10$EZrVuHXS.vedjrGL7xqjC.rJ74dpRDFl3fUCfZU.13tdHo/TBSwCi', '', '', 'nasrunminalloh', '2022-04-24'),
(7, 'nasrunminalloh@mail.com', '$2y$10$YvZ3AKppBGxmTvJQoymBFOKjXhelvi8yuBHSW9mq1nD4WydsmhZPK', 'trucuk klaten', '085700118018', 'nasrun test', '2022-04-24'),
(8, 'rifai_andika@rocketmail.com', '$2y$10$chGJkFERfyxnPRvMH8VwdegbGJSo.2hKlrS4W8fmzTl3Dinnc2jZm', 'Boyolali', '021 21212121', 'Andika', '2022-04-24'),
(13, 'nasrun@gmail.com', '$2y$10$1iwcT3L6Brr3/5VTRruCi.RkTJ/S2Hfrqz5WhCiqFLxv/U3aX0DxO', '', '', 'aldin', '2022-06-09'),
(15, 'nasrun@test.com', '$2y$10$gIqsR5iSSXhs4eEjijatoux.vH14vDMqlqi4gypifMuG.UDyo.3.O', '', '', 'aldin', '2022-06-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `profileImg`
--
ALTER TABLE `profileImg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_registrationData`
--
ALTER TABLE `tb_registrationData`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profileImg`
--
ALTER TABLE `profileImg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
