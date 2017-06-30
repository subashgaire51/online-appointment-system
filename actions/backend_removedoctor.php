<?php 
	session_start();
	include("../actions/_db-mysql.php");
	$did = $_GET['did'];
	$query ="DELETE FROM `doctors_tbl` WHERE `d_id` = '$did'";
	$result = mysqli_query($conn,$query);
	
	echo "<SCRIPT type='text/javascript'>
        alert('Doctor Removed');
        window.location.replace('../admin/removedoctors.php');
    	</SCRIPT>";	

 ?>