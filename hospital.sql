-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2018 at 07:17 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_home` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_you` text COLLATE utf8mb4_unicode_ci,
  `primary_and_secondary_objectives` text COLLATE utf8mb4_unicode_ci,
  `professional_expertise` tinyint(3) UNSIGNED DEFAULT NULL,
  `industry_vertical_experience` tinyint(3) UNSIGNED DEFAULT NULL,
  `areas_of_business_and_management_competence` tinyint(3) UNSIGNED DEFAULT NULL,
  `time_commitment` int(11) DEFAULT NULL,
  `days_of_week` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suitable_time` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked_in` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `gender`, `image`, `mobile`, `telephone_office`, `telephone_home`, `dob`, `roll`, `email`, `address`, `company_name`, `designation`, `about_you`, `primary_and_secondary_objectives`, `professional_expertise`, `industry_vertical_experience`, `areas_of_business_and_management_competence`, `time_commitment`, `days_of_week`, `suitable_time`, `linked_in`, `facebook`, `twitter`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sunny', 1, NULL, NULL, NULL, NULL, NULL, '1', 'sunny@gmail.com', '', '', '', '', '0', 0, 0, 0, 0, '0', '', '', NULL, NULL, '$2y$10$0CkL/YzTeye.ei4KSE.ou.P8PR1h6fko91ISp2FG2g9fVg/3e2lVS', '3S9L0ftP9oEHMToEQUUPCRqkCX6QAM9efjcEMrBVrMXxcirQF9fyWvbvIHhA', NULL, NULL),
(5, 'kbk', 1, '79e16f8ecb2f2db2b346db4d2917f4864d56ebf0Screenshot_2017-05-29-11-37-03.png', '9898989989', '987989', '98798', '2017-05-21', '2', 'isc2013008@gmail.com', 'kbkjbkjb', 'jbkjb', 'jbkjb', 'We would like to learn more about you – your passions, areas of interest, entrepreneurial experience. Please describe yourself in the rea below (200 words)', 'We would like to learn more about you – your passions, areas of interest, entrepreneurial experience. Please describe yourself in the rea below (200 words)', 2, 15, 1, 6, '6', '6', NULL, NULL, NULL, '$2y$10$10DvEB7R8b7HTL.BnATG9.PZQrj5cJa/50R3PJdohL9IaHREmdOeC', NULL, '2018-06-23 11:47:20', '2018-06-23 11:47:20'),
(6, 'Admin 6', 1, 'a9a0b8c0d06fe3da0d718538a6f5d93f18e31649556846_1397573680475268_1071264548_n.jpg', '9838094237', '1231231234', '1231231234', '2010-06-01', '2', 'sunny6142@gmail.com', 'Dhussa Post Pipal Gaon Dist Allahabad', 'Bugle', 'Software Developer', 'We would like to learn more about you – your passions, areas of interest, entrepreneurial experience. Please describe yourself in the rea below (200 words)', 'What are your primary and secondary objectives and expectations in being involved with the mentor network? How do you think you would be able to add value to these start-ups? (Max 200 words)', 1, 5, 1, 4, 'Mon , Tue, Web', '4pm - 5 pm', NULL, NULL, NULL, '$2y$10$3xELSLm.Ix3goRZc2NKWXODJhin1aboiwKyTF/35o/t/UG7OqaCYu', '9tsb5CJrDS3eyVSXuThkJZfz81yXJ7TtddWtf1so6Dbldh22xB0RRQ6pRbol', '2018-07-03 09:47:24', '2018-07-03 09:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `users` int(10) UNSIGNED NOT NULL,
  `doctors` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `users`, `doctors`) VALUES
(11, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'klkl'),
(2, 'Science'),
(3, 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctors_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` tinyint(3) UNSIGNED NOT NULL,
  `image` text,
  `introduction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctors_id`, `name`, `category`, `image`, `introduction`) VALUES
(4, 'textarea', 1, 'undefined', 'introduction introduction introduction introduction'),
(6, 'Amit', 1, 'undefined', 'editdoctor_post editdoctor_post editdoctor_post editdoctor_post editdoctor_post'),
(7, 'textarea', 1, 'undefined', 'introduction introduction introduction');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `id_number`, `name`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '657869765', 'Rohit', '9838985435', 'Address dhussa allahabad', NULL, NULL, NULL),
(2, '9877', 'sunny Singh Yadav', '2', 'kjhkjh', 'QQnFRcT3lXqa2glISA8YBo96w3gaEGJl0UMxh3aGtueMrW9LaRU6JttRXLRt', '2018-08-18 17:18:20', '2018-08-18 17:18:20'),
(3, '234234', 'sunny Singh Yadav', '9838094237', 'Address Allahabad', NULL, '2018-08-20 10:01:19', '2018-08-20 10:01:19'),
(4, '9879879', 'sunny Singh Yadav', '4', 'kjhkjh', NULL, '2018-08-20 18:35:34', '2018-08-20 18:35:34'),
(5, '65456', 'sunny Singh Yadav', '3', 'kjhkjh', 'hwFpaIGHXhFyyVYzuAr0At8K0QNe3xnlq3ufhgYIpWb0PBJYbLxM69vInrbd', '2018-08-21 12:51:12', '2018-08-21 12:51:12'),
(6, '687687', 'jhbjhbhj', '87876', '8khjh', 'GVCMoRzXcFh48VYCYilcyoJuPivl29SKunrL829ey84FnCu22pbhkXvBEfLc', '2018-08-21 14:40:58', '2018-08-21 14:40:58'),
(7, '654569', 'kjbkjb', '9898', 'hbhbjh', 'n6VKUpr4zHk1Xxn5h0qnb3bDJqQb1kXlTvPXmVg5KHv3so08dJ1jCEdGfA9N', '2018-08-22 14:47:07', '2018-08-22 14:47:07'),
(8, 'qwedfrtghbnjklopi9', 'name', '98', 'kjkj', NULL, '2018-08-23 14:14:22', '2018-08-23 14:14:22'),
(9, 'data09090909090909', 'newname', '8', '8', NULL, '2018-08-23 14:15:30', '2018-08-23 14:15:30'),
(10, '12kjnkkkkkkkkkkkkk', 'kjbk', '09', 'ln', NULL, '2018-08-23 14:30:35', '2018-08-23 14:30:35'),
(11, 'abcd98989898989898', 'Sunny', '9898989898', 'Allahabad', NULL, '2018-08-24 12:18:43', '2018-08-24 12:18:43'),
(12, '12345678pl,mkitghj', 'new', '0909090909', 'Address', NULL, '2018-08-24 19:24:58', '2018-08-24 19:24:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctors_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD UNIQUE KEY `id_number_2` (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctors_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
