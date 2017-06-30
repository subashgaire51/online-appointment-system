<?php 
	session_start();
	include("_db-mysql.php");
	if(isset($_POST['update']) && !empty($_POST['update'])){
		$did = $_SESSION['did'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$time = $_POST['time'];
		$query ="UPDATE `doctors_tbl` 
		SET `fname`='$fname',
		`lname`='$lname',
		`email`='$email',
		`phone_no`='$phone',
		`time`='$time' WHERE `d_id`='$did'";
		$result = mysqli_query($conn,$query);
		echo "<SCRIPT type='text/javascript'>
        alert('Update Successful');
        window.location.replace('../admin/removedoctors.php');
    	</SCRIPT>";		
	}	
 ?>