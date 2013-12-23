-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 07:15 PM
-- Server version: 5.1.72-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `harvarde_p4_harvardextension_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `created`, `modified`, `user_id`, `content`) VALUES
(1, 1382890444, 1382890444, 4, 'I am so smart! I am so smart! S-M-R-T!'),
(2, 1382890864, 1382890864, 4, 'How much wood could a woodchuck chuck, if a woodchuck could chuck wood?'),
(3, 1382895677, 1382895677, 5, 'Whoa, what is this place?'),
(4, 1383543279, 1383543279, 4, 'Hello world once again!'),
(5, 1383614866, 1383614866, 4, 'This is so much fun!'),
(10, 1383659688, 1383659688, 4, 'This is the greatest website ever!'),
(11, 1383659837, 1383659837, 4, 'SOOOOO great!'),
(15, 1383689995, 1383689995, 8, 'Bring it on, Bane!'),
(16, 1383730612, 1383730612, 15, 'YAY I GOT IN!'),
(17, 1383730639, 1383730639, 15, 'This is pretty neat!'),
(18, 1383731796, 1383731796, 19, 'AUTOBOTS, ATTACK!'),
(19, 1383736564, 1383736564, 20, 'DIE OPTIMUS!'),
(20, 1387745201, 1387745201, 21, 'hi'),
(21, 1387745553, 1387745553, 21, 'yay');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verify` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `biography` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `post_total` int(11) NOT NULL DEFAULT '0',
  `games_played` int(11) NOT NULL DEFAULT '0',
  `hp_remaining` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `email_verify`, `location`, `biography`, `status`, `post_total`, `games_played`, `hp_remaining`) VALUES
