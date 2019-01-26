-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 04:15 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakbuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admins_id` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Gender` enum('M','W') NOT NULL,
  `birth_date` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `telp_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admins_id`, `username`, `password`, `name`, `Gender`, `birth_date`, `Address`, `telp_number`, `email`, `role`) VALUES
('adm-20181211-0001', 'sadmin', 'sadmin', 'helmi', 'M', '12-12-2001', 'bandung', '081219733333', 'lazer.helmi@gmail.com', '1'),
('adm-20181211-0002', 'admin', 'admin', 'admin', 'M', '2018-12-03', 'admin', '2312312312312', 'lazer.helmi@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `adverts_id` int(15) NOT NULL,
  `stores_id` varchar(25) NOT NULL,
  `date_of_order` date NOT NULL,
  `date_of_com` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`adverts_id`, `stores_id`, `date_of_order`, `date_of_com`, `img`, `is_active`) VALUES
(1, 'str-20190125-0001', '2019-01-23', '2019-01-31', 'adv-20190125-0001.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `booklist_id` int(11) NOT NULL,
  `stores_id` varchar(25) NOT NULL,
  `books_id` varchar(25) NOT NULL,
  `book_stock` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`booklist_id`, `stores_id`, `books_id`, `book_stock`, `price`) VALUES
(1, 'str-20190125-0001', 'book-20190125-0001', 55, 120000),
(2, 'str-20190125-0001', 'book-20190125-0002', 10, 80000),
(3, 'str-20190125-0001', 'book-20190125-0003', 9, 110000),
(4, 'str-20190125-0001', 'book-20190125-0004', 57, 110000);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `books_id` varchar(25) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `Release_date` varchar(50) DEFAULT NULL,
  `authors` varchar(50) DEFAULT NULL,
  `ISBN` varchar(50) NOT NULL,
  `publishers` varchar(50) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`books_id`, `title`, `Release_date`, `authors`, `ISBN`, `publishers`, `cover`) VALUES
('book-20190125-0001', 'Sebuah Seni untuk Bersikap Bodo Amat', '5/2/2018', 'Mark Manson', '9786024526986', 'Gramedia Widiasarana Indonesia', 'gunawan-book-20190125-0001.jpg'),
('book-20190125-0002', 'Menghafal Al-Qur`an dengan Otak Kanan', '16/7/2018', 'Tanzil Khaerul Akbar, Ardi Gunawan', '9786020461991', 'Elex Media Komputindo', 'gunawan-book-20190125-0002.jpg'),
('book-20190125-0003', 'Bicara Itu Ada Seninya', '30/4/2018', 'Oh Su Hyang', '9786024553920', 'Bhuana Ilmu Populer', 'gunawan-book-20190125-0003.jpg'),
('book-20190125-0004', 'Dharma Patanjala', '26-12-2018', 'ANDREA ACRI', '9786024810559', 'Kepustakaan Populer Gramedia', 'gunawan-book-20190125-0004.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(50) NOT NULL,
  `books_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `books_id`) VALUES
(1, 'Bantuan hukum', 'book-20190125-0001'),
(2, ' Pengembangan diri', 'book-20190125-0001'),
(3, 'Agama', 'book-20190125-0002'),
(4, ' Islam', 'book-20190125-0002'),
(5, 'Inspirasi', 'book-20190125-0003'),
(6, ' Pengembangan Diri', 'book-20190125-0003'),
(7, 'sejarah', 'book-20190125-0004'),
(8, 'ilmu socsial', 'book-20190125-0004');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owners_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('M','W') NOT NULL,
  `birth_date` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verify` enum('1','0') NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL,
  `reg_time` date NOT NULL,
  `stores_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owners_id`, `name`, `email`, `gender`, `birth_date`, `username`, `password`, `is_verify`, `code`, `reg_time`, `stores_id`) VALUES
(1, 'gunawan', 'lazer.helmi@gmail.com', 'M', '1990-12-10', 'gunawan', 'gunawan', '1', 'd8ed661c79ec35a5b34ede4025a35495051c8af9', '2019-01-25', 'str-20190125-0001');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `stores_id` varchar(25) NOT NULL,
  `stores_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `open` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `opening_at` varchar(11) NOT NULL,
  `closing_at` varchar(11) NOT NULL,
  `lat` varchar(11) NOT NULL,
  `lang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`stores_id`, `stores_name`, `description`, `address`, `open`, `contact`, `opening_at`, `closing_at`, `lat`, `lang`) VALUES
('str-20190125-0001', 'Gunawan Store', 'Gunawan Store', 'Gunawan Store', 'senin - jum\'at', '081219674096', '00:59', '00:59', '-6.94143512', '107.5921963');

-- --------------------------------------------------------

--
-- Table structure for table `store_pictures`
--

CREATE TABLE `store_pictures` (
  `store_pictures_id` int(11) NOT NULL,
  `store_pictures_name` varchar(50) NOT NULL,
  `stores_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_pictures`
--

INSERT INTO `store_pictures` (`store_pictures_id`, `store_pictures_name`, `stores_id`) VALUES
(1, 'str-20190125-00010.jpg', 'str-20190125-0001'),
(2, 'str-20190125-00011.jpg', 'str-20190125-0001'),
(3, 'str-20190125-00012.jpg', 'str-20190125-0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`);

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`adverts_id`);

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`booklist_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`books_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owners_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`stores_id`);

--
-- Indexes for table `store_pictures`
--
ALTER TABLE `store_pictures`
  ADD PRIMARY KEY (`store_pictures_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `adverts_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `booklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owners_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_pictures`
--
ALTER TABLE `store_pictures`
  MODIFY `store_pictures_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
