-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 05:46 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `image`, `date`) VALUES
(2, 'about 2', 'AAAAAAAA', 'a127d3cf675a3f11ec657e750c6a040b.jpg', '2018-09-10'),
(3, 'about 3', 'AAAAAAAA', 'bbba466ceb7278336c94d4f693188de7.jpg', '2018-09-10'),
(4, 'about 4', 'AAAAAAAA', 'bbba466ceb7278336c94d4f693188de7.jpg', '2018-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `contact_reply`
--

CREATE TABLE `contact_reply` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_reply`
--

INSERT INTO `contact_reply` (`id`, `contact_id`, `message`, `seen`) VALUES
(1, 5, 'test', 1),
(2, 5, 'wesfsdsf', 1),
(3, 6, 'asdsasda adasdas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `type`, `user_id`, `file`) VALUES
(3, 'mohamed', 'mohamed@Test.com', 'Please check this new event ...\r\ndescription : new event\r\ndate : 30-11-2018.', 2, 0, ''),
(5, 'test', 'test@test.com', 'asdasdasdasdasdasdasd', 1, 4, 'e79091e3d510538a8cd2c4b292f9ab83.png'),
(6, 'VM', 'info@vm.com', 'asdjkhasjhkasjhdjhkasdhasjkhdashjdka had jkas hdashjdashkd ', 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `date`) VALUES
(1, 'Test Event', 'test test test test test test test test test test test test test test test test test test test test test test test test ', '3f5e7ab33c36ecdfe4ba43f76b7f4f27.png', '2018-10-31'),
(2, 'Test Event 2', 'test test test test test test test test test test test test test test test test test test test test test test test test ', 'ea83ef7fdb93c914ad5c54899f1bba35.jpg', '2018-10-31'),
(3, 'Test Event 3', 'test test test test test test test test test test test test test test test test test test test test test test test test ', '', '2018-10-31'),
(4, 'Test Event 4', 'test test test test test test test test test test test test test test test test test test test test test test test test ', '', '2018-10-31'),
(5, 'test news', 'test news', 'a10e7cb502888e4bdf17eeae1770bb6b.png', '2018-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `company` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `description`, `company`, `date`) VALUES
(1, 'New Job edited', 'New JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew Job v New Job', 5, '2018-11-30'),
(2, 'New Job', 'New JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew Job v New Job', 7, '2018-11-30'),
(3, 'New Job', 'New JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew JobNew Job v New Job', 8, '2018-11-30'),
(5, 'job gdeeda', 'description', 7, '2018-11-15'),
(6, 'test job', 'aaaa', 8, '2018-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `date`) VALUES
(1, 'News', 'NewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNewsNews', '298c60757835937b93c4c0f5ac08e266.jpeg', '2018-11-29'),
(2, 'news', 'news news news news news news news news ', '', '2018-10-29'),
(3, 'news', 'news news news news news news news news ', '', '2018-10-29'),
(4, 'news', 'news news news news news news news news ', '', '2018-10-29'),
(5, 'news', 'news news news news news news news news ', '', '2018-10-29'),
(6, 'news', 'news news news news news news news news ', '', '2018-10-29'),
(7, 'news', 'news news news news news news news news ', 'fc0aa5aa7865a9c23638e7ab96359d58.jpg', '2018-10-29'),
(8, 'asdasdasd', 'asjdsmdjhkas', '0712b39800f1094de4c067ef2a2ae83e.png', '2018-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'company'),
(3, 'graduated student');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `description`, `file`, `date`) VALUES
(1, 'service', 'serviceserviceserviceservicev service service serviceservice serviceserviceserviceservicev service service serviceservice serviceserviceserviceservicev service service serviceservice serviceserviceserviceservicev service service serviceservice serviceserviceserviceservicev service service serviceservice', '9d87e8faa406cf2d64512f20a966a018.png', '2018-11-30'),
(2, 'new service', 'new service', '71597b279761f2b45072b30504af2197.pdf', '2018-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `name`, `number`) VALUES
(1, 'Graduated Student', '30 Student'),
(3, 'Companies', '80 Company'),
(4, 'Events', '50 Event'),
(5, 'News', '100 News'),
(6, 'Jobs', '1000 Job\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `description`, `phone`, `address`, `role`, `status`) VALUES
(1, 'mohamed', 'ahmed', 'Mohamed admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '', 1, 1),
(4, 'test', 'test', 'test', 'test@test.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '', 3, 1),
(5, 'VM', 'VM', 'VM', 'info@vm.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '', 2, 1),
(7, 'gateOut', 'gateOut', 'gateOut', 'gateOut@gateOut.com', '68eacb97d86f0c4621fa2b0e17cabd8c', 'asdasdasasasdasd', '01158233977', 'gateOut gateOut gateOutsssssssssss', 2, 0),
(8, 'Vision', 'Vision', 'Vision', 'Vision@Vision.com', '21232f297a57a5a743894a0e4a801fc3', 'asdasdasdasdsad asd asd asd asd a dasd ', '01115823232', 'aaaaaaa', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_reply`
--
ALTER TABLE `contact_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_reply`
--
ALTER TABLE `contact_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_reply`
--
ALTER TABLE `contact_reply`
  ADD CONSTRAINT `contact_reply_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact_us` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`company`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
