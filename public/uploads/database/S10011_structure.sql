-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2023 at 04:34 PM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `S1003`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `child_records_create` (IN `production_id` VARCHAR(90))  NO SQL
    DETERMINISTIC
BEGIN
	
    #production info table value get variable declaration
    DECLARE machinename varchar(90);
    DECLARE cal_date varchar(99);
    DECLARE sh_date varchar(99);
    DECLARE sh_id char(90);
    DECLARE s_time varchar(90);
    DECLARE e_time varchar(90);
    DECLARE actual_scount int(90);
    
    DECLARE new_pid varchar(90);
    DECLARE tool_cid varchar(90);
    DECLARE part varchar(80);
    DECLARE t_id varchar(90);
    DECLARE loop_end int(90);
    DECLARE part_pc int(90);
    DECLARE production_count varchar(90);
    DECLARE pmn BIGINT(90);
    DECLARE production_check varchar(90);
    DECLARE prod_count varchar(90);
    
    SELECT machine_id,calendar_date,shift_date,shift_id,start_time,	end_time,actual_shot_count,production INTO machinename,cal_date,sh_date,sh_id,s_time,e_time,actual_scount,production_check from pdm_production_info WHERE production_event_id = production_id;    
    
  #  SELECT 	tool_changeover_id,no_of_part,count(tool_changeover_id),tool_id INTO tool_cid ,loop_end,pmn,t_id  FROM pdm_tool_changeover WHERE machine_id = machinename ORDER BY last_updated_on DESC LIMIT 1;
    
    #new query change for stored procedure
    SELECT tool_changeover_id,no_of_part,tool_id INTO  tool_cid ,loop_end,t_id FROM `pdm_tool_changeover` WHERE machine_id=machinename ORDER BY shift_date DESC,calendar_date DESC,event_start_time DESC,last_updated_on desc LIMIT 1;
    
    SELECT machinename;
    SELECT tool_cid;
    SELECT loop_end;
    #IF pmn > 0 THEN
	    FOR i IN 1..loop_end
    	DO
    		#tool change over one by one part selection
    		SELECT part_id INTO part FROM tool_changeover WHERE id = tool_cid AND part_order = i;
        
            #part based nic selection
            SELECT part_produced_cycle INTO part_pc FROM settings_part_current WHERE part_id = part;
       
           SELECT actual_scount;
           SELECT part_pc;
            #each parts based production count assigning
           SELECT actual_scount*part_pc INTO production_count;

        IF production_count = 0 THEN
            SET prod_count = 0;
        ELSE 
            SET prod_count = CONCAT('-',production_count);
        END IF;
        
    	IF i = 1 THEN
            IF production_check = NULL THEN
                UPDATE `pdm_production_info` SET `part_id`=part,`tool_id`=t_id,`hierarchy`='parent' WHERE production_event_id = production_id;
            ELSE
                UPDATE `pdm_production_info` SET `part_id`=part,`tool_id`=t_id,`production`=production_count,`correction_min_counts`=prod_count,`rejection_max_counts`=production_count,`hierarchy`='parent' WHERE production_event_id = production_id;
			END IF;
        	#updation query
    		#SELECT CONCAT('FIRST LOOP',part);
            #SELECT production_count;
        ELSEIF i > 1 THEN
        	SELECT production_event_id_generation() INTO new_pid;
        	#child record insertion
            IF production_check = NULL THEN
                INSERT INTO `pdm_production_info`(`production_event_id`,`machine_id`, `calendar_date`, `shift_date`, `shift_id`, `start_time`, `end_time`, `part_id`, `tool_id`, `actual_shot_count`,`hierarchy`) VALUES(CONCAT('PE',new_pid),machinename,cal_date,sh_date,sh_id,s_time,e_time,part,t_id,actual_scount,production_id); 
            ELSE
                INSERT INTO `pdm_production_info`(`production_event_id`,`machine_id`, `calendar_date`, `shift_date`, `shift_id`, `start_time`, `end_time`, `part_id`, `tool_id`, `actual_shot_count`, `production`, `correction_min_counts`, `rejection_max_counts`,`hierarchy`) VALUES(CONCAT('PE',new_pid),machinename,cal_date,sh_date,sh_id,s_time,e_time,part,t_id,actual_scount,production_count,prod_count,production_count,production_id); 
            END IF;
        	SELECT part;
            SELECT production_count;
        END IF;
    END FOR;
    #SELECT  part_id  FROM tool_changeover WHERE id = tool_cid; 
    SELECT tool_cid;
    SELECT part;
	#END IF;



