-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: 25 May 2012 la 14:22
-- Versiune server: 5.5.20
-- Versiune PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza de date: `freemyti_me`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_auctions`
--

CREATE TABLE IF NOT EXISTS `fmt_auctions` (
  `auc_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `bidder_id` int(11) NOT NULL,
  `bid_value` float NOT NULL,
  `comments` text COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`auc_id`),
  KEY `fk_task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=2 ;

--
-- Salvarea datelor din tabel `fmt_auctions`
--

INSERT INTO `fmt_auctions` (`auc_id`, `task_id`, `bidder_id`, `bid_value`, `comments`) VALUES
(1, 1, 1, 34, '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_categories`
--

CREATE TABLE IF NOT EXISTS `fmt_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `fmt_categories`
--

INSERT INTO `fmt_categories` (`cat_id`, `category`, `status`) VALUES
(2, 'Automotive', 'active'),
(3, 'Consultancy', 'active');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_login_attempts`
--

CREATE TABLE IF NOT EXISTS `fmt_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_permissions`
--

CREATE TABLE IF NOT EXISTS `fmt_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_roles`
--

CREATE TABLE IF NOT EXISTS `fmt_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=3 ;

--
-- Salvarea datelor din tabel `fmt_roles`
--

INSERT INTO `fmt_roles` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'User'),
(2, 0, 'Admin');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_sessions`
--

CREATE TABLE IF NOT EXISTS `fmt_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_tasks`
--

CREATE TABLE IF NOT EXISTS `fmt_tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `budget` float(11,0) NOT NULL,
  `title` varchar(500) COLLATE utf8_romanian_ci NOT NULL,
  `description` text COLLATE utf8_romanian_ci NOT NULL,
  `added_on` datetime NOT NULL,
  `expiration_date` datetime NOT NULL,
  `address` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `bidder_location` enum('anywhere','task_location') COLLATE utf8_romanian_ci NOT NULL DEFAULT 'anywhere',
  `payment_method` enum('cash','paypal') COLLATE utf8_romanian_ci NOT NULL DEFAULT 'cash',
  `promoted` enum('no','yes') COLLATE utf8_romanian_ci NOT NULL DEFAULT 'no',
  `status` enum('solving','closed','draft','new') COLLATE utf8_romanian_ci NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=10 ;

--
-- Salvarea datelor din tabel `fmt_tasks`
--

INSERT INTO `fmt_tasks` (`task_id`, `cat_id`, `user_id`, `budget`, `title`, `description`, `added_on`, `expiration_date`, `address`, `bidder_location`, `payment_method`, `promoted`, `status`) VALUES
(1, 2, 1, 258, 'Need a web developer ', 'Hi my name is Issa AL-Mashini , i am looking for a professional jewelry designer who can draw sketches and develop royal styles and models just for cufflinks .', '2012-03-07 15:48:22', '2012-03-29 15:48:17', 'baicoi', 'anywhere', 'cash', 'no', 'new'),
(2, 2, 1, 0, 'I need a plumer', 'My title', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bucharest', 'anywhere', 'cash', 'no', 'new'),
(3, 2, 1, 0, 'test', 'My title', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ploiesti', 'anywhere', 'cash', 'no', 'new'),
(4, 3, 1, 0, 'My sd', 'My title', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'brasov', 'anywhere', 'cash', 'no', 'new'),
(5, 2, 1, 0, 'wew', '345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'buzau', 'anywhere', 'cash', 'no', 'new'),
(6, 2, 1, 45, 'werwer', 'blabla', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'giurgiu', 'anywhere', 'cash', 'no', 'new'),
(7, 2, 1, 0, 'w354', '43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sofia, bulgaria', 'anywhere', 'cash', 'no', 'new'),
(8, 3, 1, 0, '6', 'erf', '2012-03-08 10:03:52', '0000-00-00 00:00:00', 'rusE, bulgaria', 'anywhere', 'cash', 'no', 'new'),
(9, 3, 1, 234234240, 'sdas333333333', 'asdas333333333333333333333333333333333333333333333333333333333333333333333', '2012-05-24 02:25:07', '2021-07-18 02:25:07', '234234234', 'anywhere', 'cash', 'no', 'new');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_users`
--

CREATE TABLE IF NOT EXISTS `fmt_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(34) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(34) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `feedback` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=3 ;

--
-- Salvarea datelor din tabel `fmt_users`
--

INSERT INTO `fmt_users` (`id`, `role_id`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`, `feedback`) VALUES
(1, 1, 'juravlerazvan', '$1$vI4.MF2.$SUlei1r9mUu/9fxWzS5FG/', 'juravle.razvan@gmail.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2012-03-21 14:32:10', '2012-03-21 14:32:10', '2012-05-25 13:49:49', NULL),
(2, 1, 'dsd', '', 'ewrwe', 0, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-05-25 13:37:38', NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_user_autologin`
--

CREATE TABLE IF NOT EXISTS `fmt_user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_user_profile`
--

CREATE TABLE IF NOT EXISTS `fmt_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fmt_user_temp`
--

CREATE TABLE IF NOT EXISTS `fmt_user_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(34) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=1 ;

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `fmt_auctions`
--
ALTER TABLE `fmt_auctions`
  ADD CONSTRAINT `fk_task_id` FOREIGN KEY (`task_id`) REFERENCES `fmt_tasks` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
