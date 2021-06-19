-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 03:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `createteamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`account_id`, `person_id`, `username`, `password`, `account_status`) VALUES
(1, 1, 'arthbasalo', '$2y$10$fRnerYUGf.9hhgEW9o93ceJVMIDlgTqtwb17l31KKBwqMEic3Wo2m', 'Activated'),
(2, 2, 'jelaine', '$2y$10$mrjYixfDvNJTaZoFlEqH2.NIiO7b2c5xlD.rK4Y.6mIfvl4N0lJDS', 'Deactivated'),
(3, 3, 'zeriane', '$2y$10$dEAbf.sKpL.TYf4m7q45MuDvZDpgpKlPzVbTQaRdxQPZmFz5HLw4.', 'Deactivated'),
(4, 4, 'christian', '$2y$10$79C5obvp0b5AsyIMzV5k6Oh0g4XCQvLQvSumqIDJzYdXbngkOPKWy', 'Activated'),
(5, 5, 'rogelio', '$2y$10$fRzEVOVnpKGfpCqpyXop2ea0XKKrbdYTpqyT5nJRYZNYnGv.HV5hK', 'Deactivated'),
(6, 6, 'johnmardy', '$2y$10$T8CS15pdzr5AkjrTMFJ0..4ZTGpwB8EaiayUBjbX89boQr9dpNTnG', 'Deactivated'),
(7, 7, 'glei', '$2y$10$3cFM/NKrwxM.NPs1iStg9.JIt7SPwQvZen0PbegG9vSIZoQ7soESe', 'Deactivated'),
(8, 8, 'jericho', '$2y$10$A1XUsEqXNGQA3PoDvfttge7uEpNetaEUNFDIY1tV52Z3I4peFJKo6', 'Deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `logs_id` int(11) NOT NULL,
  `logs_code` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `created_at` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`logs_id`, `logs_code`, `category`, `id`, `code`, `status`, `description`, `created_at`, `added_by`) VALUES
(1, '182021065411081', 'ACCOUNT LOGIN', 1, '1182021065353081', 'LOGIN', 'Date and Time of Login: 2021-06-18 @ 08:54:11 PM', '2021-06-18 @ 08:54:11 PM', 1),
(2, '182021065459082', 'NEW USER', 2, '2182021065459082', 'CREATE', 'New Business Administrator user successfully saved<br>New Information<br>Firstname: JELAINE, Middlename:, Lastname: TORZAR, Affiliation: , Date of Birth: 1998-01-01, Sex: Female, Civil Status: Single, House Number: - - -, Street: LAKESIDE NEST SUBDIVISION, Barangay: BANAYBANAY, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: jelaine, Contact Number: 09123456789, Telephone Number: , Status: Saved', '2021-06-18 @ 08:54:59 PM', 1),
(3, '182021065459083', 'CREATE ACCOUNT', 2, '', 'CREATE', 'New Business Administrator account successfully saved<br>Account Information<br>Name: TORZAR , JELAINE <br>Username: jelaine<br>Password: secret123 / $2y$10$mrjYixfDvNJTaZoFlEqH2.NIiO7b2c5xlD.rK4Y.6mIfvl4N0lJDS<br>Access Status: Deactivated', '2021-06-18 @ 08:54:59 PM', 1),
(4, '182021065538084', 'NEW USER', 3, '2182021065538083', 'CREATE', 'New Business Administrator user successfully saved<br>New Information<br>Firstname: ZERINANE, Middlename:, Lastname: MANAHAN, Affiliation: , Date of Birth: 1998-01-01, Sex: Female, Civil Status: Single, House Number: - - - , Street: MABUHAY CITY, CALOOCAN STREET, Barangay: MAMATID, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: zeriane, Contact Number: 09123456789, Telephone Number: , Status: Saved', '2021-06-18 @ 08:55:38 PM', 1),
(5, '182021065538085', 'CREATE ACCOUNT', 3, '', 'CREATE', 'New Business Administrator account successfully saved<br>Account Information<br>Name: MANAHAN , ZERINANE <br>Username: zeriane<br>Password: secret123 / $2y$10$dEAbf.sKpL.TYf4m7q45MuDvZDpgpKlPzVbTQaRdxQPZmFz5HLw4.<br>Access Status: Deactivated', '2021-06-18 @ 08:55:38 PM', 1),
(6, '182021065612086', 'NEW USER', 4, '2182021065612084', 'CREATE', 'New Business Administrator user successfully saved<br>New Information<br>Firstname: CHRISTIAN, Middlename:, Lastname: BACULINAO, Affiliation: , Date of Birth: 1998-01-01, Sex: Male, Civil Status: Single, House Number: - - - , Street: CENTENNIAL HOMES, Barangay: PULO, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: christian, Contact Number: 09123456789, Telephone Number: , Status: Saved', '2021-06-18 @ 08:56:12 PM', 1),
(7, '182021065612087', 'CREATE ACCOUNT', 4, '', 'CREATE', 'New Business Administrator account successfully saved<br>Account Information<br>Name: BACULINAO , CHRISTIAN <br>Username: christian<br>Password: secret123 / $2y$10$79C5obvp0b5AsyIMzV5k6Oh0g4XCQvLQvSumqIDJzYdXbngkOPKWy<br>Access Status: Deactivated', '2021-06-18 @ 08:56:12 PM', 1),
(8, '182021065655088', 'NEW USER', 5, '2182021065655085', 'CREATE', 'New Business Administrator user successfully saved<br>New Information<br>Firstname: ROGELIO, Middlename:ALGIRE, Lastname: ROXAS, Affiliation: JR, Date of Birth: 1998-01-01, Sex: Male, Civil Status: Single, House Number: - - - , Street: - - - , Barangay: SAN ISIDRO, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: rogelio, Contact Number: 09123456789, Telephone Number: , Status: Saved', '2021-06-18 @ 08:56:55 PM', 1),
(9, '182021065655089', 'CREATE ACCOUNT', 5, '', 'CREATE', 'New Business Administrator account successfully saved<br>Account Information<br>Name: ROXAS JR, ROGELIO ALGIRE<br>Username: rogelio<br>Password: secret123 / $2y$10$fRzEVOVnpKGfpCqpyXop2ea0XKKrbdYTpqyT5nJRYZNYnGv.HV5hK<br>Access Status: Deactivated', '2021-06-18 @ 08:56:55 PM', 1),
(10, '1820210657350810', 'NEW USER', 6, '2182021065735086', 'CREATE', 'New Business Administrator user successfully saved<br>New Information<br>Firstname: JOHN MARDY, Middlename:FARINAS, Lastname: IBO, Affiliation: , Date of Birth: 1998-01-01, Sex: Male, Civil Status: Single, House Number: - - -, Street: BERMINGHAM VILLAGE, Barangay: PULO, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: johnmardy, Contact Number: 09123456789, Telephone Number: , Status: Saved', '2021-06-18 @ 08:57:35 PM', 1),
(11, '1820210657350811', 'CREATE ACCOUNT', 6, '', 'CREATE', 'New Business Administrator account successfully saved<br>Account Information<br>Name: IBO , JOHN MARDY FARINAS<br>Username: johnmardy<br>Password: secret123 / $2y$10$T8CS15pdzr5AkjrTMFJ0..4ZTGpwB8EaiayUBjbX89boQr9dpNTnG<br>Access Status: Deactivated', '2021-06-18 @ 08:57:35 PM', 1),
(12, '1820210659100812', 'NEW USER', 7, '2182021065910087', 'CREATE', 'New Business Administrator user successfully saved<br>New Information<br>Firstname: GLEIZHELLE, Middlename:, Lastname: LARDIZABAL, Affiliation: , Date of Birth: 1998-01-01, Sex: Male, Civil Status: Single, House Number: - - -, Street: CENTENNIAL HOMES, Barangay: PULO, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: glei, Contact Number: 09123456789, Telephone Number: , Status: Saved', '2021-06-18 @ 08:59:10 PM', 1),
(13, '1820210659100813', 'CREATE ACCOUNT', 7, '', 'CREATE', 'New Business Administrator account successfully saved<br>Account Information<br>Name: LARDIZABAL , GLEIZHELLE <br>Username: glei<br>Password: secret123 / $2y$10$3cFM/NKrwxM.NPs1iStg9.JIt7SPwQvZen0PbegG9vSIZoQ7soESe<br>Access Status: Deactivated', '2021-06-18 @ 08:59:10 PM', 1),
(14, '1820210600030914', 'NEW USER', 8, '2182021060003098', 'CREATE', 'New Business Administrator user successfully saved<br>New Information<br>Firstname: JERICHO, Middlename:, Lastname: NARBONITA, Affiliation: , Date of Birth: 1998-01-01, Sex: Male, Civil Status: Single, House Number: - - -, Street: - - -, Barangay: SAN ISIDRO, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: jericho, Contact Number: 09123456789, Telephone Number: , Status: Saved', '2021-06-18 @ 09:00:03 PM', 1),
(15, '1820210600030915', 'CREATE ACCOUNT', 8, '', 'CREATE', 'New Business Administrator account successfully saved<br>Account Information<br>Name: NARBONITA , JERICHO <br>Username: jericho<br>Password: secret123 / $2y$10$A1XUsEqXNGQA3PoDvfttge7uEpNetaEUNFDIY1tV52Z3I4peFJKo6<br>Access Status: Deactivated', '2021-06-18 @ 09:00:03 PM', 1),
(16, '1820210604510916', 'UPDATE ACCOUNT INFORMATION', 1, '', 'UPDATE', 'Information successfully changed<br>New Information<br>Firstname: John Stewarth, Middlename:Gutang, Lastname: Basalo, Affiliation: , Date of Birth: 1998-09-03, Sex: Male, Civil Status: Single, House Number: BLOCK 2 LOT 49 PHASE 1, Street: LAKESIDE NEST SUBDIVISION, Barangay: BANAYBANAY, City: CABUYAO CITY, Province: LAGUNA,Region: REGION IV-A, Username: arthbasalo, Contact Number: 09123456789, Telephone Number: ', '2021-06-18 @ 09:04:51 PM', 1),
(17, '1820210604510917', 'UPDATE ACCOUNT EMAIL ADDRESS', 1, '', 'UPDATE', 'Email successfully changed<br>Name: Basalo , John Stewarth Gutang<br>New Username<br>Username arthbasalo', '2021-06-18 @ 09:04:51 PM', 1),
(18, '1820210613290918', 'ACCOUNT LOGIN', 1, '1182021065353081', 'LOGIN', 'Date and Time of Login: 2021-06-18 @ 09:13:29 PM', '2021-06-18 @ 09:13:29 PM', 1),
(19, '1820210613380919', 'UPDATE ACCOUNT STATUS', 4, '', 'UPDATE', 'Account status successfully changed<br>Name: BACULINAO , CHRISTIAN <br>Status: Activated', '2021-06-18 @ 09:13:38 PM', 1),
(20, '1820210614230920', 'ACCOUNT LOGIN', 4, '2182021065612084', 'LOGIN', 'Date and Time of Login: 2021-06-18 @ 09:14:23 PM', '2021-06-18 @ 09:14:23 PM', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_person`
--

