<?php 
	include("_db-mysql.php");
	if(isset($_POST['add']) && !empty($_POST['add'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$time = $_POST['time'];
		$checkemail="SELECT * FROM doctors_tbl WHERE email = '$email' OR phone_no = '$phone'";
		$resemail=mysqli_query($conn,$checkemail);
		$dataemail = mysqli_fetch_row($resemail);
		if ($dataemail > 0){
			echo "<SCRIPT type='text/javascript'>
			    	alert('This doctor is already added');
			    	window.location.replace('../admin/');
				</SCRIPT>";
		}else{
			$query ="INSERT INTO `doctors_tbl`
			(`d_id`,`fname`,`lname`,`email`,`phone_no`, `time`) 
			VALUES(NULL,'$fname','$lname','$email', '$phone', '$time')";
			$result = mysqli_query($conn,$query);
			echo "<SCRIPT>
					alert('Doctor Added.');
				    window.location.replace('../admin/');
				</SCRIPT>";
			
		}	
	}	
 ?>