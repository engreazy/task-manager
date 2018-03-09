-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 08:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `reminder` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task`, `description`, `date`, `reminder`, `user_id`) VALUES
(98, 'another entry', 'This is a test on the logic', '2018-01-30', 2, 2),
(99, ' entryLevel', 'israel\'s test application', '2018-01-30', 2, 11),
(100, 'Nop', 'logical reasoning', '2018-01-30', 2, 11),
(101, 'todo list', 'thanks for your cooperation', '2018-01-03', 2, 11),
(102, 'mvc', 'Learning the MVC architecture', '2018-01-10', 2, 2),
(103, 'PUNP', 'Will resume studies fully next week', '2018-01-05', 2, 11),
(104, 'manager', 'This is a manager task', '2018-01-15', 2, 11),
(105, 'take coding to the next level', 'take coding to the next level', '2018-01-02', 2, 11),
(107, 'read', 'ffffdfssdfg', '2018-01-16', 2, 3),
(108, 'Nature', 'green is the color of nature', '2018-01-16', 2, 4),
(110, 'rechecking the logic', 'xfsfsfsdfdsf', '2018-01-11', 2, 11),
(111, 'new entry test again', 'fdfsfdsfsfds', '2018-01-17', 2, 2),
(112, 'Consonance 100 days of Code', 'ffdfds', '2018-01-05', 2, 1),
(113, 'cop22', 'wonderful', '2018-01-07', 2, 11),
(114, 'wonderful', 'again', '2018-01-25', 2, 1),
(117, ' programming101', 'Welcome', '2018-01-04', 2, 11),
(121, 'sam and song', 'this is task manager', '2018-01-17', 2, 11),
(123, 'take coding to the next level2', 'dfdsfsfsdfdsfsd', '2018-01-19', 2, 11),
(124, 'task number 2', 'this is the second task', '2018-01-19', 2, 2),
(125, 'rechecking the logic', 'testcase', '2018-01-19', 2, 4),
(127, 'nice', 'this is nice', '2018-01-19', 2, 11),
(128, 'school', 'go to school', '2018-01-20', 2, 11),
(129, 'variables', 'describe variables', '2018-01-19', 2, 11),
(130, 'breaking', 'take a break', '2018-01-19', 2, 11),
(132, 'engineer eazy', 'in my bones', '2018-01-19', 2, 2),
(133, 'tttttt', 'rrrr', '2018-01-19', 2, 11),
(134, 'cups', 'dsdss', '2018-01-19', 2, 8),
(135, 'cpu', 'computer engineering', '2018-01-19', 2, 2),
(136, 'readers', 'tads', '2018-01-19', 2, 11),
(137, 'play', 'learn', '2018-01-19', 2, 11),
(138, 'console', 'document', '2018-01-19', 2, 4),
(139, 'check', 'following', '2018-01-19', 2, 11),
(140, 'model', 'database', '2018-01-19', 2, 6),
(141, 'pp', 'attack', '2018-01-19', 2, 3),
(142, 'new entry test again', 'Welcome To Task Manager', '2018-01-19', 2, 11),
(143, 'read', 'readreadread', '2018-01-20', 2, 1),
(144, 'object access', 'object access', '2018-01-20', 2, 4),
(145, 'thank you', 'entry', '2018-01-20', 2, 11),
(146, 'engr eazy', 'Baptism of programming', '2018-01-21', 2, 11),
(147, 'Dalecoin', 'cryptocurrency', '2018-01-22', 2, 11),
(148, 'Xtreme Programming', 'going extreme with php', '2018-01-22', 2, 11),
(149, 'hello world', 'Hello programming', '2018-01-22', 2, 12),
(150, 'good', 'this is good', '2018-01-23', 2, 11),
(151, 'read', 'study', '2018-01-01', 2, 12),
(152, 'study', 'to show thyself approved', '2018-01-24', 2, 12),
(153, 'slepp', 'rest', '0000-00-00', 2, 12),
(154, 'tea', 'green tea is cool', '0000-00-00', 2, 12),
(155, 'sucess', 'It\'s easy to move with the crowd, it takes courage to stand alone', '2018-01-24', 2, 12),
(156, 'one', 'more time', '2018-01-24', 2, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
