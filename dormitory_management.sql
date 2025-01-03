-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 03, 2025 at 07:51 AM
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
-- Database: `dormitory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `block_id` varchar(255) NOT NULL,
  `block_type` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `reserved_for` varchar(255) DEFAULT NULL,
  `disable_group` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `block_type`, `capacity`, `reserved_for`, `disable_group`, `status`, `created_at`, `updated_at`) VALUES
('B38', 'academic', 23, 'staff', 0, 'active', '2025-01-01 07:59:36', '2025-01-01 07:59:36'),
('b88', 'academic', 609, 'students', 0, 'active', '2025-01-02 14:22:13', '2025-01-02 14:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `emerg_id` int(10) UNSIGNED NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `second_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `zone` varchar(100) DEFAULT NULL,
  `woreda` varchar(100) DEFAULT NULL,
  `kebele` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergencies`
--

INSERT INTO `emergencies` (`emerg_id`, `s_id`, `first_name`, `second_name`, `last_name`, `address`, `region`, `zone`, `woreda`, `kebele`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'dmus', 'Getnet', 'Bekalu', 'Worku', 'ethiopia', 'spoidu', 'e2ww', 'rrrrrrrr', 'wwwwwww', '09767876543', NULL, NULL),
(4, 'dmuas', 'Bezabh', 'Bekalu', 'aysheshm', 'ethiopia', 'amhara', 'debremarkos', 'debremarkos', 'bbbbbbbbb', '0975834628', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` varchar(20) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `second_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `entry_year` year(4) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `status`, `email`, `first_name`, `second_name`, `last_name`, `gender`, `entry_year`, `password`, `address`, `created_at`, `updated_at`) VALUES
('dmus7', 'Active', 'getn@gmail.com', 'Bezabh', 'Bogale', 'Mebratu', 'Male', '2012', 'admin123', 'aaaaaaaaa', '2025-01-02 14:27:28', '2025-01-02 14:27:28'),
('dmus8', 'Active', 'getne9@gmail.com', 'Bezabh', 'Bogale', 'Mebratu', 'Male', '2012', 'admin123', 'hhhhhhhhhh', '2025-01-02 16:28:52', '2025-01-02 16:28:52'),
('Emp1', 'Active', 'getnetamare29@gmail.com', 'Get', 'Net', 'Amare', 'Male', '2017', 'password', 'Ethiopia', '2025-01-01 07:50:36', '2025-01-01 07:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(143, '0001_01_01_000001_create_cache_table', 1),
(144, '0001_01_01_000002_create_jobs_table', 1),
(145, '2014_10_12_100000_create_password_resets_table', 1),
(146, '2024_12_19_053421_create_users_table', 1),
(147, '2024_12_19_053422_create_employees_table', 1),
(148, '2024_12_19_053422_create_students_table', 1),
(149, '2024_12_19_053424_create_reports_table', 1),
(150, '2024_12_19_053424_create_requests_table', 1),
(151, '2024_12_19_053425_create_blocks_table', 1),
(152, '2024_12_19_053425_create_rooms_table', 1),
(153, '2024_12_19_065859_create_sessions_table', 1),
(154, '2024_12_20_001549_add_user_id_to_sessions_table', 1),
(155, '2024_12_26_073558_create_emergency_details', 1),
(156, '2024_12_26_132024_create_proctor_placement_table', 1),
(157, '2024_12_26_132248_create_std_placement_table', 1),
(158, '2024_12_27_182536_add_timestamps_to_employees_table', 1),
(159, '2024_12_27_183540_add_timestamps_to_reports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proctor_placements`
--

CREATE TABLE `proctor_placements` (
  `assign_id` int(10) UNSIGNED NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attribute1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proctor_placements`
--

INSERT INTO `proctor_placements` (`assign_id`, `emp_id`, `year`, `date`, `attribute1`) VALUES
(1, 'Emp1', '2000', '2001-01-25', 'ffffffff'),
(2, 'Emp1', '2000', '2001-01-25', 'ffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `proctor_id` varchar(255) DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `proctor_id`, `student_id`, `status`, `date`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Emp1', NULL, NULL, '2001-01-25', 'dddddd', '2025-01-01 09:12:23', '2025-01-01 09:12:23'),
(2, NULL, 'dmuas', 'Pending', '2001-01-25', 'qaaaaaaaaaaaaaaaa', '2025-01-01 10:23:17', '2025-01-01 10:23:17'),
(3, NULL, 'dmustud1', 'Pending', '2002-01-25', 'bbbbbbbbbbbbbbbbb', '2025-01-02 14:10:30', '2025-01-02 14:10:30'),
(4, 'Emp1', NULL, 'Pending', '2002-01-25', 'eeeeeee', '2025-01-02 17:20:16', '2025-01-02 17:20:16'),
(5, 'Emp1', NULL, 'Pending', '2002-01-25', 'ffffffffffffffff', '2025-01-02 17:22:14', '2025-01-02 17:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `student_id`, `date`, `status`, `comment`, `purpose`, `reason`) VALUES
(1, 'dmuas', '2001-01-25', 'Approved', 'we want maintance for dorm', 'dffdffffffffffffff', 'hhhhngn'),
(2, 'dmustud1', '2002-01-25', 'Approved', 'jgyftdd', 'kjhgfd', 'kjhghkut'),
(4, 'dmuas', '2002-01-25', 'Approved', 'bbbbbbbbbbb', 'mmmmmmmmmmmmmm', 'nnnnnnnnnnnnnnnnn');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` varchar(255) NOT NULL,
  `block` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `block`, `status`, `capacity`, `created_at`, `updated_at`) VALUES
