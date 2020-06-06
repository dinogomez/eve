<?php
echo "his";
$server = "localhost";
$dbuser = "gtech.dp";
$dbpass = "dp";
$dbname = "paulodb";

$conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);
$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$visitCount = mysqli_num_rows($result);
$rownum = 1;
$rownum++;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

  echo "<tr>
      <td>".$rownum."</td>
      <td>".$row['username']."</td>
      <td>".$row['password']."</td>
      <td>"."<form  method='GET'>
            <input type='hidden' name='resetid' value=".$row['username'].">
            <input class='btn btn-outline-danger' type='submit' id='confirm' name='resetbtn' value='Select'>

          </form>"."</td></tr>";
  $rownum++;
}

echo "<input type = 'hidden' name = 'item_id' value = ".$item_id.">";


 ?>
