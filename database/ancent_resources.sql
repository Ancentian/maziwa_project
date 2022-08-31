-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 07:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ancent_resources`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `nhifnumber` varchar(255) NOT NULL,
  `nssfnumber` varchar(30) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `doj` date DEFAULT NULL,
  `contract_type` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `doctorname` varchar(255) DEFAULT NULL,
  `doc_phone_no` varchar(20) DEFAULT NULL,
  `bloodtype` varchar(255) DEFAULT NULL,
  `medical_condition` text DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `current_medication` text DEFAULT NULL,
  `kins_name` varchar(255) NOT NULL,
  `kins_relationship` varchar(255) DEFAULT NULL,
  `kins_phone_no` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `phonenumber`, `idnumber`, `nhifnumber`, `nssfnumber`, `gender`, `marital_status`, `dob`, `address`, `doj`, `contract_type`, `city`, `role`, `department`, `doctorname`, `doc_phone_no`, `bloodtype`, `medical_condition`, `allergies`, `current_medication`, `kins_name`, `kins_relationship`, `kins_phone_no`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'edited', 'Mutuku', 'Admin1@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '0700000012', '123454', '34232435', '432123', 'male', 'single', '2021-04-20', 'Dagoretti Market near Equity Bank.', '2021-04-20', 'permanent', 'Nairobi, Kenya', 'developer', 'development', 'gracee', '+254717576900', '', '', '', '', 'gfdfgh', 'brother', '0700000012', '2021-02-15 12:52:50', '2021-02-15 12:52:50'),
(2, 'Ancent', NULL, 'marion', 'Admin@gmail.com', '20c3e4e28be3b647dab7140f169cb628', '0795974284', '33366869', '21122132', 'A321221221', '', '', '2021-02-17', 'Dagoretti Market near Equity Bank.', NULL, '', 'Nairobi, Kenya', 'developer', 'development', '', '', '', '', '', '', 'Susan', 'parent/guardian', '0700000012', '2021-02-16 03:25:21', '2021-02-16 03:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_fname` varchar(254) DEFAULT NULL,
  `emp_lname` varchar(254) DEFAULT NULL,
  `item_name` text NOT NULL,
  `date` text NOT NULL,
  `amount` text NOT NULL,
  `total_amount` varchar(254) NOT NULL DEFAULT '0',
  `description` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `emp_fname`, `emp_lname`, `item_name`, `date`, `amount`, `total_amount`, `description`, `file`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, '[\"Tshirt\"]', '[\"2021-04-29\",\"2021-04-28\"]', '[\"4000\",\"200\"]', '4200', 'hjkl;\'\'', NULL, '2021-04-27 09:46:35', '2021-04-27 09:46:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
