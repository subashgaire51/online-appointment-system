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
          <h1>Book an Appointment</h1>
          <form method="POST" action="../actions/backend_updateappointment.php">
            <?php 
              include("../actions/_db-mysql.php");
              $aid = $_GET['aid'];
              $_SESSION['aid'] = $aid;
              $query = "SELECT * FROM appointments_tbl WHERE `a_id` = $aid";
              $sql = mysqli_query($conn, $query);
              $i=1;
              while($row = mysqli_fetch_array($sql)){
            ?>
            <label>Date of appointment: </label><input type="date" name="date" value="<?php echo $row['date'] ?>"> <br>
            <label>Doctor:</label>
            <select name="did">
            <?php 
              $query = "SELECT * FROM doctors_tbl";
              $sql = mysqli_query($conn, $query);
              $i=1;
              while($row = mysqli_fetch_array($sql)){
            ?>
                <option value="">Select a Doctor:</option>
                <option value="<?php echo $row['d_id']; ?>"><?php echo "Dr. ". $row['fname'].' '.$row['lname']?></option>
            </select>
            <br>
            <input type="submit" name="update" value="Update">
            <a href="../actions/backend_deleteappointment.php?aid="<?php echo $aid?>"">Delete Appointment</a>
              <?php 
              }
            }
             ?>
          </form>
          </div>
      </div>

  </div>
                    
</body>
</html>