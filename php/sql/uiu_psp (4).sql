-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 12:50 PM
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
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `problem_id`, `description`, `posted_by`, `last_modified`) VALUES
('P4_1672115734_011202271_S3', 'P4_1672115734_011202271', 'The onclick event generally occurs when the user clicks on an element. It allows the programmer to execute a JavaScript\'s function when an element gets clicked. This event can be used for validating a form, warning messages and many more.', '011202271', '2022-12-28 10:36:41'),
('P7_1672124500_011202088_S0', 'P7_1672124500_011202088', '1.assignedDays{monday tuesday wenesday thursday friday saturday}\r\n\r\n2.assignedHours any duration between 00:00 - 23:59 hours. Now, the assgined work days and hours could be any combination of assignedDays and assignedHours. example:days and hours like monday 10:00-12:00, tuesday 11:00-13:00 wednesday \'none\' and so on for other days or it could be like monday-friday 10:00-16:00 or it could be monday 10:00-11:00 and then again 12:30-14:30.\r\n\r\n3.holidays--> a Date and time object or just a date object e.g 26/12/2022 10:00:13:00 or 27/12/2022 4.fixedMinutes a constant fixed duration in minutes could be any valid value like 540 or 180. 5.startValue--> A date and time value in DD/MM/YYYY hh:mm format(this format may change).e.g 25/12/2022 10:03\r\n\r\nNow, depending upon different scenarios I will calculate a result value based on some arithmetics over the above date and time values. e.g resultValue= startDate + fixed minutes now , if the result value is beyond working hours it will shift to next working day and should account the holidays as well if there was any.\r\n\r\nAny insights is cordially appreciated.', '011202088', '2022-12-27 17:34:57'),
('P7_1672124500_011202088_S1', 'P7_1672124500_011202088', '<h1>Hi this is for test</h1>', '011202088', '2022-12-27 17:35:55'),
('P7_1672124500_011202088_S2', 'P7_1672124500_011202088', 'I am new to python and my objective is to create a basic script capable of filtering a csv database through user input. I searched through various posts and answers and came up with this code that doesn\'t give the desired responses for some reason, can somebody tell me if it is correct or an erroneous approach? Thank you very much for your help and here is the code below', '011202271', '2022-12-27 18:03:14'),
('P8_1672208412_01120222_S4', 'P8_1672208412_01120222', 'The operation is quite complicated and involves reading and manipulating various datasets which ultimate results in one number being generated. I want to add that number into the correct row in my existing dataframe.', '011202088', '2022-12-28 12:22:33');

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
('1672202201Web capture_28-12-2022_10361_www.javatpoint.com.jpeg', 'P4_1672115734_011202271_S3'),
('1672202201Web capture_28-12-2022_103625_www.javatpoint.com.jpeg', 'P4_1672115734_011202271_S3'),
('1672142594Web capture_27-12-2022_18245_stackoverflow.com.jpeg', 'P7_1672124500_011202088_S2');

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

--
-- Dumping data for table `a_comment`
--

