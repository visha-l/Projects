-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2016 at 08:46 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DBMS_PROJECT`
--

-- --------------------------------------------------------

--
-- Table structure for table `BOOK`
--

CREATE TABLE `BOOK` (
  `BOOKID` int(10) UNSIGNED NOT NULL,
  `AUTHOR` varchar(45) NOT NULL,
  `PUBLICATION` varchar(45) NOT NULL,
  `CATEGORY` varchar(45) NOT NULL,
  `READABLE` tinyint(1) NOT NULL,
  `BOOKTITLE` varchar(40) NOT NULL,
  `Booklink` varchar(50) NOT NULL,
  `QUANTITY` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BOOK`
--

INSERT INTO `BOOK` (`BOOKID`, `AUTHOR`, `PUBLICATION`, `CATEGORY`, `READABLE`, `BOOKTITLE`, `Booklink`, `QUANTITY`) VALUES
(102, 'ullman', 'pearson', 'compiler', 1, 'compiler design', 'cdam-01-09.pdf', 5),
(103, 'HP tiwari', 'JPH', 'electrical', 0, 'Electrical circuit', '', 6),
(107, 'jitendra singh', 'tmha', 'sceience', 1, 'software', 'cpp_tutorial.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `BOOKSUPPLIED`
--

CREATE TABLE `BOOKSUPPLIED` (
  `BOOKID` int(10) NOT NULL,
  `s_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BOOKSUPPLIED`
--

INSERT INTO `BOOKSUPPLIED` (`BOOKID`, `s_id`) VALUES
(102, 202),
(103, 203),
(107, 201);

-- --------------------------------------------------------

--
-- Table structure for table `book_read`
--

CREATE TABLE `book_read` (
  `BOOKID` int(10) NOT NULL,
  `USERID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `u_id` int(6) NOT NULL,
  `BOOKID` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`u_id`, `BOOKID`, `qty`) VALUES
(301, 101, 1),
(301, 102, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PRICE`
--

CREATE TABLE `PRICE` (
  `s_id` int(6) NOT NULL,
  `BOOKID` int(10) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRICE`
--

INSERT INTO `PRICE` (`s_id`, `BOOKID`, `price`) VALUES
(202, 102, 590),
(203, 103, 1000),
(201, 107, 123);

-- --------------------------------------------------------

--
-- Table structure for table `p_history`
--

CREATE TABLE `p_history` (
  `BOOKID` int(10) DEFAULT NULL,
  `u_id` int(6) DEFAULT NULL,
  `dop` date DEFAULT NULL,
  `qnty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_history`
--

INSERT INTO `p_history` (`BOOKID`, `u_id`, `dop`, `qnty`) VALUES
(102, 302, '2016-11-19', 2),
(103, 303, '2016-11-03', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `BOOKID` int(10) NOT NULL,
  `rating` int(10) NOT NULL,
  `num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`BOOKID`, `rating`, `num`) VALUES
(101, 2, 4),
(103, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `s_signup`
--

CREATE TABLE `s_signup` (
  `s_id` int(6) UNSIGNED NOT NULL,
  `s_name` varchar(45) NOT NULL,
  `s_pwd` varchar(30) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_signup`
--

INSERT INTO `s_signup` (`s_id`, `s_name`, `s_pwd`, `s_email`, `contact`) VALUES
(201, 'abhishek verma', 'verma', 'abhi1@gmail.com', 9876544567),
(202, 'neeraj kumar', 'kumar', 'nek@yahoo.in', 8765567887),
(203, 'jitendra singh', 'singh', 'jeetu@gmail.com', 9876543456);

-- --------------------------------------------------------

--
-- Table structure for table `u_purchase`
--

CREATE TABLE `u_purchase` (
  `u_id` int(6) NOT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `u_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_purchase`
--

INSERT INTO `u_purchase` (`u_id`, `contact`, `address`, `u_email`) VALUES
(301, 9876543298, 'mnit jaipur ', 'vh@gmail.com'),
(302, 9889978789, 'gaurav tower kota', 'vish@yahoo.in');

-- --------------------------------------------------------

--
-- Table structure for table `u_signup`
--

CREATE TABLE `u_signup` (
  `u_id` int(6) UNSIGNED NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_pwd` varchar(30) NOT NULL,
  `u_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_signup`
--

INSERT INTO `u_signup` (`u_id`, `u_name`, `u_pwd`, `u_email`) VALUES
(301, 'vishal gupta', 'gupta', 'vgcse@gmail.com'),
(302, 'prince purohit', 'purohit', 'prince@redif.com'),
(303, 'sumit kumar', 'kumar', 'sk@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BOOK`
--
ALTER TABLE `BOOK`
  ADD PRIMARY KEY (`BOOKID`);

--
-- Indexes for table `BOOKSUPPLIED`
--
ALTER TABLE `BOOKSUPPLIED`
  ADD PRIMARY KEY (`BOOKID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`u_id`,`BOOKID`);

--
-- Indexes for table `PRICE`
--
ALTER TABLE `PRICE`
  ADD PRIMARY KEY (`BOOKID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`BOOKID`);

--
-- Indexes for table `s_signup`
--
ALTER TABLE `s_signup`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `u_purchase`
--
ALTER TABLE `u_purchase`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `u_signup`
--
ALTER TABLE `u_signup`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BOOK`
--
ALTER TABLE `BOOK`
  MODIFY `BOOKID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `u_signup`
--
ALTER TABLE `u_signup`
  MODIFY `u_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
