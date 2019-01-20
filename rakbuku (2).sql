-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 07:23 PM
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
(4, 'str-20190118-0008', '2019-01-19', '2019-01-19', 'adv-20190120-0001.jpg', '0'),
(5, 'str-20190104-0007', '2019-01-21', '2019-01-22', 'adv-20190120-0005.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authors_id` int(11) NOT NULL,
  `authors_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authors_id`, `authors_name`) VALUES
(5, 'aghhh'),
(6, 'rarara');

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
(16, 'str-20190104-0006', 'book-20190111-0005', 55, 120000),
(17, 'str-20190104-0006', 'book-20190111-0006', 10, 80000),
(18, 'str-20190104-0006', 'book-20190111-0007', 9, 110000),
(20, 'str-20190104-0006', 'book-20190118-0009', 40, 25000),
(21, 'str-20190104-0007', 'book-20190119-0010', 10, 150000),
(22, 'str-20190104-0007', 'book-20190119-0011', 75, 100000),
(23, 'str-20190104-0007', 'book-20190119-0012', 35, 120000),
(24, 'str-20190118-0008', 'book-20190119-0013', 55, 120000),
(25, 'str-20190118-0008', 'book-20190119-0014', 10, 80000),
(26, 'str-20190118-0008', 'book-20190119-0015', 9, 110000);

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
('book-20190111-0001', 'Sebuah Seni untuk Bersikap Bodo Amat', '5/2/2018', 'Mark Manson', '9786024526986', 'Gramedia Widiasarana Indonesia', 'Angga_Pratama-book-20190111-0001-.jpg'),
('book-20190111-0002', 'Menghafal Al-Qur`an dengan Otak Kanan', '16/7/2018', 'Tanzil Khaerul Akbar, Ardi Gunawan', '9786020461991', 'Elex Media Komputindo', 'Angga_Pratama-book-20190111-0002-.jpg'),
('book-20190111-0003', 'Bicara Itu Ada Seninya', '30/4/2018', 'Oh Su Hyang', '9786024553920', 'Bhuana Ilmu Populer', 'Angga_Pratama-book-20190111-0003-.jpg'),
('book-20190111-0004', 'Sano, You are Meanie!', '17-21-2018', 'MIKO SENRI', '9786024802745', 'm&c!', 'Angga_Pratama-book-20190111-0004'),
('book-20190111-0005', 'Sebuah Seni untuk Bersikap Bodo Amat', '5/2/2018', 'Mark Manson', '9786024526986', 'Gramedia Widiasarana Indonesia', 'Gunawan-book-20190111-0005-.jpg'),
('book-20190111-0006', 'Menghafal Al-Qur`an dengan Otak Kanan', '16/7/2018', 'Tanzil Khaerul Akbar, Ardi Gunawan', '9786020461991', 'Elex Media Komputindo', 'Gunawan-book-20190111-0006-.jpg'),
('book-20190111-0007', 'Bicara Itu Ada Seninya', '30/4/2018', 'Oh Su Hyang', '9786024553920', 'Bhuana Ilmu Populer', 'Gunawan-book-20190111-0007-.jpg'),
('book-20190111-0008', 'xxxxxxxxxxxxxx', '11-11-1111', 'xxxxxxxxxxxxxx', '11111111111', 'xxxxxxxxxxxxxx', 'Angga_Pratama-book-20190111-0008.jpg'),
('book-20190118-0009', 'Sano, You are Meanie!', '17-12-2018', 'MIKO SENRI', '9786024802745', 'm&c!', 'gunawan-book-20190118-0009.jpg'),
('book-20190119-0010', 'Sebuah Seni untuk Bersikap Bodo Amat', '5/2/2018', 'Mark Manson', '9786024526986', 'Gramedia Widiasarana Indonesia', 'angga-book-20190119-0010jpg'),
('book-20190119-0011', 'Menghafal Al-Qur`an dengan Otak Kanan', '16/7/2018', 'Tanzil Khaerul Akbar, Ardi Gunawan', '9786020461991', 'Elex Media Komputindo', 'angga-book-20190119-0011jpg'),
('book-20190119-0012', 'Bicara Itu Ada Seninya', '30/4/2018', 'Oh Su Hyang', '9786024553920', 'Bhuana Ilmu Populer', 'angga-book-20190119-0012jpg'),
('book-20190119-0013', 'Sebuah Seni untuk Bersikap Bodo Amat', '5/2/2018', 'Mark Manson', '9786024526986', 'Gramedia Widiasarana Indonesia', 'kasandra-book-20190119-0013jpg'),
('book-20190119-0014', 'Menghafal Al-Qur`an dengan Otak Kanan', '16/7/2018', 'Tanzil Khaerul Akbar, Ardi Gunawan', '9786020461991', 'Elex Media Komputindo', 'kasandra-book-20190119-0014jpg'),
('book-20190119-0015', 'Bicara Itu Ada Seninya', '30/4/2018', 'Oh Su Hyang', '9786024553920', 'Bhuana Ilmu Populer', 'kasandra-book-20190119-0015jpg');

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
(190, 'Bantuan hukum', 'book-20190111-0001'),
(191, ' Pengembangan diri', 'book-20190111-0001'),
(192, 'Agama', 'book-20190111-0002'),
(193, ' Islam', 'book-20190111-0002'),
(194, 'Inspirasi', 'book-20190111-0003'),
(195, ' Pengembangan Diri', 'book-20190111-0003'),
(196, 'Komik', 'book-20190111-0004'),
(197, 'Bantuan hukum', 'book-20190111-0005'),
(198, ' Pengembangan diri', 'book-20190111-0005'),
(199, 'Agama', 'book-20190111-0006'),
(200, ' Islam', 'book-20190111-0006'),
(201, 'Inspirasi', 'book-20190111-0007'),
(202, ' Pengembangan Diri', 'book-20190111-0007'),
(203, 'percobaan81', 'book-20190111-0008'),
(207, 'percobaan82', 'book-20190111-0008'),
(213, 'percobaan63', 'book-20190111-0008'),
(214, 'percobaan64', 'book-20190111-0008'),
(233, 'percobaan65', 'book-20190111-0008'),
(234, 'percobaan88', 'book-20190111-0008'),
(247, 'xxxxxxxx1', 'book-20190111-0008'),
(248, 'xxxxxxxx2', 'book-20190111-0008'),
(249, 'xxxxxxxx3', 'book-20190111-0008'),
(250, 'xxxxxxxx4', 'book-20190111-0008'),
(251, 'xxxxxxxx5', 'book-20190111-0008'),
(252, 'xxxxxxxx6', 'book-20190111-0008'),
(253, 'xxxxxxxx7', 'book-20190111-0008'),
(254, 'xxxxxxxx8', 'book-20190111-0008'),
(255, 'Buku', 'book-20190118-0009'),
(256, 'Komik', 'book-20190118-0009'),
(257, 'Bantuan hukum', 'book-20190119-0010'),
(258, ' Pengembangan diri', 'book-20190119-0010'),
(259, 'Agama', 'book-20190119-0011'),
(260, ' Islam', 'book-20190119-0011'),
(261, 'Inspirasi', 'book-20190119-0012'),
(262, ' Pengembangan Diri', 'book-20190119-0012'),
(263, 'Bantuan hukum', 'book-20190119-0013'),
(264, ' Pengembangan diri', 'book-20190119-0013'),
(265, 'Agama', 'book-20190119-0014'),
(266, ' Islam', 'book-20190119-0014'),
(267, 'Inspirasi', 'book-20190119-0015'),
(268, ' Pengembangan Diri', 'book-20190119-0015');

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
(13, 'Andra Gunawan', 'gigaby@gmail.com', 'M', '1997-12-17', 'gunawan', 'gunawan', '1', '4143f03a589c72745881781359dd6c5220db4fb0', '2019-01-15', 'str-20190104-0006'),
(14, 'Angga Pratama', 'bloodyanmond@gmail.com', 'M', '1995-01-09', 'angga', 'angga', '1', 'fe291cb3dbf22c4b6fb6cbb7d31e8101d2400506', '2019-01-11', 'str-20190104-0007'),
(17, 'kasandra', 'lazer.helmi@gmail.com', 'M', '2015-12-31', 'kasandra', 'kasandra', '1', '3d698e0e9902162bef7ca4895c2965a1232ab000', '2019-01-18', 'str-20190118-0008');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `sc_id` int(11) NOT NULL,
  `stores_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('str-20190104-0006', 'acyyyyyyy', 'acyyyyyyy', 'acyyyyyyy', 'senin', '666 1313 1313 ', '04:03', '02:00', '-6.93836785', '107.6098775'),
('str-20190104-0007', 'Toko Buku Raja angga', 'Toko Buku Raja angga', 'Toko Buku Raja angga', 'selasa', '666 1313 1313 ', '01:00', '01:01', '-6.93189245', '107.5230168'),
('str-20190118-0008', 'kasandra', 'kasandra', 'kasandra', 'kasandra', '666 1313 1313 ', '13:00', '14:01', '-6.91894137', '107.5815533'),
('str-20190118-0010', 'kasandra1212', 'kasandra', 'kasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandrakasandra', 'kasandra', '666 1313 1313 ', '13:00', '14:01', '-6.93666381', '107.6203488');

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
(25, 'str-20190104-00010.jpg', 'str-20190104-0001'),
(26, 'str-20190104-00011.jpg', 'str-20190104-0001'),
(27, 'str-20190104-00012.jpg', 'str-20190104-0001'),
(28, 'str-20190104-00013.jpg', 'str-20190104-0001'),
(29, 'str-20190104-00020.jpg', 'str-20190104-0002'),
(30, 'str-20190104-00021.png', 'str-20190104-0002'),
(31, 'str-20190104-00022.png', 'str-20190104-0002'),
(32, 'str-20190104-00030.jpg', 'str-20190104-0003'),
(33, 'str-20190104-00031.JPG', 'str-20190104-0003'),
(34, 'str-20190104-00032.jpg', 'str-20190104-0003'),
(35, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(36, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(37, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(38, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(39, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(40, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(41, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(42, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(43, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(44, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(45, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(46, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(47, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(48, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(49, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(50, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(51, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(52, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(53, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(54, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(55, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(56, 'str-20190104-00040.jpg', 'str-20190104-0004'),
(57, 'str-20190104-00041.jpg', 'str-20190104-0004'),
(58, 'str-20190104-00042.jpg', 'str-20190104-0004'),
(59, 'str-20190104-00050.jpg', 'str-20190104-0005'),
(60, 'str-20190104-00051.jpg', 'str-20190104-0005'),
(61, 'str-20190104-00052.jpg', 'str-20190104-0005'),
(62, 'str-20190104-00060.jpg', 'str-20190104-0006'),
(63, 'str-20190104-00061.jpg', 'str-20190104-0006'),
(64, 'str-20190104-00062.jpg', 'str-20190104-0006'),
(66, 'str-20190104-00063.jpg', 'str-20190104-0006'),
(67, 'str-20190104-00070.jpg', 'str-20190104-0007'),
(68, 'str-20190104-00071.jpg', 'str-20190104-0007'),
(69, 'str-20190104-00072.jpg', 'str-20190104-0007'),
(70, 'str-20190118-00080.jpg', 'str-20190118-0008'),
(71, 'str-20190118-00081.jpg', 'str-20190118-0008'),
(72, 'str-20190118-00082.jpg', 'str-20190118-0008'),
(73, 'str-20190118-00090.jpg', 'str-20190118-0009'),
(74, 'str-20190118-00091.jpg', 'str-20190118-0009'),
(75, 'str-20190118-00092.jpg', 'str-20190118-0009'),
(76, 'str-20190118-00100.jpg', 'str-20190118-0010'),
(77, 'str-20190118-00101.jpg', 'str-20190118-0010'),
(78, 'str-20190118-00102.jpg', 'str-20190118-0010');

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
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authors_id`);

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
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`sc_id`);

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
  MODIFY `adverts_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `booklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owners_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_pictures`
--
ALTER TABLE `store_pictures`
  MODIFY `store_pictures_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