END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `production_event_id_generation` () RETURNS VARCHAR(90) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NO SQL
    DETERMINISTIC
BEGIN
	DECLARE pid varchar(90);
    
	SELECT MAX(r_no) into pid FROM pdm_production_info ORDER BY last_updated_on DESC LIMIT 1;
    IF pid > 0 THEN
    	SET pid = pid+1001;
        RETURN pid;
    ELSE 
    	SET pid = 1001;
        RETURN pid;
    END IF;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alert_settings`
--

CREATE TABLE `alert_settings` (
  `alert_id` varchar(90) NOT NULL,
  `alert_name` varchar(98) DEFAULT NULL,
  `metrics` varchar(98) DEFAULT NULL,
  `relation` varchar(98) DEFAULT NULL,
  `value_val` varchar(98) DEFAULT NULL,
  `past_hour` varchar(90) DEFAULT NULL,
  `machine_arr` text DEFAULT NULL,
  `part_arr` text DEFAULT NULL,
  `lable_id` varchar(98) DEFAULT NULL,
  `to_email_arr` varchar(98) DEFAULT NULL,
  `cc_email_arr` varchar(98) DEFAULT NULL,
  `work_type` varchar(97) DEFAULT NULL,
  `work_title` varchar(98) DEFAULT NULL,
  `assignee` varchar(98) DEFAULT NULL,
  `deu_days` varchar(98) DEFAULT NULL,
  `add_alert_subject` varchar(98) DEFAULT NULL,
  `alert_notes` varchar(98) DEFAULT NULL,
  `priority` varchar(98) DEFAULT NULL,
  `last_updated_by` varchar(90) DEFAULT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notify_as` varchar(98) NOT NULL,
  `alert_status` int(20) NOT NULL,
  `matched_time_stamp` varchar(98) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_downtime_reason_mapping`
--

CREATE TABLE `pdm_downtime_reason_mapping` (
  `r_no` bigint(20) NOT NULL,
  `machine_event_id` varchar(45) NOT NULL,
  `machine_id` varchar(45) NOT NULL,
  `split_id` varchar(45) NOT NULL,
  `calendar_date` varchar(45) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `tool_id` varchar(45) NOT NULL,
  `part_id` varchar(45) NOT NULL,
  `record_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `shot_count` bigint(45) NOT NULL,
  `event` varchar(45) NOT NULL,
  `duration` float NOT NULL,
  `reason_mapped` int(1) NOT NULL,
  `is_split` int(2) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `source` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `production` varchar(98) DEFAULT NULL,
  `correction_min_counts` varchar(97) DEFAULT NULL,
  `corrections` varchar(98) DEFAULT NULL,
  `correction_notes` varchar(90) DEFAULT NULL,
  `rejection_max_counts` varchar(45) DEFAULT NULL,
  `rejections` varchar(45) DEFAULT NULL,
  `rejections_notes` varchar(100) DEFAULT NULL,
  `reject_reason` varchar(100) DEFAULT NULL,
  `last_updated_by` varchar(45) DEFAULT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hierarchy` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_tool_changeover`
--

