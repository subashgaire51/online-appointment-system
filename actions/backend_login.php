<?php 
	session_start();
	include("_db-mysql.php");
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM `patients_tbl` WHERE email='$email' and password='$password'"; 
		$result = mysqli_query($conn, $query); 
		$num = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result); 
		if ($email=="admin@sajha.com" && $password =="admin") {
			$_SESSION['login'] ="login";
			$_SESSION['email'] = $email;
			echo "<SCRIPT type='text/javascript'>
	        window.location.replace('../admin/');
	        alert('Login Success');
	    	</SCRIPT>";
		}else{	
			if($num==1){
				$_SESSION['login'] ="login"; 
				$_SESSION['pid'] = $row['p_id']; 
				echo "<SCRIPT type='text/javascript'>
		        window.location.replace('../patients/');
		        alert('Login Success');
		    	</SCRIPT>";
			}else{
				echo "<SCRIPT type='text/javascript'>
				        window.location.replace('../');
				        alert('Email or password invalid');
			    	</SCRIPT>";
			}
		}
	}
 ?>