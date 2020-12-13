-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 08:20 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapualibrary`
--
CREATE DATABASE IF NOT EXISTS `mapualibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mapualibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_Id` int(11) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Keyword` varchar(500) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Synopsis` varchar(1000) NOT NULL,
  `DatePublished` date DEFAULT NULL,
  `X_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_Id`, `Code`, `Keyword`, `Title`, `Author`, `Subject_Id`, `Synopsis`, `DatePublished`, `X_DateCreated`) VALUES
(1, 'CODE0-3854', 'Keyword 0', 'Title 0', 'Author 0', 1, 'Synopsis 0', '2020-12-08', '2020-12-07 10:55:29'),
(2, 'CODE1-1882', 'Keyword 1', 'Title 1', 'Author 1', 1, 'Synopsis 1', '2020-12-08', '2020-12-07 10:55:29'),
(3, 'CODE2-8429', 'Keyword 2', 'Title 2', 'Author 2', 1, 'Synopsis 2', '2020-12-08', '2020-12-07 10:55:30'),
(4, 'CODE3-2870', 'Keyword 3', 'Title 3', 'Author 3', 1, 'Synopsis 3', '2020-12-08', '2020-12-07 10:55:30'),
(5, 'CODE4-8667', 'Keyword 4', 'Title 4', 'Author 4', 1, 'Synopsis 4', '2020-12-08', '2020-12-07 10:55:30'),
(6, 'CODE5-1247', 'Keyword 5', 'Title 5', 'Author 5', 1, 'Synopsis 5', '2020-12-08', '2020-12-07 10:55:30'),
(7, 'CODE6-2348', 'Keyword 6', 'Title 6', 'Author 6', 2, 'Synopsis 6', '2020-12-08', '2020-12-07 10:55:30'),
(8, 'CODE7-2776', 'Keyword 7', 'Title 7', 'Author 7', 1, 'Synopsis 7', '2020-12-08', '2020-12-07 10:55:31'),
(9, 'CODE8-7332', 'Keyword 8', 'Title 8', 'Author 8', 1, 'Synopsis 8', '2020-12-08', '2020-12-07 10:55:31'),
(10, 'CODE9-3053', 'Keyword 9', 'Title 9', 'Author 9', 1, 'Synopsis 9', '2020-12-08', '2020-12-07 10:55:31'),
(11, 'CODE10-3372', 'Keyword 10', 'Title 10', 'Author 10', 2, 'Synopsis 10', '2020-12-08', '2020-12-07 10:55:31'),
(12, 'CODE11-7062', 'Keyword 11', 'Title 11', 'Author 11', 2, 'Synopsis 11', '2020-12-08', '2020-12-07 10:55:31'),
(13, 'CODE12-9984', 'Keyword 12', 'Title 12', 'Author 12', 2, 'Synopsis 12', '2020-12-08', '2020-12-07 10:55:31'),
(14, 'CODE13-6338', 'Keyword 13', 'Title 13', 'Author 13', 2, 'Synopsis 13', '2020-12-08', '2020-12-07 10:55:32'),
(15, 'CODE14-8220', 'Keyword 14', 'Title 14', 'Author 14', 2, 'Synopsis 14', '2020-12-08', '2020-12-07 10:55:32'),
(16, 'CODE15-8474', 'Keyword 15', 'Title 15', 'Author 15', 1, 'Synopsis 15', '2020-12-08', '2020-12-07 10:55:32'),
(17, 'CODE16-6293', 'Keyword 16', 'Title 16', 'Author 16', 1, 'Synopsis 16', '2020-12-08', '2020-12-07 10:55:32'),
(18, 'CODE17-6350', 'Keyword 17', 'Title 17', 'Author 17', 1, 'Synopsis 17', '2020-12-08', '2020-12-07 10:55:33'),
(19, 'CODE18-9939', 'Keyword 18', 'Title 18', 'Author 18', 2, 'Synopsis 18', '2020-12-08', '2020-12-07 10:55:33'),
(20, 'CODE19-9009', 'Keyword 19', 'Title 19', 'Author 19', 2, 'Synopsis 19', '2020-12-08', '2020-12-07 10:55:33'),
(21, 'CODE20-8706', 'Keyword 20', 'Title 20', 'Author 20', 2, 'Synopsis 20', '2020-12-08', '2020-12-07 10:55:33'),
(22, 'CODE21-1897', 'Keyword 21', 'Title 21', 'Author 21', 1, 'Synopsis 21', '2020-12-08', '2020-12-07 10:55:33'),
(23, 'CODE22-5460', 'Keyword 22', 'Title 22', 'Author 22', 2, 'Synopsis 22', '2020-12-08', '2020-12-07 10:55:34'),
(24, 'CODE23-7447', 'Keyword 23', 'Title 23', 'Author 23', 2, 'Synopsis 23', '2020-12-08', '2020-12-07 10:55:34'),
(25, 'CODE24-8929', 'Keyword 24', 'Title 24', 'Author 24', 1, 'Synopsis 24', '2020-12-08', '2020-12-07 10:55:34'),
(26, 'CODE25-1377', 'Keyword 25', 'Title 25', 'Author 25', 1, 'Synopsis 25', '2020-12-08', '2020-12-07 10:55:34'),
(27, 'CODE26-5866', 'Keyword 26', 'Title 26', 'Author 26', 1, 'Synopsis 26', '2020-12-08', '2020-12-07 10:55:34'),
(28, 'CODE27-4226', 'Keyword 27', 'Title 27', 'Author 27', 1, 'Synopsis 27', '2020-12-08', '2020-12-07 10:55:35'),
(29, 'CODE28-2581', 'Keyword 28', 'Title 28', 'Author 28', 1, 'Synopsis 28', '2020-12-08', '2020-12-07 10:55:35'),
(30, 'CODE29-9857', 'Keyword 29', 'Title 29', 'Author 29', 1, 'Synopsis 29', '2020-12-08', '2020-12-07 10:55:35'),
(31, 'CODE30-9304', 'Keyword 30', 'Title 30', 'Author 30', 2, 'Synopsis 30', '2020-12-08', '2020-12-07 10:55:35'),
(32, 'CODE31-9634', 'Keyword 31', 'Title 31', 'Author 31', 1, 'Synopsis 31', '2020-12-08', '2020-12-07 10:55:35'),
(33, 'CODE32-8153', 'Keyword 32', 'Title 32', 'Author 32', 2, 'Synopsis 32', '2020-12-08', '2020-12-07 10:55:35'),
(34, 'CODE33-5833', 'Keyword 33', 'Title 33', 'Author 33', 1, 'Synopsis 33', '2020-12-08', '2020-12-07 10:55:36'),
(35, 'CODE34-8975', 'Keyword 34', 'Title 34', 'Author 34', 2, 'Synopsis 34', '2020-12-08', '2020-12-07 10:55:36'),
(36, 'CODE35-6253', 'Keyword 35', 'Title 35', 'Author 35', 1, 'Synopsis 35', '2020-12-08', '2020-12-07 10:55:36'),
(37, 'CODE36-9273', 'Keyword 36', 'Title 36', 'Author 36', 1, 'Synopsis 36', '2020-12-08', '2020-12-07 10:55:36'),
(38, 'CODE37-5420', 'Keyword 37', 'Title 37', 'Author 37', 2, 'Synopsis 37', '2020-12-08', '2020-12-07 10:55:37'),
(39, 'CODE38-6474', 'Keyword 38', 'Title 38', 'Author 38', 2, 'Synopsis 38', '2020-12-08', '2020-12-07 10:55:37'),
(40, 'CODE39-5909', 'Keyword 39', 'Title 39', 'Author 39', 1, 'Synopsis 39', '2020-12-08', '2020-12-07 10:55:37'),
(41, 'CODE40-6073', 'Keyword 40', 'Title 40', 'Author 40', 2, 'Synopsis 40', '2020-12-08', '2020-12-07 10:55:37'),
(42, 'CODE41-7178', 'Keyword 41', 'Title 41', 'Author 41', 1, 'Synopsis 41', '2020-12-08', '2020-12-07 10:55:37'),
(43, 'CODE42-4248', 'Keyword 42', 'Title 42', 'Author 42', 1, 'Synopsis 42', '2020-12-08', '2020-12-07 10:55:38'),
(44, 'CODE43-9802', 'Keyword 43', 'Title 43', 'Author 43', 1, 'Synopsis 43', '2020-12-08', '2020-12-07 10:55:38'),
(45, 'CODE44-2770', 'Keyword 44', 'Title 44', 'Author 44', 1, 'Synopsis 44', '2020-12-08', '2020-12-07 10:55:38'),
(46, 'CODE45-2923', 'Keyword 45', 'Title 45', 'Author 45', 1, 'Synopsis 45', '2020-12-08', '2020-12-07 10:55:38'),
(47, 'CODE46-4815', 'Keyword 46', 'Title 46', 'Author 46', 1, 'Synopsis 46', '2020-12-08', '2020-12-07 10:55:38'),
(48, 'CODE47-3044', 'Keyword 47', 'Title 47', 'Author 47', 2, 'Synopsis 47', '2020-12-08', '2020-12-07 10:55:39'),
(49, 'CODE48-2946', 'Keyword 48', 'Title 48', 'Author 48', 2, 'Synopsis 48', '2020-12-08', '2020-12-07 10:55:39'),
(50, 'CODE49-3970', 'Keyword 49', 'Title 49', 'Author 49', 2, 'Synopsis 49', '2020-12-08', '2020-12-07 10:55:39'),
(51, 'CODE50-1875', 'Keyword 50', 'Title 50', 'Author 50', 1, 'Synopsis 50', '2020-12-08', '2020-12-07 10:55:39'),
(52, 'CODE51-8383', 'Keyword 51', 'Title 51', 'Author 51', 1, 'Synopsis 51', '2020-12-08', '2020-12-07 10:55:40'),
(53, 'CODE52-5573', 'Keyword 52', 'Title 52', 'Author 52', 2, 'Synopsis 52', '2020-12-08', '2020-12-07 10:55:40'),
(54, 'CODE53-6314', 'Keyword 53', 'Title 53', 'Author 53', 1, 'Synopsis 53', '2020-12-08', '2020-12-07 10:55:40'),
(55, 'CODE54-7998', 'Keyword 54', 'Title 54', 'Author 54', 2, 'Synopsis 54', '2020-12-08', '2020-12-07 10:55:40'),
(56, 'CODE55-7319', 'Keyword 55', 'Title 55', 'Author 55', 2, 'Synopsis 55', '2020-12-08', '2020-12-07 10:55:40'),
(57, 'CODE56-2979', 'Keyword 56', 'Title 56', 'Author 56', 1, 'Synopsis 56', '2020-12-08', '2020-12-07 10:55:41'),
(58, 'CODE57-3870', 'Keyword 57', 'Title 57', 'Author 57', 2, 'Synopsis 57', '2020-12-08', '2020-12-07 10:55:41'),
(59, 'CODE58-3116', 'Keyword 58', 'Title 58', 'Author 58', 1, 'Synopsis 58', '2020-12-08', '2020-12-07 10:55:41'),
(60, 'CODE59-2081', 'Keyword 59', 'Title 59', 'Author 59', 1, 'Synopsis 59', '2020-12-08', '2020-12-07 10:55:41'),
(61, 'CODE60-8470', 'Keyword 60', 'Title 60', 'Author 60', 1, 'Synopsis 60', '2020-12-08', '2020-12-07 10:55:41'),
(62, 'CODE61-9035', 'Keyword 61', 'Title 61', 'Author 61', 1, 'Synopsis 61', '2020-12-08', '2020-12-07 10:55:42'),
(63, 'CODE62-9184', 'Keyword 62', 'Title 62', 'Author 62', 1, 'Synopsis 62', '2020-12-08', '2020-12-07 10:55:42'),
(64, 'CODE63-6639', 'Keyword 63', 'Title 63', 'Author 63', 1, 'Synopsis 63', '2020-12-08', '2020-12-07 10:55:42'),
(65, 'CODE64-6507', 'Keyword 64', 'Title 64', 'Author 64', 2, 'Synopsis 64', '2020-12-08', '2020-12-07 10:55:42'),
(66, 'CODE65-9485', 'Keyword 65', 'Title 65', 'Author 65', 2, 'Synopsis 65', '2020-12-08', '2020-12-07 10:55:42'),
(67, 'CODE66-5994', 'Keyword 66', 'Title 66', 'Author 66', 2, 'Synopsis 66', '2020-12-08', '2020-12-07 10:55:42'),
(68, 'CODE67-4297', 'Keyword 67', 'Title 67', 'Author 67', 2, 'Synopsis 67', '2020-12-08', '2020-12-07 10:55:43'),
(69, 'CODE68-2552', 'Keyword 68', 'Title 68', 'Author 68', 1, 'Synopsis 68', '2020-12-08', '2020-12-07 10:55:43'),
(70, 'CODE69-7005', 'Keyword 69', 'Title 69', 'Author 69', 1, 'Synopsis 69', '2020-12-08', '2020-12-07 10:55:43'),
(71, 'CODE70-6601', 'Keyword 70', 'Title 70', 'Author 70', 1, 'Synopsis 70', '2020-12-08', '2020-12-07 10:55:43'),
(72, 'CODE71-1594', 'Keyword 71', 'Title 71', 'Author 71', 1, 'Synopsis 71', '2020-12-08', '2020-12-07 10:55:43'),
(73, 'CODE72-4037', 'Keyword 72', 'Title 72', 'Author 72', 1, 'Synopsis 72', '2020-12-08', '2020-12-07 10:55:44'),
(74, 'CODE73-6144', 'Keyword 73', 'Title 73', 'Author 73', 1, 'Synopsis 73', '2020-12-08', '2020-12-07 10:55:44'),
(75, 'CODE74-7511', 'Keyword 74', 'Title 74', 'Author 74', 1, 'Synopsis 74', '2020-12-08', '2020-12-07 10:55:44'),
(76, 'CODE75-9059', 'Keyword 75', 'Title 75', 'Author 75', 1, 'Synopsis 75', '2020-12-08', '2020-12-07 10:55:45'),
(77, 'CODE76-5670', 'Keyword 76', 'Title 76', 'Author 76', 2, 'Synopsis 76', '2020-12-08', '2020-12-07 10:55:45'),
(78, 'CODE77-8920', 'Keyword 77', 'Title 77', 'Author 77', 1, 'Synopsis 77', '2020-12-08', '2020-12-07 10:55:45'),
(79, 'CODE78-1904', 'Keyword 78', 'Title 78', 'Author 78', 1, 'Synopsis 78', '2020-12-08', '2020-12-07 10:55:45'),
(80, 'CODE79-8465', 'Keyword 79', 'Title 79', 'Author 79', 1, 'Synopsis 79', '2020-12-08', '2020-12-07 10:55:45'),
(81, 'CODE80-4924', 'Keyword 80', 'Title 80', 'Author 80', 1, 'Synopsis 80', '2020-12-08', '2020-12-07 10:55:46'),
(82, 'CODE81-1339', 'Keyword 81', 'Title 81', 'Author 81', 1, 'Synopsis 81', '2020-12-08', '2020-12-07 10:55:46'),
(83, 'CODE82-5643', 'Keyword 82', 'Title 82', 'Author 82', 1, 'Synopsis 82', '2020-12-08', '2020-12-07 10:55:46'),
(84, 'CODE83-4995', 'Keyword 83', 'Title 83', 'Author 83', 1, 'Synopsis 83', '2020-12-08', '2020-12-07 10:55:46'),
(85, 'CODE84-6875', 'Keyword 84', 'Title 84', 'Author 84', 1, 'Synopsis 84', '2020-12-08', '2020-12-07 10:55:47'),
(86, 'CODE85-6952', 'Keyword 85', 'Title 85', 'Author 85', 1, 'Synopsis 85', '2020-12-08', '2020-12-07 10:55:47'),
(87, 'CODE86-6720', 'Keyword 86', 'Title 86', 'Author 86', 2, 'Synopsis 86', '2020-12-08', '2020-12-07 10:55:47'),
(88, 'CODE87-2441', 'Keyword 87', 'Title 87', 'Author 87', 2, 'Synopsis 87', '2020-12-08', '2020-12-07 10:55:47'),
(89, 'CODE88-1891', 'Keyword 88', 'Title 88', 'Author 88', 2, 'Synopsis 88', '2020-12-08', '2020-12-07 10:55:47'),
(90, 'CODE89-3133', 'Keyword 89', 'Title 89', 'Author 89', 1, 'Synopsis 89', '2020-12-08', '2020-12-07 10:55:47'),
(91, 'CODE90-7641', 'Keyword 90', 'Title 90', 'Author 90', 1, 'Synopsis 90', '2020-12-08', '2020-12-07 10:55:47'),
(92, 'CODE91-1151', 'Keyword 91', 'Title 91', 'Author 91', 2, 'Synopsis 91', '2020-12-08', '2020-12-07 10:55:48'),
(93, 'CODE92-6089', 'Keyword 92', 'Title 92', 'Author 92', 2, 'Synopsis 92', '2020-12-08', '2020-12-07 10:55:48'),
(94, 'CODE93-4054', 'Keyword 93', 'Title 93', 'Author 93', 2, 'Synopsis 93', '2020-12-08', '2020-12-07 10:55:48'),
(95, 'CODE94-2361', 'Keyword 94', 'Title 94', 'Author 94', 2, 'Synopsis 94', '2020-12-08', '2020-12-07 10:55:48'),
(96, 'CODE95-5069', 'Keyword 95', 'Title 95', 'Author 95', 2, 'Synopsis 95', '2020-12-08', '2020-12-07 10:55:49'),
(97, 'CODE96-5422', 'Keyword 96', 'Title 96', 'Author 96', 2, 'Synopsis 96', '2020-12-08', '2020-12-07 10:55:49'),
(98, 'CODE97-3327', 'Keyword 97', 'Title 97', 'Author 97', 2, 'Synopsis 97', '2020-12-08', '2020-12-07 10:55:49'),
(99, 'CODE98-3911', 'Keyword 98', 'Title 98', 'Author 98', 2, 'Synopsis 98', '2020-12-08', '2020-12-07 10:55:49'),
(100, 'CODE99-7390', 'Keyword 99', 'Title 99', 'Author 99', 1, 'Synopsis 99', '2020-12-08', '2020-12-07 10:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `X_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_Id`, `Name`, `Address`, `X_DateCreated`) VALUES
(1, 'Mapua Intramuros', 'Muralla Intramuros', '2020-10-30 12:51:12'),
(2, 'Mapua Makati', 'Makati, Metro Manila', '2020-10-30 12:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `ejournal`
--

CREATE TABLE `ejournal` (
  `EJournal_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Link` varchar(500) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `X_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ejournal`
--

INSERT INTO `ejournal` (`EJournal_Id`, `Name`, `Link`, `Description`, `X_DateCreated`) VALUES
(1, 'E-journal 1', 'link 1', 'description 1', '2020-10-31 18:17:21'),
(3, 'E-Journal 2', 'Link.com', 'description 2', '2020-11-02 11:49:00'),
(4, 'E-Journal 0', 'Link0.com', 'Description 0', '2020-12-03 15:43:46'),
(5, 'E-Journal 1', 'Link1.com', 'Description 1', '2020-12-03 15:43:46'),
(6, 'E-Journal 2', 'Link2.com', 'Description 2', '2020-12-03 15:43:47'),
(7, 'E-Journal 3', 'Link3.com', 'Description 3', '2020-12-03 15:43:47'),
(8, 'E-Journal 4', 'Link4.com', 'Description 4', '2020-12-03 15:43:47'),
(9, 'E-Journal 5', 'Link5.com', 'Description 5', '2020-12-03 15:43:47'),
(10, 'E-Journal 6', 'Link6.com', 'Description 6', '2020-12-03 15:43:47'),
(11, 'E-Journal 7', 'Link7.com', 'Description 7', '2020-12-03 15:43:47'),
(12, 'E-Journal 8', 'Link8.com', 'Description 8', '2020-12-03 15:43:47'),
(13, 'E-Journal 9', 'Link9.com', 'Description 9', '2020-12-03 15:43:47'),
(14, 'E-Journal 10', 'Link10.com', 'Description 10', '2020-12-03 15:43:47'),
(15, 'E-Journal 11', 'Link11.com', 'Description 11', '2020-12-03 15:43:47'),
(16, 'E-Journal 12', 'Link12.com', 'Description 12', '2020-12-03 15:43:47'),
(17, 'E-Journal 13', 'Link13.com', 'Description 13', '2020-12-03 15:43:47'),
(18, 'E-Journal 14', 'Link14.com', 'Description 14', '2020-12-03 15:43:47'),
(19, 'E-Journal 15', 'Link15.com', 'Description 15', '2020-12-03 15:43:47'),
(20, 'E-Journal 16', 'Link16.com', 'Description 16', '2020-12-03 15:43:47'),
(21, 'E-Journal 17', 'Link17.com', 'Description 17', '2020-12-03 15:43:47'),
(22, 'E-Journal 18', 'Link18.com', 'Description 18', '2020-12-03 15:43:48'),
(23, 'E-Journal 19', 'Link19.com', 'Description 19', '2020-12-03 15:43:48'),
(24, 'E-Journal 20', 'Link20.com', 'Description 20', '2020-12-03 15:43:48'),
(25, 'E-Journal 21', 'Link21.com', 'Description 21', '2020-12-03 15:43:48'),
(26, 'E-Journal 22', 'Link22.com', 'Description 22', '2020-12-03 15:43:48'),
(27, 'E-Journal 23', 'Link23.com', 'Description 23', '2020-12-03 15:43:48'),
(28, 'E-Journal 24', 'Link24.com', 'Description 24', '2020-12-03 15:43:48'),
(29, 'E-Journal 25', 'Link25.com', 'Description 25', '2020-12-03 15:43:48'),
(30, 'E-Journal 26', 'Link26.com', 'Description 26', '2020-12-03 15:43:48'),
(31, 'E-Journal 27', 'Link27.com', 'Description 27', '2020-12-03 15:43:48'),
(32, 'E-Journal 28', 'Link28.com', 'Description 28', '2020-12-03 15:43:48'),
(33, 'E-Journal 29', 'Link29.com', 'Description 29', '2020-12-03 15:43:48'),
(34, 'E-Journal 30', 'Link30.com', 'Description 30', '2020-12-03 15:43:48'),
(35, 'E-Journal 31', 'Link31.com', 'Description 31', '2020-12-03 15:43:48'),
(36, 'E-Journal 32', 'Link32.com', 'Description 32', '2020-12-03 15:43:48'),
(37, 'E-Journal 33', 'Link33.com', 'Description 33', '2020-12-03 15:43:48'),
(38, 'E-Journal 34', 'Link34.com', 'Description 34', '2020-12-03 15:43:48'),
(39, 'E-Journal 35', 'Link35.com', 'Description 35', '2020-12-03 15:43:48'),
(40, 'E-Journal 36', 'Link36.com', 'Description 36', '2020-12-03 15:43:49'),
(41, 'E-Journal 37', 'Link37.com', 'Description 37', '2020-12-03 15:43:49'),
(42, 'E-Journal 38', 'Link38.com', 'Description 38', '2020-12-03 15:43:49'),
(43, 'E-Journal 39', 'Link39.com', 'Description 39', '2020-12-03 15:43:49'),
(44, 'E-Journal 40', 'Link40.com', 'Description 40', '2020-12-03 15:43:49'),
(45, 'E-Journal 41', 'Link41.com', 'Description 41', '2020-12-03 15:43:49'),
(46, 'E-Journal 42', 'Link42.com', 'Description 42', '2020-12-03 15:43:49'),
(47, 'E-Journal 43', 'Link43.com', 'Description 43', '2020-12-03 15:43:49'),
(48, 'E-Journal 44', 'Link44.com', 'Description 44', '2020-12-03 15:43:49'),
(49, 'E-Journal 45', 'Link45.com', 'Description 45', '2020-12-03 15:43:49'),
(50, 'E-Journal 46', 'Link46.com', 'Description 46', '2020-12-03 15:43:49'),
(51, 'E-Journal 47', 'Link47.com', 'Description 47', '2020-12-03 15:43:49'),
(52, 'E-Journal 48', 'Link48.com', 'Description 48', '2020-12-03 15:43:49'),
(53, 'E-Journal 49', 'Link49.com', 'Description 49', '2020-12-03 15:43:49'),
(54, 'E-Journal 50', 'Link50.com', 'Description 50', '2020-12-03 15:43:49'),
(55, 'E-Journal 51', 'Link51.com', 'Description 51', '2020-12-03 15:43:49'),
(56, 'E-Journal 52', 'Link52.com', 'Description 52', '2020-12-03 15:43:49'),
(57, 'E-Journal 53', 'Link53.com', 'Description 53', '2020-12-03 15:43:49'),
(58, 'E-Journal 54', 'Link54.com', 'Description 54', '2020-12-03 15:43:49'),
(59, 'E-Journal 55', 'Link55.com', 'Description 55', '2020-12-03 15:43:49'),
(60, 'E-Journal 56', 'Link56.com', 'Description 56', '2020-12-03 15:43:49'),
(61, 'E-Journal 57', 'Link57.com', 'Description 57', '2020-12-03 15:43:50'),
(62, 'E-Journal 58', 'Link58.com', 'Description 58', '2020-12-03 15:43:50'),
(63, 'E-Journal 59', 'Link59.com', 'Description 59', '2020-12-03 15:43:50'),
(64, 'E-Journal 60', 'Link60.com', 'Description 60', '2020-12-03 15:43:50'),
(65, 'E-Journal 61', 'Link61.com', 'Description 61', '2020-12-03 15:43:50'),
(66, 'E-Journal 62', 'Link62.com', 'Description 62', '2020-12-03 15:43:50'),
(67, 'E-Journal 63', 'Link63.com', 'Description 63', '2020-12-03 15:43:50'),
(68, 'E-Journal 64', 'Link64.com', 'Description 64', '2020-12-03 15:43:50'),
(69, 'E-Journal 65', 'Link65.com', 'Description 65', '2020-12-03 15:43:50'),
(70, 'E-Journal 66', 'Link66.com', 'Description 66', '2020-12-03 15:43:50'),
(71, 'E-Journal 67', 'Link67.com', 'Description 67', '2020-12-03 15:43:50'),
(72, 'E-Journal 68', 'Link68.com', 'Description 68', '2020-12-03 15:43:50'),
(73, 'E-Journal 69', 'Link69.com', 'Description 69', '2020-12-03 15:43:50'),
(74, 'E-Journal 70', 'Link70.com', 'Description 70', '2020-12-03 15:43:50'),
(75, 'E-Journal 71', 'Link71.com', 'Description 71', '2020-12-03 15:43:50'),
(76, 'E-Journal 72', 'Link72.com', 'Description 72', '2020-12-03 15:43:50'),
(77, 'E-Journal 73', 'Link73.com', 'Description 73', '2020-12-03 15:43:50'),
(78, 'E-Journal 74', 'Link74.com', 'Description 74', '2020-12-03 15:43:50'),
(79, 'E-Journal 75', 'Link75.com', 'Description 75', '2020-12-03 15:43:50'),
(80, 'E-Journal 76', 'Link76.com', 'Description 76', '2020-12-03 15:43:50'),
(81, 'E-Journal 77', 'Link77.com', 'Description 77', '2020-12-03 15:43:50'),
(82, 'E-Journal 78', 'Link78.com', 'Description 78', '2020-12-03 15:43:50'),
(83, 'E-Journal 79', 'Link79.com', 'Description 79', '2020-12-03 15:43:50'),
(84, 'E-Journal 80', 'Link80.com', 'Description 80', '2020-12-03 15:43:50'),
(85, 'E-Journal 81', 'Link81.com', 'Description 81', '2020-12-03 15:43:51'),
(86, 'E-Journal 82', 'Link82.com', 'Description 82', '2020-12-03 15:43:51'),
(87, 'E-Journal 83', 'Link83.com', 'Description 83', '2020-12-03 15:43:51'),
(88, 'E-Journal 84', 'Link84.com', 'Description 84', '2020-12-03 15:43:51'),
(89, 'E-Journal 85', 'Link85.com', 'Description 85', '2020-12-03 15:43:51'),
(90, 'E-Journal 86', 'Link86.com', 'Description 86', '2020-12-03 15:43:51'),
(91, 'E-Journal 87', 'Link87.com', 'Description 87', '2020-12-03 15:43:51'),
(92, 'E-Journal 88', 'Link88.com', 'Description 88', '2020-12-03 15:43:51'),
(93, 'E-Journal 89', 'Link89.com', 'Description 89', '2020-12-03 15:43:51'),
(94, 'E-Journal 90', 'Link90.com', 'Description 90', '2020-12-03 15:43:51'),
(95, 'E-Journal 91', 'Link91.com', 'Description 91', '2020-12-03 15:43:51'),
(96, 'E-Journal 92', 'Link92.com', 'Description 92', '2020-12-03 15:43:51'),
(97, 'E-Journal 93', 'Link93.com', 'Description 93', '2020-12-03 15:43:51'),
(98, 'E-Journal 94', 'Link94.com', 'Description 94', '2020-12-03 15:43:51'),
(99, 'E-Journal 95', 'Link95.com', 'Description 95', '2020-12-03 15:43:51'),
(100, 'E-Journal 96', 'Link96.com', 'Description 96', '2020-12-03 15:43:51'),
(101, 'E-Journal 97', 'Link97.com', 'Description 97', '2020-12-03 15:43:51'),
(102, 'E-Journal 98', 'Link98.com', 'Description 98', '2020-12-03 15:43:51'),
(103, 'E-Journal 99', 'Link99.com', 'Description 99', '2020-12-03 15:43:51'),
(104, 'E-Journal 0', 'Link0.com', 'Description 0', '2020-12-03 15:43:51'),
(105, 'E-Journal 1', 'Link1.com', 'Description 1', '2020-12-03 15:43:51'),
(106, 'E-Journal 2', 'Link2.com', 'Description 2', '2020-12-03 15:43:51'),
(107, 'E-Journal 3', 'Link3.com', 'Description 3', '2020-12-03 15:43:51'),
(108, 'E-Journal 4', 'Link4.com', 'Description 4', '2020-12-03 15:43:51'),
(109, 'E-Journal 5', 'Link5.com', 'Description 5', '2020-12-03 15:43:52'),
(110, 'E-Journal 6', 'Link6.com', 'Description 6', '2020-12-03 15:43:52'),
(111, 'E-Journal 7', 'Link7.com', 'Description 7', '2020-12-03 15:43:52'),
(112, 'E-Journal 8', 'Link8.com', 'Description 8', '2020-12-03 15:43:52'),
(113, 'E-Journal 9', 'Link9.com', 'Description 9', '2020-12-03 15:43:52'),
(114, 'E-Journal 10', 'Link10.com', 'Description 10', '2020-12-03 15:43:52'),
(115, 'E-Journal 11', 'Link11.com', 'Description 11', '2020-12-03 15:43:52'),
(116, 'E-Journal 12', 'Link12.com', 'Description 12', '2020-12-03 15:43:52'),
(117, 'E-Journal 13', 'Link13.com', 'Description 13', '2020-12-03 15:43:52'),
(118, 'E-Journal 14', 'Link14.com', 'Description 14', '2020-12-03 15:43:52'),
(119, 'E-Journal 15', 'Link15.com', 'Description 15', '2020-12-03 15:43:52'),
(120, 'E-Journal 16', 'Link16.com', 'Description 16', '2020-12-03 15:43:52'),
(121, 'E-Journal 17', 'Link17.com', 'Description 17', '2020-12-03 15:43:52'),
(122, 'E-Journal 18', 'Link18.com', 'Description 18', '2020-12-03 15:43:52'),
(123, 'E-Journal 19', 'Link19.com', 'Description 19', '2020-12-03 15:43:52'),
(124, 'E-Journal 20', 'Link20.com', 'Description 20', '2020-12-03 15:43:52'),
(125, 'E-Journal 21', 'Link21.com', 'Description 21', '2020-12-03 15:43:52'),
(126, 'E-Journal 22', 'Link22.com', 'Description 22', '2020-12-03 15:43:52'),
(127, 'E-Journal 23', 'Link23.com', 'Description 23', '2020-12-03 15:43:52'),
(128, 'E-Journal 24', 'Link24.com', 'Description 24', '2020-12-03 15:43:52'),
(129, 'E-Journal 25', 'Link25.com', 'Description 25', '2020-12-03 15:43:52'),
(130, 'E-Journal 26', 'Link26.com', 'Description 26', '2020-12-03 15:43:52'),
(131, 'E-Journal 27', 'Link27.com', 'Description 27', '2020-12-03 15:43:53'),
(132, 'E-Journal 28', 'Link28.com', 'Description 28', '2020-12-03 15:43:53'),
(133, 'E-Journal 29', 'Link29.com', 'Description 29', '2020-12-03 15:43:53'),
(134, 'E-Journal 30', 'Link30.com', 'Description 30', '2020-12-03 15:43:53'),
(135, 'E-Journal 31', 'Link31.com', 'Description 31', '2020-12-03 15:43:53'),
(136, 'E-Journal 32', 'Link32.com', 'Description 32', '2020-12-03 15:43:53'),
(137, 'E-Journal 33', 'Link33.com', 'Description 33', '2020-12-03 15:43:53'),
(138, 'E-Journal 34', 'Link34.com', 'Description 34', '2020-12-03 15:43:53'),
(139, 'E-Journal 35', 'Link35.com', 'Description 35', '2020-12-03 15:43:53'),
(140, 'E-Journal 36', 'Link36.com', 'Description 36', '2020-12-03 15:43:53'),
(141, 'E-Journal 37', 'Link37.com', 'Description 37', '2020-12-03 15:43:53'),
(142, 'E-Journal 38', 'Link38.com', 'Description 38', '2020-12-03 15:43:53'),
(143, 'E-Journal 39', 'Link39.com', 'Description 39', '2020-12-03 15:43:53'),
(144, 'E-Journal 40', 'Link40.com', 'Description 40', '2020-12-03 15:43:53'),
(145, 'E-Journal 41', 'Link41.com', 'Description 41', '2020-12-03 15:43:53'),
(146, 'E-Journal 42', 'Link42.com', 'Description 42', '2020-12-03 15:43:53'),
(147, 'E-Journal 43', 'Link43.com', 'Description 43', '2020-12-03 15:43:53'),
(148, 'E-Journal 44', 'Link44.com', 'Description 44', '2020-12-03 15:43:53'),
(149, 'E-Journal 45', 'Link45.com', 'Description 45', '2020-12-03 15:43:53'),
(150, 'E-Journal 46', 'Link46.com', 'Description 46', '2020-12-03 15:43:53'),
(151, 'E-Journal 47', 'Link47.com', 'Description 47', '2020-12-03 15:43:53'),
(152, 'E-Journal 48', 'Link48.com', 'Description 48', '2020-12-03 15:43:53'),
(153, 'E-Journal 49', 'Link49.com', 'Description 49', '2020-12-03 15:43:53'),
(154, 'E-Journal 50', 'Link50.com', 'Description 50', '2020-12-03 15:43:54'),
(155, 'E-Journal 51', 'Link51.com', 'Description 51', '2020-12-03 15:43:54'),
(156, 'E-Journal 52', 'Link52.com', 'Description 52', '2020-12-03 15:43:54'),
(157, 'E-Journal 53', 'Link53.com', 'Description 53', '2020-12-03 15:43:54'),
(158, 'E-Journal 54', 'Link54.com', 'Description 54', '2020-12-03 15:43:54'),
(159, 'E-Journal 55', 'Link55.com', 'Description 55', '2020-12-03 15:43:54'),
(160, 'E-Journal 56', 'Link56.com', 'Description 56', '2020-12-03 15:43:54'),
(161, 'E-Journal 57', 'Link57.com', 'Description 57', '2020-12-03 15:43:54'),
(162, 'E-Journal 58', 'Link58.com', 'Description 58', '2020-12-03 15:43:54'),
(163, 'E-Journal 59', 'Link59.com', 'Description 59', '2020-12-03 15:43:54'),
(164, 'E-Journal 60', 'Link60.com', 'Description 60', '2020-12-03 15:43:54'),
(165, 'E-Journal 61', 'Link61.com', 'Description 61', '2020-12-03 15:43:54'),
(166, 'E-Journal 62', 'Link62.com', 'Description 62', '2020-12-03 15:43:54'),
(167, 'E-Journal 63', 'Link63.com', 'Description 63', '2020-12-03 15:43:54'),
(168, 'E-Journal 64', 'Link64.com', 'Description 64', '2020-12-03 15:43:54'),
(169, 'E-Journal 65', 'Link65.com', 'Description 65', '2020-12-03 15:43:54'),
(170, 'E-Journal 66', 'Link66.com', 'Description 66', '2020-12-03 15:43:54'),
(171, 'E-Journal 67', 'Link67.com', 'Description 67', '2020-12-03 15:43:54'),
(172, 'E-Journal 68', 'Link68.com', 'Description 68', '2020-12-03 15:43:54'),
(173, 'E-Journal 69', 'Link69.com', 'Description 69', '2020-12-03 15:43:54'),
(174, 'E-Journal 70', 'Link70.com', 'Description 70', '2020-12-03 15:43:54'),
(175, 'E-Journal 71', 'Link71.com', 'Description 71', '2020-12-03 15:43:54'),
(176, 'E-Journal 72', 'Link72.com', 'Description 72', '2020-12-03 15:43:54'),
(177, 'E-Journal 73', 'Link73.com', 'Description 73', '2020-12-03 15:43:54'),
(178, 'E-Journal 74', 'Link74.com', 'Description 74', '2020-12-03 15:43:55'),
(179, 'E-Journal 75', 'Link75.com', 'Description 75', '2020-12-03 15:43:55'),
(180, 'E-Journal 76', 'Link76.com', 'Description 76', '2020-12-03 15:43:55'),
(181, 'E-Journal 77', 'Link77.com', 'Description 77', '2020-12-03 15:43:55'),
(182, 'E-Journal 78', 'Link78.com', 'Description 78', '2020-12-03 15:43:55'),
(183, 'E-Journal 79', 'Link79.com', 'Description 79', '2020-12-03 15:43:55'),
(184, 'E-Journal 80', 'Link80.com', 'Description 80', '2020-12-03 15:43:55'),
(185, 'E-Journal 81', 'Link81.com', 'Description 81', '2020-12-03 15:43:55'),
(186, 'E-Journal 82', 'Link82.com', 'Description 82', '2020-12-03 15:43:55'),
(187, 'E-Journal 83', 'Link83.com', 'Description 83', '2020-12-03 15:43:55'),
(188, 'E-Journal 84', 'Link84.com', 'Description 84', '2020-12-03 15:43:55'),
(189, 'E-Journal 85', 'Link85.com', 'Description 85', '2020-12-03 15:43:55'),
(190, 'E-Journal 86', 'Link86.com', 'Description 86', '2020-12-03 15:43:55'),
(191, 'E-Journal 87', 'Link87.com', 'Description 87', '2020-12-03 15:43:55'),
(192, 'E-Journal 88', 'Link88.com', 'Description 88', '2020-12-03 15:43:55'),
(193, 'E-Journal 89', 'Link89.com', 'Description 89', '2020-12-03 15:43:55'),
(194, 'E-Journal 90', 'Link90.com', 'Description 90', '2020-12-03 15:43:55'),
(195, 'E-Journal 91', 'Link91.com', 'Description 91', '2020-12-03 15:43:55'),
(196, 'E-Journal 92', 'Link92.com', 'Description 92', '2020-12-03 15:43:55'),
(197, 'E-Journal 93', 'Link93.com', 'Description 93', '2020-12-03 15:43:55'),
(198, 'E-Journal 94', 'Link94.com', 'Description 94', '2020-12-03 15:43:56'),
(199, 'E-Journal 95', 'Link95.com', 'Description 95', '2020-12-03 15:43:56'),
(200, 'E-Journal 96', 'Link96.com', 'Description 96', '2020-12-03 15:43:56'),
(201, 'E-Journal 97', 'Link97.com', 'Description 97', '2020-12-03 15:43:56'),
(202, 'E-Journal 98', 'Link98.com', 'Description 98', '2020-12-03 15:43:56'),
(203, 'E-Journal 99', 'Link99.com', 'Description 99', '2020-12-03 15:43:56'),
(204, 'E-Journal 0', 'Link0.com', 'Description 0', '2020-12-03 15:43:59'),
(205, 'E-Journal 1', 'Link1.com', 'Description 1', '2020-12-03 15:43:59'),
(206, 'E-Journal 2', 'Link2.com', 'Description 2', '2020-12-03 15:43:59'),
(207, 'E-Journal 3', 'Link3.com', 'Description 3', '2020-12-03 15:43:59'),
(208, 'E-Journal 4', 'Link4.com', 'Description 4', '2020-12-03 15:43:59'),
(209, 'E-Journal 5', 'Link5.com', 'Description 5', '2020-12-03 15:43:59'),
(210, 'E-Journal 6', 'Link6.com', 'Description 6', '2020-12-03 15:43:59'),
(211, 'E-Journal 7', 'Link7.com', 'Description 7', '2020-12-03 15:43:59'),
(212, 'E-Journal 8', 'Link8.com', 'Description 8', '2020-12-03 15:43:59'),
(213, 'E-Journal 9', 'Link9.com', 'Description 9', '2020-12-03 15:43:59'),
(214, 'E-Journal 10', 'Link10.com', 'Description 10', '2020-12-03 15:43:59'),
(215, 'E-Journal 11', 'Link11.com', 'Description 11', '2020-12-03 15:43:59'),
(216, 'E-Journal 12', 'Link12.com', 'Description 12', '2020-12-03 15:43:59'),
(217, 'E-Journal 13', 'Link13.com', 'Description 13', '2020-12-03 15:43:59'),
(218, 'E-Journal 14', 'Link14.com', 'Description 14', '2020-12-03 15:43:59'),
(219, 'E-Journal 15', 'Link15.com', 'Description 15', '2020-12-03 15:43:59'),
(220, 'E-Journal 16', 'Link16.com', 'Description 16', '2020-12-03 15:43:59'),
(221, 'E-Journal 17', 'Link17.com', 'Description 17', '2020-12-03 15:43:59'),
(222, 'E-Journal 18', 'Link18.com', 'Description 18', '2020-12-03 15:43:59'),
(223, 'E-Journal 19', 'Link19.com', 'Description 19', '2020-12-03 15:43:59'),
(224, 'E-Journal 20', 'Link20.com', 'Description 20', '2020-12-03 15:44:00'),
(225, 'E-Journal 21', 'Link21.com', 'Description 21', '2020-12-03 15:44:00'),
(226, 'E-Journal 22', 'Link22.com', 'Description 22', '2020-12-03 15:44:00'),
(227, 'E-Journal 23', 'Link23.com', 'Description 23', '2020-12-03 15:44:00'),
(228, 'E-Journal 24', 'Link24.com', 'Description 24', '2020-12-03 15:44:00'),
(229, 'E-Journal 25', 'Link25.com', 'Description 25', '2020-12-03 15:44:00'),
(230, 'E-Journal 26', 'Link26.com', 'Description 26', '2020-12-03 15:44:00'),
(231, 'E-Journal 27', 'Link27.com', 'Description 27', '2020-12-03 15:44:00'),
(232, 'E-Journal 28', 'Link28.com', 'Description 28', '2020-12-03 15:44:00'),
(233, 'E-Journal 29', 'Link29.com', 'Description 29', '2020-12-03 15:44:00'),
(234, 'E-Journal 30', 'Link30.com', 'Description 30', '2020-12-03 15:44:00'),
(235, 'E-Journal 31', 'Link31.com', 'Description 31', '2020-12-03 15:44:00'),
(236, 'E-Journal 32', 'Link32.com', 'Description 32', '2020-12-03 15:44:00'),
(237, 'E-Journal 33', 'Link33.com', 'Description 33', '2020-12-03 15:44:00'),
(238, 'E-Journal 34', 'Link34.com', 'Description 34', '2020-12-03 15:44:00'),
(239, 'E-Journal 35', 'Link35.com', 'Description 35', '2020-12-03 15:44:00'),
(240, 'E-Journal 36', 'Link36.com', 'Description 36', '2020-12-03 15:44:00'),
(241, 'E-Journal 37', 'Link37.com', 'Description 37', '2020-12-03 15:44:00'),
(242, 'E-Journal 38', 'Link38.com', 'Description 38', '2020-12-03 15:44:00'),
(243, 'E-Journal 39', 'Link39.com', 'Description 39', '2020-12-03 15:44:00'),
(244, 'E-Journal 40', 'Link40.com', 'Description 40', '2020-12-03 15:44:00'),
(245, 'E-Journal 41', 'Link41.com', 'Description 41', '2020-12-03 15:44:00'),
(246, 'E-Journal 42', 'Link42.com', 'Description 42', '2020-12-03 15:44:00'),
(247, 'E-Journal 43', 'Link43.com', 'Description 43', '2020-12-03 15:44:00'),
(248, 'E-Journal 44', 'Link44.com', 'Description 44', '2020-12-03 15:44:00'),
(249, 'E-Journal 45', 'Link45.com', 'Description 45', '2020-12-03 15:44:00'),
(250, 'E-Journal 46', 'Link46.com', 'Description 46', '2020-12-03 15:44:01'),
(251, 'E-Journal 47', 'Link47.com', 'Description 47', '2020-12-03 15:44:01'),
(252, 'E-Journal 48', 'Link48.com', 'Description 48', '2020-12-03 15:44:01'),
(253, 'E-Journal 49', 'Link49.com', 'Description 49', '2020-12-03 15:44:01'),
(254, 'E-Journal 50', 'Link50.com', 'Description 50', '2020-12-03 15:44:01'),
(255, 'E-Journal 51', 'Link51.com', 'Description 51', '2020-12-03 15:44:01'),
(256, 'E-Journal 52', 'Link52.com', 'Description 52', '2020-12-03 15:44:01'),
(257, 'E-Journal 53', 'Link53.com', 'Description 53', '2020-12-03 15:44:01'),
(258, 'E-Journal 54', 'Link54.com', 'Description 54', '2020-12-03 15:44:01'),
(259, 'E-Journal 55', 'Link55.com', 'Description 55', '2020-12-03 15:44:01'),
(260, 'E-Journal 56', 'Link56.com', 'Description 56', '2020-12-03 15:44:01'),
(261, 'E-Journal 57', 'Link57.com', 'Description 57', '2020-12-03 15:44:01'),
(262, 'E-Journal 58', 'Link58.com', 'Description 58', '2020-12-03 15:44:01'),
(263, 'E-Journal 59', 'Link59.com', 'Description 59', '2020-12-03 15:44:01'),
(264, 'E-Journal 60', 'Link60.com', 'Description 60', '2020-12-03 15:44:01'),
(265, 'E-Journal 61', 'Link61.com', 'Description 61', '2020-12-03 15:44:02'),
(266, 'E-Journal 62', 'Link62.com', 'Description 62', '2020-12-03 15:44:02'),
(267, 'E-Journal 63', 'Link63.com', 'Description 63', '2020-12-03 15:44:02'),
(268, 'E-Journal 64', 'Link64.com', 'Description 64', '2020-12-03 15:44:02'),
(269, 'E-Journal 65', 'Link65.com', 'Description 65', '2020-12-03 15:44:02'),
(270, 'E-Journal 66', 'Link66.com', 'Description 66', '2020-12-03 15:44:02'),
(271, 'E-Journal 67', 'Link67.com', 'Description 67', '2020-12-03 15:44:02'),
(272, 'E-Journal 68', 'Link68.com', 'Description 68', '2020-12-03 15:44:02'),
(273, 'E-Journal 69', 'Link69.com', 'Description 69', '2020-12-03 15:44:02'),
(274, 'E-Journal 70', 'Link70.com', 'Description 70', '2020-12-03 15:44:02'),
(275, 'E-Journal 71', 'Link71.com', 'Description 71', '2020-12-03 15:44:02'),
(276, 'E-Journal 72', 'Link72.com', 'Description 72', '2020-12-03 15:44:02'),
(277, 'E-Journal 73', 'Link73.com', 'Description 73', '2020-12-03 15:44:02'),
(278, 'E-Journal 74', 'Link74.com', 'Description 74', '2020-12-03 15:44:02'),
(279, 'E-Journal 75', 'Link75.com', 'Description 75', '2020-12-03 15:44:02'),
(280, 'E-Journal 76', 'Link76.com', 'Description 76', '2020-12-03 15:44:02'),
(281, 'E-Journal 77', 'Link77.com', 'Description 77', '2020-12-03 15:44:02'),
(282, 'E-Journal 78', 'Link78.com', 'Description 78', '2020-12-03 15:44:02'),
(283, 'E-Journal 79', 'Link79.com', 'Description 79', '2020-12-03 15:44:02'),
(284, 'E-Journal 80', 'Link80.com', 'Description 80', '2020-12-03 15:44:02'),
(285, 'E-Journal 81', 'Link81.com', 'Description 81', '2020-12-03 15:44:03'),
(286, 'E-Journal 82', 'Link82.com', 'Description 82', '2020-12-03 15:44:03'),
(287, 'E-Journal 83', 'Link83.com', 'Description 83', '2020-12-03 15:44:03'),
(288, 'E-Journal 84', 'Link84.com', 'Description 84', '2020-12-03 15:44:03'),
(289, 'E-Journal 85', 'Link85.com', 'Description 85', '2020-12-03 15:44:03'),
(290, 'E-Journal 86', 'Link86.com', 'Description 86', '2020-12-03 15:44:03'),
(291, 'E-Journal 87', 'Link87.com', 'Description 87', '2020-12-03 15:44:03'),
(292, 'E-Journal 88', 'Link88.com', 'Description 88', '2020-12-03 15:44:03'),
(293, 'E-Journal 89', 'Link89.com', 'Description 89', '2020-12-03 15:44:03'),
(294, 'E-Journal 90', 'Link90.com', 'Description 90', '2020-12-03 15:44:03'),
(295, 'E-Journal 91', 'Link91.com', 'Description 91', '2020-12-03 15:44:03'),
(296, 'E-Journal 92', 'Link92.com', 'Description 92', '2020-12-03 15:44:03'),
(297, 'E-Journal 93', 'Link93.com', 'Description 93', '2020-12-03 15:44:03'),
(298, 'E-Journal 94', 'Link94.com', 'Description 94', '2020-12-03 15:44:03'),
(299, 'E-Journal 95', 'Link95.com', 'Description 95', '2020-12-03 15:44:03'),
(300, 'E-Journal 96', 'Link96.com', 'Description 96', '2020-12-03 15:44:03'),
(301, 'E-Journal 97', 'Link97.com', 'Description 97', '2020-12-03 15:44:03'),
(302, 'E-Journal 98', 'Link98.com', 'Description 98', '2020-12-03 15:44:03'),
(303, 'E-Journal 99', 'Link99.com', 'Description 99', '2020-12-03 15:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Inventory_Id` int(11) NOT NULL,
  `Branch_Id` int(11) NOT NULL,
  `Book_Id` int(11) NOT NULL,
  `DateAcquired` date NOT NULL,
  `X_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_Id`, `Branch_Id`, `Book_Id`, `DateAcquired`, `X_DateCreated`) VALUES
