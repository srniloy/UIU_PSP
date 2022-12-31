-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 07:42 PM
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
  `posted_by` varchar(20) DEFAULT NULL,
  `last_modified` datetime NOT NULL DEFAULT current_timestamp(),
  `is_accepted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `problem_id`, `description`, `posted_by`, `last_modified`, `is_accepted`) VALUES
('P0_1672511324_011202271_S0', 'P0_1672511324_011202271', 'Electric current is flow of electrons in a conductor. The force required to make current flow through a conductor is called voltage and potential is the other term of voltage. For example, the first element has more positive charges, so it has higher potential. On the other hand, the second element has charges that are more negative so it has lower potential. The difference between two points is called potential difference.\r\n\r\nElectromotive force means the force which makes current continuously flows through a conductor. This force can be generated from power generator, battery, flashlight battery and fuel cell, etc.', '01202088', '2023-01-01 00:31:02', 1);

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
('1672511462Screenshot 2023-01-01 at 00-30-48 Understanding Electricity - Learn about electricity current voltage and resistance.png', 'P0_1672511324_011202271_S0');

-- --------------------------------------------------------

--
-- Table structure for table `a_comment`
--

CREATE TABLE `a_comment` (
  `comment_text` varchar(255) NOT NULL,
  `answer_id` varchar(100) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `a_likes`
--

CREATE TABLE `a_likes` (
  `user_id` varchar(20) DEFAULT NULL,
  `answer_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(' SOC 101/SOC 2101', ' Society, Environment and Engineering'),
('ACT 111/ACT 2111', 'Financial and Managerial Accounting'),
('BDS 1201', 'History of the Emergence of Bangladesh'),
('BIO 3105', 'Biology for Engineers'),
('CHE 2101/CHEM 101', 'Chemistry'),
('CSE 1111/CSI 121', 'Structured Programming Language'),
('CSE 1115/CSI 211', 'Object Oriented Programming/Object-Oriented Programming'),
('CSE 113/EEE 2113', 'Electrical Circuits'),
('CSE 123/EEE 2123', 'Electronics'),
('CSE 1325/CSE 225', 'Digital Logic Design'),
('CSE 2213/CSI 219', 'Discrete Mathematics'),
('CSE 2215/CSI 217', 'Data Structure/Data Structure and Algorithms I'),
('CSE 2217/CSI 227', 'Algorithms/Data Structure and Algorithms II'),
('CSE 2233/CSI 233', 'Theory of Computation/Theory of Computing'),
('CSE 313/CSE 3313/EEE 4411', 'Computer Architecture'),
('CSE 315/CSE 3715', 'Data Communication'),
('CSE 323/CSE 3711/EEE 4413', 'Computer Networks'),
('CSE 3411/CSI 311', 'System Analysis and Design'),
('CSE 3421/CSI 321', 'Software Engineering'),
('CSE 3521/CSI 221', 'Database Management Systems'),
('CSE 3811/CSI 341', 'Artificial Intelligence'),
('CSE 4165/CSE 465', 'Web Programming'),
('CSE 4181/CSE 481', 'Mobile Application Development'),
('CSE 425/CSE 4325', 'Microprocessor, Microcontroller and Interfacing/Microprocessors and Microcontrol'),
('CSE 429/CSE 4329', 'Digital System Design'),
('CSE 4451/CSE 451', 'Human Computer Interaction'),
('CSE 4495/CSE 495', ' Software Testing and Quality Assurance/Software Testing, Verification and Quali'),
('CSE 4509/CSI 309', 'Operating System Concepts/Operating Systems'),
('CSE 4521/CSE 4621', 'Computer Graphics'),
('CSE 4523/CSI 423', 'Simulation & Modeling/Simulation and Modeling'),
('CSE 4587/CSE 487', 'Cloud Computing'),
('CSE 4611/CSI 411', 'Compiler/Compiler Design'),
('CSE 4633', ' Basic Graph Theory'),
('CSE 469/PMG 4101', 'Project Management'),
('CSE 483/CSE 4883', 'Digital Image Processing'),
('CSE 4889/CSE 489', 'Machine Learning'),
('CSE 4891/CSE 491', 'Data Mining'),
('CSE 4893/CSE 493', 'Introduction to Bioinformatics'),
('CSI 415', 'Pattern Recognition'),
('ECO 2101/ECO 213', ' Economics'),
('EEE 1001/EEE 101', 'Electrical Circuits I'),
('EEE 1003/EEE 103', 'Electrical Circuits II'),
('EEE 105/EEE 2101', 'Electronics I'),
('EEE 121/EEE 2401', 'Structured Programming Language'),
('EEE 203/EEE 2201', 'Energy Conversion I'),
('EEE 205/EEE 2203', 'Energy Conversion II'),
('EEE 207/EEE 2103', ' Electronics II'),
('EEE 2105/EEE 223', 'Digital Electronics'),
('EEE 211/EEE 2301', 'Signals and Linear System/Signals and Linear Systems'),
('EEE 255/EEE 3303', 'Probability and Random Signal Analysis/Probability, Statistics and Random Variab'),
('EEE 301/EEE 3107', 'Electrical Properties of Materials'),
('EEE 303/EEE 3305', 'Engineering Electromagnetics'),
('EEE 305/EEE 3205', 'Power System'),
('EEE 307/EEE 3207', 'Power Electronics'),
('EEE 309/EEE 3307', 'Communication Theory'),
('EEE 311/EEE 3309', 'Digital Signal Processing'),
('EEE 3403/EEE 423', 'Microprocessor and Interfacing'),
('EEE 401/EEE 4109', 'Control System'),
('EEE 4115/EEE 433', 'Optoelectronics'),
('EEE 4121/EEE 441', 'VLSI Design'),
('EEE 4223/EEE 483', 'Renewable Energy'),
('ENG 101/ENG 1011', 'English I'),
('ENG 1013/ENG 103', 'English II'),
('IPE 3401/IPE 401', 'Industrial and Operational Management'),
('MATH 1101/MATH 003', 'Calculus I/Elementary Calculus'),
('MATH 1103/MATH 151', 'Calculus II/Differential and Integral Calculus'),
('MATH 1151/MATH 151', 'Differential and Integral Calculus'),
('MATH 183/MATH 2183', 'Calculus and Linear Algebra/Linear'),
('MATH 2105', 'Linear Algebra and Differential Equation'),
('MATH 2107/MATH 187', 'Complex Variables, Fourier and Laplace Transforms/Fourier & Laplace Transformati'),
('MATH 2109/MATH 201', 'Coordinate Geometry and Vector Analysis'),
('MATH 2205/STAT 205', 'Probability and Statistics'),
('PHY 101/PHY 1101', 'Physics I'),
('PHY 103/PHY 1103', 'Physics II'),
('PHY 105/PHY 2105', 'Physics'),
('PSY 101/PSY 2101', 'Psychology');

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
('1672511324afc.png', 'P0_1672511324_011202271');

