-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bca2017.call_history
CREATE TABLE IF NOT EXISTS `call_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bca2017.call_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `call_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `call_history` ENABLE KEYS */;


-- Dumping structure for table bca2017.candidate
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `audit` tinyint(4) NOT NULL,
  `dist_date` date NOT NULL,
  `interviewer` int(11) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_new` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_new` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `co` varchar(100) NOT NULL,
  `add1` varchar(200) NOT NULL,
  `add2` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `tel_new` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `mobile_new` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_new` varchar(100) NOT NULL,
  `web` varchar(100) NOT NULL,
  `resign` tinyint(4) NOT NULL,
  `called` tinyint(4) NOT NULL,
  `minute` tinyint(4) NOT NULL,
  `know` tinyint(4) NOT NULL,
  `register` tinyint(4) NOT NULL,
  `invite` tinyint(4) NOT NULL,
  `partner` tinyint(4) NOT NULL,
  `remark` text NOT NULL,
  `send_email` varchar(100) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bca2017.candidate: ~0 rows (approximately)
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


-- Dumping structure for table bca2017.candidate_status
CREATE TABLE IF NOT EXISTS `candidate_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bca2017.candidate_status: ~17 rows (approximately)
/*!40000 ALTER TABLE `candidate_status` DISABLE KEYS */;
INSERT INTO `candidate_status` (`id`, `name`, `parent`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Not Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(21, 'No Answer', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(22, 'Busy', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(101, 'Attending', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(102, 'Not Attending', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(103, 'Follow-up Email Sent', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(104, 'Requested for More Info', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(105, 'For Follow Up', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(106, 'Not Available ', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(107, 'Not Interested', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(108, 'Fax Tone', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(109, 'Call back', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(110, 'Answering Machine', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(111, 'Voice Mail/Left Msg', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(112, 'Wrong Number', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(113, 'No Longer in Business', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(114, 'Other', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `candidate_status` ENABLE KEYS */;


-- Dumping structure for table bca2017.event
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `pre_register` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bca2017.event: ~2 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `name`, `place`, `date`, `web`, `pre_register`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Broadcast Asia 2017', 'Suntec Singapore', '23 sd 25 Mei 2017', 'www.Broadcast-Asia.com', 'www.Broadcast-Asia.com/pre-registration', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Communic Asia 2017 dan Enterprise IT 2017', 'Marina Bay Sands Singapore', '23 sd 25 Mei 2017', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;


-- Dumping structure for table bca2017.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `date_login` datetime NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bca2017.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '::1', '2017-03-26 15:02:43', 'Windows 7(Google Chrome 56.0.2924.87)', 1, 0, '0000-00-00 00:00:00', 12, '2016-02-01 23:44:22'),
	(2, 'Teguh Santoso', 'teguh', 'e2f9f842fd8e1ae90dc428d39cab7167', 1, '127.0.0.1', '2016-02-01 17:11:28', 'Windows 7(Google Chrome 48.0.2564.97)', 1, 1, '2016-02-01 17:07:02', 0, '0000-00-00 00:00:00'),
	(3, 'Jaka Suci Ramadhani', 'jack', '202cb962ac59075b964b07152d234b70', 3, '::1', '2017-03-26 11:04:04', 'Windows 7(Google Chrome 56.0.2924.87)', 1, 0, '2017-03-25 13:16:17', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table bca2017.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bca2017.user_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Auditor', 0, '0000-00-00 00:00:00', 12, '2016-02-02 22:08:19'),
	(3, 'Interviewer', 0, '2016-01-03 03:06:57', 12, '2016-04-13 18:13:39');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for table bca2017.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bca2017.user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Active', 0, '2015-10-31 14:00:03', 0, '2015-11-28 02:32:32'),
	(2, 'Not Active', 0, '2015-10-31 14:00:03', 12, '2016-02-01 23:22:27');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
