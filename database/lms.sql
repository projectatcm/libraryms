-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2017 at 06:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin'),
(6, '78552', '205f55', '');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` text NOT NULL,
  `category` int(11) NOT NULL,
  `image` text NOT NULL,
  `publication` varchar(255) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `rack_no` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `category`, `image`, `publication`, `publication_year`, `rack_no`, `price`) VALUES
(1, 'Introduction to Java', 'Prasanth', 2, 'files/images/books/591690e1a57511494651105.jpg', 'nvpdigital', 2017, '1', '1200'),
(2, 'Ubuntu ', 'sree', 3, 'files/images/books/5916af34757201494658868.jpg', 'nvp', 2014, '3', '4500'),
(3, 'Node JS', 'James', 3, 'files/images/books/591859b25a0291494768050.jpg', 'PUBLICATIONS', 2017, 'A1', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `book_ids`
--

CREATE TABLE `book_ids` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_ids`
--

INSERT INTO `book_ids` (`id`, `book_id`, `sub_id`) VALUES
(1, 1, 4521),
(2, 1, 789),
(3, 1, 754),
(4, 2, 1024),
(5, 2, 7896),
(6, 3, 5420),
(7, 3, 12345),
(8, 3, 43243),
(9, 3, 56456);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Magazine'),
(3, 'Text Book');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Computer Engineering'),
(2, 'Medial Electronics'),
(3, 'Electronics Engineering'),
(4, 'CHM');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `amount` int(11) NOT NULL DEFAULT '5',
  `days` int(11) NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`amount`, `days`) VALUES
(5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `lend_staff`
--

CREATE TABLE `lend_staff` (
  `id` int(11) NOT NULL,
  `book_id` int(15) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `lend_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lend_student`
--

CREATE TABLE `lend_student` (
  `id` int(11) NOT NULL,
  `book_id` int(20) NOT NULL,
  `student_id` int(11) NOT NULL,
  `lend_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lend_student`
--

INSERT INTO `lend_student` (`id`, `book_id`, `student_id`, `lend_date`, `return_date`) VALUES
(1, 4521, 1724, '2017-05-13', '2017-05-13'),
(2, 4521, 1245, '2017-05-13', '2017-05-13'),
(3, 4521, 1724, '2017-04-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` int(11) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `year_of_join` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_id`, `name`, `department`, `dob`, `address`, `year_of_join`, `phone`, `email`) VALUES
(1, 78552, 'prasnth', 2, '0000-00-00', 'asad', 2017, '6564', 'prasanthcodemagos@gmail.com'),
(2, 4511, 'William', 1, '0000-00-00', 'qwe', 2017, 'qeqe', 'williamwilson642@gmail.com'),
(3, 8846, 'Jishnu', 1, '0000-00-00', 'qwe', 2017, 'qeqe', 'jishnunkneo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `year_of_join` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `branch`, `year_of_join`, `name`, `password`, `fine`) VALUES
(2, 1724, 'Computer Engineering', '2010', 'prasanth\n', '', 0),
(3, 1278, 'Computer Engineering', '2010', 'jeybin\n', '', 0),
(10, 1478, 'Medial Electronics', '2011', 'james\n', '', 0),
(11, 1245, 'Medial Electronics', '2011', 'jhon\n', '', 0),
(12, 1788, 'Medial Electronics', '2011', 'Thomas\n', '', 0),
(13, 1, 'Computer Engineering', '2014', 'K.J\n', '', 0),
(14, 2, 'Computer Engineering', '2014', 'P.S\n', '', 0),
(15, 3, 'Computer Engineering', '2014', 'C.A\n', '', 0),
(16, 4, 'Computer Engineering', '2014', 'AKBAR\n', '', 0),
(17, 5, 'Computer Engineering', '2014', 'K.C\n', '', 0),
(18, 6, 'Computer Engineering', '2014', 'SHA', '', 0),
(19, 7, 'Computer Engineering', '2014', 'AUGUSTINE\n', '', 0),
(20, 8, 'Computer Engineering', '2014', 'VARGHESE\n', '', 0),
(21, 9, 'Computer Engineering', '2014', 'VARGHESE\n', '', 0),
(22, 10, 'Computer Engineering', '2014', 'SANTOSH\n', '', 0),
(23, 11, 'Computer Engineering', '2014', 'V.V\n', '', 0),
(24, 12, 'Computer Engineering', '2014', 'TOMY\n', '', 0),
(25, 13, 'Computer Engineering', '2014', 'KRISHNA', '', 0),
(26, 14, 'Computer Engineering', '2014', 'ONACHAN\n', '', 0),
(27, 15, 'Computer Engineering', '2014', 'M', '', 0),
(28, 16, 'Computer Engineering', '2014', 'SAJEEV\n', '', 0),
(29, 17, 'Computer Engineering', '2014', 'T.G\n', '', 0),
(30, 18, 'Computer Engineering', '2014', 'VARGHESE\n', '', 0),
(31, 19, 'Computer Engineering', '2014', 'JOSE\n', '', 0),
(32, 20, 'Computer Engineering', '2014', 'P', '', 0),
(33, 21, 'Computer Engineering', '2014', 'N.K\n', '', 0),
(34, 22, 'Computer Engineering', '2014', 'K.S\n', '', 0),
(35, 23, 'Computer Engineering', '2014', 'PAUL\n', '', 0),
(36, 24, 'Computer Engineering', '2014', 'ANTONY\n', '', 0),
(37, 25, 'Computer Engineering', '2014', 'YAHIYA\n', '', 0),
(38, 26, 'Computer Engineering', '2014', 'BABU\n', '', 0),
(39, 27, 'Computer Engineering', '2014', '', '', 0),
(40, 28, 'Computer Engineering', '2014', '', '', 0),
(41, 29, 'Computer Engineering', '2014', 'STEPHEN\n', '', 0),
(42, 30, 'Computer Engineering', '2014', 'M', '', 0),
(43, 31, 'Computer Engineering', '2014', 'KRISHNA', '', 0),
(44, 32, 'Computer Engineering', '2014', 'K', '', 0),
(45, 33, 'Computer Engineering', '2014', 'P', '', 0),
(46, 34, 'Computer Engineering', '2014', 'ITTIRA\n', '', 0),
(47, 35, 'Computer Engineering', '2014', 'K.S\n', '', 0),
(48, 36, 'Computer Engineering', '2014', 'K', '', 0),
(49, 37, 'Computer Engineering', '2014', 'P', '', 0),
(50, 38, 'Computer Engineering', '2014', 'JAMMAL\n', '', 0),
(51, 39, 'Computer Engineering', '2014', 'KRISHNA\n', '', 0),
(52, 40, 'Computer Engineering', '2014', 'C.A\n', '', 0),
(53, 41, 'Computer Engineering', '2014', 'PAUL\n', '', 0),
(54, 42, 'Computer Engineering', '2014', '', '', 0),
(55, 43, 'Computer Engineering', '2014', 'KRISHNA\n', '', 0),
(56, 44, 'Computer Engineering', '2014', 'RAMESH\n', '', 0),
(57, 45, 'Computer Engineering', '2014', 'WILSON\n', '', 0),
(58, 46, 'Computer Engineering', '2014', '\n', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_ids`
--
ALTER TABLE `book_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lend_staff`
--
ALTER TABLE `lend_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lend_student`
--
ALTER TABLE `lend_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `book_ids`
--
ALTER TABLE `book_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lend_staff`
--
ALTER TABLE `lend_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lend_student`
--
ALTER TABLE `lend_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
