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
			<h1>Remove Doctors</h1>
		      <table border="2px">
          <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Available Time</th> <th>Action</th>
          <?php
            include("../actions/_db-mysql.php");
            $query = "SELECT * FROM doctors_tbl";
            $sql = mysqli_query($conn, $query);
            $i=1;
            while($row = mysqli_fetch_array($sql)){
              $bid = $row['d_id'];
              echo "<tr>";
                echo "<td>" . $row['d_id'] . "</td>";
                echo "<td>" . $row['fname'] .' '. $row['lname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone_no'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo"<td><a href='../actions/backend_removedoctor.php?did=".$row['d_id']."'>Remove</a>|<a href='updatedoctors.php?did=".$row['d_id']."'> Update</a></td>";
              echo "</tr>";

            }
          ?>           
        </table>
    </div>    
	</div>
                		
</body>
</html>