('12', 'B38', 'Available', 23, '2025-01-01 08:00:04', '2025-01-02 14:26:35'),
('888', 'b88', 'Available', 8, '2025-01-02 14:25:50', '2025-01-02 14:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `std_placements`
--

CREATE TABLE `std_placements` (
  `assign_id` int(10) UNSIGNED NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `block` varchar(50) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `std_placements`
--

INSERT INTO `std_placements` (`assign_id`, `s_id`, `block`, `room`, `status`, `created_at`, `updated_at`, `academic_year`) VALUES
(1, 'dmus', 'B38', '1', 'Active', NULL, NULL, '2017'),
(2, 'dmuas', 'block 8', '348', 'Active', NULL, NULL, '2017'),
(3, 'dmuas', 'B38', '348', 'Active', NULL, NULL, '2018'),
(4, 'dmuas', '888', '348', 'Active', NULL, NULL, '2017');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `entry_year` year(4) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `gender` varchar(255) NOT NULL,
  `disability` tinyint(1) NOT NULL DEFAULT 0,
  `address` text DEFAULT NULL,
  `citizenship` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `second_name`, `last_name`, `email`, `password`, `entry_year`, `department`, `status`, `gender`, `disability`, `address`, `citizenship`, `created_at`, `updated_at`) VALUES
('dmuas', 'Bezabh', 'Bogale', 'Mebratu', 'getne29@gmail.com', '$2y$12$j9ff2OMxGxOwNoNd/p/YzeeVnq8j55GYzvIzzsDzcmcz.Z3HJ5.uC', '2012', 'physics', 'active', 'male', 0, 'wwwwwww', 'ethiopian', NULL, NULL),
('dmus', 'Getnet', 'Bekalu', 'aysheshm', 'getnetamare29@gmail.com', '$2y$12$6JI32KzCi9EyTvRjHzA/quKE8DSj8f/qJD9C3YqjPRBev6DN1QmH2', '2012', 'chemistry', 'active', 'male', 0, 'tfyguhij', 'gjh', NULL, NULL),
('dmustud1', 'Bezabh', 'Bogale', 'Worku', 'getneta9@gmail.com', '$2y$12$Vj0TRWEiFHmcciLo0Yp45u089qAZi0VnPTkyAvsM2MMdGCWJkjSEC', '2012', 'Techno', 'active', 'male', 0, 'kjuytrew', 'ethiopian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL DEFAULT 'Eden',
  `password` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL DEFAULT 'Student',
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userType`, `status`, `created_at`, `updated_at`) VALUES
('dmuas', '$2y$12$j9ff2OMxGxOwNoNd/p/YzeeVnq8j55GYzvIzzsDzcmcz.Z3HJ5.uC', 'Student', 'Active', NULL, NULL),
('dmus', '$2y$12$6JI32KzCi9EyTvRjHzA/quKE8DSj8f/qJD9C3YqjPRBev6DN1QmH2', 'Admin', 'Active', NULL, NULL),
('dmus7', '$2y$12$Lh9ds1sSe4zAzChvRqenuO4f3XSOtPU/N7Q8rKAF3q1GZEq1gIVx.', 'Admin', 'Active', NULL, NULL),
('dmus8', '$2y$12$xHjZMLa12h5vV6gd89GLY.srIhq0J5MwX25ePgdQ.rnQr06iF6k.a', 'Manager', 'Active', NULL, NULL),
('dmustud1', '$2y$12$Vj0TRWEiFHmcciLo0Yp45u089qAZi0VnPTkyAvsM2MMdGCWJkjSEC', 'Student', 'Active', NULL, NULL),
('Emp1', '$2y$12$9gfli06Yr8.1b04a/t4NAulf2UAEYzb7JegC.LWDZuWYTGjU/OZfq', 'Proctor', 'Active', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`emerg_id`),
  ADD KEY `emergencies_s_id_foreign` (`s_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `proctor_placements`
--
ALTER TABLE `proctor_placements`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `proctor_placements_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `reports_proctor_id_foreign` (`proctor_id`),
  ADD KEY `reports_student_id_foreign` (`student_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `requests_student_id_foreign` (`student_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD KEY `rooms_block_foreign` (`block`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_name_index` (`user_name`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `std_placements`
--
ALTER TABLE `std_placements`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `std_placements_s_id_foreign` (`s_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `emerg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `proctor_placements`
--
ALTER TABLE `proctor_placements`
  MODIFY `assign_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `std_placements`
--
ALTER TABLE `std_placements`
  MODIFY `assign_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD CONSTRAINT `emergencies_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proctor_placements`
--
ALTER TABLE `proctor_placements`
  ADD CONSTRAINT `proctor_placements_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_proctor_id_foreign` FOREIGN KEY (`proctor_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_block_foreign` FOREIGN KEY (`block`) REFERENCES `blocks` (`block_id`) ON DELETE CASCADE;

--
-- Constraints for table `std_placements`
--
ALTER TABLE `std_placements`
  ADD CONSTRAINT `std_placements_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
