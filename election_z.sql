-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 04:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election_z`
--

-- --------------------------------------------------------

--
-- Table structure for table `vxxz_candidates`
--

CREATE TABLE `vxxz_candidates` (
  `candidates_id` varchar(50) NOT NULL,
  `candidates_name` varchar(150) NOT NULL,
  `candidates_dob` varchar(50) NOT NULL,
  `candidates_party` varchar(200) NOT NULL,
  `candidates_tenure` varchar(50) NOT NULL,
  `candidates_election` varchar(100) NOT NULL,
  `candidates_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vxxz_candidates`
--

INSERT INTO `vxxz_candidates` (`candidates_id`, `candidates_name`, `candidates_dob`, `candidates_party`, `candidates_tenure`, `candidates_election`, `candidates_location`) VALUES
('CAN194RUZKLJ', 'Jimoh Bobade', '1970-06-16', 'PDP', '2nd Tenure', 'Presidential', 'Nigeria'),
('CAN19GCUN3T6', 'Babatunde Idowu', '1943-08-20', 'PDP', '1st Tenure', 'State', 'Delta'),
('CAN19ZBCI6ML', 'Farix Ibk', '1943-08-20', 'PDP', '1st Tenure', 'State', 'Delta'),
('CAN19ZXFN3YU', 'Solanke Adams', '1976-11-24', 'APC', '1st Tenure', 'Presidential', 'Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `vxxz_elections`
--

CREATE TABLE `vxxz_elections` (
  `election_id` varchar(30) NOT NULL,
  `election_type` varchar(50) NOT NULL,
  `election_location` varchar(50) NOT NULL,
  `election_status` varchar(20) NOT NULL DEFAULT 'pending',
  `election_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vxxz_elections`
--

INSERT INTO `vxxz_elections` (`election_id`, `election_type`, `election_location`, `election_status`, `election_year`) VALUES
('ELEC19GXOES3L', 'State', 'Delta', 'pending', '2018'),
('ELEC19T416FSG', 'Presidential', 'Nigeria', 'pending', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `vxxz_voters`
--

CREATE TABLE `vxxz_voters` (
  `voters_reg_id` varchar(30) NOT NULL,
  `voters_firstname` varchar(100) NOT NULL,
  `voters_surname` varchar(100) NOT NULL,
  `voters_other_name` varchar(100) NOT NULL,
  `voters_dob` varchar(100) NOT NULL,
  `voters_address` text NOT NULL,
  `voters_sorigin` varchar(100) NOT NULL,
  `voters_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vxxz_voters`
--

INSERT INTO `vxxz_voters` (`voters_reg_id`, `voters_firstname`, `voters_surname`, `voters_other_name`, `voters_dob`, `voters_address`, `voters_sorigin`, `voters_phone`) VALUES
('INC156690AUB', 'Emem', 'Carina', 'Itoro', '27/11/1999', '4A, Community Road, Akoka, Lagos', 'Akwa-Ibom', '+2348135270797');

-- --------------------------------------------------------

--
-- Table structure for table `vxxz_vote_count`
--

CREATE TABLE `vxxz_vote_count` (
  `vote_count_id` varchar(20) NOT NULL,
  `vote_count_candidate` varchar(30) NOT NULL,
  `vote_count_election` varchar(100) NOT NULL,
  `vote_count_voter` varchar(100) NOT NULL,
  `vote_count_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vxxz_candidates`
--
ALTER TABLE `vxxz_candidates`
  ADD UNIQUE KEY `candidates_id` (`candidates_id`);

--
-- Indexes for table `vxxz_elections`
--
ALTER TABLE `vxxz_elections`
  ADD UNIQUE KEY `election_id` (`election_id`);

--
-- Indexes for table `vxxz_voters`
--
ALTER TABLE `vxxz_voters`
  ADD UNIQUE KEY `voters_reg_id` (`voters_reg_id`);

--
-- Indexes for table `vxxz_vote_count`
--
ALTER TABLE `vxxz_vote_count`
  ADD UNIQUE KEY `vote_count_id` (`vote_count_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
