-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 07:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogueapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `sno` int(3) NOT NULL,
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mrp` int(6) NOT NULL,
  `size` varchar(3) NOT NULL,
  `length` int(2) NOT NULL,
  `width` int(2) NOT NULL,
  `height` int(2) NOT NULL,
  `weight` int(4) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`sno`, `id`, `name`, `mrp`, `size`, `length`, `width`, `height`, `weight`, `valid`, `filename`) VALUES
(29, 0, 'Ashutosh Mahajan', 1000, 'L', 10, 12, 15, 500, 0, ''),
(30, 0, 'Abha Mahajan', 1000, 's', 8, 6, 7, 250, 1, ''),
(31, 0, 'TShirt', 1000, 'S', 8, 6, 7, 250, 1, ''),
(32, 0, 'Sinhgad Institute of Technology', 1000, 'S', 8, 6, 7, 250, 1, ''),
(33, 0, 'Ashutosh Mahajan', 1000, 'S', 8, 6, 7, 250, 1, ''),
(34, 0, 'Phone', 1000, 'S', 10, 6, 7, 250, 0, ''),
(35, 0, 'END', 1000, 'S', 8, 6, 7, 250, 1, ''),
(36, 0, 'Laptop', 999, 'XXL', 10, 12, 15, 500, 0, ''),
(37, 10, 'HI', 200, 'L', 12, 15, 13, 200, 1, ''),
(38, 11, 'Ashutosh Mahajan', 1000, 'S', 8, 6, 7, 250, 1, ''),
(39, 11, '', 0, '', 0, 0, 0, 0, 0, ''),
(40, 11, '', 0, '', 0, 0, 0, 0, 0, ''),
(41, 11, 'Ashutosh Mahajan', 0, 'S', 8, 6, 7, 250, 1, ''),
(42, 12, 'Ashutosh Mahajan', 1000, 'S', 8, 6, 7, 250, 1, ''),
(43, 12, 'Ashutosh Mahajan', 1000, 'S', 8, 6, 7, 250, 1, 'Keep Going-1638725536.jpg'),
(44, 12, 'Abha Mahajan', 1000, 'L', 10, 7, 12, 250, 1, 'Screenshot (43).png'),
(45, 0, '', 0, '', 0, 0, 0, 0, 0, 'Screenshot (96).png'),
(46, 0, '', 0, '', 0, 0, 0, 0, 0, 'Screenshot (97).png'),
(47, 12, 'Ashutosh Mahajan', 100, 'S', 8, 6, 7, 250, 1, ''),
(48, 0, '', 0, '', 0, 0, 0, 0, 0, 'Screenshot (115).png'),
(49, 0, '', 0, '', 0, 0, 0, 0, 0, 'Screenshot (116).png'),
(50, 12, 'LaptopHP', 9999, 'S', 8, 6, 7, 250, 1, ''),
(51, 12, 'em_ashutosh', 1000, 'S', 8, 6, 7, 250, 1, 'Screenshot (115)-1638728493.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `created_at`) VALUES
(1, 'imashutosh022@gmail.com', '$2y$10$oZhQnnF3kwZL6KAdgkfAX.HjIfrEDDg6K2ImiYhs4vF', '2021-12-04 14:20:11'),
(2, 'contact@unlockdigital.in', '$2y$10$8wZ7U.NVqjiOlytv6z4Th.e1RixuuHXdfiZNniK0yly', '2021-12-04 14:24:58'),
(3, 'unlockdigitalservice@gmail.com', '$2y$10$3KVogpU8c7du5410/KvAou6MoQE6n0ozyMjvHfAAU2O', '2021-12-04 14:46:20'),
(4, 'a@gmail.com', '$2y$10$RdBMukD3OubnhpRwCDbCc.cK40cPI2dbo6o7LcHiZWd', '2021-12-04 14:56:21'),
(5, 'abha@gmail.com', '$2y$10$EozBAcOiAYbUavXDlVYV4.j2apZuBxZ.5TuYHs0oA7Q', '2021-12-04 15:01:40'),
(6, 'b@gmail.com', '$2y$10$KuNUqixRt7dBX2IbrnufLuzSzuOmzfxKZlHpNFK67DS', '2021-12-04 15:22:29'),
(7, 'ashu@gmail.com', '$2y$10$T0lLhKd36T/HW1lJnqXSvuLhE69v7i3OiX9SsB3iU4X', '2021-12-04 15:29:40'),
(8, 'pra@gmail.com', '$2y$10$Ww0wgl6P/KMPed9SG6RrAezy9Oyti2nttQrCxXe3ZIp', '2021-12-04 16:12:32'),
(9, 'cf@gmail.com', '$2y$10$7TFme5RpharHctm1efmxZO3vGS0MiT1kTAolUw2cZPETPQuKaKWwG', '2021-12-04 17:24:18'),
(10, 'hii@gmail.com', '$2y$10$Gw7bSJqr4pN4pR0r07TCR.anJ5Gl1m7ZBR6SThaPwXiy5nL3t.S5y', '2021-12-04 18:59:08'),
(11, 'ji@gmail.com', '$2y$10$Yw7ev7Zd6K7LLo8fwDzv2eD/AnXkjVzDsHBMQCDWATgnHNXvVZawe', '2021-12-04 19:26:37'),
(12, 'demo@gmail.com', '$2y$10$ljrx.dagL3sX3qwwba78dOlDEF6gjYNxaAaYJUn2HrmdIyrOOml1a', '2021-12-05 13:26:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