CREATE TABLE `pdm_tool_changeover` (
  `tool_changeover_id` varchar(90) NOT NULL,
  `machine_id` varchar(99) NOT NULL,
  `no_of_part` varchar(90) NOT NULL,
  `tool_id` varchar(90) NOT NULL,
  `shift_date` varchar(90) DEFAULT NULL,
  `calendar_date` varchar(90) DEFAULT NULL,
  `event_start_time` varchar(90) DEFAULT NULL,
  `shift_id` varchar(98) DEFAULT NULL,
  `machine_event_id` varchar(90) DEFAULT NULL,
  `last_updated_by` varchar(90) DEFAULT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdm_tool_changeover_log`
--

CREATE TABLE `pdm_tool_changeover_log` (
  `tool_changeover_id` varchar(90) NOT NULL,
  `machine_id` varchar(99) NOT NULL,
  `no_of_part` varchar(90) NOT NULL,
  `tool_id` varchar(90) NOT NULL,
  `shift_date` varchar(90) DEFAULT NULL,
  `calendar_date` varchar(90) DEFAULT NULL,
  `event_start_time` varchar(90) DEFAULT NULL,
  `shift_id` varchar(98) DEFAULT NULL,
  `machine_event_id` varchar(90) DEFAULT NULL,
  `last_updated_by` varchar(90) DEFAULT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_current_shift_performance`
--

INSERT INTO `settings_current_shift_performance` (`r_no`, `oee`, `green`, `yellow`, `last_updated_on`, `last_updated_by`) VALUES
(1, 99, 80, 65, '2022-11-22 09:58:36', 'UM1001');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_downtime_reasons`
--

INSERT INTO `settings_downtime_reasons` (`downtime_reason_id`, `downtime_category`, `downtime_reason`, `image_id`, `is_default`, `status`, `last_updated_by`, `last_updated_on`) VALUES
('0', 'Unplanned', 'Unnamed', '', 1, 1, 'UM1001', '2022-11-22 09:53:09'),
('1', 'Planned', 'Machine OFF', '', 1, 1, 'UM1001', '2022-11-22 09:53:45'),
('2', 'Planned', 'Tool Changeover', '', 1, 1, 'UM1001', '2022-11-22 09:54:13'),
('3', 'Unplanned', 'Tool Changeover', '', 1, 1, 'UM1001', '2022-11-22 09:54:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_downtime_threshold`
--

CREATE TABLE `settings_downtime_threshold` (
  `downtime_threshold` bigint(90) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_downtime_threshold`
--

INSERT INTO `settings_downtime_threshold` (`downtime_threshold`, `last_updated_on`, `last_updated_by`) VALUES
(60, '2022-11-22 09:59:33', 'UM1001');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_financial_metrics_goals`
--

INSERT INTO `settings_financial_metrics_goals` (`overall_teep`, `overall_ooe`, `overall_oee`, `availability`, `performance`, `quality`, `oee_target`, `last_updated_by`, `last_updated_on`) VALUES
(99, 99, 99, 99, 99, 99, 99, 'UM1001', '2022-11-22 09:59:15');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_part_current`
--

INSERT INTO `settings_part_current` (`part_id`, `part_name`, `NICT`, `part_produced_cycle`, `part_price`, `part_weight`, `tool_id`, `material_price`, `material_name`, `status`, `last_updated_by`, `last_updated_on`) VALUES
('PT1001', 'No Part', 0, 0, 0, 0, 'TL1001', 0, '', 1, 'UM1001', '2022-11-25 09:39:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_shift_management`
--

INSERT INTO `settings_shift_management` (`shift_log_id`, `start_time`, `duration`, `last_updated_by`, `last_updated_on`) VALUES
('sf01', '09:00:00', '12:00', 'UM1001', '2022-10-01 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings_shift_table`
--

CREATE TABLE `settings_shift_table` (
  `shifts` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_shift_table`
--

INSERT INTO `settings_shift_table` (`shifts`, `start_time`, `end_time`) VALUES
('A01', '09:00:00', '21:00:00'),
('B01', '21:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings_tool_table`
--

CREATE TABLE `settings_tool_table` (
  `tool_id` varchar(45) NOT NULL,
  `tool_name` varchar(45) NOT NULL,
  `tool_status` int(1) NOT NULL,
  `last_updated_by` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_tool_table`
--

INSERT INTO `settings_tool_table` (`tool_id`, `tool_name`, `tool_status`, `last_updated_by`) VALUES
('TL1001', 'No Tool', 1, 'UM1001');

-- --------------------------------------------------------

--
-- Table structure for table `tool_changeover`
--

CREATE TABLE `tool_changeover` (
  `r_no` bigint(20) NOT NULL,
  `id` varchar(90) DEFAULT NULL,
  `machine_id` varchar(90) DEFAULT NULL,
  `part_id` varchar(90) DEFAULT NULL,
  `part_order` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management`
--

CREATE TABLE `work_order_management` (
  `r_no` bigint(20) NOT NULL,
  `work_order_id` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `priority_id` varchar(45) NOT NULL,
  `assignee` varchar(45) NOT NULL,
  `due_date` date NOT NULL,
  `status_id` varchar(45) NOT NULL,
  `cause_id` varchar(45) DEFAULT NULL,
  `action_id` varchar(45) DEFAULT NULL,
  `lable_id` varchar(45) NOT NULL,
  `comment_id` varchar(45) DEFAULT NULL,
  `attachment_id` varchar(100) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management_action_taken`
--

CREATE TABLE `work_order_management_action_taken` (
  `r_no` bigint(20) NOT NULL,
  `action_id` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management_attach_file`
--

CREATE TABLE `work_order_management_attach_file` (
  `r_no` bigint(20) NOT NULL,
  `attach_file_id` varchar(20) NOT NULL,
  `original_file_name` varchar(100) NOT NULL,
  `original_file_extension` varchar(45) NOT NULL,
  `original_file_size_kb` float NOT NULL,
  `uploaded_file_location` varchar(200) NOT NULL,
  `uploaded_file_name` varchar(100) NOT NULL,
  `uploaded_file_extension` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management_cause`
--

CREATE TABLE `work_order_management_cause` (
  `r_no` bigint(20) NOT NULL,
  `cause_id` varchar(45) NOT NULL,
  `cause` varchar(120) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management_comments`
--

CREATE TABLE `work_order_management_comments` (
  `r_no` bigint(20) NOT NULL,
  `comment_id` varchar(45) NOT NULL,
  `comment` varchar(120) NOT NULL,
  `status` int(1) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management_lable`
--

CREATE TABLE `work_order_management_lable` (
  `r_no` bigint(20) NOT NULL,
  `lable_id` varchar(45) NOT NULL,
  `lable` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  `last_updated_by` varchar(45) NOT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management_priority`
--

CREATE TABLE `work_order_management_priority` (
  `r_no` bigint(20) NOT NULL,
  `priority_id` varchar(10) NOT NULL,
  `priority` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_order_management_priority`
--

INSERT INTO `work_order_management_priority` (`r_no`, `priority_id`, `priority`) VALUES
(1, '1', 'High'),
(2, '2', 'Medium'),
(3, '3', 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `work_order_management_status`
--

CREATE TABLE `work_order_management_status` (
  `r_no` bigint(20) NOT NULL,
  `status_id` varchar(10) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_order_management_status`
--

INSERT INTO `work_order_management_status` (`r_no`, `status_id`, `status`) VALUES
(1, '1', 'Open'),
(2, '2', 'In Progress'),
(3, '3', 'Closed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert_settings`
--
ALTER TABLE `alert_settings`
  ADD PRIMARY KEY (`alert_id`);

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
-- Indexes for table `pdm_tool_changeover`
--
ALTER TABLE `pdm_tool_changeover`
  ADD PRIMARY KEY (`tool_changeover_id`);

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
  ADD PRIMARY KEY (`machine_id`),
  ADD UNIQUE KEY `machine_serial_number` (`machine_serial_number`);

--
-- Indexes for table `settings_machine_iot`
--
ALTER TABLE `settings_machine_iot`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `settings_part_current`
--
ALTER TABLE `settings_part_current`
  ADD UNIQUE KEY `part_id` (`part_id`);

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
-- Indexes for table `tool_changeover`
--
ALTER TABLE `tool_changeover`
  ADD PRIMARY KEY (`r_no`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `work_order_management`
--
ALTER TABLE `work_order_management`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `work_order_management_action_taken`
--
ALTER TABLE `work_order_management_action_taken`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `work_order_management_attach_file`
--
ALTER TABLE `work_order_management_attach_file`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `work_order_management_cause`
--
ALTER TABLE `work_order_management_cause`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `work_order_management_comments`
--
ALTER TABLE `work_order_management_comments`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `work_order_management_lable`
--
ALTER TABLE `work_order_management_lable`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `work_order_management_priority`
--
ALTER TABLE `work_order_management_priority`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `work_order_management_status`
--
ALTER TABLE `work_order_management_status`
  ADD PRIMARY KEY (`r_no`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `r_no` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_quality_reasons`
--
ALTER TABLE `settings_quality_reasons`
  MODIFY `quality_reason_id` bigint(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tool_changeover`
--
ALTER TABLE `tool_changeover`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_order_management`
--
ALTER TABLE `work_order_management`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_order_management_action_taken`
--
ALTER TABLE `work_order_management_action_taken`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_order_management_attach_file`
--
ALTER TABLE `work_order_management_attach_file`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_order_management_cause`
--
ALTER TABLE `work_order_management_cause`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_order_management_comments`
--
ALTER TABLE `work_order_management_comments`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_order_management_lable`
--
ALTER TABLE `work_order_management_lable`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_order_management_priority`
--
ALTER TABLE `work_order_management_priority`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_order_management_status`
--
ALTER TABLE `work_order_management_status`
  MODIFY `r_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
