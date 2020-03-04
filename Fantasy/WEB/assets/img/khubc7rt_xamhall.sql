-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2018 at 05:22 AM
-- Server version: 5.6.37-82.2-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `khubc7rt_xamhall`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_master`
--

CREATE TABLE IF NOT EXISTS `activity_log_master` (
  `iActivityLogId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dActivityDateTime` datetime NOT NULL,
  `cIPAddress` varchar(50) NOT NULL,
  `cActivityDesc` text NOT NULL,
  `iUserId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`iActivityLogId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=309 ;

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
(245, '2018-02-16 16:51:51', '122.175.232.140', 'ADMIN LOGIN', 1),
(246, '2018-02-16 16:59:11', '122.175.232.140', 'ADMIN LOGIN', 1),
(247, '2018-02-16 17:01:41', '122.175.232.140', 'ADMIN LOGIN', 1),
(248, '2018-02-16 17:38:24', '47.247.171.116', 'ADMIN LOGIN', 1),
(249, '2018-02-16 12:17:45', '47.247.171.116', 'Add exam master id = 22', 1),
(250, '2018-02-16 12:18:11', '47.247.171.116', 'Add exam master id = 23', 1),
(251, '2018-02-16 18:38:37', '27.97.230.165', 'ADMIN LOGIN', 1),
(252, '2018-02-17 03:31:14', '47.247.174.199', 'Add Student id = 146', 0),
(253, '2018-02-17 03:52:03', '47.247.174.199', 'Add Category id = 6', 0),
(254, '2018-02-17 03:52:32', '47.247.174.199', 'Add SubCategory id = 7', 0),
(255, '2018-02-17 04:21:57', '47.247.174.199', 'Add exam instructions id = 2', 0),
(256, '2018-02-17 04:21:59', '47.247.174.199', 'Add exam instructions id = 3', 0),
(257, '2018-02-17 04:23:15', '47.247.174.199', 'Add exam category id = 19', 0),
(258, '2018-02-17 04:23:31', '47.247.174.199', 'Add exam category id = 20', 0),
(259, '2018-02-17 04:23:49', '47.247.174.199', 'Add exam category id = 21', 0),
(260, '2018-02-17 04:24:18', '47.247.174.199', 'Add exam category id = 22', 0),
(261, '2018-02-17 04:24:37', '47.247.174.199', 'Add exam category id = 23', 0),
(262, '2018-02-17 04:25:43', '47.247.174.199', 'Add exam master id = 13', 0),
(263, '2018-02-17 04:26:49', '47.247.174.199', 'Add exam master id = 24', 0),
(264, '2018-02-17 09:34:55', '47.247.167.117', 'Add exam category id = 24', 0),
(265, '2018-02-17 09:35:29', '47.247.167.117', 'Add exam category id = 25', 0),
(266, '2018-02-17 15:58:38', '47.247.167.117', 'ADMIN LOGIN', 1),
(267, '2018-02-17 11:01:26', '47.247.167.117', 'Add exam master id = 13', 1),
(268, '2018-02-17 17:06:18', '47.247.149.122', 'ADMIN LOGIN', 1),
(269, '2018-02-17 12:02:52', '47.247.167.117', 'Add exam category id = 26', 1),
(270, '2018-02-18 00:21:40', '117.227.73.66', 'ADMIN LOGIN', 1),
(271, '2018-02-18 14:06:14', '47.247.119.134', 'ADMIN LOGIN', 1),
(272, '2018-02-18 08:41:59', '47.247.119.134', 'Add institute id = 6', 1),
(273, '2018-02-18 08:43:24', '47.247.119.134', 'Add institute id = 7', 1),
(274, '2018-02-18 08:49:50', '47.247.119.134', 'Add institute id = 8', 1),
(275, '2018-02-18 09:04:03', '47.247.119.134', 'Add institute id = 9', 1),
(276, '2018-02-18 14:37:13', '47.247.140.86', 'ADMIN LOGIN', 1),
(277, '2018-02-18 09:14:54', '47.247.140.86', 'update institute id = 6', 1),
(278, '2018-02-18 09:16:33', '47.247.140.86', 'Add institute id = 8', 1),
(279, '2018-02-18 10:14:06', '47.247.168.218', 'Add institute id = 9', 1),
(280, '2018-02-18 10:16:10', '47.247.119.134', 'Add institute id = 10', 1),
(281, '2018-02-18 10:16:54', '47.247.119.134', 'Add institute id = 11', 1),
(282, '2018-02-18 10:30:09', '47.247.119.134', 'Add institute id = 12', 1),
(283, '2018-02-18 10:32:26', '47.247.168.218', 'Add exam category id = 27', 1),
(284, '2018-02-18 10:33:18', '47.247.168.218', 'Add exam category id = 28', 1),
(285, '2018-02-18 10:33:48', '47.247.119.134', 'Add institute id = 13', 1),
(286, '2018-02-18 10:43:03', '47.247.119.134', 'Add exam category id = 29', 0),
(287, '2018-02-18 10:43:21', '47.247.119.134', 'Add exam category id = 30', 0),
(288, '2018-02-18 10:43:37', '47.247.119.134', 'Add exam category id = 31', 0),
(289, '2018-02-18 10:43:49', '47.247.119.134', 'Add exam category id = 32', 0),
(290, '2018-02-18 10:45:49', '47.247.119.134', 'Add exam category id = 33', 0),
(291, '2018-02-18 10:46:02', '47.247.119.134', 'Add exam category id = 34', 0),
(292, '2018-02-18 10:46:12', '47.247.119.134', 'Add exam category id = 35', 0),
(293, '2018-02-18 10:47:17', '47.247.119.134', 'Add exam category id = 36', 0),
(294, '2018-02-18 10:47:37', '47.247.168.218', 'Add Student id = 147', 1),
(295, '2018-02-18 10:49:09', '47.247.119.134', 'Add exam master id = 14', 0),
(296, '2018-02-18 10:53:47', '47.247.119.134', 'Add exam master id = 15', 0),
(297, '2018-02-18 10:54:19', '47.247.119.134', 'Add exam master id = 16', 0),
(298, '2018-02-18 16:46:34', '47.247.119.134', 'ADMIN LOGIN', 1),
(299, '2018-02-18 11:18:22', '47.247.119.134', 'Add institute id = 14', 1),
(300, '2018-02-18 11:37:11', '47.247.119.134', 'Add exam instructions id = 4', 0),
(301, '2018-02-18 11:38:08', '47.247.119.134', 'Add exam master id = 25', 0),
(302, '2018-02-18 11:39:59', '47.247.119.134', 'Add question id = 31', 0),
(303, '2018-02-19 10:55:45', '47.247.100.17', 'ADMIN LOGIN', 1),
(304, '2018-02-19 13:16:48', '47.247.100.17', 'ADMIN LOGIN', 1),
(305, '2018-02-19 13:24:51', '47.247.199.187', 'ADMIN LOGIN', 1),
(306, '2018-02-21 12:47:57', '122.170.192.90', 'ADMIN LOGIN', 1),
(307, '2018-02-21 13:39:24', '47.247.213.44', 'ADMIN LOGIN', 1),
(308, '2018-02-21 13:51:36', '47.247.213.44', 'ADMIN LOGIN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE IF NOT EXISTS `adminuser` (
  `iUserId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cFullName` varchar(200) NOT NULL,
  `cAddress` text NOT NULL,
  `iMobileNo` bigint(20) unsigned NOT NULL,
  `cEmailAddress` varchar(100) NOT NULL,
  `cUserProfilePicName` varchar(200) DEFAULT NULL,
  `cDesignation` varchar(80) DEFAULT NULL,
  `cLoginName` varchar(80) NOT NULL,
  `cLoginPassword` blob NOT NULL,
  `bRole` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '0=superadmin, 1=company admin, 2=other users',
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bDelete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`iUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='test' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`iUserId`, `cFullName`, `cAddress`, `iMobileNo`, `cEmailAddress`, `cUserProfilePicName`, `cDesignation`, `cLoginName`, `cLoginPassword`, `bRole`, `bActive`, `bDelete`) VALUES
(1, 'admin', 'admin address', 9999999999, 'admin@admin.com', NULL, 'administrator', 'admin', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `adminuser_rights`
--

CREATE TABLE IF NOT EXISTS `adminuser_rights` (
  `iAccessId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iUserId` int(11) unsigned NOT NULL,
  `iParentMenuId` int(11) unsigned NOT NULL,
  `iMenuId` int(11) unsigned NOT NULL,
  `bView` tinyint(1) unsigned DEFAULT NULL,
  `bAdd` tinyint(1) unsigned NOT NULL,
  `bEdit` tinyint(1) unsigned NOT NULL,
  `bDelete` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`iAccessId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE IF NOT EXISTS `category_master` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `iGroupid` int(10) unsigned NOT NULL,
  `cCategoryName` varchar(45) NOT NULL,
  `cCategoryIcon` varchar(150) NOT NULL DEFAULT '',
  `bDelete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `city_master` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `iStateid` int(10) unsigned NOT NULL,
  `cCityName` varchar(45) NOT NULL,
  `bDelete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE IF NOT EXISTS `customer_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cFullName` varchar(100) NOT NULL,
  `iMobileNo` bigint(20) unsigned DEFAULT NULL,
  `cUserEmail` varchar(100) DEFAULT NULL,
  `cUserPassword` blob NOT NULL,
  `bEmailVerified` tinyint(1) NOT NULL DEFAULT '0',
  `bMobileVerified` tinyint(1) NOT NULL DEFAULT '0',
  `bDelete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dCreateDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `exam_allotment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ExamCategoryId` int(10) unsigned NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `ExamMasterId` int(10) unsigned NOT NULL,
  `StudentId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `exam_allotment`
--

INSERT INTO `exam_allotment` (`id`, `ExamCategoryId`, `InstituteId`, `ExamMasterId`, `StudentId`) VALUES
(1, 2, 1, 2, 141);

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE IF NOT EXISTS `exam_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ExamCategoryTitle` varchar(100) NOT NULL,
  `ActiveDeactive` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `CreatedById` int(10) unsigned NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
(16, 'test', 1, 0, 1, '2018-02-13 15:13:18'),
(17, 'demo', 1, 0, 3, '2018-02-13 16:56:58'),
(18, 'test', 1, 0, 1, '2018-02-14 13:01:33'),
(19, 'gate ', 1, 0, 3, '2018-02-17 04:23:15'),
(20, 'bank po', 1, 0, 3, '2018-02-17 04:23:31'),
(21, 'aptitude ', 1, 0, 3, '2018-02-17 04:23:49'),
(22, 'ssc', 1, 0, 3, '2018-02-17 04:24:18'),
(23, 'isro', 1, 0, 3, '2018-02-17 04:24:37'),
(24, 'bank po', 1, 0, 3, '2018-02-17 09:34:55'),
(25, 'Railways ', 1, 0, 3, '2018-02-17 09:35:29'),
(26, 'bank', 1, 0, 3, '2018-02-17 12:02:52'),
(27, 'BANK', 0, 0, 6, '2018-02-18 10:32:26'),
(28, 'GATE', 0, 0, 6, '2018-02-18 10:33:18'),
(33, 'jee', 1, 0, 10, '2018-02-18 10:45:49'),
(34, 'engineering', 1, 0, 10, '2018-02-18 10:46:02'),
(35, 'mba', 1, 0, 10, '2018-02-18 10:46:12'),
(36, 'bank', 1, 0, 10, '2018-02-18 10:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `exam_instructions`
--

CREATE TABLE IF NOT EXISTS `exam_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(500) NOT NULL,
  `Instructions` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `InstituteId` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `exam_instructions`
--

INSERT INTO `exam_instructions` (`id`, `Title`, `Instructions`, `CreatedBy`, `InstituteId`, `CreatedDate`, `ModifiedDate`) VALUES
(1, 'BPO,CLERICAL', '', 1, 0, '2018-01-24 14:38:22', '2018-01-24 14:38:22'),
(2, 'GATE  INTERACTIONS ', 'Hello student ', 0, 3, '2018-02-17 04:21:57', '2018-02-17 04:21:57'),
(3, 'GATE  INTERACTIONS ', 'Hello student ', 0, 3, '2018-02-17 04:21:59', '2018-02-17 04:21:59'),
(4, 'jee', 'hello chotu', 0, 10, '2018-02-18 11:37:11', '2018-02-18 11:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE IF NOT EXISTS `exam_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ExamIcon` varchar(100) NOT NULL,
  `ExamTitle` varchar(100) NOT NULL,
  `ExamShortdesc` varchar(200) NOT NULL,
  `ExamCategoryId` int(10) unsigned NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `ActiveDeactive` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `CreatedById` int(10) unsigned NOT NULL,
  `CreatedDatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`id`, `ExamIcon`, `ExamTitle`, `ExamShortdesc`, `ExamCategoryId`, `InstituteId`, `ActiveDeactive`, `CreatedById`, `CreatedDatetime`) VALUES
(1, 'fa fa-bank', 'Bank PO', 'IBPS PO, SBI PO, IPPB Officer, RRB Officer', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(2, 'fa fa-bank', 'Bank PO', 'IBPS PO, SBI PO, IPPB Officer, RRB Officer', 1, 1, 1, 1, '2018-01-12 14:14:27'),
(3, 'fa fa-bank', 'Bank SO', 'IBPS SO, SBI SO', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(4, 'fa fa-bank', 'Bank Clerk', 'IBPS Clerk, SBI Clerk, RRB Assistant', 1, 0, 0, 1, '2018-01-12 14:14:27'),
(5, 'fa fa-bank', 'SSC', 'SSC MTS, SSC CGL, SSC CHSL &amp; Stenographer', 2, 0, 1, 1, '2018-01-12 14:14:27'),
(6, 'fa fa-bank', 'Delhi Police', 'Delhi Police Constable', 2, 0, 0, 1, '2018-01-12 14:14:27'),
(7, 'fa fa-bank', 'Railways', 'Railway RRB NTPC', 2, 0, 1, 1, '2018-01-12 14:14:27'),
(8, 'fa fa-bank', 'Insurance', 'LIC AAO, NICL AO, UIICL', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(9, 'fa fa-bank', 'Delhi Police', 'Delhi Police Constable', 1, 0, 0, 1, '2018-01-12 14:14:27'),
(10, 'fa fa-bank', 'RBI', 'RBI Grade B officer, RBI Assistant', 1, 0, 1, 1, '2018-01-12 14:14:27'),
(11, 'fa fa-home', 'test1', 'hello', 16, 1, 1, 0, '2018-02-13 15:14:02'),
(12, 'fa fa-home', 'hello', 'gh', 17, 3, 1, 0, '2018-02-13 16:57:24'),
(13, '', 'gate ce', 'civil engineering exam of gate2019', 19, 3, 1, 0, '2018-02-17 04:25:43'),
(14, 'jee', 'jee mains', 'engineering entrance', 33, 10, 1, 0, '2018-02-18 10:49:09'),
(15, '', 'jee advance', 'for brillants', 33, 10, 1, 0, '2018-02-18 10:53:47'),
(16, '', 'NTSE', 'for chota bacha''s', 33, 10, 1, 0, '2018-02-18 10:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `exam_test`
--

CREATE TABLE IF NOT EXISTS `exam_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ExamCategoryId` int(10) unsigned NOT NULL,
  `ExamMasterId` int(10) unsigned NOT NULL,
  `ExamTestTitle` varchar(200) NOT NULL,
  `ExamTestDesc` varchar(200) DEFAULT NULL,
  `ExamTestDurartion` time NOT NULL DEFAULT '00:00:00',
  `ExamTestInstructionId` int(10) unsigned DEFAULT NULL,
  `ExamTestDiscount` int(11) NOT NULL DEFAULT '0',
  `InstituteId` int(10) unsigned NOT NULL,
  `ActiveDeactive` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `CreatedById` int(10) unsigned NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
(22, 17, 12, 'bank', '', '02:05:00', 0, 0, 3, 1, 0, '2018-02-16 12:17:45'),
(23, 17, 12, 'bank', '', '02:05:00', 0, 0, 3, 1, 0, '2018-02-16 12:18:11'),
(24, 19, 13, 'gate civil ', '', '09:30:00', 3, 0, 3, 1, 0, '2018-02-17 04:26:49'),
(25, 33, 14, 'organic chemistry ', 'jai mata di', '02:00:00', 4, 0, 10, 1, 0, '2018-02-18 11:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `group_master`
--

CREATE TABLE IF NOT EXISTS `group_master` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cGroupName` varchar(45) NOT NULL,
  `cGroupIcon` varchar(150) NOT NULL DEFAULT '',
  `bDelete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group_master`
--

INSERT INTO `group_master` (`id`, `cGroupName`, `cGroupIcon`, `bDelete`, `bActive`) VALUES
(1, 'Main Group', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `institute_master`
--

CREATE TABLE IF NOT EXISTS `institute_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `InstituteLogo` varchar(200) DEFAULT NULL,
  `InstituteUniqueId` varchar(50) NOT NULL,
  `InstituteFullName` varchar(100) NOT NULL,
  `InstituteSponsorId` varchar(50) DEFAULT NULL,
  `InstituteWebsiteUrl` varchar(200) NOT NULL,
  `PackageId` int(10) unsigned NOT NULL,
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
  `InstituteStudentCount` int(10) unsigned NOT NULL DEFAULT '0',
  `InstituteNeedDemo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `institute_master`
--

INSERT INTO `institute_master` (`id`, `InstituteLogo`, `InstituteUniqueId`, `InstituteFullName`, `InstituteSponsorId`, `InstituteWebsiteUrl`, `PackageId`, `InstituteMobileNo`, `InstituteEmail`, `InstitutePassword`, `InstituteJobTitle`, `InstituteJobDesg`, `InstituteAddress`, `InstituteCity`, `InstituteState`, `InstituteCountry`, `InstitutePersonName`, `InstituteStudentCount`, `InstituteNeedDemo`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 'logo6.png', '', 'Launch Academy', 'ES123', 'escomfort', 3, '9999999999', 'escomfort@escomfort.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'Marketing', 'HR', '', 'Indore', 'Madhya Pradesh', 'India', 'E&S Comforts', 500, 1, 0, '2018-02-01 07:10:09'),
(2, 'logo.png', '', 'FFFF', '4555', 'ffff', 3, '123456', 'admin@admin.com', 0xdcf85b8abf569ea3c915f0dfc5bb23c49cbe594ca893c8e812f9db20d60aa2b447b97f38434247de928def772e4ca609, '23255', '5556', '', '5545', '4545', '455', 'uuu', 4545, 1, 0, '2018-02-13 16:02:48'),
(3, 'logo5.jpg', '', 'Gate Academy', '4555', 'Gate%20Academy', 4, '123456', 'gate@admin.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, '23255', '5556', '', '5545', '4545', '455', '123456', 4545, 0, 0, '2018-02-13 16:03:59'),
(4, 'logo2.png', '', 'test', 'dsd', 'test', 3, '123456', '1admin@admin.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, '23255', '5556', '', '5545', 'dasd', 'sd', 'uuu', 0, 1, 0, '2018-02-15 11:51:53'),
(5, 'logo5.png', '', 'A S Academy', 'abc', 'asacademy', 4, '9898989898', 'as@as.com', 0x9161c1234b527d9c21b5cce70fcf8adba46f20da43bdb538c3dccffb21f8ba9743cc5ccb8762582eef2b250f800240f1, 'HR', 'HR Manager', '', '2', '1', 'India', 'Kartik', 5, 1, 0, '2018-02-16 07:59:55'),
(6, 'logo6.jpg', '', 'kautilya academy ', '', 'kautilyaacademy', 3, '8109279493', 'ans.ips12@gmail.com', 0x9161c1234b527d9c21b5cce70fcf8adba46f20da43bdb538c3dccffb21f8ba9743cc5ccb8762582eef2b250f800240f1, 'manager', 'general manager ', '', '2', '1', 'india', 'anshul tiwari', 500, 1, 0, '2018-02-18 08:41:59'),
(7, 'logo7.jpg', '', 'kautilya academy ', '', 'kautilyaacademy', 3, '8109279493', 'ans.ips12@gmail.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'manager', 'general manager ', '', 'indore', 'm.p', 'india', 'anshul tiwari', 500, 1, 0, '2018-02-18 08:43:24'),
(8, 'logo8.png', '', 'K D Campus', '', 'kdcampus', 3, '8109279493', 'ans.iit19@ gmail.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'manager', 'general manager ', '', 'indore', 'madhya pradesh', 'india', 'anshul tiwari', 500, 1, 0, '2018-02-18 08:49:50'),
(9, 'logo9.jpg', '', 'target', '', 'target', 4, '8417915506', 'ans.tiw12@gmail.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'manager', 'general manager ', '', 'indore', 'madhya pradesh', 'india', 'shashank dixit', 500, 1, 0, '2018-02-18 09:04:03'),
(10, 'logo10.jpg', '', 'lakshya', '', 'lakshya', 5, '9452738884', 'abc.as12@gmail.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'manager', 'general manager ', '', 'indore', 'madhya pradesh', 'india', 'sachin', 462, 1, 0, '2018-02-18 10:16:10'),
(11, 'logo11.jpg', '', 'lakshya', '', 'lakshya', 5, '9452738884', 'abc.as12@gmail.com', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'manager', 'general manager ', '', 'indore', 'madhya pradesh', 'india', 'sachin', 462, 1, 0, '2018-02-18 10:16:54'),
(12, 'logo12.jpg', '', 'ias academy', '', 'iasacademy', 4, '995522001', 'abs', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'manager', 'general manager ', '', 'indore', 'madhya pradesh', 'india', 'anokhe lal', 9878, 1, 0, '2018-02-18 10:30:09'),
(13, '', '', 'sharma institue', '', 'sharma classes', 4, '9452738884', 'kkk.kkk', 0xe0a070989a53062d31a35b75eab2a4433ed462e22f26a52bbd3b6cbb6d01278f191add620ff07d42ae29a3b42df795d1, 'manager', 'general manager ', '', 'indore', 'madhya pradesh', 'india', 'kishori lal', 852, 1, 0, '2018-02-18 10:33:48'),
(14, '', '', 'kk classes', '', 'kkclasses', 4, 'kloik', 'ans.ips12@gmail.com', 0x73c50447ae9907cdf14da0fa563f1c64a5d7d39b68fd82cc1e78fc5c6cf0ae64ce199a013314e4208e76de8504068810, 'manager', 'general manager ', '', 'indore', 'madhya pradesh', 'india', 'hello ', 52, 1, 0, '2018-02-18 11:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE IF NOT EXISTS `menu_master` (
  `iMenuId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iParentMenuId` int(11) unsigned NOT NULL,
  `iCategoryId` int(11) unsigned NOT NULL,
  `cMenuName` varchar(200) NOT NULL,
  `cMenuUrl` text NOT NULL,
  `cMenuIcon` varchar(80) DEFAULT NULL,
  `iMenuidInURL` int(11) unsigned NOT NULL DEFAULT '0',
  `iDisplaySequence` int(11) unsigned NOT NULL,
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`iMenuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages_master`
--

CREATE TABLE IF NOT EXISTS `packages_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PackageName` varchar(50) NOT NULL,
  `NumberOfStudents` int(10) unsigned NOT NULL DEFAULT '0',
  `PackageDuration` int(10) unsigned NOT NULL DEFAULT '0',
  `PackagePrice` int(10) unsigned NOT NULL DEFAULT '0',
  `NumberOfExams` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreattedById` int(11) NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `packages_master`
--

INSERT INTO `packages_master` (`id`, `PackageName`, `NumberOfStudents`, `PackageDuration`, `PackagePrice`, `NumberOfExams`, `ActiveDeactive`, `CreattedById`, `CreatedDateTime`) VALUES
(3, 'Monthly Package', 30, 30, 3000, 5, 0, 0, '2018-01-22 07:27:18'),
(4, 'Quaterly Package', 90, 90, 9000, 9, 0, 0, '2018-01-22 07:31:13'),
(5, 'Half yearly Package', 180, 180, 1800, 18, 0, 0, '2018-01-22 07:31:57'),
(6, 'Yearly Packages', 300, 365, 30000, 30, 0, 0, '2018-01-22 07:32:36'),
(7, 'demmo', 400, 12, 12300, 34, 0, 0, '2018-02-13 16:01:38'),
(9, 'special offer price', 1, 30, 59, 1000, 0, 0, '2018-02-18 10:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `practice_question`
--

CREATE TABLE IF NOT EXISTS `practice_question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ExamCategoryId` int(10) unsigned NOT NULL,
  `ExamMasterId` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `subjectmodule_id` int(10) NOT NULL,
  `question_text` text NOT NULL,
  `question_option` varchar(255) NOT NULL,
  `correct_answer` text NOT NULL,
  `answer_description` text NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `ActiveDeactive` tinyint(10) NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `practice_question`
--

INSERT INTO `practice_question` (`id`, `ExamCategoryId`, `ExamMasterId`, `subject_id`, `subjectmodule_id`, `question_text`, `question_option`, `correct_answer`, `answer_description`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(37, 1, 1, 1, 1, '<p><strong>In the question below, a part of the sentence is highlighted. Below are given alternatives to the&nbsp;highlighted part which may improve the sentence. Choose the correct alternative. In case no improvement is needed, choose &#39;No improvement.&#39;</strong></p>\r\n\r\n<p>The Indian consumer is the current king of banking - an industry least likely to favour individuals when borrowing isn&#39;t cheap and savings rates trail headline inflation. But competition&nbsp;<strong>will make</strong>&nbsp;new banks generous with deposit rates, although the longevity of these offerings is in doubt.</p>', 'a:5:{i:0;s:15:"Would have made";i:1;s:9:"Have made";i:2;s:8:"Has made";i:3;s:17:"have been  made  ";i:4;s:14:"No improvement";}', '4', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:22:50'),
(38, 1, 1, 1, 1, '<p><strong>In the question below, a part of the sentence is highlighted. Below are given alternatives to the&nbsp;highlighted part which may improve the sentence. Choose the correct alternative. In case no improvement is needed, choose &#39;No improvement.&#39;</strong></p>\r\n\r\n<p>The Indian consumer is the current king of banking - an industry least likely to favour individuals when borrowing isn&#39;t cheap and savings rates trail headline inflation. But competition&nbsp;<strong>will make</strong>&nbsp;new banks generous with deposit rates, although the longevity of these offerings is in doubt.</p>', 'a:5:{i:0;s:15:"Would have made";i:1;s:9:"Have made";i:2;s:8:"Has made";i:3;s:17:"have been  made  ";i:4;s:14:"No improvement";}', '4', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:23:59'),
(39, 1, 1, 1, 1, '<p><strong>Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore errors of punctuation, if any.&nbsp;</strong></p>\r\n\r\n<p>Mt. Everest is the tallest (1)&nbsp;of all the other peaks (2)&nbsp;in the world and climbing (3)&nbsp;it needs daring. (4)&nbsp;No error (5)</p>', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}', '5', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:26:27'),
(40, 1, 1, 1, 1, '<p><strong>Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore errors of punctuation, if any.&nbsp;</strong></p>\r\n\r\n<p>Shreya has taken (1)&nbsp;part in sports (2)&nbsp;actively till she was in (3)&nbsp;the second grade. (4)&nbsp;No error (5)</p>\r\n\r\n<p>&nbsp;</p>', 'a:5:{i:0;s:1:"2";i:1;s:1:"3";i:2;s:1:"5";i:3;s:1:"6";i:4;s:1:"7";}', '5', '<p>Competition = Singular =&gt; 1) and 3) are ruled out. 2) is grammatically incorrect. Option 4)&nbsp;<em>has made&nbsp;</em>is the most appropriate choice.Competition&nbsp;<strong>has made&nbsp;</strong>new banks generous......</p>', 0, 1, '2018-02-07 11:27:58'),
(47, 1, 2, 1, 1, '<p>adsASE</p>\r\n', 'a:5:{i:0;s:3:"dss";i:1;s:1:"d";i:2;s:1:"d";i:3;s:1:"d";i:4;s:1:"d";}', '3', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, 1, '2018-02-07 12:20:39'),
(48, 1, 1, 1, 1, '<p>op;l;lk;</p>\r\n', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"2";i:3;s:1:"2";i:4;s:1:"2";}', '5', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>p=[</p>\r\n\r\n<p>p[</p>\r\n', 0, 1, '2018-02-07 15:26:21'),
(49, 1, 2, 2, 3, '                                ', 'a:5:{i:0;s:3:"fff";i:1;s:4:"ffff";i:2;s:3:"fff";i:3;s:2:"ff";i:4;s:8:"fdsffdsf";}', '5', '', 0, 1, '2018-02-07 15:27:28'),
(50, 1, 2, 1, 1, '                                ', 'a:5:{i:0;s:1:"5";i:1;s:1:"5";i:2;s:1:"5";i:3;s:2:"55";i:4;s:1:"5";}', '4', '', 0, 1, '2018-02-07 15:29:04'),
(51, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:1:"l";i:1;s:1:"l";i:2;s:1:"l";i:3;s:2:"ll";i:4;s:1:"l";}', '1', '', 0, 1, '2018-02-07 15:31:39'),
(52, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"4";i:3;s:1:"4";i:4;s:1:"4";}', '', '', 0, 1, '2018-02-07 15:34:21'),
(53, 1, 1, 2, 3, '                                ', 'a:5:{i:0;s:6:"asdasd";i:1;s:5:"sdsad";i:2;s:6:"ssdsad";i:3;s:6:"asdasd";i:4;s:6:"asdsad";}', '3', '', 0, 1, '2018-02-07 15:35:42'),
(54, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:"yt";i:1;s:2:"ty";i:2;s:3:"rty";i:3;s:3:"5ty";i:4;s:3:"rty";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:18:51'),
(55, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:"yt";i:1;s:2:"ty";i:2;s:3:"rty";i:3;s:3:"5ty";i:4;s:3:"rty";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:18:58'),
(56, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:"yt";i:1;s:2:"ty";i:2;s:3:"rty";i:3;s:3:"5ty";i:4;s:3:"rty";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:19:00'),
(57, 1, 1, 1, 1, '<p>rtytry</p>\r\n', 'a:5:{i:0;s:2:"yt";i:1;s:2:"ty";i:2;s:3:"rty";i:3;s:3:"5ty";i:4;s:3:"rty";}', '3', '<p>yrty</p>\r\n', 0, 1, '2018-02-07 16:19:05'),
(58, 1, 1, 1, 1, '<p>jiojujij</p>\r\n', 'a:5:{i:0;s:2:"ui";i:1;s:3:"uii";i:2;s:2:"ui";i:3;s:3:"uii";i:4;s:2:"ui";}', '3', '<p>uioio</p>\r\n', 0, 1, '2018-02-07 16:19:52'),
(59, 1, 1, 1, 1, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:2:"12";i:1;s:1:"1";i:2;s:1:"1";i:3;s:1:"1";i:4;s:1:"1";}', '3', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, 1, '2018-02-07 16:21:36'),
(60, 1, 3, 3, 5, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span>ghjhgjghjhgjgh</p>\r\n', 'a:5:{i:0;s:1:"1";i:1;s:1:"1";i:2;s:1:"1";i:3;s:1:"1";i:4;s:1:"1";}', '3', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, 1, '2018-02-07 16:31:42'),
(61, 1, 1, 2, 3, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:"1";i:1;s:1:"1";i:2;s:1:"1";i:3;s:1:"1";i:4;s:1:"1";}', '3', '<p>111</p>\r\n', 0, 1, '2018-02-07 17:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `practice_test`
--

CREATE TABLE IF NOT EXISTS `practice_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `InstituteId` int(11) NOT NULL,
  `ExamCategoryId` int(10) unsigned NOT NULL,
  `ExamMasterId` int(10) unsigned NOT NULL,
  `PracticeTestTitle` varchar(200) NOT NULL,
  `PracticeTestDesc` varchar(200) DEFAULT NULL,
  `PracticeTestDuration` varchar(100) NOT NULL COMMENT 'empty when no duration in practice test',
  `Tags` varchar(255) NOT NULL,
  `ActiveDeactive` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `CreatedById` int(10) unsigned NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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

CREATE TABLE IF NOT EXISTS `question_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ExamCategoryId` int(10) unsigned NOT NULL DEFAULT '0',
  `ExamMasterId` int(10) unsigned NOT NULL DEFAULT '0',
  `ExamTestId` int(10) unsigned NOT NULL DEFAULT '0',
  `QuestionText` text NOT NULL,
  `QuestionAnswerOptions` text NOT NULL,
  `QuestionCorrectAnswerId` int(11) NOT NULL,
  `QuestionSolution` text NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `question_master`
--

INSERT INTO `question_master` (`id`, `ExamCategoryId`, `ExamMasterId`, `ExamTestId`, `QuestionText`, `QuestionAnswerOptions`, `QuestionCorrectAnswerId`, `QuestionSolution`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(22, 1, 1, 12, '<p>dsfsdfgdfgdf</p>\r\n', 'a:5:{i:0;s:5:"14111";i:1;s:4:"2122";i:2;s:2:"22";i:3;s:2:"22";i:4;s:2:"55";}', 4, '', 0, 0, '2018-02-07 17:59:35'),
(25, 1, 1, 12, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}', 5, '', 0, 0, '2018-02-08 10:09:16'),
(26, 1, 1, 12, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:"1";i:1;s:2:"12";i:2;s:2:"12";i:3;s:2:"12";i:4;s:1:"1";}', 3, '', 0, 0, '2018-02-08 10:22:15'),
(27, 1, 1, 13, '<p>hello&nbsp; this&nbsp; is&nbsp; &nbsp;my&nbsp; first&nbsp; test&nbsp; &nbsp;</p>\r\n', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}', 3, '', 0, 0, '2018-02-08 18:11:12'),
(28, 16, 11, 18, '<p>hjjjkkjkljkk</p>\r\n', 'a:5:{i:0;s:1:"l";i:1;s:1:"l";i:2;s:1:"l";i:3;s:1:"l";i:4;s:1:"l";}', 5, '', 1, 0, '2018-02-13 15:24:18'),
(29, 16, 11, 18, '<p>sdfsdfs</p>\r\n', 'a:5:{i:0;s:2:"10";i:1;s:2:"52";i:2;s:2:"55";i:3;s:3:"585";i:4;s:2:"55";}', 6, '', 1, 0, '2018-02-13 15:25:06'),
(30, 17, 12, 19, '<p>dzdzff</p>\r\n', 'a:5:{i:0;s:7:"ffffdff";i:1;s:5:"fdfdf";i:2;s:4:"dfdf";i:3;s:3:"dfd";i:4;s:3:"dff";}', 3, '<p>dfffff</p>\r\n', 3, 0, '2018-02-13 16:58:51'),
(31, 33, 14, 25, '<p>what is formula of water</p>\r\n', 'a:5:{i:0;s:3:"co2";i:1;s:3:"h2o";i:2;s:3:"f20";i:3;s:3:"n2o";i:4;s:0:"";}', 2, '', 10, 1, '2018-02-18 11:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `question_practice_master`
--

CREATE TABLE IF NOT EXISTS `question_practice_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `QuestionCategoryId` int(11) NOT NULL,
  `QuestionSubcategoryId` int(11) NOT NULL,
  `QuestionText` varchar(255) NOT NULL,
  `QuestionAnswerOptions` text NOT NULL,
  `QuestionCorrectAnswerId` int(11) NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `AnswerDescription` text NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `question_practice_master`
--

INSERT INTO `question_practice_master` (`id`, `QuestionCategoryId`, `QuestionSubcategoryId`, `QuestionText`, `QuestionAnswerOptions`, `QuestionCorrectAnswerId`, `InstituteId`, `AnswerDescription`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 1, 1, 'Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore error of punctuation if any : "Mount Everest is ', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}', 2, 0, '', 0, '2018-01-31 09:56:26'),
(2, 1, 1, 'Read the sentence to find out whether there is any error in it. The error, if any, will be in one part of the sentence. The number of that part is the answer. If there is no error, the answer is (5). Ignore error of punctuation if any : "Mount Everest is ', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}', 2, 0, 'When comparision is done in the superlative degree, the latter term should include the former, i.e the one claiming to be superlative,\r\ne.g. \r\nThe Burj-al-Arab is the tallest of all hotels in the world. (not -'' of all the other hotels'')\r\n\r\nThus the error is in the second part of the sentence', 0, '2018-01-31 10:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE IF NOT EXISTS `quiz_question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ExamCategoryId` int(10) unsigned NOT NULL,
  `ExamMasterId` int(10) unsigned NOT NULL,
  `QuizTesId` int(10) unsigned NOT NULL,
  `ActiveDeactive` tinyint(10) NOT NULL,
  `question_text` text NOT NULL,
  `question_option` varchar(255) NOT NULL,
  `correct_answer` text NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  `answer_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`id`, `ExamCategoryId`, `ExamMasterId`, `QuizTesId`, `ActiveDeactive`, `question_text`, `question_option`, `correct_answer`, `InstituteId`, `CreatedDateTime`, `answer_description`) VALUES
(1, 1, 1, 1, 1, '', 'a:5:{i:0;s:2:"55";i:1;s:2:"55";i:2;s:2:"55";i:3;s:2:"55";i:4;s:3:"555";}', '', 0, '2018-02-06 17:38:37', ''),
(2, 1, 1, 2, 1, '                                ', 'a:5:{i:0;s:1:"1";i:1;s:1:"1";i:2;s:2:"12";i:3;s:2:"12";i:4;s:2:"12";}', '', 0, '2018-02-06 17:58:32', ''),
(3, 1, 1, 2, 1, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:1:"1";i:1;s:1:"1";i:2;s:2:"12";i:3;s:2:"12";i:4;s:2:"12";}', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, '2018-02-06 17:59:02', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n'),
(4, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:2:"44";i:1;s:2:"44";i:2;s:3:"444";i:3;s:4:"4444";i:4;s:5:"44444";}', '', 0, '2018-02-06 18:03:14', ''),
(5, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:2:"45";i:1;s:2:"46";i:2;s:2:"47";i:3;s:2:"48";i:4;s:2:"49";}', '', 0, '2018-02-06 18:04:53', ''),
(6, 1, 1, 1, 1, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'a:5:{i:0;s:2:"45";i:1;s:2:"46";i:2;s:2:"47";i:3;s:2:"48";i:4;s:2:"49";}', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 0, '2018-02-06 18:05:36', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n'),
(7, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:3:"565";i:1;s:2:"55";i:2;s:2:"55";i:3;s:3:"555";i:4;s:3:"555";}', '', 0, '2018-02-06 18:09:06', ''),
(8, 1, 1, 1, 1, '                                ', 'a:5:{i:0;s:1:"7";i:1;s:1:"7";i:2;s:1:"7";i:3;s:1:"7";i:4;s:1:"7";}', '', 0, '2018-02-06 18:11:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_test`
--

CREATE TABLE IF NOT EXISTS `quiz_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ExamCategoryId` int(10) unsigned NOT NULL,
  `ExamMasterId` int(10) unsigned NOT NULL,
  `PracticeTestTitle` varchar(255) NOT NULL,
  `PracticeTestDesc` text NOT NULL,
  `PracticeTestDuration` time NOT NULL,
  `ActiveDeactive` tinyint(10) NOT NULL,
  `InstituteId` int(11) NOT NULL,
  `Tags` text NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(12, 1, 1, 'Direction and Distance Quiz', 'test', '09:30:00', 1, 0, 'test', '2018-02-07 12:09:05'),
(13, 2, 5, 'SSC TEST PAPER', '', '02:00:00', 1, 0, '', '2018-02-17 11:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cStateName` varchar(45) NOT NULL,
  `bDelete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `student_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `InstituteId` int(10) unsigned NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL DEFAULT '0',
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`id`, `StudentImage`, `StudentFullName`, `StudentMotherName`, `StudentFatherName`, `StudentDOB`, `StudentAddress`, `StudentMobileNo`, `StudentEmail`, `StudentPassword`, `StudentCity`, `StudentState`, `StudentCountry`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(141, 'default.jpg', 'ddd', 'dd', 'dddd', '0000-00-00', 'fff', '9753765867', 'anshul.barve11@gmail.com', 0xaf21739a314a53b9fff69e737c55fc613a58df2a428a2543fae2b17b13bec9e1c8adcc94bae09f827a2333889c4ea38d, 'fddf', 'indore', NULL, 1, 0, '2018-02-13 14:25:15'),
(142, 'default.jpg', 'fdf', 'fdfdf', 'dfdf', '0000-00-00', 'fff', '7748941353', 'barve11@gmail.com', 0x4a3846514e475847, 'assdfs', 'ff', NULL, 1, 0, '2018-02-13 14:25:15'),
(143, '', 'fghfh', 'barve', 'fghfg', '0000-00-00', 'ddddd', '97537658678', 'anshul.b@gmail.cpm', 0x84a61c6eccbe544104b18cc386be5a70f7d8ab37f80d251a15972d7c9abfb4c78730a8acaa5dcb7fbd477b405f4400e3, '1', '1', NULL, 3, 0, '2018-02-13 17:07:01'),
(144, '', '', '', '', '0000-00-00', 'sdfsadasd', '', '', 0x6a4037cfcaa7ac59d2619bdbc032924a89387f460d15b0312c8669a36ba65efffcfd597dcac8b5b576b2aec002641c16, '1', '1', NULL, 1, 0, '2018-02-14 17:56:30'),
(145, '', 'Aayushri', 'Nisha', 'Krishan', '0000-00-00', 'Kharakua', '9993479764', 'aayu@aayu.com', 0xa2c67b876f033c63d4d389d4ed28ad5b08ff409e5c558125d22670c355d18464ed785077dfc3e21e5f194e2956de6022, '3', '1', NULL, 1, 0, '2018-02-16 06:46:48'),
(146, 'Student146.jpg', 'shashank nagapure', 'geeta nagpure', 'deepaak nagpure', '0000-00-00', 'nyan nagar indore', '8463217895', 'shashank@gmail.com', 0x83ccfdc31dac8d146651ec5f4df6e1b96fcbd25817976814b320acb7c56cfc0ba856ff209428b529da864cc4085b20bf, '2', '1', NULL, 3, 0, '2018-02-17 03:31:13'),
(147, 'Student147.png', 'RAJA NAGPURE', 'simmi', 'deepak', '0000-00-00', 'bahtera choky', '8526453571', 'raja@gmail.com', 0x1d268aebd342f69d51333ee6e03a7ef70143516a9bcd39c6f4d6188d47cc8db374b95f4021bcbcc1fe5ee1c471df85c0, '2', '1', NULL, 6, 0, '2018-02-18 10:47:36'),
(148, 'default.jpg', 'mayank', 'saroj', 'ashok', '0000-00-00', 'bhatea', '8554651652', 'mayank@gmail.com', 0x0ad48420b8618a4525f5bc71ec5586c9742a5c75321c32870ceb0c2d0c223d9b7c86edb24a8d7987018b52f076a72499, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(149, 'default.jpg', 'anshul', 'reena', 'deepak', '0000-00-00', 'bhatea', '8856565623', 'ahnshul@gamil.com', 0x4151323634335144, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(150, 'default.jpg', 'sachin', 'saroj', 'ashok', '0000-00-00', 'bhatea', '9158479594', 'mayank@gmail.com', 0x50514d3836465741, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(151, 'default.jpg', 'mayank12', 'reena', 'deepak', '0000-00-00', 'bhatea', '9460393565', 'ahnshul@gamil.com', 0x5a4439434c434347, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(152, 'default.jpg', 'anshul12', 'saroj', 'ashok', '0000-00-00', 'bhatea', '9762307536', 'mayank@gmail.com', 0x345a53464e4d4b58, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(153, 'default.jpg', 'sachin12', 'reena', 'deepak', '0000-00-00', 'bhatea', '10064221507', 'ahnshul@gamil.com', 0x424d344650545544, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(154, 'default.jpg', 'mayank13', 'saroj', 'ashok', '0000-00-00', 'bhatea', '10366135478', 'mayank@gmail.com', 0x4a464d5156483156, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(155, 'default.jpg', 'anshul13', 'reena', 'deepak', '0000-00-00', 'bhatea', '10668049449', 'ahnshul@gamil.com', 0x563938474c4c5950, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(156, 'default.jpg', 'sachin13', 'saroj', 'ashok', '0000-00-00', 'bhatea', '10969963420', 'mayank@gmail.com', 0x4b51353743513550, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(157, 'default.jpg', 'mayank14', 'reena', 'deepak', '0000-00-00', 'bhatea', '11271877391', 'ahnshul@gamil.com', 0x423834313259444b, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(158, 'default.jpg', 'anshul14', 'saroj', 'ashok', '0000-00-00', 'bhatea', '11573791362', 'mayank@gmail.com', 0x455a414148413544, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(159, 'default.jpg', 'sachin14', 'reena', 'deepak', '0000-00-00', 'bhatea', '11875705333', 'ahnshul@gamil.com', 0x4a44553559535548, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(160, 'default.jpg', 'mayank15', 'saroj', 'ashok', '0000-00-00', 'bhatea', '12177619304', 'mayank@gmail.com', 0x4859515650554a5a, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(161, 'default.jpg', 'anshul15', 'reena', 'deepak', '0000-00-00', 'bhatea', '12479533275', 'ahnshul@gamil.com', 0x324e5a344c445031, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(162, 'default.jpg', 'sachin15', 'saroj', 'ashok', '0000-00-00', 'bhatea', '12781447246', 'mayank@gmail.com', 0x4459415638463853, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09'),
(163, 'default.jpg', 'mayank16', 'reena', 'deepak', '0000-00-00', 'bhatea', '13083361217', 'ahnshul@gamil.com', 0x5433575256513944, 'indore', 'up', NULL, 6, 0, '2018-02-18 11:01:09'),
(164, 'default.jpg', 'anshul16', 'saroj', 'ashok', '0000-00-00', 'bhatea', '13385275188', 'mayank@gmail.com', 0x5059384353524355, 'indore', 'mp', NULL, 6, 0, '2018-02-18 11:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE IF NOT EXISTS `subject_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(100) NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `ActiveDeactive` int(11) NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`id`, `SubjectName`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 'English', 0, 1, '2018-01-30 07:15:35'),
(2, 'Mathemetics', 0, 1, '2018-02-01 11:10:45'),
(3, 'Computer', 0, 1, '2018-02-07 12:09:55'),
(4, 'Logical Reasoning', 0, 1, '2018-02-07 12:11:50'),
(5, 'General Awarenes', 0, 1, '2018-02-07 12:12:19'),
(6, 'physices', 3, 1, '2018-02-17 03:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `subject_module_master`
--

CREATE TABLE IF NOT EXISTS `subject_module_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectId` int(11) NOT NULL,
  `SubjectModuleName` varchar(255) NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `ActiveDeactive` tinyint(4) NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subject_module_master`
--

INSERT INTO `subject_module_master` (`id`, `SubjectId`, `SubjectModuleName`, `InstituteId`, `ActiveDeactive`, `CreatedDateTime`) VALUES
(1, 1, 'Grammer', 0, 1, '2018-01-30 11:54:13'),
(2, 1, 'Reading Comprehension', 0, 1, '2018-01-30 11:54:41'),
(3, 2, 'Charts', 0, 1, '2018-02-01 11:22:24'),
(4, 3, 'Microsoft Office', 0, 1, '2018-02-07 12:10:36'),
(5, 3, 'hardware', 0, 1, '2018-02-07 12:11:03'),
(6, 5, 'Banking Awareness', 0, 1, '2018-02-07 12:12:42'),
(7, 6, 'thermodynamic', 3, 1, '2018-02-17 03:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_master`
--

CREATE TABLE IF NOT EXISTS `sub_category_master` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `iGroupid` int(10) unsigned NOT NULL,
  `iCategoryid` int(10) unsigned NOT NULL,
  `cSubCategoryName` varchar(45) NOT NULL,
  `cSubCategoryIcon` varchar(150) NOT NULL DEFAULT '',
  `bDelete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bActive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testseries`
--

CREATE TABLE IF NOT EXISTS `testseries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testseries`
--

INSERT INTO `testseries` (`id`, `ExamCategoryId`, `ExamMasterId`, `TestseriesTitle`, `TestseriesPrice`, `TestseriesDiscount`, `TestseriesTags`, `TestseriesDescription`, `TestseriesDuration`, `InstituteId`, `test_ids`, `CreatedDateTime`) VALUES
(1, 1, 2, 'afa', '50', '500', 'jo', 'jo', '', 0, '0', '2018-02-12 06:56:51'),
(2, 1, 2, 'ABC', '500', '5', 'abc', 'abc', '', 0, '', '2018-02-12 09:48:04'),
(3, 1, 1, 'ABC', '451', '50', 'ab', 'ab', '', 0, '14,15,16,17', '2018-02-12 10:27:41'),
(4, 1, 1, 'Syndicate Paper Samples', '200', '50', 'ABc', 'abvc', '', 0, '12,13', '2018-02-12 10:38:24'),
(5, 16, 11, 'helloii', '4', '3', 'gfg', 'gfd', '', 1, '18,20,21', '2018-02-14 11:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `test_allotment`
--

CREATE TABLE IF NOT EXISTS `test_allotment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `testseries_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `InstituteId` int(10) unsigned NOT NULL,
  `is_active` tinyint(10) NOT NULL,
  `CreatedDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `test_allotment`
--

INSERT INTO `test_allotment` (`id`, `testseries_id`, `student_id`, `InstituteId`, `is_active`, `CreatedDateTime`) VALUES
(1, 5, 142, 1, 1, '2018-02-14 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
