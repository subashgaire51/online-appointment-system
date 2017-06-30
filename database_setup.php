<?php
  $conn = mysqli_connect("localhost", "root", "");
mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS `sajhahospital` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;");

mysqli_select_db($conn,"sajhahospital");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS `appointments_tbl` (
  `a_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `d_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

mysqli_query($conn,"INSERT INTO `appointments_tbl` (`a_id`, `date`, `d_id`, `p_id`) VALUES
(1, '2017-06-22', 2, 1);");


mysqli_query($conn,"CREATE TABLE IF NOT EXISTS `doctors_tbl` (
  `d_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

mysqli_query($conn,"INSERT INTO `doctors_tbl` (`d_id`, `fname`, `lname`, `email`, `phone_no`, `time`) VALUES
(2, 'Srijana', 'Singh', 'srijana@gmail.com', 923423434, '08:00:00');");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS `feedback_tbl` (
  `f_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

mysqli_query($conn,"INSERT INTO `feedback_tbl` (`f_id`, `fname`, `email`, `subject`, `message`) VALUES
(1, 'Hemanshu Joshi', 'hem.joshi@gmail.com', 'Appointment', 'hi');");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS `patients_tbl` (
  `p_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

mysqli_query($conn,"INSERT INTO `patients_tbl` (`p_id`, `fname`, `email`, `password`, `address`, `dob`, `gender`) VALUES
(1, 'Subash Gaire', 'subash@gmail.com', 'password', 'KTM', '1996-04-13', 'Male');");

mysqli_query($conn,"ALTER TABLE `appointments_tbl`
  ADD PRIMARY KEY (`a_id`);");

mysqli_query($conn,"ALTER TABLE `doctors_tbl`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);");

mysqli_query($conn,"ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`f_id`);");

mysqli_query($conn,"ALTER TABLE `patients_tbl`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `email` (`email`);");

mysqli_query($conn,"ALTER TABLE `appointments_tbl`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");

mysqli_query($conn,"ALTER TABLE `doctors_tbl`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;");

mysqli_query($conn,"ALTER TABLE `feedback_tbl`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");

mysqli_query($conn,"ALTER TABLE `patients_tbl`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");

?>