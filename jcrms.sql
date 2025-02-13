-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 02:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jcrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `accuser` varchar(120) NOT NULL,
  `image` varchar(250) NOT NULL,
  `agender` varchar(120) NOT NULL,
  `adob` date NOT NULL,
  `aaddress` varchar(120) NOT NULL,
  `aphone` int(15) NOT NULL,
  `awork` varchar(120) NOT NULL,
  `pstatement` varchar(5000) NOT NULL,
  `defendent` varchar(120) NOT NULL,
  `dgender` varchar(120) NOT NULL,
  `ddob` date NOT NULL,
  `dmother` varchar(120) NOT NULL,
  `dfather` varchar(120) NOT NULL,
  `dwork` varchar(120) NOT NULL,
  `dfamily` varchar(120) NOT NULL,
  `daddress` varchar(120) NOT NULL,
  `dphone` int(15) NOT NULL,
  `dstatement` varchar(5000) NOT NULL,
  `cine` varchar(250) NOT NULL,
  `accusation` datetime NOT NULL,
  `imprisioned` datetime NOT NULL,
  `arn` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `casetype` int(11) NOT NULL,
  `detective_id` int(11) NOT NULL,
  `investigation` varchar(50) NOT NULL,
  `archive_id` int(11) NOT NULL,
  `sended` int(11) NOT NULL,
  `jachive_id` int(11) NOT NULL,
  `prosecutor_id` int(11) NOT NULL,
  `pro_decision` varchar(50) NOT NULL,
  `dassign_id` int(11) NOT NULL,
  `passign_id` int(11) NOT NULL,
  `pcheck_id` int(11) NOT NULL,
  `prosecution_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `user_id`, `category_id`, `accuser`, `image`, `agender`, `adob`, `aaddress`, `aphone`, `awork`, `pstatement`, `defendent`, `dgender`, `ddob`, `dmother`, `dfather`, `dwork`, `dfamily`, `daddress`, `dphone`, `dstatement`, `cine`, `accusation`, `imprisioned`, `arn`, `status`, `casetype`, `detective_id`, `investigation`, `archive_id`, `sended`, `jachive_id`, `prosecutor_id`, `pro_decision`, `dassign_id`, `passign_id`, `pcheck_id`, `prosecution_id`, `added_on`) VALUES
(2, 13, 4, 'Wolaita Sodo University', '709310532_2.jpg', '', '0000-00-00', 'Sodo', 2147483647, '', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis justo quis condimentum eleifend. Integer hendrerit lorem sem, eu sollicitudin nisi porta pellentesque. Donec aliquam lacus quis augue faucibus, nec faucibus mauris mattis. Aenean risus arcu, dignissim ut consequat id, lobortis vel metus. Maecenas vitae blandit massa, eget blandit nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc elementum posuere tellus, quis rhoncus enim blandit eu. Etiam ultricies non diam id auctor. Integer sed metus at mauris tempus gravida at maximus augue. Sed tortor tortor, semper ac varius eget, luctus aliquam turpis. Pellentesque ligula dui, lacinia eget ultricies ac, vehicula rhoncus sapien.\r\n\r\nDonec rhoncus maximus nibh, nec fringilla ligula rhoncus vel. Fusce euismod leo vitae leo fringilla, id imperdiet ante facilisis. Vivamus tincidunt ut sapien a laoreet. Nunc ut lacus at sapien ornare semper vel at diam. Pellentesque faucibus libero id fermentum lobortis. Aliquam cursus eros ante, sit amet ornare felis vulputate eu. Curabitur sollicitudin iaculis nisi, facilisis pharetra arcu hendrerit semper. Vestibulum et mollis nibh. Ut egestas ultrices neque at aliquet.\r\n\r\nSed et cursus nisi. Praesent ac ligula semper, congue libero sed, varius turpis. Nam lacinia laoreet nulla, et placerat arcu cursus sed. Pellentesque in risus vitae nunc lobortis interdum. Nunc cursus enim vitae lacus bibendum, sed varius lectus consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis mauris eu rhoncus interdum. Proin in aliquet nisi. Nulla sit amet velit a felis dapibus sagittis. Fusce sodales dictum justo, id varius sapien sodales eleifend. Pellentesque justo eros, fringilla ac augue at, elementum malesuada libero. Nam dictum eget quam eu ultricies. Donec non facilisis purus. Maecenas pretium interdum lacus.', 'Ash Semon', 'M', '1997-10-08', '', 'Fikre', 'Student', 'Good', 'Sodo', 2147483647, 'Aenean pellentesque risus ut vestibulum semper. Etiam congue condimentum libero et varius. Sed nec convallis tellus. In lobortis quam augue. Fusce a urna tristique, tempus sapien id, volutpat ex. Donec lobortis convallis neque, nec porta ex posuere sed. Pellentesque eleifend commodo velit vitae bibendum. Nulla at purus at quam dignissim ornare et fringilla odio. Donec commodo quis nulla non condimentum. Etiam ultrices malesuada risus, in placerat nisi efficitur sed. Vestibulum dignissim congue dolor, a aliquam mi condimentum ut. Nam tristique dictum justo, ac suscipit nunc laoreet a. Cras lectus neque, tempus at venenatis a, bibendum ac ipsum. Curabitur quam justo, faucibus non ante eu, dignissim fringilla ex.', 'Sodo', '2022-07-22 08:00:00', '0000-00-00 00:00:00', '', 1, 1, 11, 'yes', 8, 1, 0, 0, '', 0, 0, 0, 0, '2022-07-22 03:18:41'),
(3, 7, 7, 'Man 4', '470982940_4.png', 'M', '1997-07-22', 'Sodo', 2147483647, 'Student', 'I’m writing to resign from my position as customer service representative, effective August 14, 2020.\r\nI’ve recently decided to go back to school, and my program starts in early September. I’m tendering my resignation now so that I can be as helpful as possible to you during the transition.', 'Person 3', 'F', '0000-00-00', '', '', 'Business', 'Good', 'Hawassa', 2147483647, 'I’m particularly grateful for your guidance while I was considering furthering my education. Your support has meant so much to me.', 'Sodo', '2022-07-21 10:00:00', '0000-00-00 00:00:00', '', 1, 0, 11, 'yes', 8, 1, 0, 0, '', 0, 0, 0, 0, '2022-07-22 04:58:49'),
(4, 7, 2, 'Kibrom', '122927340_PASS.jpg', 'M', '1999-11-11', 'addis', 80928398, 'student', 'fr sjewf', 'Dawit', 'M', '2001-11-11', 'Mulu', 'Tumay', 'Student', 'Avarage', 'adama', 238298321, 'sekuysf seu s', 'adama', '2024-02-11 00:12:00', '2023-11-11 00:12:00', '111111', 1, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, '2024-05-11 03:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `cases_details`
--

CREATE TABLE `cases_details` (
  `id` int(11) NOT NULL,
  `cases_id` int(11) NOT NULL,
  `witness` varchar(50) NOT NULL,
  `statement` varchar(5000) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases_details`
