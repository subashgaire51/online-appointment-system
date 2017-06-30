<?php 
	include("_db-mysql.php");
	if(isset($_POST['register']) && !empty($_POST['register'])){
		$fullname = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$checkemail="SELECT * FROM patients_tbl WHERE email = '$email'";
		$resemail=mysqli_query($conn,$checkemail);
		$dataemail = mysqli_fetch_row($resemail);
		if ($dataemail > 0){
			echo "<SCRIPT type='text/javascript'>
			    	alert('This email is already registered, please try with another email');
			    	window.location.replace('../registration.php');
				</SCRIPT>";
		}else{
			$query ="INSERT INTO `patients_tbl`
			(`p_id`,`fname`,`email`,`password`,`address`,`dob`,`gender`) 
			VALUES(NULL,'$fullname','$email','$password','$address','$dob', '$gender')";
			$result = mysqli_query($conn,$query);
			echo "<SCRIPT type='text/javascript'>
			    	alert('Registered successfully.');
			    	window.location.replace('../');
				</SCRIPT>";
		}
	}	
 ?>