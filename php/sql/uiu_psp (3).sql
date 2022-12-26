-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 06:39 PM
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
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` varchar(100) NOT NULL,
  `problem_id` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `problem_id`, `description`, `posted_by`, `last_modified`) VALUES
('P3_1672065183_011202271_S0', 'P3_1672065183_011202271', 'ersdhsrthwsdfhsfdhdfgs', '01202088', '2022-12-26 23:21:06'),
('P3_1672065183_011202271_S1', 'P3_1672065183_011202271', 'ersdhsrthwsdfhsfdhdfgs', '01202088', '2022-12-26 23:21:33'),
('P3_1672065183_011202271_S10', 'P3_1672065183_011202271', 'egsghsgsdfgs', '01202088', '2022-12-26 23:31:11'),
('P3_1672065183_011202271_S11', 'P3_1672065183_011202271', 'rthrshfg', '01202088', '2022-12-26 23:31:57'),
('P3_1672065183_011202271_S12', 'P3_1672065183_011202271', 'hjsdfgs', '01202088', '2022-12-26 23:33:16'),
('P3_1672065183_011202271_S13', 'P3_1672065183_011202271', 'hjsdfgs', '01202088', '2022-12-26 23:33:18'),
('P3_1672065183_011202271_S14', 'P3_1672065183_011202271', 'hjsdfgs', '01202088', '2022-12-26 23:33:18'),
('P3_1672065183_011202271_S15', 'P3_1672065183_011202271', 'rhdghfdghdfg', '01202088', '2022-12-26 23:33:32'),
('P3_1672065183_011202271_S16', 'P3_1672065183_011202271', 'hrhsgfh', '01202088', '2022-12-26 23:34:36'),
('P3_1672065183_011202271_S2', 'P3_1672065183_011202271', 'ersdhsrthwsdfhsfdhdfgs', '01202088', '2022-12-26 23:23:49'),
('P3_1672065183_011202271_S3', 'P3_1672065183_011202271', 'hxfnfghsfdgh', '01202088', '2022-12-26 23:24:26'),
('P3_1672065183_011202271_S4', 'P3_1672065183_011202271', 'hwegerfg', '01202088', '2022-12-26 23:27:19'),
('P3_1672065183_011202271_S5', 'P3_1672065183_011202271', 'hwegerfg', '01202088', '2022-12-26 23:27:34'),
('P3_1672065183_011202271_S6', 'P3_1672065183_011202271', 'hwegerfg', '01202088', '2022-12-26 23:27:35'),
('P3_1672065183_011202271_S7', 'P3_1672065183_011202271', 'aegesadgdefg', '01202088', '2022-12-26 23:28:06'),
('P3_1672065183_011202271_S8', 'P3_1672065183_011202271', 'fasdfgasd', '01202088', '2022-12-26 23:28:52'),
('P3_1672065183_011202271_S9', 'P3_1672065183_011202271', 'fsdfasdfasdf', '01202088', '2022-12-26 23:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `ans_img`
--

CREATE TABLE `ans_img` (
  `img_name` varchar(255) NOT NULL,
  `ans_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ans_img`
--

INSERT INTO `ans_img` (`img_name`, `ans_id`) VALUES
('1672075266Web capture_26-12-2022_203242_stackoverflow.com.jpeg', 'P3_1672065183_011202271_S0'),
('1672075293Web capture_26-12-2022_203242_stackoverflow.com.jpeg', 'P3_1672065183_011202271_S1'),
('1672075429Web capture_26-12-2022_203242_stackoverflow.com.jpeg', 'P3_1672065183_011202271_S2'),
('1672075466Web capture_26-12-2022_203242_stackoverflow.com.jpeg', 'P3_1672065183_011202271_S3'),
('16720756866123803f69d272c03f7ebbd3d59c173f.jpg', 'P3_1672065183_011202271_S7'),
('1672075732Web capture_26-12-2022_203242_stackoverflow.com.jpeg', 'P3_1672065183_011202271_S8');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(30) NOT NULL,
  `course_title` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_title`) VALUES
