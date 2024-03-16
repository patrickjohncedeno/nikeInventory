-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 01:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nike_inventory_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoes_inventory`
--

CREATE TABLE `tbl_shoes_inventory` (
  `shoesID` int(11) NOT NULL,
  `shoeName` varchar(255) NOT NULL,
  `shoeImage` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `shoePrice` decimal(10,2) NOT NULL,
  `shoeColor` varchar(255) NOT NULL,
  `ageRange` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shoes_inventory`
--

INSERT INTO `tbl_shoes_inventory` (`shoesID`, `shoeName`, `shoeImage`, `gender`, `category`, `shoePrice`, `shoeColor`, `ageRange`) VALUES
(1, 'Air Jordan 1 Low', 'uploads/65f17e6bc521f_AirJordan1Low - Blue.jpg', 'Men', 'Jordan', 6195.00, 'Blue', ''),
(2, 'Air Jordan 1 Low', 'uploads/65f17eca74593_AirJordan1Low - Red.jpg', 'Men', 'Jordan', 6195.00, 'Red', ''),
(3, 'Air Jordan 1 Low', 'uploads/65f17ee8ef4dc_AirJordan1Low - White.png', 'Men', 'Jordan', 6195.00, 'White', ''),
(4, 'Jordan Stadium 90', 'uploads/65f17f21aa574_Jordan_Stadium90-Grey.png', 'Men', 'Jordan', 7895.00, 'Grey', ''),
(5, 'Jordan Stadium 90', 'uploads/65f17f412deb6_Jordan_Stadium90-White.png', 'Men', 'Jordan', 7895.00, 'White', ''),
(6, 'Giannis Immortality 3 EP', 'uploads/65f17fa3ca028_Giannis3-Blue.png', 'Men', 'Basketball', 4295.00, 'Blue', ''),
(7, 'Giannis Immortality 3 EP', 'uploads/65f17fbed020f_Giannis3-Red.png', 'Men', 'Basketball', 4295.00, 'Red', ''),
(8, 'Giannis Immortality 3 EP', 'uploads/65f17fdc03913_Giannis3-White.png', 'Men', 'Basketball', 4295.00, 'White', ''),
(9, 'KD Trey 5', 'uploads/65f1801014596_KDTrey5-Black.jpg', 'Men', 'Basketball', 4795.00, 'Black', ''),
(10, 'KD Trey 5', 'uploads/65f1803d11692_KDTrey5-Green.jpg', 'Men', 'Basketball', 4795.00, 'Green', ''),
(11, 'KD Trey 5', 'uploads/65f1807217d4e_KDTrey5-White.jpg', 'Men', 'Basketball', 4795.00, 'White', ''),
(12, 'Jordan Stadium 90', 'uploads/65f180b32d3aa_Jordan_Stadium90_Women-Black.jpg', 'Women', 'Jordan', 7895.00, 'Black', ''),
(13, 'Jordan Stadium 90', 'uploads/65f180c8edf87_Jordan_Stadium90_Women-White.png', 'Women', 'Jordan', 7895.00, 'White', ''),
(14, 'Air Jordan 1 Mid', 'uploads/65f180f581875_AirJordan1MidWomen - Black.jpg', 'Women', 'Jordan', 6895.00, 'Black', ''),
(15, 'Air Jordan 1 Mid', 'uploads/65f1810f42080_AirJordan1MidWomen - White.png', 'Women', 'Shoe Category', 6895.00, 'White', ''),
(16, 'Nike Zoom Vomero 5', 'uploads/65f1813e4a456_NikeZoomVomero5-BrownWomen.png', 'Women', 'Lifestyle', 8895.00, 'Brown', ''),
(17, 'Nike Zoom Vomero 5', 'uploads/65f1815c214cb_NikeZoomVomero5-LightBrownWomen.png', 'Women', 'Lifestyle', 8895.00, 'Light Brown', ''),
(18, 'Nike Court Legacy Lift', 'uploads/65f1818761393_NikeCourtLegacyLiftWomen-Brown.png', 'Women', 'Lifestyle', 4495.00, 'Brown', ''),
(19, 'Nike Court Legacy Lift', 'uploads/65f1819ca3ca5_NikeCourtLegacyLiftWomen-White.png', 'Women', 'Lifestyle', 4495.00, 'White', ''),
(20, 'Jordan Max Aura 5', 'uploads/65f182609ee84_JordanMaxAura5Kids-Black.png', 'Boys', 'Jordan', 4695.00, 'Black', '3.5yrs. to 7yrs. old'),
(21, 'Jordan Max Aura 5', 'uploads/65f1827d63d9f_JordanMaxAura5Kids-BlackRed.png', 'Boys', 'Jordan', 4695.00, 'BlackRed', '3.5yrs. to 7yrs. old'),
(22, 'Nike Air Force 1 LE', 'uploads/65f182c46c863_airforcekids-black.png', 'Boys', 'Lifestyle', 4195.00, 'Black', '1yr. to 7yrs. old'),
(23, 'Nike Air Force 1 LE', 'uploads/65f182d779c4e_airforcekids-white.png', 'Boys', 'Lifestyle', 4195.00, 'White', '1yr. to 7yrs. old'),
(24, 'Air Jordan 1 Low SE', 'uploads/65f18333857e9_AirJordan1LowKidsGirls-Pink.jpg', 'Girls', 'Jordan', 5295.00, 'Pink', '3.5yrs. to 7yrs. old'),
(25, 'Air Jordan 1 Mid SE', 'uploads/65f18350e993f_AirJordan1MidKidsGirls-Pink.jpg', 'Girls', 'Jordan', 5295.00, 'Pink', '3.5yrs. to 7yrs. old'),
(26, 'Air Max 90 LTR', 'uploads/65f1839a55370_AirMax90KidsGirls-RedBlack.png', 'Girls', 'Lifestyle', 4595.00, 'RedBlack', '3.5yrs. to 7yrs. old'),
(27, 'Air Max 90 LTR', 'uploads/65f183bba96b2_AirMax90KidsGirls-WhiteBlue.png', 'Girls', 'Lifestyle', 4595.00, 'WhiteBlue', '3.5yrs. to 7yrs. old');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_shoes_inventory`
--
ALTER TABLE `tbl_shoes_inventory`
  ADD PRIMARY KEY (`shoesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_shoes_inventory`
--
ALTER TABLE `tbl_shoes_inventory`
  MODIFY `shoesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
