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
      <h1>Add Doctors</h1>
        <form method="POST" action="../actions/backend_adddoctors.php">
          <label>Name: </label> <br><input type="text" name="fname" placeholder="First Name" required>
          <input type="text" name="lname" placeholder="Last Name" required><br>  
          <label>Contact: </label> <br>
          <input type="email" name="email" placeholder="Email Address" required>
          <input type="number" name="phone" placeholder="Phone Number" required> <br>
          <label>Available time (in 24hrs): </label><input type="time" name="time" required> <br>
          <input type="submit" name="add" value="Add">
        </form>
    </div>    
  </div>
                    
</body>
</html>