INSERT INTO `a_comment` (`comment_text`, `answer_id`, `student_id`, `last_modified`) VALUES
('bgbzdgbfsdfgbsf', 'P7_1672124500_011202088_S2', '011202271', '2022-12-27 23:40:48'),
('fgdfnfxndfgndfgndfgn', 'P7_1672124500_011202088_S0', '011202271', '2022-12-27 23:47:50'),
('agadfgdgeqrgegrtg', 'P7_1672124500_011202088_S1', '011202271', '2022-12-28 10:01:21'),
('fxgbnfxgnxf', 'P7_1672124500_011202088_S1', '011202271', '2022-12-28 10:02:53'),
('tjydfnsfgnbfn', 'P7_1672124500_011202088_S0', '011202271', '2022-12-28 10:07:32'),
('dthdyh\\', 'P7_1672124500_011202088_S0', '011202271', '2022-12-28 10:13:24'),
('hi', 'P7_1672124500_011202088_S2', '011202271', '2022-12-28 10:14:41'),
('hello', 'P7_1672124500_011202088_S2', '011202271', '2022-12-28 10:14:48'),
('how are you doing?', 'P7_1672124500_011202088_S2', '011202271', '2022-12-28 10:14:58'),
('@Sanvi Ahmed your answer is very nice.', 'P7_1672124500_011202088_S2', '011202088', '2022-12-28 10:16:35'),
('', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:41:56'),
('', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:41:57'),
('', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:41:57'),
('fgnbxfnfgnbn', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:45:18'),
('ghmgfh', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:46:16'),
('ghghgfhghghg', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:50:39'),
('ghdghmgdhmdgh', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:50:41'),
('fghghnmgfmfgc', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:50:44'),
('fgxfgnfdgndfn', 'P4_1672115734_011202271_S3', '011202271', '2022-12-28 10:53:08'),
('srthdfdndfndgf', 'P7_1672124500_011202088_S2', '011202271', '2022-12-28 10:53:33'),
('fdgndfhndfnd', 'P7_1672124500_011202088_S2', '011202271', '2022-12-28 10:53:34'),
('fdgndfhndgfhn', 'P7_1672124500_011202088_S2', '011202271', '2022-12-28 10:53:35'),
('fgndgfhnfghn', 'P7_1672124500_011202088_S2', '011202271', '2022-12-28 10:53:38'),
('tjgthjgdhngdhnjdghgdh', 'P8_1672208412_01120222_S4', '011202088', '2022-12-28 12:23:01'),
('srghsfhrfhsrfthsrth', 'P8_1672208412_01120222_S4', '01120222', '2022-12-28 12:23:08'),
('tjgtdjrgujykryfjk', 'P8_1672208412_01120222_S4', '011202088', '2022-12-28 12:23:14');

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
('1672065183Web capture_26-12-2022_203242_stackoverflow.com.jpeg', 'P3_1672065183_011202271'),
('1672208412Web capture_28-12-2022_10361_www.javatpoint.com.jpeg', 'P8_1672208412_01120222'),
('1672208412Web capture_28-12-2022_103625_www.javatpoint.com.jpeg', 'P8_1672208412_01120222');

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
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_asked`
--

INSERT INTO `problem_asked` (`title`, `problem_id`, `description`, `course_code`, `topic_name`, `views`, `student_id`, `last_modified`) VALUES
('How do I convert a string to a number in PHP?', 'P1_1672052432_011202271', 'I want to convert these types of values, \'3\', \'2.34\', \'0.234343\', etc. to a number. In JavaScript we can use Number(), but is there any similar method available in PHP?', 'CSE 3521/CSI 221', 'PHP', 0, '011202271', '2022-12-26 17:00:32'),
('TeamCity server WebSocket connection error in Docker image behind Apache proxyTeamCity server WebSocket connection error in Docker image behind Apache proxy', 'P2_1672034583_011202271', 'I am running TeamCity server behind Apache proxy. My Apache configuration of virtual host teamcity.example.com.\n\n<IfModule mod_ssl.c>\n<VirtualHost *:443> \n \n    ProxyPreserveHost On\n\n    ProxyPreserveHost On\n    ProxyRequests Off\n    ServerName www.teamcity.example.com\n    ServerAlias teamcity.example.com\n\n    ProxyPass / http://localhost:8111/\n    ProxyPassReverse / http://localhost:8111/\n\n    # This doesn\'t work \n    ProxyPass           /app/subscriptions ws://localhost:8111/app/subscriptions connectiontimeout=240 timeout=1200\n    ProxyPassReverse    /app/subscriptions ws://localhost:8111/app/subscriptions\n\n    # This doesn\'t work         \n    ProxyPass           / http://localhost:8111/ connectiontimeout=5 timeout=300\n    ProxyPassReverse    / http://localhost:8111/\n\n    SSLCertificateFile /etc/letsencrypt/live/teamcity.example.com/fullchain.pem\n    SSLCertificateKeyFile /etc/letsencrypt/live/teamcity.example.com/privkey.pem\n    Include /etc/letsencrypt/options-ssl-apache.conf\n\n</VirtualHost>\n</IfModule>', 'CSE 3521/CSI 221', 'B+ tree', 0, '011202271', '2022-12-26 12:03:38'),
('Cryptic React error \"unstable_flushDiscreteUpdates: Cannot flush updates when React is already rendering.\"', 'P2_1672053082_01202088', 'I have been able to find limited information on this error and was hoping someone could take a deep dive into explaining exactly what causes this. I haven\'t changed any of the code that appears to be showing up in the call stack recently, so I was wondering if this is from a newer update?', 'CSE 4521/CSE 4621', 'Graphics', 0, '011202088', '2022-12-26 17:11:22'),
('Flutter Method to Display opening hours using optimized code', 'P3_1672065183_011202271', 'I have managed to compile the code below but know that I can display the opening hours using a better method. I believe it can be done using Future Builder but I am not experienced as yet. The code below loads the items and then goes and find out the opening hours. Can anyone assist to optimize this code so It shows on first instance. I believe there are performance issues with the code below.', 'CSE 323/CSE 3711/EEE 4413', 'Optimization', 0, '011202271', '2022-12-26 20:33:03'),
('Parallel Loops in C++', 'P4_1672115734_011202271', 'I wonder if there is a light, straight forward way to have loops such as for and range based-for loops compute in parallel in C++. How would you implement such a thing? From Scala I know the map, filter and foreach functions and maybe it would also be possible to perform these in parallel? Is there an easy way to achieve this in C++?\r\n\r\nMy primary platform is Linux, but it would be nice if it worked cross-platform.', 'CSE 1111/CSI 121', 'C++', 0, '011202271', '2022-12-27 10:35:34'),
('Best way to store days of week and hour duration for each day in Java and do the calculation in java?', 'P5_1672123441_011202271', 'I have a scenario where in we are calculating a date and time value based on multiple parameters clarified below(just a basic version of my actual requirement)\n\n1.assignedDays{monday tuesday wenesday thursday friday saturday}\n\n2.assignedHours any duration between 00:00 - 23:59 hours. Now, the assgined work days and hours could be any combination of assignedDays and assignedHours. example:days and hours like monday 10:00-12:00, tuesday 11:00-13:00 wednesday \'none\' and so on for other days or it could be like monday-friday 10:00-16:00 or it could be monday 10:00-11:00 and then again 12:30-14:30.\n\n3.holidays--> a Date and time object or just a date object e.g 26/12/2022 10:00:13:00 or 27/12/2022 4.fixedMinutes a constant fixed duration in minutes could be any valid value like 540 or 180. 5.startValue--> A date and time value in DD/MM/YYYY hh:mm format(this format may change).e.g 25/12/2022 10:03\n\nNow, depending upon different scenarios I will calculate a result value based on some arithmetics over the above date and time values. e.g resultValue= startDate + fixed minutes now , if the result value is beyond working hours it will shift to next working day and should account the holidays as well if there was any.\n\nAny insights is cordially appreciated.', 'CSE 1115/CSI 211', 'Java', 0, '011202271', '2022-12-27 12:59:06'),
('Line Breaks not working in Textarea Output', 'P6_1672124288_011202088', 'I have a scenario where in we are calculating a date and time value based on multiple parameters clarified below(just a basic version of my actual requirement)\n\n1.assignedDays{monday tuesday wenesday thursday friday saturday}\n\n2.assignedHours any duration between 00:00 - 23:59 hours. Now, the assgined work days and hours could be any combination of assignedDays and assignedHours. example:days and hours like monday 10:00-12:00, tuesday 11:00-13:00 wednesday \'none\' and so on for other days or it could be like monday-friday 10:00-16:00 or it could be monday 10:00-11:00 and then again 12:30-14:30.\n\n3.holidays--> a Date and time object or just a date object e.g 26/12/2022 10:00:13:00 or 27/12/2022 4.fixedMinutes a constant fixed duration in minutes could be any valid value like 540 or 180. 5.startValue--> A date and time value in DD/MM/YYYY hh:mm format(this format may change).e.g 25/12/2022 10:03\n\nNow, depending upon different scenarios I will calculate a result value based on some arithmetics over the above date and time values. e.g resultValue= startDate + fixed minutes now , if the result value is beyond working hours it will shift to next working day and should account the holidays as well if there was any.\n\nAny insights is cordially appreciated.', 'CSE 2213/CSI 219', 'XYZ', 0, '011202088', '2022-12-27 12:58:55'),
('how to use multiple data validation in one column (A:A) in google sheet', 'P7_1672124500_011202088', 'I want to use multiple data validatin in one column (A:A) of google sheet\r\n\r\nin google sheet column (A:A) have a numeric value and im want to keep it unique when user enter duplicate value it show error and not allow to enter duplicate value and if user enter the dupliacte value its highlight the cell and am also want user just enter 15 digit only not less then 15 or not greater then 15.\r\n\r\n$(\"#submit-code\").click(function() {\r\n  $(\"div.output\").html($(\".support-answer-textarea\").val());\r\n}).next().click(function () {\r\n  $(\".support-answer-textarea\").val($(\"div.output\").html());\r\n});\r\n', 'SOC 101/SOC 2101', 'ABC', 0, '011202088', '2022-12-27 13:01:40'),
('Pandas - add value at specific iloc into new dataframe column', 'P8_1672208412_01120222', 'I have a large dataframe containing lots of columns.\r\n\r\nFor each row/index in the dataframe I do some operations, read in some ancilliary ata, etc and get a new value. Is there a way to add that new value into a new column at the correct row/index?\r\n\r\nI can use .assign to add a new column but as I\'m looping over the rows and only generating the data to add for one value at a time (generating it is quite involved). When it\'s generated I\'d like to immediately add it to the dataframe rather than waiting until I\'ve generated the entire series.', 'CSE 2217/CSI 227', 'ABC', 0, '01120222', '2022-12-28 12:20:12');

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

--
-- Dumping data for table `p_comment`
--

INSERT INTO `p_comment` (`comment_text`, `problem_id`, `student_id`, `last_modified`) VALUES
('hi this is niloy', 'P7_1672124500_011202088', '011202271', '2022-12-27 19:46:09'),
('I have no idea about it.', 'P5_1672123441_011202271', '011202271', '2022-12-27 20:24:40'),
('do you really need to write this here ?!', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:02:17'),
('Nice question !', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:03:55'),
('xydfafgvgg', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:07:05'),
('rfg', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:10:33'),
('tjthdfgh', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:12:02'),
('ghsdfghfghsfgs', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:14:41'),
('etrhsfghsrgrsgts', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:14:49'),
('wthrhwdfrsgbhfsgbn', 'P7_1672124500_011202088', '011202088', '2022-12-27 22:14:52'),
('', 'P7_1672124500_011202088', '011202271', '2022-12-27 23:34:02'),
('', 'P7_1672124500_011202088', '011202271', '2022-12-27 23:34:10'),
('', 'P7_1672124500_011202088', '011202271', '2022-12-27 23:34:14'),
('', 'P4_1672115734_011202271', '011202088', '2022-12-28 10:37:58'),
('', 'P4_1672115734_011202271', '011202088', '2022-12-28 10:38:16'),
('', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:39:04'),
('', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:40:03'),
('', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:40:34'),
('', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:41:10'),
('fgfgnfgnfghngh', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:46:11'),
('ggffjghjghjfghj', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:47:13'),
('hsrfjdfjdfghjghtj', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:50:55'),
('dfgjhxdfgndfgnf', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:50:58'),
('dfgndfnghnmgh', 'P4_1672115734_011202271', '011202271', '2022-12-28 10:51:00'),
('kfgvjdefgbsobrgb', 'P8_1672208412_01120222', '01120222', '2022-12-28 12:20:59'),
('sdfgsdfgsfg', 'P8_1672208412_01120222', '011202088', '2022-12-28 12:21:46');

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
('011202271', 'CSE 3521/CSI 221'),
('011202088', 'CSE 323/CSE 3711/EEE 4413'),
('011202088', 'CSE 313/CSE 3313/EEE 4411'),
('011202088', 'CSE 3521/CSI 221');

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
('011202088', 'Md. Saiduzzaman Apu', 'mapu202084@bscse.uiu.ac.bd', '1234', '1672071366download.jpg'),
('01120222', 'Towsif', 'towsif@gmail.com', '1234', 'default-img.jpg'),
('011202271', 'Sanvi Ahmed', 'sniloy202271@bscse.uiu.ac.bd', '1234', '1671794447default-img.jpg');

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
-- Indexes for table `p_comment`
--
ALTER TABLE `p_comment`
  ADD KEY `problem_id` (`problem_id`),
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
-- Constraints for table `pblm_img`
--
ALTER TABLE `pblm_img`
  ADD CONSTRAINT `pblm_img_ibfk_1` FOREIGN KEY (`problem_id`) REFERENCES `problem_asked` (`problem_id`);

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
