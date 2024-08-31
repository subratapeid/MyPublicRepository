-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 09:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shg_ticketing_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_names`
--

CREATE TABLE `bank_names` (
  `id` int(11) NOT NULL,
  `bank_symbol` varchar(50) NOT NULL,
  `bank_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_names`
--

INSERT INTO `bank_names` (`id`, `bank_symbol`, `bank_name`) VALUES
(1, 'SBI', 'State Bank Of India'),
(2, 'INB', 'Indian Bank');

-- --------------------------------------------------------

--
-- Table structure for table `bc_details`
--

CREATE TABLE `bc_details` (
  `id` int(11) NOT NULL,
  `po_id` int(20) NOT NULL,
  `po_name` varchar(250) NOT NULL,
  `card_id` bigint(250) NOT NULL,
  `bc_id` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `bc_first_name` varchar(255) NOT NULL,
  `bc_middle_name` varchar(50) NOT NULL,
  `bc_last_name` varchar(255) NOT NULL,
  `bc_mobile` varchar(15) DEFAULT NULL,
  `po_pin` varchar(10) DEFAULT NULL,
  `location` varchar(250) NOT NULL,
  `pool_account_no` varchar(100) NOT NULL,
  `ifsc_code` varchar(250) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `terminal_id` varchar(70) NOT NULL,
  `date` date DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `bc_temp_email` varchar(250) DEFAULT NULL,
  `bc_temp_mobile` bigint(250) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bc_details`
--

