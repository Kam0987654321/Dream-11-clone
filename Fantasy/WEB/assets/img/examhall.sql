-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 06:22 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examhall`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_master`
--

CREATE TABLE `activity_log_master` (
  `iActivityLogId` int(11) UNSIGNED NOT NULL,
  `dActivityDateTime` datetime NOT NULL,
  `cIPAddress` varchar(50) NOT NULL,
  `cActivityDesc` text NOT NULL,
  `iUserId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log_master`
--

INSERT INTO `activity_log_master` (`iActivityLogId`, `dActivityDateTime`, `cIPAddress`, `cActivityDesc`, `iUserId`) VALUES
(1, '2018-01-12 11:46:02', '::1', 'ADMIN LOGIN', 1),
(2, '2018-01-12 12:07:51', '::1', 'ADMIN LOGIN', 1),
(3, '2018-01-16 11:02:05', '::1', 'ADMIN LOGIN', 1),
(4, '2018-01-16 14:01:03', '::1', 'ADMIN LOGIN', 1),
(5, '2018-01-16 14:10:07', '::1', 'ADMIN LOGIN', 1),
(6, '2018-01-16 12:29:04', '::1', 'Add institute id = 3', 1),
(7, '2018-01-16 17:00:10', '::1', 'ADMIN LOGIN', 1),
(8, '2018-01-17 10:38:46', '::1', 'ADMIN LOGIN', 1),
(9, '2018-01-17 06:57:33', '::1', 'Add institute id = 4', 1),
(10, '2018-01-17 06:59:44', '::1', 'Add institute id = 5', 1),
(11, '2018-01-17 08:31:13', '::1', 'Add institute id = 1', 1),
(12, '2018-01-17 08:43:40', '::1', 'Add institute id = 2', 1),
(13, '2018-01-20 10:30:00', '::1', 'ADMIN LOGIN', 1),
(14, '2018-01-20 08:29:19', '::1', 'Add question id = 1', 1),
(15, '2018-01-20 08:38:23', '::1', 'Add question id = 2', 1),
(16, '2018-01-20 09:37:34', '::1', 'Add question id = 3', 1),
(17, '2018-01-20 15:12:49', '::1', 'ADMIN LOGIN', 1),
(18, '2018-01-20 17:59:05', '::1', 'ADMIN LOGIN', 1),
(19, '2018-01-22 10:36:40', '::1', 'ADMIN LOGIN', 1),
(20, '2018-01-22 06:52:35', '::1', 'Add institute id = 1', 1),
(21, '2018-01-22 07:21:59', '::1', 'Add institute id = 2', 1),
(22, '2018-01-22 07:27:18', '::1', 'Add institute id = 3', 1),
(23, '2018-01-22 07:31:13', '::1', 'Add institute id = 4', 1),
(24, '2018-01-22 07:31:57', '::1', 'Add institute id = 5', 1),
(25, '2018-01-22 07:32:36', '::1', 'Add institute id = 6', 1),
(26, '2018-01-22 07:37:56', '::1', 'Add institute id = 1', 1),
(27, '2018-01-22 12:40:40', '::1', 'ADMIN LOGIN', 1),
(28, '2018-01-22 08:14:04', '::1', 'Add institute id = 1', 1),
(29, '2018-01-22 08:14:46', '::1', 'Add institute id = 2', 1),
(30, '2018-01-22 08:16:11', '::1', 'Add institute id = 3', 1),
(31, '2018-01-22 08:17:22', '::1', 'Add institute id = 4', 1),
(32, '2018-01-22 13:47:30', '::1', 'Add Student id = 2', 0),
(33, '2018-01-22 13:49:55', '::1', 'Add Student id = 3', 0),
(34, '2018-01-24 11:21:05', '::1', 'ADMIN LOGIN', 1),
(35, '2018-01-24 07:48:59', '::1', 'Add exam master id = 15', 1),
(36, '2018-01-24 09:50:10', '::1', 'Add exam master id = 11', 1),
(37, '2018-01-24 12:06:30', '::1', 'Add exam master id = 2', 1),
(38, '2018-01-24 12:06:32', '::1', 'Add exam master id = 3', 1),
(39, '2018-01-24 12:06:39', '::1', 'Add exam master id = 4', 1),
(40, '2018-01-24 12:07:59', '::1', 'Add exam master id = 5', 1),
(41, '2018-01-24 12:08:00', '::1', 'Add exam master id = 6', 1),
(42, '2018-01-24 12:09:13', '::1', 'Add exam master id = 7', 1),
(43, '2018-01-24 12:10:27', '::1', 'Add exam master id = 8', 1),
(44, '2018-01-24 12:11:36', '::1', 'Add exam master id = 9', 1),
(45, '2018-01-24 12:22:52', '::1', 'Add exam master id = 10', 1),
(46, '2018-01-24 12:23:18', '::1', 'Add exam master id = 11', 1),
(47, '2018-01-24 13:00:13', '::1', 'Add exam instructions id = 2', 1),
(48, '2018-01-25 11:26:43', '::1', 'ADMIN LOGIN', 1),
(49, '2018-01-25 16:01:28', '::1', 'ADMIN LOGIN', 1),
(50, '2018-01-25 11:33:19', '::1', 'Add institute id = 5', 1),
(51, '2018-01-29 16:07:21', '::1', 'ADMIN LOGIN', 1),
(52, '2018-01-30 10:48:27', '::1', 'ADMIN LOGIN', 1),
(53, '2018-01-30 06:44:03', '::1', 'Add exam category id = 15', 1),
(54, '2018-01-30 07:15:35', '::1', 'Add Category id = 1', 1),
(55, '2018-01-30 15:09:00', '::1', 'ADMIN LOGIN', 1),
(56, '2018-01-30 11:51:34', '::1', 'Add SubCategory id = 0', 1),
(57, '2018-01-30 11:54:13', '::1', 'Add SubCategory id = 1', 1),
(58, '2018-01-30 11:54:42', '::1', 'Add SubCategory id = 2', 1),
(59, '2018-01-31 11:18:38', '::1', 'ADMIN LOGIN', 1),
(60, '2018-01-31 09:56:27', '::1', 'Add question id = 1', 1),
(61, '2018-01-31 10:20:20', '::1', 'Add question id = 2', 1),
(62, '2018-02-01 09:52:50', '::1', 'ADMIN LOGIN', 1),
(63, '2018-02-01 07:10:09', '::1', 'Add institute id = 1', 1),
(64, '2018-02-01 11:45:22', '::1', 'ADMIN LOGIN', 1),
(65, '2018-02-01 13:59:42', '::1', 'ADMIN LOGIN', 1),
(66, '2018-02-01 11:10:45', '::1', 'Add Category id = 2', 1),
(67, '2018-02-01 11:22:25', '::1', 'Add SubCategory id = 3', 1),
(68, '2018-02-02 10:54:13', '::1', 'ADMIN LOGIN', 1),
(69, '2018-02-03 16:03:31', '::1', 'ADMIN LOGIN', 1),
(70, '2018-02-03 11:53:58', '::1', 'Add exam master id = 2', 1),
(71, '2018-02-03 11:56:27', '::1', 'Add exam master id = 3', 1),
(72, '2018-02-03 12:05:00', '::1', 'Add exam master id = 4', 1),
(73, '2018-02-03 18:09:57', '::1', 'Add exam master id = 5', 1),
(74, '2018-02-05 10:10:08', '::1', 'ADMIN LOGIN', 1),
(75, '2018-02-05 13:11:17', '::1', 'Add exam master id = 1', 1),
(76, '2018-02-05 14:01:32', '::1', 'Add exam master id = 3', 1),
(77, '2018-02-05 14:01:42', '::1', 'Add exam master id = 4', 1),
(78, '2018-02-05 14:03:13', '::1', 'Add exam master id = 5', 1),
(79, '2018-02-05 14:03:26', '::1', 'Add exam master id = 6', 1),
(80, '2018-02-05 14:04:18', '::1', 'Add exam master id = 7', 1),
(81, '2018-02-05 14:05:28', '::1', 'Add exam master id = 8', 1),
(82, '2018-02-05 14:07:09', '::1', 'Add exam master id = 9', 1),
(83, '2018-02-05 14:08:10', '::1', 'Add exam master id = 10', 1),
(84, '2018-02-05 14:09:56', '::1', 'Add exam master id = 11', 1),
(85, '2018-02-05 14:11:19', '::1', 'Add exam master id = 12', 1),
(86, '2018-02-05 14:11:20', '::1', 'Add exam master id = 13', 1),
(87, '2018-02-05 14:11:21', '::1', 'Add exam master id = 14', 1),
(88, '2018-02-05 14:11:21', '::1', 'Add exam master id = 15', 1),
(89, '2018-02-05 14:11:21', '::1', 'Add exam master id = 16', 1),
(90, '2018-02-05 14:11:21', '::1', 'Add exam master id = 17', 1),
(91, '2018-02-05 14:13:43', '::1', 'Add exam master id = 18', 1),
(92, '2018-02-05 14:14:29', '::1', 'Add exam master id = 19', 1),
(93, '2018-02-05 14:15:24', '::1', 'Add exam master id = 20', 1),
(94, '2018-02-05 14:15:27', '::1', 'Add exam master id = 21', 1),
(95, '2018-02-05 14:15:27', '::1', 'Add exam master id = 22', 1),
(96, '2018-02-05 14:15:27', '::1', 'Add exam master id = 23', 1),
(97, '2018-02-05 14:17:06', '::1', 'Add exam master id = 24', 1),
(98, '2018-02-05 14:17:13', '::1', 'Add exam master id = 25', 1),
(99, '2018-02-05 14:19:11', '::1', 'Add exam master id = 26', 1),
(100, '2018-02-05 15:29:58', '::1', 'Add exam master id = 6', 1),
(101, '2018-02-05 18:07:11', '::1', 'Add exam master id = 7', 1),
(102, '2018-02-05 18:24:37', '::1', 'Add exam master id = 1', 1),
(103, '2018-02-06 09:58:20', '::1', 'ADMIN LOGIN', 1),
(104, '2018-02-06 09:59:38', '::1', 'Add exam master id = 2', 1),
(105, '2018-02-06 10:25:09', '::1', 'Add exam master id = 3', 1),
(106, '2018-02-06 14:04:48', '::1', 'ADMIN LOGIN', 1),
(107, '2018-02-06 14:16:45', '127.0.0.1', 'ADMIN LOGIN', 1),
(108, '2018-02-06 15:44:32', '127.0.0.1', 'Add exam master id = 27', 1),
(109, '2018-02-06 15:50:21', '::1', 'Add exam master id = 28', 1),
(110, '2018-02-06 17:38:37', '::1', 'Add exam master id = 1', 1),
(111, '2018-02-06 17:42:34', '::1', 'Add exam master id = 31', 1),
(112, '2018-02-06 17:50:00', '::1', 'Add exam master id = 32', 1),
(113, '2018-02-06 17:56:07', '::1', 'Add exam master id = 33', 1),
(114, '2018-02-06 17:57:28', '::1', 'Add exam master id = 34', 1),
(115, '2018-02-06 17:58:33', '::1', 'Add exam master id = 2', 1),
(116, '2018-02-06 17:59:02', '::1', 'Add exam master id = 3', 1),
(117, '2018-02-06 18:03:14', '::1', 'Add exam master id = 4', 1),
(118, '2018-02-06 18:04:53', '::1', 'Add exam master id = 5', 1),
(119, '2018-02-06 18:05:36', '::1', 'Add exam master id = 6', 1),
(120, '2018-02-06 18:09:06', '::1', 'Add exam master id = 7', 1),
(121, '2018-02-06 18:11:14', '::1', 'Add exam master id = 8', 1),
(122, '2018-02-07 09:50:34', '::1', 'ADMIN LOGIN', 1),
(123, '2018-02-07 11:02:37', '::1', 'Add exam master id = 35', 1),
(124, '2018-02-07 11:09:34', '::1', 'Add exam master id = 4', 1),
(125, '2018-02-07 11:10:17', '::1', 'Add exam master id = 5', 1),
(126, '2018-02-07 11:21:23', '::1', 'Add exam master id = 36', 1),
(127, '2018-02-07 11:22:50', '::1', 'Add exam master id = 37', 1),
(128, '2018-02-07 11:23:59', '::1', 'Add exam master id = 38', 1),
(129, '2018-02-07 11:26:28', '::1', 'Add exam master id = 39', 1),
(130, '2018-02-07 11:27:58', '::1', 'Add exam master id = 40', 1),
(131, '2018-02-07 11:35:28', '::1', 'Add exam master id = 41', 1),
(132, '2018-02-07 11:37:04', '::1', 'Add exam master id = 42', 1),
(133, '2018-02-07 11:39:04', '::1', 'Add exam master id = 43', 1),
(134, '2018-02-07 11:46:21', '::1', 'Add exam master id = 6', 1),
(135, '2018-02-07 11:47:10', '::1', 'Add exam master id = 7', 1),
(136, '2018-02-07 11:49:29', '::1', 'Add exam master id = 8', 1),
(137, '2018-02-07 11:50:47', '::1', 'Add exam master id = 9', 1),
(138, '2018-02-07 11:51:27', '::1', 'Add exam master id = 10', 1),
(139, '2018-02-07 11:53:54', '::1', 'Add exam master id = 44', 1),
(140, '2018-02-07 12:03:29', '::1', 'Add exam master id = 12', 1),
(141, '2018-02-07 12:04:13', '::1', 'Add exam master id = 13', 1),
(142, '2018-02-07 12:04:34', '::1', 'Add exam master id = 14', 1),
(143, '2018-02-07 12:05:27', '::1', 'Add exam master id = 15', 1),
(144, '2018-02-07 12:06:27', '::1', 'Add exam master id = 16', 1),
(145, '2018-02-07 12:07:06', '::1', 'Add exam master id = 17', 1),
(146, '2018-02-07 12:08:33', '::1', 'Add exam master id = 11', 1),
(147, '2018-02-07 12:09:06', '::1', 'Add exam master id = 12', 1),
(148, '2018-02-07 12:09:56', '::1', 'Add Category id = 3', 1),
(149, '2018-02-07 12:10:37', '::1', 'Add SubCategory id = 4', 1),
(150, '2018-02-07 12:11:03', '::1', 'Add SubCategory id = 5', 1),
(151, '2018-02-07 12:11:50', '::1', 'Add Category id = 4', 1),
(152, '2018-02-07 12:12:19', '::1', 'Add Category id = 5', 1),
(153, '2018-02-07 12:12:42', '::1', 'Add SubCategory id = 6', 1),
(154, '2018-02-07 12:17:03', '::1', 'Add exam master id = 45', 1),
(155, '2018-02-07 12:18:26', '::1', 'Add exam master id = 46', 1),
(156, '2018-02-07 12:20:39', '::1', 'Add exam master id = 47', 1),
(157, '2018-02-07 15:00:59', '::1', 'Add question id = 8', 1),
(158, '2018-02-07 15:03:10', '::1', 'Add question id = 9', 1),
(159, '2018-02-07 15:08:00', '::1', 'Add question id = 10', 1),
(160, '2018-02-07 15:11:15', '::1', 'Add question id = 11', 1),
(161, '2018-02-07 15:12:17', '::1', 'Add question id = 12', 1),
(162, '2018-02-07 15:13:09', '::1', 'Add question id = 13', 1),
(163, '2018-02-07 15:15:28', '::1', 'Add question id = 14', 1),
(164, '2018-02-07 15:16:02', '::1', 'Add question id = 15', 1),
(165, '2018-02-07 15:16:38', '::1', 'Add question id = 16', 1),
(166, '2018-02-07 15:17:29', '::1', 'Add question id = 17', 1),
(167, '2018-02-07 15:18:11', '::1', 'Add question id = 18', 1),
(168, '2018-02-07 15:26:21', '::1', 'Add exam master id = 48', 1),
(169, '2018-02-07 15:27:28', '::1', 'Add exam master id = 49', 1),
(170, '2018-02-07 15:29:04', '::1', 'Add exam master id = 50', 1),
(171, '2018-02-07 15:31:40', '::1', 'Add exam master id = 51', 1),
(172, '2018-02-07 15:34:21', '::1', 'Add exam master id = 52', 1),
(173, '2018-02-07 15:35:43', '::1', 'Add exam master id = 53', 1),
(174, '2018-02-07 15:36:51', '::1', 'Add question id = 19', 1),
(175, '2018-02-07 15:41:54', '127.0.0.1', 'ADMIN LOGIN', 1),
(176, '2018-02-07 16:18:51', '::1', 'Add exam master id = 54', 1),
(177, '2018-02-07 16:18:58', '::1', 'Add exam master id = 55', 1),
(178, '2018-02-07 16:19:00', '::1', 'Add exam master id = 56', 1),
(179, '2018-02-07 16:19:05', '::1', 'Add exam master id = 57', 1),
(180, '2018-02-07 16:19:52', '::1', 'Add exam master id = 58', 1),
(181, '2018-02-07 16:21:37', '::1', 'Add exam master id = 59', 1),
(182, '2018-02-07 16:31:42', '127.0.0.1', 'Add exam master id = 60', 1),
(183, '2018-02-07 17:33:50', '::1', 'Add question id = 20', 1),
(184, '2018-02-07 17:59:33', '::1', 'Add question id = 21', 1),
(185, '2018-02-07 17:59:35', '::1', 'Add question id = 22', 1),
(186, '2018-02-07 17:59:47', '::1', 'Add question id = 23', 1),
(187, '2018-02-07 18:15:57', '::1', 'Add question id = 24', 1),
(188, '2018-02-08 10:08:31', '::1', 'ADMIN LOGIN', 1),
(189, '2018-02-08 10:09:16', '::1', 'Add question id = 25', 1),
(190, '2018-02-08 10:22:15', '::1', 'Add question id = 26', 1),
(191, '2018-02-08 18:11:12', '::1', 'Add question id = 27', 1),
(192, '2018-02-09 10:04:58', '::1', 'ADMIN LOGIN', 1),
(193, '2018-02-09 10:25:50', '::1', 'ADMIN LOGIN', 1),
(194, '2018-02-09 14:57:57', '::1', 'ADMIN LOGIN', 1),
(195, '2018-02-09 14:59:23', '::1', 'Add institute id = 2', 1),
(196, '2018-02-10 10:51:49', '::1', 'Add Student id = 4', 0),
(197, '2018-02-10 10:55:42', '::1', 'Add Student id = 5', 0),
(198, '2018-02-10 10:55:52', '::1', 'Add Student id = 6', 0),
(199, '2018-02-10 10:56:25', '::1', 'Add Student id = 7', 0),
(200, '2018-02-10 10:57:10', '::1', 'Add Student id = 8', 0),
(201, '2018-02-10 10:59:25', '::1', 'Add Student id = 9', 0),
(202, '2018-02-10 10:59:29', '::1', 'Add Student id = 10', 0),
(203, '2018-02-10 10:59:36', '::1', 'Add Student id = 11', 0),
(204, '2018-02-10 11:01:40', '::1', 'Add Student id = 12', 0),
(205, '2018-02-10 11:28:23', '::1', 'ADMIN LOGIN', 1),
(206, '2018-02-10 14:46:57', '::1', 'ADMIN LOGIN', 1),
(207, '2018-02-10 15:10:25', '::1', 'ADMIN LOGIN', 1),
(208, '2018-02-12 10:31:58', '::1', 'ADMIN LOGIN', 1),
(209, '2018-02-12 06:56:51', '::1', 'Add Test Series id = 1', 1),
(210, '2018-02-12 09:48:04', '::1', 'Add Test Series id = 2', 1),
(211, '2018-02-12 10:27:42', '::1', 'Add Test Series id = 3', 1),
(212, '2018-02-12 15:07:19', '::1', 'ADMIN LOGIN', 1),
(213, '2018-02-12 10:38:24', '::1', 'Add Test Series id = 4', 1),
(214, '2018-02-13 10:11:52', '::1', 'Add Student id = 88', 0),
(215, '2018-02-13 10:14:51', '::1', 'Add Student id = 92', 0),
(216, '2018-02-13 15:10:00', '::1', 'ADMIN LOGIN', 1),
(217, '2018-02-13 15:13:18', '::1', 'Add exam category id = 16', 0),
(218, '2018-02-13 15:14:02', '::1', 'Add exam master id = 11', 0),
(219, '2018-02-13 15:15:38', '::1', 'Add exam master id = 18', 0),
(220, '2018-02-13 15:24:18', '::1', 'Add question id = 28', 0),
(221, '2018-02-13 15:25:06', '::1', 'Add question id = 29', 0),
(222, '2018-02-13 16:01:24', '::1', 'ADMIN LOGIN', 1),
(223, '2018-02-13 16:01:38', '::1', 'Add institute id = 7', 1),
(224, '2018-02-13 16:02:48', '::1', 'Add institute id = 2', 1),
(225, '2018-02-13 16:03:59', '::1', 'Add institute id = 3', 1),
(226, '2018-02-13 16:56:58', '::1', 'Add exam category id = 17', 0),
(227, '2018-02-13 16:57:24', '::1', 'Add exam master id = 12', 0),
(228, '2018-02-13 16:58:06', '::1', 'Add exam master id = 19', 0),
(229, '2018-02-13 16:58:51', '::1', 'Add question id = 30', 0),
(230, '2018-02-13 17:07:02', '::1', 'Add Student id = 143', 0),
(231, '2018-02-14 10:36:39', '::1', 'Add exam master id = 20', 0),
(232, '2018-02-14 11:44:25', '::1', 'Add exam master id = 21', 0),
(233, '2018-02-14 11:54:13', '::1', 'Add Test Series id = 5', 0),
(234, '2018-02-14 13:01:33', '::1', 'Add exam category id = 18', 0),
(235, '2018-02-14 17:56:32', '::1', 'Add Student id = 144', 0),
(236, '2018-02-15 11:50:58', '::1', 'ADMIN LOGIN', 1),
(237, '2018-02-15 11:51:54', '::1', 'Add institute id = 4', 1),
(238, '2018-02-16 10:37:12', '::1', 'ADMIN LOGIN', 1),
(239, '2018-02-16 06:46:51', '::1', 'Add Student id = 145', 0),
(240, '2018-02-16 12:05:00', '::1', 'ADMIN LOGIN', 1),
(241, '2018-02-16 07:59:56', '::1', 'Add institute id = 5', 1),
(242, '2018-02-16 09:37:22', '::1', 'update institute id = 5', 0),
(243, '2018-02-16 09:37:41', '::1', 'update institute id = 5', 0),
(244, '2018-02-16 16:21:07', '::1', 'ADMIN LOGIN', 1),
(245, '2018-02-20 08:11:43', '::1', 'Add Test allotment id = ', 0),
(246, '2018-02-20 08:12:19', '::1', 'Add Test allotment id = 4', 0),
(247, '2018-02-20 08:13:25', '::1', 'Add Test allotment id = 5', 0),
(248, '2018-02-20 08:16:06', '::1', 'Add Test allotment id = 6', 0),
(249, '2018-02-20 08:22:13', '::1', 'Add Test allotment id = 7', 0),
(250, '2018-02-20 08:24:12', '::1', 'Add Test allotment id = 8', 0),
(251, '2018-02-20 08:25:12', '::1', 'Add Test allotment id = 9', 0),
(252, '2018-02-20 08:33:02', '::1', 'Add Test allotment id = 10', 0),
(253, '2018-02-20 08:33:07', '::1', 'Add Test allotment id = 11', 0),
(254, '2018-02-20 08:33:39', '::1', 'Add Test allotment id = 12', 0),
(255, '2018-02-20 08:34:49', '::1', 'Add Test allotment id = 13', 0),
(256, '2018-02-20 08:36:14', '::1', 'Add Test allotment id = 14', 0),
(257, '2018-02-20 08:38:40', '::1', 'Add Test allotment id = 15', 0),
(258, '2018-02-20 09:22:25', '::1', 'Add Test allotment id = 16', 0),
(259, '2018-02-21 12:30:18', '::1', 'Add Student Testseries = ', 0),
(260, '2018-02-21 12:30:19', '::1', 'Add Student Testseries = ', 0),
(261, '2018-02-21 12:31:25', '::1', 'Add Student Testseries = ', 0),
(262, '2018-02-21 12:35:20', '::1', 'Add Student Testseries = ', 0),
(263, '2018-02-21 12:36:01', '::1', 'Add Student Testseries = 5', 0),
(264, '2018-02-21 12:36:39', '::1', 'Add Student Testseries = 6', 0),
(265, '2018-02-21 12:37:13', '::1', 'Add Student Testseries = 7', 0),
(266, '2018-02-21 12:39:04', '::1', 'Add Student Testseries = 8', 0),
(267, '2018-02-21 14:05:05', '::1', 'Add Student Testseries = 9', 0),
(268, '2018-02-21 14:05:18', '::1', 'Add Student Testseries = 10', 0),
(269, '2018-02-21 14:06:12', '::1', 'Add Student Testseries = 11', 0),
(270, '2018-02-21 14:15:36', '::1', 'Add Student Testseries = 12', 0),
(271, '2018-02-21 14:57:48', '::1', 'Add Student Testseries = 17', 0),
(272, '2018-02-21 10:49:42', '::1', 'update institute id = 1', 0),
(273, '2018-02-21 10:59:04', '::1', 'update institute id = 1', 0),
(274, '2018-02-21 15:43:27', '::1', 'ADMIN LOGIN', 1),
(275, '2018-02-21 11:15:33', '::1', 'Add institute id = 8', 1),
(276, '2018-02-21 11:17:25', '::1', 'Add institute id = 9', 1),
(277, '2018-02-21 11:19:09', '::1', 'Add institute id = 10', 1),
(278, '2018-02-21 11:26:06', '::1', 'Add institute id = 11', 1),
(279, '2018-02-21 11:26:27', '::1', 'Add institute id = 12', 1),
(280, '2018-02-21 11:27:19', '::1', 'Add institute id = 13', 1),
(281, '2018-02-21 11:28:35', '::1', 'Add institute id = 14', 1),
(282, '2018-02-21 11:31:45', '::1', 'Add institute id = 15', 1),
(283, '2018-02-21 11:31:51', '::1', 'Add institute id = 16', 1),
(284, '2018-02-21 11:58:39', '::1', 'Add institute id = 17', 1),
(285, '2018-02-21 12:03:08', '::1', 'Add institute id = 18', 1),
(286, '2018-02-21 12:33:05', '::1', 'Add exam instructions id = 2', 1),
(287, '2018-02-21 12:33:08', '::1', 'Add exam instructions id = 3', 1),
(288, '2018-02-21 12:50:18', '::1', 'Add Category id = 6', 1),
(289, '2018-02-22 10:08:39', '::1', 'ADMIN LOGIN', 1),
(290, '2018-02-22 05:53:24', '::1', 'Add exam instructions id = 4', 0),
(291, '2018-02-22 05:58:16', '::1', 'Add exam category id = 19', 0),
(292, '2018-02-22 05:58:48', '::1', 'Add exam master id = 13', 0),
(293, '2018-02-22 05:59:35', '::1', 'Add exam master id = 22', 0),
(294, '2018-02-22 06:02:45', '::1', 'Add question id = 31', 0),
(295, '2018-02-22 06:11:00', '::1', 'Add Test Series id = 6', 0),
(296, '2018-02-22 06:15:39', '::1', 'Add Test Series id = 7', 0),
(297, '2018-02-22 06:18:46', '::1', 'Add Test Series id = 8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `iUserId` int(11) UNSIGNED NOT NULL,
  `cFullName` varchar(200) NOT NULL,
  `cAddress` text NOT NULL,
  `iMobileNo` bigint(20) UNSIGNED NOT NULL,
  `cEmailAddress` varchar(100) NOT NULL,
  `cUserProfilePicName` varchar(200) DEFAULT NULL,
  `cDesignation` varchar(80) DEFAULT NULL,
  `cLoginName` varchar(80) NOT NULL,
  `cLoginPassword` blob NOT NULL,
  `bRole` tinyint(1) UNSIGNED NOT NULL DEFAULT '2' COMMENT '0=superadmin, 1=company admin, 2=other users',
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='test';

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`iUserId`, `cFullName`, `cAddress`, `iMobileNo`, `cEmailAddress`, `cUserProfilePicName`, `cDesignation`, `cLoginName`, `cLoginPassword`, `bRole`, `bActive`, `bDelete`) VALUES
(1, 'admin', 'admin address', 9999999999, 'admin@admin.com', NULL, 'administrator', 'admin', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `adminuser_rights`
--

CREATE TABLE `adminuser_rights` (
  `iAccessId` int(11) UNSIGNED NOT NULL,
  `iUserId` int(11) UNSIGNED NOT NULL,
  `iParentMenuId` int(11) UNSIGNED NOT NULL,
  `iMenuId` int(11) UNSIGNED NOT NULL,
  `bView` tinyint(1) UNSIGNED DEFAULT NULL,
  `bAdd` tinyint(1) UNSIGNED NOT NULL,
  `bEdit` tinyint(1) UNSIGNED NOT NULL,
  `bDelete` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `iGroupid` int(10) UNSIGNED NOT NULL,
  `cCategoryName` varchar(45) NOT NULL,
  `cCategoryIcon` varchar(150) NOT NULL DEFAULT '',
  `bDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`id`, `iGroupid`, `cCategoryName`, `cCategoryIcon`, `bDelete`, `bActive`) VALUES
(1, 1, 'Hotel', 'categoryicon1.png', 0, 1),
(2, 1, 'Doctors', 'categoryicon2.png', 0, 0),
(3, 1, 'Pharma', 'categoryicon3.png', 0, 0),
(4, 1, 'CA', 'categoryicon4.png', 0, 1),
(5, 1, 'Restaurents', 'categoryicon5.png', 0, 1),
(6, 1, 'Business', 'categoryicon6.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `iStateid` int(10) UNSIGNED NOT NULL,
  `cCityName` varchar(45) NOT NULL,
  `bDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `iStateid`, `cCityName`, `bDelete`, `bActive`) VALUES
(1, 1, 'Bhopal', 0, 1),
(2, 1, 'Indore', 0, 1),
(3, 1, 'Jabalpur', 0, 1),
(5, 1, 'Gwalior', 0, 1),
(6, 1, 'Sagar', 0, 1),
(7, 1, 'Ujjain', 0, 1),
(8, 2, 'Pune', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `cFullName` varchar(100) NOT NULL,
  `iMobileNo` bigint(20) UNSIGNED DEFAULT NULL,
  `cUserEmail` varchar(100) DEFAULT NULL,
  `cUserPassword` blob NOT NULL,
  `bEmailVerified` tinyint(1) NOT NULL DEFAULT '0',
  `bMobileVerified` tinyint(1) NOT NULL DEFAULT '0',
  `bDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `dCreateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`id`, `cFullName`, `iMobileNo`, `cUserEmail`, `cUserPassword`, `bEmailVerified`, `bMobileVerified`, `bDelete`, `bActive`, `dCreateDateTime`) VALUES
(1, 'welcome@gmail.com', 9876543210, 'welcome@gmail.com', 0x3f475e616ab06e040eca9b39128d0b4e20eec08da2cf384b50434794ab1fd94d483fdbbff5d94b09dee678cd4f6cb238, 1, 1, 0, 1, '2017-12-22 16:15:20'),
(2, 'dsfsaf', 9425645253, 'smdelhi2020@gmail.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 0, 0, 0, 0, '2018-01-08 18:23:36'),
(3, 'asdfasf', 432312341234124, 'fsadfdasfdasf@sdfdsf.sdfdsf', 0x621b8bca02dcd2cad7734505f86f68e0f52d702ce3ae6a37165c3a025f0ed40f918a57b5cddd41590aaded26f83a3e55, 0, 0, 0, 0, '2018-01-08 18:25:48'),
(4, 'dffdsafsa', 2343424234, 'dfdsafasf@fsfsdf.sdfsfds', 0x33b956239ca4a6893b271c89d5e55c5502e367b7cbda13d9f54dde170cfd8e9e0d2d4e617858a9fbe9cd6e148fae2bb9, 0, 0, 0, 0, '2018-01-08 18:26:10'),
(5, 'sadfsafsf', 2342134234, 'dfasfdsa@sdfdsf.sadfsadf', 0x409c8dc89e91f4c61594688545b2deb7db3f8c16d7aef23cfa83522b172c95f2f87a7d3b5af5b2b913993bef0bccbc43, 0, 0, 0, 0, '2018-01-08 18:27:35'),
(6, 'gdfsgdsg', 3454355, 'fgsdgf@dgdfg.dfgdfg', 0xe40304e9f9672cf5c0750f89434e3b22cbffbdbfd4cd4da0cc05052c086b770664dfc75fc30663ff56a61111b04e71c0, 0, 0, 0, 0, '2018-01-08 18:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `exam_allotment`
--

CREATE TABLE `exam_allotment` (
  `id` int(10) NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ExamMasterId` int(10) UNSIGNED NOT NULL,
  `StudentId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_allotment`
--

INSERT INTO `exam_allotment` (`id`, `ExamCategoryId`, `InstituteId`, `ExamMasterId`, `StudentId`) VALUES
(1, 2, 1, 2, 141),
(2, 16, 1, 11, 142),
(3, 16, 1, 11, 144),
(4, 16, 1, 11, 145),
(5, 16, 0, 11, 142),
(6, 16, 0, 11, 144),
(7, 16, 0, 11, 145),
(8, 16, 1, 11, 141);

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `ExamCategoryTitle` varchar(100) NOT NULL,
  `ActiveDeactive` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `CreatedById` int(10) UNSIGNED NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `ExamCategoryTitle`, `ActiveDeactive`, `CreatedById`, `InstituteId`, `CreatedDateTime`) VALUES
(1, 'Banking &amp; Insurance', 1, 1, 0, '2018-01-12 06:37:25'),
(2, 'SSC &amp; Railways', 1, 1, 0, '2018-01-12 06:37:25'),
(3, 'Mechanical Engineering', 1, 1, 0, '2018-01-12 06:37:25'),
(4, 'Electrical Engineering', 0, 1, 0, '2018-01-12 06:37:25'),
(5, 'Electronics &amp; Communication', 0, 1, 0, '2018-01-12 06:37:25'),
(6, 'Civil Engineering', 0, 1, 0, '2018-01-12 06:37:25'),
(7, 'Computer Science &amp; Engineering', 0, 1, 0, '2018-01-12 06:37:25'),
(8, 'Delhi Police', 0, 1, 0, '2018-01-12 06:37:25'),
(9, 'GK &amp; Current Affairs', 0, 1, 0, '2018-01-12 06:37:25'),
(10, 'Aptitude', 0, 1, 0, '2018-01-12 06:37:25'),
(11, 'ECIL', 0, 1, 0, '2018-01-12 06:37:25'),
(12, 'PSPCL', 0, 1, 0, '2018-01-12 06:37:25'),
(13, 'PNRD ASSAM', 0, 1, 0, '2018-01-12 06:37:25'),
(15, 'Ajoijie', 0, 0, 0, '2018-01-30 06:44:03'),
(16, 'Banking & Insurance', 1, 0, 1, '2018-02-13 15:13:18'),
(17, 'demo', 1, 0, 3, '2018-02-13 16:56:58'),
(18, 'test', 1, 0, 1, '2018-02-14 13:01:33'),
(19, 'SSC & Railways', 1, 0, 1, '2018-02-22 05:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `exam_instructions`
--

CREATE TABLE `exam_instructions` (
  `id` int(11) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Instructions` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `InstituteId` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_instructions`
--

INSERT INTO `exam_instructions` (`id`, `Title`, `Instructions`, `CreatedBy`, `InstituteId`, `CreatedDate`, `ModifiedDate`) VALUES
(1, 'BPO,CLERICAL', '', 1, 0, '2018-01-24 14:38:22', '2018-01-24 14:38:22'),
(2, '', '', 0, 0, '2018-02-21 12:33:04', '2018-02-21 12:33:04'),
(3, '', '', 0, 0, '2018-02-21 12:33:08', '2018-02-21 12:33:08'),
(4, '', '', 0, 1, '2018-02-22 05:53:24', '2018-02-22 05:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `ExamIcon` varchar(100) NOT NULL,
  `ExamTitle` varchar(100) NOT NULL,
  `ExamShortdesc` varchar(200) NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `CreatedById` int(10) UNSIGNED NOT NULL,
  `CreatedDatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`id`, `ExamIcon`, `ExamTitle`, `ExamShortdesc`, `ExamCategoryId`, `InstituteId`, `ActiveDeactive`, `CreatedById`, `CreatedDatetime`) VALUES
(1, 'fa fa-bank', 'Bank PO', 'IBPS PO, SBI PO, IPPB Officer, RRB Officer', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(2, 'fa fa-bank', 'Bank PO', 'IBPS PO, SBI PO, IPPB Officer, RRB Officer', 1, 2, 1, 1, '2018-01-12 14:14:27'),
(3, 'fa fa-bank', 'Bank SO', 'IBPS SO, SBI SO', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(4, 'fa fa-bank', 'Bank Clerk', 'IBPS Clerk, SBI Clerk, RRB Assistant', 1, 0, 0, 1, '2018-01-12 14:14:27'),
(5, 'fa fa-bank', 'SSC', 'SSC MTS, SSC CGL, SSC CHSL &amp; Stenographer', 2, 0, 1, 1, '2018-01-12 14:14:27'),
(6, 'fa fa-bank', 'Delhi Police', 'Delhi Police Constable', 2, 0, 0, 1, '2018-01-12 14:14:27'),
(7, 'fa fa-bank', 'Railways', 'Railway RRB NTPC', 2, 0, 1, 1, '2018-01-12 14:14:27'),
(8, 'fa fa-bank', 'Insurance', 'LIC AAO, NICL AO, UIICL', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(9, 'fa fa-bank', 'Delhi Police', 'Delhi Police Constable', 1, 0, 0, 1, '2018-01-12 14:14:27'),
(10, 'fa fa-bank', 'RBI', 'RBI Grade B officer, RBI Assistant', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(11, 'fa fa-home', 'Bank PO', 'hello', 16, 1, 1, 0, '2018-02-13 15:14:02'),
(12, 'fa fa-home', 'hello', 'gh', 17, 3, 1, 0, '2018-02-13 16:57:24'),
(13, '', 'Railways', 'Railway RRB NTPC', 19, 1, 1, 0, '2018-02-22 05:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `exam_test`
--

CREATE TABLE `exam_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL,
  `ExamMasterId` int(10) UNSIGNED NOT NULL,
  `ExamTestTitle` varchar(200) NOT NULL,
  `ExamTestDesc` varchar(200) DEFAULT NULL,
  `ExamTestDurartion` time NOT NULL DEFAULT '00:00:00',
  `ExamTestInstructionId` int(10) UNSIGNED DEFAULT NULL,
  `ExamTestDiscount` int(11) NOT NULL DEFAULT '0',
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `CreatedById` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_test`
--

INSERT INTO `exam_test` (`id`, `ExamCategoryId`, `ExamMasterId`, `ExamTestTitle`, `ExamTestDesc`, `ExamTestDurartion`, `ExamTestInstructionId`, `ExamTestDiscount`, `InstituteId`, `ActiveDeactive`, `CreatedById`, `CreatedDateTime`) VALUES
(12, 1, 1, 'Canara Bank PO Full Test', 'test', '09:30:00', 1, 120, 0, 1, 0, '2018-02-07 12:03:29'),
(13, 1, 1, 'Syndicate Bank PO Full Test', 'test', '11:55:00', 1, 1245, 0, 1, 0, '2018-02-07 12:04:12'),
(14, 1, 1, 'RRB Officer Full Test', 'test', '11:55:00', 1, 1245, 0, 1, 0, '2018-02-07 12:04:34'),
(15, 1, 1, 'Syndicate Bank PO Full Test', 'test', '12:00:00', 1, 15, 0, 1, 0, '2018-02-07 12:05:27'),
(16, 1, 1, 'SBi  po  ', 'test', '12:00:00', 1, 15, 0, 1, 0, '2018-02-07 12:06:27'),
(17, 1, 1, 'bank  of  india  2017', 'test', '12:00:00', 1, 15, 0, 1, 0, '2018-02-07 12:07:06'),
(18, 16, 11, 'test', '4', '11:55:00', 0, 155, 1, 1, 0, '2018-02-13 15:15:38'),
(19, 17, 12, 'test', 'sddsD', '11:55:00', 0, 155, 3, 1, 0, '2018-02-13 16:58:06'),
(20, 16, 11, 'sadfafd', 'iouo\r\n\r\n\r\n\r\n', '00:00:00', 0, 155, 1, 1, 0, '2018-02-14 10:36:39'),
(21, 16, 11, 'demo', 'dfdfs', '09:30:00', 0, 0, 1, 1, 0, '2018-02-14 11:44:25'),
(22, 19, 13, 'Free Full Test - Railway Group D', 'NTPC', '00:55:00', 0, 50, 1, 1, 0, '2018-02-22 05:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `group_master`
--

CREATE TABLE `group_master` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `cGroupName` varchar(45) NOT NULL,
  `cGroupIcon` varchar(150) NOT NULL DEFAULT '',
  `bDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_master`
--

INSERT INTO `group_master` (`id`, `cGroupName`, `cGroupIcon`, `bDelete`, `bActive`) VALUES
(1, 'Main Group', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `institute_master`
--

CREATE TABLE `institute_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `InstituteLogo` varchar(200) DEFAULT NULL,
  `InstituteUniqueId` varchar(50) NOT NULL,
  `InstituteFullName` varchar(100) NOT NULL,
  `InstituteSponsorId` varchar(50) DEFAULT NULL,
  `InstituteWebsiteUrl` varchar(200) NOT NULL,
  `PackageId` int(10) UNSIGNED NOT NULL,
  `InstituteMobileNo` varchar(20) NOT NULL,
  `InstituteEmail` varchar(100) NOT NULL,
  `InstitutePassword` blob,
  `InstituteJobTitle` varchar(100) NOT NULL,
  `InstituteJobDesg` varchar(50) DEFAULT NULL,
  `InstituteAddress` varchar(255) NOT NULL,
  `InstituteCity` varchar(50) DEFAULT NULL,
  `InstituteState` varchar(50) DEFAULT NULL,
  `InstituteCountry` varchar(50) DEFAULT NULL,
  `InstitutePersonName` varchar(50) DEFAULT NULL,
  `InstituteStudentCount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `InstituteNeedDemo` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_master`
--

INSERT INTO `institute_master` (`id`, `InstituteLogo`, `InstituteUniqueId`, `InstituteFullName`, `InstituteSponsorId`, `InstituteWebsiteUrl`, `PackageId`, `InstituteMobileNo`, `InstituteEmail`, `InstitutePassword`, `InstituteJobTitle`, `InstituteJobDesg`, `InstituteAddress`, `InstituteCity`, `InstituteState`, `InstituteCountry`, `InstitutePersonName`, `InstituteStudentCount`, `InstituteNeedDemo`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 'logo6.png', '', 'Launch Academy', 'ES123', 'escomfort', 3, '7897894564', 'escomfort@escomfort.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'Marketing', 'HR', '', '8', '2', 'India', 'E&S Comforts', 500, 1, 0, '2018-02-01 07:10:09'),
(2, 'logo.png', '', 'FFFF', '4555', 'ffff', 3, '123456', 'admin@admin.com', 0xdcf85b8abf569ea3c915f0dfc5bb23c49cbe594ca893c8e812f9db20d60aa2b447b97f38434247de928def772e4ca609, '23255', '5556', '', '5545', '4545', '455', 'uuu', 4545, 1, 0, '2018-02-13 16:02:48'),
(3, 'logo5.jpg', '', 'Gate Academy', '4555', 'Gate%20Academy', 4, '123456', 'gate@admin.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, '23255', '5556', '', '5545', '4545', '455', '123456', 4545, 0, 0, '2018-02-13 16:03:59'),
(4, 'logo2.png', '', 'test', 'dsd', 'test', 3, '123456', '1admin@admin.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, '23255', '5556', '', '5545', 'dasd', 'sd', 'uuu', 0, 1, 0, '2018-02-15 11:51:53'),
(5, 'logo5.png', '', 'A S Academy', 'abc', 'asacademy', 4, '9898989898', 'as@as.com', 0x9161c1234b527d9c21b5cce70fcf8adba46f20da43bdb538c3dccffb21f8ba9743cc5ccb8762582eef2b250f800240f1, 'HR', 'HR Manager', '', '2', '1', 'India', 'Kartik', 5, 1, 0, '2018-02-16 07:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `iMenuId` int(11) UNSIGNED NOT NULL,
  `iParentMenuId` int(11) UNSIGNED NOT NULL,
  `iCategoryId` int(11) UNSIGNED NOT NULL,
  `cMenuName` varchar(200) NOT NULL,
  `cMenuUrl` text NOT NULL,
  `cMenuIcon` varchar(80) DEFAULT NULL,
  `iMenuidInURL` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `iDisplaySequence` int(11) UNSIGNED NOT NULL,
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages_master`
--

CREATE TABLE `packages_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `PackageName` varchar(50) NOT NULL,
  `NumberOfStudents` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `PackageDuration` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `PackagePrice` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `NumberOfExams` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreattedById` int(11) NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_master`
--

INSERT INTO `packages_master` (`id`, `PackageName`, `NumberOfStudents`, `PackageDuration`, `PackagePrice`, `NumberOfExams`, `ActiveDeactive`, `CreattedById`, `CreatedDateTime`) VALUES
(3, 'Monthly Package', 30, 30, 3000, 5, 0, 0, '2018-01-22 07:27:18'),
(4, 'Quaterly Package', 90, 90, 9000, 9, 0, 0, '2018-01-22 07:31:13'),
(5, 'Half yearly Package', 180, 180, 1800, 18, 0, 0, '2018-01-22 07:31:57'),
(6, 'Yearly Packages', 300, 365, 30000, 30, 0, 0, '2018-01-22 07:32:36'),
(7, 'demmo', 400, 12, 12300, 34, 0, 0, '2018-02-13 16:01:38'),
(11, '', 0, 0, 0, 0, 0, 0, '2018-02-21 11:26:05'),
(12, '', 0, 0, 0, 0, 0, 0, '2018-02-21 11:26:27'),
(13, '', 0, 0, 0, 0, 0, 0, '2018-02-21 11:27:19'),
(14, '', 0, 0, 0, 0, 0, 0, '2018-02-21 11:28:35'),
(15, '', 0, 0, 0, 0, 0, 0, '2018-02-21 11:31:45'),
(16, '', 0, 0, 0, 0, 0, 0, '2018-02-21 11:31:51'),
(17, '', 0, 0, 0, 0, 0, 0, '2018-02-21 11:58:39'),
(18, 'Abc', 50, 5, 500, 20, 0, 0, '2018-02-21 12:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `practice_question`
--

CREATE TABLE `practice_question` (
  `id` int(10) NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL,
  `ExamMasterId` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `subjectmodule_id` int(10) NOT NULL,
  `question_text` text NOT NULL,
  `question_option` varchar(255) NOT NULL,
  `correct_answer` text NOT NULL,
  `answer_description` text NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` tinyint(10) NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice_question`
--

INSERT INTO `practice_question` (`id`, `ExamCategoryId`, `ExamMasterId`, `subject_id`, `subjectmodule_id`, `question_text`, `question_option`, `correct_answer`, `answer_description`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(37, 1, 1, 1, 1, '<p><strong>In the question below, a part of the sentence is highlighted. Below are given alternatives to the&nbsp;highlighted part which may improve the sentence. Choose the correct alternative. In case no improvement is needed, choose &#39;No improvement.&#39;</strong></p>\r\n\r\n<p>The Indian consumer is the current king of banking - an industry least likely to favour individuals when borrowing isn&#39;t cheap and savings rates trail headline inflation. But competition&nbsp;<strong>will make</strong>&nbsp;new banks generous with deposit rates, although the longevity of these offerings is in doubt.</p>', 'a:5:{i:0;s:15:\"Would have made\";i:1;s:9:\"Have made\";i:2;s:8:\"Has made\";i:3;s:17:\"have been  made  \";i:4;s:14:\"No improvement\";}', '4', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:22:50'),
(38, 1, 1, 1, 1, '<p><strong>In the question below, a part of the sentence is highlighted. Below are given alternatives to the&nbsp;highlighted part which may improve the sentence. Choose the correct alternative. In case no improvement is needed, choose &#39;No improvement.&#39;</strong></p>\r\n\r\n<p>The Indian consumer is the current king of banking - an industry least likely to favour individuals when borrowing isn&#39;t cheap and savings rates trail headline inflation. But competition&nbsp;<strong>will make</strong>&nbsp;new banks generous with deposit rates, although the longevity of these offerings is in doubt.</p>', 'a:5:{i:0;s:15:\"Would have made\";i:1;s:9:\"Have made\";i:2;s:8:\"Has made\";i:3;s:17:\"have been  made  \";i:4;s:14:\"No improvement\";}', '4', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:23:59'),
(39, 1, 1, 1, 1, '<p><strong>Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore errors of punctuation, if any.&nbsp;</strong></p>\r\n\r\n<p>Mt. Everest is the tallest (1)&nbsp;of all the other peaks (2)&nbsp;in the world and climbing (3)&nbsp;it needs daring. (4)&nbsp;No error (5)</p>', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '5', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:26:27'),
(40, 1, 1, 1, 1, '<p><strong>Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore errors of punctuation, if any.&nbsp;</strong></p>\r\n\r\n<p>Shreya has taken (1)&nbsp;part in sports (2)&nbsp;actively till she was in (3)&nbsp;the second grade. (4)&nbsp;No error (5)</p>\r\n\r\n<p>&nbsp;</p>', 'a:5:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"5\";i:3;s:1:\"6\";i:4;s:1:\"7\";}', '5', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:27:58'),
(47, 1, 2, 1, 1, '<p>adsASE</p>\r\n', 'a:5:{i:0;s:3:\"dss\";i:1;s:1:\"d\";i:2;s:1:\"d\";i:3;s:1:\"d\";i:4;s:1:\"d\";}', '3', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, 1, '2018-02-07 12:20:39'),
(48, 1, 1, 1, 1, '<p>op;l;lk;</p>\r\n', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}', '5', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>p=[</p>\r\n\r\n<p>p[</p>\r\n', 0, 1, '2018-02-07 15:26:21'),
(49, 1, 2, 2, 3, '                                ', 'a:5:{i:0;s:3:\"fff\";i:1;s:4:\"ffff\";i:2;s:3:\"fff\";i:3;s:2:\"ff\";i:4;s:8:\"fdsffdsf\";}', '5', '', 0, 1, '2018-02-07 15:27:28'),
(50, 1, 2, 1, 1, '                                ', 'a:5:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";i:3;s:2:\"55\";i:4;s:1:\"5\";}', '4', '', 0, 1, '2018-02-07 15:29:04'),
(51, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:1:\"l\";i:1;s:1:\"l\";i:2;s:1:\"l\";i:3;s:2:\"ll\";i:4;s:1:\"l\";}', '1', '', 0, 1, '2018-02-07 15:31:39'),
(52, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"4\";i:3;s:1:\"4\";i:4;s:1:\"4\";}', '', '', 0, 1, '2018-02-07 15:34:21'),
(53, 1, 1, 2, 3, '                                ', 'a:5:{i:0;s:6:\"asdasd\";i:1;s:5:\"sdsad\";i:2;s:6:\"ssdsad\";i:3;s:6:\"asdasd\";i:4;s:6:\"asdsad\";}', '3', '', 0, 1, '2018-02-07 15:35:42'),
(54, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:\"yt\";i:1;s:2:\"ty\";i:2;s:3:\"rty\";i:3;s:3:\"5ty\";i:4;s:3:\"rty\";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:18:51'),
(55, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:\"yt\";i:1;s:2:\"ty\";i:2;s:3:\"rty\";i:3;s:3:\"5ty\";i:4;s:3:\"rty\";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:18:58'),
(56, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:\"yt\";i:1;s:2:\"ty\";i:2;s:3:\"rty\";i:3;s:3:\"5ty\";i:4;s:3:\"rty\";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:19:00'),
(57, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:\"yt\";i:1;s:2:\"ty\";i:2;s:3:\"rty\";i:3;s:3:\"5ty\";i:4;s:3:\"rty\";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:19:05'),
(58, 1, 1, 1, 1, '<p>jiojujij</p>\r\n', 'a:5:{i:0;s:2:\"ui\";i:1;s:3:\"uii\";i:2;s:2:\"ui\";i:3;s:3:\"uii\";i:4;s:2:\"ui\";}', '3', '<p>uioio</p>\r\n', 0, 1, '2018-02-07 16:19:52'),
(59, 1, 1, 1, 1, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:2:\"12\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";}', '3', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, 1, '2018-02-07 16:21:36'),
(60, 1, 3, 3, 5, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span>ghjhgjghjhgjgh</p>\r\n', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";}', '3', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, 1, '2018-02-07 16:31:42'),
(61, 1, 1, 2, 3, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";}', '3', '<p>111</p>\r\n', 0, 1, '2018-02-07 17:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `practice_test`
--

CREATE TABLE `practice_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `InstituteId` int(11) NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL,
  `ExamMasterId` int(10) UNSIGNED NOT NULL,
  `PracticeTestTitle` varchar(200) NOT NULL,
  `PracticeTestDesc` varchar(200) DEFAULT NULL,
  `PracticeTestDuration` varchar(100) NOT NULL COMMENT 'empty when no duration in practice test',
  `Tags` varchar(255) NOT NULL,
  `ActiveDeactive` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `CreatedById` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice_test`
--

INSERT INTO `practice_test` (`id`, `InstituteId`, `ExamCategoryId`, `ExamMasterId`, `PracticeTestTitle`, `PracticeTestDesc`, `PracticeTestDuration`, `Tags`, `ActiveDeactive`, `CreatedById`, `CreatedDateTime`) VALUES
(1, 0, 1, 1, 'indore', 'indore', '09:30', 'adfdafadsf', 1, 0, '2018-02-03 11:48:02'),
(2, 0, 2, 5, 'sadfafd', 'test', '09:30', 'test', 1, 0, '2018-02-03 11:53:57'),
(3, 0, 2, 5, 'ghgf', 'test', '09:30', 'ghgh', 1, 0, '2018-02-03 11:56:26'),
(4, 0, 2, 5, 'sadfafd', 'test', '09:30', 'dssds', 1, 0, '2018-02-03 12:05:00'),
(5, 0, 2, 5, 'sadfafd', 'indore', '09:45', 'sd', 1, 0, '2018-02-03 18:09:57'),
(6, 0, 1, 1, 'po 2017', 'test', '10:50', 'test', 1, 0, '2018-02-05 15:29:58'),
(7, 0, 1, 1, 'indore', 'ooo', '09:50', 'oo', 1, 0, '2018-02-05 18:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `question_master`
--

CREATE TABLE `question_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ExamMasterId` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ExamTestId` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `QuestionText` text NOT NULL,
  `QuestionAnswerOptions` text NOT NULL,
  `QuestionCorrectAnswerId` int(11) NOT NULL,
  `QuestionSolution` text NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_master`
--

INSERT INTO `question_master` (`id`, `ExamCategoryId`, `ExamMasterId`, `ExamTestId`, `QuestionText`, `QuestionAnswerOptions`, `QuestionCorrectAnswerId`, `QuestionSolution`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(22, 1, 1, 12, '<p>dsfsdfgdfgdf</p>\r\n', 'a:5:{i:0;s:5:\"14111\";i:1;s:4:\"2122\";i:2;s:2:\"22\";i:3;s:2:\"22\";i:4;s:2:\"55\";}', 4, '', 0, 0, '2018-02-07 17:59:35'),
(25, 1, 1, 12, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', 5, '', 0, 0, '2018-02-08 10:09:16'),
(26, 1, 1, 12, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:\"1\";i:1;s:2:\"12\";i:2;s:2:\"12\";i:3;s:2:\"12\";i:4;s:1:\"1\";}', 3, '', 0, 0, '2018-02-08 10:22:15'),
(27, 1, 1, 13, '<p>hello&nbsp; this&nbsp; is&nbsp; &nbsp;my&nbsp; first&nbsp; test&nbsp; &nbsp;</p>\r\n', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', 3, '', 0, 0, '2018-02-08 18:11:12'),
(28, 16, 11, 18, '<p>hjjjkkjkljkk</p>\r\n', 'a:5:{i:0;s:1:\"l\";i:1;s:1:\"l\";i:2;s:1:\"l\";i:3;s:1:\"l\";i:4;s:1:\"l\";}', 5, '', 1, 0, '2018-02-13 15:24:18'),
(29, 16, 11, 18, '<p>sdfsdfs</p>\r\n', 'a:5:{i:0;s:2:\"10\";i:1;s:2:\"52\";i:2;s:2:\"55\";i:3;s:3:\"585\";i:4;s:2:\"55\";}', 6, '', 1, 0, '2018-02-13 15:25:06'),
(30, 17, 12, 19, '<p>dzdzff</p>\r\n', 'a:5:{i:0;s:7:\"ffffdff\";i:1;s:5:\"fdfdf\";i:2;s:4:\"dfdf\";i:3;s:3:\"dfd\";i:4;s:3:\"dff\";}', 3, '<p>dfffff</p>\r\n', 3, 0, '2018-02-13 16:58:51'),
(31, 19, 13, 22, '<p><strong>Directions:&nbsp;</strong>In the following questions, find the missing number/letter from given responses.</p>\r\n\r\n<p>A/4, D/9, H/15, M/22, ?</p>\r\n', 'a:5:{i:0;s:4:\"R/30\";i:1;s:4:\"S/31\";i:2;s:4:\"Q/30\";i:3;s:4:\"Q/31\";i:4;s:4:\"P/31\";}', 2, '', 1, 1, '2018-02-22 06:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `question_practice_master`
--

CREATE TABLE `question_practice_master` (
  `id` int(11) NOT NULL,
  `QuestionCategoryId` int(11) NOT NULL,
  `QuestionSubcategoryId` int(11) NOT NULL,
  `QuestionText` varchar(255) NOT NULL,
  `QuestionAnswerOptions` text NOT NULL,
  `QuestionCorrectAnswerId` int(11) NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `AnswerDescription` text NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `question_practice_master`
--

INSERT INTO `question_practice_master` (`id`, `QuestionCategoryId`, `QuestionSubcategoryId`, `QuestionText`, `QuestionAnswerOptions`, `QuestionCorrectAnswerId`, `InstituteId`, `AnswerDescription`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 1, 1, 'Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore error of punctuation if any : \"Mount Everest is ', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', 2, 0, '', 0, '2018-01-31 09:56:26'),
(2, 1, 1, 'Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore error of punctuation if any : \"Mount Everest is ', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', 2, 0, 'When comparision is done in the superlative degree, the latter term should include the former, i.e the one claiming to be superlative,\r\ne.g. \r\nThe Burj-al-Arab is the tallest of all hotels in the world. (not -\' of all the other hotels\')\r\n\r\nThus the error is in the second part of the sentence', 0, '2018-01-31 10:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `id` int(10) NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL,
  `ExamMasterId` int(10) UNSIGNED NOT NULL,
  `QuizTesId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` tinyint(10) NOT NULL,
  `question_text` text NOT NULL,
  `question_option` varchar(255) NOT NULL,
  `correct_answer` text NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  `answer_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`id`, `ExamCategoryId`, `ExamMasterId`, `QuizTesId`, `ActiveDeactive`, `question_text`, `question_option`, `correct_answer`, `InstituteId`, `CreatedDateTime`, `answer_description`) VALUES
(1, 1, 1, 1, 1, '', 'a:5:{i:0;s:2:\"55\";i:1;s:2:\"55\";i:2;s:2:\"55\";i:3;s:2:\"55\";i:4;s:3:\"555\";}', '', 0, '2018-02-06 17:38:37', ''),
(2, 1, 1, 2, 1, '                                ', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:2:\"12\";i:3;s:2:\"12\";i:4;s:2:\"12\";}', '', 0, '2018-02-06 17:58:32', ''),
(3, 1, 1, 2, 1, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:2:\"12\";i:3;s:2:\"12\";i:4;s:2:\"12\";}', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, '2018-02-06 17:59:02', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n'),
(4, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:2:\"44\";i:1;s:2:\"44\";i:2;s:3:\"444\";i:3;s:4:\"4444\";i:4;s:5:\"44444\";}', '', 0, '2018-02-06 18:03:14', ''),
(5, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:2:\"45\";i:1;s:2:\"46\";i:2;s:2:\"47\";i:3;s:2:\"48\";i:4;s:2:\"49\";}', '', 0, '2018-02-06 18:04:53', ''),
(6, 1, 1, 1, 1, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:2:\"45\";i:1;s:2:\"46\";i:2;s:2:\"47\";i:3;s:2:\"48\";i:4;s:2:\"49\";}', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, '2018-02-06 18:05:36', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n'),
(7, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:3:\"565\";i:1;s:2:\"55\";i:2;s:2:\"55\";i:3;s:3:\"555\";i:4;s:3:\"555\";}', '', 0, '2018-02-06 18:09:06', ''),
(8, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:1:\"7\";i:1;s:1:\"7\";i:2;s:1:\"7\";i:3;s:1:\"7\";i:4;s:1:\"7\";}', '', 0, '2018-02-06 18:11:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_test`
--

CREATE TABLE `quiz_test` (
  `id` int(10) NOT NULL,
  `ExamCategoryId` int(10) UNSIGNED NOT NULL,
  `ExamMasterId` int(10) UNSIGNED NOT NULL,
  `PracticeTestTitle` varchar(255) NOT NULL,
  `PracticeTestDesc` text NOT NULL,
  `PracticeTestDuration` time NOT NULL,
  `ActiveDeactive` tinyint(10) NOT NULL,
  `InstituteId` int(11) NOT NULL,
  `Tags` text NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_test`
--

INSERT INTO `quiz_test` (`id`, `ExamCategoryId`, `ExamMasterId`, `PracticeTestTitle`, `PracticeTestDesc`, `PracticeTestDuration`, `ActiveDeactive`, `InstituteId`, `Tags`, `CreatedDateTime`) VALUES
(1, 1, 1, 'dd', 'fff', '09:30:00', 1, 0, 'dfdf', '2018-02-05 18:24:37'),
(2, 1, 1, 'test', 'hello', '11:55:00', 1, 0, 'hello', '2018-02-06 09:59:38'),
(3, 1, 1, 'test', 'test', '09:30:00', 1, 0, 'test', '2018-02-06 10:25:09'),
(4, 1, 1, 'test', 'ssdsd', '09:45:00', 1, 0, 'sdsadsd', '2018-02-07 11:09:34'),
(5, 2, 7, 'hello', '12354', '09:30:00', 1, 0, '54556', '2018-02-07 11:10:17'),
(6, 1, 1, 'Interest & Mensuration Quiz', 'test', '09:30:00', 1, 0, 'ibps  Po', '2018-02-07 11:46:21'),
(7, 1, 1, 'apptitude', 'teest', '13:05:00', 1, 0, 'ibbps po', '2018-02-07 11:47:10'),
(8, 1, 1, 'Phrase Replacement (Grammar) Quiz', 'teest', '13:05:00', 1, 0, 'ibps', '2018-02-07 11:49:29'),
(9, 1, 1, 'Fill in the Blanks Quiz', 'test', '11:00:00', 1, 0, 'ibps po', '2018-02-07 11:50:47'),
(10, 1, 1, 'Syllogism Quiz', 'test', '09:30:00', 1, 0, 'ibps  po', '2018-02-07 11:51:27'),
(11, 1, 1, 'Data Sufficiency Quiz', 'test', '09:30:00', 1, 0, 'ibps  po\r\n', '2018-02-07 12:08:33'),
(12, 1, 1, 'Direction and Distance Quiz', 'test', '09:30:00', 1, 0, 'test', '2018-02-07 12:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `cStateName` varchar(45) NOT NULL,
  `bDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`id`, `cStateName`, `bDelete`, `bActive`) VALUES
(1, 'Madhya Pradesh', 0, 1),
(2, 'Maharashtra', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `StudentImage` varchar(200) DEFAULT NULL,
  `StudentFullName` varchar(100) NOT NULL,
  `StudentMotherName` varchar(100) DEFAULT NULL,
  `StudentFatherName` varchar(100) DEFAULT NULL,
  `StudentDOB` date DEFAULT NULL,
  `StudentAddress` varchar(200) DEFAULT NULL,
  `StudentMobileNo` varchar(20) NOT NULL,
  `StudentEmail` varchar(100) NOT NULL,
  `StudentPassword` blob,
  `StudentCity` varchar(50) DEFAULT NULL,
  `StudentState` varchar(50) DEFAULT NULL,
  `StudentCountry` varchar(50) DEFAULT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`id`, `StudentImage`, `StudentFullName`, `StudentMotherName`, `StudentFatherName`, `StudentDOB`, `StudentAddress`, `StudentMobileNo`, `StudentEmail`, `StudentPassword`, `StudentCity`, `StudentState`, `StudentCountry`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(141, 'default.jpg', 'ddd', 'dd', 'dddd', '0000-00-00', 'fff', '9753765867', 'anshul.barve11@gmail.com', 0xaf21739a314a53b9fff69e737c55fc613a58df2a428a2543fae2b17b13bec9e1c8adcc94bae09f827a2333889c4ea38d, 'fddf', 'indore', NULL, 1, 0, '2018-02-13 14:25:15'),
(142, 'default.jpg', 'fdf', 'fdfdf', 'dfdf', '0000-00-00', 'fff', '7748941353', 'barve11@gmail.com', 0x4a3846514e475847, 'assdfs', 'ff', NULL, 1, 0, '2018-02-13 14:25:15'),
(143, '', 'fghfh', 'barve', 'fghfg', '0000-00-00', 'ddddd', '97537658678', 'anshul.b@gmail.cpm', 0x84a61c6eccbe544104b18cc386be5a70f7d8ab37f80d251a15972d7c9abfb4c78730a8acaa5dcb7fbd477b405f4400e3, '1', '1', NULL, 3, 0, '2018-02-13 17:07:01'),
(144, '', '', '', '', '0000-00-00', 'sdfsadasd', '', '', 0x6a4037cfcaa7ac59d2619bdbc032924a89387f460d15b0312c8669a36ba65efffcfd597dcac8b5b576b2aec002641c16, '1', '1', NULL, 1, 0, '2018-02-14 17:56:30'),
(145, '', 'Aayushri', 'Nisha', 'Krishan', '0000-00-00', 'Kharakua', '9993479764', 'aayu@aayu.com', 0xa2c67b876f033c63d4d389d4ed28ad5b08ff409e5c558125d22670c355d18464ed785077dfc3e21e5f194e2956de6022, '3', '1', NULL, 1, 0, '2018-02-16 06:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `student_testseries`
--

CREATE TABLE `student_testseries` (
  `id` int(10) NOT NULL,
  `TestseriesId` int(10) UNSIGNED NOT NULL,
  `StudentId` int(10) UNSIGNED NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ExamMasterId` int(11) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `AssignDate` datetime NOT NULL,
  `AssignStatus` varchar(100) NOT NULL,
  `is_active` tinyint(10) NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `student_testseries`
--

INSERT INTO `student_testseries` (`id`, `TestseriesId`, `StudentId`, `InstituteId`, `ExamMasterId`, `Attempts`, `AssignDate`, `AssignStatus`, `is_active`, `CreatedDateTime`) VALUES
(1, 5, 142, 1, 0, 0, '0000-00-00 00:00:00', '', 1, '2018-02-14 00:00:00'),
(6, 5, 8, 1, 11, 0, '0000-00-00 00:00:00', '', 1, '2018-02-20 08:16:06'),
(7, 5, 141, 1, 11, 0, '0000-00-00 00:00:00', '', 1, '2018-02-20 08:22:13'),
(8, 5, 142, 1, 11, 0, '0000-00-00 00:00:00', '', 1, '2018-02-20 08:24:12'),
(16, 5, 144, 1, 11, 0, '0000-00-00 00:00:00', '', 1, '2018-02-20 09:22:25'),
(17, 5, 145, 1, 11, 0, '2018-02-21 14:57:47', 'Purchase', 1, '2018-02-21 14:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE `subject_master` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` int(11) NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`id`, `SubjectName`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 'English', 0, 1, '2018-01-30 07:15:35'),
(2, 'Mathemetics', 0, 1, '2018-02-01 11:10:45'),
(3, 'Computer', 0, 1, '2018-02-07 12:09:55'),
(4, 'Logical Reasoning', 0, 1, '2018-02-07 12:11:50'),
(5, 'General Awarenes', 0, 1, '2018-02-07 12:12:19'),
(6, '', 0, 1, '2018-02-21 12:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `subject_module_master`
--

CREATE TABLE `subject_module_master` (
  `id` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `SubjectModuleName` varchar(255) NOT NULL,
  `InstituteId` int(10) UNSIGNED NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subject_module_master`
--

INSERT INTO `subject_module_master` (`id`, `SubjectId`, `SubjectModuleName`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 1, 'Grammer', 0, 1, '2018-01-30 11:54:13'),
(2, 1, 'Reading Comprehension', 0, 1, '2018-01-30 11:54:41'),
(3, 2, 'Charts', 0, 1, '2018-02-01 11:22:24'),
(4, 3, 'Microsoft Office', 0, 1, '2018-02-07 12:10:36'),
(5, 3, 'hardware', 0, 1, '2018-02-07 12:11:03'),
(6, 5, 'Banking Awareness', 0, 1, '2018-02-07 12:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_master`
--

CREATE TABLE `sub_category_master` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `iGroupid` int(10) UNSIGNED NOT NULL,
  `iCategoryid` int(10) UNSIGNED NOT NULL,
  `cSubCategoryName` varchar(45) NOT NULL,
  `cSubCategoryIcon` varchar(150) NOT NULL DEFAULT '',
  `bDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testseries`
--

CREATE TABLE `testseries` (
  `id` int(11) NOT NULL,
  `ExamCategoryId` int(11) NOT NULL,
  `ExamMasterId` int(11) NOT NULL,
  `TestseriesTitle` varchar(100) NOT NULL,
  `TestseriesPrice` varchar(100) NOT NULL,
  `TestseriesDiscount` varchar(100) NOT NULL,
  `TestseriesTags` varchar(500) NOT NULL,
  `TestseriesDescription` text NOT NULL,
  `TestseriesDuration` varchar(100) NOT NULL,
  `InstituteId` int(11) NOT NULL,
  `test_ids` varchar(500) NOT NULL,
  `CreatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testseries`
--

INSERT INTO `testseries` (`id`, `ExamCategoryId`, `ExamMasterId`, `TestseriesTitle`, `TestseriesPrice`, `TestseriesDiscount`, `TestseriesTags`, `TestseriesDescription`, `TestseriesDuration`, `InstituteId`, `test_ids`, `CreatedDateTime`) VALUES
(1, 1, 2, 'afa', '50', '500', 'jo', 'jo', '', 0, '0', '2018-02-12 06:56:51'),
(2, 1, 2, 'ABC', '500', '5', 'abc', 'abc', '', 0, '', '2018-02-12 09:48:04'),
(3, 1, 1, 'ABC', '451', '50', 'ab', 'ab', '', 0, '14,15,16,17', '2018-02-12 10:27:41'),
(4, 1, 1, 'Syndicate Paper Samples', '200', '50', 'ABc', 'abvc', '', 0, '12,13', '2018-02-12 10:38:24'),
(5, 16, 11, 'SBI SAMPLE PAPERS', '400', '3', 'gfg', 'gfd', '', 1, '18,20,21', '2018-02-14 11:54:13'),
(6, 19, 13, 'Free Full TestSeries - Railway Group D', '500', '50', 'ab', 'a', '', 1, '22', '2018-02-22 06:11:00'),
(7, 16, 11, 'New Test Series of Bank Clerk', '500', '5', 'ab', 'ab', '', 1, '18,21', '2018-02-22 06:15:39'),
(8, 16, 11, 'Syndicate Paper Samples in English', '100', '5', 'Syndicate NTPC', '', '', 1, '18,20', '2018-02-22 06:18:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log_master`
--
ALTER TABLE `activity_log_master`
  ADD PRIMARY KEY (`iActivityLogId`);

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`iUserId`);

--
-- Indexes for table `adminuser_rights`
--
ALTER TABLE `adminuser_rights`
  ADD PRIMARY KEY (`iAccessId`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_allotment`
--
ALTER TABLE `exam_allotment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_instructions`
--
ALTER TABLE `exam_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_test`
--
ALTER TABLE `exam_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_master`
--
ALTER TABLE `group_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_master`
--
ALTER TABLE `institute_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`iMenuId`);

--
-- Indexes for table `packages_master`
--
ALTER TABLE `packages_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice_question`
--
ALTER TABLE `practice_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice_test`
--
ALTER TABLE `practice_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_master`
--
ALTER TABLE `question_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_practice_master`
--
ALTER TABLE `question_practice_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_test`
--
ALTER TABLE `quiz_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_testseries`
--
ALTER TABLE `student_testseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_master`
--
ALTER TABLE `subject_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_module_master`
--
ALTER TABLE `subject_module_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testseries`
--
ALTER TABLE `testseries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log_master`
--
ALTER TABLE `activity_log_master`
  MODIFY `iActivityLogId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;
--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `iUserId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adminuser_rights`
--
ALTER TABLE `adminuser_rights`
  MODIFY `iAccessId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exam_allotment`
--
ALTER TABLE `exam_allotment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `exam_instructions`
--
ALTER TABLE `exam_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exam_master`
--
ALTER TABLE `exam_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `exam_test`
--
ALTER TABLE `exam_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `group_master`
--
ALTER TABLE `group_master`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `institute_master`
--
ALTER TABLE `institute_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `iMenuId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages_master`
--
ALTER TABLE `packages_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `practice_question`
--
ALTER TABLE `practice_question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `practice_test`
--
ALTER TABLE `practice_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `question_master`
--
ALTER TABLE `question_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `question_practice_master`
--
ALTER TABLE `question_practice_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `quiz_test`
--
ALTER TABLE `quiz_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `student_testseries`
--
ALTER TABLE `student_testseries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subject_master`
--
ALTER TABLE `subject_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subject_module_master`
--
ALTER TABLE `subject_module_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testseries`
--
ALTER TABLE `testseries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
