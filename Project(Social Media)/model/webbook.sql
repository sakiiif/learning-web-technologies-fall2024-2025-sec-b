-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2025 at 07:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` varchar(2000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment_text`, `time`) VALUES
(1, 64, 42748057, 'my first comment', '2025-01-16 21:58:11'),
(2, 64, 42748057, 'good one', '2025-01-16 22:39:46'),
(3, 64, 42748057, 'dsg', '2025-01-16 22:40:22'),
(4, 64, 42748057, 'vcb sdrfg', '2025-01-16 22:54:52'),
(5, 63, 42748057, 'i am qq', '2025-01-16 23:26:04'),
(6, 61, 42748057, 'qq', '2025-01-16 23:26:11'),
(8, 64, 39942367, 'good', '2025-01-16 23:27:30'),
(9, 64, 39942367, 'ok', '2025-01-16 23:27:41'),
(10, 65, 12278012, 'ok', '2025-01-16 23:28:21'),
(11, 65, 20971401, 'ok', '2025-01-16 23:28:43'),
(13, 65, 81469691, 'this i', '2025-01-16 23:48:15'),
(15, 64, 81469691, 'this is my comment\r\n', '2025-01-16 23:48:59'),
(17, 65, 81469691, 'safc', '2025-01-16 23:55:30'),
(19, 65, 39942367, 'asdasd', '2025-01-16 23:55:58'),
(20, 62, 39942367, 'vxz', '2025-01-16 23:56:07'),
(21, 63, 39942367, 'gedgdsf', '2025-01-16 23:56:19'),
(22, 65, 39942367, '', '2025-01-22 17:57:40'),
(23, 65, 39942367, 'ererererr', '2025-01-22 18:00:29'),
(25, 67, 39942367, 'joss', '2025-01-22 18:24:40'),
(26, 0, 39942367, '', '2025-01-24 17:35:17'),
(27, 0, 39942367, '', '2025-01-24 17:35:51'),
(28, 0, 39942367, '', '2025-01-24 17:39:18'),
(29, 0, 39942367, '', '2025-01-24 17:59:33'),
(30, 0, 39942367, '', '2025-01-24 18:02:22'),
(31, 0, 39942367, '', '2025-01-24 18:04:12'),
(32, 0, 39942367, '', '2025-01-24 18:04:18'),
(33, 0, 39942367, '', '2025-01-24 18:04:31'),
(34, 0, 39942367, '', '2025-01-24 18:06:21'),
(35, 0, 39942367, '', '2025-01-24 18:08:20'),
(36, 0, 39942367, '', '2025-01-24 18:08:22'),
(37, 0, 39942367, '', '2025-01-24 18:08:27'),
(38, 0, 39942367, '', '2025-01-24 18:09:23'),
(39, 68, 39942367, 'helo', '2025-01-24 18:15:57'),
(40, 68, 39942367, 'helo', '2025-01-24 18:16:09'),
(41, 68, 39942367, 'helo', '2025-01-24 18:16:13'),
(42, 68, 39942367, 'helo2', '2025-01-24 18:17:20'),
(43, 68, 39942367, 'hello3', '2025-01-24 18:29:33'),
(44, 68, 39942367, 'hello4', '2025-01-24 18:30:34'),
(45, 68, 39942367, 'hello5', '2025-01-25 05:48:12'),
(46, 69, 39942367, 'pandacom', '2025-01-25 05:49:13'),
(47, 69, 39942367, 'dsad', '2025-01-25 05:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `friend_user_id` int(11) NOT NULL,
  `request` int(10) NOT NULL,
  `accepted` int(1) DEFAULT 0,
  `rejected` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_user_id`, `request`, `accepted`, `rejected`) VALUES
(1, 39942367, 7859770, 0, 1, 0),
(2, 39942367, 22380989, 0, 1, 0),
(3, 7859770, 39942367, 0, 1, 1),
(4, 7859770, 6543672, 1, 1, 0),
(5, 7859770, 39942367, 0, 1, 1),
(6, 7859770, 39942367, 0, 1, 1),
(7, 7859770, 39942367, 0, 1, 1),
(8, 7859770, 39942367, 0, 1, 1),
(9, 7859770, 6543672, 1, 1, 0),
(10, 7859770, 6543672, 1, 1, 0),
(11, 7859770, 6543672, 1, 1, 0),
(12, 39942367, 6543672, 1, 1, 0),
(13, 39942367, 6543672, 1, 1, 0),
(14, 39942367, 6543672, 1, 1, 0),
(15, 39942367, 6543672, 1, 1, 0),
(16, 39942367, 7859770, 0, 1, 0),
(17, 39942367, 7859770, 0, 1, 0),
(18, 39942367, 7859770, 0, 1, 0),
(19, 39942367, 7859770, 0, 1, 0),
(20, 39942367, 7859770, 0, 1, 0),
(21, 39942367, 7859770, 0, 1, 0),
(22, 39942367, 7859770, 0, 1, 0),
(23, 39942367, 7859770, 0, 1, 0),
(24, 39942367, 6543672, 1, 1, 0),
(25, 39942367, 6543672, 1, 1, 0),
(26, 39942367, 6543672, 1, 1, 0),
(27, 39942367, 6543672, 1, 1, 0),
(28, 39942367, 22380989, 0, 1, 0),
(29, 39942367, 22380989, 0, 1, 0),
(30, 39942367, 22380989, 0, 1, 0),
(31, 39942367, 6543672, 1, 1, 0),
(32, 39942367, 6543672, 1, 1, 0),
(33, 39942367, 6543672, 1, 1, 0),
(34, 39942367, 6543672, 1, 1, 0),
(35, 39942367, 23641444, 0, 1, 0),
(36, 39942367, 23641444, 0, 1, 0),
(37, 7859770, 23641444, 0, 1, 0),
(38, 7859770, 23641444, 0, 1, 0),
(39, 7859770, 23641444, 0, 1, 0),
(40, 7859770, 23641444, 0, 1, 0),
(41, 22380989, 39942367, 0, 0, 1),
(42, 22380989, 6543672, 1, 0, 0),
(43, 22380989, 6543672, 1, 0, 0),
(44, 6543672, 39942367, 1, 1, 0),
(45, 6543672, 39942367, 1, 1, 0),
(46, 23641444, 39942367, 0, 1, 0),
(47, 22380989, 23641444, 1, 0, 0),
(48, 22380989, 23641444, 1, 0, 0),
(49, 12278012, 20971401, 0, 1, 1),
(50, 12278012, 31125157, 1, 0, 0),
(51, 12278012, 68115094, 1, 0, 0),
(52, 12278012, 68115094, 1, 0, 0),
(53, 12278012, 68115094, 1, 0, 0),
(54, 12278012, 39942367, 0, 1, 0),
(55, 12278012, 39942367, 0, 1, 0),
(56, 12278012, 39942367, 0, 1, 0),
(57, 12278012, 39942367, 0, 1, 0),
(58, 12278012, 39942367, 0, 1, 0),
(59, 12278012, 39942367, 0, 1, 0),
(60, 12278012, 39942367, 0, 1, 0),
(61, 12278012, 22380989, 1, 0, 0),
(62, 12278012, 22380989, 1, 0, 0),
(63, 68115094, 20971401, 0, 1, 0),
(64, 68115094, 20971401, 0, 1, 0),
(65, 68115094, 39942367, 1, 0, 0),
(66, 68115094, 39942367, 1, 0, 0),
(67, 68115094, 39942367, 1, 0, 0),
(68, 68115094, 31125157, 1, 0, 0),
(69, 68115094, 31125157, 1, 0, 0),
(70, 68115094, 12278012, 1, 0, 0),
(71, 68115094, 12278012, 1, 0, 0),
(72, 68115094, 12278012, 1, 0, 0),
(73, 68115094, 23641444, 1, 0, 0),
(74, 39942367, 12278012, 0, 1, 0),
(75, 81469691, 39942367, 0, 1, 0),
(76, 81469691, 12278012, 0, 1, 0),
(77, 81469691, 20971401, 0, 1, 0),
(78, 81469691, 7859770, 0, 1, 0),
(79, 39942367, 81469691, 1, 0, 0),
(80, 39942367, 20971401, 0, 1, 0),
(81, 20971401, 31125157, 1, 0, 0),
(82, 20971401, 7859770, 1, 0, 0),
(83, 42748057, 12278012, 0, 1, 0),
(84, 42748057, 20971401, 0, 1, 0),
(85, 42748057, 31125157, 0, 0, 1),
(86, 31125157, 42748057, 0, 1, 0),
(87, 39942367, 42748057, 0, 1, 0),
(88, 42748057, 22380989, 1, 0, 0),
(89, 42748057, 7859770, 1, 0, 0),
(90, 31125157, 39942367, 0, 1, 0),
(91, 39942367, 579069, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status` mediumtext DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status`, `time`, `user_id`, `id`, `photo_url`) VALUES
('how are you', '2025-01-07 20:34:36', 39942367, 1, NULL),
('this is my 2nd post', '2025-01-07 20:48:26', 39942367, 3, NULL),
('this is my 2nd post', '2025-01-07 21:50:02', 0, 4, NULL),
('this is my 2nd post', '2025-01-07 21:55:09', 0, 5, NULL),
('A Facebook status is a short post that users can share on their profile to express thoughts, updates', '2025-01-08 02:31:43', 39942367, 7, NULL),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:26', 39942367, 8, NULL),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:32', 39942367, 9, NULL),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:37', 39942367, 10, NULL),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:40', 39942367, 11, NULL),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:50', 39942367, 12, NULL),
('Starting this week with a positive mindset and endless possibilities. 🌟 Embracing the little moments that make life worthwhile. Grateful for the journey so far, but excited for what’s to come. Sometimes, the best way to find yourself is to lose yourself in new experiences. Taking one step at a time, knowing the best is yet to come. Learning to appreciate the quiet moments of reflection. Surrounding myself with good energy and positive vibes. Hoping for new opportunities and adventures to come my way. Letting go of the things that no longer serve me. Here’s to growth, self-love, and endless dreams. ✨', '2025-01-08 02:36:24', 39942367, 13, NULL),
('Tried to be productive today... but Netflix had other plans. 😅 #ProcrastinationLevelExpert', '2025-01-08 02:37:16', 39942367, 14, NULL),
('Tried to be productive today... but Netflix had other plans. 😅 #ProcrastinationLevelExpert', '2025-01-08 02:37:24', 39942367, 15, NULL),
('Tried to be productive today... but Netflix had other plans. 😅 #ProcrastinationLevelExpert', '2025-01-08 02:37:31', 39942367, 16, NULL),
('why duplicating ', '2025-01-08 02:38:14', 39942367, 17, NULL),
('why duplicating ', '2025-01-08 02:38:18', 39942367, 18, NULL),
('why duplicating ', '2025-01-08 02:38:24', 39942367, 19, NULL),
('why duplicating ', '2025-01-08 02:43:19', 39942367, 20, NULL),
('', '2025-01-08 02:43:32', 39942367, 21, NULL),
('now?', '2025-01-08 02:43:56', 39942367, 22, NULL),
('how about now?', '2025-01-08 02:44:29', 39942367, 23, NULL),
('how about now?', '2025-01-08 02:44:33', 39942367, 24, NULL),
('how about now?', '2025-01-08 02:44:36', 39942367, 25, NULL),
('how about now?', '2025-01-08 02:44:42', 39942367, 26, NULL),
('how about now?', '2025-01-08 02:44:46', 39942367, 27, NULL),
('', '2025-01-08 02:45:04', 39942367, 28, NULL),
('whats going on', '2025-01-08 02:45:44', 39942367, 30, NULL),
('Albert Einstein\r\n\"The important thing is not to stop questioning. Curiosity has its own reason for existing. One cannot help but be in awe when he contemplates the mysteries of eternity, of life, of the marvelous structure of reality. It is enough if one tries merely to comprehend a little of this mystery every day. Never lose a holy curiosity.\"', '2025-01-08 02:47:15', 39942367, 32, NULL),
('my first post\r\n', '2025-01-08 16:32:26', 6543672, 37, NULL),
('sdgfgs', '2025-01-08 16:41:55', 7859770, 39, NULL),
('this is my first post\r\nsdfds', '2025-01-08 16:42:08', 7859770, 40, NULL),
('this is sakif ROy', '2025-01-08 16:43:07', 22380989, 41, NULL),
('i am a\r\n', '2025-01-13 17:17:59', 12278012, 46, NULL),
('this is a\r\n', '2025-01-13 17:22:18', 12278012, 47, NULL),
('this is latest', '2025-01-13 17:24:11', 12278012, 48, NULL),
('this is b', '2025-01-13 17:31:14', 20971401, 49, NULL),
('this is c', '2025-01-13 17:31:43', 31125157, 50, NULL),
('this is d', '2025-01-13 17:32:10', 68115094, 51, NULL),
('test', '2025-01-14 02:56:11', 7859770, 55, NULL),
('testing\r\ntest', '2025-01-14 02:56:17', 7859770, 56, NULL),
('dsfhdj sdfhjkdfhdh khsak', '2025-01-14 02:56:30', 7859770, 57, NULL),
('this is e', '2025-01-14 03:08:03', 81469691, 58, NULL),
('this is  e e\r\n', '2025-01-14 03:40:08', 81469691, 59, NULL),
('this is zafir ken zaman', '2025-01-14 03:43:44', 39942367, 60, NULL),
('hi ', '2025-01-14 03:54:07', 39942367, 61, NULL),
('dhjBfSDHJ', '2025-01-16 16:53:03', 42748057, 62, NULL),
('this is q', '2025-01-16 16:57:34', 42748057, 63, NULL),
('this is recent post', '2025-01-16 16:59:12', 39942367, 64, NULL),
('post after comments are inplemented', '2025-01-16 23:27:18', 39942367, 65, NULL),
('yoyoyoyo', '2025-01-22 18:07:30', 39942367, 66, NULL),
('pro pic', '2025-01-22 18:23:53', 39942367, 67, 'rafi2.jpg'),
('dawada', '2025-01-24 16:24:37', 39942367, 68, 'rafi1.jpg'),
('panda', '2025-01-25 05:48:59', 39942367, 69, '444.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `edu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`first_name`, `last_name`, `gender`, `email`, `password`, `user_id`, `image`, `dob`, `city`, `address`, `bio`, `relationship`, `country`, `edu`) VALUES
('', '', 'male', 'sakif.rafi3@gmail.com', '', 579069, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('jamiul', 'islam', 'male', 'lazim_islam@gmail.com', '9806', 6543672, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('sadia', 'islam', 'male', 'sadiaislam9806@gmail.com', '1', 7859770, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('a', 'a', 'male', 'a@gmail.com', 'a', 12278012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Zafir ken', 'Zaman', '', '', '', 12328867, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('a', 'a', 'male', 'a@gmail.cm', 'aa', 16600079, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b', 'b', 'male', 'b@gmail.com', 'b', 20971401, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('sakif', 'roy', 'male', 'sakifroy@gmail.com', '1', 22380989, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('a', 'b', 'male', 'abc@gmail.com', '1', 23641444, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifullahrafi7@gmail.com', 'aaaaaaaaA1!', 23829356, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifullahrafi6@gmail.com', 'aaaaaaaaA1!', 25747819, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('c', 'c', 'male', 'c@gmail.com', 'c', 31125157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifafi3@gmail.com', 'aaaaaaaaA1!', 36691749, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifullahrafi8@gmail.com', 'aaaaaaaaA1!', 38827022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Zafir Ken', 'Zaman', 'male', 'zafirkenzaman9806@gmail.com', '1', 39942367, 'rafi2.jpg', '25-05-2021', 't', 'rt', 'rt', 'ter', 'rt', 'rt'),
('Dema', 'aa', 'male', 'sakif.ra3@gmail.com', 'aaaaaaaA1!', 40970892, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('q', 'q', 'male', 'q@gmail.com', 'q', 42748057, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifullahrafi9@gmail.com', 'aaaaaaaaA1!', 49036296, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifullahrafi4@ail.com', 'aaaaaaaaA1!', 59188723, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifullahrafi5@gmail.com', 'aaaaaaaaA1!', 65663572, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Dema', 'aa', 'male', 'sakifullahrafi4@mail.com', 'aaaaaaaaA1!', 66077596, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('d', 'd', 'male', 'd@gmail.com', 'd', 68115094, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', 'male', 'sakifullahrafi4@gmail.comdsd', '', 71384221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('e', 'e', 'male', 'e@gmail.com', 'e', 81469691, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', 'male', 'sakifullahrafi4@gmail.com', '', 88549385, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', 'male', 'a@gmai.com', '', 95362537, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('a', 'a', 'male', 'a@gmail.c', 'aa', 99501765, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99501766;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
