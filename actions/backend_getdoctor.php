<?php
$q = intval($_GET['q']);
include("_db-mysql.php");

$sql="SELECT * FROM `doctors_tbl` WHERE d_id = '".$q."'";
$result = mysqli_query($conn,$sql);

echo "<table border = '1px'>
<tr>
<th>Name</th>
<th>Email Address</th>
<th>Phon Number</th>
<th>Available Time</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['fname'] .' '. $row['lname'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone_no'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>