(1, 0, 0, '', '', 1383012514, 0, 'Ed', 'Chik', 'edward@chik.ca', '', 'Toronto', 'Plugging away on PHP...', '', 0, 0, 0),
(2, 0, 0, '', 'iamharvard', 1383012514, 0, 'John', 'Harvard', 'john@harvardextension.biz', '', 'Cambridge', 'The man depicted in this statue is not John Harvard.', '', 0, 0, 0),
(3, 1381720253, 1381720253, 'bab12b950b0a60b2740acd2e7cb6b90c2b45c8cf', '0311e9099721688ba95ea2d9e4be08655f06b40a', 1383012514, 0, 'Harvard', 'Crimson', 'crimson@harvardextension.biz', '', 'Cambridge', 'Bringing the Crimson to Cambridge!', 'active', 0, 0, 0),
(4, 1382261114, 1383719427, '55519e5dca227b3afe1ee2f2c69b2ca49e60d671', '6598c44fbddca5d81590770b1edd0e0e3aa3706b', 1383717364, 0, 'Mister', 'Test', 'mr@test.com', '', 'Town of Testing', 'This is yet another test.', 'active', 6, 0, 0),
(5, 1382895560, 1382895560, 'c5f3457df9b852eb684754b700ecd1443b825d5e', '40f700e1e5fe305e70a3d89390e38c27919e08c1', 1383618982, 0, 'Eek', 'The Cat', 'eek@thecat.com', '', 'Catsville', 'EEK!', 'active', 1, 0, 0),
(6, 1382904829, 1383014015, '98d9dff229e93796eff078dce55d2759390b08a1', '26b4cd1e239da781c2d7acbd6ca1e8d36d715e46', 1383012514, 0, 'Hello', 'There', 'hello@there.com', '', 'The Void', 'Hello (hello hello hello)...', 'active', 0, 0, 0),
(7, 1383013487, 1383013487, '0f5d292d49d952163b51dd82e7758d69e8b922d0', '44026574dee92f77448177e875dcdf1ba8992977', 1383013654, 0, 'Clark', 'Kent', 'clark@thedailyplanet.com', '', 'Metropolis', 'Truth, justice and the American way!', 'active', 0, 0, 0),
(8, 1383020033, 1383020033, '24b5daa6cdac7d0749ef3d50ee756345ea18bdeb', 'abbee254a807dfbecd186cacaf98bf41494b12a5', 1383689985, 0, 'Bruce', 'Wayne', 'bruce@wayneenterprises.com', '', 'Gotham City', 'I AM THE NIGHT.', 'active', 1, 0, 0),
(10, 1383020081, 1383020081, 'd436e59e5629c8d48ba93e06f86f2fe611cb73fb', '81ffc90ef8b458434f99712f323eac3612e310e2', 0, 0, 'Selina', 'Kyle', 'contact@selinakyle.com', '', 'Gotham City', 'Meow.', 'active', 0, 0, 0),
(11, 1383533648, 1383533671, 'ee86d0fee9a50dbceae94556c8bf2ca9fd062cfd', 'f6f3b58073855b143103eedb9d2b24a49e1dfa57', 0, 0, 'Rob', 'Ford', 'mayor@toronto.com', '', 'Toronto', 'Mmm, controversy...', 'active', 0, 0, 0),
(13, 1383541456, 1383719575, 'ca35670651188727517e1d7bb2ad08138bb96b95', '1e41d1cfd66276709ad209dc6d54a2bee0c6380c', 0, 0, 'Edward', 'Chik', 'edward.chik@gmail.com', 'c4f1afc3bfe9da8f435ac003901af2653a32acf0', 'Toronto', 'All work and no play makes Edward...something something...', 'pending', 0, 0, 0),
(14, 1383693132, 1383693152, 'ea1af1ae1eb2c99c6e21eb72e5d509dd18b8327b', '06adb3d2bf67ec66d78b8e518ace5f72eb1eba75', 1383693140, 0, 'Grey', 'Ghost', 'grey@ghost.com', '43a839e0a844c47ddf403603f138dafce72ccb55', 'Ghostville', 'I prowl the streets at night!', 'pending', 0, 0, 0),
(15, 1383730445, 1383730445, 'a6bd206f39708351a05d113c7959b120bfd533f4', '9403edea5c5b67255c6e96f8c27df0f608d74f9b', 1383730455, 0, 'Mr', 'Bean', 'mr@bean.com', 'ea563cdd2c85f94adb437bcb94251b8ec64ae565', 'Beanville', 'I love beans!', 'pending', 2, 0, 0),
(16, 1383730978, 1383730978, 'f9b7ce3692ff1cef1caf6ba53ffe553ef6de4cce', '2d70f3cd0b7be70c024d10abddc453f627ad3c63', 0, 0, 'Sherlock', 'Holmes', 'contact@sherlock.com', '07f59cca6af0110850f3b0866889556526f71f38', 'Baskerville', 'I solve crimes.', 'pending', 0, 0, 0),
(17, 1383731283, 1383731283, '91a9738775743f5b80d7234daf770779b9f7cc27', '3f489e61e567c35480fe418e39585c6ecdc0c049', 0, 0, 'Doctor', 'Watson', 'watson@sherlock.com', '85203b62be0855d867c979425988896a121c10b9', 'Baskerville', 'I follow Sherlock around.', 'pending', 0, 0, 0),
(18, 1383731701, 1383731701, 'e9876dac358f645812e68949ee675b37dd791703', '672601c5f6a81cce75c7772dff8d3c221cd9a870', 0, 0, 'Doctor', 'Who', 'doctor@who.com', 'cbfc77224ec6e09509ca17592c6f6ae22f3f6019', 'space and time', 'I travel a lot!', 'pending', 0, 0, 0),
(19, 1383731763, 1383731763, 'a61fab9e14d5c54e3e2563e2f92eeef00091537f', '081da5ccf90e7535c853c34ce989ec8984adc0b3', 1383731782, 0, 'Optimus', 'Prime', 'optimus@transformers.com', '9f4d03759387699510c0997ad3ccb9f31e89eb2b', 'Earth', 'ROLL OUT!', 'pending', 1, 0, 0),
(20, 1383736542, 1383736542, 'afae8d464d8a12074f62f823ff90ad49a87c02dd', '081da5ccf90e7535c853c34ce989ec8984adc0b3', 1383736552, 0, 'Megatron', 'Prime', 'megatron@transformers.com', '', 'Earth', 'I WANT YOUR ENERGON!', '', 1, 0, 0),
(21, 1387684631, 1387684631, 'e938abcf005aa1f6ad0f94b53b2291dcbce35a5b', 'e23ff40bda3d9fe00d102b8db63195cac9122803', 1387745431, 0, 'testing', 'testing', 'testing@testing.com', '', 'testing', 'testing', '', 2, 0, 0),
(23, 1387688756, 1387688756, 'b86b56f58cd1a7cd6b06c937f0a37bb3ab7e3eb8', '23de1c831975cf0d60dc84d640e6ab57bb9e414e', 0, 0, 'testing2', 'testing2', 'testing2@testing2.com', '', 'testing2', 'testing2', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_users`
--

CREATE TABLE IF NOT EXISTS `users_users` (
  `user_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'FK. Follower.',
  `user_id_followed` int(11) NOT NULL COMMENT 'Followed.',
  PRIMARY KEY (`user_user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `users_users`
--

INSERT INTO `users_users` (`user_user_id`, `created`, `user_id`, `user_id_followed`) VALUES
(4, 1382895605, 5, 4),
(6, 1383014949, 5, 5),
(9, 1383619405, 5, 8),
(10, 1383619435, 8, 8),
(11, 1383619437, 8, 7),
(12, 1383619443, 8, 10),
(13, 1383619981, 8, 5),
(45, 1383704009, 4, 5),
(48, 1383704154, 4, 4),
(50, 1383704327, 4, 8),
(61, 1383730594, 15, 2),
(62, 1383730596, 15, 4),
(63, 1383730597, 15, 5),
(64, 1383730630, 15, 15),
(67, 1383731763, 19, 19),
(68, 1383736543, 20, 20),
(69, 1387684631, 21, 21),
(71, 1387688756, 23, 23),
(72, 1387744819, 21, 19);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_users`
--
ALTER TABLE `users_users`
  ADD CONSTRAINT `users_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