(1, 2, 1, '2021-04-13', '2020-12-07 10:55:29'),
(2, 2, 2, '2021-03-19', '2020-12-07 10:55:29'),
(3, 1, 2, '2021-06-04', '2020-12-07 10:55:29'),
(4, 2, 2, '2021-05-06', '2020-12-07 10:55:29'),
(5, 1, 2, '2021-04-18', '2020-12-07 10:55:29'),
(6, 1, 2, '2021-04-24', '2020-12-07 10:55:30'),
(7, 2, 2, '2021-03-22', '2020-12-07 10:55:30'),
(8, 1, 3, '2021-06-20', '2020-12-07 10:55:30'),
(9, 1, 3, '2021-06-16', '2020-12-07 10:55:30'),
(10, 2, 3, '2021-04-11', '2020-12-07 10:55:30'),
(11, 2, 4, '2021-06-16', '2020-12-07 10:55:30'),
(12, 1, 5, '2021-04-10', '2020-12-07 10:55:30'),
(13, 2, 5, '2021-04-19', '2020-12-07 10:55:30'),
(14, 2, 5, '2021-03-31', '2020-12-07 10:55:30'),
(15, 1, 5, '2021-06-15', '2020-12-07 10:55:30'),
(16, 2, 5, '2021-05-24', '2020-12-07 10:55:30'),
(17, 2, 5, '2021-05-30', '2020-12-07 10:55:30'),
(18, 2, 6, '2021-05-19', '2020-12-07 10:55:30'),
(19, 1, 7, '2021-06-05', '2020-12-07 10:55:30'),
(20, 1, 7, '2021-05-23', '2020-12-07 10:55:30'),
(21, 2, 7, '2021-06-06', '2020-12-07 10:55:30'),
(22, 1, 7, '2021-04-19', '2020-12-07 10:55:31'),
(23, 2, 8, '2021-05-16', '2020-12-07 10:55:31'),
(24, 2, 8, '2021-03-26', '2020-12-07 10:55:31'),
(25, 1, 8, '2021-05-27', '2020-12-07 10:55:31'),
(26, 2, 8, '2021-04-20', '2020-12-07 10:55:31'),
(27, 1, 9, '2021-05-17', '2020-12-07 10:55:31'),
(28, 2, 9, '2021-04-28', '2020-12-07 10:55:31'),
(29, 2, 9, '2021-04-28', '2020-12-07 10:55:31'),
(30, 1, 10, '2021-05-08', '2020-12-07 10:55:31'),
(31, 2, 10, '2021-05-29', '2020-12-07 10:55:31'),
(32, 2, 10, '2021-04-12', '2020-12-07 10:55:31'),
(33, 1, 10, '2021-04-03', '2020-12-07 10:55:31'),
(34, 2, 10, '2021-04-16', '2020-12-07 10:55:31'),
(35, 1, 10, '2021-05-23', '2020-12-07 10:55:31'),
(36, 2, 11, '2021-05-09', '2020-12-07 10:55:31'),
(37, 1, 11, '2021-04-24', '2020-12-07 10:55:31'),
(38, 2, 12, '2021-05-11', '2020-12-07 10:55:31'),
(39, 1, 12, '2021-05-26', '2020-12-07 10:55:31'),
(40, 1, 13, '2021-04-09', '2020-12-07 10:55:32'),
(41, 1, 13, '2021-06-08', '2020-12-07 10:55:32'),
(42, 1, 13, '2021-05-18', '2020-12-07 10:55:32'),
(43, 1, 14, '2021-03-30', '2020-12-07 10:55:32'),
(44, 1, 14, '2021-06-09', '2020-12-07 10:55:32'),
(45, 1, 14, '2021-03-29', '2020-12-07 10:55:32'),
(46, 2, 15, '2021-03-22', '2020-12-07 10:55:32'),
(47, 2, 15, '2021-06-07', '2020-12-07 10:55:32'),
(48, 1, 15, '2021-05-06', '2020-12-07 10:55:32'),
(49, 2, 15, '2021-05-06', '2020-12-07 10:55:32'),
(50, 1, 15, '2021-05-21', '2020-12-07 10:55:32'),
(51, 2, 16, '2021-05-31', '2020-12-07 10:55:32'),
(52, 2, 16, '2021-04-29', '2020-12-07 10:55:32'),
(53, 2, 16, '2021-06-08', '2020-12-07 10:55:32'),
(54, 2, 16, '2021-06-01', '2020-12-07 10:55:32'),
(55, 2, 16, '2021-04-04', '2020-12-07 10:55:32'),
(56, 1, 16, '2021-05-22', '2020-12-07 10:55:32'),
(57, 2, 17, '2021-04-05', '2020-12-07 10:55:32'),
(58, 2, 17, '2021-04-16', '2020-12-07 10:55:33'),
(59, 1, 17, '2021-05-10', '2020-12-07 10:55:33'),
(60, 2, 17, '2021-06-05', '2020-12-07 10:55:33'),
(61, 1, 17, '2021-06-20', '2020-12-07 10:55:33'),
(62, 1, 18, '2021-06-15', '2020-12-07 10:55:33'),
(63, 2, 18, '2021-05-08', '2020-12-07 10:55:33'),
(64, 2, 18, '2021-05-24', '2020-12-07 10:55:33'),
(65, 2, 19, '2021-06-22', '2020-12-07 10:55:33'),
(66, 2, 19, '2021-04-29', '2020-12-07 10:55:33'),
(67, 1, 20, '2021-06-18', '2020-12-07 10:55:33'),
(68, 1, 20, '2021-04-09', '2020-12-07 10:55:33'),
(69, 1, 20, '2021-05-12', '2020-12-07 10:55:33'),
(70, 1, 21, '2021-05-04', '2020-12-07 10:55:33'),
(71, 1, 21, '2021-05-17', '2020-12-07 10:55:33'),
(72, 2, 21, '2021-06-08', '2020-12-07 10:55:33'),
(73, 1, 21, '2021-06-10', '2020-12-07 10:55:33'),
(74, 1, 22, '2021-05-01', '2020-12-07 10:55:34'),
(75, 1, 22, '2021-05-25', '2020-12-07 10:55:34'),
(76, 1, 23, '2021-03-17', '2020-12-07 10:55:34'),
(77, 1, 23, '2021-05-03', '2020-12-07 10:55:34'),
(78, 2, 23, '2021-04-22', '2020-12-07 10:55:34'),
(79, 2, 23, '2021-03-18', '2020-12-07 10:55:34'),
(80, 2, 23, '2021-04-26', '2020-12-07 10:55:34'),
(81, 1, 23, '2021-06-13', '2020-12-07 10:55:34'),
(82, 2, 24, '2021-03-20', '2020-12-07 10:55:34'),
(83, 2, 24, '2021-04-26', '2020-12-07 10:55:34'),
(84, 1, 24, '2021-05-30', '2020-12-07 10:55:34'),
(85, 2, 24, '2021-04-01', '2020-12-07 10:55:34'),
(86, 1, 24, '2021-05-06', '2020-12-07 10:55:34'),
(87, 2, 25, '2021-04-28', '2020-12-07 10:55:34'),
(88, 2, 25, '2021-04-22', '2020-12-07 10:55:34'),
(89, 1, 25, '2021-04-17', '2020-12-07 10:55:34'),
(90, 1, 25, '2021-05-17', '2020-12-07 10:55:34'),
(91, 2, 25, '2021-04-21', '2020-12-07 10:55:34'),
(92, 1, 26, '2021-06-23', '2020-12-07 10:55:34'),
(93, 2, 26, '2021-05-16', '2020-12-07 10:55:34'),
(94, 2, 26, '2021-05-01', '2020-12-07 10:55:34'),
(95, 2, 26, '2021-06-12', '2020-12-07 10:55:34'),
(96, 1, 27, '2021-05-25', '2020-12-07 10:55:35'),
(97, 1, 28, '2021-04-01', '2020-12-07 10:55:35'),
(98, 1, 28, '2021-06-20', '2020-12-07 10:55:35'),
(99, 1, 28, '2021-04-25', '2020-12-07 10:55:35'),
(100, 2, 28, '2021-04-28', '2020-12-07 10:55:35'),
(101, 1, 28, '2021-04-30', '2020-12-07 10:55:35'),
(102, 2, 29, '2021-06-10', '2020-12-07 10:55:35'),
(103, 2, 29, '2021-03-28', '2020-12-07 10:55:35'),
(104, 1, 29, '2021-03-20', '2020-12-07 10:55:35'),
(105, 2, 30, '2021-04-25', '2020-12-07 10:55:35'),
(106, 2, 30, '2021-06-12', '2020-12-07 10:55:35'),
(107, 1, 30, '2021-03-29', '2020-12-07 10:55:35'),
(108, 2, 30, '2021-04-01', '2020-12-07 10:55:35'),
(109, 2, 31, '2021-05-01', '2020-12-07 10:55:35'),
(110, 2, 31, '2021-04-17', '2020-12-07 10:55:35'),
(111, 1, 31, '2021-06-10', '2020-12-07 10:55:35'),
(112, 1, 32, '2021-05-09', '2020-12-07 10:55:35'),
(113, 2, 33, '2021-03-28', '2020-12-07 10:55:36'),
(114, 1, 34, '2021-03-22', '2020-12-07 10:55:36'),
(115, 1, 34, '2021-04-24', '2020-12-07 10:55:36'),
(116, 2, 35, '2021-04-14', '2020-12-07 10:55:36'),
(117, 2, 35, '2021-05-30', '2020-12-07 10:55:36'),
(118, 1, 35, '2021-05-04', '2020-12-07 10:55:36'),
(119, 1, 35, '2021-05-10', '2020-12-07 10:55:36'),
(120, 1, 36, '2021-06-06', '2020-12-07 10:55:36'),
(121, 2, 36, '2021-06-04', '2020-12-07 10:55:36'),
(122, 2, 36, '2021-04-22', '2020-12-07 10:55:36'),
(123, 1, 36, '2021-06-22', '2020-12-07 10:55:36'),
(124, 2, 36, '2021-05-12', '2020-12-07 10:55:36'),
(125, 2, 36, '2021-05-15', '2020-12-07 10:55:36'),
(126, 1, 37, '2021-03-18', '2020-12-07 10:55:36'),
(127, 2, 37, '2021-06-07', '2020-12-07 10:55:36'),
(128, 1, 37, '2021-05-01', '2020-12-07 10:55:36'),
(129, 2, 37, '2021-06-12', '2020-12-07 10:55:36'),
(130, 2, 38, '2021-05-29', '2020-12-07 10:55:37'),
(131, 1, 39, '2021-05-06', '2020-12-07 10:55:37'),
(132, 2, 40, '2021-04-08', '2020-12-07 10:55:37'),
(133, 1, 40, '2021-06-18', '2020-12-07 10:55:37'),
(134, 2, 40, '2021-04-05', '2020-12-07 10:55:37'),
(135, 2, 40, '2021-05-21', '2020-12-07 10:55:37'),
(136, 1, 40, '2021-05-19', '2020-12-07 10:55:37'),
(137, 1, 40, '2021-05-20', '2020-12-07 10:55:37'),
(138, 1, 41, '2021-05-01', '2020-12-07 10:55:37'),
(139, 2, 41, '2021-05-26', '2020-12-07 10:55:37'),
(140, 1, 41, '2021-04-10', '2020-12-07 10:55:37'),
(141, 1, 41, '2021-05-21', '2020-12-07 10:55:37'),
(142, 2, 41, '2021-05-29', '2020-12-07 10:55:37'),
(143, 1, 42, '2021-05-27', '2020-12-07 10:55:37'),
(144, 1, 42, '2021-04-30', '2020-12-07 10:55:37'),
(145, 2, 42, '2021-03-28', '2020-12-07 10:55:38'),
(146, 2, 42, '2021-04-15', '2020-12-07 10:55:38'),
(147, 2, 43, '2021-05-08', '2020-12-07 10:55:38'),
(148, 1, 43, '2021-05-04', '2020-12-07 10:55:38'),
(149, 2, 43, '2021-05-03', '2020-12-07 10:55:38'),
(150, 2, 44, '2021-06-22', '2020-12-07 10:55:38'),
(151, 2, 44, '2021-05-02', '2020-12-07 10:55:38'),
(152, 2, 45, '2021-05-16', '2020-12-07 10:55:38'),
(153, 2, 45, '2021-04-18', '2020-12-07 10:55:38'),
(154, 2, 45, '2021-05-07', '2020-12-07 10:55:38'),
(155, 2, 45, '2021-04-07', '2020-12-07 10:55:38'),
(156, 1, 46, '2021-05-25', '2020-12-07 10:55:38'),
(157, 2, 46, '2021-04-12', '2020-12-07 10:55:38'),
(158, 2, 46, '2021-05-18', '2020-12-07 10:55:38'),
(159, 1, 46, '2021-06-03', '2020-12-07 10:55:38'),
(160, 1, 46, '2021-04-23', '2020-12-07 10:55:38'),
(161, 1, 47, '2021-03-22', '2020-12-07 10:55:38'),
(162, 1, 47, '2021-04-25', '2020-12-07 10:55:38'),
(163, 1, 47, '2021-04-04', '2020-12-07 10:55:39'),
(164, 1, 47, '2021-06-09', '2020-12-07 10:55:39'),
(165, 2, 48, '2021-05-30', '2020-12-07 10:55:39'),
(166, 1, 48, '2021-04-12', '2020-12-07 10:55:39'),
(167, 2, 48, '2021-03-23', '2020-12-07 10:55:39'),
(168, 2, 48, '2021-04-21', '2020-12-07 10:55:39'),
(169, 2, 48, '2021-04-08', '2020-12-07 10:55:39'),
(170, 1, 49, '2021-06-17', '2020-12-07 10:55:39'),
(171, 1, 49, '2021-04-18', '2020-12-07 10:55:39'),
(172, 2, 49, '2021-03-17', '2020-12-07 10:55:39'),
(173, 1, 49, '2021-05-23', '2020-12-07 10:55:39'),
(174, 1, 49, '2021-05-13', '2020-12-07 10:55:39'),
(175, 2, 50, '2021-04-30', '2020-12-07 10:55:39'),
(176, 2, 50, '2021-06-12', '2020-12-07 10:55:39'),
(177, 2, 51, '2021-05-03', '2020-12-07 10:55:39'),
(178, 2, 51, '2021-04-14', '2020-12-07 10:55:40'),
(179, 2, 51, '2021-05-11', '2020-12-07 10:55:40'),
(180, 2, 51, '2021-05-13', '2020-12-07 10:55:40'),
(181, 2, 51, '2021-04-14', '2020-12-07 10:55:40'),
(182, 1, 52, '2021-04-13', '2020-12-07 10:55:40'),
(183, 1, 52, '2021-06-03', '2020-12-07 10:55:40'),
(184, 1, 53, '2021-06-01', '2020-12-07 10:55:40'),
(185, 2, 54, '2021-05-27', '2020-12-07 10:55:40'),
(186, 1, 54, '2021-05-12', '2020-12-07 10:55:40'),
(187, 2, 54, '2021-05-04', '2020-12-07 10:55:40'),
(188, 1, 54, '2021-04-13', '2020-12-07 10:55:40'),
(189, 1, 55, '2021-06-12', '2020-12-07 10:55:40'),
(190, 1, 56, '2021-05-26', '2020-12-07 10:55:40'),
(191, 1, 56, '2021-06-25', '2020-12-07 10:55:41'),
(192, 1, 56, '2021-05-09', '2020-12-07 10:55:41'),
(193, 1, 56, '2021-03-30', '2020-12-07 10:55:41'),
(194, 1, 56, '2021-04-20', '2020-12-07 10:55:41'),
(195, 1, 56, '2021-06-15', '2020-12-07 10:55:41'),
(196, 1, 57, '2021-04-20', '2020-12-07 10:55:41'),
(197, 1, 57, '2021-03-26', '2020-12-07 10:55:41'),
(198, 2, 57, '2021-06-19', '2020-12-07 10:55:41'),
(199, 2, 58, '2021-05-08', '2020-12-07 10:55:41'),
(200, 1, 59, '2021-04-03', '2020-12-07 10:55:41'),
(201, 1, 59, '2021-05-12', '2020-12-07 10:55:41'),
(202, 1, 60, '2021-05-05', '2020-12-07 10:55:41'),
(203, 2, 60, '2021-03-20', '2020-12-07 10:55:41'),
(204, 1, 60, '2021-06-05', '2020-12-07 10:55:41'),
(205, 2, 60, '2021-04-01', '2020-12-07 10:55:41'),
(206, 2, 60, '2021-06-11', '2020-12-07 10:55:41'),
(207, 1, 61, '2021-05-04', '2020-12-07 10:55:41'),
(208, 2, 61, '2021-05-14', '2020-12-07 10:55:41'),
(209, 1, 61, '2021-04-08', '2020-12-07 10:55:41'),
(210, 1, 61, '2021-04-10', '2020-12-07 10:55:42'),
(211, 1, 61, '2021-06-25', '2020-12-07 10:55:42'),
(212, 2, 62, '2021-04-13', '2020-12-07 10:55:42'),
(213, 2, 62, '2021-04-08', '2020-12-07 10:55:42'),
(214, 2, 62, '2021-06-22', '2020-12-07 10:55:42'),
(215, 2, 62, '2021-06-14', '2020-12-07 10:55:42'),
(216, 1, 63, '2021-05-03', '2020-12-07 10:55:42'),
(217, 1, 64, '2021-04-17', '2020-12-07 10:55:42'),
(218, 2, 65, '2021-06-06', '2020-12-07 10:55:42'),
(219, 1, 65, '2021-06-13', '2020-12-07 10:55:42'),
(220, 2, 65, '2021-05-17', '2020-12-07 10:55:42'),
(221, 1, 66, '2021-04-18', '2020-12-07 10:55:42'),
(222, 1, 66, '2021-04-20', '2020-12-07 10:55:42'),
(223, 2, 66, '2021-04-16', '2020-12-07 10:55:42'),
(224, 2, 66, '2021-06-24', '2020-12-07 10:55:42'),
(225, 1, 66, '2021-04-29', '2020-12-07 10:55:42'),
(226, 1, 66, '2021-03-22', '2020-12-07 10:55:42'),
(227, 2, 67, '2021-04-09', '2020-12-07 10:55:42'),
(228, 2, 67, '2021-05-16', '2020-12-07 10:55:43'),
(229, 1, 67, '2021-05-15', '2020-12-07 10:55:43'),
(230, 1, 68, '2021-04-24', '2020-12-07 10:55:43'),
(231, 1, 68, '2021-06-03', '2020-12-07 10:55:43'),
(232, 1, 68, '2021-03-21', '2020-12-07 10:55:43'),
(233, 1, 68, '2021-03-22', '2020-12-07 10:55:43'),
(234, 1, 69, '2021-06-04', '2020-12-07 10:55:43'),
(235, 1, 69, '2021-05-20', '2020-12-07 10:55:43'),
(236, 2, 69, '2021-05-27', '2020-12-07 10:55:43'),
(237, 1, 69, '2021-03-31', '2020-12-07 10:55:43'),
(238, 2, 70, '2021-05-23', '2020-12-07 10:55:43'),
(239, 1, 70, '2021-04-15', '2020-12-07 10:55:43'),
(240, 1, 70, '2021-03-18', '2020-12-07 10:55:43'),
(241, 2, 70, '2021-05-11', '2020-12-07 10:55:43'),
(242, 2, 71, '2021-03-22', '2020-12-07 10:55:43'),
(243, 1, 71, '2021-06-04', '2020-12-07 10:55:43'),
(244, 2, 72, '2021-05-02', '2020-12-07 10:55:44'),
(245, 2, 72, '2021-04-04', '2020-12-07 10:55:44'),
(246, 1, 73, '2021-05-10', '2020-12-07 10:55:44'),
(247, 2, 73, '2021-05-29', '2020-12-07 10:55:44'),
(248, 2, 73, '2021-04-02', '2020-12-07 10:55:44'),
(249, 1, 73, '2021-04-26', '2020-12-07 10:55:44'),
(250, 2, 74, '2021-04-16', '2020-12-07 10:55:44'),
(251, 1, 74, '2021-04-23', '2020-12-07 10:55:44'),
(252, 1, 74, '2021-06-07', '2020-12-07 10:55:44'),
(253, 1, 75, '2021-06-12', '2020-12-07 10:55:44'),
(254, 2, 75, '2021-06-03', '2020-12-07 10:55:44'),
(255, 1, 75, '2021-04-19', '2020-12-07 10:55:44'),
(256, 2, 75, '2021-04-24', '2020-12-07 10:55:44'),
(257, 1, 75, '2021-04-22', '2020-12-07 10:55:45'),
(258, 2, 76, '2021-05-31', '2020-12-07 10:55:45'),
(259, 1, 76, '2021-03-24', '2020-12-07 10:55:45'),
(260, 2, 77, '2021-04-23', '2020-12-07 10:55:45'),
(261, 2, 77, '2021-04-30', '2020-12-07 10:55:45'),
(262, 2, 77, '2021-04-10', '2020-12-07 10:55:45'),
(263, 2, 77, '2021-04-12', '2020-12-07 10:55:45'),
(264, 1, 78, '2021-05-19', '2020-12-07 10:55:45'),
(265, 1, 78, '2021-06-24', '2020-12-07 10:55:45'),
(266, 2, 78, '2021-04-22', '2020-12-07 10:55:45'),
(267, 2, 78, '2021-05-09', '2020-12-07 10:55:45'),
(268, 1, 79, '2021-03-19', '2020-12-07 10:55:45'),
(269, 1, 79, '2021-06-11', '2020-12-07 10:55:45'),
(270, 1, 79, '2021-04-16', '2020-12-07 10:55:45'),
(271, 1, 79, '2021-06-24', '2020-12-07 10:55:45'),
(272, 2, 79, '2021-03-17', '2020-12-07 10:55:45'),
(273, 1, 80, '2021-04-14', '2020-12-07 10:55:45'),
(274, 2, 80, '2021-05-17', '2020-12-07 10:55:46'),
(275, 1, 80, '2021-04-17', '2020-12-07 10:55:46'),
(276, 2, 80, '2021-06-02', '2020-12-07 10:55:46'),
(277, 2, 80, '2021-06-13', '2020-12-07 10:55:46'),
(278, 1, 81, '2021-05-17', '2020-12-07 10:55:46'),
(279, 2, 81, '2021-04-15', '2020-12-07 10:55:46'),
(280, 2, 81, '2021-05-27', '2020-12-07 10:55:46'),
(281, 2, 81, '2021-06-08', '2020-12-07 10:55:46'),
(282, 2, 82, '2021-06-21', '2020-12-07 10:55:46'),
(283, 2, 82, '2021-05-03', '2020-12-07 10:55:46'),
(284, 2, 82, '2021-04-08', '2020-12-07 10:55:46'),
(285, 1, 83, '2021-03-25', '2020-12-07 10:55:46'),
(286, 2, 83, '2021-06-13', '2020-12-07 10:55:46'),
(287, 2, 83, '2021-05-03', '2020-12-07 10:55:46'),
(288, 1, 84, '2021-03-21', '2020-12-07 10:55:46'),
(289, 2, 84, '2021-04-07', '2020-12-07 10:55:46'),
(290, 2, 84, '2021-04-04', '2020-12-07 10:55:46'),
(291, 1, 84, '2021-06-20', '2020-12-07 10:55:46'),
(292, 1, 84, '2021-05-20', '2020-12-07 10:55:46'),
(293, 1, 85, '2021-03-23', '2020-12-07 10:55:47'),
(294, 2, 86, '2021-05-10', '2020-12-07 10:55:47'),
(295, 1, 86, '2021-03-24', '2020-12-07 10:55:47'),
(296, 2, 86, '2021-06-22', '2020-12-07 10:55:47'),
(297, 2, 86, '2021-04-20', '2020-12-07 10:55:47'),
(298, 1, 86, '2021-03-26', '2020-12-07 10:55:47'),
(299, 2, 86, '2021-03-29', '2020-12-07 10:55:47'),
(300, 1, 87, '2021-06-18', '2020-12-07 10:55:47'),
(301, 1, 87, '2021-06-03', '2020-12-07 10:55:47'),
(302, 1, 88, '2021-06-19', '2020-12-07 10:55:47'),
(303, 2, 88, '2021-05-15', '2020-12-07 10:55:47'),
(304, 2, 88, '2021-05-03', '2020-12-07 10:55:47'),
(305, 1, 89, '2021-05-06', '2020-12-07 10:55:47'),
(306, 2, 90, '2021-05-14', '2020-12-07 10:55:47'),
(307, 2, 90, '2021-06-01', '2020-12-07 10:55:47'),
(308, 1, 90, '2021-03-29', '2020-12-07 10:55:47'),
(309, 2, 90, '2021-05-09', '2020-12-07 10:55:47'),
(310, 2, 90, '2021-04-01', '2020-12-07 10:55:47'),
(311, 2, 90, '2021-06-25', '2020-12-07 10:55:47'),
(312, 2, 91, '2021-06-11', '2020-12-07 10:55:47'),
(313, 1, 91, '2021-03-18', '2020-12-07 10:55:48'),
(314, 1, 91, '2021-03-24', '2020-12-07 10:55:48'),
(315, 2, 91, '2021-05-31', '2020-12-07 10:55:48'),
(316, 1, 92, '2021-05-29', '2020-12-07 10:55:48'),
(317, 1, 92, '2021-05-26', '2020-12-07 10:55:48'),
(318, 1, 92, '2021-05-13', '2020-12-07 10:55:48'),
(319, 1, 92, '2021-06-15', '2020-12-07 10:55:48'),
(320, 2, 93, '2021-06-06', '2020-12-07 10:55:48'),
(321, 2, 93, '2021-06-17', '2020-12-07 10:55:48'),
(322, 1, 93, '2021-05-01', '2020-12-07 10:55:48'),
(323, 1, 93, '2021-06-08', '2020-12-07 10:55:48'),
(324, 2, 93, '2021-05-05', '2020-12-07 10:55:48'),
(325, 1, 94, '2021-04-17', '2020-12-07 10:55:48'),
(326, 1, 94, '2021-05-11', '2020-12-07 10:55:48'),
(327, 2, 95, '2021-03-17', '2020-12-07 10:55:48'),
(328, 1, 95, '2021-05-03', '2020-12-07 10:55:48'),
(329, 2, 95, '2021-05-12', '2020-12-07 10:55:48'),
(330, 1, 95, '2021-06-05', '2020-12-07 10:55:48'),
(331, 1, 95, '2021-03-21', '2020-12-07 10:55:48'),
(332, 1, 96, '2021-06-11', '2020-12-07 10:55:49'),
(333, 1, 96, '2021-04-08', '2020-12-07 10:55:49'),
(334, 2, 97, '2021-03-26', '2020-12-07 10:55:49'),
(335, 2, 97, '2021-04-03', '2020-12-07 10:55:49'),
(336, 2, 97, '2021-04-05', '2020-12-07 10:55:49'),
(337, 1, 98, '2021-05-27', '2020-12-07 10:55:49'),
(338, 1, 98, '2021-06-22', '2020-12-07 10:55:49'),
(339, 1, 98, '2021-05-24', '2020-12-07 10:55:49'),
(340, 2, 99, '2021-06-20', '2020-12-07 10:55:49'),
(341, 2, 99, '2021-06-01', '2020-12-07 10:55:49'),
(342, 1, 99, '2021-04-01', '2020-12-07 10:55:49'),
(343, 2, 100, '2021-06-10', '2020-12-07 10:55:49'),
(344, 2, 100, '2021-06-08', '2020-12-07 10:55:49'),
(345, 1, 100, '2021-04-10', '2020-12-07 10:55:49'),
(346, 1, 100, '2021-04-23', '2020-12-07 10:55:49'),
(347, 2, 100, '2021-05-04', '2020-12-07 10:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Loan_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Inventory_Id` int(11) NOT NULL,
  `Date_Loan` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Return` datetime DEFAULT NULL,
  `Date_Due` datetime DEFAULT NULL,
  `PenaltyFee` decimal(16,3) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - For Approval\r\n1 - For Claiming\r\n2 - On Hand\r\n3 - Returned',
  `X_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`Loan_Id`, `User_Id`, `Inventory_Id`, `Date_Loan`, `Date_Return`, `Date_Due`, `PenaltyFee`, `Status`, `X_DateCreated`) VALUES
