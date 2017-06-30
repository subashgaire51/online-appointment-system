<?php 
	include("_db-mysql.php");
	if(isset($_POST['submit']) && !empty($_POST['submit'])){
		$fullname = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$query ="INSERT INTO `feedback_tbl`
		(`f_id`,`fname`,`email`,`subject`,`message`) 
		VALUES(NULL,'$fullname','$email','$subject','$message')";
		$result = mysqli_query($conn,$query);
		echo "<SCRIPT type='text/javascript'>
		    	alert('Message Sent.');
		    	window.location.replace('../contact.php');
			</SCRIPT>";

	}	
 ?>