CREATE TABLE `tbl_person` (
  `person_id` int(11) NOT NULL,
  `person_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `affiliation_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `telephone_number` varchar(45) DEFAULT NULL,
  `person_created_at` varchar(255) DEFAULT NULL,
  `person_status` varchar(45) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_person`
--

INSERT INTO `tbl_person` (`person_id`, `person_code`, `first_name`, `middle_name`, `last_name`, `affiliation_name`, `date_of_birth`, `sex`, `civil_status`, `house_no`, `street`, `barangay`, `city`, `province`, `region`, `email_address`, `contact_number`, `telephone_number`, `person_created_at`, `person_status`, `user_type_id`, `added_by`) VALUES
(1, '1182021065353081', 'John Stewarth', 'Gutang', 'Basalo', '', '1998-09-03', 'Male', 'Single', 'BLOCK 2 LOT 49 PHASE 1', 'LAKESIDE NEST SUBDIVISION', 'BANAYBANAY', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'arthbasalo', '09123456789', '', '2021-06-18 @ 08:53:53pm', 'Saved', 1, 1),
(2, '2182021065459082', 'JELAINE', '', 'TORZAR', '', '1998-01-01', 'Female', 'Single', '- - -', 'LAKESIDE NEST SUBDIVISION', 'BANAYBANAY', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'jelaine', '09123456789', '', '2021-06-18 @ 08:54:59 PM', 'Saved', 2, 1),
(3, '2182021065538083', 'ZERINANE', '', 'MANAHAN', '', '1998-01-01', 'Female', 'Single', '- - - ', 'MABUHAY CITY, CALOOCAN STREET', 'MAMATID', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'zeriane', '09123456789', '', '2021-06-18 @ 08:55:38 PM', 'Saved', 2, 1),
(4, '2182021065612084', 'CHRISTIAN', '', 'BACULINAO', '', '1998-01-01', 'Male', 'Single', '- - - ', 'CENTENNIAL HOMES', 'PULO', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'christian', '09123456789', '', '2021-06-18 @ 08:56:12 PM', 'Saved', 2, 1),
(5, '2182021065655085', 'ROGELIO', 'ALGIRE', 'ROXAS', 'JR', '1998-01-01', 'Male', 'Single', '- - - ', '- - - ', 'SAN ISIDRO', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'rogelio', '09123456789', '', '2021-06-18 @ 08:56:55 PM', 'Saved', 2, 1),
(6, '2182021065735086', 'JOHN MARDY', 'FARINAS', 'IBO', '', '1998-01-01', 'Male', 'Single', '- - -', 'BERMINGHAM VILLAGE', 'PULO', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'johnmardy', '09123456789', '', '2021-06-18 @ 08:57:35 PM', 'Saved', 2, 1),
(7, '2182021065910087', 'GLEIZHELLE', '', 'LARDIZABAL', '', '1998-01-01', 'Male', 'Single', '- - -', 'CENTENNIAL HOMES', 'PULO', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'glei', '09123456789', '', '2021-06-18 @ 08:59:10 PM', 'Saved', 2, 1),
(8, '2182021060003098', 'JERICHO', '', 'NARBONITA', '', '1998-01-01', 'Male', 'Single', '- - -', '- - -', 'SAN ISIDRO', 'CABUYAO CITY', 'LAGUNA', 'REGION IV-A', 'jericho', '09123456789', '', '2021-06-18 @ 09:00:03 PM', 'Saved', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(11) NOT NULL,
  `type_description` varchar(255) DEFAULT NULL,
  `type_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `type_description`, `type_status`) VALUES
(1, 'System Administrator', 'Activated'),
(2, 'Business Administrator', 'Activated'),
(3, 'Staff', 'Activated'),
(4, 'Client', 'Activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`logs_id`);

--
-- Indexes for table `tbl_person`
--
ALTER TABLE `tbl_person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
