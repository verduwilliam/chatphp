-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2017 at 10:33 AM
-- Server version: 10.1.22-MariaDB-
-- PHP Version: 7.0.16-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `créé` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `user_id`, `créé`) VALUES
(1, 'testmsg', 1, '2017-05-02 17:08:59'),
(2, 'testmsg2', 1, '2017-05-02 17:11:36'),
(3, 'sdtjhfj', 1, '2017-05-02 17:22:16'),
(4, 'duj', 4, '2017-05-03 08:04:19'),
(5, 'fi', 7, '2017-05-03 11:38:05'),
(6, 'ci', 4, '2017-05-03 11:53:00'),
(7, 'r', 4, '2017-05-05 13:58:44'),
(8, 'cxtibovu', 4, '2017-05-05 14:14:46'),
(9, 'dctik', 4, '2017-05-05 14:33:52'),
(10, 'dxtij', 10, '2017-05-05 14:42:09'),
(11, 'ck', 4, '2017-05-05 16:26:35'),
(12, 'xtj', 4, '2017-05-05 16:32:15'),
(13, 'xtj', 4, '2017-05-05 16:32:20'),
(14, 'vci', 4, '2017-05-05 19:52:56'),
(15, 'cu', 4, '2017-05-05 19:54:00'),
(16, 'cxtiikk', 4, '2017-05-05 19:54:09'),
(17, 'ctik', 4, '2017-05-05 19:54:14'),
(18, 'cxtu', 4, '2017-05-05 20:03:42'),
(19, 'ctuj', 4, '2017-05-05 20:08:22'),
(20, 'diykc', 4, '2017-05-05 20:39:00'),
(21, 'dctiyk', 11, '2017-05-05 20:54:22'),
(22, 'cyk', 12, '2017-05-06 11:18:03'),
(23, 'vk', 12, '2017-05-06 11:20:01'),
(24, 'cxtjut', 13, '2017-05-06 13:01:41'),
(25, 'vkuyk', 4, '2017-05-06 13:01:55'),
(26, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 4, '2017-05-06 13:19:39'),
(29, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 4, '2017-05-06 13:28:23'),
(30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus purus eu sapien tincidunt, vitae consequat metus rutrum. Fusce a lobortis eros, a aliquet massa. Vestibulum ac leo at nulla fermentum tristique. Suspendisse sollicitudin rhoncus enim at porttitor. Curabitur gravida et arcu a tincidunt. Sed convallis sapien risus, facilisis condimentum diam scelerisque vitae. Integer sodales auctor nibh at luctus. Ut quis interdum augue. Praesent tincidunt arcu ex, vitae condimentum turpis posuere quis. Nam congue egestas magna ac consectetur. Mauris id sapien ornare, eleifend risus nec, vulputate velit. ', 4, '2017-05-06 13:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `password`) VALUES
(1, 'testpseudo', 'testnom', 'testprenom', '7c4a8d09ca3762af61e59520943dc264'),
(2, 'a', 'cgu', 'bk', '86f7e437faa5a7fce15d1ddcb9eaeaea'),
(3, '123', 'viy', 'blj', '40bd001563085fc35165329ea1ff5c5e'),
(4, 'test', 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(5, 'testloginauto', 'xh', 'kh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'testloginauto2', 'ci', 'vl', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(7, 'testloginauto3', 'ciyk', 'vk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(8, 'testheader', 'ci', 'fiyv', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(9, 'cyi', 'xu', 'cgj ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(10, 'vljj', 'vckv', 'flkv', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(11, 'clv j', 'ct', 'uyv', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(12, 'cku', 'xutj', 'cky', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(13, 'xhckv', 'vkiy', 'l', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(14, 'gjk', 'dyi', 'tol', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
