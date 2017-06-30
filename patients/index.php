<?php
  session_start();
  if(!isset($_SESSION['login'])){ 
    echo "
    	<SCRIPT type='text/javascript'>
	        window.location.replace('../');
	        alert('Login First');
	    </SCRIPT>
	    ";
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Sajha Hospital</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="all" />
</head>
<body>
	<?php require_once '_navigation.php'; ?>
	<div id="body">
		<div class="general">
			<h1>Available Doctors</h1>
		    <table border="2px">
				<tr>
					<th>ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Available Time</th>
				</tr>
				<?php
					include("../actions/_db-mysql.php");
					$query = "SELECT * FROM doctors_tbl";
					$sql = mysqli_query($conn, $query);
					$i=1;
					while($row = mysqli_fetch_array($sql)){
					  $did = $row['d_id'];
					  echo "<tr>";
					    echo "<td>" . $row['d_id'] . "</td>";
					    echo "<td>" . $row['fname'] .' '. $row['lname'] . "</td>";
					    echo "<td>" . $row['email'] . "</td>";
					    echo "<td>" . $row['phone_no'] . "</td>";
					    echo "<td>" . $row['time'] . "</td>";
					  echo "</tr>";
					}
				?>           
        	</table>
        	<div>
	    		<h1>Book an Appointment</h1>
	    		<form method="POST" action="../actions/backend_bookappointment.php">
	    			<label>Date of appointment: </label><input type="date" name="date" required> <br>
	    			<label>Doctor:</label>
	    			<select name="did" required>
	    				<option value="">Select a Doctor:</option>
	    			<?php 
	    				$query = "SELECT * FROM doctors_tbl";
						$sql = mysqli_query($conn, $query);
						$i=1;
						while($row = mysqli_fetch_array($sql)){
							$did = $row['d_id'];
	    			 ?>
	                    <option value="<?php echo $row['d_id']; ?>"><?php echo "Dr. ". $row['fname'].' '.$row['lname']?></option>
	    			<?php 
	    			}
	    			 ?>
	    			</select>
	    			<input type="submit" name="book" value="Book">
	    		</form>
        	</div>
    	</div>

	</div>
                		
</body>
</html>