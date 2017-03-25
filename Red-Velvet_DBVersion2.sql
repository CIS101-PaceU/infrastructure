-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2017 at 09:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Red-Velvet`
--

-- --------------------------------------------------------

--
-- Table structure for table `Announcements`
--

CREATE TABLE `Announcements` (
  `announcementID` int(15) NOT NULL,
  `roleID` int(15) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Announcements`
--

INSERT INTO `Announcements` (`announcementID`, `roleID`, `message`) VALUES
(100, 1000, 'Announcement1'),
(110, 1005, 'Announcement2'),
(120, 1010, 'Announcement3'),
(130, 1015, 'Announcement4'),
(140, 1020, 'Announcement5'),
(150, 1025, 'Announcement6'),
(160, 1030, 'Announcement7'),
(170, 1035, 'Announcement8'),
(180, 1040, 'Announcement9'),
(190, 1045, 'Announcement10');

-- --------------------------------------------------------

--
-- Table structure for table `Assignment`
--

CREATE TABLE `Assignment` (
  `assignmentID` int(15) NOT NULL,
  `courseID` int(15) NOT NULL,
  `assignmentTitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignmentInstructor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `possibleGrade` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dueDate` date NOT NULL,
  `availableDate` date NOT NULL,
  `endAvailableDate` date NOT NULL,
  `submissionNum` int(50) NOT NULL,
  `gradeAttempt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Assignment`
--

INSERT INTO `Assignment` (`assignmentID`, `courseID`, `assignmentTitle`, `assignmentInstructor`, `possibleGrade`, `dueDate`, `availableDate`, `endAvailableDate`, `submissionNum`, `gradeAttempt`) VALUES
(0, 1, 'placerat.', 'Dorsey, Reagan Z.', 'massa lobortis ultrices. ', '2004-01-13', '2002-02-17', '2003-02-14', 1, 0),
(2, 6, 'tincidunt congue', 'Hoffman, Bradley V.', 'lorem ut aliquam iaculis,', '0000-00-00', '0000-00-00', '2011-03-13', 2, 0),
(4, 11, 'nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque', 'Aguirre, Prescott Y.', 'Vivamus sit amet risus.', '0000-00-00', '0000-00-00', '0000-00-00', 3, 0),
(6, 16, 'Sed', 'Fleming, Colleen N.', 'sit amet nulla. Donec non', '2010-01-13', '2003-03-18', '0000-00-00', 4, 0),
(8, 21, 'lorem fringilla ornare', 'Mcpherson, Orson U.', 'vitae risus. Duis a', '2008-02-13', '2010-09-15', '2011-07-13', 5, 0),
(10, 26, 'magna tellus faucibus', 'Mcmillan, Ariel J.', 'libero. Proin sed turpis ', '0000-00-00', '2009-03-15', '2004-12-17', 6, 0),
(12, 31, 'blandit congue. In', 'Pickett, Simon Q.', 'neque tellus, imperdiet', '0000-00-00', '0000-00-00', '2007-04-14', 7, 0),
(14, 36, 'dis parturient', 'Nichols, Hanna U.', 'nunc sed libero. Proin', '0000-00-00', '0000-00-00', '0000-00-00', 8, 0),
(16, 41, 'Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat', 'Ward, Piper H.', 'vehicula aliquet libero. ', '0000-00-00', '2011-06-17', '0000-00-00', 9, 0),
(18, 46, 'nunc. In at pede. Cras vulputate velit', 'Perkins, Urielle C.', 'Proin vel nisl. Quisque f', '2003-10-14', '0000-00-00', '0000-00-00', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_files`
--

CREATE TABLE `assignment_files` (
  `fileID` int(15) NOT NULL,
  `assignmentID` int(15) NOT NULL,
  `submissionID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `fileName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileExt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileSize` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateUploaded` date NOT NULL,
  `dateSubmitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment_files`
--

INSERT INTO `assignment_files` (`fileID`, `assignmentID`, `submissionID`, `userID`, `fileName`, `fileExt`, `fileSize`, `fileType`, `dateUploaded`, `dateSubmitted`) VALUES
(1, 0, 1000, 100, 'hendrerit a, arcu. Sed et libero. Proin mi.', 'luctus ut, pellentesque', 'molestie. Sed', 'ligula. Aliquam erat volutpat. Nulla', '0000-00-00', '0000-00-00'),
(8, 2, 1010, 105, 'vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac', 'feugiat. Lorem ipsum dolor sit amet, consectetuer', 'euismod in, dolor. Fusce feugiat. Lorem ipsum dolo', 'a, auctor non, feugiat nec, diam. Duis mi', '2009-11-15', '0000-00-00'),
(15, 4, 1020, 110, 'nec, mollis vitae, posuere', 'quam vel sapien imperdiet ornare. In faucibus. Mor', 'egestas. Sed pharetra, felis', 'bibendum fermentum metus. Aenean sed pede nec ante', '2006-06-14', '2011-08-13'),
(22, 6, 1030, 115, 'dictum sapien. Aenean massa. Integer vitae nibh. Donec est', 'Ut sagittis lobortis mauris.', 'metus.', 'odio tristique pharetra. Quisque ac libero nec lig', '0000-00-00', '2006-01-13'),
(29, 8, 1040, 120, 'dis parturient', 'dis parturient montes, nascetur ridiculus mus. Don', 'ligula tortor, dictum', 'auctor odio a purus. Duis elementum, dui quis accu', '2005-02-15', '0000-00-00'),
(36, 10, 1050, 125, 'dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare', 'elit. Aliquam auctor, velit eget laoreet posuere, ', 'Morbi metus. Vivamus euismod urna. Nullam', 'tellus. Phasellus elit pede, malesuada vel, venena', '0000-00-00', '2002-01-18'),
(43, 12, 1060, 130, 'ipsum. Curabitur consequat, lectus', 'enim.', 'Donec elementum, lorem ut aliquam iaculis, lacus', 'mattis ornare, lectus ante dictum mi, ac mattis ve', '0000-00-00', '2001-05-16'),
(50, 14, 1070, 135, 'Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a', 'velit. Cras lorem lorem, luctus ut, pellentesque', 'non enim', 'Cras eu tellus eu augue porttitor interdum. Sed', '2010-03-16', '2009-09-15'),
(57, 16, 1080, 140, 'auctor.', 'malesuada id, erat. Etiam vestibulum massa rutrum ', 'Suspendisse ac metus vitae velit egestas lacinia.', 'ultrices iaculis odio. Nam interdum enim non nisi.', '2005-07-14', '0000-00-00'),
(64, 18, 1090, 145, 'sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus', 'adipiscing elit. Etiam laoreet,', 'sed dolor. Fusce', 'fringilla mi lacinia mattis. Integer eu lacus.', '2007-12-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `Cheating`
--

CREATE TABLE `Cheating` (
  `submissionID` int(15) NOT NULL,
  `assignmentID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `CRN` int(15) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cheating`
--

INSERT INTO `Cheating` (`submissionID`, `assignmentID`, `userID`, `CRN`, `timestamp`) VALUES
(100, 1000, 100, 1000, '0000-00-00 00:00:00.000000'),
(102, 1015, 105, 1020, '0000-00-00 00:00:00.000000'),
(104, 1030, 110, 1040, '0000-00-00 00:00:00.000000'),
(106, 1045, 115, 1060, '0000-00-00 00:00:00.000000'),
(108, 1060, 120, 1080, '0000-00-00 00:00:00.000000'),
(110, 1075, 125, 1100, '0000-00-00 00:00:00.000000'),
(112, 1090, 130, 1120, '0000-00-00 00:00:00.000000'),
(114, 1105, 135, 1140, '0000-00-00 00:00:00.000000'),
(116, 1120, 140, 1160, '0000-00-00 00:00:00.000000'),
(118, 1135, 145, 1180, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `commentID` int(15) NOT NULL,
  `discussionID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `commentText` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`commentID`, `discussionID`, `userID`, `commentText`, `commentDate`) VALUES
(100, 100, 100, 'ornare, lectus', '2002-03-18'),
(106, 103, 105, 'nibh.', '0000-00-00'),
(112, 106, 110, 'Duis elementum, dui quis accumsan convallis, ante lectus convallis', '0000-00-00'),
(118, 109, 115, 'aliquam adipiscing', '0000-00-00'),
(124, 112, 120, 'lectus', '2010-02-14'),
(130, 115, 125, 'tincidunt, nunc ac mattis ornare,', '2006-07-13'),
(136, 118, 130, 'Nullam feugiat placerat velit. Quisque varius. Nam', '2011-10-13'),
(142, 121, 135, 'odio a purus. Duis elementum, dui quis accumsan', '0000-00-00'),
(148, 124, 140, 'non,', '0000-00-00'),
(154, 127, 145, 'Quisque nonummy ipsum non arcu. Vivamus', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `CRN` int(15) NOT NULL,
  `courseID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `courseNo` int(10) NOT NULL,
  `courseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courseTitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseAvailable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseCreatedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `termCode` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `termDescription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleteFlag` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`CRN`, `courseID`, `userID`, `courseNo`, `courseName`, `courseTitle`, `courseAvailable`, `courseCreatedBy`, `termCode`, `termDescription`, `deleteFlag`) VALUES
(1000, 1, 100, 100, 'CIS', 'Computer Information System', 'Yes', 'Benjamin, Neve K.', 'eget magna. Suspendisse t', 'arcu et pede. Nunc sed', 'eu'),
(1020, 6, 105, 101, 'CIS', 'Computer Information System', 'No', 'Short, Morgan Z.', 'semper et, lacinia vitae,', 'Mauris magna. Duis dignissim', 'Cr'),
(1040, 11, 110, 102, 'MAT', 'Computer Information System', 'Yes', 'Clemons, Otto W.', 'Proin velit. Sed malesuad', 'lacinia. Sed congue,', 'or'),
(1060, 16, 115, 103, 'MAT', 'Math', 'No', 'Shields, Pandora O.', 'Donec nibh enim, gravida ', 'taciti sociosqu ad litora torquent per conubia nostra, per', 'pu'),
(1080, 21, 120, 104, 'MAT', 'Math', 'No', 'Santana, Dale F.', 'dolor elit, pellentesque ', 'urna. Vivamus molestie dapibus ligula. Aliquam', 'bi'),
(1100, 26, 125, 105, 'CIS', 'Math', 'Yes', 'Simmons, Hayden O.', 'auctor odio a purus. Duis', 'nulla. Integer urna.', 'ma'),
(1120, 31, 130, 106, 'MAT', 'Math', 'No', 'Gillespie, Brock Z.', 'nulla. Donec non', 'nulla.', 'vu'),
(1140, 36, 135, 107, 'CIS', 'Computer Information System', 'No', 'Hood, Mona A.', 'cursus. Nunc', 'facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo', 'al'),
(1160, 41, 140, 108, 'CIS', 'Math', 'No', 'Head, Gareth D.', 'ultrices posuere cubilia ', 'nisi magna sed dui. Fusce aliquam, enim nec', 'li'),
(1180, 46, 145, 109, 'CIS', 'Math', 'Yes', 'Holloway, Shad V.', 'ligula. Aenean', 'vitae velit egestas lacinia.', 'la');

-- --------------------------------------------------------

--
-- Table structure for table `course_resource`
--

CREATE TABLE `course_resource` (
  `resourceID` int(15) NOT NULL,
  `CRN` int(15) NOT NULL,
  `uploadDate` date NOT NULL,
  `dateAvailable` date NOT NULL,
  `deleteFlag` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `deleteDate` date NOT NULL,
  `courseID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `course_resource`
--

INSERT INTO `course_resource` (`resourceID`, `CRN`, `uploadDate`, `dateAvailable`, `deleteFlag`, `deleteDate`, `courseID`) VALUES
(100, 1000, '2003-08-15', '2008-04-14', 'vi', '2003-12-17', 1),
(104, 1020, '0000-00-00', '0000-00-00', 'se', '2003-08-16', 6),
(108, 1040, '0000-00-00', '2004-10-17', 'at', '0000-00-00', 11),
(112, 1060, '2011-10-13', '0000-00-00', 'er', '0000-00-00', 16),
(116, 1080, '0000-00-00', '0000-00-00', 'ru', '2010-03-13', 21),
(120, 1100, '2005-12-17', '0000-00-00', 'ne', '0000-00-00', 26),
(124, 1120, '2006-07-13', '0000-00-00', 'le', '2003-04-13', 31),
(128, 1140, '0000-00-00', '0000-00-00', 'al', '0000-00-00', 36),
(132, 1160, '2011-08-15', '2012-01-13', 'Ut', '0000-00-00', 41),
(136, 1180, '0000-00-00', '0000-00-00', 'fe', '0000-00-00', 46);

-- --------------------------------------------------------

--
-- Table structure for table `course_schedule`
--

CREATE TABLE `course_schedule` (
  `scheduleID` int(15) NOT NULL,
  `CRN` int(15) NOT NULL,
  `courseID` int(15) NOT NULL,
  `days` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `classroom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `professor` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `course_schedule`
--

INSERT INTO `course_schedule` (`scheduleID`, `CRN`, `courseID`, `days`, `classroom`, `professor`) VALUES
(100, 1000, 1, 'Friday', 'nisl. Maecenas malesuada ', 'Duran, Deacon T.'),
(105, 1020, 6, 'Monday', 'blandit mattis. Cras eget', 'Roberts, Iona V.'),
(110, 1040, 11, 'Tuesday', 'cursus purus. Nullam scel', 'Sherman, Pamela R.'),
(115, 1060, 16, 'Monday', 'Praesent eu nulla at sem', 'Andrews, Cameron Q.'),
(120, 1080, 21, 'Friday', 'et ipsum', 'Guthrie, Giselle L.'),
(125, 1100, 26, 'Friday', 'in felis. Nulla', 'Levine, Simon Z.'),
(130, 1120, 31, 'Monday', 'vulputate, risus a ultric', 'Marquez, Nasim X.'),
(135, 1140, 36, 'Friday', 'libero. Proin sed turpis ', 'Welch, Rae M.'),
(140, 1160, 41, 'Thursday', 'id sapien. Cras dolor dol', 'Herman, Giacomo J.'),
(145, 1180, 46, 'Monday', 'tellus. Nunc', 'Clemons, Marah C.');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_board`
--

CREATE TABLE `discussion_board` (
  `discussionID` int(15) NOT NULL,
  `assignmentID` int(15) NOT NULL,
  `submissionID` int(15) NOT NULL,
  `courseID` int(15) NOT NULL,
  `discussionTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discussionText` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postDate` date NOT NULL,
  `dateAvailable` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `discussion_board`
--

INSERT INTO `discussion_board` (`discussionID`, `assignmentID`, `submissionID`, `courseID`, `discussionTitle`, `discussionText`, `postDate`, `dateAvailable`, `endDate`) VALUES
(100, 0, 1000, 100, 'adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing', 'aliquet molestie', '2005-02-17', '2012-03-15', '0000-00-00'),
(103, 2, 1010, 105, 'ridiculus mus. Proin vel arcu eu odio tristique', 'elit pede, malesuada', '0000-00-00', '0000-00-00', '2003-06-18'),
(106, 4, 1020, 110, 'nec', 'facilisis', '0000-00-00', '0000-00-00', '2002-01-17'),
(109, 6, 1030, 115, 'et risus. Quisque libero', 'mauris, rhoncus id, mollis nec, cursus a,', '2009-12-16', '2011-05-17', '0000-00-00'),
(112, 8, 1040, 120, 'hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus.', 'laoreet ipsum.', '0000-00-00', '0000-00-00', '0000-00-00'),
(115, 10, 1050, 125, 'est mauris, rhoncus id, mollis nec,', 'pretium', '0000-00-00', '2003-06-18', '0000-00-00'),
(118, 12, 1060, 130, 'augue ac ipsum.', 'ac arcu.', '0000-00-00', '0000-00-00', '2003-04-16'),
(121, 14, 1070, 135, 'In condimentum. Donec at arcu. Vestibulum ante ipsum primis in', 'facilisis non, bibendum sed, est. Nunc laoreet lectus quis', '0000-00-00', '2002-11-16', '0000-00-00'),
(124, 16, 1080, 140, 'rhoncus. Nullam', 'bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus', '2009-12-16', '0000-00-00', '0000-00-00'),
(127, 18, 1090, 145, 'ante bibendum ullamcorper. Duis', 'Suspendisse eleifend. Cras', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `Enrollment`
--

CREATE TABLE `Enrollment` (
  `courseID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `assignmentID` int(15) NOT NULL,
  `major` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `operatingSystem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Enrollment`
--

INSERT INTO `Enrollment` (`courseID`, `userID`, `assignmentID`, `major`, `operatingSystem`) VALUES
(100, 100, 100, 'Human Resource', 'Mac OS'),
(102, 105, 103, 'Advertising', 'Windows OS'),
(104, 110, 106, 'Finance', 'Windows OS'),
(106, 115, 109, 'Public Relations', 'Linux OS'),
(108, 120, 112, 'Accounting', 'Mac OS'),
(110, 125, 115, 'Computer Science', 'Mac OS'),
(112, 130, 118, '', 'Windows OS'),
(114, 135, 121, '', 'Windows OS'),
(116, 140, 124, '', 'Linux OS'),
(118, 145, 127, '', 'Mac OS');

-- --------------------------------------------------------

--
-- Table structure for table `Password`
--

CREATE TABLE `Password` (
  `passwordID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastSignIn` datetime(6) NOT NULL,
  `oldPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleteFlag` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Password`
--

INSERT INTO `Password` (`passwordID`, `userID`, `password`, `lastSignIn`, `oldPassword`, `deleteFlag`) VALUES
(100, 100, 'JZL51ESK9LG', '0000-00-00 00:00:00.000000', '', ''),
(105, 105, 'AVU51DOU6AY', '0000-00-00 00:00:00.000000', '', ''),
(110, 110, 'URI17WKF0DE', '2010-08-15 00:00:00.000000', '', ''),
(115, 115, 'KHN26TBH9QY', '2001-11-14 00:00:00.000000', '', ''),
(120, 120, 'RKB73HBU9SH', '0000-00-00 00:00:00.000000', '', ''),
(125, 125, 'FLY28ZKT1PU', '0000-00-00 00:00:00.000000', '', ''),
(130, 130, 'VTX35GNA4OC', '2004-01-16 00:00:00.000000', '', ''),
(135, 135, 'NHG41SMN4DE', '0000-00-00 00:00:00.000000', '', ''),
(140, 140, 'IYC31ODI6MY', '2001-08-15 00:00:00.000000', '', ''),
(145, 145, 'WXX12WUY6JO', '0000-00-00 00:00:00.000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `sessionTerminated` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleteFlag` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionID`, `userID`, `date`, `time`, `sessionTerminated`, `deleteFlag`) VALUES
(100, 100, '2005-07-16', '00:01:00.000000', 'facil', ''),
(103, 105, '2006-08-13', '00:25:00.000000', 'orci ', ''),
(106, 110, '2010-03-14', '00:49:00.000000', 'luctu', ''),
(109, 115, '0000-00-00', '00:00:00.000000', 'scele', ''),
(112, 120, '2010-04-15', '00:00:00.000000', 'a, sc', ''),
(115, 125, '2008-04-17', '01:21:00.000000', 'inter', ''),
(118, 130, '0000-00-00', '01:45:00.000000', 'lacus', ''),
(121, 135, '0000-00-00', '00:00:00.000000', 'posue', ''),
(124, 140, '2007-01-16', '00:00:00.000000', 'ipsum', ''),
(127, 145, '2007-07-13', '02:17:00.000000', 'sit a', '');

-- --------------------------------------------------------

--
-- Table structure for table `Submission`
--

CREATE TABLE `Submission` (
  `submissionID` int(15) NOT NULL,
  `assignmentID` int(15) NOT NULL,
  `roleID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `grade` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentStudent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentProf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateSubmitted` date NOT NULL,
  `attempt` int(5) NOT NULL,
  `deleteFlag` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Submission`
--

INSERT INTO `Submission` (`submissionID`, `assignmentID`, `roleID`, `userID`, `grade`, `commentStudent`, `commentProf`, `dateSubmitted`, `attempt`, `deleteFlag`) VALUES
(1000, 0, 0, 0, 'euismod ac, fermentum vel', 'per conubia nostra, per inceptos', 'In tincidunt congue turpis. In', '0000-00-00', 1, 'pl'),
(1010, 2, 2, 0, 'accumsan neque et nunc.', 'a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo', 'pellentesque, tellus', '2007-10-14', 2, 'tr'),
(1020, 4, 4, 0, 'faucibus. Morbi vehicula.', 'sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut', 'ornare egestas ligula. Nullam feugiat', '2001-04-18', 3, 'do'),
(1030, 6, 6, 0, 'Aliquam', 'urna convallis erat, eget tincidunt dui augue eu tellus.', 'Vivamus nibh dolor, nonummy ac, feugiat non, lobortis', '2004-05-14', 4, 'te'),
(1040, 8, 8, 0, 'Donec consectetuer mauris', 'Vivamus rhoncus. Donec est. Nunc', 'a odio semper cursus. Integer mollis. Integer tincidunt', '0000-00-00', 5, 'am'),
(1050, 10, 10, 0, 'magna, malesuada vel, con', 'Donec tincidunt. Donec vitae erat vel pede blandit congue. In', 'malesuada fames ac turpis egestas. Fusce aliquet magna a', '0000-00-00', 6, 'nu'),
(1060, 12, 12, 0, 'adipiscing, enim mi tempo', 'eu elit.', 'mauris. Suspendisse aliquet molestie tellus.', '2004-02-14', 7, 'ur'),
(1070, 14, 14, 0, 'justo', 'Proin sed', 'sit amet', '0000-00-00', 8, 'se'),
(1080, 16, 16, 0, 'nisl arcu iaculis enim, s', 'sed', 'lacinia orci, consectetuer euismod est arcu ac orci.', '2001-11-15', 9, 'mu'),
(1090, 18, 18, 0, 'dapibus ligula. Aliquam e', 'enim. Etiam gravida molestie arcu. Sed eu', 'Nam', '0000-00-00', 10, 'at'),
(1100, 20, 20, 0, 'ut, sem. Nulla interdum. ', 'gravida. Aliquam tincidunt, nunc', 'In at pede.', '0000-00-00', 11, 'Ph'),
(1110, 22, 22, 0, 'mauris. Suspendisse', 'adipiscing lacus. Ut nec', 'ut ipsum ac mi eleifend', '0000-00-00', 12, 'In'),
(1120, 24, 24, 0, 'eleifend non, dapibus rut', 'rutrum, justo. Praesent luctus.', 'dapibus quam quis diam.', '0000-00-00', 13, 'In'),
(1130, 26, 26, 0, 'Donec consectetuer mauris', 'ante. Vivamus', 'lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis', '0000-00-00', 14, 'ti'),
(1140, 28, 28, 0, 'Vivamus euismod urna. Nul', 'velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus.', 'risus.', '2007-05-16', 15, 'eu'),
(1150, 30, 30, 0, 'Phasellus libero mauris, ', 'Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris.', 'sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus', '2012-02-14', 16, 'pu'),
(1160, 32, 32, 0, 'vitae semper egestas, urn', 'vitae, erat. Vivamus nisi.', 'odio. Etiam ligula tortor, dictum', '2003-10-16', 17, 'Qu'),
(1170, 34, 34, 0, 'ornare lectus justo eu', 'quis diam luctus lobortis. Class aptent taciti sociosqu ad litora', 'id,', '2001-06-15', 18, 'Fu'),
(1180, 36, 36, 0, 'elit, a feugiat tellus lo', 'Cras dictum ultricies ligula. Nullam', 'rhoncus id, mollis nec, cursus', '2007-05-17', 19, 'ni'),
(1190, 38, 38, 0, 'ut, molestie in,', 'molestie sodales. Mauris', 'Nullam', '2001-03-17', 20, 'no'),
(1200, 40, 40, 0, 'luctus lobortis. Class ap', 'amet ante. Vivamus non lorem', 'nunc est, mollis non,', '2005-07-14', 21, 'mi'),
(1210, 42, 42, 0, 'Sed eget lacus. Mauris', 'vel est tempor', 'pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer', '2004-12-15', 22, 'ma'),
(1220, 44, 44, 0, 'ac,', 'velit in aliquet', 'fringilla. Donec feugiat metus', '2012-01-17', 23, 'or'),
(1230, 46, 46, 0, 'dapibus gravida. Aliquam ', 'Duis elementum, dui quis accumsan convallis, ante lectus', 'interdum. Nunc sollicitudin commodo ipsum.', '0000-00-00', 24, 'es'),
(1240, 48, 48, 0, 'molestie', 'eleifend non,', 'et magnis dis parturient montes, nascetur', '0000-00-00', 25, 'co'),
(1250, 50, 50, 0, 'lorem ipsum sodales purus', 'et, euismod et, commodo at, libero. Morbi accumsan', 'fringilla mi lacinia mattis. Integer eu lacus.', '0000-00-00', 26, 'Nu'),
(1260, 52, 52, 0, 'accumsan neque et', 'lectus quis', 'aliquam,', '0000-00-00', 27, 'er'),
(1270, 54, 54, 0, 'est, congue a, aliquet ve', 'dolor, tempus non, lacinia at, iaculis', 'sodales. Mauris', '2006-09-15', 28, 'ma'),
(1280, 56, 56, 0, 'convallis est, vitae soda', 'magna et ipsum cursus vestibulum. Mauris magna. Duis', 'sollicitudin a, malesuada', '2002-11-16', 29, 'Du'),
(1290, 58, 58, 0, 'ultrices iaculis odio.', 'ad litora torquent per conubia nostra, per inceptos', 'Integer aliquam adipiscing lacus. Ut nec', '0000-00-00', 30, 'at'),
(1300, 60, 60, 0, 'Donec est mauris, rhoncus', 'Donec felis orci, adipiscing non, luctus sit amet,', 'Donec fringilla. Donec feugiat metus sit amet', '0000-00-00', 31, 'ma'),
(1310, 62, 62, 0, 'Aenean egestas hendrerit ', 'ipsum. Suspendisse sagittis. Nullam vitae diam. Proin', 'aliquet, metus urna', '0000-00-00', 32, 'Cl'),
(1320, 64, 64, 0, 'nulla. Donec non justo. P', 'non, lacinia at,', 'bibendum ullamcorper. Duis cursus, diam', '0000-00-00', 33, 'te'),
(1330, 66, 66, 0, 'Nullam velit dui, semper ', 'tempus mauris erat eget ipsum.', 'Nulla facilisi. Sed neque.', '0000-00-00', 34, 'si'),
(1340, 68, 68, 0, 'aliquet, metus urna conva', 'sed turpis nec', 'fringilla. Donec feugiat', '0000-00-00', 35, 'bi'),
(1350, 70, 70, 0, 'tristique senectus et net', 'nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse', 'tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel,', '0000-00-00', 36, 'fe'),
(1360, 72, 72, 0, 'mauris', 'ac mattis velit justo nec ante. Maecenas mi felis, adipiscing', 'metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula.', '0000-00-00', 37, 'Nu'),
(1370, 74, 74, 0, 'nisi nibh lacinia orci, c', 'ac metus vitae velit egestas lacinia. Sed congue,', 'malesuada fames ac turpis egestas. Fusce aliquet magna a neque.', '2006-12-16', 38, 'da'),
(1380, 76, 76, 0, 'ut odio vel est tempor bi', 'eget, dictum placerat, augue. Sed molestie.', 'purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla', '0000-00-00', 39, 'en'),
(1390, 78, 78, 0, 'ligula tortor,', 'Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit', 'tortor, dictum eu, placerat eget, venenatis a, magna. Lorem', '2011-06-16', 40, 'se'),
(1400, 80, 80, 0, 'non, feugiat', 'a nunc. In at pede. Cras', 'rutrum urna, nec luctus felis purus ac', '0000-00-00', 41, 'cu'),
(1410, 82, 82, 0, 'congue turpis. In condime', 'libero lacus,', 'Nunc pulvinar arcu et pede. Nunc sed orci lobortis', '0000-00-00', 42, 've'),
(1420, 84, 84, 0, 'aliquet, metus urna conva', 'Nulla', 'iaculis', '0000-00-00', 43, 'di'),
(1430, 86, 86, 0, 'amet risus. Donec', 'pede ac urna. Ut tincidunt vehicula risus. Nulla eget', 'ridiculus', '0000-00-00', 44, 'lo'),
(1440, 88, 88, 0, 'sociis natoque penatibus ', 'ornare. Fusce mollis. Duis sit', 'Mauris molestie', '0000-00-00', 45, 'pe'),
(1450, 90, 90, 0, 'ipsum cursus vestibulum. ', 'in, cursus et,', 'sagittis lobortis mauris. Suspendisse aliquet', '2008-06-17', 46, 'sa'),
(1460, 92, 92, 0, 'ultrices iaculis odio.', 'In at pede. Cras vulputate velit eu sem. Pellentesque', 'id ante dictum cursus. Nunc mauris elit,', '0000-00-00', 47, 'el'),
(1470, 94, 94, 0, 'quam', 'aliquet odio. Etiam', 'turpis non enim. Mauris quis', '0000-00-00', 48, 'Et'),
(1480, 96, 96, 0, 'dolor egestas rhoncus. Pr', 'viverra. Donec tempus, lorem fringilla ornare placerat, orci', 'nisl sem, consequat nec,', '0000-00-00', 49, 'Pr'),
(1490, 98, 98, 0, 'magna et ipsum cursus ves', 'sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id', 'porta elit, a feugiat tellus lorem eu metus. In lorem.', '0000-00-00', 50, 'vi'),
(1500, 100, 100, 0, 'facilisis', 'dui lectus rutrum urna, nec', 'justo nec ante.', '2003-03-16', 51, 'no'),
(1510, 102, 102, 0, 'tincidunt aliquam arcu. A', 'nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia', 'ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed', '0000-00-00', 52, 'pe'),
(1520, 104, 104, 0, 'tincidunt.', 'elementum, dui quis accumsan convallis,', 'eu', '0000-00-00', 53, 'Du'),
(1530, 106, 106, 0, 'tempus scelerisque, lorem', 'rhoncus. Proin nisl sem, consequat nec, mollis vitae,', 'Nunc ut erat.', '0000-00-00', 54, 'Do'),
(1540, 108, 108, 0, 'at pede.', 'purus mauris a nunc. In at', 'malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis.', '0000-00-00', 55, 'an'),
(1550, 110, 110, 0, 'mauris sagittis placerat.', 'cursus in, hendrerit consectetuer,', 'magna a neque. Nullam ut', '0000-00-00', 56, 'Et'),
(1560, 112, 112, 0, 'convallis est, vitae soda', 'consequat enim diam vel arcu. Curabitur ut odio', 'libero est, congue', '2001-07-15', 57, 'so'),
(1570, 114, 114, 0, 'Aliquam ornare, libero at', 'quis, pede. Praesent eu dui. Cum', 'egestas. Aliquam nec enim. Nunc ut', '0000-00-00', 58, 'Al'),
(1580, 116, 116, 0, 'purus.', 'Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus', 'molestie sodales. Mauris blandit enim consequat purus.', '0000-00-00', 59, 'Su'),
(1590, 118, 118, 0, 'eu elit. Nulla facilisi. ', 'Aenean massa. Integer vitae nibh. Donec est', 'ante blandit viverra. Donec tempus, lorem fringilla ornare placerat,', '0000-00-00', 60, 'el'),
(1600, 120, 120, 0, 'non, lacinia at,', 'nec', 'est tempor bibendum. Donec felis orci, adipiscing non, luctus sit', '2004-03-15', 61, 'Ph'),
(1610, 122, 122, 0, 'magnis dis parturient mon', 'in, cursus et, eros. Proin ultrices. Duis volutpat', 'Nunc laoreet lectus quis massa. Mauris', '0000-00-00', 62, 'Nu'),
(1620, 124, 124, 0, 'Donec tincidunt. Donec vi', 'scelerisque mollis. Phasellus', 'tellus', '0000-00-00', 63, 'vu'),
(1630, 126, 126, 0, 'tristique aliquet. Phasel', 'consectetuer adipiscing elit. Aliquam auctor, velit eget laoreet posuere,', 'nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus', '2007-01-17', 64, 'ri'),
(1640, 128, 128, 0, 'Curabitur', 'ut cursus luctus,', 'Fusce mi lorem,', '0000-00-00', 65, 'ap'),
(1650, 130, 130, 0, 'sed tortor.', 'enim mi tempor lorem, eget mollis lectus pede et', 'velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis', '0000-00-00', 66, 'se'),
(1660, 132, 132, 0, 'dapibus gravida. Aliquam ', 'tellus lorem eu', 'Sed nunc est, mollis non, cursus non, egestas a, dui.', '2002-02-17', 67, 'fr'),
(1670, 134, 134, 0, 'Cras sed leo. Cras vehicu', 'nisi nibh lacinia orci, consectetuer euismod est', 'feugiat non, lobortis quis,', '2010-06-14', 68, 'Ph'),
(1680, 136, 136, 0, 'sollicitudin adipiscing l', 'ante bibendum ullamcorper. Duis cursus, diam at', 'est, congue a,', '2003-11-16', 69, 'Al'),
(1690, 138, 138, 0, 'nec, imperdiet nec,', 'eget mollis lectus pede et risus. Quisque', 'erat neque non quam. Pellentesque habitant morbi tristique senectus', '0000-00-00', 70, 'pe'),
(1700, 140, 140, 0, 'pede nec ante blandit viv', 'eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum.', 'vehicula aliquet libero.', '2011-10-16', 71, 'eg'),
(1710, 142, 142, 0, 'libero. Integer in magna.', 'nunc id enim. Curabitur massa. Vestibulum accumsan', 'ipsum cursus vestibulum. Mauris magna. Duis', '2003-01-15', 72, 'si'),
(1720, 144, 144, 0, 'Sed pharetra, felis eget ', 'dignissim lacus. Aliquam rutrum', 'Donec', '2011-08-15', 73, 'Fu'),
(1730, 146, 146, 0, 'est. Nunc laoreet lectus ', 'id, erat. Etiam vestibulum massa rutrum magna.', 'quis lectus. Nullam', '0000-00-00', 74, 'es'),
(1740, 148, 148, 0, 'ut lacus.', 'nec tempus', 'enim. Suspendisse aliquet, sem', '0000-00-00', 75, 'pe'),
(1750, 150, 150, 0, 'tellus faucibus leo, in l', 'Donec vitae erat vel pede blandit congue. In scelerisque scelerisque', 'ligula. Nullam', '0000-00-00', 76, 'na'),
(1760, 152, 152, 0, 'feugiat placerat velit.', 'leo elementum sem, vitae aliquam eros turpis non enim. Mauris', 'orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus', '0000-00-00', 77, 'Se'),
(1770, 154, 154, 0, 'turpis. Nulla', 'sed pede.', 'dui lectus rutrum', '0000-00-00', 78, 'du'),
(1780, 156, 156, 0, 'magna. Duis dignissim tem', 'Nunc lectus', 'quam a felis ullamcorper viverra.', '0000-00-00', 79, 'or'),
(1790, 158, 158, 0, 'interdum. Sed auctor odio', 'cursus non, egestas a, dui. Cras pellentesque. Sed dictum.', 'ultrices sit amet,', '0000-00-00', 80, 'lo'),
(1800, 160, 160, 0, 'vehicula. Pellentesque ti', 'aliquet odio. Etiam', 'magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl.', '0000-00-00', 81, 'Se'),
(1810, 162, 162, 0, 'Nunc ut erat. Sed nunc es', 'non, vestibulum nec, euismod', 'tristique pellentesque, tellus sem mollis dui, in sodales elit erat', '0000-00-00', 82, 'si'),
(1820, 164, 164, 0, 'dolor dapibus gravida. Al', 'amet ante. Vivamus', 'vulputate dui, nec', '2006-02-14', 83, 'ac'),
(1830, 166, 166, 0, 'a neque. Nullam ut', 'mollis dui, in sodales elit erat vitae risus.', 'velit dui, semper et, lacinia vitae, sodales', '0000-00-00', 84, 'er'),
(1840, 168, 168, 0, 'non sapien molestie orci ', 'dolor, nonummy ac,', 'Aliquam nisl. Nulla eu neque', '0000-00-00', 85, 'la'),
(1850, 170, 170, 0, 'aliquet, sem ut cursus lu', 'tristique senectus et netus et malesuada fames ac turpis egestas.', 'sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id', '2009-07-16', 86, 'Ae'),
(1860, 172, 172, 0, 'ornare placerat, orci lac', 'cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin', 'Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis', '0000-00-00', 87, 'du'),
(1870, 174, 174, 0, 'Nullam scelerisque neque ', 'sit amet, consectetuer adipiscing elit. Curabitur', 'aliquam adipiscing lacus. Ut nec urna', '2007-10-17', 88, 'no'),
(1880, 176, 176, 0, 'Vestibulum ut eros non en', 'ac mattis velit justo nec ante. Maecenas', 'Vestibulum ante ipsum primis in faucibus orci luctus', '0000-00-00', 89, 'vo'),
(1890, 178, 178, 0, 'orci. Ut semper pretium n', 'accumsan interdum', 'malesuada augue', '2009-01-16', 90, 'ul'),
(1900, 180, 180, 0, 'sit amet, consectetuer ad', 'Quisque imperdiet,', 'eu dui. Cum sociis natoque penatibus et magnis dis', '2010-03-16', 91, 'ut'),
(1910, 182, 182, 0, 'mauris, aliquam eu, accum', 'consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus', 'fermentum metus. Aenean sed', '2009-10-16', 92, 'at'),
(1920, 184, 184, 0, 'egestas a,', 'sit amet', 'nec, cursus a,', '0000-00-00', 93, 'al'),
(1930, 186, 186, 0, 'varius orci, in consequat', 'Aenean massa. Integer vitae nibh. Donec est', 'vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant', '2003-10-15', 94, 'Su'),
(1940, 188, 188, 0, 'et, euismod et, commodo a', 'nisi sem', 'scelerisque dui. Suspendisse ac', '0000-00-00', 95, 'na'),
(1950, 190, 190, 0, 'dictum eleifend, nunc ris', 'egestas a, scelerisque sed, sapien.', 'gravida molestie', '2010-03-16', 96, 'la'),
(1960, 192, 192, 0, 'eget ipsum. Suspendisse', 'massa. Integer', 'ipsum nunc id enim. Curabitur massa. Vestibulum accumsan', '0000-00-00', 97, 've'),
(1970, 194, 194, 0, 'libero est, congue a, ali', 'magna', 'egestas. Fusce aliquet', '0000-00-00', 98, 'so'),
(1980, 196, 196, 0, 'arcu. Curabitur ut odio v', 'elit erat vitae risus. Duis a mi fringilla mi', 'id, ante. Nunc mauris sapien,', '2005-11-14', 99, 'Ve'),
(1990, 198, 198, 0, 'in', 'dolor, tempus non, lacinia at, iaculis quis,', 'ante', '0000-00-00', 100, 'au');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userID` int(15) NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `altName` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `primaryEmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schoolCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `schoolDesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateStamp` date NOT NULL,
  `timeStamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `deleteFlag` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sessionID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `userName`, `firstName`, `middleName`, `lastName`, `altName`, `primaryEmail`, `status`, `level`, `major`, `schoolCode`, `schoolDesc`, `dateStamp`, `timeStamp`, `deleteFlag`, `sessionID`, `password`, `role`) VALUES
(100, 'mm51661n', 'Conan', 'Regina', 'Erickson', 'Sybil', 'a.aliquet.vel@gmail.com', 'Senior', 'Undergraduate', 'Human Resource', 'enim.', 'aliquet magna a neque. Nullam', '0000-00-00', '2017-03-25 20:53:36.998344', 'co', '100', 'JZL51ESK9LG', 'Student'),
(105, 'mm51662n', 'Brenda', 'Amena', 'Bonner', 'Russell', 'tellus@pace.edu', 'Junior', 'Undergraduate', 'Advertising', 'sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum', 'in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer', '2010-01-16', '2017-03-25 20:53:36.998344', 'ul', '103', 'AVU51DOU6AY', 'Student'),
(110, 'mm51663n', 'Olga', 'Brian', 'Bowers', 'Cairo', 'aliquam.arcu@purusaccumsaninterdum.ca', 'Junior', 'Undergraduate', 'Finance', 'mattis semper, dui lectus rutrum urna,', 'mauris, rhoncus id,', '2005-02-15', '2017-03-25 20:53:36.998344', 'Su', '106', 'URI17WKF0DE', 'Student'),
(115, 'mm51664n', 'Boris', 'Nina', 'Dean', 'Maisie', 'eleifend.nunc.risus@ligulaelit.net', 'Junior', 'Undergraduate', 'Public Relations', 'egestas nunc sed libero. Proin', 'tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla', '0000-00-00', '2017-03-25 20:53:36.998344', 'sa', '109', 'KHN26TBH9QY', 'Student'),
(120, 'mm51665n', 'Hyacinth', 'Kimberley', 'Melton', 'Ima', 'tortor.Nunc.commodo@odio.edu', 'Freshman', 'Undergraduate', 'Accounting', 'Nunc quis arcu vel quam dignissim pharetra. Nam ac', 'dolor. Donec fringilla. Donec feugiat', '0000-00-00', '2017-03-25 20:53:36.998344', 'ri', '112', 'RKB73HBU9SH', 'Student'),
(125, 'mm51666n', 'Cairo', 'Shay', 'Howard', 'Regan', 'sociosqu@commodo.edu', 'Junior', 'Undergraduate', 'Computer Science', 'Proin nisl sem,', 'sed', '0000-00-00', '2017-03-25 20:53:36.998344', 've', '115', 'FLY28ZKT1PU', 'Student'),
(130, 'mm51667n', 'Josiah', 'Gisela', 'Moon', 'Ethan', 'mi.lorem@nisi.co.uk', '', '', '', 'quis, tristique ac, eleifend vitae, erat. Vivamus nisi.', 'Nullam scelerisque neque sed sem egestas blandit.', '2009-05-14', '2017-03-25 20:53:36.998344', 'an', '118', 'VTX35GNA4OC', 'Instructor'),
(135, 'mm51668n', 'Madison', 'Aristotle', 'Hendrix', 'Kirestin', 'facilisis.Suspendisse.commodo@gravida.edu', '', '', '', 'sem egestas', 'rhoncus', '2005-06-16', '2017-03-25 20:53:36.998344', 'ma', '121', 'NHG41SMN4DE', 'Instructor'),
(140, 'mm51669n', 'Evelyn', 'Rigel', 'Delacruz', 'Molly', 'lobortis@necurna.co.uk', '', '', '', 'Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus', 'semper rutrum. Fusce dolor quam, elementum at,', '0000-00-00', '2017-03-25 20:53:36.998344', 'la', '124', 'NHG41SMN4DE', 'Administrator'),
(145, 'mm51670n', 'Tucker', 'Aretha', 'Matthews', 'Odessa', 'ornare@commodoipsum.net', '', '', '', 'leo. Vivamus nibh dolor, nonummy ac, feugiat', 'fringilla. Donec feugiat metus sit amet', '0000-00-00', '2017-03-25 20:53:36.998344', 'ne', '127', 'WXX12WUY6JO', 'Teachers Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `User_Role`
--

CREATE TABLE `User_Role` (
  `roleID` int(15) NOT NULL,
  `userID` int(15) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleteFlag` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `User_Role`
--

INSERT INTO `User_Role` (`roleID`, `userID`, `role`, `deleteFlag`, `ID`) VALUES
(1000, 100, 'Student', '0', '1'),
(1045, 145, 'Teachers Assistant', '9', '10'),
(1005, 105, 'Student', '1', '2'),
(1010, 110, 'Student', '2', '3'),
(1015, 115, 'Student', '3', '4'),
(1020, 120, 'Student', '4', '5'),
(1025, 125, 'Student', '5', '6'),
(1030, 130, 'Instructor', '6', '7'),
(1035, 135, 'Instructor', '7', '8'),
(1040, 140, 'Administrator', '8', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Announcements`
--
ALTER TABLE `Announcements`
  ADD PRIMARY KEY (`announcementID`);

--
-- Indexes for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `Cheating`
--
ALTER TABLE `Cheating`
  ADD PRIMARY KEY (`submissionID`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`CRN`);

--
-- Indexes for table `course_resource`
--
ALTER TABLE `course_resource`
  ADD PRIMARY KEY (`resourceID`);

--
-- Indexes for table `course_schedule`
--
ALTER TABLE `course_schedule`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `discussion_board`
--
ALTER TABLE `discussion_board`
  ADD PRIMARY KEY (`discussionID`);

--
-- Indexes for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `Password`
--
ALTER TABLE `Password`
  ADD PRIMARY KEY (`passwordID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `Submission`
--
ALTER TABLE `Submission`
  ADD PRIMARY KEY (`submissionID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `User_Role`
--
ALTER TABLE `User_Role`
  ADD UNIQUE KEY `ID` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
