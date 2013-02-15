-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2013 at 09:34 PM
-- Server version: 5.0.95
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vicspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `c_id` int(8) NOT NULL auto_increment,
  `c_name` varchar(20) NOT NULL,
  `c_ip` varchar(20) default NULL,
  `c_ts` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `c_message` text,
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`c_id`, `c_name`, `c_ip`, `c_ts`, `c_message`) VALUES
(1, 'admin', NULL, '2012-08-18 06:01:22', 'Open Chat');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(8) NOT NULL auto_increment,
  `comment_message` text NOT NULL,
  `comment_user_name` varchar(255) NOT NULL,
  `comment_gossip_id` int(8) NOT NULL,
  `comment_ts` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`comment_id`),
  KEY `FK_user_name` (`comment_user_name`),
  KEY `FK_gossip_id` (`comment_gossip_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_message`, `comment_user_name`, `comment_gossip_id`, `comment_ts`) VALUES
(1, 'Hello World', 'bob', 161, '2012-07-24 13:16:37'),
(2, 'asddfdsfgfdg', 'bob', 161, '2012-07-24 13:22:13'),
(3, 'aaaaa', 'usgungormez', 0, '2012-07-24 13:27:38'),
(4, 'aaaa', 'usgungormez', 0, '2012-07-24 13:28:14'),
(5, 'tessss', 'usgungormez', 166, '2012-08-03 17:12:31'),
(6, 'brrrrrr', 'admin', 165, '2012-08-03 17:31:59'),
(7, 'unooo', 'admin', 165, '2012-08-03 17:32:02'),
(8, 'aasszz', 'admin', 165, '2012-08-03 17:32:05'),
(11, 'Nice hair do bro', 'usgungormez', 161, '2012-08-03 17:42:15'),
(10, 'zxcxcv', 'usgungormez', 165, '2012-08-03 17:32:25'),
(12, 'Nice wheels', 'usgungormez', 158, '2012-08-03 17:45:04'),
(13, 'wots diz', 'usgungormez', 159, '2012-08-04 16:09:57'),
(14, 'was absolutly hilarious! talk about switch of gender roles', 'asrez', 172, '2012-08-10 13:21:27'),
(15, 'so did you get her home address', 'tiger550', 171, '2012-08-18 05:24:38'),
(16, 'I like', 'admin', 161, '2012-09-18 10:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `daily_views`
--

CREATE TABLE IF NOT EXISTS `daily_views` (
  `view_id` int(8) NOT NULL auto_increment,
  `viewer_name` varchar(32) NOT NULL,
  `viewee_name` varchar(32) NOT NULL,
  PRIMARY KEY  (`view_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(8) NOT NULL auto_increment,
  `feedback_name` varchar(255) NOT NULL,
  `feedback_description` text NOT NULL,
  `feedback_ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_name`, `feedback_description`, `feedback_ts`) VALUES
(1, 'Whattt!', 'Naniiiii!!!', '2012-07-17 13:13:36'),
(2, 'test', 'testasad', '2013-02-15 02:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `user_name` varchar(32) default NULL,
  `friend_user_name` varchar(32) default NULL,
  `datestamp` varchar(255) default NULL,
  `timestamp` varchar(255) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gossip`
--

CREATE TABLE IF NOT EXISTS `gossip` (
  `gossip_id` int(8) NOT NULL auto_increment,
  `gossip_message` text NOT NULL,
  `gossip_ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `gossip_user_name` varchar(32) NOT NULL,
  PRIMARY KEY  (`gossip_id`),
  KEY `fk_2` (`gossip_user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `gossip`
--

INSERT INTO `gossip` (`gossip_id`, `gossip_message`, `gossip_ts`, `gossip_user_name`) VALUES
(171, 'A hawt lady which I picked up the other day in my pimped ride along Bundoora :))', '2012-08-07 14:19:32', 'Bob'),
(178, 'I&#39;ve got the flu - I am very sick', '2013-01-15 03:07:45', 'thebozo1'),
(179, 'Test', '2013-02-03 10:44:45', 'admin'),
(120, 'Ichiiiiiiiiiiigoooooooooooooooooo', '2012-07-11 14:12:52', 'gee'),
(160, 'Just watched The Dark Knight Rises. It was AMAZING! Christopher Nolan is brilliant. A must see!!', '2012-07-19 06:56:00', 'gee'),
(161, 'The Magician', '2012-07-24 04:10:40', 'usgungormez'),
(167, '240Z!', '2012-08-05 14:26:26', 'usgungormez');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `from_id` varchar(32) default NULL,
  `to_id` varchar(32) default NULL,
  `datestamp` varchar(255) default NULL,
  `timestamp` varchar(255) default NULL,
  `message` mediumtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(8) NOT NULL auto_increment,
  `user_name` varchar(32) NOT NULL,
  `user_pass` varchar(32) default NULL,
  `user_email` varchar(255) default NULL,
  `user_level` int(8) default NULL,
  `first_name` varchar(255) default NULL,
  `middle_name` varchar(255) default NULL,
  `last_name` varchar(255) default NULL,
  `user_address` varchar(255) default NULL,
  `user_locality` varchar(255) default NULL,
  `user_pcode` varchar(255) default NULL,
  `user_gender` varchar(255) default NULL,
  `user_dob_d` int(8) default NULL,
  `user_dob_m` int(8) default NULL,
  `user_dob_y` int(8) default NULL,
  `user_phone` int(15) default NULL,
  `user_occupation` varchar(255) default NULL,
  `user_weekend` varchar(255) default NULL,
  `user_notification` int(8) default NULL,
  `user_post_limit` int(8) NOT NULL,
  `user_ip` varchar(20) default NULL,
  `user_views` int(12) NOT NULL,
  `user_online` int(1) NOT NULL default '0',
  `user_ts` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_level`, `first_name`, `middle_name`, `last_name`, `user_address`, `user_locality`, `user_pcode`, `user_gender`, `user_dob_d`, `user_dob_m`, `user_dob_y`, `user_phone`, `user_occupation`, `user_weekend`, `user_notification`, `user_post_limit`, `user_ip`, `user_views`, `user_online`, `user_ts`) VALUES
(26, 'usgungormez', '3a5249d304ac9e74d489d11bff09007a', 'usgungormez@gmail.com', 1, 'Ugur', 'Samet', 'Gungormez', NULL, NULL, NULL, 'Male', 25, 8, 1991, 432437382, 'IT Guy', NULL, NULL, 2, '210.50.32.12', 13, 0, '2012-08-18 18:00:01'),
(4, 'Bob', '3a5249d304ac9e74d489d11bff09007a', 'Bob@marley.com', 1, 'Bob', 'Johnson', 'Marley', '3A Bogong Court', 'BROADMEADOWS, VIC 3047', '3047', 'Male', 19, 11, 1958, 408300265, NULL, NULL, NULL, 2, '49.176.3.27', 2, 1, '2012-08-17 15:39:17'),
(12, 'John', 'e10adc3949ba59abbe56e057f20f883e', 'john@gmail.com', 1, 'John', '', 'Wayne', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-07-31 00:41:14'),
(13, 'Jack', 'e10adc3949ba59abbe56e057f20f883e', 'jack@gmail.com', 1, 'Jack', '', 'James', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '::1', 0, 0, '2012-07-31 00:41:14'),
(14, 'charlie', 'e10adc3949ba59abbe56e057f20f883e', 'charlie@sheen.com', 1, 'Charle', '', 'Sheen', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-07-31 00:41:14'),
(15, 'gee', '3a5249d304ac9e74d489d11bff09007a', 'dartheda@hotmail.com', 1, 'Eda', 'A', 'Gee.', NULL, 'BROADMEADOWS, VIC 3047', '3047', 'Female', 9, 5, 1995, NULL, 'IB student', NULL, NULL, 2, '210.50.32.133', 3, 1, '2012-10-08 07:35:53'),
(22, 'ugur', '3a5249d304ac9e74d489d11bff09007a', 'ugur@ugur.com', NULL, 'ugur', '', 'g', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-07-31 00:41:14'),
(16, 'bozo', '3a5249d304ac9e74d489d11bff09007a', 'bozo@bozo.com', NULL, 'bozo', '', 'dagalar', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '203.94.165.242', 0, 0, '2012-07-31 00:41:14'),
(17, 'zozo', '3a5249d304ac9e74d489d11bff09007a', 'bozo@bozo.com', NULL, 'bozo', '', '', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-07-31 00:41:14'),
(18, 'sammi', '3a5249d304ac9e74d489d11bff09007a', 'bozo@bozo.com', NULL, 'sam', '', '', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '203.94.165.242', 0, 0, '2012-07-31 00:41:14'),
(21, 'ugur', '3a5249d304ac9e74d489d11bff09007a', 'ugur@ugur.com', NULL, 'ugur', '', 'g', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-07-31 00:41:14'),
(23, 'admin', '3a5249d304ac9e74d489d11bff09007a', 'admin@vicspace.com', 100, 'Admin', '', 'Root', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '101.173.255.249', 9, 1, '2013-02-15 02:04:14'),
(24, 'iesha4now', '3a5249d304ac9e74d489d11bff09007a', 'iesha4now@yahoo.com.au', NULL, 'Aisha', '', 'Gungorur', NULL, 'AVOCA, VIC 3467', '3467', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '116.240.185.100', 0, 0, '2012-07-31 00:41:14'),
(29, 'thebozo1', '3a5249d304ac9e74d489d11bff09007a', 'thebozo1@hotmail.com', 1, 'Bozo', '', 'Dagalar', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '58.179.182.249', 0, 0, '2013-01-15 19:00:02'),
(28, 'test', '3a5249d304ac9e74d489d11bff09007a', 'samg@wettenhalls.com.au', 1, 'test', '', 'test', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '203.94.165.242', 0, 0, '2012-07-31 00:41:14'),
(27, 'asrez', '9dfc8dce7280fd49fc6e7bf0436ed325', 'blue_gurl_4_lyf@hotmail.com', 1, 'Aseel', '', 'Sammak', NULL, NULL, NULL, 'Female', 17, 10, 1994, 451797927, 'student', NULL, NULL, 2, '143.238.11.11', 4, 1, '2012-09-18 11:23:20'),
(30, 'sam', 'a88f2a2c68a0eafb1407071ce621e34e', 'sam@gmail.com', 1, 'Sam', '', 'Gungormez', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-08-07 18:00:13'),
(31, 'mgirdler', 'b7f284e91895e09809a439546ff54876', 'mug0@hotmail.com', 1, 'Michael', '', 'Girdler', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '124.170.9.243', 0, 0, '2012-08-08 18:00:03'),
(32, 'eda', '3a5249d304ac9e74d489d11bff09007a', 'eda@vicspace.com', 1, 'Eda', 'Arife', 'Gungormez', NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-08-08 18:00:03'),
(33, 'raygo', '37872742adbfd40074d54d01725a5a2b', 'ray.goding@gmail.com', 1, 'Ray', '', 'Goding', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '124.180.31.182', 3, 1, '2012-08-14 00:14:23'),
(34, 'nemarluk', 'a13612140848bc16dd098db2c3cc80fe', 'band@burningflags.net', 1, 'joe', '', 'nemarluk', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '101.118.233.72', 1, 1, '2012-08-14 18:00:03'),
(35, 'olddodo', '7d8bc5f1a8d3787d06ef11c97d4655df', 'riverina@gmail.com', 1, 'Mike', '', 'Cameron', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '112.213.166.67', 1, 1, '2012-08-17 18:00:03'),
(36, 'badgirl', '9f4125845b080bdb4e7c5713884fffc8', 'ljmcminn@hotmail.com', 1, 'Kylie', '', 'Andrews', NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '121.219.142.115', 2, 1, '2012-11-29 04:52:36'),
(37, 'tiger550', 'b100933e233b19b2fece49fc20bb3cf1', 'coppercouch10@yahoo.com.au', 1, 'malcolm', '', 'brown', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '218.185.53.226', 1, 0, '2012-11-29 04:52:55'),
(38, 'gaze', 'ec69f9b40660a89a17afd8b1e20e09c8', 'vicspace@snapped.com.au', 1, 'Gary', '', 'Beresford', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '211.28.207.182', 1, 1, '2012-09-07 03:29:16'),
(39, 'tasinc68', '7b573e5ae745c2d4ae8817ef057d1d1f', 'tasinc68@gmail.com', 1, 'Tony', '', 'Sinclair', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '60.228.1.47', 1, 1, '2012-09-07 03:28:52'),
(40, 'tez891', 'ba1b7e00099c7a3401ddd50b08b37108', 'tez.chinner@gmail.com', 1, 'Tez', '', 'Chinner', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-09-07 18:00:03'),
(41, 'pierre le fauve', 'f6814b0511451af82a9b5fef847b299d', 'pbarfoot@optusnet.com.au', 1, 'Peter', '', 'Barfoot', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, 0, '2012-09-18 18:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `vicspace`
--

CREATE TABLE IF NOT EXISTS `vicspace` (
  `from_id` varchar(32) default NULL,
  `datestamp` varchar(255) default NULL,
  `timestamp` varchar(255) default NULL,
  `message` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
