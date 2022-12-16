-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 04:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiu_psp`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_Code` varchar(30) NOT NULL,
  `Course_Title` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_Code`, `Course_Title`) VALUES
(' SOC 101/SOC 2101', ' Society, Environment and Engineering'),
('ACT 111/ACT 2111', 'Financial and Managerial Accounting'),
('BDS 1201\r\n', 'History of the Emergence of Bangladesh\r\n'),
('BIO 3105', 'Biology for Engineers'),
('CHE 2101/CHEM 101', 'Chemistry'),
('CSE 1111/CSI 121\r\n', 'Structured Programming Language\r\n'),
('CSE 1115/CSI 211\r\n', 'Object Oriented Programming/Object-Oriented Programming\r\n'),
('CSE 113/EEE 2113\r\n', 'Electrical Circuits\r\n '),
('CSE 123/EEE 2123\r\n', 'Electronics\r\n '),
('CSE 1325/CSE 225', 'Digital Logic Design'),
('CSE 2213/CSI 219\r\n', 'Discrete Mathematics\r\n'),
('CSE 2215/CSI 217\r\n', 'Data Structure/Data Structure and Algorithms I\r\n'),
('CSE 2217/CSI 227\r\n', 'Algorithms/Data Structure and Algorithms II\r\n'),
('CSE 2233/CSI 233\r\n', 'Theory of Computation/Theory of Computing'),
('CSE 313/CSE 3313/EEE 4411', 'Computer Architecture'),
('CSE 315/CSE 3715\r\n', 'Data Communication\r\n '),
('CSE 323/CSE 3711/EEE 4413', 'Computer Networks\r\n'),
('CSE 3411/CSI 311\r\n', 'System Analysis and Design\r\n'),
('CSE 3421/CSI 321\r\n', 'Software Engineering\r\n'),
('CSE 3521/CSI 221\r\n', 'Database Management Systems\r\n'),
('CSE 3811/CSI 341\r\n ', 'Artificial Intelligence'),
('CSE 4165/CSE 465\r\n', 'Web Programming\r\n'),
('CSE 4181/CSE 481\r\n', 'Mobile Application Development\r\n '),
('CSE 425/CSE 4325', 'Microprocessor, Microcontroller and Interfacing/Microprocessors and Microcontrol'),
('CSE 429/CSE 4329', 'Digital System Design'),
('CSE 4451/CSE 451\r\n ', 'Human Computer Interaction'),
('CSE 4495/CSE 495\r\n', ' Software Testing and Quality Assurance/Software Testing, Verification and Quali'),
('CSE 4509/CSI 309', 'Operating System Concepts/Operating Systems'),
('CSE 4521/CSE 4621/CS', 'Computer Graphics'),
('CSE 4523/CSI 423\r\n', 'Simulation & Modeling/Simulation and Modeling\r\n'),
('CSE 4587/CSE 487', 'Cloud Computing'),
('CSE 4611/CSI 411', 'Compiler/Compiler Design'),
('CSE 4633\r\n', ' Basic Graph Theory\r\n'),
('CSE 469/PMG 4101', 'Project Management'),
('CSE 483/CSE 4883\r\n', 'Digital Image Processing\r\n '),
('CSE 4889/CSE 489\r\n ', 'Machine Learning'),
('CSE 4891/CSE 491\r\n', 'Data Mining\r\n '),
('CSE 4893/CSE 493\r\n ', 'Introduction to Bioinformatics'),
('CSI 415\r\n', 'Pattern Recognition\r\n'),
('ECO 2101/ECO 213\r\n', ' Economics\r\n'),
('EEE 1001/EEE 101\r\n', 'Electrical Circuits I\r\n'),
('EEE 1003/EEE 103\r\n', 'Electrical Circuits II'),
('EEE 105/EEE 2101\r\n', 'Electronics I\r\n '),
('EEE 121/EEE 2401', 'Structured Programming Language'),
('EEE 203/EEE 2201\r\n', 'Energy Conversion I\r\n'),
('EEE 205/EEE 2203\r\n', 'Energy Conversion II\r\n'),
('EEE 207/EEE 2103\r\n', ' Electronics II\r\n'),
('EEE 2105/EEE 223', 'Digital Electronics'),
('EEE 211/EEE 2301\r\n', 'Signals and Linear System/Signals and Linear Systems\r\n'),
('EEE 255/EEE 3303\r\n', 'Probability and Random Signal Analysis/Probability, Statistics and Random Variab'),
('EEE 301/EEE 3107\r\n ', 'Electrical Properties of Materials\r'),
('EEE 303/EEE 3305\r\n', 'Engineering Electromagnetics\r\n'),
('EEE 305/EEE 3205\r\n', 'Power System\r\n'),
('EEE 307/EEE 3207\r\n', 'Power Electronics\r\n'),
('EEE 309/EEE 3307\r\n', 'Communication Theory\r\n'),
('EEE 311/EEE 3309', 'Digital Signal Processing\r\n'),
('EEE 3403/EEE 423', 'Microprocessor and Interfacing'),
('EEE 401/EEE 4109\r\n ', ' Control System\r\n'),
('EEE 4115/EEE 433', 'Optoelectronics'),
('EEE 4121/EEE 441\r\n', 'VLSI Design\r\n '),
('EEE 4223/EEE 483\r\n', 'Renewable Energy\r\n'),
('ENG 101/ENG 1011', 'English I\r\n'),
('ENG 1013/ENG 103', 'English II'),
('IPE 3401/IPE 401', 'Industrial and Operational Manageme'),
('MAT 1101/MATH 003', 'Calculus I/Elementary Calculus'),
('MAT 1103/MATH 151\r\n ', 'Calculus II/Differential and Integr'),
('MAT 2105', 'Linear Algebra and Differential Equ'),
('MAT 2107/MATH 187', 'Complex Variables, Fourier and Laplace Transforms/Fourier & Laplace Transformati'),
('MAT 2109/MATH 201\r\n', 'Coordinate Geometry and Vector Analysis\r\n'),
('MATH 1151/MATH 151', 'Differential and Integral Calculus/'),
('MATH 183/MATH 2183', 'Calculus and Linear Algebra/Linear '),
('MATH 2205/STAT 205\r\n', 'Probability and Statistics\r\n '),
('PHY 101/PHY 1101\r\n', 'Physics I\r\n '),
('PHY 103/PHY 1103\r\n', 'Physics II\r\n'),
('PHY 105/PHY 2105\r\n', 'Physics\r\n '),
('PSY 101/PSY 2101\r\n', 'Psychology\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_no` int(10) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_no`, `student_id`, `name`, `email`, `password`) VALUES
(40, '3453453', 'tanvir', 'tanvir@gmail.com', 'fghfhfrwg'),
(43, '36453645', 'niloy', 'niloy@gmail.com', 'rhfdhbsdfgbh'),
(54, '011202536', 'Towsif Ahmed', 'towsif@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_Code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_no`,`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