--

INSERT INTO `cases_details` (`id`, `cases_id`, `witness`, `statement`, `status`, `added_on`) VALUES
(1, 1, 'Witness 1', 'Sed et cursus nisi. Praesent ac ligula semper, congue libero sed, varius turpis. Nam lacinia laoreet nulla, et placerat arcu cursus sed. Pellentesque in risus vitae nunc lobortis interdum. Nunc cursus enim vitae lacus bibendum, sed varius lectus consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis mauris eu rhoncus interdum. Proin in aliquet nisi. Nulla sit amet velit a felis dapibus sagittis. Fusce sodales dictum justo, id varius sapien sodales eleifend. Pellentesque justo eros, fringilla ac augue at, elementum malesuada libero. Nam dictum eget quam eu ultricies. Donec non facilisis purus. Maecenas pretium interdum lacus.', 1, '2022-07-22 03:16:09'),
(2, 2, 'Witness 2', 'Sed et cursus nisi. Praesent ac ligula semper, congue libero sed, varius turpis. Nam lacinia laoreet nulla, et placerat arcu cursus sed. Pellentesque in risus vitae nunc lobortis interdum. Nunc cursus enim vitae lacus bibendum, sed varius lectus consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis mauris eu rhoncus interdum. Proin in aliquet nisi. Nulla sit amet velit a felis dapibus sagittis. Fusce sodales dictum justo, id varius sapien sodales eleifend. Pellentesque justo eros, fringilla ac augue at, elementum malesuada libero. Nam dictum eget quam eu ultricies. Donec non facilisis purus. Maecenas pretium interdum lacus.', 1, '2022-07-22 03:18:41'),
(3, 3, 'Witness 3', ' Please let me know if there’s anything I can do to help you find and train my replacement.', 1, '2022-07-22 04:58:49'),
(4, 4, 'abena', '32iur2ur2r3w3r3wr', 1, '2024-05-11 03:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `cases_invest`
--

CREATE TABLE `cases_invest` (
  `id` int(11) NOT NULL,
  `cases_id` int(11) NOT NULL,
  `invest_statement` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases_invest`
--

INSERT INTO `cases_invest` (`id`, `cases_id`, `invest_statement`, `status`, `added_on`) VALUES
(1, 1, '<p><br>Jason Andrews<br>Manager<br>LMK Company<br>53 Oak Avenue, Ste 5<br>Dell Village, Wisconsin 54101<br><br><b>Dear Jason,</b><br><br>I’m writing to resign from my position as customer service representative, effective August 14, 2020.<br><br>I’ve recently decided to go back to school, and my program starts in early <span style=\"background-color: rgb(255, 255, 0);\">September</span>. I’m tendering my resignation now so that I can be as helpful as possible to you during the transition.<br><br>I’ve truly enjoyed my time working with you and everyone else on our team at LMK. It’s rare to find a customer service role that offers as much opportunity to grow and learn, as well as such a positive, inspiring team of people to grow and learn with.<br><br>I’m particularly grateful for your guidance while I was considering furthering my education. Your support has meant so much to me. <br><br>Please let me know if there’s anything I can do to help you find and train my replacement.<br><br>Thanks, and best wishes,<br><br><b>Nicole Thomas</b><br></p>', 1, '2022-07-22 03:21:25'),
(2, 2, '<p>Nicole Thomas<br>35 Chestnut Street<br>Dell Village, Wisconsin 54101<br>555-555-5555<br>nicole@thomas.com<br><br><br>I’m writing to resign from my position as customer service representative, effective <font color=\"#FF0000\">August 14, 2020</font>.<br><br>I’ve recently decided to go back to school, and my program starts in early September. I’m tendering my resignation now so that I can be as helpful as possible to you during the transition.<br><br>I’ve truly enjoyed my time working with you and everyone else on our team at LMK. It’s rare to find a customer service role that offers as much opportunity to grow and learn, as well as such a positive, inspiring team of people to grow and learn with.<br><br>I’m particularly grateful for your guidance while I was considering furthering my education. Your support has meant so much to me. <br><br>Please let me know if there’s anything I can do to help you find and train my replacement.<br><br>Thanks<br><br><b>Nicole Thomas</b><br></p>', 1, '2022-07-22 03:22:26'),
(3, 3, '<p>Jason Andrews<br>Manager<br>LMK Company<br>53 Oak Avenue, Ste 5<br>Dell Village, Wisconsin 54101<br><b><br>Dear Jason,</b><br><br>I’m writing to resign from my position as customer service representative, effective August 14, 2020.<br><br>I’ve recently decided to go back to school, and my program starts in early September. I’m tendering my resignation now so that I can be as helpful as possible to you during the transition.<br><br>I’ve truly enjoyed my time working with you and everyone else on our team at LMK. It’s rare to find a customer service role that offers as much opportunity to grow and learn, as well as such a positive, inspiring team of people to grow and learn with.<br><br>I’m particularly grateful for your guidance while I was considering furthering my education. Your support has meant so much to me. <br><br>Please let me know if there’s anything I can do to help you find and train my replacement.<br><font color=\"#00FF00\"><br>Thanks<br>Nicole Thomas</font><br></p>', 1, '2022-07-22 04:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `cases_result`
--

CREATE TABLE `cases_result` (
  `id` int(11) NOT NULL,
  `cases_id` int(11) NOT NULL,
  `cases_status_id` int(11) NOT NULL,
  `statement` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cases_status`
--

CREATE TABLE `cases_status` (
  `id` int(11) NOT NULL,
  `cases_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `status`) VALUES
(2, 'Homicide', 1),
(4, 'Robbery', 1),
(5, 'Sale of illegal goods', 1),
(6, 'Assult & Battery', 1),
(7, 'False Imprisonment', 1),
(8, 'Arson', 1),
(9, 'Theft', 1),
(10, 'Rape', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `abbreviation` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `abbreviation`, `status`, `added_on`) VALUES
(1, 'Miscellaneous Crime Monitoring', 'MCM', 1, '2022-06-05 07:14:43'),
(2, 'Civil Case Crime', 'CCC', 1, '2022-06-05 09:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `prision`
--

CREATE TABLE `prision` (
  `id` int(11) NOT NULL,
  `prision` varchar(50) NOT NULL,
  `address` varchar(120) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prision`
--

INSERT INTO `prision` (`id`, `prision`, `address`, `status`) VALUES
(3, 'Wolaita Sodo Town Prision', 'Hawassa', 1),
(4, 'Wadu anba Prision', 'Wolaita Sodo', 1),
(5, 'Kore', 'Addis Ababa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(250) NOT NULL,
  `name` varchar(240) NOT NULL,
  `gender` varchar(240) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `work` varchar(250) NOT NULL,
  `statement` varchar(240) NOT NULL,
  `category` varchar(251) NOT NULL,
  `case_state` int(240) NOT NULL,
  `police` varchar(240) NOT NULL,
  `uname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `name`, `gender`, `dob`, `address`, `phone`, `work`, `statement`, `category`, `case_state`, `police`, `uname`) VALUES
(4, 'Simon Bekele', 'male', '1999-11-19', 'mekanissa', '0929190911', 'Student', 'fight occurred', 'assault', 0, 'Nati', 'Brook'),
(5, 'Martha', 'female', '2024-11-11', 'Nfas Silk lafto', '0909090909', 'Teacher', 'child abuse', 'assault', 1, 'Simon', ''),
(6, 'Martha1', 'female', '2024-11-11', 'Nfas Silk lafto', '0909090909', 'Teacher', 'child abuse', 'assault', 0, '', ''),
(7, 'Brook', 'male', '2024-12-11', 'Nfas Silk lafto', '9009090990', 'Teacher', 'someone got raped in the school', 'Rape', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE `returned` (
  `id` int(11) NOT NULL,
  `caseid` int(11) NOT NULL,
  `casetype` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL,
  `agender` varchar(120) NOT NULL,
  `adob` date NOT NULL,
  `aaddress` varchar(120) NOT NULL,
  `aphone` int(11) NOT NULL,
  `awork` varchar(120) NOT NULL,
  `pstatement` varchar(5000) NOT NULL,
  `accuser` varchar(50) NOT NULL,
  `defendent` varchar(50) NOT NULL,
  `dgender` varchar(120) NOT NULL,
  `ddob` date NOT NULL,
  `dmother` varchar(120) NOT NULL,
  `dfather` varchar(120) NOT NULL,
  `dfamily` varchar(120) NOT NULL,
  `daddress` varchar(120) NOT NULL,
  `dphone` int(11) NOT NULL,
  `dwork` varchar(120) NOT NULL,
  `dstatement` varchar(5000) NOT NULL,
  `cine` varchar(250) NOT NULL,
  `accusation` datetime NOT NULL,
  `imprisioned` datetime NOT NULL,
  `arn` varchar(50) NOT NULL,
  `investigated` varchar(50) NOT NULL,
  `prosecutor` varchar(50) NOT NULL,
  `jachive` varchar(50) NOT NULL,
  `witness` varchar(50) NOT NULL,
  `statement` varchar(1500) NOT NULL,
  `invest_statement` varchar(1500) NOT NULL,
  `pro_statement` varchar(1500) NOT NULL,
  `status` int(11) NOT NULL,
  `detective_id` int(11) NOT NULL,
  `achive_id` int(11) NOT NULL,
  `investigation` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL,
  `sended` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returned`
--

INSERT INTO `returned` (`id`, `caseid`, `casetype`, `priority`, `agender`, `adob`, `aaddress`, `aphone`, `awork`, `pstatement`, `accuser`, `defendent`, `dgender`, `ddob`, `dmother`, `dfather`, `dfamily`, `daddress`, `dphone`, `dwork`, `dstatement`, `cine`, `accusation`, `imprisioned`, `arn`, `investigated`, `prosecutor`, `jachive`, `witness`, `statement`, `invest_statement`, `pro_statement`, `status`, `detective_id`, `achive_id`, `investigation`, `added_on`, `sended`) VALUES
(1, 1, 'Homicide', 0, 'M', '1995-04-02', 'Sodo', 2147483647, 'Student', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis justo quis condimentum eleifend. Integer hendrerit lorem sem, eu sollicitudin nisi porta pellentesque. Donec aliquam lacus quis augue faucibus, nec faucibus mauris mattis. Aenean risus arcu, dignissim ut consequat id, lobortis vel metus. Maecenas vitae blandit massa, eget blandit nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc elementum posuere tellus, quis rhoncus enim blandit eu. Etiam ultricies non diam id auctor. Integer sed metus at mauris tempus gravida at maximus augue. Sed tortor tortor, semper ac varius eget, luctus aliquam turpis. Pellentesque ligula dui, lacinia eget ultricies ac, vehicula rhoncus sapien.', 'Man 1', 'Person 1', 'M', '0000-00-00', '', '', '', '', 0, '', 'Donec rhoncus maximus nibh, nec fringilla ligula rhoncus vel. Fusce euismod leo vitae leo fringilla, id imperdiet ante facilisis. Vivamus tincidunt ut sapien a laoreet. Nunc ut lacus at sapien ornare semper vel at diam. Pellentesque faucibus libero id fermentum lobortis. Aliquam cursus eros ante, sit amet ornare felis vulputate eu. Curabitur sollicitudin iaculis nisi, facilisis pharetra arcu hendrerit semper. Vestibulum et mollis nibh. Ut egestas ultrices neque at aliquet.', 'Sodo', '2022-07-22 02:00:00', '0000-00-00 00:00:00', '', 'Ermias Bulecha (123456789)', 'Workagegnew Dendacho (+251970339228)', 'Semira Bedawi (+251945375343)', 'Witness 1', 'Sed et cursus nisi. Praesent ac ligula semper, congue libero sed, varius turpis. Nam lacinia laoreet nulla, et placerat arcu cursus sed. Pellentesque in risus vitae nunc lobortis interdum. Nunc cursus enim vitae lacus bibendum, sed varius lectus consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis mauris eu rhoncus interdum. Proin in aliquet nisi. Nulla sit amet velit a felis dapibus sagittis. Fusce sodales dictum justo, id varius sapien sodales eleifend. Pellentesque justo eros, fringilla ac augue at, elementum malesuada libero. Nam dictum eget quam eu ultricies. Donec non facilisis purus. Maecenas pretium interdum lacus.', 'helpful as possible to you during the transition.<br><br>I’ve truly enjoyed my time working with you and everyone else on our team at LMK. It’s rare to find a customer service role that offers as much opportunity to grow and learn, as well as such a positive, inspiring team of people to grow and learn with.<br><br>I’m particularly grateful for your guidance while I was considering furthering my education. Your support has meant so much to me. <br><br>Please let me know if there’s anything I can do to help you find and train my replacement.<br><br>Thanks, and best wishes,<br><br><b>Nicole Thomas</b><br></p>\" class=\"summernote\" required><p><br>Jason Andrews<br>Manager<br>LMK Company<br>53 Oak Avenue, Ste 5<br>Dell Village, Wisconsin 54101<br><br><b>Dear Jason,</b><br><br>I’m writing to resign from my position as customer service representative, effective August 14, 2020.<br><br>I’ve recently decided to go back to school, and my program starts in early <span style=\"background-color: rgb(255, 255, 0);\">September</span>. I’m tendering my resignation now so that I can be as helpful as possible to you during the transition.<br><br>I’ve truly enjoyed my time working with you and everyone else on our team at LMK. It’s rare to find a customer service role that offers as much opportunity to grow and learn, as well as such a positive, inspiring team of people to grow and learn with.<br><br>I’m particularly grateful for your guidance while I was considering furthering my education. Your s', '', 1, 11, 8, 'yes', '2022-07-22 03:50:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `station` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `station`, `address`, `status`, `added_on`) VALUES
(1, 'Main office', 'Arada kebale, Wolaita sodo', 1, '2022-06-05 07:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `station` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phone` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`, `gender`, `dob`, `station`, `address`, `phone`, `role`, `status`, `added_on`) VALUES
(7, 'Simon', 'police1', '12345', 'ashsemon17@gmail.com', '', '2022-01-22', 'Wadu Anba', 'sodo', '12345678', 'police', 1, 2022),
(8, 'Semira Awole', 'Semira', 'police', 'semira@gmail.com', '', '1996-02-15', 'Wadu Anba', 'Alaba', '12345678', 'archive', 1, 2022),
(9, 'Dagim Firew', 'Dagim', 'admin', 'dagim@gmail.com', 'male', '1997-03-15', 'Wadu Anba', 'Hawassa', '1341541341', 'admin', 1, 2022),
(10, 'Werkagegnew Dedacho', 'kiyba', 'user', 'kiyba@gmail.com', 'male', '1997-02-15', 'Wadu Anba', 'Hosana', '54654321234', 'subadmin', 1, 2022),
(11, 'Ermias Bulecha', 'ermias', 'detective', 'ermias@gmail.com', 'male', '1995-10-15', 'Wadu Anba', 'Shashemane', '123456789', 'detective', 1, 2022),
(12, 'Commander Maguje', 'admin', 'admin', 'Maguje@gmail.com', 'male', '1983-06-17', 'Wadu Anba', 'Wolaita', '0923712534', 'admin', 1, 2022),
(13, 'Abate Chonekew', 'subadmin', '12345', 'aba@gmail.com', 'male', '1983-10-17', 'Wadu Anba', ' Wolaita Sodo', '0963473456', 'subadmin', 1, 2022),
(14, 'Natiiii', 'simo', '12345', 'simonwubs254@gmail.com', 'male', '1999-12-23', 'mek', 'Nfas Silk lafto', '0929190911', 'police', 1, 2024),
(15, 'Nahom', 'Nahom1', '12345', 'nah@gmail.com', 'male', '2024-04-05', 'Kore', 'Nfas Silk lafto', '0911111111', 'police', 1, 2024),
(16, 'Alemu', 'Alex', '12345', 'alex@gmail.com', 'male', '1990-11-23', 'Kore', 'N/F/S', '0912345678', 'police', 1, 2024),
(17, 'Nati', 'Nati12', '12345', 'nati@gmail.com', 'male', '2002-11-11', 'Kore', 'Addis Ababa', '0912381811', 'police', 1, 2024),
(18, 'Naol', 'Naol1', '12345', 'na@gmail.com', 'male', '2000-11-11', '', 'Addis Ababa', '091219277', 'user', 1, 0),
(19, 'Brook', 'Bk', '12345 ', 'bk@gmail.com', 'male', '2000-11-22', '', 'adama', '0909090909', 'user', 0, 0),
(20, 'Martha', 'Martha1', '12345  ', 'ma@gmail.com', 'female', '2000-11-11', '', 'Nfas Silk lafto', '090909', 'user', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_details`
--
ALTER TABLE `cases_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_invest`
--
ALTER TABLE `cases_invest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_result`
--
ALTER TABLE `cases_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_status`
--
ALTER TABLE `cases_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prision`
--
ALTER TABLE `prision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned`
--
ALTER TABLE `returned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cases_details`
--
ALTER TABLE `cases_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cases_invest`
--
ALTER TABLE `cases_invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cases_result`
--
ALTER TABLE `cases_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_status`
--
ALTER TABLE `cases_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prision`
--
ALTER TABLE `prision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `returned`
--
ALTER TABLE `returned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
