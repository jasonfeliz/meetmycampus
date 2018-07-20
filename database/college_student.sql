-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 06:28 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetmycampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_student`
--

CREATE TABLE `college_student` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `college_id` int(11) UNSIGNED DEFAULT NULL,
  `user_type` varchar(32) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_student`
--

INSERT INTO `college_student` (`id`, `first_name`, `last_name`, `username`, `email`, `token`, `register_date`, `college_id`, `user_type`, `deleted`) VALUES
(35, 'jason', 'feliz', 'arkham', 'arkham@harvard.edu', '$2y$10$KThv2Ly1HG4/suvsfj0EPuyKbRzzGSASZuubO.m1PFzLSNMmk3aVC', '2017-11-22 07:38:40', 227, 'college_student', 0),
(36, 'mike', 'jordan', 'mikejordan', 'mj@unc.edu', '$2y$10$z6C2J3w6/M6cwCRNbIU9ZOjmFWfPGsENua24Boro9wgKtPZDxiose', '2017-11-22 18:23:35', 598, 'college_student', 0),
(37, 'Nathan', 'Miranda', 'brandnate', 'nate@harvard.edu', '$2y$10$xuezjjtws2ZraNX4c1NwouqMlA2c2zPGMuU.U7PetUuJ50sgCr5lO', '2017-12-12 20:06:03', 227, 'college_student', 0),
(38, 'blank', 'blank', 'Anonymous', 'blank', 'blank', '2018-01-08 23:52:30', 1, 'college_student', 0),
(39, 'Reggie', 'Miller', 'rmiler294333', 'rmiller@harvard.edu', '$2y$10$l7w4i6GwVQpYDNwfxHsFseHxGl7zhG631oy86VSd3fKWenW7AH.wa', '2018-03-14 05:24:11', 227, 'college_student', 0),
(40, 'Mark', 'Jackson', 'mjackson', 'mjackson@harvard.edu', '$2y$10$I1Oqx7pUjw4pnNwyHdmNCOUwxegDlXQ2eG.hZvVEEUAyCatfFVl2K', '2018-03-14 05:28:58', 227, 'college_student', 0),
(41, 'Rik', 'Smit', 'rSmit', 'rsmit@harvard.edu', '$2y$10$pA/Na9UPB/mooxJGBymzreqFHFauFWldFQm4JEWiL2srCqV0APF4W', '2018-03-14 05:29:46', 227, 'college_student', 0),
(42, 'Bartolo', 'Colon', 'bColon', 'bColon@harvard.edu', '$2y$10$PB1vdkVOc0aX.lcwzWM5Ce3sNxDHp4xnFNk0QfBhXSMYb3iHi9uWG', '2018-03-14 21:23:54', 227, 'college_student', 0),
(43, 'Jim', 'Halper', 'jhalper', 'jhalper@harvard.edu', '$2y$10$JP0SaA8DngHpZiZlfklE0ebl25m885yHHZfCx57OXTuIZ.9NUr9OG', '2018-03-14 21:46:32', 227, 'college_student', 0),
(44, 'Dwight', 'Schrute', 'schrutefarms', 'dschrute@harvard.edu', '$2y$10$OZEIhBCqdr6g2T9UQZitzOTGOQn3h9WwnZE0DVaHdkQifCl63xsT2', '2018-03-14 21:48:17', 227, 'college_student', 0),
(45, 'Michael', 'Jackson', 'mjackson1', 'mj1@harvard.edu', '$2y$10$7H9gMKLO0bbrdhX8Qvs2q.pw9Q2DCi0YXF85IYydgfwxY/knU8BhC', '2018-03-19 00:54:16', 227, 'college_student', 0),
(46, 'Josh', 'Hendrick', 'jhendrick', 'jh@harvard.edu', '$2y$10$7p7H7NM.dx/tVbm.RmPKeOH4Xm8S0pR3AHj8W/DpyIC3iiZOJBTpe', '2018-03-19 00:56:30', 227, 'college_student', 0),
(47, 'Luis', 'Felix', 'lfeliz', 'lfelix@harvard.edu', '$2y$10$k/asIv022.uPVjHudPra6Oxa/tUOurZeAcEWum4a35shNSmHPekfW', '2018-03-25 07:05:17', 227, 'college_student', 0),
(51, 'Rob', 'Yu', 'robyu', 'robyu@harvard.edu', '$2y$10$veKt8.ugTkbnV/OR0ZuBrOcivicLzU4b0qFJSgkdCCQZ.f1W7caK2', '2018-06-14 14:45:25', 227, 'college_student', 0),
(52, 'Mary', 'Jane', 'maryjane', 'maryjane@harvard.edu', '$2y$10$.CdC6qyDY8E55ibBSfcXde.ocugbGgPYXLSBQH5yt74Fm0tgpG0se', '2018-06-14 17:00:19', 227, 'college_student', 0),
(53, 'Bruce', 'Wayne', 'brucewayneee', 'bruce@harvard.edu', '$2y$10$H7Bp25Uy.hc/bCwv0dQkvOnYNfkg1vALT08SBzdfnIg9dokWI7tXa', '2018-07-11 17:15:32', 227, 'college_student', 0),
(54, 'Bruce', 'Wayne', 'brucewayneee2', 'bruce2@harvard.edu', '$2y$10$G3m0UyfYpFp3i2X0eBd7du14Lq8Xm0ddeF9gkH8cLEPG7M70aW7WW', '2018-07-11 17:38:44', 227, 'college_student', 0),
(55, 'robin', 'nest', 'robin', 'robin@harvard.edu', '$2y$10$8VStzRq2l.ZzZ/tSR3NNEutus11hymJDDfQrcU.YJmPewgG5x8fU2', '2018-07-11 17:41:23', 227, 'college_student', 1),
(56, 'the', 'joker', 'thejoker', 'joker@harvard.edu', '$2y$10$V1mfiqWhC5W1CGPDtciPEOYhlzZ7JEO03/DF8gokZamiljokzYvvq', '2018-07-11 17:44:50', 227, 'college_student', 0),
(57, 'Mark', 'Jones', 'markjones', 'markjones@harvard.edu', '$2y$10$/bj7iAV4qq9IDUPZ52M59u8RE2wuFS1GlWpOT/IXS7X3snTQc4Dcq', '2018-07-11 18:19:03', 227, 'college_student', 0),
(58, 'Mark', 'Jones', 'markjones1', 'markjones1@harvard.edu', '$2y$10$brmbpZHLs6FavWbINOhb6Oy0FUz7xUfMWNHshcKNPc1r.74zxxIme', '2018-07-11 18:31:18', 227, 'college_student', 0),
(59, 'Carlos', 'Martinez', 'carlos', 'carlos@harvard.edu', '$2y$10$V.aVHQfsQyDSqVSlEbfr0ea131XoxLN4xBXYNDeKe1UfPMRlAaHke', '2018-07-11 18:52:58', 227, 'college_student', 0),
(60, 'Luis', 'Miguel', 'luismiguel', 'luismiguel@harvard.edu', '$2y$10$/F1qJhyzSMgsZI3eDcrr7OzUklgvvkAgKJ.Aw/hRvUXUNoZewHrR2', '2018-07-11 18:54:40', 227, 'college_student', 0),
(61, 'Miguel', 'Cairo', 'miguelcario', 'miguelc@harvard.edu', '$2y$10$aeO7IH.48RGicBSklt7SaeDGLf0WsFWZf8JyFeZL/WjDZzA1ASE2.', '2018-07-11 19:09:06', 227, 'college_student', 0),
(62, 'Kelly', 'Maine', 'kellymaine', 'kelly@harvard.edu', '$2y$10$yyPtnzJ1jdsMdDCKlW2BM.SrVnmmKc/Tv8eM7V0Wj.iKCNuH/6GT.', '2018-07-19 03:54:07', 227, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_student`
--
ALTER TABLE `college_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collegestudent_ibfk_2` (`college_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college_student`
--
ALTER TABLE `college_student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `college_student`
--
ALTER TABLE `college_student`
  ADD CONSTRAINT `collegestudent_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
