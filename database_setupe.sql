-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2025 at 10:42 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `life_path`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `country_code`, `gender`, `dob`, `password`, `created_at`, `updated_at`) VALUES
(1, 'khetam', 'Ahmad', 'khetam@gmail.com', '775156885', '+962', 'female', '2001-12-09', '$2y$10$UW1C.NzjnH2gQrrRnYRtneiqtk/ZaxZ.zeTathRKZbFOxnZwtna72', '2025-09-20 14:58:44', '2025-09-20 14:58:44'),
(2, 'Norhan', 'Zregat', 'norhanzregat9@gmail.com', '775156885', '+962', 'female', '2002-12-05', '$2y$10$92FRSbg.EUg8i0lK/ZqO5Ol8mM/DvIzGzeCdoppct0QAe5vds5Be6', '2025-09-20 16:09:05', '2025-09-20 16:09:05'),
(3, 'توجان', 'الزريقات', 'norhanzregat23@gmail.com', '798150218', '+962', 'female', '2002-12-20', '$2y$10$cnt4ewKxo.r/LJ6fpC3kIOeOc6r43kk6xkWl/8I8YVgLD8Dl2wd5S', '2025-09-20 16:22:08', '2025-09-20 16:22:08'),
(4, 'khetam', 'Ahmad', 'khetam88@gmail.com', '798152164', '+962', 'female', '1999-02-05', '$2y$10$DXeXk70bBDe8g1KDDwcOZuGls37BQo28vrPSa3BZZs1pTc.8/PaBm', '2025-09-20 16:25:40', '2025-09-20 16:25:40'),
(5, 'Wrood', 'Zregat', 'wrood@gmail.com', '798150216', '+962', 'female', '1999-04-08', '$2y$10$zRyXGh8m8wljnIyrKEH2Be8f3oWm.4bumI7wjclKw315AqFcZ44eK', '2025-09-20 20:38:39', '2025-09-20 20:38:39'),
(6, 'salma bahaa', 'Shdaifat', 'salmabahaa5@gmail.com', '775156883', '+962', 'female', '2002-12-04', '$2y$10$/XCbmD.39Lanr9p7kK8na.xPbrbLnWdG/i5x4Y5UsmWfpEJzflwoq', '2025-09-20 22:23:08', '2025-09-20 22:23:08'),
(7, 'جابر', 'السالم', 'jaber@gmail.com', '775156885', '+962', 'male', '1999-08-05', '$2y$10$zAwmc5uJJ2yMOpDHI5pCueqhZzNEKvzDCASWKY7mXTEYdZAfmHrQu', '2025-09-20 22:31:21', '2025-09-20 22:31:21'),
(8, 'abd', 'kareem', 'abdkareem@gmail.com', '798152014', '+962', 'male', '2002-12-05', '$2y$10$934XNOmKm95V.lygZQywiu4I/6dQ/ganaW2SAUCj0x0b.NLXcEXvC', '2025-09-20 22:32:23', '2025-09-20 22:32:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
