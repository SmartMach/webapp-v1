-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 01:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `machine_data`
--

CREATE TABLE `machine_data` (
  `r_no` bigint(20) NOT NULL,
  `machine_id` int(99) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(96) NOT NULL,
  `downtime` varchar(90) NOT NULL,
  `machine_status` varchar(98) NOT NULL,
  `shot_count` bigint(99) NOT NULL,
  `event` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_downtime_reason_mapping`
--

CREATE TABLE `pdm_downtime_reason_mapping` (
  `r_no` bigint(20) NOT NULL,
  `machine_event_id` varchar(45) NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `split_id` varchar(45) NOT NULL,
  `shift_date` varchar(45) NOT NULL,
  `Shift_id` varchar(45) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `downtime_reason_id` varchar(45) NOT NULL,
  `split_duration` float NOT NULL,
  `tool_id` varchar(45) NOT NULL,
  `part_id` varchar(45) NOT NULL,
  `notes` varchar(45) NOT NULL,
  `last_updated_by` varchar(90) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_events`
--

CREATE TABLE `pdm_events` (
  `r_no` int(11) NOT NULL,
  `machine_event_id` varchar(45) NOT NULL,
  `calendar_date` varchar(45) NOT NULL,
  `shift_date` varchar(45) NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `shift_id` varchar(45) NOT NULL,
  `record_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `shot_count` bigint(45) NOT NULL,
  `event` varchar(45) NOT NULL,
  `duration` float NOT NULL,
  `reason_mapped` int(1) NOT NULL,
  `is_split` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pdm_events`
--
DELIMITER $$
CREATE TRIGGER `generate_event_id` BEFORE INSERT ON `pdm_events` FOR EACH ROW BEGIN
	DECLARE x INT;
    DECLARE y CHARACTER(100);
    DECLARE z CHARACTER(100);
 
    SELECT
      downtime_reason_id
    INTO
      x
    FROM
      settings_downtime_reasons
    WHERE
      downtime_category = 'Unplanned'
    AND 
    	downtime_reason='Unnamed';
        
   	SELECT 
    	tool_id,part_id
    INTO
    	y,z
    FROM
    	pdm_tool_changeover_log
    WHERE
    	machine_id = NEW.machine_id
    GROUP BY
    	shift_date , event_start_time
    ORDER BY
    	shift_date DESC , event_start_time DESC
    LIMIT 1;
    
    SET NEW.machine_event_id = CONCAT("ME",(SELECT COUNT(machine_event_id) FROM pdm_events)+1000+1);
   	
    IF y IS NULL THEN
   		SELECT 
    		tool_id,part_id
    	INTO
    		y,z
    	FROM
    		settings_part_current
    	WHERE
    		part_name = "No Part";
    END IF;
    
    IF NEW.event != "Active" THEN
    	INSERT INTO pdm_downtime_reason_mapping(machine_event_id,machine_id,split_id,shift_date,Shift_id,start_time,end_time,downtime_reason_id,split_duration,tool_id,part_id,notes,last_updated_by)VALUES(NEW.machine_event_id,NEW.machine_id,0,NEW.shift_date,NEW.shift_id,NEW.start_time,NEW.end_time,x,NEW.duration,y,z,"","");
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_production_info`
--

CREATE TABLE `pdm_production_info` (
  `r_no` bigint(20) NOT NULL,
  `production_event_id` varchar(45) NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `calendar_date` varchar(45) NOT NULL,
  `shift_date` varchar(45) NOT NULL,
  `shift_id` varchar(45) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `part_id` varchar(45) NOT NULL,
  `tool_id` varchar(45) NOT NULL,
  `actual_shot_count` bigint(99) NOT NULL,
  `production` varchar(98) NOT NULL,
  `correction_min_counts` bigint(97) NOT NULL,
  `corrections` varchar(98) NOT NULL,
  `correction_notes` varchar(90) NOT NULL,
  `rejection_max_counts` varchar(45) NOT NULL,
  `rejections` varchar(45) NOT NULL,
  `rejections_notes` varchar(100) NOT NULL,
  `reject_reason` varchar(100) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pdm_production_info`
--
DELIMITER $$
CREATE TRIGGER `event_id_generator` BEFORE INSERT ON `pdm_production_info` FOR EACH ROW BEGIN
	SET NEW.production_event_id = CONCAT("PE",(SELECT COUNT(production_event_id) FROM pdm_production_info)+1000+1);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_tool_changeover_log`
--

CREATE TABLE `pdm_tool_changeover_log` (
  `shift_date` text NOT NULL,
  `event_start_time` varchar(45) NOT NULL,
  `shift_id` varchar(45) NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `tool_id` varchar(45) NOT NULL,
  `part_id` varchar(45) NOT NULL,
  `machine_event_id` varchar(45) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp()
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
  `last_updated_by` varchar(90) NOT NULL
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
  `status` int(1) NOT NULL,
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
  `last_updated_by` varchar(45) NOT NULL
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
  `last_updated_by` varchar(90) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_machine_current`
--

CREATE TABLE `settings_machine_current` (
  `machine_id` varchar(45) NOT NULL,
  `machine_name` varchar(45) NOT NULL,
  `rate_per_hour` float NOT NULL,
  `machine_offrate_per_hour` float NOT NULL,
  `tonnage` int(10) NOT NULL,
  `machine_brand` varchar(45) NOT NULL,
  `machine_serial_number` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  `last_updated_by` varchar(90) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_machine_iot`
--

CREATE TABLE `settings_machine_iot` (
  `machine_id` varchar(45) NOT NULL,
  `iot_gateway_topic` varchar(100) NOT NULL,
  `site_id` varchar(45) NOT NULL,
  `location_id` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated_by` varchar(90) NOT NULL
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
  `status` int(1) NOT NULL,
  `last_updated_by` varchar(90) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_part_log`
--

CREATE TABLE `settings_part_log` (
  `part_id` varchar(45) NOT NULL,
  `part_name` varchar(45) NOT NULL,
  `NICT` int(10) NOT NULL,
  `part_produced_cycle` int(6) NOT NULL,
  `part_price` float NOT NULL,
  `part_weight` float NOT NULL,
  `tool_id` varchar(45) NOT NULL,
  `material_price` float NOT NULL,
  `material_name` varchar(45) NOT NULL,
  `status` varchar(1) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated_by` varchar(45) NOT NULL
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
  `last_updated_by` varchar(25) NOT NULL,
  `status` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_quality_reasons_images`
--

CREATE TABLE `settings_quality_reasons_images` (
  `image_id` varchar(45) NOT NULL,
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
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_shift_table`
--

CREATE TABLE `settings_shift_table` (
  `shifts` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_tool_table`
--

CREATE TABLE `settings_tool_table` (
  `tool_id` varchar(45) NOT NULL,
  `tool_name` varchar(45) NOT NULL,
  `tool_status` int(1) NOT NULL,
  `last_updated_by` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_mapping_table`
--

CREATE TABLE `temp_mapping_table` (
  `machine_event_id` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `split_id` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `shift_date` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `start_time` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `end_time` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `downtime_reason_id` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `split_duration` int(10) NOT NULL,
  `tool_id` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `part_id` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `notes` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `machine_data`
--
ALTER TABLE `machine_data`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `pdm_downtime_reason_mapping`
--
ALTER TABLE `pdm_downtime_reason_mapping`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `pdm_events`
--
ALTER TABLE `pdm_events`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `pdm_production_info`
--
ALTER TABLE `pdm_production_info`
  ADD PRIMARY KEY (`r_no`),
  ADD UNIQUE KEY `production_event_id` (`production_event_id`);

--
-- Indexes for table `settings_current_shift_performance`
--
ALTER TABLE `settings_current_shift_performance`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `settings_downtime_reasons`
--
ALTER TABLE `settings_downtime_reasons`
  ADD PRIMARY KEY (`downtime_reason_id`);

--
-- Indexes for table `settings_downtime_reasons_images`
--
ALTER TABLE `settings_downtime_reasons_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `settings_machine_current`
--
ALTER TABLE `settings_machine_current`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `settings_machine_iot`
--
ALTER TABLE `settings_machine_iot`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `settings_part_current`
--
ALTER TABLE `settings_part_current`
  ADD PRIMARY KEY (`part_id`);

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

--
-- Indexes for table `settings_tool_table`
--
ALTER TABLE `settings_tool_table`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `temp_mapping_table`
--
ALTER TABLE `temp_mapping_table`
  ADD PRIMARY KEY (`machine_event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `machine_data`
--
ALTER TABLE `machine_data`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdm_downtime_reason_mapping`
--
ALTER TABLE `pdm_downtime_reason_mapping`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdm_events`
--
ALTER TABLE `pdm_events`
  MODIFY `r_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdm_production_info`
--
ALTER TABLE `pdm_production_info`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_current_shift_performance`
--
ALTER TABLE `settings_current_shift_performance`
  MODIFY `r_no` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_quality_reasons`
--
ALTER TABLE `settings_quality_reasons`
  MODIFY `quality_reason_id` bigint(90) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
