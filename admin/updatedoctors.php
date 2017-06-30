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
      <h1>Update Doctors</h1>
       <?php
        include("../actions/_db-mysql.php");
        $did = $_GET['did'];
        $_SESSION['did']=$did;
        $query = "SELECT * FROM doctors_tbl WHERE `d_id` = '$did'";
        $sql = mysqli_query($conn, $query);
        $i=1;
        while($row = mysqli_fetch_array($sql)){
      ?>           
        <form method="POST" action="../actions/backend_updatedoctors.php">
          <label>Name: </label> <br><input type="text" name="fname" value="<?php echo $row['fname']; ?>" placeholder="First Name" required>
          <input type="text" name="lname"  value="<?php echo $row['lname']; ?>" placeholder="Last Name" required><br>  
          <label>Contact: </label> <br>
          <input type="email" name="email"  value="<?php echo $row['email']; ?>" placeholder="Email Address" required>
          <input type="number" name="phone" value="<?php echo $row['phone_no']; ?>" placeholder="Phone Number" required> <br>
          <label>Available time (in 24hrs): </label><input type="time" name="time" value="<?php echo $row['time']; ?>" required> <br>
          <input type="submit" name="update" value="Update">
        </form>
      <?php 
        }
       ?>
    </div>    
  </div>
                    
</body>
</html>