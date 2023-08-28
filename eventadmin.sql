-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 10:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about`) VALUES
(1, 'Welcome to EventSys, your premier event management solution. Our goal is to provide you with seamless event planning and booking services. With a dedicated team of professionals, we ensure your events are executed flawlessly, leaving you stress-free and your attendees impressed.\r\n\r\n'),
(2, ' Behind every successful event is meticulous planning. We leave no stone unturned, meticulously crafting every detail of your event, from venue selection and décor to catering and entertainment. Our seasoned planners handle the logistics so you can focus on enjoying your event.'),
(3, ' Flawless execution is our promise. Our dedicated team is adept at coordinating all elements of the event, ensuring that everything runs smoothly on the day. From setup to teardown, we are there every step of the way to guarantee a seamless and stress-free experience.'),
(4, 'Our team comprises experts from diverse backgrounds, each bringing a wealth of knowledge to the table. From event planning and production to marketing and technical support, we have the expertise to handle every facet of your event.');

-- --------------------------------------------------------

--
-- Table structure for table `addevent`
--

CREATE TABLE `addevent` (
  `id` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `edate` date NOT NULL,
  `elocation` varchar(255) NOT NULL,
  `eprice` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `eimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addevent`
--

INSERT INTO `addevent` (`id`, `ename`, `edate`, `elocation`, `eprice`, `seats`, `eimage`) VALUES
(1, 'Summer Concert', '2023-08-23', 'Ludhiana Melody Meadows', 2000, 146, '1692162155694.jpg'),
(2, 'Artisanal Food Fair', '2023-08-21', 'Town Square Market', 1200, 626, '1692162730708.jpg'),
(3, ' Tech Innovators Summit', '2023-09-09', 'Innovation Hub Conference Center', 1099, 450, '1692162919101.jpg'),
(4, 'Bollywood Beats Night', '2023-09-21', ' City Park Pavilion', 2999, 500, '1692163051532.jpg'),
(5, ' Science Exploration Expo', '2023-09-02', 'Space Science Museum', 550, 200, '1692163704913.jpg'),
(6, 'Puunjabi Night', '2023-08-31', ' City Park Pavilion', 2500, 200, '1692164048123.jpg'),
(7, ' Baseball Playoff Series', '2023-09-10', 'Guru Nanak Stadium', 1000, 300, '1692164232889.jpg'),
(8, 'Badminton Challenge Cup', '2023-08-20', 'Shastri Badminton Hall', 1000, 250, '1692164470972.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'How do I book an event?', 'Booking an event is easy. Simply navigate to the event page, click \"Register Now,\" and fill out the registration form.'),
(2, 'Can I cancel my event registration?', 'Yes, you can cancel your registration. Please contact our support team at least 48 hours before the event to initiate the cancellation process.'),
(3, 'What should I do if I encounter technical issues during registration?', 'If you experience technical difficulties while registering, please contact our technical support team. They will be able to assist you in resolving any issues you might encounter.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `attendees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `event_id`, `name`, `email`, `phone`, `attendees`) VALUES
(1, 1, 'Harshit Jain', 'hj252214@gmail.com', '6280101441', 4),
(2, 1, 'Harshit Jain', 'harshit@gmail.com', '6280101441', 5),
(3, 1, 'Harshit Jain', 'hj252214@gmail.com', '6280101441', 5),
(4, 1, 'Harshit Jain', 'hj252214@gmail.com', '6280101441', 5),
(5, 2, 'Himanshu', 'himanshu@gmail.com', '6280101441', 2),
(6, 1, 'Harshit Jain', 'hj252214@gmail.com', '9417242562', 2),
(7, 1, 'himanshu', 'himanshu@gmail.com', '1235589456', 2),
(8, 1, 'dushyant', 'dushyant@gmail.com', '6280707551', 5);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`) VALUES
(1, 'user', 'user@gmail.com', 'user'),
(2, 'harshit', 'hj252214@gmail.com', 'gizla2528'),
(3, 'himanshu', 'himanshu123@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addevent`
--
ALTER TABLE `addevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `addevent`
--
ALTER TABLE `addevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
