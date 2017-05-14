-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2017 at 04:46 AM
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
(1, 'Introduction to css', 'Prasanth', 3, 'files/images/books/58d5a2e3475a81490395875.jpg', 'Codemagos', 2017, 'L2', '1500'),
(2, 'Magazine', 'qweq', 2, 'files/images/books/58d5c18224b9c1490403714.jpg', '2313', 2014, '2', '23'),
(3, 'Introduction to Java', 'Balaguruswamy', 3, 'files/images/books/58d5e6adc31ea1490413229.jpg', 'Oracle', 2014, 'L7', '1874');

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
(1, 1, 1201),
(2, 1, 1457),
(3, 1, 9874),
(4, 1, 6478),
(5, 1, 9874),
(6, 1, 3214),
(7, 1, 7844),
(8, 2, 7845),
(9, 2, 9987),
(10, 3, 78945),
(11, 3, 78542),
(12, 3, 987542);

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
-- Table structure for table `lend_staff`
--

CREATE TABLE `lend_staff` (
  `id` int(11) NOT NULL,
  `book_id` int(15) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `lend_date` date NOT NULL,
  `return_date` date NOT NULL
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
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lend_student`
--

INSERT INTO `lend_student` (`id`, `book_id`, `student_id`, `lend_date`, `return_date`) VALUES
(1, 2147483647, 23423, '2017-03-09', '0000-00-00'),
(2, 7845, 1724, '0000-00-00', '0000-00-00'),
(3, 78945, 1724, '0000-00-00', '0000-00-00');

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
(1, 78, 'prasnth', 2, '0000-00-00', 'asad', 2017, '6564', 'nvp@gmail.com'),
(2, 0, 'qweqe', 1, '0000-00-00', 'qwe', 2017, 'qeqe', 'qw'),
(3, 0, 'qweqe', 1, '0000-00-00', 'qwe', 2017, 'qeqe', 'qw'),
(4, 0, 'qweqe', 1, '0000-00-00', 'qwe', 2017, 'qeqe', 'qw'),
(5, 0, 'qweqe', 1, '0000-00-00', 'qwe', 2017, 'qeqe', 'qw');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `book_ids`
--
ALTER TABLE `book_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
