-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 01:45 PM
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
-- Database: `habib`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(25, 'APPETIZERS'),
(26, 'PLATTERS'),
(27, 'SUBS'),
(28, 'BURGERS'),
(29, 'SANDWICHES'),
(39, 'DRINKS'),
(41, 'Markouk');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_category` text NOT NULL,
  `item_priceusd` double NOT NULL,
  `item_ingredients` text NOT NULL,
  `item_pricelbp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_category`, `item_priceusd`, `item_ingredients`, `item_pricelbp`) VALUES
(253, 'WITHOUT COLESLAW', 'WITHOUT', 0, '', 0),
(255, 'WITHOUT TOMATO', 'WITHOUT', 0, '', 0),
(256, 'WITHOUT ONIONS', 'WITHOUT', 0, '', 0),
(257, 'WITHOUT MAYO', 'WITHOUT', 0, '', 0),
(258, 'WITHOUT BARBECUE SAUCE', 'WITHOUT', 0, '', 0),
(259, 'WITHOUT HONEY MUSTARD', 'WITHOUT', 0, '', 0),
(260, 'WITHOUT SPECIAL SAUCE', 'WITHOUT', 0, '', 0),
(261, 'PEPSI', 'DRINKS', 1, '', 90000),
(262, 'DIET PEPSI', 'DRINKS', 1, '', 0),
(263, '7UP', 'DRINKS', 1, '', 0),
(264, 'DIET 7UP', 'DRINKS', 1, '', 0),
(266, 'ICE TEA PEACH', 'DRINKS', 1, '', 0),
(267, 'SMALL WATER', 'DRINKS', 0.5, '', 0),
(268, 'CHICKEN TENDERS (3 Pcs)', 'APPETIZERS', 3.5, 'Served with Special Sauce dip', 0),
(269, 'CHEDDAR BALLS (3 balls)', 'APPETIZERS', 3, 'Served with Special Honey Mustard Sauce dip', 0),
(270, 'WEDGES', 'APPETIZERS', 3.5, 'Served with Special Sauce dip', 0),
(271, 'FRENCH FRIES', 'APPETIZERS', 2, '', 0),
(272, 'DAZZINE FALAFEL BALA KHODRA', 'PLATTERS', 3.3, 'Tarator Dip', 0),
(273, 'DAZZINET FALAFEL MA3 KHODRA', 'PLATTERS', 4.44, 'With Vegetables – Tarator Dip', 0),
(274, 'CHILLI FRANKFURTER SUB', 'SUBS', 7.5, 'Ground Beef – Mexican Spices – Onions – Tomatoes – Romain Lettuce – Cheddar and Mozzarella Shredded – Mustard Mayo – Ketchup ', 0),
(275, 'FRANKFURTER SUB', 'SUBS', 3.5, 'Ketchup – Mustard – Cheddar – Chips Sticks', 0),
(276, 'FRANSISCO SUB', 'SUBS', 5.5, 'Chicken Breast – Sweet Corn – Grilled Mushroom – Mozzarella and Cheddar Cheese', 0),
(277, 'CRISPY CHICKEN SUB', 'SUBS', 6, 'Honey Mustard – Barbecue Sauce – Cheddar Cheese – Chips Sticks', 0),
(278, 'PHILLY STEAK SUB', 'SUBS', 7.5, 'Creamy Cheese – Mustard – Mayo – Grilled Onion Rings – Tomatoes – Topped with Cheddar Cheese', 0),
(279, 'CHICKEN FAJITA', 'SUBS', 6, '', 0),
(280, 'PESTO CHICKEN SUB', 'SUBS', 6, 'Pesto Sauce – Sundried Tomatoes – Bell Pepper – Fresh Mushroom – Creamy Cheddar Cheese on top4', 0),
(281, 'CORDON BLEU SUB', 'SUBS', 7.5, 'Our Special Cordon Bleu (made of Turkey and Mozzarella) – Lettuce – Tomato – Special Sauce', 0),
(282, 'AL HABIB BURGER', 'BURGERS', 7.5, 'Two Angus Beef Patties Burger Bun – One slice of Bread Tartar – Honey Mustard – Mayo – Lettuce – Tomatoes – Caramelized Onions – Topped with cheddar', 0),
(283, 'CLASSIC BURGER', 'BURGERS', 5.5, 'Angus Beef – Cheese Cream Grilled – Caramelized Onions – Tomato Slice – Pickles - Lettuce', 0),
(284, 'CHICKEN BURGER', 'BURGERS', 5, 'Chicken – Mustard – Mayo – Ketchup – Lettuce – Pickles – Tomatoes – Cheddar', 0),
(285, 'SWISS MUSHROOM BURGER', 'BURGERS', 6.5, 'Angus Beef - Cheddar Cheese – Tomatoes – Lettuce – Caramelized Onions – Chips Sticks', 0),
(286, 'CRISPY BACON BURGER', 'BURGERS', 6, 'Angus Beef Patty – Crispy Bacon – Barbecue Sauce - Cheddar', 0),
(287, 'FALAFEL SANDWICH', 'SANDWICHES', 2.2, 'Tarator – Pickles – Lefet – Ba2dounes - Tomato', 0),
(288, 'SHAWARMA LAHME SANDWICH', 'SANDWICHES', 4.5, 'Tarator – Ba2dounes – Onions – Tomato - Fries', 0),
(289, 'SHAWARMA DJEJ SANDWICH', 'SANDWICHES', 4, 'Garlic Cream – Lettuce – Pickles – Fries', 0),
(290, 'LARGE TAWOUK SANDWICH', 'SANDWICHES', 5, 'Garlic Cream – Coleslaw – Pickles – Fries', 0),
(291, 'MEDIUM TAWOUK SANDWICH', 'SANDWICHES', 4, 'Garlic Cream – Coleslaw – Pickles – Fries', 0),
(292, 'FRIES SANDWICH', 'SANDWICHES', 2.22, 'Garlic Cream – Coleslaw – Pickles', 0),
(293, 'MAKANEK SUB', 'SUBS', 3, 'Mayo – Pickles – Tomato Slices', 0),
(294, 'SOJOUK SUB', 'SUBS', 4, 'Mayo – Pickles – Tomato Slices', 0),
(295, 'CHICKEN TENDER DIP', 'DIPS', 1, '', 0),
(296, 'PHILLY STEAK DIP', 'DIPS', 1, '', 0),
(297, 'HONEY MUSTARD CUP', 'DIPS', 1, '', 0),
(298, 'BARBECUE DIP', 'DIPS', 1, '', 0),
(299, 'SHAWARMA LAHME PLATTER', 'PLATTERS', 10, 'Served with fries – Vegetables – garlic cream/tarator', 0),
(300, 'SHAWARMA DJEJ PLATTER', 'PLATTERS', 8, 'Served with fries – Vegetables – garlic cream/tarator', 0),
(301, 'TRUFFLE CHICKEN BURGER', 'BURGERS', 5.5, 'Truffle - Creamy mushroom sauce - Lettuce - Pickles - Caramelized Onions - Grilled Tomato', 0),
(302, 'DELIVERY CHARGE 50', 'Delivery Charge', 0.55, '', 0),
(303, 'DELIVERY CHARGE 100', 'Delivery Charge', 1.1, '', 0),
(304, 'DELIVERY CHARGE 150', 'Delivery Charge', 1.66, '', 0),
(305, 'DELIVERY CHARGE 200', 'Delivery Charge', 2.2, '', 0),
(306, 'WITHOUT CHEDDAR', 'WITHOUT', 0, '', 0),
(307, 'WITHOUT LEFET', 'WITHOUT', 0, '', 0),
(308, 'WITHOUT BA2DOUNES', 'WITHOUT', 0, '', 0),
(309, 'WITHOUT NA3NA3', 'WITHOUT', 0, '', 0),
(310, 'GUACAMOLE DIP', 'DIPS', 1, '', 0),
(311, 'CHEDDAR DIP', 'DIPS', 1, '', 0),
(312, 'CHEDDAR', 'ADD', 0.5, '', 0),
(313, 'COLESLAW ON SIDE', 'ADD', 0.55, '', 0),
(314, 'LEBANESE BURGER', 'BURGERS', 5, 'Angus Beef – Coleslaw – Tomato – Pickles - Onion Rings – Mayo - Ketchup', 0),
(315, 'SPICY FRENCH FRIES', 'APPETIZERS', 2, '', 0),
(316, 'dark blue', 'DRINKS', 0.67, '', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userpassword` varchar(20) NOT NULL,
  `isAdmin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `userpassword`, `isAdmin`) VALUES
(1, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
