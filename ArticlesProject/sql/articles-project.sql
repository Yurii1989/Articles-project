-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2019 at 10:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `pub_date` (`pub_date`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `pub_date`, `img`, `title`, `description`) VALUES
(68, '2019-03-09 18:39:38', '../storage/6b9f26e4d1_bd6911de47_J_Boe.jpg', 'Johannes Boe', 'After winning three IBU YJWCH titles, Johannes Thingnes Boe quickly jumped to Norway’s World Cup squad in 2013. He made a huge splash that first December by winning the sprint and pursuit at Annecy-le Grand Bornand. Since then, he has collected 26 more individual victories and 45 total individual podiums. He won his first IBU World Championship title, taking the sprint in 2015 at Kontiolahti. He added mass start and relay Gold the next season when the Championships were held in his home stadium at Oslo. The 2018 Pyeongchang Olympic Winter Games added the title of Olympic champion to Johannes\' resume, where he won the 20K individual Gold medal. He added two Silver medals; in the mixed relay and men\'s relay to his collection before leaving Korea.  The younger Boe brother has improved every season since his debut, but the last three season have been his best, finishing second, third and second in the World Cup Total Score.\r\n\r\nHis marriage in the summer of 2018 to long-time girlfriend Hedda preceded his spectacular start to the 2018-19 BMW IBU World Cup season. After the first trimester, Johannes had six victories and the lead in the World Cup Total Score.\r\n\r\nJohannes is well-known for his ski speed and his sense of humor.'),
(69, '2019-03-09 18:36:59', '../storage/e44a533f42_M_Fourcade.jpg', 'Martin Fourcade', 'Martin Fourcade has been the dominant name in biathlon since the 2011-12 season when he won his first of seven consecutive World Cup Total Score titles. In addition to the seven big Crystal Globes, Fourcade has also won 24 small Crystal Globes, sweeping all four disciplines on four occasions. He has won 10 individual IBU World Championships’ titles plus five Gold and two Silver medals in the Olympic Winter Games. Fourcade is known as a tenacious competitor, constantly challenging himself to reach new goals.'),
(70, '2019-03-09 18:41:03', '../storage/4704d60e52_A_Loginov.jpg', 'Alexandr Loginov', 'Loginov started professional in the late 2012–13 season, taking bronze medal in pursuit in Holmenkollen and gold as part of the relay team in Sochi. Loginov was provisionally suspended by IBU 25 November 2014, after re-testing of a sample of his from 26 November 2013 showed he\'d been doping with EPO. All his results from 26 November 2013 onwards were annulled, and he was handed a two-year ban from sports. The ban ended 25 November 2016.\r\nLoginov returned to sport in the 2016–17 season, winning bronze with his relay team at the Biathlon World Championships 2017. In the next season, Loginov while failing to finish in the top 3 progressed, finishing 23rd in the overall standings.'),
(72, '2019-03-09 19:30:54', '../storage/c969f03eed_S_Samuelsson.jpg', 'Sebastian Samuelsson', 'Sebastian Samuelsson is the rising star on the Swedish men\'s team. He won the IBU Rookie of the Year award in March 2017 just prior to turning 20 years old. Less than one year later, he won the Olympic Pursuit Silver medal at the 2018 Olympic Winter Games in Pyeongchang. Several days later, he capped his Olympic debut running the third leg for Sweden\'s Olympic Gold medal relay team.'),
(73, '2019-03-09 20:02:16', '../storage/8036069c78_J_Fak.jpg', 'Jakov Fak', 'Jakov Fak is probably one of the least known but most successful biathletes in the sport. Although only 30 –years-old, his biathlon career reaches all the way back to the 2002 IBU YJWCH in Ridnaun, Italy where he finished a forgettable 64th in the youth sprint with six penalties. Since that time, the Croatian-born Fak who now competes for Slovenia has gone from also-ran to World Cup winner, Olympic medalist and World Champion.\r\nThree podiums in December 2017 brought his career total up to 24. 91% shooting success brought the resurgent Fak back to third once again in the World Cup Total Score at the beginning of 2018.'),
(75, '2019-03-09 21:55:32', '../storage/4bc518c779_B_Doll.jpg', 'Benedikt Doll', 'Benedikt Doll finished 8th in the World Cup Total Score in the 2015-16 season, a career-best and a big step up from 21st the previous season. Doll has moved up rapidly in the German men’s team since 2011, the end of his junior career. As a junior, he won three relay Gold medals at the IBU YJWCH, as well as a Silver medal in the individual competition. In his first full season on the IBU cup, he won the Total Score as well as the sprint and pursuit titles. That earned him a few World Cup starts the next season, as well as his first World Cup podium in the Sochi pre-Olympic relay. Doll did not make the German Olympic team but by January of 2014 was a World Cup regular. That promotion paid off when he finished third in the sprint and then second in the pursuit at the season-ending Khanty Mansiysk World Cup. In the 2015-16 season, he claimed a spot on the German relay team that led to his first senior IBU WCH medal, Silver in the relay.'),
(76, '2019-03-09 22:16:20', '../storage/dcdde39cbb_T_Boe.jpg', 'Tarjei Boe', 'Tarjei Boe today has been one of the core members of the Norwegian men\'s team going back to 2010 when he ran the second leg on Norway\'s Olympic Gold medal relay team at the Vancouver Olympic Winter Games. Following that milestone event, Boe had a career season, winning the big Crystal Globe for the World Cup Total Score as well as small globes for the sprint and pursuit. That season, he won five IBU WCH medals at Khanty Mansiysk, a feat he would match in 2015 at Kontiolahti. He now owns 17 IBU WCH medals, of which eight are Gold medals.\r\n'),
(77, '2019-03-09 22:19:57', '../storage/2a22092dc2_S_Eder.jpg', 'Simon Eder', 'Simon Eder (born 23 February 1983) is an Austrian biathlete. His first World Cup win was in the Khanty-Mansiysk mass-start race on 29 March 2009.\r\nEder represented Austria at the 2010 Winter Olympics and in 2014 Winter Olympics. He won 2 medals: silver in the Men\'s relay in 2010, and a bronze in Men\'s relay in 2014. Both of the relays together with Daniel Mesotitsch, Dominik Landertinger and Christoph Sumann.\r\nHe is known for his fast shooting times, having recorded sub-20 second performances on the shooting range. He is the son of former biathlete and Austrian national biathlon coach Alfred Eder.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`) VALUES
(29, 'moder', '$2y$10$JOTCpPozPlyPvrkTf8GQUOEdvf87vMV/cpfeWPjTwTpyK6P8/re02', '2019-03-09 11:09:44', 'content_editor'),
(34, 'admin', '$2y$10$3ljnag377ZwfJcFJ9kNcfOOAs7zxhRthlUBnLrlzzv52b2QmOx/yW', '2019-03-09 12:30:04', 'admin'),
(35, 'user', '$2y$10$UTUX3qzDVOSHc7XwThBscu74y7lsOCHzg8i.qMyM/4RpbNyl9z.gi', '2019-03-09 21:56:14', 'reader');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