INSERT INTO `bc_details` (`id`, `po_id`, `po_name`, `card_id`, `bc_id`, `title`, `bc_first_name`, `bc_middle_name`, `bc_last_name`, `bc_mobile`, `po_pin`, `location`, `pool_account_no`, `ifsc_code`, `bank`, `terminal_id`, `date`, `created_by_id`, `created_date`, `bc_temp_email`, `bc_temp_mobile`, `status`) VALUES
(862, 0, 'Yasodha Nagar', 23456789, 'BC123456', 'Mr.', 'subrata', '', 'p', NULL, '560064', 'Attur', '76543234567', '1234567890', 'State Bank Of India', '23456789', NULL, 1, '2024-08-26 07:29:50', 'subrataporel65@gmail.com', 9547415324, 'Active'),
(863, 45, 'Yasodha Nagar', 23456789, 'BC123456677', 'Mr.', 'subrata', '', 'p', NULL, '560064', 'Jakkur', '76543234567', '1234567890', 'State Bank Of India', '23456789', NULL, 1, '2024-08-26 07:34:23', 'subrataporel65@gmail.com', 9547415324, 'Active'),
(864, 45, 'Yasodha Nagar', 23456789, 'BC123456677e', 'Mr.', 'subrata', '', 'p', NULL, '560064', 'Singanayakanahalli', '76543234567', '1234567890', 'Indian Bank', '23456789', NULL, 1, '2024-08-26 08:40:13', 'subrataporel65@gmail.com', 9547415324, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(50) NOT NULL,
  `department_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(9, 'Hardware'),
(8, 'Technical Support');

-- --------------------------------------------------------

--
-- Table structure for table `hooffices`
--

CREATE TABLE `hooffices` (
  `ID` int(11) NOT NULL,
  `Pincode` int(11) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `ho_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hooffices`
--

INSERT INTO `hooffices` (`ID`, `Pincode`, `Area`, `ho_id`) VALUES
(1, 560064, 'Bangalore', 1);

-- --------------------------------------------------------

--
-- Table structure for table `issues_list`
--

CREATE TABLE `issues_list` (
  `id` int(11) NOT NULL,
  `issue` varchar(250) NOT NULL,
  `issue_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issues_list`
--

INSERT INTO `issues_list` (`id`, `issue`, `issue_type_id`) VALUES
(6, 'Forget Password', 9),
(7, 'User Not Exist', 9);

-- --------------------------------------------------------

--
-- Table structure for table `issue_type`
--

CREATE TABLE `issue_type` (
  `issue_id` int(50) NOT NULL,
  `issue_type` varchar(250) NOT NULL,
  `department_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_type`
--

INSERT INTO `issue_type` (`issue_id`, `issue_type`, `department_id`) VALUES
(9, 'Login Issue', 9),
(10, 'Transaction Issue', 9),
(11, 'Others', 9);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `description`) VALUES
(1, 'Admin', NULL),
(2, 'Common', NULL),
(3, 'Create User', NULL),
(4, 'Add BC Details', NULL),
(5, 'BC Login', NULL),
(6, 'Add Issue Types', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pooffices`
--

CREATE TABLE `pooffices` (
  `ID` int(11) NOT NULL,
  `ROID` int(11) DEFAULT NULL,
  `Pincode` int(11) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `po_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pooffices`
--

INSERT INTO `pooffices` (`ID`, `ROID`, `Pincode`, `Area`, `po_id`) VALUES
(45, 1, 560064, 'Yasodha Nagar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `can_edit` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `can_edit`) VALUES
(1, 'Admin', 1),
(2, 'BC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 6),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rooffices`
--

CREATE TABLE `rooffices` (
  `ID` int(11) NOT NULL,
  `HOID` int(11) DEFAULT 1,
  `Pincode` int(11) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `ro_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooffices`
--

INSERT INTO `rooffices` (`ID`, `HOID`, `Pincode`, `Area`, `ro_id`) VALUES
(1, 1, 560064, 'Jakkur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket_id` int(250) NOT NULL,
  `created_by_id` varchar(50) DEFAULT NULL,
  `created_by_role` varchar(50) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `issue_type` varchar(50) DEFAULT NULL,
  `issue` text DEFAULT NULL,
  `descriptions` varchar(250) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `ticket_email` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `office_pin` varchar(10) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `office_name` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `locked_by` varchar(10) NOT NULL DEFAULT 'NO',
  `locked_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `closed_date` timestamp NULL DEFAULT NULL,
  `closed_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_id`, `created_by_id`, `created_by_role`, `created_by`, `issue_type`, `issue`, `descriptions`, `mobile`, `ticket_email`, `image`, `office_pin`, `office_id`, `office_name`, `status`, `locked_by`, `locked_time`, `created_date`, `closed_date`, `closed_by`) VALUES
(1, 1000456, '1', 'Admin', 'Subrata Porel', 'Login Issue', 'Login Issue details', NULL, '9175187661', 'subratap.eid@gmail.com', NULL, '560064', 11111, 'Bangalore', 'Closed', 'NO', '2024-08-26 08:54:43', '2024-08-26 08:54:43', '2024-08-26 08:54:30', '1'),
(2, 1000457, '1', 'Admin', 'admin user', 'transaction Issue', 'Hoo', NULL, '9018938383', 'admin@gmail.com', '', '0', 11111, 'Bangalore', 'Open', 'NO', '2024-08-26 04:57:59', '2024-08-26 04:57:59', NULL, NULL),
(3, 1000458, '1', 'Admin', 'admin user', 'Card Issue', 'gn', NULL, '9018938383', 'admin@gmail.com', '', '0', 11111, 'Bangalore', 'Closed', 'NO', '2024-08-26 08:54:23', '2024-08-26 08:54:23', '2024-08-26 08:51:33', '1'),
(4, 1000459, '1', 'Admin', 'admin user', 'Connection Issue', 'connection issue', NULL, '9018938383', 'admin@gmail.com', '', '0', 11111, 'Bangalore', 'Closed', 'NO', '2024-08-26 08:54:40', '2024-08-26 08:54:40', '2024-08-26 08:50:50', '1'),
(5, 1000460, '1', 'Admin', 'admin user', 'transaction Issue', 'status checking', NULL, '9018938383', 'admin@gmail.com', '', '0', 11111, 'Bangalore', 'Closed', 'NO', '2024-08-26 08:51:05', '2024-08-26 08:51:05', '2024-08-26 08:50:08', '1'),
(6, 1000461, 'BC123456', 'BC', 'subrata p', 'Others', 'dfndfn', NULL, '9547415324', 'subrataporel65@gmail.com', '', '0', 0, 'Yasodha Nagar', NULL, 'NO', '2024-08-27 07:10:51', '2024-08-27 07:10:51', NULL, NULL),
(7, 1000462, 'BC123456', 'BC', 'subrata p', 'Login Issue', 'User Not Exist', NULL, '9547415324', 'subrataporel65@gmail.com', '', '0', 0, 'Yasodha Nagar', NULL, 'NO', '2024-08-27 07:11:06', '2024-08-27 07:11:06', NULL, NULL),
(8, 1000463, 'BC123456', 'BC', 'subrata p', 'Login Issue', 'Forget Password', NULL, '9547415324', 'subrataporel65@gmail.com', '', '0', 0, 'Yasodha Nagar', 'Closed', '1', '2024-08-27 07:24:20', '2024-08-27 07:24:15', '2024-08-27 07:23:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reply`
--

CREATE TABLE `ticket_reply` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(40) DEFAULT NULL,
  `reply_by_id` text NOT NULL,
  `reply_by` varchar(60) NOT NULL,
  `reply_by_avatar` varchar(250) DEFAULT NULL,
  `user_role` varchar(40) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_reply`
--

INSERT INTO `ticket_reply` (`id`, `ticket_id`, `reply_by_id`, `reply_by`, `reply_by_avatar`, `user_role`, `user_id`, `message`, `img_path`, `date`) VALUES
(404, '1000456', '1', 'admin', 'assets/img/avatars/user.jpg', 'Admin', '', 'hjvh', '', '2024-07-04 11:45:42'),
(405, '1000456', '1', 'admin', 'assets/img/avatars/user.jpg', 'Admin', '', 'jkdsh sdvg us', '', '2024-07-04 11:45:58'),
(406, '1000457', '1', 'admin', 'assets/img/avatars/user.jpg', 'Admin', '', 'sjgs', '', '2024-07-04 12:03:19'),
(407, '1000457', '1', 'admin', 'assets/img/avatars/user.jpg', 'Admin', '', 'bgfnn', '', '0000-00-00 00:00:00'),
(408, '1000460', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'Closing', '', '2024-08-26 08:48:43'),
(409, '1000460', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'closing', '', '2024-08-26 08:50:05'),
(410, '1000459', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'ddd', '', '2024-08-26 08:50:40'),
(411, '1000458', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'fdfgfhf', '', '2024-08-26 08:51:10'),
(412, '1000458', '1', 'admin', 'assets/img/avatars/user.jpg', 'Admin', '', 'dfhfgbgr', '', '2024-08-26 08:51:19'),
(413, '1000458', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'z dfbfd', '', '2024-08-26 08:51:28'),
(414, '1000457', '1', 'admin', 'assets/img/avatars/user.jpg', 'Admin', '', 'rkrger', '', '2024-08-26 08:54:18'),
(415, '1000456', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'fbfg', '', '2024-08-26 08:54:28'),
(416, '1000463', 'BC123456', 'subrata', 'assets/img/avatars/user.jpg', 'BC', '', 'erheshsh', '', '2024-08-27 07:19:55'),
(417, '1000463', 'BC123456', 'subrata', 'assets/img/avatars/user.jpg', 'BC', '', 'rthrth', '', '2024-08-27 07:20:01'),
(418, '1000463', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'ukuykuy', '', '2024-08-27 07:20:28'),
(419, '1000463', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'dhgnfdn', '', '2024-08-27 07:20:28'),
(420, '1000463', 'BC123456', 'subrata', 'assets/img/avatars/user.jpg', 'BC', '', 'dfbfdbdfb', '', '2024-08-27 07:22:27'),
(421, '1000463', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'dfdfbdbd', '', '2024-08-27 07:22:57'),
(422, '1000463', '1', 'admin', 'assets/img/avatars/nouser.png', 'Admin', '', 'rhr', '', '2024-08-27 07:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `img_url` varchar(250) DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `office_id` int(10) NOT NULL,
  `office` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `password_status` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by_id` int(10) NOT NULL,
  `is_approved` int(10) NOT NULL,
  `approve_reject_by_id` int(10) DEFAULT NULL,
  `department_id` int(10) NOT NULL,
  `approve_reject_date` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `view_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `mobile`, `role`, `img_url`, `department`, `pin`, `office_id`, `office`, `password`, `password_status`, `status`, `created_by_id`, `is_approved`, `approve_reject_by_id`, `department_id`, `approve_reject_date`, `created_on`, `view_time`) VALUES
(1, 'admin', 'admin', 'user', 'admin@gmail.com', '9018938383', 'Admin', NULL, 'NA', '560064', 11111, 'Bangalore', '$2y$10$tmbE.9qaSGAu6iPdmbnUrudaaeSxpYNfBrgD733TgXPg6yh.rAPRC', 'custom', 'Active', 1, 1, NULL, 0, NULL, NULL, NULL),
(2, 'subrata30', 'subrata', 'p', 'subrataporel65@gmail.com', '9547415324', 'Executive', NULL, 'Hardware', 'NA', 101010, 'Bangalore', '$2y$10$7nj8TiAClZpyErz81Itdl.WUWIxpKYHYaA10UIGUBCK2nyFQKBRmC', 'default', 'Active', 1, 1, 1, 0, '2024-08-26 10:21:36', '2024-08-26 10:18:30', NULL),
(3, 'subrata15', 'subrata', 'p', 'subrataporel6s5@gmail.com', '9547415324', 'HO', NULL, 'NA', 'NA', 1, 'Bangalore', '$2y$10$WRJKzm0CwtNH5zdShLLv4.fqrshWuQZyPHJBOigh3QVqBQKePMisW', 'default', 'Active', 1, 1, 1, 0, '2024-08-26 10:21:13', '2024-08-26 10:18:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_names`
--
ALTER TABLE `bank_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bc_details`
--
ALTER TABLE `bc_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `hooffices`
--
ALTER TABLE `hooffices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `issues_list`
--
ALTER TABLE `issues_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_type`
--
ALTER TABLE `issue_type`
  ADD PRIMARY KEY (`issue_id`),
  ADD UNIQUE KEY `issue_type` (`issue_type`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`permission_name`);

--
-- Indexes for table `pooffices`
--
ALTER TABLE `pooffices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `rooffices`
--
ALTER TABLE `rooffices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_id` (`id`),
  ADD UNIQUE KEY `ticket_id_2` (`ticket_id`);

--
-- Indexes for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_names`
--
ALTER TABLE `bank_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bc_details`
--
ALTER TABLE `bc_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=865;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hooffices`
--
ALTER TABLE `hooffices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issues_list`
--
ALTER TABLE `issues_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issue_type`
--
ALTER TABLE `issue_type`
  MODIFY `issue_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pooffices`
--
ALTER TABLE `pooffices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rooffices`
--
ALTER TABLE `rooffices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
