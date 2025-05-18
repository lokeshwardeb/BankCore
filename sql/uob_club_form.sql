-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 06:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uob_club_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_members`
--

CREATE TABLE `club_members` (
  `member_id` int(11) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `field_of_interest` varchar(255) NOT NULL,
  `interested_learning_about` varchar(255) NOT NULL,
  `weapons` varchar(255) NOT NULL,
  `programming_languages` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `club_members`
--

INSERT INTO `club_members` (`member_id`, `member_type`, `name`, `department`, `id`, `batch`, `email`, `phone`, `gender`, `address`, `field_of_interest`, `interested_learning_about`, `weapons`, `programming_languages`, `datetime`) VALUES
(3, 'secretary', 'Mr.Secretary', 'dkl', '45', '54546', 'd@d.d', '1212', 'Male', 'bd', 'CTF(Capture the flag),Competitive Programming,App development,Machine Learning,Cybersecurity,Networking,Digital Marketing,Artificial Intelligence,Safety Critical Systems,Databases,Robotics and Mechatronics,Game Development,Software Architecture,UI/UX,IoT,', 'Programming, coding', 'HTML/CSS,Visual Studio code,Code blocks,Github,Git,Database,XAMPP Server,Server,Linux,Googling,Emailing', 'HTML, CSS, JS, PHP, SQL', '2023-10-17 22:03:17'),
(4, 'treasurer', 'Mr.Treasurer', 'dkl', '45', '54546', 'd@d.d', '1212', 'Male', 'bd', 'CTF(Capture the flag),Competitive Programming,App development,Machine Learning,Cybersecurity,Networking,Digital Marketing,Artificial Intelligence,Safety Critical Systems,Databases,Robotics and Mechatronics,Game Development,Software Architecture,UI/UX,IoT,', 'Programming, coding', 'HTML/CSS,Visual Studio code,Code blocks,Github,Git,Database,XAMPP Server,Server,Linux,Googling,Emailing', 'HTML, CSS, JS, PHP, SQL', '2023-10-17 22:04:37'),
(6, 'member', 'hkhk', 'dkl', '454', '2154', 'd@d.d', '5454', 'Male', '454bjjhjh', 'CTF(Capture the flag),Competitive Programming,Game Development,Software Architecture', 'jdjkfdjkfkdjlfd', 'Github,Git,Googling,Emailing', 'jjdkfjkjfkjdl', '2023-10-18 09:16:12'),
(7, 'member', 'hkhk', 'dkl', '454', '2154', 'd@d.d', '5454', 'Male', '454bjjhjh', 'CTF(Capture the flag),Competitive Programming,Game Development,Software Architecture', 'jdjkfdjkfkdjlfd', 'Github,Git,Googling,Emailing', 'jjdkfjkjfkjdl', '2023-10-18 09:16:29'),
(8, 'member', 'L', 'c', '5', '2', 'd@c.c', '12', 'Male', 'b', 'CTF(Capture the flag),Game Development', 'Programming, coding', 'HTML/CSS,Visual Studio code', 'HTML, CSS, JS, PHP, SQL', '2023-10-18 09:37:02'),
(9, 'member', 'Check', 'c', '45', 'cd', 'd@d.c', '12', 'Male', 'bd', 'CTF(Capture the flag),Competitive Programming', 'Programming, coding', 'Visual Studio code,Code blocks', 'HTML, CSS, JS, PHP, SQL', '2023-10-18 09:38:39'),
(10, 'member', 'Check', 'C', '4545', '54546', 'd@d.c', '12', 'Female', 'fdjk', 'Machine Learning,Cybersecurity', 'Programming, coding', 'Code blocks,Github,Git,Server', 'HTML, CSS, JS, PHP, SQL', '2023-10-18 09:40:18'),
(11, 'member', 'd', 'dddd', '1212', '2312', 'd@d.c', '12', 'Male', 'bd', 'Cybersecurity,Networking,Artificial Intelligence,Gaming,Photography,Videography', 'Programming, coding', 'Visual Studio code,Server', 'HTML, CSS, JS, PHP, SQL', '2023-10-18 09:57:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_members`
--
ALTER TABLE `club_members`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club_members`
--
ALTER TABLE `club_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
