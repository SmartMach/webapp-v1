-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2022 at 11:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `S10011_structure`
--

-- --------------------------------------------------------

--
-- Table structure for table `pdm_downtime_reason_mapping`
--

CREATE TABLE `pdm_downtime_reason_mapping` (
  `machine_event_id` varchar(45) NOT NULL,
  `split_id` varchar(45) NOT NULL,
  `downtime_reason_id` varchar(45) NOT NULL,
  `tool_id` varchar(45) NOT NULL,
  `part_id` varchar(45) NOT NULL,
  `notes` varchar(45) NOT NULL,
  `from_time` varchar(20) NOT NULL,
  `to_time` varchar(20) NOT NULL,
  `duration` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_events`
--

CREATE TABLE `pdm_events` (
  `machine_event_id` varchar(45) NOT NULL,
  `shift_date` varchar(45) NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `shift_id` varchar(45) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `event` varchar(45) NOT NULL,
  `is_split` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_production_info`
--

CREATE TABLE `pdm_production_info` (
  `production_event_id` varchar(90) NOT NULL,
  `machine_id` bigint(90) NOT NULL,
  `shift_date` date NOT NULL,
  `shift_id` varchar(99) NOT NULL,
  `start_time` varchar(98) NOT NULL,
  `end_time` varchar(99) NOT NULL,
  `part_id` varchar(99) NOT NULL,
  `tool_id` varchar(97) NOT NULL,
  `actual_shot_count` bigint(99) NOT NULL,
  `production` varchar(98) NOT NULL,
  `correction_min_counts` bigint(97) NOT NULL,
  `corrections` varchar(98) NOT NULL,
  `correction_notes` varchar(90) NOT NULL,
  `rejection_max_counts` bigint(90) NOT NULL,
  `rejections` varchar(99) NOT NULL,
  `rejections_notes` text NOT NULL,
  `reject_reason` text NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_tool_changeover_log`
--

CREATE TABLE `pdm_tool_changeover_log` (
  `date` date NOT NULL,
  `from_time` varchar(45) NOT NULL,
  `to_time` varchar(20) NOT NULL,
  `shift` varchar(45) NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `tool_id` varchar(45) NOT NULL,
  `part_id` varchar(45) NOT NULL,
  `machine_event_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_current_shift_performance`
--

CREATE TABLE `settings_current_shift_performance` (
  `r_no` int(90) NOT NULL,
  `oee` int(99) NOT NULL,
  `green` int(99) NOT NULL,
  `yellow` int(99) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_downtime_reasons`
--

CREATE TABLE `settings_downtime_reasons` (
  `downtime_reason_id` varchar(45) NOT NULL,
  `downtime_category` varchar(45) NOT NULL,
  `downtime_reason` varchar(45) NOT NULL,
  `image_id` varchar(6) NOT NULL,
  `is_default` int(5) NOT NULL,
  `last_updated_by` varchar(25) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_downtime_reasons_images`
--

CREATE TABLE `settings_downtime_reasons_images` (
  `image_id` varchar(20) NOT NULL,
  `original_file_name` varchar(100) NOT NULL,
  `original_file_extension` varchar(45) NOT NULL,
  `original_file_size_kb` float NOT NULL,
  `uploaded_file_location` varchar(200) NOT NULL,
  `uploaded_file_name` varchar(100) NOT NULL,
  `uploaded_file_extension` varchar(45) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_downtime_threshold`
--

CREATE TABLE `settings_downtime_threshold` (
  `downtime_threshold` int(6) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_financial_metrics_goals`
--

CREATE TABLE `settings_financial_metrics_goals` (
  `overall_teep` float NOT NULL,
  `overall_ooe` float NOT NULL,
  `overall_oee` float NOT NULL,
  `availability` float NOT NULL,
  `performance` float NOT NULL,
  `quality` float NOT NULL,
  `oee_target` float NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_machine_current`
--

CREATE TABLE `settings_machine_current` (
  `machine_id` varchar(45) NOT NULL,
  `machine_name` varchar(45) NOT NULL,
  `rate_per_hour` int(10) NOT NULL,
  `machine_offrate_per_hour` int(10) NOT NULL,
  `tonnage` int(10) NOT NULL,
  `machine_brand` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  `machine_serial_number` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_machine_current`
--

INSERT INTO `settings_machine_current` (`machine_id`, `machine_name`, `rate_per_hour`, `machine_offrate_per_hour`, `tonnage`, `machine_brand`, `status`, `machine_serial_number`) VALUES
('MC1001', 'Injection Molding IM01', 250, 150, 450, 'Machine Brand Name 1', 0, '1'),
('MC1002', 'Injection Molding IM02', 350, 200, 550, 'Machine Brand Name 2', 1, '2'),
('MC1003', 'Injection Molding IM03', 450, 250, 650, 'Machine Brand Name 3', 0, '3'),
('MC1004', ' Injection Molding IM04', 40, 60, 56, 'Machine Brand Name 4', 0, '1'),
('MC1005', ' Injection Molding IM05', 80, 40, 53, 'Machine Brand Name 4', 1, '1'),
('MC1006', ' Injection Molding IM07', 50, 70, 54, 'Machine Brand Name 4', 1, '2'),
('MC1007', ' Injection Molding IM07', 40, 60, 53, 'Machine Brand Name 4', 1, '2'),
('MC1001', 'Injection Molding IM01', 250, 150, 450, 'Machine Brand Name 1', 0, '1'),
('MC1002', 'Injection Molding IM02', 350, 200, 550, 'Machine Brand Name 2', 1, '2'),
('MC1003', 'Injection Molding IM03', 450, 250, 650, 'Machine Brand Name 3', 0, '3'),
('MC1004', ' Injection Molding IM04', 40, 60, 56, 'Machine Brand Name 4', 0, '1'),
('MC1005', ' Injection Molding IM05', 80, 40, 53, 'Machine Brand Name 4', 1, '1'),
('MC1006', ' Injection Molding IM07', 50, 70, 54, 'Machine Brand Name 4', 1, '2'),
('MC1007', ' Injection Molding IM07', 40, 60, 53, 'Machine Brand Name 4', 1, '2'),
('MC1001', 'Injection Molding IM01', 250, 150, 450, 'Machine Brand Name 1', 0, '1'),
('MC1002', 'Injection Molding IM02', 350, 200, 550, 'Machine Brand Name 2', 1, '2'),
('MC1003', 'Injection Molding IM03', 450, 250, 650, 'Machine Brand Name 3', 0, '3'),
('MC1004', ' Injection Molding IM04', 40, 60, 56, 'Machine Brand Name 4', 0, '1'),
('MC1005', ' Injection Molding IM05', 80, 40, 53, 'Machine Brand Name 4', 1, '1'),
('MC1006', ' Injection Molding IM07', 50, 70, 54, 'Machine Brand Name 4', 1, '2'),
('MC1007', ' Injection Molding IM07', 40, 60, 53, 'Machine Brand Name 4', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `settings_machine_iot`
--

CREATE TABLE `settings_machine_iot` (
  `machine_id` varchar(6) NOT NULL,
  `iot_gateway_topic` varchar(6) NOT NULL,
  `site_id` varchar(90) NOT NULL,
  `location_id` varchar(90) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_machine_log`
--

CREATE TABLE `settings_machine_log` (
  `machine_id` varchar(45) NOT NULL,
  `machine_name` varchar(45) NOT NULL,
  `rate_per_hour` int(10) NOT NULL,
  `machine_offrate_per_hour` int(10) NOT NULL,
  `tonnage` int(10) NOT NULL,
  `machine_brand` varchar(45) NOT NULL,
  `status` int(10) NOT NULL,
  `machine_serial_number` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_part_current`
--

CREATE TABLE `settings_part_current` (
  `part_id` varchar(45) NOT NULL,
  `part_name` varchar(45) NOT NULL,
  `NICT` int(10) NOT NULL,
  `part_produced_cycle` int(10) NOT NULL,
  `part_price` float NOT NULL,
  `part_weight` int(10) NOT NULL,
  `tool_id` varchar(45) NOT NULL,
  `material_price` float NOT NULL,
  `material_name` varchar(45) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_part_current`
--

INSERT INTO `settings_part_current` (`part_id`, `part_name`, `NICT`, `part_produced_cycle`, `part_price`, `part_weight`, `tool_id`, `material_price`, `material_name`, `status`) VALUES
('PT1001', 'Part Name 1', 80, 6, 150, 50, 'TL1001', 500, 'PP', 1),
('PT1002', 'Part Name 2', 40, 5, 200, 50, 'TL1001', 50, 'MN', 0),
('PT1003', 'part Name 3', 60, 23, 250, 200, 'TL1001', 100, 'MN', 1),
('PT1004', 'part Name 4', 34, 23, 250.45, 200, 'TL1002', 100.36, 'testing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings_part_log`
--

CREATE TABLE `settings_part_log` (
  `part_id` varchar(6) NOT NULL,
  `part_name` varchar(6) NOT NULL,
  `NICT` time(6) NOT NULL,
  `part_produced_cycle` int(6) NOT NULL,
  `part_price` float NOT NULL,
  `part_weight` float NOT NULL,
  `tool_id` varchar(6) NOT NULL,
  `machine_id` varchar(6) NOT NULL,
  `material_price` varchar(90) NOT NULL,
  `material_name` varchar(90) NOT NULL,
  `status` varchar(50) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_quality_reasons`
--

CREATE TABLE `settings_quality_reasons` (
  `quality_reason_id` bigint(90) NOT NULL,
  `quality_reason_name` varchar(90) NOT NULL,
  `image_id` varchar(20) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_quality_reasons_images`
--

CREATE TABLE `settings_quality_reasons_images` (
  `image_id` varchar(20) NOT NULL,
  `original_file_name` varchar(100) NOT NULL,
  `original_file_extension` varchar(50) NOT NULL,
  `original_file_size_kb` float NOT NULL,
  `uploaded_file_location` varchar(200) NOT NULL,
  `uploaded_file_name` varchar(100) NOT NULL,
  `uploaded_file_extension` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_shift_management`
--

CREATE TABLE `settings_shift_management` (
  `shift_log_id` varchar(6) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_shift_management`
--

INSERT INTO `settings_shift_management` (`shift_log_id`, `start_time`, `duration`, `last_updated_on`, `last_updated_by`) VALUES
('sf01', '06:30:00', '08:00', '2022-05-25 09:10:34', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings_shift_table`
--

CREATE TABLE `settings_shift_table` (
  `Shifts` varchar(1) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_shift_table`
--

INSERT INTO `settings_shift_table` (`Shifts`, `start_time`, `end_time`) VALUES
('A', '06:30:00', '14:30:00'),
('B', '14:30:00', '22:30:00'),
('C', '22:30:00', '06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings_tool_table`
--

CREATE TABLE `settings_tool_table` (
  `tool_id` varchar(45) NOT NULL,
  `tool_name` varchar(45) NOT NULL,
  `tool_status` int(1) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_tool_table`
--

INSERT INTO `settings_tool_table` (`tool_id`, `tool_name`, `tool_status`, `last_updated_by`, `last_updated_on`) VALUES
('TL1001', 'Tool Name 1', 1, '', '2022-06-08 05:10:50'),
('TL1002', 'Tool Name 2', 1, '', '2022-06-08 05:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `temp_machine_data`
--

CREATE TABLE `temp_machine_data` (
  `MACHINE ID` varchar(10) NOT NULL,
  `DATE` varchar(20) NOT NULL,
  `TIME` varchar(20) NOT NULL,
  `MACHINE STATUS` tinyint(1) NOT NULL,
  `DOWNTIME STATUS` tinyint(1) NOT NULL,
  `PRODUCTION` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_machine_data`
--

INSERT INTO `temp_machine_data` (`MACHINE ID`, `DATE`, `TIME`, `MACHINE STATUS`, `DOWNTIME STATUS`, `PRODUCTION`) VALUES
('1', '11-Apr-2022', '8:00:00', 0, 1, 0),
('1', '11-Apr-2022', '8:05:00', 1, 1, 0),
('1', '11-Apr-2022', '8:10:00', 1, 0, 1),
('1', '11-Apr-2022', '8:14:45', 1, 0, 2),
('1', '11-Apr-2022', '8:19:00', 1, 0, 3),
('1', '11-Apr-2022', '8:23:00', 1, 0, 4),
('1', '11-Apr-2022', '8:26:45', 1, 0, 5),
('1', '11-Apr-2022', '8:30:58', 1, 0, 6),
('1', '11-Apr-2022', '8:35:00', 1, 0, 7),
('1', '11-Apr-2022', '8:38:56', 1, 0, 8),
('1', '11-Apr-2022', '8:43:00', 1, 0, 9),
('1', '11-Apr-2022', '8:46:59', 1, 0, 10),
('1', '11-Apr-2022', '8:51:00', 1, 0, 11),
('1', '11-Apr-2022', '8:55:00', 1, 0, 12),
('1', '11-Apr-2022', '8:58:55', 1, 0, 13),
('1', '11-Apr-2022', '9:16:00', 0, 1, 13),
('1', '11-Apr-2022', '9:16:10', 1, 1, 14),
('1', '11-Apr-2022', '9:20:10', 1, 0, 15),
('1', '11-Apr-2022', '9:24:05', 1, 0, 16),
('1', '11-Apr-2022', '9:28:00', 1, 0, 17),
('1', '11-Apr-2022', '9:32:00', 1, 0, 18),
('1', '11-Apr-2022', '9:36:00', 1, 0, 19),
('1', '11-Apr-2022', '9:40:05', 1, 0, 20),
('1', '11-Apr-2022', '9:44:00', 1, 0, 21),
('1', '11-Apr-2022', '9:48:00', 1, 0, 22),
('1', '11-Apr-2022', '9:52:05', 1, 0, 23),
('1', '11-Apr-2022', '9:56:00', 1, 0, 24),
('1', '11-Apr-2022', '10:00:00', 1, 0, 25),
('1', '11-Apr-2022', '10:00:30', 1, 1, 25),
('1', '11-Apr-2022', '11:00:00', 0, 1, 25),
('1', '11-Apr-2022', '11:00:33', 1, 1, 25),
('1', '11-Apr-2022', '11:04:15', 1, 0, 26),
('1', '11-Apr-2022', '11:08:30', 1, 0, 27),
('1', '11-Apr-2022', '11:12:30', 1, 0, 28),
('1', '11-Apr-2022', '11:16:30', 1, 0, 29),
('1', '11-Apr-2022', '11:20:30', 1, 0, 30),
('1', '11-Apr-2022', '11:25:00', 1, 0, 31),
('1', '11-Apr-2022', '11:29:00', 1, 0, 32),
('1', '11-Apr-2022', '11:33:00', 1, 0, 33),
('1', '11-Apr-2022', '11:37:00', 1, 0, 34),
('1', '11-Apr-2022', '11:41:00', 1, 0, 35),
('1', '11-Apr-2022', '11:45:00', 1, 0, 36),
('1', '11-Apr-2022', '11:49:00', 1, 0, 37),
('1', '11-Apr-2022', '11:53:00', 1, 0, 38),
('1', '11-Apr-2022', '11:57:00', 1, 0, 39),
('1', '11-Apr-2022', '12:01:00', 1, 0, 40),
('1', '11-Apr-2022', '12:05:00', 1, 0, 41),
('1', '11-Apr-2022', '12:09:00', 1, 0, 42),
('1', '11-Apr-2022', '12:13:00', 1, 0, 43),
('1', '11-Apr-2022', '12:17:00', 1, 0, 44),
('1', '11-Apr-2022', '12:21:00', 1, 0, 45),
('1', '11-Apr-2022', '12:25:00', 1, 0, 46),
('1', '11-Apr-2022', '12:29:00', 1, 0, 47),
('1', '11-Apr-2022', '12:33:00', 1, 0, 48),
('1', '11-Apr-2022', '12:37:00', 1, 0, 49),
('1', '11-Apr-2022', '12:41:00', 1, 0, 50),
('1', '11-Apr-2022', '12:45:00', 1, 0, 51),
('1', '11-Apr-2022', '12:49:00', 1, 0, 52),
('1', '11-Apr-2022', '12:53:00', 1, 0, 53),
('1', '11-Apr-2022', '12:57:00', 1, 0, 54),
('1', '11-Apr-2022', '13:01:00', 1, 1, 55),
('1', '11-Apr-2022', '14:30:00', 0, 1, 55),
('1', '11-Apr-2022', '14:30:15', 1, 1, 55),
('1', '11-Apr-2022', '14:34:00', 1, 0, 56),
('1', '11-Apr-2022', '14:38:00', 1, 0, 57),
('1', '11-Apr-2022', '14:42:00', 1, 0, 58),
('1', '11-Apr-2022', '14:46:00', 1, 0, 59),
('1', '11-Apr-2022', '14:50:00', 1, 0, 60),
('1', '11-Apr-2022', '14:54:00', 1, 0, 61),
('1', '11-Apr-2022', '14:58:00', 1, 0, 62),
('1', '11-Apr-2022', '15:02:00', 1, 0, 63),
('1', '11-Apr-2022', '15:06:00', 1, 0, 64),
('1', '11-Apr-2022', '15:28:00', 0, 1, 65),
('1', '11-Apr-2022', '15:28:30', 1, 1, 66),
('1', '11-Apr-2022', '15:33:00', 1, 0, 67),
('1', '11-Apr-2022', '15:37:00', 1, 0, 68),
('1', '11-Apr-2022', '15:41:00', 1, 0, 69),
('1', '11-Apr-2022', '15:45:00', 1, 0, 70),
('1', '11-Apr-2022', '15:49:00', 1, 0, 71),
('1', '11-Apr-2022', '15:53:00', 1, 0, 77),
('1', '11-Apr-2022', '15:57:00', 1, 0, 73),
('1', '11-Apr-2022', '16:01:00', 1, 0, 74),
('1', '11-Apr-2022', '16:01:10', 0, 1, 74);

-- --------------------------------------------------------

--
-- Table structure for table `temp_machine_data_new`
--

CREATE TABLE `temp_machine_data_new` (
  `machine_id` int(99) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(96) NOT NULL,
  `downtime` varchar(90) NOT NULL,
  `machine_status` varchar(98) NOT NULL,
  `shot_count` bigint(99) NOT NULL,
  `event` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_machine_data_new`
--

INSERT INTO `temp_machine_data_new` (`machine_id`, `date`, `time`, `downtime`, `machine_status`, `shot_count`, `event`) VALUES
(3, '2022-05-06', '18:19:03:92', 'FALSE', 'TRUE', 16606, 'Active'),
(3, '2022-05-06', '18:19:09:02', 'TRUE', 'TRUE', 16606, 'Inactive'),
(3, '2022-05-06', '18:21:21:22', 'FALSE', 'TRUE', 16607, 'Active'),
(3, '2022-05-06', '18:21:26:42', 'TRUE', 'TRUE', 16607, 'Inactive'),
(3, '2022-05-06', '18:22:02:52', 'FALSE', 'TRUE', 16608, 'Active'),
(3, '2022-05-06', '18:22:07:72', 'TRUE', 'TRUE', 16608, 'Inactive'),
(3, '2022-05-06', '18:22:43:02', 'FALSE', 'TRUE', 16609, 'Active'),
(3, '2022-05-06', '18:22:48:12', 'TRUE', 'TRUE', 16609, 'Inactive'),
(3, '2022-05-06', '18:23:24:32', 'FALSE', 'TRUE', 16610, 'Active'),
(3, '2022-05-06', '18:23:29:52', 'TRUE', 'TRUE', 16610, 'Inactive'),
(3, '2022-05-06', '18:24:05:62', 'FALSE', 'TRUE', 16611, 'Active'),
(3, '2022-05-06', '18:24:10:82', 'TRUE', 'TRUE', 16611, 'Inactive'),
(3, '2022-05-06', '18:24:47:02', 'FALSE', 'TRUE', 16612, 'Active'),
(3, '2022-05-06', '18:24:52:22', 'TRUE', 'TRUE', 16612, 'Inactive'),
(3, '2022-05-06', '18:25:27:92', 'FALSE', 'TRUE', 16613, 'Active'),
(3, '2022-05-06', '18:25:33:12', 'TRUE', 'TRUE', 16613, 'Inactive'),
(3, '2022-05-06', '18:26:09:72', 'FALSE', 'TRUE', 16614, 'Active'),
(3, '2022-05-06', '18:26:14:92', 'TRUE', 'TRUE', 16614, 'Inactive'),
(3, '2022-05-06', '18:26:51:32', 'FALSE', 'TRUE', 16615, 'Active'),
(3, '2022-05-06', '18:26:56:52', 'TRUE', 'TRUE', 16615, 'Inactive'),
(3, '2022-05-06', '18:27:32:02', 'FALSE', 'TRUE', 16616, 'Active'),
(3, '2022-05-06', '18:27:37:12', 'TRUE', 'TRUE', 16616, 'Inactive'),
(3, '2022-05-06', '18:28:14:02', 'FALSE', 'TRUE', 16617, 'Active'),
(3, '2022-05-06', '18:28:19:22', 'TRUE', 'TRUE', 16617, 'Inactive'),
(3, '2022-05-06', '18:28:55:12', 'FALSE', 'TRUE', 16618, 'Active'),
(3, '2022-05-06', '18:29:00:32', 'TRUE', 'TRUE', 16618, 'Inactive'),
(3, '2022-05-06', '18:29:35:82', 'FALSE', 'TRUE', 16619, 'Active'),
(3, '2022-05-06', '18:29:41:02', 'TRUE', 'TRUE', 16619, 'Inactive'),
(3, '2022-05-06', '18:30:18:42', 'FALSE', 'TRUE', 16620, 'Active'),
(3, '2022-05-06', '18:30:23:52', 'TRUE', 'TRUE', 16620, 'Inactive'),
(3, '2022-05-06', '18:30:59:52', 'FALSE', 'TRUE', 16621, 'Active'),
(3, '2022-05-06', '18:31:04:62', 'TRUE', 'TRUE', 16621, 'Inactive'),
(3, '2022-05-06', '18:31:41:42', 'FALSE', 'TRUE', 16622, 'Active'),
(3, '2022-05-06', '18:31:46:62', 'TRUE', 'TRUE', 16622, 'Inactive'),
(3, '2022-05-06', '18:32:23:72', 'FALSE', 'TRUE', 16623, 'Active'),
(3, '2022-05-06', '18:32:28:92', 'TRUE', 'TRUE', 16623, 'Inactive'),
(3, '2022-05-06', '18:33:07:02', 'FALSE', 'TRUE', 16624, 'Active'),
(3, '2022-05-06', '18:33:12:12', 'TRUE', 'TRUE', 16624, 'Inactive'),
(3, '2022-05-06', '18:33:50:72', 'FALSE', 'TRUE', 16625, 'Active'),
(3, '2022-05-06', '18:33:55:82', 'TRUE', 'TRUE', 16625, 'Inactive'),
(3, '2022-05-06', '18:34:32:72', 'FALSE', 'TRUE', 16626, 'Active'),
(3, '2022-05-06', '18:34:37:82', 'TRUE', 'TRUE', 16626, 'Inactive'),
(3, '2022-05-06', '18:35:13:52', 'FALSE', 'TRUE', 16627, 'Active'),
(3, '2022-05-06', '18:35:18:72', 'TRUE', 'TRUE', 16627, 'Inactive'),
(3, '2022-05-06', '18:35:55:52', 'FALSE', 'TRUE', 16628, 'Active'),
(3, '2022-05-06', '18:36:00:72', 'TRUE', 'TRUE', 16628, 'Inactive'),
(3, '2022-05-06', '18:36:36:22', 'FALSE', 'TRUE', 16629, 'Active'),
(3, '2022-05-06', '18:36:41:42', 'TRUE', 'TRUE', 16629, 'Inactive'),
(3, '2022-05-06', '18:37:16:82', 'FALSE', 'TRUE', 16630, 'Active'),
(3, '2022-05-06', '18:37:22:02', 'TRUE', 'TRUE', 16630, 'Inactive'),
(3, '2022-05-06', '18:37:58:52', 'FALSE', 'TRUE', 16631, 'Active'),
(3, '2022-05-06', '18:38:03:72', 'TRUE', 'TRUE', 16631, 'Inactive'),
(3, '2022-05-06', '18:38:38:92', 'FALSE', 'TRUE', 16632, 'Active'),
(3, '2022-05-06', '18:38:44:12', 'TRUE', 'TRUE', 16632, 'Inactive'),
(3, '2022-05-06', '18:39:20:32', 'FALSE', 'TRUE', 16633, 'Active'),
(3, '2022-05-06', '18:39:25:52', 'TRUE', 'TRUE', 16633, 'Inactive'),
(3, '2022-05-06', '18:43:31:12', 'FALSE', 'TRUE', 16634, 'Active'),
(3, '2022-05-06', '18:43:36:32', 'TRUE', 'TRUE', 16634, 'Inactive'),
(3, '2022-05-06', '18:44:13:72', 'FALSE', 'TRUE', 16635, 'Active'),
(3, '2022-05-06', '18:44:18:92', 'TRUE', 'TRUE', 16635, 'Inactive'),
(3, '2022-05-06', '18:44:56:82', 'FALSE', 'TRUE', 16636, 'Active'),
(3, '2022-05-06', '18:45:01:92', 'TRUE', 'TRUE', 16636, 'Inactive'),
(3, '2022-05-06', '18:45:40:32', 'FALSE', 'TRUE', 16637, 'Active'),
(3, '2022-05-06', '18:45:45:52', 'TRUE', 'TRUE', 16637, 'Inactive'),
(3, '2022-05-06', '18:46:25:82', 'FALSE', 'TRUE', 16638, 'Active'),
(3, '2022-05-06', '18:46:31:02', 'TRUE', 'TRUE', 16638, 'Inactive'),
(3, '2022-05-06', '18:47:08:12', 'FALSE', 'TRUE', 16639, 'Active'),
(3, '2022-05-06', '18:47:13:32', 'TRUE', 'TRUE', 16639, 'Inactive'),
(3, '2022-05-06', '18:47:50:62', 'FALSE', 'TRUE', 16640, 'Active'),
(3, '2022-05-06', '18:47:55:72', 'TRUE', 'TRUE', 16640, 'Inactive'),
(3, '2022-05-06', '18:48:33:62', 'FALSE', 'TRUE', 16641, 'Active'),
(3, '2022-05-06', '18:48:38:72', 'TRUE', 'TRUE', 16641, 'Inactive'),
(3, '2022-05-06', '18:49:15:82', 'FALSE', 'TRUE', 16642, 'Active'),
(3, '2022-05-06', '18:49:21:02', 'TRUE', 'TRUE', 16642, 'Inactive'),
(3, '2022-05-06', '18:49:58:12', 'FALSE', 'TRUE', 16643, 'Active'),
(3, '2022-05-06', '18:50:03:32', 'TRUE', 'TRUE', 16643, 'Inactive'),
(3, '2022-05-06', '18:50:39:82', 'FALSE', 'TRUE', 16644, 'Active'),
(3, '2022-05-06', '18:50:45:02', 'TRUE', 'TRUE', 16644, 'Inactive'),
(3, '2022-05-06', '18:51:22:72', 'FALSE', 'TRUE', 16645, 'Active'),
(3, '2022-05-06', '18:51:27:92', 'TRUE', 'TRUE', 16645, 'Inactive'),
(3, '2022-05-06', '18:52:03:62', 'FALSE', 'TRUE', 16646, 'Active'),
(3, '2022-05-06', '18:52:08:72', 'TRUE', 'TRUE', 16646, 'Inactive'),
(3, '2022-05-06', '18:52:45:62', 'FALSE', 'TRUE', 16647, 'Active'),
(3, '2022-05-06', '18:52:50:72', 'TRUE', 'TRUE', 16647, 'Inactive'),
(3, '2022-05-06', '18:53:27:22', 'FALSE', 'TRUE', 16648, 'Active'),
(3, '2022-05-06', '18:53:32:32', 'TRUE', 'TRUE', 16648, 'Inactive'),
(3, '2022-05-06', '18:54:09:12', 'FALSE', 'TRUE', 16649, 'Active'),
(3, '2022-05-06', '18:54:14:22', 'TRUE', 'TRUE', 16649, 'Inactive'),
(3, '2022-05-06', '18:54:51:42', 'FALSE', 'TRUE', 16650, 'Active'),
(3, '2022-05-06', '18:54:56:52', 'TRUE', 'TRUE', 16650, 'Inactive'),
(3, '2022-05-06', '18:55:33:12', 'FALSE', 'TRUE', 16651, 'Active'),
(3, '2022-05-06', '18:55:38:32', 'TRUE', 'TRUE', 16651, 'Inactive'),
(3, '2022-05-06', '18:56:15:52', 'FALSE', 'TRUE', 16652, 'Active'),
(3, '2022-05-06', '18:56:20:72', 'TRUE', 'TRUE', 16652, 'Inactive'),
(3, '2022-05-06', '18:56:57:32', 'FALSE', 'TRUE', 16653, 'Active'),
(3, '2022-05-06', '18:57:02:42', 'TRUE', 'TRUE', 16653, 'Inactive'),
(3, '2022-05-06', '18:57:40:22', 'FALSE', 'TRUE', 16654, 'Active'),
(3, '2022-05-06', '18:57:45:32', 'TRUE', 'TRUE', 16654, 'Inactive'),
(3, '2022-05-06', '18:58:21:82', 'FALSE', 'TRUE', 16655, 'Active'),
(3, '2022-05-06', '18:58:26:92', 'TRUE', 'TRUE', 16655, 'Inactive'),
(3, '2022-05-06', '18:59:03:62', 'FALSE', 'TRUE', 16656, 'Active'),
(3, '2022-05-06', '18:59:08:72', 'TRUE', 'TRUE', 16656, 'Inactive'),
(3, '2022-05-06', '18:59:45:52', 'FALSE', 'TRUE', 16657, 'Active'),
(3, '2022-05-06', '18:59:50:72', 'TRUE', 'TRUE', 16657, 'Inactive'),
(3, '2022-05-06', '19:00:27:32', 'FALSE', 'TRUE', 16658, 'Active'),
(3, '2022-05-06', '19:00:32:42', 'TRUE', 'TRUE', 16658, 'Inactive'),
(3, '2022-05-06', '19:01:08:92', 'FALSE', 'TRUE', 16659, 'Active'),
(3, '2022-05-06', '19:01:14:02', 'TRUE', 'TRUE', 16659, 'Inactive'),
(3, '2022-05-06', '19:01:51:02', 'FALSE', 'TRUE', 16660, 'Active'),
(3, '2022-05-06', '19:01:56:12', 'TRUE', 'TRUE', 16660, 'Inactive'),
(3, '2022-05-06', '19:02:33:22', 'FALSE', 'TRUE', 16661, 'Active'),
(3, '2022-05-06', '19:02:38:42', 'TRUE', 'TRUE', 16661, 'Inactive'),
(3, '2022-05-06', '19:03:14:82', 'FALSE', 'TRUE', 16662, 'Active'),
(3, '2022-05-06', '19:03:20:02', 'TRUE', 'TRUE', 16662, 'Inactive'),
(3, '2022-05-06', '19:03:57:42', 'FALSE', 'TRUE', 16663, 'Active'),
(3, '2022-05-06', '19:04:02:62', 'TRUE', 'TRUE', 16663, 'Inactive'),
(3, '2022-05-06', '19:04:39:62', 'FALSE', 'TRUE', 16664, 'Active'),
(3, '2022-05-06', '19:04:44:72', 'TRUE', 'TRUE', 16664, 'Inactive'),
(3, '2022-05-06', '19:05:21:82', 'FALSE', 'TRUE', 16665, 'Active'),
(3, '2022-05-06', '19:05:27:02', 'TRUE', 'TRUE', 16665, 'Inactive'),
(3, '2022-05-06', '19:06:03:92', 'FALSE', 'TRUE', 16666, 'Active'),
(3, '2022-05-06', '19:06:09:12', 'TRUE', 'TRUE', 16666, 'Inactive'),
(3, '2022-05-06', '19:06:46:12', 'FALSE', 'TRUE', 16667, 'Active'),
(3, '2022-05-06', '19:06:51:32', 'TRUE', 'TRUE', 16667, 'Inactive'),
(3, '2022-05-06', '19:07:27:92', 'FALSE', 'TRUE', 16668, 'Active'),
(3, '2022-05-06', '19:07:33:12', 'TRUE', 'TRUE', 16668, 'Inactive'),
(3, '2022-05-06', '19:08:09:72', 'FALSE', 'TRUE', 16669, 'Active'),
(3, '2022-05-06', '19:08:14:82', 'TRUE', 'TRUE', 16669, 'Inactive'),
(3, '2022-05-06', '19:08:51:72', 'FALSE', 'TRUE', 16670, 'Active'),
(3, '2022-05-06', '19:08:56:92', 'TRUE', 'TRUE', 16670, 'Inactive'),
(3, '2022-05-06', '19:09:33:72', 'FALSE', 'TRUE', 16671, 'Active'),
(3, '2022-05-06', '19:09:38:82', 'TRUE', 'TRUE', 16671, 'Inactive'),
(3, '2022-05-06', '19:10:15:82', 'FALSE', 'TRUE', 16672, 'Active'),
(3, '2022-05-06', '19:10:20:92', 'TRUE', 'TRUE', 16672, 'Inactive'),
(3, '2022-05-06', '19:10:57:22', 'FALSE', 'TRUE', 16673, 'Active'),
(3, '2022-05-06', '19:11:02:42', 'TRUE', 'TRUE', 16673, 'Inactive'),
(3, '2022-05-06', '19:11:39:42', 'FALSE', 'TRUE', 16674, 'Active'),
(3, '2022-05-06', '19:11:44:52', 'TRUE', 'TRUE', 16674, 'Inactive'),
(3, '2022-05-06', '19:12:21:92', 'FALSE', 'TRUE', 16675, 'Active'),
(3, '2022-05-06', '19:12:27:12', 'TRUE', 'TRUE', 16675, 'Inactive'),
(3, '2022-05-06', '19:13:03:42', 'FALSE', 'TRUE', 16676, 'Active'),
(3, '2022-05-06', '19:13:08:52', 'TRUE', 'TRUE', 16676, 'Inactive'),
(3, '2022-05-06', '19:13:45:32', 'FALSE', 'TRUE', 16677, 'Active'),
(3, '2022-05-06', '19:13:50:42', 'TRUE', 'TRUE', 16677, 'Inactive'),
(3, '2022-05-06', '19:14:27:02', 'FALSE', 'TRUE', 16678, 'Active'),
(3, '2022-05-06', '19:14:32:12', 'TRUE', 'TRUE', 16678, 'Inactive'),
(3, '2022-05-06', '19:15:09:52', 'FALSE', 'TRUE', 16679, 'Active'),
(3, '2022-05-06', '19:15:14:62', 'TRUE', 'TRUE', 16679, 'Inactive'),
(3, '2022-05-06', '19:15:51:32', 'FALSE', 'TRUE', 16680, 'Active'),
(3, '2022-05-06', '19:15:56:42', 'TRUE', 'TRUE', 16680, 'Inactive'),
(3, '2022-05-06', '19:16:33:62', 'FALSE', 'TRUE', 16681, 'Active'),
(3, '2022-05-06', '19:16:38:72', 'TRUE', 'TRUE', 16681, 'Inactive'),
(3, '2022-05-06', '19:17:15:32', 'FALSE', 'TRUE', 16682, 'Active'),
(3, '2022-05-06', '19:17:20:42', 'TRUE', 'TRUE', 16682, 'Inactive'),
(3, '2022-05-06', '19:17:57:72', 'FALSE', 'TRUE', 16683, 'Active'),
(3, '2022-05-06', '19:18:02:82', 'TRUE', 'TRUE', 16683, 'Inactive'),
(3, '2022-05-06', '19:18:40:42', 'FALSE', 'TRUE', 16684, 'Active'),
(3, '2022-05-06', '19:18:45:52', 'TRUE', 'TRUE', 16684, 'Inactive'),
(3, '2022-05-06', '19:19:23:32', 'FALSE', 'TRUE', 16685, 'Active'),
(3, '2022-05-06', '19:19:28:52', 'TRUE', 'TRUE', 16685, 'Inactive'),
(3, '2022-05-06', '19:20:04:92', 'FALSE', 'TRUE', 16686, 'Active'),
(3, '2022-05-06', '19:20:10:02', 'TRUE', 'TRUE', 16686, 'Inactive'),
(3, '2022-05-06', '19:20:46:92', 'FALSE', 'TRUE', 16687, 'Active'),
(3, '2022-05-06', '19:20:52:12', 'TRUE', 'TRUE', 16687, 'Inactive'),
(3, '2022-05-06', '19:21:28:52', 'FALSE', 'TRUE', 16688, 'Active'),
(3, '2022-05-06', '19:21:33:62', 'TRUE', 'TRUE', 16688, 'Inactive'),
(3, '2022-05-06', '19:22:10:62', 'FALSE', 'TRUE', 16689, 'Active'),
(3, '2022-05-06', '19:22:15:72', 'TRUE', 'TRUE', 16689, 'Inactive'),
(3, '2022-05-06', '19:22:52:22', 'FALSE', 'TRUE', 16690, 'Active'),
(3, '2022-05-06', '19:22:57:42', 'TRUE', 'TRUE', 16690, 'Inactive'),
(3, '2022-05-06', '19:23:33:62', 'FALSE', 'TRUE', 16691, 'Active'),
(3, '2022-05-06', '19:23:38:72', 'TRUE', 'TRUE', 16691, 'Inactive'),
(3, '2022-05-06', '19:24:16:62', 'FALSE', 'TRUE', 16692, 'Active'),
(3, '2022-05-06', '19:24:21:82', 'TRUE', 'TRUE', 16692, 'Inactive'),
(3, '2022-05-06', '19:24:58:22', 'FALSE', 'TRUE', 16693, 'Active'),
(3, '2022-05-06', '19:25:03:42', 'TRUE', 'TRUE', 16693, 'Inactive'),
(3, '2022-05-06', '19:25:40:02', 'FALSE', 'TRUE', 16694, 'Active'),
(3, '2022-05-06', '19:25:45:12', 'TRUE', 'TRUE', 16694, 'Inactive'),
(3, '2022-05-06', '19:26:21:62', 'FALSE', 'TRUE', 16695, 'Active'),
(3, '2022-05-06', '19:26:26:82', 'TRUE', 'TRUE', 16695, 'Inactive'),
(3, '2022-05-06', '19:27:02:82', 'FALSE', 'TRUE', 16696, 'Active'),
(3, '2022-05-06', '19:27:08:02', 'TRUE', 'TRUE', 16696, 'Inactive'),
(3, '2022-05-06', '19:27:44:62', 'FALSE', 'TRUE', 16697, 'Active'),
(3, '2022-05-06', '19:27:49:82', 'TRUE', 'TRUE', 16697, 'Inactive'),
(3, '2022-05-06', '19:28:26:32', 'FALSE', 'TRUE', 16698, 'Active'),
(3, '2022-05-06', '19:28:31:52', 'TRUE', 'TRUE', 16698, 'Inactive'),
(3, '2022-05-06', '19:29:08:12', 'FALSE', 'TRUE', 16699, 'Active'),
(3, '2022-05-06', '19:29:13:22', 'TRUE', 'TRUE', 16699, 'Inactive'),
(3, '2022-05-06', '19:29:49:82', 'FALSE', 'TRUE', 16700, 'Active'),
(3, '2022-05-06', '19:29:54:92', 'TRUE', 'TRUE', 16700, 'Inactive'),
(3, '2022-05-06', '19:30:33:32', 'FALSE', 'TRUE', 16701, 'Active'),
(3, '2022-05-06', '19:30:38:52', 'TRUE', 'TRUE', 16701, 'Inactive'),
(3, '2022-05-06', '19:31:15:12', 'FALSE', 'TRUE', 16702, 'Active'),
(3, '2022-05-06', '19:31:20:32', 'TRUE', 'TRUE', 16702, 'Inactive'),
(3, '2022-05-06', '19:31:57:02', 'FALSE', 'TRUE', 16703, 'Active'),
(3, '2022-05-06', '19:32:02:22', 'TRUE', 'TRUE', 16703, 'Inactive'),
(3, '2022-05-06', '19:32:39:72', 'FALSE', 'TRUE', 16704, 'Active'),
(3, '2022-05-06', '19:32:44:92', 'TRUE', 'TRUE', 16704, 'Inactive'),
(3, '2022-05-06', '19:33:22:12', 'FALSE', 'TRUE', 16705, 'Active'),
(3, '2022-05-06', '19:33:27:32', 'TRUE', 'TRUE', 16705, 'Inactive'),
(3, '2022-05-06', '19:34:03:62', 'FALSE', 'TRUE', 16706, 'Active'),
(3, '2022-05-06', '19:34:08:82', 'TRUE', 'TRUE', 16706, 'Inactive'),
(3, '2022-05-06', '19:34:45:52', 'FALSE', 'TRUE', 16707, 'Active'),
(3, '2022-05-06', '19:34:50:72', 'TRUE', 'TRUE', 16707, 'Inactive'),
(3, '2022-05-06', '19:35:26:92', 'FALSE', 'TRUE', 16708, 'Active'),
(3, '2022-05-06', '19:35:32:12', 'TRUE', 'TRUE', 16708, 'Inactive'),
(3, '2022-05-06', '19:36:08:92', 'FALSE', 'TRUE', 16709, 'Active'),
(3, '2022-05-06', '19:36:14:12', 'TRUE', 'TRUE', 16709, 'Inactive'),
(3, '2022-05-06', '19:36:50:92', 'FALSE', 'TRUE', 16710, 'Active'),
(3, '2022-05-06', '19:36:56:02', 'TRUE', 'TRUE', 16710, 'Inactive'),
(3, '2022-05-06', '19:37:32:12', 'FALSE', 'TRUE', 16711, 'Active'),
(3, '2022-05-06', '19:37:37:22', 'TRUE', 'TRUE', 16711, 'Inactive'),
(3, '2022-05-06', '19:38:13:82', 'FALSE', 'TRUE', 16712, 'Active'),
(3, '2022-05-06', '19:38:18:92', 'TRUE', 'TRUE', 16712, 'Inactive'),
(3, '2022-05-06', '19:38:55:52', 'FALSE', 'TRUE', 16713, 'Active'),
(3, '2022-05-06', '19:39:00:62', 'TRUE', 'TRUE', 16713, 'Inactive'),
(3, '2022-05-06', '19:39:37:02', 'FALSE', 'TRUE', 16714, 'Active'),
(3, '2022-05-06', '19:39:42:12', 'TRUE', 'TRUE', 16714, 'Inactive'),
(3, '2022-05-06', '19:40:18:52', 'FALSE', 'TRUE', 16715, 'Active'),
(3, '2022-05-06', '19:40:23:62', 'TRUE', 'TRUE', 16715, 'Inactive'),
(3, '2022-05-06', '19:41:00:02', 'FALSE', 'TRUE', 16716, 'Active'),
(3, '2022-05-06', '19:41:05:22', 'TRUE', 'TRUE', 16716, 'Inactive'),
(3, '2022-05-06', '19:41:41:62', 'FALSE', 'TRUE', 16717, 'Active'),
(3, '2022-05-06', '19:41:46:72', 'TRUE', 'TRUE', 16717, 'Inactive'),
(3, '2022-05-06', '19:42:23:52', 'FALSE', 'TRUE', 16718, 'Active'),
(3, '2022-05-06', '19:42:28:72', 'TRUE', 'TRUE', 16718, 'Inactive'),
(3, '2022-05-06', '19:43:05:52', 'FALSE', 'TRUE', 16719, 'Active'),
(3, '2022-05-06', '19:43:10:72', 'TRUE', 'TRUE', 16719, 'Inactive'),
(3, '2022-05-06', '19:43:47:32', 'FALSE', 'TRUE', 16720, 'Active'),
(3, '2022-05-06', '19:43:52:42', 'TRUE', 'TRUE', 16720, 'Inactive'),
(3, '2022-05-06', '19:44:28:42', 'FALSE', 'TRUE', 16721, 'Active'),
(3, '2022-05-06', '19:44:33:52', 'TRUE', 'TRUE', 16721, 'Inactive'),
(3, '2022-05-06', '19:45:10:22', 'FALSE', 'TRUE', 16722, 'Active'),
(3, '2022-05-06', '19:45:15:42', 'TRUE', 'TRUE', 16722, 'Inactive'),
(3, '2022-05-06', '19:45:51:72', 'FALSE', 'TRUE', 16723, 'Active'),
(3, '2022-05-06', '19:45:56:92', 'TRUE', 'TRUE', 16723, 'Inactive'),
(3, '2022-05-06', '19:46:33:02', 'FALSE', 'TRUE', 16724, 'Active'),
(3, '2022-05-06', '19:46:38:22', 'TRUE', 'TRUE', 16724, 'Inactive'),
(3, '2022-05-06', '19:47:14:22', 'FALSE', 'TRUE', 16725, 'Active'),
(3, '2022-05-06', '19:47:19:42', 'TRUE', 'TRUE', 16725, 'Inactive'),
(3, '2022-05-06', '19:47:55:62', 'FALSE', 'TRUE', 16726, 'Active'),
(3, '2022-05-06', '19:48:00:82', 'TRUE', 'TRUE', 16726, 'Inactive'),
(3, '2022-05-06', '19:48:37:02', 'FALSE', 'TRUE', 16727, 'Active'),
(3, '2022-05-06', '19:48:42:12', 'TRUE', 'TRUE', 16727, 'Inactive'),
(3, '2022-05-06', '19:49:18:92', 'FALSE', 'TRUE', 16728, 'Active'),
(3, '2022-05-06', '19:49:24:12', 'TRUE', 'TRUE', 16728, 'Inactive'),
(3, '2022-05-06', '19:50:00:52', 'FALSE', 'TRUE', 16729, 'Active'),
(3, '2022-05-06', '19:50:05:62', 'TRUE', 'TRUE', 16729, 'Inactive'),
(3, '2022-05-06', '19:50:41:32', 'FALSE', 'TRUE', 16730, 'Active'),
(3, '2022-05-06', '19:50:46:52', 'TRUE', 'TRUE', 16730, 'Inactive'),
(3, '2022-05-06', '19:51:26:02', 'FALSE', 'TRUE', 16731, 'Active'),
(3, '2022-05-06', '19:51:31:22', 'TRUE', 'TRUE', 16731, 'Inactive'),
(3, '2022-05-06', '19:52:08:12', 'FALSE', 'TRUE', 16732, 'Active'),
(3, '2022-05-06', '19:52:13:22', 'TRUE', 'TRUE', 16732, 'Inactive'),
(3, '2022-05-06', '19:52:50:42', 'FALSE', 'TRUE', 16733, 'Active'),
(3, '2022-05-06', '19:52:55:62', 'TRUE', 'TRUE', 16733, 'Inactive'),
(3, '2022-05-06', '19:53:31:42', 'FALSE', 'TRUE', 16734, 'Active'),
(3, '2022-05-06', '19:53:36:62', 'TRUE', 'TRUE', 16734, 'Inactive'),
(3, '2022-05-06', '19:54:12:92', 'FALSE', 'TRUE', 16735, 'Active'),
(3, '2022-05-06', '19:54:18:12', 'TRUE', 'TRUE', 16735, 'Inactive'),
(3, '2022-05-06', '19:54:53:72', 'FALSE', 'TRUE', 16736, 'Active'),
(3, '2022-05-06', '19:54:58:92', 'TRUE', 'TRUE', 16736, 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings_downtime_reasons_images`
--
ALTER TABLE `settings_downtime_reasons_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `settings_quality_reasons`
--
ALTER TABLE `settings_quality_reasons`
  ADD PRIMARY KEY (`quality_reason_id`);

--
-- Indexes for table `settings_quality_reasons_images`
--
ALTER TABLE `settings_quality_reasons_images`
  ADD PRIMARY KEY (`image_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
