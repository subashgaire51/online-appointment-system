<?php
	session_start(); 
	include("_db-mysql.php");
	if(isset($_POST['book']) && !empty($_POST['book'])){
		$pid = $_SESSION['pid'];
		$did = $_POST['did'];
		$date = $_POST['date'];
		$checkdoc="SELECT COUNT(d_id) FROM appointments_tbl WHERE `d_id` = $did";
		$resultcount=mysqli_query($conn,$checkdoc);
		$count = mysqli_fetch_assoc($resultcount);
		$array = implode(',', $count);
		if ($array > 4){
			echo "<SCRIPT type='text/javascript'>
			    	alert('This doctor cannot be booked.');
				</SCRIPT>";
		}else{
			$query ="INSERT INTO `appointments_tbl`
			(`a_id`,`p_id`,`d_id`,`date`) 
			VALUES(NULL,'$pid','$did','$date')";
			$result = mysqli_query($conn,$query);
			echo "<SCRIPT type='text/javascript'>
			    	alert('Appointment Created.');
			    	window.location.replace('../patients/appointments.php');
				</SCRIPT>";
		}
	}	
 ?>