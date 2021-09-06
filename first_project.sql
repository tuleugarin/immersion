-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 02, 2021 at 04:39 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `list_users`
--

CREATE TABLE `list_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_users`
--

INSERT INTO `list_users` (`id`, `email`, `password`, `img`, `username`, `title`, `tel`, `address`, `role`, `status`) VALUES
(16, 'alfa@test.com', '$2y$10$HRMh7wlNM5TE3B8vN1oSn.Jo7n5oZsqyXZuuWKhLgIvUxIgPPSzlK', 'avatar-i.png', 'Jimmy Fellanio', 'Accounting, Gotbootstrap Inc.', '+1 313-779-4314', '55 Smyth Rd, Detroit, MI, 48341, USA', '', 'Онлайн'),
(17, 'bob@vk.ru', 'bob', 'avatar-c.png', 'Alita Gray', 'Project Manager, Gotbootstrap Inc.', ' +1 313-461-1347', ' 134 Hamtrammac, Detroit, MI, 48314, USA', '', 'Отошел'),
(18, 'bob1@vk.ru', 'werqqq', 'avatar-k.png', 'Jim Ketty', 'Staff Orgnizer, Gotbootstrap Inc.', ' +1 313-779-3314', ' 134 Tasy Rd, Detroit, MI, 48212, USA', '', 'Не беспокоить'),
(19, 'bob22@vk.ru', 'bob22@vk.ru', 'avatar-g.png', 'Dr. John Oliver', 'Oncologist, Gotbootstrap Inc.', '+1 313-779-8134', '134 Gallery St, Detroit, MI, 46214, USA', '', ''),
(20, 'mail@mail.ru', '$2y$10$YIuVPTYZVezgdZSMWVDpQurhWzkiOuGxPxFOs/igXHlH0B791MLAO', 'avatar-e.png', 'Dr. John Cook PhD', 'Human Resources, Gotbootstrap Inc.', '+1 313-779-1347', '55 Smyth Rd, Detroit, MI, 48341, USA', '', 'Отошел'),
(21, 'admin@admin.com', '$2y$10$dxxs/Y7Wikss4WxkUKMPmeSzYW0llp/6xC/k1/73ZHk6kBQOXFYD6', 'avatar-h.png', 'Sarah McBrook', 'Xray Division, Gotbootstrap Inc.', '+1 313-779-7613', '13 Jamie Rd, Detroit, MI, 48313, USA', 'admin', ''),
(22, 'text', 'text', 'avatar-j.png', 'Arica Grace', 'Accounting, Gotbootstrap Inc.', '+1 313-779-3347', '798 Smyth Rd, Detroit, MI, 48341, USA', '', ''),
(23, 'oliver.kopyov@smartadminwebapp.com', '$2y$10$qQkneFOEGZhyNntXBl9toOppijiG8r84adgQd46uweD0UvlTk1g0S', 'avatar-b.png', 'Oliver Kopyova', 'IT Director, Gotbootstrap Inc.', ' +1 317-456-2564', ' 15 Charist St, Detroit, MI, 48212, USA', '', ''),
(80, 'lord1@admin.com', '$2y$10$QQktIm0TFuVyvLAxNoT/Ee.Y/zm6bhKfOcJIDPbv03j0NbJ8URaym', '612f8df3cdfd2.jpeg', 'Zhassulan', 'BRAVUS', '87026987864', 'Aqtobe', '', 'Не беспокоить');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_users`
--
ALTER TABLE `list_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_users`
--
ALTER TABLE `list_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
