<?php 
	session_start();
	include("_db-mysql.php");
	if(isset($_POST['update']) && !empty($_POST['update'])){
		$aid = $_SESSION['aid'];
		$date = $_POST['date'];
		$did = $_POST['did'];
		$query ="UPDATE `appointments_tbl` SET `date` = '$date' WHERE `appointments_tbl`.`a_id` = '$aid'";
		$result = mysqli_query($conn,$query);
		echo "<SCRIPT type='text/javascript'>
		alert('Update Successful');
        window.location.replace('../patients/appointments.php');
    	</SCRIPT>";			
	}	
 ?>