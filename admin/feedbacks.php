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
      <h1>Feedbacks</h1>
      <?php 
        include("../actions/_db-mysql.php");

        $sql="SELECT * FROM `feedback_tbl`";
        $result = mysqli_query($conn,$sql);
        echo "<table border = '1px'>
        <tr>
        <th>Name</th>
        <th>Email Address</th>
        <th>Subject</th>
        <th>Message</th>
        </tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
              echo "<td>" . $row['fname'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['subject'] . "</td>";
              echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($conn);
      ?>
    </div>    
  </div>
                    
</body>
</html>
  