(1, 1, 3, '2020-12-10 09:30:50', NULL, '2020-12-11 09:30:50', '0.000', 0, '2020-12-10 09:30:50'),
(5, 1, 3, '2020-12-10 09:36:31', '2020-12-11 00:00:00', '2020-12-11 09:36:31', '0.000', 3, '2020-12-10 09:36:31'),
(13, 2, 5, '2020-06-12 09:34:00', NULL, '2020-06-13 09:34:00', '0.000', 3, '2020-12-12 09:34:00'),
(15, 2, 37, '2020-12-12 11:58:31', NULL, '2020-12-13 11:58:31', '0.000', 0, '2020-12-12 11:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `savesearch`
--

CREATE TABLE `savesearch` (
  `SaveSearch_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Book_Id` int(11) NOT NULL,
  `X_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savesearch`
--

INSERT INTO `savesearch` (`SaveSearch_Id`, `User_Id`, `Book_Id`, `X_DateCreated`) VALUES
(1, 2, 2, '2020-12-08 09:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `LoanPeriod` int(11) NOT NULL DEFAULT 24 COMMENT 'in hours',
  `Penalty` decimal(16,2) NOT NULL DEFAULT 0.00,
  `Overdue` int(11) NOT NULL DEFAULT 0 COMMENT 'Hours before penalty applies'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_Id`, `Name`, `LoanPeriod`, `Penalty`, `Overdue`) VALUES
(1, 'Subject 1', 24, '10.00', 1),
(2, 'Subject 2', 24, '20.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `IDNumber` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `SuffixName` varchar(50) NOT NULL,
  `HomeAddress` varchar(200) NOT NULL,
  `ContactNumber` varchar(100) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `CardExpiration` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - Active\r\n1 - Inactive',
  `UserType` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0 - Admin\r\n1 - Employee\r\n2 - Student',
  `X_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `IDNumber`, `Password`, `FirstName`, `MiddleName`, `LastName`, `SuffixName`, `HomeAddress`, `ContactNumber`, `EmailAddress`, `CardExpiration`, `Status`, `UserType`, `X_DateCreated`) VALUES
(1, '2012200457', '$2y$10$pOiHvSyKWt/.rtl3LK9GC.h7Xtwj9EImAKA8m6eqdq6OoBFSAlRT.', 'Jumarie', 'Gabot', 'Mocon', '', 'Homes Address, Homes Address, Homes Address, Homes Address, Homes Address, Homes Address, Homes Address, Homes Address, Homes Address, Homes Address, Homes Address, ', '09265701014', 'j_mocon@yahoo.com', '0000-00-00', 0, 2, '2020-10-29 09:34:08'),
(2, 'username', '$2y$10$h883m5yTLeyypZ27GFNbSunvPz6I3dtsprKPg9.g84VKw5Lvxf1RO', 'admindd', 'm.', 'lastname', 'suffixname', 'homeadd', '0172031623', 'agsegnw@yahoo.com', '0000-00-00', 0, 0, '2020-10-23 07:14:13'),
(23, '123456789', '$2y$10$EZXKHvD7uem34BAuluZZG.fpOa72h04DeJ9u8/RvdcLRwrF1z.5Ky', 'FN', 'MN', 'LN', 'SN', 'Home address of this person', '0912623341', 'email@emailme.com', '2020-11-11', 0, 1, '2020-11-09 23:05:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_Id`),
  ADD KEY `Subject_Id` (`Subject_Id`);
ALTER TABLE `book` ADD FULLTEXT KEY `Search` (`Keyword`);
ALTER TABLE `book` ADD FULLTEXT KEY `Search_Code` (`Code`);
ALTER TABLE `book` ADD FULLTEXT KEY `Search_Title` (`Title`);
ALTER TABLE `book` ADD FULLTEXT KEY `Search_Author` (`Author`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_Id`);

--
-- Indexes for table `ejournal`
--
ALTER TABLE `ejournal`
  ADD PRIMARY KEY (`EJournal_Id`);
ALTER TABLE `ejournal` ADD FULLTEXT KEY `Search_Journal` (`Name`,`Link`,`Description`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inventory_Id`),
  ADD KEY `Branch_Id` (`Branch_Id`),
  ADD KEY `Book_Id` (`Book_Id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`Loan_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Inventory_Id` (`Inventory_Id`);

--
-- Indexes for table `savesearch`
--
ALTER TABLE `savesearch`
  ADD PRIMARY KEY (`SaveSearch_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `Book_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Branch_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ejournal`
--
ALTER TABLE `ejournal`
  MODIFY `EJournal_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventory_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `Loan_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `savesearch`
--
ALTER TABLE `savesearch`
  MODIFY `SaveSearch_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`Subject_Id`) REFERENCES `subject` (`Subject_Id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Branch_Id`) REFERENCES `branch` (`Branch_Id`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`Book_Id`) REFERENCES `book` (`Book_Id`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`Inventory_Id`) REFERENCES `inventory` (`Inventory_Id`);

--
-- Constraints for table `savesearch`
--
ALTER TABLE `savesearch`
  ADD CONSTRAINT `savesearch_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