('ACT 111/ACT 2111', 'Financial and Managerial Accounting'),
('BDS 1201', 'History of the Emergence of Bangladesh'),
('BIO 3105', 'Biology for Engineers'),
('CHEM 2101/CHEM 101', 'Chemistry'),
('CSE 1111/CSI 121', 'Structured Programming Language'),
('CSE 1115/CSI 211', 'Object Oriented Programming'),
('CSE 113/EEE 2113', 'Electrical Circuits\r\n '),
('CSE 123/EEE 2123', 'Electronics\r\n '),
('CSE 1325/CSE 225', 'Digital Logic Design'),
('CSE 2213/CSI 219', 'Discrete Mathematics'),
('CSE 2215/CSI 217', 'Data Structure/Data Structure and Algorithms I'),
('CSE 2217/CSI 227', 'Algorithms/Data Structure and Algorithms II'),
('CSE 2233/CSI 233', 'Theory of Computation/Theory of Computing'),
('CSE 313/CSE 3313/EEE 4411', 'Computer Architecture'),
('CSE 315/CSE 3715', 'Data Communication\r\n '),
('CSE 323/CSE 3711/EEE 4413', 'Computer Networks'),
('CSE 3411/CSI 311', 'System Analysis and Design\r\n'),
('CSE 3421/CSI 321', 'Software Engineering\r\n'),
('CSE 3521/CSI 221', 'Database Management Systems'),
('CSE 3811/CSI 341', 'Artificial Intelligence'),
('CSE 4165/CSE 465', 'Web Programming\r\n'),
('CSE 4181/CSE 481', 'Mobile Application Development\r\n '),
('CSE 425/CSE 4325', 'Microprocessor, Microcontroller and Interfacing/Microprocessors and Microcontrol'),
('CSE 429/CSE 4329', 'Digital System Design'),
('CSE 4451/CSE 451', 'Human Computer Interaction'),
('CSE 4495/CSE 495', ' Software Testing and Quality Assurance'),
('CSE 4509/CSI 309', 'Operating System Concepts/Operating Systems'),
('CSE 4521/CSE 4621', 'Computer Graphics'),
('CSE 4523/CSI 423', 'Simulation & Modeling/Simulation and Modeling\r\n'),
('CSE 4587/CSE 487', 'Cloud Computing'),
('CSE 4611/CSI 411', 'Compiler/Compiler Design'),
('CSE 4633', ' Basic Graph Theory\r\n'),
('CSE 469/PMG 4101', 'Project Management'),
('CSE 483/CSE 4883', 'Digital Image Processing\r\n '),
('CSE 4889/CSE 489', 'Machine Learning'),
('CSE 4891/CSE 491', 'Data Mining\r\n '),
('CSE 4893/CSE 493', 'Introduction to Bioinformatics'),
('CSI 415', 'Pattern Recognition\r\n'),
('ECO 2101/ECO 213', ' Economics\r\n'),
('EEE 1001/EEE 101', 'Electrical Circuits I\r\n'),
('EEE 1003/EEE 103', 'Electrical Circuits II'),
('EEE 105/EEE 2101', 'Electronics I\r\n '),
('EEE 121/EEE 2401', 'Structured Programming Language'),
('EEE 203/EEE 2201', 'Energy Conversion I\r\n'),
('EEE 205/EEE 2203', 'Energy Conversion II\r\n'),
('EEE 207/EEE 2103', ' Electronics II\r\n'),
('EEE 2105/EEE 223', 'Digital Electronics'),
('EEE 211/EEE 2301', 'Signals and Linear System'),
('EEE 255/EEE 3303', 'Probability and Random Signal Analysis'),
('EEE 301/EEE 3107', 'Electrical Properties of Materials\r'),
('EEE 303/EEE 3305', 'Engineering Electromagnetics\r\n'),
('EEE 305/EEE 3205', 'Power System\r\n'),
('EEE 307/EEE 3207', 'Power Electronics\r\n'),
('EEE 309/EEE 3307', 'Communication Theory\r\n'),
('EEE 311/EEE 3309', 'Digital Signal Processing\r\n'),
('EEE 3403/EEE 423', 'Microprocessor and Interfacing'),
('EEE 401/EEE 4109', ' Control System\r\n'),
('EEE 4115/EEE 433', 'Optoelectronics'),
('EEE 4121/EEE 441', 'VLSI Design\r\n '),
('EEE 4223/EEE 483', 'Renewable Energy\r\n'),
('ENG 101/ENG 1011', 'English I\r\n'),
('ENG 1013/ENG 103', 'English II'),
('IPE 3401/IPE 401', 'Industrial and Operational Manageme'),
('MAT 2109/MATH 201', 'Coordinate Geometry and Vector Analysis\r\n'),
('MATH 1101/MATH 003', 'Calculus I/Elementary Calculus'),
('MATH 1103/MATH 151', 'Calculus II/Differential and Integr'),
('MATH 1151/MATH 151', 'Differential and Integral Calculus/'),
('MATH 183/MATH 2183', 'Calculus and Linear Algebra/Linear '),
('MATH 2105', 'Linear Algebra and Differential Equ'),
('MATH 2107/MATH 187', 'Complex Variables, Fourier and Laplace Transforms'),
('MATH 2205/STAT 205', 'Probability and Statistics\r\n '),
('PHY 101/PHY 1101', 'Physics I\r\n '),
('PHY 103/PHY 1103', 'Physics II\r\n'),
('PHY 105/PHY 2105', 'Physics\r\n '),
('PSY 101/PSY 2101', 'Psychology\r\n '),
('SOC 101/SOC 2101', ' Society, Environment and Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`name`) VALUES
('Final'),
('Mid');

-- --------------------------------------------------------

--
-- Table structure for table `pblm_img`
--

CREATE TABLE `pblm_img` (
  `img_name` varchar(100) NOT NULL,
  `problem_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pblm_img`
--

INSERT INTO `pblm_img` (`img_name`, `problem_id`) VALUES
('1672034583Web capture_26-12-2022_12212_stackoverflow.com.jpeg', 'P2_1672034583_011202271'),
('1672053082Web capture_26-12-2022_171110_stackoverflow.com.jpeg', 'P2_1672053082_01202088'),
('1672065183Web capture_26-12-2022_203242_stackoverflow.com.jpeg', 'P3_1672065183_011202271');

-- --------------------------------------------------------

--
-- Table structure for table `problem_asked`
--

CREATE TABLE `problem_asked` (
  `title` text NOT NULL,
  `problem_id` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `topic_name` varchar(100) NOT NULL,
  `views` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_asked`
--

INSERT INTO `problem_asked` (`title`, `problem_id`, `description`, `course_code`, `topic_name`, `views`, `student_id`, `last_modified`) VALUES
('How do I convert a string to a number in PHP?', 'P1_1672052432_011202271', 'I want to convert these types of values, \'3\', \'2.34\', \'0.234343\', etc. to a number. In JavaScript we can use Number(), but is there any similar method available in PHP?', 'CSE 3521/CSI 221', 'PHP', 0, '011202271', '2022-12-26 17:00:32'),
('TeamCity server WebSocket connection error in Docker image behind Apache proxyTeamCity server WebSocket connection error in Docker image behind Apache proxy', 'P2_1672034583_011202271', 'I am running TeamCity server behind Apache proxy. My Apache configuration of virtual host teamcity.example.com.\n\n<IfModule mod_ssl.c>\n<VirtualHost *:443> \n \n    ProxyPreserveHost On\n\n    ProxyPreserveHost On\n    ProxyRequests Off\n    ServerName www.teamcity.example.com\n    ServerAlias teamcity.example.com\n\n    ProxyPass / http://localhost:8111/\n    ProxyPassReverse / http://localhost:8111/\n\n    # This doesn\'t work \n    ProxyPass           /app/subscriptions ws://localhost:8111/app/subscriptions connectiontimeout=240 timeout=1200\n    ProxyPassReverse    /app/subscriptions ws://localhost:8111/app/subscriptions\n\n    # This doesn\'t work         \n    ProxyPass           / http://localhost:8111/ connectiontimeout=5 timeout=300\n    ProxyPassReverse    / http://localhost:8111/\n\n    SSLCertificateFile /etc/letsencrypt/live/teamcity.example.com/fullchain.pem\n    SSLCertificateKeyFile /etc/letsencrypt/live/teamcity.example.com/privkey.pem\n    Include /etc/letsencrypt/options-ssl-apache.conf\n\n</VirtualHost>\n</IfModule>', 'CSE 3521/CSI 221', 'B+ tree', 0, '011202271', '2022-12-26 12:03:38'),
('Cryptic React error \"unstable_flushDiscreteUpdates: Cannot flush updates when React is already rendering.\"', 'P2_1672053082_01202088', 'I have been able to find limited information on this error and was hoping someone could take a deep dive into explaining exactly what causes this. I haven\'t changed any of the code that appears to be showing up in the call stack recently, so I was wondering if this is from a newer update?', 'CSE 4521/CSE 4621', 'Graphics', 0, '01202088', '2022-12-26 17:11:22'),
('Flutter Method to Display opening hours using optimized code', 'P3_1672065183_011202271', 'I have managed to compile the code below but know that I can display the opening hours using a better method. I believe it can be done using Future Builder but I am not experienced as yet. The code below loads the items and then goes and find out the opening hours. Can anyone assist to optimize this code so It shows on first instance. I believe there are performance issues with the code below.', 'CSE 323/CSE 3711/EEE 4413', 'Optimization', 0, '011202271', '2022-12-26 20:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `qp_id` varchar(30) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `trimester_id` varchar(30) NOT NULL,
  `ques_type` varchar(30) NOT NULL,
  `ques_file` varchar(50) NOT NULL,
  `error` int(11) NOT NULL,
  `uploader_id` varchar(30) NOT NULL,
  `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`qp_id`, `course_code`, `trimester_id`, `ques_type`, `ques_file`, `error`, `uploader_id`, `last_modified`) VALUES
('221~Final~SOC_101', 'SOC 101/SOC 2101', '221', 'Final', '221~Final~SOC_101~1671937353.pdf', 1, '011202271', '2022-12-25 09:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `taken_courses`
--

CREATE TABLE `taken_courses` (
  `student_id` varchar(20) NOT NULL,
  `course_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taken_courses`
--

INSERT INTO `taken_courses` (`student_id`, `course_code`) VALUES
('011202271', 'CSE 323/CSE 3711/EEE 4413'),
('011202271', 'CSE 4521/CSE 4621'),
('011202271', 'CSE 313/CSE 3313/EEE 4411'),
('011202271', 'CSE 3521/CSI 221');

-- --------------------------------------------------------

--
-- Table structure for table `trimester`
--

CREATE TABLE `trimester` (
  `trimester_id` varchar(30) NOT NULL,
  `trimester_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trimester`
--

INSERT INTO `trimester` (`trimester_id`, `trimester_name`) VALUES
('221', 'Spring'),
('222', 'Summer'),
('223', 'Fall');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `student_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`student_id`, `name`, `email`, `password`, `img`) VALUES
('011202271', 'Sanvi Ahmed', 'sniloy202271@bscse.uiu.ac.bd', '1234', '1671794447default-img.jpg'),
('01202088', 'Md. Saiduzzaman Apu', 'mapu202084@bscse.uiu.ac.bd', '1234', '1672071366download.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `posted_by` (`posted_by`),
  ADD KEY `problem_id` (`problem_id`);

--
-- Indexes for table `ans_img`
--
ALTER TABLE `ans_img`
  ADD PRIMARY KEY (`img_name`),
  ADD KEY `ans_id` (`ans_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `pblm_img`
--
ALTER TABLE `pblm_img`
  ADD PRIMARY KEY (`img_name`),
  ADD KEY `problem_id` (`problem_id`);

--
-- Indexes for table `problem_asked`
--
ALTER TABLE `problem_asked`
  ADD PRIMARY KEY (`problem_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`qp_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `trimester_id` (`trimester_id`),
  ADD KEY `uploader_id` (`uploader_id`),
  ADD KEY `ques_type` (`ques_type`);

--
-- Indexes for table `taken_courses`
--
ALTER TABLE `taken_courses`
  ADD KEY `tk_cc` (`course_code`),
  ADD KEY `tk_sid` (`student_id`);

--
-- Indexes for table `trimester`
--
ALTER TABLE `trimester`
  ADD PRIMARY KEY (`trimester_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `users` (`student_id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problem_asked` (`problem_id`);

--
-- Constraints for table `ans_img`
--
ALTER TABLE `ans_img`
  ADD CONSTRAINT `ans_img_ibfk_1` FOREIGN KEY (`ans_id`) REFERENCES `answer` (`answer_id`);

--
-- Constraints for table `pblm_img`
--
ALTER TABLE `pblm_img`
  ADD CONSTRAINT `pblm_img_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `problem_asked` (`problem_id`);

--
-- Constraints for table `problem_asked`
--
ALTER TABLE `problem_asked`
  ADD CONSTRAINT `problem_asked_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
  ADD CONSTRAINT `problem_asked_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`student_id`);

--
-- Constraints for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD CONSTRAINT `question_paper_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
  ADD CONSTRAINT `question_paper_ibfk_2` FOREIGN KEY (`trimester_id`) REFERENCES `trimester` (`trimester_id`),
  ADD CONSTRAINT `question_paper_ibfk_4` FOREIGN KEY (`uploader_id`) REFERENCES `users` (`student_id`),
  ADD CONSTRAINT `question_paper_ibfk_5` FOREIGN KEY (`ques_type`) REFERENCES `exams` (`name`);

--
-- Constraints for table `taken_courses`
--
ALTER TABLE `taken_courses`
  ADD CONSTRAINT `tk_cc` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tk_sid` FOREIGN KEY (`student_id`) REFERENCES `users` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
