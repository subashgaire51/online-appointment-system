<?php 
	session_start();
	include("../actions/_db-mysql.php");
	$aid = $_GET['aid'];
	$query ="DELETE FROM `appointments_tbl` WHERE `a_id` = '$aid'";
	$result = mysqli_query($conn,$query);
	
	echo "<SCRIPT type='text/javascript'>
        alert('Appointment Deleted');
        window.location.replace('../patients/appointments.php');
    	</SCRIPT>";	

 ?>