-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2021 at 07:49 PM
-- Server version: 10.3.13-MariaDB-log
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_project`
--
CREATE DATABASE IF NOT EXISTS `first_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `first_project`;

-- --------------------------------------------------------

--
-- Table structure for table `list_card`
--

CREATE TABLE `list_card` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_card`
--

INSERT INTO `list_card` (`id`, `email`, `img`, `username`, `title`, `tel`, `address`) VALUES
(16, '', 'avatar-i.png', 'Jimmy Fellan', 'Accounting, Gotbootstrap Inc.', '+1 313-779-4314', '55 Smyth Rd, Detroit, MI, 48341, USA'),
(17, '', 'avatar-c.png', 'Alita Gray', 'Project Manager, Gotbootstrap Inc.', ' +1 313-461-1347', ' 134 Hamtrammac, Detroit, MI, 48314, USA'),
(18, '', 'avatar-k.png', 'Jim Ketty', 'Staff Orgnizer, Gotbootstrap Inc.', ' +1 313-779-3314', ' 134 Tasy Rd, Detroit, MI, 48212, USA'),
(19, '', 'avatar-g.png', 'Dr. John Oliver', 'Oncologist, Gotbootstrap Inc.', '+1 313-779-8134', '134 Gallery St, Detroit, MI, 46214, USA'),
(20, '', 'avatar-e.png', 'Dr. John Cook PhD', 'Human Resources, Gotbootstrap Inc.', ' +1 313-779-1347', ' 55 Smyth Rd, Detroit, MI, 48341, USA'),
(21, '', 'avatar-h.png', 'Sarah McBrook', 'Xray Division, Gotbootstrap Inc.', '+1 313-779-7613', '13 Jamie Rd, Detroit, MI, 48313, USA'),
(22, '', 'avatar-j.png', 'Arica Grace', 'Accounting, Gotbootstrap Inc.', '+1 313-779-3347', '798 Smyth Rd, Detroit, MI, 48341, USA'),
(23, '', 'avatar-b.png', 'Oliver Kopyov', 'IT Director, Gotbootstrap Inc.', ' +1 317-456-2564', ' 15 Charist St, Detroit, MI, 48212, USA');

-- --------------------------------------------------------

--
-- Table structure for table `list_status`
--

CREATE TABLE `list_status` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_status`
--

