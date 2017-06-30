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
			<h1>My Appointments</h1>
		    <table border="2px">
				<tr>
					<th>Appointment ID</th><th>With Doctor</th><th>Date</th><th>Time</th><th></th>
				</tr>
				<?php
					include("../actions/_db-mysql.php");
					$pid = $_SESSION['pid'];
					$aquery = "SELECT * FROM appointments_tbl WHERE `p_id` = $pid";
					$asql = mysqli_query($conn, $aquery);
					$i=1;
					while($row = mysqli_fetch_array($asql)){
					  $did = $row['d_id'];
				?>
					<tr>
						<td> <?php echo $row['a_id']; ?>  </td>
						<?php 
					  $dquery = "SELECT * FROM doctors_tbl WHERE `d_id` = $did";
					  $dsql = mysqli_query($conn, $dquery);
					  $did = mysqli_fetch_array($dsql);
						 ?>
					    <td> <?php echo 'Dr. ' . $did['fname'] .' '. $did['lname'] ?>  </td>
					    <td> <?php echo  $row['date'] ?>  </td>
					    <td> <?php echo  $did['time'] ?>  </td>
					    <?php echo"<td><a href='updateappointment.php?aid=".$row['a_id']."'> Update</a></td>";?>
					</tr>
				<?php	  
					}
				?>           

        	</table>

    	</div>

	</div>
                		
</body>
</html>