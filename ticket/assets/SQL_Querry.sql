-- create all required Tables 

CREATE TABLE `bc_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `city` varchar(250) NOT NULL,
  `pool_account_no` int(100) NOT NULL,
  `ifsc_code` varchar(250) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `terminal_id` varchar(70) NOT NULL,
  `date` date DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `bc_temp_email` varchar(250) DEFAULT NULL,
  `bc_temp_mobile` bigint(250) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=862 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `department` (
  `department_id` int(50) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(250) NOT NULL,
  PRIMARY KEY (`department_id`),
  UNIQUE KEY `department_name` (`department_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `hooffices` (
  `ID` int(11) NOT NULL,
  `Pincode` int(11) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `ho_id` int(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `issues_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(250) NOT NULL,
  `issue_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `issue_type` (
  `issue_id` int(50) NOT NULL AUTO_INCREMENT,
  `issue_type` varchar(250) NOT NULL,
  `department_id` int(50) NOT NULL,
  PRIMARY KEY (`issue_id`),
  UNIQUE KEY `issue_type` (`issue_type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pooffices` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROID` int(11) DEFAULT NULL,
  `Pincode` int(11) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `po_id` int(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`permission_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `can_edit` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rooffices` (
  `ID` int(11) NOT NULL,
  `HOID` int(11) DEFAULT 1,
  `Pincode` int(11) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `ro_id` int(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(255) NOT NULL,
  `created_by_id` varchar(250) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_by_role` varchar(50) NOT NULL,
  `office_id` varchar(250) NOT NULL,
  `office_pin` int(50) DEFAULT NULL,
  `office_name` varchar(250) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ticket_email` varchar(255) NOT NULL,
  `mobile` bigint(50) NOT NULL,
  `issue_type` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `descriptions` text DEFAULT NULL,
  `image` varchar(600) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Open',
  `closed_by` int(10) NOT NULL,
  `closed_date` datetime DEFAULT NULL,
  `locked_by` varchar(11) DEFAULT 'NO',
  `locked_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `ticket_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(40) DEFAULT NULL,
  `reply_by_id` text NOT NULL,
  `reply_by` varchar(60) NOT NULL,
  `user_role` varchar(40) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=404 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_status` varchar(25) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `img_url` varchar(200) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `depertment` varchar(50) NOT NULL,
  `department_id` int(50) NOT NULL,
  `pin` int(6) NOT NULL,
  `office` varchar(40) NOT NULL,
  `office_id` int(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `approve_reject_by_id` int(50) DEFAULT NULL,
  `approve_reject_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_id` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `view_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
