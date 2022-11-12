-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 04:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twaproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `addedby` int(11) NOT NULL,
  `dateadded` date NOT NULL,
  `imageurl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `name`, `addedby`, `dateadded`, `imageurl`) VALUES
(1, 'Hotel Key', 1, '2022-11-01', '<a href=\"/twaproject/img/hotel_key.png\"><img src=\"/twaproject/img/hotel_key.png\" width=\"100\" height=\"100\"></a>'),
(2, 'Hotel Bellboy', 2, '2022-11-02', '<a href=\"/twaproject/img/hotel_bellboy.png\"><img src=\"/twaproject/img/hotel_bellboy.png\" width=\"100\" height=\"100\"></a>'),
(3, 'Yoga Meditation', 1, '2022-10-31', '<a href=\"/twaproject/img/yoga_meisou.png\"><img src=\"/twaproject/img/yoga_meisou.png\" width=\"100\" height=\"100\"></a>'),
(4, 'Buffet Couple', 3, '2022-11-03', '<a href=\"/twaproject/img/buffet_baikingu_oomori.png\"><img src=\"/twaproject/img/buffet_baikingu_oomori.png\" width=\"100\" height=\"100\"></a>\r\n\r\n'),
(5, 'High Rise Hotel', 3, '2022-11-03', '<a href=\"/twaproject/img/kousou_hotel.png\"><img src=\"/twaproject/img/kousou_hotel.png\" width=\"100\" height=\"100\"></a>'),
(6, 'Explorer', 12, '2022-11-04', '<a href=\"/twaproject/img/job_tanken_koukogaku2.png\"><img src=\"/twaproject/img/job_tanken_koukogaku2.png\" width=\"100\" height=\"100\"></a>'),
(7, 'Room Service', 2, '2022-11-04', '<a href=\"/twaproject/img/job_hotel_roomservice_woman.png\"><img src=\"/twaproject/img/job_hotel_roomservice_woman.png\" width=\"100\" height=\"100\"></a>\r\n\r\n'),
(8, 'Sauna', 1, '2022-10-22', '<a href=\"/twaproject/img/ofuro_sauna_aufguss_woman.png\"><img src=\"/twaproject/img/ofuro_sauna_aufguss_woman.png\" width=\"100\" height=\"100\"></a>'),
(9, 'Full Hotel', 12, '2022-10-19', '<a href=\"/twaproject/img/building_hotel_pet.png\"><img src=\"/twaproject/img/building_hotel_pet.png\" width=\"100\" height=\"100\"></a>'),
(10, 'Tip', 2, '2022-10-10', '<a href=\"/twaproject/img/money_tip_bed.png\"><img src=\"/twaproject/img/money_tip_bed.png\" width=\"100\" height=\"100\"></a>'),
(11, 'Morning Call', 1, '2022-11-01', '<a href=\"/twaproject/img/hotel_morning_call.png\"><img src=\"/twaproject/img/hotel_morning_call.png\" width=\"100\" height=\"100\"></a>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Hunter2', '123', 'user1@gmail.com'),
(2, 'BigDog', '123', 'user2@gmail.com'),
(3, 'Jimbo', 'XceFVCu8Kx3D4jV', 'p@pmail.com'),
(12, 'Alice', 'Caroll', 'lookingglass@wonderland.com'),
(13, 'a', 'a', 'a@a.com'),
(14, 'b', 'b', 'a@a.com'),
(15, 'c', 'c', 'a@a.com'),
(16, 'd', 'd', 'a@a.com'),
(17, 'e', 'e', 'a@a.com'),
(18, 'f', 'f', 'a@a.com'),
(19, 'g', 'g', 'g@a.com'),
(20, 'h', 'h', 'hh@a.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UsersListings` (`addedby`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `UsersListings` FOREIGN KEY (`addedby`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