-- --------------------------------------------------------

--
-- Table structure for table `problem_asked`
--

CREATE TABLE `problem_asked` (
  `title` text NOT NULL,
  `problem_id` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `course_code` varchar(30) DEFAULT NULL,
  `topic_name` varchar(100) NOT NULL,
  `views` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `last_modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_asked`
--

INSERT INTO `problem_asked` (`title`, `problem_id`, `description`, `course_code`, `topic_name`, `views`, `student_id`, `last_modified`) VALUES
('How to measure Current, Voltage and Resistance?', 'P0_1672511324_011202271', 'While I was trying to solve this, I have faced that A current of one amp means that current pass through a cross-section of two conductors, which are placed in parallel 1 meter apart with 2x10-7 Newton per meter force occur in each conductor. It can also mean charges of one coulomb (or 6.24x1018 electrons) passing through a cross-section of a conductor in one second.', 'EEE 207/EEE 2103', 'Current Flow', 4, '011202271', '2023-01-01 00:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `p_comment`
--

CREATE TABLE `p_comment` (
  `comment_text` varchar(255) NOT NULL,
  `problem_id` varchar(100) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_likes`
--

CREATE TABLE `p_likes` (
  `problem_id` varchar(100) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('221~Mid~CSE_4521', 'CSE 4521/CSE 4621', '221', 'Mid', '221~Mid~CSE_4521~1672511008.pdf', 1, '011202271', '2023-01-01 00:23:50');

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
('011202271', 'CSE 4633'),
('011202271', 'CSE 313/CSE 3313/EEE 4411'),
('011202271', 'CSE 4521/CSE 4621');

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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`student_id`, `name`, `email`, `password`, `img`, `rating`) VALUES
('011202271', 'Shahriar Rahman Niloy', 'sniloy202271@bscse.uiu.ac.bd', '1234', '1672510918Screenshot 2023-01-01 at 00-21-34 60 Cartoon DP for Boys (HD) - PhotosFile.png', 11),
('01202088', 'Md. Saiduzzaman Apu', 'mapu202084@bscse.uiu.ac.bd', '1234', '1672511393download.jpg', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `answer_ibfk_1` (`posted_by`),
  ADD KEY `answer_ibfk_2` (`problem_id`);

--
-- Indexes for table `ans_img`
--
ALTER TABLE `ans_img`
  ADD PRIMARY KEY (`img_name`),
  ADD KEY `ans_img_ibfk_1` (`ans_id`);

--
-- Indexes for table `a_comment`
--
ALTER TABLE `a_comment`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `a_likes`
--
ALTER TABLE `a_likes`
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `pblm_img_ibfk_1` (`problem_id`);

--
-- Indexes for table `problem_asked`
--
ALTER TABLE `problem_asked`
  ADD PRIMARY KEY (`problem_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `p_comment`
--
ALTER TABLE `p_comment`
  ADD KEY `problem_id` (`problem_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `p_likes`
--
ALTER TABLE `p_likes`
  ADD KEY `problem_id` (`problem_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `users` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problem_asked` (`problem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ans_img`
--
ALTER TABLE `ans_img`
  ADD CONSTRAINT `ans_img_ibfk_1` FOREIGN KEY (`ans_id`) REFERENCES `answer` (`answer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `a_comment`
--
ALTER TABLE `a_comment`
  ADD CONSTRAINT `a_comment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `a_comment_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `a_likes`
--
ALTER TABLE `a_likes`
  ADD CONSTRAINT `a_likes_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `a_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pblm_img`
--
ALTER TABLE `pblm_img`
  ADD CONSTRAINT `pblm_img_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `problem_asked` (`problem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `problem_asked`
--
ALTER TABLE `problem_asked`
  ADD CONSTRAINT `problem_asked_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `problem_asked_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `p_comment`
--
ALTER TABLE `p_comment`
  ADD CONSTRAINT `p_comment_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `problem_asked` (`problem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_comment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `p_likes`
--
ALTER TABLE `p_likes`
  ADD CONSTRAINT `p_likes_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `problem_asked` (`problem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