INSERT INTO `list_status` (`id`, `id_user`) VALUES
(2, 1),
(4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `list_users`
--

CREATE TABLE `list_users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_users`
--

INSERT INTO `list_users` (`id`, `login`, `password`) VALUES
(1, 'test@test.com', 'test'),
(15, 'test12@test.com', '$2y$10$F/Bu1.XusigvCpJevQQjnuzPUw.oMgdci4r7FwRw2qkfC1ogtkO0m'),
(16, 'test22@test.com', '$2y$10$HRMh7wlNM5TE3B8vN1oSn.Jo7n5oZsqyXZuuWKhLgIvUxIgPPSzlK'),
(17, 'bob@vk.ru', '$2y$10$cy83rK9xcZbEfLUcRRh61OAm3p4sGWfzjD6.iLb.xJHl3c8eSyhMO'),
(18, 'bob1@vk.ru', '$2y$10$kF05uL1RNs1en/TLl7NX/eWt/9wWMzevx/T8iK7G7CwdJXFDgjVfG'),
(19, 'bob22@vk.ru', '$2y$10$Yc9eI6td27nPAntD79UC8eN3WAnDra21oXdVArVrRt7JbK5cfcFb.'),
(20, 'mail@mail.ru', '$2y$10$YIuVPTYZVezgdZSMWVDpQurhWzkiOuGxPxFOs/igXHlH0B791MLAO'),
(21, 'admin@admin.com', '$2y$10$dxxs/Y7Wikss4WxkUKMPmeSzYW0llp/6xC/k1/73ZHk6kBQOXFYD6'),
(22, 'text', 'text'),
(23, 'oliver.kopyov@smartadminwebapp.com', '$2y$10$qQkneFOEGZhyNntXBl9toOppijiG8r84adgQd46uweD0UvlTk1g0S'),
(24, 'admin@adminq', '$2y$10$2Q2K6r91qcKeEPsWATsz7eW8iQnd97KcTbhRQK16iEzcrHCzMSbXa'),
(25, 'admin@admin1.com', '$2y$10$5nGp4KYZ0cMthtg.loIBleFOz8uLpJ7ebASMSlpjOs1u.RrDQExtS'),
(26, 'admin25@admin.com', '$2y$10$QB5o/HfCj2cc2Kgucnyt5epsMRlF48muYNvhnuIjKTulaby87JEC6'),
(27, 'admin45@admin.com', '$2y$10$7WYyKg0HmdwhR0FsUOewoO4gDH.r.d97aCrxBHTWiJactBIOPXm9i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_card`
--
ALTER TABLE `list_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_status`
--
ALTER TABLE `list_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users` (`id_user`);

--
-- Indexes for table `list_users`
--
ALTER TABLE `list_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_card`
--
ALTER TABLE `list_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `list_status`
--
ALTER TABLE `list_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list_users`
--
ALTER TABLE `list_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_card`
--
ALTER TABLE `list_card`
  ADD CONSTRAINT `list_card_ibfk_1` FOREIGN KEY (`id`) REFERENCES `list_users` (`id`);

--
-- Constraints for table `list_status`
--
ALTER TABLE `list_status`
  ADD CONSTRAINT `list_status_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `list_users` (`id`);
--
-- Database: `my_project`
--
CREATE DATABASE IF NOT EXISTS `my_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `my_project`;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `First Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `First Name`, `Last Name`, `Username`) VALUES
(1, 'Mark', 'Otto', '@mdo'),
(2, 'Jacob', 'Thornton', '@fat'),
(3, 'Larry', 'the Bird', '@twitter'),
(4, 'Larry the Bird', 'Bird', '@twitter');

-- --------------------------------------------------------

--
-- Table structure for table `mydb`
--

CREATE TABLE `mydb` (
  `id` int(11) NOT NULL,
  `news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mydb`
--

INSERT INTO `mydb` (`id`, `news`) VALUES
(24, '12'),
(25, '12'),
(26, 'as'),
(27, 'ass'),
(28, 'asss'),
(29, 'asssssss'),
(30, '1984'),
(31, '202111'),
(32, '2015'),
(33, 'assssss'),
(34, 'Mom'),
(35, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `my_table`
--

CREATE TABLE `my_table` (
  `id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_table`
--

INSERT INTO `my_table` (`id`, `note`) VALUES
(1, 'adaecec'),
(2, 'FSDFDSFSDF'),
(3, 'FSDFDSFSDF'),
(4, 'FSDFDSFSDF'),
(5, 'FSDFDSFSDF'),
(6, 'aaassasasasas'),
(7, 'еее баласа'),
(8, '19841986'),
(9, 'Adambalasi'),
(10, 'qwert'),
(11, 'asdffg'),
(12, '1984'),
(13, '2021'),
(14, '2021'),
(15, '2021'),
(16, 'qsdd'),
(17, '2012');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link_href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_link_href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_link_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_link_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `img`, `img_alt`, `name`, `job_title`, `twitter_link_href`, `twitter_link_text`, `email_link_href`, `email_link_text`, `email_link_title`, `status`) VALUES
(1, 'img/demo/authors/sunny.png', 'Sunny A.', 'Sunny A. (UI/UX Expert)', 'Lead Author', 'https://twitter.com/@myplaneticket', '@myplaneticket', 'https://wrapbootstrap.com/user/myorange', '<i class=\"fal fa-envelope\"></i>', 'Contact Sunny', 'activ'),
(2, 'img/demo/authors/josh.png', 'Jos K.', 'Jos K. (ASP.NET Developer)', 'Partner &amp; Contributor', 'https://twitter.com/@atlantez', '@atlantez', 'https://wrapbootstrap.com/user/Walapa', '<i class=\"fal fa-envelope\"></i>', 'Contact Jos', 'activ'),
(3, 'img/demo/authors/jovanni.png', 'Jovanni Lo', 'Jovanni L. (PHP Developer)', 'Partner &amp; Contributor', 'https://twitter.com/@lodev09', '@lodev09', 'https://wrapbootstrap.com/user/lodev09', '<i class=\"fal fa-envelope\"></i>', 'Contact Jovanni', 'banned'),
(4, 'img/demo/authors/roberto.png', 'Roberto R.', 'Roberto R. (Rails Developer)', 'Partner &amp; Contributor', 'https://twitter.com/@sildur', '@sildur', 'https://wrapbootstrap.com/user/sildur', '<i class=\"fal fa-envelope\"></i>', 'Contact Roberto', 'banned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mydb`
--
ALTER TABLE `mydb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_table`
--
ALTER TABLE `my_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mydb`
--
ALTER TABLE `mydb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `my_table`
--
ALTER TABLE `my_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `qwerty`
--
CREATE DATABASE IF NOT EXISTS `qwerty` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `qwerty`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `registration_date`) VALUES
(1, 'Bob', 'tina@gmail.com', 'qwerty123', '2021-08-10'),
(2, 'Bob1', 'tina12@gmail.com', 'qwerty123', '2021-08-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `qwerty1`
--
CREATE DATABASE IF NOT EXISTS `qwerty1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `qwerty1`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
